<?php
include 'connect.php';
session_start();
if(isset($_SESSION['trx_id'])){
  $trx_id = $_SESSION['trx_id'];
  $email = $_SESSION['email'];
  $fullname = $_SESSION['fullname'];
  
  $greeting = "Dear $fullname";
  $message = "Your data has been saved successfully. Your admission will be processed in due time and you will be notified of your status via email.";
  $message2 = "Please click the link below to save a copy of the registration form or the button below to go back to our website.";

  // Delete temp data on the users_tb from the database
  $sql = "DELETE FROM `users_tb` WHERE `payment_ref` = '$trx_id'";
  $result = mysqli_query($conn, $sql);

  } else {
  header("Location: index.html");
  };

  // Check if the "BACK TO HOME" button is clicked
  if(isset($_POST['submit'])){
    header("Location: https://www.cohtechobubra.edu.ng");
    // Unset and destroy session variables
    session_unset();
    session_destroy();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form - COHTECH Obubra</title>
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

    .underline-txt {
      text-decoration: underline !important;
    }

  </style>
</head>
<body>
    <section class="section">
      <div class="container section center-align">
        <div class="container">
          <div class="card z-depth-3">
            <div class="card-content container">
              <img src="assets/img/cohtech-logo.png" alt="COHTECH Obubra Logo" class="responsive-img" width="15%">
              <h4>Registration Completed!</h4>
              <p class="theme-color-txt"><b><?php echo $greeting;?> (<?php echo $trx_id ?>),</b></p>
              <br>
              <p class=""><?php echo $message;?></p>
              <br>
              <p class=""><?php echo $message2;?></p>
              <br>
              <a target="_blank" href="generate_file.php?trx_id?=<?php echo $trx_id?>" class="theme-color-txt underline-txt">
                Generate PDF
                <i class="material-icons tiny theme-color-txt">call_made</i>
              </a>
              <br><br>
              <form action="save.php" method="post">
                <button type="submit" name="submit" class="btn theme-color-bg btn-flat btn-large white-text">BACK TO HOME</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>