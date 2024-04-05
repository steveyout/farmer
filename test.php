<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmers_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM vets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Vet_No: " . $row["Vet_No"]. " - Name: " . $row["VetName"]. " " . $row["Vet_ID"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>