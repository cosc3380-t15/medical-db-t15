<?php
    session_start();
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

    $select="SELECT a.location, a.max_capacity_reaching, m.Appt_Date
    FROM max_capacity AS a AND appointment AS m
    WHERE max_capacity_reaching = 'TRUE'";
    $query=mysqli_query($link,$select);
?>    
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/show_patients.css">
</head>

<body>
    <!-- <div class="back-button">
       <a href="/index/home.php" id="back-button" >Back</a> 
    </div> -->

    <table border="1" cellpadding="0">
    <tr>
        <th>Location</th>
        <th>Has reached 75% capacity</th>
        
    </tr>
    <?php 
        $num=mysqli_num_rows($query);
        if ($num>0) {
            while ($result=mysqli_fetch_assoc($query)) {
                echo "
                    <tr>
                        <td>".$result['location']."</td>
                        <td>".$result['Appt_Date']."</td>
                        <td>".$result['max_capacity_reaching']."</td>
                    </tr>
                
                ";
            }
        }
    
    ?>
    
    </table>
    

</body>