{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Global Crypto Organization World Wide | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Global Crypto Organization World Wide" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body style="background-color: rgb(5, 5, 66)">
<div class="account-pages my-5 pt-sm-5" >
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="" style="background-color: rgb(5, 5, 66)" >
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4" >
                                    <h5 class="" style="color: white">Free Register</h5>
                                    <p style="color: white">Get your free Global Crypto Organization World Wide account now.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="/">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                                <img src="" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                          <form method="POST" action="{{ route('register') }}" id="regester" class="needs-validation" novalidate>
                            @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="fullname" name="name" placeholder="Enter Full Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                
                                
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email"   value="{{ old('email') }}"placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                               
                                </div>
                                

                               


                                <div class="md-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="country" name="currency" aria-label="Floating label select example" required>
                                            <option value="$">USD</option>
                                            <option value='£'>GBP</option>
                                            <option value='€'>EUR</option>
                                            <option value='$'>AUD</option>
                                        </select>
                                        <label for="floatingSelectGrid">Currency</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" id="password" name="password">
                                                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                                                            </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation" aria-label="Password" aria-describedby="password-addon1" id="password2" name="password_confirmation">
                                        <button class="btn btn-light " type="button" id="password-addon1"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>



                                <div class="border-box">
                                    <div class="checkbox-container">
                                        <input type="checkbox" id="robotCheck" required>
                                        <label for="robotCheck">I am not a robot</label>
                                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" class="recaptcha-icon">
                                    </div>
                                </div>
            

                                <div class="mt-4 d-grid">
                                    <button class="btn btn-success waves-effect waves-light" {{ __('Register') }}  onclick='create(this)' type="submit" id="div"style="background-color: rgb(5, 5, 66)">Register</button>
                                </div><br>
                                <p class="response"></p>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">By registering you agree to the Global Crypto Organization World Wide.net <a href="#" class="text-primary">Terms of Use</a></p>
                                <br>
                                <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login</a> </p>
                                <p>
                                </div>
                      
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                   
                    <div>
                        ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Copyright
                            <i class="bx bx-check-shield text-success"></i>Global Crypto Organization World Wide</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
    <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <a href="/"><img src="" alt="" class="me-2" height="18"></a>
            <strong class="me-auto">Error</strong>
            <small>Now..</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color:red;">

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
<!-- Bootstrap Toasts Js -->
<script src="assets/js/pages/bootstrap-toastr.init.js"></script>

</body>

</html>

<script>
    function create(id) {
        id.innerHTML = "submitting request...";
        $("#div").fadeOut(1000);
        setTimeout(function() {
            $('#div').show();
            id.innerHTML = "Register";
        }, 2000);
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#regester').on('submit', function(e) {
            e.preventDefault();

            var fullname = $('#fullname').val();
            var email = $('#email').val();

            var password = $('#password').val();
    


            if (fullname == "" || email == "" password == "") {
                $(".toast-body").html('Enter all field');
                $("#ErrorToast").toast("show");
                return false;
            }

            if (password.length < 5 || password2.length < 5) {
                $(".toast-body").html('Enter A Stronger Password !');
                $("#ErrorToast").toast("show");
                $("#password, $password2").val('');
                return false;
            }


            if (password != password2) {
                $(".toast-body").html('Password mismatched Check And Try Again!');
                $("#ErrorToast").toast("show");
                $("#pin_two").val('');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "https://Global Crypto Organization World Wide.net/custom-registration",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    $(".response").html(data.content);
                    if (data.content == 'successful') {
                        $(".response").html(data.content);
                        window.location = data.redirect;
                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.content);
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('The Internet?', 'Check network connection!', 'question');
                }
            });

        });
    });
</script>



<style>



.border-box {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.checkbox-container {
    display: flex;
    align-items: center;
}

input[type="checkbox"] {
    width: 20px;
    height: 20px;
    margin-right: 10px;
}

.recaptcha-icon {
    width: 24px;
    height: 24px;
}

    </style> --}}



    <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Global Crypto Organization World Wide | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Global Crypto Organization World Wide" name="description" />
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
                        <h4 class="mt-3 mb-0" style="color: white; font-weight: 600;">Create Account</h4>
                        <p class="mb-0" style="color: rgba(255,255,255,0.8);">Join Global Crypto Organization World Wide</p>
                    </div>
                    <div class="card-body p-4" style="background-color: #fff;">
                        <div class="p-2">
                          <form method="POST" action="{{ route('register') }}" id="regester" class="needs-validation" novalidate>
                            @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label" style="font-weight: 500;">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-account-outline"></i></span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="fullname" name="name" placeholder="Enter Full Name" style="border-left: 0; padding-left: 5px;">
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                                
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label" style="font-weight: 500;">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-email-outline"></i></span>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" style="border-left: 0; padding-left: 5px;">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                               
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Currency</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-currency-usd"></i></span>
                                        <select class="form-select" id="country" name="currency" aria-label="Currency selection" required style="border-left: 0; padding-left: 5px;">
                                            <option value="$">USD</option>
                                            <option value='£'>GBP</option>
                                            <option value='€'>EUR</option>
                                            <option value='$'>AUD</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-lock-outline"></i></span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" id="password" name="password" style="border-left: 0; padding-left: 5px;">
                                        <button class="btn btn-light" type="button" id="password-addon" style="border: 1px solid #ced4da; border-left: 0;"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Confirm Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <span class="input-group-text" style="background-color: #f8f9fa;"><i class="mdi mdi-lock-outline"></i></span>
                                        <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" aria-label="Password" aria-describedby="password-addon1" id="password2" style="border-left: 0; padding-left: 5px;">
                                        <button class="btn btn-light" type="button" id="password-addon1" style="border: 1px solid #ced4da; border-left: 0;"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="robotCheck" required>
                                        <label class="form-check-label" for="robotCheck" style="font-size: 0.85rem;">I am not a robot</label>
                                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" style="height: 24px; margin-left: 10px; vertical-align: middle;">
                                    </div>
                                </div>
            
                                <div class="mt-4 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" id="div" style="background: linear-gradient(to right, #1a2980, #26d0ce); border: none; height: 45px; font-weight: 500; letter-spacing: 0.5px;">
                                        <span class="spinner-border spinner-border-sm me-1 d-none" role="status" aria-hidden="true"></span>
                                        <span class="button-text">Register</span>
                                    </button>
                                </div>
                                <p class="response text-center mt-2" style="font-size: 0.9rem;"></p>

                                <div class="mt-4 text-center">
                                    <p class="mb-0" style="font-size: 0.85rem;">By registering you agree to the <a href="#" style="text-decoration: none; color: #26d0ce;">Terms of Use</a></p>
                                    <p class="mt-2" style="font-size: 0.9rem;">Already have an account? <a href="{{route('login')}}" style="text-decoration: none; color: #26d0ce; font-weight: 500;">Login</a></p>
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
    function create(button) {
        const spinner = button.querySelector('.spinner-border');
        const buttonText = button.querySelector('.button-text');
        
        buttonText.textContent = "Submitting request...";
        spinner.classList.remove('d-none');
        button.disabled = true;
        
        setTimeout(function() {
            buttonText.textContent = "Register";
            spinner.classList.add('d-none');
            button.disabled = false;
        }, 2000);
    }
    
    // Password visibility toggle
    document.getElementById('password-addon').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.innerHTML = '<i class="mdi mdi-eye-off-outline"></i>';
        } else {
            passwordInput.type = 'password';
            this.innerHTML = '<i class="mdi mdi-eye-outline"></i>';
        }
    });
    
    document.getElementById('password-addon1').addEventListener('click', function() {
        const passwordInput = document.getElementById('password2');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.innerHTML = '<i class="mdi mdi-eye-off-outline"></i>';
        } else {
            passwordInput.type = 'password';
            this.innerHTML = '<i class="mdi mdi-eye-outline"></i>';
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#regester').on('submit', function(e) {
            e.preventDefault();
            create(this.querySelector('button[type="submit"]'));

            var fullname = $('#fullname').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var password2 = $('#password2').val();

            if (fullname == "" || email == "" || password == "") {
                $(".toast-body").html('Please fill in all fields');
                $("#ErrorToast").toast("show");
                return false;
            }

            if (password.length < 5 || password2.length < 5) {
                $(".toast-body").html('Password must be at least 5 characters long');
                $("#ErrorToast").toast("show");
                $("#password, #password2").val('');
                return false;
            }

            if (password != password2) {
                $(".toast-body").html('Passwords do not match');
                $("#ErrorToast").toast("show");
                $("#password2").val('');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "https://GlobalCryptoOrganizationWorldWide.net/custom-registration",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    $(".response").html(data.content);
                    if (data.content == 'successful') {
                        window.location = data.redirect;
                    } else if (data.content == 'Error') {
                        $(".toast-body").html('Registration error. Please try again.');
                        $("#ErrorToast").toast("show");
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('Network Error', 'Please check your internet connection and try again', 'error');
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
    
    .form-control:focus, .form-select:focus {
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