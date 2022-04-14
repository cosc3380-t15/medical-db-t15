<?php                                                    # code...
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

    $select="SELECT * FROM patient";
    $query=mysqli_query($link,$select);
?>    
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/show_patients.css">
</head>

<body>
    <div class="back-button">
       <a href="/index/OA_profile.php" id="back-button" >Back</a> 
    </div>

    <table border="1" cellpadding="0">
    <tr>
        <th>Patient ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Operation</th>
    </tr>
    <?php 
        $num=mysqli_num_rows($query);
        if ($num>0) {
            while ($result=mysqli_fetch_assoc($query)) {
                echo "
                    <tr>
                        <td>".$result['Pat_ID']."</td>
                        <td>".$result['Pat_First']."</td>
                        <td>".$result['Pat_Last']."</td>
                        <td>".$result['Pat_Phone']."</td>
                        <td>".$result['Pat_Email']."</td>
                        <td>
                        echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' . $row["Doc_ID"] .'><input type="submit" name="delete" value="Delete"></form></td>';
                        </td>
            
                    </tr>
                
                ";
            }
        }
    
    ?>
    
    </table>
    

</body>