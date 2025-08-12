<?php include "../database/secure.php"; ?> 
<!DOCTYPE html>
<html lang="en-US" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Veridian Trust Bank is federally insured by the National Credit Union Administration. We do business in accordance with the Fair Housing Law and Equal opportunity Credit Act.">
    <link rel="shortcut icon" href="myaccount/images/favicon.png" type="image/x-icon">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="myaccount/images/favicon.png">
    <!-- Page Title  -->
    <title>Welcome to  | Elitetrdmarkets</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="myaccount/assets/css/dashlite.css?ver=2.4.0">
    <link rel="stylesheet" href="myaccount/assets/loader.css">
    <link rel="stylesheet" href="myaccount/scss/sweetalert.css">
    <link id="skin-default" rel="stylesheet" href="myaccount/assets/css/theme.css?ver=2.4.0">
     <link href="myaccount/css/toastr.css" rel="stylesheet"/>
</head>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <style>
.goog-te-gadget-simple {
border:none;
}
.goog-te-gadget-simple a {
color:#000;
}
</style>
<style type="text/css">
    .btn-primary{
        background-color: #3140fc;
    }
    .btn-secondary{
        background-color: #d13636;
    }
    .btn-secondary:hover{opacity: 0.6;}
    .btn-primary:hover{opacity: 0.6;}
</style>
<?php
  $rand = rand(9999, 1000);
 if (isset($_POST['verify'])) {
     
    $captcha = mysqli_real_escape_string($conn, $_POST['captcha']);
    $captcha_rand = mysqli_real_escape_string($conn, ($_POST['captcha_rand']));

    if ($captcha!= $captcha_rand){

 $reg_rep = "<p class='text-danger' style='color:#faa;'><i class='fa fa-info-circle'></i> Sorry! captcha do not match</p>";  
    }

else {
          echo "
<script>
window.location.href='../home/';

</script>

  ";
       

       }
    

    }
?>

<body  style="background-color: rgb(2, 2, 28)">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="justify-center card-header">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-dark">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                     <div class="banner-title">
           <span class="decor-equal"></span>
        </div>
    <div id="particles-js"></div>
                    <center class="brand-logo pb-5">
                        <a href="" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="myaccount/logo.png" srcset="myaccount/logo.png" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="myaccount/logo.png" srcset="myaccount/logo.png" alt="logo-dark">
                        </a>
                    </center>
                    <br>
                                        <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title" style="color: white">Welcome <?php echo FNAME;?></h3>
                            <div class="nk-block-des alert alert-pro alert-primary">
                                <p class="alert-text">Please confirm you are not a Robot by verifying the auto-generated code below, This will enable you have access to Live Trading Dashboard .</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
    <form action="index.php" id="verifyForm" method="post">
        <?php echo $reg_rep; ?> 
        <div class="form-group">
        <link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet">
        <div style="height: 46px; line-height: 46px; width:100%; text-align: center; background-color: rgb(2, 2, 28) ; color: #ffffff!important; font-size: 26px; font-weight: bold; font-family: 'Henny Penny', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;" class="captcha"><span style="    -webkit-transform: rotate(10deg);"><?php echo $rand; ?></span><input type="hidden" name="captcha_rand" value="<?php echo $rand; ?>"></div>

    <div class="form-group">
        <input type="text" name="captcha" id="captcha" class="form-control form-control-xl" placeholder="Enter code" autocomplete="off" required>
    </div>
    <div id="verifyResult"></div>
                        <div class="form-group">
                            <button style="background-color: rgb(2, 2, 28) ; color:white;" name="verify" type="submit" >Verify code</button>
                        </div>
                    </form><!-- form -->
                                </div><!-- .nk-block -->
                <div class="nk-block nk-auth-footer" style="margin-top:80px;">
                    <a href="#" style=""><div id="google_translate_element"></div> </a>
                   <div class="mt-3" style="color: white;">
                        <p>&copy; 2023Elitetrdmarkets. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
            
            
            
           
            
            
            

        </div>
    </div>




                 <script src="../js/particle.js"></script>
<script>
particlesJS("particles-js", {
    "particles":{ "number":{"value":100,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}
},"retina_detect":true});
</script>
<script>
    <!-- JavaScript -->
    <script src="myaccount/js/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function (e) {
    $("#verifyForm").on('submit',(function(e) {
        document.getElementById("btn").disabled = true;
        e.preventDefault();
        $.ajax({
            url: "myaccount/scripts/auth?action=verifyRecaptcha&code=900099",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
            $("#verifyResult").html(data);
            document.getElementById("btn").disabled = false;
            },
            error: function()
            {
            }
       });
    }));
});
</script>
    <script src="myaccount/assets/js/bundle.js?ver=2.4.0"></script>
    <script src="myaccount/assets/js/scripts.js?ver=2.4.0"></script>
   <script src="myaccount/js/vendors/sweetalert.js"></script>
   <script src="myaccount/assets/js/custom.js"></script>
   <script src="myaccount/js/toastr.js"></script>
</body>
</html>