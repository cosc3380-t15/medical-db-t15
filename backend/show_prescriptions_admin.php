
<?php   # code...
   
   // These are just the usual establish connection
   session_start();
   if($_SESSION['loggedin'] != true  or $_SESSION['role'] != "OA") {
    header("Location: login.php");
}
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");


    // this is the main query and it works
    $select="SELECT * FROM prescription AS p, patient AS pp 
    WHERE p.Pat_ID = pp.Pat_ID";  
    $query=mysqli_query($link,$select);
?>    
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/show_patients.css">
</head>

<body>

    <table border="1" cellpadding="0">
    <!-- This is just the heading of each columns -->
    <tr>
        <th>prescription ID</th>
        <th>Doc ID</th>
        <th>Patient ID</th>
        <th>Description </th>
        <th>Patient Allergy </th>
        <th>Status </th>
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
                        <td>".$result['Per_Status']."</td>
                       
                    </tr>
                
                ";
               
            }
        }
    ?>


    
    </table>

</body>
</html>