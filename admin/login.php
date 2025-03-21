<?php

session_start();
include('../connect.php');

$error_username = '';
$error_password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE `username` = ? AND `usertype` = 'admin'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // print_r ($user);
        if (password_verify( $password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usertype'] = $user['usertype'];
            
            if ($_SESSION['usertype'] == 'admin') {
                header('Location: dashboard.php');
                exit();
            }elseif ($_SESSION['usertype'] == 'student') {
                header('Location: ./dashboard.php');
                exit();
            }else{
                header('Location: ./dashboard.php');
                exit();
            }
        } else {
        $error_password= '<p class="ms-2 text-danger">Incorrect Password</p>';
        }
    } else {
        $error_username = '<p class="ms-2 text-danger">Incorrect Username Credentials</p>';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Login - COHTECH Obubra</title>
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
        background-image: url('../assets/img/login-img.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        overflow: hidden;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(112, 41, 99, 0.8), rgba(0, 0, 0, 0.6));
        z-index: -1;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 400px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .login-card h4 {
        color: #702963;
        font-weight: 700;
    }

    .login-card .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .login-card .form-control:focus {
        border-color: #702963;
        box-shadow: 0 0 5px rgba(112, 41, 99, 0.5);
    }

    .login-card .btn-primary {
        background-color: #702963;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .login-card .btn-primary:hover {
        background-color: #5a1f4d;
    }

    .login-card .btn-outline-custom {
        border: 2px solid #702963;
        color: #702963;
        border-radius: 10px;
        padding: 8px 15px;
        transition: all 0.3s ease;
    }

    .login-card .btn-outline-custom:hover {
        background-color: #702963;
        color: #fff;
    }

    .login-card .text-muted {
        color: #6c757d !important;
    }

    .login-card .form-check-label {
        color: #6c757d;
    }

    .login-card .card-footer {
        background: transparent;
        border-top: none;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #preloader{
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        background: rgba(255, 255, 255, 0.8); 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        z-index: 9999;
    }
</style>

</head>

<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="card-header bg-white text-center">
                <img src="../assets/img/cohtech-logo-blue.png" width="300px" alt="COHTECH Logo" class="my-2">
                <h5 class="text-muted pb-3">Login to your account</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5" id="username" name="username" placeholder="Username" required>
                        <i class="bi bi-person position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    </div>
                    <?php echo $error_username; ?>
                    <div class="mb-3"></div>
                    <div class="position-relative">
                        <input type="password" class="form-control ps-5" id="password" name="password" placeholder="Password" required>
                        <i class="bi bi-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    </div>
                    <?php echo $error_password; ?>
                    <div class="mb-3"></div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text-decoration-none">Forgot Password?</a>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                    </div>
                    <!-- <div class="text-center">
                        <p class="text-muted">Or you can Login with:</p>
                        <button type="button" class="btn btn-outline-custom me-2">
                            <img src="../assets/img/google-icon.png" alt="Google" width="20">
                        </button>
                        <button type="button" class="btn btn-outline-custom">
                            <img src="../assets/img/github-icon.png" alt="GitHub" width="20">
                        </button>
                    </div> -->
                </form>
            </div>
            <div class="card-footer bg-white text-center mt-3">
                <small> &copy; <span id="copyright-update"></span> COHTECH Obubra. <strong> <a href="https://cohtechobubra.edu.ng/index.html" target="_blank"> Back to Home </a> </strong> </small>
            </div>
        </div>
    </div>

    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

<!-- Vendor JS Files -->
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Main JS File -->
<script src="../assets/js/main.js"></script>

<script>
    copyright_update();
    window.addEventListener('load', function () {
            document.getElementById("preloader").style.display = "none";
        });
</script>
</body>

</html>