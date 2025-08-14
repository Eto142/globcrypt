<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\User;
use App\Models\Profit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Traders;
use App\Models\Refferal;
use App\Mail\supportEmail;
use App\Models\Investment;
use App\Models\Withdrawal;
use App\Models\Debitprofit;
use App\Models\verifyToken;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{




    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
      
// Fetch Bitcoin price from CoinPaprika API
$price = 0;
try {
    $client = new Client();
    $response = $client->get('https://api.coinpaprika.com/v1/tickers/btc-bitcoin');
    $data = json_decode($response->getBody(), true);
    $price = $data['quotes']['USD']['price'] ?? 0;
} catch (RequestException $e) {
    \Log::error('Failed to fetch Bitcoin price from CoinPaprika: ' . $e->getMessage());
}
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
                    return view('dashboard.home', $data);
                


            } else {
                $result    = DB::table('users')->where('usertype', '0')->get();
                return view('manager.home', compact('result'));
            }
        } else {
            return redirect()->back();
        }
    }





    public function dashboard()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {

   // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
                    return view('dashboard.home', $data);
                
            } else {
                $result    = DB::table('users')->where('usertype', '0')->get();
                return view('manager.home', compact('result'));
            }
        } else {
            return redirect()->back();
        }
    }
    public function userDeposit()
    {
        $price = 0;

        try {
            $client = new Client();
            $response = $client->get('https://www.bitstamp.net/api/v2/ticker/btcusd/');
            $data = json_decode($response->getBody(), true);
            $price = $data['last'] ?? 0;
        } catch (RequestException $e) {
            \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
        }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        $data['payment'] = DB::table('users')->where('id', '4')->get();
        return view('dashboard.ninee.ten', $data);
    }


    public function Forex()
    {

       // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.forex', $data);
    }

    public function Binary()
    {
       // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.binary', $data);
    }

    public function Stocks()
    {
       // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.stocks', $data);
    }

    public function Crypto()
    {

              // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.crypto', $data);
    }
    public function Wallet()
    {

       $client = new Client();

// Fetch BTC & ETH prices from CoinGecko in one request
$response = $client->get('https://api.coingecko.com/api/v3/simple/price', [
    'query' => [
        'ids' => 'bitcoin,ethereum',
        'vs_currencies' => 'usd',
    ],
]);

// Decode the JSON response
$data = json_decode($response->getBody(), true);

// Extract BTC & ETH prices
$btc_price = $data['bitcoin']['usd'];
$eth_price = $data['ethereum']['usd'];

// Fetch user transaction data
$data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
$data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
$data['user_balance'] = $data['credit'] - $data['debit'];

// Convert user balance to BTC & ETH
$data['btc_balance'] = $data['user_balance'] / $btc_price;
$data['eth_balance'] = $data['user_balance'] / $eth_price;
        return view('dashboard.wallet', $data);
    }

    // public function Copy()
    // {
    //     $client = new Client();
    //     $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
    //     $data = json_decode($response->getBody(), true);
    //     $price = $data['bpi']['USD']['rate_float'];

    //     $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
    //     $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
    //     $data['user_balance'] =  $data['credit'] - $data['debit'];
    //     $data['btc_balance'] = $data['user_balance'] / $price;
    //     $data['traders']  = Traders::get();
    //     return view('dashboard.copy', $data);
    // }






public function Copy()
{
    // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
    $data['traders']  = Traders::get();
    
    // Check if user_balance is 0
    if ($data['user_balance'] == 0) {
        // If user_balance is 0, redirect with an error message
        return redirect()->back()->with('error', 'Your balance is 0. Fund Account to Copy Trader.');
    }

    return view('dashboard.copy', $data);
}









    public function Crypto_buy()
    {

              // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.crypto_buy', $data);
    }

    public function Bot()
    {

              // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.bot', $data);
    }

    public function Profile()
    {

       // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.profile', $data);
    }

    public function Photo()
    {

try {
    $client = new Client();
    $response = $client->get('https://api.coingecko.com/api/v3/simple/price', [
        'query' => [
            'ids' => 'bitcoin,ethereum',
            'vs_currencies' => 'usd',
        ],
    ]);

    $prices = json_decode($response->getBody(), true);
    $btcPrice = $prices['bitcoin']['usd'] ?? 0;
    $ethPrice = $prices['ethereum']['usd'] ?? 0;
} catch (RequestException $e) {
    Log::error('Failed to fetch cryptocurrency prices: ' . $e->getMessage());
    $btcPrice = 0;
    $ethPrice = 0;
}

// Retrieve user financial data
$userId = Auth::id();

$data = [
    'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
    'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
    'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
    'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
    'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
    'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
    'earning' => Earning::where('user_id', $userId)->sum('amount'),
    'plan' => Plan::where('user_id', $userId)->sum('amount'),
    'referral' => Refferal::where('user_id', $userId)->sum('amount'),
];

// Calculate balances
$data['user_balance'] = $data['credit'] - $data['debit'];
$data['profit'] = $data['addprofit'] - $data['debitprofit'];
$data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];

// Convert user balance to BTC & ETH equivalents
$data['btc_balance'] = $btcPrice > 0 ? $data['user_balance'] / $btcPrice : 0;
$data['eth_balance'] = $ethPrice > 0 ? $data['user_balance'] / $ethPrice : 0;
        return view('dashboard.photo', $data);
    }

    public function supportTicket()
    {

              // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.support', $data);
    }

    public function Bonus()
    {

              // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.bonus', $data);
    }









public function InvestmentHistory()
    {

       // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.investment-history', $data);
    }





    public function accounthistory()
    {

             // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.accounthistory', $data);
    }


    public function tradingHistory()
    {

        // $data['profit'] =  Earning::where('user_id',Auth::user()->id)->where('type', 'ROI')->orderBy('id','desc')->get();

             // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.tradinghistory', $data);
    }
    public function Earning()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.earnings', $data);
    }
    public function buyplan()
    {        // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.buy-plan', $data);
    }

    // public function  investmentHistory()
    // {


    //     // $data['investment'] =  Investment::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
    //     return view('dashboard.investmentHistory');
    // }


   public function referUser()
{
    $btcPrice = 0; // Default BTC price

    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price', [
            'query' => [
                'ids' => 'bitcoin',
                'vs_currencies' => 'usd',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $btcPrice = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }

    // Retrieve user financial data
    $userId = Auth::id();

    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
    ];

    // Calculate user balance
    $data['user_balance'] = $data['credit'] - $data['debit'];

    // Convert user balance to BTC
    $data['btc_balance'] = $btcPrice > 0 ? $data['user_balance'] / $btcPrice : 0;

    return view('dashboard.referuser', $data);
}

    public function Settings()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.settings', $data);
    }


    public function accountSettings()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.account-settings', $data);
    }
public function verifyAccount()
{
    $btcPrice = 0; // Default BTC price

    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price', [
            'query' => [
                'ids' => 'bitcoin',
                'vs_currencies' => 'usd',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $btcPrice = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }

    // Retrieve user financial data
    $userId = Auth::id();

    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'user_balance' => 0,
        'btc_balance' => 0,
        'kycStatus' => Kyc::where('user_id', $userId)->get(),
        'kyc' => Kyc::where('user_id', $userId)->get(),
    ];

    // Calculate user balance
    $data['user_balance'] = $data['credit'] - $data['debit'];

    // Convert user balance to BTC
    $data['btc_balance'] = $btcPrice > 0 ? $data['user_balance'] / $btcPrice : 0;

    return view('dashboard.verify-account', $data)
        ->with('status', 'Documents updated successfully, please wait for approval');

}
    public function withdrawals()
    {

       // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        return view('dashboard.withdrawals', $data);
    }
    public function withdrawFunds()
    {
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.withdraw-funds', $data);
    }
    public function registerPage()
    {

        return view('user.register');
    }
    public function loginPage()
    {

        return view('user.login');
    }

    public function getDeposit(Request $request)
    {

       $btcPrice = 0;
    $ethPrice = 0;
    $client = new Client();

    try {
        // Fetch Bitcoin price from CoinGecko API
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $btcData = json_decode($response->getBody(), true);
        $btcPrice = $btcData['bitcoin']['usd'] ?? 0;
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }

    try {
        // Fetch Ethereum price from CoinGecko API
        $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd');
        $ethData = json_decode($response2->getBody(), true);
        $ethPrice = $ethData['ethereum']['usd'] ?? 0;
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        \Log::error('Failed to fetch Ethereum price: ' . $e->getMessage());
    }

    // Calculate user balance
    $userId = Auth::id();
    $credit = Transaction::where('user_id', $userId)->where('status', '1')->sum('credit');
    $debit = Transaction::where('user_id', $userId)->where('status', '1')->sum('debit');
    $userBalance = $credit - $debit;

    // Prepare data for the view
    $data = [
        'user_balance' => $userBalance,
        'btc_balance' => $btcPrice > 0 ? $userBalance / $btcPrice : 0,
        'amount' => $request->input('amount'),
        'btc_amount' => $btcPrice > 0 ? $request->input('amount') / $btcPrice : 0,
        'eth_amount' => $ethPrice > 0 ? $request->input('amount') / $ethPrice : 0,
        'item' => $request->input('item'),
        'payment' => DB::table('users')->where('id', 4)->get(),  // Use first() for a single record
    ];
  // Return the appropriate view
    return $data['item'] === 'Bank' ? 
        view('dashboard.bank', $data) : 
        view('dashboard.payment', $data);
}




// public function getUserWithdrawal(Request $request)
// {
//     $client = new Client();

//     // Fetch Bitcoin price from CoinGecko
//     $response = $client->get('https://api.coingecko.com/api/v3/simple/price', [
//         'query' => [
//             'ids' => 'bitcoin,ethereum',  // Fetch BTC and ETH prices in one request
//             'vs_currencies' => 'usd',
//         ],
//     ]);

//     // Decode the JSON response
//     $data = json_decode($response->getBody(), true);

//     $price = $data['bitcoin']['usd'];  // BTC price in USD
//     $price2 = $data['ethereum']['usd']; // ETH price in USD

//     // Calculate user balance
//     $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
//     $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
//     $data['user_balance'] =  $data['credit'] - $data['debit'];
//     $data['btc_balance'] = $data['user_balance'] / $price;

//     // Withdrawal calculations
//     $amount = $request->input('amount');
//     $data['amount'] = $amount;
//     $data['btc_amount'] = $data['amount'] / $price;
//     $data['eth_amount'] = $data['amount'] / $price2;
    
//     $item = $request->input('item');
//     $data['item'] = $item;

//     // Render appropriate withdrawal view
//     if ($item == 'Bank') {
//         return view('dashboard.withdraw-bank', $data);
//     } else {
//         return view('dashboard.withdraw-btc', $data);
//     }
// }




 public function getUserWithdrawal(Request $request)
{
    $btcPrice = 0;
    $ethPrice = 0;

    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price', [
            'query' => [
                'ids' => 'bitcoin,ethereum',
                'vs_currencies' => 'usd',
            ],
        ]);

        $prices = json_decode($response->getBody(), true);
        $btcPrice = $prices['bitcoin']['usd'] ?? 0;
        $ethPrice = $prices['ethereum']['usd'] ?? 0;
    } catch (RequestException $e) {
        Log::error('Failed to fetch cryptocurrency prices: ' . $e->getMessage());
    }

    // Retrieve user financial data
    $userId = Auth::id();

    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
    ];

    // Calculate user balance
    $data['user_balance'] = $data['credit'] - $data['debit'];

    // Get withdrawal amount from request
    $data['amount'] = $request->input('amount', 0);

    // Convert balance and withdrawal amount to BTC & ETH
    $data['btc_balance'] = $btcPrice > 0 ? $data['user_balance'] / $btcPrice : 0;
    $data['btc_amount'] = $btcPrice > 0 ? $data['amount'] / $btcPrice : 0;
    $data['eth_amount'] = $ethPrice > 0 ? $data['amount'] / $ethPrice : 0;

    // Get withdrawal method from request
    $data['item'] = $request->input('item');

    // Return appropriate view based on withdrawal method
    return ($data['item'] == 'Bank') 
        ? view('dashboard.withdraw-bank', $data) 
        : view('dashboard.withdraw-btc', $data);
}












    // public function makeDeposit(Request $request)
    // {

    //       $client = new Client();
    //     $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
    //     $data = json_decode($response->getBody(), true);
    //     $price = $data['bpi']['USD']['rate_float'];


    //     $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price', [
    //         'query' => [
    //             'ids' => 'ethereum',
    //             'vs_currencies' => 'usd',
    //         ],
    //     ]);
    //     // Decode the JSON response
    //     $data2 = json_decode($response2->getBody(), true);
    //     $price2 = $data2['ethereum']['usd'];
    //     $transaction_id = rand(76503737, 12344994);
    //     $deposit = new Deposit;
    //     $deposit->transaction_id = $transaction_id;
    //     $deposit->user_id = Auth::user()->id;
    //     $deposit->amount = $request['amount'];
        
    //      $data['amount'] = $amount;
    //     $data['btc_amount'] = $data['amount']  / $price;
    //     $data['eth_amount'] = $data['amount']  / $price2;
    //     $deposit->payment_method = $request['paymethd_method'];
    //      if($request->hasFile('image')){
    //         $file= $request->file('image');
    
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //         $file->move('uploads/deposits',$filename);
    //         $deposit->image =  $filename;
    //       }

    //     $deposit->save();


    //     $transaction = new Transaction;
    //     $transaction->user_id = Auth::user()->id;
    //     $transaction->transaction_id = $transaction_id;
    //     $transaction->transaction_type = "Credit";
    //     $transaction->transaction = "credit";
    //     $transaction->credit =  $request['amount'];
    //     $transaction->debit = "0";
    //     $transaction->status = 0;
    //     $transaction->save();

    //   return view('dashboard.deposit-success', $deposit);
    //     // return redirect('deposit')->with('status', 'Deposits will be pending until there are sufficent confirmations on the blockchain!');
    // }






//   public function makeDeposit(Request $request)
//      {
// $client = new Client();

// // Fetch Bitcoin (BTC) price in USD
// $responseBTC = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
// $dataBTC = json_decode($responseBTC->getBody(), true);
// $priceBTC = $dataBTC['bpi']['USD']['rate_float'];

// // Fetch Ethereum (ETH) price in USD
// $responseETH = $client->get('https://api.coingecko.com/api/v3/simple/price', [
//     'query' => [
//         'ids' => 'ethereum',
//         'vs_currencies' => 'usd',
//     ],
// ]);
// $dataETH = json_decode($responseETH->getBody(), true);
// $priceETH = $dataETH['ethereum']['usd'];

// $transaction_id = rand(76503737, 12344994);

// // Create a new deposit object
// $deposit = new Deposit;
// $deposit->transaction_id = $transaction_id;
// $deposit->user_id = Auth::user()->id;
// $deposit->amount = $request['amount'];
//  $item = $request->input('item');
// // Calculate BTC and ETH amounts
// $deposit->btc_amount = $deposit->amount / $priceBTC;
// $deposit->eth_amount = $deposit->amount / $priceETH;

// $deposit->payment_method = $request['payment_method'];

// if($request->hasFile('image')){
//     $file= $request->file('image');

//     $ext = $file->getClientOriginalExtension();
//     $filename = time().'.'.$ext;
//     $file->move('uploads/deposits',$filename);
//     $deposit->image =  $filename;
// }

// $deposit->save();

// // Create a new transaction object to log the deposit transaction
// $transaction = new Transaction;
// $transaction->user_id = Auth::user()->id;
// $transaction->transaction_id = $transaction_id;
// $transaction->transaction_type = "Credit";
// $transaction->transaction = "credit";
// $transaction->credit =  $request['amount'];
// $transaction->debit = "0";
// $transaction->status = 0;
// $transaction->save();

// // Prepare data to pass to the view
// $dataForView = [
//     'deposit' => $deposit,
//     'item' => $item,
//     'btcAmount' => $deposit->btc_amount,
//     'ethAmount' => $deposit->eth_amount
// ];

// return view('dashboard.deposit-success', $dataForView);
// }






public function makeDeposit(Request $request)
{
   
$client = new Client();

// Fetch Bitcoin (BTC) price in USD using CoinGecko API
$responseBTC = $client->get('https://api.coingecko.com/api/v3/simple/price', [
    'query' => [
        'ids' => 'bitcoin',
        'vs_currencies' => 'usd',
    ],
]);

$dataBTC = json_decode($responseBTC->getBody(), true);
$priceBTC = $dataBTC['bitcoin']['usd'];

    // Fetch Ethereum (ETH) price in USD
    $responseETH = $client->get('https://api.coingecko.com/api/v3/simple/price', [
        'query' => [
            'ids' => 'ethereum',
            'vs_currencies' => 'usd',
        ],
    ]);
    $dataETH = json_decode($responseETH->getBody(), true);
    $priceETH = $dataETH['ethereum']['usd'];

    $transaction_id = rand(76503737, 12344994);

    // Create a new deposit object
    $deposit = new Deposit;
    $deposit->transaction_id = $transaction_id;
    $deposit->user_id = Auth::user()->id;
    $deposit->amount = $request['amount'];

    // Calculate BTC and ETH amounts
    $deposit->btc_amount = $deposit->amount / $priceBTC;
    $deposit->eth_amount = $deposit->amount / $priceETH;

    $deposit->payment_method = $request['payment_method'];

    if($request->hasFile('image')){
        $file= $request->file('image');

        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/deposits',$filename);
        $deposit->image =  $filename;
    }

    $deposit->save();

    // Create a new transaction object to log the deposit transaction
    $transaction = new Transaction;
    $transaction->user_id = Auth::user()->id;
    $transaction->transaction_id = $transaction_id;
    $transaction->transaction_type = "Credit";
    $transaction->transaction = "credit";
    $transaction->credit =  $request['amount'];
    $transaction->debit = "0";
    $transaction->status = 0;
    $transaction->save();

    // Prepare data to pass to the view
    $dataForView = [
        'deposit' => $deposit,
        'payment_method' => $deposit->payment_method,
        'btcAmount' => $deposit->btc_amount,
        'ethAmount' => $deposit->eth_amount
    ];

    return view('dashboard.deposit-success', $dataForView);
}















    public function activateBot(Request $request)
    {

         $update = Auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('user/uploads/bot', $filename);
            $update->bot_image =  $filename;
        }

        $update->update();

        return redirect('bot')->with('status', 'Payment Proof Uploaded Succesfully Wait for Approval!');
    }





    public function getWithdrawal(Request $request)
    {

        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['investment'] - $data['plan'];
        
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];

        $plan_amount = $request->input('amount');

        if ($data['user_balance'] <= '0') {
            return back()->with('status', 'Your Balance Is Insufficient');
        }

        if ($data['user_balance'] <= $plan_amount) {
            return back()->with('status', 'Your Balance Is Insufficient');
        }
        $method = $request->input('method');
        $data['method'] = $method;

        if ($method == 'Bank') {
            return view('dashboard.withdraw-bank', $data);
        } else {
            return view('dashboard.withdraw-funds', $data);
        }
    }


    public function uploadKyc(Request $request)
    {
        // // $validate->validate($request,[
        // //     'subject' => 'required',
        // //     'message' => 'required'
        // // ]);
        // $kyc =   Auth::user();
        // $kyc->user_id = Auth::user()->id;
        // $kyc->status = 0;
        // $file_id_card= $request->file('idcard');
        // $file_passport= $request->file('passport');
        // $ext_id_card = $file_id_card->getClientOriginalExtension();
        // $ext_passport = $file_passport->getClientOriginalExtension();
        // $filename_id_card = time().'.'.$ext_id_card;
        // $filename_passport = time().'.'.$ext_passport;
        // $file_id_card->move('uploads/kyc/',$filename_id_card);
        // $file_passport->move('uploads/kyc/',$filename_passport);
        // $kyc->idcard =  $filename_id_card;
        // $kyc->passport =  $filename_passport;



        //   $kyc->save();
        //   return redirect('verify-account')->with('status', 'Document updated successfully, please wait for approval');  
        $kyc =  Auth::user();
        $kyc->kyc_status = 0;
        $file_id_card = $request->file('card');
        $file_passport = $request->file('pass');
        $ext_id_card = $file_id_card->getClientOriginalExtension();
        $ext_passport = $file_passport->getClientOriginalExtension();
        $filename_id_card = time() . '.' . $ext_id_card;
        $filename_passport = time() . '.' . $ext_passport;
        $file_id_card->move('uploads/kyc/', $filename_id_card);
        $file_passport->move('uploads/kyc/', $filename_passport);
        $kyc->id_card =  $filename_id_card;
        $kyc->passport =  $filename_passport;
        $kyc->save();
        return redirect('verify-account')->with('status', 'Document updated successfully, please wait for approval');
    }




    // public function uploadProfile(Request $request)
    // {

    //     $request->validate([
    //         'photo' =>'string',

    //     ]);
    //     $ppp = Auth::user();

    //     $file_photo= $request->file('photo');

    //     $ext_photo = $file_photo->getClientOriginalExtension();

    //     $filename_photo = time().'.'.$ext_photo;

    //     $file_photo->move('uploads/photo/',$filename_photo);

    //     $ppp->photo =  $filename_photo;



    //     $ppp->update();
    //     return back()->with('status','Profile Updated');
    // }




    public function uploadProfile(Request $request)

    {


        $update = Auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('user/uploads/id', $filename);
            $update->photo =  $filename;
        }

        $update->update();

        return redirect('profile')->with('status', 'Profile Picture Updated!');
    }









public function ConfirmPassword(Request $request)
{
    // Validate the request data
    $request->validate([
        'cpassword' => 'required',
    ]);

    // Check if the provided password matches the authenticated user's password
    if (Hash::check($request->cpassword, auth()->user()->password)) {
        // Password is correct, redirect to the withdrawal page
        return redirect()->route('withdrawal')->with('status', 'Withdrawal in Progress!');
    } else {
        // Password doesn't match, redirect back with an error message
        return back()->with("error", "Password doesn't match!");
    }
}























    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }



    public function profileUpdate(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'string',
            'lname' => 'string',
            'phone' => 'string',
            'address' => 'string'

        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->name = $request['lname'];
        $user->phone = $request['phone'];
        $user->dob = $request['dob'];
        $user->address = $request['address'];


        $user->update();
        return back()->with('status', 'Profile Updated');
    }

    public function bankUpdate(Request $request)
    {
        //validation rules

        // $request->validate([
        //     'name' =>'string',
        //     'phone' =>'string'
        // ]);
        $user = Auth::user();
        $user->bankName = $request['bank_name'];
        $user->accountName = $request['account_name'];
        $user->accountNumber = $request['account_no'];
        $user->swiftCode = $request['swiftcode'];
        $user->bitcoinAddress = $request['btc_address'];
        $user->ethereumAddress = $request['eth_address'];
        $user->litecoinAddress = $request['ltc_address'];


        $user->save();
        return back()->with('status', 'Withdrawal Details Updated');
    }

    public function supportEmail(Request $request)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to('blueswayne133@gmail.com')->send(new supportEmail($data));

        return back()->with('status', 'Email Successfully sent');
    }








    //buy plans
    public function buyPlans(Request $request)
    {
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        $client = new Client();
$response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
$data = json_decode($response->getBody(), true);

// Extract BTC price from CoinGecko API response
$price = $data['bitcoin']['usd'];

$data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
$data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
$data['user_balance'] = $data['credit'] - $data['debit'];
$data['btc_balance'] = $data['user_balance'] / $price;
        
        if ($data['user_balance'] <= '0') {
            return back()->with('status', 'Your Balance Is Insufficient');
        }
        $transaction_id = rand(76503737, 12344994);
        $buy = new Plan;
        $buy->transaction_id = $transaction_id;
        $buy->user_id = Auth::user()->id;
        $buy->amount = $request['amount'];
        $buy->plan_name = $request['plan_name'];
        $buy->plan_duration = $request['plan_duration'];
        $buy->status = $request['status'];
        $buy->amount = $request['amount'];

        $buy->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 1;
        $transaction->save();

        return back()->with('status', 'Plan Has Been Purchased Successfully');
    }













    // public function makeWithdrawal(Request $request)
    // {
    //     $method = $request->input('item');
    //     $data['method'] = $method;
    //     $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
    //     $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    //     $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
    //                 $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
    //                 $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
    //                 $data['user_balance'] =  $data['credit'] - $data['debit'];

    //     if ($data['user_balance'] <= '0') {
    //         return redirect('withdrawal')->with('status', 'Your Balance Is Insufficient');
    //     }
    //     $transaction_id = rand(76503737, 12344994);
    //     $with = new Withdrawal;
    //     $with->transaction_id = $transaction_id;
    //     $with->user_id = Auth::user()->id;
    //     $with->amount = $request['amount'];
    //     $with->status = 0;
    //     $with->mode = $request['mode'];
    //     $with->account_name = $request['account_name'];
    //     $with->account_number = $request['account_number'];
    //     $with->bank_name = $request['bank_name'];
    //     $with->bank_routing_number = $request['bank_routing_number'];
    //     $with->swift = $request['swift'];
    //     $with->bank_country = $request['bank_country'];
    //     $with->currency = $request['currency'];
    //     $with->zip = $request['zip'];
    //     $with->crypto_type = $request['crypto_type'];
    //     $with->wallet_address = $request['wallet_address'];
    //     $method = $request->input('method');
    //     $data['method']=$method;
    //     $with->save();


    //     $transaction = new Transaction;
    //     $transaction->user_id = Auth::user()->id;
    //     $transaction->transaction_id = $transaction_id;
    //     $transaction->transaction_type = "Debit";
    //     $transaction->transaction = "debit";
    //     $transaction->credit = "0";
    //     $transaction->debit = $request['amount'];
    //     $transaction->status = 0;
    //     $transaction->save();
    //     return redirect('withdrawal')->with('status', 'Withdrawal In Progress, Please wait for approval');
    // }



public function makeWithdrawal(Request $request)
{
    
     $client = new Client();

    // Fetch Bitcoin (BTC) price in USD from CoinGecko
$responseBTC = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
$dataBTC = json_decode($responseBTC->getBody(), true);
$priceBTC = $dataBTC['bitcoin']['usd'];

    // // Fetch Ethereum (ETH) price in USD
    // $responseETH = $client->get('https://api.coingecko.com/api/v3/simple/price', [
    //     'query' => [
    //         'ids' => 'ethereum',
    //         'vs_currencies' => 'usd',
    //     ],
    // ]);
    // $dataETH = json_decode($responseETH->getBody(), true);
    // $priceETH = $dataETH['ethereum']['usd'];
    $method = $request->input('item');
    $data['method'] = $method;
    $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
    $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
    $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
    $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
    $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
    $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
    
    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
    $data['user_balance'] =  $data['credit'] - $data['debit'];

 

    if ($data['user_balance'] <= '0') {
        return redirect('withdrawal')->with('status', 'Your Balance Is Insufficient');
    }
    $transaction_id = rand(76503737, 12344994);
    $with = new Withdrawal;
    $with->transaction_id = $transaction_id;
    $with->user_id = Auth::user()->id;
    $with->amount = $request['amount'];
    $with->status = 0;
    $with->mode = $request['mode'];
    $with->account_name = $request['account_name'];
    $with->account_number = $request['account_number'];
    $with->bank_name = $request['bank_name'];
    $with->bank_routing_number = $request['bank_routing_number'];
    $with->swift = $request['swift'];
    $with->bank_country = $request['bank_country'];
    $with->currency = $request['currency'];
    $with->zip = $request['zip'];
    $with->crypto_type = $request['crypto_type'];
    $with->wallet_address = $request['wallet_address'];
    $mode = $request->input('mode');
    $data['mode']=$mode;
    
      // Calculate BTC and ETH amounts
    $with->btc_amount = $with->amount / $priceBTC;
    $with->eth_amount = $with->amount / $priceETH;
       // Check if the withdrawal amount exceeds the user's balance
    if ($request['amount'] > $data['user_balance']) {
        return redirect('withdrawal')->with('error', 'Withdrawal amount exceeds available balance.');
    }
    $with->save();


    $transaction = new Transaction;
    $transaction->user_id = Auth::user()->id;
    $transaction->transaction_id = $transaction_id;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "debit";
    $transaction->credit = "0";
    $transaction->debit = $request['amount'];
    $transaction->status = 0;
    $transaction->save();
    
    
      // Prepare data to pass to the view
     $dataForView = [
        'withdrawal' => $with,
        'withdrawal_amount' => $request['amount'], // Pass withdrawal amount
        'mode' => $request->input('mode'), // Pass item
        'btcAmount' => $with->btc_amount,
        'ethAmount' => $with->eth_amount
    ];

    return view('dashboard.withdraw-success', $dataForView);
}
//     return redirect('withdrawal')->with('status', 'Withdrawal In Progress, Please wait for approval');
// }










    public function Trading(Request $request)
    {
        $method = $request['buy'];
        $method = $request['sell'];

        return redirect('asset-balance')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss');
        // if($method==='buy'){
        //     return redirect('asset-balance')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss'); 
        // }
        // elseif($method==='sell'){
        //     return redirect('withdrawals')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss');  
        // }


    }






    public function perform()
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect('login');
    }





    public function Step2(Request $request)
    {

        $request->validate([
            'country' => 'string',
            'state' => 'string',
            'pcode' => 'string',
            'address' => 'string',
            'phone' => 'string'

        ]);

        $user = Auth::user();
        $user->country = $request['country'];
        $user->state = $request['state'];
        $user->pcode = $request['pcode'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];


        $user->update();

        return view('dashboard.step3');
    }

    public function Step3(Request $request)

    {
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];


        $request->validate([

            'pin' => 'string',


        ]);

        $user = Auth::user();

        $user->pin = $request['pin'];


        $user->update();

        return view('dashboard.home', $data);
    }

    public function resendCode($id)
    {

        $userData = User::where('id', $id)->first();
        $email = $userData->email;

        $validToken = rand(7650, 1234);
        $get_token = Auth::user();
        $get_token->token = $validToken;
        $get_token->update();



        Mail::to($email)->send(new VerificationEmail($validToken));


        return redirect("verify/" . $userData->id)->with('message', 'verification code has been resent to your email');
    }

    public function nextDetails()
    {
     

        return view('dashboard.step2');
    }


    public function verify($id)
    {
        $user = User::where('id', $id)->first();
        $data['email'] = $user->email;
        $data['hash'] = $user->password;
        $data['id'] = $user->id;

        return view('dashboard.step3', $data);
    }


    public function emailVerify(Request $request)
    {
        $first_token = $request->input('digit');
        $second_token = $request->input('digit2');
        $third_token = $request->input('digit3');
        $fourth_token = $request->input('digit4');
        $get_token =  $first_token;
        $verify_token = User::where('token', $get_token)->first();
        
        if ($verify_token) {
            $user = User::where('email', $verify_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $user_email =  $user->email;
            $user_password =  $user->password;

            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '*********',

            ];
            
        //Mail::to($user_email)->send(new welcomeEmail($data));
        
        
        
        
        
        
                   // Fetch Bitcoin price from CoinGecko API
    $price = 0;
    try {
        $client = new Client();
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $data = json_decode($response->getBody(), true);
        $price = $data['bitcoin']['usd'] ?? 0;
    } catch (RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }
 // Retrieve user financial data
    $userId = Auth::id();
    $data = [
        'credit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('credit'),
        'debit' => Transaction::where('user_id', $userId)->where('status', '1')->sum('debit'),
        'deposit' => Deposit::where('user_id', $userId)->where('status', '1')->sum('amount'),
        'withdrawal' => Withdrawal::where('user_id', $userId)->sum('amount'),
        'addprofit' => Profit::where('user_id', $userId)->sum('amount'),
        'debitprofit' => Debitprofit::where('user_id', $userId)->sum('amount'),
        'earning' => Earning::where('user_id', $userId)->sum('amount'),
        'plan' => Plan::where('user_id', $userId)->sum('amount'),
        'referral' => Refferal::where('user_id', $userId)->sum('amount')
    ];

    // Calculate balances and BTC equivalent
    $data['user_balance'] = $data['credit'] - $data['debit'];
    $data['btc_balance'] = $price > 0 ? $data['user_balance'] / $price : 0;
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
        return view('dashboard.home', $data);
        
        } else {
            return redirect("verify/" . Auth::user()->id)->with('error', 'Incorrect Activation Code!');
        }
    }
}
