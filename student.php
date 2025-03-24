<?php 
require 'connect.php';
$student_id = "";

//Get the student_id from the URL
if(isset($_GET['id'])){
    $student_id = $_GET['id'];

    //Get the student details from the database using the student_id;
    $sql = $conn->prepare("SELECT * FROM registration_tb WHERE transaction_id = ?");
    $sql->bind_param("i", $student_id);
    $sql->execute();
    $result = $sql->get_result();
    $student = $result->fetch_assoc();
    $sql->close();

    //Convert the date_of_registration to a more readable format
    $student['date_of_registration'] = date('l, F j, Y', strtotime($student['date_of_registration']));

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $student['first_name'] . ' ' . $student['surname']; ?> - COHTECH Obubra</title>
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

    .bold-text {
      font-weight: bold !important;
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
    <nav class="white z-depth-0">
      <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo left" style="margin-top: 8px;">
          <img src="assets/img/cohtech-logo-blue.png" alt="COHTECH Logo" width="200">
        </a>
        <ul class="right">
          <li><a class="right theme-color-txt">Student Registration Form <b>#<?php echo $student['transaction_id'];?></b></a></li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <section class="section">
    <div class="section container">
      <h1><?php echo $student['first_name'] . ' ' . $student['surname']; ?></h1>
      <div class="chip" style="background-color:#702963;">
        <b class="white-text"><?php echo $student['transaction_id'];?></b>
      </div>
      <br><br>
      <div class="grey lighten-5">
        <div class="row">
          <div class="col s12 m4">
            <p><b>Date of Registration: </b> <?php echo $student['date_of_registration']; ?></p>
            <p><b>First Name:</b> <?php echo $student['first_name']; ?></p>
            <p><b>Surname:</b> <?php echo $student['surname']; ?></p>
            <p><b>Gender:</b> <?php echo $student['gender']; ?></p>
            <p><b>Date of Birth:</b> <?php echo $student['date_of_birth']; ?></p>
          </div>
          <div class="col s12 m4">
            <p><b>Marital Status:</b> <?php echo $student['marital_status']; ?></p>
            <p><b>Nationality:</b> <?php echo $student['nationality']; ?></p>
            <p><b>State of Origin:</b> <?php echo $student['state_of_origin']; ?></p>
            <p><b>LGA:</b> <?php echo $student['lga']; ?></p>
            <p><b>Religion</b> <?php echo $student['religion']; ?></p>
          </div>
          <div class="col s12 m4">
            <p><b>Address:</b> <?php echo $student['contact_address']; ?></p>
            <p><b>Email:</b> <?php echo $student['email']; ?></p>
            <p><b>Tel. No:</b> <?php echo $student['phone_no']; ?></p>
            <p><b>Next of Kin: </b> <?php echo $student['nok_name']; ?></p>
            <p><b>Contact: </b> <?php echo $student['nok_phone_no']; ?></p>
          </div>
        </div>
      </div>
      <div class="container section center-align">
        <a href="" class="btn btn-large btn-flat theme-color-bg white-text" onclick="printPage()">
          Print
          <i class="material-icons white-text right">print</i>
        </a>
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
      $('.chips').chips();
    })
  </script>
  <script>
    function printPage() {
    window.print(); // Opens the print dialog box
    }
  </script>
</body>
</html>