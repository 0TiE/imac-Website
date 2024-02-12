<?php

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>imak | advancedSearch</title>
    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./style.css" />

</head>

<body>
    <div class="container-fluid">
        <div class="row">


            <div class="col-12 bg-white">
                <div class="row">
                    <div class="offset-0 offset-lg-4 col-12 col-lg-4">
                        <div class="row">

                            <div class="col-2 mt-2">
                                <div class="mb-3 logo-img"></div>
                            </div>

                            <div class="col-10">
                                <label class="text-black-50 fw-bold fs-2 mt-4">Advanced Search</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-0 offset-lg-2 col-12 col-lg-8 bg-white mt-3 mb-3 rounded">

                <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                    <div class="row">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 col-lg-6 mb-3">
                                    <select class="form-select" id="ca1" >
                                        <option value="0">Select Category</option>

                                        <?php
                                        $rs1 = Database::search("SELECT * FROM category");
                                        $n1 = $rs1->num_rows;

                                        for ($x = 0; $x < $n1; $x++) {
                                            $fa1 = $rs1->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <select class="form-select" id="mo1">
                                        <option value="0">Select Model</option>

                                        <?php
                                        $rs1 = Database::search("SELECT * FROM model");
                                        $n1 = $rs1->num_rows;

                                        for ($x = 0; $x < $n1; $x++) {
                                            $fa1 = $rs1->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    <select class="form-select" id="co1">
                                        <option value="0">Select Condition</option>

                                        <?php
                                        $rs1 = Database::search("SELECT * FROM `condition`");
                                        $n1 = $rs1->num_rows;

                                        for ($x = 0; $x < $n1; $x++) {
                                            $fa1 = $rs1->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <select class="form-select" id="col1">
                                        <option value="0">Select Colour</option>

                                        <?php
                                        $rs1 = Database::search("SELECT * FROM colour");
                                        $n1 = $rs1->num_rows;

                                        for ($x = 0; $x < $n1; $x++) {
                                            $fa1 = $rs1->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Price From" id="pf1"  />
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Price To" id="pt1"  />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">

                            <div class="col-12 col-lg-8 mt-3 mb-2">

                            </div>
                            <div class="col-12 col-lg-2 mt-3 mb-2 d-grid">
                                <button class="btn btn-dark search-btn1  " onclick='window.location="advancesearch.php"'>Clear</button>
                            </div>
                            <div class="col-12 col-lg-2 mt-3 mb-2 d-grid">
                                <button class="btn btn-primary search-btn1" onclick="advancedSearch(0);">Search</button>
                            </div>
                            <div class="col-12">
                                <hr class="border  border-3" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="advanceresult">
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
                </footer>
            </div>
        </div>


    </div>




    <script src="script.js"></script>

</body>

</html>