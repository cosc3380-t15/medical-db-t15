<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");

$dbhost = "eyiece.mynetgear.com";
$dbuser = "root";
$dbpass = "93U#muq!fPzZ"; 
$dbname = "medical_db";


$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$result = mysqli_query($link,"SELECT * FROM patient WHERE Pat_ID='" .$_SESSION['id']. "'");
$row= mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/dashboard.css">
</head>

<body>
    <div class="container-form11">
    </div>
</body>

</html>