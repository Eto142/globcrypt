
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Global Crypto Organization World Wide | Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body style="background-color: rgb(5, 5, 66)">
    <div class="account-pages my-5 pt-sm-5"style="background-color: rgb(5, 5, 66)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="" style="background-color: rgb(5, 5, 66)">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="" style="color: white">Welcome!</h5>
                                        <p style="color: white"></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                    </div>
                                </a>

                                <a class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <p class="response"></p>
                                    <div class="register-box-body">
      <h3 class="login-box-msg"> Your Authorization code is below</h3>
      <p class="login-box-msg">
      <h2>  {{Auth::user()->token}}</h2>
     
     
      </p>
   
                                                      @if (session('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('error') }}
                                                </div>
                                                @endif
                                                @if($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{$message}}</p>
                                                </div>
                                                @endif
      <form method="POST" action="{{ route('code') }}">
        @csrf



        <div class="form-group has-feedback">
          <input type="number" name="digit" class="form-control" placeholder="Enter code" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

<br>


<div style="display: flex; gap: 10px;">
        <div class="form-group">
         <button type="submit" name="next" class="btn btn-lg btn-success btn-block">Next</button>
        </div>
        </form>
         <form method="POST" action="{{ route('logout') }}">
        @csrf
         <div class="form-group">
           <button type="submit" name="logout" class="btn btn-lg btn-danger btn-block">Logout</button>
        </div>
      </form><!-- form -->

    </div>
    </div>
  </div>
  <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

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
<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
    <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://globaltb.online/user/logo.png" alt="" class="me-2" height="18">
            <strong class="me-auto">Error</strong>
            <small>Now..</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color:red;">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#login_form').on('submit', function(e) {
            e.preventDefault();
            $(".response").html("Loading...<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>")
            var email = $('#email').val();
            var password = $('#password').val();

            if (email == '' || password == '') {
                $(".toast-body").html('Enter all field');
                $("#ErrorToast").toast("show");
                $(".response").html("")
                return false;
            }
            $.ajax({
                type: "POST",
                url: 'https://Standardoptions.net/custom-login',
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    //alert('error');
                    $(".response").html(data.content);
                    if (data.content == 'Successful') {
                        $(".response").html(data.message);
                        window.location = data.redirect;

                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.message);
                        window.location = data.redirect;
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('The Internet?', 'Check network connection!', 'question');
                }
            });
        });
    });
</script>

<script>
    function login(id) {
        id.innerHTML = "Verifying account..";
        setTimeout(function() {
            id.innerHTML = "Log in";
        }, 3000);
    }
</script>