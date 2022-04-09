<?php
$dbhost = getenv("DBHOST");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASS");
$dbname = getenv("DBNAME");

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");




$query1 = "INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Dentist', 'Clark  ', 'H', 'Nolan', 'nolan@clinico.org', '2347653487', 'Male', '1980-08-09', '65 dary ashford dr', 'katy', 'texas', '66778', 'nolan1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Pediatrician', 'Lucie', 'H', 'East', 'east@clinico.org', '7651235409', 'Female', '1988-04-12', '654 dunvale dr', 'houston', 'texas', '77877', 'east1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Dermatologist', 'Anabella ', 'T', 'Mora', 'mora@clinico.org', '1230983487', 'Female', '1989-12-11', '65423 westheimer dr', 'houston', 'texas', '77465', 'mora1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Dermatologist', 'Fardeen  ', 'P', 'Larson', 'larson@clinico.org', '4561238734', 'Male', '1983-03-02', '2345 wilcrest dr', 'houston', 'texas', '77866', 'larson1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Cardiologist', 'Patrik   ', 'B', 'Burks', 'burks@clinico.org', '0887562345', 'Male', '1981-08-03', '1256 sunsed dune dr', 'houston', 'texas', '77082', 'burks1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Endocrinologist', 'Yahya  ', 'G', 'Fernandez', 'fernandez@clinico.org', '4443336565', 'Male', '1991-03-09', '45632 shadowbrier dr', 'spring', 'texas', '557766', 'fernandez1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Neurologist', 'Reo ', 'Y', 'Kramer', 'kramer@clinico.org', '8889990101', 'Male', '1984-07-11', '7653 dunvale dr', 'houston', 'texas', '77877', 'kramer1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Neurologist', 'Zuzanna  ', 'P', 'Phan', 'phan@clinico.org', '3331112334', 'Female', '1989-11-05', '1214 westheimer dr', 'houston', 'texas', '77465', 'phan1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Oncologist', 'Safwan', 'G', 'Lane', 'lane@clinico.org', '6667778787', 'Male', '1980-07-02', '2345 spring plaza dr', 'spring', 'texas', '77546', 'lane1234');
INSERT INTO `medical_db`.`doctor` (`Doc_Spec`, `Doc_First`, `Doc_M_Init`, `Doc_Last`, `Doc_Email`, `Doc_Phone`, `Doc_Gender`, `Doc_DOB`, `Doc_Street_Addr`, `Doc_City_Addr`, `Doc_State_Addr`, `Doc_Zip_Addr`, `Doc_Password`) 
VALUES ('Radiologists', 'Clarissa', 'H', 'Barrera', 'barrera@clinico.org', '6657768798', 'MaFemalele', '1986-12-12', '5632 pine road', 'houston', 'texas', '77582', 'barrera1234');";


if ($link->query($query1) !== TRUE) {
    echo "Error: " . $query1 . "<br>" . $link->error;
} mysqli_close($link);

header('Location: ../index/login.php');

?>