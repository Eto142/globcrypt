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
<meta property="og:url" content="Elitetrdmarkets">
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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">	<title>Profile Setting - Elitetrdmarkets</title>
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
									href="account/profile.php" 
									role="tab" 
									aria-controls="v-pills-zilliqua-btc-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Profile & Settings
								</a>

							</div>
						</div>
						<div class="col-md-9">

							<div class="tab-content" id="v-pills-zilliqua-btc-tabContent">


								
						         

							  	<div class="tab-pane fade show active" id="v-pills-zilliqua-btc-deposit" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-deposit-tab">
							  		<h6 class="mb-5" style="cursor: pointer"  data-toggle="modal" data-target="#cashapp">Click here to Change Your Password </h6>

							  		<div class="box box-widget bg-dark">
      
								      <div class="box-body">
<!--								        <button type="button" class="btn btn-info btn-block btn-md" data-toggle="modal" data-target="#cashapp">-->
<!--								          Change Password</button>-->
								        <!-- Modal -->
								        <div class="modal fade text-left" id="cashapp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
								          <div class="modal-dialog" role="document">
								            <div class="modal-content">
								              <div class="modal-header">
								                <h5 class="modal-title" id="myModalLabel1">Change Password</h5>
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                  <span aria-hidden="true">×</span>
								                </button>
								              </div>
								              <div class="modal-body">

								              	<form method="post">
							              			<div class="row">
							              				<?php echo $report; ?>
									              		
										               <div class="form-group col-md-10">
											               	<h5 class="text-dark">New Password</h5>
											               	<input type="password" name="pass_new" placeholder="Enter new password" class="form-control bg-light text-dark" required>
										               </div>

										                <div class="form-group col-md-10">
											               	<h5 class="text-dark">Current Password</h5>
											               	<input type="password" name="pass_cur" placeholder="Confirm new password" class="form-control bg-light text-dark" required>
										               </div>

										                <div class="form-group col-md-10">
											               <input name="updatepass" type="submit" class="btn btn-success btn-block btn-md bg-yellow-active" value="Change Password">
											           </div>
									              	</div>
								              	</form>
								              
								               
								              </div>
								              <div class="modal-footer">
								                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
								              </div>
								            </div>
								          </div>
								        </div>
								      </div>
								      <!-- /.box-body -->
								    </div>


                                        <form method="post" action="profile.php">
								    <h6 class=" mt-3">User Profile Details </h6>
									
									<div class="form-group mt-2">
										<label class="text-white">First Name</label><br />
										<input type="text"name="first1"class="formlist"value="<?php echo $row['fname'];?> "/>
									</div>

									<div class="form-group mt-2">
										<label class="text-white">Last Name</label><br />
										<input type="text"name="last1"class="formlist"value=" <?php echo $row['lname'];?> "/>
									</div>
                   
                   <div class="form-group mt-2">
										<label class="text-white">Date Of Birth</label><br />
										<input type="text"name="dob"class="formlist"value=" <?php echo $row['dob'];?> "/>
									</div>

									<div class="form-group mt-2">
										<label class="text-white">Email Address</label><br /> 
										<input type="text"name="email"class="formlist"value=" <?php echo $row['email'];?>"readonly="readonly"/>
									</div>

									
									<div class="form-group mt-2">
										<label class="text-white">Phone Number</label><br /> 
										<input type="text"name="phone"class="formlist"value=" <?php echo $row['phone'];?> "/>
									</div>

								
									<div class="form-group mt-2">
										<label class="text-white">Country</label><br />
										<input type="text"name="country"class="formlist"value=" <?php echo $row['country'];?>"/>
									</div>

                                    
                                    <div class="form-group mt-2">
										<label class="text-white">State</label><br />
										<input type="text"name="state" class="formlist"value=" <?php echo $row['state'];?>"/>
									</div>

									<div class="form-group mt-2">
										<label class="text-white">Address</label><br />
										<input type="text"name="waddress"class="formlist"value=" <?php echo $row['address'];?> "/>
									</div>

									<div style="margin-top: 10px" class="alert alert-warning" role="alert" >
					                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                      <span aria-hidden="true">&times;</span>
					                  </button>
					                 <input type="submit" name="save" class="crypt-button-red-full" value="Update Profile" />                 
					               </div>

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
    <script src="assets/js/bundle.js"></script></body>
</html>