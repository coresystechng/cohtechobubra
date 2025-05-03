<?php
// Include the database connection file
require_once 'connect.php';

$error_msg = "";
// Get the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mat_no = $_POST['mat_no'];
    $password = $_POST['password'];
    // Write the SQL query to check if the user exists
    $stmt = $connect->prepare("SELECT * FROM student_tb WHERE mat_no = ? AND password = ?");
    $stmt->bind_param("ss", $mat_no, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if the user exists
    if ($result->num_rows === 1) {
        session_start();
        // if credentials is validated
        $_SESSION['mat_no'] = $mat_no;
        header("Location: dashboard.php");
        exit;
    } else {
        // else it is not validated
        $error_msg = "Invalid Matriculation Number or Password";
    }

    // Close the statement and connection
    $stmt->close();
    $connect->close();
}

// Retrieve mat_no from the URL (if any)
$prefilled_mat_no = isset($_GET['mat_no']) ? $_GET['mat_no'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
    <title>Login - Student Portal - COHTECH Obubra</title>
    <style>
        /* Import Inter Font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        html {
        font-family: 'Inter', sans-serif;
        }
        
        .theme-color-text {
            color: #702963 !important;
        }

        .theme-color-bg {
            background-color: #702963 !important;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-bottom: 1px solid #702963 !important;
            box-shadow: 0 1px 0 0 #702963 !important;
        }

        .underline {
            text-decoration: underline;
        }

        /* icon prefix focus color */
        .input-field .prefix.active {
            color: #702963 !important;
        }

        body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>

<body>
    <main class="section">
        <div class="section container">
            <section class="section">
                <div class="container section">
                    <div class="center-align">
                        <img width="200vw" src="./img/cohtech-logo-full.png" alt="" class="responsive-img" />
                    </div>
                    <div class="row section">
                        <div class="col l2 m4 hide-on-med-and-down"></div>
                        <div class="col l8 m4 s12">
                            <br>
                            <p class="red-text center-align">
                                <?php echo $error_msg ?>
                            </p>
                            <form action="login.php" method="post" class="container">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" id="mat_no" name="mat_no"
                                        placeholder="Enter Matriculation Number" autocomplete="off" required
                                        value="<?php echo htmlspecialchars($prefilled_mat_no); ?>" />
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input type="password" name="password" id="password" placeholder="Enter Password"
                                        autocomplete="new-password" required data-length="8" maxlength="8" />
                                </div>
                                <br>
                                <div class="center-align">
                                    <button type="submit" class="btn btn-large btn-flat theme-color-bg white-text">
                                        Login
                                    </button>
                                    <br><br><br>
                                    <span>New Student? <a class="theme-color-text underline"
                                            href="registration.php">Start Your Registration. </a></span>
                                </div>
                            </form>
                        </div>
                        <div class="col l2 m4 s12 hide-on-med-and-down"></div>
                    </div>
                </div>
            </section>

        </div>
    </main>
    <footer>
        <div class="section container center-align">
            <span>
                © 2025 COHTECH Obubra. All Rights Reserved. <br class="hide-on-large-only">
                <a href="https://cohtechobubra.edu.ng" target="_blank" class="theme-color-text underline">
                    Back To Home
                    <i class="material-icons tiny theme-color-text">call_made</i>
                </a>
            </span>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
</body>

</html>