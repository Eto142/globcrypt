@include('home.header')


<br>
<section class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-crypto">
            <div class="container">
                <br />
                <h2 class="text-right t-h2"> Commodities</h2>
                <img src="images/item-indices.png" >
                <div style="padding: 20px;">
                    <h3> <b> Commodities</b></h3>
                    <p class="t-p">Trading commodities is one of the most ancient trading practices in the world, dating back thousands of years. Commodities are unique, given that they have a real-world physical representation. Whether it’s an energy source, such as oil, or a precious metal like gold or platinum, commodities exist in the real world and therefore are also affected by real-world events. For example, if oil reservoirs are in surplus, it is likely that prices will drop accordingly. Additionally, some commodities are considered safe-haven assets, meaning they can add stability to a portfolio which consists of highly-volatile assets. For example, many foreign currency traders turn to gold futures when the market becomes too volatile, as gold prices are more stable overall, while still relating to the foreign-exchange market.</p>
                    <br />
                    <p> Some of our popular Commodities include:</p>
                    <br />
                    <ul class="crypto-list">
                        <li> <i class="fas fa-arrow-right"></i> <b> Oil</b> </li>
                        <li> <i class="fas fa-arrow-right"></i> <b> Gold </b></li>
                        <li> <i class="fas fa-arrow-right"></i> <b> Gas  </b> </li>
                    </ul>
                </div>
            </div>
            <!-- end container -->
        </div>
        <!-- end column-->
        <div class="col-md-4 col-sm-12">
            <div class="pad-55"></div>
            <div class="container">
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
</div>          </div>
        </div>
        <!-- end the container --> 
    </div>
    <!-- end row -->
</section>





  
        @include('home.footer')