<?php include "header.php"; ?>

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
<meta property="og:image" content="{{asset('assets/images/logo.png') }}">
<meta property="og:image:type" content="image/jpeg">
<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<!-- Website to visit when clicked in fb or WhatsApp-->
<meta property="og:url" content="Elitetrdmarkets.com">
<!-- MS Tile - for Microsoft apps-->
<meta name="msapplication-TileImage" content="assets/images/logo.png">    
<!-- fb & Whatsapp -->
<!-- Site Name, Title, and Description to be displayed -->
<meta property="og:site_name" content="Elitetrdmarkets">
<meta property="og:title" content="Create wealth by discovering the potentials of earning in an enhanced cryptocurrency system.">
<meta property="og:description" content="Elitetrdmarkets is a registered trading company. With  Elitetrdmarkets, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<!-- end import -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/style.css?v=21290">
<link rel="stylesheet" href="./assets/css/icons.css">
<link rel="stylesheet" href="./assets/css/ui.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">	<title>Trading Dashboard - Elitetrdmarkets</title>
	<style type="text/css">
		                                        
		#blinkupgrade{ display:block;
		    position:relative;
		    width:auto;
		    color: white;
		    background:black;
		    text-transform: uppercase;
		    font-weight: bold;
		    clear:both;
		    padding: 2em
		}


		.blinkupgrade-active{
		    background-color:green !important;
		    display:block;
		    text-transform: uppercase;
		    position:relative;
		    width:auto;
		    color: black !important;
		    clear:both;
		    font-weight: bold;
		}

		.blinkupgrade-inactive{
		    background-color:red !important;
		    display:block;
		    text-transform: uppercase;
		    position:relative;
		    width:auto;
		    color: black !important;
		    clear:both;
		    font-weight: bold;
		}

	</style>
</head>

<body class="crypt-dark"  style="background-color: rgb(2, 2, 28)">
    <script src="//code.tidio.co/hatv5rda04scochtriviwdyunhlinp78.js" async></script>
	<!-- taper -->
	<div class="tradingview-widget-container">
		<div class="tradingview-widget-container__widget"></div>
		<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
			{
			"symbols": [
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
			"theme": "dark",
			"isTransparent": false,
			"displayMode": "adaptive",
			"locale": "en"
			}
		</script>
	</div>

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
                                href="{{url('transaction_history')}}" 
                                role="tab" 
                                aria-controls="v-pills-zilliqua-btc-history" 
                                aria-selected="false">
                                    <i class="pe-7s-clock"></i> Buy Crypto
                            </a>

                            
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-zilliqua-btc-tabContent">
                            <!-- history -->
                              <div class="tab-pane fade show active" id="v-pills-zilliqua-btc-history" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-history-tab">
                                  <div>
                                      <h4 class="text-white">
                                          <span class="">Buy Crypto</span><br />
                                      </h4>
                                      <br>
<p><a href="https://www.trustwallet.com"  style="color:gold;">Trustwallet.com</a></p><br>
<p><a href="https://changelly.com/"  style="color:gold;">Changelly.com</a></p><br>
<p><a href="https://www.bitcoin.com/"  style="color:gold;">Bitcoin.com</a> </p> <br>
 <p><a href="https://www.coinmama.com"  style="color:gold;">Coinmama.com</a></p><br>
 <p><a href="https://www.yellowcard.io"  style="color:gold;">Yellowcard.io</a></p><br>
 <p><a href="https://www.remitano.com"  style="color:gold;">Remitano.com</a></p><br>
 <p><a href="https://www.luno.com"  style="color:gold;">Luno.com</a></p><br>
 <p><a href="https://www.cex.io"  style="color:gold;">Cex.io</a></p><br>
 <p><a href="https://www.cashapp.com"  style="color:gold;">Cashapp.com</a></p><br>
 <p><a href="https://www.paxful.com"  style="color:gold;">Paxful.com</a></p><br>
                                  </div>
                                  
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
    <script src="assets/js/bundle.js"></script>
   <link rel="stylesheet" type="text/css" href="js/cute-alert-master/style.css">
		<script type="text/javascript" src="js/cute-alert-master/cute-alert.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function(){
				
				$(".sub").click(function() {
					placeTrade();
				});
				$(".sub2").click(function() {
					placeTrade();
				});

				function placeTrade(){
					cuteAlert({
					  type: "warning",
					  title: "Warning !!",
					  message: "We strongly advice that you contact your account manager for live trading support to avoid losing capital",
					  buttonText: "Okay"
					})
				}
			});
		</script>
		 
</body>
</html>