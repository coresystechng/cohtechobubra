<?php
// Retrieve mat_no from the URL
$mat_no = isset($_GET['mat_no']) ? $_GET['mat_no'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <!-- link for external css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet" />

    <!-- link for material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- link for favicon -->
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
    <style>
        .container {
            margin-top: 50px;
        }

        
        .btn {
            background-color: #702963;
        }

        .btn-large:hover{
            background-color:rgba(112, 41, 99, 0.92);
        }
    </style>
</head>

<body>
    <div class="container center-align">
        <?php if ($mat_no): ?>
            <h2 class="">Registration Successful!</h2>
            <p class="">Your Matriculation Number is: <b><?php echo htmlspecialchars($mat_no); ?></b></p>
            <p class="">Please proceed to the login page to access your portal.</p>
            <div class="">
                <a href="login.php?mat_no=<?php echo urlencode($mat_no); ?>" class="btn btn-large btn-flat theme-color-text white-text">proceed to Login</a>
            </div>

        <?php else: ?>
            <h2 class="center red-text">Error!</h2>
            <p class="center red-text">Matriculation number not found. Please contact the administrator.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
</body>

</html>