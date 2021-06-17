<div class="sidebar">
   <div class="profile-photo bg-primary text-white">
     <div class="d-flex justify-content-center">
       <img src="{{ asset('/uploads/profile/'.Auth::user()->profile) }}" alt="">
    </div>
    <div class="text-center">
       <b>{{Auth::user()->name}}</b>
    </div>
 </div>
 <div class="nav flex-column nav-pills me-3 d-flex justify-content-center">
  <a href="{{ url('dashboard') }}" class="nav-link"><i class="fal fa-user"></i> Profile</a>
  <a href="{{ url('edit-profile') }}" class="nav-link"><i class="fal fa-edit"></i> Edit Profile</a>
  <a href="{{ url('change-password') }}" class="nav-link"><i class="fal fa-pen"></i> Change Password</a>
  
 @if (Auth::user()->type=='Seller')
  <a href="{{ url('my-bio') }}" class="nav-link"><i class="fal fa-id-card"></i> My Bio</a>
  <a href="{{ url('withdraw') }}" class="nav-link"><i class="fal fa-wallet"></i> Withdraw</a>
 @endif
 
  <a href="{{ url('my-order') }}" class="nav-link"><i class="fal fa-shopping-cart"></i> My Orders</a>

 @if (Auth::user()->type=='Buyer')
  <a href="{{ url('my-job') }}" class="nav-link"><i class="fal fa-list"></i> My Jobs</a>
 @endif

  <a href="{{ url('message') }}" class="nav-link"><i class="fal fa-envelope"></i> Message</a>
  <a href="#" class="nav-link"  onclick="document.getElementById('logout').submit()"><i class="fal fa-lock"></i> Logout</a>
  <form action="{{ url('logout') }}" method="POST" id="logout">
     @csrf
  </form>
</div>
</div>