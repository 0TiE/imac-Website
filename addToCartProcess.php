<?php
session_start();
require "connection.php";



if (isset($_SESSION["c"])) {


    $uemail = $_SESSION["c"]["email"];
    $pid = $_GET["id"];

    $cartProducts = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "' AND `product_id`='" . $pid . "'");
    $cartProductNum = $cartProducts->num_rows;

    $productstyrs = Database::search("SELECT `qty` FROM `product` WHERE `id` = '" . $pid . "'");
    $qtyrows = $productstyrs->fetch_assoc();
    $prodQty = $qtyrows["qty"];

    if ($cartProductNum == 1) {

        $cartRows = $cartProducts->fetch_assoc();
        $currentqty = $cartRows["qty"];
        $newqty = (int)$currentqty + 1;

        if ( 5 >= $newqty) {

            Database::iud("UPDATE `cart` SET `qty`='" . $newqty . "' WHERE `user_email`='" . $uemail . "'
            AND `product_id`='" . $pid . "'");
            echo "This Product quantity updated in your Cart.";
        } else {

            echo "Invalid Product quantity.";
        }
    } else {

        Database::iud("INSERT INTO `cart` (`product_id`,`user_email`,`qty`) VALUES  ('" . $pid . "','" . $uemail . "','1')");
        echo "new Prodcut Has Been Added to your Cart.";
    }
} else {

    echo "please SignIn First";
}
