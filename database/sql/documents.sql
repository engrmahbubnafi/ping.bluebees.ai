-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2022 at 01:40 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulk_image_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UserId` int DEFAULT NULL,
  `Title` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UUID` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LocalPath` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FilePath` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MimeType` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Binary` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Size` int DEFAULT NULL,
  `DocumentType` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ReferenceType` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ReferenceId` int DEFAULT NULL,
  `OtherReferenceId` int DEFAULT NULL,
  `Notes` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sequence` int NOT NULL,
  `IsCover` tinyint(1) NOT NULL,
  `IsUserDefined` tinyint(1) NOT NULL,
  `IsApproved` tinyint(1) NOT NULL,
  `ApprovedBy` int DEFAULT NULL,
  `TenantId` int DEFAULT NULL,
  `CreatedByClient` int DEFAULT NULL,
  `CreatedBy` int DEFAULT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedByClient` int DEFAULT NULL,
  `UpdatedBy` int DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
