<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="Location:../index.php">Home</a></li>
                        <li ><a href="Location:../login.php">Login</a></li>
                        <li ><a href="register.php">Register</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="content">
    <form  action="connect.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span</span>
            <input type="text" name="memno" placeholder="Membership number" required>
          </div>
          
          <div class="input-box">
            <span</span>
            <input type="text" name="fname" placeholder="Full Name" required>
          </div>
          
          <div class="input-box">
            <span</span>
            <input type="text" name="contact" placeholder="Contact" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="idno" placeholder="ID Number" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="routeno" placeholder="Route Number" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="cowno" placeholder="Number of Cows" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="cowtype" placeholder="Type of cows" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="pass" placeholder="Password" required>
          </div>

          <div class="pass"></div>
        <input type="submit" value="Register" name="submit">

        
        </div>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
