<?php
require "connection.php";
$n = $_POST["name"];
$e = $_POST["email"];
$p = $_POST["password"];
$m = $_POST["mobile"];


if (empty($n)) {
    echo "Please Enter Your Name";
} else if (strlen($n) > 50) {
    echo "Name must be less than 50 characters...";
} else if (empty($e)) {
    echo "Please Enter Your Email Address";
} else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address";
} else if (empty($p)) {
    echo "Please Enter Your Password";
} else if (empty($e)) {
    echo "Please Enter Your Email Address";
} else if (empty($m)) {
    echo "Please Enter Your Mobile Number";
} else if (strlen($m) != 10) {
    echo "mobile number should contain 10 characters...";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $m) == 0) {
    echo "Inalid Mobile Number.";
} else {

    $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "' AND `mobile`='" . $m . "'");
    $u = $user->num_rows;

    if ($u == 1) {
        echo "User already exsits.";
    } else {
        $d = new DateTime();
        $t = new DateTimeZone("Asia/colombo");
        $d->setTimezone($t);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`  (`email`,`name`,`password`,`mobile`,`register_date`) VALUES ('" . $e . "','" . $n . "','" . $p . "','" . $m . "','" . $date . "')");

        echo "Login Success";
    }
}
