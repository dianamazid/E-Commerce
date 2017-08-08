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

function checkValidInput($fn, $ln, $email, $city, $st, $zip) {

	// first name validation	
	for($i = 0; $i<strlen($fn); $i++) {
		$c = ord($fn[$i]);
		if($c<65||$c>122) {
			return false;
		}
	}

	// last name validation
	for($i = 0; $i<strlen($ln); $i++) {
		$c = ord($ln[$i]);
		if($c<65||$c>122) {
			return false;
		}
	}

	// email validation
	$first = "@";
	$second = ".";
	$pos1 = strpos($email, '@');
	$pos2 = strrpos($email, '.');
	if(strpos($email, '@') === false || strrpos($email, '.') === false || $pos2 < $pos1) {
		 return false;
	}

	// city validation	
	for($i = 0; $i<strlen($city); $i++) {
		$c = ord($city[$i]);
		if($c<65||$c>122) {
			return false;
		}

	}

	// state validation
	for($i = 0; $i<strlen($st); $i++){
		$c = ord($st[$i]);
		if($c<65||$c>122){
			return false;
		}
	}

	// zip code validation
	for($i = 0; $i<strlen($zip); $i++){
		$c = ord($zip[$i]);
		if($c<47||$c>57){
			return false;
		}
	}
	
	// if all validation tests pass
	return true;
}

function checkCompleteInput($fn, $ln, $email, $pw, $addr, $city, $st, $zip) {

	// first name complete	
	if(empty($fn)){
		return false;
	}

	// last name complete
	if(empty($ln)){
		return false;
	}

	// email complete
	if(empty($email)){
		return false;
	}

	// password complete
	if(empty($pw)){
		return false;
	}

	// address complete
	if(empty($addr)){
		return false;
	}

	// city complete
	if(empty($city)){
		return false;
	}

	if(empty($st)){
		return false;
	}

	if(empty($zip)){
		return false;
	}
	
	// if all fields are complete
	return true;
}

?>
