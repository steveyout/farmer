<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="vetdata.css">
    
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="index.html">Home</a></li>
                        <li ><a href="status.html">Status Report</a></li>
                        <li ><a href="products.html">Products</a></li>
                        <li ><a href="notifications.html">Notifications</a></li>
                        <li ><a href="login.html">Login</a></li>
                        <li ><a href="register.html">Register</a></li>
      </ul>
    </div>
  </nav>
    <div class="center">
    <table>
<thead>
    <tr>
        <td><b>Vet Name</td>
        <td><b>Vet ID</td>
        <td><b>Vet Contact</td>
        <td><b>Vet Location</td>
    </tr>
</thead>
<tbody>
<?php
///database connection
require_once "config.php";

///sql statement to fetch all vets from database
$sql = "SELECT * FROM vets";

///run the query and fetch the results
$results=$db->query($sql)->fetchAll();
if ($results) {
    /*
     * if successful loop over the results and display each records data in a table row
     */
foreach ($results as $row) {
    ///assign the corresponding records' data to a variable
    $name=$row["VetName"];
    $id=$row["Vet_ID"];
    $contact=$row["VetContact"];
    $location= $row["VetLocation"];
    ///display the data in a database
    echo "<tr>
    <td>$name</td>
    <td>$id</td>
    <td>$contact</td>
    <td>$location</td>
</tr>";
    }
 ?>
</tbody> 
</table>
<?php } else {
    ///if there are no results alert the user
  echo "0 results";
}

?>
    </div>
    
  </body>
</html>
