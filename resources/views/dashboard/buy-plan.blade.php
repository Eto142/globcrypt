@include('dashboard.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Plans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0c1631;
            color: #ffffff;
            margin: 0;
             margin-top: 100px;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .plan {
            background-color: #101c44;
            border: 1px solid #2c3b63;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: left;
        }

        .plan h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #00d1ff;
        }

        .plan .amount {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .plan .feature {
            margin-bottom: 8px;
        }

        .plan .feature span {
            color: #00d1ff;
        }

        .plan form {
            margin-top: 20px;
        }

        .plan input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #2c3b63;
            border-radius: 4px;
            background-color: #0c1631;
            color: #ffffff;
        }

        .plan input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00d1ff;
            border: none;
            border-radius: 4px;
            color: #0c1631;
            font-weight: bold;
            cursor: pointer;
        }

        .plan input[type="submit"]:hover {
            background-color: #008db3;
        }

        .status {
            margin-top: 10px;
            padding: 10px;
            background-color: #1d305b;
            border-radius: 4px;
        }

        .status.active {
            color: #00ff00;
        }

    </style>
</head>
<body>
    
    
    <div class="container">
        <div class="title">Available Packages</div>
        <a  href="{{url('investment-history')}}">Investment History</a>
        <div class="mb-5 row">
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
        <!-- Basic Package -->
        <div class="plan">
            <h2>Basic Package</h2>
            <div class="amount">Amount: $200.00</div>
             <div class="feature">Minimum: <span>$200.00 - $9,900</span></div>
            <div class="feature">ROI: <span>35% Hourly</span></div>
               <div class="feature"><span>Junior Trader Available to Copy</span></div>
            <!--<div class="status active">Status: Active</div>-->

           <form action="{{url('/buy-plan')}}" method="post">
            @csrf
                <input type="hidden" name="plan_name" value="Basic">
                <input type="hidden" name="plan_duration" value="2 Days">
                 <input type="hidden" name="status" value="1">
                <input type="number" name="amount" min="200" max="9900" placeholder="Enter Amount" value="" style="color: white;" required>
                <input type="submit" value="Join Plan">
            </form>
        </div>

        <!-- Silver Package -->
        <div class="plan">
            <h2>Silver Package</h2>
            <div class="amount">Amount: $10,000</div>
             <div class="feature">Minimum: <span>$10,000 - $50,000</span></div>
            <div class="feature">ROI: <span>18.0% (24 hours)</span></div>
            <div class="feature">Trader: <span>Pro Trader Available to Copy</span></div>

           <form action="{{url('/buy-plan')}}" method="post">
            @csrf
                <input type="hidden" name="plan_name" value="Silver">
                <input type="hidden" name="plan_duration" value="24 hours">
                 <input type="hidden" name="status" value="1">
                <input type="number" name="amount" min="10000" max="50000" placeholder="Enter Amount" value="" style="color: white;" required>
                <input type="submit" value="Join Plan">
            </form>
        </div>

        <!-- Premium Package -->
        <div class="plan">
            <h2>Premium Package</h2>
            <div class="amount">Amount: $50,000</div>
            <div class="feature">Minimum: <span>$50,000 - $150,000</span></div>
            <div class="feature">ROI: <span>25.0% (24 hours)</span></div>
            <div class="feature">Trader: <span>Expert Trader Available to Copy</span></div>

            <form action="{{url('/buy-plan')}}" method="post">
            @csrf
                <input type="hidden" name="plan_name" value="Premium">
                <input type="hidden" name="plan_duration" value="24 hours">
                 <input type="hidden" name="status" value="1">
                <input type="number" name="amount" min="50000" max="150000" placeholder="Enter Amount" value="" style="color: white;" required>
                <input type="submit" value="Join Plan">
            </form>
        </div>

        <!-- VIP Package -->
        <div class="plan">
            <h2>VIP Package</h2>
            <div class="amount">Amount: $150,000</div>
            <div class="feature">Minimum: <span>$150,000 - Unlimited</span></div>
            <div class="feature">ROI: <span>35.0% (24 hours)</span></div>
            <div class="feature">Trader: <span>Expert Trader Available to Copy</span></div>

          <form action="{{url('/buy-plan')}}" method="post">
            @csrf
                <input type="hidden" name="plan_name" value="VIP">
                <input type="hidden" name="plan_duration" value="24 hours">
                 <input type="hidden" name="status" value="1">
                <input type="number" name="amount" min="150000" placeholder="Enter Amount" value="" style="color: white;" required>
                <input type="submit" value="Join Plan">
            </form>
        </div>

    </div>
    
    <style>
  input::placeholder {
    color: white;
  }
</style>
</body>
</html>
@include('dashboard.footer')
