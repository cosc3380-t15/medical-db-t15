<?php
include_once 'index/index.php';
?>

<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

<head>

    <link rel="stylesheet" href="style.css">


</head>

<body>
<h1><?php echo "This message is from server side." ?></h1>
    
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