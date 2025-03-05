<?php
$servername = "localhost";  // Change if your database is hosted remotely
$username = "collins";  // Use your database username
$password = "1234";  // Use your database password
$database = "cohtechobubra_db"; // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM registration_tb WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email is already registered."]);
    } else {
        echo json_encode(["status" => "success", "message" => "Email is available."]);
    }

    $stmt->close();
}

$conn->close();
?>
