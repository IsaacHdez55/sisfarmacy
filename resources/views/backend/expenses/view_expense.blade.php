@extends('admin.admin_master')

@section('title','Manage Expense List')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Expense List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Expense List</li>
					</ul>
				</div>
				@can('brands.add')
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('expenses.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Expense</a>
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
								<th>Fecha</th>
								<th>Reference Number</th>
								<th>Expense Category</th>
								<th>Payment Status</th>
								<th>Total Amount</th>
								<th>Payment Date</th>
								<th>Payment Note</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $expenses)

								<tr>

									@php

										$created = date_create($expenses->created_at);
										$date = date_format($created, 'Y-m-d');
										
									@endphp

									<td>{{ $date }}</td>
									<td>{{ $expenses->reference_number }}</td>
									<td>{{ $expenses->expense_category->name }}</td>
									<td>

                                        @if ($expenses->status == "pending")

											<a href="{{route('expenses.change_status', $expenses)}}" class="btn btn-warning">Pending</a>
											
										@elseif ($expenses->status == "paid")

											<a class="btn btn-success">Paid</a>
											
										@endif

                                    </td>
									<td>{{ $expenses->total_amount }}</td>
									<td>{{ $expenses->date }}</td>
									<td>{{ $expenses->expense_note }}</td>
									<td>
@can('brands.edit')
										<a href="{{ route('expenses.edit', $expenses->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
@endcan
@can('brands.delete')
										<a href="{{ route('expenses.delete', $expenses->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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