@extends('admin.admin_master')

@section('title','Manage Purchase List')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Purchase List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Purchase List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('purchase.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Purchase</a>
				</div>
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
								<th>Date</th>
								<th>Reference Number</th>
								<th>Provider</th>
								<th>Status</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							{{-- @foreach ($allData as $key => $product)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>

										<img alt="{{ $product->name }}" src="{{ (!empty($product->product_image))? url('upload/product_image/'.$product->product_image):url('upload/product.jpg') }}" style="width: 80px;">

									</td>
									<td>ST-{{ $product->product_code }}</td>
									<td>{{ $product->product_name }}</td>
									<td>{{ $product->category->category_name }}</td>
									<td>{{ $product->product_stock }}</td>
									<td>{{ $product->product_sales }}</td>
									<td>{{ $product->product_expiration }}</td>
									<td>
										
										<a href="{{ route('product.details', $product->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>

										<a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

										<a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

									</td>
								</tr>

							@endforeach --}}

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