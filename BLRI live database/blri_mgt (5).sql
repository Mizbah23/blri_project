-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2019 at 05:04 PM
-- Server version: 5.7.28
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blri_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adjustmentType` varchar(191) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adjustments`
--

INSERT INTO `adjustments` (`id`, `adjustmentType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adjustment Information', 'সমন্বয়', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adjustmentsmenu`
--

CREATE TABLE `adjustmentsmenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adjustmentType` varchar(191) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adjustmentsmenu`
--

INSERT INTO `adjustmentsmenu` (`id`, `adjustmentType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adjustment Information', 'সমন্বয়', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adjustment_information_lists`
--

CREATE TABLE `adjustment_information_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `adjustmentDate` date NOT NULL,
  `adjustmentType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adjustment_information_saves`
--

CREATE TABLE `adjustment_information_saves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `adjustmentDate` date NOT NULL,
  `adjustmentType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brandName` varchar(191) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandName`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'hp', 1, '2019-08-19 03:27:05', '2019-10-14 09:31:42'),
(2, 'dell', 2, '2019-08-19 05:33:18', '2019-08-19 05:45:42'),
(4, 'asus', 2, '2019-08-19 05:33:40', '2019-08-19 05:33:40'),
(5, 'docs', 1, '2019-08-31 14:32:48', '2019-08-31 14:32:48'),
(8, 'pencil', 2, '2019-09-24 13:58:22', '2019-09-24 13:58:22'),
(9, 'Cards', 2, '2019-09-24 13:58:58', '2019-09-24 14:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2019-08-17 23:20:29', '2019-08-17 23:20:29'),
(2, 'Stationary', '2019-08-19 03:26:26', '2019-09-24 13:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designationName` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designationName`, `created_at`, `updated_at`) VALUES
(1, 'মহাপরিচালক (অতিরিক্ত দায়িত্ব))', '2019-08-19 06:50:21', '2019-11-04 14:43:29'),
(2, 'কম্পিউটার অপারেটর', '2019-09-21 09:43:27', '2019-11-04 14:43:42'),
(3, 'পিএ', '2019-11-04 14:43:50', '2019-11-04 14:43:50'),
(4, 'অতিরিক্ত পরিচালক', '2019-11-04 14:43:59', '2019-11-04 14:43:59'),
(5, 'সিস্টেম এনালিস্ট', '2019-11-04 14:44:08', '2019-11-04 14:44:08'),
(6, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '2019-11-04 14:44:24', '2019-11-04 14:44:24'),
(7, 'নির্বাহী প্রকৌশলী', '2019-11-04 14:44:32', '2019-11-04 14:44:32'),
(8, 'উপ-সহকারী প্রকৌশল', '2019-11-04 14:44:41', '2019-11-04 14:44:41'),
(9, 'ষাট মুদ্রাক্ষরিক-কাম-কম্পিউটার অপারেটর', '2019-11-04 14:44:49', '2019-11-04 14:44:49'),
(10, 'ঊর্ধ্বতন বৈজ্ঞানিক কর্মকর্তা', '2019-11-04 14:44:55', '2019-11-04 14:44:55'),
(11, 'তথ্য কর্মকর্তা', '2019-11-04 14:45:03', '2019-11-04 14:45:03'),
(12, 'ফটোগ্রাফার', '2019-11-04 14:45:12', '2019-11-04 14:45:12'),
(13, 'হিসাব রক্ষণ কর্মকতা', '2019-11-04 14:45:52', '2019-11-04 14:45:52'),
(14, 'হিসাবরক্ষক', '2019-11-04 14:45:57', '2019-11-04 14:45:57'),
(15, 'লাইব্রেরিয়ান', '2019-11-04 14:46:09', '2019-11-04 14:46:25'),
(16, 'লাইব্রেরি এসিস্ট্যান্ট', '2019-11-04 14:46:38', '2019-11-04 14:46:38'),
(17, 'প্রকিউরমেন্ট অফিসার', '2019-11-04 14:46:46', '2019-11-04 14:46:46'),
(18, 'সহকারি পরিচালক', '2019-11-04 14:46:53', '2019-11-04 14:46:53'),
(19, 'উচ্চমান সহকারী', '2019-11-04 14:47:03', '2019-11-04 14:47:03'),
(20, 'নিরাপত্তা কর্মকর্তা', '2019-11-04 14:47:10', '2019-11-04 14:47:10'),
(21, 'ট্রান্সপোর্ট সুপেরভাইজার', '2019-11-04 14:47:21', '2019-11-04 14:47:21'),
(22, 'প্রধান বৈজ্ঞানিক কর্মকর্তা', '2019-11-04 14:47:32', '2019-11-04 14:47:32'),
(23, 'বৈজ্ঞানিক কর্মকর্তা', '2019-11-04 14:47:46', '2019-11-04 14:47:46'),
(24, 'মুখ্য বৈজ্ঞানিক কর্মকর্তা', '2019-11-04 14:48:18', '2019-11-04 14:48:18'),
(25, 'প্ল্যানিং সহকারী', '2019-11-04 14:49:11', '2019-11-04 14:49:11'),
(26, 'জুনিয়র ট্রেনিং সহকারী', '2019-11-04 14:49:18', '2019-11-04 14:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_lists`
--

CREATE TABLE `distribution_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distribution_saves`
--

CREATE TABLE `distribution_saves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(191) NOT NULL,
  `district` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division`, `district`, `created_at`, `updated_at`) VALUES
(1, 'ঢাকা', 'মানিকগঞ্জ', '2019-09-04 06:15:37', '2019-11-04 14:53:29'),
(2, 'রাজশাহী', 'সিরাজগঞ্জ', '2019-10-04 10:48:10', '2019-11-04 14:54:07'),
(3, 'রাজশাহী', 'পাবনা', '2019-11-04 14:50:46', '2019-11-04 14:50:46'),
(4, 'ময়মনসিংহ', 'ময়মনসিংহ', '2019-11-05 07:47:52', '2019-11-05 07:47:52'),
(5, 'ঢাকা', 'টাঙ্গাইল', '2019-11-05 08:31:14', '2019-11-05 08:31:14'),
(6, 'চট্টগ্রাম', 'কুমিল্লা', '2019-11-05 08:32:16', '2019-11-05 08:32:16'),
(7, 'খুলনা', 'যশোর', '2019-11-05 08:32:33', '2019-11-05 08:32:33'),
(8, 'রাজশাহী', 'জয়পুরহাট', '2019-11-05 08:33:29', '2019-11-05 08:33:29'),
(9, 'রাজশাহী', 'চাঁপাইনবাবগঞ্জ', '2019-11-05 08:33:48', '2019-11-05 08:33:48'),
(10, 'ঢাকা', 'ঢাকা', '2019-11-05 08:34:08', '2019-11-05 08:34:08'),
(11, 'রংপুর', 'গাইবান্ধা', '2019-11-05 08:34:33', '2019-11-05 08:34:33'),
(12, 'রংপুর', 'রংপুর', '2019-11-05 08:41:03', '2019-11-05 08:41:03'),
(13, 'বরিশাল', 'পটুয়াখালী', '2019-11-05 08:41:52', '2019-11-05 08:41:52'),
(14, 'চট্টগ্রাম', 'ব্রাহ্মণবাড়ীয়া', '2019-11-05 08:42:15', '2019-11-05 08:48:34'),
(15, 'চট্টগ্রাম', 'লক্ষীপুর', '2019-11-05 08:42:49', '2019-11-05 08:42:49'),
(16, 'খুলনা', 'ঝিনাইদহ', '2019-11-05 08:44:04', '2019-11-05 08:44:04'),
(17, 'রাজশাহী', 'বগুড়া', '2019-11-05 08:44:36', '2019-11-05 08:44:36'),
(18, 'রাজশাহী', 'নাটোর', '2019-11-05 08:45:17', '2019-11-05 08:57:55'),
(19, 'ঢাকা', 'নরসিংদী', '2019-11-05 08:45:34', '2019-11-05 08:45:34'),
(20, 'ময়মনসিংহ', 'জামালপুর', '2019-11-05 08:46:06', '2019-11-05 08:46:06'),
(21, 'ঢাকা', 'ফরিদপুর', '2019-11-05 08:47:19', '2019-11-05 08:47:19'),
(22, 'বরিশাল', 'বরিশাল', '2019-11-05 08:47:29', '2019-11-05 08:48:10'),
(23, 'ঢাকা', 'কিশোরগঞ্জ', '2019-11-05 08:50:35', '2019-11-05 08:50:35'),
(24, 'ঢাকা', 'মাদারীপুর', '2019-11-05 08:51:34', '2019-11-05 08:51:34'),
(25, 'ঢাকা', 'শরিয়তপুর', '2019-11-05 08:52:20', '2019-11-05 08:52:20'),
(26, 'রংপুর', 'নীলফামারী', '2019-11-05 08:53:41', '2019-11-05 08:53:41'),
(27, 'রংপুর', 'ঠাকুরগাঁও', '2019-11-05 08:54:04', '2019-11-05 08:58:32'),
(28, 'সিলেট', 'হবিগঞ্জ', '2019-11-05 08:54:53', '2019-11-05 08:54:53'),
(29, 'চট্টগ্রাম', 'চাঁদপুর', '2019-11-05 08:55:17', '2019-11-05 08:55:17'),
(30, 'রংপুর', 'কুড়িগ্রাম', '2019-11-05 08:56:23', '2019-11-05 08:56:23'),
(31, 'রংপুর', 'দিনাজপুর', '2019-11-05 08:59:06', '2019-11-05 08:59:06'),
(32, 'রাজশাহী', 'নওগাঁ', '2019-11-05 09:00:20', '2019-11-05 09:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisionName` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `divisionName`, `created_at`, `updated_at`) VALUES
(1, 'মহাপরিচালক', '2019-08-16 23:59:07', '2019-11-04 14:31:45'),
(2, 'সেবা ও সহায়তা', '2019-08-16 23:59:29', '2019-11-04 14:31:53'),
(3, 'প্রাণী উৎপাদন গবেষণা', '2019-08-17 00:56:23', '2019-11-04 14:32:01'),
(4, 'বায়োটেকনোলজি', '2019-11-04 14:32:07', '2019-11-04 14:32:07'),
(5, 'ছাগল ও ভেড়া উৎপাদন গবেষণা', '2019-11-04 14:32:11', '2019-11-04 14:32:11'),
(6, 'প্রাণী স্বাস্থ্য গবেষণা', '2019-11-04 14:32:14', '2019-11-04 14:32:14'),
(7, 'পোল্ট্রি উৎপাদন গবেষণা', '2019-11-04 14:32:42', '2019-11-04 14:32:42'),
(8, 'আর্থ-সামাজিক গবেষণা', '2019-11-04 14:32:54', '2019-11-04 14:32:54'),
(9, 'সিস্টেম রিসার্চ', '2019-11-04 14:33:06', '2019-11-04 14:33:06'),
(10, 'প্রশিক্ষণ পরিকল্পনা ও প্রযুক্তি পরীক্ষণ', '2019-11-04 14:33:24', '2019-11-04 14:33:24'),
(11, 'বাঘাবাড়ী আঞ্চলিক কেন্দ্র', '2019-11-04 14:33:34', '2019-11-04 14:33:34'),
(12, 'নাইক্ষ্যংছড়ি আঞ্চলিক কেন্দ্র', '2019-11-04 14:34:21', '2019-11-04 14:34:21'),
(13, 'যশোর আঞ্চলিক কেন্দ্র', '2019-11-04 14:34:32', '2019-11-04 14:34:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `EmployeeAttendanceView`
-- (See below for the actual view)
--
CREATE TABLE `EmployeeAttendanceView` (
`EmployeeID` bigint(20) unsigned
,`EmployeeName` varchar(191)
,`contactNo` varchar(191)
,`DATE` date
,`DAY` varchar(9)
,`MONTH` varchar(9)
,`YEAR` int(4)
,`ExitTime` varchar(11)
,`EntryTime` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `employeeattendence`
--

CREATE TABLE `employeeattendence` (
  `AttID` int(20) NOT NULL,
  `EmployeeID` int(20) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeattendence`
--

INSERT INTO `employeeattendence` (`AttID`, `EmployeeID`, `Date`) VALUES
(1, 1, '2019-10-26 01:30:02'),
(2, 1, '2019-10-26 09:30:02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `EmployeeInfoprojectwiseView`
-- (See below for the actual view)
--
CREATE TABLE `EmployeeInfoprojectwiseView` (
`EmployeeID` bigint(20) unsigned
,`EmployeeName` varchar(191)
,`contactNo` varchar(191)
,`address` varchar(191)
,`nidNo` varchar(191)
,`birthDate` date
,`designation_id` bigint(20) unsigned
,`designationName` varchar(191)
,`district_id` bigint(20) unsigned
,`division` varchar(191)
,`district` varchar(191)
,`SectionID` bigint(20) unsigned
,`sectionName` varchar(191)
,`joiningDate` date
,`workingPlace` varchar(191)
,`isRevenue` tinyint(1)
,`remarks` varchar(191)
,`profileImage` varchar(191)
,`projectID` bigint(20) unsigned
,`projectName` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `EmployeeInfoView`
-- (See below for the actual view)
--
CREATE TABLE `EmployeeInfoView` (
`EmployeeID` bigint(20) unsigned
,`EmployeeName` varchar(191)
,`contactNo` varchar(191)
,`address` varchar(191)
,`nidNo` varchar(191)
,`birthDate` date
,`designation_id` bigint(20) unsigned
,`designationName` varchar(191)
,`district_id` bigint(20) unsigned
,`division` varchar(191)
,`district` varchar(191)
,`SectionID` bigint(20) unsigned
,`sectionName` varchar(191)
,`joiningDate` date
,`workingPlace` varchar(191)
,`isRevenue` tinyint(1)
,`remarks` varchar(191)
,`profileImage` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfoview`
--

CREATE TABLE `employeeinfoview` (
  `EmployeeID` bigint(20) UNSIGNED DEFAULT NULL,
  `EmployeeName` varchar(191) DEFAULT NULL,
  `contactNo` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `nidNo` varchar(191) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designationName` varchar(191) DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `division` varchar(191) DEFAULT NULL,
  `district` varchar(191) DEFAULT NULL,
  `SectionID` bigint(20) UNSIGNED DEFAULT NULL,
  `sectionName` varchar(191) DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `workingPlace` varchar(191) DEFAULT NULL,
  `isRevenue` tinyint(1) DEFAULT NULL,
  `remarks` varchar(191) DEFAULT NULL,
  `profileImage` varchar(191) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_information`
--

CREATE TABLE `employee_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) NOT NULL,
  `contactNo` varchar(191) NOT NULL,
  `nidNo` varchar(191) NOT NULL,
  `joiningDate` date NOT NULL,
  `birthDate` date NOT NULL,
  `workingPlace` varchar(191) NOT NULL,
  `isRevenue` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` varchar(191) DEFAULT NULL,
  `profileImage` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_information`
--

INSERT INTO `employee_information` (`id`, `name`, `section_id`, `designation_id`, `district_id`, `address`, `contactNo`, `nidNo`, `joiningDate`, `birthDate`, `workingPlace`, `isRevenue`, `remarks`, `profileImage`, `created_at`, `updated_at`) VALUES
(1, 'ড. নাথুরাম সরকার', 1, 1, 3, 'N/A', '০১৭১১৭৩৩১১৯', '১৯৬২২৬১৭২৭২৮৯৬২১৪', '1970-01-01', '1962-05-03', 'Dhaka', 1, 'OK', 'TanimZLHmLvhXOlhHvGUA.JPG', '2019-09-04 06:17:09', '2019-11-05 09:54:34'),
(2, 'মুহাম্মদ আব্দুল মান্নান', 1, 2, 1, 'N/A', '০১৭১৮৯৫৯৫৩৭', '১৯৭০৩৩২৩০০৪১৮৪৮১৮', '2006-12-02', '1970-01-01', 'N/A', 0, 'OK', 'Md Ashiqur Rahman3n3CztO4mZ4WSQ7t3.jpg', '2019-09-21 12:29:25', '2019-11-05 09:57:48'),
(3, 'সুরাইয়া সুলতানা', 1, 3, 2, 'N/A', '০১৬৭৩৯৯৩৫০৫', '১৯৬৩২৬২৭২০৯৬১২১২৩', '1970-01-01', '1963-01-07', 'N/A', 1, 'OK', 'KarimAm1J5VQHNtHnUaVX2.jpg', '2019-09-24 13:20:09', '2019-11-05 10:01:00'),
(4, 'মোঃ আজহারুল আমিন', 2, 4, 4, 'azharulamin.info@gmail.com', '০১৫৫২৪৫৬৪১৩', '১৯৬৭২৬৯৪৮১৩৮৫২৪১২', '1970-01-01', '1970-01-01', 'N/A', 1, 'OK', NULL, '2019-11-04 10:41:14', '2019-11-05 10:19:13'),
(5, 'ড.  নাসরিন সুলতানা', 3, 22, 16, 'নাই', '০১৯১৪০৩৩৩৪৪', '১৯৭০২৬১৭২৭২৮৯৬২০২', '2015-09-02', '1970-01-01', 'নাই', 0, 'OK', NULL, '2019-11-05 09:33:35', '2019-11-05 10:25:25'),
(6, 'ড. মোছাঃ পারভীন মোস্তারী', 3, 10, 17, 'N/A', '০১৭১৬৩২৩৩২৫', '১৯৭৮২৬৯৬৪০৬৬৮১০০৪', '2010-02-03', '1978-01-03', 'N/A', 0, 'OK', NULL, '2019-11-05 10:29:10', '2019-11-05 10:29:10'),
(7, 'ড. বিপ্লব কুমার রায়', 3, 10, 3, 'N/A', '০১৯৩৫৮৩৮৮৭৪', '১৯৭৩৭৬২৩৯০৪৫১৭৫৫২', '2011-11-03', '1973-02-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:32:29', '2019-11-05 10:32:29'),
(8, 'ননী গোপাল দাস', 3, 10, 19, 'N/A', '০১৭১৭৩৫৩৯৮৬', '১৯৮০৬৮১৭৬৪২৪৫৬২১৬', '2017-06-26', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:35:09', '2019-11-05 10:35:09'),
(9, 'মোঃ ইউসুফ আলী খান', 3, 23, 3, 'N/A', '০১৭১৭৭৪৪০৭৫', '১৯৮৩৬১২৫২২১২৭১৪৩৩', '2012-09-12', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:37:46', '2019-11-05 10:37:46'),
(10, 'মোহাম্মদ খায়রুল বাশার', 3, 23, 20, 'N/A', '০১৯৩৭২৪৪২৯১', '১৯৮৪৬১২৫২২১২৬৮৭১৯', '2012-02-12', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:42:53', '2019-11-05 10:42:53'),
(11, 'নাজমুল হুদা', 3, 23, 21, 'N/A', '০১৭১২৬৪৫০০৯', '১৯৯০২৯২৪৭০৮০০০১২৬', '2013-08-05', '1990-09-02', 'N/A', 0, 'OK', NULL, '2019-11-05 10:47:39', '2019-11-05 10:47:39'),
(12, 'যোবায়দা শোভনা খানম', 3, 23, 14, 'N/A', '০১৭২১৬৩৫৩৬৯', '১৯৮৭৬১২৫২২১২৭১৯১৮', '2014-07-24', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:49:04', '2019-11-05 10:49:04'),
(13, 'রোকসানা বেগম', 3, 9, 2, 'N/A', '০১৭১৬৮৫৮৭৭৭', '১৯৬৯২৬১৭২৭২৮৯৫৬৩৭', '1989-10-19', '1967-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:51:29', '2019-11-05 10:51:29'),
(14, 'ড.এস এম জাহাঙ্গীর হোসেন', 4, 22, 5, 'smjhossainblri@yahoo.com', '০১৯২৪৪৬৫৬২২', '১৯৬৮২৬১৭২৭২৮৯৬২০১', '2015-02-09', '1968-12-02', 'N/A', 0, 'OK', NULL, '2019-11-05 10:55:30', '2019-11-05 10:55:30'),
(15, 'ড. গৌতম কুমার দেব', 4, 10, 12, 'N/A', '০১৭১৬৫২৩৪২৩', '১৯৭৮২৬১৭২৭২৮৯৬২৩৩', '2011-11-03', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:57:37', '2019-11-05 10:57:37'),
(16, 'ড.সরদার মোহাম্মদ আমানুল্লাহ', 4, 10, 22, 'N/A', '০১৯১৩৭১৫৩৩৫', '১৯৭৯২৬৯৪৮১১০১১৭৮৬', '2011-11-14', '1979-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 10:59:22', '2019-11-05 10:59:22'),
(17, 'মোছাঃ ফারহানা আফরোজ', 4, 10, 3, 'N/A', '০১৭১৭৬৯১৮৮৯', '১৯৮৪৬১২৫২২১২৭৪১৫৫', '2017-07-26', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:01:50', '2019-11-05 11:01:50'),
(18, 'মোঃ মোখলেছুর রহমান', 4, 23, 22, 'N/A', '০১৭১৭৫৬২৩৪৮', '১৯৮৫৬১২৫২২১২৬৯১৯২', '2013-03-08', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:03:19', '2019-11-05 11:03:19'),
(19, 'মোঃ আহসানুল কবির', 4, 23, 9, 'N/A', '০১৭১৭৮৫৩০৫৬', '১৯৮৮৬১২৫২২১২৭২২৮৯', '2013-08-07', '1988-06-08', 'N/A', 0, 'OK', NULL, '2019-11-05 11:04:51', '2019-11-05 11:04:51'),
(20, 'মোঃ ফয়জুল হোসাইন মিরাজ', 4, 23, 13, 'N/A', '০১৯২৬৫৩৩৬৪২', '১৯৯০৭৮১৫৭৬৭০০০০৬২', '2014-07-10', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:06:05', '2019-11-05 11:06:05'),
(21, 'ড. মোঃ আজহারুল ইসলাম তালুকদার', 5, 24, 5, 'N/A', '০১৭১২৯৯৮০৯৯', '১৯৬৩২৬১৭২৭২৮৯৬২১৩', '2015-07-22', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:08:00', '2019-11-05 11:08:00'),
(22, 'ড. মোঃ আবদুল জলিল', 5, 22, 4, 'N/A', '০১৭১১১৫৫০৬২', '১৯৬২২৬১৭২৭২৮৯৫৯১৮', '2015-02-09', '1970-01-01', 'N/A', 1, 'OK', NULL, '2019-11-05 11:09:41', '2019-11-05 11:09:41'),
(23, 'ডাঃ মোঃ নূরুজ্জামান মুন্সি', 5, 10, 21, 'N/A', '০১৭১৭২৫৫৪৪৩', '১৯৭৯২৬১৭২৭২৮৯৬২৫১', '2015-07-16', '1979-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:11:36', '2019-11-05 11:11:36'),
(24, 'ড. ছাদেক আহমেদ', 5, 10, 23, 'N/A', '০১৭১২১৮৯২১২', '১৯৮০২৬১৭২৭২৮৯৬২৫০', '2015-07-16', '1980-01-03', 'N/A', 0, 'OK', NULL, '2019-11-05 11:13:18', '2019-11-05 11:13:18'),
(25, 'ড. আলী আকবর ভূঁইয়া', 5, 10, 1, 'aab@blri.gov.bd', '০১৭২৩৪৭৮৫১৫', '১৯৭৬৮২৩৪০৬৬৩৪১', '2015-08-04', '1976-07-11', 'N/A', 0, 'OK', NULL, '2019-11-05 11:15:31', '2019-11-05 11:15:31'),
(26, 'মোঃ আবু হেমায়েত', 5, 23, 24, 'N/A', '০১৭২২১০৫৯৩১', '১৯৮৩৬১২৫২২১২৬৮৬৭১', '2013-08-05', '1983-05-12', 'N/A', 0, 'OK', NULL, '2019-11-05 11:18:12', '2019-11-05 11:18:12'),
(27, 'মোঃ রেজাউল হাই রাকিব', 5, 23, 23, 'N/A', '০১৭২৮১৬৮৮৬১', '১৯৮৮৪৮২৪৯০৭৩৩৬৯১৯', '2013-08-05', '1988-01-08', 'N/A', 0, 'OK', NULL, '2019-11-05 11:20:23', '2019-11-05 11:20:23'),
(28, 'মোঃ পনির চৌধুরী', 5, 23, 5, 'N/A', '০১৭১৭৬২৯০২১', '১৯৮৬৯৩১৪৭৭৩৫০৬২৬১', '2013-08-05', '1986-01-02', 'N/A', 0, 'OK', NULL, '2019-11-05 11:23:41', '2019-11-05 11:23:41'),
(29, 'ডা: সোনিয়া আক্তার', 5, 23, 25, 'N/A', '০১৭১৭৮৭১৯১১', '১৯৮৭২৭১৬৪২৫২২৩১৯৪', '2013-01-10', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:27:57', '2019-11-05 11:27:57'),
(30, 'কানিস ফারজানা', 5, 23, 10, 'N/A', '০১৭২২১০৯৩৪২', '১৯৯০৬১২৫২২১০০০০৭০', '2019-11-05', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:34:15', '2019-11-05 11:34:15'),
(31, 'নুরে হাছনি দিশা', 5, 23, 26, 'N/A', '০১৭২২১০৯৩৪২', '১৯৯১৭৩১৩৬২৯০০০৩৩০', '2017-01-09', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:36:21', '2019-11-05 11:36:21'),
(32, 'ডা. মো: হাবিবুর রহমান', 5, 23, 27, 'N/A', '01000000000', '00000000000000', '2017-06-08', '1900-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:38:30', '2019-11-05 11:38:30'),
(33, 'সৈয়দ খলিলুর রহমান', 5, 2, 28, 'N/A', '০১৯২০৯৩১০৭৪', '১৯৭৪২৬১৭২৭২৮৯৬২৫৫', '2006-06-12', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:40:30', '2019-11-05 11:40:30'),
(34, 'ড. মোঃ গিয়াস উদ্দিন', 6, 22, 29, 'N/A', '০১৭১১০৫৫৫৯৭', '১৯৬২২৬১৭২৭২৮৯৫৯০৭', '2015-02-09', '1962-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:47:31', '2019-11-05 11:47:31'),
(35, 'ড. মুহাম্মদ আবদুস সামাদ', 6, 10, 4, 'N/A', '০১৭১৭০৪৭৮৭৭', '১৯৭৬২৬১৭২৭২৮৯৬২৪৮', '2015-07-16', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:50:07', '2019-11-05 11:50:07'),
(36, 'ডাঃ মোঃ শাহীন আলম', 6, 10, 17, 'Shahin_vet@yahoo.com', '০১৩১২১৪৪২২৪', '১৯৮০২৬১৭২৭২৮৯৫৯৫৩', '2015-07-21', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:52:09', '2019-11-05 11:52:09'),
(37, 'ডাঃ মোঃ রেজাউল করিম', 6, 23, 30, 'N/A', '০১৭১৭৩২০৩০৮', '১৯৮৯৪৯১০৮১৯৪৪৮৭৫৮', '2012-10-07', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:54:36', '2019-11-05 11:54:36'),
(38, 'ডাঃ মোঃ হাফিজুর রহমান', 6, 23, 2, 'N/A', '০১৫৫৮৬২৬৭১৯', '১৯৮৬৮৮১৫০১৭৭৫৮৯৯৪', '2013-08-05', '1986-01-02', 'N/A', 0, 'OK', NULL, '2019-11-05 11:57:26', '2019-11-05 11:57:26'),
(39, 'ডাঃ মোঃ আবু ইউসুফ', 6, 23, 2, 'N/A', '০১৭১৭৪৪৯৮৪৫', '১৯৮২৬১২৫২২১২৬৮৮৯৩', '2013-08-05', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 11:58:49', '2019-11-05 11:58:49'),
(40, 'ডাঃ মোঃ জাকির হাসান', 6, 23, 2, 'N/A', '০১৭৩৭৮৪০৩২৮', '১৯৮৮২৭১৬৪২৫২২৩৪৯৭', '2014-07-10', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:00:12', '2019-11-05 12:00:12'),
(41, 'ডা: মো: জুলফিকার আলী', 6, 23, 12, 'zulfekarvet@gmail.com', '০১৭১১২৮৭১৪৬', '১৯৮৮২৭১৬৪২৫২২৩১৫৬', '2014-01-10', '1988-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:01:35', '2019-11-05 12:01:35'),
(42, 'ড. নাথুরাম সরকার', 7, 22, 3, 'N/A', '০১৭১১৭৩৩১১৯', '১৯৬২২৬১৭২৭২৮৯৬২১৪', '2018-01-22', '1962-05-03', 'N/A', 0, 'OK', NULL, '2019-11-05 12:03:52', '2019-11-05 12:03:52'),
(43, 'শাকিলা ফারুক', 7, 10, 23, 'N/A', '০১৭১২২০৫২২৩', '১৯৭২২৬১৭২৭২৮৯৬২৩৫', '2010-02-02', '1972-01-10', 'N/A', 0, 'OK', NULL, '2019-11-05 12:05:15', '2019-11-05 12:05:15'),
(44, 'ড. মোঃ সাজেদুল করিম সরকার', 7, 10, 26, 'N/A', '০১৭১২২২৩৬৩৫', '১৯৭৩২৬১৭২৭২০০০০৬২', '2010-08-01', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:06:39', '2019-11-05 12:06:39'),
(45, 'ড. মোঃ রাকিবুল হাসান', 7, 10, 16, 'mdrakibulhassan@gmail.com', '০১৭১২৫১১১৮৩', '১৯৮০৪৪১৮০৯৪৯৪৭১০৮', '2015-07-16', '1980-12-08', 'N/A', 0, 'OK', NULL, '2019-11-05 12:07:53', '2019-11-05 12:07:53'),
(46, 'মোহাম্মদ আব্দর রশিদ', 7, 10, 20, 'marashid31@yahoo.com', '০১৭১২২৩৪৯১৭', '১৯৭৩২৬২৭২০৭৬৩৬৮৮৫', '2015-07-16', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:09:53', '2019-11-05 12:09:53'),
(47, 'হালিমা খাতুন', 7, 10, 6, 'hkr.7519@gmail.com', '০১৭১৫৮১০৭৫০', '১৯৭৫২৬৯৭৪০৮৯০৩২৯২', '2015-07-16', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:11:20', '2019-11-05 12:11:20'),
(48, 'মোঃ ওবায়েদ আল রহমান', 7, 23, 19, 'hiraobayed@blri.gov.bd', '০১৬৭৪৩২৮৯৬৯', '১৯৮৯৬১২৫২২১২৭৩৩৬৩', '2013-08-05', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:13:10', '2019-11-05 12:13:10'),
(49, 'মোঃ মাসুদ রানা', 7, 23, 12, 'N/A', '০১৭১৭১০৫৬৫৮', '00000000000000', '2013-08-05', '1900-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:21:44', '2019-11-05 12:21:44'),
(50, 'ড. সাবিহা সুলতানা', 7, 23, 12, 'shabihablri@gmail.com', '০১৭১৭০০৮৬৭৪', '১৯৮৪৮৫২৪৯০১১৮৯৩৭৯', '2015-04-08', '1984-05-10', 'N/A', 0, 'OK', NULL, '2019-11-05 12:23:08', '2019-11-05 12:23:08'),
(51, 'মোঃ আতাউল গনি রাব্বনী', 7, 23, 11, 'N/A', '০১৭২২৩৬০৫৬৪', '১৯৮৯৩২১২৪৫৮৩২০৭৩০', '2015-04-13', '1989-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:24:27', '2019-11-05 12:24:27'),
(52, 'মো: রেদোয়ান আকন্দ সুমন', 7, 23, 18, 'redoan@blri.gov.bd', '০১৭৪৭৪৮১১১৬', '১৯৮৭৬১২৫২২১২৭০৭৮০', '2017-01-10', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:26:38', '2019-11-05 12:26:38'),
(53, 'খান মোহাম্মদ রকি', 7, 6, 10, 'N/A', '০১৮২০১৪৪৪৪৮', '১৯৮৯২৬১৭২৭২৮৬২৬৭৮', '2010-04-21', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-05 12:27:44', '2019-11-05 12:27:44'),
(54, 'ড. মোঃ এরশাদুজ্জামান', 8, 22, 11, 'N/A', '০১৭১৬৪৮৪২৩৮', '১৯৬২২৬৯০২৪৩৮৪৯৯৫২', '2015-02-09', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:32:06', '2019-11-06 08:32:06'),
(55, 'মোঃ সাইফুল ইসলাম', 8, 23, 5, 'N/A', '০১৭১৯৫৯৯৭৩৩', '১৯৮৫৬১২৫২২১২৮৬৭৫১', '1970-01-01', '1985-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:33:46', '2019-11-06 08:34:30'),
(56, 'মোছাঃ মাহফুজা খাতুন', 8, 23, 2, 'N/A', '০১৭১৬৫৭৬৪৩৭', '১৯৮৬৮৮২১১০৪০৮৫৭৩৩', '2013-08-05', '1986-09-06', 'N/A', 0, 'OK', NULL, '2019-11-06 08:36:17', '2019-11-06 08:36:17'),
(57, 'সাবিনা ইয়াসমিন', 8, 23, 4, 'sabina.bau020@gmail.com', '০১৬৭১৪৭০৫০১', '১৯৮৮৬১২৫২২১২৭৩১১০', '2014-07-24', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:38:12', '2019-11-06 08:38:12'),
(58, 'জনাব মো: আ: ছাত্তার', 8, 6, 14, 'N/A', '০১৭৪৫৪৯১১৭২', '১৯৬৪৪৬৩৫৬১৪৫২৪', '1988-11-29', '1964-06-12', 'N/A', 0, 'OK', NULL, '2019-11-06 08:40:24', '2019-11-06 08:40:24'),
(59, 'ড. মোঃ এরশাদুজ্জামান', 9, 22, 11, 'N/A', '০১৭১৬৪৮৪২৩৮', '১৯৬২২৬৯০২৪৩৮৪৯৯৫২', '2015-02-09', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:42:22', '2019-11-06 08:42:22'),
(60, 'ড. রেজিয়া খাতুন', 9, 10, 27, 'N/A', '০১৭১৫৯৮৫৭০৯', '১৯৭৩২৬১৭২৭২৮৯৫৯৩৯', '2011-06-15', '1973-01-11', 'N/A', 0, 'OK', NULL, '2019-11-06 08:43:46', '2019-11-06 08:43:46'),
(61, 'ড.  নাসরিন সুলতানা', 10, 22, 16, 'N/A', '০১৯১৪০৩৩৩৪৪', '১৯৭০২৬১৭২৭২৮৯৬২০২', '2015-02-09', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:45:30', '2019-11-06 08:45:30'),
(62, 'ড. মোঃ জিল্লুর রহমান', 10, 10, 10, 'N/A', '০১৬৭৭১৫৫৬৪১', '১৯৭৬২৬৯৪৮১৪৯৩৩৮৯০', '2011-11-03', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:46:57', '2019-11-06 08:46:57'),
(63, 'কামরুননাহার মনিরা', 10, 10, 4, 'monirablri@yahoo.com', '০১৭১৮২৩৭১৪৩', '১৯৭৫২৬১৭২৭২৮৯৫৯৩৫', '2012-04-22', '1975-09-07', 'N/A', 0, 'OK', NULL, '2019-11-06 08:48:51', '2019-11-06 08:48:51'),
(64, 'ডাঃ মোঃ আমিরুল হাসান', 10, 23, 31, 'N/A', '০১৭১২৬৯০৭৭৪', '১৯৮৩২৭২৬৪০৫১৩৯৮৮৮', '2014-07-10', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:50:09', '2019-11-06 08:50:09'),
(65, 'ডাঃ এ.এস.এম. আসহাব উদ্দীন', 10, 23, 5, 'N/A', '০১৭৮৭২৮২৮৬২', '১৯৮৭৯১১৬২৯৫৪৭৫৪২১', '2012-08-19', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:51:44', '2019-11-06 08:51:44'),
(66, 'মোঃ আবুল খায়ের', 10, 25, 6, 'N/A', '০১৭৮০৪১৮০৭০', '১৯৬৫২৬১৭২৭২৮৯৬২৬২', '1992-02-01', '1965-07-01', 'N/A', 0, 'OK', NULL, '2019-11-06 08:54:53', '2019-11-06 08:54:53'),
(67, 'মো: আব্দুল মমিন', 10, 26, 17, 'mamominblri83@gmail.com', '০১৭১১২৭৯৭৩১', '১৯৮৩১০১৯৪৮৭৯৫১৭৪৪', '2003-07-01', '1983-12-04', 'N/A', 0, 'OK', NULL, '2019-11-06 08:56:24', '2019-11-06 08:56:24'),
(68, 'মোহাম্মদ সিরাজুল ইসলাম', 11, 10, 4, 'N/A', '০১৯৬০১৯৯২৪৯', '১৯৭৬৫৬২৪৬০১১০২১৯৭', '2015-07-16', '1976-05-05', 'N/A', 0, 'OK', NULL, '2019-11-06 08:57:49', '2019-11-06 08:57:49'),
(69, 'ডাঃ মোঃ হুমায়ুন কবির', 11, 23, 30, 'N/A', '০১৭১৬৬৭৯৪৪১', '১৯৮৫৪৯১০৯৮৩৫০৭৮৬২', '2014-07-24', '1985-07-04', 'N/A', 0, 'OK', NULL, '2019-11-06 08:59:23', '2019-11-06 08:59:23'),
(70, 'মোঃ ইউসুফ আলী', 11, 23, 20, 'N/A', '০১৭১৭৩৫৪০৯২', '১৯৮৬৩৯১৫৮১১২৮২৭০৫', '2012-06-10', '1986-05-02', 'N/A', 0, 'OK', NULL, '2019-11-06 09:00:45', '2019-11-06 09:00:45'),
(71, 'উম্মে শিহা আলম', 11, 23, 17, 'shihaalam23@gmail.com', '০১৭৭২২৩১৩১৪', '১৯৯৪৩২৫৬১৮৬০৮৫', '2019-01-20', '1994-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 09:02:13', '2019-11-06 09:02:13'),
(72, 'মোঃ আশাদুল আলম', 12, 23, 4, 'N/A', '০১৭১০৪৮০৫৪১', '১৯৮৫৬১২১৩০৬৬০৮৬২৪', '1985-10-01', '1985-01-10', 'N/A', 0, 'OK', NULL, '2019-11-06 09:44:36', '2019-11-06 09:44:36'),
(73, 'ডাঃ আনোয়ার হোসেন', 12, 23, 5, 'N/A', '০১৯১১৭৩৫৪২১', '১৯৮৪৬১২৫২২১২৭২৬৫৮', '2014-07-10', '1984-05-01', 'N/A', 0, 'OK', NULL, '2019-11-06 09:45:51', '2019-11-06 09:45:51'),
(74, 'কে. এম. সাদ্দামহোসেন', 12, 23, 3, 'N/A', '০১৭৪০০৯৭৫৯৭', '১৯৯৪৭৬১৮৩৩৮০০০৩৪৯', '2019-01-20', '1994-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 09:46:53', '2019-11-06 09:46:53'),
(75, 'মোঃ শামীম হাসান', 13, 10, 32, 'hasanshamim423@gmail.com', '01758516566', '19931026365229', '2019-01-20', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 09:49:23', '2019-11-06 09:49:23'),
(76, 'মো: আহসান হাবীব', 21, 20, 7, 'N/A', '০১৭২৭২১৫৫৩৬', '১৯৭৯২৬১৭২৭২৮৯৫৮১৬', '2010-04-29', '1979-01-10', 'N/A', 0, 'OK', NULL, '2019-11-06 09:57:00', '2019-11-06 09:57:00'),
(77, 'রেজাউলকরিম', 23, 21, 10, 'N/A', '01000000000', '00000000000000', '2017-06-06', '1900-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 09:59:19', '2019-11-06 09:59:19'),
(78, 'শিরীন জাহান', 20, 19, 5, 'N/A', '০১৮৩৫০৮১৭৯১', '১৯৬৩২৬১৭২৭২৮৯৫৬২০', '1994-05-09', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:02:04', '2019-11-06 10:02:04'),
(79, 'শাহ খাজা আহছান', 20, 19, 15, 'N/A', '০১৭৩১৪১৩০১০', '১৯৬৬২৬২৭২০৮৫৯৯৯১৫', '1992-02-03', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:03:40', '2019-11-06 10:03:40'),
(80, 'মোঃ আব্দুল করিম', 20, 9, 10, 'N/A', '০১৭১২১৭০১৬১', '১৯৬২২৬১৭২৭২৮৪৪২৫৯', '2016-05-17', '1962-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:05:03', '2019-11-06 10:05:03'),
(81, 'মো: ফরিদ মিয়া', 19, 17, 5, 'N/A', '০১৭২৬৪৭৩০৭৬', '১৯৮৬৯৩১০৯৪৭২৬৯৭৩৬', '2017-01-09', '1986-07-05', 'N/A', 0, 'OK', NULL, '2019-11-06 10:07:01', '2019-11-06 10:07:01'),
(82, 'মোঃ মেজবাহ উদ্দিন', 19, 17, 14, 'N/A', '01000000000', '00000000000000', '2003-07-01', '1900-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:09:00', '2019-11-06 10:09:00'),
(83, 'রুবিনা বেগম', 18, 16, 2, 'N/A', '01000000000', '00000000000000', '2010-04-27', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:20:49', '2019-11-06 10:20:49'),
(84, 'মো: আল-মামুন', 18, 15, 13, 'N/A', '০১৯২৪৯০৭৭৯৭', '১৯৮৯৭৮১৩৮৮৯৮৮১২৬০', '2017-01-26', '1989-02-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:22:14', '2019-11-06 10:22:14'),
(85, 'রাশেদা খাতুন', 17, 6, 12, 'N/A', '01000000000', '00000000000000', '1988-12-10', '1988-10-12', 'N/A', 0, 'OK', NULL, '2019-11-06 10:26:50', '2019-11-06 10:26:50'),
(86, 'রেখা সুলতানা', 17, 14, 10, 'N/A', '০১৯৮৯৪৩৪৬৬৮', '১৯৮১২৬২৭২০২৫২৪৭২০', '2010-04-20', '1981-04-02', 'N/A', 0, 'OK', NULL, '2019-11-06 10:28:50', '2019-11-06 10:28:50'),
(87, 'মোঃ এনামুল হক খন্দকার', 17, 14, 11, 'N/A', '০১৭৩৩১০৬০৪৪', '১৯৭৭২৬১৭২৭২৮৯৫৯৭৪', '2017-05-21', '1977-11-05', 'N/A', 0, 'OK', NULL, '2019-11-06 10:31:25', '2019-11-06 10:31:25'),
(88, 'মোঃশাহআলম', 17, 13, 10, 'N/A', '০১৭১১৩৫৫২৩০', '১৯৬১২৬৯১৬৫০১৪২১৮৪', '2019-11-06', '1961-02-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:33:51', '2019-11-06 10:33:51'),
(89, 'মোঃ শাহ আলম', 24, 11, 10, 'N/A', '০১৭১১৩৫৫২৩০', '১৯৬১২৬৯১৬৫০১৪২১৮৪', '1988-08-02', '1961-02-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:37:52', '2019-11-06 10:37:52'),
(90, 'শামীম আহমেদ', 15, 10, 10, 'sahmed_blri@yahoo.com', '০১৭৩৭২৯৩০৪৯', '১৯৬১২৬৯১৬৫০১৪২১৮৪', '2010-02-03', '1975-02-10', 'N/A', 0, 'OK', NULL, '2019-11-06 10:42:53', '2019-11-06 10:42:53'),
(91, 'মোঃ আশরাফুল ইসলাম', 16, 7, 2, 'N/A', '০১৮১২০৪২১৫১', '১৯৮১১৫৯২৮২৭৭১১৭০৭', '2013-07-01', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:44:43', '2019-11-06 10:44:43'),
(92, 'মো আবদুস সামাদ', 16, 8, 6, 'N/A', '০১৮১৭৫২২৫৪৯', '১৯৬২২৬১৭২৭২৮৯৬২৪৪', '1985-06-11', '1962-10-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:47:25', '2019-11-06 10:47:25'),
(93, 'মোঃ কেরামত আলী', 16, 8, 7, 'N/A', '০১৭১৫৪৫৬৯৯৬', '১৯৬৩২৬১৭২৭২৮৯৫৯০১', '1985-06-13', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:51:22', '2019-11-06 10:51:22'),
(94, 'মোঃ শফিকুল আলম মণ্ডল', 16, 8, 8, 'N/A', '০১৭১২৪৮৭৩২৬', '১৯৭৪২৬১৭২৭২৮৯৫৯৫৭', '2003-07-01', '1974-05-05', 'N/A', 0, 'OK', NULL, '2019-11-06 10:53:10', '2019-11-06 10:53:10'),
(95, 'মো: আজিজুর রহমান', 16, 9, 9, 'azizur.rahman8892@gmail.com', '0১৭১৪৮৮৯২৭১', '১৯৬৪২৬১৭২৭২৮৯৬২৭৩', '1992-02-11', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:55:04', '2019-11-06 10:55:04'),
(96, 'মোহাম্মদ লুৎফুল হক', 14, 5, 5, 'N/A', '০১৭১১৪৪৬২৪৬', '১৯৭৩৯৩২৩৮০৯৭০৬৫৭৭', '2003-09-23', '1973-02-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:57:46', '2019-11-06 10:57:46'),
(97, 'মোহাম্মদ আব্দুল জলিল', 14, 6, 5, 'N/A', '০১৮১৮৩৯৫২১১', '১৯৭৯৯৩১২৮৬০১২৬৪৬০', '2010-04-19', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 10:59:19', '2019-11-06 10:59:19'),
(98, 'মোঃ আজহারুল আমিন', 2, 4, 4, 'N/A', '০১৫৫২৪৫৬৪১৩', '১৯৬৭২৬৯৪৮১৩৮৫২৪১২', '2017-11-16', '1970-01-01', 'N/A', 0, 'OK', NULL, '2019-11-06 11:00:57', '2019-11-06 11:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `emp_assigns`
--

CREATE TABLE `emp_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_information_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(191) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_assigns`
--

INSERT INTO `emp_assigns` (`id`, `project_id`, `employee_information_id`, `date`, `remarks`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-09-29', 'hello', 1, '2019-09-30 12:08:39', '2019-09-30 12:08:39'),
(2, 1, 3, '2019-10-04', 'abcd', 1, '2019-10-04 09:40:17', '2019-10-04 09:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_03_105645_create_setups_table', 1),
(13, '2019_08_03_124752_create_setuptypes_table', 1),
(16, '2019_08_06_221645_create_divisions_table', 2),
(17, '2019_08_17_033254_create_sections_table', 2),
(18, '2019_08_17_020137_create_categories_table', 3),
(19, '2019_08_17_024235_create_brands_table', 3),
(20, '2019_08_17_200608_create_designations_table', 4),
(21, '2019_08_20_105656_create_security_types_table', 5),
(22, '2019_08_21_101359_create_product_infos_table', 6),
(24, '2019_08_23_084228_create_repairers_table', 6),
(25, '2019_08_24_121331_create_product_receive_types_table', 7),
(26, '2019_08_24_144053_create_product_distributions_table', 8),
(27, '2019_08_25_085116_create_reportings_table', 9),
(28, '2019_08_25_090152_create_reportings_table', 10),
(29, '2019_08_25_101428_create_adjustments_table', 11),
(38, '2019_08_26_205313_create_districts_table', 11),
(49, '2019_08_21_103902_create_employee_information_table', 13),
(50, '2019_08_25_105854_create_suppliers_table', 12),
(51, '2019_08_27_145545_create_projects_table', 12),
(52, '2019_08_27_212122_create_emp_assigns_table', 12),
(53, '2019_09_01_190513_create_users_table', 12),
(94, '2019_09_04_164757_create_product_receive_lists_table', 14),
(95, '2019_09_06_191018_create_requisition_lists_table', 14),
(96, '2019_09_09_165954_create_product_receive_saves_table', 14),
(97, '2019_09_11_152928_create_requisition_saves_table', 14),
(98, '2019_09_12_120336_create_serial_infos_table', 14),
(99, '2019_09_15_140906_create_product_release_infos_table', 14),
(100, '2019_09_15_191957_create_distribution_lists_table', 14),
(101, '2019_09_19_150132_create_distribution_saves_table', 14),
(102, '2019_09_21_222628_create_adjustment_information_lists_table', 14),
(103, '2019_09_22_041911_create_adjustment_information_saves_table', 14),
(104, '2019_09_22_121215_create_product_repairs_table', 14),
(105, '2019_10_13_180243_create_repair_receives_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productreceiveview`
--

CREATE TABLE `productreceiveview` (
  `SupplierID` bigint(20) UNSIGNED DEFAULT NULL,
  `supplierName` varchar(191) DEFAULT NULL,
  `supplierType` varchar(191) DEFAULT NULL,
  `contactName` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `vatReg` varchar(191) DEFAULT NULL,
  `PurchaseID` bigint(20) UNSIGNED DEFAULT NULL,
  `PurchaseDetailID` bigint(20) UNSIGNED DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `InvoiceNo` varchar(191) DEFAULT NULL,
  `InvoiceDate` date DEFAULT NULL,
  `IsDonate` tinyint(1) DEFAULT NULL,
  `OrderNo` varchar(191) DEFAULT NULL,
  `ProductID` bigint(20) UNSIGNED DEFAULT NULL,
  `productName` varchar(191) DEFAULT NULL,
  `productCode` varchar(191) DEFAULT NULL,
  `BrandID` bigint(20) UNSIGNED DEFAULT NULL,
  `BrandName` varchar(191) DEFAULT NULL,
  `stock` bigint(20) DEFAULT NULL,
  `BatchNo` varchar(191) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Note` varchar(191) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `ProductReceiveView`
-- (See below for the actual view)
--
CREATE TABLE `ProductReceiveView` (
`SupplierID` bigint(20) unsigned
,`supplierName` varchar(191)
,`supplierType` varchar(191)
,`contactName` varchar(191)
,`address` varchar(191)
,`phone` varchar(191)
,`mobile` varchar(191)
,`email` varchar(191)
,`country` varchar(191)
,`vatReg` varchar(191)
,`PurchaseID` bigint(20) unsigned
,`PurchaseDetailID` bigint(20) unsigned
,`Purchase_Date` date
,`InvoiceNo` varchar(191)
,`InvoiceDate` date
,`IsDonate` tinyint(1)
,`OrderNo` varchar(191)
,`ProductID` bigint(20) unsigned
,`productName` varchar(191)
,`productCode` varchar(191)
,`BrandID` bigint(20) unsigned
,`BrandName` varchar(191)
,`stock` bigint(20)
,`BatchNo` varchar(191)
,`Qty` int(11)
,`Note` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `productrepair`
--

CREATE TABLE `productrepair` (
  `PRepairID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SerialNo` varchar(50) NOT NULL,
  `RepairerID` int(11) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `AssignDate` datetime NOT NULL,
  `ReceiveDate` datetime NOT NULL,
  `Status` bit(1) NOT NULL,
  `Creator` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `Modifier` varchar(50) NOT NULL,
  `ModificationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_distributions`
--

CREATE TABLE `product_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pdType` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_distributions`
--

INSERT INTO `product_distributions` (`id`, `pdType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Product Release', 'পণ্য খালাস', NULL, NULL),
(2, 'Product Distribution', 'পণ্য বিতরণ', NULL, NULL),
(3, 'Product Repair', 'পণ্য মেরামত', NULL, NULL),
(4, 'Repair Receive', 'মেরামতকৃত পণ্য প্রাপ্তি', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_infos`
--

CREATE TABLE `product_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productCode` varchar(191) NOT NULL,
  `productName` varchar(191) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_infos`
--

INSERT INTO `product_infos` (`id`, `productCode`, `productName`, `stock`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'P202', 'Corei3', 10, 2, '2019-09-05 15:09:42', '2019-10-06 15:18:45'),
(2, '110', 'light', 271, 1, '2019-09-08 05:44:41', '2019-09-22 15:22:41'),
(3, 'P103', 'Soap', 525, 1, '2019-09-08 06:09:05', '2019-09-20 13:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_receive_lists`
--

CREATE TABLE `product_receive_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `IsDonate` tinyint(1) NOT NULL DEFAULT '0',
  `orderNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `Purchase_Date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_receive_saves`
--

CREATE TABLE `product_receive_saves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `product_receive_masters_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `orderNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `receiveDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_receive_types`
--

CREATE TABLE `product_receive_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prType` varchar(191) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_receive_types`
--

INSERT INTO `product_receive_types` (`id`, `prType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Product Receive', 'পণ্য প্রাপ্তি', NULL, NULL),
(2, 'Requisition Info', 'ফরমাশ তথ্য', NULL, NULL),
(3, 'Product Serial Info', 'পণ্য সিরিয়াল তথ্য', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_release_infos`
--

CREATE TABLE `product_release_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `releaseDate` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_information_id` bigint(20) UNSIGNED NOT NULL,
  `serial_info_id` bigint(20) UNSIGNED NOT NULL,
  `receiveBy` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_repairs`
--

CREATE TABLE `product_repairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `repairer_id` bigint(20) UNSIGNED NOT NULL,
  `sendingDate` date NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectName` varchar(191) NOT NULL,
  `employee_information_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `employee_information_id`, `address`, `startDate`, `endDate`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Animal research', 1, 'Kuril,Kuratoli Dhaka', '2019-09-23', '2019-09-27', 'right', '2019-09-05 15:06:59', '2019-09-05 15:06:59'),
(2, 'System Implement', 2, 'eretytu', '1970-01-01', '1970-01-01', 'adwyrtuyk', '2019-10-29 13:42:22', '2019-10-29 13:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `repairers`
--

CREATE TABLE `repairers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repairerName` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repairers`
--

INSERT INTO `repairers` (`id`, `repairerName`, `address`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Saif', 'dhaka', '01521302440', 'saif@gmail.com', '2019-09-22 14:39:08', '2019-09-22 14:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `repair_receives`
--

CREATE TABLE `repair_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `repairer_id` bigint(20) UNSIGNED NOT NULL,
  `receiveDate` date NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportings`
--

CREATE TABLE `reportings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crType` varchar(191) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reportings`
--

INSERT INTO `reportings` (`id`, `crType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Product Receive Report', 'প্রাপ্ত পণ্যের প্রতিবেদন', NULL, NULL),
(2, 'Product Distribution Report', 'পণ্যের বিতরণ প্রতিবেদন', NULL, NULL),
(3, 'Adjustment Report', 'পণ্য সমন্বয়ের প্রতিবেদন', NULL, NULL),
(4, 'Stock Report', 'মজুতকৃত পণ্য প্রতিবেদন', NULL, NULL),
(5, 'Project Summary Report', 'প্রকল্প প্রতিবেদন', NULL, NULL),
(6, 'Attendance Report', 'উপস্থিতি প্রতিবেদন', NULL, NULL),
(7, 'Employee Report', 'কর্মকর্তার প্রতিবেদন', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_lists`
--

CREATE TABLE `requisition_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_information_id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `requisitionDate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisition_saves`
--

CREATE TABLE `requisition_saves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_information_id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `requisitionDate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sectionName` varchar(191) NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionName`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'না', 1, NULL, '2019-11-04 14:35:07'),
(2, 'না', 2, '2019-08-17 00:39:11', '2019-11-04 14:35:23'),
(3, 'না', 3, '2019-08-17 00:39:19', '2019-11-04 14:35:39'),
(4, 'না', 4, '2019-08-17 00:57:47', '2019-11-04 14:35:50'),
(5, 'না', 5, '2019-08-19 05:43:30', '2019-11-04 14:36:01'),
(6, 'না', 6, '2019-11-04 10:42:00', '2019-11-04 14:36:13'),
(7, 'না', 7, '2019-11-04 14:34:49', '2019-11-04 14:36:34'),
(8, 'না', 8, '2019-11-04 14:36:43', '2019-11-04 14:36:43'),
(9, 'না', 9, '2019-11-04 14:36:55', '2019-11-04 14:36:55'),
(10, 'না', 10, '2019-11-04 14:37:00', '2019-11-04 14:37:00'),
(11, 'না', 11, '2019-11-04 14:37:06', '2019-11-04 14:37:06'),
(12, 'না', 12, '2019-11-04 14:37:48', '2019-11-04 14:37:48'),
(13, 'না', 13, '2019-11-04 14:38:16', '2019-11-04 14:38:16'),
(14, 'আইসিটি শাখা', 2, '2019-11-06 09:51:03', '2019-11-06 09:51:03'),
(15, 'গবেষণা খামার', 2, '2019-11-06 09:53:07', '2019-11-06 09:53:07'),
(16, 'প্রকৌশলশাখা', 2, '2019-11-06 09:53:19', '2019-11-06 09:53:19'),
(17, 'হিসাব শাখা', 2, '2019-11-06 09:53:35', '2019-11-06 09:53:35'),
(18, 'লাইব্রেরি শাখা', 2, '2019-11-06 09:53:45', '2019-11-06 09:53:45'),
(19, 'প্রকিউরমেন্ট ও স্টোর শাখা', 2, '2019-11-06 09:53:57', '2019-11-06 09:53:57'),
(20, 'সাপোর্ট সার্ভিস শাখা', 2, '2019-11-06 09:54:07', '2019-11-06 09:54:07'),
(21, 'নিরাপত্তা ইউনিট', 2, '2019-11-06 09:54:30', '2019-11-06 09:54:30'),
(22, 'স্টোর শাখা', 2, '2019-11-06 09:54:41', '2019-11-06 09:54:41'),
(23, 'ট্রান্সপোর্ট ইউনিট', 2, '2019-11-06 09:54:50', '2019-11-06 09:54:50'),
(24, 'প্রকাশনা ও জনসংযোগ শাখা', 2, '2019-11-06 10:35:03', '2019-11-06 10:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `security_types`
--

CREATE TABLE `security_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SecType` varchar(191) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `security_types`
--

INSERT INTO `security_types` (`id`, `SecType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Create User', 'ব্যবহারকারী তৈরীকরণ', NULL, NULL),
(2, 'User Permission', 'ব্যবহারকারীর অনুমতি', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serial_infos`
--

CREATE TABLE `serial_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warrantyDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setuptypes`
--

CREATE TABLE `setuptypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SType` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setuptypes`
--

INSERT INTO `setuptypes` (`id`, `SType`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Division', 'ডিপার্টমেন্ট', NULL, NULL),
(2, 'district', 'জেলা', NULL, NULL),
(3, 'Section', 'শ্রেণী বিবরণী', NULL, NULL),
(4, 'Designation', 'পদবী', NULL, NULL),
(5, 'Brand', 'ব্র্যান্ড', NULL, NULL),
(6, 'Category', 'ক্যাটাগরি', NULL, NULL),
(7, 'Project', 'প্রকল্পসমূহের তথ্য নিবন্ধন', NULL, NULL),
(8, 'Employee', 'কর্মকর্তাবৃন্দের তথ্য নিবন্ধন', NULL, NULL),
(9, 'Supplier', 'সরবরাহকারীর তথ্য', NULL, NULL),
(10, 'Product', 'পণ্যের তথ্য', NULL, NULL),
(11, 'Employee Assign', 'কর্মচারী নিয়োগ বিবরণী', NULL, NULL),
(12, 'Repairer Info', 'মেরামত বিবরণী', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplierName` varchar(191) NOT NULL,
  `supplierType` varchar(191) NOT NULL,
  `contactName` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `vatReg` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplierName`, `supplierType`, `contactName`, `address`, `phone`, `mobile`, `email`, `country`, `vatReg`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Local', 'Mizbah Uddin Ahmed', 'Kuril,Kuratoli Dhaka', '1521484948', '01521484948', 'dsl@gmail.com', 'Bangladesh', '223456789', '2019-09-05 15:05:20', '2019-09-05 15:05:20'),
(2, 'Adi', 'Foreign', 'Jhoton', 'Dhaka', '1521484948', '01521302440', 'dsl@gmail.com', 'Bangladesh', '223456789', '2019-09-18 10:53:48', '2019-09-18 10:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchase`
--

CREATE TABLE `tblpurchase` (
  `PurchaseID` bigint(20) UNSIGNED NOT NULL,
  `SupplierID` bigint(20) UNSIGNED NOT NULL,
  `Job_By` bigint(20) UNSIGNED NOT NULL,
  `CompanyID` int(11) NOT NULL DEFAULT '1',
  `Purchase_Date` date NOT NULL,
  `InvoiceNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `InvoiceDate` date NOT NULL,
  `IsDonate` tinyint(1) NOT NULL DEFAULT '0',
  `OrderNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpurchase`
--

INSERT INTO `tblpurchase` (`PurchaseID`, `SupplierID`, `Job_By`, `CompanyID`, `Purchase_Date`, `InvoiceNo`, `InvoiceDate`, `IsDonate`, `OrderNo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2019-11-01', 'a120', '2019-11-01', 0, 'sjkhfjassfd', '2019-10-31 18:00:00', '2019-10-31 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchasedetails`
--

CREATE TABLE `tblpurchasedetails` (
  `PurchaseDetailID` bigint(20) UNSIGNED NOT NULL,
  `PurchaseID` bigint(20) UNSIGNED NOT NULL,
  `ProductID` bigint(20) UNSIGNED NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BatchNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpurchasedetails`
--

INSERT INTO `tblpurchasedetails` (`PurchaseDetailID`, `PurchaseID`, `ProductID`, `Quantity`, `Note`, `BatchNo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 'Checking purpose', '1', '2019-10-31 18:00:00', '2019-10-31 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_information_id` bigint(20) UNSIGNED NOT NULL,
  `userType` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_information_id`, `userType`, `email`, `password`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'dsl@gmail.com', '1', 1, '2019-09-04 06:18:14', '2019-10-02 12:30:51'),
(2, 2, 'Admin', 'mdrahmanashiqur3@gmail.com', '1', 0, '2019-09-21 12:30:07', '2019-09-24 13:03:42'),
(3, 3, 'User', 'karim@dsl.com', '1', 1, '2019-09-29 12:55:58', '2019-09-29 12:55:58');

-- --------------------------------------------------------

--
-- Structure for view `EmployeeAttendanceView`
--
DROP TABLE IF EXISTS `EmployeeAttendanceView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`blri`@`localhost` SQL SECURITY DEFINER VIEW `EmployeeAttendanceView`  AS  select distinct `ei`.`EmployeeID` AS `EmployeeID`,`ei`.`EmployeeName` AS `EmployeeName`,`ei`.`contactNo` AS `contactNo`,cast(`ea`.`Date` as date) AS `DATE`,dayname(`ea`.`Date`) AS `DAY`,monthname(`ea`.`Date`) AS `MONTH`,year(`ea`.`Date`) AS `YEAR`,time_format(max(`ea`.`Date`),'%h:%i:%s %p') AS `ExitTime`,time_format(min(`ea`.`Date`),'%h:%i:%s %p') AS `EntryTime` from (`EmployeeInfoView` `ei` join `employeeattendence` `ea` on((`ea`.`EmployeeID` = `ei`.`EmployeeID`))) group by `ei`.`EmployeeID`,`ea`.`Date` ;

-- --------------------------------------------------------

--
-- Structure for view `EmployeeInfoprojectwiseView`
--
DROP TABLE IF EXISTS `EmployeeInfoprojectwiseView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`blri`@`localhost` SQL SECURITY DEFINER VIEW `EmployeeInfoprojectwiseView`  AS  select `ei`.`id` AS `EmployeeID`,`ei`.`name` AS `EmployeeName`,`ei`.`contactNo` AS `contactNo`,`ei`.`address` AS `address`,`ei`.`nidNo` AS `nidNo`,`ei`.`birthDate` AS `birthDate`,`ei`.`designation_id` AS `designation_id`,`de`.`designationName` AS `designationName`,`ei`.`district_id` AS `district_id`,`di`.`division` AS `division`,`di`.`district` AS `district`,`ei`.`section_id` AS `SectionID`,`se`.`sectionName` AS `sectionName`,`ei`.`joiningDate` AS `joiningDate`,`ei`.`workingPlace` AS `workingPlace`,`ei`.`isRevenue` AS `isRevenue`,`ei`.`remarks` AS `remarks`,`ei`.`profileImage` AS `profileImage`,`pi`.`id` AS `projectID`,`pi`.`projectName` AS `projectName` from ((((`employee_information` `ei` join `designations` `de` on((`ei`.`designation_id` = `de`.`id`))) join `districts` `di` on((`ei`.`district_id` = `di`.`id`))) join `sections` `se` on((`ei`.`section_id` = `se`.`id`))) join `projects` `pi` on((`ei`.`id` = `pi`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `EmployeeInfoView`
--
DROP TABLE IF EXISTS `EmployeeInfoView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`blri`@`localhost` SQL SECURITY DEFINER VIEW `EmployeeInfoView`  AS  select `EI`.`id` AS `EmployeeID`,`EI`.`name` AS `EmployeeName`,`EI`.`contactNo` AS `contactNo`,`EI`.`address` AS `address`,`EI`.`nidNo` AS `nidNo`,`EI`.`birthDate` AS `birthDate`,`EI`.`designation_id` AS `designation_id`,`DE`.`designationName` AS `designationName`,`EI`.`district_id` AS `district_id`,`DI`.`division` AS `division`,`DI`.`district` AS `district`,`EI`.`section_id` AS `SectionID`,`SE`.`sectionName` AS `sectionName`,`EI`.`joiningDate` AS `joiningDate`,`EI`.`workingPlace` AS `workingPlace`,`EI`.`isRevenue` AS `isRevenue`,`EI`.`remarks` AS `remarks`,`EI`.`profileImage` AS `profileImage` from (((`employee_information` `EI` join `designations` `DE` on((`EI`.`designation_id` = `DE`.`id`))) join `districts` `DI` on((`EI`.`district_id` = `DI`.`id`))) join `sections` `SE` on((`EI`.`section_id` = `SE`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `ProductReceiveView`
--
DROP TABLE IF EXISTS `ProductReceiveView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`blri`@`localhost` SQL SECURITY DEFINER VIEW `ProductReceiveView`  AS  select `S`.`id` AS `SupplierID`,`S`.`supplierName` AS `supplierName`,`S`.`supplierType` AS `supplierType`,`S`.`contactName` AS `contactName`,`S`.`address` AS `address`,`S`.`phone` AS `phone`,`S`.`mobile` AS `mobile`,`S`.`email` AS `email`,`S`.`country` AS `country`,`S`.`vatReg` AS `vatReg`,`P`.`PurchaseID` AS `PurchaseID`,`PD`.`PurchaseDetailID` AS `PurchaseDetailID`,`P`.`Purchase_Date` AS `Purchase_Date`,`P`.`InvoiceNo` AS `InvoiceNo`,`P`.`InvoiceDate` AS `InvoiceDate`,`P`.`IsDonate` AS `IsDonate`,`P`.`OrderNo` AS `OrderNo`,`PD`.`ProductID` AS `ProductID`,`PI`.`productName` AS `productName`,`PI`.`productCode` AS `productCode`,`PI`.`brand_id` AS `BrandID`,`B`.`brandName` AS `BrandName`,`PI`.`stock` AS `stock`,`PD`.`BatchNo` AS `BatchNo`,`PD`.`Quantity` AS `Qty`,`PD`.`Note` AS `Note` from ((((`tblpurchase` `P` join `tblpurchasedetails` `PD` on((`P`.`PurchaseID` = `PD`.`PurchaseID`))) join `product_infos` `PI` on((`PD`.`ProductID` = `PI`.`id`))) join `brands` `B` on((`PI`.`brand_id` = `B`.`id`))) join `suppliers` `S` on((`P`.`SupplierID` = `S`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustmentsmenu`
--
ALTER TABLE `adjustmentsmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustment_information_lists`
--
ALTER TABLE `adjustment_information_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustment_information_saves`
--
ALTER TABLE `adjustment_information_saves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribution_lists`
--
ALTER TABLE `distribution_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeattendence`
--
ALTER TABLE `employeeattendence`
  ADD PRIMARY KEY (`AttID`);

--
-- Indexes for table `employee_information`
--
ALTER TABLE `employee_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_assigns`
--
ALTER TABLE `emp_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productrepair`
--
ALTER TABLE `productrepair`
  ADD PRIMARY KEY (`PRepairID`);

--
-- Indexes for table `product_distributions`
--
ALTER TABLE `product_distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_infos`
--
ALTER TABLE `product_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_repairs`
--
ALTER TABLE `product_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repairers`
--
ALTER TABLE `repairers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_receives`
--
ALTER TABLE `repair_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportings`
--
ALTER TABLE `reportings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_types`
--
ALTER TABLE `security_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial_infos`
--
ALTER TABLE `serial_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setuptypes`
--
ALTER TABLE `setuptypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpurchase`
--
ALTER TABLE `tblpurchase`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `tblpurchasedetails`
--
ALTER TABLE `tblpurchasedetails`
  ADD PRIMARY KEY (`PurchaseDetailID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adjustmentsmenu`
--
ALTER TABLE `adjustmentsmenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adjustment_information_lists`
--
ALTER TABLE `adjustment_information_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adjustment_information_saves`
--
ALTER TABLE `adjustment_information_saves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `distribution_lists`
--
ALTER TABLE `distribution_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employeeattendence`
--
ALTER TABLE `employeeattendence`
  MODIFY `AttID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_information`
--
ALTER TABLE `employee_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `emp_assigns`
--
ALTER TABLE `emp_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productrepair`
--
ALTER TABLE `productrepair`
  MODIFY `PRepairID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_distributions`
--
ALTER TABLE `product_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_infos`
--
ALTER TABLE `product_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_repairs`
--
ALTER TABLE `product_repairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repairers`
--
ALTER TABLE `repairers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repair_receives`
--
ALTER TABLE `repair_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportings`
--
ALTER TABLE `reportings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `security_types`
--
ALTER TABLE `security_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serial_infos`
--
ALTER TABLE `serial_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setuptypes`
--
ALTER TABLE `setuptypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpurchase`
--
ALTER TABLE `tblpurchase`
  MODIFY `PurchaseID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpurchasedetails`
--
ALTER TABLE `tblpurchasedetails`
  MODIFY `PurchaseDetailID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
