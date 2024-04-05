<?php
require_once "../database/config.php";
session_start();
$reg_no=$_SESSION['regno'];
if (!isset($reg_no)){
    header("location: login.php");
}
///check whether variable submit from form is set
if(isset($_POST['submit'])) {

    /*
     *$_POST method gets the value of the submitted form fields
     * eg $_POST['email'] gets form input field with name attribute email

    */
    $cowName = $_POST['cow_name'];
    $cowType = $_POST['cow_breed'];
    $cowProduction = $_POST['cow_production'];
    $cowStatus=$_POST['cow_status'];
        foreach ($cowName as $index => $cow) {
            $type = $cowType[$index];
            $status=isset($cowStatus[$index])?$cowStatus[$index]:null;
            $production = isset($cowProduction[$index])?$cowProduction[$index]:null;
           $sql = "UPDATE cows SET sales=:production,cow_status=:status WHERE FarmerReg_No=:regno and type=:type";
///prepare the insert statements
            $query = $db->prepare($sql);
            $query->bindParam(':production', $production);
            $query->bindParam(':regno', $reg_no);
            $query->bindParam(':type', $type);
            $query->bindParam(':status', $status);
            $query->execute();
        }
        ///create notification
         $msg="Farmer with Reg no $reg_no has updated the status of his cows";
         $sql="INSERT INTO notifications(message, type) VALUES ('$msg','admin')";
         $db->exec($sql);
        echo "Updated successfully";

    //redirect back
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

}
