<?php
$servername = "eyiece.mynetgear.com";
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

<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

<head>

    <link rel="stylesheet" href="style.css">


</head>

<body>
<h1><?php echo "This message is from server side." ?></h1>




</body>

</html>