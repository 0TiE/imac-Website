<?php


require "connection.php";
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
include("./config.php");

$token = $_POST["stripeToken"];
$contact_name = $_POST["c_name"];
$token_card_type = $_POST["stripeTokenType"];
$phone           = $_POST["phone"];
$email           = $_POST["stripeEmail"];
$address         = $_POST["address"];
$amount          = $_POST["amount"];
// $desc            = $_POST["product_name"];
$pid            = $_POST["pid"];

$qty            = $_POST["qty"];
$charge = \Stripe\Charge::create([
  "amount" => str_replace(",", "", $amount),
  "currency" => 'LKR',
  "description" => $pid,
  "source" => $token,
]);

if ($charge) {



  session_start();



  ///////////


  $umail = $_SESSION["c"]["email"];

  $order_id = uniqid();

  $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
  $product_data = $product_rs->fetch_assoc();

  $unit_price = $product_data["price"];
  $qty0= $product_data["qty"];
  $qty1=$qty0-$qty;
  $total = $unit_price * $qty;

  $d = new DateTime();
  $tz = new DateTimeZone("Asia/Colombo");
  $d->setTimezone($tz);
  $date = $d->format("Y-m-d H:i:s");

  Database::iud("INSERT INTO `invoice` (`order_id`,`product_id`,`user_email`,`date`,`total`,`qty`,`status_id`)
VALUES('" . $order_id . "','" . $pid . "','" . $umail . "','" . $date . "','" . $total . "','" . $qty . "','0')");


Database::iud("UPDATE `product`  SET `qty`='".$qty1."' WHERE `id`='" . $pid . "'  ");




  echo $order_id;
  echo $qty;




  $mail = new PHPMailer;
  $mail->IsSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'ravidunalawaththa@gmail.com';
  $mail->Password = 'mqfjhllwcqpskqqp';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('ravidunalawaththa@gmail.com', 'imak');
  $mail->addReplyTo('ravidunalawaththa@gmail.com', 'imak');
  $mail->addAddress('ravidunalawaththa@gmail.com');
  $mail->isHTML(true);
  $mail->Subject = 'Invoice';
  $bodyContent = '
  <style>
  
  * {
    overflow-x: hidden;
    font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
    font-style: oblique;
}
  </style>
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
                                      <span class="fw-bold">'.$date.'</span>
  
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
                                      <span>'.$_SESSION["c"]["name"].'</span>
                                <br />
                                      <span>'.$_SESSION["c"]["email"].'</span>
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
                                              <span class="fw-bold p-2 text-wa text-decoration-underline">'.$order_id.'</span><br />
                                              <span class="fw-bold p-2 fs-3 ">'.$product_data["description"].'</span>
                                          </td>
                                          <td class="fs-6 text-end pt-3 bg-secondary text-white ">Rs. '.$product_data["price"].' .00</td>
                                          <td class="fs-6 text-end pt-3">'.$qty.'</td>
                                          <td class="fs-6 text-end  pt-3 ">Rs.'.$total.' .00</td>
                                      </tr>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td colspan="3" class="border-0"></td>
                                          <td class="fs-5 text-end">Net Total</td>
                                          <td class="text-end">Rs. '.$total.' .00</td>
                                      </tr>
                                      <tr>
                                          <td colspan="3" class="border-0"></td>
                                          <td class="fs-5 text-end border-dark">Discount</td>
                                          <td class="text-end border-dark">Rs. 00 .00</td>
                                      </tr>
                                      <tr>
                                          <td colspan="3" class="border-0"></td>
                                          <td class="fs-5 text-end border-secondary text-secondary fw-bold">Card</td>
                                          <td class="text-end border-secondary text-secondary fs-5 fw-bold ">Rs. '.$total.' .00</td>
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
                                          <label class="form-lable fs-6">Enjoy free islandwide delivery and purchases can be returned up to 14 days prior to delivery.</label>
  
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
  
                  </div>
              </div>
  
  
              
          </div>
      </div>
  
  </body>
  ';
  $mail->Body    = $bodyContent;
  $mail->send();
  

   header("Location:success.php");
}
