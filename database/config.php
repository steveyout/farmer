<?php
///database connection details
 $db_user = "root";
 $db_pass = "";
 $db_name = "farmers_system";


try {
 //connect to the database
 $db = new PDO('mysql:host = localhost; dbname='.$db_name.';charset = utf8', $db_user, $db_pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
}catch (Exception $e){
 ////get errors occurred while connecting to database
 exit('error connecting to database');
}
?>
