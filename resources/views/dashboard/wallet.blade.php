@include('dashboard.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Assets | Crypto Platform</title>
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

        .dashboard-header {
            padding: 2rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 2rem;
        }

        .header-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .header-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .action-buttons .btn {
            margin-left: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .btn-deposit {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
        }

        .btn-withdraw {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
        }

        .btn-withdraw:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), transparent);
            border-radius: 3px;
        }

        .wallet-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
            box-shadow: var(--box-shadow);
            border: none;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .wallet-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--success-color));
        }

        .wallet-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .wallet-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .wallet-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .wallet-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .wallet-balance {
            margin-bottom: 1.5rem;
        }

        .balance-amount {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .balance-currency {
            color: var(--text-secondary);
            margin-left: 0.5rem;
            font-weight: 500;
        }

        .balance-equivalent {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .wallet-actions {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1rem;
        }

        .action-btn {
            color: var(--text-primary);
            background: none;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--primary-color);
        }

        .action-btn i {
            margin-right: 0.5rem;
        }

        .btc-icon {
            color: #f7931a;
        }

        .eth-icon {
            color: #627eea;
        }

        .usd-icon {
            color: #4ade80;
        }

        .eur-icon {
            color: #60a5fa;
        }

        .chf-icon {
            color: #a78bfa;
        }

        .escrow-icon {
            color: #f472b6;
        }

        .status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .balance-amount {
                font-size: 1.5rem;
            }
            
            .wallet-icon {
                width: 42px;
                height: 42px;
                font-size: 1.25rem;
            }
        }

        @media (max-width: 768px) {
            .action-buttons {
                margin-top: 1rem;
            }
            
            .action-buttons .btn {
                margin-left: 0;
                margin-right: 0.75rem;
                margin-bottom: 0.75rem;
            }
            
            .wallet-actions {
                flex-direction: column;
            }
            
            .action-btn {
                margin-bottom: 0.5rem;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .wallet-card {
                padding: 1.25rem;
            }
            
            .balance-amount {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4 py-lg-5">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div>
                    <span class="header-subtitle">Account Wallet</span>
                    <h1 class="header-title">Wallet / Assets</h1>
                    <p class="header-description">Here is the list of your assets with real-time values</p>
                </div>
                <div class="action-buttons mt-3 mt-md-0">
                    <a href="{{('deposit')}}" class="btn btn-deposit">
                        <i class="fas fa-plus-circle me-2"></i> Deposit
                    </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#pass" class="btn btn-withdraw">
                        <i class="fas fa-arrow-up me-2"></i> Withdraw
                    </a>
                </div>
            </div>
        </div>

        <!-- Crypto Accounts Section -->
        <div class="mb-5">
            <h3 class="section-title">Crypto Accounts</h3>
            <div class="row g-4">
                <!-- Bitcoin Wallet -->
                <div class="col-md-6 col-lg-4 col-xxl-4">
                    <div class="wallet-card">
                        <div class="wallet-header">
                            <div class="wallet-icon btc-icon">
                                <i class="fab fa-btc"></i>
                            </div>
                            <div>
                                <h4 class="wallet-title">Bitcoin Wallet</h4>
                                <small class="text-muted">BTC</small>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <div class="balance-amount">
                                {{$btc_balance}} <span class="balance-currency">BTC</span>
                            </div>
                            <div class="balance-equivalent">
                                ≈ {{$user_balance}} <span class="balance-currency">USD</span>
                            </div>
                        </div>
                        <div class="wallet-actions">
                            <a href="{{('deposit')}}" class="action-btn">
                                <i class="fas fa-arrow-down"></i> Deposit
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#pass" class="action-btn">
                                <i class="fas fa-arrow-up"></i> Withdraw
                            </a>
                            <a href="#" class="action-btn">
                                <i class="fas fa-exchange-alt"></i> Swap
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ethereum Wallet -->
                <div class="col-md-6 col-lg-4 col-xxl-4">
                    <div class="wallet-card">
                        <div class="wallet-header">
                            <div class="wallet-icon eth-icon">
                                <i class="fab fa-ethereum"></i>
                            </div>
                            <div>
                                <h4 class="wallet-title">Ethereum Wallet</h4>
                                <small class="text-muted">ETH</small>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <div class="balance-amount">
                                {{$eth_balance}} <span class="balance-currency">ETH</span>
                            </div>
                            <div class="balance-equivalent">
                                ≈ {{$user_balance}} <span class="balance-currency">USD</span>
                            </div>
                        </div>
                        <div class="wallet-actions">
                            <a href="{{('deposit')}}" class="action-btn">
                                <i class="fas fa-arrow-down"></i> Deposit
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#pass" class="action-btn">
                                <i class="fas fa-arrow-up"></i> Withdraw
                            </a>
                            <a href="#" class="action-btn">
                                <i class="fas fa-exchange-alt"></i> Swap
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Escrow Account -->
                <div class="col-md-6 col-lg-4 col-xxl-4">
                    <div class="wallet-card">
                        <span class="status-badge">Locked</span>
                        <div class="wallet-header">
                            <div class="wallet-icon escrow-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <h4 class="wallet-title">Escrow Account</h4>
                                <small class="text-muted">Secure Holding</small>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <div class="balance-amount">
                                {{Auth::user()->currency}}{{Auth::user()->update_escrow}}
                            </div>
                            <div class="balance-equivalent">
                                Funds held securely
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fiat Accounts Section -->
        <div class="mb-5">
            <h3 class="section-title">Fiat Accounts</h3>
            <div class="row g-4">
                <!-- USD Account -->
                <div class="col-md-6 col-lg-4">
                    <div class="wallet-card">
                        <div class="wallet-header">
                            <div class="wallet-icon usd-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <h4 class="wallet-title">USD Account</h4>
                                <small class="text-muted">US Dollar</small>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <div class="balance-amount">
                                0.00 <span class="balance-currency">USD</span>
                            </div>
                            <div class="balance-equivalent">
                                ≈ 0.00 <span class="balance-currency">USD</span>
                            </div>
                        </div>
                        <div class="wallet-actions">
                            <a href="{{('deposit')}}" class="action-btn">
                                <i class="fas fa-arrow-down"></i> Deposit
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#pass" class="action-btn">
                                <i class="fas fa-arrow-up"></i> Withdraw
                            </a>
                        </div>
                    </div>
                </div>

                <!-- EUR Account -->
                <div class="col-md-6 col-lg-4">
                    <div class="wallet-card">
                        <span class="status-badge">Locked</span>
                        <div class="wallet-header">
                            <div class="wallet-icon eur-icon">
                                <i class="fas fa-euro-sign"></i>
                            </div>
                            <div>
                                <h4 class="wallet-title">EUR Account</h4>
                                <small class="text-muted">Euro</small>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <div class="balance-amount">
                                Locked
                            </div>
                            <div class="balance-equivalent">
                                Coming soon
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CHF Account -->
                <div class="col-md-6 col-lg-4">
                    <div class="wallet-card">
                        <span class="status-badge">Locked</span>
                        <div class="wallet-header">
                            <div class="wallet-icon chf-icon">
                                <i class="fas fa-franc-sign"></i>
                            </div>
                            <div>
                                <h4 class="wallet-title">CHF Account</h4>
                                <small class="text-muted">Swiss Franc</small>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <div class="balance-amount">
                                Locked
                            </div>
                            <div class="balance-equivalent">
                                Coming soon
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TradingView Widget -->
    <div class="container mb-5">
        <div class="card" style="background: var(--card-bg); border-radius: var(--border-radius); overflow: hidden;">
            <div class="card-body p-0">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview-wallet-chart" style="height: 400px;"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                    new TradingView.widget({
                        "autosize": true,
                        "symbol": "COINBASE:BTCUSD",
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "toolbar_bg": "#1e293b",
                        "enable_publishing": false,
                        "hide_top_toolbar": false,
                        "hide_side_toolbar": false,
                        "allow_symbol_change": true,
                        "container_id": "tradingview-wallet-chart"
                    });
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Update balances periodically (simulated)
            setInterval(function() {
                // In a real app, you would fetch updated balances from your API
                console.log("Updating wallet balances...");
            }, 30000);
        });
    </script>
</body>
</html>

@include('dashboard.footer')