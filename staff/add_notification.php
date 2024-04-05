<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add notification</title>
    <link rel="stylesheet" href="../add_notification.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
          .btn{
              width: 100%;
              cursor: pointer;
              border-radius: 5px;
              text-decoration: none;
              padding: 14px;
          }

          .btn-success{
              color: white;
              background-color: green;
          }
      </style>
   </head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="../images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="../../index.php">Home</a></li>
                        <li ><a href=":../login.php">Login</a></li>
                        <li ><a href="register.php">Register</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="content">
    <h1>ADD NOTIFICATION</h1>
    <form action="notifconnect.php" method="POST">
        <div class="user-details">
          <textarea rows="7" cols="50" name="notif" placeholder="Enter message..." style="text-align: center;width: 100%">
</textarea>
        </div>
        <input type="submit" value="submit" name="submit" class="btn btn-success">
      </form>
    </div>
  </div>

</body>
</html>
