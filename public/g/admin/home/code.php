<?php 

require_once "db.php";
 
 $report = "";

if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($conn, ($_POST['id']));
    $username = mysqli_real_escape_string($conn, ($_POST['username']));
    $email = mysqli_real_escape_string($conn, ($_POST['email']));
    $password = mysqli_real_escape_string($conn, ($_POST['password']));

		$update = "UPDATE users SET username ='$username', email = '$email', password = '$password' WHERE id='$id' ";
		mysqli_query($conn, $update);
		$report = "<p class='text-success font-weight-bolder'><i class='fa fa-check-circle'></i> USER HAS BEEN UPDATED SUCCESSFULY!</p>";


	} else {
		$report = "<p class='text-success font-weight-bolder'><i class='fa fa-check-circle'></i> USER NOT UPDATED </p>";
	}


?>