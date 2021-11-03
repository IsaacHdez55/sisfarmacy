@extends('admin.admin_master')

@section('title','Details Purchase')

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
					<h3 class="page-title">Details Purchase</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('purchases.view') }}">Manage Purchase List</a></li>
						<li class="breadcrumb-item active">Details Purchase</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('purchase.pdf', $detailsData['0']['purchases']['id']) }}" class="btn add-btn"><i class="fa fa-file"></i> PDF</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Content Starts -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6 m-b-20">
								{{-- DATOS DE LA EMPRESA --}}
								<img src="{{ url('upload/settings_image/'.$invoice->invoice_logo) }}" class="inv-logo" alt="">
	 							<ul class="list-unstyled">
									<li>Dreamguy's Technologies</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
									<li>GST No:</li>
								</ul>
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Invoice {{ $detailsData['0']['purchases']['purchases_reference_number']  }}</h3>
									<ul class="list-unstyled">
										<li>Date: <span>{{ $detailsData['0']['purchases']['purchases_date_purchase']  }}</span></li>
										<li>Status: <span>{{ $detailsData['0']['purchases']['purchases_status']  }}</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Product</th>
										<th>UNIT COST</th>
										<th>QUANTITY</th>
										<th class="text-right">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($detailsData as $key => $detail)

										<tr>
											<td>{{ $key + 1 }}</td>
											<td>{{ $detail['product']['product_name'] }}</td>
											<td>$ {{ number_format($detail->price) }}</td>
											<td>{{ $detail->quantity }}</td>
											<td class="text-right">$ {{ number_format($detail->price*$detail->quantity) }}</td>
										</tr>

									@endforeach
								</tbody>
							</table>
						</div>
						<div>
							<div class="row invoice-payment">
								<div class="col-sm-7">
								</div>
								<div class="col-sm-5">
									<div class="m-b-20">
										<div class="table-responsive no-border">
											<table class="table mb-0">
												<tbody>
													<tr>
														<th>Total:</th>
														@php

														$tax = $detailsData['0']['purchases']['purchases_total'] * $detailsData['0']['purchases']['purchases_tax']/100;

														$total = $detailsData['0']['purchases']['purchases_total'] + $tax;

														$discount = $total * $detailsData['0']['purchases']['purchases_discount']/100;

														@endphp
														<td class="text-right">$ {{ number_format($detailsData['0']['purchases']['purchases_total']) }}</td>
													</tr>
													<tr>
														<th>Tax: <span class="text-regular">({{ $detailsData['0']['purchases']['purchases_tax'] }}%)</span></th>
														<td class="text-right">$ {{ number_format($tax) }}</td>
													</tr>
													<tr>
														<th>Discount: <span class="text-regular">({{ $detailsData['0']['purchases']['purchases_discount'] }}%)</span></th>
														<td class="text-right">$ {{ number_format($discount) }}</td>
													</tr>
													<tr>
														<th>Grand Total:</th>
														<td class="text-right text-primary"><h5>$ {{ number_format($detailsData['0']['purchases']['purchases_grand_total']) }}</h5></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="invoice-info">
								<h5>Additional Notes</h5>
								<p class="text-muted">{{ $detailsData['0']['purchases']['purchases_additional_notes'] }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- /Content End -->
		
    </div>
	<!-- /Page Content -->
	
</div>
<!-- /Page Wrapper -->

@endsection