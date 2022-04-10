<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (isset($_POST['update_perscription_data'])) {

    $prescription = $_POST['prescription'];
    $pre_id = $_POST['per_id'];

    $query = "UPDATE prescription SET Per_Desc='$prescription' WHERE Per_ID='$pre_id' ";
    $query_run = mysqli_query($link,$query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully ";
        header("Location:doc_profile.php");
    }else {
        $_SESSION['status'] = "Not Updated ";
        header("Location:doc_profile.php");
    }
}





?>