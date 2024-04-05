<?php
include 'config.php';
///sql statement to select all notifications from the database
$sql = "SELECT * FROM notifications where type='admin'";
///execute and fetch the results from the database
$results=$db->query($sql)->fetchAll();
$notifications=isset($results)?count($results):0
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="adminhome.css">
      <style>
          .badge {
              position: absolute;
              top: -1px;
              right: -1px;
              padding: 5px 9px;
              border-radius: 50%;
              background: red;
              color: white;
          }
      </style>
   
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
      <div class="dropdown">
    <button class="dropbtn">View 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="farmersdata.php">View Farmers</a>
      <a href="vetdata.php">View Vets</a>
      <a href="#">View Staff</a>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Status Report 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="status_report.php">View status report</a>
</div>
</div>
                        <div class="dropdown">
    <button class="dropbtn">Products 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_product.php">Add Products</a>
      <a href="../products.php">View Products</a>
    </div>
</div>
                        <div class="dropdown">
    <button class="dropbtn" style="position: relative!important;">Notifications
      <i class="fa fa-caret-down"></i>
        <span class="badge"><?php echo $notifications ?></span>
    </button>
    <div class="dropdown-content">
      <a href="add_notification.php">Add Notifications</a>
      <a href="notifications.php">View Notifications</a>
    </div>
</div>
                        <div class="dropdown">
    <button class="dropbtn">Register 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../farmers/registration/index.php">Register Farmer</a>
      <a href="../vets/vetregister.php">Register Vet</a>
      <a href="staffregister.php">Register Staff</a>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">logout 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="logout.php">logout</a>
    </div>
      </ul>
    </div>
  </nav>
  <body>
      <!-- Side navigation -->
<div class="sidenav">
  <a href="farmersdata.php">Farmers</a>
  <a href="vetdata.php">Vets</a>
  <a href="status_report.php">Status Report</a>
  <a href="../products.php">Products</a>
  <a href="notifications.php">Notifications</a>
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