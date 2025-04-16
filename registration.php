<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $transaction_id = mysqli_real_escape_string($connect, $_POST["transaction_id"]);
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

    // SQL query
    $sql = "INSERT INTO student_tb (transaction_id, course_of_study, first_name, surname, other_names, gender, date_of_birth, marital_status, state_of_origin, lga, nationality, phone_no, email, religion, contact_address, nok_name, nok_relationship, nok_phone_no, nok_contact_address, nok_occupation, attestation_1, attestation_2) VALUES ('$transaction_id', '$course_of_study', '$first_name', '$surname', '$other_names', '$gender', '$date_of_birth', '$marital_status', '$state_of_origin', '$lga', '$nationality', '$phone_no', '$email', '$religion', '$contact_address', '$nok_name', '$nok_relationship', '$nok_phone_no', '$nok_contact_address', '$nok_occupation', $attestation_1, $attestation_2)";

    if (mysqli_query($connect, $sql)) {
        header("Location: dashboard.php");
            exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
<!-- end of php code -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Compiled and minified CSS -->
    <link
		href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css"
		rel="stylesheet"
		/>

    <!-- links for material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- for favicon -->
    <link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />

    <title>Registration - Student Portal - COHTECH Obubra</title>
    <style>
        .underline{
            text-decoration: underline;
        }

        label, .capitalize{
            text-transform: capitalize !important;
        }

        .theme-color-text {
			color: #702963 !important;
		}

		.theme-color-bg {
			background-color: #702963 !important;
		}

        h5{
            margin-top: 40px;
        }

        span{
            text-transform: none;
        }
        
		input[type="text"]:focus,
		input[type="password"]:focus,
        input[type="tel"]:focus,
        input[type="email"]:focus,
        option:focus
        {
			border-bottom: 1px solid #702963 !important;
			box-shadow: 0 1px 0 0 #702963 !important;
		}

        .dropdown-content li > a, .dropdown-content li > span {
            color: #702963;
        }

        [type="checkbox"]:checked + span:not(.lever):before {
            border-right: 2px solid #702963;
            border-bottom: 2px solid #702963;
        }

        .datepicker-date-display {
            background-color: #702963;
        }

        .datepicker-cancel, .datepicker-clear, .datepicker-today, .datepicker-done {
            color: #702963;
        }

        footer {
            height: 10vh !important;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 4vh ;
            margin-bottom: -2vh !important;
        }

        img{
            background-position: top center !important;
        }

        .mt-3{
            margin: 10vh 0 0 0 ;
        }
    </style>

</head>
<body>
    
    <header>
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="./img/random 1.jpg">
                </li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Registration Form</h2>
            <p>Dear Applicant</p>
            <p>Complete the form below to continue the registration process. All the input fields are required</p>
            <form action="./registration.php" method="post">
                <section>
                    <h5>Course Details</h5>
                    <div class="row">
                        <div class="col l4 m6 s12">
                            <div class="input-field">
                                <label for="transactionId">transaction id</label>
                                <input id="transactionId" type="text" name="transaction_id" class="" required>
                            </div>
                        </div>
                        <div class="col l4 m6 s12">
                            <div class="input-field">
                                <select name="course" id="course" class="" required>
                                    <option value="" disabled selected>Course Of Study</option>
                                    <option class="theme-color-text" value="performing arts">performing arts</option>
                                    <option class="theme-color-text" value="economics">economics</option>
                                    <option class="theme-color-text" value="chemistry">chemistry</option>
                                </select>
                            </div>
                        </div>
                        <div class="col l4 m6 s12">
                            <p>kindly visit our <a href="" class="purple-text underline">Course Page</a> to get more information about the courses we offer</p>
                        </div>
                    </div>
                </section>
                <section>
                    <h5>Personal Info</h5>
                    <div class="row">
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="firstName">first name</label>
                                <input id="firstName" name="first_name" type="text" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="surname">surname</label>
                                <input id="surname" name="surname" type="text" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="otherNames">other names </label>
                                <input id="otherNames" name="other_names" type="text" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <select id="gender" name="gender" class="" required>
                                    <option class="
                                    theme-color-text" value="" disabled selected>Gender</option>
                                    <option class="
                                    theme-color-text" value="Male" >Male</option>
                                    <option class="
                                    theme-color-text" value="Female" >Female</option>
                                    <option class="
                                    theme-color-text" value="Prefer not to say" >Prefer not to say</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 m6 s12 ">
                            <div class="input-field">
                                <label for="dateOfBirth">date of birth</label>
                                <input id="dateOfBirth" name="date_of_birth" type="text" class="datepicker" required>
                            </div>
                        </div>
                        <div class="col l2 m6 s12">
                            <div class="input-field">
                                <select id="maritalStatus" name="marital_status" class="" required>
                                    <option value="" disabled selected>Marital Status</option>
                                    <option class="theme-color-text" value="Single">Single</option>
                                    <option class="theme-color-text" value="Married">Married</option>
                                    <option class="theme-color-text" value="Divorced">Divorced</option>
                                    <option class="theme-color-text" value="Widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col l2 m6 s12">
                            <div class="input-field">
                                <select  id="stateOfOrigin" name="state_of_origin" required>
                                    <option class="theme-color-text" value="" disabled selected> State of Origin</option>
                                    <option class="theme-color-text" value="Abia">Abia</option>
                                    <option class="theme-color-text" value="Adamawa">Adamawa</option>
                                    <option class="theme-color-text" value="Akwa Ibom">Akwa Ibom</option>
                                    <option class="theme-color-text" value="Anambra">Anambra</option>
                                    <option class="theme-color-text" value="Bauchi">Bauchi</option>
                                    <option class="theme-color-text" value="Bayelsa">Bayelsa</option>
                                    <option class="theme-color-text" value="Benue">Benue</option>
                                    <option class="theme-color-text" value="Borno">Borno</option>
                                    <option class="theme-color-text" value="Cross River">Cross River</option>
                                    <option class="theme-color-text" value="Delta">Delta</option>
                                    <option class="theme-color-text" value="Ebonyi">Ebonyi</option>
                                    <option class="theme-color-text" value="Edo">Edo</option>
                                    <option class="theme-color-text" value="Ekiti">Ekiti</option>
                                    <option class="theme-color-text" value="Enugu">Enugu</option>
                                    <option class="theme-color-text" value="FCT - Abuja">FCT - Abuja</option>
                                    <option class="theme-color-text" value="Gombe">Gombe</option>
                                    <option class="theme-color-text" value="Imo">Imo</option>
                                    <option class="theme-color-text" value="Jigawa">Jigawa</option>
                                    <option class="theme-color-text" value="Kaduna">Kaduna</option>
                                    <option class="theme-color-text" value="Kano">Kano</option>
                                    <option class="theme-color-text" value="Katsina">Katsina</option>
                                    <option class="theme-color-text" value="Kebbi">Kebbi</option>
                                    <option class="theme-color-text" value="Kogi">Kogi</option>
                                    <option class="theme-color-text" value="Kwara">Kwara</option>
                                    <option class="theme-color-text" value="Lagos">Lagos</option>
                                    <option class="theme-color-text" value="Nasarawa">Nasarawa</option>
                                    <option class="theme-color-text" value="Niger">Niger</option>
                                    <option class="theme-color-text" value="Ogun">Ogun</option>
                                    <option class="theme-color-text" value="Ondo">Ondo</option>
                                    <option class="theme-color-text" value="Osun">Osun</option>
                                    <option class="theme-color-text" value="Oyo">Oyo</option>
                                    <option class="theme-color-text" value="Plateau">Plateau</option>
                                    <option class="theme-color-text" value="Rivers">Rivers</option>
                                    <option class="theme-color-text" value="Sokoto">Sokoto</option>
                                    <option class="theme-color-text" value="Taraba">Taraba</option>
                                    <option class="theme-color-text" value="Yobe">Yobe</option>
                                    <option class="theme-color-text" value="Zamfara">Zamfara</option>
                                </select>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="lgaOfOrigin">LGA of origin</label>
                                <input id="lgaOfOrigin" name="lga_of_origin" type="text" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="nationality">nationality</label>
                                <input id="nationality" name="nationality" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l4 m6 s12">
                            <div class="input-field">
                                <label for="phoneNumber">phone number</label>
                                <input id="phoneNumber" name="phone_number" type="tel" required>
                            </div>
                        </div>
                        <div class="col l5 m6 s12">
                            <div class="input-field">
                                <label for="emailAddress">email address</label>
                                <input id="emailAddress" name="email_address" type="email" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <select id="religion"  name="religion" class="" required>
                                    <option class="theme-color-text" value="" disabled selected>Religion</option>
                                    <option class="theme-color-text" value="Christianity" >Christianity</option>
                                    <option class="theme-color-text" value="Islam" >Islam</option>
                                    <option class="theme-color-text" value="Traditional African Religion" >Traditional African Religion</option>
                                    <option class="theme-color-text" value="Other" >Other</option>
                                    <option class="theme-color-text" value="Prefer not to say" >Prefer not to say</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="input-field">
                                <input id="contactAddress" type="text" name="contact_address" required>
                                <label for="contactAddress">Contact Address</label>
                            </div>
                        </div>
                    </div>
                    <h5>Next of Kin</h5>
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <div class="input-field">
                                <label for="fullName">full name</label>
                                <input id="fullName" name="full_name" type="text" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="relationship">relationship</label>
                                <input id="relationship" name="relationship" type="text" required>
                            </div>
                        </div>
                        <div class="col l3 m6 s12">
                            <div class="input-field">
                                <label for="phoneNumber">phone number</label>
                                <input id="phoneNumber" name="nok_phone_no" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l10 m8 s12">
                            <div class="input-field">
                                <label for="address">address</label>
                                <input id="address" name="address" type="text" required>
                            </div>
                        </div>
                        <div class="col l2 m4 s12">
                            <div class="input-field">
                                <label for="occupation">occupation</label>
                                <input id="occupation" name="occupation" type="text" required>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <h5>Attestation</h5>
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="input-field">
                                <label>
                                    <input id="attestation1" name="attestation1" type="checkbox" required/>
                                    <span>I hereby attest to the authenticity of the above information supplied</span>
                                </label>
                            </div>
                        </div><br>
                    </div>    
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="input-field">
                                <label>
                                    <input id="attestation2" name="attestation2" type="checkbox" required/>
                                    <span>I agree to comply with the college's regulations upon approval of my registration</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </section>   
                <div class="center-align mt-3">
                    <button
				    type="submit"
				    class="btn btn-large btn-flat theme-color-bg white-text">
                    submit application
			        </button>
                </div> 
            </form>
            
        </div>
    </main>
    <footer class="center-align black" >
        <span class="white-text">
            © 2025 COHTECH Obubra.
            <a href="./index.html" target="_blank" class="white-text underline">Back To Home<i class="material-icons tiny"
			>call_made</i
			></a>
        </span>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);

            var datepickers = document.querySelectorAll('.datepicker');
            var datepickerInstances = M.Datepicker.init(datepickers);

            var sliderElems = document.querySelectorAll('.slider');
            var sliderOptions = {
                height: 700,
                indicators: false,
            };
            var sliderInstances = M.Slider.init(sliderElems, sliderOptions);
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
</body>
</html> 