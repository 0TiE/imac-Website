<?php

require "connection.php";

$sText = $_POST["st"];

$query = "SELECT * FROM product WHERE `description` LIKE '%" . $sText . "%'";

$query1 = $query;

$products = Database::search($query);
$nProducts = $products->num_rows;


?>


            <?php

            if ("0" != ($_POST["page"])) {

                $pageno = $_POST["page"];
            } else {

                $pageno = 1;
            }



            $userProducts = $products->fetch_assoc();

            $results_per_page = 6;
            $number_of_pages = ceil($nProducts / $results_per_page);


            $viewed_results_count = ((int)$pageno - 1) * $results_per_page;
            $query1 .= "LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . " ";
            $selectedrs = Database::search($query1);
            $srn = $selectedrs->num_rows;


            if ($srn == "0") {
                ?>
                
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <img src="resources/carosel/Search reveals no products found_.png" class="d-block img ">
                            </div>
                        <?php
                    } else {
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <img src="resources/carosel/Artboard_1_copy_4.png" class="d-block img ">
                                    </div>
                
                                    <div class=" row justify-content-center gap-2 ">
                                    <?php
                                }
            while ($ps = $selectedrs->fetch_assoc()) {
            ?>

                <div class="card mt-2 mb-2" style="width: 18rem;">
                    <?php

                    $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $ps["id"] . "' ");
                    $presult = $pimgrs->fetch_assoc();

                    ?>
                    <img src="<?php echo $presult["code"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION["c"])) {
                            $email = $_SESSION["c"]["email"];
                            $watchlistProducts = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' AND `pid`='" . $ps["id"] . "'");
                            $watchlistProductNum = $watchlistProducts->num_rows;
                            if ($watchlistProductNum == 0) {
                        ?>
                                <p class="card-text  text-end fs-3"> <i class="bi bi-bookmark-fill" onclick="addToWatchlist(<?php echo $ps['id'] ?>)"></i></p>

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
                        <p class="card-text"> <?php echo $ps["description"] ?></p>

                        <div style="text-align: center;">


                            <a href='<?php echo "singleProductView.php?id=" . ($ps["id"]) . ""  ?>' class=" btn btn-dark cardbutton">Buy Now</a>
                            <a href="#" class=" btn btn-secondary cardbutton  fs-5 " onclick="addToCart(<?php echo $ps['id'] ?>)"><i class="bi bi-cart"></i></a>

                        </div>
                    </div>
                </div>
            <?php
            }
            if ($srn == "0") {

            }else{
                ?>
                
            <div class=" offset-11  col-12  mb-3 ">
                <div class="row">
                    <div class="pagination">

                        <!-- left arrow -->
                        <a <?php if ($pageno <= 1) {
                                echo "#";
                            } else {

                            ?> onclick="basicSearch('<?php echo ($pageno - 1); ?>');" <?php

                                                                                    } ?>> &laquo;</a>
                        <!-- left arrow -->


                        <?php

                        for ($page = 1; $page <= $number_of_pages; $page++) {

                            if ($page == $pageno) {
                        ?>

                                <a onclick="basicSearch('<?php echo $page; ?>');" class="active"><?php echo $page; ?></a>

                            <?php

                            } else {
                            ?>

                                <a onclick="basicSearch('<?php echo $page; ?>');"><?php echo $page; ?></a>

                        <?php

                            }
                        }

                        ?>

                        <!-- right arrow -->
                        <a <?php if ($pageno >= $number_of_pages) {
                                echo "#";
                            } else {

                            ?> onclick="basicSearch('<?php echo ($pageno + 1); ?>');" <?php

                                                                                    } ?>>&raquo;</a>
                        <!-- right arrow -->

                    </div>
                </div>
            </div>
                <?php
            }
            ?>








        </div>
    </div>
</div>
<?php
require "footer.php"
?>