<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    
  public function dashboard()
  {
  	return view('admin.dashboard');
  }


  public function Profile()
  {
  	return view('admin.profile.profile');
  }



  public function edit_profile()
  {
  	return view('admin.profile.edit-profile');
  }

  public function update_profile(Request $request)
  {


  	request()->validate([
  		'name'=>'required|string|max:191',
  		'email'=>'required|string|email|max:191',
  		'phone'=>'required|string|max:191',
      'address'=>'required|string|max:191',

  	]);


  	$admin=Admin::find(Auth::id());
  	$admin->name=$request->name;
  	$admin->email=$request->email;
  	$admin->phone=$request->phone;
    $admin->address=$request->address;
  	$admin->save();


  	return back()->with('success','Your profile info updated successfully');
  }


  public function change_password()
  {
  	return view('admin.profile.change-password');
  }


  public function update_password(Request $request)
  {
  	request()->validate([
  		'password' => 'required|string|confirmed|min:8',
  	]);


  	$admin=Admin::find(Auth::id());
  	$admin->password=Hash::make($request->password);
  	$admin->save();


  	return back()->with('success','Your password changed successfully');
  }




}
