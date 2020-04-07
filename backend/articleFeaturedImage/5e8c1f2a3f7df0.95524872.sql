-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 06:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'National', 'It includes all the related news about the nation', 'active', '2020-04-03 13:47:58', '0000-00-00 00:00:00'),
(2, 'Economy', 'All news about the economy', 'active', '2020-04-03 14:46:43', '0000-00-00 00:00:00'),
(3, 'Health', 'corona', 'active', '2020-04-03 14:47:45', '0000-00-00 00:00:00'),
(4, 'International', 'All the news outside the country', 'active', '2020-04-04 06:27:45', '0000-00-00 00:00:00'),
(5, 'Entertainment', 'Includes news about films,celebrity and entertainment world', 'active', '2020-04-07 03:49:08', '0000-00-00 00:00:00'),
(6, 'Sports', 'All news related to sports', 'active', '2020-04-07 03:49:29', '0000-00-00 00:00:00');

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
(39, 'Two killed and seven injured in lightning', 4, 11, '<p><span style="color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;">Two people died and eleven others sustained injuries in separate lightning incidents occurred in California&nbsp; on Wednesday</span></p>\r\n', '', '5e8bfcc6d42507.83553805.', '5e8bfcc6d46f34.00624943.jpg', '2020-04-07 04:08:38', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(40, 'Italy Corona virus deaths rises to 672 a day', 3, 9, '<p><span style="color: rgba(0, 0, 0, 0.87); font-family: &quot;Ek Mukta&quot;, Arial, Helvetica, sans-serif; font-size: 22px;">The death toll from an outbreak of coronavirus in Italy has leapt by 627 to 4,032, officials said on Friday, an increase of 18.4% &ndash; by far the largest daily rise in absolute terms since the contagion emerged a month ago.</span></p>\r\n', '', '5e8bfd504bafd9.72895079.', '5e8bfd504c01f2.61805185.jpg', '2020-04-07 04:10:56', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(41, 'Dibesh Pokhrel on Top 20 of American Idol', 5, 12, '<p>Dibesh Pokhrel has been selected in the top 20 of American Idol because of his outstanding perofrmances in previous rounds.</p>\r\n', '', '5e8bfe25a34369.96164943.', '5e8bfe25a3c112.28226494.jpg', '2020-04-07 04:14:29', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(42, 'Yuvraj SIngh donates 50 lakh in PM fund', 6, 13, '<p>Yuvraj singh has donated 50 lakhs in PM Relief fund for corona victims in India</p>\r\n', '', '5e8bfeca4a5831.19438109.', '5e8bfeca4aa1c8.06600281.png', '2020-04-07 04:17:14', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(43, 'Prime Minister to address the nation today', 1, 1, '<p><span style="color: rgb(119, 119, 119);">à¤ªà¥à¤°à¤§à¤¾à¤¨à¤®à¤¨à¥à¤¤à¥à¤°à¥€ à¤•à¥‡à¤ªà¥€ à¤¶à¤°à¥à¤®à¤¾ à¤“à¤²à¥€à¤²à¥‡ à¤†à¤œ à¤¬à¤¿à¤¹à¤¾à¤¨ à¥§à¥§à¤ƒà¥¦à¥¦ à¤¬à¤œà¥‡ à¤¸à¤°à¤•à¤¾à¤°à¥€ à¤¨à¤¿à¤µà¤¾à¤¸ à¤¬à¤¾à¤²à¥à¤µà¤¾à¤Ÿà¤¾à¤°à¤¬à¤¾à¤Ÿ à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤•à¤¾ à¤¨à¤¾à¤®à¤®à¤¾ à¤¸à¤®à¥à¤¬à¥‹à¤§à¤¨ à¤—à¤°à¥à¤¨à¥‡ à¤­à¤à¤•à¤¾ à¤›à¤¨à¥ à¥¤ à¤‰à¤¨à¤•à¤¾ à¤ªà¥à¤°à¥‡à¤¸ à¤¸à¤²à¥à¤²à¤¾à¤¹à¤•à¤¾à¤° à¤¸à¥‚à¤°à¥à¤¯ à¤¥à¤¾à¤ªà¤¾à¤•à¤¾ à¤…à¤¨à¥à¤¸à¤¾à¤° à¤‰à¤•à¥à¤¤ à¤¸à¤®à¥à¤¬à¥‹à¤§à¤¨ à¤¨à¥‡à¤ªà¤¾à¤² à¤Ÿà¥‡à¤²à¤¿à¤­à¤¿à¤œà¤¨à¤•à¥‹ à¤ªà¥à¤°à¤¤à¥à¤¯à¤•à¥à¤· à¤ªà¥à¤°à¤¸à¤¾à¤°à¤£à¤®à¤¾à¤°à¥à¤«à¤¤ à¤¹à¥‡à¤°à¥à¤¨ à¤¸à¤•à¤¿à¤¨à¥‡à¤› à¥¤</span></p>\r\n', '', '5e8bff0e5341a1.76158723.', '5e8bff0e539092.30625001.png', '2020-04-07 04:18:22', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(45, '1 arab 32 crore in Corona Relief Fund', 2, 8, '<p>A total amount of 1 arab and 32 crore has been deposited by various people and organizations in corona relief fund.</p>\r\n', '', '5e8c010f679dc2.95592993.', '5e8c010f67e5a1.47860779.jpg', '2020-04-07 04:26:55', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(46, 'Dhangadhi remains completely closed', 1, 1, '<p><span ek="" font-size:="" style="color: rgba(0, 0, 0, 0.87);">The Dhangadhi sub-metropolis on Saturday issued a press statement deciding to close shops in the locality from Sunday.</span><br ek="" font-size:="" style="box-sizing: inherit; color: rgba(0, 0, 0, 0.87);" />\r\n<span ek="" font-size:="" style="color: rgba(0, 0, 0, 0.87);">However, medical shops have remained open.&nbsp;</span></p>\r\n', '', '5e8c0151e229f3.14469815.', '5e8c0151e2d884.42100479.jpg', '2020-04-07 04:28:01', '0000-00-00 00:00:00', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes');

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
(6, 'Province 1', 1, 'All news about province 1', 'active', '2020-04-07 03:50:35', '0000-00-00 00:00:00'),
(7, 'Province 3', 1, 'All news about province 3', 'active', '2020-04-07 03:51:48', '0000-00-00 00:00:00'),
(8, 'Business', 2, 'All news about business and economy', 'active', '2020-04-07 03:52:47', '0000-00-00 00:00:00'),
(9, 'Hospitals', 3, 'All news about hospitals and medical offices', 'active', '2020-04-07 03:53:19', '0000-00-00 00:00:00'),
(10, 'Medicines', 3, 'Related to medicines', 'active', '2020-04-07 03:53:45', '0000-00-00 00:00:00'),
(11, 'World', 4, 'All news related Worldwide', 'active', '2020-04-07 03:54:06', '0000-00-00 00:00:00'),
(12, 'Celebrity', 5, 'All news about celebrity', 'active', '2020-04-07 03:54:40', '0000-00-00 00:00:00'),
(13, 'Cricket', 6, 'All news about cricket', 'active', '2020-04-07 03:54:59', '0000-00-00 00:00:00');

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
  MODIFY `category_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_id` bigint(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `news_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tblnewstrash`
--
ALTER TABLE `tblnewstrash`
  MODIFY `trash_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `subcategory_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
