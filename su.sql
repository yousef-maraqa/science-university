-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2021 at 02:41 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `su`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `fullName`, `phoneNum`, `email`, `body`, `created_at`) VALUES
(12, 'yousef', '0786197619', 'yousefmaraqa98@gmail.com', 'dfvd', '2021-06-08 10:54:30'),
(14, 'yousef', '0786197619', 'yousefmaraqa98@gmail.com', 'tygjt', '2021-06-08 11:20:10'),
(15, 'yousef', '0786197619', 'yousefmaraqa98@gmail.com', 'rthh', '2021-06-08 11:21:27'),
(16, 'yousef', '0786197619', 'yousefmaraqa98@gmail.com', 'rthbrh', '2021-06-08 11:22:11'),
(17, 'thr', 'rhtr', 'thrth', 'rth', '2021-06-08 11:22:35'),
(18, 'yousef', '6u6', '6uhrt6yu', '6u5', '2021-06-08 11:22:53'),
(19, 'thr', '0786197619', 'yousefmaraqa98@gmail.com', 'rgerherh', '2021-06-08 11:24:19'),
(22, 'eww', 'wef', 'efwefwf', 'wefwef', '2021-06-08 11:27:07'),
(23, 'eww', 'fb', 'efwefwffb', 'wefwef', '2021-06-08 11:29:05'),
(24, 'yousef', 'we', 'admin@admin.com', 'wef', '2021-06-08 11:30:06'),
(25, 'yousef', 'wefw', 'wefwef', 'wefwef', '2021-06-08 11:31:15'),
(26, 'yousef', '0786197619', 'yousefmaraqa98@gmail.com', 'ergerg', '2021-06-08 11:35:39'),
(27, 'yousef', 'fwef', 'yousefmaraqa98@fw.com', 'wfe', '2021-06-08 11:36:02'),
(28, 'efe', 'egeg', 'geg', 'eg', '2021-06-08 11:36:50'),
(29, 'yousef', 'hrthrth', 'thrth', 'rthdth', '2021-06-08 11:40:30'),
(30, 'ryh ', '324234', 'r y', 'ry', '2021-06-08 11:49:27'),
(31, 'et', '534165465', 'ett', 'te', '2021-06-08 11:49:41'),
(32, 'ewff', 'dfvdf', 'yousefmaraqa98@gmail.com', 'wefwfwedfbds', '2021-06-08 11:51:08'),
(33, 'yousef', '12312asdsdasd', 'yousefmaraqa98@gmail.com', 'asd', '2021-06-08 12:07:40'),
(34, 'eww', '+962786322473', 'yousefmaraqa98@gmail.com', 'asdasd', '2021-06-08 12:08:42'),
(36, 'yousef', '+923sdasdl;', 'yousefmaraqa98@gmail.com', 'sdadasd', '2021-06-08 12:09:06'),
(37, 'yousef', '+962786322473', 'admin@admin.com', 'asdasdasd', '2021-06-08 12:09:51'),
(38, 'yousef', '+9627', 'yousefmaraqa98@gmail.com', 'asdasd', '2021-06-08 12:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `summary` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `user_id`, `title`, `body`, `summary`, `start_time`, `end_time`, `date`, `location`, `status`, `media_id`, `created_at`, `updated_at`) VALUES
(2, 14, 'Schedule of Events', 'What better way to record your memories of this unique reunion year than by stopping by a virtual photo booth? Snap a selfie, send it to us after 5:00 p.m. on Friday (401-208-2008), and get your personalized Reunion-branded photo texted back to you within minutes. Share on social media with #BrownReunion and you could be featured in Alumni & Friends social channels! ', 'Find a variety of events both inspired by Reunions pastâ€”such as concerts and class get-togethersâ€”plus fun this-year-only activities like a virtual photo booth and virtual class lounges!', '13:00:00', '15:00:00', '2021-06-15', 'amman', 'published', 14, '2021-06-04 18:28:12', '2021-06-04 18:29:18'),
(6, 14, 'ds', '<p>Enter text here...s</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Rekindling friendships is now more important than ever, so donâ€™t miss this chance to reconnect with those who knew you when. Check out what interesting activities weâ€™ve cooked up for your class get-together.', '19:45:00', '19:45:00', '2021-06-09', 'ds', 'published', 98, '2021-06-09 16:45:40', '2021-06-10 09:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `img_url` text NOT NULL,
  `img_alt` varchar(255) NOT NULL,
  `sourse` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `img_url`, `img_alt`, `sourse`, `created_at`, `updated_at`) VALUES
(10, 'img-0349-0@3x.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'event', '2021-06-03 11:29:24', '2021-06-03 11:29:24'),
(11, 'marketing-und-event@3x.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'event', '2021-06-03 11:32:25', '2021-06-03 11:32:25'),
(12, 'marketing-und-event@2x.jpg', 'people gathering ', 'event', '2021-06-03 11:33:30', '2021-06-03 11:33:30'),
(13, 'salford-uni-alumni-events@3x.jpg', 'test', 'event', '2021-06-03 11:35:36', '2021-06-03 11:35:36'),
(14, 'Empowerfest-Overview.jpg', 'people gathering ', 'event', '2021-06-03 12:35:17', '2021-06-03 12:35:17'),
(15, 'salford-uni-alumni-events@3x.jpg', 'people gathering ', 'event', '2021-06-04 18:28:12', '2021-06-04 18:28:12'),
(16, 'img-0349-0@3x.jpg', 'svadv', 'slider', '2021-06-04 19:33:45', '2021-06-04 19:33:45'),
(17, 'img-0349-0@2x.jpg', 'ca', 'slider', '2021-06-04 19:35:02', '2021-06-04 19:35:02'),
(18, 'img-0349-0.jpg', 'sasw', 'slider', '2021-06-04 19:36:05', '2021-06-04 19:36:05'),
(19, 'marketing-und-event@2x.jpg', 'people gathering ', 'slider', '2021-06-04 19:44:47', '2021-06-04 19:44:47'),
(20, 'marketing-und-event@3x.jpg', 'dvsdsd', 'slider', '2021-06-04 19:46:38', '2021-06-04 19:46:38'),
(21, 'marketing-und-event.jpg', 'sca', 'slider', '2021-06-04 19:59:29', '2021-06-04 19:59:29'),
(22, 'happiness.jpg', 'dsvsd', 'slider', '2021-06-04 21:26:30', '2021-06-04 21:26:30'),
(23, 'Education-Landscape-Services_1.jpg', 'cacsac', 'slider', '2021-06-05 08:29:12', '2021-06-08 08:44:54'),
(24, 'Salem-State-University.jpg', 'ugiu', 'slider', '2021-06-05 08:30:28', '2021-06-05 08:30:28'),
(25, 'alumnievents.jpg', 'people gathering ', 'slider', '2021-06-05 08:53:15', '2021-06-08 08:46:03'),
(26, 'sunset-coast-lake-nature-landscape-260nw-1960131820.jpg', 'ergerger', 'slider', '2021-06-06 07:10:54', '2021-06-06 07:10:54'),
(27, 'marketing-und-event.jpg', 'erb', 'event', '2021-06-06 09:17:58', '2021-06-06 09:17:58'),
(28, 'assets', 'test', 'event', '2021-06-06 09:20:12', '2021-06-06 09:20:12'),
(29, 'assets', 'test', 'event', '2021-06-06 09:20:15', '2021-06-06 09:20:15'),
(30, 'assets', 'test', 'event', '2021-06-06 09:20:20', '2021-06-06 09:20:20'),
(31, 'assets', 'test', 'event', '2021-06-06 09:20:20', '2021-06-06 09:20:20'),
(32, 'assets', 'test', 'event', '2021-06-06 09:20:23', '2021-06-06 09:20:23'),
(33, 'assets', 'test', 'event', '2021-06-06 09:20:23', '2021-06-06 09:20:23'),
(34, 'assets', 'test', 'event', '2021-06-06 09:20:25', '2021-06-06 09:20:25'),
(35, 'assets', 'test', 'event', '2021-06-06 09:20:25', '2021-06-06 09:20:25'),
(36, 'marketing-und-event.jpg', 'test', 'event', '2021-06-06 09:20:45', '2021-06-06 09:20:45'),
(37, 'marketing-und-event.jpg', 'people gathering ', 'event', '2021-06-06 09:20:46', '2021-06-06 09:20:46'),
(38, '', 'test', 'event', '2021-06-06 09:21:46', '2021-06-06 09:21:46'),
(39, '', 'test', 'event', '2021-06-06 09:21:50', '2021-06-06 09:21:50'),
(40, '', 'test', 'event', '2021-06-06 09:21:50', '2021-06-06 09:21:50'),
(41, '', 'test', 'event', '2021-06-06 09:22:10', '2021-06-06 09:22:10'),
(42, 'marketing-und-event.jpg', 'wefwef', 'event', '2021-06-06 09:22:10', '2021-06-06 09:22:10'),
(43, '', 'test', 'event', '2021-06-06 09:32:35', '2021-06-06 09:32:35'),
(44, 'marketing-und-event@3x.jpg', 'test', 'event', '2021-06-06 09:32:57', '2021-06-06 09:32:57'),
(45, 'marketing-und-event@3x.jpg', 'people gathering ', 'event', '2021-06-06 09:32:57', '2021-06-06 09:32:57'),
(46, 'marketing-und-event.jpg', 'test', 'event', '2021-06-06 09:35:08', '2021-06-06 09:35:08'),
(47, 'marketing-und-event.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'event', '2021-06-06 09:35:08', '2021-06-06 09:35:08'),
(48, '', 'test', 'event', '2021-06-06 09:35:18', '2021-06-06 09:35:18'),
(49, '', 'test', 'event', '2021-06-06 09:35:18', '2021-06-06 09:35:18'),
(50, '', 'test', 'event', '2021-06-06 09:35:21', '2021-06-06 09:35:21'),
(51, '', 'test', 'event', '2021-06-06 09:35:21', '2021-06-06 09:35:21'),
(52, '', 'test', 'event', '2021-06-06 09:35:24', '2021-06-06 09:35:24'),
(53, '../../theme/assets/salford-uni-alumni-events@2x.jpg', 'dfb', 'news', '2021-06-07 17:10:34', '2021-06-07 17:10:34'),
(54, '../../theme/assets/salford-uni-alumni-events@2x.jpg', 'dfb', 'news', '2021-06-07 17:15:27', '2021-06-07 17:15:27'),
(55, '../../theme/assets/salford-uni-alumni-events@2x.jpg', 'dfb', 'news', '2021-06-07 17:17:27', '2021-06-07 17:17:27'),
(56, '../../theme/assets/marketing-und-event.jpg', 'asa', 'news', '2021-06-07 17:25:27', '2021-06-07 17:25:27'),
(57, 'Education-Landscape-Services_1.jpg', 'svddvdv', 'news', '2021-06-07 17:40:56', '2021-06-07 17:40:56'),
(58, 'Education-Landscape-Services_1.jpg', 'svddvdv', 'news', '2021-06-07 17:41:49', '2021-06-07 17:41:49'),
(59, 'Empowerfest-Overview.jpg', 'dvsd', 'slider', '2021-06-07 19:00:39', '2021-06-08 08:45:43'),
(60, '3956207.jpg', 'people gathering ', 'news', '2021-06-07 19:46:52', '2021-06-07 19:46:52'),
(61, '3956207.jpg', 'people gathering ', 'news', '2021-06-07 19:47:13', '2021-06-07 19:47:13'),
(62, '3956207.jpg', 'people gathering ', 'news', '2021-06-07 19:47:15', '2021-06-07 19:47:15'),
(63, 'Empowerfest-Overview.jpg', 'people gathering ', 'news', '2021-06-07 19:49:02', '2021-06-08 08:44:15'),
(64, 'pexels-keira-burton-6147369.jpg', 'csa', 'news', '2021-06-07 19:54:18', '2021-06-07 19:54:18'),
(65, 'pic116.png', 'as', 'news', '2021-06-07 19:54:54', '2021-06-07 19:54:54'),
(66, '3956207.jpg', 'sdv', 'news', '2021-06-07 20:08:54', '2021-06-07 20:08:54'),
(67, 'happiness.jpg', 'people gathering ', 'news', '2021-06-08 06:43:59', '2021-06-08 06:43:59'),
(68, 'happiness.jpg', 'people gathering ', 'news', '2021-06-08 06:44:07', '2021-06-08 06:44:07'),
(69, '3956207.jpg', 'people gathering ', 'news', '2021-06-08 06:45:00', '2021-06-08 06:45:00'),
(70, 'happiness.jpg', 'people gathering ', 'news', '2021-06-08 06:49:47', '2021-06-08 06:49:47'),
(71, 'happiness.jpg', 'people gathering ', 'news', '2021-06-08 06:51:26', '2021-06-08 06:51:26'),
(72, 'pexels-keira-burton-6147369.jpg', 'svddvdv', 'news', '2021-06-08 06:52:55', '2021-06-08 06:52:55'),
(73, 'pic116.png', 'people gathering ', 'news', '2021-06-08 06:55:59', '2021-06-08 06:55:59'),
(74, 'pexels-keira-burton-6147369.jpg', 'people gathering ', 'news', '2021-06-08 07:03:48', '2021-06-08 07:03:48'),
(75, 'Salem-State-University.jpg', 'people gathering ', 'news', '2021-06-08 07:04:45', '2021-06-08 07:04:45'),
(76, '', 'asa', 'news', '2021-06-08 07:22:32', '2021-06-08 07:22:32'),
(77, '', 'asa', 'news', '2021-06-08 07:22:43', '2021-06-08 07:22:43'),
(78, '', 'asa', 'news', '2021-06-08 07:23:10', '2021-06-08 07:23:10'),
(79, '3956207 (1).jpg', 'people gathering 2', 'slider', '2021-06-08 13:26:00', '2021-06-08 13:26:32'),
(80, '3956207.jpg', 'sdvd', 'slider', '2021-06-09 07:09:37', '2021-06-09 07:09:37'),
(81, 'pexels-keira-burton-6147369.jpg', 'ss', 'slider', '2021-06-09 13:39:33', '2021-06-09 13:39:33'),
(82, 'certificate-1.pdf', 'sdv', 'slider', '2021-06-09 13:40:45', '2021-06-09 13:40:45'),
(83, 'Salem-State-University.jpg', 'sss', 'slider', '2021-06-09 13:56:31', '2021-06-09 13:59:07'),
(84, '', 'ascasc', 'news', '2021-06-09 14:04:05', '2021-06-09 14:04:05'),
(85, '3956207 (1).jpg', 'cass', 'news', '2021-06-09 14:04:28', '2021-06-09 14:04:28'),
(86, '3956207.jpg', 'sas', 'news', '2021-06-09 14:04:46', '2021-06-09 14:27:17'),
(87, 'Empowerfest-Overview.jpg', 'sd', 'news', '2021-06-09 14:48:12', '2021-06-09 14:48:12'),
(88, '3956207.jpg', 'scs', 'news', '2021-06-09 14:53:17', '2021-06-09 14:53:17'),
(89, '3956207.jpg', 'sd', 'news', '2021-06-09 14:56:52', '2021-06-09 14:56:52'),
(90, 'alumnievents.jpg', 'saas', 'news', '2021-06-09 15:08:55', '2021-06-09 15:08:55'),
(91, 'happiness.jpg', 'asc', 'news', '2021-06-09 15:17:47', '2021-06-09 15:17:47'),
(92, '3956207 (1).jpg', 'ddd', 'slider', '2021-06-09 15:18:40', '2021-06-09 15:18:40'),
(93, '3956207.jpg', 's', 'news', '2021-06-09 15:19:41', '2021-06-09 15:19:41'),
(94, '3956207 (1).jpg', 'dddd', 'slider', '2021-06-09 15:22:13', '2021-06-09 15:22:13'),
(95, '3956207.jpg', 'd', 'slider', '2021-06-09 15:23:04', '2021-06-09 15:23:04'),
(96, 'certificate-1.pdf', 's', 'slider', '2021-06-09 15:25:19', '2021-06-09 15:25:19'),
(97, 'Empowerfest-Overview.jpg', 'sss', 'slider', '2021-06-09 15:25:42', '2021-06-09 15:25:42'),
(98, '3956207.jpg', 'sd', 'events', '2021-06-09 16:45:40', '2021-06-09 16:45:40'),
(99, 'Education-Landscape-Services_1.jpg', 'm.m', 'news', '2021-06-10 10:57:43', '2021-06-10 10:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `navigationLinks`
--

CREATE TABLE `navigationLinks` (
  `navigation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cluster_title` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `type` enum('header','footer') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigationLinks`
--

INSERT INTO `navigationLinks` (`navigation_id`, `user_id`, `cluster_title`, `title`, `path`, `type`, `created_at`, `updated_at`) VALUES
(1, 14, 'EXPLORE', 'Privacy and Cookies', './empty.php', 'header', '2021-06-05 15:46:59', '2021-06-07 19:14:28'),
(3, 14, 'EXPLORE', 'Legal Information', './empty.php', 'footer', '2021-06-05 15:48:45', '2021-06-05 17:47:14'),
(4, 14, 'EXPLORE', 'About the University', './empty.php', 'footer', '2021-06-05 15:48:58', '2021-06-05 17:47:19'),
(5, 14, 'EXPLORE', 'News and Events', './empty.php', 'footer', '2021-06-05 15:49:16', '2021-06-05 17:47:26'),
(6, 14, 'EXPLORE', 'Research', './empty.php', 'footer', '2021-06-05 15:49:29', '2021-06-05 17:47:33'),
(7, 14, 'EXPLORE', 'Schools and Departments', './empty.php', 'footer', '2021-06-05 15:49:47', '2021-06-05 17:47:39'),
(8, 14, 'EXPLORE', 'International', './empty.php', 'footer', '2021-06-05 15:50:17', '2021-06-05 17:47:54'),
(9, 14, 'EXPLORE', 'Job Vacancies', './empty.php', 'footer', '2021-06-05 15:50:39', '2021-06-05 17:48:08'),
(10, 14, 'QUICK_LINKS', 'Online Payments', './empty.php', 'footer', '2021-06-05 15:50:57', '2021-06-05 17:56:29'),
(11, 14, 'QUICK_LINKS', 'Library', './empty.php', 'footer', '2021-06-05 15:51:13', '2021-06-05 17:56:15'),
(12, 14, 'QUICK_LINKS', 'Alumni', './empty.php', 'footer', '2021-06-05 15:51:27', '2021-06-05 17:55:40'),
(13, 14, 'QUICK_LINKS', 'Community Information', './empty.php', 'footer', '2021-06-05 15:51:47', '2021-06-05 17:55:10'),
(14, 14, 'USING_OUR_SITE', 'Accessibilty', './empty.php', 'footer', '2021-06-05 15:52:04', '2021-06-05 17:54:49'),
(15, 14, 'USING_OUR_SITE', 'Freedom of Information', './empty.php', 'footer', '2021-06-05 15:52:18', '2021-06-05 17:54:15'),
(20, 14, 'HOW_TO_FIND_US', '+ 1 (408) 703 8738', './empty.php', 'footer', '2021-06-05 15:55:29', '2021-06-05 17:54:03'),
(21, 14, 'HOW_TO_FIND_US', '+ 962 6 581 7612', './empty.php', 'footer', '2021-06-05 15:55:44', '2021-06-05 17:53:51'),
(22, 14, 'HOW_TO_FIND_US', 'info@SciencesUniversity.edu', './empty.php', 'footer', '2021-06-05 15:56:01', '2021-06-05 17:53:42'),
(24, 14, 'HOW_TO_FIND_US', 'Find Us', './empty.php', 'footer', '2021-06-05 15:56:32', '2021-06-05 17:53:04'),
(26, 14, 'SOCIAL_LINKS', 'FACEBOOK', 'https://www.facebook.com', 'footer', '2021-06-05 18:21:06', '2021-06-05 19:07:12'),
(27, 14, 'SOCIAL_LINKS', 'INSTAGRAM', 'https://www.instagram.com', 'footer', '2021-06-05 18:21:54', '2021-06-05 19:07:25'),
(28, 14, 'SOCIAL_LINKS', 'LINKEDIN', 'https://www.linkedin.com', 'footer', '2021-06-05 18:22:40', '2021-06-05 19:07:34'),
(30, 14, 'SOCIAL_LINKS', 'YOUTUBE', 'https://www.youtube.com/', 'footer', '2021-06-05 18:24:16', '2021-06-05 19:07:44'),
(31, 14, 'SOCIAL_LINKS', 'TWITTER', 'https://twitter.com/', 'footer', '2021-06-05 18:25:25', '2021-06-05 19:08:01'),
(32, 14, 'NAVBAR', 'ABOUT', '../html_pages/empty.php', 'header', '2021-06-05 19:31:01', '2021-06-05 19:31:01'),
(33, 14, 'NAVBAR', 'academics', '../html_pages/empty.php', 'header', '2021-06-05 19:31:28', '2021-06-05 19:31:28'),
(34, 14, 'NAVBAR', 'admissions', '../html_pages/empty.php', 'header', '2021-06-05 19:31:42', '2021-06-05 19:31:42'),
(35, 14, 'NAVBAR', 'international', '../html_pages/empty.php', 'header', '2021-06-05 19:32:44', '2021-06-05 19:32:44'),
(36, 14, 'NAVBAR', 'events', '../html_pages/allevents.php', 'header', '2021-06-05 19:33:30', '2021-06-05 19:33:30'),
(37, 14, 'NAVBAR', 'contact us', '../html_pages/empty.php', 'header', '2021-06-05 19:34:01', '2021-06-05 19:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `user_id`, `title`, `body`, `summary`, `status`, `media_id`, `created_at`, `created_by`) VALUES
(7, 14, 'the storey of jankeez', '<p>Enter text here...ss</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Rekindling friendships is now more important than ever, so donâ€™t miss this chance to reconnect with those who knew you when. Check out what interesting activities weâ€™ve cooked up for your class get-together.', 'published', 90, '2021-06-09 15:08:55', '2021-06-09 15:08:55'),
(9, 14, ' Enter text here...s Enter text here...s Enter text here...sEnter text here...sEnter text here...sEnter text here...s', '<p>Enter text here...s</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Rekindling friendships is now more important than ever, so donâ€™t miss this chance to reconnect with those who kssssssssssssss', 'published', 93, '2021-06-09 15:19:41', '2021-06-10 08:50:16'),
(10, 14, 'test', '<p>Enter text here...mm</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'sumaary test', 'unpublished', 99, '2021-06-10 10:57:43', '2021-06-10 10:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `siteSettings`
--

CREATE TABLE `siteSettings` (
  `site_settings_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `config_name` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slider_text` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `user_id`, `slider_text`, `rank`, `media_id`, `created_at`, `updated_at`) VALUES
(1, 14, 'Harvard University is a private Ivy League re', 1, 83, '2021-06-09 13:56:31', '2021-06-09 13:56:51'),
(2, 14, 'sdsdvs', 2, 92, '2021-06-09 15:18:40', '2021-06-09 15:18:40'),
(6, 14, 'scs', 2, 97, '2021-06-09 15:25:42', '2021-06-09 15:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `stats_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stats_title` varchar(255) NOT NULL,
  `stats_value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` char(60) NOT NULL,
  `role` char(20) NOT NULL,
  `is_active` enum('active','notActive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(14, 'hash', 'yousefmaraqa98@gmail.com', '$2y$10$7I/OK47l1yDDLpV5exqKGOKNLxbsNzsb8C0KgY4Lr7hE2fYI8rUiK', 'super', 'active', '2021-05-31 21:33:44', '2021-06-07 13:20:17'),
(34, 'yousef', 'yousefmaraqa98@gmail.com', '$2y$10$J5ScDAj6YRswhGwP86P6q.LvTZrVQ3Ufxyn6JAA4fTYj5UEJbXxuq', 'super', 'active', '2021-06-01 11:45:33', '2021-06-01 11:46:15'),
(44, 'hashT', 'yousefmaraqa98@gmail.com', '$2y$10$oEci2gy8/NUEcyflBaXyWebvExRQ1Ohu/i8Sz1582dkoR9jPaE3.a', 'super', 'active', '2021-06-07 19:57:03', '2021-06-10 09:57:20'),
(70, 'maraqa', 'yousefmaraqa98@gmail.com', '$2y$10$dpCxUQE/exyrk9.FlD9YUOhwGsViVN9TQEpnbH2p3ZUA0mBKkq5UC', 'author', 'active', '2021-06-10 09:57:48', '2021-06-10 09:57:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_template 13_1_idx` (`user_id`),
  ADD KEY `fk_template 13_2_idx` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `navigationLinks`
--
ALTER TABLE `navigationLinks`
  ADD PRIMARY KEY (`navigation_id`),
  ADD KEY `fk_navigationLinks_1_idx` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id_idx` (`user_id`),
  ADD KEY `fk_news_1_idx` (`media_id`);

--
-- Indexes for table `siteSettings`
--
ALTER TABLE `siteSettings`
  ADD PRIMARY KEY (`site_settings_id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`),
  ADD KEY `fk-slider_idx` (`media_id`),
  ADD KEY `fk_slider_1_idx` (`user_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stats_id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `navigationLinks`
--
ALTER TABLE `navigationLinks`
  MODIFY `navigation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siteSettings`
--
ALTER TABLE `siteSettings`
  MODIFY `site_settings_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `stats_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_template 13_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_template 13_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `navigationLinks`
--
ALTER TABLE `navigationLinks`
  ADD CONSTRAINT `fk_navigationLinks_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk-news` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `siteSettings`
--
ALTER TABLE `siteSettings`
  ADD CONSTRAINT `fk-siteSettings` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `fk-slider` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_slider_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `fk-stats` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
