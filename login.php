<?php
session_start();
require_once 'connect.php';

$mat_no = $_POST['mat_no'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $connect->prepare("SELECT * FROM student_tb WHERE mat_no = ? AND password = ?"); 
$stmt->bind_param("ss", $mat_no, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // if credentials is validated
    $_SESSION['mat_no'] = $mat_no;
    header("Location: dashboard.php");
    exit;
} else {
    // else it is not validated
    echo "<script>alert('Invalid credentials'); window.location.href = 'index.html?error=invalid&mat_no=" . urlencode($mat_no) . "';</script>";
    exit;
}


$stmt->close();
$connect->close();
?>