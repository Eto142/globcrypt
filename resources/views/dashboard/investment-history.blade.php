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

    /* Table Styles */
    .table {
        border-collapse: collapse; /* Ensures no gaps between cells */
        border: none !important; /* No borders for the table */
    }

    .table th,
    .table td {
        border: none !important; /* Ensures no borders for individual cells */
        outline: none; /* Removes any focus outlines */
    }

    /* Additional Safety to Remove Borders */
    .table *,
    .table *:before,
    .table *:after {
        border: none !important;
    }
</style>

<div class="container-fluid">
    <h4 class="text-white font-w600 mb-4">Investment History</h4>

  <div class="table-responsive">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th style="color:white">Transaction ID</th>
                <th style="color:white">Amount</th>
                <th style="color:white">Plan Name</th>
                <th style="color:white">Plan Duration</th>
                <th style="color:white">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plan as $transaction)
            <tr>
                <td style="color:white">
                   {{$transaction->transaction_id}}
                </td>
                <td style="color:white">
                   {{$transaction->amount}}
                </td>
                <td style="color:white">{{$transaction->plan_name}}</td>
                <td style="color:white">{{$transaction->plan_duration}}</td>
                <td style="color:white">{{$transaction->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






@include('dashboard.footer')