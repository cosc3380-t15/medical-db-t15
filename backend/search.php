<?php
$user_id = $_REQUEST['pat_id'];

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS");
$dbname = getenv("DBNAME");

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if ($user_id !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT Pat_First, 
    Pat_Last FROM patient WHERE Pat_ID='$user_id'");
  
    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $first_name = $row["first_name"];
  
    // Get the first name
    $last_name = $row["last_name"];
}
  
// Store it in a array
$result = array("$first_name", "$last_name");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>