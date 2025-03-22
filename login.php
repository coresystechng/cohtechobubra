<?php 

// Include template files
require 'connect.php';

//Set blank variables
$email = "";
$trx_id = "";
$error_msg = "";

// check if the login button is pressed
if(isset($_POST['login'])){
  // Set the blank variables to store data from form fields
  $email = $_POST['email'];
  $trx_id = $_POST['trx_id'];

  // Fetch login details
  $fetch_login_details = "SELECT * FROM `users_tb` WHERE `email` = '$email'";
  // Send query to server
  $send_query = mysqli_query($conn, $fetch_login_details);

  if(mysqli_num_rows($send_query)){
    $user = mysqli_fetch_assoc($send_query);
    // print_r($login_details);
    if($trx_id === $user["payment_ref"]){
      session_start();
      $_SESSION["email"] = $user["email"];
      $_SESSION["first_name"] = $user["first_name"];
      $_SESSION["surname"] = $user["surname"];
      $_SESSION["trx_id"] = $user["payment_ref"];

      header('Location: registration_form.php');
      
    } else {
      $error_msg = "Invalid Transaction ID!";
    }

  } else {
    $error_msg = "Incorrect login details";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - COHTECH Obubra</title>
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

    /* Parallax height */
    .parallax-container {
      height: 600px;
    }

    /* label focus color */
    .input-field input:focus + label, textarea:focus + label {
      color: #702963 !important;
    }

    /* label underline focus color */
    .input-field input:focus, textarea:focus {
      border-bottom: 1px solid #702963 !important;
      box-shadow: 0 1px 0 0 #702963 !important;
    }

    /* Dropdown text color */
    .dropdown-content li>a,.dropdown-content li > span {
      color: #702963 !important; 
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
  <div class="container section center center-align">
    <br class="hide-on-med-and-down">
    <br class="hide-on-med-and-down">
    <br class="hide-on-med-and-down">
    <br class="hide-on-med-and-down">
    <img src="assets/img/cohtech-logo-blue.png" alt="COHTECH Official Logo" width="15%">
    <p class="theme-color-txt">Enter your login details below.</p>
    <div class="row">
      <h6 class="center-align red-text"><?php echo $error_msg; ?></h6>
      <div class="col s12 l4 push-l4">
        <form action="login.php" method="post">
          <div class="s12 input-field">
            <i class="material-icons prefix theme-color-txt">account_circle</i>
            <input type="email" name="email" id="email" required value="<?php echo $email;?>">
            <label for="email">Email</label>
          </div>
          <br>
          <div class="s12 input-field">
            <i class="material-icons prefix theme-color-txt">lock</i>
            <input type="text" name="trx_id" id="trx_id" required value="<?php echo $trx_id;?>">
            <label for="trx_id">Transaction ID</label>
          </div>
          <div class="center-align input-field">
            <input type="submit" value="login" name="login" id="login" class="btn btn-large btn-flat theme-color-bg white-text">
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
  <!-- LGA.js  -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

