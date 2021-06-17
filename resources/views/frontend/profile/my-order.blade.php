@extends('frontend.master')

@section('content')
	
   <div class="container profile">
   	 <div class="row">
   	   <div class="col-md-3">
   	   	
   	   	@include('frontend.profile.sidebar')

   	   </div>
   	   <div class="col-md-9">

   	   	<div class="profile-content">

   	   		<div class="card profile-box">
   	   			<div class="card-header">
   	   				<div>
   	   					<b class="h5">My Order</b>
   	   				</div>
   	   			</div>
   	   			<div class="card-body">
   	   				<table class="table">
   	   					<tr>
                           <th>Order Id</th>
                           <th>Name</th>
                           <th>Delivery Date</th>
                           <th>Status</th>
                           <th>Amount</th>
                           <th>Action</th>
                        </tr>

                        @foreach ($orders as $order)
                          <tr>
                             <td>{{$order->transaction_id}}</td>
                             <td>{{$order->name}}</td>
                             <td class="text-danger">{{date('d/m/Y',strtotime($order->delivery_date))}}</td>
                             <td>
                                @if ($order->status=="Processing")
                                   <span class="text-primary">Processing</span>
                                   @elseif($order->status=="Cancel")
                                   <span class="text-danger">Cancel</span>
                                   @elseif($order->status=="Completed")
                                   <span class="text-success">Completed</span>
                                @endif
                             </td>
                             <td>${{$order->amount}}</td>
                             <td>
                              @if ($order->seller_id==Auth::id())

                                @if ($order->status=='Cancel')
                                    N/A
                                @elseif($order->status=='Completed')
                                <a href="{{ url('order/completed/'.$order->id) }}" class="btn btn-success">Update File</a>
                                @elseif($order->status=='Processing')
                                 <a href="{{ url('order/completed/'.$order->id) }}" class="btn btn-success">Complete</a>
                                 <a href="{{ url('order/cancel/'.$order->id) }}" class="btn btn-danger">Cancel</a>
                                @endif 
                                 
                                @elseif($order->buyer_id==Auth::id()) 

                                @if ($order->status=='Cancel')
                                    N/A
                                @elseif($order->status=='Completed')
                                <a href="{{ url('order/download/'.$order->id) }}" class="btn btn-success">Downlaod</a>
                                @elseif($order->status=='Processing')
                                <a href="{{ url('order/cancel/'.$order->id) }}" class="btn btn-danger">Cancel</a>
                                @endif 


                              @endif

                                


                             </td>
                          </tr>
                        @endforeach


                    </table>
   	   			</div>
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection