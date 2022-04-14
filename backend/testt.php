
<?php   # code...
   
   // These are just the usual establish connection
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");

    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");


    if (isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM patient WHERE id=8";
        if ($link->query($sql)===TRUE) {
            echo "DELETED";
        }else {
            echo "not deleted";
        }
    }
?>

<html>
    <head>

    </head>
    <body>
        <div>
            <?php
                $sql = "SELECT * FROM doctor";
                $result = $link->query($sql);
                $num_rows=mysqli_num_rows($sql);
                if ($result->num_rows > 0) {
                    echo '<table>';
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>F Name</th>";
                            echo "<th>L Name</th>";
                            echo "<th>Phone</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                        while ($row = $result ->fetch_assos()) {
                            echo "<tr>";
                            echo "<td>" . $row["Doc_ID"] . "</td>";
                            echo "<td>" . $row["Doc_First"] . "</td>";
                            echo "<td>" . $row["Doc_Last"] . "</td>";
                            echo "<td>" . $row["Doc_Phone"] . "</td>";
                           
                            # code...
                        }
                        echo "</tbody>";
                        echo "</table>";
                }else {
                    echo "0 Results";
                }
            ?>
        </div>
           
    </body>
</html>