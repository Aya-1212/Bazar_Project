<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddAdminRequest;
use App\Http\Requests\Admin\EditAdminRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin.pages.admins.index', compact('admins'));
    }

    public function add()
    {
        return view('admin.pages.admins.add');
    }

    public function store(AddAdminRequest $request)
    {
        $hash = Hash::make($request->input('password'));
        Admin::create(
            [
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'password' => $hash,
            ]
            );

        return to_route('admins.index')->with('success','Admin Added Successfully');    
    }

    public function edit(Admin $admin)
    {
        try {
            $admin = Admin::findOrFail($admin->id);
            return view('admin.pages.admins.edit', compact('admin'));
        } catch (Exception $e) {
            return to_route('admins.index')->with('errors', 'No Such Admin');
        }
    }

    public function update(EditAdminRequest $request,Admin $admin){
      $admin = Admin::where('id',$admin->id)->first();
      if($admin){
       $admin->name = $request->name;
       $admin->email = $request->email;
       if(isset($request->password)){
         $hash = Hash::make($request->password);
         $admin->password = $hash;
       }
       $admin->save();
       return to_route('admins.index')->with('success','Edited Admin Successfully');  
      } 
      return to_route('admins.index')->with('errors','No Such Admin');  
    }

    public function destroy(Admin $admin){
     try{
        $admin = Admin::findOrFail($admin->id);
        $admin->delete();
        return to_route('admins.index')->with('success','Admin Deleted Successfully');
     }catch(Exception $e){
        return to_route('admins.index')->with('errors','No Such Admin');
     }
    }
}
