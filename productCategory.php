<?php
require "connection.php";

if (isset($_GET["id"])) {

    $cid = $_GET["id"];
}
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
                <div class="row">
                    <div class="col-12">
                        <div>
                            <img src="resources/carosel/Artboard_1_copy_4.png" class="d-block img ">
                        </div>
                        <div class=" row justify-content-center gap-2 ">


                            <?php

                            $resultset = Database::search("SELECT * FROM `product` WHERE `status_id`='1' AND `category`='$cid' ");

                            $n = $resultset->num_rows;


                            for ($x = 0; $x < $n; $x++) {
                                $pr = $resultset->fetch_assoc();
                               
                                $resultset2 = Database::search("SELECT * FROM `product` WHERE `id`='" . $pr["id"] . "' ");

                                $resultset3 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pr["id"] . "'");
                                $primg = $resultset3->fetch_assoc();


                            ?>


                                <div class="card mt-2 mb-2" style="width: 18rem;">
                                    <img src="<?php echo $primg["code"] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <?php
                                        if (isset($_SESSION["c"])) {
                                            $email = $_SESSION["c"]["email"];
                                            $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $pr["id"] . "'");
                                            $watchlistProductNum = $watchlistProducts->num_rows;
                                            if ($watchlistProductNum == 0) {
                                        ?>
                                                <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-fill" onclick="addToWatchlist(<?php echo $pr['id'] ?>)"></i></p>

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
                                        <p class="card-text"> <?php echo $pr["description"] ?></p>

                                        <div style="text-align: center;">


                                            <a href='<?php echo "singleProductView.php?id=" . ($pr["id"]) . ""  ?>' class=" btn btn-dark cardbutton">Buy Now</a>
                                            <a href="#" class=" btn btn-secondary cardbutton  fs-5 " onclick="addToCart(<?php echo $pr['id'] ?>)"><i class="bi bi-cart"></i></a>

                                        </div>
                                    </div>
                                </div>



                            <?php

                            }





                            ?>


                        </div>
                    </div>
                </div>
            </div>//

        </div>


    </div>
    <?php
    require "footer.php"; ?>
 <script src="//code.jivosite.com/widget/ALmSUiGInv" async></script>
    <script src="script.js"></script>
</body>

</html>