@extends('frontend.master')

@section('content')
	
   <div class="container profile">
   	 <div class="row">
   	   <div class="col-md-3">
   	   	
   	   	@include('frontend.profile.sidebar')

   	   </div>
   	   <div class="col-md-9">

   	   	<div class="profile-content">
   	   		<div class="profile-box">
   	   			<b class="h5">My Jobs</b>
                        <div class="job-list">
                           @foreach ($jobs as $job)

                           @php
                              $total_bid=App\Models\Bid::where('pid',$job->id)->count();
                           @endphp

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
                                          <a href="{{ url('job/details/'.$job->id) }}" class="btn btn-info my-3"><i class="fal fa-eye"></i></a>
                                          <a href="{{ url('job/edit/'.$job->id) }}" class="btn btn-warning my-3"><i class="fal fa-edit"></i></a>
                                          <a href="{{ url('job/delete/'.$job->id) }}" class="btn btn-danger my-3"><i class="fal fa-trash"></i></a>
                                          <p>Total bids : {{$total_bid}}</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           @endforeach

                           <div class="d-flex justify-content-center mt-5">
                              {{$jobs->links()}}
                           </div>


                        </div>

   	   			
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection