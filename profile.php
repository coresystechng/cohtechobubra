<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['mat_no'])) {
    header("Location: index.html");
    exit;
}

$mat_no = $_SESSION['mat_no'];

$sql = "SELECT first_name, surname, mat_no, email, phone_no, contact_address, course_of_study FROM student_tb WHERE mat_no = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $mat_no);
$stmt->execute();
$stmt->bind_result($first_name, $surname, $retrieved_mat_no, $email, $phone_no, $contact_address, $course_of_study);
$stmt->fetch();
$stmt->close();

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link for external css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet" />

    <!-- link for material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- link for favicon -->
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />

    
		<link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />

        <style>
                    /* Import Inter Font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        html {
        font-family: 'Inter', sans-serif;
        }
                    .underline {
				text-decoration: underline;
			}

        </style>
    <title>Profile - Student Portal - COHTECH Obubra</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Student Personal Profile</h4></li>
                    <?php if (isset($first_name) && isset($surname) && isset($retrieved_mat_no)): ?>
                        <li class="collection-item">Full Name: <?php echo htmlspecialchars($first_name . ' ' . $surname); ?></li>
                        <li class="collection-item">Matric Number: <?php echo htmlspecialchars($retrieved_mat_no); ?></li>
                        <li class="collection-item">Email: <?php echo htmlspecialchars($email); ?></li>
                        <li class="collection-item">Phone: <?php echo htmlspecialchars($phone_no); ?></li>
                        <li class="collection-item">Address: <?php echo htmlspecialchars($contact_address); ?></li>
                        <li class="collection-item">Course of Study: <?php echo htmlspecialchars($course_of_study); ?></li>
                    <?php else: ?>
                        <li class="collection-item">Student profile not found.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container center-align mb">
			<span>
				© 2025 COHTECH Obubra. All Rights Reserved.
				<a href="./index.html" target="_blank" class="black-text underline"
					>Back To Home</a
				>
			</span>
		</div>
</body>
</html>