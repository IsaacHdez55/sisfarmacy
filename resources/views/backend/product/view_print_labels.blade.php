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

							<div class="col-md-8">

								<form action="">

<div class="form-group">
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"><i class="fa fa-search"></i></span>
		</div>
		<input type="text" id="search" class="form-control " placeholder="Search..." required>
	</div>
</div>

								</form>

							</div> {{-- .col-md-8 --}}

							<div class="col-md-8">

								<div class="table-responsive">

									<table id="PrintLabels" class="table table-striped custom-table  mb-0">

										<thead>
											<tr>
												<th>Product</th>
												<th>N° of Labels</th>
											</tr>
										</thead>

										<tbody>
											
										</tbody>

									</table>

								</div>

							</div> {{-- .col-md-8 --}}

						</div> {{-- .row --}}

					</div>

					<div class="card-footer">
						<a href="#" id="print" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
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

	$(document).ready(function() {
  	
	    src = "{{ route('search') }}";

	     $("#search").autocomplete({

	        source: function(request, response) {

	            $.ajax({
	                url: src,
	                dataType: "json",
	                data: {
	                    term : request.term
	                },
	                success: function(data) {

	                    response(data);
	              
	                }
	            });
	        },

	        minLength: 3,

	        select: function( event, ui ) {

	        	var name = ui.item.label;
	        	
	        	$("#PrintLabels>tbody").append("<tr><td id='cantity'  style='width:70%'>" + name +"</td><td><input id='' class='form-control' name='cantity[]' type='number' value='1'></td></tr>");

	        	$(this).val(''); return false;

	        }


	       
	    });

	});

	$('#print').on('click', function() {

		var print = $('#cantity').val();
		console.log("print", print);

	});

</script>

@endsection