<html
    class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"
    lang="zxx">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

<head>

    <link rel="stylesheet" href="styles/login.css">

</head>

<body>
    <div class="login">
        <div class="box-login">
            <div class="half-box-login">
                <form action="../backend/validate_login.php" class="login-form" method="post">
                    <label for="text" class="login-label">Username:</label>
                    <input type="text" class="login-input" id="username" name="email">

                    <label for="text" class="login-label">Password:</label>
                    <input type="password" class="login-input" id="password" name="pass">

                    <div class="login-buttons">
                        <!-- <button class="login-button">Log In</button> -->
                        <button type="submit" class="login-button" onClick="auth(event)">Log In</button>
                        <a href="register.html"><button class="register-login">Register</button></a>
                    </div>
                    <a href="home.php" class="home-button">Back</a>
                </form>
            </div>
            <div class="half-box-login2">
                <img class="login-image" src="images/logo.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>