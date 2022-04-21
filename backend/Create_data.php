<?php

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (isset($_POST['Create_doctor_data'])) {

    $Spec = $_POST['occupation'];
    $Loc = $_POST['loc'];
    $FName = $_POST['fname'];
    $MName = $_POST['minit'];
    $LName = $_POST['lname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $DOB = $_POST['dob'];
    $Gender = $_POST['gender'];
    $Strt = $_POST['address'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $Zip = $_POST['zip'];
    $Password = "TempPassword";
    
    $query1 = "INSERT INTO doctor (Doc_First,Doc_M_Init,Doc_Last,Doc_Spec,Doc_Location,Doc_Email,Doc_Phone,Doc_DOB,Doc_Gender,Doc_Street_Addr,Doc_City_Addr,Doc_State_Addr,Doc_Zip_Addr,Doc_Password)
    VALUES ('$FName','$MName','$LName','$Spec','$Loc','$Email','$Phone','$DOB','$Gender','$Strt','$City','$State','$Zip','$Password')";


}

if (isset($_POST['Create_patient_data'])) {

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
    $password = $_POST['password'];
                                                            
    $query1 = "INSERT INTO patient (Pat_First,Pat_M_init,Pat_last,Pat_Email,Pat_Phone,Pat_Gender,Pat_Race,Pat_DOB,Pat_Height,Pat_Weight,Pat_Street_Addr,Pat_City_Addr,Pat_State_Addr,Pat_Zip_Addr,Pat_Allergy,Pat_Password)
    VALUES ('$firstname','$minit','$lname','$email','$phone','$gender','$race','$dob','$height','$weight','$address','$city','$state','$zip','$allergy','$password')";

}

$query_run = mysqli_query($link,$query1);
header('Location: ../index/OA_profile.php');

?>