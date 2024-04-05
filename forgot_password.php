<!DOCTYPE html>
-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot password</title>
    <link rel="stylesheet" href="login.css">
      <?php
      ///database connection
      require_once "config.php";
      ?>
</head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="index.php">Home</a></li>
                        <li ><a href="farmers/login.php">Login</a></li>
                        <li ><a href="farmers/registration/index.php">Register</a></li>
      </ul>
    </div>
  </nav>
    <div class="center">
      <h1>Reset Password</h1>
      <form  action="reset_pass.php" method="POST">

        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Name</label>
        </div>

        <div class="txt_field">
          <input type="tel" name="contact" required>
          <span></span>
          <label>Contact</label>
        </div>

          <div class="txt_field">
              <input type="password" name="password" required>
              <span></span>
              <label>New password</label>
          </div>

        <input type="submit" id="login" value="Reset password" name="submit">
        <div class="signup_link">
          Not a member? <a href="farmers/registration/index.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
