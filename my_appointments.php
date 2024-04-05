<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Appointments</title>
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
//initialise session
session_start();
$reg_no=$_SESSION['regno'];
if (!isset($reg_no)){
    header("location: login.php");
}
$sql = "SELECT * FROM cows where FarmerReg_No=$reg_no and is_booked=true";
$results=$db->query($sql)->fetchAll();


?>
<h2>My Booked Appointments</h2>
<table>
    <thead>
    <tr>
        <th>Cow Tag</th>
        <th>Booked At</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row){
        $name=$row['name'];
        $booked_at=$row['booked_at'];
            echo " 
 <tr>
 <td>$name</td>
        <td>$booked_at</td>
        </tr>
        ";
    }
    ?>
    </tbody>
</table>


</body>
</html>

