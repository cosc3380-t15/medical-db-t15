<?php
// Create connection
$conn = mysqli_connect($DATABASE_URL, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
// header('Location: index/home.html');
?>