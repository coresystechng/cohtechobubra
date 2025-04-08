<?php
session_start();

// Get form data
$mat_no = $_POST['mat_no'] ?? '';
$password = $_POST['password'] ?? '';

// Hardcoded login credentials
$correct_mat_no = "sean123";
$correct_password = "1234";

// Check if credentials match
if ($mat_no === $correct_mat_no && $password === $correct_password) {
    // Login success - start session and redirect
    $_SESSION['mat_no'] = $mat_no;
    header("Location: dashboard.php");
    exit;
} else {
    // Login failed - show alert and go back
    echo "<script>alert('Invalid login credentials'); window.location.href='index.html';</script>";
}
?>
