<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>


</head>

<body>
    <header>
        <div class="col-12  ">

            <div class="row   ">
                <div class="col-9  ">
                    <span class="offset-2">
                        <i class="bi " style="font-size:25px;"></i>
                        <b>Hotline : (+94) 115 500 505 | (+94) 115 112 525</b>
                    </span>

                </div>
                <div class="col-3  ">
                    <span class="offset-2">
                        <i class="bi bi-apple text-dark " style="font-size:25px;"></i>
                        <b> Apple Authorized Reseller</b>
                    </span>

                </div>
            </div>

        </div>
        <div class="col-12  bg-dark text-white pb-3 pt-3 ">

            <div class="row mt-1 mb-1  ">
                <div class="col-3  ">
                    <span class="offset-2">
                        <a  href="home.php" class="text-decoration-none text-white "><i class="bi bi-apple " style="font-size:25px;">
                            
                            </i></a>
                        <b>imak</b>
                    </span>
                    
                </div>
                <div class="col-5 ">
                    <div class="input-group">
                        <input type="text" class="form-control " placeholder="Search.." id="search_txt">
                        <div class="input-group-text btn btn-dark" id="" onclick="basicSearch(0);"><i class="bi bi-search"></i></div>
                        <a  class="text-decoration-none mt-2 text-light mb-1 mx-1" href="advancesearch.php"><b >Advance search</b></a>
                    </div>
                    
                </div>
                <div class="col-4 ">

                    <span class="offset-0 offset-lg-4">
                        <?php
                        session_start();
                        if (isset($_SESSION["c"])) {
                        ?>

                            <?php
                            ?>

                            <b onclick="signOut(); " class="L1 ">LogOut |</b>

                        <?php
                        } else {
                        ?>
                            <b onclick="  signInModel();" class="L1 ">Login |</b>
                        <?php
                        }
                        ?>


                        <?php
                        require "index.php"; ?>

                        <a href="watchlist.php" class="text-decoration-none text-white"> <i class="bi bi-bookmark-fill L1" style="font-size: 22px;"></i></a>


                       <a href="userProfile.php" class="text-decoration-none text-white"> <i class="bi bi-person-fill L1 " style="font-size: 22px;"></i></a>


                        <a href="cart.php" class="text-decoration-none text-white"><i class="bi bi-cart-fill L1 " style="font-size: 22px;"> </i></a>

                    </span>
                    <span class="L1 "><b>Rs.0.00</b></span>
                </div>

            </div>

        </div>


        <div class=" col-12 d-none d-lg-block pb-3 pt-3  mb-5 bg-white">
            <div class="row  mb-2">
                <div class=" col-2 "></div>
                <div class="col-1 L1 ">

                    <a href="productCategory.php?id=1 " class="text-decoration-none text-dark"><b>Mac</b></a>

                </div>
                <div class="col-1 L1 ">
                    <a href="productCategory.php?id=2 " class="text-decoration-none text-dark"> <b>ipad</b></a>

                </div>
                <div class="col-1 L1 ">
                    <a href="productCategory.php?id=3 " class="text-decoration-none text-dark"> <b>iphone</b></a>
                </div>
                <div class="col-1 L1 ">
                    <a href="productCategory.php?id=4 " class="text-decoration-none text-dark"> <b>watch</b></a>
                </div>
                <div class="col-1 L1 ">
                    <a href="# " class="text-decoration-none text-dark"> <b>Tv</b></a>
                </div>
                <div class="col-1 L1 ">
                    <a href="#" class="text-decoration-none text-dark"> <b>Music</b></a>
                </div>
                <div class="col-1 L1 ">
                    <a href="#" class="text-decoration-none text-dark"> <b>Accessorices</b></a>

                </div>
                <div class="col-1 offset-2 L1 ">
                    <a href="https://support.apple.com/" class="text-decoration-none text-dark"> <b>Support</b></a>

                </div>


            </div>


    </header>


<script src="bootstrap.bundle.js" ></script>
</body>

</html>