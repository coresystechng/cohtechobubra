<?php 
//just include on new_user.php and then call the function sendmail() with the needed details
function sendmail($fullname,$email,$code){
     $subject = "E-mail Verification";
        $htmlContent = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Verification Code</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
                .container {
                    width: 100%;
                    padding: 20px;
                    background-color: #ffffff;
                    max-width: 600px;
                    margin: 0 auto;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                .header {
                    background-color: #F2571C;
                    color: #ffffff;
                    padding: 10px;
                    text-align: center;
                    border-radius: 8px 8px 0 0;
                }
                .header h1 {
                    margin: 0;
                    font-size: 24px;
                }
                .content {
                    padding: 20px;
                    text-align: center;
                }
                .content p {
                    font-size: 16px;
                    line-height: 1.5;
                    color: #333333;
                }
                .code {
                    font-size: 24px;
                    font-weight: bold;
                    color: #001e5a;
                    background-color: #f4f4f4;
                    padding: 10px;
                    border-radius: 4px;
                    display: inline-block;
                    margin: 20px 0;
                    letter-spacing: 2px;
                }
                .footer {
                    padding: 10px;
                    text-align: center;
                    font-size: 12px;
                    color: #777777;
                }
                .footer p {
                    margin: 0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Verification Code</h1>
                </div>
                <div class='content'>
                    <img src='link_to_logo' width='20%'/>
                    <p>Dear $fullname,</p>
                    <p>Thank you for registering. Please use the following verification code to confirm your email</p>
                    <div class='code'>$code</div>
                    <p>If you did not request this, please ignore this email.</p>
                </div>
                <div class='footer'>
                    <p>&copy; 2025. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ";

            $to = $email;
            $subject = "Your Verification Code";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: replace_with_sender_email" . "\r\n"; 

            $mail = mail($to, $subject, $htmlContent, $headers);
            if($mail){
                echo 1;
            }
        
    }
 

    mysqli_close($conn);
?>