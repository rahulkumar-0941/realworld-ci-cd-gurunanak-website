<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $role    = $_POST['role'];
    $pickup  = $_POST['pickup'];
    $drop    = $_POST['drop'];
    $type    = $_POST['type'];
    $details = $_POST['details'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'shreegurunanaktransportcompany@gmail.com';  // your Gmail
        $mail->Password   = 'your-app-password';                         // app password here
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('shreegurunanaktransportcompany@gmail.com', 'SGTC Website');
        $mail->addAddress('shreegurunanaktransportcompany@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Load/Truck Submission from Website';
        $mail->Body    = "
            <h2>New Submission Details</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Role:</strong> $role</p>
            <p><strong>Pickup Location:</strong> $pickup</p>
            <p><strong>Drop Location:</strong> $drop</p>
            <p><strong>Type of Goods/Truck:</strong> $type</p>
            <p><strong>Additional Details:</strong> $details</p>
        ";

        $mail->send();
        echo "Success";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
