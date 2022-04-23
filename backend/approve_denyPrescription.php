<!--
    WORD FOR WORD THE SHOW PATIENT JUST PASSING MORE DATA IN HREF AND UPDATING INSTEAD OF DELETING. something happened adding something here so i can send to mamoon branch to merge main.
-->



<?php   # code...
   
   // These are just the usual establish connection
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

    // works but tryna update it to buttons
    // This is similar to the show_patient, where you use href to pass values (DID THE EXACT SAME BUT WITH TWO VALUES)
    // if (isset($_GET['Per_ID'])) {  
    //     $Per_ID = $_GET['Per_ID'];  
    //     $status = $_GET['choice'];
    //     $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
    //     $run = mysqli_query($link,$query);  
    //     if ($run) {  
    //         header('location:/backend/approve_denyPrescription.php');  
    //     }else{  
    //         echo "Error: ".mysqli_error($link);  
    //     }  
    // }

    if(isset($_GET['button1'])) {
        $Per_ID = $_GET['ID']; 
        $status = 'APPROVED';
        $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/backend/approve_denyPrescription.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }
    
    
    if(isset($_GET['button2'])) {
        $Per_ID = $_GET['ID']; 
        $status = 'DENIED';
        $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/backend/approve_denyPrescription.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }


    // this is the main query and it works
    $select="SELECT * FROM prescription AS p, patient AS pp 
    WHERE p.Per_Status = 'PENDING' AND p.Pat_ID = pp.Pat_ID";  
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
    </div>  removing this for now, its weird because it's loaded into content-->

    <table border="1" cellpadding="0">
    <!-- This is just the heading of each columns -->
    <tr>
        <th>prescription ID</th>
        <th>Doc ID</th>
        <th>Patient ID</th>
        <th>Date</th>
        <th>Description </th>
        <th>Patient Allergy </th>
        <th>buttons </th>
    </tr>
    <?php 
        $num=mysqli_num_rows($query);
        if ($num>0) {
            while ($result=mysqli_fetch_assoc($query)) {
                // this is to fill the tables done exactly same as show_patient but 
                echo "
                    <tr>
                        <td>".$result['Per_ID']."</td>
                        <td>".$result['Doc_ID']."</td>
                        <td>".$result['Pat_ID']."</td>
                        <td>".$result['Pat_Date']."</td>
                        <td>".$result['Per_Desc']."</td>
                        <td>".$result['Pat_Allergy']."</td>
                        <td>

                          <form  action = '/backend/approve_denyPrescription.php' method='GET'>
                              <input type='hidden' id='ID' name='ID' value=".$result['Per_ID'].">
                              <input class='btn approve' type='submit' name='button1'
                                      value='Approve'/>

                              <input class='btn deny' type='submit' name='button2'
                                      value='Deny'/>
                          </form>
                        </td>
                    </tr>
                
                ";
                // soo i changed the links to a buttons, the hiddent isn't seen by the user but it holds the value
                // this is for the form it works then action='/backend/approve_denyPrescription.php' testing without
            }
        }
    ?>


    
    </table>

</body>
    <!--THis works
    <a href='/backend/approve_denyPrescription.php?Per_ID=".$result['Per_ID']."&choice=APPROVED'class='btn'>Approve</a>
    <a href='/backend/approve_denyPrescription.php?Per_ID=".$result['Per_ID']."&choice=DENIED'class='btn'>Deny</a>   
    -->
<!-- 
    <form  action = '/backend/approve_denyPrescription.php' method='GET'>
                            <input type='hidden' id='ID' name='ID' value=".$result['Per_ID'].">
                            <input type='submit' name='button1'
                                    value='Approve'/>
                            
                            <input type='submit' name='button2'
                                    value='Deny'/>
                    </form> -->