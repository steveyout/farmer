<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmer status report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        .check-list {
            margin: 0;
            padding-left: 1.2rem;
        }

        .check-list li {
            position: relative;
            list-style-type: none;
            padding-left: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .check-list li:before {
            content: '';
            display: block;
            position: absolute;
            left: 0;
            top: -2px;
            width: 5px;
            height: 11px;
            border-width: 0 2px 2px 0;
            border-style: solid;
            border-color: #00a8a8;
            transform-origin: bottom left;
            transform: rotate(45deg);
        }


        /* Boilerplate stuff */
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html {
            -webkit-font-smoothing: antialiased;
            font-family: "Helvetica Neue", sans-serif;
            font-size: 62.5%;
        }

        body {
            font-size: 1.6rem; /* 18px */
            background-color: #efefef;
            color: #324047
        }

        html,
        body,
        section {
            height: 100%;
        }

        section {
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            margin-top: -200px;
            display: flex;
            align-items: center;
        }

        div {
            margin: auto;
        }


    </style>
</head>
<body>
<?php
//check for id
if (!isset($_GET['id'])){
    echo "Please provide farmer id";
    exit();
}

//check for cow name
if (!isset($_GET['cow_name'])){
    echo "No cow name provided";
    exit();
}
///database connection
require_once "config.php";
$id=$_GET['id'];
$sql="SELECT * FROM recommendations LEFT JOIN farmers f on recommendations.FarmerReg_No = f.FarmerReg_No WHERE recommendations.FarmerReg_No=$id  group by created_at;";
$results=$db->query($sql)->fetchAll();
?>
<h2 style="text-align: center">Recommendations for <?php echo $results[0]['FarmerName']?> since meetup with vet</h2>
<section>
    <div>
<?php
foreach ($results as $row){
    $lists=$row['list'];
    $date=$row['created_at'];
    $lists=json_decode($lists);
    echo " <h2>$date</h2>";
    ?>
        <ul class='check-list'>
            <?php
            foreach ($lists as $list){
                echo " <ul class='check-list'>
        
            <li>$list</li>";
            }
            ?>
        </ul>
        <?php
}
?>
    </div>
</section>
