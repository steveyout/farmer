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
$sql = "SELECT * FROM orders left join farmers f on orders.FarmerReg_No = f.FarmerReg_No GROUP BY orders.FarmerReg_No";
$results=$db->query($sql)->fetchAll();


?>
<h2>Ordered products</h2>
<form action="" method="get">
</form>

<table>
    <thead>
    <tr>
        <th>Farmer Reg No</th>
        <th>Farmer Name</th>
        <th>Farmer Contact</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row){
        $id=$row['FarmerReg_No'];
        $fName=$row['FarmerName'];
        $contact=$row['FarmerContact'];
            echo " 
 <tr>
 <td>$id</td>
 <td>$fName</td>
 <td>$contact</td>
 <td><a class='btn btn-success' href='view_products.php?id=$id'>View Products</a></td>
 </tr>
        ";
    }
    ?>
    </tbody>
</table>


</body>
</html>

