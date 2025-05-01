<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    public function add()
    {
        return view('admin.pages.users.add');
    }

    public function store(AddUserRequest $request)
    {
        $hash = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->address = $request->address;
        isset($request->image) ? $user->image = $request->image : $user->image = "user.jpeg";
        $user->save();
        return to_route('users.index')->with('success', 'User Added Successfully');

    }

    public function destroy(User $user)
    {
        try {
            $user = User::findOrFail($user->id);
            $user->delete();
            return to_route(route: 'users.index')->with('success', 'User Deleted Successfully');
        } catch (Exception $e) {
            return to_route(route: 'users.index')->with('errors', 'No Such User');

        }
    }
}
