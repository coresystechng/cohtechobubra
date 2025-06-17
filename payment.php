<?php
  session_start();
  if($_SESSION['email']) {
    //Fetch Payment Details
    $email = $_SESSION['email'];
    $full_name = $_SESSION['full_name'];
    // Amount to be paid
    $amount = 771250;
  } else {
    header("Location: index.php");
  }

  // Paysack API URL
  $url = "https://api.paystack.co/transaction/initialize";

  // Payment Details
  $fields = [
    'email' => $email,
    'amount' => $amount,
    'callback_url' => "http://localhost/cohtechobubra/success.php", //Redirect URL after payment
    // 'metadata' => ["cancel_action" => "replace_with_redirect_url_when_user_cancels"]
  ];

  $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_75df5930311613f3dcdf19b24398b18148560ae7",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  $decoded_response = json_decode($result, true);
  $link= $decoded_response['data']['authorization_url'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/cohtech-logo.png" type="image/x-icon">
  <title>Payment Portal </title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .container h1 {
      margin-bottom: 20px;
    }
    .container form {
      display: flex;
      flex-direction: column;
    }
    .container form input[type="text"],
    .container form input[type="email"],
    .container form input[type="number"] {
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .container form input[type="submit"] {
      padding: 10px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .container form input[type="submit"]:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <script>
      window.location.href = "<?php echo $link?>"
  </script>
</body>
</html>