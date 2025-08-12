<?php 
session_start();
require_once "db.php";



// Ftech admin side user data
// Ftech admin side user data
$sess= $_GET['username_sess'];
$_SESSION['username_sess'] = $sess;
$user = $_SESSION['username_sess'];


$sqli = "SELECT * FROM users WHERE email='$user' ";
$query = mysqli_query($conn, $sqli);
$row = mysqli_fetch_assoc($query);


// Select all withdrawals
$user = $_SESSION['username_sess'];
$with = "SELECT * FROM withdrawal WHERE client_user = '$user'";
$withd = $conn->query($with); 


// Select all withdrawals
$user = $_SESSION['username_sess'];
$with = "SELECT * FROM loan WHERE client_user = '$user'";
$loan = $conn->query($with);

// Select all withdrawals
$user = $_SESSION['username_sess'];
$with = "SELECT * FROM transactions WHERE client_user = '$user'  && tran_type = 'Loan'";
$transaction = $conn->query($with);               



// Select deposit history details
$user = $_SESSION['username_sess'];
$sqa = "SELECT * FROM deposit_history WHERE client_user = '$user'";
$dhistory = $conn->query($sqa);


// select all deposits
$sqaa = "SELECT * FROM deposit_history";
$dephistory = $conn->query($sqaa);

// select all withdrawals
$withh = "SELECT * FROM withdrawal";
$withdr = $conn->query($withh); 



// select all profits
$profitt = "SELECT * FROM user_profit";
$prof = $conn->query($profitt);               


 // select all profits
$planss = "SELECT * FROM plans";
$pla = $conn->query($planss);               


// Update user data
if (isset($_POST['update'])) {
     $fname = $_POST['fname'];
     $capital = $_POST['capital'];
     $profit = $_POST['profit'];
     $bonus = $_POST['bonus'];
     $pendingd = $_POST['pendingd'];
     $pendingw = $_POST['pendingw'];

     $update = "UPDATE users SET fname = '$fname', capital = '$capital', profit = '$profit', bonus = '$bonus', pendingd = '$pendingd', pendingw = '$pendingw' WHERE email='$user' ";
          mysqli_query($conn, $update);
          header('location: update.php?username_sess='.$user);
}








// Decline transaction
if(isset($_POST['declin'])) { 

     $date_time = date('Y-m-d');
     $client_username = $_SESSION['username_sess'];
     $info =  "your transaction was Declined pls contact our live surpport for more information";


    $sql = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit Declined', '$info', '$date_time', 'unread', '$client_username');";
    


     if (mysqli_query($conn, $sql)){

     echo "
<script>
alert('Transaction Has been declined Successfully')
window.location.href='update2.php';

</script>

     ";
          //header('location: index.php');
        }
}


if(isset($_POST['approv'])) {

     $id = $_POST['id'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['username_sess'];
     $info =  "your deposit transaction has been approved successfully. please contact our live surpport for more information"; 
     $email = $_POST['username_sess'];
     $amount = $_POST['amount'];
     $tid = $_POST['tid'];
     $dep_date = $_POST['dep_date'];
     $method = $_POST['method'];
     $total = $row_iv + $row_bonus + $row_earn;




    if ($amount >= 5000 && $amount <= 9999) {
$bonus = 0.07 * $amount;
$profit = $bonus + $amount;
$with_dat = mktime(0, 0, 0, date('m'), date('d') + 7, date('Y'));
$with_date = date('Y-m-d', $with_dat);

     
$sql = "INSERT INTO investments (client_user, plan_name, inv_amount, profit, total, inv_date, with_date) 
        VALUES ('$client_username', 'PREMIUM', '$amount', '$bonus', '$profit', '$dep_date', '$with_date');";
        
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Approved Deposit', '$info', '$date_time', 'unread', '$client_username');";

$sql .= "UPDATE deposit_history SET  status= 'Approved'  WHERE id = '$id' ";

$sql .= "UPDATE users SET earnings='$bonus', deposit='$amount'  WHERE email='$user'";

if ($conn->multi_query($sql)){
     
header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";    //header('location: index.php');
        }

        $conn->close();
    }

}






$userr = $_SESSION['username_sess'];

if(isset($_POST['approvvv'])) {


$id = $_POST['id'];
$client_user = $_POST['client_user'];
$amount = $_POST['amount'];
$date_time = date('Y-m-d');
$client_username = $_SESSION['username_sess'];
$info =  "your deposit transaction has been approved successfully. please contact our live surpport for more information";



if ($amount >= 500 && $amount <= 4999) {
$profit = 0.1 * $amount;
$balance = $profit + $amount;


 $sqld = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Approved Deposit', '$info', '$date_time', 'unread', '$client_username');";

$sqld  .= "UPDATE deposit_history SET  status= 'Approved', profit =$profit, balance=$balance   WHERE id = '$id' ";


if ($conn->multi_query($sqld)) {

header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
          //header('location: index.php');
        } else {
            echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
        }
} 

elseif($amount >= 5000 && $amount <= 49999) {
$profit = 0.3 * $amount;
$balance = $profit + $amount;


 $sqld = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Approved Deposit', '$info', '$date_time', 'unread', '$client_username');";

$sqld  .= "UPDATE deposit_history SET  status= 'Approved', profit =$profit, balance=$balance   WHERE id = '$id' ";


if ($conn->multi_query($sqld)) {

header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
          //header('location: index.php');
        } else {
            echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
        }
}


elseif($amount >= 50000 && $amount <= 200000) {
$profit = 0.5 * $amount;
$balance = $profit + $amount;


 $sqld = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Approved Deposit', '$info', '$date_time', 'unread', '$client_username');";

$sqld  .= "UPDATE deposit_history SET  status= 'Approved', profit =$profit, balance=$balance   WHERE id = '$id' ";


if ($conn->multi_query($sqld)) {

header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
          //header('location: index.php');
        } else {
            echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
        }
} 

else {

     $profit = 1 * $amount;
$balance = $profit + $amount;


 $sqld = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Approved Deposit', '$info', '$date_time', 'unread', '$client_username');";

$sqld  .= "UPDATE deposit_history SET  status= 'Approved', profit =$profit, balance=$balance   WHERE id = '$id' ";


if ($conn->multi_query($sqld)) {

header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
          //header('location: index.php');
        } else {
            echo "
<script>
alert('Deposit Has been Approved Successfully');
</script>";
        }
}
        $conn->close();
   
    }






if(isset($_POST['approvv'])) { 

$id = $_POST['id'];
$amount = $_POST['amount'];
$email = $_POST['email'];
$date_time = date('Y-m-d');
$client_username = $_POST['client_user'];
$info =  "your deposit has been approved successfully.Please contact our live surpport for more information";


 $sqld = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit Declined', '$info', '$date_time', 'unread', '$client_username');";

$sqld = "INSERT INTO user_deposits (client_user, amount, dep_date) 
         VALUES ('$client_username', '$amount', '$date_time');";

$sqld  .= "UPDATE deposit_history SET  status= 'Approved'  WHERE id = '$id' ";

if ($conn->multi_query($sqld)) {

   $email = $_POST['email'];
    $name =  $_POST['mode'];

    $subject = "Deposit Successful";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Elitetrdmarkets</title>

    <style type='text/css'>
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!--[if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class='respond' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
    <!-- pre-header -->
    <table style='display:none!important;'>
        <tr>
            <td>
                <div style='overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;'>
                    Email from Elitetrdmarkets!
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff'>

        <tr>
            <td align='center'>
                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='center'>

                            <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                                <tr>
                                    <td align='center' height='70' style='height:70px;'>
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://elitetrdmarkets.com/logo.png' alt='' /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>                          
                
            




    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff' class='bg_color'>

        <tr>
            <td align='center'>
                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td align='center' style='color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;'
                            class='main-header'>
                            <!-- section text ======-->

                            <div style='line-height: 35px'>

                                Deposit <span style='color: #5caad2;'>Successful.</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='center'>
                            <table border='0' width='40' align='center' cellpadding='0' cellspacing='0' bgcolor='eeeeee'>
                                <tr>
                                    <td height='2' style='font-size: 2px; line-height: 2px;'>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height='20' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='left'>
                            <table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='container590'>
                                <tr>
                                    <td align='left' style='color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                        <!-- section text ======-->

                                        <p style='line-height: 24px;margin-bottom:15px;'>
                                            Your deposit of $$amount USD is now available in your USD balance. Log in to check your balance.
                                        </p>
                                        <table border='0' align='center' width='180' cellpadding='0' cellspacing='0' bgcolor='5caad2' style='margin-bottom:20px;'>

                                            <tr>
                                                <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align='center' style='color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 22px; letter-spacing: 2px;'>
                                                    <!-- main section button -->

                                                    <div style='line-height: 22px;'>
                                                        <a href='www.elitetrdmarkets.com/login/' style='color: #ffffff; text-decoration: none;'>Login</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                                            </tr>

                                        </table>
                                        <p style='line-height: 24px; margin-bottom:20px;'>
                                            Connect with our media personnel if you are running into problems at
                                             <a href='mailto:support@elitetrdmarkets.com' style='color: blue; font-size: 20px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;'>support@elitetrdmarkets.com</a>
                                        </p>
                                        <br/> 
                                        <p style='line-height: 24px'>
                                            Regards,</br>
                                           Elitetrdmarkets Team
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>





                </table>

            </td>
        </tr>

        <tr>
            <td height='40' style='font-size: 40px; line-height: 40px;'>&nbsp;</td>
        </tr>

    </table>













    <!-- footer ====== -->
    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='f4f4f4'>

        <tr>
            <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
        </tr>

        <tr>
            <td align='center'>

                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td>
                            <table border='0' align='left' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>
                                <tr>
                                    <td align='left' style='color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                        <div style='line-height: 24px;'>

                                            <span style='color: #333333;'>Copyright 2023 - All Rights Reserved</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border='0' align='left' width='5' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>
                                <tr>
                                    <td height='20' width='5' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                                </tr>
                            </table>

                            <table border='0' align='right' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>

                                <tr>
                                    <td align='center'>
                                        <table align='center' border='0' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td align='center'>
                                                    <a style='font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;'
                                                        href='{{UnsubscribeURL}}'>UNSUBSCRIBE</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->


</body>
</html> ";






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'support@elitetrdmarkets.com'; 
$fromName = 'Elitetrdmarkets'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@elitetrdmarkets.com' . "\r\n"; 
$headers .= 'Bcc: support@elitetrdmarkets.com' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Transaction has been approved sucessfully')
window.location.href='user.php';

</script>

    ";
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
    }







if(isset($_POST['decline'])) { 

$id = $_POST['id'];
$date_time = date('Y-m-d');
$client_username = $_SESSION['username_sess'];
$info =  "your transaction was Declined. Please contact our live surpport for more information";


 $sqld = "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit Declined', '$info', '$date_time', 'unread', '$client_username');";

$sqld  .= "UPDATE deposit_history SET  status= 'Declined'  WHERE id = '$id' ";

if ($conn->multi_query($sqld)) {

header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Deposit Has been declined Successfully');
</script>";
          //header('location: index.php');
        }

        $conn->close();
    }


if(isset($_POST['decline_with'])) { 

$id = $_POST['id'];

$sqle = "UPDATE withdrawal SET  status= 'Declined'  WHERE id = '$id' ";

if (mysqli_query($conn, $sqle)){

header('location:'. $_SERVER['PHP_SELF'].'?username_sess='.$user);
echo "
<script>
alert('Withdrawal Has been Declined Successfully');
</script>";
          //header('location: index.php');
        }

        $conn->close();
    }



if(isset($_POST['approv_with'])) { 

$id = $_POST['id'];
$amount = $_POST['amount'];
$email = $_POST['email'];
$client_username = $_SESSION['username_sess'];

$sqlap = "UPDATE withdrawal SET  status= 'Approved'  WHERE id = '$id' ";

if ($conn->multi_query($sqlap)) {

   $email = $_POST['email'];
    $wallet =  $_POST['wallet'];

    $subject = "Withdrawal Successful";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Elitetrdmarkets</title>

    <style type='text/css'>
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!--[if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class='respond' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
    <!-- pre-header -->
    <table style='display:none!important;'>
        <tr>
            <td>
                <div style='overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;'>
                    An Email from Elitetrdmarkets!
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff'>

        <tr>
            <td align='center'>
                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='center'>

                            <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                                <tr>
                                    <td align='center' height='70' style='height:70px;'>
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://elitetrdmarkets.com/logo.png' alt='' /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>                          
                
            




    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff' class='bg_color'>

        <tr>
            <td align='center'>
                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td align='center' style='color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;'
                            class='main-header'>
                            <!-- section text ======-->

                            <div style='line-height: 35px'>

                                Withdrawal <span style='color: #5caad2;'>Successful.</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='center'>
                            <table border='0' width='40' align='center' cellpadding='0' cellspacing='0' bgcolor='eeeeee'>
                                <tr>
                                    <td height='2' style='font-size: 2px; line-height: 2px;'>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height='20' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='left'>
                            <table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='container590'>
                                <tr>
                                    <td align='left' style='color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                        <!-- section text ======-->

                                        <p style='line-height: 24px;margin-bottom:15px;'>
                                            You've successfully withdrawn a $$amount <br> <b>$wallet</b>.
                                        </p>
                                        <p style='line-height: 24px; margin-bottom:20px;'>
                                             If you don't recognise this activity please contact us immmediately at
                                             <a href='mailto:support@elitetrdmarkets.com' style='color: blue; font-size: 20px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;'>support@elitetrdmarkets.com</a>
                                        </p>
                                        <br/> 
                                        <p style='line-height: 24px'>
                                            Regards,</br>
                                           elitetrdmarkets Team
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>





                </table>

            </td>
        </tr>

        <tr>
            <td height='40' style='font-size: 40px; line-height: 40px;'>&nbsp;</td>
        </tr>

    </table>













    <!-- footer ====== -->
    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='f4f4f4'>

        <tr>
            <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
        </tr>

        <tr>
            <td align='center'>

                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td>
                            <table border='0' align='left' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>
                                <tr>
                                    <td align='left' style='color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                        <div style='line-height: 24px;'>

                                            <span style='color: #333333;'>Copyright 2023 - All Rights Reserved</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border='0' align='left' width='5' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>
                                <tr>
                                    <td height='20' width='5' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                                </tr>
                            </table>

                            <table border='0' align='right' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>

                                <tr>
                                    <td align='center'>
                                        <table align='center' border='0' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td align='center'>
                                                    <a style='font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;'
                                                        href='{{UnsubscribeURL}}'>UNSUBSCRIBE</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->


</body>
</html>";






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'support@elitetrdmarkets.com'; 
$fromName = 'Elitetrdmarkets'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@elitetrdmarkets.com' . "\r\n"; 
$headers .= 'Bcc: support@elitetrdmarkets.com' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Transaction has been approved sucessfully')
window.location.href='user.php';

</script>

    ";
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
    }



if(isset($_POST['decline_loan'])) { 

$id = $_POST['id'];

$sqle = "UPDATE loan SET  status= 'Declined'  WHERE id = '$id' ";

if (mysqli_query($conn, $sqle)){


echo "
<script>
alert('loan Has been Declined Successfully');
</script>";
          //header('location: index.php');
        }

        $conn->close();
    }



if(isset($_POST['approv_loan'])) { 

$id = $_POST['id'];
$amount = $_POST['amount'];
$email = $_POST['email'];
$client_username = $_POST['client_user'];
$date_time = date('Y-m-d');   


$sqlap = "INSERT INTO loan_approved (client_user, amount, app_date) 
                VALUES ('$client_username', '$amount', '$date_time');";

$sqlap .= "UPDATE transactions SET  tran_status= 'Approved', status = '2'  WHERE id = '$id' ";

if ($conn->multi_query($sqlap)) {

   $email = $_POST['email'];
    $wallet =  $_POST['wallet'];

    $subject = "Loan Approved";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Elitetrdmarkets</title>

    <style type='text/css'>
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!--[if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class='respond' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
    <!-- pre-header -->
    <table style='display:none!important;'>
        <tr>
            <td>
                <div style='overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;'>
                    An Email from Elitetrdmarkets!
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff'>

        <tr>
            <td align='center'>
                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='center'>

                            <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                                <tr>
                                    <td align='center' height='70' style='height:70px;'>
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://elitetrdmarkets.com/logo.png' alt='' /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>                          
                
            




    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff' class='bg_color'>

        <tr>
            <td align='center'>
                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td align='center' style='color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;'
                            class='main-header'>
                            <!-- section text ======-->

                            <div style='line-height: 35px'>

                                Loan <span style='color: #5caad2;'>Approved.</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='center'>
                            <table border='0' width='40' align='center' cellpadding='0' cellspacing='0' bgcolor='eeeeee'>
                                <tr>
                                    <td height='2' style='font-size: 2px; line-height: 2px;'>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height='20' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align='left'>
                            <table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='container590'>
                                <tr>
                                    <td align='left' style='color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                        <!-- section text ======-->

                                        <p style='line-height: 24px;margin-bottom:15px;'>
                                            Your loan Offer of <b> $$amount</b> has been successfully approved  
                                        </p>
                                        <p style='line-height: 24px; margin-bottom:20px;'>
                                             If you don't recognise this activity please contact us immmediately at
                                             <a href='mailto:support@elitetrdmarkets.com' style='color: blue; font-size: 20px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;'>support@elitetrdmarkets.com</a>
                                        </p>
                                        <br/> 
                                        <p style='line-height: 24px'>
                                            Regards,</br>
                                           Elitetrdmarkets Team
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>





                </table>

            </td>
        </tr>

        <tr>
            <td height='40' style='font-size: 40px; line-height: 40px;'>&nbsp;</td>
        </tr>

    </table>













    <!-- footer ====== -->
    <table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='f4f4f4'>

        <tr>
            <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
        </tr>

        <tr>
            <td align='center'>

                <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                    <tr>
                        <td>
                            <table border='0' align='left' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>
                                <tr>
                                    <td align='left' style='color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                        <div style='line-height: 24px;'>

                                            <span style='color: #333333;'>Copyright 2023 - All Rights Reserved</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border='0' align='left' width='5' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>
                                <tr>
                                    <td height='20' width='5' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                                </tr>
                            </table>

                            <table border='0' align='right' cellpadding='0' cellspacing='0' style='border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'
                                class='container590'>

                                <tr>
                                    <td align='center'>
                                        <table align='center' border='0' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td align='center'>
                                                    <a style='font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;'
                                                        href='{{UnsubscribeURL}}'>UNSUBSCRIBE</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->


</body>
</html>";






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'support@elitetrdmarkets.com'; 
$fromName = 'Elitetrdmarkets'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@elitetrdmarkets.com' . "\r\n"; 
$headers .= 'Bcc: support@elitetrdmarkets.com' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Transaction has been approved sucessfully')
window.location.href='user.php';

</script>

    ";
       
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
    }





















?>