<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Assigned Vets</title>
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
    echo "Please provide vet id";
    exit();
}
///database connection
require_once "database/config.php";
///get the id query parameter
$id=$_GET['id'];
//sql statement to select the vet based on id and their assigned clients
$sql="SELECT * FROM vets INNER JOIN clents ON vets.Vet_ID = clents.vet_id WHERE vets.Vet_ID=$id";
///execute and fetch the results
$results=$db->query($sql)->fetchAll();

//if results not empty
//count() function is used to count the length of the array.if the length is 0 means the array is empty
if (count($results)!==0) {
    //if results array doesn't equal to 0 means there are results
    ///get the farmer name from the first results array
    $farmer=$results[0]['farmer_name'];
    echo "<h2>Assigned vet to Farmer $farmer</h2>";
}
?>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Contact</th>
        <th>Location</th>
        <th>Date Assigned</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (count($results)!==0) {
        ///loop over the results
        foreach ($results as $row) {
            ///assign the vet details to variables and display each detail in a table row
            $vetName = $row['VetName'];
            $contact = $row['VetContact'];
            $location = $row['VetLocation'];
            $name = urlencode($row['farmer_name']);
            $date = $row['created_at'];
            echo " 
 <tr>
 <td>$vetName</td>
 <td>$contact</td>
 <td>$location</td>
 <td>$date</td>
        <td><a class='btn btn-danger' href='delete_vet.php?delete=$name' >Delete</a></td>
        </tr>
        ";
        }
    }else{
        ///if the results are empty notify user
        echo '<tr>
            <td colspan="6" style="text-align: center">
                No vets Assigned
            </td>
        </tr>';
    }
    ?>
    </tbody>
</table>

</body>
</html>
