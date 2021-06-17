@extends('frontend.master')

@section('content')
	
   <div class="container profile">
   	 <div class="row">
   	   <div class="col-md-3">
   	   	
   	   	@include('frontend.profile.sidebar')

   	   </div>
   	   <div class="col-md-9">

   	   	<div class="profile-content">
   	   		<div class="card profile-box">
   	   			<div class="card-header">
   	   				<div>
   	   					<b class="h5">Profile Info</b>
   	   				</div>
   	   			</div>
   	   			<div class="card-body">
   	   				<table class="table table-borderless">
   	   					<tr>
   	   						<th>Name</th>
   	   						<td>:</td>
   	   						<td>{{Auth::user()->name}}</td>
   	   					</tr>
   	   					<tr>
   	   						<th>Email</th>
   	   						<td>:</td>
   	   						<td>{{Auth::user()->email}}</td>
   	   					</tr>
   	   					<tr>
   	   						<th>Phone</th>
   	   						<td>:</td>
   	   						<td>{{Auth::user()->phone}}</td>
   	   					</tr>
   	   					<tr>
   	   						<th>Address</th>
   	   						<td>:</td>
   	   						<td>{{Auth::user()->address}}</td>
   	   					</tr>
                        <tr>
                           <th>Account Type</th>
                           <td>:</td>
                           <td>{{Auth::user()->type}}</td>
                        </tr>
   	   					<tr>
   	   						<th>Join Date</th>
   	   						<td>:</td>
   	   						<td>{{date('d/m/Y',strtotime(Auth::user()->created_at))}}</td>
   	   					</tr>
                    </table>
   	   			</div>
   	   		</div>
   	   		
   	   	</div>
   	   	
   	   </div>
   	 </div>
   </div>


@endsection