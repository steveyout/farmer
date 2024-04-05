<?php
include '../conn.php';
session_start();
if (!isset($_SESSION['vet_email'])){
    header('location: login.php');
    exit();
}
//check for id
if (!isset($_GET['id'],$_GET['date'])){
    echo "Please provide farmer id and date";
    exit();
}
$id=$_GET['id'];
$date=$_GET['date'];
$booked=true;
$sql = "UPDATE cows SET is_booked=:booked,booked_at='$date' WHERE id=$id";
///prepare the insert statements
$query = $db->prepare($sql);
$query->bindParam(':booked', $booked);
$result=$query->execute();
if ($result){
    echo "Farmer Booked successfully";
}else{
    //in case of error
    echo "Something went wrong";
}