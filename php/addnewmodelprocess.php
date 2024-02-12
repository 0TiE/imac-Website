<?php 
require "../connection.php";


$resultset = Database::search("SELECT  * FROM `model` WHERE `name`='".$_POST["nc"]."' ");
    $r = $resultset->num_rows;
if($r==1){
    echo "This model already exists.";
}else{

    Database::iud("INSERT INTO `model`(`name`) VALUES('".$_POST["nc"]."') ");
    echo "New model added Successfully.";
}
?>