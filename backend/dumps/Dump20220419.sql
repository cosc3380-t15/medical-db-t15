-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: eyiece.mynetgear.com    Database: medical_db
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
INSERT INTO `admin` VALUES (3000000,'Jerry','K','Klumas','jerry@clinico.org','4902945398','Male','1970-03-23','456 Second Street',NULL,'Houston','Texas',77598,'jerry456'),(3000001,'admin','a','admin','admin','123123423','male','1234-11-11','1231244','123123','123','asd',1223,'admin1234');
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
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (160,1012249,2000014,'Houston','Dentist','2022-04-19','14:00:00'),(161,1012249,2000014,'Houston','Dentist','2022-04-19','13:00:00'),(163,1012248,2000014,'Houston','Dentist','2022-04-19','11:00:00');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2000025 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (2000014,'Dentist','Houston','Clark  ','H','Nolan','nolan@clinico.org','2347653487','Male','1980-08-09','65 dary ashford dr','katy','texas',66778,'nolan1234'),(2000015,'Pediatrician','Sugar Land','Lucie','H','East','east@clinico.org','7651235409','Female','1988-04-12','654 dunvale dr','houston','texas',77877,'east1234'),(2000016,'Dermatologist','Houston','Anabella ','T','Mora','mora@clinico.org','1230983487','Female','1989-12-11','65423 westheimer dr','houston','texas',77465,'mora1234'),(2000017,'Dermatologist','Sugar Land','Fardeen  ','P','Larson','larson@clinico.org','4561238734','Male','1983-03-02','2345 wilcrest dr','houston','texas',77866,'larson1234'),(2000018,'Cardiologist','Houston','Patrik   ','B','Burks','burks@clinico.org','0887562345','Male','1981-08-03','1256 sunsed dune dr','houston','texas',77082,'burks1234'),(2000019,'Endocrinologist','Katy','Yahya  ','G','Fernandez','fernandez@clinico.org','4443336565','Male','1991-03-09','45632 shadowbrier dr','spring','texas',557766,'fernandez1234'),(2000020,'Neurologist','Katy','Reo ','Y','Kramer','kramer@clinico.org','8889990101','Male','1984-07-11','7653 dunvale dr','houston','texas',77877,'kramer1234'),(2000021,'Neurologist','Katy','Zuzanna  ','P','Phan','phan@clinico.org','3331112334','Female','1989-11-05','1214 westheimer dr','houston','texas',77465,'phan1234'),(2000022,'Oncologist','The Woodlands','Safwan','G','Lane','lane@clinico.org','6667778787','Male','1980-07-02','2345 spring plaza dr','spring','texas',77546,'lane1234'),(2000023,'Radiologists','The Woodlands','Clarissa','H','Barrera','barrera@clinico.org','6657768798','Female','1986-12-12','5632 pine road','houston','texas',77582,'barrera1234'),(2000024,'Radiologists','The Woodlands','John','H','Smith','smith@clinico.org','2347654589','Male','1986-03-07','3456 pine road','houston','texas',77582,'smith1234');
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
) ENGINE=InnoDB AUTO_INCREMENT=1016012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1012241,'Jenn','H','Smith','test@example.org','7234982938','',100,'1990-12-12',120,60,'123 main','houston','texas',77598,200,'password'),(1012247,'Muhammad','M','Uddin','mamoonuddin17@gmail.com','122-222-2225','',104,'2022-01-17',178,90,'20915 NONYA','Sugarland','Texas',88542,201,'p@ssword'),(1012248,'Kevin','','James','kevin@gmail.org','1234566758','Male',103,'2000-12-12',150,50,'2718 Main','Deer Park','Texas',77536,203,'password'),(1012249,'Dragomir','R','Nonov','dragomir.nonov@gmail.com','8328154761','Male',100,'2022-04-19',160,80,'21603 Spring plaza dr, Apt 6212','Spring','Texas',77388,200,'12345678'),(1015931,'Olivia','A','Smith','OliviaA@yahoo.com','4551954795','Female',100,'2007-01-01',99,49,'4607 Main','Houston','Texas',77908,203,'123456'),(1015932,'Emma','D','Johnson','EmmaD@gmail.com','1114148805','Female',102,'2011-02-02',41,19,'2000 Plaza','Deer Park','Texas',77321,203,'Qwerty'),(1015933,'Ava','T','Williams','AvaT@sbcglobal.net','1403184175','Female',100,'1970-03-03',124,50,'3890 El Dorado','Humble','Texas',77257,202,'Password'),(1015934,'Charlotte','R','Brown','CharlotteR@hotmail.com','8207464351','Female',101,'2001-04-04',76,40,'4186 West','Spring','Texas',77108,204,'DEFAULT'),(1015935,'Sophia','G','Jones','SophiaG@icloud.com','6765552174','Female',103,'1976-05-05',193,82,'5866 Center','Katy','Texas',77247,205,'Qwertyuiop'),(1015936,'Amelia','E','Miller','AmeliaE@yahoo.com','4800079684','Female',100,'1952-06-06',184,75,'5787 Spa','Sugarland','Texas',77492,202,'666666'),(1015937,'Isabella','W','Davis','IsabellaW@gmail.com','5862888257','Female',103,'2000-07-07',28,13,'5086 Kalwick','The Woodlands','Texas',77203,202,'123456'),(1015938,'Mia','F','Garcia','MiaF@sbcglobal.net','3684677314','Female',100,'2002-08-08',117,62,'1844 P St','Houston','Texas',77674,202,'Qwerty'),(1015939,'Evelyn','K','Rodriguez','EvelynK@hotmail.com','7007339505','Female',100,'1984-09-09',97,43,'9131 Main','Deer Park','Texas',77140,200,'Password'),(1015940,'Harper','A','Wilson','HarperA@icloud.com','5926504924','Female',101,'1956-10-10',64,35,'9348 Plaza','Humble','Texas',7763,205,'DEFAULT'),(1015941,'Camila','D','Martinez','CamilaD@yahoo.com','2165058740','Female',103,'1988-11-11',27,15,'1715 El Dorado','Spring','Texas',77724,200,'Qwertyuiop'),(1015942,'Gianna','T','Anderson','GiannaT@gmail.com','2870732297','Female',100,'2019-12-12',50,23,'668 West','Katy','Texas',77832,200,'666666'),(1015943,'Abigail','R','Taylor','AbigailR@sbcglobal.net','2903755395','Female',104,'1995-01-13',69,40,'5807 Center','Sugarland','Texas',77952,204,'123456'),(1015944,'Luna','G','Thomas','LunaG@hotmail.com','4001366102','Female',100,'1987-02-14',137,79,'5936 Spa','The Woodlands','Texas',77579,204,'Qwerty'),(1015945,'Ella','E','Hernandez','EllaE@icloud.com','5040409890','Female',102,'2013-03-15',91,38,'8831 Kalwick','Houston','Texas',77314,200,'Password'),(1015946,'Elizabeth','W','Moore','ElizabethW@yahoo.com','5844044440','Female',102,'1957-04-16',197,90,'108 P St','Deer Park','Texas',77735,202,'DEFAULT'),(1015947,'Sofia','F','Martin','SofiaF@gmail.com','1522766986','Female',100,'1980-05-17',107,43,'4628 Main','Humble','Texas',77485,200,'Qwertyuiop'),(1015948,'Emily','K','Jackson','EmilyK@sbcglobal.net','3056777944','Female',104,'1938-06-18',196,90,'4454 Plaza','Spring','Texas',77877,200,'666666'),(1015949,'Avery','A','Thompson','AveryA@hotmail.com','9060404566','Female',101,'1960-07-19',162,90,'8072 El Dorado','Katy','Texas',77568,200,'123456'),(1015950,'Mila','D','White','MilaD@icloud.com','2221179175','Female',100,'1950-08-20',211,109,'9009 West','Sugarland','Texas',77841,200,'Qwerty'),(1015951,'Scarlett','T','Smith','ScarlettT@yahoo.com','2451408415','Female',100,'1951-09-21',142,85,'4062 Center','The Woodlands','Texas',77862,201,'Password'),(1015952,'Eleanor','R','Johnson','EleanorR@gmail.com','8154439129','Female',100,'1999-10-22',47,25,'2209 Spa','Houston','Texas',77631,203,'DEFAULT'),(1015953,'Madison','G','Williams','MadisonG@sbcglobal.net','9134897401','Female',101,'1986-11-23',53,27,'6442 Kalwick','Deer Park','Texas',77166,201,'Qwertyuiop'),(1015954,'Layla','E','Brown','LaylaE@hotmail.com','4042372274','Female',104,'1993-12-24',73,32,'411 P St','Humble','Texas',77455,200,'666666'),(1015955,'Penelope','W','Jones','PenelopeW@icloud.com','6972420450','Female',101,'1973-01-25',87,35,'149 Main','Spring','Texas',77339,201,'123456'),(1015956,'Aria','F','Miller','AriaF@yahoo.com','4761956016','Female',102,'1991-02-26',58,23,'1963 Plaza','Katy','Texas',77174,202,'Qwerty'),(1015957,'Chloe','K','Davis','ChloeK@gmail.com','7223212996','Female',100,'1951-03-27',65,27,'1493 El Dorado','Sugarland','Texas',77595,200,'Password'),(1015958,'Grace','A','Garcia','GraceA@sbcglobal.net','3568609320','Female',100,'1947-04-28',187,108,'4290 West','The Woodlands','Texas',77481,201,'DEFAULT'),(1015959,'Ellie','D','Rodriguez','EllieD@hotmail.com','9263826655','Female',102,'2019-05-01',50,20,'1927 Center','Houston','Texas',77324,200,'Qwertyuiop'),(1015960,'Nora','T','Wilson','NoraT@icloud.com','9801008099','Female',102,'1981-06-02',165,77,'4136 Spa','Deer Park','Texas',77524,201,'666666'),(1015961,'Hazel,','R','Martinez','Hazel,R@yahoo.com','9687593691','Female',102,'1944-07-03',197,88,'4031 Kalwick','Humble','Texas',77283,201,'123456'),(1015962,'Zoey','G','Anderson','ZoeyG@gmail.com','3154838807','Female',101,'1931-08-04',167,78,'5939 P St','Spring','Texas',77689,200,'Qwerty'),(1015963,'Riley','E','Taylor','RileyE@sbcglobal.net','5798074205','Female',104,'1923-09-05',51,23,'5779 Main','Katy','Texas',77160,200,'Password'),(1015964,'Victoria','W','Thomas','VictoriaW@hotmail.com','6422422177','Female',103,'1937-10-06',152,65,'8061 Plaza','Sugarland','Texas',77431,200,'DEFAULT'),(1015965,'Lily','F','Hernandez','LilyF@icloud.com','4489481735','Female',102,'1982-11-07',116,61,'8705 El Dorado','The Woodlands','Texas',77580,203,'Qwertyuiop'),(1015966,'Aurora','K','Moore','AuroraK@yahoo.com','6397881756','Female',100,'1928-12-08',87,43,'6162 West','Houston','Texas',77470,200,'666666'),(1015967,'Violet','A','Martin','VioletA@gmail.com','3100571065','Female',100,'1985-01-09',176,79,'9052 Center','Deer Park','Texas',77527,203,'123456'),(1015968,'Nova','D','Jackson','NovaD@sbcglobal.net','5256008517','Female',100,'1950-02-10',202,98,'9632 Spa','Humble','Texas',77261,202,'Qwerty'),(1015969,'Hannah','T','Thompson','HannahT@hotmail.com','5414861394','Female',102,'1931-03-11',50,22,'466 Kalwick','Spring','Texas',77481,203,'Password'),(1015970,'Emilia','R','White','EmiliaR@icloud.com','4994740881','Female',100,'1941-04-12',163,97,'3760 P St','Katy','Texas',77332,205,'DEFAULT'),(1015971,'Zoe','G','Smith','ZoeG@yahoo.com','7943023471','Female',100,'1978-05-13',55,31,'2457 Main','Sugarland','Texas',77403,203,'Qwertyuiop'),(1015972,'Stella','E','Johnson','StellaE@gmail.com','2029298357','Female',103,'1994-06-14',36,15,'1947 Plaza','The Woodlands','Texas',77129,200,'666666'),(1015973,'Everly','W','Williams','EverlyW@sbcglobal.net','4042797633','Female',101,'1937-07-15',147,85,'505 El Dorado','Houston','Texas',77830,200,'123456'),(1015974,'Isla','F','Brown','IslaF@hotmail.com','2471641362','Female',100,'1964-08-16',79,40,'6818 West','Deer Park','Texas',77890,202,'Qwerty'),(1015975,'Leah','K','Jones','LeahK@icloud.com','8765610468','Female',104,'2019-09-17',41,17,'771 Center','Humble','Texas',77420,200,'Password'),(1015976,'Lillian','A','Miller','LillianA@yahoo.com','2875622922','Female',101,'1981-10-18',61,35,'9009 Spa','Spring','Texas',77889,200,'DEFAULT'),(1015977,'Addison','D','Davis','AddisonD@gmail.com','3539752445','Female',100,'1993-11-19',47,20,'6166 Kalwick','Katy','Texas',77960,200,'Qwertyuiop'),(1015978,'Willow','T','Garcia','WillowT@sbcglobal.net','2104507045','Female',104,'1978-12-20',165,82,'5300 P St','Sugarland','Texas',7792,200,'666666'),(1015979,'Lucy','R','Rodriguez','LucyR@hotmail.com','8852711495','Female',102,'1924-01-21',179,105,'2416 Main','The Woodlands','Texas',77363,200,'123456'),(1015980,'Paisley','G','Wilson','PaisleyG@icloud.com','1969375389','Female',100,'2018-02-22',44,20,'8780 Plaza','Houston','Texas',77642,201,'Qwerty'),(1015981,'Liam','E','Martinez','LiamE@yahoo.com','9932663716','Male',103,'1960-03-23',175,85,'4893 El Dorado','Deer Park','Texas',77667,200,'Password'),(1015982,'Noah','W','Anderson','NoahW@gmail.com','9098177250','Male',100,'1979-04-24',171,70,'6122 West','Humble','Texas',77102,200,'DEFAULT'),(1015983,'Oliver','F','Taylor','OliverF@sbcglobal.net','6200813925','Male',100,'1972-05-25',72,40,'8796 Center','Spring','Texas',77370,201,'Qwertyuiop'),(1015984,'Elijah','K','Thomas','ElijahK@hotmail.com','6473002283','Male',100,'1933-06-26',194,106,'3994 Spa','Katy','Texas',77847,202,'666666'),(1015985,'William','A','Hernandez','WilliamA@icloud.com','5464705224','Male',102,'1957-07-27',72,41,'4310 Kalwick','Sugarland','Texas',77850,204,'123456'),(1015986,'James','D','Moore','JamesD@yahoo.com','8065024835','Male',103,'2010-08-28',84,50,'5184 P St','The Woodlands','Texas',77595,200,'Qwerty'),(1015987,'Benjamin','T','Martin','BenjaminT@gmail.com','1443462443','Male',100,'1947-09-01',117,70,'7691 Main','Houston','Texas',77905,200,'Password'),(1015988,'Lucas','R','Jackson','LucasR@sbcglobal.net','6766012961','Male',103,'1945-10-02',83,41,'9246 Plaza','Deer Park','Texas',77897,200,'DEFAULT'),(1015989,'Henry','G','Thompson','HenryG@hotmail.com','8756252293','Male',104,'1940-11-03',67,40,'2051 El Dorado','Humble','Texas',77926,202,'Qwertyuiop'),(1015990,'Alexander','E','White','AlexanderE@icloud.com','1784611504','Male',104,'1992-12-04',166,66,'122 West','Spring','Texas',77297,202,'666666'),(1015991,'Mason','W','Smith','MasonW@yahoo.com','3912817786','Male',100,'2003-01-05',77,30,'1744 Center','Katy','Texas',77333,201,'123456'),(1015992,'Michael','F','Johnson','MichaelF@gmail.com','8875363982','Male',103,'1936-02-06',125,51,'8127 Spa','Sugarland','Texas',77271,202,'Qwerty'),(1015993,'Ethan','K','Williams','EthanK@sbcglobal.net','2120327196','Male',101,'1973-03-07',138,77,'4558 Kalwick','The Woodlands','Texas',77834,204,'Password'),(1015994,'Daniel','A','Brown','DanielA@hotmail.com','2205160692','Male',100,'1994-04-08',99,39,'5645 P St','Houston','Texas',77709,200,'DEFAULT'),(1015995,'Jacob','D','Jones','JacobD@icloud.com','3190745287','Male',101,'2012-05-09',106,62,'7305 Main','Deer Park','Texas',77263,203,'Qwertyuiop'),(1015996,'Logan','T','Miller','LoganT@yahoo.com','4722034263','Male',103,'2017-06-10',50,28,'5039 Plaza','Humble','Texas',77203,200,'666666'),(1015997,'Jackson','R','Davis','JacksonR@gmail.com','2197613122','Male',100,'2016-07-11',22,12,'2535 El Dorado','Spring','Texas',77121,201,'123456'),(1015998,'Levi','G','Garcia','LeviG@sbcglobal.net','8803226785','Male',100,'1983-08-12',64,27,'1063 West','Katy','Texas',77278,200,'Qwerty'),(1015999,'Sebastian','E','Rodriguez','SebastianE@hotmail.com','6239903753','Male',103,'2005-09-13',72,35,'7047 Center','Sugarland','Texas',77407,200,'Password'),(1016000,'Mateo','W','Wilson','MateoW@icloud.com','3006763701','Male',102,'1932-10-14',86,40,'4543 Spa','The Woodlands','Texas',77287,203,'DEFAULT'),(1016001,'Jack','F','Martinez','JackF@yahoo.com','7147203338','Male',104,'2009-11-15',56,25,'5539 Kalwick','Houston','Texas',77784,200,'Qwertyuiop'),(1016002,'Owen','K','Anderson','OwenK@gmail.com','1889292185','Male',101,'1952-12-16',60,34,'4169 P St','Deer Park','Texas',77172,200,'666666'),(1016003,'Theodore','A','Taylor','TheodoreA@sbcglobal.net','1412493746','Male',100,'1998-01-17',67,28,'2546 Main','Humble','Texas',77493,200,'123456'),(1016004,'Aiden','D','Thomas','AidenD@hotmail.com','4685574899','Male',104,'1995-02-18',62,37,'4568 Plaza','Spring','Texas',77918,201,'Qwerty'),(1016005,'Samuel','T','Hernandez','SamuelT@icloud.com','1643803060','Male',100,'1950-03-19',134,53,'7135 El Dorado','Katy','Texas',7789,202,'Password'),(1016006,'Joseph','R','Moore','JosephR@yahoo.com','8849084292','Male',100,'1960-04-20',199,101,'1966 West','Sugarland','Texas',77713,201,'DEFAULT'),(1016007,'John','G','Martin','JohnG@gmail.com','8560213991','Male',101,'1998-05-21',32,16,'1741 Center','The Woodlands','Texas',77831,202,'Qwertyuiop'),(1016008,'David','E','Jackson','DavidE@sbcglobal.net','5952769444','Male',100,'1942-06-22',123,56,'4636 Spa','Houston','Texas',77829,204,'666666'),(1016009,'Wyatt','W','Thompson','WyattW@hotmail.com','8981237968','Male',100,'1936-07-23',205,102,'3632 Kalwick','Deer Park','Texas',77961,204,'123456'),(1016010,'Matthew','F','White','MatthewF@icloud.com','9788761097','Male',101,'1965-08-24',46,18,'303 P St','Humble','Texas',77453,200,'Qwerty');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`Per_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (30,1012239,2000000,'Aspirin','APPROVED'),(31,1012247,2000000,'Amoxicillin','DENIED'),(32,1012240,2000000,'Amoxicillin','APPROVED'),(33,1012249,2000024,'Amoxicillin','APPROVED'),(34,1012249,2000024,'Aspirin','PENDING'),(35,1012239,2000014,'Amoxicillin','PENDING'),(36,1012239,2000014,'Insulin','APPROVED');
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-19 17:52:13
