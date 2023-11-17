<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// تضمين الملفات المطلوبة يدوياً
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "soholalfa@gmail.com";
    $subject = "New Email Subscription";
    $email = $_POST["email"];
    $message = "A new user has subscribed with the email: $email";

    // إعداد متغيرات PHPMailer
    $mail = new PHPMailer(true);

    try {
        // إعداد الخادم والبريد الإلكتروني
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'soholalfa@gmail.com';                     //SMTP username
        $mail->Password = 'fivlkermhgnuetut';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;

        // إعداد المرسل والمستلم
        $mail->setFrom('soholalfa@gmail.com', 'contact from');
        $mail->addAddress('soholalfa@gmail.com', '');

        // إعداد محتوى البريد
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // إرسال البريد
        $mail->send();

        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
}
?>

<?php

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["email"];
    $subject = "تأكيد الرسالة";
    $name = $_POST["name"];
    $message_content = $_POST["message"];

    // إعداد متغيرات PHPMailer
    $mail = new PHPMailer(true);

    try {
        // إعداد الخادم والبريد الإلكتروني
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // قم بتغيير هذا إلى مضيف SMTP الخاص بك
        $mail->SMTPAuth = true;
        $mail->Username = 'your_username@example.com'; // قم بتغيير هذا إلى اسم مستخدم SMTP الخاص بك
        $mail->Password = 'your_password'; // قم بتغيير هذا إلى كلمة مرور SMTP الخاصة بك
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // إعداد المرسل والمستلم
        $mail->setFrom('your_email@example.com', 'Your Name'); // قم بتغيير هذا إلى بريدك الإلكتروني واسمك
        $mail->addAddress($to);

        // إعداد محتوى البريد للرد التلقائي
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "شكرًا لك، $name! <br> لقد استلمنا رسالتك التي تقول: <br> $message_content";

        // إرسال البريد لتأكيد الرد
        $mail->send();

        // إرسال رسالة نجاح إلى النموذج
        echo "success";
    } catch (Exception $e) {
        // إرسال رسالة خطأ إلى النموذج
        echo "error: " . $mail->ErrorInfo;
    }
}
?>