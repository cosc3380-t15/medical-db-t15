<?php
$servername = "eyiece.mynetgear.com:3306";
$username = "root";
$password = "93U#muq!fPzZ";
$database = "medical_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
header('Location: index/home.html');
?>