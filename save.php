<?php

require 'connect.php';


$first_name=$surname=$other_names=$gender=$date_of_birth=$marital_status=$state_of_origin=$lga=$nationality=$phone_no=$email=$religion=$contact_address=$nok_name=$nok_relationship=$nok_phone_no=$nok_contact_address=$nok_occupation=$attestation_1=$attestation_2="";

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
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

    $save_query = "INSERT INTO `registration_tb`(`first_name`, `surname`, `other_names`, `gender`, `date_of_birth`, `marital_status`, `state_of_origin`, `lga`, `nationality`, `phone_no`, `email`, `religion`, `contact_address`, `nok_name`, `nok_relationship`, `nok_phone_no`, `nok_contact_address`, `nok_occupation`, `attestation_1`, `attestation_2`) VALUES ('$first_name', '$surname', '$other_names', '$gender', '$date_of_birth', '$marital_status','$state_of_origin', '$lga', '$nationality', '$phone_no', '$email', '$religion','$contact_address','$nok_name', '$nok_relationship','$nok_phone_no', '$nok_contact_address', '$nok_occupation', '$attestation_1','$attestation_2')";

    $send_query = mysqli_query($conn, $save_query);

    if($send_query){
        echo "Data saved successfully";
    };
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <br>
    <button>
        <a href="/index.html">Back to Home</a>
    </button>
</body>
</html>