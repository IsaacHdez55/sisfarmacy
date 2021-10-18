@extends('admin.admin_master')

@section('title','Manage Print Labels')

@section('css')

{{-- Jquery UI --}}
<link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.min.css') }}">

@endsection

@section('admin')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Manage Print Labels</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Manage Print Labels</li>
					</ul>
				</div>
			</div>

		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->
			
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">

						<p class="text-center">Add products to generate labels</p>

						<div class="row justify-content-center">					

							<div class="col-md-6">

								<form action="">

<div class="form-group">
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"><i class="fa fa-search"></i></span>
		</div>
		<input type="text" id="search" class="form-control" placeholder="Enter the names of the products to print the labels" required>
	</div>
</div>

								</form>

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

@section('js')

<!-- jQuery -->
<script src="{{ asset('backend/js/jquery-ui.min.js') }}"></script>

<script>

	

	$('#search').autocomplete({

		source:function(request, response){

			$.ajax({

				url: '{{ route('printLabels.search') }}',
				dataType: 'json',
				data: {
					ser: request.ser
				},
				success: function(data){

					response(data)

				}

			});

		}

	});

</script>

@endsection