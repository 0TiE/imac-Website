<?php
session_start();

if(isset($_SESSION["c"])){
    $_SESSION["c"]=null;
    session_destroy();
       echo"success";
}
?>