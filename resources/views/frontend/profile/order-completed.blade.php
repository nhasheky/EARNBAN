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
   	   					<b class="h5">Confirm Order Completed</b>
   	   				</div>
   	   			</div>
   	   			<div class="card-body">
   	   				<form action="{{url('confirm-order-completed')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
               <div class="mb-2">
                  <label>Upload Project File (Only Zip)</label>
               </div>
                <input type="file" name="project_file">
                @error('project-file')
                <div>
                  <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
            </div>
        
            <input type="hidden" name="id" value="{{$order_id}}">
            <button type="submit" class="btn btn-primary">Confirm Order Completed</button>
          </form>
   	   			</div>
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection