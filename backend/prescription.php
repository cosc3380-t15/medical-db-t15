<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$result = mysqli_query($link,"SELECT * FROM patient WHERE Pat_ID='" .$_GET['Pat_ID']. "'");
$row= mysqli_fetch_array($result);

// $result2 = mysqli_query($link,"SELECT * FROM doctor WHERE Doc_ID='" .$_SESSION['id']. "'");
// $row2= mysqli_fetch_array($result);

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
        <form action="/backend/create_prescription.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Perscribe Medicine</h4>
                <div class="input-group input-group-icon">
                    <h4>Doctor ID</h4>
                    <input type="text" placeholder="Doctor ID" name="doc_id" id="pat-i" value="<?php echo $_SESSION['id']; ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <h4>Patient ID</h4>
                    <input type="text" placeholder="Patient ID" name="pat_id" id="pat-i" value="<?php echo $row['Pat_ID']; ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <h4>Patient Name</h4>
                    <input type="text" placeholder="First Name" name="fname"  value="<?php echo $row['Pat_First']; ?>" readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  value="<?php echo $row['Pat_Last']; ?>" readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4>Patient Weight</h4>
                        <input type="text" placeholder="Weight" name="weight"  value="<?php echo $row['Pat_Weight']; ?>" readonly/>
                    </div>
                    <div class="col-half">
                        <h4>Patient Height</h4>
                        <input type="text" placeholder="Height" name="height"  value="<?php echo $row['Pat_Height']; ?>"readonly/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Prescribe:</h4>
                    <select class="float-right" name="prescription" id="allergies" >
                        <option value="200">N/A</option>
                        <option value="201">Amoxicillin</option>
                        <option value="202">Aspirin</option>
                        <option value="203">Insulin</option>
                        <option value="204">Carbamazepine</option>
                        <option value="205">Ibuprofen</option>
                    </select>
                </div>
            </div>
            <input class="button" type="submit" name="update_patient_data">
        </form>
    </div>
  




</body>

</html>