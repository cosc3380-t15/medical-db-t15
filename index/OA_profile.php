<?php
    session_start();
    if($_SESSION['loggedin'] != true  or $_SESSION['role'] != "OA") {
        header("Location: login.php");
    }
    $dbhost = getenv("DBHOST");
    $dbuser = getenv("DBUSER");
    $dbpass = getenv("DBPASS"); 
    $dbname = getenv("DBNAME");
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
    
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");
    $query1 = "SELECT Ad_First, Ad_Last FROM admin WHERE Ad_ID = '".$_SESSION['id']."' LIMIT 1";
    $result = $link->query($query1);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/profile_nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="profile-navbar profile-shadow">
        <div class="profile-div-w">
            <a href="home.php">
                <h1 class="profile-logo">Clinico</h1>
            </a>
        </div>
        <div class="profile-div-w2">
            <button onclick="show()" class="profile-nav-logout">Logout</button>
            <a href="../backend/logout.php"><button id="confirm" class="profile-confirm">Are you sure?</button></a>
        </div>
    </div>
    <script>
        function show() {
            document.getElementById("confirm").classList.toggle("profile-show");
        };
    </script>
    <div class="profile-sidenav profile-shadow">

        <div class="profile-welcome">
            <p>Welcome, </p>
            <span><?php foreach($result as $row){ echo $row["Ad_First"]. " " .$row["Ad_Last"]; }?></span>
        </div>

        <a class="profile-menu-item">
            <span>Profile</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html()">View Profile</a>
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Edit Profile</a>
        </div>

        <a class="profile-menu-item">
            <!-- changing it to record cause we can
             just make this be the look up where we can do the seach through tables later -->
            <span>Records</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html('/backend/show_patient.php')">Patients</a>
            <a href ="#" class="profile-submenu-item" onclick="load_html('/backend/DoctorDataReport.php')">Doctors</a>
        </div>

        <a class="profile-menu-item">
            <span>Appointment</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
        </div>

        <a class="profile-menu-item">
            <span>Prescriptions</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <!-- SAME AS DONE IN DOCS PROFILE DOESNT WORK ANYMORE IDK WHY -->
            <a href ="#" class="profile-submenu-item" onclick="load_html('/backend/approve_denyPrescription.php')">Pending presciption </a>
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
        </div>
    </div>
    
 
        <div id="content" class="profile-main"> 
        </div>     
   
   
    <script>
        var dropdown = document.getElementsByClassName("profile-menu-item");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("profile-active");
                var arrow = this.querySelector(".profile-arrow");
                arrow.classList.toggle("profile-open");
                var dropdownContent = this.nextElementSibling;
                
                if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                } else {
                dropdownContent.style.display = "block";
                }
            });
        }

        function load_html(file) {
            document.getElementById("content").innerHTML = "";
            $("#content").load(file);
        }
    </script>
</body>