<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{

    public function read(Request  $request)
    {
        if($request->search){
            $orders=Order::where('transaction_id','like','%'.$request->search.'%')->orwhere('status','like','%'.$request->search.'%')->get();
        }else{
            $orders=Order::orderby('id','desc')->get();
        }

        return view('admin.order.read',compact('orders'));
    }


     public function cancel(Request  $request)
    {
        if($request->search){
            $orders=Order::where('transaction_id','like','%'.$request->search.'%')->orwhere('status','like','%'.$request->search.'%')->where('status','cancel')->get();
        }else{
            $orders=Order::orderby('id','desc')->where('status','cancel')->get();
        }

        return view('admin.order.cancel',compact('orders'));
    }


    public function destroy($id)
    {
        
        $order=Order::where('id',$id)->first();
        $order->delete();

        return back()->with('success','This order deleted successfully.');
    }






}
