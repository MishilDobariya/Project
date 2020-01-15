<?php
require 'PHPMailerAutoload.php';
require 'cre.php';
require 'class.phpmailer.php';
require 'class.smtp.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

//echo $_POST['Email'];
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mishilpatel647445@gmail.com';                 // SMTP username
$mail->Password = '8000136126';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mishilpatel647445@gmail.com', 'KaryArthin');
if(isset($_POST['Email'])){
	$email = $_POST['Email'];
	$name = $_POST['Name'];
	echo $email;
}
$mail->addAddress($email);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Examination';
$mail->Body    = "Username and password for exam...
					Username:".$name."<br>".
					"Password:12345678"."<br>".
					"Exam link:http://localhost/tcexam-master/public/code/index.php"."<br>".
					"Test password:12345678";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("location:Karya_Arthin_index.php");
}