<?php 

    include 'connect.php';
    // include 'working_mail_send.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['continue'])){
                $email = trim($_POST['con_email']);
                $sql = $conn->prepare("SELECT * FROM users_tb WHERE email = ?");
                $sql->bind_param("s", $email);
                $sql->execute();
                $result = $sql->get_result();
                $row = $result->fetch_assoc();
                $first_name = $row['first_name'];
                $surname = $row['surname'];
                $sql = "DELETE FROM users_tb WHERE email = '$email'";
                $conn->query($sql);
                
        }else{

        $first_name = trim($_POST['first_name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        }

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

        include 'send_email_verify.php';
        // $fullname = $first_name . " " . $surname;
        // sendmail($fullname,$email,$verification_code);
        header("Location: verification.php?email=$email");

        $stmt->close();
        
    }

    $conn->close();
?>