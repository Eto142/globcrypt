<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Global Crypto Organization World Wide | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Register with Global Crypto Organization World Wide" name="description" />
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
        .register-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            backdrop-filter: blur(15px);
            padding: 2rem;
            color: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
        }
        .register-card:hover {
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
        .btn-register {
            background: linear-gradient(90deg, #1a2980, #26d0ce);
            border: none;
            font-weight: 600;
            height: 50px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
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
        .recaptcha-box {
            border: 1px solid rgba(255,255,255,0.2);
            padding: 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
        }
        .recaptcha-box img {
            height: 24px;
            margin-left: 10px;
        }

        @media (max-height: 700px) {
    body > .d-flex {
        padding-top: 30px; /* Less push on shorter screens */
        padding-bottom: 20px;
    }
}

    </style>
</head>

<body>
    <div class="d-flex justify-content-center w-100" style="padding-top: 60px; padding-bottom: 40px; min-height: 100vh;">
        <div class="register-card col-11 col-sm-8 col-md-6 col-lg-5">

            <div class="logo-circle mb-3" style="display: flex; justify-content: center; align-items: center;">
    <a href="/" style="display: inline-block;">
        <img src="logo.png" alt="Logo" style="height: 50px;">
    </a>
</div>

            <h4 class="text-center fw-bold">Create Your Account</h4>
            <p class="text-center mb-4" style="color: rgba(255,255,255,0.7);">Join Global Crypto Organization World Wide today</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="fullname" class="form-label fw-semibold">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="fullname" name="name" value="{{ old('name') }}" placeholder="Enter full name">
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="currency" class="form-label fw-semibold">Preferred Currency</label>
                    <select class="form-select" id="currency" name="currency" required>
                        <option value="$">USD</option>
                        <option value="£">GBP</option>
                        <option value="€">EUR</option>
                        <option value="$">AUD</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password">
                        <button type="button" class="btn btn-light" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                        @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                        <button type="button" class="btn btn-light" id="password-addon2"><i class="mdi mdi-eye-outline"></i></button>
                    </div>
                </div>

                {{-- <div class="mb-3 recaptcha-box">
                    <input type="checkbox" id="robotCheck" class="form-check-input me-2" required>
                    <label for="robotCheck" class="form-check-label">I am not a robot</label>
                    <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA">
                </div> --}}

                <div class="d-grid">
                    <button type="submit" class="btn btn-register">Register</button>
                </div>

                <div class="text-center mt-3">
                    <p class="mb-0" style="font-size: 0.9rem;">Already have an account?
                        <a href="{{ route('login') }}" class="link-custom">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle
        document.getElementById('password-addon').addEventListener('click', function () {
            const pwd = document.getElementById('password');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });
        document.getElementById('password-addon2').addEventListener('click', function () {
            const pwd = document.getElementById('password_confirmation');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>
</html>
