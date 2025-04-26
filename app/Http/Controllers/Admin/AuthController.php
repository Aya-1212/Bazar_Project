<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signIn(){
        return view('admin.pages.authentication.sign-in');
    }
    //
    public function submitSignIn (AdminLoginRequest $request){
        $credentails = $request->validated();
        if(Auth::guard('admin')->attempt($credentails)){
           return to_route('admin.home');
        }
        return back()->withErrors([
            'password' => 'Invalid Email or Password',
        ]);
    }

    public function logout(){
        Auth::logout();
        return to_route('admin.signin');
    }
}
