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
                    <input type="text" placeholder="Doctor ID" name="doc_id" id="pat-i" value="<?php echo $row['Doc_First'];  ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <h4>Patient ID</h4>
                    <input type="text" placeholder="Patient ID" name="pat_id" id="pat-i" value="<?php echo $_SESSION['id']; ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Location</h4>
                    <select class="float-right" name="prescription" id="allergies" >
                        <option value="Houston">Houston</option>
                        <option value="SugarLand">Sugar Land</option>
                        <option value="Caty">Caty</option>
                        <option value="Woodlands">The Woodlands</option>
                    </select>
                </div>
            </div>
            <div class="input-group input-group-icon">
                    <input type="date" name="dob" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Time</h4>
                    <select class="float-right" name="prescription" id="allergies" >
                        <option value="08:00:00">08:00AM</option>
                        <option value="09:00:00">09:00AM</option>
                        <option value="10:00:00">10:00AM</option>
                        <option value="11:00:00">11:00AM</option>
                        <option value="12:00:00">12:00AM</option>
                        <option value="13:00:00">13:00AM</option>
                        <option value="14:00:00">14:00AM</option>
                    </select>
                </div>
            </div>
            <input class="button" type="submit" name="update_patient_data">
        </form>
    </div>
  




</body>

</html>