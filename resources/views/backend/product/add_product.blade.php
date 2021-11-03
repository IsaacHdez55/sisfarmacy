@extends('admin.admin_master')

@section('title','Add Product')

@section('admin')

@php

$invoice = DB::table('invoices')->first();
$location = DB::table('locations')->first();

@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Product</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('product.view') }}">Manage Product List</a></li>
						<li class="breadcrumb-item active">Add Product</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
							
							@csrf

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Product Code<span class="text-danger">*</span></label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">{{ $invoice->prefix }} - </span>
		</div>
		<input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" value="{{ old('product_code') }}" placeholder="Product Code" required>
		@error('product_code')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>
								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

<div class="form-group">
	<label class="">Product Name<span class="text-danger">*</span></label>
	<input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" placeholder="Product Name" required>
	@error('product_name')

		<span class="invalid-feedback">
			<strong>{{ $message }}</strong>
		</span>
	
	@enderror
</div>
								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}


							<div class="row">

								<div class="col-md-4">

<div class="form-group">
	<label class="">Product Brand<span class="text-danger">*</span></label>
	<div class="form-focus select-focus">
	<select class="form-control select" name="product_brand" id="product_brand" required>
		<option value="" selected disabled>-- Select Product Brand --</option>

		@foreach ($brands as $brand)
		
			<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

		@endforeach

	</select>
	</div>
</div>
								</div>{{-- End col-md-4 --}}

								<div class="col-md-4">

<div class="form-group">
	<label class="">Product Unit<span class="text-danger">*</span></label>
	<div class="form-focus select-focus">
	<select class="form-control select" name="product_unit" id="product_unit" required>
		<option value="" selected disabled>-- Select Product Unit --</option>

		@foreach ($units as $unit)
		
			<option value="{{ $unit->id }}">{{ $unit->units_name }}</option>

		@endforeach

	</select>
	</div>
</div>
								</div>{{-- End col-md-4 --}}

								<div class="col-md-4">

<div class="form-group">
	<label class="">Product Category<span class="text-danger">*</span></label>
	<div class="form-focus select-focus">
	<select class="form-control select" name="product_category" id="product_category" required>
		<option value="" selected disabled>-- Select Product Category --</option>

		@foreach ($categories as $category)
		
			<option value="{{ $category->id }}">{{ $category->category_name }}</option>

		@endforeach

	</select>
	</div>
</div>
								</div>{{-- End col-md-4 --}}

							</div> {{-- End Row --}}

							<div class="row">

								<div class="col-md-5">

<div class="form-group">
	<label class="">Product Purchase Price<span class="text-danger">*</span></label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon2">{{ $location->currency_symbol }}</span>
		</div>
		<input type="text" name="product_purchase_price" id="product_purchase_price" class="form-control" value="{{ old('product_purchase_price') }}" placeholder="Product Purchase Price" required>
	</div>
</div>
								</div>{{-- End col-md-5 --}}

								<div class="col-md-5">

<div class="form-group">
	<label class="">Product Selling Price<span class="text-danger">*</span></label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon2">{{ $location->currency_symbol }}</span>
		</div>
		<input type="text" name="product_selling_price" id="product_selling_price" class="form-control" value="{{ old('product_selling_price') }}" placeholder="Product Selling Price" readonly required>
	</div>
</div>
								</div>{{-- End col-md-5 --}}

								<div class="col-md-2">

<div class="form-group">
	<label class="">Margin %<span class="text-danger">*</span></label>
	<div class="input-group">
		<input type="number" name="margin" id="margin" class="form-control" min="0" value="40" placeholder="Margin %" required readonly>
		<div class="input-group-append">
			<span class="input-group-text" id="basic-addon2">%</span>
		</div>
	</div>
</div>
								</div>{{-- End col-md-2 --}}

							</div> {{-- End Row --}}

							<div class="row">

								<div class="col-md-6">

<div class="form-group">
	<label class="">Product Image<span class="text-danger">*</span></label>
	<input type="file" class="dropify" name="product_image" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="3M" />
</div>

								</div>{{-- End col-md-6 --}}

								<div class="col-md-6">

									<div class="row">
										
										<div class="col-md-6">

<div class="form-group">
	<label class="">Product Stock<span class="text-danger">*</span></label>
	<input type="number" name="product_stock" class="form-control" value="{{ old('product_stock') }}" placeholder="Product Stock" required>
</div>

										</div>{{-- End col-md-6 --}}

										<div class="col-md-6">

<div class="form-group">
	<label class="">Product Expiration<span class="text-danger">*</span></label>
	<div class="cal-icon">
		<input class="form-control floating datetimepicker" name="product_expiration" value="{{ old('product_expiration') }}" type="text" placeholder="YYYY-MM-DD" required>
	</div>
</div>
										</div>{{-- End col-md-6 --}}

										<div class="col-md-6">

<div class="form-group">
	<label class="">Product Rack<span class="text-danger">*</span></label>
	<input type="text" name="product_rack" class="form-control" value="{{ old('product_rack') }}" placeholder="Product Rack" required>
</div>
										</div>{{-- End col-md-6 --}}

										<div class="col-md-6">

<div class="form-group">
	<label class="">Product Row<span class="text-danger">*</span></label>
	<input type="text" name="product_row" class="form-control" value="{{ old('product_row') }}" placeholder="Product Row" required>
</div>
										</div>{{-- End col-md-6 --}}

										<div class="col-md-6">

<div class="form-group">
	<label class="">Product Position<span class="text-danger">*</span></label>
	<input type="text" name="product_position" class="form-control" value="{{ old('product_position') }}" placeholder="Product Position" required>
</div>
										</div>{{-- End col-md-6 --}}

									</div>{{-- End Row --}}

								</div>{{-- End col-md-6 --}}

							</div> {{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('product.view') }}" class="btn btn-secondary"> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /Page Wrapper -->

<script>

	$(document).ready(function (){
		
		$('#product_brand').select2();
		$('#product_unit').select2();
		$('#product_category').select2();

		$('#product_purchase_price').number( true, 2);
		$('#product_selling_price').number( true, 2);

	});

	$("#product_purchase_price").change(function(){

		var valorMargin = $("#margin").val();
		
		var porcentaje = Number(($("#product_purchase_price").val()*valorMargin/100))+Number($("#product_purchase_price").val());

		$("#product_selling_price").val(porcentaje);
		$("#product_selling_price").prop("readonly",true);

	})

</script>

@endsection