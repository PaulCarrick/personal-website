<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once 'init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your secret key from Google reCAPTCHA
    $secretKey = getenv('CAPTCHA_SECRET_KEY');
    // CAPTCHA validation
    $captcha = $_POST['g-recaptcha-response'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "CAPTCHA verification failed. Please try again.";
        exit;
    }

    // Sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if ($name && $email && $message) {
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
            $mail->Subject = 'Contact from paul-carrick.com';
            $mail->Body    = "Name: {$name}<br>Email: {$email}<br>Message:<br>{$message}";

            // Send email
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid input. Please check your information and try again.";
    }
}
?>
