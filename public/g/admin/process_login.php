<?php
session_start();
require_once "db.php";

//$sess = $_SESSION['admin_username'];
// Log admin in

// Login if input is correct
if (isset($_POST['login_btn'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, ($_POST['password']));

	// Fetch admin credentials
	$sqli = "SELECT * FROM admin WHERE password='$password' AND username='$username' ";
	$query = mysqli_query($conn, $sqli);
	$num_row = mysqli_num_rows($query);

	if($num_row == 1) {

	$_SESSION['admin_username'] = $username;
	header('location: home/');
	}
}