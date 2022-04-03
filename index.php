<?php
// $cleardb_url = parse_url(getenv("DATABASE_URL"));
$cleardb_server = "eyiece.mynetgear.com";
$cleardb_username = "root";
$cleardb_password = "93U#muq!fPzZ";
$cleardb_db = "medical_db";

$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db, 3306, "mysql2");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>