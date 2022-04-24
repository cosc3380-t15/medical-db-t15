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

$result = mysqli_query($link,"SELECT * FROM admin WHERE ad_ID='" .$_SESSION['id']. "'");
$row= mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="/index/styles/form.css">
</head>

<body>
<?php
// if (isset($_SESSION['status'])) {
//     echo "<h4>".$_SESSION['status']."</h4>";
//     unset($_SESSION['status']);
// }
?>
    <div class="container-form11">
        <form action="/backend/update_admin_data.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Update Admin Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Admin ID" name="Ad_id" id="pat-i" value="<?php echo $_SESSION["id"]; ?>" required readonly/>
                    <div class="input-icon"><span style="color:green;">&#10003;</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname"  value="<?php echo $row['Ad_First']; ?>" />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit"  value="<?php echo $row['Ad_M_init']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  value="<?php echo $row['Ad_Last']; ?>" />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email"  value="<?php echo $row['Ad_Email']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone" value="<?php echo $row['Ad_Phone']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>

            <div class="row">
                <h4> Date of Birth: </h4>
                <div class="input-group input-group-icon">
                    <input type="date" name="dob" value="<?php echo $row['Ad_DOB']; ?>">
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>

            <div class="row">
            <h4 style="float: left;">Gender &#160<h4 style="color: red;">*</h4></h4>
                <div class="input-group">
                    <input class="col-half" id="gender-male" type="radio" name="gender" value="Male"  />
                    <label for="gender-male">Male</label>
                    <input class="col-half" id="gender-female" type="radio" name="gender" value="Female"  />
                    <label class="float-right" for="gender-female">Female</label>
                </div>
            </div>      

            <div class="input-group input-group-icon">
                <input type="text" placeholder="Address" name="address"  value="<?php echo $row['Ad_Street_Addr']; ?>"/>
                <div class="input-icon"><span style="color:red;">*</span></div>
            </div>
            <div class="input-group">
                <div class="col-third input-group-icon">
                    <input type="text" placeholder="City" name="city"  value="<?php echo $row['Ad_City_Addr']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="col-third input-group-icon">
                    <input type="text" placeholder="State" name="state"  value="<?php echo $row['Ad_State_Addr']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="col-third input-group-icon">
                    <input type="text" placeholder="Zip Code" name="zip"  value="<?php echo $row['Ad_Zip_Addr']; ?>"/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>
            <input class="button" type="submit" name="update_admin_data">
        </form>
    </div>
  




</body>

</html>