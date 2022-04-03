<?php
$servername = "eyiece.mynetgear.com";
$username = "DNonov";
$password = "D27m03r94!@#";
$database = "medical_db";
// Create connection

try{
  $con = new PDO("mysql:host=$servername;dbname=$database",$username, $password);

  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connection Success";
}
catch (PDOException $e){
  echo "Error is connection " . $e->getMessage();
}

?>