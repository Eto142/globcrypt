<?php
if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    include "../database/db.php";
     
    $emailId = $_POST['email'];

 
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $emailId . "'");

 
    if(mysqli_num_rows($result) > 0){ 
  
     
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
        $update = mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 
    
    $link = "please click on the link to reset your password";
    $link .= "<a href='https://elitemarkets.com/password/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";


 
if ($update) {

$email =  $emailId;

$subject = "password reset";

$message = $link;






$to_email = $email;
$subject = $subject;
$body = $message;
$from = 'support@elitetrdmarkets.com'; 
$fromName = 'Elitetrdm'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@elitetrdmarkets.com' . "\r\n"; 
$headers .= 'Bcc: support@elitetrdmarkets.com' . "\r\n"; 

 
if (mail($to_email, $subject, $body, $headers)) {
        echo "
<script>
alert('we have sent you an email')
window.location.href='forgot-password.php';

</script>

    ";
        $conn->close();
} else {
    echo '<script type="text/javascript"> alert("Failed ...")</script>';
} 



 
        //header('location: index.php');
       
       }
}

else {
    echo "email does not exist";
}

}
?>