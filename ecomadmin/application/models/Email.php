<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'libraries/phpmailer/Exception.php';
require APPPATH.'libraries/phpmailer/PHPMailer.php';
require APPPATH.'libraries/phpmailer/SMTP.php';

class Email extends CI_Model
{

  public function sendmail($body)
  {
    // die;
    // echo 'gdgd';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = mailhost;
    // $mail->Host = 'smtp.gmail.com';
     // $mail->Host = 'mail.asrbikemechanicathome.com';
    $mail->SMTPAuth = true;
    $mail->Username = mailusername; // Your gmail
    $mail->Password = mailpassword; // Your gmail app password
     $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    //$mail->SMTPDebug = 1;
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    $mail->setFrom(mailsetfrom); // Your gmail jha se jani he

    $mail->addAddress(mailaddaddress); // jha jani he

    $mail->isHTML(true);

    $mail->Subject = "Enquiry";
    $mail->Body = $body;

    $mail->send();

    echo
    "
    <script>alert('Sent Successfully');</script>
    ";
  }
}



