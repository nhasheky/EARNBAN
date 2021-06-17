@extends('frontend.master')

@section('content')
	<section class="container">
		<nav aria-label="breadcrumb" class="mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Contact</li>
			</ol>
		</nav>

		<div class="contact">
			<div class="col-md-6 mx-auto">
				 @if(session()->has('success'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Suucess!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
              @endif

				<div class="contact-box">
					<h3 class="mb-4">Send Message</h3>
					<form action="{{ url('contact') }}" method="post">
						@csrf
					<div class="mb-3">
						<label  class="form-label">Name</label>
						<input type="text" name="name" class="form-control" >
						@error('name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Email</label>
						<input type="email" name="email" class="form-control" >
						@error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Subject</label>
						<input type="text" name="subject" class="form-control" >
						@error('subject')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Message</label>
						<textarea name="message" class="form-control" id="" cols="30" rows="6"></textarea>
						@error('message')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
					</div>

					
					<button type="submit" class="btn btn-primary">Send Message</button>
				</form>
				</div>
			</div>
		</div>
	</section>
@endsection