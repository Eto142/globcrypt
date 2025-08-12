<?php  

require_once "db.php";

// Classes
$notify = new notification($conn);


//////////////FETCH NOTIFICATION DATA FROM DATABASE\\\\\\\\\\\\\\\\\
class notification {
	public function __construct($conn) 
	{
		$sql = "SELECT * FROM notifications WHERE n_status='unread' ";
		
		$query = $conn->query($sql);
		$this->nu = mysqli_num_rows($query);
		
	}
	public function unreadSms() {
		echo $this->nu;
	}
}
class updateNotify {

	public function __construct($conn, $v, $d)
	{
		$sql = "UPDATE notifications SET n_status = 'read' WHERE n_date='$d'";
		if (isset($v)) {
			return $conn->query($sql);
		}
	}
}
class trunc {
	public function __construct($conn, $c) {
		$sql = "TRUNCATE TABLE notifications";
		if ($c == "clear") {
			$conn->query($sql);
			return header('location: notification.php');
		}
	}
}

$sql_p = "SELECT * FROM notifications ORDER BY id DESC";
$query_p = mysqli_query($conn, $sql_p);




?>