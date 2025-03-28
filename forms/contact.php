<?php
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// php -S localhost:8000
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$dog_name = $_POST['dog_name'];
$dog_age = $_POST['dog_age'];

if (!$name || !$email || !$age) {
  die('Invalid form');
}

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sitiowebravbilbao@gmail.com'; // Your email
    $mail->Password   = 'bo$%ov44auznytl-n';      // Your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Or PHPMailer::ENCRYPTION_SMTPS for SSL
    $mail->Port       = 587; // Use 465 for SSL, 587 for TLS

    // Recipients
    $mail->setFrom('caminatafamiliar@gmail.com', 'Caminata Familiar');
    $mail->addAddress('contacto@caminatafamilia.cl'); // Add a recipient
    $mail->addCC('mbensan.test@gmail.com'); // Add a recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $body = '<h2>Inscripción exitosa</h2>';
    $body .= '<h4>Te esperamos con tu familia y tu amigo de 4 patas</h2>';

    $mail->Body    = $body;

    $mail->AltBody = 'Texto plano de prueba';

    $mail->send();
    
    http_response_code(200);
    echo "OK";
  } catch (Exception $e) {
    http_response_code(400);
    echo "Error en el envío. Por favor contáctenos por otro medio";
}
?>