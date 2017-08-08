<?php
/* dbconnect - connect to / disconnect from  the XAMPP MySQL db.
 * authenticates with the root user privileges (with password)
 * connects to 'ecomm' db
 */

function openCon() {
	$host 	= "localhost";
	$user 	= "root";
	$pass 	= "";
	$db	= "ecomm";

	$conn 	= new mysqli($host, $user, $pass, $db);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function closeCon($conn) {
	$conn -> close();
} 
?>
