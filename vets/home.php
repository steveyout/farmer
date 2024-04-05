<?php
include 'config.php';
//start and initialize the session
session_start();
//if no session with the vet email
if (!isset($_SESSION['vet_email'])){
    //redirect to log in
    header('location: login.php');
    //prevent other code execution
    exit();
}

///sql statement to select all notifications from the database
$email=$_SESSION['vet_email'];
$vet=$db->query("SELECT * FROM vets WHERE email='$email'")->fetchAll(PDO::FETCH_ASSOC);
$id=isset($vet)?$vet[0]['Vet_ID']:'';
$sql = "SELECT * FROM notifications where type='vet' AND vet_id=$id";
///execute and fetch the results from the database
$results=$db->query($sql)->fetchAll();
$notifications=isset($results)?count($results):0
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="home.css">
      <style>
          .badge {
              position: absolute;
              top: -13px;
              right: -10px;
              padding: 4px 8px;
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
                        <li ><a href="status_report.php">Farmers</a></li>
                        <li ><a href="../products.php">Products</a></li>
                        <li style="position: relative!important;"><a href="../staff/notifications.php?type=vet&vet_id=<?php echo $id ?>">Notifications
                                <span class="badge"><?php echo $notifications ?></span>
                            </a></li>
                        <li ><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <body>
      <!-- Side navigation -->
<div class="sidenav">
  <a href="status_report.php">Farmers</a>
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