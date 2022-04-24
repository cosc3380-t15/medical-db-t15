<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$result = mysqli_query($link,"SELECT * FROM doctor WHERE Doc_ID='" .$_GET['Doc_ID']. "'");
$row= mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="/index/styles/form.css">
</head>

<body>
<?php
// if (isset($_SESSION['status'])) {
//     echo "<h4>".$_SESSION['status']."</h4>";
//     unset($_SESSION['status']);
// }
?>
    <div class="container-form11">
        <form action="/backend/update_doctor_data.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Update Docto Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Doctor ID" name="doc_id" id="doc-id" value="<?php echo $row['Doc_ID']; ?>" required  />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname"  value="<?php echo $row['Doc_First']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit"  value="<?php echo $row['Doc_M_Init']; ?>"/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  value="<?php echo $row['Doc_Last']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Specialty" name="occupation"  value="<?php echo $row['Doc_Spec']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Location" name="loc"  value="<?php echo $row['Doc_Location']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email"  value="<?php echo $row['Doc_Email']; ?>"/>
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone" value="<?php echo $row['Doc_Phone']; ?>"/>
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
            </div>

            <div class="row">
                <div class="input-group input-group-icon">
                    <label for="">
                        <h4> Date of Birth: </h4>
                    </label>
                    <input type="date" name="dob" value="<?php echo $row['Doc_DOB']; ?>">
                </div>
            </div>

            <div class="row">
                <h4>Gender</h4>
                <div class="input-group">
                    <?php 
                    if ($row['Doc_Gender'] = 'Male'){
                        echo "<input class='col-half' id='gender-male' type='radio' name='gender' value='Male'  checked='checked'/>";
                    }else{
                        echo "<input class='col-half' id='gender-male' type='radio' name='gender' value='Male'  />";
                    }
                    echo "<label for='gender-male'>Male</label>";
                    if ($row['Doc_Gender'] = 'Female'){
                        echo "<input class='col-half' id='gender-female' type='radio' name='gender' value='Female'  checked='checked' />";
                    }else{
                        echo "<input class='col-half' id='gender-female' type='radio' name='gender' value='Female'  />";
                    }
                    echo "<label class='float-right' for='gender-female'>Female</label>";
                    ?>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="text" placeholder="Address" name="address"  value="<?php echo $row['Doc_Street_Addr']; ?>"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group">
                <div class="col-third">
                    <input type="text" placeholder="City" name="city"  value="<?php echo $row['Doc_City_Addr']; ?>"/>
                </div>
                <div class="col-third">
                    <input type="text" placeholder="State" name="state"  value="<?php echo $row['Doc_State_Addr']; ?>"/>
                </div>
                <div class="col-third">
                    <input type="text" placeholder="Zip Code" name="zip"  value="<?php echo $row['Doc_Zip_Addr']; ?>"/>
                </div>

            </div>
            <input class="button2" type="submit" name="update_patient_data">
        </form>
        
    </div>
  
</body>

</html>