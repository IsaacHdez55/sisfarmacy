@extends('admin.admin_master')

@section('title','Add Expense')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Expense</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('expenses.view') }}">Manage Expense List</a></li>
						<li class="breadcrumb-item active">Add Expense</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('expenses.store') }}" method="post" enctype="multipart/form-data">
							
							@csrf

							<div class="row">

                                <div class="col-md-4">

<div class="form-group">
    <label class="">Expense Category<span class="text-danger">*</span></label>
    <div class="form-focus select-focus">
    <select class="form-control select" name="expenses_category_id" id="expenses_category_id" required>
        <option value="" selected disabled>-- Select Expense Category --</option>

        @foreach ($expenseCategory as $category)
        
            <option value="{{ $category->id }}">{{ $category->name }}</option>

        @endforeach

    </select>
    </div>
</div>
                                </div>{{-- End col-md-4 --}}

								<div class="col-md-4">

<div class="form-group">
	<label class="">Reference Number<span class="text-danger">*</span></label>
	<div class="">
		<input type="text" name="reference_number" class="form-control @error('reference_number') is-invalid @enderror" value="{{ old('reference_number') }}" placeholder="Reference Number" required>
		@error('reference_number')

			<span class="invalid-feedback">
				<strong>{{ $message }}</strong>
			</span>

		@enderror

	</div>
</div>
								</div>{{-- End col-md-4 --}}

								<div class="col-md-4">

<div class="form-group">
    <label class="">Date<span class="text-danger">*</span></label>
    <div class="cal-icon">
        <input class="form-control floating datetimepicker" name="date" value="{{ old('date') }}" type="text" placeholder="YYYY-MM-DD" required>
    </div>
</div>
								</div>{{-- End col-md-4 --}}

                                <div class="col-md-4">

<div class="form-group">
    <label class="">Total Amount<span class="text-danger">*</span></label>
    <div class="">
        <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ old('total_amount') }}" placeholder="Total Amount" required>
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
    <textarea class="form-control" value="{{ old('expense_note') }}" name="expense_note" rows="3"></textarea>
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