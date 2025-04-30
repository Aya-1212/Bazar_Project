<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
  public function signUp(Request $request)
  {
    $validated = Validator::make(
      $request->all(),
      [
        'name' => 'required|string|min:3|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => [
          'required',
          'string',
          'min:8',
          'max:10',
        ],
        'password_confirmation' => 'required|same:password'
      ],
      [
        'name.required' => 'Name is required',
        'name.string' => 'Name must be charachters',
        'name.min' => 'Name must be more than 3 charachters',
        'name.max' => 'Name must be less than 50 charachters',
        'email.required' => 'Email is required',
        'email.email' => 'Invalid email',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'Password is required',
        'password.string' => 'Password must be charachters',
        'password.min' => 'Password must be more than 8 charachters',
        'password.max' => 'Password must be less than 10 charachters',
        'password.confirmed' => 'The password confirmation is not right',
      ]

    );
    if ($validated->fails()) {
      return $this->apiResponse(error:$validated->errors(), status:422, message:'Sign up failed');
    }

  
        $user= User::create([
        'name' => $request->name,
        'email' => $request->email,
        'city' => null,
        'address' => null,
        'phone' => null,
        "image"=> "http://127.0.0.1:8000/upload/user.jpeg",
        "password" => Hash::make(request()->password)

    ]);
    $token = $user->createToken('token_name')->plainTextToken;
    return $this->apiResponse(data: [ 
      'user'=> new UserResource($user),
      'token'=> $token,
    ], message:'User registered successfully');
    
  }
  public function signIn (Request $request){
    $validated = Validator::make(
      $request->all(),
      [
        'email' => 'required|email',
        'password' => [
          'required',
          'string',
        ],
      ],
      [
        'email.required' => 'Email is required',
        'email.email' => 'Invalid email',
        'password.required' => 'Password is required',
        'password.string' => 'Password must be charachters',
      ]
    );
    if ($validated->fails()) {
      return $this->apiResponse(error:$validated->errors(), status:422, message:'Sign in failed');
    }
    if (Auth::attempt([
      'email' => $request->input('email'),
      'password' => $request->input('password')
    ])) {
      $user = User::where('email', $request->email)->first();
      $token = $user->createToken('token_name')->plainTextToken;
      return $this->apiResponse(data: [ 
        'user'=> new UserResource($user),
        'token'=> $token,
      ], message:'Sign in Success');
      
         }
   return  $this->apiResponse(error: [
    'email' => 'Invalid Email or Incorrect Password',
   ], status:422, message:'Sign in failed');
}
public function logout(Request $request)
{
    try {
       
    auth()->user()->currentAccessToken()->delete();
        return $this->apiResponse( message:'Loged out Successfully');
    } catch (\Exception $e) {
      return $this->apiResponse( status:401, message:'Unathorized');
    
    }
}
}

 




