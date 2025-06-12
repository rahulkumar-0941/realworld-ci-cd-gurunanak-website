<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// SECRET KEY to protect from unauthorized access
$SECRET_KEY = "myStrongSecret123";

// Check POST method and validate secret
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['secret']) && $_POST['secret'] === $SECRET_KEY) {

    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    $name    = $_POST['name'] ?? 'N/A';
    $role    = $_POST['role'] ?? 'N/A';
    $pickup  = $_POST['pickup'] ?? 'N/A';
    $drop    = $_POST['drop'] ?? 'N/A';
    $type    = $_POST['type'] ?? 'N/A';
    $details = $_POST['details'] ?? 'N/A';

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'shreegurunanaktransportcompany@gmail.com';  // Your email
        $mail->Password   = 'cvjvsunbtioedyxy';                         // Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender & receiver
        $mail->setFrom('shreegurunanaktransportcompany@gmail.com', 'SGTC Website');
        $mail->addAddress('shreegurunanaktransportcompany@gmail.com');

        // Email content
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

} else {
    // Invalid access
    http_response_code(403);
    echo "Access Denied.";
}
?>
