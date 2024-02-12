<?php 
require "../connection.php";


$resultset = Database::search("SELECT  * FROM `colour` WHERE `name`='".$_POST["c"]."' ");
    $r = $resultset->num_rows;
if($r==1){
    echo "This colour already exists.";
}else{

    Database::iud("INSERT INTO `colour`(`name`) VALUES('".$_POST["c"]."') ");
    echo "New colour added Successfully.";
}
?>