<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

// $result = mysqli_query($link,"SELECT * FROM patient ");
// $row= mysqli_fetch_array($result);

$result2 = mysqli_query($link,"SELECT * FROM prescription WHERE Per_ID='" .$_GET['Per_ID']. "'");
$row2= mysqli_fetch_array($result2);




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
        <form action="/backend/edit_prescription.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Perscribe Medicine</h4>
                <div class="input-group input-group-icon">
                    <h4>Doctor ID</h4>
                    <input type="text" placeholder="Doctor ID" name="doc_id" id="pat-i" value="<?php echo $_SESSION['id']; ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <h4>Prescription ID</h4>
                    <input type="text" placeholder="Prescription ID" name="per_id" id="pat-i" value="<?php echo $row2['Per_ID']; ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <h4>Patient ID</h4>
                    <input type="text" placeholder="Patient ID" name="pat_id" id="pat-i" value="<?php echo $row2['Pat_ID']; ?>" required readonly/>
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
               
            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Prescribe:</h4>
                    <select class="float-right" name="prescription" id="allergies" >
                        <option value="N/A">N/A</option>
                        <option value="Amoxicillin">Amoxicillin</option>
                        <option value="Aspirin">Aspirin</option>
                        <option value="Insulin">Insulin</option>
                        <option value="Carbamazepine">Carbamazepine</option>
                        <option value="Ibuprofen">Ibuprofen</option>
                    </select>
                </div>
            </div>
            <input class="button" type="submit" name="update_perscription_data">
        </form>
    </div>
  




</body>

</html>