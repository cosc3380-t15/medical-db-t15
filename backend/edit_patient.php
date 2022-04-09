<?php 
session_start(); 
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (count($_POST)>0) {
    $id = $_POST['pat_id'];

    $name = $_POST['fname'];
    $minit = $_POST['minit'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $race = $_POST['race'];
    $allergies = $_POST['allergies'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $query = "UPDATE patient SET Pat_First='$name', Pat_M_init='$minit', Pat_Last='$lname', Pat_Email='$email', Pat_Phone='$phone', Pat_Gender='$gender', Pat_Race='$race', Pat_DOB='$dob', Pat_Height='$height', Pat_Weight='$weight', Pat_Street_Addr='$address', Pat_City_Addr='$city', Pat_State_Addr='$state', Pat_Zip_Addr='$zip', Pat_Allergy='$allergies' WHERE Pat_ID='$id' ";
    $query_run = mysqli_query($link,$query);
}
$result = mysqli_query($link,"SELECT * FROM patient WHERE Pat_ID='" .$_GET['Pat_ID']. "'");
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
                    <input type="text" placeholder="Patient ID" name="pat_id" value="" required />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname" id="first_name" value="<?php echo $row['Pat_First']; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit" value="TEST"/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname" id="last_name"  />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email"  />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone"  />
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
            </div>

            <div class="row">
                <div class="input-group input-group-icon">
                    <label for="">
                        <h4> Date of Birth: </h4>
                    </label>
                    <input type="date" name="dob" >
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
                        <input type="text" placeholder="Weight" name="weight"  />
                    </div>
                    <div class="col-half">
                        <input type="text" placeholder="Height" name="height"  />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Race:</h4>
                    <select class="float-right" name="race" id="allergies">
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
                    <select class="float-right" name="allergies" id="allergies">
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
                <input type="text" placeholder="Address" name="address"  />
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group">
                <div class="col-third">
                    <input type="text" placeholder="City" name="city"  />
                </div>
                <div class="col-third">
                    <input type="text" placeholder="State" name="state"  />
                </div>
                <div class="col-third">
                    <input type="text" placeholder="Zip Code" name="zip"  />
                </div>

            </div>
            <input class="button" type="submit" name="update_patient_data">
        </form>
    </div>
  




</body>

</html>