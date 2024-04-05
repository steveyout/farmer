<?php
///start and initialize the session
session_start();
//redirect to the index page
header('location:../index.php');
///destroy and delete the session
session_destroy()
?>
