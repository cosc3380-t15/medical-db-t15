<?php
include_once '/index.php';
?>

<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

<head>

    <link rel="stylesheet" href="style.css">


</head>

<body>
    <!-- <form action="addpatient.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="">First Name:</label>
                    <input type="text" name="fname">
                </td>
                <td>
                    <label for="">Middle Initial:</label>
                    <input type="text" name="minit">
                </td>
                <td>
                    <label for="">Last Name:</label>
                    <input type="text" name="lname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email:</label>
                    <input type="text" name="email">
                </td>
                <td>
                    <label for="">Phone Number:</label>
                    <input type="text" name="phone">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Gender:</label>
                    <input type="radio" name="gender" value="m">Male
                    <input type="radio" name="gender" value="f">Female
                </td>
                <td>
                    <label for="">Race:</label>
                    <input type="text" name="race">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Date of Birth: </label>
                    <input type="date" name="dob">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="">Height:</label>
                    <input type="text" name="height">
                </td>
                <td>
                    <label for="">Weight:</label>
                    <input type="text" name="weight">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Address line 1:</label>
                    <input type="text" name="address">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="">City:</label>
                    <input type="text" name="city">
                </td>
                <td>
                    <label for="">State:</label>
                    <input type="text" name="state">
                </td>
                <td>
                    <label for="">Zip Code:</label>
                    <input type="text" name="zip">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="" id="">
                </td>
            </tr>
        </table>
    </form> -->

    
        <?php
        $sql = "SELECT * FROM doctor;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['Doc_First'];
            }    
        }


    ?>
    





</body>

</html>