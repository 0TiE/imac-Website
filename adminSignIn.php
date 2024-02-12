<!DOCTYPE html>
<html>

<head>
    <title>imak | Admin Sign in</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="bootstrap.css" />



</head>

<body onload="adminSignInModel();">


    <div class="modal " tabindex="-1" id="Model3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign in to your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12  d-block ">
                        <div class="row g-3">

                            <div class="col-12">
                                <labe class="form-label">Email</label>
                                    <input type="email" class="form-control" id="e" />
                            </div>
                            <div class="col-12">
                                <labe class="form-label">password</label>
                                    <input type="password" class="form-control" id="p" />
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                    <button type="button" class="btn btn-primary" onclick="adminVerify();">verify</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal " tabindex="-1" id="Model4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign in to your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12  d-block ">
                        <div class="row g-3">

                            
                            <div class="col-12">
                                <labe class="form-label">verification code</label>
                                    <input type="password" class="form-control" id="vc" />
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="adminVerify2();">verify</button>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>

</body>

</html>