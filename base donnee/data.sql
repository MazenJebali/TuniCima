-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 07:37 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

DROP TABLE IF EXISTS `episode`;
CREATE TABLE IF NOT EXISTS `episode` (
  `ID` int NOT NULL,
  `IND` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`IND`),
  KEY `IND` (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`ID`, `IND`, `NAME`, `DATE`) VALUES
(8, 9, 'episode 1', '2023-12-01'),
(8, 10, 'episode 2', '2023-12-09'),
(9, 11, 'episode 1', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE IF NOT EXISTS `season` (
  `ID` int NOT NULL,
  `IND` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `DATE` date NOT NULL,
  `EP_NUMBER` int NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  PRIMARY KEY (`IND`),
  KEY `IND` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`ID`, `IND`, `NAME`, `DATE`, `EP_NUMBER`, `DESCRIPTION`) VALUES
(5, 8, 'season 1', '2013-04-07', 25, 'Humankind constructs lofty walls to safeguard itse'),
(5, 9, 'season 2', '2017-04-01', 12, 'Humankind constructs lofty walls to safeguard itse'),
(5, 10, 'season 3', '2018-07-23', 22, 'Humankind constructs lofty walls to safeguard itse'),
(5, 11, 'season 4', '2020-12-07', 35, 'Humankind constructs lofty walls to safeguard itse');

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `AUTHOR` varchar(20) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  `IMG` varchar(100) NOT NULL,
  `RATING` decimal(10,2) NOT NULL,
  `DATE` date NOT NULL,
  `TYPE` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`ID`, `NAME`, `AUTHOR`, `DESCRIPTION`, `IMG`, `RATING`, `DATE`, `TYPE`) VALUES
(5, 'Attack On Titan', 'Hajime Isayama', 'Humankind constructs lofty walls to safeguard itse', '../../assets/contents/p10701949_b_v8_ah.jpg', '5.00', '2013-04-07', 'Action,drama,ho'),
(7, 'Naruto', 'Masashi Kishimoto', 'Naruto is a Japanese manga series written and illu', '../../assets/contents/hatake kakashi sweet shiny life.jpg', '5.00', '2023-12-07', 'action,comedy,a');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `season` (`IND`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `serie` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
