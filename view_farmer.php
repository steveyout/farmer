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
    </style>
</head>
<body>
<?php
//check for id
if (!isset($_GET['id'])){
    echo "Please provide farmer id";
    exit();
}
///database connection
require_once "config.php";
$id=$_GET['id'];
$sql="SELECT * FROM farmers LEFT JOIN cows ON farmers.FarmerReg_No=cows.FarmerReg_No LEFT JOIN clents ON farmers.FarmerName=clents.farmer_name WHERE farmers.FarmerReg_No=$id;";
$results=$db->query($sql)->fetchAll();


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
<h2>Status report for <?php echo $results[0]['FarmerName']?></h2>
<table>
    <thead>
    <tr>
        <th>Cow</th>
        <th>Type</th>
        <th>Score</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results as $row){
        $name=$row['name'];
        $cowStatus=$row['cow_status'];
        $type=$row['type'];
        $score=(($cowStatus=='healthy'||is_null($cowStatus))?$row['sales']:(($cowStatus=='lactating')?"<span class='chip info'>
		Lactating
	</span>":"<span class='chip danger'>
		Sick
	</span>"));
        $status=(($cowStatus=='healthy'||is_null($cowStatus))?status($row['type'],$row['sales']):(($cowStatus=='lactating')?"":""));

        $id=$row['FarmerReg_No'];
        $vet=$row['vet_id'];
        $action='';
       if (status($row['type'],$row['sales']) =="<span class='chip danger'>
		Poor
	</span>"&&isset($row['farmer_name'])){
           $action="<a class='btn btn-success' href='view_vet.php?id=$vet'>View Assigned vet</a>";
       }elseif (status($row['type'],$row['sales']) =="<span class='chip danger'>
		Poor
	</span>"||$cowStatus=='sick'||$cowStatus=='lactating'){
           $action="<a class='btn btn-success' href='asign_vet.php?id=$id' >Asign vet</a>";
       }else{
           $action="";
       }
        echo " 
 <tr>
 <td>$name</td>
 <td>$type</td>
 <td>$score</td>
 <td>$status</td>
        <td>$action</td>
        </tr>
        ";
    }
    ?>
    </tbody>
</table>


</body>
</html>
