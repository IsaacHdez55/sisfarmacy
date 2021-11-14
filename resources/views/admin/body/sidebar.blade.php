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

				@can('admin.index')
				<li class="{{ ($route == 'dashboard')?'active':'' }}">
					<a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
				</li>
				@endcan

				@can('users.view')
				<li class="{{ ($prefix == '/users')?'active':'' }}"> 
					<a href="{{ route('user.view') }}"><i class="la la-users"></i> <span>Manage User</span></a>
				</li>
				@endcan

				<li class="submenu {{ ($prefix == '/profiles')?'active':'' }}" >
		            <a href=""><i class="la la-user"></i> <span> Manage Profile</span> <span class="menu-arrow"></span></a>
		            <ul style="display: none;">
		              <li><a class="{{ ($route == 'profile.view')?'active':'' }}" href="{{ route('profile.view') }}"> Your Profile</a></li>
		              <li><a class="{{ ($route == 'password.view')?'active':'' }}" href="{{ route('password.view') }}"> Change Password</a></li>
		            </ul>
		        </li>

				

		        <li class="submenu {{ ($prefix == 'contact')?'active':'' }}" >
		            <a href=""><i class="la la-address-book"></i> <span> Manage Contact</span> <span class="menu-arrow"></span></a>
		            <ul style="display: none;">
		            	@can('supplier.view')
		              		<li><a class="{{ ($route == 'supplier.view')?'active':'' }}" href="{{ route('supplier.view') }}"> Suppliers</a><li>
						@endcan
						@can('client.view')
		              <li><a class="{{ ($route == 'client.view')?'active':'' }}" href="{{ route('client.view') }}"> Client</a><li>
		              		@endcan
		            </ul>
		        </li>
		        
		        @can('categories.view')		      

		        <li class="submenu {{ ($prefix == '/products')?'active':'' }}" >
		            <a href=""><i class="la la-boxes"></i> <span> Manage Product</span> <span class="menu-arrow"></span></a>
		            <ul style="display: none;">
		              <li><a class="{{ ($route == 'categories.view')?'active':'' }}" href="{{ route('categories.view') }}"> Categories</a><li>
		            	@can('brands.view')	
		              <li><a class="{{ ($route == 'brands.view')?'active':'' }}" href="{{ route('brands.view') }}"> Brands</a>
		              	@endcan
		              	@can('units.view')	
		              <li><a class="{{ ($route == 'units.view')?'active':'' }}" href="{{ route('units.view') }}"> Units</a>
		              	@endcan
		              	@can('product.view')	
		              <li><a class="{{ ($route == 'product.view')?'active':'' }}" href="{{ route('product.view') }}"> Products</a>
		              	@endcan

		              {{-- <li><a class="{{ ($route == 'printLabels.view')?'active':'' }}" href="{{ route('printLabels.view') }}"> Print Labels</a> --}}
		              	@can('purchases.view')	
		              <li><a class="{{ ($route == 'purchases.view')?'active':'' }}" href="{{ route('purchases.view') }}"> Purchases</a>
		              	@endcan
		            </ul>
		        </li>
		        
				@endcan

				{{-- @can('categories.view')		       --}}

		        <li class="submenu {{ ($prefix == '/expenses')?'active':'' }}" >
		            <a href=""><i class="la la-minus-circle"></i> <span> Manage Expenses</span> <span class="menu-arrow"></span></a>
		            <ul style="display: none;">
		              <li><a class="{{ ($route == 'expenses.view')?'active':'' }}" href="{{ route('expenses.view') }}"> Expenses</a><li>
		            	{{-- @can('brands.view')	 --}}
		              <li><a class="{{ ($route == 'expense.category.view')?'active':'' }}" href="{{ route('expense.category.view') }}"> Expense Category</a>
		              	{{-- @endcan --}}
		            </ul>
		        </li>
		        
				{{-- @endcan --}}
				
				@can('company.view')

		        <li> 
					<a href="{{ route('company.view') }}"><i class="la la-cog"></i> <span>Settings</span></a>
				</li>
				
				@endcan

			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->