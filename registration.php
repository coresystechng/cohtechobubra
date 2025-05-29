<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $course_of_study = mysqli_real_escape_string($connect, $_POST["course"]);
    $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
    $surname = mysqli_real_escape_string($connect, $_POST["surname"]);
    $other_names = mysqli_real_escape_string($connect, $_POST["other_names"]);
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
    $date_of_birth = mysqli_real_escape_string($connect, $_POST["date_of_birth"]);
    $marital_status = mysqli_real_escape_string($connect, $_POST["marital_status"]);
    $state_of_origin = mysqli_real_escape_string($connect, $_POST["state_of_origin"]);
    $lga = mysqli_real_escape_string($connect, $_POST["lga_of_origin"]);
    $nationality = mysqli_real_escape_string($connect, $_POST["nationality"]);
    $phone_no = mysqli_real_escape_string($connect, $_POST["phone_number"]);
    $email = mysqli_real_escape_string($connect, $_POST["email_address"]);
    $religion = mysqli_real_escape_string($connect, $_POST["religion"]);
    $contact_address = mysqli_real_escape_string($connect, $_POST["contact_address"]);
    $nok_name = mysqli_real_escape_string($connect, $_POST["full_name"]);
    $nok_relationship = mysqli_real_escape_string($connect, $_POST["relationship"]);
    $nok_phone_no = mysqli_real_escape_string($connect, $_POST["nok_phone_no"]);
    $nok_contact_address = mysqli_real_escape_string($connect, $_POST["address"]);
    $nok_occupation = mysqli_real_escape_string($connect, $_POST["occupation"]);
    $attestation_1 = isset($_POST["attestation1"]) ? 1 : 0;
    $attestation_2 = isset($_POST["attestation2"]) ? 1 : 0;
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $verify_password = mysqli_real_escape_string($connect, $_POST["verify_password"]);

    // Image upload logic
    $imageName = $_FILES['passport']['name'];
    $imageTmp = $_FILES['passport']['tmp_name'];
    $imageType = $_FILES['passport']['type'];
    $imageFolder = "img/" . basename($imageName);

    if($password !== $verify_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        if ($imageType == 'image/jpeg' || $imageType == 'image/jpg') {
        // Check if image was uploaded successfully
        if (move_uploaded_file($imageTmp, $imageFolder)) {
            // SQL query to insert student data along with passport image name
            $sql = "INSERT INTO student_tb (
                course_of_study, first_name, surname, other_names, gender, date_of_birth, marital_status, state_of_origin, lga, nationality, phone_no, email, religion, contact_address, nok_name, nok_relationship, nok_phone_no, nok_contact_address, nok_occupation, attestation_1, attestation_2, password, verify_password, passport_image
            ) VALUES (
                '$course_of_study', '$first_name', '$surname', '$other_names', '$gender', '$date_of_birth', '$marital_status', '$state_of_origin', '$lga', '$nationality', '$phone_no', '$email', '$religion', '$contact_address', '$nok_name', '$nok_relationship', '$nok_phone_no', '$nok_contact_address', '$nok_occupation', $attestation_1, $attestation_2, '$password', '$verify_password', '$imageName'
            )";

            if (mysqli_query($connect, $sql)) {
                // Get the Student ID of the newly inserted record
                $student_id = mysqli_insert_id($connect);

                // Generate the mat_no using the full first/last name and a random two-digit number
                $random_no = rand(1000, 9999); // Generate a random four-digit number
                $mat_no = strtoupper('CHTO' . $random_no);

                // Update the database with the mat_no
                $updateSql = "UPDATE student_tb SET mat_no = '$mat_no' WHERE student_id = $student_id";

                if (mysqli_query($connect, $updateSql)) {
                    // Redirect to success.php with mat_no in the URL
                    header("Location: success.php?mat_no=" . urlencode($mat_no));
                    exit();
                } else {
                    echo "Error updating mat_no: " . mysqli_error($connect);
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                }
        } else {
            echo "Failed to upload passport image.";
            }
        } else {
            echo "<script>alert('Please upload only JPG or JPEG files for your passport.');</script>";;
        }
        }
        mysqli_close($connect);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
    <title>Registration - Student Portal - COHTECH Obubra</title>
    <style>
        /* Import Inter Font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        html {
        font-family: 'Inter', sans-serif;
        }

        .underline {
            text-decoration: underline;
        }

        .theme-color-text {
            color: #702963 !important;
        }

        .theme-color-bg {
            background-color: #702963 !important;
        }

        input[type="text"]:focus, input[type="password"]:focus, input[type="tel"]:focus, input[type="email"]:focus, option:focus {
            border-bottom: 1px solid #702963 !important;
            box-shadow: 0 1px 0 0 #702963 !important;
        }

        .dropdown-content li>a,
        .dropdown-content li>span {
            color: #702963;
        }

        [type="checkbox"]:checked+span:not(.lever):before {
            border-right: 2px solid #702963;
            border-bottom: 2px solid #702963;
        }

        .datepicker-date-display {
            background-color: #702963;
        }

        .datepicker-cancel,.datepicker-clear,.datepicker-today,.datepicker-done {
            color: #702963;
        }

        .datepicker-table td.is-selected {
            background-color: #702963;
        }

        .parallax-container {
            height: 600px;
        }

        input[type="file"] {
            text-decoration: none;
            color: #702963;
            cursor: pointer;
        }

    </style>

</head>

<body>
    <header>
        <div class="parallax-container hide-on-med-and-down">
            <div class="parallax">
                <img src="./img/study-group-african-people.jpg" class="responsive-img" alt="Banner Image">
            </div>
        </div>
        <img src="./img/study-group-african-people.jpg" class="responsive-img hide-on-large-only" alt="Banner Image">
    </header>

    <main>
        <div class="section container">
            <h2 class="hide-on-med-and-down theme-color-text">Student Registration Form</h2>
            <h5 class="hide-on-large-only theme-color-text">Student Registration Form</h5>
            <p class="flow-text">Complete the form below to continue the registration process. All fields are required.</p>
            <form action="registration.php" method="post"  enctype="multipart/form-data">
                <section class="section">
                    <h5 class="theme-color-text">Course Details</h5>
                    <div class="row">
                        <div class="col l4 m6 s12 input-field">
                            <select name="course" id="course" required>
                                <option value="" disabled selected>Course Of Study</option>
                                <option value="Community Health">Community Health</option>
                                <option value="Medical Laboratory Technician">Medical Laboratory Technician</option>
                                <option value="Pharmacy Technician">Pharmacy Technician</option>
                                <option value="Environmental Health Technician">Environmental Health Technician</option>
                                <option value="Health Information/Records">Health Information/Records</option>
                                <option value="X-Ray Technician">X-Ray Technician</option>
                                <option value="Public Health">Public Health</option>
                            </select>
                        </div>
                        <div class="col l4 m6 s12 input-field">
                            <label for="password">Password</label>
                            <input id="password" autocomplete="new-password" type="password" name="password" class="" required data-length="8" maxlength="8">
                        </div>
                        <div class="col l4 m6 s12 input-field">
                            <label for="verifyPassword">Verify Password</label>
                            <input id="verifyPassword" type="password" name="verify_password" class="" required data-length="8" maxlength="8">
                            <span class="helper-text" id="password_message"></span>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <h5 class="theme-color-text">Personal Info</h5>
                    <div class="row">
                        <div class="col l3 m6 s12 input-field">
                            <label for="firstName">First Name</label>
                            <input id="firstName" name="first_name" type="text" required>
                        </div>
                        <div class="col l3 m6 s12 input-field">
                            <label for="surname">Surname</label>
                            <input id="surname" name="surname" type="text" required>
                        </div>
                        <div class="col l3 m6 s12 input-field">
                            <label for="otherNames">Other Names</label>
                            <input id="otherNames" name="other_names" type="text" required>
                        </div>
                        <div class="col l3 m6 s12">
                            <label for="passport">Upload Passport</label>
                            <input type="file" name="passport" accept="image/jpeg/, image/jpg" required id="passport"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 m6 s12 input-field">
                            <label for="dateOfBirth">Date of Birth</label>
                            <input id="dateOfBirth" name="date_of_birth" type="text" class="datepicker" required>
                        </div>
                        <div class="col l2 m6 s12 input-field">
                            <select id="gender" name="gender" class="" required>
                                <option value="" disabled selected>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col l2 m6 s12 input-field">
                            <select id="maritalStatus" name="marital_status" class="" required>
                                <option value="" disabled selected>Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Other">I prefer not to say</option>
                            </select>
                        </div>
                        <div class="col l2 m6 s12 input-field">
                            <select id="stateOfOrigin" onchange="toggleLGA(this)" name="state_of_origin" required>
                                <option value="" disabled selected> State of Origin</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="FCT - Abuja">FCT - Abuja</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nasarawa">Nasarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                            </select>
                        </div>
                        <div class="col l2 m6 s12 input-field">
                            <select id="lga" class="select-lga" name="lga_of_origin" required>
                            </select>
                        </div>
                        <div class="col l2 m6 s12 input-field">
                            <label for="nationality">Nationality</label>
                            <input id="nationality" name="nationality" type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l4 m6 s12 input-field">
                            <label for="phoneNumber">Phone Number</label>
                            <input id="phoneNumber" name="phone_number" type="tel" required>
                        </div>
                        <div class="col l5 m6 s12 input-field">
                            <label for="emailAddress">Email Address</label>
                            <input id="emailAddress" name="email_address" type="email" required>
                        </div>
                        <div class="col l3 m6 s12 input-field">
                            <select id="religion" name="religion" required>
                                <option value="" disabled selected>Religion</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Islam">Islam</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l12 m12 s12 input-field">
                            <input id="contactAddress" type="text" name="contact_address" required>
                            <label for="contactAddress">Contact Address</label>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <h5 class="theme-color-text">Next of Kin</h5>
                    <div class="row">
                        <div class="col l6 m6 s12 input-field">
                            <label for="fullName">Full Name</label>
                            <input id="fullName" name="full_name" type="text" required>
                        </div>
                        <div class="col l3 m6 s12 input-field">
                            <label for="relationship">Relationship</label>
                            <input id="relationship" name="relationship" type="text" required>
                        </div>
                        <div class="col l3 m6 s12 input-field">
                            <label for="nokPhoneNumber">Phone number</label>
                            <input id="nokPhoneNumber" name="nok_phone_no" type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l9 m8 s12 input-field">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" required>
                        </div>
                        <div class="col l3 m4 s12 input-field">
                            <label for="occupation">Occupation</label>
                            <input id="occupation" name="occupation" type="text" required>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <h5 class="theme-color-text">Attestation</h5>
                    <div class="row">
                        <div class="col l12 m12 s12 input-field valign-wrapper">
                            <label>
                                <input id="attestation1" name="attestation1" type="checkbox" required />
                                <span>I hereby attest to the authenticity of the above information supplied</span>
                            </label>
                        </div>
                        <br><br><br>
                        <div class="col l12 m12 s12 input-field valign-wrapper">
                            <label>
                                <input id="attestation2" name="attestation2" type="checkbox" required />
                                <span>I agree to comply with the college's regulations upon approval of my registration</span>
                            </label>
                        </div>
                    </div>
                </section>
                <br><br>
                <div class="center-align section">
                    <button type="submit" class="btn btn-large btn-flat theme-color-bg white-text"> Submit Application </button>
                </div>
            </form>
        </div>
    </main>
    <footer class=" page-footer center-align black section">
        <span class="white-text"> 
            © 2025 COHTECH Obubra.
            <a href="./index.html" target="_blank" class="white-text underline">Back To Home<i class="material-icons tiny">call_made</i></a>
        </span>
    </footer>

    <script>
        // Password Check
        document.getElementById('verifyPassword').addEventListener('keyup', function() {
            let password = document.getElementById('password').value;
            let confirmPassword = this.value;
            if (password !== confirmPassword) {
                document.getElementById('password_message').innerText = "Passwords do not match!";
                document.getElementById('password_message').style.color = "red";
            } else {
                document.getElementById('password_message').innerText = "Passwords match!";
                document.getElementById('password_message').style.color = "green";
            }
        });
    </script>
    <script src="lga_load.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
    <script>
        $(document).ready(function() {
            $('.parallax').parallax();
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                yearRange: 50,
                showClearBtn: true,
            });
            $('input#password, input#verifyPassword').characterCounter();
            $('select').formSelect();
        });
    </script>
     
</body>

</html>