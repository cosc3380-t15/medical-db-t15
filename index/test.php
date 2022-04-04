
<?php
include "/backend/connect.php"

// $query = "SELECT * FROM medical_db.patient";
$query1 = "INSERT INTO patient (Pat_ID, Pat_First, Pat_last,Pat_M_init,Pat_Email,Pat_Phone,Pat_Gender,Pat_Race,Pat_DOB,Pat_Height,Pat_Weight,Pat_Street_Addr,Pat_City_Addr,Pat_State_Addr,Pat_Zip_Addr)
VALUES (101010,'john','nonov','r','qwdasds@gmail.vom','234234456',2,2,'1990-12-11',211,344,'123 asder','houston','texas',77077)";


if ($link->query($query1) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query1 . "<br>" . $link->error;
  }
mysqli_close($link)

?>

