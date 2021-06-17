<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Contact;

class ContactController extends Controller
{

    public function read(Request  $request)
    {
      
        $contacts=Contact::orderby('id','desc')->get();
        return view('admin.contact.read',compact('contacts'));
    }


    public function show($id)
    {
        $contact=Contact::find($id);
        $contact->status=1;
        $contact->save();
        return view('admin.contact.show',compact('contact'));
    }


    public function destroy($id)
    {
        
        $job=Job::where('id',$id)->first();
        $job->delete();

        return back()->with('success','This job deleted successfully.');
    }






}
