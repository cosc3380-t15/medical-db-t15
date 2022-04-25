-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: medical_db
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `Ad_ID` int NOT NULL DEFAULT '3000000',
  `Ad_First` varchar(45) NOT NULL,
  `Ad_M_init` varchar(45) DEFAULT NULL,
  `Ad_Last` varchar(45) NOT NULL,
  `Ad_Email` varchar(45) NOT NULL,
  `Ad_Phone` varchar(45) NOT NULL,
  `Ad_Gender` varchar(45) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `Ad_DOB` date NOT NULL,
  `Ad_Street_Addr` varchar(45) NOT NULL,
  `Ad_Street2_Addr` varchar(45) DEFAULT NULL,
  `Ad_City_Addr` varchar(45) NOT NULL,
  `Ad_State_Addr` varchar(45) NOT NULL,
  `Ad_Zip_Addr` int NOT NULL,
  `Ad_Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Ad_ID`),
  UNIQUE KEY `Ad_ID_UNIQUE` (`Ad_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (3000000,'Jerry','K','Klumas','jerry@clinico.org','4902945398','Male','1970-03-23','456 Second Street',NULL,'Houston','Texas',77598,'jerry456'),(3000001,'admin','a','admin','admin','123123423','male','1234-11-11','1231244','123123','123','asd',1223,'admin1234'),(3000002,'testAdF','testAdM','testAdL','testAd@clinico.org','1231234232','Male','1234-12-01','123 Nonya',NULL,'Katy','Texas',77559,'testAd1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `Appt_ID` int NOT NULL AUTO_INCREMENT,
  `Pat_ID` int NOT NULL,
  `Doc_ID` int NOT NULL,
  `Off_ID` varchar(45) NOT NULL,
  `Appt_Specialization` varchar(45) NOT NULL,
  `Appt_Date` date NOT NULL,
  `Appt_Time` time DEFAULT NULL,
  PRIMARY KEY (`Appt_ID`),
  CONSTRAINT `time_constraint` CHECK (((`Appt_Time` >= '08:00:00') and (`Appt_Time` <= '16:00:00')))
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (163,1012248,2000014,'Houston','Dentist','2022-04-21','11:00:00');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`DNonov`@`%`*/ /*!50003 TRIGGER `repeating_appt` BEFORE INSERT ON `appointment` FOR EACH ROW BEGIN
   IF (EXISTS(SELECT 1 
	   FROM appointment 
	   WHERE Doc_ID = new.Doc_ID 
	   AND Appt_Time = new.Appt_Time
       AND Appt_Date = new.Appt_Date)
	   )THEN 
		   SIGNAL SQLSTATE VALUE '45000' 
		   SET MESSAGE_TEXT = 'There is an appointment at this time already, please chose another time or date.';
   END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`DNonov`@`%`*/ /*!50003 TRIGGER `max_capcity2` BEFORE INSERT ON `appointment` FOR EACH ROW BEGIN
    DECLARE count INT;
    SELECT COUNT(Appt_Time)
    INTO count
    FROM appointment
    WHERE new.Appt_Date = Appt_Date AND new.Off_ID = Off_ID;

    IF count >= 3 THEN
		UPDATE max_capacity
		SET max_capacity_reaching = 'TRUE'
		WHERE location = new.Off_ID;
    END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`DNonov`@`%`*/ /*!50003 TRIGGER `max_capcity` AFTER DELETE ON `appointment` FOR EACH ROW BEGIN
    DECLARE count INT;
    SELECT COUNT(Appt_Time)
    INTO count
    FROM appointment
    WHERE old.Appt_Date = Appt_Date AND old.Off_ID = Off_ID;

    IF count <= 3 THEN
		UPDATE max_capacity
		SET max_capacity_reaching = 'FALSE'
		WHERE location = old.Off_ID;
    END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `Doc_ID` int NOT NULL AUTO_INCREMENT,
  `Doc_Spec` varchar(45) NOT NULL,
  `Doc_Location` varchar(45) DEFAULT NULL,
  `Doc_First` varchar(45) NOT NULL,
  `Doc_M_Init` varchar(45) DEFAULT NULL,
  `Doc_Last` varchar(45) NOT NULL,
  `Doc_Email` varchar(45) NOT NULL,
  `Doc_Phone` varchar(45) DEFAULT NULL,
  `Doc_Gender` varchar(45) NOT NULL,
  `Doc_DOB` date NOT NULL,
  `Doc_Street_Addr` varchar(45) NOT NULL,
  `Doc_City_Addr` varchar(45) NOT NULL,
  `Doc_State_Addr` varchar(45) NOT NULL,
  `Doc_Zip_Addr` int NOT NULL,
  `Doc_Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Doc_ID`),
  UNIQUE KEY `Doc_ID_UNIQUE` (`Doc_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2000027 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (2000014,'Dentist','Houston','Clark  ','H','Nolan','nolan@clinico.org','2347653487','Male','1980-08-09','65 dary ashford dr','katy','texas',66778,'nolan1234'),(2000015,'Pediatrician','Sugar Land','Lucie','H','East','east@clinico.org','7651235409','Female','1988-04-12','654 dunvale dr','houston','texas',77877,'east1234'),(2000016,'Dermatologist','Houston','Anabella ','T','Mora','mora@clinico.org','1230983487','Female','1989-12-11','65423 westheimer dr','houston','texas',77465,'mora1234'),(2000017,'Dermatologist','Sugar Land','Fardeen  ','P','Larson','larson@clinico.org','4561238734','Male','1983-03-02','2345 wilcrest dr','houston','texas',77866,'larson1234'),(2000018,'Cardiologist','Houston','Patrik   ','B','Burks','burks@clinico.org','0887562345','Male','1981-08-03','1256 sunsed dune dr','houston','texas',77082,'burks1234'),(2000019,'Endocrinologist','Katy','Yahya  ','G','Fernandez','fernandez@clinico.org','4443336565','Male','1991-03-09','45632 shadowbrier dr','spring','texas',557766,'fernandez1234'),(2000020,'Neurologist','Katy','Reo ','Y','Kramer','kramer@clinico.org','8889990101','Male','1984-07-11','7653 dunvale dr','houston','texas',77877,'kramer1234'),(2000021,'Neurologist','Katy','Zuzanna  ','P','Phan','phan@clinico.org','3331112334','Female','1989-11-05','1214 westheimer dr','houston','texas',77465,'phan1234'),(2000022,'Oncologist','The Woodlands','Safwan','G','Lane','lane@clinico.org','6667778787','Male','1980-07-02','2345 spring plaza dr','spring','texas',77546,'lane1234'),(2000023,'Radiologists','The Woodlands','Clarissa','H','Barrera','barrera@clinico.org','6657768798','Female','1986-12-12','5632 pine road','houston','texas',77582,'barrera1234'),(2000024,'Radiologists','The Woodlands','John','H','Smith','smith@clinico.org','2347654589','Male','1986-03-07','3456 pine road','houston','texas',77582,'smith1234'),(2000026,'Dentist','Katy','Preston','P','Perry','Preston@Clinico.org','1234567892','Male','1980-05-04','Nonya','katy','TX',77484,'Preston123');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `max_capacity`
--

DROP TABLE IF EXISTS `max_capacity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `max_capacity` (
  `idmax_capacity` int NOT NULL AUTO_INCREMENT,
  `location` varchar(45) NOT NULL,
  `capacity` int NOT NULL,
  `max_capacity_reaching` varchar(45) NOT NULL,
  PRIMARY KEY (`idmax_capacity`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `max_capacity`
--

LOCK TABLES `max_capacity` WRITE;
/*!40000 ALTER TABLE `max_capacity` DISABLE KEYS */;
INSERT INTO `max_capacity` VALUES (1,'Houston',9,'FALSE'),(2,'Sugar Land',9,'FALSE'),(3,'Caty',9,'FALSE'),(4,'The Woodlands',9,'FALSE');
/*!40000 ALTER TABLE `max_capacity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient` (
  `Pat_ID` int NOT NULL AUTO_INCREMENT,
  `Pat_First` varchar(45) NOT NULL,
  `Pat_M_init` varchar(45) DEFAULT NULL,
  `Pat_Last` varchar(45) NOT NULL,
  `Pat_Email` varchar(45) NOT NULL,
  `Pat_Phone` varchar(45) DEFAULT NULL,
  `Pat_Gender` varchar(45) NOT NULL,
  `Pat_Race` int NOT NULL,
  `Pat_DOB` date NOT NULL,
  `Pat_Height` float NOT NULL COMMENT 'In Inches',
  `Pat_Weight` float NOT NULL COMMENT 'In Pounds',
  `Pat_Street_Addr` varchar(45) NOT NULL,
  `Pat_City_Addr` varchar(45) NOT NULL,
  `Pat_State_Addr` varchar(45) NOT NULL,
  `Pat_Zip_Addr` int NOT NULL,
  `Pat_Allergy` int NOT NULL,
  `Pat_Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Pat_ID`),
  UNIQUE KEY `Pat_ID_UNIQUE` (`Pat_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1016497 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1012241,'Jenn','H','Smith','test@example.org','7234982938','Female',100,'1990-12-12',120,60,'123 main','houston','texas',77598,200,'password'),(1012247,'Muhammad','M','Uddin','mamoonuddin17@gmail.com','122-222-2225','Male',104,'2022-01-17',178,90,'20915 NONYA','Sugarland','Texas',88542,201,'1234'),(1012248,'Kevin','','James','kevin@gmail.org','1234566758','Male',103,'2000-12-12',150,50,'2718 Main','Deer Park','Texas',77536,203,'password'),(1016416,'Olivia','A','Smith','OliviaA@yahoo.com','1691752725','Female',104,'2012-01-01',37,19,'6279 Main','Houston','Texas',77665,201,'123456'),(1016417,'Emma','D','Johnson','EmmaD@gmail.com','2949366923','Female',102,'1945-02-02',131,60,'2981 Plaza','Deer Park','Texas',77221,200,'Qwerty'),(1016418,'Ava','T','Williams','AvaT@sbcglobal.net','5395342749','Female',100,'2008-03-03',91,46,'309 El Dorado','Humble','Texas',77604,200,'Password'),(1016419,'Charlotte','R','Brown','CharlotteR@hotmail.com','3627861872','Female',101,'1940-04-04',142,61,'2089 West','Spring','Texas',77939,205,'DEFAULT'),(1016420,'Sophia','G','Jones','SophiaG@icloud.com','4903739060','Female',102,'1953-05-05',60,30,'4528 Center','Katy','Texas',77447,200,'Qwertyuiop'),(1016421,'Amelia','E','Miller','AmeliaE@yahoo.com','6309622698','Female',104,'1987-06-06',49,19,'5826 Spa','Sugarland','Texas',77159,201,'666666'),(1016422,'Isabella','W','Davis','IsabellaW@gmail.com','9257173970','Female',101,'2002-07-07',75,30,'6698 Kalwick','The Woodlands','Texas',7758,202,'123456'),(1016423,'Mia','F','Garcia','MiaF@sbcglobal.net','6433247741','Female',102,'1993-08-08',67,33,'5160 P St','Houston','Texas',77708,203,'Qwerty'),(1016424,'Evelyn','K','Rodriguez','EvelynK@hotmail.com','1528809809','Female',100,'1970-09-09',140,78,'4754 Main','Deer Park','Texas',77819,201,'Password'),(1016425,'Harper','A','Wilson','HarperA@icloud.com','6329718994','Female',102,'1981-10-10',69,28,'8603 Plaza','Humble','Texas',77601,200,'DEFAULT'),(1016426,'Camila','D','Martinez','CamilaD@yahoo.com','5367163900','Female',101,'1997-11-11',109,57,'7237 El Dorado','Spring','Texas',77990,200,'Qwertyuiop'),(1016427,'Gianna','T','Anderson','GiannaT@gmail.com','4907802508','Female',100,'1931-12-12',50,20,'4437 West','Katy','Texas',77812,200,'666666'),(1016428,'Abigail','R','Taylor','AbigailR@sbcglobal.net','4815947665','Female',102,'1973-01-13',95,48,'4207 Center','Sugarland','Texas',77524,205,'123456'),(1016429,'Luna','G','Thomas','LunaG@hotmail.com','5847686675','Female',102,'1978-02-14',85,34,'4237 Spa','The Woodlands','Texas',77688,200,'Qwerty'),(1016430,'Ella','E','Hernandez','EllaE@icloud.com','9875806641','Female',103,'1944-03-15',136,58,'5648 Kalwick','Houston','Texas',77891,201,'Password'),(1016431,'Elizabeth','W','Moore','ElizabethW@yahoo.com','7371600115','Female',101,'1927-04-16',132,76,'9094 P St','Deer Park','Texas',77249,205,'DEFAULT'),(1016432,'Sofia','F','Martin','SofiaF@gmail.com','7388500346','Female',100,'1952-05-17',65,27,'4991 Main','Humble','Texas',77564,201,'Qwertyuiop'),(1016433,'Emily','K','Jackson','EmilyK@sbcglobal.net','8681278172','Female',101,'1932-06-18',167,76,'585 Plaza','Spring','Texas',77552,200,'666666'),(1016434,'Avery','A','Thompson','AveryA@hotmail.com','9082236583','Female',100,'1967-07-19',34,20,'5001 El Dorado','Katy','Texas',77895,202,'123456'),(1016435,'Mila','D','White','MilaD@icloud.com','5501841882','Female',100,'1943-08-20',132,67,'1539 West','Sugarland','Texas',77771,204,'Qwerty'),(1016436,'Scarlett','T','Smith','ScarlettT@yahoo.com','2984960791','Female',100,'2000-09-21',142,68,'3495 Center','The Woodlands','Texas',77609,203,'Password'),(1016437,'Eleanor','R','Johnson','EleanorR@gmail.com','3525578370','Female',100,'1973-10-22',173,100,'1955 Spa','Houston','Texas',77211,202,'DEFAULT'),(1016438,'Madison','G','Williams','MadisonG@sbcglobal.net','6133803478','Female',102,'1966-11-23',58,30,'8613 Kalwick','Deer Park','Texas',77871,201,'Qwertyuiop'),(1016440,'Penelope','W','Jones','PenelopeW@icloud.com','4203444356','Female',104,'1946-01-25',44,21,'1666 Main','Spring','Texas',77756,200,'123456'),(1016441,'Aria','F','Miller','AriaF@yahoo.com','4105907861','Female',100,'1963-02-26',83,34,'687 Plaza','Katy','Texas',77373,200,'Qwerty'),(1016442,'Chloe','K','Davis','ChloeK@gmail.com','3104991068','Female',100,'1946-03-27',40,22,'3142 El Dorado','Sugarland','Texas',77268,200,'Password'),(1016443,'Grace','A','Garcia','GraceA@sbcglobal.net','9639634390','Female',102,'1939-04-28',40,16,'2051 West','The Woodlands','Texas',77435,200,'DEFAULT'),(1016444,'Ellie','D','Rodriguez','EllieD@hotmail.com','5540972266','Female',100,'1995-05-01',49,19,'392 Center','Houston','Texas',77537,202,'Qwertyuiop'),(1016445,'Nora','T','Wilson','NoraT@icloud.com','3880802524','Female',100,'1962-06-02',202,113,'1670 Spa','Deer Park','Texas',77420,201,'666666'),(1016446,'Hazel,','R','Martinez','Hazel,R@yahoo.com','6802860482','Female',101,'1979-07-03',47,21,'4111 Kalwick','Humble','Texas',77446,200,'123456'),(1016447,'Zoey','G','Anderson','ZoeyG@gmail.com','9671598221','Female',100,'1970-08-04',183,100,'4932 P St','Spring','Texas',77677,200,'Qwerty'),(1016448,'Riley','E','Taylor','RileyE@sbcglobal.net','9716240330','Female',104,'1963-09-05',120,48,'5899 Main','Katy','Texas',77145,205,'Password'),(1016449,'Victoria','W','Thomas','VictoriaW@hotmail.com','8033391832','Female',102,'1937-10-06',147,64,'1644 Plaza','Sugarland','Texas',77620,200,'DEFAULT'),(1016450,'Lily','F','Hernandez','LilyF@icloud.com','7495751907','Female',100,'1999-11-07',151,69,'7686 El Dorado','The Woodlands','Texas',77341,205,'Qwertyuiop'),(1016451,'Aurora','K','Moore','AuroraK@yahoo.com','2718207578','Female',100,'2012-12-08',21,9,'2703 West','Houston','Texas',77230,205,'666666'),(1016452,'Violet','A','Martin','VioletA@gmail.com','3684280418','Female',100,'1965-01-09',30,13,'6447 Center','Deer Park','Texas',77678,200,'123456'),(1016453,'Nova','D','Jackson','NovaD@sbcglobal.net','3901293780','Female',100,'1995-02-10',118,56,'175 Spa','Humble','Texas',77460,200,'Qwerty'),(1016454,'Hannah','T','Thompson','HannahT@hotmail.com','8707066907','Female',103,'1970-03-11',85,38,'1616 Kalwick','Spring','Texas',77672,204,'Password'),(1016455,'Emilia','R','White','EmiliaR@icloud.com','6881339865','Female',100,'1955-04-12',182,94,'4592 P St','Katy','Texas',77477,200,'DEFAULT'),(1016456,'Zoe','G','Smith','ZoeG@yahoo.com','9281859321','Female',100,'1946-05-13',87,48,'4515 Main','Sugarland','Texas',77535,203,'Qwertyuiop'),(1016457,'Stella','E','Johnson','StellaE@gmail.com','2005690688','Female',101,'2014-06-14',61,24,'5701 Plaza','The Woodlands','Texas',7758,201,'666666'),(1016458,'Everly','W','Williams','EverlyW@sbcglobal.net','1450449583','Female',104,'1945-07-15',122,62,'2127 El Dorado','Houston','Texas',77762,205,'123456'),(1016459,'Isla','F','Brown','IslaF@hotmail.com','5986053661','Female',100,'1980-08-16',189,85,'8639 West','Deer Park','Texas',77649,200,'Qwerty'),(1016460,'Leah','K','Jones','LeahK@icloud.com','6210935533','Female',103,'2004-09-17',142,65,'4843 Center','Humble','Texas',7771,202,'Password'),(1016461,'Lillian','A','Miller','LillianA@yahoo.com','2143156236','Female',102,'2002-10-18',141,84,'2529 Spa','Spring','Texas',77963,200,'DEFAULT'),(1016462,'Addison','D','Davis','AddisonD@gmail.com','2832339522','Female',100,'2001-11-19',70,33,'8671 Kalwick','Katy','Texas',77507,200,'Qwertyuiop'),(1016463,'Willow','T','Garcia','WillowT@sbcglobal.net','7328138924','Female',100,'2006-12-20',23,13,'6806 P St','Sugarland','Texas',77932,205,'666666'),(1016464,'Lucy','R','Rodriguez','LucyR@hotmail.com','2473062499','Female',101,'1977-01-21',101,54,'5676 Main','The Woodlands','Texas',77642,200,'123456'),(1016465,'Paisley','G','Wilson','PaisleyG@icloud.com','7862387161','Female',100,'1947-02-22',199,85,'705 Plaza','Houston','Texas',77699,200,'Qwerty'),(1016466,'Liam','E','Martinez','LiamE@yahoo.com','5455526796','Male',102,'1972-03-23',135,67,'9883 El Dorado','Deer Park','Texas',77656,201,'Password'),(1016467,'Noah','W','Anderson','NoahW@gmail.com','5869371774','Male',100,'1949-04-24',100,40,'689 West','Humble','Texas',77652,201,'DEFAULT'),(1016468,'Oliver','F','Taylor','OliverF@sbcglobal.net','3804442486','Male',102,'1953-05-25',56,27,'646 Center','Spring','Texas',77610,200,'Qwertyuiop'),(1016469,'Elijah','K','Thomas','ElijahK@hotmail.com','7275053965','Male',100,'1925-06-26',225,101,'9763 Spa','Katy','Texas',77744,200,'666666'),(1016470,'William','A','Hernandez','WilliamA@icloud.com','6247255360','Male',104,'1945-07-27',70,36,'527 Kalwick','Sugarland','Texas',77853,203,'123456'),(1016471,'James','D','Moore','JamesD@yahoo.com','7982513516','Male',103,'2000-08-28',152,88,'215 P St','The Woodlands','Texas',77914,200,'Qwerty'),(1016472,'Benjamin','T','Martin','BenjaminT@gmail.com','3369629985','Male',100,'1943-09-01',206,100,'5028 Main','Houston','Texas',77916,203,'Password'),(1016473,'Lucas','R','Jackson','LucasR@sbcglobal.net','2391360233','Male',101,'1953-10-02',98,44,'9124 Plaza','Deer Park','Texas',77363,200,'DEFAULT'),(1016474,'Henry','G','Thompson','HenryG@hotmail.com','8164010843','Male',100,'1976-11-03',193,106,'1943 El Dorado','Humble','Texas',77375,201,'Qwertyuiop'),(1016475,'Alexander','E','White','AlexanderE@icloud.com','8040464219','Male',102,'1928-12-04',228,118,'977 West','Spring','Texas',77650,204,'666666'),(1016476,'Mason','W','Smith','MasonW@yahoo.com','9871657793','Male',100,'1946-01-05',96,39,'1305 Center','Katy','Texas',7778,205,'123456'),(1016477,'Michael','F','Johnson','MichaelF@gmail.com','1507341140','Male',101,'1956-02-06',165,66,'4133 Spa','Sugarland','Texas',77902,200,'Qwerty'),(1016478,'Ethan','K','Williams','EthanK@sbcglobal.net','3342117177','Male',102,'2018-03-07',18,10,'129 Kalwick','The Woodlands','Texas',77807,205,'Password'),(1016479,'Daniel','A','Brown','DanielA@hotmail.com','1669359672','Male',102,'2011-04-08',79,41,'8602 P St','Houston','Texas',77500,204,'DEFAULT'),(1016480,'Jacob','D','Jones','JacobD@icloud.com','3548008732','Male',100,'2021-05-09',10,5,'4365 Main','Deer Park','Texas',77222,204,'Qwertyuiop'),(1016481,'Logan','T','Miller','LoganT@yahoo.com','1062470901','Male',102,'1944-06-10',114,53,'4512 Plaza','Humble','Texas',77747,200,'666666'),(1016482,'Jackson','R','Davis','JacksonR@gmail.com','2342844180','Male',100,'1998-07-11',38,19,'3313 El Dorado','Spring','Texas',77837,203,'123456'),(1016483,'Levi','G','Garcia','LeviG@sbcglobal.net','5958911392','Male',102,'1935-08-12',197,102,'9684 West','Katy','Texas',77391,202,'Qwerty'),(1016484,'Sebastian','E','Rodriguez','SebastianE@hotmail.com','2523846626','Male',102,'1960-09-13',166,91,'3932 Center','Sugarland','Texas',77229,202,'Password'),(1016485,'Mateo','W','Wilson','MateoW@icloud.com','8189087349','Male',102,'1956-10-14',39,19,'3427 Spa','The Woodlands','Texas',77913,200,'DEFAULT'),(1016486,'Jack','F','Martinez','JackF@yahoo.com','2966790957','Male',104,'1953-11-15',107,64,'669 Kalwick','Houston','Texas',77463,202,'Qwertyuiop'),(1016487,'Owen','K','Anderson','OwenK@gmail.com','7867038482','Male',103,'2018-12-16',58,26,'4018 P St','Deer Park','Texas',77934,202,'666666'),(1016488,'Theodore','A','Taylor','TheodoreA@sbcglobal.net','4648365861','Male',104,'2018-01-17',23,13,'7679 Main','Humble','Texas',77810,200,'123456'),(1016489,'Aiden','D','Thomas','AidenD@hotmail.com','3203588466','Male',104,'1927-02-18',82,41,'8205 Plaza','Spring','Texas',77662,202,'Qwerty'),(1016490,'Samuel','T','Hernandez','SamuelT@icloud.com','2911188408','Male',103,'2020-03-19',19,10,'2963 El Dorado','Katy','Texas',77406,200,'Password'),(1016491,'Joseph','R','Moore','JosephR@yahoo.com','7393993321','Male',101,'1947-04-20',195,113,'2396 West','Sugarland','Texas',77315,200,'DEFAULT'),(1016492,'John','G','Martin','JohnG@gmail.com','6699011009','Male',100,'1930-05-21',145,65,'8038 Center','The Woodlands','Texas',77777,200,'Qwertyuiop'),(1016493,'David','E','Jackson','DavidE@sbcglobal.net','9348482035','Male',103,'1964-06-22',79,45,'3441 Spa','Houston','Texas',77629,204,'666666'),(1016494,'Wyatt','W','Thompson','WyattW@hotmail.com','9445004964','Male',104,'2001-07-23',55,29,'9503 Kalwick','Deer Park','Texas',77374,202,'123456'),(1016495,'Matthew','F','White','MatthewF@icloud.com','5364514079','Male',102,'2003-08-24',62,34,'9095 P St','Humble','Texas',77775,200,'Qwerty');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`VArtiles`@`%`*/ /*!50003 TRIGGER `no_patient` AFTER DELETE ON `patient` FOR EACH ROW BEGIN
    DELETE FROM appointment WHERE OLD.Pat_ID = Pat_ID;
    DELETE FROM prescription WHERE OLD.Pat_ID = Pat_ID;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prescription` (
  `Per_ID` int NOT NULL AUTO_INCREMENT,
  `Pat_ID` int NOT NULL,
  `Doc_ID` int NOT NULL,
  `Per_Desc` varchar(45) NOT NULL,
  `Per_Status` varchar(45) DEFAULT NULL,
  `Per_Date` date NOT NULL,
  PRIMARY KEY (`Per_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'medical_db'
--

--
-- Dumping routines for database 'medical_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-24 18:58:28
