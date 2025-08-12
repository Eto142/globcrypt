<?php 
session_start();
require_once "db.php";




// Ftech admin side user data
$sess = $_GET['username_sess'];
$_SESSION['username_sess'] = $sess;
$user = $_SESSION['username_sess'];



$sqli = "SELECT * FROM users WHERE email='$user' ";
$query = mysqli_query($conn, $sqli);
$row = mysqli_fetch_assoc($query);






// SUM WITHDRAWALS
$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(amount) AS total FROM withdrawal WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$withdrawal = sprintf('%.2f',$row_to['total']);

// SUM user
$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(amount) AS total FROM deposit_history WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$deposits = sprintf('%.2f',$row_to['total']);


// SUM user
$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(amount) AS total FROM user_profit WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$user_profit = sprintf('%.2f',$row_to['total']);

// SUM user
$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(amount) AS total FROM user_profit WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$withe = sprintf('%.2f',$row_to['total']);


// SUM Refferals
$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(amount) AS total FROM user_deposits WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$user_deposits = sprintf('%.2f',$row_to['total']);


// SUM withdrawal
$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(amount) AS total FROM withdrawal WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$withdrawal = $row_to['total'];



$user = $_SESSION['username_sess'];
$sql_total = "SELECT SUM(plan_amount) AS total FROM plans WHERE client_user = '$user'";
$row_que = mysqli_query($conn, $sql_total);
$row_to = mysqli_fetch_array($row_que);
$trade = sprintf('%.2f',$row_to['total']);



 $deposit = $deposits- $trade;


  $balance = $user_deposits + $withe - $trade -$withdrawal;



















// Update user data
if (isset($_POST['update'])) {

	$client_username = $_SESSION['username_sess'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	$total = $_POST['total'];
	$capital = $_POST['capital'];
	$bonus = $_POST['amount'];
	$plan_name = $_POST['plan_name'];
	$inv_date = $_POST['inv_date'];
	$country = $_POST['country'];
	$info =  "your deposit transaction has been approved successfully.";
	$date_time = date('Y-m-d');
 


$sql = "INSERT INTO user_profit (client_user, amount, plan_name, date_created) 
        VALUES ('$client_username', '$bonus', '$plan_name','$inv_date');";
        
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('Approved Deposit', '$info', '$date_time', 'unread', '$email;";

        

if ($conn->multi_query($sql)) {
	
 header('location: update.php?username_sess='.$user);
	 	   } 
	 	   else{
 echo "
<script>
alert('Update Failed')
window.location.href='user.php';

</script>

     ";
}

        $conn->close();


}















// Update user data
if (isset($_POST['topup'])) {

	$client_username = $_POST['email'];

	$plan_name = $_POST['plan_name'];
	$inv_date = $_POST['inv_date'];
	$amount = $_POST['amount'];
	$info =  "your profit have been topped up successfully.";
	$date_time = date('Y-m-d');

	
 


$sql = "INSERT INTO user_profit (client_user, amount, plan_name, date_created) 
        VALUES ('$client_username', '$amount', '$plan_name','$inv_date');";
        
$sql .= "INSERT INTO message (m_type, m_description, m_date, m_status, m_user) 
         VALUES ('profit', '$info', '$date_time', 'unread', '$email);";

        

if ($conn->multi_query($sql)) {
echo "
<script>
alert('done')
window.location.href='user.php';

</script>

     ";
	 	   } 
	 	   else{
 echo "
<script>
alert('Update Failed')
window.location.href='user.php';

</script>

     ";
}

        $conn->close();


}










// Update user bonus
if (isset($_POST['updatebonus'])) {
	$id = $_POST['id'];
	
	$bonus = $_POST['bonus'];

	$update = "UPDATE users SET bonus = '$bonus' WHERE id='$id' ";

		if (mysqli_query($conn, $update)){
    echo "
<script>
alert('Bonus updated Successfully')
window.location.href='index.php';

</script>

     ";
	 	   } else{
 echo "
<script>
alert('Update Failed')
window.location.href='user.php';

</script>

     ";
}

        $conn->close();


}




// Update Trade Status
if (isset($_POST['updatestatus'])) {
	$id = $_POST['id'];
	$tstatus = $_POST['tstatus'];

	$update = "UPDATE users SET tstatus  = '$tstatus' WHERE id='$id' ";

		if (mysqli_query($conn, $update)){
    echo "
<script>
alert('Trade Status updated Successfully')
window.location.href='index.php';

</script>

     ";
	 	   } else{
 echo "
<script>
alert('Update Failed')
window.location.href='user.php';

</script>

     ";
}

        $conn->close();


}









// Select deposit history details
// $user = $_SESSION['email'];
// $sqa = "SELECT * FROM deposit_history WHERE client_user = '$user'";
// $dhistory = $conn->query($sqa);



// if(isset($_POST['deposit'])){

//      $amount = $_POST['amount'];
//      $date_time =$_POST['ddate'];
//      $client_username = $_SESSION['email'];
     
   
    
//     $sql = "INSERT INTO deposit_history (client_user, amount, status, dep_date) 
//         VALUES ('$client_username', '$amount', 'Pending...', '$date_time');";


//           $sql .= "UPDATE users SET deposit = '$amount' WHERE email='$user'";

// if ($conn->multi_query($sql)) {

//   echo "
// <script>
// alert('Deposit is Awaiting; Please wait for Approval ')
// window.location.href='index.php';

// </script>

//   ";
//       //header('location: index.php');
//      }        $conn->close();

// }

?>