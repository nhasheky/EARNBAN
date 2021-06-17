<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Bio;
use App\Models\Job;
use App\Models\Message;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Percentage;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('frontend.profile.profile');
    }


     public function edit_profile()
    {
       return view('frontend.profile.edit-profile');
    }


    public function update_profile(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile' => 'nullable|mimes:jpeg,jpg,png,gif|max:255',
        ]);

        $user=User::find(Auth::id());  

        if ($request->hasFile('profile')) {
        	unlink(public_path('./uploads/profile/'.$user->profile));
         	$profile=$request->file('profile');
            $profile_name=uniqid().'.'.$profile->getClientOriginalExtension();
            $profile->move('./uploads/profile/',$profile_name);

        }

         $user->name= $request->name;  
         $user->phone= $request->phone;  
         $user->address= $request->address;  
         $user->email= $request->email;  
         if ($request->hasFile('profile')) {
         $user->profile= $profile_name;
         }  
         $user->save();

        return back()->with('success','Your profile info updated successfully.');

    }


    public function change_password()
    {
       return view('frontend.profile.change-password');
    }


    
    public function update_password(Request $request)
    {
        
        $request->validate([
            'password' => 'required|string|confirmed|min:6',
        ]);

         $user=User::find(Auth::id());   
         $user->password= Hash::make($request->password);  
         $user->save();

        return back()->with('success','Your password changed successfully.');

    }



    public function post_job(Request $request)
    {
    	$request->validate([
    		'project_name'=>'required|string|max:255',
    		'skills'=>'required|string|max:255',
    		'budget'=>'required|string|max:255',
            'category'=>'required|string|max:255',
    		'expire_date'=>'required|string|max:255',
    		'project_description'=>'required|string|max:2000',
    	]);

    	$job=new Job();
    	$job->uid=Auth::id();
    	$job->project_name=$request->project_name;
    	$job->skills=$request->skills;
    	$job->budget=$request->budget;
        $job->category=$request->category;
    	$job->expire_date=$request->expire_date;
    	$job->project_description=$request->project_description;
    	$job->save();

    	return back()->with('success','Your job posted successfully.');

    }



    public function my_job()
    {
       $jobs=Job::where('uid',Auth::id())->paginate(10);
       return view('frontend.profile.job',compact('jobs'));
    }


    public function job_edit($id)
    {
       $job=Job::find($id);
       return view('frontend.profile.job-edit',compact('job'));
    }


    public function job_update(Request $request)
    {
        $request->validate([
            'project_name'=>'required|string|max:255',
            'skills'=>'required|string|max:255',
            'budget'=>'required|string|max:255',
            'expire_date'=>'required|string|max:255',
            'project_description'=>'required|string|max:2000',
        ]);

        $job=Job::find($request->id);
        $job->uid=Auth::id();
        $job->project_name=$request->project_name;
        $job->skills=$request->skills;
        $job->budget=$request->budget;
        $job->expire_date=$request->expire_date;
        $job->project_description=$request->project_description;
        $job->save();

        return back()->with('success','Your job info updated successfully.');

    }


    public function destroy($id)
    {
        $job=Job::find($id);
        $job->delete();
        return back()->with('success','Your job deleted successfully.');
    }

    public function post_bid(Request $request)
    {
       
        $request->validate([
            'amount'=>'required|string|max:255',
            'bid_description'=>'required|string|max:2000',
        ]);


        $bid=new Bid();
        $bid->pid=$request->pid;
        $bid->poid=$request->poid;
        $bid->buid=$request->buid;
        $bid->bid_amount=$request->amount;
        $bid->bid_description=$request->bid_description;
        $bid->save();

        return back();
    }



    public function my_bio()
    {
       $bio=Bio::where('uid',Auth::id())->first();
       return view('frontend.profile.my-bio',compact('bio'));
    }


    public function add_bio(Request $request)
    {
        $request->validate([
            'skills'=>'required|string|max:255',
            'about_me'=>'required|string|max:2000',
        ]);

        $bio=new Bio();
        $bio->uid=Auth::id();
        $bio->skills=$request->skills;
        $bio->about_me=$request->about_me;
        $bio->save();

        return back()->with('success','Your bio saved successfully.');


    }

    public function update_bio(Request $request)
    {
        $request->validate([
            'skills'=>'required|string|max:255',
            'about_me'=>'required|string|max:2000',
        ]);

        $bio= Bio::where('uid',Auth::id())->first();
        $bio->uid=Auth::id();
        $bio->skills=$request->skills;
        $bio->about_me=$request->about_me;
        $bio->save();

        return back()->with('success','Your bio saved successfully.');


    }



    public function show_profile($id,$jid)
    {

        $user=User::find($id);
        $bio=Bio::where('uid',$id)->first();
        $bid=Bid::where('buid',$id)->where('pid',$jid)->first();
        $job=Job::where('id',$jid)->first();
        return view('frontend.profile.show-profile',compact('user','bio','jid','bid','job'));
    }



    public function start_chat(Request $request)
    {
       
        $request->validate([
            'message'=>'required|string|max:2000',
        ]);

        $chat=new Message();
        $chat->sender_uid=$request->sender_uid;
        $chat->receiver_uid=$request->receiver_uid;
        $chat->message=$request->message;
        $chat->sender_name=Auth::user()->name;
        $chat->save();

        return back()->with('success','Your message send successfully.');
    }


    public function message()
    {

        $chatusers=[];

        $setusers=Message::where('sender_uid',Auth::id())->orwhere('receiver_uid',Auth::id())->get();

        foreach ($setusers as $setuser) {

            if ($setuser->sender_uid==Auth::id()) {

                if (!in_array($setuser->receiver_uid,$chatusers)) {
                   array_push($chatusers, $setuser->receiver_uid);
                }

            }elseif($setuser->receiver_uid==Auth::id()){

                 if (!in_array($setuser->sender_uid,$chatusers)) {
                  array_push($chatusers, $setuser->sender_uid);
                }
            }
        }

    
        return view('frontend.profile.message',compact('chatusers'));
       
    }

    public function single_message($id)
    {
       
        $single_messages=Message::where('sender_uid',Auth::id())->orwhere('receiver_uid',Auth::id())->orderby('id','desc')->get();
        $user=User::find($id);

        foreach ($single_messages as $single_message) {
            if ($single_message->receiver_uid==Auth::id()) {
               $single_message->status=1;
               $single_message->save();
            }
        }

        return view('frontend.profile.single-message',compact('single_messages','user'));
    }



    public function my_order()
    {
        $orders=Order::where('seller_id',Auth::id())->orwhere('buyer_id',Auth::id())->get();
        return view('frontend.profile.my-order',compact('orders'));
    }


    public function order_completed($order_id)
    {
        return view('frontend.profile.order-completed',compact('order_id')); 
    }



    public function confirm_order_completed(Request $request)
    {
       
        $request->validate([
            'project_file'=>'required|mimes:zip|max:8640'
        ]);

        $order=Order::find($request->id);

        if ($order=="Completed") {

           unlink(public_path('./uploads/project/'.$order->project_file)); 
           $project_file=$request->file('project_file'); 
           $project_file_name=uniqid().'.'.$project_file->getClientOriginalExtension();
           $project_file->move('./uploads/project/',$project_file_name);
           $order->status='Completed';
           $order->project_file=$project_file_name;
           $order->save();

          
        }else{

           $project_file=$request->file('project_file'); 
           $project_file_name=uniqid().'.'.$project_file->getClientOriginalExtension();
           $project_file->move('./uploads/project/',$project_file_name);
           $order->status='Completed';
           $order->project_file=$project_file_name;
           $order->save();


           $payment=Payment::where('seller_id',Auth::id())->first();
           $percentage=Percentage::first();

           $peramount=$percentage->percentage*$order->amount/100;


           if ($payment) {
            $payment->total_amount=$payment->total_amount+$order->amount-$peramount;
            $payment->can_withdraw=$payment->can_withdraw+$order->can_withdraw-$peramount;
            $payment->save();
               
           }else{

            $pay=new Payment();
            $pay->seller_id=Auth::id();
            $pay->total_amount=$order->amount-$peramount;
            $pay->can_withdraw=$order->amount-$peramount;
            $pay->save();
           }

          

        }

        return redirect('/my-order')->with('success','Your project successfully done');

    }


    public function order_cancel($id)
    {
       
        $order=Order::find($id); 
        $order->status='Cancel';
        $order->save();
        return back()->with('success','Your order cancel successfully');

    }


    public function order_download($id)
    {
         $order=Order::find($id); 
         return response()->download(public_path('./uploads/project/'.$order->project_file));
    }


    public function withdraw()
    {

       $payment=Payment::where('seller_id',Auth::id())->first();   
       return view('frontend.profile.withdraw',compact('payment'));
    }

    public function withdraw_request(Request $request)
    {
        
       $request->validate([
       'bank_name'=>'required',
       'bank_account'=>'required'
       ]); 

       $payment=Payment::where('seller_id',Auth::id())->first(); 
       $payment->can_withdraw=$payment->can_withdraw-$request->withdraw_amount;
       $payment->withdraw_amount=$payment->withdraw_amount+$request->withdraw_amount;
       $payment->bank_name=$request->bank_name;
       $payment->bank_account=$request->bank_account;
       $payment->save();

       return back()->with('success','Your withdraw request send successfully');

    }



}
