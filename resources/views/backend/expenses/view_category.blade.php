@extends('admin.admin_master')

@section('title','Manage Expense Category List')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Expense Category List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Expense Category List</li>
					</ul>
				</div>
				@can('brands.add')
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('category.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Expense Category</a>
				</div>
				@endcan
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->
			
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table  mb-0 datatable">
						<thead>
							<tr>
								<th style="width:10px">#</th>
								<th>Name</th>
								<th>Code</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $expense_category)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $expense_category->name }}</td>
									<td>{{ $expense_category->code }}</td>
									<td>
@can('brands.edit')
										<a href="{{ route('category.edit', $expense_category->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
@endcan
@can('brands.delete')
										<a href="{{ route('category.delete', $expense_category->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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