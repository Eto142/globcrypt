<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Global Crypto Organization World Wide | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Global Crypto Organization World Wide login" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>


<body style="background: linear-gradient(135deg, #0f0c29, #302b63, #24243e); font-family: 'Montserrat', sans-serif;">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
                        <div class="card-header" style="background: linear-gradient(to right, #1a2980, #26d0ce); padding: 2rem; text-align: center;">
                            <div class="d-flex justify-content-center">
                                <a href="/">
                                    <div class="avatar-lg" style="width: 80px; height: 80px; background-color: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <img src="assets/images/logo-light.png" alt="" style="height: 50px;">
                                    </div>
                                </a>
                            </div>
                            <h4 class="mt-3 mb-0" style="color: white; font-weight: 600;">Welcome Back</h4>
                            <p class="mb-0" style="color: rgba(255,255,255,0.8);">Sign in to continue</p>
                        </div>
                        <div class="card-body p-4" style="background-color: #fff;">
                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <p class="response text-center mb-3" style="font-size: 0.9rem;"></p>

                                    <div class="mb-3">
                                        <label for="username" class="form-label" style="font-weight: 500;">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-email-outline"></i></span>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Enter email" style="border-left: 0; padding-left: 5px;">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror                                       
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" style="font-weight: 500;">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-lock-outline"></i></span>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" id="password" style="border-left: 0; padding-left: 5px;">
                                            <button class="btn btn-light" type="button" id="password-addon" style="border: 1px solid #ced4da; border-left: 0;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0"/></svg>
                                            </button>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="robotCheck" class="form-check-input" required>
                                            <label class="form-check-label" for="robotCheck" style="font-size: 0.85rem;">I am not a robot</label>
                                            <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" style="height: 24px; margin-left: 10px; vertical-align: middle;">
                                        </div>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" style="background: linear-gradient(to right, #1a2980, #26d0ce); border: none; height: 45px; font-weight: 500; letter-spacing: 0.5px;">
                                            <span class="spinner-border spinner-border-sm me-1 d-none" role="status" aria-hidden="true"></span>
                                            <span class="button-text">Login</span>
                                        </button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0" style="font-size: 0.9rem;">Don't have an account? <a href="{{route('register')}}" style="text-decoration: none; color: #26d0ce; font-weight: 500;">Sign up now</a></p>
                                    </div>

                                    <div class="mt-3 text-center">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" style="text-decoration: none; color: #26d0ce; font-size: 0.85rem;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5 text-center">
                        <div style="color: rgba(255,255,255,0.7);">
                            © <script>document.write(new Date().getFullYear())</script> Global Crypto Organization World Wide
                            <i class="bx bx-check-shield ms-1" style="color: #26d0ce;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1005">
        <div id="ErrorToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Error</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-light text-danger">
                Error message will appear here
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- validation init -->
    <script src="assets/js/pages/validation.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Password visibility toggle
        document.getElementById('password-addon').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('svg path');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.setAttribute('d', 'M2 5.27L3.28 4L20 20.72L18.73 22l-3.08-3.08c-1.15.38-2.37.58-3.65.58c-5 0-9.27-3.11-11-7.5c.69-1.76 1.79-3.31 3.19-4.54L2 5.27M12 9a3 3 0 0 1 3 3a3 3 0 0 1-.17 1L11 9.17A3 3 0 0 1 12 9m0-4.5c5 0 9.27 3.11 11 7.5a11.79 11.79 0 0 1-4 5.19l-1.42-1.43A9.862 9.862 0 0 0 20 12c-2.28-4.4-6-7.5-11-7.5c-1.35 0-2.65.2-3.89.57l-1.7-1.7A13.07 13.07 0 0 1 12 4.5M7.5 10.5A3 3 0 0 1 10.5 7.5c0 .65.18 1.25.5 1.76L8.76 10c-.5-.32-1.1-.5-1.76-.5m0 3.74l1.77-1.77a3 3 0 0 1 3.48-3.48l1.77-1.77A5 5 0 0 0 7.5 10.5a5 5 0 0 0 0 3.74z');
            } else {
                passwordInput.type = 'password';
                icon.setAttribute('d', 'M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0');
            }
        });

        function login(button) {
            const spinner = button.querySelector('.spinner-border');
            const buttonText = button.querySelector('.button-text');
            
            buttonText.textContent = "Verifying...";
            spinner.classList.remove('d-none');
            button.disabled = true;
            
            setTimeout(function() {
                buttonText.textContent = "Login";
                spinner.classList.add('d-none');
                button.disabled = false;
            }, 3000);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                login(this.querySelector('button[type="submit"]'));
                
                var email = $('#email').val();
                var password = $('#password').val();
                var isChecked = $('#robotCheck').is(':checked');

                if (!isChecked) {
                    $(".toast-body").html('Please verify you are not a robot');
                    $("#ErrorToast").toast("show");
                    return false;
                }

                if (email == '' || password == '') {
                    $(".toast-body").html('Please fill in all fields');
                    $("#ErrorToast").toast("show");
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: 'https://GlobalCryptoOrganizationWorldWide.net/custom-login',
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(data) {
                        $(".response").html(data.content);
                        if (data.content == 'Successful') {
                            window.location = data.redirect;
                        } else if (data.content == 'Error') {
                            $(".toast-body").html(data.message || 'Login failed. Please try again.');
                            $("#ErrorToast").toast("show");
                        }
                    },
                    error: function(data, errorThrown) {
                        Swal.fire('Network Error', 'Please check your internet connection', 'error');
                    }
                });
            });
        });
    </script>

    <style>
        body {
            background-attachment: fixed;
        }
        
        .card {
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .form-control:focus {
            border-color: #26d0ce;
            box-shadow: 0 0 0 0.2rem rgba(38, 208, 206, 0.25);
        }
        
        .input-group-text {
            transition: all 0.3s ease;
        }
        
        .input-group:focus-within .input-group-text {
            background-color: #e9f9f9;
            color: #26d0ce;
        }
        
        .btn-primary {
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38, 208, 206, 0.4);
        }
        
        a {
            transition: color 0.2s ease;
        }
        
        a:hover {
            color: #1a2980 !important;
        }
        
        #ErrorToast .toast-body {
            font-weight: 500;
        }
        
        @media (max-width: 575.98px) {
            .card-header {
                padding: 1.5rem !important;
            }
        }
    </style>

</body>
</html>