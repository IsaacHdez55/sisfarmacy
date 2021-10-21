@php

$user = DB::table('users')->where('id',Auth::user()->id)->first();


@endphp

@extends('admin.admin_master')

@section('title','Add Purchase')

@section('admin')

<!-- Page Wrapper -->

<div class="page-wrapper" style="min-height: 219px;">
			
	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Purchase</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('purchases.view') }}">Manage Purchase List</a></li>
						<li class="breadcrumb-item active">Add Purchase</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
				<form>

				@csrf

				<input type="hidden" value="{{ $user->id }}">

					<div class="row">

						<div class="col-sm-6 col-md-3">
<div class="form-group">
	<label class="">Provider<span class="text-danger">*</span></label>
	<div class="form-focus select-focus">
	<select class="form-control select" name="purchases_proveedor_id" id="purchases_proveedor_id" required>
		<option value="" selected disabled>-- Select Provider --</option>

{{-- 		@foreach ($brands as $brand)
		
			<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

		@endforeach --}}

	</select>
	</div>
</div>
						</div> {{-- ./col-sm-6 --}}

						<div class="col-sm-6 col-md-3">

<div class="form-group">
	<label class="">Reference Number<span class="text-danger">*</span></label>
	<input class="form-control" type="text" placeholder="Reference Number" name="purchases_reference_number" value="{{ old('purchases_reference_number') }}">
</div>
							
						</div>{{-- ./col-sm-6 --}}

						<div class="col-sm-6 col-md-3">

<div class="form-group">
	<label class="">Purchase Date<span class="text-danger">*</span></label>
	<div class="cal-icon">
		<input class="form-control floating datetimepicker" name="purchases_date_purchase" value="{{ old('purchases_date_purchase') }}" type="text" placeholder="YYYY-MM-DD" required>
	</div>
</div>
							
						</div>{{-- ./col-sm-6 --}}
						
						<div class="col-sm-6 col-md-3">
<div class="form-group">
	<label class="">Status Purchase <span class="text-danger">*</span></label>
	<select class="form-control" name="purchases_status" required>
		<option value="" selected disabled>-- Select Status Purchase --</option>
		<option value="requested">Requested</option>
		<option value="pending">Pending</option>
		<option value="received">Received</option>
	</select>
</div>
						</div>{{-- ./col-sm-6 --}}

						<div class="col-sm-6">
<div class="form-group">
	<label class="">Document <span class="text-danger">*</span></label>
	<input class="form-control" type="file" placeholder="Reference Number" name="purchases_document">
</div>
						</div>{{-- ./col-sm-6 --}}

					</div>{{-- ./row --}}

					<div class="row">

						<div class="col-md-12 col-sm-12">
							<div class="table-responsive">
								<table class="table table-hover table-white">
									<thead>
										<tr>
											<th style="width: 20px">#</th>
											<th >Product</th>
											<th style="width:100px;">Unit Cost</th>
											<th style="width:80px;">Quantity</th>
											<th>Amount</th>
											<th> </th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td>1</td>
										<td>
<div class="form-focus select-focus">
	<select class="form-control select" name="product_id" id="product_id[]" required style="min-width:100px">
		<option value="" selected disabled>-- Select Product --</option>

{{-- 		@foreach ($brands as $brand)
		
			<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

		@endforeach --}}

	</select>
</div>
										</td>
										<td>
											<input class="form-control" type="text" style="min-width:100px">
										</td>
										<td>
											<input class="form-control" style="width:80px" type="number">
										</td>
										<td>
											<input class="form-control" readonly="" style="width:120px" type="text">
										</td>
										<td><a href="javascript:void(0)" class="text-success font-18" title="Add"><i class="fa fa-plus"></i></a></td>
									</tr>
									<tr>
										<td>2</td>
										<td>
<div class="form-focus select-focus">
	<select class="form-control select" name="product_id" id="product_id[]" required>
		<option value="" selected disabled>-- Select Product --</option>

{{-- 		@foreach ($brands as $brand)
		
			<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

		@endforeach --}}

	</select>
</div>
										</td>
										<td>
											<input class="form-control" name="price[]" type="text" style="min-width:150px">
										</td>
										<td>
											<input class="form-control" name="quantity[]" style="width:100px" type="text">
										</td>
										<td>
											<input class="form-control" readonly="" style="width:120px" type="text">
										</td>
										<td><a href="javascript:void(0)" class="text-danger font-18" title="Remove"><i class="fa fa-trash-o"></i></a></td>
									</tr>
									</tbody>
								</table>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-white">
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td class="text-right">Total</td>
											<td style="text-align: right; padding-right: 30px;width: 230px">0</td>
										</tr>
										<tr>
											<td colspan="5" class="text-right">Tax</td>
											<td style="text-align: right; padding-right: 30px;width: 230px">
												<input class="form-control text-right" value="0" readonly="" type="text">
											</td>
										</tr>
										<tr>
											<td colspan="5" class="text-right">
												Discount %
											</td>
											<td style="text-align: right; padding-right: 30px;width: 230px">
												<input class="form-control text-right" type="text">
											</td>
										</tr>
										<tr>
											<td colspan="5" style="text-align: right; font-weight: bold">
												Grand Total
											</td>
											<td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
												$ 0.00
											</td>
										</tr>
									</tbody>
								</table>                               
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Other Information</label>
										<textarea class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="text-right">
						<input type="submit" class="btn btn-primary" value="Submit" required>
						<a href="{{ route('product.view') }}" class="btn btn-secondary"> Cancel</a>
					</div>
				</form>
			</div>     {{-- ada --}}
			</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
	
</div>

<!-- /Page Wrapper -->

@section('js')
<script>
	$(document).ready(function (){
		
		$('#purchases_proveedor_id').select2();
		// $('#product_unit').select2();
		// $('#product_category').select2();

		// $('#product_purchase_price').number( true, 2);
		// $('#product_selling_price').number( true, 2);

	});
</script>
@endsection

@endsection