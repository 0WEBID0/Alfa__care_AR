<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];



    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/PHPMailer.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'soholalfa@gmail.com';                     //SMTP username
        $mail->Password = 'fivlkermhgnuetut';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('soholalfa@gmail.com', 'contact from');
        $mail->addAddress('soholalfa@gmail.com', '');     //Add a recipient




        //Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $name;
        $mail->Body = " $name <br>  $email <br> $msg <br>  ";

        $mail->send();

    } catch (Exception $e) {
        echo 'error';
    }
}

?>