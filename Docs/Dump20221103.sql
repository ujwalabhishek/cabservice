-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: cabservice
-- ------------------------------------------------------
-- Server version	8.0.29

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
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill` (
  `bill_id` int NOT NULL AUTO_INCREMENT,
  `trip_id` int NOT NULL,
  `user_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `balance_amt` int DEFAULT NULL,
  `partital_amt` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`),
  KEY `trip_id` (`trip_id`),
  KEY `user_id` (`user_id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `car_reg_id` varchar(200) NOT NULL,
  `admin_id` int NOT NULL,
  `rate_per_km` int NOT NULL,
  `model` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `category` enum('SUV','SEDAN','MINI','MICRO','LUX') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `car_image` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`car_reg_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES ('KA03MG2419',1,12,'Hyundai Venu','Blue','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2420',1,12,'Hyundai Verna','Green','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2421',1,12,'Hyundai Verna','Blue','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2422',1,12,'Hyundai Verna','Blue','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2424',1,12,'Hyundai Verna','Yellow','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2425',1,12,'Hyundai Verna','Yellow','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2426',1,12,'Hyundai Verna','Yellow','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2427',1,12,'Hyundai Verna','Red','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2428',1,12,'Maruti Alto','Red','SEDAN','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MG2429',1,12,'Maruti Alto','Red','SEDAN','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MG2430',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2431',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2432',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2433',1,12,'TATA TIAGO','Blue','SEDAN','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MG2434',1,12,'TATA TIAGO','Blue','SEDAN','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MG2435',1,12,'TATA TIAGO','Blue','SEDAN','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MG2436',1,12,'BMW X69','Yellow','SEDAN','BMW X69.jpg','2022-10-28 10:07:28'),('KA03MG2437',1,12,'BMW X70','White','SEDAN','BMW X70.jpg','2022-10-28 10:07:28'),('KA03MG2438',1,12,'Hyundai Verna','White','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2439',1,12,'Hyundai Verna','Red','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2440',1,12,'Hyundai Verna','Red','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2441',1,12,'Maruti Alto','Red','SEDAN','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MG2443',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2444',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2445',1,12,'Hyundai Venu','Blue','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2446',1,12,'TATA TIAGO','Yellow','SEDAN','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MG2447',1,12,'TATA TIAGO','Yellow','SEDAN','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MG2448',1,12,'TATA TIAGO','Yellow','SEDAN','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MG2449',1,12,'BMW X74','White','SEDAN','','2022-10-28 10:07:28'),('KA03MG2450',1,12,'BMW X75','White','SEDAN','','2022-10-28 10:07:28'),('KA03MG2451',1,12,'Hyundai Verna','Red','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2452',1,12,'Hyundai Verna','Red','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2453',1,12,'Hyundai Verna','Red','SEDAN','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MG2454',1,12,'Maruti Alto','Red','SEDAN','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MG2455',1,12,'Maruti Alto','Red','SEDAN','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MG2456',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MG2457',1,12,'Hyundai Venu','Green','SEDAN','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2408',1,15,'Hyundai Venu','Red','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2409',1,15,'Hyundai Venu','Red','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2410',1,15,'Hyundai Venu','Red','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2411',1,15,'Hyundai Venu','Green','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2412',1,15,'Hyundai Venu','Green','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2413',1,15,'Hyundai Venu','Green','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2414',1,15,'Hyundai Venu','Blue','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2415',1,15,'Hyundai Venu','Blue','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2416',1,15,'Hyundai Venu','Blue','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2417',1,15,'Hyundai Venu','Yellow','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2418',1,15,'TATA TIAGO','White','SUV','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2419',1,15,'TATA TIAGO','White','SUV','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2420',1,15,'TATA TIAGO','Red','SUV','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2421',1,15,'BMW X67','Red','SUV','','2022-10-28 10:07:28'),('KA03MX2422',1,15,'BMW X68','Red','SUV','','2022-10-28 10:07:28'),('KA03MX2423',1,15,'Hyundai Verna','Green','SUV','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2424',1,15,'Hyundai Verna','Green','SUV','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2425',1,15,'Hyundai Verna','Green','SUV','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2426',1,15,'Maruti Alto','Blue','SUV','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2427',1,15,'Maruti Alto','Yellow','SUV','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2428',1,15,'Hyundai Venu','Yellow','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2429',1,15,'Hyundai Venu','Yellow','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2430',1,15,'Hyundai Venu','White','SUV','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2431',1,15,'TATA TIAGO','White','SUV','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2432',1,8,'Maruti Alto','Yellow','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2433',1,8,'Maruti Alto','Yellow','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2434',1,8,'Maruti Alto','Yellow','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2435',1,8,'Maruti Alto','White','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2436',1,8,'Maruti Alto','White','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2437',1,8,'Maruti Alto','Red','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2438',1,8,'Maruti Alto','Red','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2439',1,8,'Maruti Alto','Red','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2440',1,8,'Maruti Alto','Green','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2441',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2442',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2443',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2444',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2445',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2446',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2447',1,8,'BMW X68','White','MICRO','','2022-10-28 10:07:28'),('KA03MX2448',1,8,'BMW X69','White','MICRO','BMW X69.jpg','2022-10-28 10:07:28'),('KA03MX2449',1,8,'Hyundai Verna','Red','MICRO','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2450',1,8,'Hyundai Verna','Green','MICRO','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2451',1,8,'Hyundai Verna','Green','MICRO','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2452',1,8,'Maruti Alto','Green','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2453',1,8,'Maruti Alto','Blue','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2454',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2455',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2456',1,8,'Hyundai Venu','Yellow','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2457',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2458',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2459',1,8,'TATA TIAGO','Red','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2460',1,8,'BMW X73','Red','MICRO','','2022-10-28 10:07:28'),('KA03MX2461',1,8,'BMW X74','Red','MICRO','','2022-10-28 10:07:28'),('KA03MX2462',1,8,'Hyundai Verna','Green','MICRO','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2463',1,8,'Hyundai Verna','Green','MICRO','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2464',1,8,'Hyundai Verna','Green','MICRO','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA03MX2465',1,8,'Maruti Alto','Blue','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2466',1,8,'Maruti Alto','Blue','MICRO','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA03MX2467',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2468',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2469',1,8,'Hyundai Venu','Blue','MICRO','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA03MX2470',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX2471',1,8,'TATA TIAGO','Yellow','MICRO','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA03MX5000',0,11,'Tata Tiago','Silver','SUV','Hyundai_Venu.jpg','2022-10-31 23:19:10'),('KA03MX8888',0,13,'Mahindra Thar','Red','SUV','BMW_X691.jpg','2022-11-01 21:23:33'),('KA24MC4567',1,50,'BMW X65','White','LUX','','2022-10-28 10:07:28'),('KA24MC4568',1,50,'BMW X65','White','LUX','','2022-10-28 10:07:28'),('KA24MC4569',1,50,'BMW X65','Red','LUX','','2022-10-28 10:07:28'),('KA24MC4570',1,50,'BMW X65','Red','LUX','','2022-10-28 10:07:28'),('KA24MC4571',1,50,'BMW X65','Red','LUX','','2022-10-28 10:07:28'),('KA24MC4572',1,50,'BMW X65','Green','LUX','','2022-10-28 10:07:28'),('KA24MC4573',1,50,'BMW X65','Green','LUX','','2022-10-28 10:07:28'),('KA24MC4574',1,50,'BMW X65','Green','LUX','','2022-10-28 10:07:28'),('KA24MC4575',1,50,'BMW X66','Blue','LUX','','2022-10-28 10:07:28'),('KA24MC4576',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4577',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4578',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4579',1,50,'Maruti Alto','White','LUX','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA24MC4580',1,50,'Maruti Alto','White','LUX','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA24MC4581',1,50,'Hyundai Venu','Red','LUX','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA24MC4582',1,50,'Hyundai Venu','Red','LUX','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA24MC4583',1,50,'Hyundai Venu','Red','LUX','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA24MC4584',1,50,'TATA TIAGO','Green','LUX','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA24MC4585',1,50,'TATA TIAGO','Blue','LUX','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA24MC4586',1,50,'TATA TIAGO','Blue','LUX','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA24MC4587',1,50,'BMW X70','Blue','LUX','BMW X70.jpg','2022-10-28 10:07:28'),('KA24MC4588',1,50,'BMW X71','Yellow','LUX','','2022-10-28 10:07:28'),('KA24MC4589',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4590',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4591',1,50,'Hyundai Verna','White','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4592',1,50,'Maruti Alto','White','LUX','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA24MC4593',1,50,'Maruti Alto','Red','LUX','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA24MC4594',1,50,'Hyundai Venu','Green','LUX','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA24MC4595',1,50,'Hyundai Venu','Green','LUX','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA24MC4596',1,50,'Hyundai Venu','Green','LUX','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA24MC4597',1,50,'TATA TIAGO','Blue','LUX','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA24MC4598',1,50,'TATA TIAGO','Blue','LUX','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA24MC4599',1,50,'TATA TIAGO','Blue','LUX','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA24MC4600',1,50,'BMW X75','Yellow','LUX','','2022-10-28 10:07:28'),('KA24MC4601',1,50,'BMW X76','Yellow','LUX','','2022-10-28 10:07:28'),('KA24MC4602',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4603',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4604',1,50,'Hyundai Verna','Yellow','LUX','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA24MC4605',1,50,'Maruti Alto','White','LUX','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA53MJ8560',1,10,'TATA TIAGO','Blue','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8561',1,10,'TATA TIAGO','Blue','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8562',1,10,'TATA TIAGO','Blue','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8563',1,10,'TATA TIAGO','Yellow','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8564',1,10,'TATA TIAGO','Yellow','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8565',1,10,'TATA TIAGO','Yellow','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8566',1,10,'TATA TIAGO','White','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8567',1,10,'TATA TIAGO','White','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8568',1,10,'TATA TIAGO','Red','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8569',1,10,'TATA TIAGO','Green','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8570',1,10,'BMW X66','Green','MINI','','2022-10-28 10:07:28'),('KA53MJ8571',1,10,'BMW X67','Green','MINI','','2022-10-28 10:07:28'),('KA53MJ8572',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8573',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8574',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8575',1,10,'Maruti Alto','Yellow','MINI','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA53MJ8576',1,10,'Maruti Alto','Yellow','MINI','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA53MJ8577',1,10,'Hyundai Venu','Yellow','MINI','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA53MJ8578',1,10,'Hyundai Venu','Red','MINI','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA53MJ8579',1,10,'Hyundai Venu','Red','MINI','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA53MJ8580',1,10,'TATA TIAGO','Red','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8581',1,10,'TATA TIAGO','Green','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8582',1,10,'TATA TIAGO','Green','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8583',1,10,'BMW X71','Green','MINI','','2022-10-28 10:07:28'),('KA53MJ8584',1,10,'BMW X72','Blue','MINI','','2022-10-28 10:07:28'),('KA53MJ8585',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8586',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8587',1,10,'Hyundai Verna','Yellow','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8588',1,10,'Maruti Alto','White','MINI','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA53MJ8589',1,10,'Maruti Alto','White','MINI','Maruti Alto.jpg','2022-10-28 10:07:28'),('KA53MJ8590',1,10,'Hyundai Venu','Red','MINI','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA53MJ8591',1,10,'Hyundai Venu','Red','MINI','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA53MJ8592',1,10,'Hyundai Venu','Red','MINI','Hyundai Venu.jpg','2022-10-28 10:07:28'),('KA53MJ8593',1,10,'TATA TIAGO','Green','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8594',1,10,'TATA TIAGO','Green','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8595',1,10,'TATA TIAGO','Green','MINI','Tata Tiago.jpg','2022-10-28 10:07:28'),('KA53MJ8596',1,10,'BMW X76','Green','MINI','','2022-10-28 10:07:28'),('KA53MJ8597',1,10,'BMW X77','Green','MINI','','2022-10-28 10:07:28'),('KA53MJ8598',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28'),('KA53MJ8599',1,10,'Hyundai Verna','Blue','MINI','Hyundai Verna.jpg','2022-10-28 10:07:28');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `driver` (
  `driver_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `car_reg_id` varchar(200) NOT NULL,
  `report_id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `mob_no` bigint NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `history` int DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `image_url` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`driver_id`),
  UNIQUE KEY `mobile_no` (`mob_no`),
  UNIQUE KEY `email` (`email`),
  KEY `admin_id` (`admin_id`),
  KEY `car_reg_id` (`car_reg_id`),
  CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  CONSTRAINT `driver_ibfk_2` FOREIGN KEY (`car_reg_id`) REFERENCES `car` (`car_reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` VALUES (1,1,'KA03MX2429',1,'Santosh Kumarr','M',9972697406,'santosh@gmail.com','password',NULL,2,'santosh.jpeg','2022-10-29 20:40:14'),(2,1,'KA03MG2420',2,'Prem Kumar','M',9972697407,'prem@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,1,'prem.jpeg','2022-10-29 20:40:14'),(3,1,'KA03MG2421',3,'Ashok','M',9972697408,'ashok@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,2,'ashok.jpeg','2022-10-29 20:40:14'),(4,1,'KA03MG2422',4,'Rajni','M',9972697409,'rajni@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,4,'rajini.jpeg','2022-10-29 20:40:14'),(5,1,'KA03MG2424',5,'Rahul','M',9972697410,'rahul@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,5,'rahul.jpeg','2022-10-29 20:40:14'),(6,1,'KA03MG2424',6,'Pritam','M',9972697411,'pritam@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,3,'pritam.jpeg','2022-10-29 20:40:14'),(7,1,'KA03MG2425',7,'Sumit','M',9972697412,'sumit@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,5,'sumit.jpeg','2022-10-29 20:40:14'),(8,1,'KA03MG2426',8,'Manish','M',9972697413,'manish@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,1,'manish.jpeg','2022-10-29 20:40:14'),(9,1,'KA03MG2443',9,'Kumaraswamy','M',9972697414,'kumar@mailinator.com','$2a$12$zAE3FcPW/3Jq.inJmE6tuOzEpHUSr0l/2ATRARZPH6ZVRAFxL9PXC',NULL,2,'kumar.jpeg','2022-10-29 20:40:14'),(15,1,'AB03MG2418',0,'ujwal abhishek','M',9954697406,'ujwal.abhi@te.com','$2a$08$xh/ZLaOPMCd3Gori8MVoauVUDWuxkBjtWzfwaQ4xXL5vjpniq2EBS',NULL,1,NULL,'2022-10-30 02:51:33'),(16,1,'KA03MG2427',0,'ujwal abhishek','M',55555555555,'u@j.com','$2a$08$kB6H6ie5xbh/NIXOhP3mTeaWIqfxGcFLz4UQc5h/sIRPMYVm24oa6',NULL,2,NULL,'2022-11-01 21:27:39'),(20,1,'KA03MX8888',0,'monika','M',159852357,'monika@gmail.com','$2a$08$sNrUi2sryaF33/lbhbR5GeVP6D2qpSV5SoAKKRMBs75jOKjsmiXbW',NULL,1,'joe-gardner-21.jpg','2022-11-03 01:44:33');
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_report`
--

DROP TABLE IF EXISTS `sales_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_report` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `date` datetime NOT NULL,
  `trips` int NOT NULL DEFAULT '0',
  `revenue` int NOT NULL DEFAULT '0',
  `is_driver` tinyint NOT NULL,
  `is_user` tinyint NOT NULL,
  `driver_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`),
  KEY `admin_id` (`admin_id`),
  KEY `driver_id` (`driver_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sales_report_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  CONSTRAINT `sales_report_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  CONSTRAINT `sales_report_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_report`
--

LOCK TABLES `sales_report` WRITE;
/*!40000 ALTER TABLE `sales_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trip` (
  `trip_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pickup_location` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `drop_location` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trip_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `driver_id` int NOT NULL,
  `status` set('Accept','Reject','Active','Completed','Usercancelled','Drivercancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `start_km` bigint DEFAULT NULL,
  `trip_start_datetime` datetime DEFAULT NULL,
  `end_km` bigint DEFAULT NULL,
  `trip_end_datetime` datetime DEFAULT NULL,
  `trip_cost` int DEFAULT NULL,
  `customer_payment` int DEFAULT NULL,
  `trip_rating` enum('1','2','3','4','5') DEFAULT NULL,
  `trip_feedback` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trip_id`),
  KEY `user_id` (`user_id`),
  KEY `driver_id` (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip`
--

LOCK TABLES `trip` WRITE;
/*!40000 ALTER TABLE `trip` DISABLE KEYS */;
INSERT INTO `trip` VALUES (1,1,'lokhandawala','powai','2022-11-02 09:58:42',1,'Usercancelled',100,'2022-11-02 00:00:00',NULL,NULL,0,NULL,NULL,NULL,'2022-10-30 15:13:58','2022-11-02 11:38:55'),(4,2,'whitefeild','marathalli','2022-11-09 09:58:18',2,'Usercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-10-30 15:28:18','2022-11-02 11:34:07'),(5,3,'ITPL','Ecity','2022-01-01 11:08:42',3,'Completed',111,'2022-01-01 11:08:42',140,'2022-01-01 12:08:42',290,290,'5',NULL,'2022-10-30 15:28:18','2022-11-02 18:14:36'),(6,20,'whitefeild','marthahalli','2022-01-01 11:08:21',4,'Accept',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-01 17:57:03','2022-11-02 12:39:23'),(7,20,'whitefeild','marthahalli','2022-02-13 10:03:32',5,'Completed',113567,'2022-02-13 10:03:32',113586,'2022-02-13 14:03:32',300,NULL,'5',NULL,'2022-11-01 18:01:10','2022-11-02 18:13:53'),(8,20,'whitefeild','marthahalli','2022-04-13 10:03:32',8,'Completed',7895,'2022-04-13 10:03:32',7899,'2022-02-13 11:03:32',0,NULL,'3',NULL,'2022-11-01 18:02:47','2022-11-02 10:09:17'),(9,20,'whitefeild','marthahalli','2022-04-18 10:03:32',5,'Reject',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-01 18:11:12','2022-11-02 10:09:33'),(10,22,'whitefeild','marthahalli','2022-07-15 10:03:32',4,'Drivercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-01 21:19:09','2022-11-02 10:09:48'),(11,20,'whitefeild','marthahalli','2022-11-02 23:39:10',8,'Active',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-01 22:05:51','2022-11-02 12:46:04'),(12,20,'whitefeild','marthahalli','2022-11-01 05:07:00',4,NULL,9000,'2022-05-13 10:03:32',9035,'2022-05-13 12:03:32',0,NULL,'5',NULL,'2022-11-01 23:55:51','2022-11-02 12:56:01'),(13,20,'whitefeild','marthahalli','2022-11-02 00:20:00',8,'Completed',89573,'2022-08-13 10:03:32',89590,'2022-08-13 11:33:32',55,NULL,'4','test','2022-11-02 00:21:43','2022-11-02 20:18:15'),(14,20,'whitefeild','marthahalli','2022-11-02 00:24:00',4,'Drivercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 00:25:10','2022-11-02 09:56:24'),(15,20,'whitefeild','marthahalli','2022-11-02 17:27:00',5,'Usercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 00:27:27','2022-11-02 01:36:18'),(16,20,'whitefeild','marthahalli','2022-11-09 20:26:00',16,'Drivercancelled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 20:29:40','2022-11-02 20:52:26'),(17,1,'lokhandawala','powai','2022-11-02 21:05:19',16,'Usercancelled',100,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(18,2,'whitefeild','marathalli','2022-11-02 21:05:19',16,'Usercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(19,3,'ITPL','Ecity','2022-11-02 21:05:19',16,'Completed',5260,'2022-11-02 20:02:05',5630,'2022-11-02 20:02:15',-4440,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-03 00:32:15'),(20,4,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Accept',2500,'2022-11-02 18:38:56',NULL,'2022-11-02 18:38:47',0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-03 00:40:53'),(21,5,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Completed',113567,'2022-11-02 21:05:19',113586,'2022-11-02 22:05:19',300,300,NULL,NULL,'2022-11-02 21:05:19','2022-11-03 00:16:24'),(22,6,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Completed',7895,'2022-11-02 21:05:19',7899,'2022-11-02 23:05:19',0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-03 00:06:06'),(23,7,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Reject',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(24,8,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Drivercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(25,9,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'',5321,'2022-11-02 19:50:25',NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-03 00:20:35'),(26,10,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Completed',5431,'2022-11-02 19:52:19',9035,'2022-11-02 20:01:14',-43248,NULL,'5',NULL,'2022-11-02 21:05:19','2022-11-03 00:31:14'),(27,11,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Completed',89573,'2022-11-02 21:05:19',89590,'2022-11-02 21:35:19',55,NULL,NULL,'test','2022-11-02 21:05:19','2022-11-03 00:06:17'),(28,12,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Drivercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(29,13,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Usercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(30,14,'whitefeild','marthahalli','2022-11-02 21:05:19',16,'Drivercancelled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:05:19','2022-11-02 21:05:19'),(31,1,'lokhandawala','powai','2022-11-02 21:06:59',16,'Usercancelled',100,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(32,2,'whitefeild','marathalli','2022-11-02 21:06:59',16,'Usercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(33,3,'ITPL','Ecity','2022-11-01 11:02:09',16,'Completed',111,'2022-11-01 11:02:09',140,'2022-11-01 12:02:09',290,290,'5',NULL,'2022-11-02 21:06:59','2022-11-03 00:03:33'),(34,4,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'',52114,'2022-11-02 18:50:10',NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 23:34:11'),(35,5,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Completed',113567,'2022-11-02 21:06:59',113586,'2022-11-02 21:36:59',300,300,NULL,NULL,'2022-11-02 21:06:59','2022-11-03 00:16:55'),(36,6,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Completed',7895,'2022-11-02 21:06:59',7899,'2022-11-02 22:06:59',0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-03 00:06:23'),(37,7,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Reject',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(38,8,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Drivercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(39,9,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Active',2059,'2022-11-02 20:10:43',NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-03 00:40:43'),(40,10,'whitefeild','marthahalli','2022-11-02 21:06:59',16,NULL,9000,NULL,9035,NULL,0,NULL,'5',NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(41,11,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Completed',89573,'2022-11-02 21:06:59',89590,'2022-11-02 23:06:59',55,NULL,NULL,'test','2022-11-02 21:06:59','2022-11-03 00:06:26'),(42,12,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Drivercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(43,13,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Usercancelled',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(44,14,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Drivercancelled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(45,15,'whitefeild','marthahalli','2022-11-02 21:06:59',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(46,16,'whitefeild','marthahalli','2022-11-02 21:06:59',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(47,17,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Accept',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-03 00:40:55'),(48,18,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Accept',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-03 00:40:51'),(49,19,'whitefeild','marthahalli','2022-11-02 21:06:59',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(50,20,'whitefeild','marthahalli','2022-11-02 21:06:59',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(51,21,'whitefeild','marthahalli','2022-11-02 21:06:59',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-02 21:06:59'),(52,22,'whitefeild','marthahalli','2022-11-02 21:06:59',16,'Completed',5000,'2022-11-02 20:10:07',5100,'2022-11-02 20:10:17',-1200,NULL,NULL,NULL,'2022-11-02 21:06:59','2022-11-03 00:40:17');
/*!40000 ALTER TABLE `trip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `rating` float NOT NULL DEFAULT '0',
  `history` varchar(200) DEFAULT NULL,
  `mobile_no` bigint NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'1',9972697406,'ujwalabhishek@gmail.com','ujwal abhishek','M','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\r\n','2022-10-30 10:45:00'),(2,2,'1',9982697406,'Rahul@gmail.com','Rahul','M','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(3,1,'1',9992697406,'Varun@gmail.com','Varun','M','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(4,2,'1',10002697406,'Meghana@gmail.com','Meghana','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(5,2,'1',10012697406,'Ankita@gmail.com','Ankita','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(6,3,'1',10022697406,'Shivani@gmail.com','Shivani','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(8,3,'1',10042697406,'Priya@gmail.com','Priya','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(9,2,'1',10052697406,'Suny@gmail.com','Suny','M','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(10,3,'1',10062697406,'Sonal@gmail.com','Sonalali','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(11,2,'1',10072697406,'Priyanka@gmail.com','Priyanka','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(12,4,'1',10082697406,'Akshatha@gmail.com','Akshatha','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(14,5,'1',10102697406,'Ragini@gmail.com','Ragini','F','$2a$12$PLfRIryMkL2RrGmZBMFN0uxkLwLXa8HY2tdHGJW6dtSXMzHd7UQG6\n','2022-10-30 11:10:06'),(15,1,NULL,9972697416,'ujwal@te.com','Abhishek','M','$2a$08$0c/oNGf0nzambOFr9EaEC.69Fq5Zpnl9VFFxiRJrYR6QjS6tqm/cW','2022-10-30 12:08:56'),(16,4,NULL,9972021885,'sanjay@mailinator.com','Sanjay','M','$2a$08$rmBXMBRx0V0xCa.m2BoGvO8MSptJL2xrFAbGKAhq0Em4ap9O0jpWO','2022-10-30 12:09:44'),(17,0,NULL,789456123,'anaika@gmail.com','anaika','F','$2a$08$f5biw3vrMbU4EOBJ5XZg2OEsUJkr6cn7K9.oU.nhLueNjrX.jiVue','2022-10-30 13:24:40'),(18,0,NULL,789456128,'utsav@gmail.com','utsav','M','$2a$08$24g0GJN3utrqXh1PT2m/vORzLTnNwgS.rXFcoHiXc5YcYgGCadkkm','2022-10-30 13:34:11'),(19,0,NULL,789456321,'ankit@gmail.com','ankit','M','$2a$08$zTMHGyuhojnJ1VP6wrsCxeIrmsj9TWKtsBJQKXmvvdAWsRSkxZ7iS','2022-10-30 13:36:38'),(20,5,NULL,753951852,'robert@gmail.com','robert','M','$2a$08$hGObvqVQYMtrWKmvmn/zb.HHILgmHo1W6y.mWfyfWgriTFBbQYnOW','2022-10-30 13:38:21'),(21,0,NULL,0,'akriti@gmail.com','akriti','F','$2a$08$udXBFNtexAXb7LoN2Chpo.Vta0N7dFiP0nIf/T9A2WxoZtwkixf.6','2022-10-30 13:45:12'),(22,1,NULL,9972697456,'ravi@mailinator.com','Ravi','F','$2a$08$WSSJMDoVRc3qLgbdJrQu3.vP2qP2lnQG6zCvOFXrJMwH8ZnHefh6a','2022-11-01 21:11:23');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-03  9:28:48
