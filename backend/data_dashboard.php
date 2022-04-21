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

$pat_general_info = mysqli_query($link,"SELECT pat_Height, pat_Weight, pat_DOB FROM patient");

$today = date("Y-m-d");
$pat_ages = array_fill(0, 20, 0);
foreach($pat_general_info as $dob) {
    $age = date_diff(date_create($dob['pat_DOB']), date_create($today))->format('%y');
    $index = intdiv($age, 10) * 2;
    if($age % 10 >= 5) { $index++; }
    $pat_ages[$index]++;
}

$appt_general_info = mysqli_query($link,"SELECT Appt_Date FROM appointment WHERE year(Appt_Date) = ".date("Y"));
$appt_months = array_fill(0, 11, 0);
foreach($appt_general_info as $appt_iterator) {
    $month = date_create($appt_iterator['Appt_Date'])->format('m') - 1;
    $appt_months[$month]++;
}
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
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2.5,
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
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2.5,
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
                    'African American',
                    'Asian',
                    'Pacific Islander',
                    'Some other race',
                ],
                hoverOffset: 4
            };
            var pat_race_newChart = new Chart(pat_race_chart, {
                type: 'doughnut',
                data: pat_race,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {color: '#3A3B3C'}
                        }
                    }
                }
            });

            //Patient Allergies
            var pat_allergies_chart = document.getElementById("pat_allergies").getContext('2d');
            var pat_allergy = {
                datasets: [{
                    data: [<?php echo $pat_algeries[0].", ".$pat_algeries[1].", ".$pat_algeries[2].", "
                                .$pat_algeries[3].", ".$pat_algeries[4].", ".$pat_algeries[5];?>],
                    backgroundColor: [
                        '#008CFF',
                        '#203368',
                        '#9FCDFC',
                        '#2C4A98',
                        '#4C72D2',
                        '#604cd2',
                    ],
                }],
                labels: [
                    'None',
                    'Amoxicillin',
                    'Aspirin',
                    'Insulin',
                    'Carbamazepine',
                    'Ibuprofen',
                ],
                hoverOffset: 4
            };
            var pat_allergies_newChart = new Chart(pat_allergies_chart, {
                type: 'doughnut',
                data: pat_allergy,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2,
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
                foreach($pat_general_info as $x) {
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
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2,
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

            //patient age distribution
            var pat_age_chart = document.getElementById("pat_age_dist").getContext('2d');
            var pat_age_data = [
            <?php
                foreach($pat_ages as $x) {
                    echo $x.",";
                }
            ?>];
            var pat_age_newChart = new Chart(pat_age_chart, {
                type: 'bar',
                data: {
                    labels: ["0-4", "5-9", "10-14", "15-19", "10-24", "25-29", "30-34",
                                "35-39", "40-44", "45-49", "50-54", "55-59","60-64", "65-69",
                                "70-74", "75-79","80-84", "85-89","90-94", "95-99"],
                    datasets: [{
                        label: 'Patients',
                        data: pat_age_data,
                        backgroundColor: '#008CFF',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 5,
                    scales: {
                        y: { 
                            beginAtZero: true,
                            ticks: { precision: 0}
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            });
            //appointment monthly distribution
            var appt_month_chart = document.getElementById("Appt_Month").getContext('2d');
            var appt_month_data = [
            <?php
                foreach($appt_months as $x) {
                    echo $x.",";
                }
            ?>];
            var appt_month_newChart = new Chart(appt_month_chart, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May',
                                'June', 'July', 'August','September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Appointments',
                        data: appt_month_data,
                        backgroundColor: ['#203368', '#2C4A98'],
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 1.9,
                    scales: {
                        x: { 
                            beginAtZero: true,
                            ticks: { precision: 0}
                        },
                        y: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Data Dashboard</h1>
        <div class="card_container col-third">
            <div class="card third">
                <h4 class="label">Patient Race Distribution</h4>
                <canvas id="pat_race"></canvas>
            </div>
            <div class="card third">
                <h4 class="label">Patient Gender Distribution</h4>
                <canvas id="pat_gender"></canvas>
            </div>
            <div class="card third">
                <h4 class="label">Patient Allergies</h4>
                <canvas id="pat_allergies"></canvas>
            </div>
        </div>
        <div class="card_container">
            <div class="card half">
                <h4 class="label">Patient Height Vs. Weight</h4>
                <canvas id="pat_height-weight"></canvas>
            </div>
            <div class="card half">
                <h4 class="label">Appointments Per Month</h4>
                <canvas id="Appt_Month"></canvas>
            </div>
        </div>
        <div class="card_container full">
        <div class="card">
                <h4 class="label">Patient Age Distribution</h4>
                <canvas id="pat_age_dist"></canvas>
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

<!-- <script>
    var toggle_button = document.getElementsByClassName('toggle')
    toggle_button[0].addEventListener("click", function () {
        this.classList.toggle("clicked");
        
    });

</script> -->

</html>