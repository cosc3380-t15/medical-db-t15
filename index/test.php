<?php




      include "/index.php";

            $query1 = "INSERT INTO `medical_db`.`race_code` (`Race_Code`, `Race_Text`) VALUES ('m', 'Male');";

            if (mysqli_query($conn, $query1)) {
      
            echo "<script type = 'text/javastript'>alert('Success')</script>";

            }else {
            echo "<script type = 'text/javastript'>alert('Failure')</script>";
            }
            mysqli_close($conn);


?>



