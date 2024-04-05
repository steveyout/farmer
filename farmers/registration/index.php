<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
          .btn{
              width: 5cm;
              height: 1.2cm;
              cursor: pointer;
              border-radius: 5px;
              text-decoration: none;
              padding: 5px;
          }

          .btn-success{
              color: white;
              background-color: green;
          }
      </style>
      <script>
          function addInput(){
              const element = document.getElementById('input_row');
              const html='<div  style="display: flex;flex-direction: row;" id="next"> <div class="input-box" style="margin-right: 5px"> <input type="text" name="cow_name[]" placeholder="cow name" > </div> <div class="input-box" style="margin-right: 5px">  <div class="input-box" style="margin-right: 5px"> <select type="text" name="cow_breed[]" class="input-box" style="width:5cm" > <option selected="selected">freshian </option> <option>ayrshire </option> <option>gurnsey </option> <option>jersey </option> </select> </div> </div> <div class="input-box" style="margin-right: 5px"> <input type="number" name="cow_production[]" placeholder="production in litres" > </div></div>'
             element.insertAdjacentHTML('afterEnd',html);
          }
      </script>
   </head>
  <?php
  include '../../database/config.php';
  $sql="SELECT * FROM locations";
  $results=$db->query($sql)->fetchAll();
  ?>
<body>
  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="../../index.php">Home</a></li>
                        <li ><a href="../login.php">Login</a></li>
                        <li ><a href="index.php">Register</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="content">
      <h1>REGISTER</h1>
    <form action="connect.php" method="POST">
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

            <div id="input_row">
                <div  style="display: flex;flex-direction: row;" id="next">
            <div class="input-box" style="margin-right: 5px">
                <input type="text" name="cow_name[]" placeholder="cow name" >
            </div>

                <div class="input-box" style="margin-right: 5px">
                <select type="text" name="cow_breed[]" class="input-box" style="width:5cm" >
                    <option selected="selected">
                        freshian
                    </option>
                    <option>
                        ayrshire
                    </option>
                    <option>
                        gurnsey
                    </option>
                    <option>
                        jersey
                    </option>
                </select>
            </div>

                <div class="input-box" style="margin-right: 5px">
                <input type="number" name="cow_production[]" placeholder="production in litres" >
            </div>

                <button class="btn btn-success" type="button" onclick="addInput()">Add</button>
            </div>
            </div>

            <div class="input-box">
                <select type="text" name="location" placeholder="Location" required>
                    <?php
                    foreach ($results as $row){
                        $name=$row['name'];
                        echo "<option>$name</option>";
                    }
                    ?>
                </select>
            </div>

          <div class="input-box">
            <span</span>
            <input type="password" name="pass" placeholder="Password" required>
          </div>

          <div class="pass"></div>
        <input type="submit" value="Register" name="submit" class="btn btn-success">

        
        </div>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
