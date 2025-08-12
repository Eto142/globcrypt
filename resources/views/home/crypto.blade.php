@include('home.header')

  


<section class="wrapper">
    <section class="container-fluid bg-market">
        <div class="row">
            <div class="col-6 abt-us-txt">
                <h2 class="p-20 white">  Cryptocurrencies </h2>
            </div>
        </div>
        <!-- the body section that contain the text =============== -->
    </section>
    <!-- ============BREADCUMB================== -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="" class="lite-ash">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crypto</li>
        </ol>
    </nav>
    <br>
    <section class="container-fluid" >
        <div class="row">
            <div class="col-md-8 col-sm-12 col-crypto">
                <div class="container">
                    <br />
                    <h2 class="text-right t-h2"> Cryptocurrencies</h2>
                    <img src="images/crypto.jpg" style="padding: 20px;">
                    <div style="padding: 20px;">
                        <h3> What is a Cryptocurrency?</h3>
                        <p class="t-p">Cryptocurrencies (Crypto) are virtual currencies that typically use a decentralised network to carry out secure financial transactions. With Global Crypto Organization World Wide  trading platform you can trade Crypto – such as Bitcoin, Ripple XRP, Ethereum and more.</p>
                        <br />
                        <h3>Why Trade Cryptocurrencies with Global Crypto Organization World Wide </h3>
                        <p class="t-p">We offers all traders the opportunity to trade a wide range of top-ranked digital coins 24/7. Due to the massive popularity of cryptocurrencies over the past couple of years, they have become a conventional and popular asset. The main purpose of this new technology is to allow people to buy, trade and invest without having to rely on banks or any other financial institutions.</p>
                        <br />
                        <p>Discover all the advantages of trading cryptocurrencies with Global Crypto Organization World Wide  </p>
                        <br />
                        <ul class="crypto-list">
                            <li> <i class="fas fa-arrow-right"></i> <b> Start trading with as little as $500 </b> </li>
                            <li> <i class="fas fa-arrow-right"></i> <b> Benefit from a wide range of today’s top traded cryptocurrencies </b> </li>
                            <li> <i class="fas fa-arrow-right"></i> <b> No risk of wallet hacking or theft </b> </li>
                            <li> <i class="fas fa-arrow-right"></i> <b> Around-the-clock service </b> </li>
                        </ul>
                    </div>
                </div>
                <!-- end container -->
            </div>
            <!-- end column-->
            <div class="col-md-4 col-sm-12">
                <div class="pad-55"></div>
                <div class="container">
                    <!-- <div class="crypto-cat">
                        <div class="current-crypto">
                            <p> <i class="fas fa-arrow-alt-circle-right"></i> &nbsp Cryptocurrencies</p>
                        </div>
                        <a href="indices.html">
                            <div> Indices</div>
                        </a>
                        <a href="forex.html">
                            <div> Forex</div>
                        </a>
                        <a href="commodities.html">
                            <div> Commodities</div>
                        </a>
                        <a href="shares.html">
                            <div> Shares</div>
                        </a>
                        <a href="options-2.html">
                            <div> Options</div>
                        </a>
                        <a href="etfs.html">
                            <div> ETFs</div>
                        </a>
                        <br />
                        <div class="crypto-form">
                            <h3 class="text-center"> Have a Question?  </h3>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" class="plan-signup-crypto">Submit</button>
                            </form>
                        </div>
                    </div> -->
                    <div class="crypto-cat">
        <a href="{{url('crypto')}}">
            <div> Cryptocurrencies</div>
        </a>
        <a href="{{url('indices')}}">
            <div> Indices</div>
        </a>
        <!-- <div class="current-crypto">
            <div>Indices</div>
        </div> -->
        <a href="{{url('forex')}}">
            <div> Forex</div>
        </a>
        <a href="{{url('commodities')}}">
            <div> Commodities</div>
        </a>
        <a href="{{url('shares')}}">
            <div> Shares</div>
        </a>
        <a href="{{url('options')}}">
            <div> Options</div>
        </a>
        <a href="{{url('etf')}}">
            <div> ETFs</div>
        </a>
        <br />
        <div class="crypto-form">
            <h3 class="text-center"> Have a Question?  </h3>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email*">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="plan-signup-crypto">Submit</button>
            </form>
        </div>
    </div>			</div>
            </div>
            <!-- end the container --> 
        </div>
        <!-- end row -->
    </section>
    




        @include('home.footer')