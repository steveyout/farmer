<!DOCTYPE html>
-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../login.css">
      <?php
      ///database connection
      require_once "../database/config.php";
      ?>
</head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="../images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="../index.php">Home</a></li>
                        <li ><a href="login.php">Login</a></li>
                        <li ><a href="registration/index.php">Register</a></li>
      </ul>
    </div>
  </nav>
    <div class="center">
      <h1>Login</h1>
      <form action="conn.php" method="POST">

        <div class="txt_field">
          <input type="text" name="regno" required>
          <span></span>
          <label>Farmer Registration Number</label>
        </div>

        <div class="txt_field">
          <input type="password" name="pass" required>
          <span></span>
          <label>Password</label>
        </div>

          <div class="signup_link"><a href="../forgot_password.php">Forgot Password?</a></div>
        <input type="submit" id="login" value="Login" name="submit">
        <div class="signup_link">
          Not a member? <a href="registration/index.php">Signup</a>
        </div>
          <div class="signup_link">
              forgot password? <a href="../forgot_password.php">Reset password</a>
          </div>
      </form>
    </div>

  </body>
</html>
