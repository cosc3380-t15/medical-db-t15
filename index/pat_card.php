<?php                                                    # code...
    session_start();
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
    
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
    $sql = "SELECT * FROM patient WHERE Pat_Email = '".$_SESSION['username']."' LIMIT 1";
    $result = $link->query($sql);
    if($result){ // only execute this if there are results ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/card.css">
</head>

<body>

<div class="card">
    <img src="images/patient.png" alt="Avatar" style="width:50%">
    <div class="container">
        <h4><b><?php foreach($result as $row){ echo $row["Pat_First"]. " " .$row["Pat_Last"];?></b></h4>
        <p><?php echo $row["Pat_Email"];?></p>
        <p><?php echo $row["Pat_Phone"];?></p>
        <p>DOB: <?php echo $row["Pat_DOB"];?></p>
        <p>Gender: Male</p>
        <p>Race: White</p>
        <p>Weight: <?php echo $row["Pat_Weight"];?> lbs</p>
        <p>Height; <?php echo $row["Pat_Height"];?> cm</p>
        <p>Address: <?php echo $row["Pat_Street_Addr"];?></p>
        <p><?php echo $row["Pat_City_Addr"]. ", " .$row["Pat_State_Addr"]. " " .$row["Pat_Zip_Addr"]; }?></p>
    </div>
</div>

</body>
<?php } else {
    echo "Internal Error: Patient not found";
} ?>