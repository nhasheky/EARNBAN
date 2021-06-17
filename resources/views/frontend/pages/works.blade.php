@extends('frontend.master')

@section('content')
	
  <section class="container">
		<nav aria-label="breadcrumb" class="mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">How Works</li>
			</ol>
		</nav>

		<div class="works">
			<div class="row">
			<div class="col-md-6">
				<img src="{{ asset('assets/img/works.jpg') }}" class="w-100" alt="">
			</div>
			<div class="col-md-6">
				<h5>Works</h5>
				<h2>How does it work?</h2>

				<h3 class="mt-5">1. Post a project or contest</h3>
				<p>
					There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text
				</p>


				<h3 class="mt-5">2. Choose the perfect freelancer</h3>
				<p>
					There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text
				</p>


				<h3 class="mt-5">3. Pay when you’re satisfied</h3>
				<p>
					There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text
				</p>

			</div>
		   </div>
		</div>
	</section>

@endsection