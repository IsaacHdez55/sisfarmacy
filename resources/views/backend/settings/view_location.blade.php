@extends('admin.admin_master')

@section('title','Location')

@section('admin')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- JsTimeZoneDetect JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.7/jstz.min.js" integrity="sha512-pZ0i46J1zsMwPd2NQZ4IaL427jXE2RVHMk3uv/wPTNlBVp9AbB1L65/4YdrXRPLEmyZCkY9qYOOsQp44V4orHg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
							<h3 class="page-title">Basic Settings</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<form method="POST" action="{{ route('location.update', $allData[0]['id']) }}">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Timezone</label>
								<input type="text" class="form-control" readonly value="{{ $allData[0]['timezone'] }}" name="timezone" id="timezone">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Default Language</label>
								<select name="language" class="form-control select" required>
									<option value="English" {{ ($allData[0]['language'] == "English" ? "selected" : "") }}>English</option>
									<option value="Spanish" {{ ($allData[0]['language'] == "Spanish" ? "selected" : "") }}>Spanish</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Currency Symbol</label>
								<input name="currency_symbol" class="form-control" required value="{{ $allData[0]['currency_symbol'] }}" type="text">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="submit-section">
								<input type="submit" class="btn btn-primary submit-btn" value="Save">
							</div>
						</div>
					</div>
                </form>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
</div>
<!-- /Page Wrapper -->

<script>
	
	var tz = jstz.determine().name();
	$('#timezone').val(tz);
	
</script>

@endsection