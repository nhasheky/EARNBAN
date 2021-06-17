@extends('frontend.master')

@section('content')
	
  <section class="container">
		<nav aria-label="breadcrumb" class="mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Job Details</li>
			</ol>
		</nav>

		<div class="job-details">
		   <div class="row">
		   	 <div class="col-md-8">
		   	 	<div class="card">
		   	 	<div class="card-body">
		   	 		<h3>{{$job->project_name}}</h3>
		   	 		<p>
		   	 			{!!nl2br($job->project_description)!!}
		   	 		</p>
		   	 		<div class="d-flex justify-content-between mt-5">
		   	 		<div class="skills">
		   	 			@foreach (explode(',',$job->skills) as $skill)
		   	 			<a href="#">{{strtoupper($skill)}}</a>
		   	 			@endforeach	
		   	 		</div>
		   	 		<div>
		   	 			<b>Bid Expire Date:</b> {{date('d-m-Y',strtotime($job->expire_date))}}
		   	 		</div>
		   	 		</div>
		   	 	</div>
		   	 	</div>



		   	 <h3 class="mt-5">{{count($bids)}} Bids</h3>	
		   	 <div class="mt-5">

		   	 	@foreach ($bids as $bid)
		   	 	@php
		   	 		$bid_user=App\Models\User::find($bid->buid);
		   	 	@endphp

		   	 	
		   	 	<div class="d-flex position-relative">
		   	 		<img src="{{asset('uploads/profile/'.$bid_user->profile)}}" width="100" height="100" class="flex-shrink-0 rounded-circle me-3" alt="...">
		   	 		<div class="my-auto">
		   	 			<div class="d-flex justify-content-between">
		   	 				<h5 class="mt-0">{{$bid_user->name}}</h5>
		   	 				<b class="h4">${{$bid->bid_amount}}</b>
		   	 			</div>
		   	 			<p>{!! nl2br($bid->bid_description) !!}</p>

		   	 			@if ($job->uid==Auth::id())
		   	 			<div>
		   	 				<a href="{{url('show-profile/'.$bid->buid.'/job/'.$job->id)}}" class="btn btn-outline-danger">Show Profile</a>
		   	 			</div>
		   	 			@endif
		   	 			

		   	 		</div>
		   	 	</div>
		   	 	
		   	 	@endforeach



		   	 	@if (Auth::check())

		   	 	@if (Auth::user()->type=='Seller')
		   	 	@php
		   	 		$bid_check=App\Models\Bid::where('buid',Auth::id())->where('pid',$job->id)->first();
		   	 	@endphp

		   	 	@if (!$bid_check)

		   	 	<div class="mt-5">
		   	 		<h3>Bid This Project</h3>
		   	 		<form action="{{ url('post-bid') }}" method="post">
		   	 			@csrf
		   	 			<div class="mb-3">
		   	 			<label class="form-label">Your bid amount</label>
		   	 			<input type="text" class="form-control" name="amount">
		   	 			@error('amount')
		   	 			 <span class="text-danger">{{$message}}</span>
		   	 			@enderror
		   	 		</div>
		   	 		<div class="mb-3">
		   	 			<label  class="form-label">Bid Description</label>
		   	 			<textarea class="form-control" name="bid_description" rows="3"></textarea>
		   	 			@error('bid_description')
		   	 			 <span class="text-danger">{{$message}}</span>
		   	 			@enderror
		   	 		</div>
		   	 		<input type="hidden" name="pid"  value="{{$job->id}}">
		   	 		<input type="hidden" name="poid"  value="{{$job->uid}}">
		   	 		<input type="hidden" name="buid"  value="{{Auth::id()}}">
		   	 		<button type="submit" class="btn btn-primary">Bid Now</button>
		   	 		</form>
		   	 	</div>
		   	 		
		   	 	@endif
		   	 	
		   	 	@endif

		   	 	@endif
		   	 	



		   	 </div>


		   	 </div>
		   	 <div class="col-md-4">
		   	 	<div class="card">
		   	 		<h6>Project Budget</h6>
		   	 		<h1>${{$job->budget}}</h1>
		   	 	</div>

		   	 	<div class="card mt-5 p-4 more-project">
		   	 		<h3>More Project</h3>
		   	 		@foreach ($more as $more)
		   	 			<p><a href="{{ url('job/details/'.$more->id) }}"><i class="fal fa-angle-double-right"></i>{{$more->project_name}} </a></p>
		   	 		@endforeach
		   	 		
		   	 	</div>
		   	 </div>


		   </div>
		</div>
	</section>

@endsection