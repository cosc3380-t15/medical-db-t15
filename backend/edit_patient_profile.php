<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$result = mysqli_query($link,"SELECT * FROM patient WHERE Pat_ID='" .$_SESSION['id']. "'");
$row= mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="/index/styles/form.css">
</head>

<body>
<?php
if (isset($_SESSION['status'])) {
    echo "<h4>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
}
?>
    <div class="container-form11">
        <form action="/backend/update_patient_data.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Update Patient Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Patient ID" name="pat_id" id="pat-id" value="<?php echo $_SESSION["id"]; ?>" required />
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname"  value="<?php echo $row['Pat_First']; ?>" />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit"  value="<?php echo $row['Pat_M_init']; ?>"/>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  value="<?php echo $row['Pat_Last']; ?>" />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email"  value="<?php echo $row['Pat_Email']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone" value="<?php echo $row['Pat_Phone']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>

            <div class="row">
                <h4> Date of Birth: </h4>
                <div class="input-group input-group-icon">
                     <input type="date" name="dob" value="<?php echo $row['Pat_DOB']; ?>">
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>

            <div class="row">
                <h4 style="float: left;">Gender &#160<h4 style="color: red;">*</h4></h4>
                <div class="input-group">
                    <input class="col-half" id="gender-male" type="radio" name="gender" value="Male"  />
                    <label for="gender-male">Male</label>
                    <input class="col-half" id="gender-female" type="radio" name="gender" value="Female"  />
                    <label class="float-right" for="gender-female">Female</label>
                </div>
            </div>

            <div class="row">
                <h4> Body Measurements &#160</h4>
                <div class="input-group">
                    <div class="col-half input-group-icon">
                        <input type="text" placeholder="Weight" name="weight"  value="<?php echo $row['Pat_Weight']; ?>"/>
                        <span class="input-unit">kg</span>
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                    <div class="col-half input-group-icon">
                        <input type="text" placeholder="Height" name="height"  value="<?php echo $row['Pat_Height']; ?>"/>
                        <span class="input-unit">cm</span>
                        <div class="input-icon"><span style="color:red;">*</span></div>                    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4 style="float: left;">Race &#160<h4 style="color: red;">*</h4></h4>
                    </div>
                    <select class="float-right" name="race" id="allergies" value="<?php echo $row['Pat_Race']; ?>">
                        <option value="100">White</option>
                        <option value="101">Black or African American</option>
                        <option value="102">Asian</option>
                        <option value="103">Native Hawaiian or Other Pacific Islander</option>
                        <option value="104">Some other race</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4 style="float: left;">Are you alergic to one of the following? &#160<h4 style="color: red;">*</h4></h4>
                    </div>
                    <select class="float-right" name="allergies" id="allergies" value="<?php echo $row['Pat_Allergy']; ?>">
                        <option value="200">N/A</option>
                        <option value="201">Amoxicillin</option>
                        <option value="202">Aspirin</option>
                        <option value="203">Insulin</option>
                        <option value="204">Carbamazepine</option>
                        <option value="205">Ibuprofen</option>
                    </select>
                </div>
            </div>
            <div class="row">
            <h4>Address</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Address" name="address"  value="<?php echo $row['Pat_Street_Addr']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <div class="col-third">
                        <input type="text" placeholder="City" name="city"  value="<?php echo $row['Pat_City_Addr']; ?>"/>
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                    <div class="col-third input-group-icon">
                        <input type="text" placeholder="State" name="state"  value="<?php echo $row['Pat_State_Addr']; ?>"/>
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                    <div class="col-third input-group-icon">
                        <input type="text" placeholder="Zip Code" name="zip"  value="<?php echo $row['Pat_Zip_Addr']; ?>"/>
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                </div>
            </div>
            <input class="button" type="submit" name="update_patient_data">
        </form>
    </div>
  




</body>

</html>