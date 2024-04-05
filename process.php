<?php
session_start();
require_once('config.php');

echo "from config.php";

$registrationno = $_POST['regno'];
$password = $_POST['pass'];

$sql = "SELECT * from farmers WHERE FarmerReg_No=$registrationno AND password=$password LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect -> execute([$registrationno, $password]);
if($result){
    $user = $stmtselect -> fetch(PDO::FETCH_ASSOC);
    if($stmtselect-> rowCount()>0){
        $_SESSION ['userlogin'] = $user;
        echo '1';
    }else{
        echo'There was no user for that';
    }
}else{
        echo'There were errors while connecting to database';
    }


?>