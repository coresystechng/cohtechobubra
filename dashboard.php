<?php
session_start();
include 'connect.php';

// Auto logout after 5 minutes of inactivity
$timeout_duration = 300;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Update activity timestamp
$_SESSION['last_activity'] = time(); 

// Check if user is logged in
if (!isset($_SESSION['mat_no'])) {
    header("Location: login.php");
    exit;
}

// Fetch student details from the database
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

    .bold-text {
      font-weight: bold !important;
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

    .sidenav {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidenav-footer {
      margin-top: auto;
      padding: 15px;
      text-align: center;
      font-size: 0.85rem;
      color: #ccc;
    }

    .footer-content span {
      color: #aaa;
    }

    /* Dark Mode Styles */
    body.dark-mode,
    .dark-mode main,
    .dark-mode .sidenav,
    .dark-mode .card,
    .dark-mode .card-content,
    .dark-mode .collection,
    .dark-mode .collection-item,
    .dark-mode nav,
    .dark-mode .sidenav-footer,
    .dark-mode .footer-content {
      background-color: #181824 !important;
      color: #e0e0e0 !important;
    }
    .dark-mode .theme-color-bg {
      background-color: #2d1933 !important;
    }
    .dark-mode .theme-color-text {
      color: #e0aaff !important;
    }
    .dark-mode .card,
    .dark-mode .card-content,
    .dark-mode .collection-item {
      border-color: #333 !important;
    }
    .dark-mode .sidenav .active {
      background-color: #2d1933 !important;
      border-left: 4px solid #e0aaff;
    }
    .dark-mode .btn,
    .dark-mode .btn-flat {
      background-color: #2d1933 !important;
      color: #e0aaff !important;
    }
    .dark-mode .material-icons {
      color: #e0aaff !important;
    }
    .dark-mode table.highlight > tbody > tr {
      background-color: #232336 !important;
    }
    .dark-mode input, .dark-mode textarea, .dark-mode select {
      background-color: #232336 !important;
      color: #e0e0e0 !important;
    }
    .dark-mode .sidenav-footer,
    .dark-mode .footer-content span {
      color: #888 !important;
    }
    .dark-mode .card-title {
      color: #e0aaff !important;
    }
  </style>
</head>
<body>

  <!-- Top Navbar (Mobile Only) -->
  <nav class="theme-color-bg hide-on-large-only">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center">
        <img src="img/cohtech-logo-white.png" alt="" class="responsive-img" style="width: 150px; height: auto;">
      </a>
      <a href="#" data-target="slide-out" class="sidenav-trigger left"><i class="material-icons">menu</i></a>
      <!-- Dark Mode Toggle Button (Mobile) -->
      <a href="#!" id="dark-mode-toggle-mobile" class="right" style="margin-right: 10px;">
        <i class="material-icons" id="dark-mode-icon-mobile">dark_mode</i>
      </a>
    </div>
  </nav>

  <!-- Fixed Sidenav (Desktop & Mobile) -->
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
      <div class="user-view">
        <div class="background theme-color-bg"></div>
        <img class="circle" src="uploads/<?php echo $student['passport_image'] ?>" style="border: #eee 2px solid;">
        <span class="white-text name"><?php echo $student['first_name']. ' ' . $student['surname']?></span>
        <span class="white-text email"><?php echo $student['mat_no'] ?></span>
      </div>
    </li>
    <!-- Dark Mode Toggle Button (Desktop) -->
    <li>
      <a href="#!" id="dark-mode-toggle" class="center-align theme-color-text" style="color: #702963;">
      <i class="material-icons" id="dark-mode-icon" style="color: #702963;">dark_mode</i>
      <!-- <span id="dark-mode-label" style="color: #702963;">Dark Mode</span> -->
      </a>
    </li>
    <style>
      /* Ensure dark mode toggle text/icon is visible in dark mode */
      .dark-mode #dark-mode-toggle,
      .dark-mode #dark-mode-toggle .material-icons,
      .dark-mode #dark-mode-label {
      color: #e0aaff !important;
      }
    </style>
    <!-- Side Nav Links -->
    <li><a class="link theme-color-text" id="nav-dashboard" href="#dashboard"><i class="material-icons theme-color-text">dashboard</i><span class="nav-text">Dashboard</span></a></li>
    <li><a class="link theme-color-text" id="nav-courses" href="#courses"><i class="material-icons theme-color-text">class</i><span class="nav-text">Courses</span></a></li>
    <li><a class="link theme-color-text" id="nav-assignments" href="#assignments"><i class="material-icons theme-color-text">library_books</i><span class="nav-text">Assignments</span></a></li>
    <li><a class="link theme-color-text" id="nav-results" href="#results"><i class="material-icons theme-color-text">grade</i><span class="nav-text">Results</span></a></li>
    <li><a class="link theme-color-text" id="nav-payments" href="#payments"><i class="material-icons theme-color-text">monetization_on</i><span class="nav-text">Payments</span></a></li>
    <li><a class="link theme-color-text" id="nav-profile" href="#profile"><i class="material-icons theme-color-text">person</i><span class="nav-text">Profile</span></a></li>
    <li><a class="link theme-color-text" href="logout.php"><i class="material-icons red-text">exit_to_app</i><span class="nav-text">Logout</span></a></li>
    <style>
      /* Ensure dark mode applies to sidenav text and icons */
      .dark-mode .sidenav .link,
      .dark-mode .sidenav .link .nav-text,
      .dark-mode .sidenav .material-icons {
      color: #e0aaff !important;
      }
      .dark-mode .sidenav .link .material-icons.red-text {
      color: #ff5252 !important;
      }
    </style>

    <li class="sidenav-footer">
    <div class="footer-content">
      <small>&copy; <?php echo date('Y'); ?> COHTECH Obubra.
      Built By <a href="https://coresystech.ng" class="theme-color-text underline">CORE-TECH</a></small>
    </div>
</li>

  </ul>

  <!-- Main Content -->
  <main>
    <!-- Dasboard Content -->
    <section id="dashboard" class="section container">
      <div class="section container">
        <h5 class="theme-color-text center-align">Welcome, <?php echo $student['first_name']. ' ' . $student['surname']?></h5>
      </div>
      <div class="row">
        <div class="col s12 m6 l4">
          <div class="card z-depth-1 hoverable">
            <div class="card-image">
              <img src="img/courses.jpg" alt="courses" class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title">My Courses</span>
              <p>View all your registered courses</p>
            </div>
            <div class="card-action">
              <a href="#courses" class="theme-color-text valign-wrapper bold-text link">
                <span>VIEW COURSES</span>
                <i class="material-icons" style="margin-left: 3px;">arrow_forward</i>
              </a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-1 hoverable">
            <div class="card-image">
              <img src="img/assignments.jpg" alt="courses" class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title">My Assignments</span>
              <p>Check on your assignments.</p>
            </div>
            <div class="card-action">
            <a href="#assignments" class="theme-color-text valign-wrapper bold-text link">
                <span>VIEW ASSIGNMENTS</span>
                <i class="material-icons" style="margin-left: 3px;">arrow_forward</i>
              </a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-1 hoverable">
            <div class="card-image">
              <img src="img/payments.jpg" alt="courses" class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title">My Payments</span>
              <p>View cleared and pending payments </p>
            </div>
            <div class="card-action">
            <a href="#payments" class="theme-color-text valign-wrapper bold-text link">
                <span>VIEW PAYMENTS</span>
                <i class="material-icons" style="margin-left: 3px;">arrow_forward</i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6 l4">
          <div class="card z-depth-1 hoverable">
            <div class="card-image">
              <img src="img/results.jpg" alt="Image by freepik" class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title">My Results</span>
              <p>View your semester results</p>
            </div>
            <div class="card-action">
              <a href="#results" class="theme-color-text valign-wrapper bold-text link">
                <span>VIEW RESULTS</span>
                <i class="material-icons" style="margin-left: 3px;">arrow_forward</i>
              </a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-1 hoverable">
            <div class="card-image">
              <img src="img/profile.jpg" alt="courses" class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title">My Profile</span>
              <p>View and Manage Your Profile</p>
            </div>
            <div class="card-action">
            <a href="#profile" class="theme-color-text valign-wrapper bold-text link">
                <span>VIEW PROFILE</span>
                <i class="material-icons" style="margin-left: 3px;">arrow_forward</i>
              </a>
            </div>
          </div>
        </div>
        <!-- <div class="col s12 m6 l4">
          <div class="card z-depth-1 hoverable">
            <div class="card-image">
              <img src="img/payments.jpg" alt="courses" class="responsive-img">
            </div>
            <div class="card-content">
              <span class="card-title">My Payments</span>
              <p>View cleared and pending payments </p>
            </div>
            <div class="card-action">
            <a href="" class="theme-color-text valign-wrapper bold-text">
                <span>VIEW PAYMENTS</span>
                <i class="material-icons" style="margin-left: 3px;">arrow_forward</i>
              </a>
            </div>
          </div>
        </div> -->
      </div>
      <br><br>
      <div class="row">
        <h5 class="theme-color-text">Activity Log</h5>
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
    <!-- Assignments Content -->
    <section id="assignments" class="section container">
      <span class="theme-color-text card-title">My Assignments</span>
    </section>
    <!-- Results Content -->
    <section id="results" class="section container">
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
    <!-- Payments Content -->
    <section id="payments" class="section container">
      <span class="theme-color-text card-title">Payments</span>
    </section>
    <!-- Profile Content -->
    <section id="profile" class="section container">
      <div class="card z-depth-0">
        <div class="card-content">
          <span class="card-title">My Profile</span>
          <div class="row">
            <!-- Profile Details -->
            <div class="col s12 m12">
              <ul class="collection">
                <li class="collection-item center-align">
                  <img 
                    src="uploads/<?php echo $student['passport_image'] ?>"
                    alt="<?php echo $student['first_name']. ' ' . $student['surname']?>"
                    class="circle"
                    style="width: 150px; height: 150px; border: #702963 2px solid;"
                  >
                </li>
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
              <a href="#!" class="btn btn-flat blue theme-color-bg white-text">
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
      const links = document.querySelectorAll('a.link');
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

      // Dark Mode Toggle Logic
      const body = document.body;
      const darkModeToggle = document.getElementById('dark-mode-toggle');
      const darkModeToggleMobile = document.getElementById('dark-mode-toggle-mobile');
      const darkModeIcon = document.getElementById('dark-mode-icon');
      const darkModeIconMobile = document.getElementById('dark-mode-icon-mobile');
      const darkModeLabel = document.getElementById('dark-mode-label');

      // Set dark mode from localStorage
      if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        if (darkModeIcon) darkModeIcon.textContent = 'light_mode';
        if (darkModeIconMobile) darkModeIconMobile.textContent = 'light_mode';
        if (darkModeLabel) darkModeLabel.textContent = 'Light Mode';
      }

      function toggleDarkMode() {
        body.classList.toggle('dark-mode');
        const enabled = body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', enabled ? 'enabled' : 'disabled');
        if (darkModeIcon) darkModeIcon.textContent = enabled ? 'light_mode' : 'dark_mode';
        if (darkModeIconMobile) darkModeIconMobile.textContent = enabled ? 'light_mode' : 'dark_mode';
        if (darkModeLabel) darkModeLabel.textContent = enabled ? 'Light Mode' : 'Dark Mode';
      }

      if (darkModeToggle) {
        darkModeToggle.addEventListener('click', toggleDarkMode);
      }
      if (darkModeToggleMobile) {
        darkModeToggleMobile.addEventListener('click', toggleDarkMode);
      }
    });
  </script>
</body>
</html>
