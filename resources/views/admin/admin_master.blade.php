<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="SISFARMACY">
		{{-- <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects"> --}}
        <meta name="author" content="SISFARMACY - Isaac Hernandez">
        <meta name="robots" content="noindex, nofollow">
        <title>SISFARMACY | @yield('title')</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/line-awesome.min.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

        <!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">

		<!-- Toastr -->  
		<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css') }}">

		<!-- Dropify -->
  		<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css') }}" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-datetimepicker.min.css') }}">

        @yield('css')

    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

        	<!-- Header -->
  
  			@include('admin.body.header')

  			<!-- Sidebar -->
  
  			@include('admin.body.sidebar')

  			<!-- Content Wrapper -->
  
  			@yield('admin')
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('backend/js/app.js') }}"></script>

		<!-- Datatable JS -->
		<script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('backend/js/dataTables.bootstrap4.min.js') }}"></script>

		<!-- Toastr -->
		<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
		<script>
		 @if(Session::has('message'))
		 var type = "{{ Session::get('alert-type','info') }}"
		 switch(type){
		    case 'info':
		    toastr.info(" {{ Session::get('message') }} ");
		    break;

		    case 'success':
		    toastr.success(" {{ Session::get('message') }} ");
		    break;

		    case 'warning':
		    toastr.warning(" {{ Session::get('message') }} ");
		    break;

		    case 'error':
		    toastr.error(" {{ Session::get('message') }} ");
		    break; 
		 }
		 @endif 
		</script>

		<!-- Sweet Alert -->
		<script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

		<script>
		
			$(function(){

				$(document).on('click', '#delete', function(e){

					e.preventDefault();

					var link = $(this).attr("href");

					Swal.fire({
					  title: 'Are you sure?',
					  text: "Delete This Data?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  cancelButtonText: 'Cancel',
					  confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					  if (result.isConfirmed) {
					  	window.location.href = link
					    Swal.fire(
					      'Deleted!',
					      'Your file has been deleted.',
					      'success'
					    )
					  }
					})

				});

			});

		</script>

		<!-- Dropify -->
		<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js') }}" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script>
			$(document).ready(function() {
    			$('.dropify').dropify({
    				 messages: {
				        'default': 'Drag and drop',
				        'replace': 'Drag and drop or click to replace',
				        'remove':  'Remove',
				        'error':   'Ooops, something wrong happended.'
				    }
    			});
    		});
		</script>

		<!-- Mask JS -->
		<script src="{{ asset('backend/js/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('backend/js/mask.js') }}"></script>

        <!-- Select2 JS -->
		<script src="{{ asset('backend/js/select2.min.js') }}"></script>

		<!-- JQuery Number JS -->
		<script src="{{ asset('backend/js/jquerynumber.min.js') }}"></script>

		<!-- Datetimepicker JS -->
		<script src="{{ asset('backend/js/moment.min.js') }}"></script>
		<script src="{{ asset('backend/js/bootstrap-datetimepicker.min.js') }}"></script>

		@yield('js')
		
    </body>
</html>