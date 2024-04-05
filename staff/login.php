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
        <li ><a class="active" href="index.php">Home</a></li>
                        <li ><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>
    <div class="center">
      <h1>Login</h1>
      <form  action="conn.php" method="POST">

        <div class="txt_field">
          <input type="text" name="email" required>
          <span></span>
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="password" name="pass" required>
          <span></span>
          <label>Password</label>
        </div>

        <div class="pass">Forgot Password?</div>
        <input type="submit" id="login" value="Login" name="submit">
      </form>
    </div>

  </body>
</html>
