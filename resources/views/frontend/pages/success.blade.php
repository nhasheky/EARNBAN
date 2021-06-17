@extends('frontend.master')

@section('content')
	<div class="container my-5">
		<div class="col-md-6 mx-auto">
			<div class="card border-0 shadow py-5">
				<div class="card-body">
					<div class="text-center">
						<i class="fal fa-check-circle fa-2x text-success"></i>
					</div>
					<div class="mt-3 text-center">
						<h3>Your order successfully placed.</h3>
					</div>
					<div class="text-center">
						<a href="{{url('/')}}" class="btn btn-success mt-3">Go Home</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection