<?php

require "connection.php";
$email = $_POST["m"];
$password = $_POST["p"];
$rememberMe = $_POST["rememberMe"];

$resultset = Database::search("SELECT  * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
$r = $resultset->num_rows;


if (empty($email)) {
    echo "Please Enter Your Email";
} elseif (empty($password)) {
    echo "Please Enter Your Password";
} else {

    if ($r == 1) {
        $n = $resultset->fetch_assoc();
        session_start();
        $_SESSION["c"] = $n;
        

        if ($rememberMe == "true") {
            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));
        } else {
            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }
        
        echo"success";
      
    } else {
        echo "Invalid email or password";
    }
}
