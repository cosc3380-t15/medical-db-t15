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
            <a href="../index/doc_profile.php">&#8592; Back<a></a>
                <div class="row">
                    <h4 style="color: var(--accent)">Perscribe Medicine</h4>
                    <h4>Doctor ID</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Doctor ID" name="doc_id" id="pat-i"
                            value="<?php echo $_SESSION['id']; ?>" required readonly />
                        <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                    </div>
                    <h4>Patient ID</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Patient ID" name="pat_id" id="pat-i"
                            value="<?php echo $row['Pat_ID']; ?>" required readonly />
                        <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                    </div>
                    <h4>Patient Name</h4>
                    <div class="input-group input-group-icon col-half">
                        <input type="text" placeholder="First Name" name="fname" 
                            value="<?php echo $row['Pat_First']; ?>" readonly />
                        <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                    </div>
                    <div class="input-group input-group-icon col-half">
                        <input type="text" placeholder="Last Name" name="lname" value="<?php echo $row['Pat_Last']; ?>"
                            readonly />
                        <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group">
                        <div class="col-half">
                            <h4>Patient Weight</h4>
                            <input type="text" placeholder="Weight" name="weight" value="<?php echo $row['Pat_Weight']."
                                kg";?>" readonly/>
                            <span class="input-unit">kg</span>
                        </div>
                        <div class="col-half">
                            <h4>Patient Height</h4>
                            <input type="text" placeholder="Height" name="height" value="<?php echo $row['Pat_Height']."
                                cm"; ?>"readonly/>
                        </div>
                    </div>
                </div>

                <div class="input-group input-group-icon">
                    <div class="col-half">
                        <h4 style="float: left; ">Date &#160</h4><h4 style="color: red;">*</h4>
                        
                    </div>
                    <div class="input-group input-group-icon col-half">
                        <input type="date" name="date" required />
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group">
                        <h4 class="col-half">Prescribe:</h4>
                        <select class="float-right" name="prescription" id="allergies">
                            <option value="N/A">N/A</option>
                            <option value="Amoxicillin">Amoxicillin</option>
                            <option value="Aspirin">Aspirin</option>
                            <option value="Insulin">Insulin</option>
                            <option value="Carbamazepine">Carbamazepine</option>
                            <option value="Ibuprofen">Ibuprofen</option>
                        </select>
                    </div>
                </div>
                <input class="button" type="submit" name="update_patient_data">
    </div>










</body>

</html>