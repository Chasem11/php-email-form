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
    //Load ENV variables
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    //SMTP variables
    $smtpHost = $_ENV['SMTP_HOST'];
    $smtpPort = $_ENV['SMTP_PORT'];
    $smtpUsername = $_ENV['SMTP_USERNAME'];
    $smtpPassword = $_ENV['SMTP_PASSWORD'];

    //DB variables
    $dbHost = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME'];
    $dbUser = $_ENV['DB_USER'];
    $dbPassword = $_ENV['DB_PASSWORD'];
    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error);
    }

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

        // Send email 
        if ($mail->send()) {
            $saveEmail = $connection->prepare("INSERT INTO emails (name, email, message) VALUES (?, ?, ?)");
            $saveEmail->bind_param("sss", $name, $email,  $message);
            $saveEmail->execute();
            $saveEmail->close();
            //Reloads the window
            echo "<script>
                alert('Thank you for contacting us, $name. We will get back to you soon.');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "Message failed to send.";
        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $connection->close();
}
?>
