<?php

$doc_id = $_POST['doc_id'];
$pat_id = $_POST['pat_id'];
$location = $_POST['location'];
$date = $_POST['date'];
$time = $_POST['time'];
$appt_spec = $_POST['doc_spec'];

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

                                                        
$query1 = "INSERT INTO appointment (Pat_ID,Doc_ID,Off_ID,Appt_Specialization,Appt_Date,Appt_Time)
VALUES ('$pat_id','$doc_id','$location','$appt_spec','$date','$time')";


try{
    $link->query($query1);
}catch(Exception $e){
    echo 'Message: ' .$e->getMessage();
}

header('Location: ../index/pat_profile.php');                 


?>
