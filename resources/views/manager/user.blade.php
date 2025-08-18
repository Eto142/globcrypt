@include('manager.header')
@include('manager.navbar')
<!-- Content wrapper start -->
<div class="content-wrapper">
    <!-- User Profile Summary Section -->
    <div class="row gx-3">
        <div class="col-sm-4 col-12">
            <div class="card card-cover rounded-2">
                <div class="contact-card">
                    <div class="d-flex justify-content-end mb-2">
						<a href="{{route('clear.account',$userProfile->id)}}" class="clear-account-card btn btn-danger" >
							<i class="bi bi-trash"></i> Clear Account
						</a>
					</div>

                    <h5>{{$userProfile->name}}</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between"><span>Email: </span> {{$userProfile->email}}</li>
                        <li class="list-group-item d-flex justify-content-between"><span>Country: </span> {{$userProfile->country}}</li>
                    </ul>
                    <br>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Balance: </span>{{$userProfile->currency}}{{$user_balance}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Profit: </span>{{$userProfile->currency}}{{$totalProfit}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Deposit: </span>{{$userProfile->currency}}{{$totalDeposit}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Withdrawals: </span>{{$userProfile->currency}}{{$totalWithdrawal}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Bonus: </span>{{$userProfile->currency}}{{$totalBonus}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Trade Fee: </span>{{$userProfile->currency}}{{$userProfile->update_trade_fee}}
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>  Withdrawal Charge: </span>{{$userProfile->currency}}{{$userProfile->withdrawal_charge}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons Section -->
    <div class="row gx-3">
        <div class="col-xxl-12">
            <div class="card m-2">
                <div class="card-body">
                    <!-- Deposit Actions -->
                    <div class="btn-group mb-3" role="group">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            Add Deposit
                        </button>
                        
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2">
                            Add Referral Bonus
                        </button>
                        
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3">
                            Top Up Profit
                        </button>
                        
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4">
                            Debit Profit
                        </button>
                    </div>
                    
                    <!-- User Settings -->
                    <div class="btn-group mb-3" role="group">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter5">
                            Update Signal Strength
                        </button>
                        
                        {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter6">
                            Update Notification
                        </button> --}}

                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter7">
                            Update Withdrawal Charge
                        </button>
                        
                        {{-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalCenter9">
                            Update Escrow Amount
                        </button> --}}
                        
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModalCenter11">
                            Update Trade Fee
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Section -->
    <!-- Add Deposit Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add User Deposit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/add-deposit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Amount</label>
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount " />
                        <input type="hidden" class="form-control" id="exampleInputEmail1" name="payment_method" value="Bitcoin">
                        <input type="date" name="deposit_date" placeholder="e.g 3 days" class="form-control" />
                        <div class="m-0">
                            <label class="form-label">Transaction Id</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add User Deposit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Referral Bonus Modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add {{$userProfile->name}} Bonus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/add-referral')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount " />
                        <div class="m-0">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Add Bonus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Top Up Profit Modal -->
    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Top Up {{$userProfile->name}} Profit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/add-profit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Amount</label>
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount " />
                        <div class="m-0">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Top Up Profit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Debit Profit Modal -->
    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Debit {{$userProfile->name}} Total Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/debit-profit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="{{$userProfile->email}}" />
                        <input type="hidden" name="user_id" value="{{$userProfile->id}}" />
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount " />
                        <div class="m-0">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Debit Total Balance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Signal Strength Modal -->
    <div class="modal fade" id="exampleModalCenter5" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Signal Strength</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('signal.strength',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="signal_strength" class="form-control" value="{{$userProfile->signal_strength}}" min="1" max="100" style="color:blue" placeholder="E.g 40 " />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Signal Strength</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



     <!-- Update withdrawal charge Modal -->
    <div class="modal fade" id="exampleModalCenter7" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Withdrawal Charge</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <form action="{{ route('withdrawal.charge',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Amount</label>
                        <input type="text" name="withdrawal_charge" class="form-control" value="{{$userProfile->withdrawal_charge}}"  style="color:blue" placeholder="E.g 100 " />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Withdrawal Charge</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Update Notification Modal -->
    <div class="modal fade" id="exampleModalCenter6" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update.notification',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="m-0">
                        <label class="form-label">Notification Message: </label>
                        {{$userProfile->update_notification}}
                        <textarea name="update_notification" class="form-control" rows="3" value="{{$userProfile->update_notification}}" ></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Notification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Escrow Amount Modal -->
    <div class="modal fade" id="exampleModalCenter9" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Escrow Amount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update.escrow',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="update_escrow" class="form-control" value="{{$userProfile->update_escrow}}" min="" max="" style="color:blue" placeholder="E.g 40 " />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Escrow Balance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Trade Fee Modal -->
    <div class="modal fade" id="exampleModalCenter11" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update {{$userProfile->name}} Trade Fee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update.tradefee',$userProfile->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Amount</label>
                        <input type="number" step="0.0000000001" name="update_trade_fee" class="form-control" value="{{$userProfile->update_trade_fee}}" style="color:blue" placeholder="E.g 40 " />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Trade Fee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Transaction History Sections -->
    <div class="row gx-3">
        <!-- Deposit History -->
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Deposit History</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlightRowColum" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                    <th>Transaction ID</th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Decline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposit as $deposit)
                                <tr>
                                    <td>{{$deposit->payment_method}}</td>
                                    <td>${{number_format($deposit->amount, 2)}}</td>
                                    <td>{{$deposit->wallet_id}}</td>
                                    <td> <img src="{{asset('uploads/deposits/'.$deposit->image)}}" width="30%"></td>
                                    <td>
                                        @if ($deposit->status == '1')
                                        <span class="badge shade-light-green">Completed</span>
                                        @elseif($deposit->status == '0')
                                        <span class="badge shade-light-red">Pending</span>
                                        @elseif($deposit->status == '2')
                                        <span class="badge shade-light-red">Declined</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('D, M j, Y g:i A') }}</td>
                                    <td>
                                        <form action="{{url('approve-deposit/'.$deposit->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                            <input type="hidden" name="email" value="{{$userProfile->email}}">
                                            <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                            <input type="hidden" name="payment_method" value="{{$deposit->payment_method}}">
                                            <button type="submit" class="badge shade-blue">Approve</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{url('decline-deposit/'.$deposit->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                            <input type="hidden" name="email" value="{{$userProfile->email}}">
                                            <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                            <input type="hidden" name="payment_method" value="{{$deposit->payment_method}}">
                                            <button type="submit" class="badge shade-red">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdrawal History -->
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Withdrawal History</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlightRowColumn" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Wallet Address</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Decline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdrawal as $withdrawal)
                                <tr>
                                    <td>{{$withdrawal->transaction_id}}</td>
                                    <td>${{number_format($withdrawal->amount, 2)}}</td>
                                    <td>{{$withdrawal->wallet_address}}</td>
                                    <td>
                                        @if ($withdrawal->status == '1')
                                        <span class="badge shade-light-green">Completed</span>
                                        @elseif($withdrawal->status == '0')
                                        <span class="badge shade-light-red">Pending</span>
                                        @elseif($withdrawal->status == '2')
                                        <span class="badge shade-light-red">Declined</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->format('D, M j, Y g:i A') }}</td>
                                    <td>
                                        <form action="{{url('approve-withdrawal/'.$withdrawal->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                            <input type="hidden" name="email" value="{{$userProfile->email}}">
                                            <input type="hidden" name="amount" value="{{$withdrawal->amount}}">
                                            <input type="hidden" name="payment_method" value="{{$withdrawal->withdrawal_method}}">
                                            <button type="submit" class="badge shade-blue">Approve</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{url('decline-withdrawal/'.$withdrawal->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                            <input type="hidden" name="email" value="{{$userProfile->email}}">
                                            <input type="hidden" name="amount" value="{{$withdrawal->amount}}">
                                            <input type="hidden" name="payment_method" value="{{$withdrawal->withdrawal_method}}">
                                            <button type="submit" class="badge shade-red">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- KYC Details -->
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">KYC Details</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlightRowColumn" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Id Card Front</th>
                                    <th>Back</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="{{asset('uploads/kyc/'.$userProfile->id_card)}}" width="30%"></td>
                                    <td> <img src="{{asset('uploads/kyc/'.$userProfile->passport)}}" width="30%"></td>
                                    @if($userProfile->kyc_status=='0')
                                    <td>pending</td>
                                    @elseif($userProfile->kyc_status=='1')
                                    <td>approved</td>
                                    @elseif($userProfile->kyc_status=='2')
                                    <td>Declined</td>
                                    @endif
                                    <td>{{$userProfile->created_at}}</td>
                                    <td>
                                        <form action="{{url('accept-kyc/'.$userProfile->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="btn btn-primary me-2" href="">Approve</button>
                                        </form>
                                        <br>
                                        <form action="{{url('decline-kyc/'.$userProfile->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="btn btn-danger" href="">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- SO Protect Payment Proof -->
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">SO Protect Payment Proof</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlightRowColumn" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Proof</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="{{asset('user/uploads/bot/'.$userProfile->bot_image)}}" width="30%"></td>
                                    @if($userProfile->bot_status=='0')
                                    <td>pending</td>
                                    @elseif($userProfile->bot_status=='1')
                                    <td>approved</td>
                                    @elseif($userProfile->bot_status=='2')
                                    <td>Declined</td>
                                    @endif
                                    <td>{{$userProfile->created_at}}</td>
                                    <td>
                                        <form action="{{url('accept-bot/'.$userProfile->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="btn btn-primary me-2" href="">Approve</button>
                                        </form>
                                        <br>
                                        <form action="{{url('decline-bot/'.$userProfile->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="btn btn-danger" href="">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <!-- Investment History -->
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Investment History</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlightRowColumn1" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Investment Package</th>
                                    <th>Amount</th>
                                    <th>Plan Duration</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plan as $plan)
                                <tr>
                                    <td>{{$plan->plan_name}}</td>
                                    <td>${{number_format($plan->amount, 2, '.', ',')}}</td>
                                    <td>{{$plan->plan_duration}}</td>
                                    @if($plan->status=='0')
                                    <td style="color: red">inactive</td>
                                    @elseif($plan->status== '1')
                                    <td style="color: green">Active</td>
                                    @endif
                                    <td>{{ \Carbon\Carbon::parse($plan->created_at)->format('D, M j, Y g:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Earning History -->
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Earning History</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlightRowColumn2" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Transaction</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($earning as $earning)
                                <tr>
                                    <td>{{$earning->transaction_id}}</td>
                                    <td>${{number_format($earning->amount, 2, '.', ',')}}</td>
                                    <td>{{$earning->description}}</td>
                                    <td>{{ \Carbon\Carbon::parse($earning->created_at)->format('D, M j, Y g:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content wrapper scroll end -->

		@include('manager.footer')