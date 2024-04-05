<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FARMERS DATA</title>
    <link rel="stylesheet" href="vetdata.css">
    
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="adminhome.php">Home</a></li>
                        <li ><a href="">Status Reports</a></li>
                        <li ><a href="">Products</a></li>
                        <li ><a href="">Notifications</a></li>
                        <li ><a href="../farmers/logout.php">logout</a></li>
    </div>
  </nav>
    <div class="center">
    <table>
<thead>
    <tr>
        <td><b>Registration Number</td>
        <td><b>Farmer Name</td>
        <td><b>Farmer contact</td>
        <td><b>Farmer ID</td>
        <td><b>Average Sales</td>
    </tr>
</thead>
<tbody>
<?php
///database connection
require_once "config.php";

///sql statement ro select all farmers from database
$sql = "SELECT * FROM farmers";

///execute and fetch results
$results=$db->query($sql)->fetchAll();

///if there are results
if ($results) {
    ///since results are an array of the farmers results
/// loop over the results to get each farmers details
foreach ($results as $row) {
    ///get the farmers details
    $reg=$row["FarmerReg_No"];
    $name=$row["FarmerName"];
    $contact=$row["FarmerContact"];
    $id=$row["FarmerId_No"];
    //display each farmer's details in the table row
echo "<tr>
    <td>$reg</td>
    <td>$name</td>
    <td>$contact</td>
    <td>$id</td>
</tr>";
}
 ?>
</tbody> 
</table>
<?php } else {
    //if no results in database alert the user
  echo "0 results";
}

?>
    </div>
    
  </body>
</html>
