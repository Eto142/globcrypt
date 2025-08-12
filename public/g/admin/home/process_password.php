<?php  


require_once "db.php";

// Update password
$report = '';

if(isset($_POST['update'])) {
    
	$new_password = mysqli_real_escape_string($conn, ($_POST['pass_new']));
	$cur_password = mysqli_real_escape_string($conn, ($_POST['pass_cur']));
	$sql_pass = "SELECT * FROM admin WHERE password='$cur_password' ";
	$check = mysqli_num_rows(mysqli_query($conn, $sql_pass));
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql_pass));
	
	if($new_password != "" && $cur_password != "" && $check == 1) {
		$update = "UPDATE admin SET password='$new_password' WHERE username='admin' ";
		mysqli_query($conn, $update);
		$report = "<p class='text-success font-weight-bolder'><i class='fa fa-check-circle'></i> Password Changed Successfully!</p>";
	} else {
		$report = "<p class='text-danger font-weight-bolder'><i class='fa fa-info-circle'></i>old password is incorrect</p>";
	}
}




?>