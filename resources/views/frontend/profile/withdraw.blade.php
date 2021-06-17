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

   	   	<div class="profile-content">

   	   		<div class="row">
   	   			<div class="col-md-4">
   	   				<div class="card text-white bg-danger text-center">
   	   					<div class="card-body">
   	   						<i class="fal fa-dollar-sign fa-2x"></i>
   	   				         <h3 class="mt-2">Earning | ${{$payment->total_amount??0}}</h3>
   	   					</div>
   	   				</div>
   	   			</div>
   	   			<div class="col-md-4">
   	   				<div class="card text-white bg-warning text-center">
   	   					<div class="card-body">
   	   						<i class="fal fa-wallet fa-2x"></i>
   	   				         <h3 class="mt-2">Withdraw | ${{$payment->can_withdraw??0}}</h3>
   	   					</div>
   	   				</div>
   	   			</div>
   	   			<div class="col-md-4">
   	   				<div class="card text-white bg-info text-center">
   	   					<div class="card-body">
   	   						<i class="fal fa-money-bill-alt fa-2x"></i>
   	   				         <h3 class="mt-2">Request | ${{$payment->withdraw_amount??0}}</h3>
   	   					</div>
   	   				</div>
   	   			</div>
   	   		</div>


              
               <div class="card profile-box mt-5">
                  <div class="card-header">
                     <div>
                        <b class="h5">Withdraw Request</b>
                     </div>
                  </div>
                  <div class="card-body">
                     
                    @if ($payment)
                       @if ($payment->can_withdraw >= 100)

                      <form action="{{url('withdraw-request')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                          <label>Withdraw Amount</label>
                          <input type="text" class="form-control" name="withdraw_amount"  readonly="" value="{{$payment->can_withdraw}}">
                          @error('password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Bank Name</label>
                          <input type="text" class="form-control" name="back_name" >
                          @error('back_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Bank Account</label>
                          <input type="text" class="form-control" name="back_account" >
                          @error('back_account')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <button type="submit" class="btn btn-primary">Withdraw</button>
                    </form>

                      @else
                      <h6>Withdraw Amount Minimum $100</h6>
                      @endif
                      @else
                      <h6>Your earning is $0</h6>
                    @endif


                  </div>
               </div>
                  
              
   	   	
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection