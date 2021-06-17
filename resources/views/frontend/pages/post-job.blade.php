@extends('frontend.master')

@section('content')
	<section class="container">
		<nav aria-label="breadcrumb" class="mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Post Job</li>
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
					<h3 class="mb-4">Post Your Job</h3>
					<form action="{{ url('post-job') }}" method="post">
					@csrf
					<div class="mb-3">
						<label  class="form-label">Choose a name for your project</label>
						<input type="text" class="form-control" name="project_name" >
						@error('project_name')
						<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Your project skills</label>
						<input type="text" class="form-control" name="skills" placeholder="Ex: html,css">
						@error('skills')
						<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Your project category</label>
						<select name="category" class="form-control" id="">
							<option value="">Select</option>
							@foreach ($category as $category)
								<option value="{{$category->category}}">{{$category->category}}</option>
							@endforeach
						</select>
						@error('category')
						<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Your project budget</label>
						<input type="text" class="form-control" name="budget">
						@error('budget')
						<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Your project bid expire date</label>
						<input type="date" class="form-control" name="expire_date">
						@error('expire_date')
						<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label  class="form-label">Tell us more about your project</label>
						<textarea class="form-control" id="" name="project_description" cols="30" rows="6"></textarea>
						@error('project_description')
						<div class="text-danger">{{$message}}</div>
						@enderror
					</div>

					
					<button type="submit" class="btn btn-primary">Post Your Job</button>
				</form>
				</div>
			</div>
		</div>
	</section>
@endsection