<?php 

  // Connection file
  require 'connect.php';

  //Fetch all rows from registration table
  $query = "SELECT * FROM registration_tb";
  $result = $conn->query($query);
  $students = $result->fetch_all(MYSQLI_ASSOC);
  mysqli_close($conn);

  // print_r($students);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prospective Students - COHTECH Obubra</title>
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
      height: 500px;
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
    
    /* Hide content from print */
    @media print {
      .no-print { /* Hides elements with this class */
        display: none !important;
      }
    }
  </style>
</head>
<body>
  <header>
    <nav class="white theme-color-text">
      <div class="container">
        <a href="https://www.cohtechobubra.edu.ng" class="brand-logo" style="margin-top: 7px;">
          <img src="assets/img/cohtech-logo-blue.png" alt="" class="responsive-img" width="200px">
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="" class="theme-color-txt">Home</a></li>
          <li><a href="" class="theme-color-txt">All Students</a></li>
          <li><a href="" class="theme-color-txt">Departments</a></li>
          <li><a href="" class="btn btn-flat theme-color-bg white-text">Login</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <!-- <div class="parallax-container no-print">
      <div class="parallax">
        <img src="assets/img/88595.jpg" alt="Designed by Freepik" class="responsive-img">
      </div>
    </div> -->
    <section class="section">
      <div class="container section">
        <h1 class="theme-color-txt center-align hide-on-med-and-down">Prospective Students</h1>
        <h4 class="theme-color-txt center-align hide-on-large-only">Prospective Students</h4>
        <br>
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>Transaction ID</th>
              <th>Full Name</th>
              <th>Course</th>
              <th>Email</th>
              <th>Tel. No</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($students as $student){ ?>
              <tr>
                <td><?php echo $student['transaction_id']; ?></td>
                <td><?php echo $student['first_name'] . ' '. $student['surname']; ?></td>
                <td><?php echo $student['course_of_study']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['phone_no']; ?></td>
                <th>
                  <a href="student.php?id=<?php echo $student['transaction_id'];?>" class="btn btn-flat green darken-4 white-text">view <i class="material-icons tiny white-text right">call_made</i></a>
                </th>
              </tr>
            <?php } ?>
          </tbody>
        </table>
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