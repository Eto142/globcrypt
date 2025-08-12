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
                                <a href = "/"> Home </a> 
                                /
                                <a href = "{{url('about')}}"> About us  </a>
                                /
                                <a href = "{{route('register')}}"> Sign up  </a>
                                /
                                <a href = "{{route('login')}}"> Login  </a>
                                /
                                <a href = " {{url('faq')}}"> FAQs  </a>
                                /
                                <a href = "{{url('trade')}}"> Trade  </a>
                                /
                                <a href = "{{url('icrypto')}}"> Cryptos  </a>
                                /
                                <a href = "{{url('indices')}}"> Indices  </a>
                                /
                                <a href = "{{url('iforex')}}"> Forex  </a>
                                /
                                <a href = "{{url('commodities')}}"> Energies  </a>
                                /
                                <a href = "{{url('shares')}}"> Shares  </a>
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
            </footer>
            <div class = "last-widget">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container" >
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                           "symbols": [
                           {
                              "proName": "FX_IDC:EURUSD",
                              "title": "EUR/USD"
                           },
                           {
                              "proName": "BITSTAMP:BTCUSD",
                              "title": "BTC/USD"
                           },
                           {
                              "proName": "BITSTAMP:ETHUSD",
                              "title": "ETH/USD"
                           }
                           ],
                           "colorTheme": "dark",
                           "isTransparent": false,
                           "displayMode": "adaptive",
                           "locale": "en"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->       
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="js/jquery-ui.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
            <script type="text/javascript" src="code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="slick/slick.min.js"></script>
            <!-- this is the code for the customize slick slider -->
            <script type="text/javascript" src="js/custom_slick.js"> </script>
            <script type="text/javascript" src="js/range-custom.js"> </script> 
            <!-- this is for the counter  -->
            <script type="text/javascript" src="js/counter.js"> </script>
            <script src="aos/dist/aos.js"></script>
            <script>
                let scrollRef = 0;
                
                window.addEventListener('scroll', function() {
                // increase value up to 10, then refresh AOS
                scrollRef <= 10 ? scrollRef++ : AOS.refresh();
                });
                
                AOS.init({
                  duration: 1200,
                });
                
            </script>
        <!-- This is the end of the wrapper section -->

              <!-- GetButton.io widget -->

<!-- /GetButton.io widget -->  


<script src="assets/js/theme.js"></script>
    <script src="particles.js-master/demo/js/app.js"></script>
    <script src="alert/js/jquery.fake-notification.min.js"></script>
 <script>
        $(document).ready(function() {
            $('#notification-1').Notification({
                // Notification varibles
                Varible1: ["Dirk", "Johnny", "Watkin ", "Alejandro",  "Vina",  "Tony",   "Ahmed","Jackson",  "Noah", "Aiden",  "Darren", "Isabella", "Aria", "John", "Greyson", "Peter", "Mohammed", "William",
                "Lucas", "Amelia", "Mason", "Mathew", "Richard", "Chris", "Mia", "Oliver"],
                Varible2: ["USA","UAE","ITALY", "FLORIDA",  "MEXICO",  "INDIA",  "CHINA",  "CAMBODIA",  "UNITED KINGDOM",  "GERMANY", "AUSTRALIA",  "BANGLADESH", "SWEDEN", "PAKISTAN", "MALDIVES", "SEYCHELLES", 
                "BOLIVIA",
                 "SOUTH AFRICA", "ZAMBIA", "ZIMBABWE", "LEBANESE", "SAUDI ARABIA", "CHILE", "PEUTO RICO"],
                
                Amount: [1000,2500,5550,6660,4440,3330,6767],                    
                Content: '[Varible1] from [Varible2] has just Earned <b>$[Amount]</b>.',
                // Timer
                Show: ['stable', 5, 10],
                Close: 5,
                Time: [0, 23],
                // Notification style 
                LocationTop: [true, '60%'],
                LocationBottom:[false, '10%'],
                LocationRight: [false, '10%'],                      
                LocationLeft:[true, '10px'],
                Background: '#000000',
                BorderRadius: 5,
                BorderWidth: 1,
                BorderColor: '#ffc552',
                TextColor: 'white',
                IconColor: '#ffffff',
                // Notification Animated   
                AnimationEffectOpen: 'slideInUp',
                AnimationEffectClose: 'slideOutDown',
                // Number of notifications
                Number: 40,
                // Notification link
                Link: [false, 'index.html', '_blank']
                
            });         
        });                 
    </script>
 <script src="js/toastr.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.min.js"></script>
    <script>


        setInterval(function(){
            let info = faker.helpers.createCard();
            let {name, email, address:{city,country,zipcode}} = info; 
            var amount = (Math.random()*100000).toFixed(2);
            var label_message = "<font color='white'>"+name+" who lives in city of "+city+","+country+". withdraw the sum of $"+amount+".</font>";
            var header_message = "<font color='white'>Recent Withdrawal!</font>";
            toastr["success"](label_message, header_message);
            
        }, 10000);
        //message
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "600",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    </script>

</script>

<script>
    $(window).on("load", function() {
      $(".load-icon").fadeOut();
      $(".pre-loader").delay(350).fadeOut("slow");
      $("body").delay(350).css({
         "overflow": "visible"
      });   
   });
</script>
    
  </body>
</html>