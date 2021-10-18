@extends('admin.admin_master')

@section('title','Details Product')

@section('admin')

@php

// dd($data->brasd->brand_name);

@endphp

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Details Product</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('product.view') }}">Manage Product List</a></li>
						<li class="breadcrumb-item active">Details Product</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6 m-b-20">
								<img class="inv-logo" alt="{{ $detailsData->product_name }}" src="{{ (!empty($detailsData->product_image))? url('upload/product_image/'.$detailsData->product_image):url('upload/product.jpg') }}">

								<h3>{{ $detailsData->product_name }}</h3>

								<div class="row">

									<div class="col-md-6">
										<ul class="list-unstyled">
											<li><strong>Brand: </strong>{{ $detailsData->brand->brand_name }}</li>
											<li><strong>Unit: </strong>{{ $detailsData->unit->units_name }}</li>
											<li><strong>Category: </strong>{{ $detailsData->category->category_name }}</li>
										</ul>
									</div> {{-- /.col-md-6 --}}

									<div class="col-md-6">

										<ul class="list-unstyled">
											<li><strong>Stock: </strong>{{ $detailsData->product_stock }}</li>
											<li><strong>Purchase Price: </strong>{{ $detailsData->product_purchase_price }}</li>
											<li><strong>Selling Price: </strong>{{ $detailsData->product_selling_price }}</li>
										</ul>

									</div> {{-- /.col-md-6 --}}

								</div> {{-- /.row --}}
	 							
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<div>{!! DNS1D::getBarcodeHTML($detailsData->product_code, 'EAN13') !!}</div></br>
									<h3 class="text-uppercase">Code {{ $detailsData->product_code }}</h3>
									<ul class="list-unstyled">
										<li>Create Date: <span>{{ $detailsData->created_at }}</span></li>
										<li>Expiry date: <span>{{ $detailsData->product_expiration }}</span></li>
									</ul>
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Rack</th>
                                	<th>Row</th>
									<th>Position</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ $detailsData->product_rack }}</td>
                                	<td>{{ $detailsData->product_row }}</td>
									<td>{{ $detailsData->product_position }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
</div>
<!-- /Page Wrapper -->

@endsection