<?php 
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txt = trim($_POST['payment_ref']);
    $email = trim($_POST['email_ref']);
    $error = "";

    $stmt = $conn->prepare("SELECT * FROM users_tb WHERE email = ? AND payment_ref = ?");
    $stmt->bind_param("ss", $email, $txt);
    $stmt->execute();
 
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $fullname = $row['first_name'] . " " . $row['surname'];
        $email = $row['email'];
        $txt_ref = strtoupper($row['payment_ref']);

        $stmt->close();

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['txt_ref'] = $txt_ref;
        $_SESSION['fullname'] = $fullname;

        header("Location: registration_form.php");
        exit();
    } else {
        ?>
        <script>
            alert('Incorrect Details');
            // window.location.href = 'index.html';
        </script>
        <?php
    }
}
?>