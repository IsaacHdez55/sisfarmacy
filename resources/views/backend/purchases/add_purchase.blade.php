@php

$user = DB::table('users')->where('id',Auth::user()->id)->first();
$invoice = DB::table('invoices')->first();

@endphp

@extends('admin.admin_master')

@section('title','Add Purchase')

@section('css')

{{-- Jquery UI --}}
<link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.min.css') }}">

@endsection

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
				<form method="POST" action="{{ route('purchase.store') }}" enctype="multipart/form-data">

				@csrf

				<input type="hidden" name="purchases_user_id" value="{{ $user->id }}">

					<div class="row">

						<div class="col-sm-6 col-md-3">
<div class="form-group">
	<label class="">Supplier<span class="text-danger">*</span></label>
	<div class="form-focus select-focus">
	<select class="form-control select" name="purchases_supplier_id" id="purchases_supplier_id" required>
		<option value="" selected disabled>-- Select Supplier --</option>

		@foreach ($suppliers as $supplier)
		
			<option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>

		@endforeach

	</select>
	</div>
</div>
						</div> {{-- ./col-sm-6 --}}

						<div class="col-sm-6 col-md-3">

<div class="form-group">
	<label class="">Reference Number<span class="text-danger">*</span></label>
	<input class="form-control @error('purchases_reference_number') is-invalid @enderror" type="text" placeholder="Reference Number" name="purchases_reference_number" value="{{ old('purchases_reference_number') }}" required>
	@error('purchases_reference_number')

		<span class="invalid-feedback">
			<strong>{{ $message }}</strong>
		</span>

	@enderror
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
	<input class="form-control" type="file" name="purchases_document">
</div>
						</div>{{-- ./col-sm-6 --}}

					</div>{{-- ./row --}}

					<div class="row">

						<div class="col-md-6">

<div class="form-group">
	<label class="">Products<span class="text-danger">*</span></label>
	<div class="form-focus select-focus">
	<select class="form-control select" name="product_id" id="product_id">
		<option value="" selected disabled>-- Select Products --</option>

		@foreach ($products as $product)
		
			<option value="{{ $product->id }}">{{ $product->product_name }}</option>

		@endforeach

	</select>
	</div>
</div>							
						</div>{{-- ./col-md-6 --}}

						<div class="col-md-3">

<div class="form-group">
	<label class="">Purchase Unit Cost<span class="text-danger">*</span></label>
	<input type="number" class="form-control" name="price" id="price"  placeholder="Unit Cost">
</div>
							
						</div>{{-- ./col-md-3 --}}

						<div class="col-md-3">

<div class="form-group">
	<label class="">Purchase Quantity<span class="text-danger">*</span></label>
	<input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
</div>
							
						</div>{{-- ./col-md-3 --}}

						<div class="col-md-3">

<div class="form-group">
	<button type="button" class="btn btn-primary" id="addProduct">Add</button>
</div>
							
						</div>{{-- ./col-md-3 --}}


					</div>{{-- ./row --}}

					<div class="row">

						<div class="col-md-12 col-sm-12">
							<div class="table-responsive">
								<table id="details" class="table table-hover table-white">
									<thead>
										<tr>
											<th >Product</th>
											<th style="width:100px;">Unit Cost</th>
											<th style="width:80px;">Quantity</th>
											<th>Amount</th>
											<th> </th>
										</tr>
									</thead>
									<tbody>
									
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
											<td style="text-align: right; padding-right: 30px;width: 230px" id="total">$ 0.00</td>
											<input type="hidden" name="subtotal" id="subtotal">
										</tr>
										<tr>
											<td colspan="5" class="text-right">Tax</td>
											<td style="text-align: right; padding-right: 30px;width: 230px">
												<input class="form-control text-right" name="purchases_tax" id="purchases_tax" value="{{ $invoice->tax }}" readonly type="number">
											</td>
										</tr>
										<tr>
											<td colspan="5" class="text-right">
												Discount %
											</td>
											<td style="text-align: right; padding-right: 30px;width: 230px">
												<input class="form-control text-right" name="discount" id="discount" type="number">
											</td>
										</tr>
										<tr>
											<td colspan="5" style="text-align: right; font-weight: bold">
												Grand Total
											</td>
											<td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px" id="grand_total_html">
												$ 0.00
											</td>
											<input type="hidden" name="grandtotal" id="grandtotal">
										</tr>
									</tbody>
								</table>                               
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Other Information</label>
										<textarea class="form-control" name="purchases_additional_notes" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="text-right">
						<input type="submit" class="btn btn-primary" id="send" value="Submit" required>
						<a href="{{ route('purchases.view') }}" class="btn btn-secondary"> Cancel</a>
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

@endsection

@section('js')

<!-- jQuery -->
<script src="{{ asset('backend/js/jquery-ui.min.js') }}"></script>

<script>

	const currency = function(number){
    	return new Intl.NumberFormat('en-US', {style: 'decimal', minimumFractionDigits: 2}).format(number);
	};

	$(document).ready(function (){
		
		$('#purchases_supplier_id').select2();
		$('#product_id').select2();

		$('#addProduct').click(function(){

			add();

		});

	});

	var cont = 0;
	total = 0;
	subtotal = [];

	$('#send').hide();

	function add() {

		product_id = $('#product_id').val();
		producto = $('#product_id option:selected').text();
		quantity = $('#quantity').val();
		price = $('#price').val();
		impuesto = $('#purchases_tax').val();

		if (product_id != "" && quantity != "" && quantity > 0 && price != "") {

			subtotal[cont] = quantity * price;			
			total = total + subtotal[cont];
			var fila = '<tr class="selected" id="fila'+cont+'"><td><div class="form-group"><input name="product_id[]" readonly="" style="min-width:100px" type="hidden" value="'+product_id+'"><input class="form-control" disabled="" style="min-width:100px" type="text" value="'+producto+'"/></input></div></td><td><input name="price[]" id="price[]" readonly=""  type="hidden" value="' + price + '"><input type="number" style="min-width:100px" class="form-control" disabled id="price[]" value="' + price + '"></input></input></td><td><input name="quantity[]" readonly="" type="hidden" value="' + quantity +'"><input type="number" style="width:80px"  class="form-control" disabled value="' + quantity + '"></input></input></td><td><input class="form-control" id="amount" readonly="" style="width:150px" type="text" value="' + subtotal[cont] + '"></input></td><td><a class="text-danger font-18" onclick="eliminar('+cont+');" title="Remove"><i class="fa fa-trash-o"></i></a></td></tr>';
			cont++;
            limpiar();
            totales();
            evaluar();
            $('#details').append(fila);

		}else{

			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Fill in all the fields of the purchase details!'
			})

		}

	}

	function limpiar() {
        $("#quantity").val("");
        $("#price").val("");
    }

    function totales() {
        $("#total").html("$ " + currency(total));
        total_impuesto = total * impuesto / 100;       
        total_pagar = total + total_impuesto;
        $("#grand_total_html").html("$ " + currency(total_pagar));
        $("#subtotal").val(total.toFixed(2));  
        $("#grandtotal").val(total_pagar.toFixed(2));
    }

    $('#discount').on("change", function(){
    	
    	var discount = $('#discount').val();
    	porcentaje = $('#grandtotal').val()*discount/100;
    	discountTotal = $('#grandtotal').val() - porcentaje;
    	$("#grand_total_html").html("$ " + currency(discountTotal));
        $("#subtotal").val(total.toFixed(2));
        $("#grandtotal").val(discountTotal.toFixed(2));

    })

    function evaluar() {
        if (total > 0) {
            $("#send").show();
        } else {
            $("#send").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("$ " + currency(total));
        $("#grand_total_html").html("$ " + currency(total_pagar_html));
        $("#grand_total").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
        var discount = $('#discount').val("");
    }

	
</script>

@endsection