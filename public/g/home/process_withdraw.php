<?php


require_once "../database/secure.php";







// Fetch user data
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$user' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);






if(isset($_POST['withh'])){
     $name = $_POST['name'];
     $amount = sprintf('%.2f', $_POST['amount']);
     $amount_withdrawall = mysqli_real_escape_string($conn, $_POST['amount']);
     $mode = $_POST['mode'];
     $email = EMAIL;

     $client_username = $_SESSION['email'];
     $tranc_type = 'withdrawal';
     $act_date = date('Y-m-d');

     



     if ($balanc == 0) {
            echo "
<script>
alert('You have not funded your account, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

    ";
    }
    elseif (($balanc - $amount) <= 0) {
            echo "
<script>
alert('insufficient balance, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

    ";
    }
    else {
        
        $date_time = date('Y-m-d');
        
                        
    $info =  EMAIL." ".FNAME." has requested for a withdrawal of \$$amount; payment is to be made to his bitcoin wallet address";

    $messagee = EMAIL." ".FNAME." has just requested for a \$$amount, $mode";
        
        
        
        
        
$sql = "INSERT INTO withdrawal (client_user, email, name, wallet, amount, method, status, charges, with_date) 
                VALUES ('$client_username','$email', '$name', '$mode', '$amount', '$mode', 'Pending..', '$mode', '$date_time');";
$sql .= "INSERT INTO notifications (n_type, n_description, n_date, n_status, n_user) VALUES ('Withdrawal request', '$info', '$date_time', 'unread', '$client_username');";



    $sql .= "UPDATE users SET status ='Pending...' WHERE email='$user'";


if ($conn->multi_query($sql)) {

        echo "
<script>
alert('withdrawal Pending!, Please contact our live support for more information')
window.location.href='withdraw.php';

</script>

    ";
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
}

 
        //header('location: index.php');
       }


}

 
































