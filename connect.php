<?php

$servername = "localhost";  // Change if your database is hosted remotely
$username = "Lome";  // Use your database username
$password = "oseijoyalome2";  // Use your database password
$database = "cohtechobubra_db"; // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>