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

$pat_height_result = mysqli_query($link,"SELECT pat_Height, pat_Weight FROM patient");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/index/styles/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
    
    <script>
        $(function () {
            //pat gender dist
            var pat_gender_chart = document.getElementById("pat_gender").getContext('2d');
            var pat_gender = {
                datasets: [{
                    data: [<?php echo $pat_genders[0].", ".$pat_genders[1];?>],
                    backgroundColor: [
                        '#008CFF', //blue
                        '#F260B5', //pink
                    ],
                }],
                labels: [
                    'Male',
                    'Female',
                ],
                hoverOffset: 4
            };
            var pat_gender_newChart = new Chart(pat_gender_chart, {
                type: 'doughnut',
                data: pat_gender,
                options: {
                    responsive: false,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {color: '#3A3B3C'}
                        }
                    }
                }
            });

            //doc gender dist
            var doc_gender_chart = document.getElementById("doc_gender").getContext('2d');
            var doc_gender = {
                datasets: [{
                    data: [<?php echo $doc_genders[0].", ".$doc_genders[1];?>],
                    backgroundColor: [
                        '#008CFF', //blue
                        '#F260B5', //pink
                    ],
                }],
                labels: [
                    'Male',
                    'Female',
                ],
                hoverOffset: 4
            };
            var doc_gender_newChart = new Chart(doc_gender_chart, {
                type: 'doughnut',
                data: doc_gender,
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {color: '#3A3B3C'}
                        }
                    }
                }
            });

            //pat race dist
            var pat_race_chart = document.getElementById("pat_race").getContext('2d');
            var pat_race = {
                datasets: [{
                    data: [<?php echo $pat_races[0].", ".$pat_races[1].", ".$pat_races[2].", ".$pat_races[3].", ".$pat_races[4];?>],
                    backgroundColor: [
                        '#008CFF',
                        '#203368',
                        '#9FCDFC',
                        '#2C4A98',
                        '#4C72D2',
                    ],
                }],
                labels: [
                    'White',
                    'Black or African American',
                    'Asian',
                    'Native Hawaiian or Other Pacific Islander',
                    'Some other race',
                ],
                hoverOffset: 4
            };
            var pat_race_newChart = new Chart(pat_race_chart, {
                type: 'doughnut',
                data: pat_race,
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {color: '#3A3B3C'}
                        }
                    }
                }
            });
            
            // patient height vs weight scatterplot
            var pat_height_vs_weight_chart = document.getElementById("pat_height-weight").getContext('2d');
            var pat_height_vs_weight_data = [
            <?php
                foreach($pat_height_result as $x) {
                    echo "{x: ".$x['pat_Weight'].", y: ".$x['pat_Height']." },";
                }
            ?>];
            var pat_height_vs_weight_newChart = new Chart(pat_height_vs_weight_chart, {
                type: 'scatter',
                data: {
                    datasets: [{
                        data: pat_height_vs_weight_data,  
                        backgroundColor: '#008CFF',
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return value + ' kg';
                                }
                            }
                        },
                        y: {
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return value + ' cm';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Data Dashboard</h1>
        <div class="card_container">
            <div class="card half">
                <h4 class="label">Patient Gender Distribution</h4>
                <canvas id="pat_gender"></canvas>
            </div>
            <div class="card half">
                <h4 class="label">Patient Race Distribution</h4>
                <canvas id="pat_race"></canvas>
            </div>
        </div>
        <div class="card_container full">
            <div class="card">
                <h4 class="label">Patient Height Vs. Weight</h4>
                <canvas id="pat_height-weight" style="width: 75%; height: 250px;"></canvas>
            </div>
        </div>
        <div class="card_container">
            <div class="card half">
                <h4 class="label">Doctor Gender Distribution</h4>
                <canvas id="doc_gender"></canvas>
            </div>
        </div>
    </div>
</body>

</html>