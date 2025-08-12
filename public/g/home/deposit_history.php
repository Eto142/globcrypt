<?php include "../database/secure.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/fav.png"/>
<!-- Required meta tags -->    
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,shrink-to-fit=no, user-scalable=0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Ultrainvttrd is a registered trading company. With  Ultrainvttrd, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile.">
<!-- Schema.org for Google -->
<meta itemprop="name" content="Ultrainvttrd">
<meta itemprop="description" content="Ultrainvttrd is a registered trading company. With  Ultrainvttrd, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile.">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Ultrainvttrd">
<meta name="twitter:description" content="Ultrainvttrd is a registered trading company. With  Ultrainvttrd, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:description" content="Ultrainvttrd is a registered trading company. With  Ultrainvttrd, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<meta name="og:title" content="Ultrainvttrd">
<meta name="og:site_name" content="Ultrainvttrd">
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
<meta property="og:site_name" content="Ultrainvttrd">
<meta property="og:title" content="Create wealth by discovering the potentials of earning in an enhanced cryptocurrency system.">
<meta property="og:description" content="Ultrainvttrd is a registered trading company. With  Ultrainvttrd, you can discover a better trading experience using our awesome trading platform which is available on desktop, web and mobile. ">
<!-- end import -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/style.css?v=21290">
<link rel="stylesheet" href="./assets/css/icons.css">
<link rel="stylesheet" href="./assets/css/ui.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">	<title>Trade History - Ultrainvttrd</title>
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

	<!-- header -->
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
									href="account/trade-history.php"
									role="tab" 
									aria-controls="v-pills-zilliqua-btc-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> All Deposit History
								</a>

							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-zilliqua-btc-tabContent">
								<!-- history -->
							  	<div class="tab-pane fade show active" id="v-pills-zilliqua-btc-history" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-history-tab">
							  		<div>
							  			<h4 class="text-white">
									  		<span class="">Deposit History</span><br />
								  		</h4>
								  		<table class="table table-striped">
										  	<thead>
											    <tr>

                                                     <th scope="col">Date</th> 
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Method</th>
                                                    <th scope="col">Term</th> 
                                                    <th scope="col">Status</th> 
											    	
											    </tr>
										  	</thead>
										  	<tbody>

                                                 <?php 
                                        if(mysqli_num_rows($dep) > 0 ) {

                                     while($d = mysqli_fetch_assoc($dep))
                                             {

                                              ?>

                                              <tr>
                                                   
                                                    <td><?php echo $d['dd']; ?></td>
                                                    <td>$<?php echo $d['amount']; ?></td>
                                                    <td><?php echo $d['trading_type']; ?></td>
                                                    <td><?php echo $d['method']; ?></td>
                                                     <td><?php echo $d['term']; ?></td>
                                                    <td><?php echo $d['status']; ?></td>

                                                </tr>
                                                <?php  
              }
    }

else  {
  echo "no record found";
}


     ?>
                                        
											   										  	</tbody>
										</table>
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
    <script src="./assets/js/bundle.js"></script></body>
</html>