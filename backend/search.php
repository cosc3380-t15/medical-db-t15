<?php
$rollNo1=$_REQUEST['rollNo'];

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS");
$dbname = getenv("DBNAME");

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if ($rollNo1!=="") {
    $query = mysqli_query($link, "SELECT * FROM `patient` WHERE Pat_ID = '$rollNo1'");
    $fname = $row['Pat_First'];
    $lname = $row['Pat_Last'];
}
$result = array("$fname", "$lname");
$myJSON = json_encode($result);
echo $myJSON;
?>