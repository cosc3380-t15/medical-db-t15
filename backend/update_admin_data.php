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

if (isset($_POST['update_admin_data'])) {

    $id = $_POST['Ad_id'];
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

    $query = "UPDATE admin SET Ad_First='$name', Ad_M_init='$minit', Ad_Last='$lname', Ad_Email='$email', Ad_Phone='$phone', Ad_Gender='$gender', Ad_DOB='$dob', Ad_Street_Addr='$address', Ad_City_Addr='$city', Ad_State_Addr='$state', Ad_Zip_Addr='$zip'  WHERE Ad_ID='$id' ";
    $query_run = mysqli_query($link,$query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully ";
        header("Location:/index/OA_profile.php");
    }else {
        $_SESSION['status'] = "Not Updated ";
        header("Location:update_admin_data.php");
    }
}





?>