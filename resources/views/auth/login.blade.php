<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Global Crypto Organization World Wide | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Login to Global Crypto Organization World Wide" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #1a1f36, #0f172a);
            background-attachment: fixed;
            margin: 0;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            backdrop-filter: blur(15px);
            padding: 2rem;
            color: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
        }
        .logo-circle {
            width: 90px;
            height: 90px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }
        .form-control {
            border-radius: 8px;
            height: 50px;
            font-size: 0.95rem;
        }
        .form-control:focus {
            border-color: #26d0ce;
            box-shadow: 0 0 0 0.2rem rgba(38,208,206,0.25);
        }
        .btn-login {
            background: linear-gradient(90deg, #1a2980, #26d0ce);
            border: none;
            font-weight: 600;
            height: 50px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38, 208, 206, 0.4);
        }
        .form-check-label {
            font-size: 0.85rem;
        }
        .link-custom {
            color: #26d0ce;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .link-custom:hover {
            color: #1a2980;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-card col-11 col-sm-8 col-md-6 col-lg-4">
            <div class="logo-circle mb-3" style="display: flex; justify-content: center; align-items: center;">
    <a href="/" style="display: inline-block;">
        <img src="logo.png" alt="Logo" style="height: 50px;">
    </a>
</div>

            <h4 class="text-center fw-bold">Welcome Back</h4>
            <p class="text-center mb-4" style="color: rgba(255,255,255,0.7);">Sign in to continue</p>

            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                        <button type="button" class="btn btn-light" id="password-addon">
                            <i class="mdi mdi-eye-outline"></i>
                        </button>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="mb-3 form-check d-flex align-items-center">
                    <input type="checkbox" id="robotCheck" class="form-check-input me-2" required>
                    <label for="robotCheck" class="form-check-label">I am not a robot</label>
                    <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" style="height: 24px; margin-left: 10px;">
                </div> --}}

                <div class="d-grid">
                    <button type="submit" class="btn btn-login">
                        <span class="spinner-border spinner-border-sm me-1 d-none"></span>
                        <span class="button-text">Login</span>
                    </button>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="link-custom">Forgot Password?</a>
                </div>
                <div class="text-center mt-2">
                    <p class="mb-0" style="font-size: 0.9rem;">Don't have an account?
                        <a href="{{route('register')}}" class="link-custom">Sign up</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Password toggle
        document.getElementById('password-addon').addEventListener('click', function () {
            const pwd = document.getElementById('password');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });
    </script>

    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '1647c9aedba281a69521e26290133a34ef366764';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

</body>
</html>
