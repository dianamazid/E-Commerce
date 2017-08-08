<?php
// Start the session
require ('PHPMailer/PHPMailerAutoload.php');

function sendConfirmTo($email, $name) {
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
	$mail->Subject 		= 'PHPMailer Test';
	$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		
	}	
}
?>
