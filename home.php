<?PHP
require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>imak | Home</title>

    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body class="body">
    <div class="container-fuild">
        <div class="row ">
            <?php
            require "header.php";


            ?>

            <div class="col-12 " id="result">
                <div class="col-12 d-none d-lg-block">
                    <div class="row">

                        <div id="carouselExampleIndicators" class="carousel slide col-8 offset-2" data-bs-ride="carousel">
                            <div class="carousel-indicators d-none">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resources/carosel/Deals-Header-Image-Blue.webp" class="d-block poster-img-1 w-100">

                                </div>
                                <!-- <div class="carousel-item ">
                                    <img src="resources/carosel/enjoy islandwide free delivery image.jpg" class="d-block poster-img-1 w-100">

                                </div> -->
                                <div class="carousel-item">
                                    <img src="resources/carosel/Apple-Black-Friday-deals-1701216.png" class="d-block poster-img-1 w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/carosel/51257-101296-apple-products-on-sale-2022-xl.png" class="d-block poster-img-1 w-100">

                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div>
                            <img src="resources/carosel/Artboard_1_copy_4.png" class="d-block img ">
                        </div>

                        <div class=" row justify-content-center gap-2 ">


                            <?php

                            $resultset = Database::search("SELECT * FROM `product` WHERE `status_id`='1' AND `category`='1' ORDER BY `date_time_added` DESC LIMIT 1  ");
                            $mac = $resultset->fetch_assoc();
                            $resultset2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $mac["id"] . "'");
                            $macimg = $resultset2->fetch_assoc();


                            ?>
                            <div class="card mt-2 mb-2" style="width: 18rem;">
                                <img src="<?php echo $macimg["code"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["c"])) {
                                        $email = $_SESSION["c"]["email"];
                                        $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $mac["id"] . "'");
                                        $watchlistProductNum = $watchlistProducts->num_rows;
                                        if ($watchlistProductNum == 0) {
                                    ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-fill" onclick="addToWatchlist(<?php echo $mac['id'] ?>)"></i></p>

                                        <?php
                                        } else {
                                        ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-check-fill"></i></p>
                                        <?php

                                        }
                                    } else { ?>



                                    <?php
                                    }
                                    ?>

                                    <span class="badge bg-secondary">New</span>
                                    <p class="card-text"> <?php echo $mac["description"] ?></p>

                                    <div style="text-align: center;">


                                        <a href='<?php echo "singleProductView.php?id=" . ($mac["id"]) . ""  ?>' class=" btn btn-dark cardbutton">Buy Now</a>
                                        <a href="#" class=" btn btn-secondary cardbutton  fs-5 " onclick="addToCart(<?php echo $mac['id'] ?>)"><i class="bi bi-cart"></i></a>

                                    </div>
                                </div>
                            </div>

                            <?php

                            $resultset = Database::search("SELECT * FROM `product` WHERE `status_id`='1' AND `category`='2'ORDER BY `date_time_added` DESC LIMIT 1");
                            $ipad = $resultset->fetch_assoc();
                            $resultset2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $ipad["id"] . "'  ");
                            $ipadimg = $resultset2->fetch_assoc();


                            ?>
                            <div class="card mt-2 mb-2" style="width: 18rem;">
                                <img src="<?php echo $ipadimg["code"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["c"])) {
                                        $email = $_SESSION["c"]["email"];
                                        $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $ipad["id"] . "'");
                                        $watchlistProductNum = $watchlistProducts->num_rows;
                                        if ($watchlistProductNum == 0) {
                                    ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-fill" onclick="addToWatchlist(<?php echo $ipad['id'] ?>)"></i></p>

                                        <?php
                                        } else {
                                        ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-check-fill"></i></p>
                                    <?php

                                        }
                                    } else {
                                    } ?>

                                    <span class="badge bg-secondary">New</span>
                                    <p class="card-text"><?php echo $ipad["description"] ?></p>
                                    <div style="text-align: center;">


                                        <a href='<?php echo "singleProductView.php?id=" . ($ipad["id"]) . ""  ?>' class=" btn btn-dark cardbutton">Buy Now</a>
                                        <a href="#" onclick="addToCart(<?php echo $ipad['id'] ?>)" class=" btn btn-secondary cardbutton  fs-5"><i class="bi bi-cart"></i></a>

                                    </div>
                                </div>
                            </div>
                            <?php

                            $resultset = Database::search("SELECT * FROM `product` WHERE `status_id`='1' AND`category`='3' ORDER BY `date_time_added` DESC LIMIT 1  ");
                            $iwatch = $resultset->fetch_assoc();
                            $resultset2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $iwatch["id"] . "'");
                            $iwatchimg = $resultset2->fetch_assoc();


                            ?>
                            <div class="card mt-2 mb-2" style="width: 18rem;">
                                <img src="<?php echo $iwatchimg["code"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <?php
                                    if (isset($_SESSION["c"])) {
                                        $email = $_SESSION["c"]["email"];
                                        $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $iwatch["id"] . "'");
                                        $watchlistProductNum = $watchlistProducts->num_rows;
                                        if ($watchlistProductNum == 0) {
                                    ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-fill" onclick="addToWatchlist(<?php echo $iwatch['id'] ?>)"></i></p>

                                        <?php
                                        } else {
                                        ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-check-fill"></i></p>
                                    <?php

                                        }
                                    } else {
                                    } ?>
                                    <span class="badge bg-secondary">New</span>
                                    <p class="card-text"><?php echo $iwatch["description"] ?></p>
                                    <div style="text-align: center;">


                                        <a href='<?php echo "singleProductView.php?id=" . ($iwatch["id"]) . ""  ?>' class=" btn btn-dark cardbutton">Buy Now</a>
                                        <a href="#" onclick="addToCart(<?php echo $iwatch['id'] ?>)" class=" btn btn-secondary cardbutton  fs-5"><i class="bi bi-cart"></i></a>

                                    </div>
                                </div>
                            </div>
                            <?php

                            $resultset = Database::search("SELECT * FROM `product` WHERE `status_id`='1' AND `category`='4' ORDER BY `date_time_added` DESC LIMIT 1  ");
                            $iphone = $resultset->fetch_assoc();
                            $resultset2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $iphone["id"] . "'");
                            $iphoneimg = $resultset2->fetch_assoc();


                            ?>
                            <div class="card mt-2 mb-2" style="width: 18rem;">
                                <img src="<?php echo $iphoneimg["code"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <?php
                                    if (isset($_SESSION["c"])) {
                                        $email = $_SESSION["c"]["email"];
                                        $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $iphone["id"] . "'");
                                        $watchlistProductNum = $watchlistProducts->num_rows;
                                        if ($watchlistProductNum == 0) {
                                    ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-fill" onclick="addToWatchlist(<?php echo $iphone['id'] ?>)"></i></p>

                                        <?php
                                        } else {
                                        ?>
                                            <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-check-fill"></i></p>
                                    <?php

                                        }
                                    } else {
                                    } ?>
                                    <span class="badge bg-secondary">New</span>
                                    <p class="card-text"><?php echo $iphone["description"] ?></p>
                                    <div style="text-align: center;">


                                        <a href='<?php echo "singleProductView.php?id=" . ($iphone["id"]) . ""  ?>' class=" btn btn-dark cardbutton">Buy Now</a>
                                        <a href="#" onclick="addToCart(<?php echo $iphone['id'] ?>)" class=" btn btn-secondary cardbutton  fs-5"><i class="bi bi-cart"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                require "footer.php"; ?>
            </div>

        </div>


    </div>

    <script src="//code.jivosite.com/widget/ALmSUiGInv" async></script>
    <script src="script.js"></script>
</body>

</html>