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
   	   					<b class="h5">My Bio</b>
   	   				</div>
   	   			</div>


   	   			<div class="card-body">

             @if ($bio)

             <form action="{{url('update-bio')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label>My Skills</label>
                <input type="text" class="form-control" name="skills" value="{{$bio->skills}}"  placeholder="Ex:html,css">
                @error('skills')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group  mb-3">
                <label>About Me</label>
                <textarea  id="" cols="30" rows="6" class="form-control" name="about_me">{!!$bio->about_me!!}</textarea>
                @error('about_me')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Save Changed Bio</button>
          </form>

             @else
            <form action="{{url('add-bio')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label>My Skills</label>
                <input type="text" class="form-control" name="skills"  placeholder="Ex:html,css">
                @error('skills')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group  mb-3">
                <label>About Me</label>
                <textarea  id="" cols="30" rows="6" class="form-control" name="about_me"></textarea>
                @error('about_me')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Save Bio</button>
            </form>
               
             @endif 

   	   		</div>
   	   	  </div>
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection