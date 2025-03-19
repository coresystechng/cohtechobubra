<?php
session_start();
if(isset($_SESSION['verification_code'])) {
  $email = $_SESSION['email'];
  $fullname = $_SESSION['fullname'];
  $verification_code = $_SESSION['verification_code'];
  $payment = "₦7,500";
  
  $message = "Your email <b><u> $email </u></b> has been verified. <br> Please click the button below to make payment of <b> $payment </b> to access the online registration form.";

  } else {
  header("Location: index.html");
  };

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $fullname = trim($_POST['fullname']);
    $verification_code = trim($_POST['verification_code']);
    $error = "";

    // Redirect to the payment page
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['verification_code'] = $verification_code;
    header("Location: payment.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Confirmation - Registration - COHTECH Obubra</title>
  <link rel="shortcut icon" href="assets/img/cohtech-logo.png" type="image/x-icon">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    /* Import Inter Font from Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    html {
      font-family: 'Inter', sans-serif;
    }
    .theme-color-txt {
      color: #702963 !important;
    }

    .theme-color-bg {
      background-color: #702963 !important;
    }

  </style>
</head>
<body>
    <section class="section">
      <div class="container section center-align">
        <div class="container">
          <div class="card z-depth-3">
            <div class="card-content container">
              <img src="assets/img/success-check.png" alt="Success Check Mark" class="responsive-img" width="15%">
              <h4>Email Verified!</h4>
              <br>
              <p><?php echo $message;?></p>
              <br>
              <form action="confirm_email.php" method="post">
                <input type="hidden" name="email" value="<?php echo $email;?>">
                <input type="hidden" name="fullname" value="<?php echo $fullname;?>">
                <input type="hidden" name="verification_code" value="<?php echo $verification_code;?>">
                <input type="submit" name="submit" value="proceed to payment" class="btn theme-color-bg btn-flat btn-large white-text">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>