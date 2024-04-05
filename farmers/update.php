<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmers status report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="registration/register.css">
    <link rel="stylesheet"
          href="../report.css">
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
</head>
<body>
<?php
///database connection
require_once "../database/config.php";
session_start();
$reg_no=$_SESSION['regno'];
if (!isset($reg_no)){
    header("location: login.php");
    exit();
}
$sql="SELECT * FROM farmers LEFT JOIN cows on farmers.FarmerReg_No = cows.FarmerReg_No  WHERE farmers.FarmerReg_No=$reg_no";
$results=$db->query($sql)->fetchAll();
?>
<nav>
    <div class="navbar">
        <div class="logo"><img src="../images/logo.png"></a></div>
        <ul class="menu">
            <li ><a class="active" href="home.php">Home</a></li>
            <li ><a href="../products.php">Products</a></li>
            <li ><a href="../staff/notifications.php">Notifications</a></li>
            <li ><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="content">
        <h1>Update Status</h1>
        <form action="updateStatus.php" method="POST">
            <div class="user-details">
                <?php
                foreach ($results as $row){
                    $name=$row['name'];
                    $type=$row['type'];
                    $production=$row['sales'];
                    echo "<div id='input_row'>
                    <div  style='display: flex;flex-direction: row;' id='next'>
                        <div class='input-box' style='margin-right: 5px'>
                            <input type='text' name='cow_name[]' value='$name' readonly>
                        </div>

                        <div class='input-box' style='margin-right: 5px'>
                            <input type='text' name='cow_breed[]' value='$type' readonly>
                        </div>
                        
                        <!--cow type-->
                        <select type='text' name='cow_status[]' class='input-box' style='width:5cm;margin-right: 5px' onchange='disableInput(this)'>
                        <option selected='selected' value='healthy'>
                         Cow status
                         </option>
                         <option value='healthy'>
                          Healthy
                         </option>
                         <option value='sick'>
                          Sick
                         </option>
                         <option value='lactating'>
                         Lactating
                        </option>
                         </select>

                        <div class='input-box' style='margin-right: 5px'>
                            <input type='number' name='cow_production[]' value='$production' >
                        </div>
                    </div>
                </div>";
                }
                ?>
                <input type="submit" value="Update" name="submit" class="btn btn-success">
    </form>
</div>
</div>

<script>
    function disableInput(element){
        //get production input
        let input=element.parentElement.parentElement.querySelector("[name='cow_production[]']");
        if (element.value==='healthy'){
            //re enable production input
            input.readOnly=false
            return
        }
        //else disable production input
        input.readOnly=true
    }
</script>
</body>
</html>
