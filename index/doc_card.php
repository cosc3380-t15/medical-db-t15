<?php                                                    # code...
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
    $sql = "SELECT * FROM doctor WHERE Doc_ID = '".$_SESSION['id']."' LIMIT 1";
    $result = $link->query($sql);
    if($result){ // only execute this if there are results ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/card.css">
</head>

<body>

<div class="card">
    <img src="images/card_doctor.png" alt="Avatar" style="width:50%">
    <div class="container">
        <h4><b><?php foreach($result as $row){ echo $row["Doc_First"]. " " .$row["Doc_Last"];?></b></h4>
        <p><?php echo $row["Doc_Email"];?></p>
        <p><?php echo $row["Doc_Phone"];?></p>
        <p>DOB: <?php echo $row["Doc_DOB"];?></p>
        <p>Address: <?php echo $row["Doc_Street_Addr"];?></p>
        <p><?php echo $row["Doc_City_Addr"]. ", " .$row["Doc_State_Addr"]. " " .$row["Doc_Zip_Addr"]; }?></p>
        <?php } else {
            echo "Internal Error: Doctor not found";
        } ?>
    </div>
</div>
</body>