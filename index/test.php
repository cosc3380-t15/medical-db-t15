<?php
      include ".env";
      $query1 = "INSERT INTO `medical_db`.`race_code` (`Race_Code`, `Race_Text`) VALUES ('1', 'Male');";

      if (mysqli_query($conn, $query1)) {

      echo "<script type = 'text/javastript'>alert('Success')</script>";

      }else {
      echo "<script type = 'text/javastript'>alert('Failure')</script>";
      }
      mysqli_close($conn);
?>