<?php
// Start the session
require ('PHPMailer/PHPMailerAutoload.php');

function sendConfirmTo($email, $name, $pw) {
	$mail = new PHPMailer();

	// TODO add the confirmation body of email here

	$mail->isSMTP();

	$mail->SMTPDebug 	= 0; // TODO set to zero once debugging is done
	$mail->Debugoutput 	= 'html';
	$mail->Host 		= 'smtp.gmail.com';
	$mail->Port 		= 587;
	$mail->SMTPSecure 	= 'tls';
	$mail->SMTPAuth 	= true;
	$mail->Username 	= "hoosridingemail@gmail.com";
	$mail->Password 	= "ecommerce1";
	$mail->addAddress($email, $name);
	$mail->setFrom('hoosridingemail@gmail.com', 'The Carpool Company Team');
	$mail->Subject 		= 'Welcome to The Carpool Company!';
	$message = file_get_contents('contents.html');
	$message = str_replace('%name%', $name, $message);
	$message = str_replace('%username%', $email, $message);
    	$message = str_replace('%password%', $pw, $message);
	$mail->msgHTML($message, dirname(__FILE__));

	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		
	}	
}
?>
