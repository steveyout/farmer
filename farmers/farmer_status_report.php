<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmers status report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet"
          href="../report.css">
    <style>
        .inline{
            display: inline-block;
            float: right;
            margin: 20px 0px;
        }

        input, button{
            height: 34px;
        }
    </style>
</head>
<body>
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
<?php

///database connection
require_once "../database/config.php";
session_start();
$reg_no=$_SESSION['regno'];
if (!isset($reg_no)){
    header("location: login.php");
}
$sql="SELECT farmers.vet,farmers.FarmerReg_No,cows.sales,cows.type,cows.id,cows.name,farmers.FarmerName,farmers.FarmerContact,cows.cow_status,r.list,clents.farmer_name,v.VetName,v.VetContact FROM farmers LEFT OUTER JOIN cows ON farmers.FarmerReg_No = cows.FarmerReg_No LEFT JOIN clents ON farmers.FarmerName=clents.farmer_name LEFT JOIN vets v on v.Vet_ID = clents.vet_id LEFT OUTER JOIN recommendations r on cows.id = r.cow_id WHERE farmers.FarmerReg_No=$reg_no group by cows.id";
$results=$db->query($sql)->fetchAll();


//function to compute status
//function to compute status
function status($type,$score){
    $score=intval(round($score));
    switch ($type){
        case 'freshian':
            if (in_array($score,range(55,70))){
                return '<span class="chip primary">
		Excellent
	</span>';
            }elseif (in_array($score,range(25,40))){
                return '<span class="chip warning">
		Average 
	</span>';
            }else if ($score<25){
                return "<span class='chip danger'>
		Poor
	</span>";
            }else{
                return '<span class="chip warning">
		Average 
	</span>';
            }
            break;
        /*
         * ayrshire
         */
        case 'ayrshire':
            if (in_array($score,range(35,55))){
                return '<span class="chip primary">
		Excellent
	</span>';
            }elseif (in_array($score,range(20,35))){
                return '<span class="chip warning">
		Average 
	</span>';
            }else if ($score<20){
                return "<span class='chip danger'>
		Poor
	</span>";
            }else{
                return '<span class="chip warning">
		Average 
	</span>';
            }
            break;
        /*
         * gurnsey
         */
        case 'gurnsey':
            if (in_array($score,range(40,60))){
                return '<span class="chip primary">
		Excellent
	</span>';
            }elseif (in_array($score,range(20,40))){
                return '<span class="chip warning">
		Average 
	</span>';
            }else if ($score<20){
                return "<span class='chip danger'>
		Poor
	</span>";
            }else{
                return '<span class="chip warning">
		Average 
	</span>';
            }
            break;
        /*
         * jersey
         */
        case 'jersey':
            if (in_array($score,range(30,45))){
                return '<span class="chip primary">
		Excellent
	</span>';
            }elseif (in_array($score,range(15,30))){
                return '<span class="chip warning">
		Average 
	</span>';
            }else if ($score<15){
                return "<span class='chip danger'>
		Poor
	</span>";
            }else{
                return '<span class="chip warning">
		Average 
	</span>';
            }
            break;
    }

}
?>
<h2 style="margin-top: 70px">Farmers Status Report for <?php echo $results[0]['FarmerName'] ?></h2>
<table>
    <thead>
    <tr>
        <th>Type Of Cow</th>
        <th>Cow Tag</th>
        <th>Score</th>
        <th>Status</th>
        <th>Contact</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row){
        $type=$row['type'];
        $cowStatus=$row['cow_status'];
        $tag=$row['name'];
        $score=(($cowStatus=='healthy'||is_null($cowStatus))?$row['sales']:(($cowStatus=='lactating')?"<span class='chip info'>
		Lactating
	</span>":"<span class='chip danger'>
		Sick
	</span>"));
        $contact=$row['FarmerContact'];
        $id=$row['FarmerReg_No'];
        $status=(($cowStatus=='healthy'||is_null($cowStatus))?status($row['type'],$row['sales']):(($cowStatus=='lactating')?"":""));
        $vet_name=$row['VetName'];
        $vet=$row['farmer_name'];
        $vet_contact=$row['VetContact'];
        $list=$row['list'];
        $cowId=$row['id'];
        echo "<div id='open-modal$id' class='modal-window'>
    <div>
        <a href='#' title='Close' class='modal-close'>Close</a>
        <h3><strong>Name:</strong> $vet_name</h3>
        <h3><strong>Contact:</strong> $vet_contact</h3>

            </div>
</div>";
        $action=((status($row['type'],$row['sales'])=="<span class='chip danger'>
		Poor
	</span>"&&!is_null($vet)))?"<a class='btn btn-success' href='#open-modal$id'>Contact Vet</a>":($cowStatus=='healthy'||is_null($cowStatus)?'':(($cowStatus=='lactating'&&!is_null($vet)?"<a class='btn btn-success' href='#open-modal$id'>Contact Vet</a>
	</span>":"")));
        $action.=isset($list)?" <a class='btn btn-success' style='background-color: deepskyblue' href='view_recommendations.php?id=$cowId'>View recommendations</a>":'';
        $action.="<a class='btn btn-success' style='background-color: deepskyblue' href='update.php'>Update Cow</a>";
        echo " 
 <tr>
        <td>$type</td>
        <td>$tag</td>
        <td>$score</td>
        <td>$status</td>
        <td>$contact</td>
        <td>$action</td>
        </tr>
        ";
    }
    ?>
    </tbody>
</table>
</body>
</html>

