@extends('admin.admin_master')

@section('title','Add Supplier')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Supplier</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('supplier.view') }}">Manage Supplier List</a></li>
						<li class="breadcrumb-item active">Add Supplier</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('suppliers.store') }}" method="post">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Name Company<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="supplier_name_company" class="form-control @error('supplier_name_company') is-invalid @enderror" value="{{ old('supplier_name_company') }}" placeholder="Name Company" required>
		@error('supplier_name_company')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Supplier's Identification<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="supplier_identification" class="form-control @error('supplier_identification') is-invalid @enderror" value="{{ old('supplier_identification') }}" placeholder="Supplier's Identification" required>
		@error('supplier_identification')

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
	<label class="">Supplier's Name<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" value="{{ old('supplier_name') }}" placeholder="Supplier's Name" required>
		@error('supplier_name')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>


								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Supplier's Phone <span class="text-danger">*</span></label>
	<input type="text" name="supplier_phone" id="phone" class="form-control @error('supplier_phone') is-invalid @enderror" value="{{ old('supplier_phone') }}" placeholder="Supplier's Phone" required>
	@error('supplier_phone')

		<span class="invalid-feedback">
			<strong>{{ $message }}</strong>
		</span>

	@enderror		
</div>									

								</div>{{-- End col-md-6 --}}

							</div>{{-- End Row --}}

							<div class="row">
										
								<div class="col-md-6">

<div class="form-group">
	<label class="">Supplier's Address</label>
	<input type="text" name="supplier_address" placeholder="Supplier's Address" value="{{ old('supplier_address') }}" class="form-control">
</div>									

								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Supplier's Phone Alternative</label>
	<input type="text" name="supplier_phone_alternative" id="phone" value="{{ old('supplier_phone_alternative') }}" placeholder="Supplier's Phone Alternative" class="form-control">
</div>

								</div>{{-- End col-md-6 --}}

							</div>{{-- End Row --}}

							<div class="row">
										
								<div class="col-md-6">

<div class="form-group">
	<label class="">Supplier's Email</label>
	<input type="email" name="supplier_email" value="{{ old('supplier_email') }}" placeholder="Supplier's Email" class="form-control">
</div>								

								</div>{{-- End col-md-6 --}}

							</div>{{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('supplier.view') }}" class="btn btn-secondary"> Cancel</a>
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