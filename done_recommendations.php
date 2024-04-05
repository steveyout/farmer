<?php
require_once "config.php";
session_start();
$reg_no=$_SESSION['regno'];
if (!isset($reg_no)){
    header("location: login.php");
}

///check whether variable submit from form is set
if(isset($_POST['submit'],$_POST['id'])) {
    $recommendation=true;
    $id=$_POST['id'];
    $sql = "UPDATE cows SET cow_recommendation=:recommendation WHERE id=$id";
///prepare the insert statements
    $query = $db->prepare($sql);
    $query->bindParam(':recommendation', $recommendation);
    $result=$query->execute();
    if ($result){
        echo "Recommendations marrked as done";
    }else{
        //incase of error
        echo "Something went wrong";
    }
}else{
    ///if no submit
    echo "Some fields are missing";
}