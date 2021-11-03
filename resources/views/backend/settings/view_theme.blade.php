@extends('admin.admin_master')

@section('title','Theme')

@section('admin')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Theme Settings</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
			
				<form action="{{ route('theme.update',$allData[0]['id']) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Website Name</label>
						<div class="col-lg-9">
							<input name="website_name" class="form-control" value="{{ $allData[0]['website_name'] }}" type="text" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Light Logo</label>
						<div class="col-lg-7">
							<input type="file" name="light_logo" id="light_logo" class="form-control">
							<span class="form-text text-muted">Recommended image size is 40px x 40px</span>
						</div>
						<div class="col-lg-2">
							<div class="img-thumbnail float-right">
								<img class="img-fluid" width="40" height="40" alt="{{ $allData[0]['website_name'] }}" src="{{ (!empty($allData[0]['light_logo']))? url('upload/settings_image/'.$allData[0]['light_logo']):url('upload/product.jpg') }}">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Favicon</label>
						<div class="col-lg-7">
							<input type="file" name="favicon" id="favicon" class="form-control">
							<span class="form-text text-muted">Recommended image size is 16px x 16px</span>
						</div>
						<div class="col-lg-2">
							<div class="settings-image img-thumbnail float-right">
								<img class="img-fluid" width="16" height="16" alt="{{ $allData[0]['website_name'] }}" src="{{ (!empty($allData[0]['favicon']))? url('upload/settings_image/'.$allData[0]['favicon']):url('upload/product.jpg') }}">
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
	
$("#light_logo").change(function(){

	var imagen = this.files[0];
	
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$("#light_logo").val("");

		Swal.fire({
		  icon: 'error',
		  title: 'Error uploading image',
		  text: 'The image must be in JPG or PNG format!',
		  confirmButtonText: "Close!",
		})

	}else if(imagen["size"] > 2000000){

		$("#light_logo").val("");

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

$("#favicon").change(function(){

	var imagen = this.files[0];
	
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$("#favicon").val("");

		Swal.fire({
		  icon: 'error',
		  title: 'Error uploading image',
		  text: 'The image must be in JPG or PNG format!',
		  confirmButtonText: "Close!",
		})

	}else if(imagen["size"] > 2000000){

		$("#favicon").val("");

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