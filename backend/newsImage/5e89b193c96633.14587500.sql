-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 08:38 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samachar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` bigint(25) NOT NULL,
  `admin_fname` varchar(25) NOT NULL,
  `admin_lname` varchar(25) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `is_active`, `created_date`, `updated_date`) VALUES
(1, 'Super', 'Admin', 'superadmin', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin@gmail.com', '9843567890', 'active', '2020-04-03 13:28:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladvertisement`
--

CREATE TABLE `tbladvertisement` (
  `advertisement_id` bigint(25) NOT NULL,
  `advertisement_title` varchar(50) NOT NULL,
  `advertisement_link` varchar(255) NOT NULL,
  `advertisement_description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `category_id` bigint(25) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_descrption` longtext NOT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`category_id`, `category_name`, `category_descrption`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sports', 'It includes the sports\' news', 'active', '2020-04-03 13:47:58', '0000-00-00 00:00:00'),
(2, 'Business', 'Economy', 'active', '2020-04-03 14:46:43', '0000-00-00 00:00:00'),
(3, 'Health', 'corona', 'active', '2020-04-03 14:47:45', '0000-00-00 00:00:00'),
(4, 'National', 'Nation wide', 'active', '2020-04-04 06:27:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `comment_id` bigint(25) NOT NULL,
  `news_id` bigint(25) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `news_id` bigint(25) NOT NULL,
  `news_title` varchar(50) DEFAULT NULL,
  `category_id` bigint(25) DEFAULT NULL,
  `subcategory_id` bigint(25) DEFAULT NULL,
  `news_deails` longtext DEFAULT NULL,
  `news_url` varchar(255) DEFAULT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_featuredimage` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` enum('active','inactive') DEFAULT NULL,
  `featured_startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `featured_enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `top_news` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`news_id`, `news_title`, `category_id`, `subcategory_id`, `news_deails`, `news_url`, `news_image`, `news_featuredimage`, `created_at`, `updated_at`, `is_active`, `featured_startdate`, `featured_enddate`, `top_news`) VALUES
(6, 'Subin Test2', 4, 4, '<p>Subin Test 2 of news add</p>\r\n', 'test2', NULL, '', '2020-04-05 06:26:43', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(10, 'restore ', 4, 2, '<p>restore</p>\r\n', 'res2', NULL, '', '2020-04-05 06:32:15', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblnewstrash`
--

CREATE TABLE `tblnewstrash` (
  `trash_id` bigint(25) NOT NULL,
  `news_id` bigint(25) NOT NULL,
  `news_title` varchar(50) NOT NULL,
  `category_id` bigint(25) NOT NULL,
  `subcategory_id` bigint(25) NOT NULL,
  `news_deails` longtext NOT NULL,
  `news_url` varchar(255) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_featuredimage` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  `featured_startdate` varchar(50) NOT NULL,
  `featured_enddate` varchar(50) NOT NULL,
  `top_news` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `subcategory_id` bigint(25) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` bigint(50) DEFAULT NULL,
  `subcategory_descrption` longtext DEFAULT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_descrption`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Province 1', 4, 'News of Province 1', 'active', '2020-04-04 09:40:55', '0000-00-00 00:00:00'),
(2, 'Province 2', 4, 'News of Province 2', 'active', '2020-04-04 09:42:17', '0000-00-00 00:00:00'),
(3, 'Hospitals', 3, 'healthcare', 'active', '2020-04-04 12:52:52', '0000-00-00 00:00:00'),
(4, 'Province 3', 4, 'News of province 3', 'active', '2020-04-05 04:37:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribe`
--

CREATE TABLE `tblsubscribe` (
  `subscribe_id` bigint(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `getnotifications` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbladvertisement`
--
ALTER TABLE `tbladvertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `tblnewstrash`
--
ALTER TABLE `tblnewstrash`
  ADD PRIMARY KEY (`trash_id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladvertisement`
--
ALTER TABLE `tbladvertisement`
  MODIFY `advertisement_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `category_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `news_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblnewstrash`
--
ALTER TABLE `tblnewstrash`
  MODIFY `trash_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `subcategory_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  MODIFY `subscribe_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `tblnews` (`news_id`);

--
-- Constraints for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD CONSTRAINT `tblnews_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tblcategory` (`category_id`),
  ADD CONSTRAINT `tblnews_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `tblsubcategory` (`subcategory_id`);

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `tblsubcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tblcategory` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
