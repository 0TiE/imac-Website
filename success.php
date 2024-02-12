<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>success</title>

    <link rel="icon" href="resources/logo.svg" />
    
    <link rel="stylesheet" href="bootstrap.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

        .success-container {
            width: 50%;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #bdc3c7;
            font-weight: bold;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body onload="alert('The invoice has been sent to your email address. Please check.');">
    <div class="success-container text-center">
        

            <h3 class="mt-5">Your Transaction has been Successfully Completed</h3>
       
    </div>

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>