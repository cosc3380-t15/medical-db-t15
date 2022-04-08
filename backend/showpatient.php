
<!DOCTYPE html>
<html>

<head>
 
    <link rel="stylesheet" href="/index/styles/test.css">
</head>

<body>

<div class="card">
    
        <a href="/index/home.html"><input class="button" type="submit" value="Back"></a>     
        <?php                                                    # code...
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                        
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
    $sql_id = "SELECT Pat_ID FROM patient";
    $sql = "SELECT Pat_ID, Pat_First, Pat_Last, Pat_Email, Pat_Phone FROM patient";
    $result = $link->query($sql);
    if($result){ // only execute this if there are results ?>
    <div class="container-fahter">

    <div class="container">
        <div class="container-child">
            <p>Patient ID</p>
            <div class="container">
                <ul> 
                <?php
                $count = 0;
                foreach($result as $row){ //loop over all the results?>
                <li class="<?php // if this is the first row output the first-row class, 
                            // otherwise output other-row class
                echo $count==0 ? 'first-row' : 'other-row'; ?>">
                <?php echo $row["Pat_ID"]; ?></li>
                <?php $count++; // increment my count var
                } // endforeach?>
                </ul>
            </div>
        </div>
        <div class="container-child">
            <p>Name</p>
            <div class="container">
                <ul> 
                <?php
                $count = 0;
                foreach($result as $row){ //loop over all the results?>
                <li class="<?php // if this is the first row output the first-row class, 
                            // otherwise output other-row class
                echo $count==0 ? 'first-row' : 'other-row'; ?>">
                <?php echo $row["Pat_First"]. " " .$row["Pat_Last"]."" ?></li>
                <?php $count++; // increment my count var
                } // endforeach?>
                </ul>
            </div>
        </div>
        <div class="container-child">
            <p>Email</p>
            <div class="container">
                <ul> 
                <?php
                $count = 0;
                foreach($result as $row){ //loop over all the results?>
                <li class="<?php // if this is the first row output the first-row class, 
                            // otherwise output other-row class
                echo $count==0 ? 'first-row' : 'other-row'; ?>">
                <?php echo $row["Pat_Email"]; ?></li>
                <?php $count++; // increment my count var
                } // endforeach?>
                </ul>
            </div>
        </div>
        <div class="container-child">
            <p>Phone</p>
            <div class="container">
                <ul> 
                <?php
                $count = 0;
                foreach($result as $row){ //loop over all the results?>
                <li class="<?php // if this is the first row output the first-row class, 
                            // otherwise output other-row class
                echo $count==0 ? 'first-row' : 'other-row'; ?>">
                <?php echo $row["Pat_Phone"]; ?> &nbsp;&nbsp;<button id="<?php $sql_id;?>">Edint</button>&nbsp;&nbsp;<button id="">Delete</button></li>
                <?php $count++; // increment my count var
                } // endforeach?>
                </ul>
            </div>
        </div>
    </div>


    
  

    <?php 
    } //end if?>

    
</div>

</body>

