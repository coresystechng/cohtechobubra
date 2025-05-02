<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['mat_no'])) {
    header("Location: success.php");
    exit;
}

$mat_no = $_SESSION['mat_no'];
$sql = "SELECT * FROM student_tb WHERE mat_no = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $mat_no);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo $student['first_name'] . ' ' . $student['surname']?> - Student Dashboard</title>
  <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    /* Import Inter Font from Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    html {
    font-family: 'Inter', sans-serif;
    }
    /* Shift content to the right when sidenav is fixed */
    @media(min-width: 993px) {
      main {
        margin-left: 300px;
      }
    }
    .dashboard-card {
      margin-top: 20px;
    }

    .underline {
      text-decoration: underline;
    }

    .theme-color-text {
      color: #702963 !important;
    }

    .theme-color-bg {
      background-color: #702963 !important;
    }

    .sidenav .active {
    background-color:#eed8ea;
    font-weight: bold;
    border-left: 4px solid #702963;
    }
  </style>
</head>
<body>

  <!-- Top Navbar (Mobile Only) -->
  <nav class="theme-color-bg hide-on-large-only">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center">Dashboard</a>
      <a href="#" data-target="slide-out" class="sidenav-trigger left"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <!-- Fixed Sidenav (Desktop & Mobile) -->
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li><div class="user-view">
      <div class="background theme-color-bg"></div>
      <img class="circle" src="img/<?php echo $student['passport_image'] ?>">
      <span class="white-text name"><?php echo $student['first_name']. ' ' . $student['surname']?> - <?php echo $student['mat_no'] ?></span>
      <span class="white-text email"></span>
      <span class="white-text email"><?php echo $student['email'] ?></span>
    </div></li>
    <li><a id="nav-dashboard" href="#dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li><a id="nav-courses" href="#courses"><i class="material-icons">class</i>Courses</a></li>
    <li><a id="nav-grades" href="#grades"><i class="material-icons">grade</i>Grades</a></li>
    <li><a id="nav-profile" href="#profile"><i class="material-icons">person</i>Profile</a></li>
    <li><a href="logout.php" class="red-text"><i class="material-icons red-text">exit_to_app</i>Logout</a></li>
  </ul>

  <!-- Main Content -->
  <main>
    <!-- Dasboard Content -->
    <section id="dashboard" class="section container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue lighten-4 z-depth-0">
            <div class="card-content">
              <span class="card-title">Recent Activities</span>
              <p>You submitted Assignment 3 for Web Dev.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card green lighten-4 z-depth-0">
            <div class="card-content">
              <span class="card-title">Upcoming Deadlines</span>
              <p>Project Report due in 3 days.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Courses Content -->
    <section id="courses" class="section container">
      <div class="card z-depth-0">
        <div class="card-content">
          <span class="card-title">My Courses</span>
          <ul class="collection">
            <li class="collection-item avatar">
              <i class="material-icons circle blue">code</i>
              <span class="title">Web Development</span>
              <p>Instructor: Dr. Smith <br> Status: Ongoing</p>
              <a href="#!" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle green">calculate</i>
              <span class="title">Mathematics 101</span>
              <p>Instructor: Prof. Johnson <br> Status: Completed</p>
              <a href="#!" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle orange">history_edu</i>
              <span class="title">History of Ideas</span>
              <p>Instructor: Dr. Kim <br> Status: Ongoing</p>
              <a href="#!" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Grades Content -->
    <section id="grades" class="section container">
      <div class="card z-depth-0">
        <div class="card-content">
          <span class="card-title">Grades Overview</span>
          <table class="highlight responsive-table">
            <thead>
              <tr>
                <th>Course</th>
                <th>Assignment</th>
                <th>Score</th>
                <th>Feedback</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Web Development</td>
                <td>Assignment 3</td>
                <td>92%</td>
                <td>Great job!</td>
              </tr>
              <tr>
                <td>Mathematics 101</td>
                <td>Final Exam</td>
                <td>88%</td>
                <td>Well done</td>
              </tr>
              <tr>
                <td>History of Ideas</td>
                <td>Essay 1</td>
                <td>75%</td>
                <td>Needs more citations</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- Profile Content -->
    <section id="profile" class="section container">
      <div class="card z-depth-0">
        <div class="card-content">
          <span class="card-title">My Profile</span>
          <div class="row">
            <!-- Profile Image -->
            <!-- <div class="col s12 m4 center-align">
              <img src="https://via.placeholder.com/150" alt="Profile Picture" class="circle responsive-img z-depth-1">
              <br>
              <a href="#!" class="btn-flat blue-text text-darken-2">Change Photo</a>
            </div> -->

            <!-- Profile Details -->
            <div class="col s12 m12">
              <ul class="collection">
                <li class="collection-item">
                  <strong>Full Name:</strong> <?php echo $student['first_name']. ' ' . $student['surname']?>
                </li>
                <li class="collection-item">
                  <strong>Student ID:</strong> <?php echo $student['mat_no'] ?>
                </li>
                <li class="collection-item">
                  <strong>Course:</strong> <?php echo $student['course_of_study'] ?>
                </li>
                <li class="collection-item">
                  <strong>Email:</strong> <?php echo $student['email'] ?>
                </li>
                <li class="collection-item">
                  <strong>Phone Number:</strong> <?php echo $student['phone_no'] ?>
                </li>
              </ul>
              <a href="#!" class="btn btn-flat blue darken-4 white-text">
                <i class="material-icons left">edit</i>Edit Profile
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    // Init sidenav for mobile
    document.addEventListener('DOMContentLoaded', function () {
      M.Sidenav.init(document.querySelectorAll('.sidenav'));
      
      M.Sidenav.init(document.querySelectorAll('.sidenav'));

      // Basic tab-like behavior
      const links = document.querySelectorAll('.sidenav a');
      const sections = document.querySelectorAll('section');

      links.forEach(link => {
        link.addEventListener('click', e => {
          const targetId = link.getAttribute('href').replace('#', '');

          // Hide all sections
          sections.forEach(sec => sec.style.display = 'none');

          // Show target section if it exists
          const target = document.getElementById(targetId);
          if (target) target.style.display = 'block';

          // Remove .active from all links
          links.forEach(l => l.classList.remove('active'));

        // Add .active to the clicked link
        link.classList.add('active');

        });
      });

      // Show only dashboard on load
      sections.forEach(sec => sec.style.display = 'none');
      document.getElementById('dashboard').style.display = 'block';
      document.querySelector('#nav-dashboard').classList.add('active');

    });
  </script>
</body>
</html>
