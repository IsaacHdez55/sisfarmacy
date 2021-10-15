<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="SISFARMACY">
        {{-- <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects"> --}}
        <meta name="author" content="Isaac Hernandez">
        <meta name="robots" content="noindex, nofollow">

        <title>SISFARMACY - Forgot Password</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/favicon.png') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

    </head>
    <body class="account-page">
    
        <!-- Main Wrapper -->
        <div class="main-wrapper">
        
            <div class="account-content">
                
                <div class="container">
                
                    <!-- Account Logo -->
                    {{-- <div class="account-logo">
                        <a href=""><img src="{{ asset('backend/img/logo2.png') }}" alt="SISFARMACY"></a>
                    </div> --}}
                    <!-- /Account Logo -->
                    
                    <div class="account-box">
                        <div class="account-wrapper">
                            <h3 class="account-title">Forgot Password?</h3>
                            <p class="account-subtitle">Enter your email to get a password reset link</p>
                            
                            <!-- Account Form -->
                            <form action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="form-control" id="email" name="email" type="email" :value="old('email')" required>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
                                </div>
                                <div class="account-footer">
                                    <p>Remember your password? <a href="{{ route('login') }}">Login</a></p>
                                </div>
                            </form>
                            <!-- /Account Form -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Wrapper -->
        
        <!-- jQuery -->
        <script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        
        <!-- Custom JS -->
        <script src="{{ asset('backend/js/app.js') }}"></script>
        
    </body>
</html>