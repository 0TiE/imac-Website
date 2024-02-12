<?php
session_start();
require "connection.php";
if (isset($_GET)) {

    $pid = $_GET["pid"];
    $qty = $_GET["qty"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
    $product_data = $product_rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Integartion (Stripe)</title>
        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="./css/_style.css" />
        <link rel="stylesheet" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <button type="button " onclick="goback()" class="back btn btn-dark">Go Back</button>
        <div class="row ">
            <div class="col-md-6 ">
                <div class="form-container">
                    <form autocomplete="off" action="checkout-charge.php" method="POST">

                    <?php 
                    
                    
                    $usermail = $_SESSION["c"]["email"];
                    $address = Database::search("SELECT * FROM `user_address` WHERE `email` = '" . $usermail . "' ");
                    $a = $address->fetch_assoc();
                    ?>
                        <div>
                            <input type="text" name="c_name" required  value="<?php echo $_SESSION["c"]["name"] ?>"/>
                            <label>Customer Name</label>
                        </div>
                        <div>
                            <input type="text" name="address" value="<?php echo $a["address01"]?> <?php echo $a["address02"]?>"required />
                            <label>Address</label>
                        </div>
                        <div>
                            <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required value="<?php echo $_SESSION["c"]["mobile"] ?>"/>
                            <label>Contact number</label>
                        </div>
                        <div>
                            <input type="text" name="product_name" value="<?php echo $product_data["description"] ?>" disabled required />
                            <label>Product name</label>
                        </div>
                        <div>


                            <input type="text" name="qty" value="<?php echo $qty ?>" disabled required /><label>Quantity</label>
                        </div>
                        <div>
                            <input type="text" name="price" value="<?php echo $product_data["price"] * $qty ?>" disabled required />
                            <label>Price</label>
                        </div>
                        <input type="hidden" name="amount" value="<?php echo $product_data["price"] ?>">
                        <input type="hidden" class="d-none" name="pid" value="<?php echo $product_data["id"] ?>">
                        <input type="hidden" class="d-none" name="qty" value="<?php echo $qty ?>">

                        <script src="https://checkout.stripe.com/checkout.js" 
                        class="stripe-button" data-key="pk_test_51LOXSREsnbQjivlPiI3D9zIUK25D8dxjJWi34M1DTVuXyf8jM4QbjnOepZZrunrmKO7cLSVYPPTUT72OQY5FpJhF00ihVudTSh" 
                        data-amount=<?php echo $product_data["price"] * $qty*100 ?>
                        data-name="Payment" data-description=" " data-currency="LKR" data-locale="auto">

                        </script>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-container">
                    <h4>&nbsp;&nbsp;<?php echo $product_data["description"] ?></h4>
                    <?php

                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                    $image_data = $image_rs->fetch_assoc();

                    ?>
                    <img src="<?php echo $image_data["code"] ?>" />
                    <span>Unit Price &nbsp;:&nbsp;<?php echo $product_data["price"] ?></span>
                </div>
            </div>
        </div>

    <?php
}
    ?>
    <script>
        function goback() {
            window.history.go(-1);
        }

        $('#ph').on('keypress', function() {
            var text = $(this).val().length;
            if (text > 9) {
                return false;
            } else {
                $('#ph').text($(this).val());
            }

        });
    </script>

    </body>

    </html>