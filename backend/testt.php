
<?php   # code...
   
   // These are just the usual establish connection
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");

    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");


    $sql = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";
    if (mysqli_query($link, $sql)) {
        echo "Successfull!";
    } else{
        echo "error";
    }
?>

<html>
    <head>

    </head>
    <body>
        <?php
            $sql2 = "SELECT * FROM prescription AS p, patient AS pp 
            WHERE p.Per_Status = 'PENDING' AND p.Pat_ID = pp.Pat_ID";
            $result = mysqli_query($link, $sql2);
            if (mysqli_num_roes($result) > 0) {
                echo'<table>';
                echo "thead";
                echo "<tr>";
                    echo "<th>prescription ID</th>";
                    echo "<th>Doc ID</th>";
                    echo "<th>Patient ID</th>";
                    echo "<th>Description </th>";
                    echo "<th>Patient Allergy </th>";
                    echo "<th>buttons </th>";
                echo "</tr>"; 
                echo "</thead>";
                echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>".$row['Per_ID']."</td>";
                        echo "<td>".$row['Doc_ID']."</td>";
                        echo "<td>".$row['Pat_ID']."</td>";
                        echo "<td>".$row['Per_Desc']."</td>";
                        echo "<td>".$row['Pat_Allergy']."</td>";
                    } 
            }  else{
                        echo "0 results";
                    } 
            ?>
    </body>
</html>