-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 02:38 PM
-- Server version: 10.1.34-MariaDB
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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `advertisement_description` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `comment` longtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `news_deails` longtext,
  `news_url` varchar(255) DEFAULT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_featuredimage` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(6, 'Subin Test2', 4, 4, '<p>Subin Test 2 of news add</p>\r\n', 'test2', '5e89985e156359.53151656.', '5e89985e159bf1.97371900.', '2020-04-05 06:26:43', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(14, 'Hi', 4, 4, '<p>hrllo everybody</p>\r\n', 'news.php', '5e8998bae18287.88765860.', '5e8998bae1d3e7.78038376.', '2020-04-05 07:51:12', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(15, '', 4, 2, '<p>.nndlksamlkasm;</p>\r\n', 'abc.pjp', NULL, '', '2020-04-05 07:52:46', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(24, 'sajdlk', 4, 1, '<p>sahkdha</p>\r\n', 'sakdjlk', '5e8993b41cce77.72408740.pdf', '5e8993b41d48f6.71691927.pdf', '2020-04-05 08:15:48', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(25, 'Coronas', 4, 1, '<p>number of victims 6</p>\r\n', 'bb.com', '5e899c252c4771.22379259.sql', '5e899c252cf7e1.38635272.doc', '2020-04-05 08:39:41', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(27, 'sa,dhkj', 4, 1, '<p>sksadnklasndlkasnlk</p>\r\n', 'sand,asn', '5e89b193c96633.14587500.sql,5e89b193c9c0d0.71585315.sql', '5e89b193ca1c94.89365197.sql', '2020-04-05 10:23:15', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(28, 'So HEllo', 4, 4, '<p>salakdl</p>\r\n', 'abc.pjp', '5e89b4c4595fa6.64173358.sql,5e89b4c459e833.14120958.sql', '5e89b4c45a4337.16711274.pdf', '2020-04-05 10:32:49', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(29, 'à¤°à¥‹à¤—à¤²à¥‡ à¤¥à¤²à¤¿à¤à¤•à¥‹ à¤ªà¤¾à¤°à¥à¤Ÿ', 4, 1, '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.sajhapost.com/2020/04/06/228425.html\" style=\"box-sizing: inherit; background-color: transparent; color: rgb(51, 51, 51); text-decoration-line: none; -webkit-tap-highlight-color: transparent; font-weight: inherit; outline: 0px; transition: color 0.3s ease 0s;\">à¤•à¤¾à¤²à¥‹à¤¬à¤œà¤¾à¤°à¥€ à¤—à¤°à¥à¤¨à¥‡à¤²à¤¾à¤ˆ à¤•à¤¸à¥à¤¤à¥‹ à¤› à¤•à¤¾à¤¨à¥‚à¤¨à¥€ à¤¦à¤£à¥à¤¡ ?</a></p>\r\n\r\n<p><strong>..</strong></p>\r\n\r\n<p><a href=\"https://www.sajhapost.com/2020/04/06/228425.html\" style=\"box-sizing: inherit; color: rgba(0, 0, 0, 0.87); text-decoration-line: none; -webkit-tap-highlight-color: transparent; font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 20px; text-align: center;\">à¤¯à¤¸à¥à¤¤à¤¾ à¤•à¤¾à¤°à¥à¤¯à¤¹à¤°à¥ à¤¸à¤®à¤¾à¤œà¤µà¤¿à¤°à¥à¤¦à¥à¤˜à¤•à¤¾ à¤•à¤¾à¤°à¥à¤¯à¤¹à¤°à¥ à¤¹à¥à¤¨à¥ à¥¤ à¤¸à¤‚à¤•à¤Ÿà¤•à¥‹ à¤¬à¥‡à¤²à¤¾à¤®à¤¾ à¤¸à¤®à¥‡à¤¤ à¤¤à¥à¤¯à¤¸à¥à¤¤à¤¾ à¤•à¤¾à¤® à¤—à¤°à¥à¤¨à¥‡ à¤µà¥à¤¯à¤•à¥à¤¤à¤¿à¤¹à¤°à¥ à¤…à¤ªà¤°à¤¾à¤§à¥€ à¤®à¤¾à¤¤à¥à¤° à¤¨à¤­à¤ˆ à¤®à¤¹à¤¾à¤ªà¤¾à¤ªà¥€ à¤ªà¤¨à¤¿ à¤¹à¥à¤¨à¥ à¥¤ à¤¤à¥à¤¯à¤¸à¥à¤¤à¤¾ à¤®à¤¾à¤¨à¤µà¤¤à¤¾à¤µà¤¿à¤°à¥‹à¤§à¥€ à¤—à¤¤à¤¿à¤µà¤¿à¤§à¤¿à¤²à¤¾à¤ˆ à¤°à¥‹à¤•à¥€ à¤œà¤¨à¤¤à¤¾à¤•à¥‹ à¤¸à¤‚à¤°à¤•à¥à¤·à¤£ à¤—à¤°à¥à¤¨ à¤¤à¥à¤¯à¤¸à¥à¤¤à¤¾ à¤—à¤¤à¤¿à¤µà¤¿à¤§à¤¸à¤à¤— à¤¸à¤®à¥à¤¬à¤¨à¥à¤§à¤¿à¤¤ à¤•à¤¾à¤¨à¥‚à¤¨à¤¹à¤°à¥à¤•à¥‹ à¤•à¤¾à¤°à¥à¤¯à¤¾à¤¨à¥à¤µà¤¯à¤¨ à¤•à¤¡à¤¾à¤ˆà¤•à¤¾ à¤¸à¤¾à¤¥ à¤¹à¥à¤¨ à¤œà¤°à¥à¤°à¥€ à¤¦à¥‡à¤–à¤¿à¤¨à¥à¤› à¥¤</a></p>\r\n', 'abc.pjp', '5e8adf3e7f8054.42397962.sql', '5e8adf3e8f1ad1.47166863.doc', '2020-04-06 07:50:22', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(30, 'à¤°à¥‹à¤—à¤²à¥‡ à¤¥à¤²à¤¿à¤à¤•à¥‹ à¤ªà¤¾à¤°à¥à¤Ÿ', 4, 1, '<p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px; text-align: justify;\">à¥¨à¥¦à¥¦à¥¬ à¤¸à¤¾à¤²à¤®à¤¾ à¤¸à¥à¤¥à¤¾à¤ªà¤¨à¤¾ à¤­à¤à¤•à¥‹ à¤¨à¥‡à¤ªà¤¾à¤² à¤•à¤®à¥à¤¯à¥à¤¨à¤¿à¤·à¥à¤Ÿ à¤ªà¤¾à¤°à¥à¤Ÿà¥€ à¥¨à¥¦à¥§à¥¯ à¤¸à¤¾à¤²à¤ªà¤›à¤¿ à¤µà¤¿à¤­à¤¿à¤¨à¥à¤¨ à¤¸à¤®à¥‚à¤¹à¤®à¤¾ à¤µà¤¿à¤­à¤¾à¤œà¤¿à¤¤ à¤¹à¥à¤¨à¥‡à¤•à¥à¤°à¤® à¤¸à¥à¤°à¥ à¤­à¤¯à¥‹ à¥¤ à¤—à¤¤ à¤¨à¤¿à¤°à¥à¤µà¤¾à¤šà¤¨ à¤…à¤—à¤¾à¤¡à¤¿ à¤²à¤¾à¤®à¥‹ à¤Ÿà¥à¤Ÿà¤«à¥à¤Ÿà¤•à¥‹ à¤¶à¥à¤°à¥ƒà¤‚à¤–à¤²à¤¾à¤²à¤¾à¤ˆ à¤•à¥à¤°à¤®à¤­à¤‚à¤— à¤—à¤°à¥à¤¦à¥ˆ à¤¦à¥à¤ˆ à¤ à¥‚à¤²à¤¾ à¤•à¤®à¥à¤¯à¥à¤¨à¤¿à¤·à¥à¤Ÿ à¤ªà¤¾à¤°à¥à¤Ÿà¥€à¤¹à¤°à¥ à¤®à¤¿à¤²à¥‡à¤° à¤¨à¥‡à¤•à¤ªà¤¾ à¤¬à¤¨à¥à¤¯à¥‹ à¤° à¤œà¤¨à¤¤à¤¾à¤²à¥‡ à¤…à¤¤à¥à¤¯à¤§à¤¿à¤• à¤®à¤¤ à¤ªà¤¨à¤¿ à¤¦à¤¿à¤ à¥¤ à¤¨à¥‡à¤•à¤ªà¤¾à¤•à¥‹ à¤¨à¥‡à¤¤à¥ƒà¤¤à¥à¤µà¤®à¤¾ à¤°à¤¹à¥‡à¤•à¥‹ à¤¸à¤°à¤•à¤¾à¤°à¤¬à¤¾à¤Ÿ à¤§à¥‡à¤°à¥ˆ à¤†à¤¶à¤¾ à¤° à¤­à¤°à¥‹à¤·à¤¾ à¤¥à¤¿à¤¯à¥‹ à¤œà¤¨à¤¤à¤¾à¤®à¤¾ à¥¤ à¤¤à¤°, à¤ªà¤Ÿà¤•&ndash;à¤ªà¤Ÿà¤•à¤•à¥‹ à¤•à¤¾à¤£à¥à¤¡à¤²à¥‡ à¤¨à¥‡à¤•à¤ªà¤¾à¤•à¥‹ à¤­à¤µà¤¿à¤·à¥à¤®à¤¾à¤¯à¤¥à¤¿ à¤¨à¥ˆ à¤ªà¥à¤°à¤¶à¥à¤¨ à¤šà¤¿à¤¨à¥à¤¹ à¤–à¤¡à¤¾ à¤—à¤°à¥‡à¤•à¥‹ à¤› à¥¤ à¤¯à¥Œà¤¨ à¤•à¤¾à¤£à¥à¤¡à¤¦à¥‡à¤–à¤¿ à¤†à¤°à¥à¤¥à¤¿à¤• à¤…à¤¨à¤¿à¤¯à¤®à¤¿à¤¤à¤¤à¤¾à¤¸à¤®à¥à¤®à¤•à¤¾ à¤•à¤¾à¤£à¥à¤¡à¥ˆà¤•à¤¾à¤£à¥à¤¡à¤•à¥‹ à¤¶à¥à¤°à¥ƒà¤‚à¤–à¤²à¤¾à¤²à¥‡ à¤¨à¥‡à¤•à¤ªà¤¾à¤²à¤¾à¤ˆ à¤¥à¤¿à¤²à¤¥à¤¿à¤²à¥‹ à¤¬à¤¨à¤¾à¤à¤•à¥‹ à¤› à¥¤ à¤…à¤¬ à¤¹à¥à¤à¤¦à¤¾à¤¹à¥à¤à¤¦à¥ˆ à¤µà¤¿à¤¶à¥à¤µà¤­à¤° à¤«à¥ˆà¤²à¤¿à¤°à¤¹à¥‡à¤•à¥‹ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤®à¤¹à¤¾à¤®à¤¾à¤°à¥€à¤•à¥‹ à¤¸à¤®à¤¯à¤®à¤¾ à¤ªà¤¨à¤¿ à¤“à¤²à¥€ à¤¨à¤¿à¤•à¤Ÿ à¤¨à¥‡à¤¤à¤¾à¤¹à¤°à¥ à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤¸à¤¾à¤®à¤—à¥à¤°à¥€ à¤–à¤°à¤¿à¤¦ à¤ªà¥à¤°à¤•à¤°à¤£à¤®à¤¾ à¤…à¤¨à¤¿à¤¯à¤®à¤¿à¤¤à¤¾ à¤—à¤°à¥‡à¤•à¥‹ à¤•à¥à¤°à¤¾ à¤¬à¤¾à¤¹à¤¿à¤° à¤†à¤¯à¥‹ à¥¤ à¤¸à¤°à¥à¤µà¤¹à¤¾à¤°à¤¾ à¤µà¤°à¥à¤—à¤•à¤¾ à¤¨à¥‡à¤¤à¤¾ à¤­à¤¨à¥à¤¨ à¤°à¥à¤šà¤¾à¤‰à¤¨à¥‡ à¤¨à¥‡à¤•à¤ªà¤¾à¤­à¤¿à¤¤à¥à¤° à¤†à¤¸à¥à¤¥à¤¾ à¤° à¤†à¤¦à¤°à¥à¤¶ à¤•à¤¿à¤¨ à¤¸à¥à¤–à¤²à¤¿à¤¤ à¤­à¤‡à¤°à¤¹à¥‡à¤•à¥‹ à¤› ? à¤¯à¤¿à¤¨à¥ˆ à¤µà¤¿à¤·à¤¯à¤®à¤¾&nbsp;</span><em style=\"box-sizing: inherit; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px; text-align: justify;\">à¤¸à¤¾à¤à¤¾à¤ªà¥‹à¤·à¥à¤Ÿ</em><span style=\"color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px; text-align: justify;\">à¤²à¥‡ à¤¨à¥‡à¤•à¤ªà¤¾à¤•à¤¾ à¤à¤•à¤œà¤¨à¤¾ à¤µà¥ˆà¤šà¤¾à¤°à¤¿à¤• à¤¨à¥‡à¤¤à¤¾&nbsp;</span><span style=\"box-sizing: inherit; font-weight: 600; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px; text-align: justify;\"><em style=\"box-sizing: inherit;\">à¤°à¤¾à¤® à¤•à¤¾à¤°à¥à¤•à¥€</em></span><span style=\"color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px; text-align: justify;\">à¤¸à¤à¤— à¤•à¥à¤°à¤¾à¤•à¤¾à¤¨à¥€ à¤—à¤°à¥‡à¤•à¥‹ à¤› à¥¤</span></p>\r\n', 'abc.pjp', 'Ram-Surendra-Karki.jpg', 'Ram-Surendra-Karki.jpg', '2020-04-06 08:00:20', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(31, ' à¤¤à¤°à¤¾à¤ˆà¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤¸à¤™à¥à¤', 4, 4, '<p style=\"box-sizing: inherit; margin: 20px 0px 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤µà¤¿à¤®à¤²à¤¬à¤¹à¤¾à¤¦à¥à¤° à¤µà¤¿à¤·à¥à¤Ÿ/ à¤¡à¥‹à¤Ÿà¥€, à¥¨à¥ª à¤šà¥ˆà¤¤ à¥¤ à¤¸à¥à¤¦à¥‚à¤°à¤ªà¤¶à¥à¤šà¤¿à¤® à¤ªà¥à¤°à¤¦à¥‡à¤¶à¤•à¤¾ à¤•à¥ˆà¤²à¤¾à¤²à¥€ à¤° à¤•à¤žà¥à¤šà¤¨à¤ªà¥à¤°à¤•à¤¾ à¤¤à¥€à¤¨ à¤œà¤¨à¤¾à¤®à¤¾ à¤•à¥‹à¤­à¤¿à¤¡&ndash;à¥§à¥¯ à¤•à¥‹ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤£ à¤¦à¥‡à¤–à¤¿à¤à¤ªà¤›à¤¿ à¤¯à¤¹à¤¾à¤à¤•à¤¾ à¤…à¤¨à¥à¤¯ à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤¤à¥à¤°à¤¾à¤¸ à¤¬à¤¢à¥à¤¨ à¤¥à¤¾à¤²à¥‡à¤•à¥‹ à¤› à¥¤</p>\r\n\r\n<div class=\"commercial-add\" style=\"box-sizing: inherit; margin-bottom: 20px; line-height: 0; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">\r\n<div class=\"col-sm-12 ads\" style=\"box-sizing: inherit;\">&nbsp;</div>\r\n</div>\r\n\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤­à¤¾à¤°à¤¤à¤¬à¤¾à¤Ÿ à¤•à¤¾à¤® à¤—à¤°à¥€ à¤«à¤°à¥à¤•à¤¿à¤à¤•à¤¾ à¤¨à¤¾à¤—à¤°à¤¿à¤•à¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤­à¤¾à¤‡à¤°à¤¸à¤•à¥‹ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤£ à¤¦à¥‡à¤–à¤¿à¤¨ à¤¥à¤¾à¤²à¥‡à¤ªà¤›à¤¿ à¤¯à¤¹à¤¾à¤à¤•à¤¾ à¤ªà¤¹à¤¾à¤¡à¥€ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤¡à¥‹à¤Ÿà¥€, à¤…à¤›à¤¾à¤®, à¤¬à¤à¤¾à¤™, à¤¬à¤¾à¤œà¥à¤°à¤¾, à¤¬à¥ˆà¤¤à¤¡à¥€, à¤¦à¤¾à¥à¤°à¥à¤šà¤²à¤¾ à¤° à¤¡à¤¡à¥‡à¤²à¥à¤§à¥à¤°à¤¾à¤•à¤¾ à¤¸à¥à¤¥à¤¾à¤¨à¥€à¤¯à¤®à¤¾ à¤¤à¥à¤°à¤¾à¤¸ à¤¬à¤¢à¥à¤¨ à¤¥à¤¾à¤²à¥‡à¤•à¥‹ à¤¹à¥‹ à¥¤</p>\r\n\r\n<div class=\"commercial-add\" style=\"box-sizing: inherit; margin-bottom: 20px; line-height: 0; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">\r\n<div class=\"col-sm-12 ads\" style=\"box-sizing: inherit;\">&nbsp;</div>\r\n</div>\r\n\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤¯à¤¹à¤¾à¤à¤•à¤¾ à¤ªà¤¹à¤¾à¤¡à¥€ à¤œà¤¿à¤²à¥à¤²à¤¾à¤¬à¤¾à¤Ÿ à¤•à¤¾à¤®à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤µà¤°à¥à¤·à¥‡à¤¨à¥€ à¤¬à¤¢à¥€à¤­à¤¨à¥à¤¦à¤¾ à¤¬à¤¢à¥€ à¤¸à¥à¤¥à¤¾à¤¨à¥€à¤¯à¤µà¤¾à¤¸à¥€ à¤­à¤¾à¤°à¤¤à¤¤à¤°à¥à¤« à¤œà¤¾à¤¨à¥‡à¤•à¥‹ à¤—à¤°à¥‡à¤•à¥‹ à¤° à¤…à¤¹à¤¿à¤²à¥‡ à¤ªà¤¨à¤¿ à¤•à¤¾à¤®à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤­à¤¾à¤°à¤¤à¤¤à¤°à¥à¤« à¤—à¤à¤•à¤¾ à¤¨à¥‡à¤ªà¤¾à¤²à¥€à¤¹à¤°à¥ à¤¸à¥€à¤®à¤¾à¤µà¤°à¥à¤¤à¥€ à¤µà¤¿à¤­à¤¿à¤¨à¥à¤¨ à¤¨à¤¾à¤•à¤¾à¤¬à¤¾à¤Ÿ à¤«à¤°à¥à¤•à¤¿à¤¨à¥‡ à¤•à¥à¤°à¤® à¤œà¤¾à¤°à¥€ à¤°à¤¾à¤–à¥‡à¤•à¤¾à¤²à¥‡ à¤¸à¥à¤¥à¤¾à¤¨à¥€à¤¯à¤µà¤¾à¤¸à¥€à¤®à¤¾ à¤¤à¥à¤°à¤¾à¤¸ à¤¬à¤¢à¥à¤¨ à¤¥à¤¾à¤²à¥‡à¤•à¥‹ à¤¦à¤¿à¤ªà¤¾à¤¯à¤² à¤ªà¤¿à¤ªà¤²à¥à¤²à¤¾à¤•à¤¾ à¤¸à¥à¤¥à¤¾à¤¨à¥€à¤¯à¤µà¤¾à¤¸à¥€ à¤•à¤¿à¤°à¤£ à¤­à¤£à¥à¤¡à¤¾à¤°à¥€à¤²à¥‡ à¤¬à¤¤à¤¾à¤ à¥¤ à¤‰à¤¨à¤²à¥‡ à¤­à¤¨à¥‡, &lsquo;à¤­à¤¾à¤°à¤¤à¤¬à¤¾à¤Ÿ à¤†à¤à¤•à¤¾à¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤¦à¥‡à¤–à¤¿à¤¨ à¤¥à¤¾à¤²à¥à¤¯à¥‹, à¤¹à¤¾à¤®à¥à¤°à¥‹ à¤—à¤¾à¤‰à¤à¤•à¤¾ à¤ªà¤¨à¤¿ à¤§à¥‡à¤°à¥ˆ à¤œà¤¨à¤¾ à¤­à¤¾à¤°à¤¤à¤¬à¤¾à¤Ÿ à¤†à¤à¤•à¤¾ à¤›à¤¨à¥, à¤—à¤¾à¤‰à¤à¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤†à¤à¤•à¥‹ à¤› à¤•à¥€ à¤­à¤¨à¥à¤¨à¥‡ à¤šà¤¿à¤¨à¥à¤¤à¤¾ à¤²à¤¾à¤—à¥à¤¦à¥ˆ à¤› à¥¤&rsquo;</p>\r\n\r\n<p style=\"box-sizing: inherit; margin: 20px 0px 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤¸à¥à¤¦à¥‚à¤°à¤ªà¤¶à¥à¤šà¤¿à¤® à¤ªà¥à¤°à¤¦à¥‡à¤¶à¤®à¤¾ à¤¶à¤¨à¤¿à¤¬à¤¾à¤° à¤¦à¥‡à¤–à¤¿à¤à¤•à¤¾ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤¿à¤¤à¤®à¤§à¥à¤¯à¥‡ à¤¦à¥à¤ˆ à¤•à¥ˆà¤²à¤¾à¤²à¥€ à¤° à¤à¤• à¤•à¤žà¥à¤šà¤¨à¤ªà¥à¤° à¤œà¤¿à¤²à¥à¤²à¤¾à¤•à¤¾ à¤°à¤¹à¥‡à¤•à¥‹ à¤¸à¥à¤¦à¥‚à¤°à¤ªà¤¶à¥à¤šà¤¿à¤® à¤•à¥à¤·à¥‡à¤¤à¥à¤°à¥€à¤¯ à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤¸à¥‡à¤µà¤¾ à¤¨à¤¿à¤°à¥à¤¦à¥‡à¤¶à¤¨à¤¾à¤²à¤¯ à¤¦à¤¿à¤ªà¤¾à¤¯à¤² à¤°à¤¾à¤œà¤ªà¥à¤°à¤²à¥‡ à¤œà¤¨à¤¾à¤à¤•à¥‹ à¤› à¥¤ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤¿à¤¤à¤®à¤§à¥à¤¯à¥‡ à¤¦à¥à¤ˆà¤œà¤¨à¤¾ à¤­à¤¾à¤°à¤¤à¤¬à¤¾à¤Ÿ à¤°à¥‹à¤œà¤—à¤¾à¤°à¥€ à¤—à¤°à¥‡à¤° à¤«à¤°à¥à¤•à¤¿à¤•à¤¾ à¤¯à¥à¤µà¤¾ à¤­à¤à¤•à¤¾à¤²à¥‡ à¤‰à¤¨à¥€à¤¹à¤°à¥à¤•à¥‹ à¤¸à¤¾à¤¥à¤®à¤¾ à¤†à¤à¤•à¤¾ à¤…à¤¨à¥à¤¯ à¤¨à¤¾à¤—à¤°à¤¿à¤•à¤®à¤¾ à¤ªà¤¨à¤¿ à¤•à¥‹à¤°à¥‹à¤¨à¤¾à¤•à¥‹ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤£ à¤­à¤à¤•à¥‹ à¤¹à¥à¤¨à¤¸à¤•à¥à¤¨à¥‡ à¤†à¤¶à¤™à¥à¤•à¤¾à¤®à¤¾ à¤¡à¥‹à¤Ÿà¥€à¤•à¤¾ à¤—à¤¾à¤‰à¤à¤®à¤¾ à¤¤à¥à¤°à¤¾à¤¸ à¤«à¥ˆà¤²à¤¿à¤¨à¥‡ à¤…à¤µà¤¸à¥à¤¥à¤¾ à¤¸à¤¿à¤°à¥à¤œà¤¨à¤¾ à¤­à¤à¤•à¥‹ à¤¬à¥‹à¤—à¤Ÿà¤¾à¤¨ à¤«à¥à¤¡à¥à¤¸à¤¿à¤² à¤—à¤¾à¤‰à¤à¤ªà¤¾à¤²à¤¿à¤•à¤¾à¤•à¤¾ à¤…à¤§à¥à¤¯à¤•à¥à¤· à¤•à¤®à¤²à¤¬à¤¹à¤¾à¤¦à¥à¤° à¤—à¤¡à¥à¤¸à¤¿à¤²à¤¾à¤²à¥‡ à¤¬à¤¤à¤¾à¤ à¥¤&nbsp; à¤‰à¤¨à¤²à¥‡ à¤­à¤¨à¥‡, &lsquo;à¤¹à¥à¤²à¤•à¤¾ à¤¹à¥à¤² à¤®à¤¾à¤¨à¥à¤›à¥‡ à¤­à¤¾à¤°à¤¤à¤¬à¤¾à¤Ÿ à¤†à¤à¤•à¤¾ à¤›à¤¨à¥, à¤•à¤¸à¥ˆà¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤¦à¥‡à¤–à¤¿à¤¨ à¤¥à¤¾à¤²à¥‡à¤•à¥‹ à¤›, à¤¤à¥à¤¯à¤¹à¥€ à¤•à¤¾à¤°à¤£à¤²à¥‡ à¤ªà¤¨à¤¿ à¤…à¤¨à¥à¤¯ à¤¨à¤¾à¤—à¤°à¤¿à¤•à¤®à¤¾ à¤šà¤¿à¤¨à¥à¤¤à¤¾ à¤¬à¤¢à¥à¤¨ à¤¥à¤¾à¤²à¥‡à¤•à¥‹ à¤¹à¥‹ à¥¤&rsquo;</p>\r\n\r\n<p style=\"box-sizing: inherit; margin: 20px 0px 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤£à¤•à¥‹ à¤ªà¥à¤·à¥à¤Ÿà¤¿ à¤­à¤à¤•à¤¾ à¤•à¥ˆà¤²à¤¾à¤²à¥€à¤•à¤¾ à¥¨à¥§ à¤µà¤°à¥à¤·à¥€à¤¯ à¤¯à¥à¤µà¤¾ à¤šà¥ˆà¤¤ à¥§à¥§ à¤—à¤¤à¥‡ à¤²à¤•à¤¡à¤¾à¤‰à¤¨à¤ªà¤›à¤¿ à¤—à¥Œà¤°à¥€à¤«à¤£à¥à¤Ÿà¤¾à¤®à¤¾ à¤¥à¥à¤¨à¤¿à¤à¤•à¤¾ à¥¯à¥¯à¥¯ à¤®à¤§à¥à¤¯à¥‡à¤•à¤¾ à¤à¤• à¤­à¤à¤•à¥‹ à¤–à¥à¤²à¥à¤¨à¤®à¤¾ à¤†à¤à¤•à¥‹ à¤¸à¥à¤¦à¥‚à¤°à¤ªà¤¶à¥à¤šà¤¿à¤® à¤ªà¥à¤°à¤¦à¥‡à¤¶ à¤ªà¥à¤°à¤¹à¤°à¥€ à¤•à¤¾à¤°à¥à¤¯à¤¾à¤²à¤¯ à¤¦à¤¿à¤ªà¤¾à¤¯à¤²à¤²à¥‡ à¤œà¤¨à¤¾à¤à¤•à¥‹ à¤› à¥¤ à¤‰à¤¨à¥€à¤¹à¤°à¥à¤¸à¤à¤—à¥ˆ à¤¡à¥‹à¤Ÿà¥€ à¤†à¤à¤•à¤¾ à¤•à¥‡à¤¹à¥€ à¤µà¥à¤¯à¤•à¥à¤¤à¤¿à¤²à¤¾à¤ˆ à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤¸à¥à¤¥à¤¾à¤ªà¤¨à¤¾ à¤—à¤°à¤¿à¤à¤•à¤¾ à¤•à¥à¤µà¤¾à¤°à¥‡à¤¨à¥à¤Ÿà¤¾à¤‡à¤¨à¤®à¤¾ à¤°à¤¾à¤–à¤¿à¤à¤•à¥‹ à¤­à¤ à¤ªà¤¨à¤¿ à¤¸à¤¬à¥ˆ à¤¨à¤¾à¤—à¤°à¤¿à¤• à¤•à¥à¤µà¤¾à¤°à¥‡à¤¨à¥à¤Ÿà¤¾à¤‡à¤¨à¤®à¤¾ à¤¨à¤­à¤à¤•à¤¾ à¤•à¤¾à¤°à¤£ à¤ªà¤¨à¤¿ à¤¸à¤®à¤¸à¥à¤¯à¤¾ à¤¹à¥à¤¨à¤¸à¤•à¥à¤¨à¥‡ à¤­à¤¨à¥à¤¦à¥ˆ à¤¯à¤¹à¤¾à¤à¤•à¤¾ à¤ªà¤¹à¤¾à¤¡à¥€ à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤¤à¥à¤°à¤¾à¤¸ à¤¬à¤¢à¥à¤¨ à¤¥à¤¾à¤²à¥‡à¤•à¥‹ à¤¸à¥à¤¥à¤¾à¤¨à¥€à¤¯à¤µà¤¾à¤¸à¥€ à¤¬à¤¤à¤¾à¤‰à¤à¤›à¤¨à¥ à¥¤ à¤¡à¥‹à¤Ÿà¥€à¤®à¤¾ à¤®à¤¾à¤¤à¥à¤°à¥ˆ à¤šà¥ˆà¤¤ à¥§à¥§ à¤—à¤¤à¥‡ à¤¯à¤¤à¤¾ à¤­à¤¾à¤°à¤¤à¤¬à¤¾à¤Ÿ à¤†à¤à¤•à¤¾ à¥ªà¥©à¥ª à¤œà¤¨à¤¾ à¤•à¥à¤µà¤¾à¤°à¥‡à¤¨à¥à¤Ÿà¤¾à¤‡à¤¨à¤®à¤¾ à¤›à¤¨à¥ à¥¤ à¤²à¤•à¤¡à¤¾à¤‰à¤¨à¤­à¤¨à¥à¤¦à¤¾ à¤…à¤—à¤¾à¤¡à¤¿ à¤†à¤à¤•à¤¾ à¤¸à¤¯à¥Œà¤ à¤¯à¥à¤µà¤¾ à¤—à¤¾à¤‰à¤à¤—à¤¾à¤‰à¤ à¤ªà¤¸à¤¿à¤¸à¤•à¥‡à¤•à¤¾ à¤›à¤¨à¥ à¥¤</p>\r\n\r\n<p style=\"box-sizing: inherit; margin: 20px 0px 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤¡à¥‹à¤Ÿà¥€à¤•à¤¾ à¤ªà¥à¤°à¤®à¥à¤– à¤œà¤¿à¤²à¥à¤²à¤¾ à¤…à¤§à¤¿à¤•à¤¾à¤°à¥€ à¤Ÿà¥‡à¤•à¤¨à¤¾à¤°à¤¾à¤¯à¤£ à¤ªà¥Œà¤¡à¥‡à¤²à¤²à¥‡ à¤²à¤•à¤¡à¤¾à¤‰à¤¨à¤­à¤¨à¥à¤¦à¤¾ à¤ªà¤¹à¤¿à¤²à¥‡ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤ªà¥à¤°à¤µà¥‡à¤¶ à¤—à¤°à¥‡à¤•à¤¾ à¤¨à¤¾à¤—à¤°à¤¿à¤•à¤•à¥‹ à¤–à¥‹à¤œà¥€ à¤•à¤¾à¤°à¥à¤¯ à¤—à¤°à¥€ à¤•à¥à¤µà¤¾à¤°à¥‡à¤¨à¥à¤Ÿà¤¾à¤‡à¤¨à¤®à¤¾ à¤°à¤¾à¤–à¥à¤¨à¥‡ à¤¤à¤¯à¤¾à¤°à¥€ à¤­à¤‡à¤°à¤¹à¥‡à¤•à¥‹ à¤¬à¤¤à¤¾à¤ à¥¤ à¤‰à¤¨à¤²à¥‡ à¤­à¤¨à¥‡, &lsquo;à¤²à¤•à¤¡à¤¾à¤‰à¤¨à¤­à¤¨à¥à¤¦à¤¾ à¤ªà¤¹à¤¿à¤²à¥‡ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤ªà¥à¤°à¤µà¥‡à¤¶ à¤—à¤°à¥‡à¤•à¤¾à¤•à¥‹ à¤–à¥‹à¤œà¥€à¤•à¤¾à¤°à¥à¤¯ à¤¶à¥à¤°à¥ à¤—à¤°à¥‡à¤•à¤¾ à¤›à¥Œà¤, à¤¸à¤¬à¥ˆà¤²à¤¾à¤ˆ à¤…à¤¨à¤¿à¤µà¤¾à¤°à¥à¤¯ à¤•à¥à¤µà¤¾à¤°à¥‡à¤¨à¥à¤Ÿà¤¾à¤‡à¤¨à¤®à¤¾ à¤°à¤¾à¤–à¥à¤¨à¥‡ à¤›à¥Œà¤ à¥¤&rsquo; à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤­à¤¾à¤‡à¤°à¤¸ (à¤•à¥‹à¤­à¤¿à¤¡&ndash;à¥§à¥¯) à¤•à¥‹ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤£ à¤«à¥ˆà¤²à¤¿à¤¨ à¤¨à¤¦à¤¿à¤¨ à¤¤à¤¥à¤¾ à¤°à¥‹à¤•à¤¥à¤¾à¤®à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¸à¤®à¥à¤ªà¥‚à¤°à¥à¤£ à¤¤à¤¯à¤¾à¤°à¥€ à¤ªà¥‚à¤°à¤¾ à¤—à¤°à¤¿à¤¸à¤•à¥‡à¤•à¤¾à¤²à¥‡ à¤•à¥‹à¤¹à¥€ à¤•à¤¸à¥ˆà¤²à¥‡ à¤¡à¤°à¤¾à¤‰à¤¨à¥à¤ªà¤°à¥à¤¨à¥‡ à¤…à¤µà¤¸à¥à¤¥à¤¾ à¤¨à¤°à¤¹à¥‡à¤•à¥‹ à¤ªà¥à¤°à¤œà¤¿à¤… à¤ªà¥Œà¤¡à¥‡à¤²à¤²à¥‡ à¤œà¤¾à¤¨à¤•à¤¾à¤°à¥€ à¤¦à¤¿à¤ à¥¤</p>\r\n\r\n<p style=\"box-sizing: inherit; margin: 20px 0px 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤…à¤¹à¤¿à¤²à¥‡à¤¸à¤®à¥à¤® à¤•à¥‹à¤°à¥‹à¤¨à¤¾à¤•à¥‹ à¤¶à¤™à¥à¤•à¤¾à¤¸à¥à¤ªà¤¦ à¤¬à¤¿à¤°à¤¾à¤®à¥€ à¤­à¥‡à¤Ÿà¤¿à¤à¤•à¤¾ à¤›à¥ˆà¤¨à¤¨à¥ à¥¤ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤² à¤¡à¥‹à¤Ÿà¥€à¤•à¤¾ à¤…à¤¨à¥à¤¸à¤¾à¤° à¤¹à¤¾à¤²à¤¸à¤®à¥à¤® à¤¤à¥€à¤¨à¤•à¥‹ à¤¸à¥à¤µà¤¾à¤¬ à¤ªà¤°à¥€à¤•à¥à¤·à¤£ à¤—à¤°à¤¿à¤à¤•à¥‹ à¤­à¤ à¤ªà¤¨à¤¿ à¤¸à¤¬à¥ˆà¤•à¥‹ à¤¨à¤¤à¤¿à¤œà¤¾ &lsquo;à¤¨à¥‡à¤—à¥‡à¤Ÿà¤¿à¤­&rsquo; à¤†à¤à¤•à¥‹ à¤› à¥¤ à¤•à¥ˆà¤²à¤¾à¤²à¥€ à¤° à¤•à¤žà¥à¤šà¤¨à¤ªà¥à¤°à¤®à¤¾ à¤šà¤¾à¤°à¤œà¤¨à¤¾ à¤¸à¤™à¥à¤•à¥à¤°à¤®à¤¿à¤¤à¤•à¥‹ à¤ªà¥à¤·à¥à¤Ÿà¤¿ à¤­à¤à¤ªà¤›à¤¿ à¤¸à¤¤à¤°à¥à¤•à¤¤à¤¾ à¤¬à¤¢à¤¾à¤‰à¤¨à¥‡ à¤ªà¥à¤°à¤¯à¤¤à¥à¤¨ à¤¸à¤°à¥‹à¤•à¤¾à¤°à¤µà¤¾à¤²à¤¾à¤²à¥‡ à¤—à¤°à¤¿à¤°à¤¹à¥‡à¤•à¤¾ à¤›à¤¨à¥ à¥¤</p>\r\n\r\n<p style=\"box-sizing: inherit; margin: 20px 0px 0px; padding: 0px; color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;\">à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤­à¤¾à¤‡à¤°à¤¸à¤•à¥‹ à¤¸à¤®à¥à¤­à¤¾à¤µà¤¿à¤¤ à¤œà¥‹à¤–à¤¿à¤®à¤²à¤¾à¤ˆ à¤®à¤§à¥à¤¯à¤¨à¤œà¤° à¤—à¤°à¥à¤¦à¥ˆ à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤†à¤‡à¤¸à¥‹à¤²à¥‡à¤¸à¤¨ à¤•à¤•à¥à¤· à¤¬à¤¢à¤¾à¤‰à¤¨ à¤¥à¤¾à¤²à¤¿à¤à¤•à¥‹ à¤› à¥¤ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤®à¤¾ à¤…à¤¹à¤¿à¤²à¥‡ à¥§à¥¦ à¤µà¤Ÿà¤¾ à¤†à¤‡à¤¸à¥‹à¤²à¥‡à¤¸à¤¨ à¤•à¤•à¥à¤· à¤¬à¤¨à¤¾à¤‡à¤à¤•à¥‹ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤•à¤¾à¤°à¥à¤¯à¤¾à¤²à¤¯à¤•à¤¾ à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤…à¤§à¤¿à¤•à¥ƒà¤¤ à¤°à¤®à¥‡à¤¶ à¤®à¤²à¤¾à¤¸à¥€à¤²à¥‡ à¤¬à¤¤à¤¾à¤ à¥¤ à¤‰à¤¨à¤²à¥‡ à¤­à¤¨à¥‡,&rsquo;à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤¨à¤¿à¤¯à¤¨à¥à¤¤à¥à¤°à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¹à¤¾à¤®à¥€ à¤¨à¤¿à¤•à¥ˆ à¤¸à¤œà¤— à¤­à¤à¤•à¤¾ à¤›à¥Œà¤, à¤¸à¥‹à¤¹à¥€à¤…à¤¨à¥à¤°à¥à¤ª à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤®à¤¾ à¤•à¤•à¥à¤·à¤•à¥‹ à¤¸à¤™à¥à¤–à¥à¤¯à¤¾à¤¸à¤®à¥‡à¤¤ à¤¥à¤ª à¤—à¤°à¥‡à¤•à¤¾ à¤›à¥Œà¤ à¥¤&rsquo; à¤œà¤¿à¤²à¥à¤²à¤¾à¤®à¤¾ à¤°à¤¹à¥‡à¤•à¤¾ à¤¨à¤¿à¤œà¥€ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤®à¤¾ à¤ªà¤¨à¤¿ à¤…à¤µà¤¸à¥à¤¥à¤¾à¤…à¤¨à¥à¤¸à¤¾à¤° à¤†à¤‡à¤¸à¥‹à¤²à¥‡à¤¸à¤¨ à¤•à¤•à¥à¤· à¤¬à¤¢à¤¾à¤‰à¤¨à¥‡ à¤¤à¤¯à¤¾à¤°à¥€ à¤—à¤°à¥à¤¨ à¤¨à¤¿à¤°à¥à¤¦à¥‡à¤¶à¤¨ à¤—à¤°à¤¿à¤à¤•à¥‹ à¤ªà¥à¤°à¤®à¥à¤– à¤œà¤¿à¤²à¥à¤²à¤¾ à¤…à¤§à¤¿à¤•à¤¾à¤°à¥€ à¤ªà¥Œà¤¡à¥‡à¤²à¤²à¥‡ à¤œà¤¾à¤¨à¤•à¤¾à¤°à¥€ à¤¦à¤¿à¤ à¥¤ à¤°à¤¾à¤¸à¤¸</p>\r\n', 'abc.pjp', '5e8ae29fda6411.51015188.', 'covid-19-onnlibmjojgnkn3ed1v9ji6lqyslrkov9nqlcpvik8.jpg', '2020-04-06 08:04:47', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(32, 'Shreedhar le hanera Subin Thala', 3, 3, '<p>Subin lai kutera. Subin aile Daro Ghaite Bhako xa</p>\r\n\r\n<p>Subin lai aile Bir Aspatal ma Bharna gariyeko xa</p>\r\n\r\n<p>Subin lai kut Shreedhar ko chai jay jay lar xa</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1234.jkl', 'IMG_0195.JPG', 'IMG_0195.JPG', '2020-04-06 08:07:20', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(33, 'à¥¨à¥¬ à¤œà¤¨à¤¾ à¤¨à¤°à¥à¤¸ à¤° à¤¤à¥€à¤¨ à¤šà¤¿', 4, 5, '<p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 18px;\">à¤à¤œà¥‡à¤¨à¥à¤¸à¥€, à¥¨à¥ª à¤šà¥ˆà¤¤ à¥¤ à¤­à¤¾à¤°à¤¤à¤•à¥‹ à¤®à¥à¤®à¥à¤¬à¤ˆà¤¸à¥à¤¥à¤¿à¤¤ à¤µà¤•à¤¹à¤¾à¤°à¥à¤Ÿ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤•à¤¾ à¥¨à¥¬ à¤œà¤¨à¤¾ à¤¨à¤°à¥à¤¸ à¤° à¤¤à¥€à¤¨ à¤œà¤¨à¤¾ à¤šà¤¿à¤•à¤¿à¤¤à¥à¤¸à¤•à¤®à¤¾ à¤•à¥‹à¤­à¤¿à¤¡-à¥§à¥¯ à¤ªà¥‹à¤œà¥‡à¤Ÿà¤¿à¤­ à¤­à¥‡à¤Ÿà¤¿à¤à¤ªà¤›à¤¿ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤² à¤¬à¤¨à¥à¤¦ à¤—à¤°à¤¿à¤à¤•à¥‹ à¤› à¥¤ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤²à¤¾à¤ˆ à¤•à¥à¤µà¤¾à¤°à¥‡à¤¨à¥à¤Ÿà¤¾à¤‡à¤¨ à¤•à¥à¤·à¥‡à¤¤à¥à¤° à¤˜à¥‹à¤·à¤£à¤¾ à¤—à¤°à¥à¤¦à¥ˆ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤¬à¤¾à¤Ÿ à¤•à¤¸à¥ˆà¤²à¤¾à¤ˆ à¤ªà¤¨à¤¿ à¤¬à¤¾à¤¹à¤¿à¤° à¤œà¤¾à¤¨ à¤¦à¤¿à¤‡à¤à¤•à¥‹ à¤›à¥ˆà¤¨ à¤­à¤¨à¥‡ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤² à¤ªà¥à¤°à¤µà¥‡à¤¶à¤®à¤¾ à¤°à¥‹à¤• à¤²à¤—à¤¾à¤‡à¤à¤•à¥‹ à¤› à¥¤ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤®à¤¾ à¤°à¤¹à¥‡à¤•à¤¾ à¤¸à¤¬à¥ˆà¤•à¥‹ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤­à¤¾à¤‡à¤°à¤¸à¤•à¥‹ à¤ªà¤°à¥€à¤•à¥à¤·à¤£ à¤—à¤°à¤¿à¤¨à¥‡ à¤¬à¤¤à¤¾à¤‡à¤à¤•à¥‹ à¤› à¥¤ à¤…à¤¹à¤¿à¤²à¥‡ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤®à¤¾ à¤°à¤¹à¥‡à¤•à¤¾ à¥¨à¥­à¥¦ à¤œà¤¨à¤¾ à¤­à¤¨à¥à¤¦à¤¾ à¤§à¥‡à¤°à¥ˆ à¤µà¤¿à¤°à¤¾à¤®à¥€ à¤° à¤¨à¤°à¥à¤¸à¤¹à¤°à¥à¤•à¥‹ à¤ªà¤°à¥€à¤•à¥à¤·à¤£ à¤šà¤²à¤¿à¤°à¤¹à¥‡à¤•à¥‹ à¤¬à¤¤à¤¾à¤‡à¤à¤•à¥‹ à¤› à¥¤ à¤…à¤¸à¥à¤ªà¤¤à¤¾à¤²à¤®à¤¾ à¤°à¤¹à¥‡à¤•à¤¾à¤¹à¤°à¥à¤•à¥‹ à¤¦à¥à¤ˆ à¤ªà¤Ÿà¤•à¤¸à¤®à¥à¤® à¤ªà¤°à¥€à¤•à¥à¤·à¤£ à¤—à¤°à¥€ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤­à¤¾à¤‡à¤°à¤¸ à¤¨à¤­à¥‡à¤Ÿà¤¿à¤ à¤®à¤¾à¤¤à¥à¤°à¥ˆ à¤¬à¤¾à¤¹à¤¿à¤° à¤ªà¤ à¤¾à¤‡à¤¨à¥‡ à¤¬à¤¤à¤¾à¤‡à¤à¤•à¥‹ à¤› à¥¤ à¤­à¤¾à¤°à¤¤à¤®à¤¾ à¤¸à¥‹à¤®à¤¬à¤¾à¤° à¤¦à¤¿à¤‰à¤à¤¸à¥‹à¤¸à¤®à¥à¤®à¤®à¤¾ à¥ªà¥©à¥§à¥ª à¤œà¤¨à¤¾à¤®à¤¾ à¤•à¥‹à¤°à¥‹à¤¨à¤¾ à¤­à¤¾à¤‡à¤°à¤¸ à¤¸à¤‚à¤•à¥à¤°à¤®à¤£à¤•à¥‹ à¤ªà¥à¤·à¥à¤Ÿà¤¿ à¤­à¤‡à¤¸à¤•à¥‡à¤•à¥‹ à¤› à¤­à¤¨à¥‡ à¥§à¥§à¥® à¤œà¤¨à¤¾à¤•à¥‹ à¤®à¥ƒà¤¤à¥à¤¯à¥ à¤­à¤à¤•à¥‹ à¤› à¥¤&nbsp;&nbsp;</span></p>\r\n', 'asdbkjashdkjas', '5e8ae475f3abf2.21876757.', 'IMG_0067.JPG', '2020-04-06 08:12:37', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes');

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

--
-- Dumping data for table `tblnewstrash`
--

INSERT INTO `tblnewstrash` (`trash_id`, `news_id`, `news_title`, `category_id`, `subcategory_id`, `news_deails`, `news_url`, `news_image`, `news_featuredimage`, `created_at`, `updated_at`, `is_active`, `featured_startdate`, `featured_enddate`, `top_news`) VALUES
(8, 10, 'restore ', 4, 2, '<p>restore</p>\r\n', 'res2', '', '', '', '', 'active', '', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `subcategory_id` bigint(25) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` bigint(50) DEFAULT NULL,
  `subcategory_descrption` longtext,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_descrption`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Province 1', 4, 'News of Province 1', 'active', '2020-04-04 09:40:55', '0000-00-00 00:00:00'),
(2, 'Province 2', 4, 'News of Province 2', 'active', '2020-04-04 09:42:17', '0000-00-00 00:00:00'),
(3, 'Hospitals', 3, 'healthcare', 'active', '2020-04-04 12:52:52', '0000-00-00 00:00:00'),
(4, 'Province 3', 4, 'News of province 3', 'active', '2020-04-05 04:37:31', '0000-00-00 00:00:00'),
(5, 'Province 4', 4, '', 'active', '2020-04-06 08:11:12', '0000-00-00 00:00:00');

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
  MODIFY `news_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblnewstrash`
--
ALTER TABLE `tblnewstrash`
  MODIFY `trash_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `subcategory_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
