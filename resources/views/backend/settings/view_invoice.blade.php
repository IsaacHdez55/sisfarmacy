@extends('admin.admin_master')

@section('title','Invoice')

@section('admin')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Invoice Settings</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<form action="{{ route('invoice.update',$allData[0]['id']) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Invoice prefix</label>
						<div class="col-lg-9">
							<input type="text" name="prefix" value="{{ $allData[0]['prefix'] }}" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Invoice Logo</label>
						<div class="col-lg-7">
							<input type="file" name="invoice_logo" id="invoice_logo" class="form-control">
							<span class="form-text text-muted">Recommended image size is 200px x 40px</span>
						</div>
						<div class="col-lg-2">
							<div class="img-thumbnail float-right">
								<img class="img-fluid" width="140" height="40" alt="" src="{{ (!empty($allData[0]['invoice_logo']))? url('upload/settings_image/'.$allData[0]['invoice_logo']):url('upload/product.jpg') }}">
							</div>
						</div>
					</div>
					<div class="submit-section">
						<input type="submit" class="btn btn-primary submit-btn" value="Save">
					</div>
				</form>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
</div>
<!-- /Page Wrapper -->

@endsection

@section('js')

<script>
	
$("#invoice_logo").change(function(){

	var imagen = this.files[0];
	
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$("#invoice_logo").val("");

		Swal.fire({
		  icon: 'error',
		  title: 'Error uploading image',
		  text: 'The image must be in JPG or PNG format!',
		  confirmButtonText: "Close!",
		})

	}else if(imagen["size"] > 2000000){

		$("#invoice_logo").val("");

		Swal.fire({
		  icon: 'error',
		  title: 'Error uploading image',
		  text: 'The image must not exceed 2MB!',
		  confirmButtonText: "Close!",
		})

	}else{

		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  		})

	}



})

</script>

@endsection