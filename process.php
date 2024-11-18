<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST["inputName"]));
    $email = filter_var(trim($_POST["inputEmail"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $smtpHost = $_ENV['SMTP_HOST'];
    $smtpPort = $_ENV['SMTP_PORT'];
    $smtpUsername = $_ENV['SMTP_USERNAME'];
    $smtpPassword = $_ENV['SMTP_PASSWORD'];

    $mail = new PHPMailer(true);



    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername; 
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = $smtpPort; 
        $mail->addAddress($smtpUsername);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h4>Name: $name</h4><h4>Email: $email</h4><p>Message:<br>$message</p>";
        $mail->AltBody = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send email to admin
        $mail->send();
        echo "Thank you for contacting us, $name. We will get back to you soon.";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
