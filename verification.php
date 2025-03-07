<?php
  session_start();
  $servername = "localhost";
  $username = "collins";
  $password = "1234";
  $database = "cohtechobubra_db";

  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $email = trim($_GET['email']);
      $error = "";
      $verification_code = "";
    }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $verification_code = trim($_POST['verification_code']);
    $error = "";

    // Get the verification code from the database
    $sql = "SELECT * FROM email_verifications WHERE email = '$email' AND verification_code = '$verification_code'";
    $send_query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($send_query);

    // Check if the verification code is valid
    if($result['verification_code'] == $verification_code) {
      // Redirect to the payment page
      header("Location: payment.php");
    } else {
      // Redirect to the verification page with an error message
      $error = "Verification code is incorrect";
      // header("Location: verification.php?email=$email&error=Verification code is incorrect");
    }
    


  }

  $conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify Your Email - COHTECH Obubra</title>
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

    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  

  </style>
</head>
<body>

  <header>
    <div class="parallax-container hide-on-med-and-down">
      <div class="parallax">
        <img src="./assets/img/17650.jpg" alt="Designed by Freepik" class="responsive-img">
      </div> 
    </div>
    <img src="./assets/img/17650.jpg" alt="Designed by Freepik" class="responsive-img hide-on-large-only">
  </header>
  
  <main>
    <section class="section">
    <div class="container">
      <h1 class="hide-on-med-and-down center-align">Verify Your Email</h1>
      <h3 class="center-align hide-on-large-only">Verify Your Email</h3>
      <div class="center-align">
        <p class="theme-color-txt">A verification code has been sent to your email. Enter the code below to verify your email.</p>
      </div>
      <form action="verification.php" method="post">
        <div class="row">
          <input type="hidden" name="email" value="<?php echo $email; ?>">
          <div class="col s12 l4 push-l4 input-field">
            <input type="text" id="verification_code" name="verification_code" required maxlength="6" pattern="\d{6}">
            <label for="verification_code">Enter Verification Code</label>
            <span id="verify-error" class="red-text"><?php echo $error; ?></span>
          </div>
          <div class="col s12 l4 push-l4 input-field">
            <input type="submit" value="verify" name="verify" class="theme-color-bg btn btn-large btn-flat white-text">
          </div>
        </div>
      </form>
    </div>
    </section>
  </main>

  <footer class="page-footer black center-align">
    <div class="footer-copyright">
      <div class="container">
        <p class="center">
          <span>&COPY; 2025 COHTECH Obubra.</span>
          <a href="https://wwww.cohtechobubra.edu.ng" target="_blank" class="white-text underline-txt">
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