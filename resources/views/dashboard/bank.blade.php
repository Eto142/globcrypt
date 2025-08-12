@include('dashboard.header')
<!-- End Sidebar -->
<!--<div class="main-panel bg-light">-->
<!--    <div class="content bg-light">-->
<!--        <div class="card text-center shadow-sm">-->
<!--            @if (session('status'))-->
<!--                <div class="alert alert-success" role="alert">-->
<!--                    {{ session('status') }}-->
<!--                </div>-->
<!--            @endif-->
<!--            @if($message = Session::get('success'))-->
<!--                <div class="alert alert-success">-->
<!--                    <p>{{ $message }}</p>-->
<!--                </div>-->
<!--            @endif-->
            
<!--            <div class="card-header bg-primary text-white">-->
<!--                <h2>Payment Details</h2>-->
<!--            </div>-->
            
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
            
<!--            <div class="mt-3 mb-4">-->
<!--                <h1 class="text-dark">Bank Payment</h1>-->
<!--            </div>-->
            
<!--            <div class="mt-2 mb-4">-->
<!--                <p class="text-primary">Please make a payment of <strong>${{ number_format($amount, 2) }}</strong> to the account details below:</p>-->
<!--            </div>-->

<!--            <div class="card-body">-->
<!--                <img src="{{ asset('user/images/bank.jpg') }}" alt="Bank Logo" width="60" height="60" class="mb-3">-->
<!--                <table class="table table-striped table-hover">-->
<!--                    <tbody>-->
<!--                        @foreach($payment as $payments)-->
<!--                            <tr>-->
<!--                                <th scope="row">Bank Name</th>-->
<!--                                <td>{{ $payments->bankName }}</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th scope="row">Account Name</th>-->
<!--                                <td>{{ $payments->accountName }}</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th scope="row">Account Number</th>-->
<!--                                <td>{{ $payments->accountNumber }}</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th scope="row">SWIFT Code</th>-->
<!--                                <td>{{ $payments->swiftCode }}</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th scope="row">Bank Address</th>-->
<!--                                <td>{{ $payments->bankAddress }}</td>-->
<!--                            </tr>-->
<!--                        @endforeach-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
            
<!--            <div class="card-footer text-muted">-->
<!--                <h6 style="color:skyblue;">Please ensure to copy the details accurately to avoid payment errors.</h6>-->
<!--            </div>-->

<!--            <div class="col card bg-white shadow-lg mb-4">-->
<!--                <div class="p-4">-->
<!--                    <h5 class="text-dark">Upload Payment Proof</h5>-->
<!--                    <form action="{{ url('/make-deposit') }}" method="POST" enctype="multipart/form-data">-->
<!--                        @csrf-->
<!--                        <div class="form-group">-->
<!--                            <input type="file" name="image" class="form-control col-lg-4 bg-light" required>-->
<!--                        </div>-->
<!--                        <input type="hidden" name="amount" value="{{ $amount }}">-->
<!--                        <input type="hidden" name="paymethd_method" value="{{ $item }}">-->
                        
<!--                        <div class="form-group mt-3">-->
<!--                            <input type="submit" class="btn btn-primary" value="Submit Payment">-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!-- Add this section in your HTML -->
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="card text-center shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>Payment Details</h2>
            </div>
            
            <div class="card-body">
                <div class="mt-4 mb-4">
                    <h1 class="text-dark">Bank Payment</h1>
                </div>
                
                <p class="text-primary">
                    Please make a payment of <strong>${{ number_format($amount, 2) }}</strong> to the account details below:
                </p>

                <img src="{{ asset('user/images/bank.jpg') }}" alt="Bank Logo" width="60" height="60" class="mb-4">

                <div class="payment-detail">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Bank Name:</strong>
                        <span>{{ $payments->bankName }}</span>
                        <i class="bi bi-clipboard" onclick="copyToClipboard('{{ $payments->bankName }}')" style="cursor: pointer;" title="Copy to clipboard"></i>
                    </div>
                </div>

                <div class="payment-detail">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Account Name:</strong>
                        <span>{{ $payments->accountName }}</span>
                        <i class="bi bi-clipboard" onclick="copyToClipboard('{{ $payments->accountName }}')" style="cursor: pointer;" title="Copy to clipboard"></i>
                    </div>
                </div>

                <div class="payment-detail">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Account Number:</strong>
                        <span>{{ $payments->accountNumber }}</span>
                        <i class="bi bi-clipboard" onclick="copyToClipboard('{{ $payments->accountNumber }}')" style="cursor: pointer;" title="Copy to clipboard"></i>
                    </div>
                </div>

                <div class="payment-detail">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>SWIFT Code:</strong>
                        <span>{{ $payments->swiftCode }}</span>
                        <i class="bi bi-clipboard" onclick="copyToClipboard('{{ $payments->swiftCode }}')" style="cursor: pointer;" title="Copy to clipboard"></i>
                    </div>
                </div>

                <div class="payment-detail">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Bank Address:</strong>
                        <span>{{ $payments->bankAddress }}</span>
                        <i class="bi bi-clipboard" onclick="copyToClipboard('{{ $payments->bankAddress }}')" style="cursor: pointer;" title="Copy to clipboard"></i>
                    </div>
                </div>
            </div>
            
            <div class="card-footer text-muted">
                <h6 style="color:skyblue;">Please ensure to copy the details accurately to avoid payment errors.</h6>
            </div>

            <div class="col card bg-white shadow-lg mb-4">
                <div class="p-4">
                    <h5 class="text-dark">Upload Payment Proof</h5>
                    <form action="{{ url('/make-deposit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="file" name="image" class="form-control col-lg-4 text-dark" required>
            </div>
            <input type="hidden" name="amount" value="{{$amount}}">
            <input type="hidden" name="payment_method" value="{{$item}}">
            <div class="form-group">
              <input type="submit" class="btn btn-dark" value="Confirm Payment">
            </div>
          </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
                alert(`Copied: ${text}`);
            })
            .catch(err => {
                console.error('Failed to copy: ', err);
            });
    }
</script>

<!-- Include Bootstrap Icons CSS for the clipboard icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<style>
    .payment-detail {
        padding: 10px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .payment-detail i {
        color: #007bff;
        margin-left: 10px;
        font-size: 1.2em;
    }
</style>


@include('dashboard.footer')

