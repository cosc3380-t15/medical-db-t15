<?php                                                    # code...
    session_start();
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
    
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
    $sql = "SELECT * FROM doctor WHERE Doc_ID = '".$_SESSION['id']."' LIMIT 1";
    $query=mysqli_query($link,$sql); 
    $result=mysqli_fetch_assoc($query);
    $pass = $result['Doc_Password'];

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/card.css">
</head>

<body>
<div class="container-form11">
        <form action="/backend/Change_Password.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Update Doctor Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Doctor ID" name="ID" id="pat-i" value="<?php echo $_SESSION["id"]; ?>" required readonly/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="password" name="CurrentPass"  id = "pw" required/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="New Password" name="NewPass" id = "npw"  required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="New Password" name="NewPassRe" id = "npwr"  required/>
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>
            <input class="button" type="submit" name="change_doctor_password">
        </form>
    </div>
    <script>
        function Validate() {
            var actual =  "<?php echo"$pass"?>";
            var pw = document.getElementById("pw").value;
            var npw = document.getElementById("npw").value;
            var npwr = document.getElementById("npwr").value;

            if(actual== pw) {
                if(npw == npwe) {
                    alert("Password Changed Successfully!");
                    return true;
                } else {
                    alert("New Passwords do not match!");
                    return false;
                }
            } else {
                alert("Not Actual Password !");
                return false;
            }
    </script>

</body>