<?php include "../database/secure.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/fav.png"/>
<!-- Required meta tags -->    
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,shrink-to-fit=no, user-scalable=0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Elitetrdmarkets is a registered trading company. With  Elitetrdmarkets, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile.">
<!-- Schema.org for Google -->
<meta itemprop="name" content="Elitetrdmarkets">
<meta itemprop="description" content="Elitetrdmarkets is a registered trading company. With  Elitetrdmarkets, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile.">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Elitetrdmarkets">
<meta name="twitter:description" content="Elitetrdmarkets is a registered trading company. With  Elitetrdmarkets, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:description" content="Elitetrdmarkets is a registered trading company. With  Elitetrdmarkets, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<meta name="og:title" content="Elitetrdmarkets">
<meta name="og:site_name" content="Elitetrdmarkets">
<meta name="og:locale" content="en_US">
<meta name="og:type" content="website">
<!-- Image to display -->
<meta property="og:image" content="assets/images/logo.png">
<meta property="og:image:type" content="image/jpeg">
<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<!-- Website to visit when clicked in fb or WhatsApp-->
<meta property="og:url" content="">
<!-- MS Tile - for Microsoft apps-->
<meta name="msapplication-TileImage" content="assets/images/logo.png">    
<!-- fb & Whatsapp -->
<!-- Site Name, Title, and Description to be displayed -->
<meta property="og:site_name" content="Elitetrdmarkets">
<meta property="og:title" content="Create wealth by discovering the potentials of earning in an enhanced cryptocurrency system.">
<meta property="og:description" content="Elitetrdmarkets is a registered trading company. With  Elitetrdmarkets, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<!-- end import -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css?v=21290">
<link rel="stylesheet" href="assets/css/icons.css">
<link rel="stylesheet" href="assets/css/ui.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">    <title>Deposit Funds - Elitetrdmarkets</title>
</head>

<body class="crypt-dark">
<!-- taper -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
            async>
        {
            "symbols"
        :
            [
                {
                    "title": "S&P 500",
                    "proName": "INDEX:SPX"
                },
                {
                    "title": "Shanghai Composite",
                    "proName": "INDEX:XLY0"
                },
                {
                    "title": "EUR/USD",
                    "proName": "FX_IDC:EURUSD"
                },
                {
                    "title": "BTC/USD",
                    "proName": "BITFINEX:BTCUSD"
                },
                {
                    "title": "ETH/USD",
                    "proName": "BITFINEX:ETHUSD"
                }
            ],
                "theme"
        :
            "dark",
                "isTransparent"
        :
            false,
                "displayMode"
        :
            "adaptive",
                "locale"
        :
            "en"
        }
    </script>
</div>

 <?php include "header.php"; ?>

<div class="row">
    <div class="col-12">
        <div class="crypt-dash-withdraw mt-3 d-block" id="bitcoin">
            <div class="crypt-withdraw-heading">
                <div class="row">
                    <div class="col-md-2">
                    </div>

                    <div class="col-md-4 col-sm-12">
                    </div>
                </div>
            </div>
            <div class="crypt-withdraw-body bg-white">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a
                                    class="nav-link active"
                                    data-toggle="pill"
                                    href="account/deposit.php"
                                    role="tab"
                                    aria-controls="v-pills-zilliqua-btc-deposit"
                                    aria-selected="true">
                                <i class="pe-7s-bottom-arrow"></i> Deposit
                            </a>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-zilliqua-btc-tabContent">

                            
                            
                           <h6 class="text-uppercase">Deposit Funds To Your Account</h6>
            <p>Details - <a href="buy-crypto.php" class="crypt-up">Buy Crypto Now</a></p>

    <form class="deposit-form" method="post" action="deposit.php">         
       <input type="hidden" name="name" value="<?php echo FNAME ?>">
    <input type="hidden" name="email" value="<?php echo EMAIL ?>">
     <div class="input-group input-text-select mb-3">
     <div class="input-group-prepend">
     <input placeholder="Amount" name="amount" type="number" class="form-control crypt-input-lg" required>
    </div>
   
  </div>
  <h6 class="text-uppercase"> Choose Payment Method from the list below</h6>

                                    <div class="form-group mt-2">
                                        <select class="crypt-image-select" name="payment_mode" required id="paymentType">
                                            <option value="">Choose A Payment Option</option>
                                            <option value="Bank Transfer">BANK TRANSFER</option>
                                            <option value="Crypto Currency">CRYPTO CURRENCY</option>
                                        </select>
                                    </div>

                                    <style>.pd-20 {
                                            padding: 20px;
                                        }</style>
                                    <div class="form-group mt-2 card pd-20" style="display: none;" id="bankWrapper">
                                        <label>BANK NAME: <strong> SOME BANK NAME </strong></label> <br>
                                        <label>ACCOUNT NUMBER: <strong> SOME BANK NAME </strong></label> <br>
                                        <label>ACCOUNT NAME: <strong> SOME BANK NAME </strong> </label>
                                    </div>

                                    <div class="form-group mt-2 card pd-20" style="display: none;" id="supportWrapper">
                                        <label>Please Contact Elitetrdmarkets.com For Payment Details</label> <br>
                                        <label>Thank You.</label>
                                    </div>

                                    <div class="mt-2 card pd-20" style="display: none;" id="cryptoWrapper">

                                        <p class="text-danger">Choose and copy your preferred crypto option:</p> <br>
                                        <h3  style="color: rgb(14, 13, 13);">Bitcoin Wallet Address</h3>
                                       
                                        <input type="text"  id="myInput1" class="form-control" style="color: white;" class="bg-light text-light" value="<?php echo $re['btc']; ?>" readonly>
                                        
                                        <br>
                                        
                                        <br>
                                        <h3  style="color: rgb(14, 13, 13);">USDT Wallet Address</h3>
                                       
                                        <input type="text"  id="myInput1" class="form-control" style="color: white;" class="bg-light text-light" value="<?php echo $re['usdt']; ?>" readonly>
                                        
                                        <br> <br>

                                                                                    
                                        <p class="text-danger">Once your payment has been confirmed your account will be
                                            funded. <br>
                                            Please confirm your amount properly before depositing. <br> Thank You.
                                        </p>
                                       
                                    </div>

                                    

                                    <input type="submit" name="deposit" class="crypt-button-red-full mt-2"
                                           value="Submit">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer>
        
    </footer>
    <script src="https://s3.tradingview.com/tv.js"></script>
    <script src="./assets/js/bundle.js"></script><script type="application/javascript"
        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js?v=1200"></script>
<script type="application/javascript" href="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#paymentType').on('change', function () {
            if ($(this).val() == 'Bank Transfer') {
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:block');
                $("#cryptoWrapper").attr("style", 'display:none');

            } else if ($(this).val() == 'Cash App') {
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:block');
                $("#cryptoWrapper").attr("style", 'display:none');


            } else if ($(this).val() == 'Crypto Currency') {
                $("#cryptoWrapper").attr("style", 'display:block');
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:none');

                generateCode();


            } else if ($(this).val() == 'Money Gram') {
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:block');
                $("#cryptoWrapper").attr("style", 'display:none');


            } else if ($(this).val() == 'PayPal') {
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:block');
                $("#cryptoWrapper").attr("style", 'display:none');


            } else if ($(this).val() == 'Western Union') {
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:block');
                $("#cryptoWrapper").attr("style", 'display:none');

            } else {
                $("#bankWrapper").attr("style", 'display:none');
                $("#supportWrapper").attr("style", 'display:none');
                $("#cryptoWrapper").attr("style", 'display:none');

            }

        });

    })

    function generateCode() {
        let testimonials = $('.btc_qrcode');
        for (let i = 0; i < testimonials.length; i++) {
            // Using $() to re-wrap the element.
            let wallet = $(testimonials[i]).data('wallet');
            $(testimonials[i]).empty()
            $(testimonials[i]).css({'width': 180, 'height': 180})
            $(testimonials[i]).qrcode({width: 180, height: 180, text: wallet});
            $(testimonials[i]).show();
        }
    }
</script>
</body>
</html>