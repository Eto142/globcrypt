

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href=".">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Page Title  -->
    <title>Deposit Successful</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/dashlite.css">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css">
</head>

<body class="nk-body npc-crypto bg-white has-sidebar ">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              

                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                           @if ($payment_method == 'Bitcoin')
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Deposit order of <strong id="btc">{{ $btcAmount }} BTC </strong> for <strong id="price">{{ $deposit->amount }}</strong> USD was successfully placed.</h4>
                        <div class="nk-modal-text">
                            <p class="caption-text">Deposits will be pending until there are sufficient confirmations on the blockchain network.<br> Your dashboard will be automatically updated once your payment is confirmed</p>
                            <p class="sub-text-sm">Learn when you receive bitcoin in your wallet.</p>
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="{{url('/dashboard')}}" class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! </p>
                    </div>
                </div>
                
                  @elseif($payment_method=='Ethereum')
                  
                   <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Deposit order of <strong id="btc">{{ $ethAmount }} ETH </strong> for <strong id="price">{{ $deposit->amount }}</strong> USD was successfully placed.</h4>
                        <div class="nk-modal-text">
                            <p class="caption-text">Deposits will be pending until there are sufficient confirmations on the blockchain network.<br> Your dashboard will be automatically updated once your payment is confirmed</p>
                            <p class="sub-text-sm">Learn when you receive bitcoin in your wallet.</p>
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="{{url('/dashboard')}}" class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! </p>
                    </div>
                </div>
                 @elseif($payment_method=='Bank')
                  
                   <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Deposit order of <strong id="btc">Bank Transfer </strong> for <strong id="price">{{ $deposit->amount }}</strong>  was successfully placed.</h4>
                        <div class="nk-modal-text">
                            <p class="caption-text">Deposits will be pending until there are sufficient confirmations on the blockchain network.<br> Your dashboard will be automatically updated once your payment is confirmed</p>
                            <p class="sub-text-sm">Learn when you receive bitcoin in your wallet.</p>
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="{{url('/dashboard')}}" class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! </p>
                    </div>
                </div>
                
                  @elseif($payment_method=='Usdt')
                  
                   <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Deposit order of <strong id="price">{{ $deposit->amount }}</strong> USD was successfully placed.</h4>
                        <div class="nk-modal-text">
                            <p class="caption-text">Deposits will be pending until there are sufficient confirmations on the blockchain network.<br> Your dashboard will be automatically updated once your payment is confirmed</p>
                            <p class="sub-text-sm">Learn when you receive bitcoin in your wallet.</p>
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="{{url('/dashboard')}}" class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! </p>
                    </div>
                </div>
               @endif
                
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
	<script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/charts/chart-crypto.js"></script>
	</body>

</html>