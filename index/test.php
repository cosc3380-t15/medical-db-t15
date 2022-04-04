<!-- <?php
 include "/backend/connect.php";

 $query1 = "INSERT INTO patient (Pat_ID, Pat_First, Pat_last,Pat_M_init,Pat_Email,Pat_Phone,Pat_Gender,Pat_Race,Pat_DOB,Pat_Height,Pat_Weight,Pat_Street_Addr,Pat_City_Addr,Pat_State_Addr,Pat_Zip_Addr)
 VALUES (1005, "drago", "nonov","r","qwdasds@gmail.vom","234234456",2,2,"1990-12-11",211,344,"123 asder","houston","texas",77077);";

 if (mysqli_query($conn, $query1)) {
     # code...
     echo "<script type = 'text/javastript'>alert('Success')</script>";

 }else {
     echo "<script type = 'text/javastript'>alert('Failure')</script>";
 }
 mysqli_close($conn);

    ?>