<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EarnBan - Bangladesh Freelencers Marketplace</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
	
<div class="container-fluid p-0">
{{-- top header --}}
 <div class="container">
 	<div class="top-header">
 		<div class="d-flex justify-content-between">
 			<div class="main-logo">
 				<img src="{{ asset('assets/img/logo.png') }}" alt="">
 			</div>
 			<div class="top-link my-auto">
 				@if (Auth::check())
 				    <a href="{{ url('dashboard') }}"><img src="{{asset('uploads/profile/'.Auth::user()->profile)}}" height="50px" width="50px" class="rounded-circle" alt=""> {{Auth::user()->name}} </a>
 					@else
 					<a href="{{ url('login') }}"><i class="fal fa-lock"></i> Login</a>
 				    <a href="{{ url('register') }}"><i class="fal fa-user"></i> Register</a>
 				@endif
 			</div>
 		</div>
 	</div>
</div>
{{-- main header --}}
<div class="main-header bg-dark">
<div class="container p-0">
 <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid p-1">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><i class="fal fa-home"></i> HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('about') }}">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('works') }}">HOW ITS WORKS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('jobs') }}">BROWSE JOBS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CATEGORY <i class="fal fa-angle-down fa-lg"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          	@php
          	  $cat=App\Models\Category::get();
          	@endphp
          	@foreach ($cat as $cat)
          		<li><a class="dropdown-item" href="{{ url('category/'.$cat->category) }}"><i class="fal fa-pen"></i> {{$cat->category}} </a></li>
          	@endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('contact') }}">CONTACT</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="https://www.shohozskill.com">GET TUTORIALS</a>
        </li>
      </ul>
      <div class="d-flex">
      	    @if (Auth::check())
      	        @if (Auth::user()->type=="Buyer")
      	        	<a href="{{ url('post-job') }}" class="btn btn-warning shadow"><i class="fal fa-paper-plane"></i> POST A JOB</a>
      	        @endif
      	    @endif
      </div>

    </div>
  </div>
</nav>
 </div>
</div>


@yield('content')


{{-- footer --}}

<footer class="footer">
	<div class="container">
		<div class="row">
		<div class="col-md-3">
			<div class="footer-logo">
				<img src="{{asset('assets/img/logo-color.png')}}" alt="">
			</div>
			<p class="mt-5">
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look.
			</p>
		</div>
		<div class="col-md-3">
			<h3>Quick Link</h3>
			<div class="footer-link">
				<a href=""><i class="fal fa-angle-double-right"></i> About Us</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Contact</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Faq</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Terms & Conditions</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Privacy Policy</a>
			</div>
		</div>
		<div class="col-md-3">
			<h3>Important Link</h3>
			<div class="footer-link">
				<a href=""><i class="fal fa-angle-double-right"></i> Support</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Login</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Register</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Account</a>
				<a href=""><i class="fal fa-angle-double-right"></i> Feedback</a>
			</div>
		</div>
		<div class="col-md-3">
			<h3>Quick Link</h3>
			<div class="social-link">
				 <a href=""><i class="fab fa-facebook-f"></i></a>
				 <a href=""><i class="fab fa-twitter"></i></a>
				 <a href=""><i class="fab fa-instagram"></i></a>
				 <a href=""><i class="fab fa-linkedin"></i></a>
			</div>
			<div class="payment">
				<a href=""><i class="fab fa-cc-mastercard"></i></a>
				<a href=""><i class="fab fa-cc-visa"></i></a>
				<a href=""><i class="fab fa-cc-discover"></i></a>
				<a href=""><i class="fab fa-cc-amex"></i></a>
			</div>
		</div>
	</div>

	<p class="footer-text text-center">&copy Copyright 2021 <a href="" >EARNBAN</a>.All Rights Reserved.</p>
	</div>
</footer>

</div>

<script src="{{ asset('assets/js/bootstrap.js') }}"></script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6086790462662a09efc21c70/1f46khp9b';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>