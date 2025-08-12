@include('dashboard.header')


<br>
<br>
<br>

<style>
    /* Icon Container Styles */
    .icon-container {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;  /* Adjust size as needed */
        height: 40px; /* Adjust size as needed */
        border-radius: 50%;
        color: white; /* Icon color */
    }

    .bg-success {
        background-color: #28a745; /* Success color */
    }

    .bg-dark {
        background-color: #343a40; /* Dark color */
    }

    .icon {
        font-size: 20px; /* Adjust icon size as needed */
    }

    /* Table Styles: Remove All Borders */
    .table {
        border-collapse: collapse; /* Ensures no gaps between cells */
        border: none !important; /* Removes table borders */
    }

    .table th,
    .table td {
        border: none !important; /* Removes cell borders */
        outline: none; /* Removes focus outlines, if any */
    }

    /* Additional Rules for Removing Borders */
    .table *,
    .table *:before,
    .table *:after {
        border: none !important; /* Removes borders from pseudo-elements */
    }
</style>

<div class="container-fluid">
    <h4 class="text-white font-w600 mb-4">Transaction History</h4>

    <div class="table-responsive">
        <table class="table table-bordered  mb-0">
            <thead>
                <tr>
                    <th></th>
                    <th style='color:white'>Transaction Details</th>
                    <th style='color:white'>Amount</th>
                    <th style='color:white'>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $transaction)
                <tr>
                   <td>
    @if($transaction->transaction == 'credit')
        <div class="icon-container bg-dark">
            <div class="icon">&#128179;</div>
        </div>
    @elseif($transaction->transaction == 'debit')
        <div class="icon-container bg-dark">
            <div class="icon">&#128176;</div>
        </div>
    @endif
</td>

                    <td>
                        <span class="text-white">  @if($transaction->transaction == 'credit')
                        <div class="">Deposit</div>
                        @elseif($transaction->transaction == 'debit')
                        <div class="">Withdrawal</div>
                        @endif
                        {{$transaction->created_at}}</span>
                    </td>
                    <td>
                        <span class="text-white font-w500">
                            @if($transaction->transaction == 'credit')
                            + {{Auth::user()->currency}} {{number_format($transaction->credit, 2, '.', ',')}}
                            @elseif($transaction->transaction == 'debit')
                            - {{Auth::user()->currency}} {{number_format($transaction->debit, 2, '.', ',')}}
                            @endif 
                        </span>
                    </td>
                    <td>
                        @if($transaction->status == '1')
                        <span class='badge badge-success' style='color:green'>Successful</span>
                        @elseif($transaction->status == '0')
                        <span class='badge badge-primary' style='color:blue'>Pending</span>
                        @else
                        <span class='badge badge-warning' style='color:red'>Failed</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@include('dashboard.footer')