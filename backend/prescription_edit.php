<?php
session_start();
if($_SESSION['loggedin'] != true  or $_SESSION['role'] != "Doc") {
    header("Location: login.php");
}
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
    <div class="container-form11">
        <form action="/backend/edit_prescription.php" method="post" onsubmit="return Validate();">
            <a href="../index/login.php">&#8592; Back<a></a>
            <div class="row">
                <h4 style="color: var(--accent);">Perscribe Medicine</h4>
                <h4>Doctor ID</h4>
                <div class="input-group input-group-icon">                  
                    <input type="text" placeholder="Doctor ID" name="doc_id" id="pat-i" value="<?php echo $_SESSION['id']; ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
                <h4>Prescription ID</h4>
                <div class="input-group input-group-icon">                   
                    <input type="text" placeholder="Prescription ID" name="per_id" id="pat-i" value="<?php echo $row2['Per_ID']; ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
                <h4>Patient ID</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Patient ID" name="pat_id" id="pat-i" value="<?php echo $row2['Pat_ID']; ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
               
            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4  style="float: left;">Prescribe: &#160<h4 style="color: red;">*</h4></h4>
                    </div>
                    <select class="float-right" name="prescription" id="allergies" value=<?php echo $row2['Per_Desc'];?>>
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
<?php
if (isset($_SESSION['status'])) {
    echo "<h4>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
}
?>
</body>

</html>