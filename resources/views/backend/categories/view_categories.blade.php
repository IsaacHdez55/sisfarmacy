@extends('admin.admin_master')

@section('title','Manage Category List')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Category List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Category List</li>
					</ul>
				</div>
				@can('categories.add')
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('category.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Category</a>
				</div>
				@endcan
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->
			
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" width="100%">
						<thead>
							<tr>
								<th style="width:10px">#</th>
								<th>Code</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $category)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $category->category_code }}</td>
									<td>{{ $category->category_name }}</td>
									<td>
										
										@can('categories.edit')
										<a href="{{ route('category.edit', $category->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
										@endcan

										@can('categories.delete')
										<a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

@endsection