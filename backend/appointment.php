<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");

$dbhost = "eyiece.mynetgear.com";
$dbuser = "root";
$dbpass = "93U#muq!fPzZ"; 
$dbname = "medical_db";

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
        <form action="/backend/create_appointment.php" method="post" onsubmit="return Validate();">
            <a href="../index/pat_profile.php">&#8592; Back<a></a>    
            <div class="row">
                <h4 style="color: var(--accent)">Schedule Appointment</h4>
                <h4>Doctor ID</h4>
                <div class="input-group input-group-icon">
                    
                    <input type="text" placeholder="Doctor ID" name="doc_id" id="pat-i" value="<?php echo $row['Doc_ID'];  ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
                <h4>Patient ID</h4>
                <div class="input-group input-group-icon"> 
                    <input type="text" placeholder="Patient ID" name="pat_id" id="pat-i" value="<?php echo $_SESSION['id']; ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
                <h4>Doctor Specialization</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Doctor Specialization" name="doc_spec" id="pat-i" value="<?php echo $row['Doc_Spec']; ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4 style="float: left;">Location &#160<h4 style="color: red;">*</h4></h4>
                    </div>
                    <select class="float-right" name="location" id="allergies" >
                        <option value="1">Houston</option>
                        <option value="2">Sugar Land</option>
                        <option value="3">Caty</option>
                        <option value="4">The Woodlands</option>
                    </select>
                </div>
            </div>
            <div class="input-group input-group-icon">
                <div class="col-half">
                    <h4 style="float: left;">Date &#160<h4 style="color: red;">*</h4></h4>
                </div>        
                <div class="input-group input-group-icon col-half">
                    <input type="date" name="date" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                <div class="col-half">
                    <h4 style="float: left;">Time &#160<h4 style="color: red;">*</h4></h4>
                </div>   
                    <select class="float-right" name="time" id="allergies" >
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
            <input class="button" type="submit" name="update_appointment_data">
        </form>
    </div>
  




</body>

</html>