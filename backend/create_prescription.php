<?php

$patid = $_POST['pat_id'];
$docid = $_POST['doc_id'];
$prescription = $_POST['prescription'];
$Date = $_POST['date'];

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

                                                        
$query1 = "INSERT INTO prescription (Pat_ID,Doc_ID,Per_Desc,Per_Status,Per_Date)
VALUES ('$patid','$docid','$prescription','PENDING','$Date')";


if ($link->query($query1) !== TRUE) {
    echo "Error: " . $query1 . "<br>" . $link->error;
} mysqli_close($link);

header('Location: ../index/doc_profile.php');                 


?>
