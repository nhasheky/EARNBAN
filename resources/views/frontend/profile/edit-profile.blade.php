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
   	   					<b class="h5">Edit Profile</b>
   	   				</div>
   	   			</div>
   	   			<div class="card-body">
   	   				<form action="{{url('edit-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name"  value="{{Auth::user()->name}}">
                          @error('name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Phone</label>
                          <input type="text" class="form-control" name="phone"  value="{{Auth::user()->phone}}">
                          @error('phone')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email"  value="{{Auth::user()->email}}">
                          @error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address"  value="{{Auth::user()->address}}">
                          @error('address')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>

                       <div class="form-group mb-3">
                          <div>
                             <label for="exampleInputPassword1" class="form-label">Profile Photo</label>
                          </div>
                          <input type="file" name="profile">
                          @error('profile')
                          <div class="text-danger">{{$message}}</div>
                          @enderror

                          <div class="mt-3">
                            <img src="{{ asset('/uploads/profile/'.Auth::user()->profile) }}" width="100" class="rounded-circle" alt="">
                          </div>
                       </div>

                       <button type="submit" class="btn btn-primary">Update Profile</button>

                    </form>
   	   			</div>
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection