-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 07:36 PM
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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_history`
--

DROP TABLE IF EXISTS `access_history`;
CREATE TABLE IF NOT EXISTS `access_history` (
  `ID` int NOT NULL,
  `DATE_ACCESS` timestamp NOT NULL,
  PRIMARY KEY (`ID`,`DATE_ACCESS`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `access_history`
--

INSERT INTO `access_history` (`ID`, `DATE_ACCESS`) VALUES
(8888, '2023-12-08 19:31:11'),
(19000, '2023-12-08 19:34:46'),
(19008, '2023-12-08 19:20:48'),
(19008, '2023-12-08 19:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `access_type`
--

DROP TABLE IF EXISTS `access_type`;
CREATE TABLE IF NOT EXISTS `access_type` (
  `ID` int NOT NULL,
  `ADD_ADMIN` tinyint(1) NOT NULL,
  `MODIFY_ADMIN` tinyint(1) NOT NULL,
  `ADD_FILM` tinyint(1) NOT NULL,
  `MODIFY_FILM` tinyint(1) NOT NULL,
  `ACCESS_FILM` tinyint(1) NOT NULL,
  `ACCESS_HISTORY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `access_type`
--

INSERT INTO `access_type` (`ID`, `ADD_ADMIN`, `MODIFY_ADMIN`, `ADD_FILM`, `MODIFY_FILM`, `ACCESS_FILM`, `ACCESS_HISTORY`) VALUES
(8888, 0, 0, 0, 0, 1, 0),
(19008, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'UNKNOWN_USER',
  `PASSWORD` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LOGO` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48599 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERNAME`, `PASSWORD`, `LOGO`) VALUES
(8888, 'mezen', '$2y$10$u4oiHEncxZ2mniVYQZyN7uyWW0gvgnQvIIdwJ9dG7olBWER2XMSiO', '../../assets/logos/porsche-1851246.jpg'),
(19000, 'VISITOR', '', 'https://placehold.it/50x50'),
(19008, 'DOMINATOR', '$2y$10$y8lEXJzGtbQarEDqTOBFfuuHABPgA/KCYES8PU9Vj1O.KOTbJZL6S', '../../assets/logos/320309-DEDSEC-Watch_Dogs-dark-hacking-748x421.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_history`
--
ALTER TABLE `access_history`
  ADD CONSTRAINT `access_history_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `access_type`
--
ALTER TABLE `access_type`
  ADD CONSTRAINT `access_type_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
