<?php
function sendsms_post(array $params1) {
			$url = 'https://smartsmssolutions.com/api/';
	
			$params = http_build_query($params1);
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
			} else {
				return FALSE;
			}
		}
	
		function sendSMS($phone, $dec_code) {
		
				$message = "Your have one new secure email, your Decryption code is " . $dec_code . ". ";
			    $message .= "Please do not disclose this to anyone.";
				$recipients = $phone;
				$senderid = 'ETransaction';
				$token = 'U7hrGA0fwlVs0zF6B5ehyJwW7QLRVpua0RN5IJJdNsusXaJJV54dcu1I4ldKBNyAKu0w5vHd8114rqIszg8iUEPeowya4juDJESA';
	
				$sms_array = array(
					'sender' => $senderid,
					'to' => $recipients,
					'message' => $message,
					'type' => '0', //This can be set as desired. 0 = Plain text ie the normal SMS
					'routing' => '3', //This can be set as desired. 3 = Deliver message to DND phone numbers via the corporate route
					'token' => $token
				);
				//echo $this->sendsms_post($sms_array);
				return validate_sendsms(sendsms_post($sms_array));
			
			//return NULL;
		}
	
        ?>