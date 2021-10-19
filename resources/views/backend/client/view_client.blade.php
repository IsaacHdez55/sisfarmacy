@extends('admin.admin_master')

@section('title','Manage Client List')

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Client List</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Client List</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="{{ route('clients.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Client</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->
			
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable" width="100%">
						<thead>
							<tr>
								<th style="width:10px">#</th>
								<th>ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Total Purchases</th>
								<th>Last Purchase</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($allData as $key => $client)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $client->client_identification }}</td>
									<td>{{ $client->client_name }}</td>
									<td>{{ $client->client_phone }}</td>
									<td>{{ $client->client_email }}</td>
									<td >{{ $client->client_address }}</td>
									<td>{{ $client->client_total_purchases }}</td>
									<td>{{ $client->client_last_pruchase }}</td>
									<td>
										
										<a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

										<a href="{{ route('clients.delete', $client->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

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