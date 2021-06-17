@extends('frontend.master')

@section('content')
	
  <section class="container">
		<nav aria-label="breadcrumb" class="mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Browse Jobs</li>
			</ol>
		</nav>

			<div class="jobs">
			<div class="jobs-header">
				<div class="d-flex justify-content-between">
					<div class="filter">
						<div class="dropdown">
							<button class="btn btn-light btn-lg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								{{ucwords($filter)}} Jobs First <i class="fal fa-angle-down fa-lg"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item" href="{{ url('jobs?filter=latest') }}">Latest Jobs First</a></li>
								<li><a class="dropdown-item" href="{{ url('jobs?filter=low') }}">Lowest Budget First</a></li>
								<li><a class="dropdown-item" href="{{ url('jobs?filter=high') }}">Highest Budget First</a></li>
							</ul>
						</div>
					</div>
					<div class="search col-md-8">
						<form class="row" method="get">
							<div class="col-10">
								<input type="search" class="form-control form-control-lg" name="search"  placeholder="Search Here...">
							</div>
							<div class="col-2">
								<button type="submit" class="btn w-100 btn-lg btn-primary">Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>


       
			<div class="job-list">
				@if (count($jobs)>0)
				
				@foreach ($jobs as $job)

				@php
					$bid=App\Models\Bid::where('pid',$job->id)->count();
					$order_check=App\Models\Order::where('job_id',$job->id)->count();
				@endphp
				@if ($order_check==0)
				<div class="single-job mb-4">
					<div class="row">
						<div class="col-md-8">
							<h4>{{$job->project_name}}</h4>
							<p>
								{{Str::limit($job->project_description,200,'...')}}
							</p>
							<div class="skills">
								@foreach (explode(',',$job->skills) as $skill)
									<a href="#">{{strtoupper($skill)}}</a>
								@endforeach								
							</div>
						</div>
						<div class="col-md-4">
							<div class="d-flex justify-content-end">
								<div>
									<h3 >${{$job->budget}}</h3>
							        <a href="{{ url('job/details/'.$job->id) }}" class="btn btn-warning my-3">Bid Now</a>
							        <p>Total bids : {{$bid}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif

				@endforeach

				<div class="d-flex justify-content-center mt-5">
					{{$jobs->links()}}
				</div>

				@else

				<h4  class="text-center">Nothing Found!</h4>

				@endif


			</div>

		</div>
		
		
	</section>

@endsection