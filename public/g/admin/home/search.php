<?php
include_once "../../../dashboardphp/admin_server.php";
$r = "";
$q = $_GET['q'];

$sql_ser = "SELECT * FROM users WHERE username LIKE '%$q%' OR fname LIKE '%$q%' OR lname LIKE '%$q%' ";
$query_ser = mysqli_query($conn, $sql_ser);
$num = mysqli_num_rows($query_ser);

if ($num == 0 ) {
	$r = "No such records";
} 
else {
	while($row = mysqli_fetch_array($query_ser)) {
		$fname = $row['fname'];
		$lname = $row['lname'];
		$uname = $row['username'];
		$email = $row['email'];
		$r .= "<div class='clearfix mb-1'><span class='float-left'>".$fname." ".$lname."<br><span>$email</span></span><a href='update.php?username_sess=$row[username]' class='float-right font-weight-bolder text-white' style='font-size:22px;'>&rarr;</a></div><hr class='hr'><br>";
	}
	echo $r;
}
?>