@extends('frontend.master')

@section('content')
	
   <div class="container profile">
   	 <div class="row">
   	   <div class="col-md-3">
   	   	
   	   	@include('frontend.profile.sidebar')

   	   </div>
   	   <div class="col-md-9">

   	   	<div class="profile-content">

               <h3 class="mb-5">Chat List</h3>

   	   		<div class="row">
                  @foreach ($chatusers as $chatuser)
                  @php
                     $user=App\Models\User::find($chatuser);
                     $new=App\Models\Message::where('sender_uid',$chatuser)->where('status',0)->count();
                  @endphp
                   
                     <div class="col-md-3">
                     <a href="{{ url('message/user/'.$chatuser) }}">
                     <div class="card  text-center">
                        <div class="card-body">
                              <img src="{{asset('uploads/profile/'.$user->profile)}}" width="100" class="rounded-circle" alt="">
                              <h6 class="mt-2">{{$user->name}} <span class="text-danger">({{$new}})</span></h6>
                        </div>
                     </div>
                      </a>
                  </div>

                  @endforeach
   	   		</div>
   	   	</div>
   	   </div>
   	 </div>
   </div>


@endsection