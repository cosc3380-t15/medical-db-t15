<?php

$idtest = $_POST['idtest'];
$test = $_POST['test'];

if (!empty($fname)) {
    if (!empty($minit)) {
      include "/index.php";

            $query1 = "INSERT INTO patient (idtest, test) VALUES ('$idtest','$test')";

            if (mysqli_query($conn, $query1)) {
      
            echo "<script type = 'text/javastript'>alert('Success')</script>";

            }else {
            echo "<script type = 'text/javastript'>alert('Failure')</script>";
            }
            mysqli_close($conn);
        }
        echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
        
}





?>



