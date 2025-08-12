<?php
require_once "serverr.php";
authVerify();


// Authenticate login
function authVerify() {
  global $conn;
  
  //Connect to database
  $sess = $_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email = '$sess'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);

  // Declare verification status variable
  $status = $row['status'];
  
  // Conditional statements to check session and verification status
    if (empty($_SESSION['email'])) {
        return header('location: ../login/');
    }
elseif (!empty($_SESSION['email']) && $status == "disable") {
        return header('location: ../login/');
    }
}





// Fetch user data
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$user' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);








// Redefine array_assoc as variables
define('USERNAME', $row['username']);
define('FNAME', $row['fname']);
define('LNAME', $row['lname']);
define('STATE', $row['state']);
define('ADDRESS', $row['address']);
define('EMAIL', $row['email']);
define('TSTATUS', $row['tstatus']);
define('PHONE', $row['phone']);
define('BTC', $row['btc_address']);
define('ETH', $row['eth_address']);
define('LTC', $row['ltc_address']);
define('TRC', $row['trc_address']);
define('RP', $row['ripples_address']);
define('DEPOSIT', sprintf('%.2f',$row['deposit']));
//define('TOTAL', $row['total']);
define('BONUS', sprintf('%.2f',$row['bonus']));
define('EARNINGS', sprintf('%.2f',$row['earnings']));
//define('TOTAL', sprintf('%.2f', ($row['iv']  + $row['bonus'] + $row['earnings'])));

// SUM user
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(deposit) AS total FROM users WHERE email = '$user'";
$row_quer = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($row_quer);
$row_iv = number_format($row_total['total'], 2);

// SUM user
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(bonus) AS total FROM users WHERE email = '$user'";
$row_query = mysqli_query($conn, $sql_total);
$row_t = mysqli_fetch_array($row_query);
$row_bonus = number_format($row_total['total'], 2);
$row_bonus = sprintf('%.2f',$row_t['total']);


// SUM user
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(earnings) AS total FROM users WHERE email = '$user'";
$row_query = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($row_query);
$row_earn =  number_format($row_total['total'], 2);



// SUM withdrawal
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(amount) AS total FROM withdrawal WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$withdrawal = number_format($row_to['total'], 2);
$withdrawall = sprintf('%.2f',$row_to['total']);



// SUM withdrawal
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(amount) AS total FROM user_profit WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$withe =  number_format($row_to['total'], 2);
$prof = sprintf('%.2f',$row_to['total']);






// SUM deposits
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(amount) AS total FROM deposit_history WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$deposits = sprintf('%.2f',$row_to['total']);





// SUM user deposits
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(amount) AS total FROM user_deposits WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$user_deposits = sprintf('%.2f',$row_to['total']);











// SUM balance
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(balance) AS total FROM deposit_history WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$balanc = sprintf('%.2f',$row_to['total']);



// SUM balance
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(plan_amount) AS total FROM plans WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$tradd = number_format($row_to['total'], 2);
$tradde = sprintf('%.2f',$row_to['total']);



// SUM balance
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(product_sales) AS total FROM products WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$prod = number_format($row_to['total'], 2);
$prodd = sprintf('%.2f',$row_to['total']);



// SUM balance
// $user = $_SESSION['username'];
// $sql_total = "SELECT SUM(amount) AS total FROM loan WHERE client_user = '$user' && status = 'Approved'";
// $row_que = mysqli_query($conn, $sql_total);
// $row_to = mysqli_fetch_array($row_que);
// $loan = number_format($row_to['total'], 2);
// $loan = sprintf('%.2f',$row_to['total']); 




//SUM balance
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(tran_amount) AS total FROM transactions WHERE client_user = '$user' && status = '1'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$transaction_deposit = number_format($row_to['total'], 2);
$transactions = sprintf('%.2f',$row_to['total']);



// SUM balance
$user = $_SESSION['email'];
$sql_total = "SELECT SUM(amount) AS total FROM loan_approved WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$loanap = $row_to['total'];
$loanapp = sprintf('%.2f',$row_to['total']); 


   //sum total
 $deposit = $user_deposits- $tradde;

 number_format($row_total['total'], 2);


  $balanc = $user_deposits + $prof + $loanap + $row_bonus - $tradde -$withdrawall - $prodd;
  $balance = number_format($balanc, 2);


// transactions





//update withdrawal info
if (isset($_POST['info'])) {


     $btc_address = $_POST['btc_address'];
     $trc_address = $_POST['trc_address'];
     $eth_address = $_POST['eth_address'];
     $ltc_address = $_POST['ltc_address'];
     $ripples_address = $_POST['ripples_address'];





     $sqln = "UPDATE users SET  btc_address='$btc_address', trc_address='$trc_address',  eth_address='$eth_address', ltc_address='$ltc_address', ripples_address='$ripples_address' WHERE email='$user'";

 if ($conn->query($sqln)) {

  echo "
<script>
alert('withdrawal details updated succefully!')
window.location.href='accountdetails.php';

</script>

  ";
      //header('location: index.php');
     }


}





$report = '';


if(isset($_POST['updatepass'])) {
    $user = $_SESSION['email'];
    $new_password = mysqli_real_escape_string($conn, ($_POST['pass_new']));
    $cur_password = mysqli_real_escape_string($conn, ($_POST['pass_cur']));
    $sql_pass = "SELECT * FROM users WHERE password='$cur_password' ";
    $check = mysqli_num_rows(mysqli_query($conn, $sql_pass));
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql_pass));
    
    if($new_password != "" && $cur_password != "" && $check == 1) {
        $update = "UPDATE users SET password='$new_password' WHERE email='$user' ";
        mysqli_query($conn, $update);
        $report = "<p class='text-success font-weight-bolder'><i class='fa fa-check-circle'></i> Password Changed Successfully!</p>";
    } else {
        $report = "<p class='text-danger font-weight-bolder'><i class='fa fa-info-circle'></i>old password is incorrect</p>";
    }
}









//update Bwithdrawal info
if (isset($_POST['bupdate'])) {


     $bank_name = $_POST['bank_name'];
     $account_no = $_POST['account_no'];
     $account_name = $_POST['account_name'];
     $scode = $_POST['scode'];
     $rnumber = $_POST['rnumber'];





     $sqln = "UPDATE users SET  bank_name='$bank_name', account_no='$account_no',  account_name='$account_name', scode='$scode', rnumber='$rnumber' WHERE email='$user'";

 if ($conn->query($sqln)) {

  echo "
<script>
alert(' Bank withdrawal details updated succefully!')
window.location.href='accountdetails.php';

</script>

  ";
      //header('location: index.php');
     }


}




// Select deposit history details
$user = $_SESSION['email'];
$sqa = "SELECT * FROM deposit_history WHERE client_user = '$user'";
$dhistory = $conn->query($sqa);



if(isset($_POST['deposit'])){
      $email = $_POST['email'];
      $name = $_POST['name'];
     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";
   
    
    $sql = "INSERT INTO deposit_history (client_user, name, email, amount, method, status, dep_date) 
        VALUES ('$client_username', '$name', '$email', '$amount', '$method', 'Pending...', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET deposit = '$amount' WHERE email='$user'";

if ($conn->multi_query($sql)) {

  echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='index.php';

</script>

  ";
      //header('location: index.php');
     }        $conn->close();

}





$user = $_SESSION['email'];
$sqa = "SELECT * FROM deposit_history WHERE client_user = '$user'";
$dhistory = $conn->query($sqa);


$upload_report;

// File upload 
if(isset($_POST['payments'])){

$client_username = $_SESSION['email'];


     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";

  // Original file name
  $targetFile = $_FILES['uploadfile']['name'];
  // File extension
  $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $fileTmp = $_FILES['uploadfile']['tmp_name'];
  // Scrambled name
  $dbImage = md5(date('Y-m-d h:i:s a ')).'.'.$fileExtension;
  // Db and folder target name
  $targetName = 'image/'.$dbImage;



  if($fileExtension != 'jpg' && $fileExtension != 'png' && $fileExtension != 'jpeg') {
    $upload_report = "<span class='text-danger'><i class='fa fa-info-circle'> File type not supported or image too large</i></span>";
  } else {
    if(move_uploaded_file($fileTmp, $targetName)) {
$client_username = $_SESSION['email'];
      /*$sql_d = "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
        VALUES ('Deposit confirmation', '$info', '$date_time', 'unread', '$client_username');";*/

      
      $sql = "INSERT INTO deposit_history (client_user, amount, method, status, filename, dep_date) 
        VALUES ('$client_username', '$amount', '$method', 'Pending...','$dbImage', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET status = 'Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

  echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='deposit.php';

</script>

  ";
      //header('location: index.php');
     }
      
    } else {
        echo "
<script>
alert('Failed ')
window.location.href='deposit.php';

</script>

  ";
    }
  } 
  
}












// File upload 
if(isset($_POST['litecoin'])){

$client_username = $_SESSION['email'];


     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";

  // Original file name
  $targetFile = $_FILES['uploadfile']['name'];
  // File extension
  $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $fileTmp = $_FILES['uploadfile']['tmp_name'];
  // Scrambled name
  $dbImage = md5(date('Y-m-d h:i:s a ')).'.'.$fileExtension;
  // Db and folder target name
  $targetName = 'image/'.$dbImage;



  if($fileExtension != 'jpg' && $fileExtension != 'png' && $fileExtension != 'jpeg') {
    $upload_report = "<span class='text-danger'><i class='fa fa-info-circle'> File type not supported or image too large</i></span>";
  } else {
    if(move_uploaded_file($fileTmp, $targetName)) {
$client_username = $_SESSION['email'];
      /*$sql_d = "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
        VALUES ('Deposit confirmation', '$info', '$date_time', 'unread', '$client_username');";*/

      
      $sql = "INSERT INTO deposit_history (client_user, amount, method, status, filename, dep_date) 
        VALUES ('$client_username', '$amount', '$method', 'Pending...','$dbImage', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET status = 'Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

    $email =  'support@universalinvtpro.com ';
    $subject = "Deposit";

    $message = $info;






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='deposit.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }

      
    } else {
        echo "
<script>
alert('Failed ')
window.location.href='deposit.php';

</script>

  ";
    }
  } 
  
}





// File upload 
if(isset($_POST['ripples'])){

$client_username = $_SESSION['email'];


     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";

  // Original file name
  $targetFile = $_FILES['uploadfile']['name'];
  // File extension
  $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $fileTmp = $_FILES['uploadfile']['tmp_name'];
  // Scrambled name
  $dbImage = md5(date('Y-m-d h:i:s a ')).'.'.$fileExtension;
  // Db and folder target name
  $targetName = 'image/'.$dbImage;



  if($fileExtension != 'jpg' && $fileExtension != 'png' && $fileExtension != 'jpeg') {
    $upload_report = "<span class='text-danger'><i class='fa fa-info-circle'> File type not supported or image too large</i></span>";
  } else {
    if(move_uploaded_file($fileTmp, $targetName)) {
$client_username = $_SESSION['email'];
      /*$sql_d = "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
        VALUES ('Deposit confirmation', '$info', '$date_time', 'unread', '$client_username');";*/

      
      $sql = "INSERT INTO deposit_history (client_user, amount, method, status, filename, dep_date) 
        VALUES ('$client_username', '$amount', '$method', 'Pending...','$dbImage', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET status = 'Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

    $email =  'support@universalinvtpro.com ';
    $subject = "Deposit";

    $message = $info;






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='deposit.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }

      
    } else {
        echo "
<script>
alert('Failed ')
window.location.href='deposit.php';

</script>

  ";
    }
  } 
  
}



// File upload 
if(isset($_POST['bitcoin'])){

$client_username = $_SESSION['email'];


     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";

  // Original file name
  $targetFile = $_FILES['uploadfile']['name'];
  // File extension
  $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $fileTmp = $_FILES['uploadfile']['tmp_name'];
  // Scrambled name
  $dbImage = md5(date('Y-m-d h:i:s a ')).'.'.$fileExtension;
  // Db and folder target name
  $targetName = 'image/'.$dbImage;



  if($fileExtension != 'jpg' && $fileExtension != 'png' && $fileExtension != 'jpeg') {
    $upload_report = "<span class='text-danger'><i class='fa fa-info-circle'> File type not supported or image too large</i></span>";
  } else {
    if(move_uploaded_file($fileTmp, $targetName)) {
$client_username = $_SESSION['email'];
      /*$sql_d = "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
        VALUES ('Deposit confirmation', '$info', '$date_time', 'unread', '$client_username');";*/

      
      $sql = "INSERT INTO deposit_history (client_user, amount, method, status, filename, dep_date) 
        VALUES ('$client_username', '$amount', '$method', 'Pending...','$dbImage', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET status = 'Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

    $email =  'support@universalinvtpro.com ';
    $subject = "Deposit";

    $message = $info;






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='deposit.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }

      
    } else {
        echo "
<script>
alert('Failed ')
window.location.href='deposit.php';

</script>

  ";
    }
  } 
  
}



















// File upload 
if(isset($_POST['trc'])){

$client_username = $_SESSION['email'];


     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";

  // Original file name
  $targetFile = $_FILES['uploadfile']['name'];
  // File extension
  $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $fileTmp = $_FILES['uploadfile']['tmp_name'];
  // Scrambled name
  $dbImage = md5(date('Y-m-d h:i:s a ')).'.'.$fileExtension;
  // Db and folder target name
  $targetName = 'image/'.$dbImage;



  if($fileExtension != 'jpg' && $fileExtension != 'png' && $fileExtension != 'jpeg') {
    $upload_report = "<span class='text-danger'><i class='fa fa-info-circle'> File type not supported or image too large</i></span>";
  } else {
    if(move_uploaded_file($fileTmp, $targetName)) {
$client_username = $_SESSION['email'];
      /*$sql_d = "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
        VALUES ('Deposit confirmation', '$info', '$date_time', 'unread', '$client_username');";*/

      
      $sql = "INSERT INTO deposit_history (client_user, amount, method, status, filename, dep_date) 
        VALUES ('$client_username', '$amount', '$method', 'Pending...','$dbImage', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET status = 'Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

    $email =  'support@universalinvtpro.com ';
    $subject = "Deposit";

    $message = $info;






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='deposit.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
      
    } else {
        echo "
<script>
alert('Failed ')
window.location.href='deposit.php';

</script>

  ";
    }
  } 
  
}





// File upload 
if(isset($_POST['ethereum'])){

$client_username = $_SESSION['email'];


     $amount = $_POST['amount'];
     $method = $_POST['payment_mode'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited ".$amount." confirm to approve or decline";

  // Original file name
  $targetFile = $_FILES['uploadfile']['name'];
  // File extension
  $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  $fileTmp = $_FILES['uploadfile']['tmp_name'];
  // Scrambled name
  $dbImage = md5(date('Y-m-d h:i:s a ')).'.'.$fileExtension;
  // Db and folder target name
  $targetName = 'image/'.$dbImage;



  if($fileExtension != 'jpg' && $fileExtension != 'png' && $fileExtension != 'jpeg') {
    $upload_report = "<span class='text-danger'><i class='fa fa-info-circle'> File type not supported or image too large</i></span>";
  } else {
    if(move_uploaded_file($fileTmp, $targetName)) {
$client_username = $_SESSION['email'];
      /*$sql_d = "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
        VALUES ('Deposit confirmation', '$info', '$date_time', 'unread', '$client_username');";*/

      
      $sql = "INSERT INTO deposit_history (client_user, amount, method, status, filename, dep_date) 
        VALUES ('$client_username', '$amount', '$method', 'Pending...','$dbImage', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";

          $sql .= "UPDATE users SET status = 'Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

    $email =  'support@universalinvtpro.com ';
    $subject = "Deposit";

    $message = $info;






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Deposit is Awaiting; Please wait for Approval ')
window.location.href='deposit.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }

      
    } else {
        echo "
<script>
alert('Failed ')
window.location.href='deposit.php';

</script>

  ";
    }
  } 
  
}


// Select all plans
$user = $_SESSION['email'];
$user_profit = "SELECT * FROM user_profit WHERE client_user = '$user'";
$user_p = $conn->query($user_profit);



// Select all investment plans
$user = $_SESSION['email'];
$user_pro = "SELECT * FROM plans WHERE client_user = '$user'";
$user_plans = $conn->query($user_pro);


// Select all products
$user = $_SESSION['email'];
$user_products = "SELECT * FROM products WHERE client_user = '$user'";
$products= $conn->query($user_products);


// Select all plans
$user = $_SESSION['email'];
$tra = "SELECT * FROM transactions WHERE client_user = '$user'";
$trad = $conn->query($tra);

if(isset($_POST['join'])){

     $plan_name = $_POST['plan_name'];
     $plan_duration = $_POST['plan_duration'];
     $plan_amount = $_POST['amount'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
      $info =  EMAIL." ".FNAME." has deposited to ".$plan_name." plan of  ".$plan_amount."USD for a period of ".$plan_duration."  ";



     if ($balanc == 0) {
      echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='buy-plan.php';

</script>

  ";
  }
    elseif (($balanc - $plan_amount) <= 0) {
      echo "
<script>
alert('insufficient balance')
window.location.href='buy-plan.php';

</script>

  ";
  }
  else {
      
    $date_time = date('Y-m-d');


   
    
    $sql = "INSERT INTO plans (client_user, plan_name, plan_duration, plan_amount, plan_date) 
        VALUES ('$client_username', '$plan_name ', '$plan_duration', ' $plan_amount', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES (Plan, '$info', '$date_time', 'unread', '$client_username');";

          
if ($conn->multi_query($sql)) {

        echo "
<script>
alert('Investment has been succesfully placed')
window.location.href='buy-plan.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
          
}





// Select all plans
$user = $_SESSION['email'];
$tra = "SELECT * FROM transactions WHERE client_user = '$user'";
$trad = $conn->query($tra);

if(isset($_POST['stocks'])){

     $plan_name = $_POST['plan_name'];
     $plan_namee = $plan_name." (stocks)";
     $plan_percent = $_POST['plan_percent'];
     $plan_duration = $_POST['plan_duration'];
     $plan_percentage = $_POST['plan_percentage'];
     $plan_amount = $_POST['amount'];
     $date_time = date('Y-m-d');
     if($plan_duration == '14 Days' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 14, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '1 month' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 30, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '2 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 61, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '3 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 92, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '4 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 122, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '6 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 183, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '12 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 365, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '2 years' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 730, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }




     $plan_percentage = $_POST['plan_percentage'];
     $email = EMAIL;
     $full_name = FULL_NAME;
     $client_username = $_SESSION['email'];
     $info =  EMAIL." ".FNAME." has deposited to ".$plan_name." plan of  ".$plan_amount."USD for a period of ".$plan_duration."  ";
     $des = "You have succesfully purchased contract. Contract (stocks) Purchase: [".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
             with an estimate daily interest of ".$plan_percentage." starting from ".$date_time." to ".$with_date. "]";
     $dess = "Contract (stocks) Purchase: [".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
              with an estimate daily interest of ".$plan_percentage." starting from ".$date_time." to ".$with_date. "]";





     if ($balanc == 0) {
            echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='stocks.php';

</script>

    ";
    }
    elseif (($balanc - $plan_amount) <= 0) {
      echo "
<script>
alert('insufficient balance')
window.location.href='stocks.php';

</script>

  ";
  }
    else {
        
        //$date_time = date('Y-m-d');


   
        
        $sql = "INSERT INTO plans (client_user, plan_name, plan_percent, plan_duration, plan_amount, plan_date, with_date) 
                VALUES ('$client_username', '$plan_namee', '$plan_percent', '$plan_duration', ' $plan_amount', '$date_time','$with_date');";
        $sql .= "INSERT INTO transactions (client_user, email, tran_description, tran_amount, tran_type, tran_status, status, tran_date) 
                VALUES ('$client_username', '$email', '$dess', '$plan_amount', 'purchase', 'successful', '1', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES (Plan, '$info', '$date_time', 'unread', '$client_username');";

          
if ($conn->multi_query($sql)) {


   $email = $email;
    //$name =  $_POST['mode'];

    $subject = "Universalinvtpro| stocks contract Purchase successful";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Universalinvtpro</title>

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
                    Email from Universalinvtpro!
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
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://universalinvtpro.com/logo.png' alt='' /></a>
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

                                Hi, $full_name

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
                                        $des 
                                            
                                        </p>
                                        <br>
                                        <p style='line-height: 24px'>
                                            Thank You.</br>
                                            Universalinvtpro Team
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
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n";  


 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Investment has been succesfully placed')
window.location.href='stocks.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
       }       
}









// Select all plans
$user = $_SESSION['email'];
$tra = "SELECT * FROM transactions WHERE client_user = '$user'";
$trad = $conn->query($tra);

$error = '';

if(isset($_POST['real'])){

     $plan_name = $_POST['plan_name'];
     $plan_namee = $plan_name." (real estate)";
     $plan_percent = $_POST['plan_percent'];
     $plan_duration = $_POST['plan_duration'];
     $plan_percentage = $_POST['plan_percentage'];
     $plan_amount = $_POST['amount'];
     $date_time = date('Y-m-d');
     if($plan_duration == '14 Days' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 14, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '1 month' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 30, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '2 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 61, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '3 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 92, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '4 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 122, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '6 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 183, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '12 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 365, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '2 years' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 730, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }


     $plan_percentage = $_POST['plan_percentage'];
     $email = EMAIL;
     $full_name = FULL_NAME;
     $client_username = $_SESSION['email'];
     $info =  EMAIL." ".FNAME." has deposited to ".$plan_name." plan of  ".$plan_amount."USD for a period of ".$plan_duration."  ";
     $des = "You have succesfully purchased contract. Contract (real) Purchase: [".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
             with an estimate daily interest of ".$plan_percentage." starting from ".$date_time." to ".$with_date. "]";
     $dess = "Contract (real) Purchase: [".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
              with an estimate daily interest of ".$plan_percentage." starting from ".$date_time." to ".$with_date. "]";





     if ($balanc == 0) {
            echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='real.php';

</script>

    ";
    }
    elseif (($balanc - $plan_amount) <= 0) {
      echo "
<script>
alert('insufficient balance')
window.location.href='real.php';

</script>

  ";
  }
    else {
        
        //$date_time = date('Y-m-d');


   
        
        $sql = "INSERT INTO plans (client_user, plan_name, plan_percent, plan_duration, plan_amount, plan_date, with_date) 
                VALUES ('$client_username', '$plan_namee', '$plan_percent', '$plan_duration', ' $plan_amount', '$date_time','$with_date');";
        $sql .= "INSERT INTO transactions (client_user, email, tran_description, tran_amount, tran_type, tran_status, status, tran_date) 
                VALUES ('$client_username', '$email', '$dess', '$plan_amount', 'purchase', 'successful','1', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES (Plan, '$info', '$date_time', 'unread', '$client_username');";

          
if ($conn->multi_query($sql)) {


   $email = $email;
    //$name =  $_POST['mode'];

    $subject = "Universalinvtpro| real contract Purchase successful";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Universalinvtpro</title>

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
                    Email from Universalinvtpro!
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
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://universalinvtpro.com/logo.png' alt='' /></a>
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

                                Hi, $full_name

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
                                        $des 
                                            
                                        </p>
                                        <br>
                                        <p style='line-height: 24px'>
                                            Thank You.</br>
                                            Universalinvtpro Team
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
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n";  


 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Investment has been succesfully placed')
window.location.href='real.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
       }       
}












// Select all plans
$user = $_SESSION['email'];
$tra = "SELECT * FROM transactions WHERE client_user = '$user'";
$trad = $conn->query($tra);

if(isset($_POST['futures'])){

     $plan_name = $_POST['plan_name'];
     $plan_namee = $plan_name." (futures)";
     $plan_percent = $_POST['plan_percent'];
     $plan_duration = $_POST['plan_duration'];
     $plan_percentage = $_POST['plan_percentage'];
     $plan_amount = $_POST['amount'];
     $date_time = date('Y-m-d');
     if($plan_duration == '14 Days' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 14, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '1 month' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 30, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '2 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 61, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '3 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 92, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '4 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 122, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '6 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 183, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '12 months' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 365, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }
     if($plan_duration == '2 years' ) {
     $with_dat = mktime(0, 0, 0, date('m'), date('d') + 730, date('Y'));
     $with_date = date('Y-m-d', $with_dat);
         }


     $plan_percentage = $_POST['plan_percentage'];
     $email = EMAIL;
     $full_name = FULL_NAME;
     $client_username = $_SESSION['email'];
     $info =  EMAIL." ".FNAME." has deposited to ".$plan_name." plan of  ".$plan_amount."USD for a period of ".$plan_duration."  ";
     $des = "You have succesfully purchased contract. Contract (futures) Purchase: [".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
             with an estimate daily interest of ".$plan_percentage." starting from ".$date_time." to ".$with_date. "]";
     $dess = "Contract (futures) Purchase: [".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
              with an estimate daily interest of ".$plan_percentage." starting from ".$date_time." to ".$with_date. "]";





     if ($balanc == 0) {
            echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='futures.php';

</script>

    ";
    }
    elseif (($balanc - $plan_amount) <= 0) {
      echo "
<script>
alert('insufficient balance')
window.location.href='futures.php';

</script>

  ";
  }
    else {
        
        //$date_time = date('Y-m-d');


   
        
        $sql = "INSERT INTO plans (client_user, plan_name, plan_percent, plan_duration, plan_amount, plan_date, with_date) 
                VALUES ('$client_username', '$plan_namee', '$plan_percent', '$plan_duration', ' $plan_amount', '$date_time','$with_date');";
        $sql .= "INSERT INTO transactions (client_user, email, tran_description, tran_amount, tran_type, tran_status, status, tran_date) 
                VALUES ('$client_username', '$email', '$dess', '$plan_amount', 'purchase', 'successful', '1', '$date_time');";

          $sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES (Plan, '$info', '$date_time', 'unread', '$client_username');";

          
if ($conn->multi_query($sql)) {


   $email = $email;
    //$name =  $_POST['mode'];

    $subject = "Universalinvtpro| futures contract Purchase successful";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Universalinvtpro</title>

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
                    Email from Universalinvtpro!
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
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://universalinvtpro.com/logo.png' alt='' /></a>
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

                                Hi, $full_name

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
                                        $des 
                                            
                                        </p>
                                        <br>
                                        <p style='line-height: 24px'>
                                            Thank You.</br>
                                            Universalinvtpro Team
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
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n";  


 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('Investment has been succesfully placed')
window.location.href='futures.php';

</script>

    ";;
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }
       }       
}






//buy nft

// Select all plans
$user = $_SESSION['email'];
$tra = "SELECT * FROM transactions WHERE client_user = '$user'";
$trad = $conn->query($tra);




if(isset($_POST['buy'])){
     $id = $_POST['id'];
     $image = $_POST['image'];
     $product_description = $_POST['product_description'];
     $product_mint = $_POST['product_mint'];
     $product_sales = $_POST['product_sales'];
     $product_mint = $_POST['product_mint'];
     $product_status = $_POST['product_status'];
     $plan_amount =  $product_sales + $product_mint;
     $email = EMAIL;

     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];
     $info =  EMAIL." ".FNAME." has deposited to ".$plan_name." plan of  ".$plan_amount."USD for a period of ".$plan_duration."  ";



     if ($balanc == 0) {
            echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='nft.php';

</script>

    ";
    }
    elseif (($balanc - $product_sales) <= 0) {
      echo "
<script>
alert('insufficient balance')
window.location.href='nft.php';

</script>

  ";
  }
    else {
        
        $date_time = date('Y-m-d');   
        
        $sqln = "INSERT INTO products (image_id, image, client_user, product_description, product_mint, product_sales, product_status, product_date) 
                VALUES ('$id','$image','$client_username', '$product_description', '$product_mint', '$product_sales', '$product_status', '$date_time');";

        $sqln .= "INSERT INTO transactions (client_user, email, tran_description, tran_amount, tran_type, tran_status, status, tran_date) 
                VALUES ('$client_username', '$email', '$product_description', '$plan_amount', 'purchase', 'successful','1', '$date_time');";

        $sqln .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) 
                VALUES ('Plan', 'info', '$date_time', 'unread', '$client_username');";
        $sqln .= "UPDATE tb_upload SET  image_status = 0, client_user = '$client_username' WHERE id='$id' ";

          
if ($conn->multi_query($sqln)) {

   $email = $email;
    $name =  $_POST['mode'];

    $subject = "Successful";

    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>
    <!--<![endif]-->

    <title>Universalinvtpro</title>

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
                    Email from Universalinvtpro!
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
                                        <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 300px;' src='https://universalinvtpro.com/logo.png' alt='' /></a>
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

                                Purchase <span style='color: #5caad2;'>Successful.</span>

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
                                            You have succesfully  purchased NFT worth $$product_sales USD, with minting price of $$product_mint. Log in to check your nfts.
                                        </p>
                                        <table border='0' align='center' width='180' cellpadding='0' cellspacing='0' bgcolor='5caad2' style='margin-bottom:20px;'>

                                            <tr>
                                                <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align='center' style='color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 22px; letter-spacing: 2px;'>
                                                    <!-- main section button -->

                                                    <div style='line-height: 22px;'>
                                                        <a href='www.beichain-holdings.cc /login.php' style='color: #ffffff; text-decoration: none;'>Login</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                                            </tr>

                                        </table>
                                        <p style='line-height: 24px; margin-bottom:20px;'>
                                            Connect with our media personnel if you are running into problems at
                                             <a href='mailto:support@universalinvtpro.com ' style='color: blue; font-size: 20px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;'>support@universalinvtpro.com </a>
                                        </p>
                                        <br/> 
                                        <p style='line-height: 24px'>
                                            Regards,</br>
                                            Universalinvtpro Team
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
$from = 'contact@universalinvtpro.com '; 
$fromName = 'Universalinvtpro'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: contact@universalinvtpro.com ' . "\r\n"; 
$headers .= 'Bcc: contact@universalinvtpro.com ' . "\r\n";  

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('NFT has been succesfully purchased')
window.location.href='nft.php';

</script>

    ";
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: nft.php');
       }
       }       
}

      


































// Select all withdrawals
$user = $_SESSION['email'];
$with = "SELECT * FROM withdrawal WHERE client_user = '$user'";
$wit = $conn->query($with);


$status = "";

if(isset($_POST['with'])){

  $amount = sprintf('%.2f', $_POST['amount']);
     $amount_withdrawall = mysqli_real_escape_string($conn, $_POST['amount ']);
     $mode = $_POST['mode'];

     $client_username = $_SESSION['email'];
     $tranc_type = 'withdrawal';
     $act_date = date('Y-m-d');

if($mode=="Bitcoin"){

     



     if ($balanc == 0) {
      echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  elseif (($balanc - $amount) <= 0) {
      echo "
<script>
alert('You have exceeded your withdrawal limit, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  else {
      
    $date_time = date('Y-m-d');
    
            
  $info =  EMAIL." ".FNAME." has requested for a withdrawal of \$$amount; payment is to be made to his bitcoin wallet address";
    
    
    
    
    
$sql = "INSERT INTO withdrawal (client_user, amount, method, status, charges, with_date) 
        VALUES ('$client_username', '$amount', 'Bitcoin', 'Pending..', '30 USD', '$date_time');";
$sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) VALUES ('Withdrawal request', '$info', '$date_time', 'unread', '$client_username');";



  $sql .= "UPDATE users SET status ='Pending...' WHERE email='$user'";

    if ($conn->multi_query($sql)) {
      
        echo "
<script>
alert('withdrawal successfull, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
    }

}
}




if($mode=="Ethereum"){
     



     if ($balanc == 0) {
      echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  elseif (($balanc - $amount) <= 0) {
      echo "
<script>
alert('You have exceeded your withdrawal limit, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  else {
      
    $date_time = date('Y-m-d');
    
            
  $info =  EMAIL." ".FNAME." has requested for a withdrawal of \$$amount; payment is to be made to his Ethereum wallet address";
    
    
    
    
    
$sql = "INSERT INTO withdrawal (client_user, amount, method, status, charges, with_date) 
        VALUES ('$client_username', '$amount', 'Ethereum', 'Pending..', '30 USD', '$date_time');";
$sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) VALUES ('Withdrawal request', '$info', '$date_time', 'unread', '$client_username');";



  $sql .= "UPDATE users SET status ='Pending...' WHERE email='$user'";

    if ($conn->multi_query($sql)) {
      
        echo "
<script>
alert('withdrawal successfull, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
    }

}
}



if($mode=="Litecoin"){     



     if ($balanc == 0) {
      echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  elseif (($balanc - $amount) <= 0) {
      echo "
<script>
alert('You have exceeded your withdrawal limit, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  else {
      
    $date_time = date('Y-m-d');
    
            
  $info =  EMAIL." ".FNAME." has requested for a withdrawal of \$$amount; payment is to be made to his litecoin wallet address";
    
    
    
    
    
$sql = "INSERT INTO withdrawal (client_user, amount, method, status, charges, with_date) 
        VALUES ('$client_username', '$amount', 'Litecoin', 'Pending..', '30 USD', '$date_time');";
$sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) VALUES ('Withdrawal request', '$info', '$date_time', 'unread', '$client_username');";



  $sql .= "UPDATE users SET status ='Pending...' WHERE email='$user'";

    if ($conn->multi_query($sql)) {
      
        echo "
<script>
alert('withdrawal successfull, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
    }

}
}








if($mode=="Bank transfer"){     
     



     if ($balanc == 0) {
      echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  elseif (($balanc - $amount) <= 0) {
      echo "
<script>
alert('You have exceeded your withdrawal limit, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
  }
  else {
      
    $date_time = date('Y-m-d');
    
            
  $info =  EMAIL." ".FNAME." has requested for a withdrawal of \$$amount; payment is to be made to his bank account";
    
    
    
    
    
$sql = "INSERT INTO withdrawal (client_user, amount, method, status, charges, with_date) 
        VALUES ('$client_username', '$amount', 'Bank Transfer', 'Pending..', '30 USD', '$date_time');";
$sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) VALUES ('Withdrawal request', '$info', '$date_time', 'unread', '$client_username');";



  $sql .= "UPDATE users SET status ='Pending...' WHERE email='$user'";

    if ($conn->multi_query($sql)) {
      
        echo "
<script>
alert('withdrawal successfull, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

  ";
    }

}
}
}



// Update user data
if (isset($_POST['id'])) {
     $id = $_POST['id'];

     $update = "UPDATE tb_upload SET  image_status = 1, true_false = 'true' WHERE id='$id' ";
         if(mysqli_query($conn, $update)) {
                echo "
<script>
alert('NFT has been successfully, Put On sale')
window.location.href='my_nft.php';

</script>

    ";
         } else {
                            echo "
<script>
alert('Failed')
window.location.href='my_nft.php';

</script>

    ";

         }
          
}

if (isset($_POST['di'])) {

     $id = $_POST['di'];
     $update = "UPDATE tb_upload SET  image_status = 0, true_false = 'false' WHERE id='$id' ";
         if(mysqli_query($conn, $update)) {
                echo "
<script>
alert('NFT has been successfully, Removed from sale')
window.location.href='my_nft.php';

</script>

    ";
         } else {
                            echo "
<script>
alert('Failed')
window.location.href='my_nft.php';

</script>

    ";

         }
          
}





































//update withdrawal info
if (isset($_POST['save'])) {

     $first1 = $_POST['first1'];
     $last1 = $_POST['last1'];
     $dob = $_POST['dob'];
     $phone = $_POST['phone'];
     $country = $_POST['country'];
     $state = $_POST['state'];
     $email = $_POST['email'];
     $address = $_POST['address'];





     $sqln = "UPDATE users SET fname='$first1', lname='$last1', dob='$dob', phone='$phone', country='$country', state='$state', email='$email', address='$address' WHERE email='$user'";

 if ($conn->query($sqln)) {

  echo "
<script>
alert('Details updated succefully!')
window.location.href='profile.php';

</script>

  ";
      //header('location: index.php');
     }


}



// Select investments details
$user = $_SESSION['email'];
$sqa = "SELECT * FROM investments WHERE client_user = '$user' ORDER BY id";
$inv = $conn->query($sqa);



// select all earnings
$user = $_SESSION['email'];
$sqa = "SELECT * FROM earnings WHERE client_user = '$user'";
$earn = $conn->query($sqa);
$_earnings = $earn->fetch_assoc();


// select all from refferrals
$user = $_SESSION['email'];
$sqar = "SELECT * FROM referrals WHERE client_user = '$user' ORDER BY id";
$ref = $conn->query($sqar);


// select all from messages
$user = $_SESSION['email'];
$sqar = "SELECT * FROM message WHERE m_user = '$user' ORDER BY id";
$mes = $conn->query($sqar);







//update_email
if (isset($_POST['update_email'])) {

     $email = $_POST['email'];

     $sqln = "UPDATE users SET email='$email' WHERE email='$user'";

 if ($conn->query($sqln)) {

  echo "
<script>
alert('email has been updated')
window.location.href='settings.php';

</script>

  ";
      //header('location: index.php');
     }


}


//update_wallet
if (isset($_POST['subtrade'])) {
     $userid = $_POST['userid'];
     $pswrd = $_POST['pswrd'];
     $acntype= $_POST['acntype'];
     $currency = $_POST['currency'];
     $leverage = $_POST['leverage'];
     $server = $_POST['server'];
     $duration = $_POST['duration'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['email'];


    $sql = "INSERT INTO subtrade (client_user, userid, pswrd, acntype, currency, leverage, server, duration, dep_date) 
      VALUES ('$client_username', '$userid', '$pswrd', '$acntype', '$currency', '$leverage', '$server', '$duration', '$date_time');";
 if ($conn->query($sql)) {

  echo "
<script>
alert('MT4 Details Submitted Successfully, Please wait for the system to validate your credentials')
window.location.href='subtrade.php';

</script>

  ";
      //header('location: index.php');
     }


}



///messages 
// Classes
$notify = new notification($conn);


//////////////FETCH NOTIFICATION DATA FROM DATABASE\\\\\\\\\\\\\\\\\
class notification {
  public function __construct($conn) 
  {    

    $user = $_SESSION['email'];
    $sql = "SELECT * FROM message WHERE m_status='unread' AND m_user='$user'";
    
    $query = $conn->query($sql);
    $this->nu = mysqli_num_rows($query);
    
  }
  public function unreadSms() {
    echo $this->nu;
  }
}

class trunc {
  public function __construct($conn, $c) {

    $user = $_SESSION['email'];
    $sql = "DELETE FROM message WHERE m_user='$user'";
    if ($c == "clear") {
      $conn->query($sql);
      return header('location: message.php');
    }
  }
}



$sql_p = "SELECT * FROM message WHERE m_user='$user' ORDER BY id DESC";
$query_p = mysqli_query($conn, $sql_p);


// Select deposit history details
$user = $_SESSION['email'];
$sqa = "SELECT * FROM econtract  ORDER BY id ASC";
$contract = $conn->query($sqa);






















// Select wallet
$sq = "SELECT * FROM admin WHERE username = 'admin' ";
$quer = $conn->query($sq);
$re = $quer->fetch_assoc();













































//update user info
if (isset($_POST['save'])) {


     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $balance = $_POST['balance'];





     $sqln = "UPDATE users SET  first_name='$first_name', last_name='$last_name',  balance='$balance' WHERE username='$user'";

 if ($conn->query($sqln)) {

    echo "
<script>
alert('user details updated succefully!')
window.location.href='accountdetails.php';

</script>

    ";
        
       }


}


?>