@extends('admin.admin_master')

@section('title','Edit Expense')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Expense</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('expenses.view') }}">Manage Expense List</a></li>
						<li class="breadcrumb-item active">Edit Expense</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('expenses.update', $editData->id) }}" method="post" enctype="multipart/form-data">
							
							@csrf

							<div class="row">

                                <div class="col-md-4">

<div class="form-group">
    <label class="">Expense Category<span class="text-danger">*</span></label>
    <div class="form-focus select-focus">
    <select class="form-control select" name="expenses_category_id" id="expenses_category_id" required>
        <option value="" selected disabled>-- Select Expense Category --</option>

        @foreach ($expenseCategory as $category)
        
            <option value="{{ $category->id }}" {{ ($editData->expenses_category_id == $category->id)? "selected": "" }}>{{ $category->name }}</option>

        @endforeach

    </select>
    </div>
</div>
                                </div>{{-- End col-md-4 --}}

								<div class="col-md-4">

<div class="form-group">
	<label class="">Reference Number<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="reference_number" class="form-control" value="{{ $editData->reference_number }}" placeholder="Reference Number" required>
	</div>
</div>
								</div>{{-- End col-md-4 --}}

								<div class="col-md-4">

<div class="form-group">
    <label class="">Date<span class="text-danger">*</span></label>
    <div class="cal-icon">
        <input class="form-control floating datetimepicker" name="date" value="{{ $editData->date }}" type="text" placeholder="YYYY-MM-DD" required>
    </div>
</div>
								</div>{{-- End col-md-4 --}}

                                <div class="col-md-4">

<div class="form-group">
    <label class="">Total Amount<span class="text-danger">*</span></label>
    <div class="">
        <input type="text" name="total_amount" id="total_amount" class="form-control" value="{{ $editData->total_amount }}" placeholder="Total Amount" required>
    </div>
</div>
                                </div>{{-- End col-md-4 --}}

                                <div class="col-md-4">

<div class="form-group">
    <label class="">Document <span class="text-danger">*</span></label>
    <input class="form-control" type="file" name="attachment">
</div>
                                </div>{{-- End col-md-4 --}}

                                <div class="col-md-4">

<div class="form-group">
    <label>Note <span class="text-danger">*</span></label>
    <textarea class="form-control" name="expense_note" rows="3">{{ $editData->expense_note }}</textarea>
</div>
                                </div>{{-- End col-md-4 --}}

							</div> {{-- End Row --}}

							<div class="text-right">
								<input type="submit" class="btn btn-primary" value="Submit" required>
								<a href="{{ route('expenses.view') }}" class="btn btn-secondary"> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /Page Wrapper -->

<script>

    $(document).ready(function (){
            
        $('#expenses_category_id').select2();

        $('#total_amount').number( true, 2);

    });

</script>

@endsection