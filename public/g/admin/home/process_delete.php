<?php  
require_once "db.php";


 //$delete = " DELETE FROM users WHERE id ='" .$_GET["id"] ."'" ;

//mysqli_query($conn, $delete);


		// Delete users
$get_user_id = $_GET['id'];
if(!empty($get_user_id) && $_GET['q'] == 'delete_user') {
	$sql = "DELETE FROM users WHERE id='$get_user_id' ";
	mysqli_query($conn, $sql);
	header('location:../home/');
}


?>



