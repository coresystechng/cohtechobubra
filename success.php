<?php 
require 'connect.php';

// Get the transaction reference from the URL
if(isset($_GET['trxref'])){
  session_start();
  $email = $_SESSION['email'];
  $full_name = $_SESSION['full_name'];
  $trx_id = strtoupper($_GET['trxref']);
  $_SESSION['trx_id'] = $trx_id;
} else {
  header("Location: index.php");
}

//Update Users Table with the transaction reference and payment timestamp
$stmt = $conn->prepare("UPDATE registration_tb SET transaction_id=?, date_of_payment=NOW() WHERE email=?");
$stmt->bind_param("ss", $trx_id, $email);
$stmt->execute();
$stmt->close();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Send Payment Confirmation to email
    include 'send_payment_success.php';
  header('Location: registration_form.php');
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Success - Registration | COHTECH Obubra</title>
  <link rel="shortcut icon" href="./img/cohtech-logo.png" type="image/x-icon">
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

    .copied {
        background: green !important;
    }

    /* Parallax height */
    .parallax-container {
      height: 400px;
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
        <img src="./img/payment-done.jpg" alt="Designed by Freepik" class="responsive-img">
      </div>
    </div>
    <img src="./img/payment-done.jpg" alt="Designed by Freepik" class="responsive-img hide-on-large-only">
  </header>
  <main>
    <section class="section container">
      <h1 class="center-align hide-on-med-and-down">Payment Completed</h1>
      <h4 class="center-align hide-on-large-only">Payment Completed</h4>
      <div class="row">
        <div class="col s12 l6">
          <h6 class="right-align hide-on-med-and-down">Your Transaction ID is: </h6>
          <h6 class="hide-on-large-only">Your Transaction ID is: </h6>
        </div>
        <div class="col s8 l2">
          <input type="text" id="copyText" value="<?php echo $trx_id; ?>" readonly>
        </div>
        <div class="col s4 l4">
          <button class="btn btn-flat theme-color-bg white-text copy-btn" onclick="copyToClipboard()">Copy</button>
        </div>
      </div>
    </section>
    <section class="center-align">
      <div class="container">
        <p class="center-align">Click on the button below to continue your registration.</p>
        <br>
        <form action="success.php" method="post">
          <input type="submit" name="submit" value="continue registration" class="btn btn-large btn-flat theme-color-bg white-text">
        </form>
      </div>
    </section>
    <br><br>
  </main>
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
</body>

  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
  <!-- LGA.js  -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.parallax').parallax();
      $('.datepicker').datepicker({yearRange: 50});
      $('select').formSelect({
        
      });
    })
  </script>
  <script>
      function copyToClipboard() {
          var copyText = document.getElementById("copyText");

          // Select the text field
          copyText.select();
          copyText.setSelectionRange(0, 99999); // For mobile devices

          // Copy the text inside the text field
          document.execCommand("copy");

          // Change button text briefly
          var btn = document.querySelector(".copy-btn");
          btn.innerText = "Copied!";
          btn.classList.remove("theme-color-bg");
          btn.classList.add("green");
          
          setTimeout(() => {
            btn.innerText = "Copy";
            btn.classList.remove("green");
            btn.classList.add("theme-color-bg");
          }, 2000);
      }
  </script>

</html>