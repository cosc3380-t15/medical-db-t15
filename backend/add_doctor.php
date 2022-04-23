<?php
session_start();
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

if (isset($_GET['submit']))
    {
        $ID = $_GET['doc_id'];
        $FName = $_GET['fname'];
        $MName = $_GET['minit'];
        $LName = $_GET['lname'];
        $Spec = $_GET['occupation'];
        $Loc = $_GET['loc'];
        $Email = $_GET['email'];
        $Phone = $_GET['phone'];
        $DOB = $_GET['dob'];
        $Gender = $_GET['gender'];
        $Strt = $_GET['address'];
        $City = $_GET['city'];
        $State = $_GET['state'];
        $Zip = $_GET['zip'];
        $Password = 'TempPassword'; 
        // check if Doc_Password is right
        $query1 = "INSERT INTO doctor (Doc_First,Doc_M_Init,Doc_Last,Doc_Spec,Doc_Location,Doc_Email,Doc_Phone,Doc_DOB,Doc_Gender,Doc_Street_Addr,Doc_City_Addr,Doc_State_Addr,Doc_Zip_Addr,Doc_Password)
        VALUES ('$FName','$MName','$LName','$Spec','$Loc','$Email','$Phone','$DOB','$Gender','$Strt','$City','$State','$Zip','$Password')";

        if ($link->query($query1) !== TRUE) {
            echo "Error: " . $query1 . "<br>" . $link->error;
        }
        header('Location: ../index/OA_profile.php');       
}


?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">
<head>
    
    <link rel="stylesheet" href="/index/styles/form.css">
    <link rel="stylesheet" href="styles/form.css">

</head>

<body>
<?php
// if (isset($_SESSION['status'])) {
//     echo "<h4>".$_SESSION['status']."</h4>";
//     unset($_SESSION['status']);
// }
?>
    <div class="container-form11">
        <form action="/backend/Create_data.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Create Doctor Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname"   required />
                    <!-- <div class="input-icon"><span style="color:red;">*</span></div> -->
                    
                    <div class="input-icon"><i class="fa fa-user"></i><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit"   />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  required />
                    <div class="input-icon"><i class="fa fa-user"></i><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Specialty" name="occupation" required />
                    <div class="input-icon"><i class="fa fa-user"></i><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Location" name="loc" required/>
                    <div class="input-icon"><i class="fa fa-user"></i><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email" required />
                    <div class="input-icon"><i class="fa fa-envelope"></i><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone" required/>
                    <div class="input-icon"><i class="fa fa-key"></i><span style="color:red;">*</span></div>
                </div>
            </div>

            <div class="row">
                <div class="input-group input-group-icon">
                    <label for="">
                        <h4> Date of Birth: </h4>
                    </label>
                    <input type="date" name="dob" requred>
                </div>
            </div>

            <div class="row">
                <h4 style="float: left;">Gender &#160<h4 style="color: red;">*</h4></h4>
                <div class="input-group">
                    <input class="col-half" id="gender-male" type="radio" name="gender" value="Male" required />
                    <label for="gender-male">Male</label>
                    <input class="col-half" id="gender-female" type="radio" name="gender" value="Female" required />
                    <label class="float-right" for="gender-female">Female</label>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="text" placeholder="Address" name="address"  required />
                <div class="input-icon"><i class="fa fa-user"></i><span style="color:red;">*</span></div>
            </div>
            <div class="input-group">
                <div class="col-third">
                    <input type="text" placeholder="City" name="city"  required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="col-third">
                    <input type="text" placeholder="State" name="state"  required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="col-third">
                    <input type="text" placeholder="Zip Code" name="zip" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>

            </div>
            <input class="button" type="submit" name="Create_doctor_data">
        </form>
        <div>
            <form>
            <div class="row input-group">
                <input class="button2" type="button" value="BACK" onclick="history.back()">            
                <input class="button2" type="button" onclick="location.href='/index/OA_profile.php?'" value="Profile" />
                <input class="button2" type="button" onclick="location.href='/index/home.php?'" value="Home" />
            </div>
            </form>
        </div>
    </div>

    <script>
        function Validate() {
                alert("Account Created Successfully!");
            }
    </script>
  
</body>

</html>