@extends('admin.admin_master')

@section('title','Add User')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add user</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('user.view') }}">Manage Users List</a></li>
						<li class="breadcrumb-item active">Add user</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('users.store') }}" method="post">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">User Type <span class="text-danger">*</span></label>
	<select class="form-control" name="usertype" id="usertype" required>
		<option value="" selected disabled>-- Select Type --</option>
		<option value="Admin">Admin</option>
		<option value="Seller">Seller</option>
	</select>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">
									
<div class="form-group">
	<label class="">User Name<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
		@error('name')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>

								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}

							<div class="row">
										
								<div class="col-md-6">
									
<div class="form-group">
	<label class="">User Email <span class="text-danger">*</span></label>
	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
	@error('email')

		<span class="invalid-feedback">
			<strong>{{ $message }}</strong>
		</span>

	@enderror
</div>

								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">
									
<div class="form-group">
	<label class="">User Password <span class="text-danger">*</span></label>
	<input type="password" name="password" class="form-control" required>
</div>

								</div>{{-- End col-md-6 --}}

							</div>{{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('user.view') }}" class="btn btn-secondary"> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /Page Wrapper -->

@endsection