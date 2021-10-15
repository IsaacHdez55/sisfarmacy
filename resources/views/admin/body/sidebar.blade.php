@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>

				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li class="{{ ($route == 'dashboard')?'active':'' }}">
					<a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
				</li>
				<li class="menu-title"> 
					<span class="">Users</span>
				</li>
				<li class="{{ ($prefix == '/users')?'active':'' }}"> 
					<a href="{{ route('user.view') }}"><i class="la la-users"></i> <span>Manage User</span></a>
				</li>
				<li class="submenu {{ ($prefix == '/profiles')?'active':'' }}" >
		            <a href=""><i class="la la-user"></i> <span> Manage Profile</span> <span class="menu-arrow"></span></a>
		            <ul style="display: none;">
		              <li><a class="{{ ($route == 'profile.view')?'active':'' }}" href="{{ route('profile.view') }}"> Your Profile</a></li>
		              <li><a class="{{ ($route == 'password.view')?'active':'' }}" href="{{ route('password.view') }}"> Change Password</a></li>
		            </ul>
		        </li>

			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->