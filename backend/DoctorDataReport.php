<!-- 
    SO THIS FILE IS MAKING A SEARCH FIELD ON THE TOP AND THEN HAS A TABLE LIKE BEFORE ON THE BOTTOM.

    REMOVING DATE OF BIRTH SEARCH CURRENTLY CAUSE IDK HOW TO GET THE DATE VALUE OR PRESET ONE
--> 
<?php 
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");

    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
     
    if (isset($_GET['Per_ID'])) {  
        $Doc_ID = $_GET['Per_ID'];  
        $query = "DELETE FROM `doctor` WHERE Doc_ID = '$Doc_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/backend/approve_denyPrescription.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }
   
    if (isset($_GET['submit']))
    {
        $ID = $_GET['ID'];
        $Spec = $_GET['Spec'];
        $FName = $_GET['Fname'];
        $Mname = $_GET['Mname'];
        $Lname = $_GET['Lname'];
        $Gender = $_GET['gender'];
        // $DOB = $_GET['DOB'];
        // initiallizing as a string this is aproblem cause idk what to do with date types
        $DOB = "";

        if ($ID != '' ||$Spec != '' ||$FName != '' ||$Mname != '' ||$Lname != '' ||$Gender != '' ||$DOB != '')
        {
            // something changed so do this
            $select = "SELECT * FROM doctor WHERE Doc_ID = '$ID' or Doc_Spec = '$Spec' or Doc_Gender = '$Gender' or Doc_First = '$FName' or Doc_M_Init = '$Mname' or Doc_Last = '$Lname' or Doc_DOB = '$DOB' ";
        }else{
            // if nothing set and pressed submit
            $select = "SELECT * FROM doctor";
        }
    }else{
        // if nothing set the print all
        $select = "SELECT * FROM doctor";
    }
   
    if(isset($_POST['button1'])) {
        $Per_ID = $_POST['ID']; 
        $status = 'APPROVED';
        $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/backend/approve_denyPrescription.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }
    
    
    if(isset($_POST['button2'])) {
        $Per_ID = $_POST['ID']; 
        $status = 'DENIED';
        $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/backend/approve_denyPrescription.php');  
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }
    $query = mysqli_query($link,$select);

?>


<html>  
    <head>
        <link rel="stylesheet" href="/index/styles/show_patients.css">
    </head>
<body>
    <!-- Making Search Fields to scan through when needed-->
    <div> 
        <form action = "/backend/DoctorDataReport.php" method  = "GET">
            
            <div>
                <label > Doctor ID </label>
                <div >
                    <input type = "text"  name = "ID" placeholder= "0000000" value = "">
                </div>
            </div>
            
            <div >
                <label> Speciality </label>
                <div>
                    <input type = "text" name = "Spec" placeholder= "something" value = "">
                </div>
            </div>
                       
            <div >
                <label > First Name </label>
                <div >
                    <input type = "text" name = "Fname" placeholder= "First Name" value = "">
                </div>
            </div>
            
            <div >
                <label > Middle Initial </label>
                <div >
                    <input type = "text"  name = "Mname" placeholder= "Middle initial" value = "">
                </div>
            </div>
            
            <div >
                <label > Last Name </label>
                <div >
                    <input type = "text" name = "Lname" placeholder= "Last Name" value = "">
                </div>
            </div>        

            <div >
                <label > Middle Initial </label>
                <div >
                    <input type ="radio" name="gender" value ="Male"> Male
                    <input type ="radio" name="gender" value ="Female"> Female
                    <input type ="radio" name="gender" value ="" checked = "checked"> Either
                </div>
            </div>
            
            <!-- <div >
                <label > DOB </label>
                <div >
                    <input type = "date" name = "DOB" value = "">
                </div>
            </div> -->
            <div >
                <label > Last Name </label>
                <div >
                <input type='submit' name='submit' value='SEARCH'/>
                </div>
            </div>   

        </form>
    </div>

    <!-- Forming table and making it readable-->
    <div>
        <table >
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Speciality </th>
                    <th>First </th>
                    <th>Middle </th>
                    <th>Last </th>
                    <th>Email </th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <!-- <th>Date of Birth </th> -->
                    <th>Street Address </th>
                    <th>City Adress </th>
                    <th>State Address </th>
                    <th>ZIP Address </th>
                    <th> buttons <th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num=mysqli_num_rows($query);
                if ($num>0) {
                    while ($result=mysqli_fetch_assoc($query)) {
                        // this is to fill the tables done exactly same as show_patient but 
                        echo "
                            <tr>
                                <td>".$result['Doc_ID']." </td>
                                <td> ".$result['Doc_Spec']." </td>
                                <td> ".$result['Doc_First']." </td>
                                <td> ".$result['Doc_M_Init']." </td>
                                <td> ".$result['Doc_Last']." </td>
                                <td> ".$result['Doc_Email']." </td>
                                <td> ".$result['Doc_Phone']." </td>
                                <td> ".$result['Doc_Gender']." </td>
                                <td> ".$result['Doc_DOB']." </td>
                                <td> ".$result['Doc_Street_Addr']." </td>
                                <td> ".$result['Doc_City_Addr']." </td>
                                <td> ".$result['Doc_State_Addr']." </td>
                                <td> ".$result['Doc_Zip_Addr']." </td>
                                <td>
                                <a href='/backend/DoctorDataReport.php?Per_ID=".$result['Doc_ID']." 'class='btn'>DELETE</a>
                                <a href='/index/OA_profile.php? 'class='btn'>Edit</a>   
                                </td>
                    
                            </tr>
                        
                        ";
                        // soo i changed the links to a buttons, the hiddent isn't seen by the user but it holds the value
                        // this is for the form it works then action='/backend/approve_denyPrescription.php' testing without
                    }
                }else{
                     ?>
                        <tr>
                            <td> NO RECORDS </td>
                        </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

</body>