<?php
include '../conn.php';
session_start();
if (!isset($_SESSION['vet_email'])){
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" href="home.css">
   
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
                        <li ><a href="../farmers">Farmers</a></li>
                        <li ><a href="status_report.php">Status Reports</a></li>
                        <li ><a href="../products.php">Products</a></li>
                        <li ><a href="../staff/notifications.php">Notifications</a></li>
                        <li ><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <body>
      <!-- Side navigation -->
<div class="sidenav">
  <a href="#">Farmers</a>
  <a href="status_report.php">Status Report</a>
  <a href="../staff/products.php">Products</a>
  <a href="../staff/notifications.php">Notifications</a>
</div>

<!-- Page content -->
<div class="main">
  <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/cowcow.jpg" style="width:100%; height:300px" >
  <div class="text">FARMERS MANAGEMENT SYSTEM</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/cows.jpg" style="width:100%; height:300px">
  <div class="text">FARMERS MANAGEMENT SYSTEM</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="imgages/cows01.jpg" style="width:100%; height:300px">
  <div class="text">FARMERS MANAGEMENT SYSTEM</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div class="footer">
  <p>FARMERS MANAGEMENT SYSTEM   @ 2022</p>
</div>
<script>
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
</script>
  </body>