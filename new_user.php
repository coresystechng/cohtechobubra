<?php 

    include 'connect.php';
    // include 'working_mail_send.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $first_name = trim($_POST['first_name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);

        //Save data to database
        $stmt = $conn->prepare("INSERT INTO users_tb (first_name, surname, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $first_name, $surname, $email);
        $stmt->execute();

        // Start a session and store the email in the session
        session_start();
        $_SESSION['email'] = $email;

        // Generate a 6-digit random code
        $verification_code = rand(100000, 999999);
        $_SESSION['verification_code'] = $verification_code;
        
        // Set expiration time (current time + 5 minutes)
        // $expires_at = date("Y-m-d H:i:s", strtotime("+5 minutes"));

        // Insert or update the verification code in the database
        $stmt = $conn->prepare("UPDATE users_tb SET verification_code=? WHERE email=?");
        $stmt->bind_param("ss", $verification_code, $email);
        $stmt->execute();
        
        // Redirect to Code verification page
        $fullname = $first_name . " " . $surname;
        $_SESSION['fullname'] = $fullname;

        include 'php_mailer.php';

        $stmt->close();
    }

    $conn->close();
?>