<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Job;

class JobController extends Controller
{

    public function read(Request  $request)
    {
        if($request->search){
            $jobs=Job::where('project_name','like','%'.$request->search.'%')->get();
        }else{
            $jobs=Job::orderby('id','desc')->get();
        }

        return view('admin.job.read',compact('jobs'));
    }



    public function destroy($id)
    {
        
        $job=Job::where('id',$id)->first();
        $job->delete();

        return back()->with('success','This job deleted successfully.');
    }






}
