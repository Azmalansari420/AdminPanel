<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'libraries/phpmailer/Exception.php';
require APPPATH.'libraries/phpmailer/PHPMailer.php';
require APPPATH.'libraries/phpmailer/SMTP.php';

class Hostinger extends CI_Model
{

  public function sendmail($body)
  {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = mailhost;
    $mail->SMTPAuth = true;
    $mail->Username = mailusername; // Your gmail
    $mail->Password = mailpassword; // Your gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom(mailsetfrom); // Your gmail

    $mail->addAddress(mailaddaddress);

    $mail->isHTML(true);

    $mail->Subject = "Enquiry";
    $mail->Body = $body;

    $mail->send();

    echo
    "
    <script>
    alert('Sent Successfully');
    document.location.href = 'index';
    </script>
    ";
  }
}
?>


