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
				@can('purchases.add')
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('purchase.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Purchase</a>
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
								<th>Date</th>
								<th>Reference Number</th>
								<th>Provider</th>
								<th>Status</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $purchase)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $purchase->purchases_date_purchase }}</td>
									<td>{{ $purchase->purchases_reference_number }}</td>
									<td>{{ $purchase->suppliers->supplier_name}}</td>
									<td>
																
										@if ($purchase->purchases_status == "pending")

											<a href="{{route('purchase.change_status', $purchase)}}" class="btn btn-warning">Pending</a>
											
										@elseif ($purchase->purchases_status == "requested")

											<a href="{{route('purchase.change_status', $purchase)}}" class="btn btn-info">Requested</a>

										@elseif ($purchase->purchases_status == "received")

											<a class="btn btn-success">Received</a>
											
										@endif

									</td>
									<td>{{ number_format($purchase->purchases_grand_total) }}</td>
									<td>
										
										@can('purchases.details')
										<a href="{{ route('purchase.details', $purchase->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
										@endcan
										@can('purchases.pdf')
										<a href="{{ route('purchase.pdf', $purchase->id) }}" class="btn btn-danger"><i class="fa fa-file"></i></a>
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

