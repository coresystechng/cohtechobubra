<?php
  $url = "https://api.paystack.co/transaction/initialize";

  $fields = [
    'email' => "customer@email.com",
    'amount' => "500000"
  ];

  $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_a84285b4013faed1fddd57be4126c810a81876f3",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  $result = json_decode($result, true);
  // print_r($result);
  // print_r($result['data']['access_code']);

  if(isset($_POST['pay'])){
    $transaction_id = $_POST['name'];
    $url = "https://api.paystack.co/transaction/verify/$transaction_id";
    header('Location: $url');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Test</title>
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
  <div class="container">
    <h4>Payment Page</h4>
    <form action="payment.php" method="POST">
      <input type="text" name="name" required value="<?php echo $result['data']['access_code']; ?>">
      <input type="submit" value="Pay Now" name="pay">
    </form>
  </div>

  <!-- Scripts -->
  <script src="https://js.paystack.co/v2/inline.js"></script>
  <script>
    const popup = new PaystackPop();
    popup.resumeTransaction(access_code)
  </script>
</body>
</html>