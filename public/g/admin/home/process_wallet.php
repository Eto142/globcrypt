<?php

require_once "db.php";




// Update wallet
$report = "";

if(isset($_POST['update'])) {

	$method = $_POST['method'];
	if ($method=='ethereum'){
return header('location: ethereum.php');
	}
	elseif ($method=='bitcoin'){
return header('location: bitcoin.php');
	}
	elseif ($method=='usdt'){
return header('location: usdt.php');
	}
elseif ($method=='trc'){
return header('location: trc.php');
	}
		elseif ($method=='ripples'){
return header('location: ripples.php');
	}
	elseif ($method=='bank'){
return header('location: bank.php');
	}
       
}


if(isset($_POST['ethereum'])) {

$method = $_POST['wallet'];
$update = "UPDATE admin SET eth ='$method' WHERE username='admin' ";
    if ($conn->query($update)) {


    	 	echo "
<script>
alert('Ethereum wallet updated successfully ')
window.location.href='ethereum.php';

</script>

 	";
}
}

if(isset($_POST['bitcoin'])) {

$method = $_POST['wallet'];
$update = "UPDATE admin SET btc ='$method' WHERE username='admin' ";
    if ($conn->query($update)) {
	   
    	 	echo "
<script>
alert('Bitcoin wallet updated successfully ')
window.location.href='bitcoin.php';

</script>

 	";

	   }   
}
if(isset($_POST['usdt'])) {

$method = $_POST['wallet'];
$update = "UPDATE admin SET usdt ='$method' WHERE username='admin' ";
    if ($conn->query($update)) {
	  
    	 	echo "
<script>
alert('Litecoin wallet updated successfully ')
window.location.href='usdt.php';

</script>

 	";


	   }   
}



if(isset($_POST['trc'])) {

$method = $_POST['wallet'];
$update = "UPDATE admin SET trc ='$method' WHERE username='admin' ";
    if ($conn->query($update)) {
	  
    	 	echo "
<script>
alert('TRC wallet updated successfully ')
window.location.href='trc.php';

</script>

 	";


	   }   
}


if(isset($_POST['ripples'])) {

$method = $_POST['wallet'];
$update = "UPDATE admin SET ripples ='$method' WHERE username='admin' ";
    if ($conn->query($update)) {
	  
    	 	echo "
<script>
alert('Ripples wallet updated successfully ')
window.location.href='ripples.php';

</script>

 	";


	   }   
}


if(isset($_POST['bank'])) {

$bank_name = $_POST['bank_name'];
$account_name = $_POST['account_name'];
$account_no = $_POST['account_no'];

$update = "UPDATE admin SET bank_name ='$bank_name', account_name ='$account_name', account_no ='$account_no' WHERE username='admin' ";
    if ($conn->query($update)) {
	       	 	echo "
<script>
alert('Account details updated successfully ')
window.location.href='bank.php';

</script>

 	";

	   }   
}







	/*$update = "UPDATE admin SET ethereum ='$method' WHERE username='admin' ";
if ($conn->query($update)) {
	   	header('location: update_wallet2.php');*/

// Select wallet
$sq = "SELECT * FROM admin WHERE username = 'admin' ";
$quer = $conn->query($sq);
$re = $quer->fetch_assoc();




 ?>