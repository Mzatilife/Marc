<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$cmessage = $_REQUEST['message'];

$mail = new PHPMailer(true);

//email confirmation
try {
	//Server settings
	$mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                     
	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'projectmahala@gmail.com';
	$mail->Password   = 'jatpxeomxxghwssf';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port       = 587;

	//Recipients
	$mail->setFrom('projectmahala@gmail.com');
	$mail->addAddress('mckampira@gmail.com');

	$mail->isHTML(true);

	$mail->Subject = "Message from marc.dreamcodemw.com.";

	$mail->Body = "
	<div style = 'border-bottom: 2px solid #57648C; color:#57648C; padding:10px; border-radius: 10%; text-align:center; letter-spacing: 3px; line-height: 2.0;'>
    <h2>{$name}</h2>
    <p><strong>Email:</strong> {$from}</p>
    <p><strong>Subject:</strong> {$subject}</p>
    <p>{$cmessage}</p>	
    </div>
	";

	$result = $mail->send();
	if ($result) {
		echo "<script>alert('Message sent successfully')</script>";
		echo "<script>window.open('index.html', '_self')</script>";
	} else {
		echo "<script>alert('Message could not be sent')</script>";
		echo "<script>window.open('index.html', '_self')</script>";
	}
} catch (Exception $e) {
	echo "<script>alert('Message could not be sent')</script>";
	echo "<script>window.open('index.html', '_self')</script>";
}
