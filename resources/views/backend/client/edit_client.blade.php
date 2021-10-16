@extends('admin.admin_master')

@section('title','Edit Client')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Client</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('client.view') }}">Manage Client List</a></li>
						<li class="breadcrumb-item active">Edit Client</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('clients.update', $editData->id) }}" method="post">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Client Identification<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="client_identification" class="form-control" value="{{ $editData->client_identification }}" placeholder="Client Identification" required>
	</div>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Client Name<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="client_name" class="form-control" value="{{ $editData->client_name }}" placeholder="Client Name" required>
	</div>
</div>

								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}

							<div class="row">
										
								<div class="col-md-6">

<div class="form-group">
	<label class="">Client Phone</label>
	<input type="text" name="client_phone" id="phone" class="form-control" value="{{ $editData->client_phone }}" placeholder="Client Phone">
</div>	


								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Client Email</label>
	<input type="email" name="client_email" class="form-control" value="{{ $editData->client_email }}" placeholder="Client Email">
</div>									

								</div>{{-- End col-md-6 --}}

							</div>{{-- End Row --}}

							<div class="row">
										
								<div class="col-md-6">

<div class="form-group">
	<label class="">Client Address</label>
	<input type="text" name="client_address" placeholder="Client Address" value="{{ $editData->client_address }}" class="form-control">
</div>									

								</div>{{-- End col-md-6 --}}

							</div>{{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('client.view') }}" class="btn btn-secondary"> Cancel</a>
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