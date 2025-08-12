@include('dashboard.header')
<!-- main header @e -->
<!-- content @s -->


    
{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-sub"><span>Welcome!</span>
                </div>
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal" style="color: white">{{Auth::user()->name}}</h2>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <ul class="nk-block-tools gx-3">
                            <li><a href="{{url('deposit')}}" class="btn btn-primary"><span>Deposit</span> <em
                                        class="icon ni ni-arrow-long-right"></em></a></li>
                                        
                                         <li><a href="#" class="btn btn-white btn-light" data-bs-toggle="modal" data-bs-target="#pass"><span>Withdraw</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>
                        </ul>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->


    <div class="modal fade" tabindex="-1" role="dialog" id="pass">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <a href="#" class="close" data-bs-dismiss="modal"
            ><em class="icon ni ni-cross-sm"></em
          ></a>
          <div class="modal-body modal-body-lg text-center">
            <div class="nk-modal">
						<form  action="{{ route('confirm-password') }}" method="POST">
                                              @csrf
				  <h4 class="nk-modal-title">Please to confirm this is you kindly enter your password</h4>
				  <div class="nk-modal-text">
					<input type="password" name="cpassword" id="conpass" class="form-control form-control-lg form-control-number" placeholder="******">
					<input type="hidden" id="check" value="408be55d3a7601e647facaeb58753eb7" class="form-control form-control-lg form-control-number" placeholder="******">
				  </div>
				  <div class="nk-modal-action-lg">
					<ul class="btn-group gx-4">
					  <li>
						<button class="btn btn-lg btn-mw btn-primary"
						name="password"
						
					>Confirm</button
					>
					  </li>
					</ul>
				  </div>
			  </form>
            </div>
          </div>
          <!-- .modal-body -->
        </div>
        <!-- .modal-content -->
      </div>
      <!-- .modla-dialog -->
    </div>


 

<!-- JavaScript code to display modal if there's an error -->
<script>
    $(document).ready(function(){
        @if(session('error'))
            $('#errorModal').modal('show');
        @endif
    });
</script>



<style>
    .container {
      width: 80%;
      margin: 20px auto;
      padding: 10px;
      border-radius: 10px;
      background-color: rgba(240, 240, 240, 0.8); /* Transparent background color */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  
    .marquee-container {
      overflow: hidden;
      border-radius: 10px;
    }
  
    .marquee {
      color: white;
      background-color: rgba(48, 92, 137, 0.8); /* Transparent background color */
      font-weight: bold;
      padding: 10px;
      border-radius: 10px;
    }
  </style>
          






 <div class="modal fade" tabindex="-1" role="dialog" id="errorModal">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <a href="#" class="close" data-bs-dismiss="modal"
            ><em class="icon ni ni-cross-sm"></em
          ></a>
          <div class="modal-body modal-body-lg text-center">
            <div class="nk-modal">
                 <h5 class="modal-title" id="errorModalLabel">Error</h5>
                 <br>
                
					  {{ session('error') }}
				  <div class="nk-modal-text">
				
				  </div>
				  <div class="nk-modal-action-lg">
					<ul class="btn-group gx-4">
					  <li>
				
					  </li>
					</ul>
				  </div>
			  </form>
            </div>
          </div>
          <!-- .modal-body -->
        </div>
        <!-- .modal-content -->
      </div>
      <!-- .modla-dialog -->
    </div>




















    <div class="dashboard-container">
        <!-- Notification Marquee -->
        <div class="notification-bar">
            <div class="marquee-container">
                <div class="marquee-content">
                    <span class="notification-badge">NOTICE</span>
                    <span class="notification-text">{{Auth::user()->update_notification}}</span>
                </div>
            </div>
        </div>
    
        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <!-- Card 1: Trading Balance -->
            <div class="dashboard-card balance-card">
                <div class="card-content">
                    <div class="card-icon">
                        <img src="{{ asset('wallet.png') }}" alt="Balance">
                    </div>
                    <div class="card-details">
                        <div class="card-value">{{ Auth::user()->currency }}{{ $user_balance }}.00</div>
                        <div class="card-label">TRADING BALANCE</div>
                    </div>
                </div>
                <div class="card-wave"></div>
            </div>
    
            <!-- Card 2: Trading Capital -->
            <div class="dashboard-card capital-card">
                <div class="card-content">
                    <div class="card-icon">
                        <img src="{{ asset('balance1.png') }}" alt="Capital">
                    </div>
                    <div class="card-details">
                        <div class="card-value">{{ Auth::user()->currency }}{{ $deposit }}.00</div>
                        <div class="card-label">TRADING CAPITAL</div>
                    </div>
                </div>
                <div class="card-wave"></div>
            </div>
    
            <!-- Card 3: Trading Profit -->
            <div class="dashboard-card profit-card">
                <div class="card-content">
                    <div class="card-icon">
                        <img src="{{ asset('profit1.png') }}" alt="Profit">
                    </div>
                    <div class="card-details">
                        <div class="card-value">{{ Auth::user()->currency }}{{ $profit }}.00</div>
                        <div class="card-label">TRADING PROFIT</div>
                    </div>
                </div>
                <div class="card-wave"></div>
            </div>
    
            <!-- Card 4: Trading Bonus -->
            <div class="dashboard-card bonus-card">
                <div class="card-content">
                    <div class="card-icon">
                        <img src="{{ asset('bonus.png') }}" alt="Bonus">
                    </div>
                    <div class="card-details">
                        <div class="card-value">{{ Auth::user()->currency }}{{ $referral }}.00</div>
                        <div class="card-label">TRADING BONUS</div>
                    </div>
                </div>
                <div class="card-wave"></div>
            </div>
    
            <!-- Card 5: Total Withdrawal -->
            <div class="dashboard-card withdrawal-card">
                <div class="card-content">
                    <div class="card-icon">
                        <img src="{{ asset('withdrawal.png') }}" alt="Withdrawal">
                    </div>
                    <div class="card-details">
                        <div class="card-value">{{ Auth::user()->currency }}{{ $withdrawal }}.00</div>
                        <div class="card-label">TOTAL WITHDRAWAL</div>
                    </div>
                </div>
                <div class="card-wave"></div>
            </div>
    
            <!-- Card 6: Total Fee -->
            <div class="dashboard-card fee-card">
                <div class="card-content">
                    <div class="card-icon">
                        <img src="{{ asset('fee.png') }}" alt="Fee">
                    </div>
                    <div class="card-details">
                        <div class="card-value">{{ Auth::user()->currency }}{{ Auth::user()->update_trade_fee }}.00</div>
                        <div class="card-label">TOTAL FEE</div>
                    </div>
                </div>
                <div class="card-wave"></div>
            </div>
        </div>
    
        <!-- Signal Strength Indicator -->
        <div class="signal-strength">
            <div class="signal-header">
                <h3>Signal Strength</h3>
                <div class="signal-value">{{ Auth::user()->signal_strength }}%</div>
            </div>
            <div class="signal-progress-container">
                <div class="signal-progress-bar" style="width: {{ Auth::user()->signal_strength }}%">
                    <div class="signal-progress-fill"></div>
                </div>
            </div>
            <div class="signal-labels">
                <span>Weak</span>
                <span>Moderate</span>
                <span>Strong</span>
                <span>Excellent</span>
            </div>
        </div>
    
        {{-- <!-- Trading Charts -->
        <div class="trading-charts">
            <div class="chart-container">
                <div class="chart-header">
                    <h4>BTC/USDT</h4>
                    <div class="chart-actions">
                        <button class="chart-btn active">1D</button>
                        <button class="chart-btn">1W</button>
                        <button class="chart-btn">1M</button>
                        <button class="chart-btn">1Y</button>
                    </div>
                </div>
                <div class="tradingview-widget-container">
                    <div id="tradingview_chart1"></div>
                </div>
            </div>
    
            <div class="chart-container">
                <div class="chart-header">
                    <h4>AAPL</h4>
                    <div class="chart-actions">
                        <button class="chart-btn active">1D</button>
                        <button class="chart-btn">1W</button>
                        <button class="chart-btn">1M</button>
                        <button class="chart-btn">1Y</button>
                    </div>
                </div>
                <div class="tradingview-widget-container">
                    <div id="tradingview_chart2"></div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <style>
    /* Base Styles */
    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #3b82f6;
        --dark-bg: #0f172a;
        --card-bg: #1e293b;
        --text-primary: #f8fafc;
        --text-secondary: #94a3b8;
        --border-radius: 12px;
        --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }
    
    body {
        background-color: var(--dark-bg);
        color: var(--text-primary);
        line-height: 1.6;
        padding: 0;
        margin: 0;
    }
    
    /* Notification Bar */
    .notification-bar {
        background: linear-gradient(90deg, #1e3a8a, #1e40af);
        border-radius: var(--border-radius);
        margin-bottom: 1.5rem;
        overflow: hidden;
        box-shadow: var(--box-shadow);
    }
    
    .marquee-container {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        position: relative;
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
    
    .notification-text {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.9);
    }
    
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    
    /* Dashboard Grid */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2rem;
    }
    
    .dashboard-card {
        background-color: var(--card-bg);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: var(--box-shadow);
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .card-content {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 2;
    }
    
    .card-icon {
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.25rem;
        flex-shrink: 0;
    }
    
    .card-icon img {
        width: 24px;
        height: 24px;
        object-fit: contain;
    }
    
    .card-details {
        flex-grow: 1;
    }
    
    .card-value {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: var(--text-primary);
    }
    
    .card-label {
        font-size: 0.875rem;
        color: var(--text-secondary);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .card-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 10px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        animation: wave 2s linear infinite;
    }
    
    @keyframes wave {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    /* Card Specific Styles */
    .balance-card { border-left: 4px solid var(--primary-color); }
    .capital-card { border-left: 4px solid var(--success-color); }
    .profit-card { border-left: 4px solid var(--warning-color); }
    .bonus-card { border-left: 4px solid var(--info-color); }
    .withdrawal-card { border-left: 4px solid var(--danger-color); }
    .fee-card { border-left: 4px solid #8b5cf6; }
    
    /* Signal Strength */
    .signal-strength {
        background-color: var(--card-bg);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--box-shadow);
    }
    
    .signal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .signal-header h3 {
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .signal-value {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .signal-progress-container {
        height: 12px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 6px;
        margin-bottom: 0.5rem;
        overflow: hidden;
    }
    
    .signal-progress-bar {
        height: 100%;
        position: relative;
        transition: width 0.6s ease;
    }
    
    .signal-progress-fill {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(90deg, #ef4444, #f59e0b, #10b981, #3b82f6);
        border-radius: 6px;
    }
    
    .signal-labels {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        color: var(--text-secondary);
    }
    
    /* Trading Charts */
    .trading-charts {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .chart-container {
        background-color: var(--card-bg);
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow);
    }
    
    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .chart-header h4 {
        font-size: 1rem;
        font-weight: 600;
    }
    
    .chart-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    .chart-btn {
        background: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--text-secondary);
        padding: 0.25rem 0.75rem;
        border-radius: 4px;
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .chart-btn:hover {
        background-color: rgba(255, 255, 255, 0.05);
        color: var(--text-primary);
    }
    
    .chart-btn.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .tradingview-widget-container {
        height: 350px;
        width: 100%;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .dashboard-grid {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }
    }
    
    @media (max-width: 992px) {
        .card-value {
            font-size: 1.25rem;
        }
        
        .card-icon {
            width: 42px;
            height: 42px;
            margin-right: 1rem;
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
        
        .dashboard-card {
            padding: 1.25rem;
        }
        
        .card-value {
            font-size: 1.1rem;
        }
        
        .card-label {
            font-size: 0.75rem;
        }
        
        .trading-charts {
            grid-template-columns: 1fr;
        }
        
        .tradingview-widget-container {
            height: 300px;
        }
    }
    
    @media (max-width: 576px) {
        .dashboard-grid {
            grid-template-columns: 1fr 1fr;
        }
        
        .dashboard-card {
            padding: 1rem;
        }
        
        .card-content {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .card-icon {
            margin-right: 0;
            margin-bottom: 0.75rem;
        }
        
        .chart-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .chart-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .chart-btn {
            flex-grow: 1;
            text-align: center;
        }
    }
    </style>
    
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize TradingView Widgets
        new TradingView.widget({
            autosize: true,
            symbol: "BINANCE:BTCUSDT",
            interval: "D",
            timezone: "Etc/UTC",
            theme: "dark",
            style: "1",
            locale: "en",
            toolbar_bg: "#1e293b",
            enable_publishing: false,
            withdateranges: true,
            hide_side_toolbar: false,
            allow_symbol_change: true,
            details: true,
            hotlist: true,
            container_id: "tradingview_chart1"
        });
        
        new TradingView.widget({
            autosize: true,
            symbol: "NASDAQ:AAPL",
            interval: "D",
            timezone: "Etc/UTC",
            theme: "dark",
            style: "1",
            locale: "en",
            toolbar_bg: "#1e293b",
            enable_publishing: false,
            withdateranges: true,
            hide_side_toolbar: false,
            allow_symbol_change: true,
            details: true,
            hotlist: true,
            container_id: "tradingview_chart2"
        });
        
        // Handle chart interval buttons
        document.querySelectorAll('.chart-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons in this group
                this.parentNode.querySelectorAll('.chart-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get the interval value from button text
                const intervalMap = {
                    '1D': 'D',
                    '1W': 'W',
                    '1M': 'M',
                    '1Y': '12M'
                };
                
                const interval = intervalMap[this.textContent] || 'D';
                const chartContainer = this.closest('.chart-container');
                const chartId = chartContainer.querySelector('.tradingview-widget-container > div').id;
                
                // Find the TradingView widget and change interval
                const widget = window[chartId];
                if (widget) {
                    widget.chart().setResolution(interval);
                }
            });
        });
        
        // Animation for signal strength
        const signalBar = document.querySelector('.signal-progress-bar');
        if (signalBar) {
            setTimeout(() => {
                signalBar.style.width = '{{ Auth::user()->signal_strength }}%';
            }, 300);
        }
    });
    </script>

@include('dashboard.footer')