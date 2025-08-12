@include('dashboard.header')



<br>
<br>
<br>
<!-- End Sidebar -->
<div class="main-panel">
  <div class="content">
    <!-- Session Messages -->
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
    @endif
    
    <br>

    <!-- Payment Details Section -->
    <div class="card text-center">
      <div class="mt-2 mb-4">
        <h6 class="title1 text-dark">{{$item}} Payment</h6>
      </div>
      <div class="mt-2 mb-4">
        <p class="title1 text-primary">SEND
          @if($item=='Bitcoin')
          <strong>{{$btc_amount}}</strong>
          @elseif($item=='Ethereum')
          <strong>{{$eth_amount}}</strong>
          @endif
          {{$item}} TO THE WALLET ADDRESS BELOW OR
          SCAN THE QR CODE WITH YOUR WALLET APP
        </p>
      </div>
      <div class="card-body">
        <!-- Wallet Address and QR Code -->
        @if($item=='Bitcoin')
        @foreach($payment as $payments)
        <input type="text" id="myInput1" class="form-control" style="color: black;" class="text-dark" value="{{$payments->btc_address}}" readonly>
        <img src="{{asset('manager/uploads/manager/'.$payments->btcImage)}}" width="20%" height="20%" />
        @endforeach
        @elseif($item=='Usdt')
        @foreach($payment as $payments)
        <input type="text" id="myInput1" class="form-control" style="color: black;" class="text-dark" value="{{$payments->usdt_address}}" readonly>
        <img src="{{asset('manager/uploads/manager/'.$payments->usdtImage)}}" width="20%" height="20%" />
        @endforeach
        @elseif($item=='Ethereum')
        @foreach($payment as $payments)
        <input type="text" id="myInput1" class="form-control" style="color: black;" class="text-dark" value="{{$payments->eth_address}}" readonly>
        <br>
        <img src="{{asset('manager/uploads/manager/'.$payments->ethImage)}}" width="20%" height="20%" />
        @endforeach
        @endif
        <br>
        <br>
        <!-- Copy Address Button -->
        <button class="btn btn-primary" type="button" id="button-addon2" onclick="copyAdr1()">Copy Address</button>
      </div>
    </div>

    <!-- Payment Proof Upload Section -->
    <div class="col card">
      <div>
        <center>
          <form action="{{ url('/make-deposit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <h5 class="text-dark">Upload Payment proof after payment.</h5>
              <input type="file" name="image" class="form-control col-lg-4 text-dark" required>
            </div>
            <input type="hidden" name="amount" value="{{$amount}}">
            <input type="hidden" name="payment_method" value="{{$item}}">
            <div class="form-group">
              <input type="submit" class="btn btn-dark" value="Confirm Payment">
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function copyAdr(){
        var copyText = document.getElementById("myInput");
         copyText.select();


        /* Copy the text inside the text field */
        document.execCommand("copy");
         copyText.setSelectionRange(0, 99999);
         navigator.clipboard.writeText(copyText.value);

        }

          function copyAdr1(){
        var copyText = document.getElementById("myInput1");
         copyText.select();


        /* Copy the text inside the text field */
        document.execCommand("copy");
         copyText.setSelectionRange(0, 99999);
         navigator.clipboard.writeText(copyText.value);

        }


  function copyAdr2(){
        var copyText = document.getElementById("myInput2");
         copyText.select();


        /* Copy the text inside the text field */
        document.execCommand("copy");
         copyText.setSelectionRange(0, 99999);
         navigator.clipboard.writeText(copyText.value);

        }

</script>





<script type="text/javascript">
    function copyAdr1() {
        var copyText = document.getElementById("myInput1");
        copyText.select();
        /* Copy the text inside the text field */
        document.execCommand("copy");
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        
        // Change button text to "Copied" after copying
        var button = document.getElementById("button-addon2");
        button.innerText = "Copied";
        button.disabled = true; // Disable button after clicking
    }
</script>

@include('dashboard.footer')