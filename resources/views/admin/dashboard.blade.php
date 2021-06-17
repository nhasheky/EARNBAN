@extends('admin.master')


@section('content')

<div class="container mt-5">
	
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<div class="alert-icon">
		<i class="far fa-fw fa-bell"></i>
	</div>
	<div class="alert-message">
		<strong>Hello {{Auth::user()->name}}!</strong> Welcome back EARNBAN admin control panel.
	</div>
</div>

<div class="d-flex justify-content-center" style="margin-top:200px">
	<img src="{{asset('assets/img/logo.png')}}" alt="">
</div>


</div>

    
@endsection