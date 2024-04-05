<?php
////database connection details
 $db_user = "root";
 $db_pass = "";
 $db_name = "farmers_system";


try {
 //create a connection to database using the connection details above
 $db = new PDO('mysql:host = localhost; dbname='.$db_name.';charset = utf8', $db_user, $db_pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
}catch (Exception $e){
 ///catch any errors occurred while connecting to the database
 exit('error connecting to database');
 ////prevent any other code execution if errors
}
?>
