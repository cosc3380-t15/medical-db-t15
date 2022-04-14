<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
    <div class="navbar sticky">
        <div class="div-w">
            <a href="#home">
                <h1 class="logo">Clinico</h1>
            </a>
            <a href="#plug">
                <h3 class="menu">Features</h3>
            </a>
            <a href="#ancor">
                <h3 class="menu">Services</h3>
            </a>
            <a href="#prices-ancor">
                <h3 class="menu">Prices</h3>
            </a>
            <a href="#ancor-doctors">
                <h3 class="menu">Doctors</h3>
            </a>
            <a href="/backend/testt.php">
                <h3 class="menu">test</h3>
            </a>
            <!-- <a href="/backend/show_appointments.php">
                <h3 class="menu">show appt - test</h3>
            </a> -->
        </div>
        <div class="div-w2">
            <?php if($_SESSION['loggedin']) {
                echo
                '
                <a href="../backend/logout.php"><button class="nav-login">Log Out</button></a>
                <a href="login.php"><button class="nav-button">View Profile</button></a>';
            } else {
            echo
            '<a href="login.php"><button class="nav-login">Log In / Register</button></a>';
            }
            ?>
        </div>
    </div>
    <div id="home" class="container shadow">
        <div class="text">
            <p>Lorem ipsum dolor sit amet</p>
            <p class="h11">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p class="h2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
                Morbi leo urna molestie at elementum eu. Quis vel eros donec ac. Ac orci phasellus egestas tellus. Leo
                vel fringilla est ullamcorper
                eget nulla facilisi etiam. Congue eu consequat ac felis donec et odio pellentesque diam. Aliquam purus
                sit amet luctus venenatis lectus magna.
                Dignissim diam quis enim lobortis scelerisque fermentum dui. Risus at ultrices mi tempus imperdiet nulla
                malesuada pellentesque.
                Sodales ut eu sem integer vitae justo eget magna. Amet nulla facilisi morbi tempus iaculis urna id.</p>
            <a class="app-container" href="login.php">
                <button class="app-button">Make Appointment</button>
            </a>

        </div>
        <div class="image1">
            <img id="logo2" class="image" src="images/logo2.png">
        </div>
    </div>
    <div id="plug" class="container2">
        <div class="text2">
            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
            <p class="text3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua.
                Morbi leo urna molestie at elementum eu. Quis vel eros donec ac. Ac orci phasellus egestas tellus. Leo
                vel fringilla est ullamcorper
                eget nulla facilisi etiam.
        </div>
        <div class="box-alt">
            <img class="imgg" src="images/contacts-new.png">
            <p class="pp">Lorem ipsum</p>
        </div>
        <div class="box">
            <img class="imgg" src="images/online-new.png">
            <p class="pp">Lorem ipsum</p>
        </div>
        <div class="box-alt">
            <img class="imgg" src="images/expertss.png">
            <p class="pp">Lorem ipsum</p>

        </div>
        <div class="box">
            <img class="imgg" src="images/emergency-new.jpg">
            <p class="pp">Lorem ipsum</p>
        </div>
    </div>
    <div id="ancor" class="container3 shadow">
        <div class="title">
            <h1>Lorem ipsum, dolor sit amet</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, ipsum voluptas? Nihil
                tempore obcaecati quasi eligendi impedit voluptates.</p>
        </div>

        <div class="group">
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/24.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Lorem ipsum</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/emergency.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Lorem ipsum</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/online.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Lorem ipsum</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/doctor.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Lorem ipsum</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/care.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Lorem ipsum</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/headphones.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Lorem ipsum</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu..</p>
                </div>
            </div>
        </div>
    </div>
    <div id="prices-ancor" class="container4">
        <div class="price-title">
            <h1>Lorem ipsum</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="panel pricing-table">
            <div class="pricing-plan">
                <img src="images/icon1.png" alt="" class="pricing-img">
                <h2 class="pricing-header">Lorem ipsum</h2>
                <ul class="pricing-features">
                    <li class="pricing-features-item">Lorem ipsum</li>
                    <li class="pricing-features-item">Lorem ipsum</li>
                    <li class="pricing-features-item">Lorem ipsum</li>
                    <li class="pricing-features-item">Lorem ipsum</li>
                </ul>
                <span class="pricing-price">$29</span>
                <a href="#/" class="pricing-button">GET STARTED NOW</a>
            </div>

            <div class="pricing-plan">
                <img src="images/icon2.png" alt="" class="pricing-img">
                <h2 class="pricing-header">Lorem ipsum</h2>
                <ul class="pricing-features">
                    <li class="pricing-features-item">Lorem ipsum</li>
                    <li class="pricing-features-item">Lorem ipsum</li>
                    <li class="pricing-features-item">Lorem ipsum</li>
                    <li class="pricing-features-item">Lorem ipsum</li>
                </ul>
                <span class="pricing-price">$110</span>
                <a href="#/" class="pricing-button is-featured">GET STARTED NOW</a>
            </div>


        </div>
    </div>
    <div id="ancor-doctors" class="container5 shadow">
        <div class="title-doc">
            <h1>Lorem ipsum</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, ipsum voluptas? Nihil
                tempore obcaecati quasi eligendi impedit voluptates.</p>
        </div>

        <div class="group">
            <div class="tile-doc">
                <div class="tile-40">
                    <img class="tile-img2" src="images/doc4.JPG" alt="">
                </div>
                <div class="tile-50">
                    <h2>Devan Truong</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.
                    </p>
                </div>
            </div>
            <div class="tile-doc">
                <div class="tile-40">
                    <img class="tile-img2" src="images/doc1.JPG" alt="">
                </div>
                <div class="tile-50">
                    <h2>Conner Mayo</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.
                    </p>
                </div>
            </div>
        </div>
        <div class="group">
            <div class="tile-doc">
                <div class="tile-40">
                    <img class="tile-img2" src="images/doc2.JPG" alt="">
                </div>
                <div class="tile-50">
                    <h2>Adaline Carson</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.
                    </p>
                </div>
            </div>
            <div class="tile-doc">
                <div class="tile-40">
                    <img class="tile-img2" src="images/doc3.JPG" alt="">
                </div>
                <div class="tile-50">
                    <h2>Benjamin Franco</h2>
                    <p class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Morbi leo urna molestie at elementum eu.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <script>
        window.addEventListener('scroll', (e) => {
            const navbar = document.querySelector('.navbar.sticky');
            if (window.pageYOffset > 0) {
                navbar.classList.add("shadow");
            } else {
                navbar.classList.remove("shadow");
            }
        });
    </script>
</body>

</html>