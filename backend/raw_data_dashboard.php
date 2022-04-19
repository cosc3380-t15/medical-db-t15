<?php
session_start();
if($_SESSION['loggedin'] != true  or $_SESSION['role'] != "OA") { header("Location: ..index/login.php"); }
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS"); 
$dbname = getenv("DBNAME");
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
                                                    
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

//patient gender distribution
$pat_gender_male = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Gender = 'Male'");
$pat_gender_female = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Gender = 'Female'");
$row = mysqli_fetch_row($pat_gender_male);
$pat_genders[0] = $row[0];
$row = mysqli_fetch_row($pat_gender_female);
$pat_genders[1] = $row[0];

//doctor gender distribution
$doc_gender_male = mysqli_query($link,"SELECT COUNT(*) FROM doctor WHERE doc_Gender = 'Male'");
$doc_gender_female = mysqli_query($link,"SELECT COUNT(*) FROM doctor WHERE doc_Gender = 'Female'");
$row = mysqli_fetch_row($doc_gender_male);
$doc_genders[0] = $row[0];
$row = mysqli_fetch_row($doc_gender_female);
$doc_genders[1] = $row[0];

//patient race Distribution
$pat_race_0 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Race = '100'");
$pat_race_1 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Race = '101'");
$pat_race_2 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Race = '102'");
$pat_race_3 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Race = '103'");
$pat_race_4 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Race = '104'");
$row = mysqli_fetch_row($pat_race_0);
$pat_races[0] = $row[0];
$row = mysqli_fetch_row($pat_race_1);
$pat_races[1] = $row[0];
$row = mysqli_fetch_row($pat_race_2);
$pat_races[2] = $row[0];
$row = mysqli_fetch_row($pat_race_3);
$pat_races[3] = $row[0];
$row = mysqli_fetch_row($pat_race_4);
$pat_races[4] = $row[0];

//patient allergy distribution
$pat_allergy_0 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Allergy = '200'");
$pat_allergy_1 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Allergy = '201'");
$pat_allergy_2 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Allergy = '202'");
$pat_allergy_3 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Allergy = '203'");
$pat_allergy_4 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Allergy = '204'");
$pat_allergy_5 = mysqli_query($link,"SELECT COUNT(*) FROM patient WHERE pat_Allergy = '205'");
$row = mysqli_fetch_row($pat_allergy_0);
$pat_algeries[0] = $row[0];
$row = mysqli_fetch_row($pat_allergy_1);
$pat_algeries[1] = $row[0];
$row = mysqli_fetch_row($pat_allergy_2);
$pat_algeries[2] = $row[0];
$row = mysqli_fetch_row($pat_allergy_3);
$pat_algeries[3] = $row[0];
$row = mysqli_fetch_row($pat_allergy_4);
$pat_algeries[4] = $row[0];
$row = mysqli_fetch_row($pat_allergy_5);
$pat_algeries[5] = $row[0];

$pat_general_info = mysqli_query($link,"SELECT pat_First, pat_Last, pat_Height, pat_Weight, pat_DOB FROM patient");

$today = date("Y-m-d");
$pat_ages = array_fill(0, 20, 0);
foreach($pat_general_info as $dob) {
    $age = date_diff(date_create($dob['pat_DOB']), date_create($today))->format('%y');
    $index = intdiv($age, 10) * 2;
    if($age % 10 >= 5) { $index++; }
    $pat_ages[$index]++;
}
$age_labels = ["0-4", "5-9", "10-14", "15-19", "10-24", "25-29", "30-34",
"35-39", "40-44", "45-49", "50-54", "55-59","60-64", "65-69",
"70-74", "75-79","80-84", "85-89","90-94", "95-99"];

$appt_general_info = mysqli_query($link,"SELECT Appt_Date FROM appointment WHERE year(Appt_Date) = ".date("Y"));
$appt_months = array_fill(0, 12, 0);
foreach($appt_general_info as $appt_iterator) {
    $month = date_create($appt_iterator['Appt_Date'])->format('m') - 1;
    $appt_months[$month]++;
}
$month_labels = ['January', 'February', 'March', 'April', 'May',
'June', 'July', 'August','September', 'October', 'November', 'December'];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
</head>

<body>
    <div class="container">
        <h1>Raw Data Dashboard</h1>
        <div class="card_container col-third">
            <div class="card third">
                <h4 class="label">Patient Race Distribution</h4>
                <?php echo "<h6>White: ".$pat_races[0]."</h6>
                <h6>African American: ".$pat_races[1]."</h6>
                <h6>Asian: ".$pat_races[2]."</h6>
                <h6>Pacific Islander: ".$pat_races[3]."</h6>
                <h6>Other: ".$pat_races[4]."</h6>";?>
            </div>
            <div class="card third">
                <h4 class="label">Patient Gender Distribution</h4>
                <?php echo "<h6>Male: ".$pat_genders[0]."</h6>
                <h6>Female: ".$pat_genders[1]."</h6>";?>
            </div>
            <div class="card third">
            <h4 class="label">Patient Allergies</h4>
                <div class="card_container">
                    <?php echo "<h6>None: ".$pat_algeries[0]."</h6>
                    <h6>Amoxicillin: ".$pat_algeries[1]."</h6>
                    <h6>Aspirin: ".$pat_algeries[2]."</h6>
                    <h6>Insulin: ".$pat_algeries[3]."</h6>
                    <h6>Carbamazepine: ".$pat_algeries[4]."</h6>
                    <h6>Ibuprofen: ".$pat_algeries[5]."</h6>";?>
                </div>
            </div>
        </div>
        <div class="card_container full">
            <div class="card">
                <h4 class="label">Patient Height Vs. Weight</h4>
                <div class="card_container col-four">
                    <?php 
                    foreach($pat_general_info as $x) {
                        echo "<h6>".$x['pat_First']." ".$x['pat_Last'].": ".$x['pat_Weight']."cm, ".$x['pat_Height']."kg </h6>";
                    }
                    ?>
                </div>
            </div>
            
        </div>
        <div class="card_container col-third">
            <div class="card third">
                <h4 class="label">Appointments Per Month</h4>
                <div class="card_container col-third">
                <?php 
                        for($i = 0; $i<count($appt_months); $i++) {
                            echo "<h6>".$month_labels[$i].": ".$appt_months[$i]." </h6>";
                        }
                    ?>
                </div>
            </div>
            <div class="card third">
                <h4 class="label">Patient Age Distribution</h4>
                <div class="card_container col-third">
                    <?php 
                        for($i = 0; $i<count($pat_ages); $i++) {
                            echo "<h6>".$age_labels[$i].": ".$pat_ages[$i]." </h6>";
                        }
                    ?>
                </div>
            </div>
            <div class="card third">
            <h4 class="label">Doctor Gender Distribution</h4>
                <?php echo "<h6>Male: ".$doc_genders[0]."</h6>
                <h6>Female: ".$doc_genders[1]."</h6>";?>
                
            </div>
        </div>
    </div>
</body>

</html>