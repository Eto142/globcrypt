
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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">	<title>Trade History - Elitetrdmarkets</title>
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
                                href="{{url('tradehistory')}}"
                                role="tab" 
                                aria-controls="v-pills-zilliqua-btc-history" 
                                aria-selected="false">
                                    <i class="pe-7s-clock"></i> All Trade History
                            </a>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-zilliqua-btc-tabContent">
                            <!-- history -->
                              <div class="tab-pane fade show active" id="v-pills-zilliqua-btc-history" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-history-tab">
                                  <div>
                                      <h4 class="text-white">
                                          <span class="">Demo Trading History</span><br />
                                      </h4>
                                      <table class="table table-striped">
                                          <thead>
                                            <tr>
                                                  <th scope="col">Trade Amount</th>
                                                  <th scope="col">Asset</th>
                                                  <th scope="col">Currency</th>
                                                  <th scope="col">Position</th>
                                                  <th scope="col">Profit Amount</th>
                                                  <th scope="col">Loss Amount</th>
                                                  <th scope="col"> Transaction Date</th>
                                                  <th scope="col">Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <script type="text/javascript">                                             <tr>
                                                  <td>
                                                    {amt}
                                                  </td>
                                                  <td>ALGO-BTC  </td>
                                                  <td> ${tradeType}
                                                     </td>
                                                  <td>Buy  </td>

                                                  <td>
                                                      $0.00  
                                                  </td>
                                                  <td>
                                                      $40.00  
                                                  </td>

                                                  <td>

                                                      2023-09-02 14:52:40												      
                                                  </td>
                                                  <td>
                                                      Loss												      </td>
                                                </tr>
                                                                                         <tr>
                                                  <td>
                                                      $90.00 
                                                  </td>
                                                  <td>BCH-BTC  </td>
                                                  <td>Crypto Currency  </td>
                                                  <td>Sell  </td>

                                                  <td>
                                                      $0.00  
                                                  </td>
                                                  <td>
                                                      $90.00  
                                                  </td>

                                                  <td>

                                                      2023-09-02 14:53:35												      
                                                  </td>
                                                  <td>
                                                      Loss												      </td>
                                                </tr>
                                            </script>
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

	<script type="text/javascript" src="jss/cute-alert-master/cute-alert.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){

			$(".sub").click(function() {

				//buy
				var amt=  parseInt( $("#amtBuy").val() );
				var user = $('#userId').val();
				
				var bonus = parseInt( $('#txt_demoBonus').val() );
				var bal = parseInt( $('#txt_demoBal').val() );

				var e = document.getElementById("curr");
				var cur1 = e.value;

				var ast1=$("#ast1").val();
				var trd1=$("#trd1").val();

				
				if ($("#amtBuy").val() == '') {
					cuteAlert({
						type: "error",
						title: "Enter A Valid Amount",
						message: "You cannot place trade. <br> Enter a valid amount to trade <br> Contact Support for Help.",
						buttonText: "Okay"
					});
					return;
				}

				if (bal <= amt) {
					cuteAlert({
						type: "error",
						title: "Demo Balance Is To Low",
						message: "You cannot place trade. <br> Your demo trading balance is low <br> Contact Support for Help.",
						buttonText: "Okay"
					});
					return;
				}

				placeTrade('Buy', bal, bonus, user, amt, cur1, ast1, trd1);
			});


			$(".sub2").click(function() {
				// sell
				var amt=  parseInt( $("#amtSell").val() );
				// var user = $(this).data('user');
				var user = $('#userId').val();
				var bonus = parseInt( $('#demoBonus').html() );
				var bal = parseInt( $('#demoBal').html() );

				var cur2=$("#curr2").val();
				var ast2=$("#ast2").val();
				var trd2=$("#trd2").val();


				if ($("#amtSell").val() == '') {
					cuteAlert({
						type: "error",
						title: "Enter A Valid Amount",
						message: "You cannot place trade. <br> Enter a valid amount to trade <br> Contact Support for Help.",
						buttonText: "Okay"
					});
					return;
				}

				if (bal <= amt) {
					cuteAlert({
						type: "error",
						title: "Balance Is To Low",
						message: "You cannot trade <br> Your balance is too low <br> Contact Support for Help.",
						buttonText: "Okay"
					});
					return;
				}
				placeTrade('Sell', bal, bonus, user, amt, cur2, ast2, trd2);
			});


			function placeTrade(tradeType, bal, bonus, user, tradeAmt, curr, ast2, trd1){
			
				var amt= parseFloat( tradeAmt, 10).toFixed(2);
				if ( amt < 1 ) {
					cuteAlert({
						type: "error",
						title: "Amount invalid",
						message: "Your trading amount is invalid. <br> Please enter a valid trading amount",
						buttonText: "Okay"
					});
					return;
				}else if(!ast2){
					cuteAlert({
						type: "error",
						title: "Select Asset",
						message: "Please select the asset before trading.",
						buttonText: "Okay"
					});
					return;
				}

				cuteAlert({
				  type: "question",
				  title: `<strong> Are you sure you want to place trade? </strong>`,
				  message: `
				  	Asset Type: ${ast2}.<br>
				  	Order Place @ ${tradeType} Position. <br> 
				  	Amount: $${amt}. <br>
				  	`,
				  confirmText: "Yes!",
				  cancelText: "No, Go Back"
				}).then((e)=>{
					if ( e == ("confirm")){

					  	var sec_2 = parseInt(trd1) + 2000;
					  	var sec_4 = parseInt(trd1) + 4000;
					  	var sec_6 = parseInt(trd1) + 6000;
					  	var sec_8 = parseInt(trd1) + 8000;
					  	var sec_10 = parseInt(trd1) + 12000;

					  	$.Toast.showToast({
							"title":"<h3>CONNECTING TO TRADING SERVER.. <br> <br> PLEASE WAIT </h3>",
							"duration": trd1
						});
					  
					  	
					  	setTimeout(function(){
					  		cuteToast({
							  type: "error", // or 'info', 'error', 'warning'
							  message: `Trade Placed. <br> Opened ${tradeType}: $${amt}`,
							  timer: 4000
							});
					  	}, sec_2);


						setTimeout(function() {
							cuteToast({
							  type: "success", // or 'info', 'error', 'warning'
							  message: `Trade Executed Successfully. <br> Opened ${tradeType}: $${amt}`,
							  timer: 6000
							})
						}, sec_4);

						setTimeout(function() {
							cuteAlert({
							  type: "success",
							  title: `<strong>Trade Executed! </strong>`,
							  message: `
							  	Asset Type: ${ast2}.<br>
							  	Order Place @ ${tradeType} Position. <br> 
							  	Amount: $${amt}. <br>
							  	<br>Check your demo trading history result. 
							  	`,
							});
							setTimeout(function(){
								$('.alert-close').click();
							}, 5000);
						}, sec_8);
						updateBalance({amount: amt, asset: ast2, currency: curr, time: trd1, user: user, position: tradeType});
					} 
				})
			}


			function updateBalance({amount, asset,currency,time, user, position}){
				$.ajax({
			    url:'tradehistory',
			    data:{
			    	amount, 
					asset,
					currency,
					time,
					user,
					position
			    },
			    type:'POST',
			    success: function(data) {
			    	var trd1=time;
			    	var ts = parseInt(trd1) + 6000;
			    	
			    	setTimeout(function() {
				    	if (data.status == true || data.status == 'true') {
			    		 	$("#result").html(data);
					      	$('#demoBal').html(parseInt(data.balance).toFixed(2));
					      	$('#txt_demoBal').val(data.balance);
					      	$('#demoBonus').html(parseInt(data.bonus).toFixed(2));
					      	$('#txt_demoBonus').val(data.bonus);
				    	}
			    	}, ts);
			    },
			    error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
			  });
			}

		});

	</script>