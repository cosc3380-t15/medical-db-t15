<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];


                                                        # code...
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");

mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$query1 = "SELECT Pat_Email, Pat_Password FROM patient WHERE Pat_Email = '$email' AND Pat_password = '$pass'";
$result = $link->query($query1);
if(mysqli_num_rows($result) === 1) {
    mysqli_close($link);
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $email;
    $_SESSION['role'] = "Patient";
    header('Location: ../index/pat_profile.php');
} else {

    $query2 = "SELECT Doc_Email, Doc_Password FROM doctor WHERE Doc_Email = '$email' AND Doc_password = '$pass'";
    $result = $link->query($query2);
    if(mysqli_num_rows($result) === 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $email;
        $_SESSION['role'] = "Doc";
        mysqli_close($link);
        header('Location: ../index/doc_profile.php');
    } else {

        $query3 = "SELECT Ad_Email, Ad_Password FROM admin WHERE Ad_Email = '$email' AND Ad_password = '$pass'";
        $result = $link->query($query3);
        if(mysqli_num_rows($result) === 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email;
            $_SESSION['role'] = "OA";
            mysqli_close($link);
            header('Location: ../index/OA_profile.php');
        } else { mysqli_close($link); header('Location: ../index/login.php');}
    }
}
mysqli_close($link);
?>