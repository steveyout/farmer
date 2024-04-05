<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../staff/adminhome.css">
   
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="../images/logo.png"></a></div>
      <ul class="menu">
                        <li ><a href="farmer_status_report.php">Status Report</a></li>
                        <li ><a href="../products.php">Products</a></li>
                        <li ><a href="../staff/notifications.php">Notifications</a></li>
                        <li ><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <body>
      <!-- Side navigation -->
<div class="sidenav">
  <a href="farmer_status_report.php">Status Report</a>
  <a href="../products.php">Products</a>
  <a href="../staff/notifications.php">Notifications</a>
    <a href="update.php">Update</a>
</div>

<!-- Page content -->
<div class="main">
  <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../images/cowcow.jpg" style="width:100%; height:300px" >
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
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/660c39e4a0c6737bd1277b0c/1hqfs49jb';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
  </body>