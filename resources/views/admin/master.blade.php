<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="{{asset('assets/')}}/img/favicon.png" />

	<title>EARNBAN - Dashboard</title>

	<link href="{{asset('admin/')}}/css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{url('admin/dashboard')}}">
          <span class="align-middle">EARNBAN</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{url('admin/dashboard')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a data-target="#forms1" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Category</span>
                        </a>
						<ul id="forms1" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/category')}}">Category</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#forms7" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Percentage</span>
                        </a>
						<ul id="forms7" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/percentage')}}">Percentage</a></li>
						</ul>
					</li>


					<li class="sidebar-item">
						<a data-target="#forms2" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Users</span>
                        </a>
						<ul id="forms2" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/user')}}">Users</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-target="#forms3" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Jobs</span>
                        </a>
						<ul id="forms3" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/job')}}">Jobs</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-target="#forms4" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Orders</span>
                        </a>
						<ul id="forms4" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/order/')}}">Orders</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/order/cancel')}}">Cancel Orders</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-target="#forms5" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Withdraw</span>
                        </a>
						<ul id="forms5" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/withdraw')}}">Withdraw</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#forms6" data-toggle="collapse" class="sidebar-link collapsed">
                           <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Messages</span>
                        </a>
						<ul id="forms6" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/contact')}}">Messages</a></li>
						</ul>
					</li>


				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>


				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item">
							<a class="nav-icon" href="#" >
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									@php
										$contact=App\Models\Contact::where('status',0)->count();
									@endphp
									<span class="indicator">{{$contact}}</span>
								</div>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                            </a>

					    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                        <img src="{{asset('admin/')}}/img/avatars/avater.png" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">{{Auth::user()->name}}</span>
                        </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{ url('admin/profile') }}"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="{{ url('admin/edit-profile') }}"><i class="align-middle mr-1" data-feather="edit"></i> Edit Profile</a>
								<a class="dropdown-item" href="{{ url('admin/change-password') }}"><i class="align-middle mr-1" data-feather="edit-3"></i> Password Change</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">Log out</a>
								<form action="{{ url('logout') }}" method="POST" id="logout">
									@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			

            @yield('content')

		</div>
	</div>

	<script src="{{asset('admin/')}}/js/app.js"></script>

</body>

</html>