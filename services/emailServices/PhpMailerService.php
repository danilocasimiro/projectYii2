<?php

namespace app\services\emailServices;

use app\models\Log;
use app\models\SystemMessage;
use app\services\emailServices\EmailInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PhpMailerService implements EmailInterface
{
    public function sendEmail($receiver, $class): void 
    {
        $email = $receiver->messageEmail;
        $mail = new PHPMailer(true);

        try {  

            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dangcasimiro@gmail.com';
            $mail->Password = 'senha';
            $mail->Port = 587;
  
            $mail->setFrom('dangcasimiro@gmail.com');
            $mail->addAddress($receiver->email);
  
            $mail->isHTML(true);
            $mail->Subject = static::replaceVariables($receiver, $email->subject);
            $mail->Body =  static::replaceVariables($receiver, $email->message);
            $mail->AltBody = 'chegou email altbody';
  
            if($mail->send()) {
                Log::addLogSendEmail($receiver, $class, SystemMessage::LOG_SUCCESS_SEND_EMAIL_ID);
                
            }
        
        }catch (Exception $e){
            Log::addLogSendEmail($receiver, $class, SystemMessage::LOG_ERROR_SEND_EMAIL_ID);
        }
    }

    public static function replaceVariables($receiver, $text)
    {
        $receiverName = $receiver->getName();
        $text = str_replace("receiver_email", $receiver->email, $text);

        return str_replace("receiver_name", $receiverName, $text);
    }
}