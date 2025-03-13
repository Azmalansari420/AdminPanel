<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Model;

require_once APPPATH . 'Libraries/PHPMailer/PHPMailer.php';
require_once APPPATH . 'Libraries/PHPMailer/Exception.php';
require_once APPPATH . 'Libraries/PHPMailer/SMTP.php';

class EmailModel extends Model
{




    public function sendEmail($toEmail, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try 
        {
            // Load environment variables
            $host          = getenv('EMAIL_HOST');
            $username      = getenv('EMAIL_USERNAME');
            $password      = getenv('EMAIL_PASSWORD');
            $emailFrom     = getenv('EMAIL_FROM_ADDRESS');
            $emailFromName = getenv('EMAIL_FROM_NAME');
            $ccEmail       = getenv('EMAIL_CC');
            $bccEmail      = getenv('EMAIL_BCC');


            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = $host; // Change as needed
            $mail->SMTPAuth = true;
            $mail->Username = $username; // Change this
            $mail->Password = $password; // Use App Password if using Gmail
            $mail->SMTPSecure = 'ssl'; // Use 'tls' for port 587
            $mail->Port = 465; // Use 587 for TLS

            // Sender & Recipient
            $mail->setFrom($emailFrom, $emailFromName);
            $mail->addAddress("wolverine@gmail.com"); //jis pr jani he
            // $mail->addAddress($toEmail); // form se he email leni he to ye he
            // $mail->addCC($ccEmail); //jis pr jani h CC
            // $mail->addBCC($bccEmail); //jis pr jani h BCC

            // Email Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            return $mail->send();
        } catch (Exception $e) {
            log_message('error', 'Mail Error: ' . $mail->ErrorInfo);
            return false;
        }
    }







}
