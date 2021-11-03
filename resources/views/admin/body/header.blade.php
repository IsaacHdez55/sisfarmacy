@php

$theme = DB::table('themes')->first();

@endphp


<!-- Header -->
<div class="header">

	<!-- Logo -->
    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo">
			<img src="{{ url('upload/settings_image/'.$theme->light_logo) }}" width="40" height="40" alt="">
		</a>
    </div>
	<!-- /Logo -->
	
	<a id="toggle_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>
	
	<!-- Header Title -->
    <div class="page-title-box">
		<h3>SISFARMACY - {{ $theme->website_name }}</h3>
    </div>
	<!-- /Header Title -->
	
	<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
	
	<!-- Header Menu -->
	<ul class="nav user-menu">
	
		<!-- Flag -->
		{{-- <li class="nav-item dropdown has-arrow flag-nav">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
				<img src="assets/img/flags/us.png" alt="" height="20"> <span>English</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="assets/img/flags/us.png" alt="" height="16"> English
				</a>
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="assets/img/flags/fr.png" alt="" height="16"> French
				</a>
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="assets/img/flags/es.png" alt="" height="16"> Spanish
				</a>
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="assets/img/flags/de.png" alt="" height="16"> German
				</a>
			</div>
		</li> --}}
		<!-- /Flag -->

@php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp

		<li class="nav-item dropdown has-arrow main-drop">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/user.jpg') }}" alt="">
				<span class="status online"></span></span>
				<span>{{ $user->name }}</span>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{ route('profile.view') }}">My profle</a>
				<a class="dropdown-item" href="{{ route('password.view') }}">Change Password</a>
				<a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
			</div>
		</li>
	</ul>
	<!-- /Header Menu -->
	
	<!-- Mobile Menu -->
	<div class="dropdown mobile-user-menu">
		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item" href="{{ route('profile.view') }}">My profle</a>
			<a class="dropdown-item" href="{{ route('password.view') }}">Change Password</a>
			<a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
		</div>
	</div>
	<!-- /Mobile Menu -->
	
</div>
<!-- /Header -->