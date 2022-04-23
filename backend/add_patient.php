<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

<head>

    <link rel="stylesheet" href="styles/form.css">
</head>
<body>
    <div class="container-form11">
        <form action="../backend/Create_data.php" method="post" onsubmit="return Validate();">
            <a href="login.php">&#8592; Back<a></a>
            <div class="row">
                <h4>Patient Information</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit"/>
                    <div class="input-icon"></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>
            <!-- 
                REMOVING THIS CAUSE SETTING A TEMP PASSWORD
            <div class="row">
                <h4>Password</h4>
                <div class="input-group input-group-icon">
                    <input type="password" id="pw" placeholder="Enter Password" name="password" minlength="8" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" id="pwc" placeholder="Retype Password" name="confirm-pass" minlength="8" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div> -->
            <div class="row">
                <h4> Date of Birth </h4>
                <div class="input-group input-group-icon">
                    <input type="date" name="dob" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
            </div>
            <div class="row">
                <h4 style="float: left;">Gender &#160<h4 style="color: red;">*</h4></h4>
                <div class="input-group">
                    <input class="col-half" id="gender-male" type="radio" name="gender" value="Male" required />
                    <label for="gender-male">Male</label>
                    <input class="col-half" id="gender-female" type="radio" name="gender" value="Female" required />
                    <label class="float-right" for="gender-female">Female</label>
                </div>
            </div>
            <div class="row">
                <h4> Body Measurements &#160</h4>
                <div class="input-group">
                    <div class="col-half input-group-icon">
                        <input type="text" placeholder="Weight (kg)" name="weight" required />
                        <span class="input-unit">kg</span>
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                    <div class="col-half input-group-icon">
                        <input type="text" placeholder="Height (cm)" name="height" required />
                        <span class="input-unit">cm</span>
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4 style="float: left;">Race &#160<h4 style="color: red;">*</h4></h4>
                    </div>
                    <select class="float-right" name="race" id="race">
                        <option value="100">White</option>
                        <option value="101">Black or African American</option>
                        <option value="102">Asian</option>
                        <option value="103">Native Hawaiian or Other Pacific Islander</option>
                        <option value="104">Some other race</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <h4 style="float: left;">Are you alergic to one of the following? &#160<h4 style="color: red;">*</h4></h4>
                    </div>
                    <select class="float-right" name="allergies" id="allergies">
                        <option value="200">N/A</option>
                        <option value="201">Amoxicillin</option>
                        <option value="202">Aspirin</option>
                        <option value="203">Insulin</option>
                        <option value="204">Carbamazepine</option>
                        <option value="205">Ibuprofen</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <h4>Address</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Street" name="address" required />
                    <div class="input-icon"><span style="color:red;">*</span></div>
                </div>
                <div class="input-group input-group-icon">
                    <div class="col-third">
                        <input type="text" placeholder="City" name="city" required />
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                    <div class="col-third input-group-icon">
                        <input type="text" placeholder="State" name="state" required />
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                    <div class="col-third input-group-icon">
                        <input type="text" placeholder="Zip Code" name="zip" required />
                        <div class="input-icon"><span style="color:red;">*</span></div>
                    </div>
                </div>
            </div>
            <input class="button" type="submit" name="Create_patient_data">
        </form>
    </div>
    <script>
        function Validate() {
            alert("Account Created Successfully!");
        }
    </script>
</body>
</html>