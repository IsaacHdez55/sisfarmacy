@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
			<div class="sidebar-menu">
				<ul>
					<li> 
						<a href="{{ route('dashboard') }}"><i class="la la-home"></i> <span>Back to Home</span></a>
					</li>
					<li class="menu-title">Settings</li>
					<li class="{{ ($route == 'company.view')?'active':'' }}"> 
						<a href="{{ route('company.view') }}"><i class="la la-building"></i> <span>Company Settings</span></a>
					</li>
					<li class="{{ ($route == 'location.view')?'active':'' }}"> 
						<a href="{{ route('location.view') }}"><i class="la la-clock-o"></i> <span>Localization</span></a>
					</li>
					<li class="{{ ($route == 'theme.view')?'active':'' }}"> 
						<a href="{{ route('theme.view') }}"><i class="la la-photo"></i> <span>Theme Settings</span></a>
					</li>
					<li class="{{ ($route == 'roles-permissions.view')?'active':'' }}">  
						<a href="{{ route('roles-permissions.view') }}"><i class="la la-key"></i> <span>Roles & Permissions</span></a>
					</li>
					{{-- <li> 
						<a href="email-settings.html"><i class="la la-at"></i> <span>Email Settings</span></a>
					</li> --}}
					<li class="{{ ($route == 'invoice.view')?'active':'' }}"> 
						<a href="{{ route('invoice.view') }}"><i class="la la-pencil-square"></i> <span>Invoice Settings</span></a>
					</li>
				</ul>
			</div>
        </div>
    </div>
	<!-- Sidebar -->