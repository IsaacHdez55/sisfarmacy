@extends('admin.admin_master')

@section('title','Manage Product List')

@section('admin')

@php

$invoice = DB::table('invoices')->first();

@endphp

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Product List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Product List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					@can('product.add')
					<a href="{{ route('product.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Product</a>
					@endcan
					@can('product.pdf')
					<a href="{{ route('product.pdf') }}" {{-- target="_blank" --}} class="btn btn-info"><i class="fa fa-file"></i> PDF</a>
					&nbsp;
					@endcan
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
								<th>Image</th>
								<th>Code</th>
								<th>Name</th>
								<th>Category</th>
								<th>Stock</th>
								<th>Sales</th>
								<th>Expiration</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $product)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>

										<img alt="{{ $product->name }}" src="{{ (!empty($product->product_image))? url('upload/product_image/'.$product->product_image):url('upload/product.jpg') }}" style="width: 80px;">

									</td>
									<td>{{ $invoice->prefix }}-{{ $product->product_code }}</td>
									<td>{{ $product->product_name }}</td>
									<td>{{ $product->category->category_name }}</td>
									<td>{{ $product->product_stock }}</td>
									<td>{{ $product->product_sales }}</td>
									<td>{{ $product->product_expiration }}</td>
									<td>
										
										@can('product.details')
										<a href="{{ route('product.details', $product->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
										@endcan

										@can('product.edit')
										<a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
										@endcan

										@can('product.delete')
										<a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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