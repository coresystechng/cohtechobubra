<?php
require 'connect.php';

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
        $stmt= $conn->prepare("SELECT * FROM users_tb WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user_result = $stmt->get_result();
        if ($user_result->num_rows > 0) {
            $s= $conn->prepare("SELECT * FROM users_tb WHERE email = ? AND payment_ref = 0 ");
            $s->bind_param("s", $email);
            $s->execute();
            $user_pending = $s->get_result();


            if ($user_pending->num_rows > 0) {
                echo json_encode(["status" => "pay_pending", "email"=> $email , "message" => "Email is already in use. Please use the button below to complete registration."]);
                exit();
            }else{
                echo json_encode(["status" => "pending", "email"=> $email ,"message" => "Email is already in use. Please use the button below to complete registration."]);
                exit();
            }
            exit();
        }else{
            echo json_encode(["status" => "success", "message" => "Email is available."]);
        }
    }

    $stmt->close();
}

$conn->close();
?>
