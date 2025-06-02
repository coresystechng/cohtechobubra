<?php

require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaction_id'])) {
    $transaction_id = $_POST['transaction_id'];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM registration_tb WHERE transaction_id = ?");
    $stmt->bind_param("s", $transaction_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    // Redirect back to the students page
    header("Location: prospective_students.php");
    exit();
} else {
    // Invalid request
    header("Location: prospective_students.php");
    exit();
}