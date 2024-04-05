<?php
///import the database connection
include '../database/config.php';
//start and initialize the session
session_start();
//if no session with the vet email
if (!isset($_SESSION['vet_email'])){
    //redirect to log in
    header('location: login.php');
    //prevent other code execution
    exit();
}
///get the vets email from the session
$email=$_SESSION['vet_email'];
//sql statement to select all vets and their respective clients
$sql="SELECT farmer_name,farmer_contact,farmers.FarmerReg_No , count(r.list) as meetups FROM vets LEFT JOIN clents ON vets.Vet_ID = clents.vet_id LEFT JOIN farmers ON farmers.FarmerName=clents.farmer_name left join recommendations r on farmers.FarmerReg_No = r.FarmerReg_No WHERE vets.email='$email' GROUP BY clents.id";
///query and fetch the results
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
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" href="home.css">
      <link rel="stylesheet"
            href="../report.css">
   
</head>
<body>

  <nav>
    <div class="navbar">
      <div class="logo"><img src="images/logo.png"></a></div>
      <ul class="menu">
                        <li ><a href="#">Farmers</a></li>
                        <li ><a href="farmer_status_report.php">Status Reports</a></li>
                        <li ><a href="#">Products</a></li>
                        <li ><a href="#">Notifications</a></li>
                        <li ><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
      <!-- Side navigation -->
<div class="sidenav">
  <a href="#">Farmers</a>
  <a href="farmer_status_report.php">Status Report</a>
  <a href="#">Products</a>
  <a href="#">Notifications</a>
</div>

<!-- Page content -->
<div class="main" style="position: relative;left: 110px">
    <h2 style="margin-top: 70px">Assigned Farmers</h2>
    <table>
        <thead>
        <tr>
            <th>Farmer Name</th>
            <th>Farmer Contact</th>
            <th>Number of meetups</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        ///loop over the vets results and display each records data in a table row
        foreach ($results as $row){
            $contact=$row['farmer_contact'];
            $name=$row['farmer_name'];
            $id=$row['FarmerReg_No'];
            $meetups=$row['meetups'];
                echo "
    <tr>
        <td>$name</td>
         <td>$contact</td>
         <td>$meetups</td>
         <td>
         <a class='btn btn-success' href='view_farmer.php?id=$id'>View</a>
        </td>
    </tr>
    ";
        }
        ?>
        </tbody>
    </table>
</div>
<br>
<div class="footer">
  <p>FARMERS MANAGEMENT SYSTEM   @ 2022</p>
</div>

  </body>