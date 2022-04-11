<?php
    session_start();
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

    $select="SELECT a.Pat_ID, a.Doc_ID, a.Off_ID, a.Appt_Time, a.Appt_Specialization, p.Pat_First, p.Pat_Last
    FROM appointment AS a, patient AS p
    WHERE a.Doc_ID = '2000000' AND p.Pat_ID = a.Pat_ID";
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
        <th>Patient ID</th>
        <th>Patient First Nane</th>
        <th>Patient Last Nane</th>
        <th>Office ID</th>
        <th>Appointment Time</th>
        <th>Appointment Specialization</th>
        <th>Doctor ID</th>
    </tr>
    <?php 
        $num=mysqli_num_rows($query);
        if ($num>0) {
            while ($result=mysqli_fetch_assoc($query)) {
                echo "
                    <tr>
                        <td>".$result['a.Pat_ID']."</td>
                        <td>".$result['p.Pat_First']."</td>
                        <td>".$result['p.Pat_Last']."</td>
                        <td>".$result['a.Off_ID']."</td>
                        <td>".$result['a.Appt_Time']."</td>
                        <td>".$result['a.Appt_Specialization']."</td>
                        <td>".$result['a.Doc_ID']."</td>
                        
            
                    </tr>
                
                ";
            }
        }
    
    ?>
    
    </table>
    

</body>