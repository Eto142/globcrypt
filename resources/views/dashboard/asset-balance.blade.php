@include('dashboard.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
                                        
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
					<div class="mt-2 mb-4">
						<h1 class="title1 text-dark">Crypto Exchange</h1>
					</div>
					<div>
    </div>					<div>
    </div>					<div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-75" src="https://img.icons8.com/office/16/000000/us-dollar--v2.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>$5.00</b></h5>
                                        <small class="text-muted">Account Balance</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                  <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/color/48/000000/bitcoin--v1.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 BTC</b></h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                        						                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/fluency/48/000000/ethereum.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 ETH</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                                                                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/fluency/48/000000/litecoin.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 LTC</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                                                                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/cotton/64/000000/chainlink.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 LINK</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        
                                                <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1839.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 BNB</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        
                                                <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://s2.coinmarketcap.com/static/img/coins/64x64/2010.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 ADA</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        
                                                <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-25" src="https://dynamic-assets.coinbase.com/6ad513d3c9108b163cf0a4c9fd3441cadcb9cf656ea7b9fb333eb7e4a94cd503528e0a94188285d31aedfc392f0793fd4161f7ad4e04d5f6b82e4d70a314d295/asset_icons/80f3d2256652f5ccd680fc48702d130dd01f1bd7c9737fac560a02949efac3b9.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 AAVE</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                                                                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/color/48/000000/tether--v2.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 USDT</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                                                                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-75" src="https://img.icons8.com/material-sharp/24/000000/bitcoin.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 BCH</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                                                                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/fluency/48/000000/ripple.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 XRP</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                                                                        <div class="col-sm-6 col-lg-3">
                            <div class="p-3 card bg-light shadow">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 bg-transparent stamp stamp-md">
                                        <img class="w-50" src="https://img.icons8.com/ios/50/000000/stellar.png"/>
                                    </span>
                                    <div>
                                        <h5 class="mb-1 text-dark"><b>0 XLM</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        					</div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="tradingview-widget-container">
                                <div id="tradingview_f933e"></div>
                                <div class="tradingview-widget-copyright">
                                    <a href="#" rel="noopener" target="_blank"><span class="blue-text"></span> <span class="blue-text">Personal trading chart</span></a>
                                </div>                 
                            </div>
                        </div>
                        <div class="col-md-4">
                        <form method="post" action="{{url('trading')}}" >
												{{csrf_field()}}
                                        <div class="form-group">
                                    <h5 class="text-dark">Source Account</h5>
                                    <select  class="form-control text-dark bg-light" name="source" id="sourceasset">
                                                                                <option value="BTC/USD">BTC/USD</option>
                                                                                <option value="ETH/BTC">ETH/BTC</option> 
           
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5 class="text-dark">Entry Price</h5>
                                    <input type="text" name="entry_price" class="form-control text-dark bg-light" placeholder="Enter entry price" id="amount">
                                </div>
                                <div class="form-group">
                                    <h5 class="text-dark">Take Profit</h5>
                                    <input type="text" name="take_profit" class="form-control text-dark bg-light" placeholder="Take Profit" id="amount">
                                </div>
                                <div class="form-group">
                                    <h5 class="text-dark">Stop loss</h5>
                                    <input type="text" name="stop_loss" class="form-control text-dark bg-light" placeholder="Stop Loss" id="amount">
                                </div>                               
                                <div class="cta inline-group">
                                    <button class="btn btn-success btn-block btn-sm" name="buy">
                                        Buy
                                    </button>
                                    <button class="btn btn-danger btn-block btn-sm" name="sell">
                                        Sell
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
            function Market(market) {
                new TradingView.widget({
                    "width": "100%",
                    "height": "400",
                    "symbol": market,
                    "interval": "1",
                    "timezone": "Etc/UTC",
                    "theme": 'light',
                    "style": "9",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "hide_side_toolbar": false,
                    "allow_symbol_change": true,
                    "calendar": false,
                    "container_id": "tradingview_f933e"
                });
            }
            
            
        </script>

        <script>
    //load chart
    Market("BINANCE:BTCUSD");
            
    let destinationasset = document.getElementById('destinationasset');
    let sourceasset = document.getElementById('sourceasset');
    let amount = document.getElementById('amount');
    let quatity = document.getElementById('quantity');
    // console.log(destinationasset);

    destinationasset.addEventListener('change', validate);
    sourceasset.addEventListener('change', validate);
    if (destinationasset.value == sourceasset.value) {
        $.notify({
            // options
            icon: 'flaticon-alarm-1',
            title: 'Success',
            message: 'Source and Destination account cannot be thesame',
        },{
            type: 'danger',
        });
                
        destinationasset.value = '';
        amount.placeholder = '';
        quatity.placeholder = '';
        amount.value = '';
        quatity.value = '';
    } else {
        amount.placeholder = `Enter amount of ${sourceasset.value}`;
        quatity.placeholder = `Quantity of ${destinationasset.value}`;

    }
    function validate(){
        Market("BINANCE:"+sourceasset.value.toUpperCase()+"USD");
        amount.value = '';
        quatity.value = '';
        if (destinationasset.value == sourceasset.value) {
            $.notify({
                // options
                icon: 'flaticon-alarm-1',
                title: 'Success',
                message: 'Source and Destination account cannot be thesame',
            },{
                type: 'danger',
            });
                  
            destinationasset.value = '';
            amount.placeholder = '';
            quatity.placeholder = '';
            amount.value = '';
            quatity.value = '';
        } else {
            amount.placeholder = `Enter amount of ${sourceasset.value}`;
            quatity.placeholder = `Quantity of ${destinationasset.value}`;

        }
    }

    amount.addEventListener('keyup', getQuantity);

    function getQuantity(){
        let uurl = "https://trader.digitalcryptocurrencytrade.com/dashboard/asset-price" + '/' + sourceasset.value  + '/' + destinationasset.value+ '/' + amount.value;
        $.ajax({
            url: uurl,
            type: 'GET',
            
            success: function(response) {
                if (response.status === 200) {
                    //console.log(response.data);
                    quatity.value = response.data + ' ' + destinationasset.value;
                    document.getElementById('realquantity').value = response.data;
                }
            },
            error: function(error) {
                console.log(error);
            },
    
        });
    }

    $('#exchnageform').on('submit', function(event) {
        event.preventDefault();
        if (amount.value == '') {
            $.notify({
                // options
                icon: 'flaticon-alarm-1',
                title: 'Success',
                message: 'Please Enter an Amount to Exchange',
            },{
                type: 'danger',
            });
        }else{
            $.ajax({
                url: "https://trader.digitalcryptocurrencytrade.com/dashboard/exchange",
                type: 'POST',
                data: $('#exchnageform').serialize(),
                success: function(response) {
                    if (response.status === 200) {
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Success',
                            message: response.success,
                        },{
                            type: 'success',
                        });

                        setTimeout(function(){ window.location.reload(true);}, 3000);
                        
                    } else {
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Error',
                            message: response.message,
                        },{
                            type: 'danger',
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                },
        
            });
        }
        
    });
    
</script>	

@include('dashboard.footer')