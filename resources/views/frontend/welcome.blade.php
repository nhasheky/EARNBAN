@extends('frontend.master')

@section('content')
	{{-- slider area --}}

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('assets/img/slider-1.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Hire the best freelancers <br> for any job, online.</h1>
        <p>It is a long established fact that a reader will be distracted by the readable <br> content of a page when looking at its layout point of using.</p>
        <a href="{{ url('register') }}" class="btn btn-warning btn-lg shadow">Hire A Freelencer</a>
        <a href="{{ url('register') }}" class="btn btn-info btn-lg shadow">Earn Money Freelencing</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider-2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Hire the best freelancers <br> for any job, online.</h1>
        <p>It is a long established fact that a reader will be distracted by the readable <br> content of a page when looking at its layout point of using.</p>
        <a href="{{ url('register') }}" class="btn btn-warning btn-lg shadow">Hire A Freelencer</a>
        <a href="{{ url('register') }}" class="btn btn-info btn-lg shadow">Earn Money Freelencing</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider-3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Hire the best freelancers <br> for any job, online.</h1>
        <p>It is a long established fact that a reader will be distracted by the readable <br> content of a page when looking at its layout point of using.</p>
        <a href="{{ url('register') }}" class="btn btn-warning btn-lg shadow">Hire A Freelencer</a>
        <a href="{{ url('register') }}" class="btn btn-info btn-lg shadow">Earn Money Freelencing</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


{{-- category area --}}
<div class="container category-area">
	<h3 class="title">CATEGORIES</h3>

	<div class="row mt-5">
		
		@foreach ($category as $category)
		<div class="col-md-3 mb-4">
			<a href="{{ url('category/'.$category->category) }}">
			<div class="card category-box">
				<div class="card-body">
					<i class="fal fa-pen"></i>
					<p>
						{{$category->category}}
					</p>
				</div>
			</div>
			</a>
		</div>
		@endforeach
	
		
	</div>
</div>


{{-- feature --}}
<div class="container feature-area">
	<h3 class="title">FEATURE</h3>
	<div class="row mt-5">
		<div class="col-md-4 mb-4">
			<div class="card feature-box">
				<div class="card-body">
					<h4><i class="fal fa-images"></i>  Browse portfolios</h4>
					<p>
						Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card feature-box">
				<div class="card-body">
					<h4><i class="fal fa-address-card"></i>  View bids</h4>
					<p>
						Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card feature-box">
				<div class="card-body">
					<h4><i class="fal fa-megaphone"></i>  Live chat</h4>
					<p>
						Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card feature-box">
				<div class="card-body">
					<h4><i class="fal fa-wallet"></i>  Pay for quality</h4>
					<p>
						Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card feature-box">
				<div class="card-body">
					<h4><i class="fal fa-location"></i>  Track progress</h4>
					<p>
						Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card feature-box">
				<div class="card-body">
					<h4><i class="fal fa-user-headset"></i>  24/7 support</h4>
					<p>
						Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection