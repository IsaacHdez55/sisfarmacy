@extends('admin.admin_master')

@section('title','Company')

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
							<h3 class="page-title">Company Settings</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<form method="POST" action="{{ route('company.update',  $allData[0]['id']) }}">
					@csrf

					<div class="row">
<div class="col-sm-6">
	<div class="form-group">
		<label>Company Name <span class="text-danger">*</span></label>
		<input name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $allData[0]['name'] }}" required>
		@error('name')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>{{-- End col-sm-6 --}}

<div class="col-sm-6">
	<div class="form-group">
		<label>Contact Person</label>
		<input name="contact_person" class="form-control @error('contact_person') is-invalid @enderror" value="{{ $allData[0]['contact_person'] }}" type="text">
		@error('contact_person')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div> {{-- End col-sm-6 --}}

					</div>{{-- End Row --}}

					<div class="row">
<div class="col-sm-12">
	<div class="form-group">
		<label>Address</label>
		<input name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $allData[0]['address'] }}" type="text">
		@error('address')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div> {{-- End col-sm-12 --}}

<div class="col-sm-6 col-md-6 col-lg-3">
	<div class="form-group">
		<label>Country</label>
		<input name="country" class="form-control" value="{{ $allData[0]['country'] }}" type="text">
	</div>
</div> {{-- End col-sm-6 --}}

<div class="col-sm-6 col-md-6 col-lg-3">
	<div class="form-group">
		<label>City</label>
		<input name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $allData[0]['city'] }}" type="text">
		@error('city')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div> {{-- End col-sm-6 --}}

<div class="col-sm-6 col-md-6 col-lg-3">
	<div class="form-group">
		<label>State/Province</label>
		<input name="state" class="form-control" value="{{ $allData[0]['state'] }}" type="text">
	</div>
</div>{{-- End col-sm-6 --}}

<div class="col-sm-6 col-md-6 col-lg-3">
	<div class="form-group">
		<label>Postal Code</label>
		<input name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ $allData[0]['postal_code'] }}" type="text">
		@error('postal_code')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div> {{-- End col-sm-6 --}}

					</div>{{-- End Row --}}

					<div class="row">
<div class="col-sm-6">
	<div class="form-group">
		<label>Email</label>
		<input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $allData[0]['email'] }}" type="email">
		@error('email')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div> {{-- End col-sm-6 --}}

<div class="col-sm-6">
	<div class="form-group">
		<label>Phone Number</label>
		<input name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $allData[0]['phone'] }}" type="text">
		@error('phone')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div> {{-- End col-sm-6 --}}

					</div>{{-- End Row --}}

					<div class="row">
<div class="col-sm-6">
	<div class="form-group">
		<label>Mobile Number</label>
		<input name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ $allData[0]['mobile'] }}" type="text">
		@error('mobile')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>{{-- End col-sm-6 --}}

<div class="col-sm-6">
	<div class="form-group">
		<label>Fax</label>
		<input name="fax" class="form-control @error('fax') is-invalid @enderror" value="{{ $allData[0]['fax'] }}" type="text">
		@error('fax')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>{{-- End col-sm-6 --}}

					</div>{{-- End Row --}}

					<div class="row">
<div class="col-sm-12">
	<div class="form-group">
		<label>Website Url</label>
		<input name="website" class="form-control @error('website') is-invalid @enderror" value="{{ $allData[0]['website'] }}" type="text">
		@error('website')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror
	</div>
</div>{{-- End col-sm-6 --}}
					</div>{{-- End Row --}}

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