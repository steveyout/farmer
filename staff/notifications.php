<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NOTIFICATIONS</title>
    <link rel="stylesheet" href="../notifications.css">
    
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="../images/logo.png"></a></div>
      <ul class="menu">
        <li ><a class="active" href="index.html">Home</a></li>
                        <li ><a href="status.html">Status Report</a></li>
                        <li ><a href="../products.html">Products</a></li>
      </ul>
    </div>
  </nav>
    <div class="center">
    <table>
<thead>
    <tr>
        <td><b>NOTIFICATIONS</td>
    </tr>
</thead>
<tbody>
<?php
///database connection
require_once "config.php";

$type='admin';
if (isset($_GET['type'])){
    $type=$_GET['type'];
}

$vet_id='NULL';
if (isset($_GET['vet_id'])){
    $vet_id=$_GET['vet_id'];
}
///select all notifications from the database
$sql = "SELECT * FROM notifications where type='$type' AND vet_id='$vet_id' ORDER BY created_at desc";

///query the above statement and fetch the results
$results=$db->query($sql)->fetchAll();
if ($results) {
    //if there are results loop over them and display each in a table row
foreach ($results as $row) {
    $message=$row['Message'];
    $id=$row['Notification_Id'];
    echo "<tr>
<td>$id</td>
    <td>$message</td>
</tr>";
}
}
?>
</tbody> 
</table>
    </div>
    
  </body>
</html>
