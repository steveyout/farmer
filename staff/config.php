<?php
/*
 * database credentials
 */
 $db_user = "root";
 $db_pass = "";
 $db_name = "farmers_system";


try {
 /*
  * create the connection to the database
  */
 $db = new PDO('mysql:host = localhost; dbname='.$db_name.';charset = utf8', $db_user, $db_pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
}catch (Exception $e){
 /*
  * get and catch any errors occurred while connecting to the database
  */
 exit('error connecting to database');
}
?>
