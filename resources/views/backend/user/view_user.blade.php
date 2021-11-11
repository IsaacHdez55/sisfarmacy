@extends('admin.admin_master')

@section('title','Manage Users List')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Users List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Users List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					@can('users.add')
						<a href="{{ route('users.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add User</a>
					@endcan
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->
			
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable tablas">
						<thead>
							<tr>
								<th style="width:10px">#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Image</th>
								<th>Rol</th>
								<th>Last Login</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $user)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td><img alt="{{ $user->name }}" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/user.jpg') }}" style="width: 60px;"></td>
									<td>
										@foreach ($user->roles as $roles)

											{{ $roles->name }}
											
										@endforeach
									</td>
									<td>{{ $user->last_login }}</td>
									<td>
										
										@can('users.edit')
											<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
										@endcan
										@can('users.delete')
											<a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
										@endcan
									</td>
								</tr>

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- /Content End -->
		
    </div>
	<!-- /Page Content -->
	
</div>
<!-- /Page Wrapper -->

@section('js')

<script>
	
	

</script>

@endsection


@endsection