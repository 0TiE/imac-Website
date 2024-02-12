<?Php

session_start();
require "../connection.php";

$category = $_POST["category"];


$model = $_POST["model"];

$colour = $_POST["colour"];

$qty = $_POST["qty"];

$price = $_POST["price"];


$description = $_POST["description"];



// echo $imagefile;



$d = new DateTime();
$tz = new  DateTimeZone("ASIA/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");




if ($category == "0") {
    echo "Please Select a Category.";
} elseif ($model == "0") {
    echo "Please select a model";
} elseif (empty($qty)) {
    echo "Quantity  must not be empty";
} elseif ($qty == "0" || $qty == "e" || $qty < 0) {
    echo "Please enter a valid quantity";
} elseif (empty($price)) {
    echo "Please enter a price to your product .";
} elseif (is_int($price)) {
    echo "Please enter a valid price.";
} elseif (empty($description)) {
    echo "plaese enter a description to your product";
} else {






    Database::iud("INSERT INTO `product`(`category`,`colour_id`,`price`,`qty`,`description`,`status_id`,`date_time_added`,`model_id`)VALUES('" . $category . "','" . $colour . "','" . $price . "','" . $qty . "','" . $description . "','" . 1 . "','" . $date . "','" . $model . "')");

    $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");

    if (isset($_FILES["img"])) {

        $image = $_FILES["img"];
        if (isset($image)) {

            $file_extention = $image["type"];

            if (in_array($file_extention, $allowed_image_extention)) {

                $fileName = "../resources//products//" . $image["name"];

                move_uploaded_file($image["tmp_name"], $fileName);

                $last_id = Database::$connection->insert_id;
                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('" . "resources//products//" . $image["name"] . "','" . $last_id . "') ");

                echo "New Product Added";
                
            } else {
                echo "Please select a valid Image.";
            }
        } else {
            echo "Please select an Image.";
        }
    }
}
