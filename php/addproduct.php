<?php session_start();
require "../connection.php";

if (isset($_SESSION["a"])) {
    echo $_SESSION["a"]["email"];
?>
    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
        <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <link rel="icon" href="..//resources/apple.svg" />
        <title>Add New Product</title>

        <!-- Custom CSS -->
        <link href="../dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar" data-navbarbg="skin6">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <div class="navbar-header" data-logobg="skin6">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-start me-auto">
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                                <form class="app-search position-absolute">
                                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <!-- <ul class="navbar-nav float-end"> -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                            </ul>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <!-- </ul> -->
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">

                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ManageUsers.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">ManageUsers</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ManageOrders.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">ManageOreders</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ManageProducts.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">ManageProducts</span></a></li>

                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="addProduct.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Add Product</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://app.jivosite.com/login" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Messages</span></a></li>


                        </ul>

                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 d-flex align-items-center">
                                    <li class="breadcrumb-item"><a href=".html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Add New </h1>
                        </div>
                        <!-- <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white" target="_blank">Upgrade to Pro</a>
                        </div>
                    </div> -->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="#" width="150" id="pr" />
                                        <h4 class="card-title m-t-10"></h4>

                                        <div class="row text-center justify-content-md-center">

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input class="d-none" type="file" id="img" accept="img/*" />
                                                <label class="btn btn-primary mt-3" for="img" onclick="Image();">upload Image</label>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <div>
                                    <hr>
                                </div>
                                <div class="card-body">



                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material mx-2">
                                        <div class="form-group">
                                            <label class=" btn btn-dark col-md-12 fw-bolder">Category +</label>

                                            <div class="col-md-12">
                                                <select class="form-select" id="category">

                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `category`");
                                                    $n = $rs->num_rows;
                                                    for ($x = 0; $x < $n; $x++) {

                                                        $c = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $c["id"]; ?>"><?php echo $c["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 btn btn-cyan fw-bolder " onclick="viewModel();">Model +</label>

                                            <div class="col-md-12">
                                                <select class="form-select" id="model">
                                                    <option value="0">Select Model</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `model`");
                                                    $n = $rs->num_rows;
                                                    for ($x = 0; $x < $n; $x++) {

                                                        $m = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $m["id"]; ?>"><?php echo $m["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 btn btn-light fw-bolder" onclick="viewcolourMoidel();">colour +</label>

                                            <div class="col-md-12">
                                                <select class="form-select" id="colour">
                                                    <option value="0">Select colour</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `colour`");
                                                    $n = $rs->num_rows;
                                                    for ($x = 0; $x < $n; $x++) {

                                                        $c = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $c["id"]; ?>"><?php echo $c["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <label class="col-md-12">Price</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" id="price" value="" class="form-control form-control-line">
                                        </div>
                                        <label class="col-md-12">QTY</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" id="qty" value="15" class="form-control form-control-line">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">description</label>
                                            <div class="col-md-12">
                                                <textarea rows="5" class="form-control form-control-line" id="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success text-white" onclick="addproduct('1');">Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dist/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="../dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../dist/js/custom.js"></script>
        <script src="../script.js"></script>
    </body>
    </body>

    </html><?php

        } else {
            ?>
    <script>
        window.location = "http://localhost/imac/php/adminDashboard.php";
    </script>
<?php
        } ?>



<!-- Model -->
<div class="modal" tabindex="-1" id="newcatagory">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                    <h5 class="modal-title">Add new model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
                    <div class="col-12  d-block ">
                        <div class="row g-3">

                            <div class="col-12">
                                <labe class="form-label">Model Name</label>
                                    <input type="email" class="form-control" id="i"  />
                            </div>
                            <div class="col-12">
                                <labe class="form-label">Email</label>
                                    <input type="email" class="form-control"  value="<?php   echo $_SESSION["a"]["email"];?>"/>
                            </div>


                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="addnewmodel()">Update</button>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Model -->
<div class="modal" tabindex="-1" id="newcolour">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                    <h5 class="modal-title">Add new colour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
                    <div class="col-12  d-block ">
                        <div class="row g-3">

                            <div class="col-12">
                                <labe class="form-label">Colour </label>
                                    <input type="email" class="form-control" id="c"  />
                            </div>
                            <div class="col-12">
                                <labe class="form-label">Email</label>
                                    <input type="email" class="form-control"  value="<?php   echo $_SESSION["a"]["email"];?>"/>
                            </div>


                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="addnewcolour();">Update</button>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>