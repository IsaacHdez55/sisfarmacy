@extends('admin.admin_master')

@section('title','Edit Category')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Category</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('categories.view') }}">Manage Category List</a></li>
						<li class="breadcrumb-item active">Edit Category</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('category.update', $editData->id) }}" method="post">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Category Code<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="category_code" class="form-control" value="{{ $editData->category_code }}" placeholder="Code Category" required>
	</div>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Category Name<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="category_name" class="form-control" value="{{ $editData->category_name }}" placeholder="Category Name" required>
	</div>
</div>
								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('categories.view') }}" class="btn btn-secondary"> Cancel</a>
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