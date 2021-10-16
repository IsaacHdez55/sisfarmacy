@extends('admin.admin_master')

@section('title','Add Unit')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Unit</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('units.view') }}">Manage Unit List</a></li>
						<li class="breadcrumb-item active">Add Unit</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('unit.store') }}" method="post">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Name Unit<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="units_name" class="form-control" value="{{ old('units_name') }}" placeholder="Name Unit" required>
		@error('units_name')

			<span class="text-danger">{{ $message }}</span>

		@enderror

	</div>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Short Name Unit</label>
	<div class="">
		<input type="text" name="units_short_name" class="form-control" value="{{ old('units_short_name') }}" placeholder="Short Name Unit">
	</div>
</div>
								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('units.view') }}" class="btn btn-secondary"> Cancel</a>
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