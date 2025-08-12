@include('home.header')




<br>
<section class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-sm-12 col-crypto">
			<div class="container">
				<br />
				<h2 class="text-right t-h2"> Options </h2>
				<img src="images/item-options.png" >
				<div style="padding: 20px;">
					<h3> <b> Options </b></h3>
					<p class="t-p">These are contracts that gives the owner the right to buy or sell an asset at a fixed price, called the strike price, for a specific period of time. The “asset” may be several kinds of underlying securities. Some of the most common ones are stocks, indexes, or ETFs. That period of time could be as short as a day or as long as a couple of years, depending on the option. The seller of the option contract receives the payment from the buyer and then takes on an obligation to take the opposite side of the trade if the owner chooses to buy or sell the asset. Keep in mind, we don’t charge a fee for closing options positions that are 5¢ or below..</p>
					<br />
					<p>Discover all the advantages of trading with Global Crypto Organization World Wide :</p>
					<br />
					<ul class="crypto-list">
						<li> <i class="fas fa-arrow-right"></i> <b> Start trading with as little as $500</b> </li>
						<li> <i class="fas fa-arrow-right"></i> <b>Benefit from a wide range of today’s top traded cryptocurrencies. </b></li>
						<li> <i class="fas fa-arrow-right"></i> <b>No risk of wallet hacking or theft  </b> </li>
						<li> <i class="fas fa-arrow-right"></i> <b> Around-the-clock service</b> </li>
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
    
