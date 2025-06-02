<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './connect.php';

// Get matric number from URL
if (!isset($_GET['mat_no']) || empty($_GET['mat_no'])) {
    echo "<script>alert('No student selected.');window.location='view_students.php';</script>";
    exit();
}

$mat_no = mysqli_real_escape_string($connect, $_GET['mat_no']);
$sql = "SELECT * FROM student_tb WHERE mat_no = '$mat_no' LIMIT 1";
$result = mysqli_query($connect, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Student not found.');window.location='view_students.php';</script>";
    exit();
}

$student = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details - COHTECH Obubra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
        html { font-family: 'Inter', sans-serif; }
        .theme-color-text { color: #702963 !important; }
        .theme-color-bg { background-color: #702963 !important; }
        .passport-img { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 3px solid #702963; }
        .info-label { font-weight: bold; color: #702963; }
        .card-panel { border-radius: 12px; }
        .underline-txt { text-decoration: underline; }
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
            <li><a href="/" class="theme-color-text">Home</a></li>
            <li><a href="view_students.php" class="theme-color-text">All Students</a></li>
            <li><a href="" class="theme-color-text">Departments</a></li>
            <li><a href="" class="btn btn-flat theme-color-bg white-text">Login</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
        <div class="container section">
            <!-- <h4 class="theme-color-text center-align">Student Details</h4> -->
            <div class="row">
                  <div class="col s12 m10 l8 offset-m1 l8 offset-l2">
                    <div class="card-panel z-depth-1">
                      <div class="center-align">
                        <?php if (!empty($student['passport_image'])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($student['passport_image']); ?>" class="passport-img" alt="Passport">
                        <?php else: ?>
                            <span class="material-icons" style="font-size:120px;color:#702963;">person</span>
                        <?php endif; ?>
                        <h5 class="theme-color-text" style="margin-top: 10px; font-weight: bold"><?php echo htmlspecialchars($student['surname'] . ' ' . $student['first_name'] . ' ' . $student['other_names']); ?>
                        </h5>
                        <div class="chip theme-color-bg white-text" style="font-weight: bold">
                          <span><?php echo htmlspecialchars($student['mat_no']); ?></span>
                        </div>
                        
                      </div>
                      <br>
                        <div class="divider"></div>
                        <h6 class="theme-color-text">Personal Information</h6>
                        <div class="row">
                            <div class="col s12 m6">
                                <p><span class="info-label">Gender:</span> <?php echo htmlspecialchars($student['gender']); ?></p>
                                <p><span class="info-label">Date of Birth:</span> <?php echo htmlspecialchars($student['date_of_birth']); ?></p>
                                <p><span class="info-label">Marital Status:</span> <?php echo htmlspecialchars($student['marital_status']); ?></p>
                                <p><span class="info-label">State of Origin:</span> <?php echo htmlspecialchars($student['state_of_origin']); ?></p>
                                <p><span class="info-label">LGA:</span> <?php echo htmlspecialchars($student['lga']); ?></p>
                                <p><span class="info-label">Nationality:</span> <?php echo htmlspecialchars($student['nationality']); ?></p>
                            </div>
                            <div class="col s12 m6">
                                <p><span class="info-label">Phone:</span> <?php echo htmlspecialchars($student['phone_no']); ?></p>
                                <p><span class="info-label">Email:</span> <?php echo htmlspecialchars($student['email']); ?></p>
                                <p><span class="info-label">Religion:</span> <?php echo htmlspecialchars($student['religion']); ?></p>
                                <p><span class="info-label">Contact Address:</span> <?php echo htmlspecialchars($student['contact_address']); ?></p>
                            </div>
                        </div>
                        <br>
                        <div class="divider"></div>
                        <h6 class="theme-color-text">Next of Kin</h6>
                        <div class="row">
                            <div class="col s12 m6">
                                <p><span class="info-label">Name:</span> <?php echo htmlspecialchars($student['nok_name']); ?></p>
                                <p><span class="info-label">Relationship:</span> <?php echo htmlspecialchars($student['nok_relationship']); ?></p>
                                <p><span class="info-label">Phone:</span> <?php echo htmlspecialchars($student['nok_phone_no']); ?></p>
                            </div>
                            <div class="col s12 m6">
                                <p><span class="info-label">Address:</span> <?php echo htmlspecialchars($student['nok_contact_address']); ?></p>
                                <p><span class="info-label">Occupation:</span> <?php echo htmlspecialchars($student['nok_occupation']); ?></p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <h6 class="theme-color-text">Course Information</h6>
                        <div class="row">
                            <div class="col s12 m6">
                              <p><span class="info-label">Course:</span> <?php echo htmlspecialchars($student['course_of_study']); ?></p>
                              <p><span class="info-label">Payment Status:</span> PENDING</p>
                            </div>
                            <div class="col s12 m6">
                                
                            </div>
                        </div>
                        <div class="center-align" style="margin-top: 24px;">
                          <button class="btn btn-large btn-flat theme-color-bg white-text" onclick="printStudentDetails()">
                            <i class="material-icons left">print</i>Print
                          </button>
                        </div>
                        <script>
                        function printStudentDetails() {
                          window.print();
                        }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="center-align">
          <a href="view_students.php" class="btn btn-flat btn-large theme-color-bg white-text">
              <i class="material-icons left">arrow_back</i>Back to Students
          </a>
        </div> -->
        <br><br>
    </main>
    <footer class="page-footer black center-align">
        <span class="white-text">
            &copy; 2025 COHTECH Obubra.
            <a href="./index.html" target="_blank" class="white-text underline-txt">Back To Home<i class="material-icons tiny">call_made</i></a>
        </span>
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