@extends('admin.admin_master')

@section('title','Profile Supplier')

@section('admin')

<div class="page-wrapper" style="min-height: 284px;">
			
	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Profile Supplier</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('supplier.view') }}">Manage Supplier List</a></li>
						<li class="breadcrumb-item active">Profile Supplier</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card mb-0">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="profile-view">
							<div class="profile-img-wrap">
								<div class="profile-img">

								</div>
							</div>
							<div class="profile-basic">
								<div class="row">
									
									<div class="col-md-5">
<div class="profile-info-left">
	<h3 class="user-name m-t-0 mb-0">{{ $editData->supplier_name_company }}</h3>
	<div class="staff-id">Supplier's Identification: {{ $editData->supplier_identification }}</div>
	<div class="staff-id">Supplier's Name: {{ $editData->supplier_name }}</div>
	<div class="staff-id">Supplier's Email: {{ $editData->supplier_email }}</div>
	<div class="staff-msg"><a class="btn btn-custom" href="{{ route('suppliers.edit', $editData->id) }}">Edit Supplier</a></div>
</div>
									</div>
									<div class="col-md-7">
<ul class="personal-info">
	<li>
		<div class="title">Mobile No:</div>
		<div class="text">{{ $editData->supplier_phone }}</div>
	</li>
	<li>
		<div class="title">Address:</div>
		<div class="text">{{ $editData->supplier_address }}</div>
	</li>
	<li>
		<div class="title">M.Alternative No:</div>
		<div class="text">{{ $editData->supplier_phone_alternative }}</div>
	</li>
	
</ul>
									</div>
								</div>
							</div>
							<div class="pro-edit"><a class="edit-icon" href="{{ route('suppliers.edit', $editData->id) }}"><i class="fa fa-pencil"></i></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Page Content -->


</div>

@endsection