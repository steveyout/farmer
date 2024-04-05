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
        <li ><a class="active" href="index.php">Home</a></li>
                        <li ><a href="login.php">Login</a></li>
                        <li ><a href="../staff/staffregister.php">Register</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="content">
    <h1>STAFF REGISTRATION</h1>
    <form  action="staffconnect.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span</span>
            <input type="text" name="staffno" placeholder="Staff number" required>
          </div>
          
          <div class="input-box">
            <span</span>
            <input type="text" name="contact" placeholder="Contact" required>
          </div>
          
          <div class="input-box">
            <span</span>
            <input type="text" name="EmpID" placeholder="ID Number" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="fname" placeholder="Full Name" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="email" name="email" placeholder="Email" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="password" name="pass" placeholder="Password" required>
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
