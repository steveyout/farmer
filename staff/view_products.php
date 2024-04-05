<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ordered Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="report.css">
    <style>
        .inline{
            display: inline-block;
            float: right;
            margin: 20px 0px;
        }

        input, button{
            height: 34px;
        }
    </style>
</head>
<body>
<?php

///database connection
require_once "config.php";
//check for id
if (!isset($_GET['id'])){
    echo "Please provide farmer id";
    exit();
}
$id=$_GET['id'];
$sql = "SELECT * FROM orders where FarmerReg_No=$id";
$results=$db->query($sql)->fetchAll();


?>
<h2>Ordered products</h2>
<form action="" method="get">
</form>

<table>
    <thead>
    <tr>
        <th>Farmer Reg No</th>
        <th>product</th>
        <th>Payment</th>
        <th>Price</th>
        <th>Location</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row){
        $name=$row['name'];
        $id=$row['FarmerReg_No'];
        $price=$row['price'];
        $location=$row['FarmerLocation'];
        $payment=$row['payment'];
        $time=$row['created_at'];
        $src=$row['src'];
            echo " 
 <tr>
 <td>$id</td>
 <td> <img alt='img' src='../$src' width='20' height='20'> $name</td>
 <td>$payment</td>
 <td>Kes $price</td>
 <td>$location</td>
 <td>$time</td>
 </tr>
        ";
    }
    ?>
    </tbody>
</table>


</body>
</html>

