@extends('frontend.master')

@section('content')
	
   <div class="container profile">
   	 <div class="row">
   	   <div class="col-md-3">
   	   	
   	   	@include('frontend.profile.sidebar')

   	   </div>
   	   <div class="col-md-9">
             @if(session()->has('success'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Suucess!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
              @endif

   	   		<div class="card profile-box">
   	   			<div class="card-header">
   	   				<div>
   	   					<b class="h5">Update Job Info</b>
   	   				</div>
   	   			</div>
   	   			<div class="card-body">
   	   				<form action="{{ url('update-job') }}" method="post">
          @csrf
          <div class="mb-3">
            <label  class="form-label">Choose a name for your project</label>
            <input type="text" class="form-control" name="project_name"  value="{{$job->project_name}}">
            @error('project_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label  class="form-label">Your project skills</label>
            <input type="text" class="form-control" name="skills" value="{{$job->skills}}" placeholder="Ex: html,css">
            @error('skills')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label  class="form-label">Your project budget</label>
            <input type="text" class="form-control" value="{{$job->budget}}" name="budget">
            @error('budget')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label  class="form-label">Your project bid expire date</label>
            <input type="date" class="form-control" value="{{$job->expire_date}}" name="expire_date">
            @error('expire_date')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label  class="form-label">Tell us more about your project</label>
            <textarea class="form-control" id="" name="project_description" cols="30" rows="6">{!!$job->project_description!!}</textarea>
            @error('project_description')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>

          <input type="hidden" name="id" value="{{$job->id}}">
          <button type="submit" class="btn btn-primary">Post Your Job</button>
        </form>
   	   			</div>
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection