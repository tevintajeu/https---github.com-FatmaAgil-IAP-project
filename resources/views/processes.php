<?php
require_once 'ClassAutoLoad.php';
require '../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


class processes{
    function sendemail_verify($names, $message)
    {

        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'icd2.2biz@gmail.com';                     //SMTP username
            $mail->Password   = 'mrhawtgsqijhmtmg';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('icd2.2biz@gmail.com');
            $mail->addAddress($names);   //to receive            //Name is optional
            
          
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'TESTING!!';
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
           
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    

    }
}

   function bind_to_template($replacements, $template)
    {
        return preg_replace_callback('/{{(.+?)}}/', function ($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }

}
