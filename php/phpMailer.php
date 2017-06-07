<?php

/**
 * Created by PhpStorm.
 * User: Juan Jose Vazquez
 * Date: 5/22/2017
 * Time: 10:26 PM
 */

require 'PHPMailer/PHPMailerAutoload.php';

$captcha = $_POST['g-recaptcha-response'];

if (!$captcha){
//    $_SESSION['resultado'] = 'no';
//    echo "<script>location.href='http://www.nandmar.com/clickinvest';</script>";
    exit;
}




$mail = new PHPMailer;


$firstName = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$email = $_POST['email'];
$phone = $_POST['phoneNumber'];
$interested = $_POST['interested'];
$comment = $_REQUEST['message'];


$mensaje = "First Name: " . $firstName . '<br />' .
    "Last Name: " . $lastname . '<br />' .
    "Company: " . $company . '<br />' .
    "Email: " . $email . '<br />' .
    "Phone: " . $phone . '<br />' .
    "interested: " . $interested . '<br />' .
    "Question/Comment: " . $comment;



$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->Debugoutput = 'html';



$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'clickinvest37@gmail.com';                 // SMTP username
$mail->Password = 'Lakecomo12';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('clickinvest37@gmail.com', 'Rosario');
$mail->addAddress('rre@rreassets.com', 'Rosario Terracciano');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@clickinvest.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Somebody sent you a message from the website';
$mail->Body    = $mensaje;
//$mail->Body    = $mensaje;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}