<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Job;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
	public function index()
	{
		$category=Category::get();
		return view('frontend.welcome',compact('category'));
	}

	public function about()
	{
		return view('frontend.pages.about');
	}

	public function works()
	{
		return view('frontend.pages.works');
	}


	public function category(Request $request,$cat)
	{
		if ($request->search) {
			$jobs=Job::orderby('id','desc')->where('category','LIKE','%'.$request->search.'%')->paginate(10);
		}elseif($request->filter=='latest'){
			$jobs=Job::orderby('id','desc')->paginate(10);
		}elseif($request->filter=='low'){
			$jobs=Job::orderby('budget','asc')->paginate(10);
		}elseif($request->filter=='high'){
			$jobs=Job::orderby('budget','desc')->paginate(10);
		}
		else{
			$jobs=Job::orderby('id','desc')->where('category','LIKE','%'.$cat.'%')->paginate(10);
		}


		if ($request->filter) {
			$filter=$request->filter;
		}else{
			$filter="Latest";
		}
		
		return view('frontend.pages.category',compact('jobs','filter'));
	}
    
    public function jobs(Request $request)
	{
		if ($request->search) {
			$jobs=Job::orderby('id','desc')->where('category','LIKE','%'.$request->search.'%')->paginate(10);
		}elseif($request->filter=='latest'){
			$jobs=Job::orderby('id','desc')->paginate(10);
		}elseif($request->filter=='low'){
			$jobs=Job::orderby('budget','asc')->paginate(10);
		}elseif($request->filter=='high'){
			$jobs=Job::orderby('budget','desc')->paginate(10);
		}
		else{
			$jobs=Job::orderby('id','desc')->paginate(10);
		}


		if ($request->filter) {
			$filter=$request->filter;
		}else{
			$filter="Latest";
		}
		


		return view('frontend.pages.jobs',compact('jobs','filter'));
	}

	public function contact()
	{
		return view('frontend.pages.contact');
	}

	public function contact_store(Request $request)
	{
		
		$request->validate([
			'name'=>'required|string|max:255',
			'email'=>'required|string|max:255',
			'subject'=>'required|string|max:255',
			'message'=>'required|string|max:2000',
		]);

		$contact=new Contact();
		$contact->name=$request->name;
		$contact->email=$request->email;
		$contact->subject=$request->subject;
		$contact->message=$request->message;
		$contact->status=0;
		$contact->save();

		return back()->with('success','Your message send successfully');

	}

	public function post_job()
	{
		$category=Category::get();
		return view('frontend.pages.post-job',compact('category'));
	}

	public function job_details($id)
	{
		$job=Job::find($id);
		$bids=Bid::where('pid',$id)->get();
		$more=Job::orderby('id','desc')->where('id','!=',$id)->take(6)->get();
		return view('frontend.pages.job-details',compact('job','bids','more'));
	}



}
