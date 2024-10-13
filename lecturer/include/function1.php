<?php
function sendsms_post($url, array $params) {
    $params = http_build_query($params);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
}

function validate_sendsms($response) {
    $validate = explode('||', $response);
    if ($validate[0] == '1000') {
        return TRUE;
        //return custom response here instead.
        // header("location:" . $path);
    } else {
        return FALSE;
        //return custom response here instead.
    }
}



$message = "Your have one new secure email, your Decryption code is " . $dec_code . ". Please do not disclose this to anyone.";
$senderid = 'ETransaction';
$recipients = $phone;
$token = 'U7hrGA0fwlVs0zF6B5ehyJwW7QLRVpua0RN5IJJdNsusXaJJV54dcu1I4ldKBNyAKu0w5vHd8114rqIszg8iUEPeowya4juDJESA';

//The generated code from api-x token page
$url = 'https://smartsmssolutions.com/api/';


$sms_array = array(
    'sender' => $senderid,
    'to' => $recipients,
    'message' => $message,
    'type' => '0', //This can be set as desired. 0 = Plain text ie the normal SMS
    'routing' => '3', //This can be set as desired. 3 = Deliver message to DND phone numbers via the corporate route
    'token' => $token
);

//Call sendsms_post function to send SMS        
$response = sendsms_post($url, $sms_array);

//Echo the reply
//echo $response;
//Or to validate by calling the validate_sendsms function
if (validate_sendsms($response) == TRUE) {
  echo "<script> alert('Message has been sent to your mobile phone!'); window.location.href='compose.php';</script>";
}else{
  echo "<script> alert('Message not sent. OTP saved to database!'); window.location.href='compose.php';</script>";
}

?>