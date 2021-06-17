@extends('frontend.master')

@section('content')
	
   <div class="container profile">
   	 <div class="row">
   	   <div class="col-md-3">
   	   	
   	   	@include('frontend.profile.sidebar')

   	   </div>
   	   <div class="col-md-9">

   	   	<div class="profile-content">

               <h3 class="mb-5">Chat</h3>

   	   		<div class="row">
                  <div class="col-md-4">
                     <div class="card chat-user text-center">
                        <div class="card-body">
                              <img src="{{asset('uploads/profile/'.$user->profile)}}" width="100" class="rounded-circle" alt="">
                              <h6 class="mt-2">{{$user->name}}</h6>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8">

                     <div class="chat-box">

                     @foreach ($single_messages as $single_message)
                      

                       <div class="card">
                           <div class="card-body">
                              <div>
                                 <h6>{{$single_message->sender_name}}</h6> 
                                 <p>{{$single_message->created_at->diffForHumans()}}</p>
                              </div>
                             {{$single_message->message}}
                           </div>
                        </div>


                          
                     
                     @endforeach
                     
                    
                        
                     </div>


                     <div class="mt-5">
                        <form action="{{url('start-chat')}}" method="post">
                        @csrf
                        <div class="form-group">
                           <textarea  cols="30" rows="6" class="form-control" placeholder="Type your message" name="message"></textarea>
                        </div>

                        <input type="hidden"  name="receiver_uid" value="{{$user->id}}">
                        <input type="hidden"  name="sender_uid" value="{{Auth::id()}}">

                        <button class="btn btn-primary mt-3">Send Message</button>
                     </form>

                     </div>


                  </div>
   	   		</div>
   	   	</div>
   	   </div>
   	 </div>
   </div>


@endsection