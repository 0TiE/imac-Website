<!DOCTYPE html>
<html>

<head>
    <title>imak| Cart</title>

    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "connection.php";
    require "header.php";

    ?>
    <div class="container-fluid">

        <div class="row ">

            <div class="col-12 text text-center fw-bold">

                <p class="fs-2"> Apple Cart</p>
            </div>
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr class="border border-1 border-white">
                            <th></th>

                            <th>Prduct Name</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-end">Quantity</th>
                            <th class="text-end">Total</i></th>
                            <th class="text-end">Actions</i></th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php


                        if (isset($_SESSION["c"])) {
                            $email = $_SESSION["c"]["email"];
                            $nettotal = "0";
                            $subtotal = "0";
                            $shipping = 0;


                            $resultset = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
                            $cart = $resultset->num_rows;

                            for ($x = 0; $x < $cart; $x++) {
                                $cartdetail = $resultset->fetch_assoc();

                                $resultset2 = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartdetail["product_id"] . "'");
                                $product = $resultset2->fetch_assoc();

                                $resultset3 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $cartdetail["product_id"] . "'");
                                $productimag = $resultset3->fetch_assoc();

                        ?>

                                <tr style="height: 72px;">

                                    <td>
                                        <div class="card mt-2 mb-2 align-content-center" style="width: 9rem;">
                                            <img src="<?php echo $productimag["code"] ?>" class="card-card-img-top" alt="...">
                                        </div>
                                    </td>
                                    <td class="text-dark fw-5 fs-4"><?php echo $product["description"] ?></td>
                                    <td class="fs-6 text-end pt-3 bg-secondary text-white ">Rs.<?php echo $product["price"] ?>.00</td>
                                    <td class="text-end pt-3"><?php echo $cartdetail["qty"] ?></td>
                                    <td class="text-end pt-3"><?php echo $total = $product["price"] * $cartdetail["qty"]   ?> </td>
                                    <td class="text-end pt-3"><button class="btn btn-danger" onclick="cartRemove(<?php echo $product['id'] ?>);">Remove</button></td>
                                </tr>
                    </tbody>
                <?php
                                $nettotal = $nettotal + $total;
                            }
                ?>

                <tfoot>
                    <tr>
                        <td colspan="3" class="border-0"></td>
                        <td class="fs-5 text-end">NetTotal</td>
                        <td class="text-end"> <?php echo $nettotal ?> .00</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border-0"></td>
                        <td class="fs-5 text-end border-dark">Discount</td>
                        <td class="text-end border-dark"> 00 .00</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border-0"></td>
                        <td class="fs-5 text-end border-secondary text-secondary fw-bold">SubTotal </td>
                        <td class="text-end border-secondary text-secondary fs-5 fw-bold">Rs.<?php echo $nettotal ?>.00</td>

                    </tr>
                </tfoot>
                
                </table>
                <div class="col-12 mt-3 mb-3 d-grid">
                                    <button class="btn btn-primary fs-5 fw-bold">CHECKOUT</button>
                                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <?php require "footer.php" ?>
    <script src="script.js"></script>
</body>
<script src="script.js"></script>

</html>
<?php

                        } else {
?>

    <footer class="bg-secondary  pb-4 pt-4 mt-auto fixed-bottom ">
        <div class="col-12 ">
            <div class="row  ">

                <div class="col-5 mx-auto  ">
                    <img src="resources/carosel/Artboard_1_copy_4.png" class="d-block img ">
                </div>

                <div class="col-4 mx-auto ">
                    <img src="resources/secure-stripe-payment-logo-new.jpg" class="d-block img ">
                </div>

                <div class="col-3  col-lg-2 mx-auto mt-3 ">
                    <img src="resources/images (15).png" class="d-block img ">
                </div>

            </div>

        </div>
        <div class="row text-white ">
            <div class=" col-6 ">
                <span class=" offset-0 offset-lg-2">
                    <i class="bi " style="font-size:25px;"></i>
                    <b>Hotline:(+94) 115 500 505 | (+94) 115 112 525</b>
                </span>

            </div>
            <div class="col-4 ">
                <span class="offset-2">
                    <i class="bi " style="font-size:25px;"></i>
                    <b>Secure payments &nbsp;|&nbsp; Pay with</b>
                </span>

            </div>
            <div class="col-2  ">
                <span class="offset-2">
                    <i class="bi bi-apple text-white " style="font-size:25px;"></i>
                    <b> Follow us</b>
                </span>

            </div>
        </div>
    </footer>

<?php

                        }

?>