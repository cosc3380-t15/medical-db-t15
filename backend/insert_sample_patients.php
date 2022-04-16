<?php
session_start();
if($_SESSION['loggedin'] != true  or $_SESSION['role'] != "OA") { header("Location: login.php"); }

$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
$QUERY_DROP = "DELETE FROM patient WHERE Pat_ID >= 1012250";
if ($link->query($QUERY_DROP) !== TRUE) {
            echo "Error: " . $QUERY_DROP . "<br>" . $link->error;
        }

$query="INSERT INTO `medical_db`.`patient` (`Pat_First`, `Pat_M_init`, `Pat_Last`, `Pat_Email`, `Pat_Phone`, `Pat_Gender`, `Pat_Race`, `Pat_DOB`, `Pat_Height`, `Pat_Weight`, `Pat_Street_Addr`, `Pat_City_Addr`, `Pat_State_Addr`, `Pat_Zip_Addr`, `Pat_Allergy`, `Pat_Password`) VALUES";

$F_names = ['Olivia','Emma','Ava','Charlotte','Sophia','Amelia','Isabella','Mia','Evelyn','Harper','Camila',
            'Gianna','Abigail','Luna','Ella','Elizabeth','Sofia','Emily','Avery','Mila','Scarlett','Eleanor','Madison',
            'Layla','Penelope','Aria','Chloe','Grace','Ellie','Nora','Hazel,','Zoey','Riley','Victoria',
            'Lily','Aurora','Violet','Nova','Hannah','Emilia','Zoe','Stella','Everly','Isla','Leah','Lillian',
            'Addison','Willow','Lucy','Paisley', 'Liam', 'Noah','Oliver', 'Elijah', 'William','James','Benjamin',
            'Lucas','Henry','Alexander','Mason','Michael','Ethan','Daniel','Jacob','Logan','Jackson','Levi',
            'Sebastian','Mateo','Jack','Owen','Theodore',
            'Aiden','Samuel','Joseph','John','David','Wyatt','Matthew']; //80

$M_names = ['A', 'D', 'T', 'R', 'G','E','W', 'F', 'K']; //9

$L_names = ['Smith','Johnson','Williams','Brown','Jones','Miller','Davis','Garcia','Rodriguez','Wilson','Martinez',
            'Anderson','Taylor','Thomas','Hernandez','Moore','Martin','Jackson','Thompson','White']; //20

$Email_Suff = ['@yahoo.com', '@gmail.com', '@sbcglobal.net', '@hotmail.com','@icloud.com']; //5
$Races = [100,100,100,100,101,101,102,102,103,104]; //10
$Street_Names = ['Main', 'Plaza', 'El Dorado', 'West', 'Center', 'Spa', 'Kalwick', 'P St']; //8
$cities = ['Houston', 'Deer Park', 'Humble', 'Spring','Katy','Sugarland','The Woodlands']; //7
$Allergies = [200,200,200,200,201,201,202,203,204,202,205]; //11
$Passwords = ['123456', 'Qwerty','Password','DEFAULT','Qwertyuiop','666666']; //6
$gender = "Female";

for ($i = 0; $i < 80; $i++) {
    if($i >= 50) {$gender = 'Male';}
    $age = random_int(1,99);
    $dob = (2022-$age)."-".($i%12 + 1)."-".($i%28 + 1);
    $height = intval(log($age)*random_int(5,48))+10;
    $weight = intval($height*rand(40, 60)/100);

    $values = "('".$F_names[$i]."', '".$M_names[$i % 9]."', '".$L_names[$i % 20]."', '".$F_names[$i].$M_names[$i % 9].$Email_Suff[$i % 5]."', '".
    random_int(1000000000,9999999999)."', '".$gender."', ".$Races[random_int(0,9)].", '".$dob."', ".$height.", ".$weight.", '".
    (random_int(10,9999))." ".$Street_Names[$i%8]."', '".$cities[$i%7]."', 'Texas', 77".random_int(50,999).", ".
    $Allergies[random_int(0,10)].", '".$Passwords[$i%6]."')";
    // echo $values.", ";

    if ($link->query($query.$values) !== TRUE) {
        echo "Error: " . $query . "<br>" . $link->error;
    }
}
echo "Refreshed Random Data Successfully";
mysqli_close($link);
Header('Location: '.$_SERVER['PHP_SELF']);
?>