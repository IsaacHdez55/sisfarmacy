@extends('admin.admin_master')

@section('title','Manage Profile')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Page Wrapper -->

<div class="page-wrapper" style="min-height: 284px;">
			
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Manage Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('profile.view') }}">My Perfil</a></li>
						<li class="breadcrumb-item active">Manage Profile</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="card">

					<div class="card-body">
						<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">

							@csrf

							<div class="row">

								<div class="col-12">

									<div class="row">
										
										<div class="col-md-6">

<div class="form-group">
	<label class="">User Name <span class="text-danger">*</span></label>
	<input type="text" name="name" class="form-control"  class="form-control" value="{{ $editData->name }}" required>
</div>

										</div>

										{{-- End col-md-6 --}}

										<div class="col-md-6">
											
<div class="form-group">
	<label class="">User Email <span class="text-danger">*</span></label>
	<input type="email" name="email" class="form-control"  class="form-control" value="{{ $editData->email }}" required>
</div>

										</div>

										{{-- End col-md-6 --}}

									</div>

									{{-- End Row --}}

									<div class="row">
										
										<div class="col-md-6">

<div class="form-group">
	<label class="">User Mobile <span class="text-danger">*</span></label>
	<input type="text" name="mobile" class="form-control"  class="form-control" value="{{ $editData->mobile }}" required>
</div>

										</div>

										{{-- End col-md-6 --}}

										<div class="col-md-6">
											
<div class="form-group">
	<label class="">User Address <span class="text-danger">*</span></label>
	<input type="text" name="address" class="form-control"  class="form-control" value="{{ $editData->address }}" required>
</div>

										</div>

										{{-- End col-md-6 --}}

									</div>

									{{-- End Row --}}

									<div class="row">

										<div class="col-md-6">

<div class="form-group">
	<label class="">User Gender <span class="text-danger">*</span></label>
	<select class="form-control" name="gender" id="gender" required>
		<option value="Male" {{ ($editData->usertype == "Male" ? "selected" : "") }}>Male</option>
		<option value="Female" {{ ($editData->usertype == "Female" ? "selected" : "") }}>Female</option>
	</select>
</div>

										</div>

										{{-- End col-md-6 --}}

										<div class="col-md-6">
											
<div class="form-group">
	<label class="">Profile Image<span class="text-danger">*</span></label>
	<input type="file" class="dropify" name="image" data-default-file="{{ (!empty($editData->image))? url('upload/user_images/'.$editData->image):url('upload/user.jpg') }}" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="3M" />
</div>

										</div>

										{{-- End col-md-6 --}}

									</div>

									{{-- End Row --}}

									<div>
										
										<input type="submit" class="btn btn-primary" value="Update" required>
										<a href="{{ route('profile.view') }}" class="btn btn-secondary"> Cancel</a>

									</div>

								</div>

							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	
	</div>			
</div>

<!-- /Main Wrapper -->

@endsection