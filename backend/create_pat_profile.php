<?php

$firstname = $_POST['fname'];
$minit = $_POST['minit'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$race = $_POST['race'];
$dob = $_POST['dob'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$allergy = $_POST['allergies'];


                                                        # code...
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");

mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

                                                        
$query1 = "INSERT INTO patient (Pat_First,Pat_M_init,Pat_last,Pat_Email,Pat_Phone,Pat_Gender,Pat_Race,Pat_DOB,Pat_Height,Pat_Weight,Pat_Street_Addr,Pat_City_Addr,Pat_State_Addr,Pat_Zip_Addr,Pat_Allergy)
VALUES ('$firstname','$minit','$lname','$email','$phone','$gender','$race','$dob','$height','$weight','$address','$city','$state','$zip','$allergy')";


if ($link->query($query1) !== TRUE) {
    echo "Error: " . $query1 . "<br>" . $link->error;
} mysqli_close($link);

header('Location: ../index/login.html');                 


?>

