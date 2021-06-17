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
   	   					<b class="h5">Change Password</b>
   	   				</div>
   	   			</div>
   	   			<div class="card-body">
   	   				<form action="{{url('change-password')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label>New Password</label>
                <input type="password" class="form-control" name="password"  placeholder="Enter new password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group  mb-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation"  placeholder="Re-type password">
            </div>
        
            <button type="submit" class="btn btn-primary">Change Password</button>
          </form>
   	   			</div>
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection