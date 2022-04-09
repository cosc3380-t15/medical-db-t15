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


INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Dentist', 'Clark  ', 'H', 'Nolan', 'nolan@clinico.org', '2347653487', 'Male', '1980-08-09', '65 dary ashford dr', 'katy', 'texas', '66778', 'nolan1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Pediatrician', 'Lucie', 'H', 'East', 'east@clinico.org', '7651235409', 'Female', '1988-04-12', '654 dunvale dr', 'houston', 'texas', '77877', 'east1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Dermatologist', 'Anabella ', 'T', 'Mora', 'mora@clinico.org', '1230983487', 'Female', '1989-12-11', '65423 westheimer dr', 'houston', 'texas', '77465', 'mora1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Dermatologist', 'Fardeen  ', 'P', 'Larson', 'larson@clinico.org', '4561238734', 'Male', '1983-03-02', '2345 wilcrest dr', 'houston', 'texas', '77866', 'larson1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Cardiologist', 'Patrik   ', 'B', 'Burks', 'burks@clinico.org', '0887562345', 'Male', '1981-08-03', '1256 sunsed dune dr', 'houston', 'texas', '77082', 'burks1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Endocrinologist', 'Yahya  ', 'G', 'Fernandez', 'fernandez@clinico.org', '4443336565', 'Male', '1991-03-09', '45632 shadowbrier dr', 'spring', 'texas', '557766', 'fernandez1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Neurologist', 'Reo ', 'Y', 'Kramer', 'kramer@clinico.org', '8889990101', 'Male', '1984-07-11', '7653 dunvale dr', 'houston', 'texas', '77877', 'kramer1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Neurologist', 'Zuzanna  ', 'P', 'Phan', 'phan@clinico.org', '3331112334', 'Female', '1989-11-05', '1214 westheimer dr', 'houston', 'texas', '77465', 'phan1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Oncologist', 'Safwan', 'G', 'Lane', 'lane@clinico.org', '6667778787', 'Male', '1980-07-02', '2345 spring plaza dr', 'spring', 'texas', '77546', 'lane1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Radiologists', 'Clarissa', 'H', 'Barrera', 'barrera@clinico.org', '6657768798', 'MaFemalele', '1986-12-12', '5632 pine road', 'houston', 'texas', '77582', 'barrera1234');



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
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname"  value="<?php echo $row['Pat_First']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit"  value="<?php echo $row['Pat_M_init']; ?>"/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  value="<?php echo $row['Pat_Last']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email"  value="<?php echo $row['Pat_Email']; ?>"/>
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone" value="<?php echo $row['Pat_Phone']; ?>"/>
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
            </div>

            <div class="row">
                <div class="input-group input-group-icon">
                    <label for="">
                        <h4> Date of Birth: </h4>
                    </label>
                    <input type="date" name="dob" value="<?php echo $row['Pat_DOB']; ?>">
                </div>
            </div>

            <div class="row">
                <h4>Gender</h4>
                <div class="input-group">
                    <input class="col-half" id="gender-male" type="radio" name="gender" value="Male"  />
                    <label for="gender-male">Male</label>
                    <input class="col-half" id="gender-female" type="radio" name="gender" value="Female"  />
                    <label class="float-right" for="gender-female">Female</label>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <input type="text" placeholder="Weight" name="weight"  value="<?php echo $row['Pat_Weight']; ?>"/>
                    </div>
                    <div class="col-half">
                        <input type="text" placeholder="Height" name="height"  value="<?php echo $row['Pat_Height']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Race:</h4>
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
                    <h4 class="col-half">Are you allergic to one of the following?</h4>
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

            <div class="input-group input-group-icon">
                <input type="text" placeholder="Address" name="address"  value="<?php echo $row['Pat_Street_Addr']; ?>"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group">
                <div class="col-third">
                    <input type="text" placeholder="City" name="city"  value="<?php echo $row['Pat_City_Addr']; ?>"/>
                </div>
                <div class="col-third">
                    <input type="text" placeholder="State" name="state"  value="<?php echo $row['Pat_State_Addr']; ?>"/>
                </div>
                <div class="col-third">
                    <input type="text" placeholder="Zip Code" name="zip"  value="<?php echo $row['Pat_Zip_Addr']; ?>"/>
                </div>

            </div>
            <input class="button" type="submit" name="update_patient_data">
        </form>
    </div>
  




</body>

</html>