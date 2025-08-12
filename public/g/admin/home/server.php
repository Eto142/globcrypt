<?php
require 'mailer/PHPMailerAutoload.php';


$mail = new PHPMailer;

    if (isset($_POST['submit'])) {


        $mess = "<!DOCTYPE html>
    <html>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <style>
        @import url('https://grandcpt.com/dashboard/icons/line-awesome/css/line-awesome.min.css');
        @import url('https://grandcpt.com/dashboard/icons/font-awesome/css/font-awesome.min.css');
        body {
            background-color: #eee;
            font-family: Arial;
            font-size: 12px;
            padding: 0;
            margin: 0;
        }
        hr {
          box-sizing: content-box;
          height: 0;
          overflow: visible; 
          color: #8bd;
        }
        hr {
          margin-top: 1rem;
          margin-bottom: 1rem;
          border: 0;
          border-top: 1px solid rgba(0, 0, 0, 0.1); 
        }
        .container-fluid {
            width: 100%;
            box-sizing: border-box;
            padding-right: 15px;
            padding-left: 15px;
            padding-top: 24px;
        }
        .container {
            width: 100%;
            color: #333;
            padding: 16px 16px;
            line-height: 24px;
            box-sizing: border-box;
            border-radius: 16px;
            background-color: #fff;
            border-top: 8px solid #8bd;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        }
        .text-center {
            text-align: center;
        }
        .text-muted {
            color: #555;
        }
        .m-y-5 {
            margin: 24px 0;
        }
        .text-primary {
            color: #8bd;
        }
        .text-danger {
            color: red;
        }
        .text-success {
            color: #0f0;
        }
    </style>
    </head>
    
    <body>
    <div class='container-fluid'>
        <div class='container'>
            <h2>Hello $fname</h2>
            <p>Welcome to Grandcpt.</p>
            <p>A world leading online investment platform fashioned with leading modern technology and security. Our experts always improves this platform to give the best customer experience. </p>
            <hr class='text-primary'>
                </div>
    </div>
    <div class='container-fluid text-center text-muted'>
        <p>Kindly fund account to activate your live trade and maximize your earnings.</p>
        <span>Mailed from <b>grandcpt</b></span>
        <p><i class='fa fa-twitter'></i>&nbsp; <i class='fa fa-facebook'></i>&nbsp; <i class='fa fa-instagram'></i></p>
        <p>&copy; Copyright <span id='yer'>2021</span></p>
    </div>
    
    </body>
    </html>";

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.grandcpt.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@grandcpt.com';                 // SMTP username
    $mail->Password = 'PVG[zXXk^RWl';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('support@grandcpt.com', 'Grandcpt');
    $mail->addAddress($_POST['email']);     // Add a recipient
    $mail->addReplyTo('support@grandcpt.com', 'For support');

    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $_POST['subject'];
    $mail->Body    = $mess;
    $mail->AltBody = $_POST['message'];
    /////////////////////////////////////////////////////////////////////////////////


            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
         

        
    }



?>