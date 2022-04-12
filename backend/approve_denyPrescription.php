<!--
PLEASE TEST ON YOUR ENDS CAUSE NOTHING IS WORKING HOW ITS SUPPOSED TO ON MY SIDE,
IF SOMETHING IS BROKEN JUST @ME ON DISCORD IDK WHAT ELSE I COULD DO.
I SPENT 4 HRS DEBUGGING IT ON MY END AND FOUND OUT NOTHING WAS WORKING FOR ME AGAIN.
I AM SURE THE TABLE IS PRINTED ITS THE APPROVE AND DENY THAT ARE CAUSING PROBLEMS
-->



<?php   # code...
   
   // These are just the usual establish connection
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");

    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");


    // This is similar to the show_patient, where you use href to pass values (DID THE EXACT SAME BUT WITH TWO VALUES)
    // if (isset($_GET['status'])) { 
    //     $status= $_GET['status']; 
    //     $id = $_GET['id'];  
    //     $query = "UPDATE 'prescription' SET 'Pre_Status' = 'APPROVED' WHERE 'Pet_ID' = '$id'";  
    //     $run = mysqli_query($link,$query);  
    //     if ($run) {  
    //         header('location:/backend/approve_denyPrescription.php');  
    //     }else{  
    //         echo "Error: ".mysqli_error($link);  
    //     }  
    // }

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
    </div> -->

    <table border="1" cellpadding="0">
    <!-- This is just the heading of each columns -->
    <tr>
        <th>prescription ID</th>
        <th>Doc ID</th>
        <th>Patient ID</th>
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
                        <td>".$result['Per_Desc']."</td>
                        <td>".$result['Pat_Allergy']."</td>
                        <td>

                            <form method='post' action=''>
                            <input type='submit' name='action' value='APPROVE'/>
                            <input type='submit' name='action' value='DENY'/>
                            <input type='hidden' name='id' value= ".$result['Per_ID']."/>
                      </form>

                           
                        </td>
            
                    </tr>
                
                ";
                // soo i changed the links to a buttons, the hiddent isn't seen by the user but it holds the value
            }
        }
    ?>
    
    </table>
    




<?php 
// if the button is pressed it is gonna se values and if they contaion aything these should be true
if ($_POST['action'] && $_POST['id']) {
    //just in case
  if ($_POST['action'] == 'APPROVE') {
    $id = $_POST['id'];
    $updateQuery = "UPDATE prescription SET Pre_Status = 'APPROVED' WHERE Pet_ID = '$id'"; 
    $run=mysqli_query($link,$updateQuery);
  }else{
    $id = $_POST['id'];
    $updateQuery = "UPDATE prescription SET Pre_Status = 'DENIED' WHERE Pet_ID = '$id'"; 
    $run=mysqli_query($link,$updateQuery);
  }
}?>


</body>
</html>