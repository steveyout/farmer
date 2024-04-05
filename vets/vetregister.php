<?php
include '../database/config.php';
$sql="SELECT * FROM locations";
$results=$db->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../staff/register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="../staff/images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="../staff/adminhome.php">Home</a></li>
          <li ><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="content">
    <h1>REGISTER VET</h1>
    <form action="vetconnect.php" method="POST">
        <div class="user-details">
          
          <div class="input-box">
            <span</span>
            <input type="text" name="vetname" placeholder="Full Name" required>
          </div>
          
          <div class="input-box">
            <span</span>
            <input type="text" name="idno" placeholder="ID Number" required>
          </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="contact" placeholder="Contact" required>
          </div>

            <div class="input-box">
                <label>
                    <select class="input-box" type="text" name="location" style="width:8cm;height: 1.2cm;border-radius: 5px" required>
                        <?php
                        foreach ($results as $row){
                            $name=$row['name'];
                            echo "<option>$name</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>

          <div class="input-box">
            <span</span>
            <input type="text" name="email" placeholder="Email" required>
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
