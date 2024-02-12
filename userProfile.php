<!DOCTYPE html>
<html>

<head>
    <title>imak| User</title>

    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>User Profile</title>

    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body class=>
    <?php 
        require "connection.php";
    require "header.php" ?>
    <?php

    if (isset($_SESSION["c"])) {

    ?>
        <div class="container-fluid bg-body rounded  mb-4">
            <div class="row">

                <div class="col-md-5">

                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">


                        <?php
                        $profileImg = Database::search("SELECT * FROM `user_img` WHERE `email` = '" . $_SESSION["c"]["email"] . "' ");
                        $pn = $profileImg->num_rows;

                        if ($pn == 1) {
                            $p = $profileImg->fetch_assoc();
                        ?>

                            <img class="rounded mt-5" width="150px" src="<?php echo $p["code"]; ?>" id="prev0" />

                        <?php

                        } else {
                        ?>

                            <img class="rounded mt-5" width="250px" src="resources\Profile\User.png" id="prev0" />
                        <?php
                        }

                        ?>






                        <span class="fw-bold"><?php echo $_SESSION["c"]["name"]; ?></span>
                        <span><?php echo $_SESSION["c"]["email"]; ?></span>
                        <input class="d-none" type="file" id="profileimg" accept="img/*" />
                        <label class="btn btn-success mt-3 " for="profileimg" onclick="changeImage();">Update Profile image</label>
                    </div>

                </div>

                <div class="col-md-5 ">
                    <div class="p3 py-5">

                        <div class="col-10">
                            <label class=" fw-bold fs-2 mt-4">User Profile</label>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="form-label">Full Name</label>
                                <input type="text" id="name" readonly class="form-control" placeholder="First Name" value="<?php echo $_SESSION["c"]["name"] ?>" />
                            </div>


                        </div>

                        <div class="row mt-3">

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Mobile no.</label>
                                <input type="text" id="mobile" readonly class="form-control" placeholder="enter your mobile number" value="<?php echo $_SESSION["c"]["mobile"] ?>" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <input readonly type="password" class="form-control" placeholder="enter your password" id="show_text" aria-label="enter your password" aria-describedby="button-addon2" value="<?php echo $_SESSION["c"]["password"] ?>">
                                    <button class="btn btn-outline-secondary" id="button-addon2" type="button" onclick="pswd_addon();"><i class="bi bi-eye-fill" id="img_show"></i><i class="bi bi-eye-slash-fill d-none" id="img_hide"></i></button>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email Address</label>
                                <input readonly type="email" class="form-control" placeholder="enter your email address" value="<?php echo $_SESSION["c"]["email"] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Registered Date</label>
                                <input readonly type="text" class="form-control" placeholder="enter your registered date" value="<?php echo $_SESSION["c"]["register_date"] ?>">
                            </div>

                            <?php
                        
                            $usermail = $_SESSION["c"]["email"];
                            $address = Database::search("SELECT * FROM `user_address` WHERE `email` = '" . $usermail . "' ");
                            $a = $address->fetch_assoc();
                            ?>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 01</label>
                                <input type="text" id="addline1" value="<?php echo $a["address01"] ?>" class="form-control" placeholder="address line 01" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 02</label>
                                <input type="text" id="addline2" value="<?php echo $a["address02"] ?>" class="form-control" placeholder="address line 02" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Postal Code</label>
                                <input type="text" class="form-control" value="<?php echo $a["posatalcode"] ?>" placeholder="postal code" id="postal" />
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <button class="btn btn-primary" onclick="profileupdate();">Update Profile</button>
                        </div>
                    </div>
                </div>




            </div>

        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="script.js"></script>
</body>
<?php require "footer.php" ?>

</html>

<?php
    } else {
?>

    <script>
        alert("Please Sign in First.");
        window.location = "home.php";
    </script>
<?php

    } ?>