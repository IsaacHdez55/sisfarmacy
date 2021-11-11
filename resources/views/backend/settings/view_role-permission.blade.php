@extends('admin.admin_master')

@section('title','Roles & Permissions')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="page-title">Roles</h3>
				</div>
				<div class="col-sm-6">
					<a href="#" data-toggle="modal" data-target="#add_role" class="btn add-btn"><i class="fa fa-plus"></i> Add Role</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Content Starts -->

		<!--====================================
						Roles
		=====================================-->
			
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table  mb-0 datatable" id="ROLE">
						<thead>
							<tr>
								<th style="width:10px">#</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($roles as $key => $role)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $role->name }}</td>
									<td>
										
										<button data-toggle="modal" data-target="#updateRole{{ $role->id }}" class="btn btn-info btnEditRole"><i class="fa fa-edit"></i></button>

										<a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

									</td>
								</tr>

								<!-- Edit Role Modal -->
								<div id="updateRole{{ $role->id }}" class="modal custom-modal fade" role="dialog">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable 	modal-xl" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Edit Role</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="POST" action="{{ route('role.update', $role->id) }}">
													@csrf
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Role Name <span class="text-danger">*</span></label>
																<input class="form-control" name="name" value="{{ $role->name }}" type="text">
															</div>
															<label for="">Permission List</label>
														</div><!-- ./end col-md-6 -->

<div class="col-md-12">								
	<div class="row">
		@foreach ($permissions as $permission)

			<div class="col-md-2">

				<label>

					<input type="checkbox" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} name="permissions[]" value="{{ $permission->id }}" >
					{{ $permission->description }}									
					
				</label>
				
			</div><!-- ./end col-md-2 -->
			
		@endforeach
	</div><!-- ./end row -->
</div><!-- ./end col-md-12 -->

													</div><!-- ./end row -->
													
													<div class="submit-section">
														<input type="submit" class="btn btn-primary submit-btn" value="Update">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- /Edit Role Modal -->

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- /Content End -->

		<hr>

		<!--====================================
						Permissions
		=====================================-->

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="page-title">Permissions</h3>
				</div>
				<div class="col-sm-6">
					<a href="#" data-toggle="modal" data-target="#add_permission" class="btn add-btn"><i class="fa fa-plus"></i> Add Permissions</a>
				</div>
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
								<th style="width:10px">#</th>
								<th>Name</th>
								<th>Description</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($permissions as $key => $permission)

								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $permission->name }}</td>
									<td>{{ $permission->description }}</td>
									<td>
										
										<button data-toggle="modal" data-target="#updatePermission{{ $permission->id }}" class="btn btn-info"><i class="fa fa-edit"></i></button>

										<a href="{{ route('permission.delete', $permission->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

									</td>
								</tr>

								<!-- Edit Role Modal -->
								<div id="updatePermission{{ $permission->id }}" class="modal custom-modal fade" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content modal-md">
											<div class="modal-header">
												<h5 class="modal-title">Edit Role</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="POST" action="{{ route('permission.update', $permission->id) }}">
													@csrf
													<div class="form-group">
														<label>Role Name <span class="text-danger">*</span></label>
														<input class="form-control" name="name" value="{{ $permission->name }}" type="text">
													</div>
													<div class="form-group">
														<label>Role Desciption <span class="text-danger">*</span></label>
														<input class="form-control" name="description" value="{{ $permission->description }}" type="text">
													</div>
													<div class="submit-section">
														<input type="submit" class="btn btn-primary submit-btn" value="Update">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- /Edit Role Modal -->


							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- /Content End -->
		
    </div>
	<!-- /Page Content -->
	
	<!-- Add Role Modal -->
	<div id="add_role" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable 	modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{ route('role.store') }}">
						@csrf
						<div class="row"> 
							<div class="col-md-6">
								<div class="form-group">
									<label>Role Name <span class="text-danger">*</span></label>
									<input class="form-control @error('name') is-invalid @enderror" name="name" type="text">
									@error('name')

										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>

									@enderror
								</div>				
								<label for="">Permission List</label>		
							</div><!-- ./end col-md-6 -->

							<div class="col-md-12">								
								<div class="row">
									@foreach ($permissions as $permission)

										<div class="col-md-2">

											<label>

												<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" >
												{{ $permission->description }}									
												
											</label>
											
										</div><!-- ./end col-md-2 -->
										
									@endforeach
								</div><!-- ./end row -->
							</div><!-- ./end col-md-12 -->

						</div><!-- ./end row -->
						
						<div class="submit-section">
							<input type="submit" class="btn btn-primary submit-btn" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Role Modal -->

	<!-- Add Permission Modal -->
	<div id="add_permission" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Permission</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{ route('permission.store') }}">
						@csrf
						<div class="form-group">
							<label>Permission Name <span class="text-danger">*</span></label>
							<input class="form-control" name="name" type="text">
						</div>
						<div class="form-group">
							<label>Permission Description <span class="text-danger">*</span></label>
							<input class="form-control" name="description" type="text">
						</div>
						<div class="submit-section">
							<input type="submit" class="btn btn-primary submit-btn" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Permission Modal -->
	
 </div>
<!-- /Page Wrapper -->

@endsection

@section('js')

<script>

	
	


</script>

@endsection