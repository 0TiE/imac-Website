<?php
require "connection.php";

require "SMTP.php";
require "Exception.php";
require "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {
    $email = $_GET["e"];

    if (empty($email)) {
        echo "Please enter an valid Email";
    } else {
        $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        if ($rs->num_rows == 1) {

            $p = $rs->fetch_assoc();

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'javaboylk@gmail.com';
            $mail->Password = 'gihjdrcfksorhymb';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('ravidunalawaththa@gmail.com', 'imak');
            $mail->addReplyTo('ravidunalawaththa@gmail.com', 'imak');
            $mail->addAddress('ravidunalawaththa@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = 'imak Fogot Password  ';
            $bodyContent = '<h1 style="color:green;"> Your Password  is :' . $p["password"] . '<h1/>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Passwordending failed';
            } else {
                echo 'Success';
            }
         } else {
            echo "Email address not fund";
         }
    }
}
 else {
    echo "Please enter your Email adress";
}
