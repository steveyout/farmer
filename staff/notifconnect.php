<?php 

include_once('../database/config.php');

if(isset($_POST['submit'])){
  $notify = $_POST['notif'];
  
  
$sql="INSERT INTO notifications (message) VALUES(?)";
$stmtinsert = $db -> prepare($sql);
$result = $stmtinsert -> execute([$notify]);
  if($result){
  echo 'successfully saved';
  }
  else{
    echo 'There were errors while saving the data';
    }
}else{
  echo 'there were errors connecting to database';
}
?>