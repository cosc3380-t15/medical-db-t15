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

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
   if (!$link->query($query1)) {
    throw new customException($query1);
    }
}
catch(customException $e){ 
    echo 'Query Exception: ' . $e->getMessage();  
}
catch(\Exception $e){
    echo '<script language="javascript">';
    echo 'alert("There is an appointment at this time already, please select different time or date.")';
    echo 'window.location.href = "/backend/show_appointments_patient.php";';
    echo '</script>';
    
    // echo 'Query Exception: ' . $e->getMessage(); 
}
// sleep(10);
// header('Location: ../index/pat_profile.php');                 
?>
