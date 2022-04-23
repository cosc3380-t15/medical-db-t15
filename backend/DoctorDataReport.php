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
     
    if (isset($_GET['Doc_ID'])) {  
        $Doc_ID = $_GET['Doc_ID'];  
        $query = "DELETE FROM `doctor` WHERE Doc_ID = '$Doc_ID'";  
        $run = mysqli_query($link,$query);  
        if ($run) {  
            header('location:/index/doc_profile.php');   
        }else{  
            echo "Error: ".mysqli_error($link);  
        }  
    }
   
    if (isset($_GET['submit']))
    {
        $ID = $_GET['ID'];
        $Spec = $_GET['Spec'];
        $FName = $_GET['Fname'];
        // $Mname = $_GET['Mname'];
        $Location = $_GET['Location'];
        $Lname = $_GET['Lname'];
        $Gender = $_GET['gender'];
        // $DOB = $_GET['DOB'];
        // initiallizing as a string this is aproblem cause idk what to do with date types
        $DOB = "";
        $Mname = "";

        if ($ID != '$' ||$Spec != '$' ||$FName != '$' ||$Location != '$' ||$Lname != '$' ||$Gender != '$' )
        {
            // something changed so do this
            $select = "SELECT * FROM doctor WHERE Doc_ID = '$ID' or Doc_Spec LIKE '$Spec' or Doc_Gender = '$Gender' or Doc_First LIKE '%$FName%' or Doc_Location LIKE '$Location' or Doc_Last LIKE '%$Lname%'  ";
        }else{
            // if nothing set and pressed submit
            $select = "SELECT * FROM doctor";
        }
    }else{
        // if nothing set the print all
        $select = "SELECT * FROM doctor";
    }
   
    // if(isset($_POST['button1'])) {
    //     $Per_ID = $_POST['ID']; 
    //     $status = 'APPROVED';
    //     $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
    //     $run = mysqli_query($link,$query);  
    //     if ($run) {  
    //         header('location:/backend/approve_denyPrescription.php');  
    //     }else{  
    //         echo "Error: ".mysqli_error($link);  
    //     }  
    // }
    
    
    // if(isset($_POST['button2'])) {
    //     $Per_ID = $_POST['ID']; 
    //     $status = 'DENIED';
    //     $query = "UPDATE prescription SET Per_Status = '$status' WHERE Per_ID = '$Per_ID'";  
    //     $run = mysqli_query($link,$query);  
    //     if ($run) {  
    //         header('location:/backend/approve_denyPrescription.php');  
    //     }else{  
    //         echo "Error: ".mysqli_error($link);  
    //     }  
    // }

    $unq_Location_select = "SELECT DISTINCT Doc_Location From  doctor";
    $unq_Spec_select = "SELECT DISTINCT Doc_Spec From  doctor";
    $unq_Location_query = mysqli_query($link,$unq_Location_select);
    $unq_Spec_query = mysqli_query($link,$unq_Spec_select);
    $query = mysqli_query($link,$select);

?>


<html>  
    <head>
        <link rel="stylesheet" href="/index/styles/show_patients.css">
        <link rel="stylesheet" href="/index/styles/form.css">
          
    </head>
<body>
    <!-- Making Search Fields to scan through when needed-->

    <div class="container-form12">  
        <form action = "/backend/DoctorDataReport.php" method  = "GET">
        <div class="row">
            <h4>Doctor ID</h4>
                <div class="input-group input-group-icon">
                    <input type = "text" placeholder="0000000" name="ID" value = "$"/>
                    <div class="input-icon"></div>
                </div>
                <div class="input-group">
                    <div class="col-half">
                        <h4>Specialty</h4>
                        <div class="input-group input-group-icon">
                        <select id="width" name="Spec" >
                            <option value="$" selected> None</option>
        
                        
                            <?php
                            while($result=mysqli_fetch_assoc($unq_Spec_query)){
                                echo "<option value=".$result['Doc_Spec'].">".$result['Doc_Spec']."</option>";
                            }
                            ?>
                            </select>
                        </div>  
                    </div>
                    <div class="col-half">
                        <h4>location</h4>
                        <div class="input-group input-group-icon">
                        <select id="width" name="Location" >
                            <option value="$" selected> None</option>
        
                        
                            <?php
                            while($result=mysqli_fetch_assoc($unq_Location_query)){
                                echo "<option value=".$result['Doc_Location'].">".$result['Doc_Location']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>



            <h4>First Name</h4>
            <div class="input-group input-group-icon">
                <input type = "text" placeholder="First Name" name="Fname" value = "$"/>
                <div class="input-icon"></div>
            </div>
            <h4>Last Name</h4>
                <div class="input-group input-group-icon">
                    <input type = "text" placeholder="Last Name" name="Lname" value = "$"/>
                    <div class="input-icon"></div>
                </div>

               

        </div>
            <div class="row"> 
                <h4 style="float: left;">Gender &#160<h4 style="color: blue;">&nbsp</h4></h4>
                <div class="input-group">
                    <div class="col-third">
                        <input class="col-half" id="gender-male" type="radio" name="gender" value="Male" required />
                        <label id="width" for="gender-male">Male</label>
                    </div>
                    <div class="col-third">
                        <input class="col-half" id="gender-female" type="radio" name="gender" value="Female" required />
                        <label  id="width" class="float-right" for="gender-female">Female</label>
                    </div>
                    <div class="col-third">
                        <input id="either" type ="radio" name="gender" value ="$" checked = "checked">
                        <label id="width" class="float-right" for="either">Either</label> 
                    </div>
                    
                   
                   

                </div>
            </div>
            <div >
                <!-- <label > Last Name </label> -->
                <div >

                <input  class="button2" type='submit' name='submit' value='SEARCH'/>
                </div> 
            </div>   
        </form>
        <div>
            <form>
            <div class="input-group">
                <div class="col-third">
                    <input class="button2" type="button" value="BACK" onclick="history.back()"> 
                </div>
                <div class="col-third">
                    <input class="button2" type="button" onclick="location.href='/index/OA_profile.php?'" value="Profile" />
                </div>
                <div class="col-third">
                    <input class="button2" type="button" onclick="location.href='/index/home.php?'" value="Home" />
                </div>
                          
               
               
            </div>
            </form>
        </div>
    </div>


    <!-- Forming table and making it readable-->
    <div>
        <table border="1" cellpadding="0"> 
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Speciality </th>
                    <th>Location </th>
                    <th>First </th>
                    <th>Last </th>
                    <th>Email </th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th> Operations <th>
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
                                <td> ".$result['Doc_Location']." </td>
                                <td> ".$result['Doc_First']." </td>
                                <td> ".$result['Doc_Last']." </td>
                                <td> ".$result['Doc_Email']." </td>
                                <td> ".$result['Doc_Phone']." </td>
                                <td> ".$result['Doc_Gender']." </td>
                                <td>
                                <a href='/backend/DoctorDataReport.php?Doc_ID=".$result['Doc_ID']." 'class='deny btn'>DELETE</a>
                                <a href='/backend/edit_doctor.php?Doc_ID=".$result['Doc_ID']." 'class='btn'>Edit</a>   
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