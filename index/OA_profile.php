<?php
    session_start();
    if($_SESSION['loggedin'] != true  and $_SESSION['role'] != "OA") {
        header("Location: login.php");
    }
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
            <a href="">
                <h1 class="profile-logo">Clinico</h1>
            </a>
        </div>
        <div class="profile-div-w2">
            <button onclick="show()" class="profile-nav-logout">Logout</button>
            <a href="home.html"><button id="confirm" class="profile-confirm">Are you sure?</button></a>
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
            <span>Lorem Ipsum</span>
        </div>

        <a class="profile-menu-item">
            <span>Lorem Ipsum</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
        </div>

        <a class="profile-menu-item">
            <span>Lorem Ipsum</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
        </div>

        <a class="profile-menu-item">
            <span>Lorem Ipsum</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
        </div>

        <a class="profile-menu-item">
            <span>Lorem Ipsum</span>
            <span class="profile-arrow">></span>
        </a>
        <div class="profile-submenu">
            <a href ="#" class="profile-submenu-item" onclick="load_html()">Lorem Ipsum</a>
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