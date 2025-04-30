<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;

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
