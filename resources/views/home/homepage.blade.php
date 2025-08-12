@include('home.header')









<div class="clearfix"></div>
<!-- this is the design of the slider  -->
<section class="single-item">
    <div class="slider-img1">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1 class="slide-h1" data-aos="fade-up">
                <span style="font-weight: 700"> Highly Qualified <br/>
                Customer Support Department  </span>
                </h1>
                <p class="display-none-mobile">
                    Boost your profits with the power of 100X leverage. Go Long/Short on a secure and ultra-fast
                    platform.
                </p>
                <a href="{{route('login')}}">
                    <div class="create-acc c-sign-up">
                        <img src="images/icon/b-chart.png" class="float-left">
                        <p> Login </p>
                    </div>
                </a>

                <a style="margin-left: 10px" href="{{route('register')}}">
                    <div class="create-acc c-sign-up">
                        <img src="images/icon/b-chart.png" class="float-left">
                        <p> Register </p>
                    </div>
                </a>
                <div class="p-20"></div>
                <br/>
                <!-- <div class="learn-btc">
                    <button class="play-btn float-left" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                    <img src="images/icon/play-button.svg" >
                    </button>
                    <span> Click here to learn about <br />bitcoin </span>
                </div> -->
            </div>
            <!-- =====end the left section of the first slider ===== -->
            <!-- start of the tool widget area for this section  -->
            <div class="col-md-6 col-sm-12 nav-back mobile-none">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container ">
                    <div class="tradingview-widget-container__widget display-none-mobile"></div>
                    <script type="text/javascript"
                            src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                            async>
                        {
                            "colorTheme"
                        :
                            "dark",
                                "dateRange"
                        :
                            "12m",
                                "showChart"
                        :
                            true,
                                "locale"
                        :
                            "en",
                                "largeChartUrl"
                        :
                            "",
                                "isTransparent"
                        :
                            true,
                                "width"
                        :
                            "100%",
                                "height"
                        :
                            "500",
                                "plotLineColorGrowing"
                        :
                            "rgba(25, 118, 210, 1)",
                                "plotLineColorFalling"
                        :
                            "rgba(25, 118, 210, 1)",
                                "gridLineColor"
                        :
                            "rgba(42, 46, 57, 1)",
                                "scaleFontColor"
                        :
                            "rgba(120, 123, 134, 1)",
                                "belowLineFillColorGrowing"
                        :
                            "rgba(33, 150, 243, 0.12)",
                                "belowLineFillColorFalling"
                        :
                            "rgba(33, 150, 243, 0.12)",
                                "symbolActiveColor"
                        :
                            "rgba(33, 150, 243, 0.12)",
                                "tabs"
                        :
                            [
                                {
                                    "title": "Indices",
                                    "symbols": [
                                        {
                                            "s": "OANDA:SPX500USD",
                                            "d": "S&P 500"
                                        },
                                        {
                                            "s": "OANDA:NAS100USD",
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
                                            "s": "OANDA:UK100GBP",
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
                                    "title": "Bonds",
                                    "symbols": [
                                        {
                                            "s": "CME:GE1!",
                                            "d": "Eurodollar"
                                        },
                                        {
                                            "s": "CBOT:ZB1!",
                                            "d": "T-Bond"
                                        },
                                        {
                                            "s": "CBOT:UB1!",
                                            "d": "Ultra T-Bond"
                                        },
                                        {
                                            "s": "EUREX:FGBL1!",
                                            "d": "Euro Bund"
                                        },
                                        {
                                            "s": "EUREX:FBTP1!",
                                            "d": "Euro BTP"
                                        },
                                        {
                                            "s": "EUREX:FGBM1!",
                                            "d": "Euro BOBL"
                                        }
                                    ],
                                    "originalTitle": "Bonds"
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
            </div>
        </div>
        <!-- ===========End Row here ======================= -->
    </div>
    <!-- this is the end of the slider of each section  -->
    <div class="slider-img2">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <h1 class="slide-h1">
            <span style="font-weight: 700"> Trustworthy, Straightforward, and Pioneering
                </h1>
                <p class="display-none-mobile">
                    Trade Cryptocurrencies, Stock indexes, Commodities and Forex with a single Forex-based platform
                </p>
                <div class="p-20"></div>
                <a href="{{route('login')}}">
                    <div class="create-acc c-sign-up">
                        <img src="images/icon/b-chart.png" class="float-left">
                        <p> Login </p>
                    </div>
                </a>

                <a style="margin-left: 10px" href="{{route('register')}}">
                    <div class="create-acc c-sign-up">
                        <img src="images/icon/b-chart.png" class="float-left">
                        <p> Register </p>
                    </div>
                </a>
            </div>
            <!-- =====end the left section of the first slider ===== -->
            <!-- start of the tool widget area for this section  -->
            <div class="col-md-7 col-sm-12 ">
                <img src="images/slider/slider.png">
            </div>
        </div>
        <!-- ===========End Row here ======================= -->
    </div>
    <!-- this is the end of the slider of each section  -->
    <div class="slider-img3">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <h1 class="slide-h1">Premium Trading. Minimal Costs <br/>
                    <span style="font-weight: 600">trading with Global Crypto Organization World Wide  </span>
                </h1>
                <p class="display-none-mobile">
                    Find your trading opportunity in 3 easy steps
                </p>
                <ul class="slider-li">
                    <li><i class="fas fa-check" style="color: #52afee"> </i> &nbsp Open Account</li>
                    <li><i class="fas fa-check" style="color: #52afee"> </i> &nbsp Deposit</li>
                    <li><i class="fas fa-check" style="color: #52afee"> </i> &nbsp Start Trading</li>
                </ul>
                <br/>

                <a href="{{route('login')}}">
                    <div class="create-acc c-sign-up">
                        <img src="images/icon/b-chart.png" class="float-left">
                        <p> Login </p>
                    </div>
                </a>

                <a style="margin-left: 10px" href="{{route('register')}}">
                    <div class="create-acc c-sign-up">
                        <img src="images/icon/b-chart.png" class="float-left">
                        <p> Register </p>
                    </div>
                </a>
            </div>
            <!-- =====end the left section of the first slider ===== -->
            <!-- start of the tool widget area for this section  -->
            <div class="col-md-7 col-sm-12 ">
                <img src="images/slider/3-Assets.png">
            </div>
        </div>
        <!-- ===========End Row here ======================= -->
    </div>
    <!-- this is the end of the slider of each section  -->
</section>
<!-- ===========================================end the section slider ============================ -->
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener" target="_blank"><span
                    class="blue-text">Market Data</span></a> by TradingView
    </div>
    <script type="text/javascript"
            src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
        {
            "colorTheme"
        :
            "dark",
                "dateRange"
        :
            "12m",
                "showChart"
        :
            true,
                "locale"
        :
            "en",
                "largeChartUrl"
        :
            "",
                "isTransparent"
        :
            true,
                "width"
        :
            "100%",
                "height"
        :
            "500",
                "plotLineColorGrowing"
        :
            "rgba(25, 118, 210, 1)",
                "plotLineColorFalling"
        :
            "rgba(25, 118, 210, 1)",
                "gridLineColor"
        :
            "rgba(42, 46, 57, 1)",
                "scaleFontColor"
        :
            "rgba(120, 123, 134, 1)",
                "belowLineFillColorGrowing"
        :
            "rgba(33, 150, 243, 0.12)",
                "belowLineFillColorFalling"
        :
            "rgba(33, 150, 243, 0.12)",
                "symbolActiveColor"
        :
            "rgba(33, 150, 243, 0.12)",
                "tabs"
        :
            [
                {
                    "title": "Indices",
                    "symbols": [
                        {
                            "s": "OANDA:SPX500USD",
                            "d": "S&P 500"
                        },
                        {
                            "s": "OANDA:NAS100USD",
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
                            "s": "OANDA:UK100GBP",
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
                    "title": "Bonds",
                    "symbols": [
                        {
                            "s": "CME:GE1!",
                            "d": "Eurodollar"
                        },
                        {
                            "s": "CBOT:ZB1!",
                            "d": "T-Bond"
                        },
                        {
                            "s": "CBOT:UB1!",
                            "d": "Ultra T-Bond"
                        },
                        {
                            "s": "EUREX:FGBL1!",
                            "d": "Euro Bund"
                        },
                        {
                            "s": "EUREX:FBTP1!",
                            "d": "Euro BTP"
                        },
                        {
                            "s": "EUREX:FGBM1!",
                            "d": "Euro BOBL"
                        }
                    ],
                    "originalTitle": "Bonds"
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
<!-- the first column starts here  -->
<section class="container">
    <!-- ==========================Modal ===================================-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Learn About Forex</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="desktop-wrapper">
                        <iframe src="https://www.youtube.com/embed/Gc2en3nHxA4" allow="autoplay; encrypted-media"
                                allowfullscreen="" width="560" height="315" frameborder="0"></iframe>
                    </div>
                    ...
                </div>
            </div>
        </div>
    </div>
    <!-- ==========================Modal ===================================-->
    <!-- <link rel="stylesheet" href="aos/styles.css" /> -->
    <link rel="stylesheet" href="aos/dist/aos.css"/>
</section>
<!-- end the first colunm section of the wrapper -->
<!-- ========================================this is the step in registeration section ================================== -->
<section class="container">
    <h3 class="text-center" data-aos="fade-right"> How it works </h3>
    <br/>
    <div class="container how-it-work" data-aos="fade-up">
        <div class="row">
            <div class="col-md-4 col-sm-12 how-it-work-inner">
                <h5><span> <img src="images/icon/deposit.svg"> </span> Deposit</h5>
                <p class="lite-ash">
                    Open real account and add funds. We work with more than 20 payment systems.
                </p>
            </div>
            <div class="col-md-4 col-sm-12 how-it-work-inner">
                <h5><span> <img src="images/icon/choose.svg"> </span> Trade</h5>
                <p class="lite-ash">
                    Trade any of 100 assets and stocks. Use technical analysis and trade the news
                </p>
            </div>
            <div class="col-md-4 col-sm-12 how-it-work-inner">
                <h5><span> <img src="images/icon/withdraw-small.svg"> </span> Withdraw</h5>
                <p class="lite-ash">
                    Get funds easily to your bank card or e-wallet. We take no commission.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ========================================ENDS HERE this is the step in registeration section ================================== -->
<!-- =======================================features section ========================================================== -->
<section class="container" data-aos="fade-up">
    <h1>
    <span>
        <img src="images/icon/features.svg">
    </span>
        Features
    </h1>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <p class="lite-ash">
                We provide fastest trading using modern technologies. No delays in order executions and most
                accurate quotes. Our trading platform is available around the clock and on weekends.
                Global Crypto Organization World Wide customer service is available 24/7. We are continuously adding new financial
                instruments.
            </p>
        </div>
        <!-- end column here  -->
        <div class="col-md-6 col-sm-12">
            <ul class="lite-ash features-list">
                <li> Technical analysis tools: 4 chart types, 8 indicators, trend lines</li>
                <li> Social trading: watch deals across the globe or trade with your friends</li>
                <li> Over 100 assets including popular stocks</li>
            </ul>
        </div>
        <!-- end column here  -->
    </div>
    <!-- end row div here  -->
</section>
<!-- ======================================= END features section ========================================================== -->
<!-- ======================================== card features section ============================================== -->
<section class="card-layer">
    <div class="ft-card-1 mobile-none" data-aos="fade-up"></div>
    <!-- ===================== -->
    <div class="ft-card-2" data-aos="fade-up"></div>
    <!-- ===================== -->
    <div class="ft-card-3 mobile-none" data-aos="fade-up"></div>
    <!-- ===================== -->
    </div>
    <!-- end row here  -->
</section>
<!-- ========================================END  card features section ============================================== -->
<section class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12" data-aos="fade-right">
            <h1> Trade Forex, S&P 500, Gold, EURUSD and <br/>
                30+ assets
            </h1>
            <p>
                Get immediate access to cryptocurrencies, stock indices, commodities and forex with a single
                Forex-based platform
            </p>
            <a href="{{route('register')}}">
                <button type="button" class="btn btn-primary">Open Account For Free</button>
            </a>
            <br/>
        </div>
        <!-- end col -->
        <div class="col-md-6 col-sm-12 trade-instr table-responsive" data-aos="fade-left">
            <table class="table in-table lite-ash">
                <thead>
                <tr>
                    <th scope="col">Instrument</th>
                    <th scope="col">Leverage</th>
                    <th scope="col">Instrument</th>
                    <th scope="col">Leverage</th>
                </tr>
                </thead>
                <tbody>
                <tr class="ash-bg">
                    <td><img src="images/icon/instruments/btc.svg" alt="Bitcoin" class="m-4-neg">
                        <span> Bitcoin </span></td>
                    <td>100X</td>
                    <td><img src="images/icon/instruments/btc.svg" alt="fx" class="m-4-neg"> EURUSD</td>
                    <td> 1000X</td>
                </tr>
                <tr class="lite-ash-bg">
                    <td><img src="images/icon/instruments/eth.svg" alt="Ethereum " class="m-4-neg">
                        <span> Ethereum</span></td>
                    <td>100X</td>
                    <td><img src="images/icon/instruments/graph.svg" alt="S&P 500" class="m-4-neg"> S&P 500</td>
                    <td> 100X</td>
                </tr>
                <tr class="ash-bg">
                    <td><img src="images/icon/instruments/ltc.svg" alt="Litecoin" class="m-4-neg">
                        <span> Litecoin </span></td>
                    <td>100X</td>
                    <td><img src="images/icon/instruments/gold.svg" alt="GOLD" class="m-4-neg"> GOLD</td>
                    <td> 5000X</td>
                </tr>
                <tr class="lite-ash-bg">
                    <td><img src="images/icon/instruments/ripple.svg" alt="Ripple " class="m-4-neg">
                        <span> Ripple</span></td>
                    <td>100X</td>
                    <td><img src="images/icon/instruments/oil.svg" alt="CRUDE OIL" class="m-4-neg"> CRUDE OIL</td>
                    <td> 100X</td>
                <tr class="ash-bg">
                    <td><img src="images/icon/instruments/ltc.svg" alt="EOS" class="m-4-neg"> <span> EOS </span>
                    </td>
                    <td>100X</td>
                    <td><img src="images/icon/instruments/graph.svg" alt="JAPAN" class="m-4-neg"> JAPAN</td>
                    <td> 5000X</td>
                </tr>
                </tr>
                </tbody>
            </table>
            <a href="{{url('trade')}}" class="text-center lite-ash"> See all assets </a>
        </div>
    </div>
    <!-- end row -->
</section>
<!-- ================================================End of the first SEction ======================================= -->
<div class="p-20"></div>
<!-- to clear space -->
<!-- account set up  -->
<div class="m-20" data-aos="fade-up">
    <center>
        <a href="{{route('register')}}">
            <button type="button" class="btn btn-primary">Setup Your Trading Account</button>
        </a>
    </center>
    <br/>
    <p class="text-center"> It only takes 40 seconds. No KYC required.</p>
</div>
<!-- ============================================================================================================================ -->
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js"
        async>
    {
        "width"
    :
        "100%",
            "height"
    :
        "400",
            "colorTheme"
    :
        "dark",
            "currencies"
    :
        [
            "EUR",
            "USD",
            "JPY",
            "GBP",
            "CHF",
            "AUD",
            "CAD",
            "NZD",
            "CNY"
        ],
            "locale"
    :
        "en"
    }
</script>
</div>
<!-- TradingView Widget END -->
<!-- ============================================================================================================================ -->
<!-- ============================================================================================================================ -->
<!--  ==================================this is the VIP BLACK section page  ==============================-->
<section class="container-fluid abt-body">
    <div class="container">
        <h2> Profit from Market Ups & Downs </h2>
        <div class="row">
            <div class="col-md-4 col-sm-12 p-20">
                <div class="p-chart">
                    <img src="images/higher-chart.svg">
                </div>
            </div>
            <!-- end div-->
            <div class="col-md-4 col-sm-12">
                <div class="">
                    <p class="white p-text">
                        Global Crypto Organization World Wide allows you to actively trade most popular cryptocurrencies such as
                        Bitcoin, Ethereum, Ripple, Litecoin and more, profit from market rallies
                        and declines, or hedge your existing cryptocurrency holdings
                    </p>
                    <a href="{{route('register')}}">
                        <button type="button" class="btn btn-primary">Setup Your Trading Account</button>
                    </a>
                </div>
            </div>
            <!-- end div -->
            <div class="col-md-4 col-sm-12 p-20">
                <div class="p-chart">
                    <img src="images/lower-chart.svg">
                </div>
            </div>
            <!-- end div-->
        </div>
    </div>
    <div style="padding: 20px"></div>
</section>
<!-- end the about us section  -->
<!--  four column section with choose a package section  -->
<section class="container-fluid " id="account_types_section">
    <h3 style="text-align: center;"> Our Trading Account Types </h3>
    <div class="container-fluid">
        <div class="row" style="padding: 20px;">

            <div class="col-lg-3 col-md-6 col-sm-12 plan-wrap">
                <div class="col-plan-inner">
                    <div class="col-plan-head">
                        <div style="padding: 10px;"></div>
                        <h2> MINI PLAN </h2>
                        <p style="font-size: 32px">$500</b></p>
                    </div>
                    <div class="min-price">
                        <b>24x7 Support</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Professional Charts</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Return </b><br>
                        <span class="lt-blue"> <b>10%</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Trading Alerts </b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> INSURANCE</b><br>
                        <span class="lt-blue"> <b>100%</b> </span>
                    </div>

                    <div class="min-price" style="font-size: 28px">
                        <b> ROI:
                            <span class="lt-blue" > <b>$7,500</b> </span>
                    </div>
                    <!-- those values ontop of the .... -->
                    <div class="clearfix"></div>
                    <br/>
                    <a href="{{route('register')}}">
                        <div class="plan-signup">
                            <center>
                                Sign up &nbsp <i class="fas fa-user dark-gold"></i>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 plan-wrap">
                <div class="col-plan-inner">
                    <div class="col-plan-head">
                        <div style="padding: 10px;"></div>
                        <h2> SLIVER PLAN </h2>
                        <p style="font-size: 32px">$20,000</b></p>
                    </div>
                    <div class="min-price">
                        <b>24x7 Support</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Professional Charts</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Return </b><br>
                        <span class="lt-blue"> <b>15%</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Trading Alerts </b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> INSURANCE</b><br>
                        <span class="lt-blue"> <b>100%</b> </span>
                    </div>

                    <div class="min-price" style="font-size: 28px">
                        <b> ROI:
                            <span class="lt-blue" > <b>$117,500</b> </span>
                    </div>
                    <!-- those values ontop of the .... -->
                    <div class="clearfix"></div>
                    <br/>
                    <a href="{{route('register')}}">
                        <div class="plan-signup">
                            <center>
                                Sign up &nbsp <i class="fas fa-user dark-gold"></i>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 plan-wrap">
                <div class="col-plan-inner">
                    <div class="col-plan-head">
                        <div style="padding: 10px;"></div>
                        <h2> GOLD PLAN </h2>
                        <p style="font-size: 32px">$100,000</b></p>
                    </div>
                    <div class="min-price">
                        <b>24x7 Support</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Professional Charts</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Return </b><br>
                        <span class="lt-blue"> <b>60%</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Trading Alerts </b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> INSURANCE</b><br>
                        <span class="lt-blue"> <b>100%</b> </span>
                    </div>

                    <div class="min-price" style="font-size: 28px">
                        <b> ROI:
                            <span class="lt-blue" > <b>$420,000</b> </span>
                    </div>
                    <!-- those values ontop of the .... -->
                    <div class="clearfix"></div>
                    <br/>
                    <a href="{{route('register')}}">
                        <div class="plan-signup">
                            <center>
                                Sign up &nbsp <i class="fas fa-user dark-gold"></i>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 plan-wrap">
                <div class="col-plan-inner">
                    <div class="col-plan-head">
                        <div style="padding: 10px;"></div>
                        <h2> DIAMOND PLAN </h2>
                        <p style="font-size: 32px">$500,000</b></p>
                    </div>
                    <div class="min-price">
                        <b>24x7 Support</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Professional Charts</b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Return </b><br>
                        <span class="lt-blue"> <b>60%</b> </span>
                    </div>
                    <div class="min-price">
                        <b> Trading Alerts </b><br>
                        <span class="lt-blue"> <b>YES</b> </span>
                    </div>
                    <div class="min-price">
                        <b> INSURANCE</b><br>
                        <span class="lt-blue"> <b>100%</b> </span>
                    </div>

                    <div class="min-price" style="font-size: 28px">
                        <b> ROI:
                            <span class="lt-blue" > <b>$25,200,000</b> </span>
                    </div>
                    <!-- those values ontop of the .... -->
                    <div class="clearfix"></div>
                    <br/>
                    <a href="{{route('register')}}">
                        <div class="plan-signup">
                            <center>
                                Sign up &nbsp <i class="fas fa-user dark-gold"></i>
                            </center>
                        </div>
                    </a>
                </div>
            </div>


        </div>
        <!-- end conatiner -->
</section>
<!-- end main container -->
</section>
<!-- end wrapper -->
<!-- ======================================this is the section that has the embeded video ====================================== -->
<!-- This is the section that contain the trading widget  -->
<!-- ======================================================this is the count tis section ========================================= -->
<section class="container-fluid col-testimony">
    <!-- ==========================================this is the Payment Methods section=========================================== -->
    <div class="container col-pay-meth" id="we_accept_section">
        <h5 class="text-center"> WE ACCEPT </h5>
        <p class="text-center white"> Payment Methods for Deposit and withdrawal </p>
        <!-- <div class="row">
            <div class="col-md-3 col-sm-6">
                <img src="images/ethereum.png">
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="images/bitcoin.png">
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="images/litecoin.png">
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="images/perfect-money.png">
            </div>

        </div>
            -->

        <style type="text/css">
            @media (min-width: 320px) and (max-width: 480px) {

                /* CSS */
                .pay-logo {
                    width: 50%;
                    margin-bottom: 20px;
                }
            }
        </style>

        <div class="row pay-wrapper text-center">
            <div class="col-md-3 col-sm-6">
<!--                    <img src="images/accepts/banktransfer.png" class="pay-logo" style="width: 70%">-->
            </div> <!-- end colunm -->
<!--                <div class="col-md-3 col-sm-6">-->
<!--                    <img src="images/accepts/cash-app.png" class="pay-logo">-->
<!--                </div>-->
            <!-- end colunm -->
            <div class="col-md-3 col-sm-6">
                <img src="images/accepts/cypo.jpg" style="width: 70%" class="pay-logo">
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="images/accepts/banktransfer.png" class="pay-logo" style="width: 70%">
            </div>
<!--                <div class="col-md-3 col-sm-6">-->
<!--                    <img src="images/accepts/moneyg.png" class="pay-logo">-->
<!--                </div> -->
            <!-- end colunm -->
        </div>
<!--            <div class="row text-center">-->
<!--                <div class="col-md-3 col-sm-6 ">-->
<!--                    <img src="images/accepts/paypal.png" class="pay-logo">-->
<!--                </div> -->
<!--                -->
<!--                <div class="col-md-3 col-sm-6 ">-->
<!--                    <img src="images/accepts/western.png" class="pay-logo">-->
<!--                </div> -->
<!---->
<!--            </div>-->

    </div><!-- end container -->
    <!--==================== the coutis section starts here ========================= -->
</section>
<!-- =========================this is the testimony section ========================== -->
<section class="col-testimony-bg">
    <div class="container-fluid">
        <h3 class="text-center"> TESTIMONIES</h3>
        <p class="text-center">
            <i>Happy investors <span class="gold"> sharing</span> their testimonies </i>
        </p class="text-center">
        <div class="col-test-card">
            <!--  <div class="col-test-bg">
                 <img src="admin/testimony-images/4554.png" class="rounded-circle img-thumbnail float-left mum" width="100px">
                 <p class="text-left"> ? ?? ?????? ???????? ????? ????????? ?????.  ?????? ?????? ?????-????</p>
                 <h5 class="text-left"> Mary Nazarova</h5>
             </div> -->
            <div class="col-test-bg">
                <img src="admin/testimony-images/8671597592136.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> I got my first investment profit of $15k. Big thanks to you guys at Global Crypto Organization World Wide??</p>
                <h5 class="text-left"> Robert Pope </h5>
            </div>
            <div class="col-test-bg">
                <img src="admin/testimony-images/8211597591949.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> Big shout out to you guys at  Global Crypto Organization World Wide. I just got my Bitcoin back. I love you guyz Global Crypto Organization World Wide??</p>
                <h5 class="text-left"> Steve Walter </h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/4991597591857.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> Am indeed grateful. I want to thank you guys for keeping to your words</p>
                <h5 class="text-left"> Ruth Allison </h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/6981597591504.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> Thank you Global Crypto Organization World Wide. I&#39;m debt free. I have been able to repay my loan of $64,000????</p>
                <h5 class="text-left"> Veronica Keith </h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/4941597591323.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">Thank you Global Crypto Organization World Wide. You guys are amazing. I just recovered my lost bitcoin of 2.6BTC. ????</p>
                <h5 class="text-left"> Abraham willard </h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/4111597591055.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">Thank you Global Crypto Organization World Wide for keeping to your words. I invested with $2k and i just received an investment profit of $26k within a week. ???</p>
                <h5 class="text-left"> Jessica phel </h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/5761597590797.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">I want to thank Global Crypto Organization World Wide, i just received the sum of $17k from my investment. My whole family is indeed happy. I&#39;m hoping to invest big by next week.</p>
                <h5 class="text-left"> Fatimah Harmed </h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/5511597007223.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">I want to thank Global Crypto Organization World Wide, Thank you so much, I just made my first $20k. Thank you Global Crypto Organization World Wide.</p>
                <h5 class="text-left"> Steve Brutt</h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/5321597006964.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">I&#39;m now a super woman because of you guys. Thank you Global Crypto Organization World Wide.</p>
                <h5 class="text-left"> Hanna jackson</h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/5221597006888.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">Thank you Global Crypto Organization World Wide.</p>
                <h5 class="text-left"> Howard keil</h5>
            </div>


            <div class="col-test-bg">
                <img src="admin/testimony-images/6961597006775.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">You guys are amazing. Thank you now I&#39;m financially stable.Global Crypto Organization World Wide is the best.</p>
                <h5 class="text-left">Oliver moore</h5>
            </div>

            <div class="col-test-bg">
                <img src="admin/testimony-images/6391597006127.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left">You guys are indeed amazing Global Crypto Organization World Wide is the best.</p>
                <h5 class="text-left">Sarah Petterson</h5>
            </div>


            <div class="col-test-bg">
                <img src="admin/testimony-images/1929.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> They Offer More Profitable Returns Than And Other Competitors. Their Support
                    And Services Are Great And Transparent</p>
                <h5 class="text-left"> Gerald Macey </h5>
            </div>
            <div class="col-test-bg">
                <img src="admin/testimony-images/3806.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> Wow! I got real profits from Global Crypto Organization World Wide. Keep up the good work.</p>
                <h5 class="text-left"> Allan Johnson</h5>
            </div>
            <div class="col-test-bg">
                <img src="admin/testimony-images/8871.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> My Family And Me Want To Thank You For Helping Us Find A Great Opportunity To
                    Make Money Online. Very Happy With How Things Are Going!</p>
                <h5 class="text-left"> Jamie Swayne</h5>
            </div>
            <div class="col-test-bg">
                <img src="admin/testimony-images/723.png" class="rounded-circle img-thumbnail float-left mum"
                     width="100px">
                <p class="text-left"> Estoy muy feliz de haber cambiado pips iniciales, y Global Crypto Organization World Wide es lo
                    mejor.</p>
                <h5 class="text-left"> Lawrence Bruce</h5>
            </div>
        </div> <!--========================== end of the slick div container ==================================-->
    </div> <!-- end of the container fluid -->
    <!--  <a href = "https://capitalelitepro.com/video-testimony.php" target= "_blank">
<div class="view-vid">
<button class="play-btn float-left" type="button" >
<img src="images/icon/play-button.svg" >
</button>
<span> Click here to view video Testimony</span>
</div>
</a>  -->


    <div class="container-fluid abt-p-txt">
<section class=" col-testimony-bg">
    <div class="container-fluid">
        <h3 class="text-center"> TESTIMONIES</h3>
        <p class="text-center">
            <i>Happy investors <span class="gold"> sharing</span> their testimonies </i> 
            </p class="text-center">
    </div>
    <!-- end of the container fluid -->
    <!-- =================================This is the strat of the video testimony section =========================== -->
    <h3 class="text-center">TESTIMONIES(VIDEOS)</h3>
    <div class="col-test-video">
        <div class="col-test-bg" >
            <div class="embed-responsive embed-responsive-4by3">
                <video controls="true" class="embed-responsive-item">
                    <source src="admin/video/1885.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="col-test-bg" >
            <div class="embed-responsive embed-responsive-4by3">
                <video controls="true" class="embed-responsive-item">
                    <source src="admin/video/3208.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="col-test-bg" >
            <div class="embed-responsive embed-responsive-4by3">
                <video controls="true" class="embed-responsive-item">
                    <source src="admin/video/7390.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="col-test-bg" >
            <div class="embed-responsive embed-responsive-4by3">
                <video controls="true" class="embed-responsive-item">
                    <source src="admin/video/9099.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="col-test-bg" >
            <div class="embed-responsive embed-responsive-4by3">
                <video controls="true" class="embed-responsive-item">
                    <source src="admin/video/8321.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <!-- end row-->
    <!-- =================================This is the end of the video testimony section =========================== -->
</section>
</div>
    <div class="clear-fix"></div>
    <!-- ========================================================= start latest Trade option ===================================================== -->
    <!-- ===============================DESPOSIT SECTION ============================== -->
    <div class="col-md-7 trade-option-1 table-responsive-sm">
        <h4><img src="images/withdrawals.png"> LATEST WITHDRAWALS<!-- Global Crypto Organization World Wide  --> </h4>
        <table class="table" style="color: #fff;">
            <thead class="t-color-1">
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">Gateway</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Time</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div> <!-- end table column responsive small division -->
    <!-- ====================WITHDRAWAL SECTION -======================== -->
    <!-- ========================================================= End latest Trade option ===================================================== -->
</section>
</div>
<!-- footer -->
        <!-- footer -->
        <!-- this is the begining of the footer section  -->
        <footer>
            <div class="container">
                <div class = "p-20"> </div>
                <!-- this is the image section for the logo  -->
                <div class ="footer-logo float-left"> 
                    <img src ="images/logo.png" alt = "Global Crypto Organization World Wide.  ">
                </div>
                <!-- this image is for the secuse ssl  -->
                <div class ="footer-logo float-right"> 
                    <img src ="images/ssl.png" alt = "Global Crypto Organization World Wide.  ">
                </div>
                <div class = "clear-fix"> </div>
                <hr>

                                        <div class="row">
                        <div class = "col-md-3 footer-link">
                            <span> Are you looking for a stable, 
                            reliable, guaranteed weekly income? Global Crypto Organization World Wide. offers a range of options 
                            to make the most off your investment. Get involved to discover the power of trading.
                        </div>
                        <div class = "col-md-6 footer-link footer-list">
                            <a href = "index.html"> Home </a> 
                            /
                            <a href = "about.html"> About us  </a>
                            /
                            <a href = "{{route('register')}}"> Sign up  </a>
                            /
                            <a href = "{{route('login')}}"> Login  </a>
                            /
                            <a href = " faq.html"> FAQs  </a>
                            /
                            <a href = " trade.html"> Trade  </a>
                            /
                            <a href = "crypto.html"> Cryptos  </a>
                            /
                            <a href = " indices.html"> Indices  </a>
                            /
                            <a href = "forex.html"> Forex  </a>
                            /
                            <a href = "commodities.html"> Energies  </a>
                            /
                            <a href = " shares.html"> Shares  </a>
                            <br />
                            <br />
                           
                        </div>
                        <div class = "col-md-3 footer-link">
                            <span> About Global Crypto Organization World Wide.     <br />
                            Global Crypto Organization World Wide.   is totally different from its competitors trying to achieve something special starting with the 
                            website design, trading platform, and extremely functional.
                        </div>
                    </div>

                                           
                                   

                <div class="row">
                    <div class="text-center">
                         <h6> Contact Information </h6>
                        <span style = "font-size: 1em">
                        <a href ="tel: ">
                        <i class="fa fa-phone fa-icons"> </i>                      </a>
                        </span>
                        / &nbsp
                        <span style = "font-size: 1em">
                        <a>
                        <i class="fas fa-map-marker-alt"></i> Level 20 Heron Tower, 52 gate town, London EC2N 4AY        </a>
                        </span>
                        / &nbsp
                        <span style = "font-size: 1em">
                        <a href ="mailto:info@Global Crypto Organization World Wide..com">
                        <i class="fas fa-envelope"></i>support@Global Crypto Organization World Wide.com                    </a>
                        </span>
                    </div>
                </div>
                <!-- end container row -->
                <br /> 
                <hr>
            
            </div>
            <div class = "p-20"> </div>


     
    @include('home.footer')
    
