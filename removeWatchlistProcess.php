<?php
require "connection.php";
session_start();
$pid = $_GET["id"];

$email = $_SESSION["c"]["email"];

//Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('" . $id . "' , '" . $user_mail . "')");

Database::iud("DELETE FROM `watchlist` WHERE `pid` ='" . $pid . "' AND `user_email`='" . $email . "' ");

echo "THis Product Remove from Your watch List success";
