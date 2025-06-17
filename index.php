<?php
require 'connect.php';

// Declare blank variables
$email = "";
$first_name = ""; 
$last_name = "";
$error_msg = "";
// Check if the request method is POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM registration_tb WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $error_msg = "Email is already in use. Please check and try again.";
    } else {
      // Save Info to the Prospective Students Table
      $save_query = "INSERT INTO `registration_tb` (`email`, `first_name`, `last_name`) VALUES ('$email', '$first_name', '$last_name')";
      $send_query = mysqli_query($conn, $save_query);

      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['full_name'] = $first_name . ' '. $last_name;

      // Redirect to Payment Page
      header('Location: payment.php');
      
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Start Registration - COHTECH Obubra</title>
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
      height: 400px;
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

    .underline-txt {
    text-decoration: underline !important;
    }

  </style>
</head>
<body>
  <header>
    <div class="parallax-container hide-on-med-and-down">
      <div class="parallax">
        <img src="./img/college-students.jpg" alt="Designed by Freepik" class="responsive-img">
      </div>
    </div>
    <img src="./img/college-students.jpg" alt="Designed by Freepik" class="responsive-img hide-on-large-only">
    <div class="container">
      <h1 class="hide-on-med-and-down">Registration ePortal</h1>
      <h4 class="hide-on-large-only">Registration ePortal</h4>
      <!-- <p class="flow-text grey-text text-darken-2"><strong>Deadline: Sunday, March 30, 2025. </strong></p> -->
      <p class="flow-text grey-text text-darken-2">Qualified candidates are invited to apply for admission into various programs at the College.
        <br> To begin your application, enter your full name and email address below.
      </p>
    </div>
  </header>
  <br>
  <main>
    <section class="section">
      <div class="container">
        <form action="./index.php" id="start-form" method="post">
          <div class="row">
            <div class="col s12 l6 input-field">
              <input type="text" name="email" id="email" required value="<?php echo $email; ?>">
              <label for="email">Email Address</label>
              <span class="helper-text red-text"><?php echo $error_msg; ?></span>
            </div>
            <div class="col s12 l3 input-field">
              <input type="text" name="first_name" id="first_name" required value="<?php echo $first_name; ?>">
              <label for="first_name">First Name</label>
            </div>
            <div class="col s12 l3 input-field">
              <input type="text" name="last_name" id="last_name" required value="<?php echo $last_name; ?>">
              <label for="last_name">last_name</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 input-field center-align">
              <div id="submit-area">
              <input type="submit" value="start application" id="submit-button" class="btn btn-large btn-flat theme-color-bg white-text">
            </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
  <br>
  <footer class="page-footer black center-align">
    <div class="footer-copyright">
      <div class="container">
        <p class="center">
          <span>&COPY; 2025 COHTECH Obubra.</span>
          <a href="https://www.cohtechobubra.edu.ng" target="_blank" class="white-text underline-txt">
            Back to Home
            <i class="material-icons tiny white-text">call_made</i>
          </a>
        </p>
      </div>
    </div>
  </footer>
  
  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.parallax').parallax();
    })
  </script>
</body>
</html>