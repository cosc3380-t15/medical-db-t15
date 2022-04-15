<?php
    session_start();
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
    
    if (isset($_GET['Appt_ID'])) {  
        $Appt_ID = $_GET['Appt_ID'];  
        $query = "DELETE FROM `appointment` WHERE Appt_ID = '$Appt_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/index/pat_profile.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }

    $select="SELECT a.Pat_ID, a.Doc_ID, a.Off_ID, a.Appt_Time, a.Appt_Specialization, p.Pat_First, p.Pat_Last, a.Appt_ID
    FROM appointment AS a, patient AS p
    WHERE p.Pat_ID = a.Pat_ID";
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
        <th>Appointment ID</th>
        <th>Opperation</th>

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
                        <td>".$result['Off_ID']."</td>
                        <td>".$result['Appt_Time']."</td>
                        <td>".$result['Appt_Specialization']."</td>
                        <td>".$result['Doc_ID']."</td>
                        <td>".$result['Appt_ID']."</td>
                        <td>
                            <a href='/backend/show_appointments_patient.php?Appt_ID=".$result['Appt_ID']."'class='btn'>Cancel</a>
                        </td>
                        
            
                    </tr>
                
                ";
            }
        }
    
    ?>
    
    </table>
    

</body>