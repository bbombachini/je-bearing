-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2018 at 12:53 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jebearing`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` smallint(5) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_media`
--

CREATE TABLE `comment_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixture`
--

CREATE TABLE `fixture` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixture`
--

INSERT INTO `fixture` (`id`, `name`, `number`, `desc`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Fixture 1', '001', 'Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1', 0, '2018-01-29 05:00:00', '2018-03-14 17:23:46'),
(2, 'Fixture 2', '002', 'Fixture with a photo', 0, '2018-01-29 05:00:00', '2018-03-14 17:23:50'),
(3, 'Fixture 3', '003', 'Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3', 0, '2018-01-29 05:00:00', '2018-03-14 17:23:52'),
(4, 'Fixture 4', '004', 'Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4', 0, '2018-01-29 05:00:00', '2018-03-14 17:23:53'),
(5, 'Clara', 'sasas', NULL, 0, '2018-02-13 03:32:01', '2018-03-14 17:23:44'),
(6, 'Clamp', '445-213', 'A clamp is a fastening device used to hold or secure objects tightly together to prevent movement or separation through the application of inward pressure.', 1, '2018-03-14 17:27:31', '2018-03-14 17:27:31'),
(7, 'Orbital Sander', '457758', 'This is an orbital sander.', 1, '2018-04-20 19:20:04', '2018-04-20 19:20:04'),
(8, 'Kreg Jig', '5637', 'Cool kit.', 1, '2018-04-20 19:21:27', '2018-04-20 19:21:27'),
(9, 'Corner Brackets', '45622', 'Corner brackets put everything together', 1, '2018-04-23 01:50:29', '2018-04-23 01:50:29'),
(10, 'KLI', '9822', 'Clamping force up to 1,200 N Feather light yet ultra strong. Sturdy fixed and sliding arms made from lightweight magnesium. Quick and vibration free clamping. On carded hang pack.', 1, '2018-04-27 04:40:40', '2018-04-27 04:40:40'),
(11, 'Jaw', '387766', 'For turning out all soft and heat-treated chuck jaws on manual and power lathe chucks', 1, '2018-04-27 04:43:06', '2018-04-27 04:43:06'),
(12, 'Welding Clamp', '85746', 'The economical 4-in-1 Clamp adapts to serve four different functions: 1. Standard Clamping 2. Pipe Clamping 3. Spreader Clamping 4. Step-Over Clamping\r\nThe 4-in-1 clamp features the removable / reversible clamp arm and a threaded hole in the jaw for the addition of the unique V-Pad and Extender Block Accessories', 1, '2018-04-27 04:44:09', '2018-04-27 04:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `fixture_media`
--

CREATE TABLE `fixture_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `fixture_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixture_media`
--

INSERT INTO `fixture_media` (`id`, `fixture_id`, `media_id`, `order`, `created_at`, `updated_at`) VALUES
(2, 1, 16, 1, '2018-01-31 22:04:46', '2018-01-31 22:04:46'),
(3, 2, 19, 1, '2018-02-07 19:26:41', '2018-02-07 19:26:41'),
(4, 6, 35, 1, '2018-03-14 17:27:31', '2018-03-14 17:27:31'),
(5, 7, 52, 1, '2018-04-20 19:20:04', '2018-04-20 19:20:04'),
(6, 8, 54, 1, '2018-04-20 19:21:27', '2018-04-20 19:21:27'),
(7, 9, 63, 1, '2018-04-23 01:50:29', '2018-04-23 01:50:29'),
(8, 10, 79, 1, '2018-04-27 04:40:40', '2018-04-27 04:40:40'),
(9, 11, 80, 1, '2018-04-27 04:43:06', '2018-04-27 04:43:06'),
(10, 12, 81, 1, '2018-04-27 04:44:09', '2018-04-27 04:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `number`, `desc`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Wood', '001', 'Wood is a porous and fibrous structural tissue found in the stems and roots of trees and other woody plants.', 1, '2018-01-29 05:00:00', '2018-01-29 05:00:00'),
(2, 'Iron', '002', 'Iron is a chemical element with symbol Fe and atomic number 26. It is a metal in the first transition series. It is by mass the most common element on Earth, forming much of Earth\'s outer and inner core.', 0, '2018-01-29 05:00:00', '2018-03-14 18:45:58'),
(3, 'Steel', '003', 'Steel is an alloy of iron and carbon and other elements. Because of its high tensile strength and low cost, it is a major component used in buildings, infrastructure, tools, ships, automobiles, machines, appliances, and weapons.', 0, '2018-01-29 05:00:00', '2018-03-14 17:32:08'),
(4, 'Glass', '004', 'Glass is a non-crystalline amorphous solid that is often transparent and has widespread practical, technological, and decorative usage in, for example, window panes, tableware, and optoelectronics.', 0, '2018-01-29 05:00:00', '2018-03-14 18:45:53'),
(5, 'Plastic', '005', 'Plastic is material consisting of any of a wide range of synthetic or semi-synthetic organic compounds that are malleable and so can be molded into solid objects.', 0, '2018-01-29 05:00:00', '2018-03-14 17:30:44'),
(6, 'Clara', '1111', '1111', 0, '2018-02-13 03:32:14', '2018-03-14 17:28:32'),
(7, 'Wood Glue', '345-234', 'Gorilla Wood Glue is the reliable adhesive that woodworkers, carpenters and hobbyists trust for their woodworking projects.', 1, '2018-03-14 17:29:44', '2018-03-14 17:29:44'),
(8, 'Nails', '345-345', 'In woodworking and construction, a nail is a pin-shaped object of metal which is used as a fastener, as a peg to hang something, or sometimes as a decoration.', 1, '2018-03-14 17:31:47', '2018-03-14 17:31:47'),
(9, 'Felt Pads', '234-253', 'Felt is a textile material that is produced by matting, condensing and pressing fibers together. Felt can be made of natural fibers such as wool or animal fur, or from synthetic fibers such as petroleum-based acrylic or acrylonitrile.', 1, '2018-03-14 17:34:52', '2018-03-14 17:34:52'),
(10, 'Torque Screws', '8967', 'Puts everything together.', 1, '2018-04-20 19:20:39', '2018-04-20 19:20:39'),
(11, 'Plywood', '9872111', 'Sort of wood, but cheap.', 1, '2018-04-23 01:51:43', '2018-04-23 01:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `material_media`
--

CREATE TABLE `material_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `material_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_media`
--

INSERT INTO `material_media` (`id`, `material_id`, `media_id`, `order`, `created_at`, `updated_at`) VALUES
(6, 9, 39, 1, '2018-03-14 17:34:52', '2018-03-14 17:34:52'),
(7, 8, 40, 2, '2018-03-14 18:45:13', '2018-03-14 18:45:13'),
(8, 1, 41, 2, '2018-03-14 18:45:22', '2018-03-14 18:45:22'),
(9, 7, 42, 2, '2018-03-14 18:45:33', '2018-03-14 18:45:33'),
(10, 10, 53, 1, '2018-04-20 19:20:39', '2018-04-20 19:20:39'),
(11, 11, 64, 1, '2018-04-23 01:51:43', '2018-04-23 01:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `path` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `path`, `desc`, `caption`, `created_at`, `updated_at`) VALUES
(1, '1516819843.jpg', NULL, NULL, '2018-01-24 23:50:44', '2018-01-24 23:50:44'),
(11, '1517417574.JPG', NULL, NULL, '2018-01-31 21:52:55', '2018-01-31 21:52:55'),
(12, '1517417943.JPG', NULL, NULL, '2018-01-31 21:59:04', '2018-01-31 21:59:04'),
(13, '1517418079.JPG', NULL, NULL, '2018-01-31 22:01:20', '2018-01-31 22:01:20'),
(15, '1517418199.JPG', NULL, NULL, '2018-01-31 22:03:20', '2018-01-31 22:03:20'),
(16, '1517418285.JPG', NULL, NULL, '2018-01-31 22:04:46', '2018-01-31 22:04:46'),
(19, '1518013600.jpg', NULL, NULL, '2018-02-07 19:26:40', '2018-02-07 19:26:40'),
(20, '1520289727.jpg', NULL, NULL, '2018-03-06 03:42:07', '2018-03-06 03:42:07'),
(21, '1520289939.jpg', NULL, NULL, '2018-03-06 03:45:39', '2018-03-06 03:45:39'),
(23, '1520290318.jpg', NULL, NULL, '2018-03-06 03:51:58', '2018-03-06 03:51:58'),
(24, '1520433626.jpg', NULL, NULL, '2018-03-07 19:40:26', '2018-03-07 19:40:26'),
(25, '1520433722.jpg', NULL, NULL, '2018-03-07 19:42:02', '2018-03-07 19:42:02'),
(26, '1520435256.jpg', NULL, NULL, '2018-03-07 20:07:36', '2018-03-07 20:07:36'),
(27, '1521033610.jpg', NULL, NULL, '2018-03-14 17:20:10', '2018-03-14 17:20:10'),
(28, '1521033624.jpg', NULL, NULL, '2018-03-14 17:20:24', '2018-03-14 17:20:24'),
(29, '1521033723.jpg', NULL, NULL, '2018-03-14 17:22:03', '2018-03-14 17:22:03'),
(30, '1521033738.jpg', NULL, NULL, '2018-03-14 17:22:18', '2018-03-14 17:22:18'),
(31, '1521033748.jpg', NULL, NULL, '2018-03-14 17:22:28', '2018-03-14 17:22:28'),
(32, '1521033761.jpg', NULL, NULL, '2018-03-14 17:22:41', '2018-03-14 17:22:41'),
(33, '1521033780.jpg', NULL, NULL, '2018-03-14 17:23:00', '2018-03-14 17:23:00'),
(34, '1521033792.jpg', NULL, NULL, '2018-03-14 17:23:12', '2018-03-14 17:23:12'),
(35, '1521034051.jpg', NULL, NULL, '2018-03-14 17:27:31', '2018-03-14 17:27:31'),
(39, '1521034492.jpg', NULL, NULL, '2018-03-14 17:34:52', '2018-03-14 17:34:52'),
(40, '1521038713.jpg', NULL, NULL, '2018-03-14 18:45:13', '2018-03-14 18:45:13'),
(41, '1521038721.jpg', NULL, NULL, '2018-03-14 18:45:22', '2018-03-14 18:45:22'),
(42, '1521038732.jpg', NULL, NULL, '2018-03-14 18:45:32', '2018-03-14 18:45:32'),
(43, '1521041094.jpg', NULL, NULL, '2018-03-14 19:24:54', '2018-03-14 19:24:54'),
(44, '1523900243.jpg', NULL, NULL, '2018-04-16 21:37:23', '2018-04-16 21:37:23'),
(45, '1523905274.jpg', NULL, NULL, '2018-04-16 23:01:14', '2018-04-16 23:01:14'),
(46, '1523905380.jpg', NULL, NULL, '2018-04-16 23:03:00', '2018-04-16 23:03:00'),
(47, '1523905392.jpg', NULL, NULL, '2018-04-16 23:03:12', '2018-04-16 23:03:12'),
(48, '1523905602.jpg', NULL, NULL, '2018-04-16 23:06:42', '2018-04-16 23:06:42'),
(49, '1523907580.jpg', NULL, NULL, '2018-04-16 23:39:40', '2018-04-16 23:39:40'),
(50, '1524233635.jpg', NULL, NULL, '2018-04-20 18:13:55', '2018-04-20 18:13:55'),
(51, '1524233833.jpg', NULL, NULL, '2018-04-20 18:17:13', '2018-04-20 18:17:13'),
(52, '1524237604.jpg', NULL, NULL, '2018-04-20 19:20:04', '2018-04-20 19:20:04'),
(53, '1524237639.jpg', NULL, NULL, '2018-04-20 19:20:39', '2018-04-20 19:20:39'),
(54, '1524237687.jpg', NULL, NULL, '2018-04-20 19:21:27', '2018-04-20 19:21:27'),
(55, '1524237721.jpg', NULL, NULL, '2018-04-20 19:22:01', '2018-04-20 19:22:01'),
(56, '1524238496.jpg', NULL, NULL, '2018-04-20 19:34:56', '2018-04-20 19:34:56'),
(57, '1524238644.jpg', NULL, NULL, '2018-04-20 19:37:24', '2018-04-20 19:37:24'),
(58, '1524239223.jpg', NULL, NULL, '2018-04-20 19:47:03', '2018-04-20 19:47:03'),
(59, '1524239783.jpg', NULL, NULL, '2018-04-20 19:56:23', '2018-04-20 19:56:23'),
(60, '1524239835.jpg', NULL, NULL, '2018-04-20 19:57:15', '2018-04-20 19:57:15'),
(61, '1524239895.jpg', NULL, NULL, '2018-04-20 19:58:15', '2018-04-20 19:58:15'),
(62, '1524239956.jpg', NULL, NULL, '2018-04-20 19:59:16', '2018-04-20 19:59:16'),
(63, '1524433829.jpg', NULL, NULL, '2018-04-23 01:50:29', '2018-04-23 01:50:29'),
(64, '1524433903.jpg', NULL, NULL, '2018-04-23 01:51:43', '2018-04-23 01:51:43'),
(65, '1524434066.jpg', NULL, NULL, '2018-04-23 01:54:26', '2018-04-23 01:54:26'),
(66, '1524434160.jpg', NULL, NULL, '2018-04-23 01:56:00', '2018-04-23 01:56:00'),
(67, '1524434199.jpg', NULL, NULL, '2018-04-23 01:56:39', '2018-04-23 01:56:39'),
(68, '1524434245.jpg', NULL, NULL, '2018-04-23 01:57:25', '2018-04-23 01:57:25'),
(69, '1524434386.jpg', NULL, NULL, '2018-04-23 01:59:46', '2018-04-23 01:59:46'),
(70, '1524434429.jpg', NULL, NULL, '2018-04-23 02:00:29', '2018-04-23 02:00:29'),
(71, '1524434589.jpg', NULL, NULL, '2018-04-23 02:03:09', '2018-04-23 02:03:09'),
(72, '1524444854.jpg', NULL, NULL, '2018-04-23 04:54:14', '2018-04-23 04:54:14'),
(73, '1524775866.jpg', NULL, NULL, '2018-04-27 00:51:06', '2018-04-27 00:51:06'),
(74, '1524775907.png', NULL, NULL, '2018-04-27 00:51:47', '2018-04-27 00:51:47'),
(75, '1524775940.png', NULL, NULL, '2018-04-27 00:52:20', '2018-04-27 00:52:20'),
(76, '1524776030.png', NULL, NULL, '2018-04-27 00:53:50', '2018-04-27 00:53:50'),
(77, '1524776065.png', NULL, NULL, '2018-04-27 00:54:26', '2018-04-27 00:54:26'),
(78, '1524776118.png', NULL, NULL, '2018-04-27 00:55:18', '2018-04-27 00:55:18'),
(79, '1524789640.jpg', NULL, NULL, '2018-04-27 04:40:40', '2018-04-27 04:40:40'),
(80, '1524789786.jpg', NULL, NULL, '2018-04-27 04:43:06', '2018-04-27 04:43:06'),
(81, '1524789849.jpg', NULL, NULL, '2018-04-27 04:44:09', '2018-04-27 04:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_10_05_171610_create_table_team', 1),
(3, '2017_10_05_171614_create_table_person', 1),
(4, '2017_10_05_175707_create_link_table_team_supervisor', 1),
(5, '2017_10_05_185632_create_table_part', 1),
(6, '2017_10_05_185915_create_table_quality', 1),
(7, '2017_10_05_185934_create_table_step', 1),
(8, '2017_10_05_185955_create_table_tool', 1),
(9, '2017_10_05_190006_create_table_material', 1),
(10, '2017_10_05_190027_create_table_fixture', 1),
(11, '2017_10_05_190100_create_table_comment', 1),
(12, '2017_10_05_190110_create_table_note', 1),
(13, '2017_10_05_192552_create_table_media', 1),
(14, '2017_10_05_193008_create_link_table_part_quality', 1),
(15, '2017_10_05_193039_create_link_table_part_step', 1),
(16, '2017_10_05_193052_create_link_table_part_tool', 1),
(17, '2017_10_05_193106_create_link_table_part_material', 1),
(18, '2017_10_05_193124_create_link_table_part_fixture', 1),
(19, '2017_10_05_193136_create_link_table_part_comment', 1),
(20, '2017_10_05_195355_create_link_table_quality_note', 1),
(21, '2017_10_05_195409_create_link_table_step_note', 1),
(22, '2017_10_06_164419_create_link_table_quality_media', 1),
(23, '2017_10_06_164440_create_link_table_note_media', 1),
(24, '2017_10_06_164513_create_link_table_step_media', 1),
(25, '2017_10_06_164525_create_link_table_tool_media', 1),
(26, '2017_10_06_164646_create_link_table_material_media', 1),
(27, '2017_10_06_164658_create_link_table_fixture_media', 1),
(28, '2017_10_06_164710_create_link_table_comment_media', 1),
(29, '2018_02_05_213904_create_table_setup', 2),
(30, '2018_02_07_131124_create_link_table_part_setup', 2),
(31, '2018_02_07_131151_create_link_table_setup_step', 2),
(32, '2017_10_05_171614_create_table_new_users', 3);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_media`
--

CREATE TABLE `note_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `title`, `desc`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Operation 2', 'Operation 2', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(3, 'Operation 3', 'Operation 3', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(4, 'Operation 4', 'Operation 4', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(5, 'Operation 5', 'Operation 5 ', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(6, 'Operation 6', 'Operation 6', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(7, 'Operation 7', 'Operation 7', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(8, 'Operation 8', 'Operation 8', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(9, 'Operation 9', 'Operation 9', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(10, 'Operation 10', 'Operation 10', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(11, 'Operation new 1', NULL, 1, '2018-01-29 19:29:03', '2018-04-20 17:35:46'),
(12, 'Operation 12', 'Operation 12', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(13, 'Operation 13', 'Operation 13', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(14, 'Operation 14', 'Operation 14', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(15, 'Operation 15', 'Operation 15', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(16, 'New operation 46', NULL, 1, '2018-04-16 23:03:00', '2018-04-16 23:03:00'),
(17, 'New operation for Part 46', NULL, 1, '2018-04-16 23:03:12', '2018-04-16 23:03:12'),
(18, 'New operation for Part 46', NULL, 1, '2018-04-16 23:06:42', '2018-04-16 23:06:42'),
(19, 'Jussara\'s Operation', NULL, 1, '2018-04-16 23:39:40', '2018-04-16 23:39:40'),
(20, 'aaaaa', NULL, 1, '2018-04-17 01:42:06', '2018-04-17 01:42:06'),
(21, 'aaaaa', NULL, 1, '2018-04-17 01:43:54', '2018-04-17 01:43:54'),
(22, 'aaaaa', NULL, 1, '2018-04-17 01:55:09', '2018-04-17 01:55:09'),
(23, 'New operation 46', NULL, 1, '2018-04-18 19:07:09', '2018-04-18 19:07:09'),
(24, 'New operation 46', NULL, 1, '2018-04-18 19:10:06', '2018-04-18 19:10:06'),
(25, 'New operation 46', NULL, 1, '2018-04-18 19:13:57', '2018-04-18 19:13:57'),
(26, 'New operation for Part 46', NULL, 1, '2018-04-18 19:38:54', '2018-04-18 19:38:54'),
(28, 'New operation 1000', NULL, 1, '2018-04-20 18:19:29', '2018-04-20 18:19:29'),
(29, 'Planning', NULL, 1, '2018-04-20 19:34:56', '2018-04-20 19:34:56'),
(30, 'Build', NULL, 1, '2018-04-20 19:56:23', '2018-04-20 19:56:23'),
(31, 'Plan Phase', NULL, 1, '2018-04-23 01:54:26', '2018-04-23 01:54:26'),
(32, 'Build Phase', NULL, 1, '2018-04-23 01:58:54', '2018-04-23 01:58:54'),
(33, 'Finish Phase', NULL, 1, '2018-04-23 02:01:48', '2018-04-23 02:01:48'),
(34, 'Cut the Lamber', NULL, 1, '2018-04-26 23:14:46', '2018-04-26 23:14:46'),
(35, 'Measures', NULL, 1, '2018-04-27 00:50:34', '2018-04-27 00:50:34'),
(36, 'Assembly and Building', NULL, 1, '2018-04-27 00:52:46', '2018-04-27 00:52:46'),
(37, 'Finish', NULL, 1, '2018-04-27 00:54:43', '2018-04-27 00:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `operation_media`
--

CREATE TABLE `operation_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `operation_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_media`
--

INSERT INTO `operation_media` (`id`, `operation_id`, `media_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 18, 48, 1, '2018-04-16 23:06:42', '2018-04-16 23:06:42'),
(2, 29, 56, 1, '2018-04-20 19:34:56', '2018-04-20 19:34:56'),
(3, 30, 59, 1, '2018-04-20 19:56:23', '2018-04-20 19:56:23'),
(4, 31, 65, 1, '2018-04-23 01:54:26', '2018-04-23 01:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `operation_step`
--

CREATE TABLE `operation_step` (
  `id` int(10) UNSIGNED NOT NULL,
  `operation_id` smallint(6) NOT NULL,
  `step_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_step`
--

INSERT INTO `operation_step` (`id`, `operation_id`, `step_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(2, 1, 3, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(3, 1, 14, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(4, 1, 5, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(5, 1, 8, 5, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(6, 2, 2, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(7, 2, 3, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(8, 2, 11, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(9, 2, 6, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(10, 3, 4, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(11, 3, 5, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(12, 4, 7, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(13, 4, 8, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(14, 4, 1, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(15, 4, 13, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(16, 5, 9, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(17, 5, 12, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(18, 5, 2, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(19, 5, 14, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(20, 5, 15, 5, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(21, 26, 1, 1, NULL, NULL),
(22, 26, 9, 2, NULL, NULL),
(23, 26, 20, 3, '2018-04-20 18:13:55', '2018-04-20 18:13:55'),
(24, 29, 21, 1, '2018-04-20 19:37:24', '2018-04-20 19:37:24'),
(26, 30, 23, 1, '2018-04-20 19:57:15', '2018-04-20 19:57:15'),
(27, 30, 24, 2, '2018-04-20 19:58:15', '2018-04-20 19:58:15'),
(30, 31, 27, 2, '2018-04-23 01:56:39', '2018-04-23 01:56:39'),
(31, 31, 28, 3, '2018-04-23 01:57:25', '2018-04-23 01:57:25'),
(37, 29, 22, 2, '2018-04-23 02:10:04', '2018-04-23 02:10:04'),
(39, 31, 26, 1, '2018-04-23 02:33:14', '2018-04-23 02:33:14'),
(42, 32, 29, 1, '2018-04-23 02:39:26', '2018-04-23 02:39:26'),
(45, 32, 30, 2, '2018-04-23 02:59:28', '2018-04-23 02:59:28'),
(47, 33, 31, 3, '2018-04-23 03:07:52', '2018-04-23 03:07:52'),
(49, 33, 32, 4, '2018-04-23 03:38:28', '2018-04-23 03:38:28'),
(50, 33, 33, 1, '2018-04-23 04:53:43', '2018-04-23 04:53:43'),
(51, 33, 34, 2, '2018-04-23 04:54:14', '2018-04-23 04:54:14'),
(52, 30, 25, 3, '2018-04-23 05:35:12', '2018-04-23 05:35:12'),
(53, 34, 35, 1, '2018-04-26 23:15:48', '2018-04-26 23:15:48'),
(54, 34, 36, 2, '2018-04-26 23:17:19', '2018-04-26 23:17:19'),
(55, 35, 37, 1, '2018-04-27 00:51:06', '2018-04-27 00:51:06'),
(56, 35, 38, 2, '2018-04-27 00:51:47', '2018-04-27 00:51:47'),
(57, 35, 39, 3, '2018-04-27 00:52:20', '2018-04-27 00:52:20'),
(58, 36, 40, 1, '2018-04-27 00:53:17', '2018-04-27 00:53:17'),
(59, 36, 41, 2, '2018-04-27 00:53:50', '2018-04-27 00:53:50'),
(60, 36, 42, 3, '2018-04-27 00:54:26', '2018-04-27 00:54:26'),
(61, 37, 43, 1, '2018-04-27 00:55:18', '2018-04-27 00:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`id`, `number`, `name`, `desc`, `active`, `category`, `created_at`, `updated_at`) VALUES
(25, '123-456', 'Bench', NULL, 1, 1, '2018-03-14 17:20:38', '2018-03-14 17:20:38'),
(34, '56575', 'Table', NULL, 1, 2, '2018-03-14 17:26:19', '2018-03-14 17:26:19'),
(36, '9999', 'Statue', NULL, 0, 3, '2018-03-20 01:03:40', '2018-04-23 01:23:46'),
(46, '111', 'Part 1', NULL, 0, 2, '2018-03-27 01:42:55', '2018-04-23 01:23:33'),
(47, '222', 'Part 2', NULL, 0, 2, '2018-03-27 01:43:50', '2018-04-23 01:23:40'),
(48, '1111', 'Part 1000', NULL, 0, 1, '2018-03-28 18:07:49', '2018-04-23 01:23:35'),
(49, '1001', 'Part 1001', NULL, 0, 2, '2018-03-28 18:08:54', '2018-04-23 01:23:38'),
(50, '2000', 'Part 2000', NULL, 0, 3, '2018-03-28 18:10:11', '2018-04-23 01:23:43'),
(51, '9999', 'Statue', NULL, 1, 3, '2018-04-02 22:11:21', '2018-04-02 22:11:21'),
(52, '9999', 'Statue', NULL, 0, 3, '2018-04-02 22:12:06', '2018-04-03 00:35:55'),
(53, '000', 'Part 0', NULL, 0, 2, '2018-04-10 00:24:20', '2018-04-10 00:50:27'),
(54, 'aaaa', 'aaa', NULL, 0, 1, '2018-04-10 00:35:12', '2018-04-10 00:35:17'),
(55, '21341', 'Outdoor Table', NULL, 1, 1, '2018-04-20 19:33:44', '2018-04-20 19:39:28'),
(56, '345442', 'Cabinet', NULL, 1, 1, '2018-04-23 01:53:34', '2018-04-23 01:53:34'),
(57, '39072', 'Drawer', NULL, 1, 1, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(58, '7899012', 'Furniture', NULL, 1, 1, '2018-04-27 04:32:44', '2018-04-27 04:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `part_comment`
--

CREATE TABLE `part_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` smallint(6) NOT NULL,
  `comment_id` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `part_fixture`
--

CREATE TABLE `part_fixture` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `part_id` smallint(6) NOT NULL,
  `fixture_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_fixture`
--

INSERT INTO `part_fixture` (`id`, `part_id`, `fixture_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(2, 1, 3, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(3, 2, 2, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(4, 3, 1, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(5, 3, 2, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(6, 3, 3, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(7, 3, 4, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(8, 4, 4, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(9, 4, 3, '2018-01-29 19:22:21', '2018-01-29 19:22:21'),
(12, 20, 1, '2018-03-01 21:10:03', '2018-03-01 21:10:03'),
(13, 20, 2, '2018-03-01 21:10:03', '2018-03-01 21:10:03'),
(14, 21, 1, '2018-03-01 21:10:23', '2018-03-01 21:10:23'),
(15, 21, 2, '2018-03-01 21:10:23', '2018-03-01 21:10:23'),
(16, 22, 1, '2018-03-01 21:10:59', '2018-03-01 21:10:59'),
(17, 22, 2, '2018-03-01 21:10:59', '2018-03-01 21:10:59'),
(18, 23, 1, '2018-03-14 17:04:02', '2018-03-14 17:04:02'),
(19, 24, 2, '2018-03-14 17:05:12', '2018-03-14 17:05:12'),
(20, 24, 3, '2018-03-14 17:05:12', '2018-03-14 17:05:12'),
(21, 51, 6, '2018-04-02 22:11:21', '2018-04-02 22:11:21'),
(22, 52, 6, '2018-04-02 22:12:06', '2018-04-02 22:12:06'),
(23, 36, 6, '2018-04-04 19:34:41', '2018-04-04 19:34:41'),
(25, 55, 8, '2018-04-20 19:33:44', '2018-04-20 19:33:44'),
(26, 56, 9, '2018-04-23 01:53:34', '2018-04-23 01:53:34'),
(27, 25, 7, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(28, 57, 8, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(29, 57, 7, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(30, 58, 9, '2018-04-27 04:32:44', '2018-04-27 04:32:44'),
(31, 58, 8, '2018-04-27 04:32:44', '2018-04-27 04:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `part_material`
--

CREATE TABLE `part_material` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `part_id` smallint(6) NOT NULL,
  `material_id` smallint(6) NOT NULL,
  `quantity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_material`
--

INSERT INTO `part_material` (`id`, `part_id`, `material_id`, `quantity`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(2, 1, 5, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(3, 2, 1, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(4, 2, 2, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(5, 2, 4, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(6, 3, 4, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(7, 4, 3, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(8, 4, 4, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(9, 4, 5, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(10, 5, 1, NULL, NULL, '2018-01-29 19:21:02', '2018-01-29 19:21:02'),
(11, 22, 3, NULL, NULL, '2018-03-01 21:10:59', '2018-03-01 21:10:59'),
(12, 22, 4, NULL, NULL, '2018-03-01 21:10:59', '2018-03-01 21:10:59'),
(13, 23, 4, NULL, NULL, '2018-03-14 17:04:03', '2018-03-14 17:04:03'),
(14, 24, 1, NULL, NULL, '2018-03-14 17:05:12', '2018-03-14 17:05:12'),
(15, 36, 1, NULL, NULL, '2018-03-20 01:03:41', '2018-03-20 01:03:41'),
(16, 36, 7, NULL, NULL, '2018-04-04 19:39:51', '2018-04-04 19:39:51'),
(35, 46, 8, NULL, NULL, '2018-04-10 00:21:38', '2018-04-10 00:21:38'),
(36, 53, 9, NULL, NULL, '2018-04-10 00:24:20', '2018-04-10 00:24:20'),
(37, 55, 10, NULL, NULL, '2018-04-20 19:33:44', '2018-04-20 19:33:44'),
(38, 56, 8, NULL, NULL, '2018-04-23 01:53:34', '2018-04-23 01:53:34'),
(39, 56, 7, NULL, NULL, '2018-04-23 01:53:34', '2018-04-23 01:53:34'),
(40, 56, 11, NULL, NULL, '2018-04-23 01:53:34', '2018-04-23 01:53:34'),
(41, 25, 8, NULL, NULL, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(42, 25, 1, NULL, NULL, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(43, 25, 7, NULL, NULL, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(44, 57, 11, NULL, NULL, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(45, 57, 10, NULL, NULL, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(46, 58, 11, NULL, NULL, '2018-04-27 04:32:44', '2018-04-27 04:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `part_operation`
--

CREATE TABLE `part_operation` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` smallint(6) NOT NULL,
  `operation_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_operation`
--

INSERT INTO `part_operation` (`id`, `part_id`, `operation_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(2, 1, 3, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(3, 1, 14, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(4, 1, 5, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(5, 1, 8, 5, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(6, 2, 2, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(7, 2, 3, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(9, 2, 6, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(10, 3, 4, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(11, 3, 5, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(12, 4, 7, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(13, 4, 8, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(14, 4, 1, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(15, 4, 13, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(16, 5, 9, 1, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(17, 5, 12, 2, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(18, 5, 2, 3, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(19, 5, 14, 4, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(20, 5, 15, 5, '2018-01-29 19:32:05', '2018-01-29 19:32:05'),
(21, 46, 1, 1, NULL, NULL),
(22, 46, 4, 3, NULL, NULL),
(25, 46, 27, 1000, '2018-04-18 19:40:13', '2018-04-18 19:40:13'),
(26, 46, 1, 10, '2018-04-20 17:33:52', '2018-04-20 17:33:52'),
(27, 46, 11, 1, '2018-04-20 17:40:18', '2018-04-20 17:40:18'),
(30, 46, 26, 2, '2018-04-20 17:47:36', '2018-04-20 17:47:36'),
(31, 46, 28, 50, '2018-04-20 18:19:29', '2018-04-20 18:19:29'),
(34, 55, 29, 1, '2018-04-20 19:46:32', '2018-04-20 19:46:32'),
(41, 55, 30, 2, '2018-04-20 20:12:27', '2018-04-20 20:12:27'),
(44, 56, 32, 2, '2018-04-23 01:58:54', '2018-04-23 01:58:54'),
(47, 56, 31, 1, '2018-04-23 02:34:46', '2018-04-23 02:34:46'),
(50, 56, 33, 3, '2018-04-23 05:34:42', '2018-04-23 05:34:42'),
(51, 25, 34, 1, '2018-04-26 23:14:46', '2018-04-26 23:14:46'),
(52, 57, 35, 1, '2018-04-27 00:50:34', '2018-04-27 00:50:34'),
(53, 57, 36, 2, '2018-04-27 00:52:46', '2018-04-27 00:52:46'),
(54, 57, 37, 3, '2018-04-27 00:54:43', '2018-04-27 00:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `part_quality`
--

CREATE TABLE `part_quality` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` smallint(6) NOT NULL,
  `quality_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `part_tool`
--

CREATE TABLE `part_tool` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `part_id` smallint(6) NOT NULL,
  `tool_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_tool`
--

INSERT INTO `part_tool` (`id`, `part_id`, `tool_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(2, 1, 3, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(3, 2, 2, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(4, 2, 3, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(5, 2, 9, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(6, 2, 10, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(7, 3, 5, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(8, 3, 4, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(9, 4, 1, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(10, 5, 10, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(11, 5, 9, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(12, 5, 2, '2018-01-29 19:17:41', '2018-01-29 19:17:41'),
(17, 23, 1, '2018-03-14 17:04:02', '2018-03-14 17:04:02'),
(18, 24, 3, '2018-03-14 17:05:11', '2018-03-14 17:05:11'),
(19, 36, 8, '2018-03-20 01:03:41', '2018-03-20 01:03:41'),
(20, 36, 9, '2018-03-20 01:03:41', '2018-03-20 01:03:41'),
(64, 53, 6, '2018-04-10 00:24:20', '2018-04-10 00:24:20'),
(65, 46, 1, '2018-04-11 19:01:47', '2018-04-11 19:01:47'),
(66, 55, 14, '2018-04-20 19:33:44', '2018-04-20 19:33:44'),
(67, 56, 1, '2018-04-23 01:53:34', '2018-04-23 01:53:34'),
(68, 25, 12, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(69, 25, 1, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(70, 25, 4, '2018-04-26 23:12:39', '2018-04-26 23:12:39'),
(71, 57, 4, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(72, 57, 8, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(73, 57, 6, '2018-04-27 00:50:02', '2018-04-27 00:50:02'),
(74, 58, 6, '2018-04-27 04:32:44', '2018-04-27 04:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.jpg',
  `active` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quality`
--

CREATE TABLE `quality` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quality_media`
--

CREATE TABLE `quality_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `quality_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quality_note`
--

CREATE TABLE `quality_note` (
  `id` int(10) UNSIGNED NOT NULL,
  `quality_id` mediumint(9) NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE `step` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id`, `title`, `desc`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Step 1', 'Step 1 Step 1 Step 1 Step 1 Step 1 Step 1 Step 1 Step 1 Step 1', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(2, 'Step 2', 'Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(3, 'Step 3', 'Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(4, 'Step 4', 'Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(5, 'Step 5', 'Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 ', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(6, 'Step 6', 'Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(7, 'Step 7', 'Step 7 Step 7 Step 7 Step 7 Step 7 Step 7 Step 7 Step 7 Step 7', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(8, 'Step 8', 'Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(9, 'Step 9', 'Step 9 Step 9 Step 9 Step 9 Step 9 Step 9 Step 9 Step 9', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(10, 'Step 10', 'Step 10 Step 10 Step 10 Step 10 Step 10 Step 10 Step 10', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(11, 'Step 11', 'Step 11 Step 11 Step 11 Step 11 Step 11 Step 11 Step 11 Step 11', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(12, 'Step 12', 'Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(13, 'Step 13', 'Step 13 Step 13 Step 13 Step 13 Step 13 Step 13 Step 13 Step 13 Step 13', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(14, 'Step 14', 'Step 14 Step 14 Step 14 Step 14 Step 14 Step 14 Step 14 Step 14', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(15, 'Step 15', 'Step 15 Step 15 Step 15 Step 15 Step 15 Step 15 Step 15 Step 15 Step 15', 1, '2018-01-29 19:29:03', '2018-01-29 19:29:03'),
(16, 'New step2', 'description of the step description of the step description of the step', 0, '2018-03-06 03:14:54', '2018-03-06 03:52:46'),
(17, 'Test new step', 'sdsdsdsdsdsds', 0, '2018-03-07 19:40:26', '2018-03-07 19:44:07'),
(18, 'Test new step', 'New step', 0, '2018-03-07 19:42:02', '2018-03-07 19:43:53'),
(19, 'A new step', 'new step right now', 1, '2018-03-07 20:07:36', '2018-03-07 20:07:36'),
(21, 'Measure', 'These instructions describe a table with surface dimensions about 69\" x 46\" (1.75 x 1.2 meters). You may adjust the same plan to a different size by cutting the boards to a different length, or using fewer boards for the tabletop.', 1, '2018-04-20 19:37:24', '2018-04-20 19:37:24'),
(22, 'Cut the Lumber', 'Cut the lumber for the tabletop. You may use construction-grade lumber if you don\'t mind a rustic look, but choose boards with as little warp as possible. Measure and mark the cut lines first, then cut the lumber with a miter saw. Cut five 2x10 boards to 69 inches (180 cm) in length.', 1, '2018-04-20 19:47:03', '2018-04-20 19:47:03'),
(23, 'Mark the pocket holes', 'Mark the pocket hole locations. For each border between two boards, draw a series of marks along one side, spacing them 8–10 inches (20.3–25.4 cm) apart. This is where you\'ll drill pocket holes to hold the tabletop together. In addition, mark two spots on each end of each board, where you\'ll be attaching breadboard ends.', 1, '2018-04-20 19:57:15', '2018-04-20 19:57:15'),
(24, 'Adjust the Kreg Jig depth.', 'Adjust the jig placement. Manually loosen the screw on the back of the jig so you can move the hole guide. Raise or lower it until set to the 1.5 inch (3.8 cm) mark, then tighten the screw.', 1, '2018-04-20 19:58:15', '2018-04-20 19:58:15'),
(25, 'Drill the pocket holes.', 'Drill the pocket holes. Stand the edge of a board into the Kreg Jig, centered on one of your marks. Drill through the hole on top of the Kreg Jig to make a pocket hole in the board. Repeat with each mark on each board.\r\nIt can help to rest the board on a 3/4\" spacer, to keep it level.\r\nDon\'t forget the marks on the end of each board. Stand the board vertically to drill these.', 1, '2018-04-20 19:59:16', '2018-04-20 19:59:16'),
(26, 'Plan the Build', 'Standard counter depth is 25\", which the cabinets themselves being 24\" to allow for a 1\" countertop lip. Standard counter height is 36\", with the cabinets usually being around 34.5\" tall to allow room for the countertop material. For upper (or wall) cabinets, add 18-20\" to the 36\" counter height. Any space left over between that distance and your ceiling is fair game for upper cabinets. The cabinet width can be anywhere from 12-60\", but always should be made in 3\" increments. The most common sizes are 15\", 18\", 21\", and 24\". Always account for the size of the doors you want and can buy when planning the width of your cabinets.', 1, '2018-04-23 01:56:00', '2018-04-23 01:56:00'),
(27, 'Cut the Sides', 'Cut out the side pieces out of 3/4\" MDF, plywood, or an appropriate type of laminate. As the sides will not be seen, the material appearance does not matter, only the strength and durability. These panels will be 34.5\" high and 24\" wide. Clamp the two sides together and then use a jigsaw to cut a 3x5.5\" toe-kick in one corner of the panels. This will be your bottom front corner.', 1, '2018-04-23 01:56:39', '2018-04-23 01:56:39'),
(28, 'Cut the Bottom', 'The bottom piece will be 24\" deep but the width will depend on the dimensions of your kitchen. Make sure that the width of the bottom section accounts for the width that will be added by the side pieces being added on either side.', 1, '2018-04-23 01:57:25', '2018-04-23 01:57:25'),
(29, 'Join the Base Panels', 'Join the base panels to the bottom. Align and glue the base panels so that one flat face is flush with the back edge of the panel and the other is 3\" back from the front end. Then, using butt joints, screw through the cabinet base and into the edge of the panels. Pilot holes are a good idea here.', 1, '2018-04-23 01:59:46', '2018-04-23 01:59:46'),
(30, 'Nail on a back panel', 'Nail on a back panel. Measure and then screw a 1/2\" plywood back panel into place. A thicker back panel will be needed for wall cabinets, like 3/4\" MDF.', 1, '2018-04-23 02:00:29', '2018-04-23 02:00:29'),
(33, 'Install the doors', 'Install the doors. Install the doors onto the face panels as recommended by their manufacturer. You can also install drawers, but this can become quite complex and is not recommended for a beginner.', 1, '2018-04-23 04:53:43', '2018-04-23 04:53:43'),
(34, 'Place the cabinets', 'Place the cabinets. Place the cabinets in their location. Screw through the back panel and into the wall studs to secure the cabinet it place. Upper cabinets may require more support, such as L brackets (than can be covered up by a backsplash), if you plan to put heavy items such as dishes in the cabinet.', 1, '2018-04-23 04:54:14', '2018-04-23 04:54:14'),
(35, 'Measure and Cut', 'Measure and Cut all the wood and use the orbital sander to clean your wood.', 1, '2018-04-26 23:15:48', '2018-04-26 23:15:48'),
(36, 'Assemble', 'Put everything together with nails, wood glue and use the hammer.', 1, '2018-04-26 23:17:19', '2018-04-26 23:17:19'),
(37, 'Construction Overview', 'Before we get into the details let\'s take a look at a typical drawer box construction. There are many different ways to build drawer boxes, some require special tools and skill while others are are very simple but not very strong or attractive. I think that using pocket hole joinery for drawers achieves a great balance between strength, appearance, cost and ease to build.', 1, '2018-04-27 00:51:06', '2018-04-27 00:51:06'),
(38, 'Choosing Wood', 'Using a separate drawer box and drawer front makes it easier to construct the drawer and provides more flexibility when aligning the drawer front on the cabinet.\r\n\r\nThe drawer consists of 6 main components. The drawer box sides, front and back, the drawer box bottom, the exposed drawer front and the drawer pull. 2 wood screws are used to secure the drawer front to the drawer box, 2 machine screws hold the drawer pull in place.', 1, '2018-04-27 00:51:47', '2018-04-27 00:51:47'),
(39, 'Drawer Box Width', 'I like to measure the opening width after I construct and finish the cabinet carcass. Sometimes things don\'t always go as planned and plywood thickness can vary. By doing this I get a more accurate measurement. I measure not only the front but also at a point in the back and use the smallest measurement if they differ. This is important because with many drawer slides there is very little tolerance.', 1, '2018-04-27 00:52:20', '2018-04-27 00:52:20'),
(40, 'Constrained Height', 'When the height of the drawer opening is constrained it is important to measure the actual opening dimensions. I do this after the cabinet carcass has been assembled and finished. I also measure both sides and in the case of any slight discrepancy I use the smallest measurement. Next it is a matter of allowing for proper top and bottom clearance as detailed in the specifications for the drawer slide.', 1, '2018-04-27 00:53:17', '2018-04-27 00:53:17'),
(41, 'Drawer Box Depth', 'If you\'re cabinets will have overlay drawers, where the drawer front sits in front of the cabinet body as pictured above, take the measured depth of the cabinet and look for a drawer slide that is 1 to 2 inches shorter than that measurement. The size of the drawer slide you selected will determine the length of your outside drawer depth.', 1, '2018-04-27 00:53:50', '2018-04-27 00:53:50'),
(42, 'Cut and Install the Drawer Bottom', 'In our case our inside dimensions are 10\" x 14\" so we\'ll need to cut a 10-3/8\" x 14-3/8\" rectangle out of our 1/4\" plywood. I like to cut it so the direction of the grain runs from left to right when installed in the drawer but this isn\'t that important and will cut in either direction if it makes more efficient use of the plywood.', 1, '2018-04-27 00:54:26', '2018-04-27 00:54:26'),
(43, 'Finishing', 'Before going on to finishing, if you have a router you can ease the edges of the top of the drawer box sides with a round over bit or aggressively sand it to get rid of the sharp edges. \r\n\r\nSand the drawer box with 80 grit, then 120 grit sand paper to smooth out any rough spots or tool marks.', 1, '2018-04-27 00:55:18', '2018-04-27 00:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `step_media`
--

CREATE TABLE `step_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `step_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `step_media`
--

INSERT INTO `step_media` (`id`, `step_id`, `media_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 16, 21, 1, '2018-03-06 03:45:39', '2018-03-06 03:45:39'),
(3, 16, 23, 2, '2018-03-06 03:51:59', '2018-03-06 03:51:59'),
(4, 18, 25, 1, '2018-03-07 19:42:02', '2018-03-07 19:42:02'),
(5, 19, 26, 1, '2018-03-07 20:07:36', '2018-03-07 20:07:36'),
(6, 20, 50, 1, '2018-04-20 18:13:55', '2018-04-20 18:13:55'),
(7, 20, 51, 2, '2018-04-20 18:17:13', '2018-04-20 18:17:13'),
(8, 21, 57, 1, '2018-04-20 19:37:24', '2018-04-20 19:37:24'),
(9, 22, 58, 1, '2018-04-20 19:47:03', '2018-04-20 19:47:03'),
(10, 23, 60, 1, '2018-04-20 19:57:15', '2018-04-20 19:57:15'),
(11, 24, 61, 1, '2018-04-20 19:58:15', '2018-04-20 19:58:15'),
(12, 25, 62, 1, '2018-04-20 19:59:16', '2018-04-20 19:59:16'),
(13, 26, 66, 1, '2018-04-23 01:56:00', '2018-04-23 01:56:00'),
(14, 27, 67, 1, '2018-04-23 01:56:39', '2018-04-23 01:56:39'),
(15, 28, 68, 1, '2018-04-23 01:57:25', '2018-04-23 01:57:25'),
(16, 29, 69, 1, '2018-04-23 01:59:46', '2018-04-23 01:59:46'),
(17, 30, 70, 1, '2018-04-23 02:00:29', '2018-04-23 02:00:29'),
(18, 32, 71, 1, '2018-04-23 02:03:09', '2018-04-23 02:03:09'),
(19, 34, 72, 1, '2018-04-23 04:54:14', '2018-04-23 04:54:14'),
(20, 37, 73, 1, '2018-04-27 00:51:06', '2018-04-27 00:51:06'),
(21, 38, 74, 1, '2018-04-27 00:51:47', '2018-04-27 00:51:47'),
(22, 39, 75, 1, '2018-04-27 00:52:20', '2018-04-27 00:52:20'),
(23, 41, 76, 1, '2018-04-27 00:53:50', '2018-04-27 00:53:50'),
(24, 42, 77, 1, '2018-04-27 00:54:26', '2018-04-27 00:54:26'),
(25, 43, 78, 1, '2018-04-27 00:55:18', '2018-04-27 00:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `step_note`
--

CREATE TABLE `step_note` (
  `id` int(10) UNSIGNED NOT NULL,
  `step_id` mediumint(9) NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_supervisor`
--

CREATE TABLE `team_supervisor` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `team_id` smallint(6) NOT NULL,
  `person_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`id`, `name`, `number`, `desc`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Hammer', '123-345', 'A hammer is a tool or device that delivers a blow to an object. Most hammers are hand tools used to drive nails, fit parts, forge metal, and break apart objects.', 1, '2018-01-24 23:44:10', '2018-01-29 05:01:37'),
(2, 'Mallet', '345-643', 'Mallets come in different types, the most common of which are: Rubber mallets are used when a softer blow is called for than that delivered by a metal hammer.', 0, '2018-01-24 23:44:42', '2018-03-14 17:33:27'),
(3, 'Hacksaw', '356-345', 'A hacksaw is a fine-toothed saw, originally and mainly made for cutting metal. The equivalent saw for cutting wood is usually called bow saw.', 0, '2018-01-24 23:45:16', '2018-03-14 17:33:32'),
(4, 'Screwdriver', '345-234', 'A screwdriver is a tool, manual or powered, for screwing and unscrewing screws. A typical simple screwdriver has a handle and a shaft, ending in a tip the user puts into the screw head before turning the handle.', 1, '2018-01-24 23:45:40', '2018-01-24 23:45:40'),
(5, 'Wire Stripper', '654-533', 'A wire stripper is a small, hand-held device used to strip the electrical insulation from electric wires.', 0, '2018-01-24 23:46:17', '2018-03-14 17:33:42'),
(6, 'Electric Drill', '234-342', 'A drill is a tool fitted with a cutting tool attachment or driving tool attachment, usually a drill bit or driver bit, used for boring holes in various materials or fastening various materials together.', 1, '2018-01-24 23:46:46', '2018-01-24 23:46:46'),
(7, 'Belt Sander', '345-345', 'Belt Sanders are the best!!!', 0, '2018-01-24 23:47:32', '2018-01-29 21:09:50'),
(8, 'Saw', '345-353', 'A saw is a tool consisting of a tough blade, wire, or chain with a hard toothed edge. It is used to cut through material, very often wood.', 1, '2018-01-24 23:48:12', '2018-01-24 23:48:12'),
(9, 'Sandpaper', '245-352', 'Sandpaper is produced in a range of grit sizes and is used to remove material from surfaces, either to make them smoother (for example, in painting and wood finishing), to remove a layer of material (such as old paint).', 1, '2018-01-24 23:49:00', '2018-01-24 23:49:00'),
(10, 'Clamp', '234-253', 'A clamp is a fastening device used to hold or secure objects tightly together to prevent movement or separation through the application of inward pressure.', 0, '2018-01-24 23:51:04', '2018-01-31 22:03:26'),
(11, 'Clara', '123-345', 'Clara is the best tool!', 0, '2018-01-29 21:10:09', '2018-03-14 17:19:52'),
(12, 'Mallet', '756-98B', 'A mallet is a kind of hammer, often made of rubber or sometimes wood, that is smaller than a maul or beetle, and usually has a relatively large head. The term is descriptive of the overall size and proportions of the tool, and not the materials it may be made of, though most mallets have striking faces that are softer than steel.', 1, '2018-03-14 19:20:24', '2018-03-14 19:20:24'),
(13, 'New tool', '9989', 'asa d ss swe', 0, '2018-04-16 21:37:23', '2018-04-16 21:37:53'),
(14, 'Miter Saw', '34234', 'Fundamental tool.', 1, '2018-04-20 19:22:01', '2018-04-20 19:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `tool_media`
--

CREATE TABLE `tool_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `tool_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_media`
--

INSERT INTO `tool_media` (`id`, `tool_id`, `media_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, '2018-01-24 23:50:44', '2018-01-24 23:50:44'),
(11, 10, 15, 2, '2018-01-31 22:03:20', '2018-01-31 22:03:20'),
(12, 6, 27, 2, '2018-03-14 17:20:10', '2018-03-14 17:20:10'),
(13, 3, 28, 2, '2018-03-14 17:20:24', '2018-03-14 17:20:24'),
(14, 1, 29, 1, '2018-03-14 17:22:03', '2018-03-14 17:22:03'),
(15, 2, 30, 2, '2018-03-14 17:22:18', '2018-03-14 17:22:18'),
(16, 9, 31, 2, '2018-03-14 17:22:28', '2018-03-14 17:22:28'),
(17, 8, 32, 2, '2018-03-14 17:22:41', '2018-03-14 17:22:41'),
(18, 4, 33, 2, '2018-03-14 17:23:01', '2018-03-14 17:23:01'),
(19, 5, 34, 2, '2018-03-14 17:23:12', '2018-03-14 17:23:12'),
(20, 12, 43, 1, '2018-03-14 19:24:54', '2018-03-14 19:24:54'),
(21, 13, 44, 1, '2018-04-16 21:37:23', '2018-04-16 21:37:23'),
(22, 14, 55, 1, '2018-04-20 19:22:01', '2018-04-20 19:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.jpg',
  `role` tinyint(4) NOT NULL,
  `assembly_access` tinyint(1) NOT NULL DEFAULT '0',
  `repair_access` tinyint(1) NOT NULL DEFAULT '0',
  `instructions_access` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `password`, `remember_token`, `employee_id`, `phone`, `email`, `photo`, `role`, `assembly_access`, `repair_access`, `instructions_access`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Barbara', 'sasas', '$2y$10$pyHVJfSB7PV3n.H998wgdO83bHYLWSwF7sey0fO/VrE8WN/qaLQj.', 'gsMe2g620lzjp4wuU33wSiAxaxvrHuithgyXM2PpcqkzHEC17W7Ih6FS5dq0', '111111111111', '232323323232', 'jimi@hendrix.ca', 'images/default.jpg', 3, 1, 1, 1, 0, '2018-02-13 02:28:02', '2018-03-14 17:11:00'),
(2, 'Clara', 'The Best', '$2y$10$sItuiz/PAQVZ0JOGomNNVe4H48CmDY7qM7mV52yv8LuN1VB2Tl1ky', 'LLMGAF6LioAi0wTvt0Yaa56JLFUzLReEdmizWk6zt825cBS34kkE3VUpEfIi', '23232323', '12121212121212', 'clara@clara.com', 'images/default.jpg', 3, 0, 0, 0, 0, '2018-02-13 02:56:55', '2018-03-14 17:11:03'),
(3, 'Mauricio', 'Me NEW', '$2y$10$PULC00YX5ooUvhZbNnlRR.IQUeaTLoJT1YJA.by9./ja.vUPuOtvK', 'VUvSveEmhLaRkKALVURF01j7zjoD3WrWkcA9dApcLbDhQy7uv37BRGYgGv1M', '989898989', '232323323232', 'me@email.com', 'images/default.jpg', 3, 1, 1, 0, 0, '2018-02-13 02:57:43', '2018-03-14 17:10:55'),
(4, 'Teste', 'Hidden input', '$2y$10$7AGBBwD21xT0fsgDDduPCeruHM7WqYXwz7Z1IgYeLlozdAHBmZ.6W', 'p3vOqYxpUs1SnRre3cknkDzdvzDgBvFTgc649dVtVpNFjpvsEArYX76keI6X', '00000000', '232323323232', 'hidden@youcantsee.me', 'images/default.jpg', 2, 0, 1, 1, 0, '2018-02-13 03:14:37', '2018-03-14 17:10:48'),
(5, 'Mauricio', 'Silveira', '$2y$10$ClgxpbdLco5CZQWTs4lm0ezLvPna9MgXbCGxAdLKK4hGRQTDVTyaq', 'D0juGrchOGjnpvBKHIhU3bi6tRB5wkogzjkpqOh1dzUqX0CEJF6CbPlojAN2', '111-111', '232323323232', 'mauricio@email.com', 'images/1518716838.jpg', 1, 0, 0, 1, 1, '2018-02-14 18:13:55', '2018-03-14 17:37:42'),
(6, 'New', 'User2', '$2y$10$QIb2xrRvNrUVMc0vLZRH0eOc2FeMu7GDbwQ3qjdrE1ScDDfXSuUwG', 'DW5V5LmnAm74F57JwRdwzWbHuvkXapFb9pvxHeXZbkNsxlxi50e72qteee9K', '00000022', '323232323232', 'newuser2@email.com', 'images/default.jpg', 1, 1, 1, 1, 0, '2018-02-14 19:54:15', '2018-03-14 17:11:05'),
(7, 'clara', 'marshall', '$2y$10$0WuSkUh6/v.h5fF5XQXaZ.nLZ7kX/oBNewgr8CX43Lm54QaJ9/ZWa', NULL, '123', '4164710808', 'clara@claramarshall.com', 'images/default.jpg', 3, 0, 0, 0, 0, '2018-02-14 20:29:18', '2018-03-14 17:10:52'),
(8, 'Test photo', 'Photo', '$2y$10$.N//2JSyPFf1Q1KXt3sABujH.ReaE0EsxfuQX.YU2vG231zy82pU6', NULL, '1111111', '232323323232', 'photo@email.com', 'images/1518714867.jpg', 3, 1, 1, 1, 0, '2018-02-15 22:03:13', '2018-03-14 17:10:57'),
(9, 'John', 'Doe', '$2y$10$EgPoIpHx1jZ5n6Y9Q1VAvOei/LqiXU01z8tnsoH76O10x9wmg6IIe', 'BLl5Wkwg2P8pjkzTX1IY182uC3S5iWqnAbQgM02Zepl31qUxluh1rSUY8OyN', '123-456', '(519) 234-5678', 'john@email.com', 'images/1521033025.jpg', 1, 1, 1, 1, 1, '2018-03-14 17:10:25', '2018-03-14 17:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE `users_old` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Clara', 'claramarshall@rogers.com', '$2y$10$0cyApPyAPSdn/ooZYEjpv.N.bmUKsq6eDx0V.t0CW/50H7qCu5Saa', 'default.jpg', 'DXkXBA12qxy9Mn5ywTjCmtH3R9RB2GkWOn78Rhqnu85vI7zq2yx5v3ukvW9L', '2018-01-24 18:07:53', '2018-01-24 18:07:53'),
(2, 'Barbara', 'email@email.com', '$2y$10$3xooU/fADHPDmT.bF74N0O28GeiQedrbrwoyw5fo2QCiDJiPTigoW', 'default.jpg', 'emwZNtxWj54tGGXmeTmv1zgLI6v8LEVgJxxyExriGaE4BDOb3B3dUIcaFQvl', '2018-01-24 18:11:11', '2018-01-24 18:11:11'),
(3, 'John Doe', 'john@email.com', '$2y$10$kEVqrYPCWWqGhwLDwZkIle9oSxGTuXJmGqornjfnF.jFAbkRPG/yi', 'default.jpg', '2uJvmHaJg96Z6rRMwdaYhNt84smXkEPJZ7P8m3SaDNiNEpMf1pZR5tyRzSDc', '2018-01-24 19:04:27', '2018-01-24 19:04:27'),
(4, 'Johnny Cash', 'johnny@cash.ca', '$2y$10$Cnn4M.LEQQvHghMfQbXBtOq3NFw17HeYQwBW5x/q1KNE0.IdjU4xW', 'default.jpg', 'iknR7QH51HWG02j64hIqWROPgV9q5ZBJhDdnCxeoHaAEBBpC7Z85uETH45i0', '2018-01-24 23:35:07', '2018-01-24 23:35:07'),
(5, 'Clara Marsh', 'clara@email.com', '$2y$10$OP3HrPK/XYmVyG55yRenVOGChW.Kps/UTfCYC.MTzMhQAr8MJxtcW', 'default.jpg', 'm2dCpruOmEE4yRpkUCCAv2mLTFyrqLdjEBCRvxCcmMJdRJK2Q2951RHXW8zr', '2018-01-24 23:42:00', '2018-01-24 23:42:00'),
(6, 'Jimi Hendrix', 'jimi@hendrix.ca', '$2y$10$R8a79TctBnLCZp01Qlxc8eqbODHdJlrSqhu7hboq9u9sYIyeSBLQ6', 'default.jpg', 'DtroSFoCgNUg0wkFPO2YmLF9iCifBJJjXUQLXTuUoChOLpXr5ZOp3YtZCTiy', '2018-01-24 23:44:42', '2018-01-24 23:44:42'),
(7, 'Barbara', 'barbarafrancob@gmail.com', '$2y$10$dWFjTB7JXSbEL6ZTem7C3.Ny5vG3JPNW546hqq3E2XO3afql.5V1S', 'default.jpg', 'flXD9WzvWDhDJdNiIvjRtI7SlmXrzzoiyfvet2L2M9vWJtw0kqrEQl0tsQEM', '2018-01-24 23:49:35', '2018-01-24 23:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_person_foreign` (`person`);

--
-- Indexes for table `comment_media`
--
ALTER TABLE `comment_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixture_media`
--
ALTER TABLE `fixture_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_media`
--
ALTER TABLE `material_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_media`
--
ALTER TABLE `note_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_media`
--
ALTER TABLE `operation_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_step`
--
ALTER TABLE `operation_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_comment`
--
ALTER TABLE `part_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_fixture`
--
ALTER TABLE `part_fixture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_material`
--
ALTER TABLE `part_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_operation`
--
ALTER TABLE `part_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_quality`
--
ALTER TABLE `part_quality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_tool`
--
ALTER TABLE `part_tool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality`
--
ALTER TABLE `quality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality_media`
--
ALTER TABLE `quality_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality_note`
--
ALTER TABLE `quality_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step_media`
--
ALTER TABLE `step_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step_note`
--
ALTER TABLE `step_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_supervisor`
--
ALTER TABLE `team_supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool_media`
--
ALTER TABLE `tool_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_old`
--
ALTER TABLE `users_old`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_media`
--
ALTER TABLE `comment_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixture`
--
ALTER TABLE `fixture`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fixture_media`
--
ALTER TABLE `fixture_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `material_media`
--
ALTER TABLE `material_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_media`
--
ALTER TABLE `note_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `operation_media`
--
ALTER TABLE `operation_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `operation_step`
--
ALTER TABLE `operation_step`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `part_comment`
--
ALTER TABLE `part_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_fixture`
--
ALTER TABLE `part_fixture`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `part_material`
--
ALTER TABLE `part_material`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `part_operation`
--
ALTER TABLE `part_operation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `part_quality`
--
ALTER TABLE `part_quality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_tool`
--
ALTER TABLE `part_tool`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quality`
--
ALTER TABLE `quality`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quality_media`
--
ALTER TABLE `quality_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quality_note`
--
ALTER TABLE `quality_note`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `step_media`
--
ALTER TABLE `step_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `step_note`
--
ALTER TABLE `step_note`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_supervisor`
--
ALTER TABLE `team_supervisor`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tool_media`
--
ALTER TABLE `tool_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_old`
--
ALTER TABLE `users_old`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_person_foreign` FOREIGN KEY (`person`) REFERENCES `person` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
