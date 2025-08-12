@include('dashboard.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert Traders Dashboard</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Glightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #ef233c;
            --dark-color: #1a1a2e;
            --light-color: #f8f9fa;
            --card-bg: #16213e;
            --text-primary: #ffffff;
            --text-secondary: #b8c2cc;
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

        .notification-bar {
            background: linear-gradient(90deg, #1e3a8a, #1e40af);
            border-radius: var(--border-radius);
            margin: 1.5rem auto;
            padding: 0.75rem 1.5rem;
            max-width: 1200px;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
        }

        .marquee-content {
            display: flex;
            align-items: center;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
        }

        .notification-badge {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .trader-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
            box-shadow: var(--box-shadow);
            border: none;
            overflow: hidden;
            position: relative;
        }

        .trader-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .trader-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--success-color));
        }

        .verified-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #1da1f2;
            font-size: 1.5rem;
            z-index: 2;
        }

        .trader-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.1);
            margin: 0 auto 1rem;
            display: block;
            transition: var(--transition);
        }

        .trader-card:hover .trader-avatar {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .trader-name {
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
            color: var(--text-primary);
        }

        .copy-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: var(--transition);
            display: block;
            margin: 1rem auto;
            width: 80%;
            position: relative;
            overflow: hidden;
        }

        .copy-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .copy-btn.copied {
            background: linear-gradient(135deg, var(--success-color), #2ec4b6);
        }

        .copy-btn.copied::after {
            content: '✓ Copied!';
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .stat-item {
            text-align: center;
            padding: 0.5rem;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .stat-value {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .gains { color: #4ade80; }
        .loss { color: #f87171; }
        .risk-high { color: #ef4444; }
        .risk-medium { color: #f59e0b; }
        .risk-low { color: #10b981; }
        .copiers { color: #94a3b8; }
        .commission { color: #a78bfa; }
        .transactions { color: #7dd3fc; }

        .dropdown-menu {
            background-color: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .dropdown-item {
            color: var(--text-primary);
            padding: 0.5rem 1rem;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--primary-color);
        }

        .modal-content {
            background-color: var(--card-bg);
            border: none;
            border-radius: var(--border-radius);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-close {
            filter: invert(1);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .trader-avatar {
                width: 100px;
                height: 100px;
            }
            
            .copy-btn {
                width: 100%;
                padding: 0.6rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .trader-card {
                padding: 1rem;
            }
        }

        /* Animation for copied state */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Notification Bar -->
        <div class="notification-bar">
            <div class="marquee-container">
                <div class="marquee-content">
                    <span class="notification-badge"><i class="fas fa-bullhorn me-2"></i>Notice</span>
                    <span class="notification-text">Explore The Expertise Of Our Top-Performing Expert Traders Today And Maximize Your Trades Or Investments With Lucrative Returns</span>
                </div>
            </div>
        </div>

        <!-- Traders Grid -->
        <div class="row">
            @foreach($traders as $trader)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="trader-card h-100">
                    <!-- Verified Badge -->
                    <div class="verified-badge">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    
                    <!-- Trader Avatar -->
                    <a href="{{asset('uploads/trader/'.$trader->image)}}" class="glightbox">
                        <img src="{{asset('uploads/trader/'.$trader->image)}}" class="trader-avatar" alt="{{$trader->name}}">
                    </a>
                    
                    <!-- Trader Name -->
                    <h3 class="trader-name">{{$trader->name}}</h3>
                    
                    <!-- Copy Button -->
                    <button id="copyButton{{$trader->id}}" 
                            class="copy-btn"
                            onclick="handleCopy('{{$trader->id}}', '{{$trader->name}}')">
                        <i class="fas fa-copy me-2"></i> Copy Trader
                    </button>
                    
                    <!-- Stats Grid -->
                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-value copiers">{{$trader->copier}}</div>
                            <div class="stat-label">Copiers</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value gains">+{{$trader->gains}}%</div>
                            <div class="stat-label">Gains</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value {{ $trader->risk == 'High' ? 'risk-high' : ($trader->risk == 'Medium' ? 'risk-medium' : 'risk-low') }}">
                                {{$trader->risk}}
                            </div>
                            <div class="stat-label">Risk</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value loss">-{{$trader->loss}}%</div>
                            <div class="stat-label">Max Loss</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value commission">{{$trader->commission}}%</div>
                            <div class="stat-label">Commission</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value transactions">{{$trader->total_transactions}}</div>
                            <div class="stat-label">Transactions</div>
                        </div>
                    </div>
                    
                    <!-- Duration Dropdown (hidden by default) -->
                    <div class="dropdown mt-3 text-center d-none">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="durationDropdown{{$trader->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Duration
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="durationDropdown{{$trader->id}}">
                            <li><a class="dropdown-item" href="{{url('copy')}}?duration=1">1 Month</a></li>
                            <li><a class="dropdown-item" href="{{url('copy')}}?duration=3">3 Months</a></li>
                            <li><a class="dropdown-item" href="{{url('copy')}}?duration=6">6 Months</a></li>
                            <li><a class="dropdown-item" href="{{url('copy')}}?duration=12">12 Months</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel"><i class="fas fa-exclamation-triangle text-danger me-2"></i> Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(session('error'))
                        {{ session('error') }}
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- GLightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/js/glightbox.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Initialize GLightbox
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });

        // Show error modal if there's an error
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('error'))
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif
        });

        // Handle copy trader action
        function handleCopy(traderId, traderName) {
            const button = document.getElementById(`copyButton${traderId}`);
            
            // Add loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Processing...';
            button.classList.add('disabled');
            
            // Simulate API call with timeout
            setTimeout(() => {
                // Change to success state
                button.innerHTML = '<i class="fas fa-check me-2"></i> Copied!';
                button.classList.add('copied');
                button.classList.remove('disabled');
                button.classList.add('pulse');
                
                // Store in localStorage
                localStorage.setItem(`copiedTrader_${traderId}`, 'true');
                
                // Remove pulse animation after it completes
                setTimeout(() => {
                    button.classList.remove('pulse');
                }, 500);
                
                // Show confirmation toast
                showToast(`Successfully copied ${traderName}`);
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    button.innerHTML = '<i class="fas fa-sync-alt me-2"></i> Copy Again';
                    button.classList.remove('copied');
                }, 3000);
            }, 1500);
        }

        // Show toast notification
        function showToast(message) {
            // In a real app, you would use a proper toast library
            console.log('Toast:', message);
            // Example: bootstrap.Toast or another library
        }

        // Check copied status on page load
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($traders as $trader)
                if (localStorage.getItem(`copiedTrader_{{ $trader->id }}`)) {
                    const button = document.getElementById(`copyButton{{ $trader->id }}`);
                    button.innerHTML = '<i class="fas fa-sync-alt me-2"></i> Copy Again';
                    button.classList.add('copied');
                }
            @endforeach
        });
    </script>
</body>
</html>

@include('dashboard.footer')