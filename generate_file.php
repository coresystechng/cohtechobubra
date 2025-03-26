<?php

// Include the database connection file
include 'connect.php';

// Get the Transaction ID
$transaction_id = "STRVDMW9JQ";

// Get user details from the database
$stmt = $conn->prepare("SELECT * FROM `registration_tb` WHERE `transaction_id` = ?");
$stmt->bind_param("s", $transaction_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Get user details
$user_id = $user['transaction_id'];
$first_name = $user['first_name'];
$surname = $user['surname'];
$other_names = $user['other_names'];
$date_of_birth = $user['date_of_birth'];
$gender = $user['gender'];
$nationality = $user['nationality'];
$email = $user['email'];
$phone_no = $user['phone_no'];
$marital_status = $user['marital_status'];
$state_of_origin = $user['state_of_origin'];
$lga = $user['lga'];
$religion = $user['religion'];
$contact_address = $user['contact_address'];
$date_of_payment = $user['date_of_payment'];
$nok_name = $user['nok_name'];
$nok_phone_no = $user['nok_phone_no'];
$nok_relationship = $user['nok_relationship'];

//Convert the date_of_registration to a more readable format
$user['date_of_registration'] = date('l, F j, Y', strtotime($user['date_of_registration']));
$date_of_registration = $user['date_of_registration'];

//Courses offered by the school
if($user['course_of_study'] == 'PHEALTH'){
    $user['course_of_study'] = 'Bsc. in Public Health';
}elseif($user['course_of_study'] == 'CHEW'){
    $user['course_of_study'] = 'Community Health Extension Worker';
}elseif($user['course_of_study'] == 'JCHEW'){
    $user['course_of_study'] = 'Junior Community Health Extension Worker';
}elseif($user['course_of_study'] == 'ENVR'){
    $user['course_of_study'] = 'Environmental Health Extension Worker';
}elseif($user['course_of_study'] == 'MEDLAB'){
    $user['course_of_study'] = 'Medical Laboratory Technician';
}elseif($user['course_of_study'] == 'PHARM'){
    $user['course_of_study'] = 'Pharmacy Technician';
}elseif($user['course_of_study'] == 'XRAY'){
    $user['course_of_study'] = 'X-Ray Technician';
}elseif($user['course_of_study'] == 'HIMT'){
    $user['course_of_study'] = 'Health Information & Management Technician';
}

$course_of_study = $user['course_of_study'];

//Generate current year from NOW()
$current_year = date('Y');

// Include TCPDF library
include 'vendor/library/tcpdf.php';

// Create a new TCPDF object
$pdf = new TCPDF('P', 'mm', 'A4');

// Set Document Information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('COHTECH Obubra');
$pdf->SetTitle("Student Registration Form  - $user_id");
$pdf->SetSubject("Student Registration Form - $user_id");
$pdf->SetKeywords('Student, Registration, Form, COHTECH, Obubra');


//Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set font
$pdf->SetFont('dejavusans', '', 10);

//Add a page
$pdf->AddPage();

// create some HTML content
$html = "
<h1 style=\"text-align:center; color:#702963;\">College of Health Technology, Obubra</h1>
<p style=\"text-align:center; font-size:small;\">PMB 146, Owakande 2, Obubra, Obubra LGA, Cross River State.</p>
<p style=\"text-align:center; font-size:small;\"><b>Website:</b> <a href=\"https://www.cohtechobubra.edu.ng\" dir=\"ltr\">cohtechobubra.edu.ng</a> | <b>Email:</b> <a href=\"mailto:cohtechibubra@fmail.com\" dir=\"ltr\">cohtechobubra@gmail.com</a></p>
<hr style=\"color:#702963;\">
</br>
<h3 style=\"text-align:center;\"><u>Student Registration Form</u></h3>
</br>
<ul style=\"list-style-type: none;\">
  <li style=\"line-height: 2.5; \"><b>Registration ID:</b> $user_id</li>
  <li style=\"line-height: 2.5; \"><b>Date of Registration:</b> $date_of_registration </li>
  <li style=\"line-height: 2.5; \"><b>Course of Study:</b> $course_of_study</li>
</ul>
</br>
</br>
<ul style=\"list-style-type: none;\">
  <li style=\"line-height: 2.5; \"><b>Full Name:</b> $first_name  $surname </li>
  <li style=\"line-height: 2.5; \"><b>Date of Birth:</b> $date_of_birth </li>
  <li style=\"line-height: 2.5; \"><b>Gender:</b> $gender</li>
  <li style=\"line-height: 2.5; \"><b>Marital Status:</b> $marital_status</li>
  <li style=\"line-height: 2.5; \"><b>Email:</b> $email </li>
  <li style=\"line-height: 2.5; \"><b>Tel No:</b> $phone_no </li>
  </ul>
  </br>
  </br>
<ul style=\"list-style-type: none;\">
  <li style=\"line-height: 2.5; \"><b>Contact Address: </b> $contact_address </li>
  <li style=\"line-height: 2.5; \"><b>State of Origin: </b> $state_of_origin </li>
  <li style=\"line-height: 2.5; \"><b>LGA: </b> $lga </li>
  <li style=\"line-height: 2.5; \"><b>Nationality:</b> $nationality</li>
  <li style=\"line-height: 2.5; \"><b>Religion:</b> $religion</li>
</ul>
</br>
</br>
<ul style=\"list-style-type: none;\">
  <li style=\"line-height: 2.5; \"><b>Next of Kin: </b> $nok_name ($nok_relationship) </li>
  <li style=\"line-height: 2.5; \"><b>Contact: </b> $nok_phone_no </li>
</ul>
</br>
</br>
<ul style=\"list-style-type: none;\">
  <li style=\"line-height: 2.5; \"><b>Registration Fee: </b> ₦7,500 </li>
  <li style=\"line-height: 2.5; \"><b>Payment Status: </b> PAID </li>
  <li style=\"line-height: 2.5; \"><b>Date of Payment: </b> $date_of_payment </li>
</ul>
</br>
</br>
</br>
<p style=\"text-align: center; color:#702963; font-size: small; \"> &copy; $current_year COHTECH Obubra. All Rights Reserved. </p>
";
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// Output the PDF to the browser
$pdf->Output("Student Registration Form - $transaction_id", 'I');

?>