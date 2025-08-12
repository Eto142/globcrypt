



<?php
require_once "secure.php";


if(isset($_POST['pin'])){
      $pin = $_POST['pin'];
     $client_username = $_SESSION['username'];
     if (PIN==$pin) {
   $status = '<p class="text-danger">Security Pin correct.....</p>';
header('location: dashboard.php');


  }
}

?>