<?php
//database connection
require_once "database/config.php";
require "mpesa-master/src/autoload.php";
use Kabangi\Mpesa\Init as Mpesa;
$mpesa = new Mpesa();


//start the session
session_start();
$reg_no = $_SESSION['regno'];
//if farmer isnt logged in
if (!isset($reg_no)) {
    header("location: login.php");
}

//check if items exits
if (isset($_GET['items'],$_GET['total'],$_GET['payment'])) {
    try {
        //items is an array
        $items = $_GET['items'];
        $number=isset($_GET['mpesa'])?$_GET['mpesa']:null;
        $total=$_GET['total'];
        echo $total;
        $payment=isset($_GET['payment'])?$_GET['payment']:null;
        $paymentMethod=null;
        if (isset($number)) {
            $mpesa->STKPush([
                'amount' => $total,
                'transactionDesc' => 'Farmer system',
                'phoneNumber' => $number,
                'accountReference' => 'Farmers System',
                'callBackURL' => 'https://example.com/v1/payments/C2B/confirmation',
            ]);
            $paymentMethod='mpesa';
            echo "<script>window.alert('A payment prompt has been sent to your phone please confirm payment')</script>";
        }else{
            $paymentMethod='cash';
        }

        //convert items to php array
        $items = json_decode($items);
        //loop over the items
        foreach ($items as $item) {
            ///get item details
            $name = $item->brand;
            $price = $item->price;
            $src = $item->src;
///sql statement to select all products from the database
            $sql = "INSERT INTO orders(FarmerReg_No, name, price,FarmerLocation,src,payment) VALUES ($reg_no,'$name',$price,(SELECT FarmerLocation FROM farmers WHERE FarmerReg_No=$reg_no),'$src','$paymentMethod')";
            $query = $db->query($sql);

        }
        echo "<script>alert('Products added successfully')</script>";
    }catch (Exception $e){
        echo $e->getMessage();
    }
    }else{
        echo "No items in cart";
    }
?>
<!DOCTYPE html>
-->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Products </title>
    <link rel="stylesheet" href="products.css">
    <style>
        .btn{
    width: 5cm;
            height: 1.2cm;
            border: 1px solid transparent;
            cursor: pointer!important;
            border-radius: 5px;
            text-decoration: none;
            padding: 5px;
        }

        .btn-success{
    border: 1px solid green;
            color: white;
            background-color: green;
        }
        .btn-success:hover{
    color: green;
    background-color: transparent;
        }

        .btn-error{
    color: white;
    border: 1px solid red;
            width: 3cm!important;
            background-color: red;
        }
        .btn-error:hover{
    color: red;
    background-color: transparent;
        }

        .container {
    display: flex;
    align-items:center;
            justify-content: center;
            position: fixed;
            bottom: 10px;
            right: 50px;
        }

        .button {
    position: relative;
    border-radius: 4px;
            border: 2px solid green;
            padding: 15px 30px;
            color: white;
            background-color: green;
            box-shadow: 0 2px 10px rgba(0,0,0,.15);
            cursor: pointer;
            text-decoration: none;
            user-select: none;
            transition: all .3s;

        &:hover {
        transform: scale(1.03);
        background: rgba(0,0,0,.13);
        box-shadow: 0 2px 20px rgba(0,0,0,.15);
         }

        &:active {
        transform: scale(.96);

        .badge {
            transform: scale(1.2);
        }
        }
        }

        .badge {
    border-radius: 50%;
            width: 30px;
            height: 30px;
            display: block;
            position: absolute;
            background: white;
            color: green;
            border: 2px solid green;
            display: flex;
            align-items: center;
            justify-content: center;
            top: -15px;
            right: -15px;
            transition: all .3s;
        }

        .modal {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
            margin-top: 100px;
        }

        .modal:target {
    visibility: visible;
    opacity: 1;
}

        .modal__content {
    border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
            height: 400px;
            overflow: scroll;
        }

        .modal__footer {
    text-align: right;
        a {
        color: #585858;
    }
        i {
        color: #d02d2c;
    }
        }
        .modal__close {
    position: absolute;
    top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
        }
        input{
    width: 5cm;
            border-radius: 5px;
            border-color: green;
            height: 0.8cm;
            margin-top: 20px;
        }

    </style>
</head>
<body>
<nav>
    <div class="navbar">
        <div class="logo"><img src="images/logo.png"></a></div>
        <ul class="menu">
            <li ><a class="active" href="farmers/home.php">Home</a></li>
            <li ><a href="farmer_status_report.php">Status Report</a></li>
            <li ><a href="staff/notifications.php">Notifications</a></li>
            <li ><a href="farmers/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="layout">
    <section class="inner">
    <button class="btn btn-success" style="width: 90%;margin-right: 50px;margin-left: 50px" onclick="cash()">Cash</button>
    <button class="btn btn-success" style="width: 90%;margin: 50px" onclick="mpesa()">Mpesa</button>
        <form action="create_order.php" method="get">
            <div style="display: flex;justify-content: center;align-content: center">
                <div>
                    <input name="mpesa" type="tel" style="display: none" id="mpesa" placeholder="Mpesa number eg 254719567930" required>
                </div>
            </div>

            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </section>
    </div>
</body>
<script>
    function cash(element){
        window.location.replace(window.location.href+"&payment=cash");
    }
    function mpesa(){
        let number=document.getElementById('mpesa')
        number.style="disolay=block;"
    }

    document.querySelector("form").addEventListener("submit", function(e){
            e.preventDefault();    //stop form from submitting
        let number=document.getElementById('mpesa')
        window.location.replace(window.location.href+`&payment=mpesa&mpesa=${number.value}`);
    });
</script>