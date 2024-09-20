<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Charger l'autoload de Composer

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.sendgrid.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'apikey'; // Doit être 'apikey' pour SendGrid
    $mail->Password = ''; // Ta clé API SendGrid
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinataires
    $mail->setFrom('imedadjelia@gmail.com', 'Your Name');
    $mail->addAddress('imedadjelia@gmail.com', 'Imed Adjelia'); // Adresse de réception

    // Contenu de l'e-mail
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = nl2br($_POST['message']);
    
    $mail->send();
    echo 'Votre message a été envoyé avec succès!';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
}
?>
