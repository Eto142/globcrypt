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
<meta property="og:url" content="https://elitetrdmarkets.com">
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

<body class="crypt-dark">
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

	<?php include "header.php"; ?>
<br>
     <div class="mb-3">
                <br>   
                    </div>
                      <div class="container-fluid">
                                <!-- TradingView Widget BEGIN -->
                                <div style="width: 100%; height: 100%; background-color:white;">
                                    
                                    </div>

                                                   <center>
                        <h4 class="text-lg" style=" font-family: sans-serif; ">
                             <small>Welcome, </strong>  <?php echo FNAME;?> </small>
                            </h4>
                           </center>  
                           
                           <!-- Beginning of  Dashboard Stats  -->
                        <div class="row row-card-no-pd  shadow-lg"  >
                            <div class="col-sm-6 col-md-3" style="margin-bottom: 30px;">
                                <div class="card card-stats card-round bg-dark">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-3">
                                            <div class="text-center icon-big">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-dollar fa-stack-1x text-white"></i>
                                            </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                            <div class="text-dark" >
                                        <h5><b>USD Balance</b></h5>
                                                <br>
                                                                    <h4><b><?php echo $balance ?></b></h4>                                                                                
                                            </div> 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             
                            <div class="col-sm-6 col-md-3" style="margin-bottom: 30px;">
                                <div class="card card-stats card-round bg-dark">

                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-3">
                                            <div class="text-center icon-big">
                        <i class="fa fa-circle fa-stack-2x text-warning"></i>
                        <i class="fa fa-dollar fa-stack-1x text-white"></i>
                                            </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                        <div class="text-dark" >
                                          <h5><b>Profit</b></h5>
                                                <br>
                                    <h4><b>$<?php echo $withe ?></b></h4>                                                                             
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 ">
                                <div class="card card-stats card-round bg-dark" style="margin-bottom: 30px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                            <div class="text-center icon-big">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-user fa-stack-1x text-white"></i>
                                            </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                            <div class="text-dark" >
                                    <h5><b>Reference</b></h5>                                
                                                <br>
                                     <h4><b><?php echo $row_bonus?></b></h4>                                                                               
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3" style="margin-bottom: 30px;">
                                <div class="card card-stats card-round bg-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                            <div class="text-center icon-big">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-dollar fa-stack-1x text-white"></i>
                                            </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                            <div class="text-dark" >
                                    <h5><b>Total Deposit(s)</b></h5>                                
                                                <br>
                                     <h4><b>$<?php echo $user_deposits?></b></h4>                                                                               
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 " style="margin-bottom: 30px;">
                                <div class="card card-stats card-round bg-dark">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                            <div class="text-center icon-big">
                        <i class="fa fa-circle fa-stack-2x text-warning"></i>
                        <i class="fa fa-money fa-stack-1x text-white"></i>
                                            </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                            <div class="text-dark" >
                                                <h5><b>Total Withdrawal(s)</b></h5>                                                                                                       
                                                <br>
                            <h5><b>$<?php echo $withdrawal ?></b></h5>                                     
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="col-sm-6 col-md-3 " style="margin-bottom: 30px;">
                                <div class="card card-stats card-round bg-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                            <div class="text-center icon-big">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-dollar fa-stack-1x text-white"></i>
                                            </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                            <div class="text-dark" >
                                    <h5><b>Total Investment(s)</b></h5>                                
                                                <br>
                                     <h4><b>$<?php echo $tradde?></b></h4>                                                                               
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      <script>
                setInterval(function(){
                  $("#blinkupgrade").toggleClass(
                      "blinkupgrade-inactive "
                      );
                  },1000);
            </script>

            <div id="blinkupgrade" class="text-center">
                <h5>

                    <!--  -->
                                            <i class="fa fa-signal"></i> 
                    Live Trading: <?php echo TSTATUS ; ?> <br>
                    <small>Minimum Trade Balance: $500</small>
                        
                </h5>
            </div>

<br>
                <!-- end blinker -->

            	<!-- buy and sell -->
                <div class="crypt-boxed-area">
                    <h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="crypt-buy-sell-form">
                                <p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
                                <div class="crypt-buy">
                                	<div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Currency</span> 
                                        </div>
                                        <select name="ast2" id="" class="form-control" required="true">
									     	<option value="Crypto Currency">Crypto Currency</option>
									    </select>
                                    </div>
                                     
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Asset</span> 
                                        </div>
                                        <select name="ast2" id="" class="form-control" required="true">
									     	<option value="">Select Asset</option>
											<option>ALGO-BTC</option>
											<option>ALGO-USD</option>
											<option>BCH-BTC</option>
											<option>BCH-USD</option>
											<option>BCH-EUR</option>
											<option>BTC-EUR</option>
											<option>BTC-GBP</option>
											<option>BTC-TRY</option>
											<option>BTC-USD</option>
											<option>BTC-USDT</option>
											<option>DGLD-BTC</option>
											<option>DGLD-USD</option>
											<option>ETH-BTC</option>
											<option>ETH-EUR</option>
											<option>ETH-GBP</option>
											<option>ETH-TRY</option>
											<option>ETH-USD</option>
											<option>ETH-USDT</option>
											<option>LTC-EUR</option>
											<option>LTC-USD</option>
											<option>PAX-USD</option>
											<option>USDT-EUR</option>
											<option>USDT-TRY</option>
											<option>USDT-USD</option>
											<option>XLM-USD</option>
											<option>XLM-EUR</option>
											<option>XRP-EUR</option>
									    </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Trade In</span> 
                                        </div>
                                        <select name="ast2" id="" class="form-control" required="true">
									     	<option value="10000">10 Seconds</option>
											<option value="30000">30 Seconds</option>
											<option value="60000">1 Minute</option>
											<option value="120000">2 Minutes</option>
									    </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Amount</span> 
                                        </div>
                                        <input type="number" class="form-control" placeholder="" >
                                    </div>

                                    <div>
                                        <p>Fee: <span class="fright">100%x0.2=0.02</span></p>
                                    </div>
                                    <div class="text-center mt-3 mb-3 crypt-up">
                                        <p>Your payout will 9% on profit trades</p>
                                        <!-- <h4>0.09834 BTC</h4> -->
                                    </div>
                                    <div class="menu-green"><a href="#" class="sub crypt-button-green-full">Buy</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="crypt-buy-sell-form">
                                <p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
                                <div class="crypt-sell">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Currency</span> 
                                        </div>
                                        <select name="ast2" id="" class="form-control" required="true">
									     	<option value="Crypto Currency">Crypto Currency</option>
									    </select>
                                    </div>
                                     
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Asset</span> 
                                        </div>
                                        <select name="ast2" id="" class="form-control" required="true">
									     	<option value="">Select Asset</option>
											<option>ALGO-BTC</option>
											<option>ALGO-USD</option>
											<option>BCH-BTC</option>
											<option>BCH-USD</option>
											<option>BCH-EUR</option>
											<option>BTC-EUR</option>
											<option>BTC-GBP</option>
											<option>BTC-TRY</option>
											<option>BTC-USD</option>
											<option>BTC-USDT</option>
											<option>DGLD-BTC</option>
											<option>DGLD-USD</option>
											<option>ETH-BTC</option>
											<option>ETH-EUR</option>
											<option>ETH-GBP</option>
											<option>ETH-TRY</option>
											<option>ETH-USD</option>
											<option>ETH-USDT</option>
											<option>LTC-EUR</option>
											<option>LTC-USD</option>
											<option>PAX-USD</option>
											<option>USDT-EUR</option>
											<option>USDT-TRY</option>
											<option>USDT-USD</option>
											<option>XLM-USD</option>
											<option>XLM-EUR</option>
											<option>XRP-EUR</option>
									    </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Trade In</span> 
                                        </div>
                                        <select name="ast2" id="" class="form-control" required="true">
									     	<option value="10000">10 Seconds</option>
											<option value="30000">30 Seconds</option>
											<option value="60000">1 Minute</option>
											<option value="120000">2 Minutes</option>
									    </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> 
                                        	<span class="input-group-text">Amount</span> 
                                        </div>
                                        <input type="number" class="form-control" placeholder="" >
                                    </div>

                                    <div>
                                        <p>Fee: <span class="fright">100%x0.2=0.02</span></p>
                                    </div>
                                    <div class="text-center mt-3 mb-3 crypt-up">
                                        <p>You will approximately pay % on trades</p>
                                        <!-- <h4>0.09834 BTC</h4> -->
                                    </div>
                                    <div><a href="#" class="sub crypt-button-red-full">Sell</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end buy and sell -->

                 <!-- TradingView Widget BEGIN -->
				<div class="tradingview-widget-container">
					<div class="tradingview-widget-container__widget"></div>
					<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
						{
						"colorTheme": "dark",
						"dateRange": "12m",
						"showChart": false,
						"locale": "en",
						"largeChartUrl": "",
						"isTransparent": false,
						"width": "100%",
						"height": "400",
						"tabs": [
						  {
						    "title": "Indices",
						    "symbols": [
						      {
						        "s": "FOREXCOM:SPXUSD",
						        "d": "S&P 500"
						      },
						      {
						        "s": "FOREXCOM:NSXUSD",
						        "d": "Nasdaq 100"
						      },
						      {
						        "s": "FOREXCOM:DJI",
						        "d": "Dow 30"
						      },
						      {
						        "s": "INDEX:NKY",
						        "d": "Nikkei 225"
						      },
						      {
						        "s": "INDEX:DEU30",
						        "d": "DAX Index"
						      },
						      {
						        "s": "FOREXCOM:UKXGBP",
						        "d": "FTSE 100"
						      }
						    ],
						    "originalTitle": "Indices"
						  },
						  {
						    "title": "Commodities",
						    "symbols": [
						      {
						        "s": "CME_MINI:ES1!",
						        "d": "E-Mini S&P"
						      },
						      {
						        "s": "CME:6E1!",
						        "d": "Euro"
						      },
						      {
						        "s": "COMEX:GC1!",
						        "d": "Gold"
						      },
						      {
						        "s": "NYMEX:CL1!",
						        "d": "Crude Oil"
						      },
						      {
						        "s": "NYMEX:NG1!",
						        "d": "Natural Gas"
						      },
						      {
						        "s": "CBOT:ZC1!",
						        "d": "Corn"
						      }
						    ],
						    "originalTitle": "Commodities"
						  },
						  {
						    "title": "Forex",
						    "symbols": [
						      {
						        "s": "FX:EURUSD"
						      },
						      {
						        "s": "FX:GBPUSD"
						      },
						      {
						        "s": "FX:USDJPY"
						      },
						      {
						        "s": "FX:USDCHF"
						      },
						      {
						        "s": "FX:AUDUSD"
						      },
						      {
						        "s": "FX:USDCAD"
						      }
						    ],
						    "originalTitle": "Forex"
						  }
						]
						}
					</script>
				</div>
				<!-- TradingView Widget END -->

				<!-- Converter; -->
				<div>
					<script>
						var fm = "USD";var to = "EUR";var tz = "timezone";var sz = "1x1";var lg = "en";var st = "info";var lr = "0";var rd = "0";
					</script>
					<a href="https://currencyrate.today/converter-widget" title="Currency Converter">
						<script src="//currencyrate.today/converter"></script>
					</a>
				</div>
				<!-- converter end -->
            </div>
            <!-- end buy / sell -->
            <div class="col-xl-8">
                <div>
                    <div class="crypt-market-status mt-3">
                       <!-- trading signal -->

                       <div class="tradingview-widget-container">
							<div id="tradingview_b71c6"></div>
							<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
							<script type="text/javascript">
								new TradingView.widget(
								{
								"width": "100%",
								"height": "855",
								"symbol": "NASDAQ:AAPL",
								"timezone": "exchange",
								"theme": "dark",
								"style": "3",
								"locale": "en",
								"toolbar_bg": "#f1f3f6",
								"enable_publishing": true,
								"withdateranges": true,
								"range": "5d",
								"allow_symbol_change": true,
								"details": true,
								"hotlist": true,
								"calendar": true,
								"news": [
								  "stocktwits",
								  "headlines"
								],
								"studies": [
								  "CMF@tv-basicstudies",
								  "IchimokuCloud@tv-basicstudies",
								  "MACD@tv-basicstudies",
								  "MF@tv-basicstudies",
								  "MASimple@tv-basicstudies",
								  "PivotPointsHighLow@tv-basicstudies",
								  "ROC@tv-basicstudies"
								],
								"container_id": "tradingview_b71c6"
								}
								);
							</script>
						</div>

                       <!-- end trading signal -->
                    </div>

                    <div class="tradingview-widget-container mb-3">
	                    <div id="crypt-candle-chart"></div>
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