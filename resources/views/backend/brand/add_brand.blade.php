@extends('admin.admin_master')

@section('title','Add Brand')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Brand</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('brands.view') }}">Manage Brand List</a></li>
						<li class="breadcrumb-item active">Add Brand</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('brand.store') }}" method="post">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Brand Name<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="brand_name" class="form-control" value="{{ old('brand_name') }}" placeholder="Brand Name" required>
		@error('brand_name')

			<span class="text-danger">{{ $message }}</span>

		@enderror

	</div>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Brand Description</label>
	<div class="">
		<input type="text" name="brand_description" class="form-control" value="{{ old('brand_description') }}" placeholder="Brand Description">
		<p>Short Description</p>
	</div>
</div>
								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('brands.view') }}" class="btn btn-secondary"> Cancel</a>
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