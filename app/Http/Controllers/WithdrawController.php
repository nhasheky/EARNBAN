<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Payment;

class WithdrawController extends Controller
{

    public function read(Request  $request)
    {
 
        $payment=Payment::orderby('id','desc')->where('withdraw_amount','>',0)->get();
        return view('admin.payment.read',compact('payment'));
    }



    public function status($id)
    {
        
        $payment=Payment::where('id',$id)->first();
        $payment->can_withdraw=0;
        $payment->withdraw_amount=0;
        $payment->bank_name='N/A';
        $payment->bank_account='N/A';
        $payment->save();

        return back()->with('success','This withdraw successfully done.');
    }






}
