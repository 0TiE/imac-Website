<?php
session_start();
require "connection.php";



if (isset($_SESSION["c"])) {


    $uemail = $_SESSION["c"]["email"];
    $pid = $_GET["id"];


    Database::iud("INSERT INTO `watchlist` (`pid`,`user_email`) VALUES  ('" . $pid . "','" . $uemail . "')");
    echo "new Prodcut Has Been Added to your Watchlist.";
} else {

    echo "please SignIn First";
}
