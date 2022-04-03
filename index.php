<?php
$servername = "eyiece.mynetgear.com";
$username = "DNonov";
$password = "D27m03r94!@#";
$database = "medical_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database, 3306);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
// header('Location: index/home.html');
?>