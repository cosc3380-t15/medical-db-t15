<?php

$fname = $_POST['fname'];
$minit = $_POST['minit'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$race = $_POST['race'];
$dob = $_POST['dob'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

if (!empty($fname)) {
    if (!empty($minit)) {
        if (!empty($lname)) {
            if (!empty($email)) {
                if (!empty($phone)) {
                    if (!empty($gender)) {
                        if (!empty($race)) {
                            if (!empty(dob)) {
                                if (!empty($height)) {
                                    if (!empty($weight)) {
                                        if (!empty($address)) {
                                            if (!empty($city)) {
                                                if (!empty($state)) {
                                                    if (!empty($zip)) {
                                                        # code...
                                                        include "/backend/connect.php";

                                                        $query1 = "INSERT INTO patient (Pat_First, Pat_M_init, Pat_Last, Pat_Email, Pat_Phone, Pat_Gender, Pat_Race, Pat_DOB, Pat_Height, Pat_Weight, Pat_Street_Addr, Pat_City_Addr, Pat_State_addr, Pat_Zip_Addr) VALUES ('$fname','$minit','$lname','$email','$phone','$gender','$race','$dob','$height','$weight','$address','$city','$state','$zip')";

                                                        if (mysqli_query($conn, $query1)) {
                                                            # code...
                                                            echo "<script type = 'text/javastript'>alert('Success')</script>";

                                                        }else {
                                                            echo "<script type = 'text/javastript'>alert('Failure')</script>";
                                                        }
                                                        mysqli_close($conn);
                            
                                                    }
                                                    echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                                                    header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                                                }
                                                echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                                                header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                                            }
                                            echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                                            header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                                        }
                                        echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                                        header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                                    }
                                    echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                                    header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                                }
                                echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                                header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                            }
                            echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                            header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                        }
                        echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                        header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                    }
                    echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                    header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
                }
                echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
                header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
            }
            echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
            header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
        }
        echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
        header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
    }
    echo "<script type = 'text/javascript'>alert('First name cannot be ampty')</script>";
    header('Refresh: .1; URL=https://medical-db-team15.herokuapp.com/index/home.html');
}


?>