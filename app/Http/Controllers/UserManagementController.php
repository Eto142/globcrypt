<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\User;
use App\Models\Profit;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Traders;
use App\Models\Refferal;
use App\Models\Investment;
use App\Models\Withdrawal;
use App\Mail\sendUserEmail;
use App\Models\Debitprofit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\approveDepositEmail;
use App\Mail\DeclineDepositEmail;
use App\Mail\ApproveWithdrawalEmail;
use App\Mail\DeclineWithdrawalEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class UserManagementController extends Controller
{



    public function viewUser()
    {

        if (Auth::user()->user_type == '1') {
            $result      = DB::table('users')->where('usertype', '0')->get();
            return view('manager.users', compact('result'));
        } else {
            return redirect()->route('home');
        }
    }

    public function usersDeposit()
    {


        // $profile = Session::get('user_id');
        // // $employees = DB::table('profile_information')->where('user_id',$profile)->first();
        // $result      = DB::table('users')->get();
        $user      = DB::table('users')->get();
        $deposit      = DB::table('deposits')->get();
        $totalDeposit      = DB::table('deposits')->count();
        $activeDeposit      = DB::table('deposits')->where('status', '1')->sum('amount');
        $inactiveDeposit      = DB::table('deposits')->where('status', '0')->sum('amount');
        return view('manager.users_deposits', compact('deposit', 'user', 'totalDeposit', 'activeDeposit', 'inactiveDeposit'));
    }

    public function usersWithdrawals()
    {

        $user      = DB::table('users')->get();
        $withdrawal      = DB::table('withdrawals')->get();
        $totalWithdrawal      = DB::table('withdrawals')->count();
        $activeWithdrawal      = DB::table('withdrawals')->where('status', '1')->sum('amount');
        $inactiveWithdrawal      = DB::table('withdrawals')->where('status', '0')->sum('amount');
        return view('manager.users_withdrawals', compact('withdrawal', 'user', 'totalWithdrawal', 'activeWithdrawal', 'inactiveWithdrawal'));
    }

    public function usersProfit()
    {

        $user      = DB::table('users')->get();
        $profit      = DB::table('profits')->get();
        return view('manager.users_profits', compact('profit', 'user'));
    }

    // Copy Trader
    public function addTrader()
    {
        $data['traders']      = DB::table('traders')->get();
        return view('manager.copytrader', $data);
    }

    public function saveTrader(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'copier' => 'required',
            'gains' => 'required',
             'risk' => 'required',
             'loss' => 'required',
             'commission' => 'required',
            'total_transactions' => 'required',
        ]);

        $traderData = [
            'name' => $validatedData['name'],
            'copier' => $validatedData['copier'],
            'gains' => $validatedData['gains'],
            'risk' => $validatedData['risk'],
            'loss' => $validatedData['loss'],
            'commission' => $validatedData['commission'],
            'total_transactions' => $validatedData['total_transactions'],
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/trader', $filename);
            $traderData['image'] = $filename;
        }

        Traders::create($traderData);

        return back()->with('message', 'Trader Created Successfully');
    }

    public function deleteTrader($id)
    {

        $trader  = Traders::findOrFail($id);
        $trader->delete();
        return back()->with('message', 'Trader deleted Successfully!');
    }


    public function editTrader($id)
    {


        $editTrader   = DB::table('traders')->where('id', $id)->first();

        return view('manager.edit-trader', compact('editTrader'));
    }



    public function updateTrader(Request $request, int $trader_id)

    {



        $trader = Traders::findOrFail($trader_id);
        $trader->name = $request['name'];
        $trader->copier = $request['copier'];
        $trader->gains = $request['gains'];
        $trader->risk = $request['risk'];
        $trader->loss = $request['loss'];
        $trader->commission = $request['commission'];
        $trader->total_transactions = $request['total_transactions'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/trader', $filename);
            $traderData['image'] = $filename;
        }
        // if ($request->hasFile('image')) {
        //     // Delete the old image if it exists
        //     if ($trader->image) {
        //         $oldImagePath = public_path('uploads/trader/' . $trader->image);
        //         if (file_exists($oldImagePath)) {
        //             unlink($oldImagePath);
        //         }
        //     }

        //     // Upload the new image
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move('uploads/trader', $filename);

        //     // Update the trader's image in the database
        //     $trader->image = $filename;
        // }
        $trader->update($request->all());


        return back()->with('message', 'Expert Trader Updated Successfully');
    }




    public function userProfile($id)
    {




        $userProfile      = DB::table('users')->where('id', $id)->first();
        // $user_transactions = Transaction::where('id', $id)->orderBy('id', 'desc')->get();
        $userProfit    = DB::table('profits')->where('user_id', $id)->orderBy('id', 'desc')->get();
        $kyc      = DB::table('kycs')->where('user_id', $id)->orderBy('id', 'desc')->get();
        $data['deposit'] =  Deposit::where('user_id', $id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', $id)->orderBy('id', 'desc')->get();
        $data['plan'] =  Plan::where('user_id', $id)->orderBy('id', 'desc')->get();
        // // $data['investment'] =  Investment::where('user_id', $id)->orderBy('id', 'desc')->get();
        // $userTrading    = DB::table('plans')->where('user_id',$id)->orderBy('id','desc')->get();
        $data['earning'] =  Earning::where('user_id', $id)->orderBy('id', 'desc')->get();



        // sum transactions
        $totalDeposit      = DB::table('deposits')->where('user_id', $id)->where('status', '1')->sum('amount');
        $totalEarning      = DB::table('earnings')->where('user_id', $id)->sum('amount');
        $addProfit      = DB::table('profits')->where('user_id', $id)->sum('amount');
        $debitProfit      = DB::table('debitprofits')->where('user_id', $id)->sum('amount');
        $totalProfit      =  $addProfit  -  $debitProfit;
        $totalBonus      = DB::table('refferals')->where('user_id', $id)->sum('amount');
        $totalPlan      = DB::table('plans')->where('user_id', $id)->sum('amount');
        $totalWithdrawal      = DB::table('withdrawals')->where('user_id', $id)->sum('amount');

        $totalBalance =  $totalDeposit + $totalEarning + $totalProfit + $totalBonus  - $totalWithdrawal ;
            $data['credit'] = Transaction::where('user_id', $id)->where('status', '1')->sum('credit');
             $data['debit'] = Transaction::where('user_id', $id)->where('status', '1')->sum('debit');
            $data['user_balance'] =  $data['credit'] - $data['debit'];
        return view('manager.user', $data, compact('userProfile', 'userProfit', 'totalBalance', 'totalProfit', 'totalDeposit', 'totalBonus', 'totalWithdrawal', 'kyc'));
    }
    public function sendUserMail($email)
    {
        $data['user']  = DB::table('users')->where('id', $email)->first();
        return view('manager.send_user_mail', $data);
    }

    public function sendMail(Request $request)

    {

        if (Auth::check()) {

            $email = $request->input('email');
            //$subject = $request->input('subject');
            $data = [
                'message' => $request->message,
                'subject' => $request->subject,
            ];


            Mail::to($email)->send(new sendUserEmail($data));

            return back()->with('status', 'Email Successfully sent');
        }
    }

    // public function approveDeposit(Request $request, $id)
    // {
    //     $user_id = $request->user_id;
    //     $transaction =  Deposit::where('user_id', $user_id)->first();
    //     $transaction_id = $transaction->transaction_id;

    //     $deposit = array();
    //     $deposit['status'] = 1;
    //     $update = DB::table('deposits')->where('id', $id)->update($deposit);
    //     $update = DB::table('transactions')->where('transaction_id', $transaction_id)->update($deposit);

    //     $email = $request->email;
    //     $amount = $request->amount;
    //     $payment_method = $request->payment_method;

    //     $data = "Your $" . $amount . " " . $payment_method . " Deposit has been approved successfully";

    //     //Mail::to($email)->send(new approveDepositEmail($data));
    //     return redirect()->back()->with('message', 'Deposit Has Been Approved Successfully');
    // }



public function approveDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 1;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['status' => 1]);

    $email = $deposit->user->email; // Assuming there's a user relationship in Deposit model
    $amount = $deposit->amount;
    $payment_method = $deposit->payment_method;

    $data = "Your $" . $amount . " " . $payment_method . " Deposit has been approved successfully";

    Mail::to($email)->send(new approveDepositEmail($data));
    return redirect()->back()->with('message', 'Deposit Has Been Approved Successfully');
}






public function DeclineDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit to declined
    $deposit->status = 2;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['status' => 2]);

    $email = $deposit->user->email; // Assuming there's a user relationship in Deposit model
    $amount = $deposit->amount;
    $payment_method = $deposit->payment_method;

    $data = "Your $" . $amount . " " . $payment_method . " Deposit was declined. Please contact our administration for more information";

    Mail::to($email)->send(new DeclineDepositEmail($data));
    return redirect()->back()->with('message', 'Deposit Declined');
}




    // public function DeclineDeposit(Request $request, $id)
    // {
    //     $user_id = $request->user_id;
    //     $transaction =  Deposit::where('user_id', $user_id)->first();
    //     $transaction_id = $transaction->transaction_id;

    //     $deposit = array();
    //     $deposit['status'] = 2;
    //     $update = DB::table('deposits')->where('id', $id)->update($deposit);
    //     $update = DB::table('transactions')->where('transaction_id', $transaction_id)->update($deposit);

    //     $email = $request->email;
    //     $amount = $request->amount;
    //     $payment_method = $request->payment_method;

    //     $data = "Your $" . $amount . " " . $payment_method . " Deposit was declined. Please contact our administration for more information";

    //     //Mail::to($email)->send(new approveDepositEmail($data));
    //     return redirect()->back()->with('message', 'Deposit Declined');
    // }

    // public function ApproveWithdrawal(Request $request, $id)
    // {
    //     $user_id = $request->user_id;
    //     $transaction =  Withdrawal::where('user_id', $user_id)->first();
    //     $transaction_id = $transaction->transaction_id;

    //     $withdrawal = array();
    //     $withdrawal['status'] = $request->status;
    //     $update = DB::table('withdrawals')->where('id', $id)->update($withdrawal);
    //     $update = DB::table('transactions')->where('transaction_id', $transaction_id)->update($withdrawal);

    //     $email = $request->email;
    //     $amount = $request->amount;
    //     $payment_method = $request->payment_method;

    //     $data = "Your $" . $amount . " " . $payment_method . " Withdrawal has been approved successfully";

    //     //Mail::to($email)->send(new ApproveWithdrawalEmail($data));
    //     return redirect()->back()->with('message', 'Withdrawal Has Been Approved Successfully');
    // }
    
    
    
    
    public function ApproveWithdrawal(Request $request, $id)
{
    $user_id = $request->user_id;

    // Fetch the specific withdrawal transaction by its ID
    $transaction = Withdrawal::where('id', $id)->where('user_id', $user_id)->first();

    // Ensure the transaction exists before proceeding
    if (!$transaction) {
        // Handle error, maybe return with an error message
        return redirect()->back()->with('error', 'Withdrawal not found.');
    }

    $transaction_id = $transaction->transaction_id;

    $withdrawal = array();
    $withdrawal['status'] = $request->status;
    
    // Update the withdrawal status
    $updateWithdrawal = DB::table('withdrawals')->where('id', $id)->update($withdrawal);

    // Update the status in the associated transaction
    $updateTransaction = DB::table('transactions')->where('transaction_id', $transaction_id)->update($withdrawal);

    $email = $request->email;
    $amount = $request->amount;
    $payment_method = $request->payment_method;

    $data = "Your $" . $amount . " " . $payment_method . " Withdrawal has been approved successfully";

    Mail::to($email)->send(new ApproveWithdrawalEmail($data));

    return redirect()->back()->with('message', 'Withdrawal Has Been Approved Successfully');
}

    
    
    
    
    
    
    
    
    
    

    // public function DeclineWithdrawal(Request $request, $id)
    // {
    //     $user_id = $request->user_id;
    //     $transaction =  Withdrawal::where('user_id', $user_id)->first();
    //     $transaction_id = $transaction->transaction_id;

    //     $withdrawal = array();
    //     $withdrawal['status'] = $request->status;
    //     $update = DB::table('withdrawals')->where('id', $id)->update($withdrawal);
    //     $update = DB::table('transactions')->where('transaction_id', $transaction_id)->update($withdrawal);

    //     $email = $request->email;
    //     $amount = $request->amount;
    //     $payment_method = $request->payment_method;

    //     $data = "Your $" . $amount . " " . $payment_method . " was declined. Please contact our administration for more information";

    //     //Mail::to($email)->send(new ApproveWithdrawalEmail($data));
    //     return redirect()->back()->with('message', 'Withdrawal Declined');
    // }





public function DeclineWithdrawal(Request $request, $id)
{
    $user_id = $request->user_id;
    
    // Fetch the specific withdrawal transaction by its ID
    $transaction = Withdrawal::where('id', $id)->where('user_id', $user_id)->first();

    // Ensure the transaction exists before proceeding
    if (!$transaction) {
        // Handle error, maybe return with an error message
        return redirect()->back()->with('error', 'Withdrawal not found.');
    }

    $transaction_id = $transaction->transaction_id;

    $withdrawal = array();
    $withdrawal['status'] = $request->status;
    
    // Update the withdrawal status
    $updateWithdrawal = DB::table('withdrawals')->where('id', $id)->update($withdrawal);
    
    // Update the status in the associated transaction
    $updateTransaction = DB::table('transactions')->where('transaction_id', $transaction_id)->update($withdrawal);

    $email = $request->email;
    $amount = $request->amount;
    $payment_method = $request->payment_method;

    $data = "Your $" . $amount . " " . $payment_method . " was declined. Please contact our administration for more information";

    Mail::to($email)->send(new DeclineWithdrawalEmail($data));
    return redirect()->back()->with('message', 'Withdrawal Declined');
}


    public function getUserProfit($id)
    {




        $userProfile   = DB::table('users')->where('id', $id)->first();

        return view('manager.add_profit', compact('userProfile'));
    }

    public function addUserProfit(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
        $transaction_id = rand(76503737, 12344994);
        $topUp = new Profit;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        // $topUp->plan_name=$request['plan_name'];
        $topUp->amount = $request['amount'];
        // $topUp->plan_type=$request['plan_type'];

        $topUp->save();


        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Profit";
        $transaction->transaction = "credit";
        $transaction->credit = $request['amount'];
        $transaction->debit = "0";
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('message', 'User Profit Topped Up Successfully');
    }


    public function getDebitProfit($id)
    {




        $userProfile   = DB::table('users')->where('id', $id)->first();

        return view('manager.debit_profit', compact('userProfile'));
    }

    public function debitUserProfit(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);

        $transaction_id = rand(76503737, 12344994);


        $topUp = new Debitprofit;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        $topUp->amount = $request['amount'];
        $topUp->save();

        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('message', 'User Total Balance Debited Successfully');
    }

    public function getUserDeposit($id)
    {




        $userProfile   = DB::table('users')->where('id', $id)->first();

        return view('manager.add_deposit', compact('userProfile'));
    }


    public function addUserDeposit(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
        $transaction_id = rand(76503737, 12344994);
        $topUp = new Deposit;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        $topUp->payment_method = $request['payment_method'];
        $topUp->amount = $request['amount'];
        $topUp->status = 1;
        $topUp->created_at = $request['deposit_date'];
       
        $topUp->save();




        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "credit";
        $transaction->credit = $request['amount'];
        $transaction->debit ="0";
        $transaction->status = 1;
        $transaction->save();


        return redirect()->back()->with('message', 'User Deposit Added Successfully');
    }







        public function adminChangePassword()
    {
        return view('manager.change_password');
    }
    
     public function adminUpdatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
             $data['message'] = 'old password not correct';
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    Session::flush();
    Auth::guard('web')->logout();
    return redirect('login')->with('status', 'Password Updated Successfully, Please login with your new password');

}






    public function getUserReferral($id)
    {




        $userProfile   = DB::table('users')->where('id', $id)->first();

        return view('manager.add_referral', compact('userProfile'));
    }

    public function addUserReferral(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);



        $transaction_id = rand(76503737, 12344994);
        $topUp = new Refferal;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        $topUp->amount = $request['amount'];

        $topUp->save();




        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "credit";
        $transaction->credit =  $request['amount'];
        $transaction->debit = "0";
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('message', 'User Bonus Added Successfully');
    }










    public function updateWallet()
    {

        return view('manager.update_wallet');
    }

    public function saveWallet(Request $request)
    {


        $update = Auth::user();
        $update->eth_address = $request['eth_address'];
        $update->btc_address = $request['btc_address'];
        $update->usdt_address = $request['usdt_address'];

        $update->save();
        return back()->with('status', 'Wallet Details Updated Successfully');
    }



    // public function updateSignal(Request $request)
    // {


    //     $update = Auth::user();
    //     $update->signal_strength = $request['signal_strength'];


    //     $update->save();
    //     return back()->with('status', 'Signal Strength Updated Successfully');
    // }



    public function chooseWallet(Request $request)
    {
        $method = $request->input('method');

        if ($method == 'btc') {

            return view('manager.btc');
        } elseif ($method == 'eth') {

            return view('manager.eth');
        }
        elseif ($method == 'bank') {

            return view('manager.bank');
        } elseif ($method == 'usdt') {

            return view('manager.usdt');
        } else {
            return back()->with('status', 'You have not chose a wallet');
        }
    }

    public function updateTrc(Request $request)
    {


        $update = Auth::user();
        $update->usdt_address = $request['usdt_address'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('manager/uploads/manager', $filename);
            $update->usdtImage =  $filename;
        }

        $update->save();
        return redirect('update-wallet')->with('status', 'Trc Details Updated Successfully');
    }

    public function updateBtc(Request $request)
    {


        $update = Auth::user();
        $update->btc_address = $request['btc_address'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('manager/uploads/manager', $filename);
            $update->btcImage =  $filename;
        }

        $update->save();
        return redirect('update-wallet')->with('status', 'Btc Details Updated Successfully');
    }
    public function updateEth(Request $request)
    {


        $update = Auth::user();
        $update->eth_address = $request['eth_address'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('manager/uploads/manager', $filename);
            $update->ethImage =  $filename;
        }


        $update->save();
        return redirect('update-wallet')->with('status', 'Eth Details Updated Successfully');
    }

    public function updateBank(Request $request)
    {

        $update = Auth::user();
        $update['bankName'] = $request->bank_name;
        $update['accountName'] = $request->account_name;
        $update['accountNumber'] = $request->account_number;
        $update['bankAddress'] = $request->bank_address;
        $update['swiftCode'] = $request->swift_code;
        $update->update();

        return redirect('update-wallet')->with('status', 'Bank Details Updated Successfully');
    }


  public function clearAccount($id)
   {
       $user = User::find($id);
       if ($user) {

       // Delete related records (posts, comments, likes) associated with the user
          
          
                                                    
 $user->debitprofit()->delete();
 $user->referral()->delete();
 $user->profit()->delete();
 $user->withdrawal()->delete();
 $user->deposit()->delete();
 $user->transaction()->delete();

       

  
            return back()->with('message', 'Records deleted successfully');
        } else {
            return back()->with('message', 'User Not Found');
        }


    }
    



    public function sendTestMail()
    {

        return view('manager.send_test_mail');
    }

    public function allTransactions()
    {
        $data['user_transactions'] = Transaction::join('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.*', 'users.name as user_name') // Select the columns you need
            ->orderBy('transactions.id', 'desc')
            ->get();

        return view('manager.transactions', $data);
    }




    public function sendUserEmail(Request $request)

    {

        $email = $request->input('email');
        //$subject = $request->input('subject');
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];




        Mail::to($email)->send(new sendUserEmail($data));

        return back()->with('status', 'Email Successfully sent');
    }

    public function deleteUser($id)
    {

        $user  = User::findOrFail($id);
        $user->delete();
        return back()->with('message', 'User deleted Successfully');
    }

    public function acceptKyc($id)
    {

        $user  = User::findOrFail($id);
        $user->kyc_status = '1';
        $user->save();
        return back()->with('message', 'Kyc Approved Successfully');
    }


    public function rejectKyc($id)
    {

        $user  = User::findOrFail($id);
        $user->kyc_status = '2';
        $user->save();
        return back()->with('message', 'Kyc Rejected Successfully');;
    }
    
    
    
     public function acceptBot($id)
    {

        $user  = User::findOrFail($id);
        $user->bot_status = '1';
        $user->save();
        return back()->with('message', 'Bot Approved Successfully');
    }


    public function rejectBot($id)
    {

        $user  = User::findOrFail($id);
        $user->bot_status = '2';
        $user->save();
        return back()->with('message', 'Bot Rejected Successfully');;
    }



    


    public function updateWithdrawalCharge(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->withdrawal_charge = $request->withdrawal_charge;
        $user->save();
        return back()->with('message', 'Withdrawal Charge updated successfully');
    }
    




    public function updateSignalStrength(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->signal_strength = $request->signal_strength;
        $user->save();
        return back()->with('message', 'Signal Strength update successful');
    }
    
     public function updateNotification(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->update_notification = $request->update_notification;
        $user->save();
        return back()->with('message', 'Notification update successful');
    }
    
    
     public function updateEscrow(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->update_escrow = $request->update_escrow;
        $user->save();
        return back()->with('message', 'Escrow Amount updated successfully');
    }



     
    public function updateTradefee(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->update_trade_fee = $request->update_trade_fee;
        $user->save();
        return back()->with('message', 'Trade Fee updated successfully');
    }
}
