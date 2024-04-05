<!DOCTYPE html>
-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="index.html">Home</a></li>
                        <li ><a href="status.html">Status Report</a></li>
                        <li ><a href="products.html">Products</a></li>
                        <li ><a href="notifications.html">Notifications</a></li>
                        <li ><a href="farmers/login.php">Login</a></li>
                        <li ><a href="registration/register.php">Register</a></li>
      </ul>
    </div>
  </nav>
    <div class="center">
      <h1>Login</h1>
      <form action="connect.php" method="POST">

        <div class="txt_field">
          <input type="text" name="fname" required>
          <span></span>
          <label>Full names</label>
        </div>

        

        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="text" name="user" required>
          <span></span>
          <label>userEmail</label>
        </div>

        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Password</label>
        </div>

        <div class="txt_field">
          <input type="text" name="role" required>
          <span></span>
          <label>role</label>
        </div>

        <div class="pass"></div>
        <input type="submit" value="Register User" name="submit">
        <div class="signup_link">
          <a href="#">Log In</a>
        </div>
      </form>
    </div>

  </body>
</html>
