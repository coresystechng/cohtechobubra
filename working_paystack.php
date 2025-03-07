<?php
 //FETCH ANY NECCESSARY DETAILS [AMOUNT, USER EMAIL] OR ANY OTHER LOGIC

  $url = "https://api.paystack.co/transaction/initialize";

  $fields = [
    'email' => "collinsduzzy21@gmail.com",
    'amount' => "100000",
    'callback_url' => "replace_with_redirect_url",
    'metadata' => ["cancel_action" => "replace_with_redirect_url_when_user_cancels"]
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
  $decoded_response = json_decode($result, true);
  $link= $decoded_response['data']['authorization_url'];
?>
<script>
    window.location.href = "<?php echo $link?>"
</script>