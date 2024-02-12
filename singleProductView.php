<?php
require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];





    $resultset = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'  ");
    $pr = $resultset->fetch_assoc();
    $resultset2 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ");
    $primg = $resultset2->fetch_assoc();
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>imak | Single Product View</title>
    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./style.css" />

</head>

<body class="x">
    <?php require "header.php" ?>
    <div class="container-fluid ">

        <div class="row mb-4">

            <div class="col-lg-12 offset-1 ">
                <div class="row mt-3 mb-3 ">
                    <div class="col-12">
                        <div class="row mb-5 ">
                            <nav>
                                <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white rounded ">
                                    <li class="breadcrumb-item ">
                                        <a href="Home.php" class="text-decoration-none text-dark">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-decoration-none text-black-50 fw-bold">Single Product View</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                    <div class="col-4 order-1 ">
                        <div class="align-items-center ">
                            <div class="singleproduct">
                                <img src="<?php echo $primg["code"] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-2 order-2 ">

                    </div>


                    <div class="col-4 order-3 ">
                        <div class="row offset-1">
                            <div class="col-12">
                                <span class="badge bg-secondary">New</span>
                                <label class="form-lable fs-3 fw-bold mt-0"><?php echo $pr["description"] ?></label>
                                <br />
                                <label class="form-lable fs-4  fw-bold text-danger mt-0">Rs.<?php echo $pr["price"] ?>.00</label>
                            </div>

                            <div class="col-12">
                                <div class="row mt-5">
                                    <div class="col-2 fw-bolder fs-5 d-grid">
                                        <label>Qty</label>
                                    </div>
                                    <div class="col-2  d-grid ">
                                        <select class="fw-bolder border-0" id="qty">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    
                                   


                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row mt-5 g-2">
                                    <div class="col-6  d-grid">
                                        <button class="btn btn-secondary" style="background-color:rebeccapurple;" onclick="addToCart(<?php echo $pr['id'] ?>)">Add To Cart</button>
                                    </div>
                                    <div class="col-6  d-grid">
                                        <button class="btn btn-dark" onclick=" checkOutProcess(<?php echo $pr['id'] ?>)">Buy Now</button>
                                    </div>
                                    <div class="col-6 d-grid offset-3">
                                        <?php
                                        if (isset($_SESSION["c"])) {
                                            $email = $_SESSION["c"]["email"];
                                            $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $pr["id"] . "'");
                                            $watchlistProductNum = $watchlistProducts->num_rows;
                                            if ($watchlistProductNum == 0) {
                                        ?>
                                                <button class="btn btn-secondary" onclick="addToWatchlist(<?php echo $pr['id'] ?>)">Add To Watchlist</button>

                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-secondary">Add To Watchlist</button>
                                        <?php

                                            }
                                        } else {
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mt-5 g-2">
                    <div class="col-2 text-info">Prodct details</div>
                    <div class="col-2">Specification</div>
                    <div class="col-2">Delivery info</div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-inline-block">
                        <label class="fw-bold fs-4 mt-1"><?php echo $pr["description"] ?></label><br />
                        <!-- <label class="fw-bold fs-6 mt-1 text-info">(For More Infomation Please Contact)</label> -->
                    </div>


                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php" ?>

    <script src="script.js"></script>
</body>

</html>