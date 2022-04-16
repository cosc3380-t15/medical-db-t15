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
            <a href="/backend/test3.php">
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
            <p class="h11">Take Telemedicine Service From Our World Class Doctors</p>
            <p class="h2">We are the Number 1 telemdicine service in America. We have more than 100+ doctors on our platform as well as emergency services. We have multiple facilities across the US, and are renown for our aptitute in security.</p>
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
            <h2>Take advantage of our miscellaneous features:</h2>
            <p class="text3">All users of our database get to enjoy basic features, regardless of membership plan. </p>
        </div>
        <div class="box-alt">
            <img class="imgg" src="images/contacts-new.png">
            <p class="pp">Schedule appointments with your doctor through our servers.</p>
        </div>
        <div class="box">
            <img class="imgg" src="images/online-new.png">
            <p class="pp">View your medical records and coordinate prescription refills online.</p>
        </div>
        <div class="box-alt">
            <img class="imgg" src="images/expertss.png">
            <p class="pp">Meet with our renown and diverse specialists.</p>

        </div>
        <div class="box">
            <img class="imgg" src="images/emergency-new.jpg">
            <p class="pp">Easy setup for any former patient that has visited any of our facilities in an emergancy situation.</p>
        </div>
    </div>
    <div id="ancor" class="container3 shadow">
        <div class="title">
            <!-- Not going to lie, I'm not sure what to put for this header because of the fact that we named
            our last section "miscellaneous features" and I just can't think of an umbrella term for this section. -->
            <h1>Lorem ipsum, dolor sit amet</h1>
            <!-- Mabey it's just because I don't know what to put for the header, but I doubt we will even need this paragraph. -->
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, ipsum voluptas? Nihil
                tempore obcaecati quasi eligendi impedit voluptates.</p>
        </div>

        <div class="group">
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/24.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>24 Hour Access</h2>
                    <p class="tile-text">All non-research facilities allow 24 hour access for all patients.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/emergency.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Emergency Services</h2>
                    <p class="tile-text">Our emergancy services are renown for their speedy response. All patients that enter our care via said services are automatically registered, as to make it easier for you. </p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/online.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Record Encryption</h2>
                    <p class="tile-text">We pride ourselves in our security, and as such have gone to great lengths to encrypt your medical information.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/doctor.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Online Diagnosis Details</h2>
                    <p class="tile-text">All information about a patient, from the details of a diagnosis to the specifics of a perscription, are updated to our databases in real time for your viewing.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/care.png" alt="">
                </div>
                <div class="tile-80">
                    <h2>Schedule Procedures</h2>
                    <p class="tile-text">Schedule medical procedures with your doctor all online. From major planned surgeries to vaccination shots.</p>
                </div>
            </div>
            <div class="tile">
                <div class="tile-20">
                    <img class="tile-img" src="images/headphones.png" alt="">
                </div>
                <div class="tile-80">
                    <!-- Sorry but I can't really think of anything regarding a headphone icon except maby a hearing test(?) but I don't really see how that warrents an entire square. -->
                    <h2>Workman's Compensation</h2>
                    <p class="tile-text">Our personal have experence working with OSHA and employers in order to assess physical imparments caused during the job in order to get you the workman's compensation you deserve.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="prices-ancor" class="container4">
        <div class="price-title">
            <h1>Pricing Plans</h1>
            <p>Pricing for most of our users is negotiated on a as needed basis; however, these are 2 common options to give you an idea of how the pricing looks.</p>
        </div>
        <div class="panel pricing-table">
            <div class="pricing-plan">
                <img src="images/icon1.png" alt="" class="pricing-img">
                <h2 class="pricing-header">Individual</h2>
                <ul class="pricing-features">
                    <li class="pricing-features-item">Yearly physicals</li>
                    <li class="pricing-features-item">2-3 appointments with a doctor</li>
                    <li class="pricing-features-item">Access to all our basic features</li>
                    <li class="pricing-features-item">Basic emergancy care</li>
                </ul>
                <span class="pricing-price">$45</span>
                <a href="#/" class="pricing-button">GET STARTED NOW</a>
            </div>

            <div class="pricing-plan">
                <img src="images/icon2.png" alt="" class="pricing-img">
                <h2 class="pricing-header">Family plan</h2>
                <ul class="pricing-features">
                    <li class="pricing-features-item">Healthcare for 2 adults and 3 children</li>
                    <li class="pricing-features-item">2 physicals a year for each child, 1 a year for the adults</li>
                    <li class="pricing-features-item">appointments with doctors as needed</li>
                    <li class="pricing-features-item">Less out-of-pocket expences for unforseen medical costs</li>
                </ul>
                <span class="pricing-price">$240</span>
                <a href="#/" class="pricing-button is-featured">GET STARTED NOW</a>
            </div>


        </div>
    </div>
    <div id="ancor-doctors" class="container5 shadow">
        <div class="title-doc">
            <h1>Our Best and Brightest</h1>
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
