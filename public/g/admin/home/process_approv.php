<?php 
session_start();
require_once "db.php";




// Ftech admin side user data
//$sess = $_GET['username_sess'];
//$_SESSION['username_sess'] = $sess;
//$user = $_SESSION['username_sess'];



// Fetch user data
$user = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$user' ORDER BY id ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


// Select deposit history details
$user = $_SESSION['username'];
$sqa = "SELECT * FROM deposit_history WHERE client_user = '$user'";
$dhistory = $conn->query($sqa);
$history = $dhistory->fetch_assoc();

// Select deposit history details
$user = $_SESSION['username'];
$sqa = "SELECT * FROM investments WHERE client_user = '$user'";
$inv = $conn->query($sqa);
$invest = $inv->fetch_assoc();


// SUM user
$user = $_SESSION['username'];
$sql_total = "SELECT SUM(iv) AS total FROM users WHERE username = '$user'";
$row_quer = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($row_quer);
$row_iv = $row_total['total'];

// SUM user
$user = $_SESSION['username'];
$sql_total = "SELECT SUM(bonus) AS total FROM users WHERE username = '$user'";
$row_query = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($row_query);
$row_bonus = $row_total['total'];

// SUM user
$user = $_SESSION['username'];
$sql_total = "SELECT SUM(earnings) AS total FROM users WHERE username = '$user'";
$row_query = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($row_query);
$row_earn = $row_total['total'];



if(isset($_POST['approv'])) { 
     $username = $_POST['username'];
     $amount = $_POST['amount'];
     $tid = $_POST['tid'];
     $dep_date = $_POST['date'];
     $method = $_POST['method'];
     $date_time = date('Y-m-d');
     $client_username = $_SESSION['username'];
     $info =  "your $amount USD deposit has been approved; Successfully";
     $total = $row_iv + $row_bonus + $row_earn;


     //$sql_add = "UPDATE users SET , iv='$amount' WHERE username='$user'";
      //mysqli_query($conn, $sql_add);


if ($amount >= 10000 && $amount <= 99999) {
$bonus = 0.085 * $amount;
$profit = $bonus + $amount;
$with_dat = mktime(0, 0, 0, date('m'), date('d') + 10, date('Y'));
$with_date = date('Y-m-d', $with_dat);

	
$sql = "INSERT INTO investments (client_user, plan_name, inv_amount, profit, total, inv_date, with_date) 
	   VALUES ('$client_username', 'PREMIUM', '$amount', '$bonus', '$profit', '$dep_date', '$with_date');";
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";
$sql .= "UPDATE users SET total = '$profit', earnings='$bonus', iv='$amount'  WHERE username='$user'";

if ($conn->multi_query($sql)){

 	echo "
<script>
alert('Transaction Has been approved Successfully')
window.location.href='index.php';

</script>

 	";
	   	//header('location: index.php');
	   }

        $conn->close();
    }

if ($amount >= 200000 && $amount <= 0) {
$bonus = 0.045 * $amount;
$profit = $bonus + $amount;
$with_dat = mktime(0, 0, 0, date('m'), date('d') + 30, date('Y'));
$with_date = date('Y-m-d', $with_dat);

     
$sql = "INSERT INTO investments (client_user, plan_name, inv_amount, profit, total, inv_date, with_date) 
        VALUES ('$client_username', 'BUSINESS PACKAGE', '$amount', '$bonus', '$profit', '$dep_date', '$with_date');";
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";
$sql .= "UPDATE users SET total = '$profit', earnings='$bonus', iv='$amount'  WHERE username='$user'";

if ($conn->multi_query($sql)){

     echo "
<script>
alert('Transaction Has been approved Successfully')
window.location.href='index.php';

</script>

     ";
          //header('location: index.php');
        }

        $conn->close();
    }


if ($amount >= 500 && $amount <= 4999) {
$bonus = 0.49 * $amount;
$profit = $bonus + $amount;
$with_dat = mktime(0, 0, 0, date('m'), date('d') + 5, date('Y'));
$with_date = date('Y-m-d', $with_dat);

     
$sql = "INSERT INTO investments (client_user, plan_name, inv_amount, profit, total, inv_date, with_date) 
        VALUES ('$client_username', 'STANDARD', '$amount', '$bonus', '$profit', '$dep_date', '$with_date');";
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";
$sql .= "UPDATE users SET total = '$profit', earnings='$bonus', iv='$amount'  WHERE username='$user'";

if ($conn->multi_query($sql)){

     echo "
<script>
alert('Transaction Has been approved Successfully')
window.location.href='index.php';

</script>

     ";
          //header('location: index.php');
        }

        $conn->close();
    }

    if ($amount >= 5000 && $amount <= 9999) {
$bonus = 0.07 * $amount;
$profit = $bonus + $amount;
$with_dat = mktime(0, 0, 0, date('m'), date('d') + 7, date('Y'));
$with_date = date('Y-m-d', $with_dat);

     
$sql = "INSERT INTO investments (client_user, plan_name, inv_amount, profit, total, inv_date, with_date) 
        VALUES ('$client_username', 'PREMIUM', '$amount', '$bonus', '$profit', '$dep_date', '$with_date');";
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Deposit', '$info', '$date_time', 'unread', '$client_username');";
$sql .= "UPDATE users SET total = '$profit', earnings='$bonus', iv='$amount'  WHERE username='$user'";

if ($conn->multi_query($sql)){

     echo "
<script>
alert('Transaction Has been approved Successfully')
window.location.href='index.php';

</script>

     ";
          //header('location: index.php');
        }

        $conn->close();
    }

}








?>