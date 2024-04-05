<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Recommendations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet"
          href="report.css">
    <style>
        .inline{
            display: inline-block;
            float: right;
            margin: 20px 0px;
        }

        input, button{
            height: 34px;
        }

        .form-group {
            display: block;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .form-group label {
            position: relative;
            cursor: pointer;
        }

        .form-group label:before {
            content:'';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid green;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-group input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid green;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
</head>
<body>
<nav>
    <div class="navbar">
        <div class="logo"><img src="images/logo.png"></a></div>
        <ul class="menu">
            <li ><a class="active" href="farmers/home.php">Home</a></li>
            <li ><a href="products.php">Products</a></li>
            <li ><a href="staff/notifications.php">Notifications</a></li>
            <li ><a href="farmers/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<?php

///database connection
require_once "config.php";
session_start();
$reg_no=$_SESSION['regno'];
if (!isset($reg_no)){
    header("location: login.php");
}
//if id not set
if (!isset($_GET['id'])){
   echo "Id not set";
   exit();
}
$id=$_GET['id'];
$sql="SELECT list,cow_name,c.cow_status,cow_recommendation FROM recommendations left join cows c on c.id = recommendations.cow_id where cow_id=$id";
$results=$db->query($sql)->fetchAll();
?>
<h2 style="margin-top: 70px;margin-bottom: 80px">Cow recommendations with tag <?php echo $results[0]['cow_name'] ?></h2>
<form action="done_recommendations.php" method="post">
    <?php
    $lists=$results[0]['list'];
    $status=$results[0]['cow_recommendation']==true?'Booked':'Set done';
    ///set disabled status bsed on the status above
    $disabled= $results[0]['cow_recommendation']==true;
    $lists=json_decode($lists);
    foreach ($lists as $list){
        echo "<div class='form-group'>
        <input type='checkbox' id='$list' checked disabled>
        <label for='$list'>$list</label>
    </div>";
    }
    ?>
    <input type="number" value="<?php echo $id ?>" style="display: none" name="id">
    <?php
    if ($disabled){
        echo "<div style='width: 30%'>
        <input type='submit' value='$status' name='submit' class='btn btn-success' disabled>
    </div>";
    }else{
        echo "<div style='width: 30%'>
        <input type='submit' value='$status' name='submit' class='btn btn-success'>
    </div>";
    }
    ?>
</form>


</body>
</html>

