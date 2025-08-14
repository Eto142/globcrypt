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
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --dark-color: #1a1a2e;
            --light-color: #f8f9fa;
            --card-bg: #16213e;
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --border-radius: 10px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            --transition: all 0.2s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-color);
            color: var(--text-primary);
            line-height: 1.6;
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 1.05rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 1rem;
        }

        .input-group {
            display: flex;
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .input-group-text {
            padding: 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            font-weight: 500;
            border-right: none;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            font-size: 1rem;
            border-left: none;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
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
            background: rgba(255, 255, 255, 0.03);
            border-radius: var(--border-radius);
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: var(--transition);
        }

        .payment-method input[type="radio"]:checked + label {
            border-color: var(--primary-color);
            background: rgba(67, 97, 238, 0.1);
        }

        .payment-method label:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .payment-icon {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
        }

        .btc-icon { color: #f7931a; }
        .eth-icon { color: #627eea; }
        .usdt-icon { color: #26a17b; }
        .bank-icon { color: #4895ef; }

        .payment-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 0.85rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            text-align: center;
        }

        .btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .btn i {
            margin-right: 0.5rem;
        }

        .alert {
            padding: 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            border: 1px solid transparent;
        }

        .alert-success {
            background: rgba(76, 201, 240, 0.1);
            border-color: rgba(76, 201, 240, 0.2);
            color: var(--accent-color);
        }

        .quick-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .quick-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .quick-link:hover {
            color: var(--accent-color);
        }

        .quick-link i {
            margin-right: 0.5rem;
        }

        .footer-text {
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .title {
                font-size: 1.8rem;
            }
            
            .payment-methods {
                grid-template-columns: 1fr 1fr;
            }
            
            .card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
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
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1 class="title">Fund Your Account</h1>
            <p class="subtitle">Choose your preferred payment method to deposit funds</p>
            
            <div class="quick-links">
                <a href="{{url('crypto_buy')}}" class="quick-link">
                    <i class="fas fa-exchange-alt"></i> Buy Crypto
                </a>
                <a href="#" class="quick-link">
                    <i class="fas fa-question-circle"></i> Help Center
                </a>
            </div>
        </div>

        <!-- Success Messages -->
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
        @endif
        
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{$message}}
        </div>
        @endif

        <!-- Funding Card -->
        <div class="card">
            <form method="post" action="{{url('get-deposit')}}">
                {{csrf_field()}}
                
                <!-- Amount Input -->
                <div class="form-group">
                    <label for="amount" class="form-label">Amount to Deposit ({{Auth::user()->currency}})</label>
                    <div class="input-group">
                        <span class="input-group-text">{{Auth::user()->currency}}</span>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="form-group">
                    <label class="form-label">Payment Method</label>
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
                <button type="submit" class="btn">
                    <i class="fas fa-arrow-right"></i> Continue
                </button>
            </form>
        </div>

        <!-- Footer Text -->
        <div class="footer-text">
            <p><i class="fas fa-lock"></i> All transactions are securely encrypted</p>
        </div>
    </div>

    <script type="text/javascript">
        function copyAddress(id, currency) {
            var copyText = document.getElementById(id);
            copyText.select();
            document.execCommand("copy");
            
            // Notification
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = 'var(--card-bg)';
            notification.style.color = 'white';
            notification.style.padding = '12px 20px';
            notification.style.borderRadius = 'var(--border-radius)';
            notification.style.boxShadow = 'var(--box-shadow)';
            notification.style.zIndex = '1000';
            notification.style.display = 'flex';
            notification.style.alignItems = 'center';
            notification.style.border = '1px solid var(--primary-color)';
            notification.innerHTML = `
                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px;"></i>
                ${currency} address copied
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>

@include('dashboard.footer')