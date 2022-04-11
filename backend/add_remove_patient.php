<!--
THIS IS JUST THE RECORDS FOR ALL PATIENTS,
IT NEEDS TO BE TESTED AND THERE NEEDS TO BE A FETURE TO SEARCH THE RECORDS, 
THERE IS A YOUTUBE VID BUT IT USES JAVA IDK IF WANA DO THAT YET
-->



<?php 
    // establishes connection nothing else
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");                                                   
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
?>

<?php
        // IF THE DELETE BUTTON IS PRESSED THEN THE POST IS GONNA BE SET THEN THIS WILL RUN. ON YOUTUBE BUNCH THIS IS HOW THEY WERE DOING SO THIS IS WAHT I IMPLEMENTED
        if (isset($_POST['delete_button'])) { 
            $id = $_GET['id'];  
            $query = "DELETE FROM patient WHERE Pat_ID = '$id'";  
            $run = mysqli_query($link,$query);  
        }

        $select=" SELECT * FROM patient ";  
        $query=mysqli_query($link,$select);

?>


<!DOCTYPE HTML>
<html>
<head>
    <title></title>
</head>
<body>
    <!-- this sends you to the register page  but withouth the password cause admin shouldnt handle passwords-->
    <div class = "AddButtonHolder">
        <form action= "registerPatient.php">
            <input type="submit" value="Add Patient" />
        </form>

    </div>
    <div class ="container">
        <div class ="wrapper">
            <!-- change patients info to what ever you wana call it -->
            <h1> patient information</h1>
        </div>
    </div>

    <!-- This is the forming of the table it self -->
    <div class = "dataTable">
                        <!-- wass echoing at first but thought should add a title to each of those columns -->
                        <table>
                        <tr>
                            <td> buttons </td>
                            <td> patient ID</td>
                            <td> patient FName </td>
                            <td> patient MName </td>
                            <td> patient MName </td>
                            <td> patient LName  </td>
                            <td> patient Email </td>
                            <td> patient Phone  </td>
                            <td> patient DOB </td>
                            <td> patient Gender </td>
                            <td> patient Weight </td>
                            <td> patient Height  </td>
                            <td> patient Race </td>
                            <td> patient Alergy </td>
                            <td> patient Street Adress </td>
                            <td> patient City Adress  </td>
                            <td> patient State Adress </td>
                            <td> patient ZIP Adress </td>
                            
                        </tr>
                        <?php
                       
                        while ($result=mysqli_fetch_assoc($query)) {  
                            //Creates a loop to loop through results
                            // declaring all the values got to check the db for correct collection
                            $patientID = $row1["Pat_ID"];
                            $patientFName = $row1["Pat_First"];
                            $patientMName = $row1["Pat_M_init"];
                            $patientLName = $row1["Pat_Last"];
                            $patientEmail = $row1["Pat_Email"];
                            $patientPhone = $row1["Pat_Phone"];
                            $patientDOB = $row1["Pat_DOB"];
                            $patientGender = $row1["Pat_Gender"];
                            $patientWeight = $row1["Pat_Weight"];
                            $patientHeight = $row1["Pat_Height"];
                            $patientRace = $row1["Pat_Race"];
                            $patientAllergy = $row1["Pat_Allergy"];
                            $patientStreetAdress = $row1["Pat_Street_Addr"];
                            $patientCityAdress = $row1["Pat_City_Addr"];
                            $patientStateAdress = $row1["Pat_State_Addr"];
                            $patientZIPAdress = $row1["Pat_Zip_Addr"];                            

                        ?>

                        
                        <tr>
                            <td> 
                                <!-- THIS IS SUPPOSED TO WORK BUT I CANT TEST SO IDK IF IT DOES BUT BASICALLY LEADS YOU TO UPDATEPATIENT.PHP AND WILL AUTO FILL MOST INFORMATION AND OVER THERE YOU WOULD DELET
                                    ADD NEW INFORMATION -->
                                <a href = 'updatePatient.php?ID=$patientID & Alergy=$patientAllergy & FName=$patientFName & MName=$patientMName &
                                            LName=$patientLName & Email=$patientEmail & Phone=$patientPhone & DOB=$patientDOB &
                                            Gender=$patientGender & Weight=$patientWeight & Height=$patientHeight & Race=$patientRace 
                                            & SA=$patientStreetAdress & CA=$patientCityAdress & StateAdress=$patientStateAdress & ZIP=$patientZIPAdress '>Edit
                                        
                            </td> 
                            <td>
                            <form method="post">
                                <input type="submit" name="delete_button" value="Delete"/>
                                <input type="hidden" name="id" value="<?php echo $patientID; ?>"/>
                            </form>
                            </td>
                            <!-- This is filling a table row  with relevaent information outside of php cause cleaner writing-->
                            <td> <?php $patientID ?> </td>
                            <td> <?php $patientFName ?> </td>
                            <td> <?php $patientMName ?> </td>
                            <td> <?php $patientLName ?> </td>
                            <td> <?php $patientEmail ?> </td>
                            <td> <?php $patientPhone ?> </td>
                            <td> <?php $patientDOB ?> </td>
                            <td> <?php $patientGender ?> </td>
                            <td> <?php $patientWeight ?> </td>
                            <td> <?php $patientHeight ?> </td>
                            <td> <?php $patientAllergy ?> </td>
                            <td> <?php $patientStreetAdress ?> </td>
                            <td> <?php $patientCityAdress ?> </td>
                            <td> <?php $patientStateAdress ?> </td>
                            <td> <?php $patientZIPAdress ?> </td>                           


                        </tr>
                        
                        <?php }  // closing the while loop?>
                        </table>

        
    </div>


</body>
</html>
