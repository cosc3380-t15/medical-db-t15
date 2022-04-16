<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (isset($_POST['update_doctor_data'])) {

    $id = $_POST['doc_id'];
    $occupation = $_POST['occupation'];
    $location = $_POST['loc'];
    $name = $_POST['fname'];
    $minit = $_POST['minit'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $query = "UPDATE doctor SET Doc_Spec='$occupation', Doc_Location = '$location',Doc_First='$name', Doc_M_init='$minit', Doc_Last='$lname', Doc_Email='$email', Doc_Phone='$phone', Doc_Gender='$gender', Doc_DOB='$dob', Doc_Street_Addr='$address', Doc_City_Addr='$city', Doc_State_Addr='$state', Doc_Zip_Addr='$zip'  WHERE Doc_ID='$id' ";
    $query_run = mysqli_query($link,$query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully ";
        header("Location:/index/doc_profile.php");
    }else {
        $_SESSION['status'] = "Not Updated ";
        header("Location:update_doctor_data.php");
    }
}





?>