<?php
session_start();


require 'vendor/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {
    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Enable SMTP debugging (for testing/debugging purposes only)
    // Set it to 0 for production use
    $mail->SMTPDebug = 0;

    // Set the mailer to use SMTP
    $mail->isSMTP();

    // SMTP configuration (change these to match your SMTP server)
    $mail->Host = 'smtp.gmail.com'; // E.g., smtp.gmail.com for Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'k.laghribi2939@uca.ac.ma'; // Your email address
    $mail->Password = 'vezkdxbccjkotiwu'; // Your email password
    $mail->SMTPSecure = 'ssl'; // Or 'ssl' if using SSL encryption
    $mail->Port = 465; // Port number, e.g., 587 for Gmail

    // Set the email sender and recipient
    $mail->setFrom('k.laghribi2939@uca.ac.ma', 'Enver'); // Your email and name

    // Check if the 'email' key is set in the $_POST array
    if (isset($_POST['email'])) {
        $recipientEmail = $_POST['email'];
        $mail->addAddress($recipientEmail); // Recipient's email and name
    } else {
        echo 'Recipient email address not provided.';
        exit();
    }

    // Set the email subject and body
    $mail->Subject = 'about your subject';
    $mail->Body = '"Thank you for reaching out to us. A dedicated member of our team will review your request and will be in touch with you promptly. We appreciate your patience and look forward to assisting you.';

    // Send the email
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $_SESSION['spam']=true;
        echo 'Message sent successfully!';
        header("Location: contact.php");
        
        exit();
    }
}
?>

