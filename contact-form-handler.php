<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'], $_POST['name'], $_POST['message'])) {
    $mail = new PHPMailer(true);

    try {
        // SMTP CONFIGURATION
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'giusyharley@gmail.com';       // Your Gmail
        $mail->Password = 'ewgaosiuvkxzcuan';                // App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // FROM & TO
        $mail->setFrom('giusyharley@gmail.com', 'Avitel');
        $mail->addAddress('giusyferrara@live.com');          // Recipient
        $mail->addReplyTo($_POST['email'], $_POST['name']);

        // CONTENT
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <h3>New Message from Website</h3>
            <p><strong>Name:</strong> " . htmlspecialchars($_POST['name']) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>
            <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($_POST['message'])) . "</p>
        ";

        $mail->send();
        header("Location: Thank__you.html");
        exit;

    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "❗ No form data received.";
}
?>
