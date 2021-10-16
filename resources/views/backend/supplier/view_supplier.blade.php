@extends('admin.admin_master')

@section('title','Manage Supplier List')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Supplier List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Supplier List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('suppliers.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Supplier</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->
			
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable tablas">
						<thead>
							<tr>
								<th style="width:10px">#</th>
								<th>Name Company</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $supplier)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $supplier->supplier_name_company }}</td>
									<td>
										<h2 class="table-avatar">
											<a href="{{ route('suppliers.profile', $supplier->id) }}"> {{ $supplier->supplier_name }} </a>
										</h2>

									</td>
									<td>{{ $supplier->supplier_phone }}</td>
									<td>{{ $supplier->supplier_address }}</td>
									<td>
										
										<a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

										<a href="{{ route('suppliers.delete', $supplier->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

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