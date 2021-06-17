@extends('frontend.master')

@section('content')
	<section class="container">
		<nav aria-label="breadcrumb" class="mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Seller Profile</li>
			</ol>
		</nav>

		<div class="show-profile">
			<div class="row">
				<div class="col-md-7 mx-auto">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-center">
								<img src="{{asset('uploads/profile/'.$user->profile)}}" width="100" class="rounded-circle" alt="">
							</div>
							<div class="text-center">
		   	 				   <b class="h2">{{$user->name}}</b>
		   	 			    </div>

		   	 			    @if ($bio)
		   	 			    
		   	 			    <div class="text-center">
		   	 			    	<h5 class="mt-5">Skills:</h5>

		   	 			    	<div class="skills mt-4">
		   	 			    		@foreach (explode(',',$bio->skills) as $skill)
		   	 			    		<a href="#">{{strtoupper($skill)}}</a>
		   	 			    		@endforeach	
		   	 			    	</div>
		   	 			    </div>

		   	 			    <div class="text-center">
		   	 			    	<h5 class="mt-5">About Seller:</h5>

		   	 			    	<p class="mt-4">
		   	 			    		{!! nl2br($bio->about_me) !!}
		   	 			    	</p>
		   	 			    </div>

		   	 			     @endif

		   	 			    <div class="text-center">
		   	 			    	<h5 class="mt-5">Bid Project:</h5>

		   	 			    	<p class="mt-4">
		   	 			    		<b>{{$job->project_name}}</b>
		   	 			    	</p>
		   	 			    </div>

		   	 			    <div class="text-center">
		   	 			    	<h5 class="mt-5">Bid Amount:</h5>

		   	 			    	<p class="mt-4">
		   	 			    		<b>${{$bid->bid_amount}}</b>
		   	 			    	</p>
		   	 			    </div>


		   	 			    <div class="d-flex justify-content-center mt-5">
		   	 			    	
		   	 			    	<form class="row g-3" method="post" action="{{ url('pay') }}">
		   	 			    		@csrf
		   	 			    		<div class="col-auto">
		   	 			    			<label>Delivery Date</label>
		   	 			    		</div>
		   	 			    		<div class="col-auto">
		   	 			    			<input type="date" name="delivery_date" class="form-control">
		   	 			    		</div>
		   	 			    		<input type="hidden" name="buyer_id" value="{{$job->uid}}">
		   	 			    		<input type="hidden" name="seller_id" value="{{$bid->buid}}">
		   	 			    		<input type="hidden" name="job_id" value="{{$job->id}}">
		   	 			    		<input type="hidden" name="amount" value="{{$bid->bid_amount}}">
		   	 			    		<div class="col-auto">
		   	 			    			<button type="submit" class="btn btn-danger mb-3">Order Now</button>
		   	 			    		</div>
		   	 			    	</form>
		   	 			    	
		   	 			    </div>

						</div>
					</div>
				</div>
				<div class="col-md-5">
					@if(session()->has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Suucess!</strong> {{session('success')}}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="card">
						<div class="card-header bg-transparent">
							<b class="h4">Chat With Seller</b>
						</div>
						<div class="card-body">
							@if ($user->id!=Auth::id())
								<form action="{{url('start-chat')}}" method="post">
								@csrf
								<div class="form-group">
									<textarea  cols="30" rows="8" class="form-control" placeholder="Type your message" name="message"></textarea>
								</div>

								<input type="hidden"  name="receiver_uid" value="{{$user->id}}">
								<input type="hidden"  name="sender_uid" value="{{Auth::id()}}">

								<button class="btn btn-primary mt-3">Send Message</button>
							   </form>
							@endif
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection