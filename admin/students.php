<?php

include '../connect.php';
session_start();

if ($_SESSION['user_id'] && $_SESSION['usertype'] == 'admin') {
    
    if (isset($_POST['logout'])) {
        session_destroy(); 
        header('Location: login.php'); 
    }

    $select_query = "SELECT * FROM `registration_tb`";
    $send_select_query = mysqli_query($conn, $select_query);
    $properties = mysqli_fetch_all($send_select_query, MYSQLI_ASSOC);

    $user_id = $_SESSION['user_id'] ;

    $user_query = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $send_user_query = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($send_user_query);
    
}else {  
    header('Location: login.php');
}



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
        padding: 20px;
        transition: margin-left 0.3s ease; /* Smooth transition */
        margin-top: 30px;
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

    /* Hide sidebar on mobile by default */
    
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
    /* Message Container */
    .message-container{
        margin-left: 250px;
    }

    @media (max-width: 768px) {
        .sidebar {
            left: -250px; /* Move sidebar off-screen */
            padding-top: 50px;
        }
        .sidebar:hover{
            background-color: #f8f9fa !important;
        }
        .content {
            margin-left: 0; /* Remove margin for content */
        }
        .navbar {
            left: 0; /* Adjust navbar position */
            width: 100%; /* Full width */
        }
        .message-container{
            margin-left: 0px ;
        }
    }
</style>

</head>
<body>

    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar bg-light" style="border-right: 1px solid #ddd;">
        <h4 class="text-white text-center bg-light brand-logo"><a href="#" class=""><img src="../assets/img/cohtech-logo-blue.png" width="200px" alt="brand-logo"></a></h4>
        <a href="dashboard.php" class="mx-4 mt-3 mb-2 d-flex align-items-center">
            <i class="bi bi-house-fill"></i> 
            <span class="ms-4">Dashboard</span>
        </a>
        <a href="registration.php" class="mx-4 mb-2 d-flex align-items-center">
            <i class="bi bi-bar-chart"></i> 
            <span class="ms-4">Registration</span>
        </a>
        <a href="#" class="active mx-4 mb-2 d-flex align-items-center">
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
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #ddd;">
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

    <div class="message-container">
    <!-- Alert Messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); // Clear message after displaying ?>
    <?php endif; ?>
    </div>

    <!-- Content -->
    <div class="content bg-light text-center mt-5">
        <h3>Student Records</h3>
    </div>

    <footer class="footer" style="border-top: 1px solid #ddd;">
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