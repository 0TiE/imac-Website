<?php
session_start();
require "../connection.php";

if (isset($_GET["id"])) {
    $useremail = $_GET["id"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $useremail . "'");

    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        $userdata = $user_rs->fetch_assoc();

        $userstatus = $userdata["status_id"];

        if ($userstatus == "1") {
            Database::iud("UPDATE `user` SET `status_id`='2' WHERE `email`='" . $useremail . "'");
           echo "Success 1";
        } elseif ($userstatus == "2") {
            Database::iud("UPDATE `user` SET `status_id`='1' WHERE `email`='" . $useremail . "'");
           echo "Success 2";
        }
    }
}
