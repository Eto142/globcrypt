@include('dashboard.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Your Account | Crypto Platform</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #4cc9f0;
            --dark-color: #0f172a;
            --light-color: #f8f9fa;
            --card-bg: #1e293b;
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --border-radius: 12px;
            --box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b1120;
            color: var(--text-primary);
            line-height: 1.6;
        }

        .funding-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .funding-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .funding-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, #4361ee, #4cc9f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
        }

        .funding-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #4361ee, #4cc9f0);
            border-radius: 2px;
        }

        .funding-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .funding-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            margin-bottom: 2rem;
            border: none;
            transition: var(--transition);
        }

        .funding-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .payment-options {
            margin: 2rem 0;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .payment-method {
            position: relative;
        }

        .payment-method input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .payment-method label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: var(--border-radius);
            border: 2px solid transparent;
            cursor: pointer;
            transition: var(--transition);
            height: 100%;
        }

        .payment-method input[type="radio"]:checked + label {
            border-color: var(--primary-color);
            background: rgba(67, 97, 238, 0.1);
        }

        .payment-method label:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .payment-icon {
            font-size: 2rem;
            margin-bottom: 0.75rem;
        }

        .btc-icon { color: #f7931a; }
        .eth-icon { color: #627eea; }
        .usdt-icon { color: #26a17b; }
        .bank-icon { color: #60a5fa; }

        .payment-name {
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            color: var(--text-primary);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .btn-primary i {
            margin-right: 0.5rem;
        }

        .alert {
            padding: 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #4ade80;
        }

        .quick-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .quick-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .quick-link:hover {
            color: var(--primary-color);
        }

        .quick-link i {
            margin-right: 0.5rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .funding-title {
                font-size: 2rem;
            }
            
            .payment-methods {
                grid-template-columns: 1fr 1fr;
            }
            
            .funding-card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .funding-title {
                font-size: 1.75rem;
            }
            
            .payment-methods {
                grid-template-columns: 1fr;
            }
            
            .quick-links {
                flex-direction: column;
                align-items: center;
                gap: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <div class="funding-container">
        <!-- Header Section -->
        <div class="funding-header">
            <h1 class="funding-title">Fund Your Account</h1>
            <p class="funding-subtitle">Deposit funds using any of our secure payment methods to start trading immediately</p>
            
            <div class="quick-links">
                <a href="{{url('crypto_buy')}}" class="quick-link">
                    <i class="fas fa-coins"></i> Buy Crypto
                </a>
                <a href="#" class="quick-link">
                    <i class="fas fa-question-circle"></i> Deposit Help
                </a>
            </div>
        </div>

        <!-- Success Messages -->
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('status') }}
        </div>
        @endif
        
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i> {{$message}}
        </div>
        @endif

        <!-- Funding Card -->
        <div class="funding-card">
            <form accept-charset="utf-8" method="post" action="{{url('get-deposit')}}">
                {{csrf_field()}}
                
                <!-- Amount Input -->
                <div class="form-group">
                    <label for="amount" class="form-label">DEPOSIT AMOUNT ({{Auth::user()->currency}})</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: rgba(255, 255, 255, 0.05); color: var(--text-primary); border-right: none;">{{Auth::user()->currency}}</span>
                        <input type="number" name="amount" id="amount" placeholder="Enter amount" class="form-control" style="border-left: none;" required>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="payment-options">
                    <label class="form-label">SELECT PAYMENT METHOD</label>
                    <div class="payment-methods">
                        <!-- Bitcoin -->
                        <div class="payment-method">
                            <input type="radio" name="item" value="Bitcoin" id="payWithBitcoin" required />
                            <label for="payWithBitcoin">
                                <span class="payment-icon btc-icon"><i class="fab fa-btc"></i></span>
                                <span class="payment-name">Bitcoin</span>
                            </label>
                        </div>

                        <!-- Ethereum -->
                        <div class="payment-method">
                            <input type="radio" name="item" value="Ethereum" id="payWithEthereum" required />
                            <label for="payWithEthereum">
                                <span class="payment-icon eth-icon"><i class="fab fa-ethereum"></i></span>
                                <span class="payment-name">Ethereum</span>
                            </label>
                        </div>

                        <!-- USDT -->
                        <div class="payment-method">
                            <input type="radio" name="item" value="Usdt" id="payWithUsdt" required />
                            <label for="payWithUsdt">
                                <span class="payment-icon usdt-icon"><i class="fas fa-dollar-sign"></i></span>
                                <span class="payment-name">USDT</span>
                            </label>
                        </div>

                        <!-- Bank -->
                        <div class="payment-method">
                            <input type="radio" name="item" value="Bank" id="payWithBank" required />
                            <label for="payWithBank">
                                <span class="payment-icon bank-icon"><i class="fas fa-university"></i></span>
                                <span class="payment-name">Bank</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-arrow-right"></i> Proceed to Payment
                    </button>
                </div>
            </form>
        </div>

        <!-- Additional Information -->
        <div style="text-align: center; color: var(--text-secondary); font-size: 0.9rem; margin-top: 2rem;">
            <p><i class="fas fa-lock me-2"></i> All transactions are secured with 256-bit SSL encryption</p>
            <p>Need help? <a href="#" style="color: var(--primary-color);">Contact our support team</a></p>
        </div>
    </div>

    <!-- Script for copy functions -->
    <script type="text/javascript">
        function copyAddress(id, currency) {
            var copyText = document.getElementById(id);
            copyText.select();
            document.execCommand("copy");
            
            // Show nice notification instead of alert
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = '#1e293b';
            notification.style.color = 'white';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '8px';
            notification.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            notification.style.zIndex = '1000';
            notification.style.display = 'flex';
            notification.style.alignItems = 'center';
            notification.innerHTML = `
                <i class="fas fa-check-circle" style="color: #4ade80; margin-right: 10px; font-size: 1.2rem;"></i>
                ${currency} address copied to clipboard!
            `;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 500);
            }, 3000);
        }
    </script>
</body>
</html>


@include('dashboard.footer')