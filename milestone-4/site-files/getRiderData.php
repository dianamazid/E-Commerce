<?php

function getFirst($conn, $last) {
	$checkuser = "SELECT `firstname` FROM `Open Rides` WHERE `lastname`= '$last'"; 
	$query = mysqli_query($conn, $checkuser);
	
		while($row = mysqli_fetch_array($query)){
        $return = $row['firstname'];
            
        }
	

	return $return;
}

function getEmail($conn, $last) {
	$checkuser = "SELECT `email` FROM `Open Rides` WHERE `lastname`= '$last'"; 
	$query = mysqli_query($conn, $checkuser);
	
		while($row = mysqli_fetch_array($query)){
        $return = $row['email'];
            
        }
	

	return $return;
}

function getPrice($conn, $last) {
	$checkuser = "SELECT `price` FROM `Open Rides` WHERE `lastname`= '$last'"; 
	$query = mysqli_query($conn, $checkuser);
	
		while($row = mysqli_fetch_array($query)){
        $return = $row['price'];
            
        }
	

	return $return;
}

function getTitle($conn, $last) {
	$checkuser = "SELECT `title` FROM `Open Rides` WHERE `lastname`= '$last'"; 
	$query = mysqli_query($conn, $checkuser);
	
		while($row = mysqli_fetch_array($query)){
        $return = $row['title'];
            
        }
	

	return $return;
}

function getDescription($conn, $last) {
	$checkuser = "SELECT `description` FROM `Open Rides` WHERE `lastname`= '$last'"; 
	$query = mysqli_query($conn, $checkuser);
	
		while($row = mysqli_fetch_array($query)){
        $return = $row['description'];
            
        }
	

	return $return;
}

function getDestination($conn, $last) {
	$checkuser = "SELECT `destination` FROM `Open Rides` WHERE `lastname`= '$last'"; 
	$query = mysqli_query($conn, $checkuser);
	
		while($row = mysqli_fetch_array($query)){
        $return = $row['destination'];
            
        }

	return $return;
}

?>
