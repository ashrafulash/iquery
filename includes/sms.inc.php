<?php
	// Authorisation details.
	$username = "invitation.ielts@gmail.com";
	$hash = "6944b9c411a99586ca56064648992295104e61436cc04735d38da20f1132a1f4";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "iquery"; // This is who the message appears to be from.
	$numbers = "8801742793777"; // A single number or a comma-seperated list of numbers
	$message = "test-1";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

    echo $result;
?>