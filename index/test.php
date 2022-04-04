<!-- <?php

        include "/backend/connect.php";

        $sql = "SELECT * FROM doctor;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['Doc_Spec'];
            }    
        }


    ?>