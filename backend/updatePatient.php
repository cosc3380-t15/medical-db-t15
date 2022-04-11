<!--

THIS IS A COPY OF THE PATIENTS REGISTER PAGE WHERE THE INFORMATION IS AUTOFILLED, THIS IS DIFFERENT FROM THE DRAGO'S CAUSE THAT ONE WORKED WITH SESSION ID THIS WORKS DUE TO HREF PASSING VALUES,
THIS IS NOT TESTED AND IS BELIEVED TO WORK (cough cough YOUTUBE).

MISSING AN ADD BACK, SO BASICALLY UPDATE ALL THIS INFORMATION WITH THE NOT CHANGIN USER ID.
-->>


<?php

// this is to get all the values stored in the href and put them in to callable values
include("add_viewPatients.php");
error_reporting(0);
$ID = $_GET["ID"];
$Alergy = $_GET["Alergy"];
$FName = $_GET["FName"];
$MName = $_GET["MName"];
$LName = $_GET["LName"];
$Email = $_GET["Email"];
$Phone = $_GET["Phone"];
$Adress = $_GET["Adress"];
$DOB = $_GET["DOB"];
$Gender = $_GET["Gender"];
$Weight = $_GET["Weight"];
$Height = $_GET["Height"];
$Race = $_GET["Race"];
$StreetA = $_GET['SA'];
$CityA = $_GET['CA'];
$StateA = $_GET['StateAdress'];
$ZipA = $_GET['ZIP'];

// under all place holders are removed and added vaue with therir respective ones. 




?>





<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

<head>

    <link rel="stylesheet" href="styles/form.css">


</head>

<body>

    <div class="container-form11">
        <a href="login.php">< Back<a>
        <form action="/backend/create_pat_profile.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Patient Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" value = "<?php echo $FName ?>" name="fname" required />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" value = "<?php echo $MName ?>" name="minit"/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" value = "<?php echo $LName ?>" name="lname" required />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" value = "<?php echo $Email ?>" name="email" required />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" value = "<?php echo $Phone ?>" name="phone" required />
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
            </div>
            <div class="row">    
                <div class="input-group input-group-icon">
                    <label for="">
                        <h4> Date of Birth: </h4>
                    </label>
                    <input type="date" value = "<?php echo $DOB ?>" name="dob" required>
                </div>
            </div>

            <div class="row">
                <h4>Gender</h4>
                <div class="input-group">

                    <!-- needs if clauses to change cause required a checked at the end -->

                    <?php 
                        if($Gender == "male"){
                            echo "<input class='col-half' id='gender-male' type='radio' name='gender' value='1' required checked/>";
                            echo "<label for='gender-male'>Male</label>";
                        }else {
                            echo "<input class='col-half' id='gender-male' type='radio' name='gender' value='1' required />";
                            echo "<label for='gender-male'>Male</label>";
                        }
                        if($Gender == "Female"){
                            echo "<input class='col-half' id='gender-female' type='radio' name='gender' value='2' required checked/>";
                            echo "<label for='gender-female'>Female</label>";
                        }else{
                            echo "<input class='col-half' id='gender-female' type='radio' name='gender' value='2' required />";
                            echo "<label for='gender-female'>Female</label>";
                        }
                    ?>

                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <input type="text" value = "<?php echo $Weight ?>" name="weight" required />
                    </div>
                    <div class="col-half">
                        <input type="text" value = "<?php echo $Height ?>" name="height" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Race:</h4>
                    <select class="float-right" name="race" id="allergies">
                        <?php 
                        if($Race == 100){
                            echo "<option selecteted value='100'>White</option>";
                        }else{
                            echo "<option value='100'>White</option>";
                        }
                        if($Race == 101){
                            echo "<option selecteted value='101'>Black or African American</option>";
                        }else{
                            echo "<option value='101'>Black or African American</option>";
                        }
                        if($Race == 102){
                            echo "<option selecteted value='102'>Asian</option>";
                        }else{
                            echo "<option value='102'>Asian</option>";
                        }
                        if($Race == 103){
                            echo "<option selecteted value='103'>Native Hawaiian or Other Pacific Islander</option>";
                        }else{
                            echo "<option value='103'>Native Hawaiian or Other Pacific Islandern</option>";
                        }
                        if($Race == 104){
                            echo "<option selecteted value='104'>Some other race</option>";
                        }else{
                            echo "<option value='104'>Some other racen</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Are you alergic to one of the following?</h4>

                    <!-- need alot of if statements cause it need a selected option if its wants to be pre-selected-->
                    <select class="float-right" name="allergies" id="allergies">
                        <?php 
                        if($Alergy == "N/A"){
                            echo "<option selecteted value='200'>N/A </option>";
                        }else{
                            echo "<option value='200'>N/A</option>";
                        }
                        if($Alergy == "Amoxicillin"){
                            echo "<option selecteted value='201'>Amoxicillin</option>";
                        }else{
                            echo "<option value='201'>Amoxicillin</option>";
                        }
                        if($Alergy == "Aspirin"){
                            echo "<option selecteted value='202'>Aspirin</option>";
                        }else{
                            echo "<option value='202'>Aspirin</option>";
                        }
                        if($Alergy == "Insulin"){
                            echo "<option selecteted value='203'>Insulin</option>";
                        }else{
                            echo "<option value='203'>Insulin</option>";
                        }
                        if($Alergy == "Carbamazepine"){
                            echo "<option selecteted value='204'>Carbamazepine</option>";
                        }else{
                            echo "<option value='204'>Carbamazepine</option>";
                        }
                        if($Alergy == "Ibuprofen"){
                            echo "<option selecteted value='205'>Ibuprofen</option>";
                        }else{
                            echo "<option value='205'>Ibuprofen</option>";
                        }                                                                                              

                        ?>

                    </select>
                </div>
            </div>

            <div class="input-group input-group-icon">
    <!-- these needs some work cause even though its simple adress comes as a composite value i need to break it  aka string manipulation
        IDK HOW TO BREAK THE ADRESS AS ITS COMING AND HOW TO DEAL WITH IT YET 
    
        SOLUTION TURNS OUT WE STORE IT IN PEICES EITHER WAY SO WE JUST CALL IT STRAIGHT OUT-->
                <input type="text" value = "<?php echo $StreetA ?>" name="address" required />
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group">
                <div class="col-third">
                    <input type="text" value = "<?php echo $CityA ?>"name="city" required />
                </div>
                <div class="col-third">
                    <input type="text" value = "<?php echo $StateA ?>" name="state" required />
                </div>
                <div class="col-third">
                    <input type="text" value = "<?php echo $ZipA ?>" name="zip" required />
                </div>

            </div>
            <input class="button" type="submit">
        </form>
    </div>


</body>

</html>