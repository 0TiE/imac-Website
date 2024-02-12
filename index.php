<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="body">


    <!-- Model1 -->
    <!-- <a onclick="signUpModel();" class="link-danger">sign up </a>or -->
    <div class="modal " tabindex="-1" id="Model1">
        <div class="modal-dialog ">
            <div class="modal-content bg-dark ">
                <div class="text-center mt-1">

                    <h5 class="modal-title">Signup</h5>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <span class="text-danger" id="error"></span>
                        <div class="col-12 p-2 ">
                            <label class="form-label"> Name</label>
                            <input class="form-control" type="text" id="name" />
                        </div>

                        <div class="col-12 p-2">
                            <label class="form-label"> Email</label>
                            <input class="form-control" type="email" id="email" />
                        </div>
                        <div class="col-12 p-2">
                            <label class="form-label">password</label>
                            <input class="form-control" type="password" id="password" />
                        </div>
                        <div class="col-12 p-2">
                            <label class="form-label">Mobile</label>
                            <input class="form-control" type="mobile" id="mobile" />
                        </div>
                    </div>
                    <div class="col-2 text-end ">
                        <a onclick="signInModel();" class="link-danger L1"><b>Signin</b> </a>
                    </div>
                </div>

                <div class="col-12 text-end mb-3">
                    <button type="button" class="btn btn-outline-light" onclick="signUp();">Signup</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>

                </div>


            </div>

        </div>
    </div>
    <!-- Model1 -->




    <!-- Model2 -->
    <?php


    $email = "";
    $password = "";

    if (isset($_COOKIE["email"])) {
        $email = $_COOKIE["email"];
    }

    if (isset($_COOKIE["password"])) {
        $password = $_COOKIE["password"];
    }


    ?>
    <!-- <a onclick="signInModel();" class="link-danger">sign in </a> -->
    <div class="modal " tabindex="-1" id="Model2">
        <div class="modal-dialog">
            <div class="modal-content bg-dark ">
                <div class="text-center mt-1">
                    <h5 class="modal-title">Signin</h5>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <span class="text-danger" id="error1"></span>
                        <div class="col-12 p-2 ">
                            <label class="form-label "> Email</label>
                            <input class="form-control" type="email" id="email1"  value="<?php echo $email?>"/>
                        </div>
                        <div class="col-12 p-2 ">
                            <label class="form-label">password</label>
                            <input class="form-control" type="password" id="password1" value="<?php echo $password?>" />
                        </div>
                        <div class="row">
                            <div class="col-8 ">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input " value="1" id="rememberMe" />
                                    <label class="form-check-lable">Remember Me</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <a href="#" class="link-info" onclick="fogotpassword();"><b>Fogot Password</b></a>
                        <a onclick="signUpModel();" class="link-warning L1"><b>Signup</b> </a>
                    </div>
                </div>

                <div class="col-12 text-end mb-3 ">
                    <button type="button" class="btn btn-outline-light" onclick="signIn();">Signin</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Model2 -->

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>