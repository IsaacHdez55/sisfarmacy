@extends('admin.admin_master')

@section('title','My Profile')

@section('admin')

<div class="page-wrapper" style="min-height: 284px;">
			
	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">My Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">My Profile</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card mb-0">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="profile-view">
							<div class="profile-img-wrap">
								<div class="profile-img">
<a href=""><img alt="{{ $user->name }}" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/user.jpg') }}"></a>
								</div>
							</div>
							<div class="profile-basic">
								<div class="row">
									<div class="col-md-5">
<div class="profile-info-left">
	<h3 class="user-name m-t-0 mb-0">{{ $user->name }}</h3>
	<div class="staff-id">User Type: {{ $user->usertype }}</div>
	<div class="staff-id">User Email: {{ $user->email }}</div>
	<div class="staff-msg"><a class="btn btn-custom" href="{{ route('profile.edit') }}">Edit Profile</a></div>
</div>
									</div>
									<div class="col-md-7">
<ul class="personal-info">
	<li>
		<div class="title">Mobile No:</div>
		<div class="text">{{ $user->mobile }}</div>
	</li>
	<li>
		<div class="title">Address:</div>
		<div class="text">{{ $user->address }}</div>
	</li>
	<li>
		<div class="title">Gender:</div>
		<div class="text">{{ $user->gender }}</div>
	</li>
	
</ul>
									</div>
								</div>
							</div>
							<div class="pro-edit"><a class="edit-icon" href="{{ route('profile.edit') }}"><i class="fa fa-pencil"></i></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Page Content -->


</div>

@endsection