<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    public function read(Request  $request)
    {
        if($request->search){
            $users=User::where('name','like','%'.$request->search.'%')->orwhere('email','like','%'.$request->search.'%')->orwhere('phone','like','%'.$request->search.'%')->orwhere('type','like','%'.$request->search.'%')->orderby('id','desc')->get();
        }else{
            $users=User::orderby('id','desc')->get();
        }

        return view('admin.user.read',compact('users'));
    }



    public function destroy($id)
    {
        
        $user=User::where('id',$id)->first();
        $user->delete();

        return back()->with('success','This user deleted successfully.');
    }






}
