<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="/index/styles/form.css">
</head>

<body>
<?php
if (isset($_SESSION['status'])) {
    echo "<h4>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
}
?>
    <div class="container-form11">
        <form action="/backend/update_patient_data.php" method="post" onsubmit="return Validate();">
            <div class="row">
                <h4>Update Patient Information</h4>
                <?php
if (isset($_SESSION['status'])) {
    echo "<h4>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
}
?>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Patient ID" name="pat_id" required />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fname"  />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Middle Name" name="minit" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lname"  />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email"  />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone Number" name="phone"  />
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
            </div>

            <div class="row">
                <div class="input-group input-group-icon">
                    <label for="">
                        <h4> Date of Birth: </h4>
                    </label>
                    <input type="date" name="dob" >
                </div>
            </div>

            <div class="row">
                <h4>Gender</h4>
                <div class="input-group">
                    <input class="col-half" id="gender-male" type="radio" name="gender" value="Male"  />
                    <label for="gender-male">Male</label>
                    <input class="col-half" id="gender-female" type="radio" name="gender" value="Female"  />
                    <label class="float-right" for="gender-female">Female</label>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <div class="col-half">
                        <input type="text" placeholder="Weight" name="weight"  />
                    </div>
                    <div class="col-half">
                        <input type="text" placeholder="Height" name="height"  />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <h4 class="col-half">Race:</h4>
                    <select class="float-right" name="race" id="allergies">
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
                    <h4 class="col-half">Are you allergic to one of the following?</h4>
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

            <div class="input-group input-group-icon">
                <input type="text" placeholder="Address" name="address"  />
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group">
                <div class="col-third">
                    <input type="text" placeholder="City" name="city"  />
                </div>
                <div class="col-third">
                    <input type="text" placeholder="State" name="state"  />
                </div>
                <div class="col-third">
                    <input type="text" placeholder="Zip Code" name="zip"  />
                </div>

            </div>
            <input class="button" type="submit" name="update_patient_data">
        </form>
    </div>


</body>

</html>