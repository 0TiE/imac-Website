<?php 
require "../connection.php";



Database::iud("UPDATE `product`  SET `price`='".$_POST["p"]."',`qty`='".$_POST["q"]."' WHERE `id`='".$_POST["i"]."'");
 
echo "Success.";