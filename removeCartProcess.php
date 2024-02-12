


<?php
require "connection.php";
session_start();
$pid = $_GET["id"];

$email = $_SESSION["c"]["email"];

//Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('" . $id . "' , '" . $user_mail . "')");

Database::iud("DELETE FROM `cart` WHERE `product_id` ='" . $pid . "' AND `user_email`='" . $email . "' ");

echo "This Product Remove from Your Cart success";
