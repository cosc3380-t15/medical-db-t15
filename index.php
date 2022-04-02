<?php
$servername = "eyiece.mynetgear.com";
$username = "root";
$password = "b01r18o11A!ae&";
$database = "medical_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
mysqli_close($conn);
?>