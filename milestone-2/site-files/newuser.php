<?php
// connect to the ecomm database
function saveToDB($conn, $fn, $ln, $email, $pw, $addr, $city, $st, $zip) {
	$saveuser = "INSERT INTO siteusers 
			(firstName, lastName, email, password, address, city, state, zipcode)
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

?>
