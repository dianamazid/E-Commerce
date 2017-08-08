<?php

// connect to the ecomm database
function saveToDB($conn, $fn, $ln, $email, $pw, $addr, $city, $st, $zip) {
	$saveuser = 
		"INSERT INTO siteusers 
		(firstName, lastName, email, password, address, city, state, zipCode)
		VALUES
		('$fn','$ln','$email','$pw','$addr','$city','$st','$zip')";

	$result = mysqli_query($conn, $saveuser);

	if (!$result) {
		echo "Save failed.";
	}
}

function checkUserInput($conn, $email) {
	$checkuser = "SELECT * from siteusers WHERE email = '$email'"; 
	$query = mysqli_query($conn, $checkuser);
	$found = mysqli_num_rows($query);

	$return = null;
	
	if ($found > 0) {
		$return = TRUE;
	} else {
		$return = FALSE;
	}

	return $return;
}

function signInVerify($conn, $email, $password){
	$checkemail = "SELECT * from siteusers WHERE email = '$email'"; 
	$checkpwd = "SELECT password from siteusers WHERE email = '$email'";
	$query = mysqli_query($conn, $checkemail);
	$found = mysqli_num_rows($query);

	$return = null;
	
	if ($found > 0 && $checkpwd = $password) {
		$return = TRUE;
	} else {
		$return = FALSE;
	}

	return $return;
}

function checkValidInput($fn, $ln, $email, $city, $st, $zip) {
	$invalidField = "valid";
	// first name validation	
	for($i = 0; $i<strlen($fn); $i++) {
		$c = ord($fn[$i]);
		if($c<65||$c>122) {
			$invalidField = "firstname";
		}
	}

	// last name validation
	for($i = 0; $i<strlen($ln); $i++) {
		$c = ord($ln[$i]);
		if($c<65||$c>122) {
			$invalidField = "lastname";
		}
	}

	// email validation
	$first = "@";
	$second = ".";
	$pos1 = strpos($email, '@');
	$pos2 = strrpos($email, '.');
	if(strpos($email, '@') === false || strrpos($email, '.') === false || $pos2 < $pos1) {
		 $invalidField = "email";
	}
	$counter = 0;
	for($i = 0; $i<strlen($email); $i++){
		
		if($email[$i]=='@'){
			$counter++;
		}
		
	}
	if($counter>1){
		echo "counter > 1";
			$invalidField = "email";
		}

	// city validation	
	for($i = 0; $i<strlen($city); $i++) {
		$c = ord($city[$i]);
		if($c<65||$c>122) {
			$invalidField = "city";
		}

	}


	// zip code validation
	for($i = 0; $i<strlen($zip); $i++){
		$c = ord($zip[$i]);
		if($c<47||$c>57){
			$invalidField = "zip";
		}
	}
	
	// if all validation tests pass
	
	return $invalidField;
}

function checkCompleteInput($fn, $ln, $email, $pw, $addr, $city, $st, $zip) {
	$completeInput = "complete";
	// first name complete	
	if(empty($fn)){
		$completeInput = "firstname";
	}

	// last name complete
	if(empty($ln)){
		$completeInput = "lastname";
	}

	// email complete
	if(empty($email)){
		$completeInput = "email";
	}

	// password complete
	if(empty($pw)){
		$completeInput = "password";
	}

	// address complete
	if(empty($addr)){
		$completeInput = "address";
	}

	// city complete
	if(empty($city)){
		$completeInput = "city";
	}

	if(empty($zip)){
		$completeInput = "zip";
	}
	
	// if all fields are complete
	return $completeInput;
}

?>
