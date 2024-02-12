<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>imack | Invoice</title>

    <link rel="icon" href="resources/apple.svg" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />


    <link rel="stylesheet" href="bootstrap.css" />
    <!-- <link rel="stylesheet" href="style.css" /> -->

</head>

<body class="mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <hr />
            </div>
            <div class="col-12" id="page">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 text-center ">
                                <h2 class=" fw-bold">imak</h2>
                            </div>

                            <div class="col-12 text-center fw-bold">
                                <span> Colombo 03, Sri Lanka</span><br />
                                <span>+94114245698</span><br />
                                <span>imack@gmail.com</span>
                                <div class="text-end">
                                    <span class="fw-bold">Date & Time Of Invoice</span>&nbsp;
                                    <span class="fw-bold">2022-08-09 21:00:00</span>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-12">
                        <hr class="border border-1 border-secondary" />
                    </div>
                    <div class="col-12 mb-4">
                        <div class="col-12 mb-4">
                            <div class="row">
                                <div class="col-6  mt-1">
                                    <h1 class="text-secondary">INVOICE 01</h1>
                                </div>
                                <div class="col-6 text-end">
                                    <h5 class=" fw-bold ">INVOICE TO :</h5>
                                    <span>_______</span>
                                    <span>________</span><br />
                                    <span>__@gmail.com</span>
                                </div>

                            </div>

                        </div>
                        <div class=" col-12">
                            <table class="table">
                                <thead>
                                    <tr class="border border-1 border-white">
                                        <th>#</th>
                                        <th>Oder ID & Product</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 72px;">
                                        <td class="bg-dark text-white fs-3">01</td>
                                        <td>
                                            <span class="fw-bold p-2 text-wa text-decoration-underline">0000x</span><br />
                                            <span class="fw-bold p-2 fs-3 ">_____________</span>
                                        </td>
                                        <td class="fs-6 text-end pt-3 bg-secondary text-white ">Rs. X00000 .00</td>
                                        <td class="fs-6 text-end pt-3">01</td>
                                        <td class="fs-6 text-end  pt-3 ">Rs.X00000 .00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end">Net Total</td>
                                        <td class="text-end">Rs. X0000 .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end border-dark">Discount</td>
                                        <td class="text-end border-dark">Rs. 00 .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end border-secondary text-secondary fw-bold">Card</td>
                                        <td class="text-end border-secondary text-secondary fs-5 fw-bold ">Rs. X0000 .00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12 mt-3 mb-3">
                                        <label class="form-lable fs-5 fw-bold">NOTICE :</label><br />
                                        <label class="form-lable fs-6">Purchased Item Can Be Return Before 14 days of Delivery.</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-12 mb-1 btn-toolbar justify-content-end">
                <button class="btn btn-dark me-2" onclick="printInvoice();">Print</button>
                <button class="btn btn-secondary me-2">Export as PDF</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>


   


</html>