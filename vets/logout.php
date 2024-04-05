<?php
session_start();
//redirect to index page
header('location:index.php');
///destroy the session
session_destroy()
?>
