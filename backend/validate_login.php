<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");

mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$query1 = "SELECT Pat_ID FROM patient WHERE Pat_Email = '$email' AND Pat_password = '$pass'";
$result = $link->query($query1);
foreach($result as $row) { $id = $row['Pat_ID']; }
if(mysqli_num_rows($result) === 1) {
    mysqli_close($link);
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['role'] = "Patient";
    header('Location: ../index/pat_profile.php');
} else {

    $query2 = "SELECT Doc_ID FROM doctor WHERE Doc_Email = '$email' AND Doc_password = '$pass'";
    $result = $link->query($query2);
    foreach($result as $row) { $id = $row['Doc_ID']; }
    if(mysqli_num_rows($result) === 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = "Doc";
        mysqli_close($link);
        header('Location: ../index/doc_profile.php');
    } else {

        $query3 = "SELECT Ad_ID FROM admin WHERE Ad_Email = '$email' AND Ad_password = '$pass'";
        $result = $link->query($query3);
        foreach($result as $row) { $id = $row['Ad_ID']; }
        if(mysqli_num_rows($result) === 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['role'] = "OA";
            mysqli_close($link);
            header('Location: ../index/OA_profile.php');
        } else { mysqli_close($link);
            $_SESSION['status'] = "Your Username or Password is incorrect";
            header('Location: ../index/login.php');
        }
    }
}
mysqli_close($link);
?>