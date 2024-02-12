
<?php

require "connection.php";



session_start();

if (isset($_SESSION["c"])) {

    $ad1 = $_POST["adline1"];
    $ad2 = $_POST["adline2"];
    $p = $_POST["pcode"];


    if (isset($_FILES["img"])) {
        $img = $_FILES["img"];
    }

    if (isset($img)) {

        $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");
        $fileex = $img["type"];
        // echo $fileex;

        if (!in_array($fileex, $allowed_image_extention)) {

            echo "Please select a valid image.";
        } else {

            $newimageextention;
            if ($fileex == "image/jpg") {
                $newimageextention = ".jpg";
            } else if ($fileex == "image/jpeg") {
                $newimageextention = ".jpeg";
            } else if ($fileex == "image/png") {
                $newimageextention = ".png";
            }
            if ($fileex == "image/svg") {
                $newimageextention = ".svg";
            }

            $file_name = "resources//profile//" . uniqid() . $newimageextention;

            move_uploaded_file($img["tmp_name"], $file_name);

            $profilers = Database::search("SELECT * FROM `user_img` WHERE `email` = '" . $_SESSION["c"]["email"] . "'");
            $in = $profilers->num_rows;

            if ($in == 1) {

                Database::iud("UPDATE `user_img` SET `code`='" . $file_name . "' WHERE `email`='" . $_SESSION["c"]["email"] . "'");
                echo "Profile Image Updated Successfully.";
            } else {

                Database::iud("INSERT INTO `user_img` (`code`,`email`) VALUE('" . $file_name . "','" . $_SESSION["c"]["email"] . "')");
                echo "New profile image saved Successfully.";
            }
        }
    } else {



        $addressrs = Database::search("SELECT * FROM `user_address` WHERE `email`='" . $_SESSION["c"]["email"] . "'");
        $nrs = $addressrs->num_rows;

        if ($nrs == 1) {

            Database::iud("UPDATE `user_address` SET `address01`='" . $ad1 . "',`address02`='" . $ad2 . "',`posatalcode`='" . $p . "' WHERE `email`='" . $_SESSION["c"]["email"] . "'");

            echo "Address Updated Successfully.";
        } else {

            Database::iud("INSERT INTO `user_address` (`email`,`address01`,`address02`,`posatalcode`) VALUES('" . $_SESSION["c"]["email"] . "','" . $ad1 . "','" . $ad2 . "','" . $p . "')");

            echo "New Address Updated Successfully.";
        }
    }
} else {

    echo "Error";
}

?>

