<?php if (session_status() === PHP_SESSION_NONE){  session_start(); } ?>

<?php

require('assets/db_connect.php');
require('admin_session.php'); 

// error_reporting(E_ALL);
// ini_set('display_errors','1');

// $email = $_SESSION['email_name'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once('assets/phpmailer/Exception.php');
require_once('assets/phpmailer/PHPMailer.php');
require_once('assets/phpmailer/SMTP.php');


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    !extension_loaded('openssl')?"Not Available":"Available";
    
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';                                             //Send using SMTP
                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hmgfitnesscenter@gmail.com';                     //SMTP username
    $mail->Password   = isset($pass) ? $pass: '';                              //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // 465
    //Recipients
    $mail->setFrom('hmgfitnesscenter@gmail.com', 'HMG FITNESS CENTER');
    // $mail->addAddress('kleobracia@gmail.com');     //Add a recipient
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your registration has been approved';
    $mail->Body    = 'Hello, 
    Thank you for your interest in our HMG Fitness Center. You can now login on hmgfitnesscenter.com';

    //$mail->AltBody = 'Thank you for your interest in our HMG Fitness Center';

    $mail->send();

    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// unset($_SESSION['$email_name']);

// $mail = new PHPMailer(); // create a new object
// $mail->IsSMTP(); // enable SMTP
// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 465; // or 587
// $mail->IsHTML(true);
// $mail->Username = "kleobracia@gmail.com";
// $mail->Password = "kay#Knight##";
// $mail->SetFrom("kleobracia@gmail.com");
// $mail->Subject = "Test";
// $mail->Body = "hello";
// $mail->AddAddress("kleobracia@gmail.com");

//  if(!$mail->Send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
//  } else {
//     echo "Message has been sent";
//  }<?php
?>
