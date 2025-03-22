<?php

include '../connect.php';
session_start();

if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'admin') {
    header('Location: login.php');
    exit();
}else{



    $user_id = $_SESSION['user_id'] ;

    $user_query = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $send_user_query = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($send_user_query);

    $property = '';
    
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Prevent SQL Injection
    
        $select_query = "SELECT * FROM registration_tb WHERE registration_id = ?";
        $stmt = $conn->prepare($select_query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $property = $result->fetch_assoc();
        $stmt->close();
    }
    
    // Logout
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
        exit();
    }

}



// // accept student
// if (isset($_POST['accept'])) {
//     $insert_query = "UPDATE `acceptance_tb` SET `acceptance_status`='Accepted' WHERE registration_id_fk = ?";
//     $stmt = $conn->prepare($insert_query);
//     $stmt->bind_param("i", $id);
//     $stmt->execute();
//     $stmt->close();

//     $_SESSION['message'] = "Student registration has been accepted!";
//     $_SESSION['message_type'] = "success";
//     header("Location: dashboard.php");
//     exit();
// }

// // decline student
// if (isset($_POST['decline'])) {
//     $insert_query = "UPDATE `acceptance_tb` SET `acceptance_status`='Declined' WHERE registration_id_fk = ?";
//     $stmt = $conn->prepare($insert_query);
//     $stmt->bind_param("i", $id);
//     $stmt->execute();
//     $stmt->close();

//     $_SESSION['message'] = "Student registration has been declined!";
//     $_SESSION['message_type'] = "danger";
//     header("Location: dashboard.php");
//     exit();

// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Admin Dashboard - COHTECH Obubra</title>
<meta name="description" content="Official Website of The College of Health Technology, Obubra Cross River State">
<meta name="keywords" content="college health technology obubra science education nigeria school certificate graduate graduation clinic hospital pharmacy medical laboratory">


<!-- Favicons -->
<link href="../assets/img/cohtech-logo.png" rel="icon">
<link href="../assets/img/cohtech-logo.png" rel="apple-touch-icon">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

<!-- Main CSS File -->
<link href="../assets/css/main.css" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    
    /* Sidebar styles */
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        transition: left 0.3s ease; /* Smooth transition */
    }
    .sidebar a {
        color: #702963;
        padding: 12px;
        width: 200px;
        display: block;
        text-decoration: none;
    }
    .btn-logout{
        background-color: #702963;
        color: #fff;
        /* padding: 5px; */
        width: 120px;
        display: block;
        text-decoration: none;
    }

    .btn-container{
        margin-left: 250px;
    }

    .btn-logout:hover {
        background-color: #5a1f4d;
        color: white;
    }
    .active {
        background-color: #702963;
        color: #fff !important;
        border-radius: 10px;
    }
    .active:hover {
        background-color: #702963 !important;
        color: #fff !important;
    }
    .sidebar a:hover {
        background-color: #702963;
        color: #fff;
        border-radius: 10px;
    }
    .brand-logo a{
        color: #702963;
        width: 200px;
        display: block;
        text-decoration: none;
    }
    .brand-logo a:hover{
        background-color: transparent ;
        border-radius: 0 ;
    }
    /* Page content */
    .content {
        margin-left: 250px;
        margin-top: 30px;
        margin-bottom: 40px;
        padding: 20px;
        transition: margin-left 0.3s ease; /* Smooth transition */
    }
    /* Navbar */
    .navbar {
        position: sticky;
        top: 0;
        left: 250px;
        width: calc(100% - 250px);
        z-index: 1000;
        transition: left 0.3s ease, width 0.3s ease; /* Smooth transition */
    }
    .bg-primary{
        background-color: #702963 !important;
    }
    .btn-primary {
        background-color: #702963;
        border: none;
        border-radius: 10px;
        /* padding: 10px 20px; */
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5a1f4d;
    }

    .btn-outline-custom {
        border: 2px solid #702963;
        color: #702963;
        border-radius: 10px;
        padding: 8px 15px;
        transition: all 0.3s ease;
    }

    .btn-outline-custom:hover {
        background-color: #702963;
        color: #fff;
    }

    
    /* Show sidebar when it has the 'active' class */
    .sidebar.active {
        left: 0;
    }

    .profile-dropdown{
        border-radius: 60px !important;
    }

    footer{
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        padding: 10px 0;
    }
    /* Hide sidebar on mobile by default */
    @media (max-width: 768px) {
        .sidebar {
            left: -250px; /* Move sidebar off-screen */
            z-index: 1;
            padding-top: 50px;
        }
        .sidebar:hover{
            background-color: #f8f9fa !important;
        }
        .content {
            margin-left: 0; /* Remove margin for content */
            z-index: 0;
        }
        .navbar {
            left: 0; /* Adjust navbar position */
            width: 100%; /* Full width */
        }
        .message-container{
            margin-left: 0px ;
        }
        .btn-container{
            margin-left: 0px;
        }
    }
</style>

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar bg-light" style="border-right: 1px solid #343a40;">
        <h4 class="text-white text-center bg-light brand-logo"><a href="#" class=""><img src="../assets/img/cohtech-logo-blue.png" width="200px" alt="brand-logo"></a></h4>
        <a href="dashboard.php" class="mx-4 mt-3 mb-2 d-flex align-items-center">
            <i class="bi bi-house-fill"></i> 
            <span class="ms-4">Dashboard</span>
        </a>
        <a href="#" class="active mx-4 mb-2 d-flex align-items-center">
            <i class="bi bi-bar-chart"></i> 
            <span class="ms-4">Registration</span>
        </a>
        <a href="students.php" class="mx-4 mb-2 d-flex align-items-center">
            <i class="bi bi-folder"></i> 
            <span class="ms-4">Students</span>
        </a>
        <a href="#" class="mx-4 mb-2 d-flex align-items-center">
            <i class="bi bi-gear"></i> 
            <span class="ms-4">Settings</span>
        </a>
        <form action="" method="POST">
            <button type="submit" name="logout" class="ms-5 mb-2 d-flex align-items-center btn btn-logout">
                <i class="bi bi-box-arrow-right"></i> 
                <span class="ms-4">Logout</span>
            </button>
        </form>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #343a40;">
        <div class="container-fluid">
            <button class="btn btn-primary d-lg-none" id="toggleSidebar">☰</button>
            <a class="navbar-brand ms-2" href="#"></a>
            <div class="ms-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-custom dropdown-toggle profile-dropdown" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="profile-dropdown"><?= $user['username']; ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li>
                            <a class="dropdown-item" href="#">                 
                                <i class="bi bi-person"></i> 
                                <span class="ms-3">Profile</span>
                            </a>
                        </li>
                        <li>
                            <form action="" method="POST">
                                <button class="dropdown-item" name="logout" type="submit">                 
                                    <i class="bi bi-door-open"></i> 
                                    <span class="ms-3">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container btn-container mt-3">
        <a href="registration.php" class="btn btn-outline-custom">Back To Registration</a>
    </div>
    
    <!-- Content -->
    <div class="content bg-light text-center mt-3">
        <h2 class="pb-3">Applicant <?= $property['registration_id']; ?></h2>
        <?php if ($property): ?>
            <div class="container mt-3 d-flex justify-content-center">
                <div class="card text-center" style="width: 25rem;">
                    <div class="d-flex justify-content-center mt-3">
                        <img src="https://picsum.photos/100" class="rounded-circle" alt="Student Image" width="100" height="100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"  style="font-weight: bold;"><?= htmlspecialchars($property['first_name'] . ' ' . $property['other_names'] ) . ' ' . $property['surname']; ?></h5>
                        <p class="card-text"><strong>ID:</strong> <br> <?= htmlspecialchars($property['transaction_id']); ?></p>
                        <p class="card-text"><strong>Course:</strong> <br> <?= htmlspecialchars($property['course_of_study']); ?></p>
                        <p class="card-text"><strong>Email:</strong> <br> <?= htmlspecialchars($property['email']); ?></p>
                        <p class="card-text"><strong>Gender:</strong> <br> <?= htmlspecialchars($property['gender']); ?></p>
                        <p class="card-text"><strong>Date of birth:</strong> <br> <?= htmlspecialchars($property['date_of_birth']); ?></p>
                        <p class="card-text"><strong>Marital status:</strong> <br> <?= htmlspecialchars($property['marital_status']); ?></p>
                        <p class="card-text"><strong>State of Origin:</strong> <br> <?= htmlspecialchars($property['state_of_origin']); ?></p>
                        <p class="card-text"><strong>LGA:</strong> <br> <?= htmlspecialchars($property['lga']); ?></p>
                        <p class="card-text"><strong>Phone Number:</strong> <br> <?= htmlspecialchars($property['phone_no']); ?></p>
                        <p class="card-text"><strong>Religion:</strong> <br> <?= htmlspecialchars($property['religion']); ?></p>
                        <p class="card-text"><strong>Next of Kin:</strong> <br> <?= htmlspecialchars($property['nok_name']); ?></p>
                        <p class="card-text"><strong>Next of Kin Phone:</strong> <br> <?= htmlspecialchars($property['nok_phone_no']); ?></p>
                        <p class="card-text"><strong>Contact Address:</strong> <br> <?= htmlspecialchars($property['contact_address']); ?></p>
                        <p class="card-text"><strong>Registration Date:</strong> <br> <?= htmlspecialchars($property['date_of_registration']); ?></p>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <!-- <form action="" method="POST" class="mt-3">
            <button type="submit" name="accept" class="btn btn-success me-2">Accept</button>
            <button type="submit" name="decline" class="btn btn-danger ms-2">Decline</button>
        </form> -->
    </div>

    <footer class="footer mt-5" style="border-top: 1px solid #343a40;">
        <div class="d-sm-flex justify-content-center">
            <span class=" text-center text-sm-left d-block d-sm-inline-block">&copy; <span id="copyright-update"></span> COHTECH Obubra. All rights reserved.</span>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="../assets/js/main.js"></script>

    <script>
        copyright_update();
        document.addEventListener('DOMContentLoaded', function () {
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');

            toggleSidebar.addEventListener('click', function () {
                sidebar.classList.toggle('active');
            });
        });
    </script>
</body>

</html>