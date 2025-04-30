<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['mat_no'])) {
    header("Location: success.php");
    exit;
}

$mat_no = $_SESSION['mat_no'];
$sql = "SELECT first_name, surname, mat_no, email, phone_no, contact_address, course_of_study FROM student_tb WHERE mat_no = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $mat_no);
$stmt->execute();
$stmt->bind_result($first_name, $surname, $retrieved_mat_no, $email, $phone_no, $contact_address, $course_of_study);
$stmt->fetch();
$stmt->close();

$connect->close();
?>
<!-- end of php code -->



<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Student Portal - COHTECH Obubra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
    <style>
        /* Import Inter Font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        html {
        font-family: 'Inter', sans-serif;
        }
        
        .page-header {
            background-color: #f0f0f0;
            height: 10vh;
            display: flex;
            align-items: center;
        }

        .sidebar {
            width: 18vw !important;
            height: 80vh;
            background-color: #e0e0e0;
            padding: 20px;
            margin-bottom: -20px;
        }

        .content {
            padding: 20px;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            margin-bottom: 10px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60vw;
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

        footer {
            height: 10vh !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dropdown-trigger {
            position: relative;
        }

        .dropdown-content {
            position: absolute;
            top: -3vw;
        }

        .pushing {
            margin-left: 45px;
        }

        .vertical-tabs-container {
            display: flex;
        }

        .tabs-vertical {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 200px;
        }

        .tabs-vertical .tab {
            width: 100%;
        }

        .tabs-vertical .tab a {
            text-align: left;
            padding: 10px 20px;
            display: block;
            color: black; 
        }

        .tabs-vertical .tab a.active {
            color: #702963 !important; 
        }

        .content-area {
            flex-grow: 1;
            padding: 20px;
        }

        .tab-content {
            display: none;
            height: 20px !important;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>

<body>
    <header class="page-header">
        <div class="">
            <div class="header-content">
                <div class="pushing">
                    <img src="/img/study-group-african-people.jpg" alt="" width="120px" class="responsive-img" />
                </div>
                <a href="./profile.php " class="dropdown-trigger" data-target="dropdown1">
                    <i class="fa-solid fa-user fa-xl theme-color-text"></i>
                    <i class="material-icons theme-color-text">arrow_drop_down</i>
                </a>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="./profile.php" class="theme-color-text">profile</a></li>
                    <li><a href="./logout.php" class="red-text">logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="row">
        <aside class="col s12 m4 l3 sidebar">
            <ul class="sidebar-nav tabs-vertical">
                <div class="container">
                    <li class="tab">
                        <a href="#dashboard" class="black-text active">
                            <i class="fa-solid fa-chart-column"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#courses" class="black-text">
                            <i class="fa-solid fa-book"></i>
                            Courses
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#payment" class="black-text">
                            <i class="fa-solid fa-money-bill"></i>
                            Payment
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#result" class="black-text">
                            <i class="fa-solid fa-circle-check lg"></i>
                            Result
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#profile" class="black-text">
                            <i class="fa-solid fa-user"></i>
                            profile
                        </a>
                    </li>
                    <div class="vertical-tabs-container">

                    </div>
                    <br />
                    <div class="container">
                        <a href="./logout.php" class="theme-color-bg btn">logout</a>
                    </div>
                </div>
            </ul>
        </aside>

        <main class="col s12 m8 l9 content">
            <div class="container">
                <div class="content-area">
                    <div id="dashboard" class="tab-content active">Dashboard content</div>
                    <div id="courses" class="tab-content">Courses content</div>
                    <div id="payment" class="tab-content">Payment content</div>
                    <div id="result" class="tab-content">Result content</div>
                    <div id="profile" class="tab-content">
                        <div class="">
                            <div class="row">
                                <div class="col s12 m8 offset-m2">
                                    <ul class="collection with-header">
                                        <li class="collection-header">
                                            <h4>Student Personal Profile</h4>
                                        </li>
                                        <?php if (isset($first_name) && isset($surname) && isset($retrieved_mat_no)): ?>
                                            <li class="collection-item">Full Name: <?php echo htmlspecialchars($first_name . ' ' . $surname); ?></li>
                                            <li class="collection-item">Matric Number: <?php echo htmlspecialchars($retrieved_mat_no); ?></li>
                                            <li class="collection-item">Email: <?php echo htmlspecialchars($email); ?></li>
                                            <li class="collection-item">Phone: <?php echo htmlspecialchars($phone_no); ?></li>
                                            <li class="collection-item">Address: <?php echo htmlspecialchars($contact_address); ?></li>
                                            <li class="collection-item">Course of Study: <?php echo htmlspecialchars($course_of_study); ?></li>
                                        <?php else: ?>
                                            <li class="collection-item">Student profile not found.</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="center-align black">
        <span class="white-text">
            © 2025 COHTECH Obubra. All Rights Reserved.
            <a href="./index.html" target="_blank" class="white-text underline">Back To Home</a>
        </span>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-trigger').dropdown();
            $('.tabs-vertical .tab a').click(function(e) {
                e.preventDefault();

                $('.tabs-vertical .tab a, .tab-content').removeClass('active');

                $(this).addClass('active');
                $($(this).attr('href')).addClass('active');
            });

            $('.tabs-vertical .tab a.active').click();
        });
    </script>
</body>

</html>