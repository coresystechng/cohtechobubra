<?php
//Get the user details from the session
$email = $_SESSION['email'];
$trx_id = $_SESSION['trx_id'];
$full_name = $_SESSION['full_name'];

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
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.cohtechobubra.edu.ng';            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'noreply@cohtechobubra.edu.ng';         //SMTP username
    $mail->Password   = 'Uk!Pc_*KfbN(';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('noreply@cohtechobubra.edu.ng', 'COHTECH Obubra');
    $mail->addAddress($email, $full_name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration Successful';
    $mail->Body    = "<p>Dear $full_name ($trx_id),</p></br><p>Your registration was successful and your data has been saved. Your admission will be processed in due time and you will be notified of your status via email..<br><p>Thank you. </p><br><hr><p>&copy; 2025 COHTECH Obubra. All rights reserved.</p>";
    $mail->AltBody = "Registration Successful";

    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>