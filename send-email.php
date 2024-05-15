<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.zoho.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 465;

$mail->Username = "contact@sudasunayoga.com";
$mail->Password = "jeYsn0iYcC79";

$mail->setFrom($email, $name);
$mail->addAddress("contact@sudasunayoga.com", "Rumesh");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: sent.php");