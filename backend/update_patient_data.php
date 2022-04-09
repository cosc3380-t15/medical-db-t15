<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (isset($_POST['update_patient_data'])) {

    $id = $_POST['pat_id'];

    $name = $_POST['fname'];
    $minit = $_POST['minit'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $race = $_POST['race'];
    $allergies = $_POST['allergies'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $query = "UPDATE patient SET Pat_First='$name', Pat_M_init='$minit', Pat_Last='$lname', Pat_Email='$email', Pat_Phone='$phone', Pat_Gender='$gender', Pat_Race='$race', Pat_DOB='$dob', Pat_Height='$height', Pat_Weight='$weight', Pat_Street_Addr='$address', Pat_City_Addr='$city', Pat_State_Addr='$state', Pat_Zip_Addr='$zip', Pat_Allergy='$allergies' WHERE Pat_ID='$id' ";
    $query_run = mysqli_query($link,$query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully ";
        header("Location:/index/pat_profile.php");
    }else {
        $_SESSION['status'] = "Not Updated ";
        header("Location:edit_patient.php");
    }
}





?>