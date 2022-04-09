<?php                                                    # code...
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");


   if (isset($_GET['Pat_ID'])) {  
        $Pat_ID = $_GET['Pat_ID'];  
        $query = "DELETE FROM `patient` WHERE Pat_ID = '$Pat_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/backend/show_patient.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }

    $select="SELECT * FROM patient";
    $query=mysqli_query($link,$select);
?>    
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/test2.css">
</head>

<body>
    <div class="back-button">
       <a href="/index/home.php" class="back-button" >Back</a> 
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
                            <a href='/backend/show_patient.php?Pat_ID=".$result['Pat_ID']."'class='btn'>Delete</a>
                            <a href='/backend/edit_patient.php?Pat_ID=".$result['Pat_ID']."'class='btn'>Edit</a>
                        </td>
            
                    </tr>
                
                ";
            }
        }
    
    ?>
    
    </table>
    

</body>