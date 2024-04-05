<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Appointments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="../report.css">
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
//start and initialize the session
session_start();
//if no session with the vet email
if (!isset($_SESSION['vet_email'])){
    //redirect to log in
    header('location: login.php');
    //prevent other code execution
    exit();
}
///get the vets email from the session
$email=$_SESSION['vet_email'];

$sql="SELECT * FROM vets LEFT JOIN clents ON vets.Vet_ID = clents.vet_id LEFT JOIN farmers ON farmers.FarmerName=clents.farmer_name Left Join cows c on farmers.FarmerReg_No = c.FarmerReg_No WHERE vets.email='$email' GROUP BY clents.id";
$results=$db->query($sql)->fetchAll();


?>
<h2>My Booked Appointments</h2>
<table>
    <thead>
    <tr>
        <th>Farmer Name</th>
        <th>Farmer Contact</th>
        <th>Cow Tag</th>
        <th>Booked At</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row){
        $name=$row['name'];
        $booked_at=$row['booked_at'];
        $farmer=$row['FarmerName'];
        $contact=$row['FarmerContact'];
            echo " 
 <tr>
 <td>$farmer</td>
 <td>$contact</td>
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

