<?php

require "connection.php" ?>

<!DOCTYPE html>
<html>

<head>
    <title>New Tech | Watchlist</title>

    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>

<body>
    <?php require "header.php" ?>
    <div class="container-fluid">

        <div class="row mt-1 mb-1">
            <div class="col-12 text text-center fw-bold">

                <p class="fs-2"> Watch List</p>
            </div>
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr class="border border-1 border-white">
                            <th></th>

                            <th>Prduct Name</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-end">Stock Status</th>
                            <th class="text-end">Actions</i></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION["c"])) {
                            $email = $_SESSION["c"]["email"];
                            $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE  `user_email`='" . $email . "'");

                            $n = $watchlistrs->num_rows;


                            for ($x = 0; $x < $n; $x++) {
                                $watchresult = $watchlistrs->fetch_assoc();

                                $rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $watchresult["pid"] . "'");
                                $resultset2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watchresult["pid"] . "'");
                                $img = $resultset2->fetch_assoc();

                                $pr = $rs->fetch_assoc();

                        ?>

                                <tr style="height: 72px;">

                                    <td>
                                        <div class="card mt-2 mb-2 align-content-center" style="width: 9rem;">
                                            <img src="<?php echo $img["code"] ?>" class="card-card-img-top" alt="...">
                                        </div>
                                    </td>
                                    <td class="text-dark fw-5 fs-4"><?php echo $pr["description"] ?></td>
                                    <td class="fs-6 text-end pt-3 bg-secondary text-white ">Rs.<?php echo $pr["price"] ?>.00</td>
                                    <td class="text-end pt-3 text-success fw-bolder">In Stock</td>
                                    <td class=" "><button class="btn btn-dark" style="background-color: purple;" onclick="addToCart(<?php echo $pr['id'] ?>)">AddToCart</button></td>
                                    <td class=" "><button class="btn btn-danger" onclick="watchlistRemove(<?php echo $pr['id'] ?>)">Remove</button></td>
                                </tr>
                            <?php

                            }

                            ?>
                    </tbody>

                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <?php require "footer.php" ?>
    <script src="script.js"></script>
</body>

</html>
<?php
                        } else {

                            
?>

<footer class="bg-secondary  pb-4 pt-4 mt-auto  fixed-bottom">
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
    </footer><?php
                        }
                ?>