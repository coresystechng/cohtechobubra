<?php

session_start();
$email = $_SESSION['email'];
$verification_code = $_SESSION['verification_code'];
$fullname = strtoupper($_SESSION['fullname']);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.cohtechobubra.edu.ng';            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'noreply@cohtechobubra.edu.ng';         //SMTP username
    $mail->Password   = 'Uk!Pc_*KfbN(';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('noreply@cohtechobubra.edu.ng', 'No Reply');
    $mail->addAddress($email, $fullname);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = "<p> Good day, $fullname.</p></br><p>Please use the verification code below to confirm your email:</p><h1><code>$verification_code<code></h1><p>If you did not make this request, kindly ignore this email.</p><br><hr><p>&copy; 2025 COHTECH Obubra. All rights reserved.</p>";
    $mail->AltBody = "Your verification code is $verification_code";

    $mail->send() ;
    echo "Message has been sent";
    header("Location: verification.php?email=$email");
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>