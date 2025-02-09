<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmers status report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
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
<body style="overflow: scroll!important;">
<nav>
    <div class="navbar">
        <div class="logo"><img src="images/logo.png"></a></div>
        <ul class="menu">
            <li ><a class="active" href="home.php">Home</a></li>
            <li ><a href="products.php">Products</a></li>
            <li ><a href="notifications.php">Notifications</a></li>
            <li ><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<?php

///database connection
require_once "config.php";


////you forgot to query
$sql="SELECT * FROM farmers";

///query here
$results=$db->query($sql)->fetchAll();
?>
<table style="margin-top: 100px">
    <thead>
    <tr>
        <th>REG NUMBER</th>
        <th>NAME</th>
        <th>CONTACT</th>
        <th>ID NUMBER</th>
        <th>LOCATION</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row) {
        ///get the farmers details
        $reg=$row["FarmerReg_No"];
        $name=$row["FarmerName"];
        $contact=$row["FarmerContact"];
        $id=$row["FarmerId_No"];
        $location=$row['FarmerLocation'];
        //display each farmer's details in the table row
    echo "<tr>
        <td>$reg</td>
        <td>$name</td>
        <td>$contact</td>
        <td>$id</td>
         <td>$location</td>
    </tr>";
    }
    
    ?>
    </tbody>
</table>


</body>
</html>