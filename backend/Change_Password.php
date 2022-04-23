<?php

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (isset($_POST['change_doctor_password'])) {
    $NewPass = $_POST["NewPass"];
    $ID = $_POST["ID"];
    $query1 = "UPDATE doctor SET Doc_Password = '$NewPass' WHERE Doc_ID = '$ID'";
    $query_run = mysqli_query($link,$query1);
    header('Location: ../index/doc_profile.php');
}

if (isset($_POST['change_patient_password'])) {
    $NewPass = $_POST["NewPass"];
    $ID = $_POST["ID"];
    $query1 = "UPDATE patient SET Pat_Password = '$NewPass' WHERE Pat_ID = '$ID'";
    $query_run = mysqli_query($link,$query1);
    header('Location: ../index/pat_profile.php');
}

if (isset($_POST['change_admin_password'])) {
    $NewPass = $_POST["NewPass"];
    $ID = $_POST["ID"];
    $query1 = "UPDATE admin SET Ad_Password = '$NewPass' WHERE Ad_ID = '$ID'";
    $query_run = mysqli_query($link,$query1);
    header('Location: ../index/OA_profile.php');
}

?>