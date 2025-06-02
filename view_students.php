<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './connect.php';

$sql = "SELECT mat_no, first_name, surname, other_names, course_of_study, gender, date_of_birth, phone_no, email, passport_image FROM student_tb ORDER BY student_id DESC";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students - COHTECH Obubra</title>
    <meta http-equiv="X-UA-Compatible" content="IE=70">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="View registered students at COHTECH Obubra.">
    <meta name="keywords" content="COHTECH, Obubra, students, registration, view students">
    <meta name="author" content="Collins Okoroafor">
    <meta name="theme-color" content="#702963">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Registered Students - COHTECH Obubra">
    <meta property="og:description" content="View registered students at COHTECH Obubra.">
    <meta property="og:image" content="https://www.cohtechobubra.edu.ng/img/cohtech-logo.png">
    <meta property="og:url" content="https://www.cohtechobubra.edu.ng/view_students.php">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="COHTECH Obubra">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Registered Students - COHTECH Obubra">
    <meta name="twitter:description" content="View registered students at COHTECH Obubra.">
    <meta name="twitter:image" content="https://www.cohtechobubra.edu.ng/img/cohtech-logo.png">
    <meta name="twitter:site" content="@cohtechobubra">
    <meta name="twitter:creator" content="@clnsdzy">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
        html {
          font-family: 'Inter', sans-serif; 
        }

        .theme-color-text { 
          color: #702963 !important; 
        }

        .theme-color-bg { 
          background-color: #702963 !important; 
        }

        .underline-txt { 
          text-decoration: underline; 
        }

        .border-btn {
          border: 1px solid #702963 !important; 
        }

        .border-btn:hover {
          border: 0px solid #702963 !important;
          background-color: #702963 !important;
          color: white !important; 
        }

        table.striped > tbody > tr:nth-child(odd) { 
          background-color: #f3eaf1; 
        }

        th, td {
          font-size: 1rem; 
        }

        .passport-img { 
          width: 50px; height: 50px; object-fit: cover; border-radius: 50%; 
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
      <nav class="white theme-color-text z-depth-0">
        <div class="container">
          <a href="/" class="brand-logo" style="margin-top: 7px;">
            <img src="img/cohtech-logo-full.png" alt="" class="responsive-img" width="200px">
          </a>
          <ul class="right hide-on-med-and-down">
            <li><a href="" class="theme-color-text">Home</a></li>
            <li><a href="/view_students.php" class="theme-color-text">All Students</a></li>
            <li><a href="" class="theme-color-text">Departments</a></li>
            <li><a href="" class="btn btn-flat theme-color-bg white-text">Login</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
        <div class="container section">
            <h1 class="theme-color-text center-align hide-on-med-and-down">Registered Students</h1>
            <h4 class="theme-color-text center-align hide-on-large-only">Registered Students</h4>
            <a href="registration.php" class="btn btn-flat theme-text-color border-btn right" style="margin-bottom:20px;">
                <i class="material-icons left">person_add</i>New
            </a>
            <table class="striped">
                <thead class="black-text">
                    <tr>
                        <th class="hide-on-small-and-down">Passport</th>
                        <th>Matric No</th>
                        <th class="hide-on-small-and-down">Full Name</th>
                        <th>Course</th>
                        <th class="hide-on-small-and-down">Phone</th>
                        <th class="hide-on-small-and-down">Email</th>
                        <th class="center-align">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                  <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <?php 
                    
                          //Courses offered by the school
                          if($row['course_of_study'] == 'Bsc. in Public Health'){
                              $row['course_of_study'] = 'PHEALTH';
                          }elseif($row['course_of_study'] == 'Community Health Extension Worker'){
                              $row['course_of_study'] = 'CHEW';
                          }elseif($row['course_of_study'] == 'Junior Community Health Extension Worker'){
                              $row['course_of_study'] = 'JCHEW';
                          }elseif($row['course_of_study'] == 'Environmental Health Extension Worker'){
                              $row['course_of_study'] = 'ENVR';
                          }elseif($row['course_of_study'] == 'Medical Laboratory Technician'){
                              $row['course_of_study'] = 'MEDLAB';
                          }elseif($row['course_of_study'] == 'Pharmacy Technician'){
                              $row['course_of_study'] = 'PHARM';
                          }elseif($row['course_of_study'] == 'X-Ray Technician'){
                              $row['course_of_study'] = 'XRAY';
                          }elseif($row['course_of_study'] == 'Health Information & Management Technician'){
                              $row['course_of_study'] = 'HIMT';
                          }

                    ?>
                    <tr>
                      <td class="hide-on-small-and-down">
                        <?php if (!empty($row['passport_image'])): ?>
                          <img src="uploads/<?php echo htmlspecialchars($row['passport_image']); ?>" class="passport-img" alt="Passport">
                        <?php else: ?>
                          <span class="material-icons">person</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="view_student.php?mat_no=<?php echo urlencode($row['mat_no']); ?>" title="View Details" class="theme-color-text underline-txt">
                          <?php echo htmlspecialchars($row['mat_no']); ?>
                          <i class="material-icons tiny theme-text-color">call_made</i>
                        </a>
                      </td>
                      <td class="hide-on-small-and-down">
                        <?php echo htmlspecialchars($row['surname'] . ' ' . $row['first_name'] . ' ' . $row['other_names']); ?>
                      </td>
                      <td><?php echo htmlspecialchars($row['course_of_study']); ?></td>
                      <td class="hide-on-small-and-down"><?php echo htmlspecialchars($row['phone_no']); ?></td>
                      <td class="hide-on-small-and-down"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="center-align">
                        <a href="view_student.php?mat_no=<?php echo urlencode($row['mat_no']); ?>" class="btn btn-flat btn-small green darken-4 white-text hide-on-small-only">
                          View
                          <i class="material-icons tiny white-text right">call_made</i>
                        </a>
                        <form action="delete_student.php" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this row?');">
                          <input type="hidden" name="mat_no" value="<?php echo htmlspecialchars($row['mat_no']); ?>">
                          <button type="submit" class="btn btn-flat btn-small red darken-2 white-text">
                            Delete
                            <i class="material-icons tiny white-text right">delete</i>
                          </button>
                        </form>
                        </td>
                    </tr>
                  <?php endwhile; ?>
                <?php else: ?>
                  <tr><td colspan="8" class="center-align">No students registered yet.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.parallax');
            M.Parallax.init(elems);
        });
    </script>
</body>
</html>
<?php mysqli_close($connect); ?>