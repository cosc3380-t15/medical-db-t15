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
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="/index/styles/test.css">
</head>

<body>

<div class="card">
    
        <a href="/index/patient.html"><input class="button" type="submit" value="Back"></a>     
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



if($result){ // only execute this if there are results ?>
    <ul> 
    <?php
    $count = 0;
    foreach($result as $row){ //loop over all the results?>
       <li class="<?php // if this is the first row output the first-row class, 
                       // otherwise output other-row class
           echo $count==0 ? 'first-row' : 'other-row'; ?>">
           <h2>Patient ID   Name        Email           Phone</h2>
           <?php echo "Patient ID:  " . $row["Pat_ID"]. "  Name: " . $row["Pat_First"]. " " . $row["Pat_Last"]. "  Email  " . $row["Pat_Email"]. "  Phone  " . $row["Pat_Phone"]. "<br>"; ?><button class="float-right">Delete</button></li>
<?php $count++; // increment my count var
    } // endforeach?>
   </ul>

<?php 
} //end if?>

    
</div>

</body>

