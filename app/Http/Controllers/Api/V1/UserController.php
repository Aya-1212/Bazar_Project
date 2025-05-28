<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\UserResource;
use App\Http\Traits\FileSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends ApiController
{
    use FileSystem;
    public function showProfile()
    {
        $user = Auth::user();
        return $this->apiResponse(
            new UserResource($user),
            "User Returned Successfully"
        );
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'phone' => 'nullable|regex:/^01[0125][0-9]{8}$/',
            'city' => 'nullable|min:5|max:40|string',
            'address' => 'nullable|min:6|max:60|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.min' => 'The name must be at least 3 characters.',
            'name.max' => 'The name must not exceed 50 characters.',
            'phone.regex' => 'The phone number must be a valid Egyptian mobile number (starts with 010, 011, 012, or 015).',
            'city.string' => 'The city must be a string.',
            'city.min' => 'The city must be at least 5 characters.',
            'city.max' => 'The city must not exceed 40 characters.',
            'address.string' => 'The address must be a string.',
            'address.min' => 'The address must be at least 6 characters.',
            'address.max' => 'The address must not exceed 60 characters.',
            'image.required' => 'The image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(message: "Something want wrong", error: $validator->errors(), status: 422);
        }

        $validated = $validator->validated();
        $validated['phone'] = $validated['phone'] ?? $user->phone;
        $validated['city'] = $validated['city'] ?? $user->city;
        $validated['address'] = $validated['address'] ?? $user->address;

        if ($request->hasFile('image') ) {
            if($user->image != "user.jpeg"){
                $this->deleteImage('/users' . "/" . $user->image);
            }
            $image_name = $this->uploadImage('users');
            $validated['image'] = $image_name;
        }

        $user->update($validated);

        return $this->apiResponse(
            new UserResource($user),
            "User Updated Successfully"
        );
    }

    public function updatePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'old_password.required' => 'Please enter your current password.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.string' => 'The new password must be a valid string.',
            'new_password.min' => 'The new password must be at least 8 characters.',
            'new_password.confirmed' => 'The new password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(
                message: "Validation Fails",
                error: $validator->errors(),
                status: 422,
            );
        }

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return $this->apiResponse(
                message: "Old password is incorrect.",
                status: 400,
            );
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return $this->apiResponse(
            message: "Password updated successfully.",
        );
    }

    public function deleteUser(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ], [
            'password.required' => 'Please enter your current password.',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(
                message: "Validation Fails",
                error: $validator->errors(),
                status: 422,
            );
        }
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return $this->apiResponse(
                message: "Password isn't correct",
                status: 400,
            );
        }
        if($user->image != "user.jpeg"){
            $this->deleteImage('/users' . "/" . $user->image);
        }

        $user->delete();
        return $this->apiResponse(
            message: "Deleted Account Successfully.",
        );
    }
}
