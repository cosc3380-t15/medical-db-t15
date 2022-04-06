<?php
                                                        # code...
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$sql = "SELECT Pat_ID, Pat_First, Pat_Last, Pat_Email, Pat_Phone FROM patient";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Patient ID:  " . $row["Pat_ID"]. "  Name: " . $row["Pat_First"]. " " . $row["Pat_Last"]. "  Email  " . $row["Pat_Email"]. "  Phone  " . $row["Pat_Phone"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  $link->close();

?>

<!DOCTYPE html>
<html>

<head>
 
    <link rel="stylesheet" href="/index/styles/test.css">
</head>

<body>

<div class="card">
    
        <a href="/index/patient.html"><input class="button" type="submit" value="Back"></a>     
        <?php                                                    # code...
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
    $sql = "SELECT Pat_ID, Pat_First, Pat_Last, Pat_Email, Pat_Phone FROM patient";
    $result = $link->query($sql);
    if($result){ // only execute this if there are results ?>
    <div class="container-fahter">

    <div class="container">
        <div class="container-child">
            <p>Patient ID</p>
        </div>
        <div class="container-child">
            <p>Name</p>
        </div>
        <div class="container-child">
            <p>Email</p>
        </div>
        <div class="container-child">
            <p>Phone</p>
        </div>
    </div>

        <div class="container">
            <h4>Patient ID:</h2>
        <ul> 
            <?php
            $count = 0;
            foreach($result as $row){ //loop over all the results?>
        <li class="<?php // if this is the first row output the first-row class, 
                        // otherwise output other-row class
            echo $count==0 ? 'first-row' : 'other-row'; ?>">
            <?php echo " " . $row["Pat_ID"]. "  " . $row["Pat_First"]. " " . $row["Pat_Last"]. "    " . $row["Pat_Email"]. "    " . $row["Pat_Phone"]. "<br>"; ?><button class="float-right">Delete</button></li>
            <?php $count++; // increment my count var
            } // endforeach?>
            </ul>
        </div>
        

    </div>
    
  

    <?php 
    } //end if?>

    
</div>

</body>

