<!-- 
    SO THIS FILE IS MAKING A SEARCH FIELD ON THE TOP AND THEN HAS A TABLE LIKE BEFORE ON THE BOTTOM.
--> 
<?php 
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");

    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");





?>


<html>  
    <head>

    </head>
<body>
    <!-- Making Search Fields to scan through when needed-->
    <div class= "ror"> 
        <form class = "form-horizontal" action = "DoctorDataReport.php" method  = "POST">
            
            <div class = "form-group">
                <label class = "col-lg-2 control label"> Doctor ID </label>
                <div class = "col-lg-4">
                    <input type = "text" class = "form-control" name = "ID" placeholder= "0000000" >
                </div>
            </div>
            
            <div class = "form-group">
                <label class = "col-lg-2 control label"> Speciality </label>
                <div class = "col-lg-4">
                    <input type = "text" class = "form-control" name = "Spec" placeholder= "something" >
                </div>
            </div>
                       
            <div class = "form-group">
                <label class = "col-lg-2 control label"> First Name </label>
                <div class = "col-lg-4">
                    <input type = "text" class = "form-control" name = "Fname" placeholder= "First Name" >
                </div>
            </div>
            
            <div class = "form-group">
                <label class = "col-lg-2 control label"> Middle Initial </label>
                <div class = "col-lg-4">
                    <input type = "text" class = "form-control" name = "Mname" placeholder= "Middle initial" >
                </div>
            </div>
            
            <div class = "form-group">
                <label class = "col-lg-2 control label"> Last Name </label>
                <div class = "col-lg-4">
                    <input type = "text" class = "form-control" name = "Lname" placeholder= "Last Name" >
                </div>
            </div>        

            <div class = "form-group">
                <label class = "col-lg-2 control label"> Middle Initial </label>
                <div class = "col-lg-4">
                    <input type ="radio" name="gender" value ="Male"> Male
                    <input type ="radio" name="gender" value ="Female"> Female
                    <input type ="radio" name="gender" value =""> Either
                </div>
            </div>
            
            <div class = "form-group">
                <label class = "col-lg-2 control label"> DOB </label>
                <div class = "col-lg-4">
                    <input type = "date" class = "form-control" name = "DOB" >
                </div>
            </div>

            <div class = "form-group">
                <label class = "col-lg-2 control label"> DOB </label>
                <div class = "col-lg-4">
                    <input type = "submit" class = "btn btn-primary" name = "submit" >
                </div>
            </div>
        </form>
    </div>

    <!-- Forming table and making it readable-->
    <div class = "row">
        <table class= "table table-striped table-header">
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
                    <th>Date of Birth </th>
                    <th>Street Address </th>
                    <th>City Adress </th>
                    <th>State Address </th>
                    <th>ZIP Address </th>
                    <th> buttons <th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_POST['submit']))
                    {
                        $ID = $_POST['ID'];
                        $Spec = $_POST['Spec'];
                        $FName = $_POST['Fname'];
                        $Mname = $_POST['Mname'];
                        $Lname = $_POST['Lname'];
                        $Gender = $_POST['gender'];
                        $DOB = $_POST['DOB'];

                        if ($ID != '' ||$Spec != '' ||$ID != '' ||$FName != '' ||$Mname != '' ||$Lname != '' ||$Gender != '' ||$DOB != '')
                        {
                            $query = "SELECT * FROM doctor WHERE Doc_ID = '$ID' or Doc_Spec = '$Spec' or Doc_Gender = '$Gender' or Doc_First = '$FName' or Doc_M_Init = '$Mname' or Doc_Last = '$Lname' or Doc_DOB = '$DOB' ";
                            $data = mysqli_query($link,$query);

                            if(mysqli_num_rows($data)>0)
                            {
                                while($row = mysqli_fetch_assoc($data)){
                                    $Doc_ID = $row['Doc_ID'];
                                    $Doc_Spec = $row['Doc_Spec'];
                                    $Doc_First = $row['Doc_First'];
                                    $Doc_M_Init = $row['Doc_M_Init'];
                                    $Doc_Last = $row['Doc_Last'];
                                    $Doc_Email = $row['Doc_Email'];
                                    $Doc_Phone = $row['Doc_Phone'];
                                    $Doc_Gender = $row['Doc_Gender'];
                                    $Doc_DOB = $row['Doc_DOB'];
                                    $Doc_Street_Addr = $row['Doc_Street_Addr'];
                                    $Doc_State_Addr = $row['Doc_State_Addr'];
                                    $Doc_Zip_Addr = $row['Doc_Zip_Addr'];
                                    $Doc_City_Addr = $row['Doc_City_Addr'];
                                    
                                ?>
                                <tr>
                                    <td><?php $Doc_ID ?></td>
                                    <td><?php $Doc_Spec ?></td>
                                    <td><?php $Doc_First ?></td>
                                    <td><?php $Doc_M_Init ?></td>
                                    <td><?php $Doc_Last ?></td>
                                    <td><?php $Doc_Email ?></td>
                                    <td><?php $Doc_Phone ?></td>
                                    <td><?php $Doc_Gender ?></td>
                                    <td><?php $Doc_DOB ?></td>
                                    <td><?php $Doc_Street_Addr ?></td>
                                    <td><?php $Doc_City_Addr ?></td>
                                    <td><?php $Doc_State_Addr ?></td>
                                    <td><?php $Doc_Zip_Addr ?></td>
                                    <td>
                                        <!-- this will link to edit forms and delete button -->
                                        <a href="<a href='/backend/DoctorDataReport.php?Pat_ID='.$result['Pat_ID']." class='btn' >Delete</a>
                                        <a href='#?temp=Edit&ID=".$Doc_ID."'>Edit</a>
                                    </td>
                                </tr>
                                <?php 
                                // close while
                                }
                            //closes inner if
                            }else{
                                // ends here cause we wana close while loop and run else
                                ?>

                                <tr>
                                    <td>NO RECORDS</td>
                               
                                </tr>
                                <?php
                            // closes inner else
                            }
                        // closes outer if
                        }
                    //close the if from isset   
                    }else{
                        // started the main else  which prints all data
                            $query = "SELECT * FROM doctor ";
                            $data = mysqli_query($link,$query);

                            if(mysqli_num_rows($data)>0)
                            {
                                while($row = mysqli_fetch_assoc($data)){
                                    $Doc_ID = $row['Doc_ID'];
                                    $Doc_Spec = $row['Doc_Spec'];
                                    $Doc_First = $row['Doc_First'];
                                    $Doc_M_Init = $row['Doc_M_Init'];
                                    $Doc_Last = $row['Doc_Last'];
                                    $Doc_Email = $row['Doc_Email'];
                                    $Doc_Phone = $row['Doc_Phone'];
                                    $Doc_Gender = $row['Doc_Gender'];
                                    $Doc_DOB = $row['Doc_DOB'];
                                    $Doc_Street_Addr = $row['Doc_Street_Addr'];
                                    $Doc_State_Addr = $row['Doc_State_Addr'];
                                    $Doc_Zip_Addr = $row['Doc_Zip_Addr'];
                                    $Doc_City_Addr = $row['Doc_City_Addr'];
                                    
                                ?>
                                <tr>
                                    <td><?php $Doc_ID ?></td>
                                    <td><?php $Doc_Spec ?></td>
                                    <td><?php $Doc_First ?></td>
                                    <td><?php $Doc_M_Init ?></td>
                                    <td><?php $Doc_Last ?></td>
                                    <td><?php $Doc_Email ?></td>
                                    <td><?php $Doc_Phone ?></td>
                                    <td><?php $Doc_Gender ?></td>
                                    <td><?php $Doc_DOB ?></td>
                                    <td><?php $Doc_Street_Addr ?></td>
                                    <td><?php $Doc_City_Addr ?></td>
                                    <td><?php $Doc_State_Addr ?></td>
                                    <td><?php $Doc_Zip_Addr ?></td>
                                    <td>
                                        <!-- this will link to edit forms and delete button -->
                                        <a href="<a href='/backend/DoctorDataReport.php?Pat_ID='.$result['Pat_ID']." class='btn' >Delete</a>
                                        <a href='#?temp=Edit&ID=".$Doc_ID."'>Edit</a>
                                    </td>
                                </tr>
                                <?php 
                                // close while
                                }
                            //closes inner if
                            }else{
                                // ends here cause we wana close while loop and run else
                                ?>
                                <tr>
                                    <td>NO RECORDS</td>
                               
                                </tr>
                                <?php
                            // closes inner else
                            }
                        // closes outer else
                        }

                ?>
            </tbody>
        </table>


</body>