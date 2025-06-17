<?php 

  require 'connect.php';
  //start a session
  session_start();
  //Redirect users to index page if they try to access landing page
  if(!$_SESSION["trx_id"]){
      header('Location: index.php');
    }
  
  $email = $_SESSION["email"];
  $first_name = $_SESSION["first_name"];
  $last_name = $_SESSION["last_name"];
  $trx_id = $_SESSION["trx_id"];
  $full_name = $first_name . " " . $last_name;
  
  //Set Blank variables
  $transaction_id=$course_of_study=$other_names=$gender=$date_of_birth=$marital_status=$state_of_origin=$lga=$nationality=$phone_no=$religion=$contact_address=$nok_name=$nok_relationship=$nok_phone_no=$nok_contact_address=$nok_occupation=$attestation_1=$attestation_2="";

  if(isset($_POST['submit'])){
      $transaction_id = $_POST['transaction_id'];
      $course_of_study = $_POST['course_of_study'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $other_names = $_POST['other_names'];
      $gender = $_POST['gender'];
      $date_of_birth = $_POST['date_of_birth'];
      $marital_status = $_POST['marital_status'];
      $state_of_origin = $_POST['state_of_origin'];
      $lga = $_POST['lga'];
      $nationality = $_POST['nationality'];
      $phone_no = $_POST['phone_no'];
      $email = $_POST['email'];
      $religion = $_POST['religion'];
      $contact_address = $_POST['contact_address'];
      $nok_name = $_POST['nok_name'];
      $nok_relationship = $_POST['nok_relationship'];
      $nok_phone_no = $_POST['nok_phone_no'];
      $nok_contact_address = $_POST['nok_contact_address'];
      $nok_occupation = $_POST['nok_occupation'];
      $attestation_1 = $_POST['attestation_1'];
      $attestation_2 = $_POST['attestation_2'];

      // UPDATE Query
      $update_query = "UPDATE `registration_tb` SET 
        `transaction_id`='$transaction_id',
        `course_of_study`='$course_of_study',
        `first_name`='$first_name',
        `last_name`='$last_name',
        `other_names`='$other_names',
        `gender`='$gender',
        `date_of_birth`='$date_of_birth',
        `marital_status`='$marital_status',
        `state_of_origin`='$state_of_origin',
        `lga`='$lga',
        `nationality`='$nationality',
        `phone_no`='$phone_no',
        `religion`='$religion',
        `contact_address`='$contact_address',
        `nok_name`='$nok_name',
        `nok_relationship`='$nok_relationship',
        `nok_phone_no`='$nok_phone_no',
        `nok_contact_address`='$nok_contact_address',
        `nok_occupation`='$nok_occupation',
        `attestation_1`='$attestation_1',
        `attestation_2`='$attestation_2'
        WHERE `email`='$email'";

      $send_query = mysqli_query($conn, $update_query);

      if($send_query){
        // Send email to user
        include 'send_registration_success.php';
        header('location:save.php');
      };
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form - COHTECH Obubra</title>
  <link rel="shortcut icon" href="./img/cohtech-logo.png" type="image/x-icon">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    /* Import Inter Font from Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    html {
      font-family: 'Inter', sans-serif;
    }

    /* Parallax height */
    .parallax-container {
      height: 600px;
    }

    /* label focus color */
    .input-field input:focus + label, textarea:focus + label {
      color: #702963 !important;
    }

    /* label underline focus color */
    .input-field input:focus, textarea:focus {
      border-bottom: 1px solid #702963 !important;
      box-shadow: 0 1px 0 0 #702963 !important;
    }

    /* Dropdown text color */
    .dropdown-content li>a,.dropdown-content li > span {
      color: #702963 !important; 
    }

    .theme-color-txt {
      color: #702963 !important;
    }

    .theme-color-bg {
      background-color: #702963 !important;
    }

    .bold-text {
      font-weight: bold !important;
    }

    .underline-txt {
      text-decoration: underline !important;
    }

    /* Change the header background color */
    .datepicker-date-display {
    background-color: #702963 !important; /* Change to desired color */
    }

    /* Change the selected day background color */
    .datepicker-table td.is-selected {
    background-color: #702963 !important;
    color: white !important;
    }
    /* Change today button color */
    .datepicker-table  td.is-today {
    color: #702963 !important;
    font-weight: 800 !important;
    }

    /* Change the cancel/ok button colors */
    .datepicker-cancel, .datepicker-done {
      color: #702963 !important;
    }


  </style>
</head>
<body class="grey lighten-5">

  <header>
    <div class="parallax-container hide-on-med-and-down">
      <div class="parallax">
        <img src="./img/happy-students.jpg" alt="Designed by Freepik" class="responsive-img">
      </div>
    </div>
    <img src="./img/happy-students.jpg" alt="Designed by Freepik" class="responsive-img hide-on-large-only">
    <div class="container">
      <h1 class="hide-on-med-and-down">Registration Form</h1>
      <h4 class="hide-on-large-only">Registration Form</h4>
      <p class="flow-text grey-text text-darken-2"><b>Dear <?php echo $full_name ?>, </b><br> Complete the form below to continue the registration process. All fields are required.</p>
    </div>
  </header>
  <main>
    <section class="section">
      <div class="container">
        <form action="registration_form.php" method="post">
          <h5>Course Details</h5>
          <div class="section" id="course_details">
            <div class="row">
              <div class="col s12 l4 input-field">
                <input type="text" name="transaction_id" id="transaction_id" value="<?php echo $trx_id ?>" readonly required>
                <label for="transaction_id">Transaction ID</label>
                <input type="hidden" name="timestamp_payment" id="timestamp_payment" value="<?php echo $timestamp_payment ?>">
              </div>
              <div class="col s12 l4 input-field">
                <select name="course_of_study" id="course_of_study" required>
                  <option value="">Course of Study</option>
                  <option value="PHEALTH">BSc. in Public Health</option>
                  <option value="CHEW">Community Health Extension Worker</option>
                  <option value="JCHEW">Junior Community Health Extension Worker</option>
                  <option value="ENVR">Environmental Health Extension Worker</option>
                  <option value="MEDLAB">Medical Laboratory Technician</option>
                  <option value="PHARM">Pharmacy Technician</option>
                  <option value="XRAY">X-Ray Technician</option>
                  <option value="HIMT">Health Information Management Technician</option>
                </select>
              </div>
              <div class="col s12 l4 input-field">
                <p>Kindly visit our <a href="https://cohtechobubra.edu.ng/courses.html" class="theme-color-txt underline-txt bold-text" target="_blank" >Courses page</a> to get more information about the courses we offer.</p>
              </div>
            </div>
          </div>
          <h5>Personal Info</h5>
          <div class="section" id="personal_info">
            <div class="row">
              <div class="col s12 l4 input-field">
                <input type="text" readonly name="first_name" id="first_name" value="<?php echo $first_name ?>" required>
                <label for="first_name">First Name</label>
              </div>
              <div class="col s12 l3 input-field">
                <input type="text" readonly name="last_name" id="last_name" value="<?php echo $last_name ?>" required>
                <label for="last_name">last_name</label>
              </div>
              <div class="col s12 l3 input-field">
                <input type="text" name="other_names" id="other_names">
                <label for="other_names">Other Names</label>
              </div>
              <div class="col s12 l2 input-field">
                <select name="gender" id="gender" required>
                  <option value="">Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col s12 l2 input-field">
                <input type="text" name="date_of_birth" id="date_of_birth" class="datepicker" required>
                <label for="date_of_birth">Date of Birth</label>
              </div>
              <div class="col s12 l2 input-field">
                <select name="marital_status" id="marital_status" required>
                  <option value="">Marital Status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="col s12 l2 input-field">
                <select name="state_of_origin" id="state_of_origin" required>
                  <option value="" selected="selected">State of Origin</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="AkwaIbom">AkwaIbom</option>
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
                  <option value="FCT">FCT</option>
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
                  <option value="Zamfara">Zamafara</option>
                </select>
              </div>
              <div class="col s12 l3 input-field">
                <input type="text" name="lga" id="lga" class="validate" required>
                <label for="lga">LGA of Origin</label>
              </div>
              <div class="col s12 l3 input-field">
                <input type="text" name="nationality" id="nationality" class="validate" required>
                <label for="nationality">Nationality</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 l4 input-field">
                <input type="tel" name="phone_no" id="phone_no" class="validate" required>
                <label for="phone_no">Phone Number</label>
              </div>
              <div class="col s12 l5 input-field">
                <input type="text" readonly name="email" id="email" value="<?php echo $email ?>" required>
                <label for="email">Email Address</label>
              </div>
              <div class="col s12 l3 input-field">
                <select name="religion" id="religion" required>
                  <option value="">Religion</option>
                  <option value="Christianity">Christianity</option>
                  <option value="Islam">Islam</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <textarea name="contact_address" id="contact_address" required class="materialize-textarea validate"></textarea>
                <label for="contact_address">Contact Address</label>
              </div>
            </div>
          </div>

          <h5>Next of Kin</h5>
          <div class="section" id="next_of_kin">
            <div class="row">
              <div class="col s12 l6 input-field">
                <input type="text" name="nok_name" id="nok_name" class="validate" required>
                <label for="nok__name">Full Name</label>
              </div>
              <div class="col s12 l3 input-field">
                <input type="text" name="nok_relationship" id="nok_relationship"placeholder="Father, Mother, Husband etc"  class="validate" required>
                <label for="nok_relationship">Relationship</label>
              </div>
              <div class="col s12 l3 input-field">
                <input type="text" name="nok_phone_no" id="nok_phone_no" class="validate" required>
                <label for="nok_phone_no">Phone Number</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 l10 input-field">
                <textarea name="nok_contact_address" id="nok_contact_address" class="materialize-textarea validate" required></textarea>
                <label for="nok_contact_address">Address</label>
              </div>
              <div class="col s12 l2 input-field">
                <input type="text" name="nok_occupation" id="nok_occupation" class="validate" required>
                <label for="nok_occupation">Occupation</label>
              </div>
            </div>
          </div>

          <h5>Attestation</h5>
          <div class="section">
            <div class="row">
              <div class="col s12 input-field">
                <p>
                  <label>
                    <input type="checkbox" required class="validate" name="attestation_1" value="yes"/>
                    <span>I hereby attest to the authenticity of the above information supplied above </span>
                  </label>
                </p>
                <p>
                  <label>
                    <input type="checkbox" required class="validate"  name="attestation_2" value="yes"/>
                    <span>I agree to comply with the rules and regulations of the college if my registration application is approved. </span>
                  </label>
                </p>
              </div>
            </div>
          </div>
          <div class="center-align section">
            <input type="submit" value="submit application" name="submit" class="btn btn-flat btn-large theme-color-bg white-text">
            <br><br><br>
          </div>
        </form>
      </div>
    </section>
  </main>
  <footer class="page-footer black center-align">
    <div class="footer-copyright">
      <div class="container">
        <p class="center">
          <span>&COPY; 2025 COHTECH Obubra.</span>
          <a href="https://www.cohtechobubra.edu.ng" target="_blank" class="white-text underline-txt">
            Back to Home
            <i class="material-icons tiny white-text">call_made</i>
          </a>
        </p>
      </div>
    </div>
  </footer>
  
  
  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
  <!-- LGA.js  -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.parallax').parallax();
      $('.datepicker').datepicker({yearRange: 50});
      $('select').formSelect({
        
      });
    })
  </script>
</body>
</html>