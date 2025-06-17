<?php
require 'connect.php';

// Declare blank variables
$email = "";
$first_name = ""; 
$last_name = "";
$error_msg = "";
// Check if the request method is POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM registration_tb WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

      $error_msg = "Email is already in use. Please check and try again.";

    } else {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['full_name'] = $first_name . ' '. $last_name;

        // Redirect to Payment Page
        header('Location: payment.php');
        
    }

    $stmt->close();
}

$conn->close();
?>
