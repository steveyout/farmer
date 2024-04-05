<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assign a veterinary to a farmer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="report.css">
    <link rel="stylesheet" href="login.css">
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
    exit('bad request,farmer id missing');
}
///database connection
require_once "config.php";
//get the id parameter
$id=$_GET['id'];
////select all farmers and their assigned vets sql statement
$sql="SELECT * FROM farmers LEFT JOIN vets ON farmers.FarmerLocation=vets.VetLocation WHERE farmers.FarmerReg_No=$id;";
///query and fetch the results
$results=$db->query($sql)->fetchAll();
?>
<h2 style="text-align: center;color: white;margin-top: 50px">Assign Vet to Farmer <?php echo $results[0]['FarmerName']?></h2>
<div class="center">
    <h1>Assign vetinary</h1>
    <form  action="" method="POST">

        <label>Select Veterinary</label>
        <div class="select">
            <select id="standard-select" name="vet">
                <?php
                //loop over the results and get each rows data then display an option for each assigned vet to the farmer
                foreach ($results as $row){
                    $vet=$row['VetName'];
                    $vet_id=$row['Vet_ID'];
                    echo "<option value='$vet_id'>$vet</option>";
                }
                ?>
            </select>
        </div>

        <input type="submit" id="login" value="Submit" name="submit" style="margin-top:50px;">
    </form>
</div>
<?php
///check if form field vet is set
if (isset($_POST['vet'])){
    ///get the vet field
    $vet=$_POST['vet'];
    $name=$results[0]['FarmerName'];
    $contact=$results[0]['FarmerContact'];
    ////insert into the clients table the vet assigned and farmers details
    $sql="INSERT INTO clents (vet_id,farmer_name,farmer_contact) VALUES ($vet,'$name','$contact')";
    $query=$db->exec($sql);
    if ($query){
        ///create notification
        $msg="$name with contact $contact has been assigned to you";
        $sql="INSERT INTO notifications(message, type,vet_id) VALUES ('$msg','vet',$vet)";
        $db->exec($sql);
        echo "<script>alert('Veterinary allocated successfully')</script>";
    }
}
?>

</body>
</html>

