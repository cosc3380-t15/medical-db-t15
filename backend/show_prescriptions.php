<?php
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

    if (isset($_GET['Per_ID'])) {  
        $Per_ID = $_GET['Per_ID'];  
        $query = "DELETE FROM `prescription` WHERE Per_ID = '$Per_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/index/doc_profile.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }

    $select="SELECT * FROM prescription ";
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
        <th>Prescription ID</th>
        <th>Patient ID</th>
        <th>Prescription</th>
    </tr>
    <?php 
        $num=mysqli_num_rows($query);
        if ($num>0) {
            while ($result=mysqli_fetch_assoc($query)) {
                echo "
                    <tr>
                        <td>".$result['Per_ID']."</td>
                        <td>".$result['Pat_ID']."</td>
                        <td>".$result['Per_Desc']."</td>
                        <td>
                            <a href='/index/doc_profile.php?Per_ID=".$result['Per_ID']."'class='btn'>Edit</a>
                            <a href='/index/doc_profile.php?Per_ID=".$result['Per_ID']."'class='btn'>Delete</a>
                        </td>
            
                    </tr>
                
                ";
            }
        }
    
    ?>
    
    </table>
    

</body>