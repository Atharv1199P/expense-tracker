<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendRegistrationEmail($email, $username, $password)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = getenv('EMAIL_USERNAME');
        $mail->Password = getenv('EMAIL_PASSWORD');                  //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('atharpatil1111@gmail.com', 'Atharv Patil');
        $mail->addAddress($email, $username);     //Add a recipient




        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Registration Confirmation';
        $mail->Body    = '<p>Your registration was successful and your password:' . $password . ' </p>';
        $mail->AltBody = 'Your registration was successful.';

        $mail->send();
        echo '<strong>Registration successful! A confirmation email has been sent.</strong>';
    } catch (Exception $e) {
        echo "<strong>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</strong>";
    }
}
