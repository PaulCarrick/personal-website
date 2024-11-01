<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'email-smtp.us-east-1.amazonaws.com'; // SES SMTP endpoint (adjust the region if necessary)
    $mail->SMTPAuth = true;
    $mail->Username = 'AKIAZCP4F55VIJO4YULH'; // SES SMTP username
    $mail->Password = 'BC26D8BIsIX5LFyE1mw0Oud2OCehNWtMXPUP9fHR8tBz'; // SES SMTP password
    $mail->SMTPSecure = 'ssl'; // or 'ssl'
    $mail->Port = 465; // 465 for 'ssl'

    // Recipients
    $mail->setFrom('paulandvirginiacarrick@gmail.com', 'Paul and Virguna Carrick');
    $mail->addAddress('paulandvirginiacarrick@gmail.com', 'Paul Carrick');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from AWS Lightsail';
    $mail->Body    = 'This is a test email sent from an AWS Lightsail instance using SES and PHPMailer.';

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
