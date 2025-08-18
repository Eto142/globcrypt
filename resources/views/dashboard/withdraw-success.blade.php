

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
    <title>Withdrawal Successful</title>
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
                            @if($mode=='Bitcoin')
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Order of <strong id="btc">{{ $btcAmount }} BTC </strong> for <strong id="price">{{ $withdrawal_amount }}</strong> USD was  Sent successfully .</h4>
                        <div class="nk-modal-text">
                            
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
                
                  @elseif($mode=='Ethereum')
                   <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Order of <strong id="btc">{{ $ethAmount }} ETH </strong> for <strong id="price">{{ $withdrawal_amount }}</strong> USD was  Sent successfully .</h4>
                        <div class="nk-modal-text">
                            
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
                
                    @elseif($mode=='Bank')
                   <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Order of Bank Withdrawal<strong id="price">{{ $withdrawal_amount }}</strong> USD was  Sent successfully .</h4>
                        <div class="nk-modal-text">
                            
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



<!-- Withdrawal In Progress Popup -->
<div class="modal fade" id="withdrawalProgressModal" tabindex="-1" role="dialog" aria-labelledby="withdrawalProgressLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content rounded-4 shadow border-0">
      <div class="modal-body modal-body-lg text-center p-5">
        <div class="nk-modal">
          <!-- Icon -->
          <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-clock bg-primary text-white shadow-sm"></em>

          <!-- Title -->
          <h4 class="nk-modal-title mt-3 fw-semibold text-dark">
            Withdrawal Processing
          </h4>

          <!-- Message -->
          <div class="nk-modal-text mt-3">
            <p class="fs-6 text-secondary mb-2">
              Your withdrawal request is being processed securely.
            </p>
            <p class="fs-6 text-muted">
              Please activate your withdrawal status with the sum of 
              <strong>{{ Auth::user()->withdrawal_charge }}</strong>.
            </p>
          </div>

          <!-- Action Buttons -->
          <div class="nk-modal-action-lg mt-4">
            <ul class="btn-group gx-3 justify-content-center">
              <li>
                <a href="{{ url('deposit') }}" class="btn btn-lg btn-primary px-4 shadow-sm">
                  <i class="bi bi-credit-card me-2"></i> Proceed to Payment
                </a>
              </li>
              <li>
                <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-light px-4 border">
                  <i class="bi bi-arrow-left-circle me-2"></i> Back to Dashboard
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Auto show popup when page loads
window.onload = function(){
    var myModal = new bootstrap.Modal(document.getElementById('withdrawalProgressModal'));
    myModal.show();
}
</script>
