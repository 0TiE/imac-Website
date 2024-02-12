<?php

require "connection.php";
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["m"];
$password = $_POST["p"];






if (empty($email)) {
    echo "Please Enter Your Email";
} elseif (empty($password)) {
    echo "Please Enter Your Password";
} else {
    $resultset = Database::search("SELECT  * FROM `admin` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
    $r = $resultset->num_rows;
    if ($r == 1) {

        $code = uniqid();
        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ravidunalawaththa@gmail.com';
        $mail->Password = 'mqfjhllwcqpskqqp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ravidunalawaththa@gmail.com', 'imak');
        $mail->addReplyTo('ravidunalawaththa@gmail.com', 'imak');
        $mail->addAddress('ravidunalawaththa@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Admin  Verification code';
        $bodyContent = '<h1 style="color:green;"> Your verification Code is :' . $code . '<h1/>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'verification code sending failed';
        } else {
            echo 'success';

            Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");



        }
    } else {
        echo "Invalid email or password";
    }
}
