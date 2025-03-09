<?php 
session_start();
require 'connect.php';
// Get the transaction reference from the URL
if(isset($_GET['trxref'])){
  $trx_id = strtoupper($_GET['trxref']);
  $_SESSION['trx_id'] = $trx_id;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Success - Registration | COHTECH Obubra</title>
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

    .copied {
        background: green !important;
    }

  </style>
</head>
<body>
  <section class="section container">
    <div class="container section">
      <h1 class="center-align">Payment Completed</h1>
      <div class="row section valign-wrapper">
        <div class="col s6">
          <h6 class="right-align">Your Transaction ID is: </h6>
        </div>
        <div class="col s2">
          <input type="text" id="copyText" value="<?php echo $trx_id; ?>" readonly>
        </div>
        <div class="col s4">
          <button class="btn btn-flat theme-color-bg white-text copy-btn" onclick="copyToClipboard()">Copy</button>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section class="center-align">
    <div class="container">
    <p class="center-align">Click on the button below to continue your registration.</p>
    <div class="center-align">
      <a href="./registration_form.php?reg_id=<?php echo $trx_id; ?>" class="btn btn-large btn-flat theme-color-bg white-text">CONTINUE REGISTRATION</a>
    </div>
  </section>
</body>

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