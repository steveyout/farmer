<?php
include '../conn.php';
session_start();
if (!isset($_SESSION['vet_email'])){
    header('location: login.php');
    exit();
}
if (isset($_POST['recommendations'],$_POST['id'])){
    ///get recommendations and id
    $recommendations=$_POST['recommendations'];
    $id=$_POST['id'];
    $recommendations=json_encode($recommendations);
    $sql="INSERT INTO recommendations(FarmerReg_No, cow_id, cow_name, list) VALUES ((SELECT FarmerReg_No FROM cows WHERE id=$id),$id,(SELECT name FROM cows WHERE id=$id),'$recommendations')";
    $results=$db->query($sql);
    if ($results){
        echo "Recommendations added";
    }else{
        //incase of error
        echo "Something went wrong";
    }
}else{
    ///if recommendations and id are missing
    echo "Some fields are missing";
}
