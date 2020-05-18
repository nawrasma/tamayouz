-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 01:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_en`, `cat_ar`, `cat_desc`, `created_at`, `updated_at`) VALUES
(1, 'Mechatronics', 'مياكاترونيكس', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(2, 'Computers & Automation', 'حواسيب وأتمتة ', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(3, 'Electron', 'الكترون', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(4, 'Telecommunation', 'اتصالات', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(5, 'Industrial Control', 'تحكم صناعي', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(6, 'Mechanics', 'ميكانيك', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(7, 'Informatics', 'المعلوماتية', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(8, 'Biomedical Engineering', 'الهندسة الطبية', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(9, 'Energy', 'الطاقة', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(10, 'Applied', 'تطبيقية', 'this is category description', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(11, 'Information Technology', 'تكنولوجيا المعلومات', 'This is category description ', '2019-12-01 22:00:00', '2019-12-01 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `msg_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg_name`, `msg_email`, `msg_subject`, `msg`, `created_at`, `updated_at`, `name_to`, `type`) VALUES
(1, 'Nawras', 'man_nawras@hotmail.com', 'test Msg', 'Here is test message', '2019-10-20 16:53:29', '2019-10-20 16:53:29', 'Administrator', 'contact'),
(2, 'Aziz', 'aziz96@gmail.com', 'for web note', 'You should read all articales', '2019-10-20 16:55:10', '2019-10-20 16:55:10', 'Administrator', 'contact'),
(3, 'test message', 'test@gmail.com', 'test sub', 'this is test msg', '2019-10-22 16:50:06', '2019-10-22 16:50:06', 'Administrator', 'contact'),
(4, 'Mazen', 'Mazen@gmail.com', 'test Flash message', 'This is test for flash message with helper fun', '2019-10-29 16:06:45', '2019-10-29 16:06:45', 'Administrator', 'contact'),
(5, 'Nezar', 'Nezar@hotmail.com', 'Final Test Flash', 'This is the final test for flash message', '2019-10-29 16:20:58', '2019-10-29 16:20:58', 'Administrator', 'contact'),
(6, 'test2', 'nour@gmail.com', 'test sub1', 'test etset tset set se t', '2019-10-31 06:38:00', '2019-10-31 06:38:00', 'Administrator', 'contact'),
(9, 'Administrator', 'man.nawrasma@gmail.com', 'about your project', 'you should fill all input until move to next step', '2019-12-28 00:21:00', '2019-12-28 00:21:00', '3', 'project'),
(10, '3', 'test232@gmail.com', 'about my project', 'okay, I will fill all input \r\nis there anything more?', '2019-12-29 09:00:41', '2019-12-29 09:00:41', 'Administrator', 'project'),
(13, 'Administrator', 'man.nawrasma@gmail.com', 'about your project', 'nothing but be careful ', '2019-12-30 11:25:00', '2019-12-30 11:25:00', '3', 'project'),
(14, '3', 'test232@gmail.com', 'about my project', 'okay,THanks', '2019-12-31 05:28:00', '2019-12-31 05:28:00', 'Administrator', 'project'),
(15, 'Administrator', 'man_nawras@hotmail.com', 'chat', 'you are welcome', '2019-12-29 10:14:30', '2019-12-29 10:14:30', '3', 'project');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_10_18_210243_create_project_table', 2),
(13, '2019_10_18_210427_create_message_table', 2),
(14, '2019_10_18_210503_create_notification_table', 2),
(15, '2019_10_18_210542_create_list_table', 2),
(16, '2019_12_01_183014_create_user_details_table', 3),
(17, '2019_12_01_190427_create_seasons_table', 3),
(18, '2019_12_01_202106_add_some_columns_to_projects', 4),
(19, '2019_12_02_211753_create_categories_table', 5),
(20, '2019_12_23_174927_rename_lists_table', 6),
(21, '2019_12_25_202152_add_column_to_notification', 7),
(22, '2019_12_28_122438_add_column_to_message', 8),
(23, '2019_12_28_130510_remove_unique_email_message', 9),
(24, '2020_01_07_204910_rename_column_user_details', 10),
(25, '2020_01_12_131533_add_column_to_msg_lists_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `msg_lists`
--

CREATE TABLE `msg_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list_msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_checked` int(11) NOT NULL,
  `list_archeived` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msg_lists`
--

INSERT INTO `msg_lists` (`id`, `list_msg`, `list_checked`, `list_archeived`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'show all projects', 1, 0, '2019-12-18 22:00:00', '2019-12-18 22:00:00', 1),
(2, 'Grade for last Project', 0, 0, '2019-12-08 22:00:00', '2020-01-12 11:43:13', 1),
(18, 'do any thing', 0, 0, '2019-12-23 18:20:53', '2019-12-23 19:24:33', 1),
(21, 'check the website', 0, 0, '2019-12-23 18:25:16', '2019-12-23 19:24:53', 1),
(26, 'test', 0, 0, '2020-01-24 20:07:17', '2020-01-24 20:07:17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noty_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noty_msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `noty_show` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `noty_type`, `noty_msg`, `noty_show`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'message_10', 'there is message from student ', 1, '2019-12-25 03:08:00', '2019-12-29 10:25:01', 1),
(2, 'project_3', 'new project has add in our website', 0, '2019-12-10 09:34:00', '2019-12-26 16:41:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stud_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_domain` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `super_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pro_uni` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_date` date NOT NULL,
  `pro_ppt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_video` int(11) NOT NULL,
  `pro_season` int(11) NOT NULL,
  `pro_responsers` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_grade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_recommend` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `season_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Error reading data for table laravel.projects: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `laravel`.`projects`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `user_id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 'This is season description.\r\niverra. Felis enim feugiat dolore viverra. Dolor pulvinar etiam magna etiam. Etiam vel felis at lorem sed viverra. Felis enim feugiat dolore viverra. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(2, 3, '2', 'This is season description.\r\niverra. Felis enim feugiat dolore viverra. Dolor pulvinar etiam magna etiam. Etiam vel felis at lorem sed viverra. Felis enim feugiat dolore viverra. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2019-12-01 22:00:00', '2019-12-01 22:00:00'),
(4, 4, '3', 'This is season description.\r\niverra. Felis enim feugiat dolore viverra. Dolor pulvinar etiam magna etiam. Etiam vel felis at lorem sed viverra. Felis enim feugiat dolore viverra. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2019-12-01 22:00:00', '2019-12-01 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator ', 'man_nawras@hotmail.com', NULL, '$2y$10$HgSqB0O145UXMiMflRX/Le2EZePbRtTb2Y5iu6GLqoaNHhRATGuXi', 'LZyWNhrWxEIxibbbXEOleI0mGHJHkgkFARQdWQ6dXSzK2QBv6CuenuDceeNK', '2019-10-25 16:48:39', '2020-01-08 15:16:04'),
(2, 'Aziz Abd', 'aziz96@gmail.com', NULL, '$2y$10$2Xhn5QBCaJGpSURaX5K5..6oInVrPNhMV.nuNoGkneZHt.nfk7RXu', NULL, '2019-12-04 19:03:28', '2019-12-04 19:03:28'),
(3, 'Said Mohammed', 'said@gmail.com', NULL, '$2y$12$BrirzJ6lFNXadruaCdM9lu3L7smrpYTSR2oxDywAFnfBztlyzyAQm', NULL, '2020-01-03 04:21:26', '2020-01-03 04:21:26'),
(4, 'Nour Ahmad', 'Nour12@gmail.com', NULL, '$2y$12$lLOgerzlDQ6gu/.LE57It..Xd7RoViWgMA8uBzHq8se.emUyaGoii', NULL, '2020-01-03 06:22:21', '2020-01-03 06:22:21'),
(5, 'Tayseer Mohammad', 'tayseer@gmailcom', NULL, '$2y$10$Oj0nNheZ.WLA1mUC4aYM8eRLgKW6qJ.zGxiwJ9lr2HBTJ5Cg0enwm', NULL, '2020-03-01 11:54:22', '2020-03-01 12:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linked` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `role`, `user_img`, `phone`, `address`, `linked`, `type`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator ', '15785190641.jpg', '+963999075735', 'Syria - Damascus', 'https://www.linkedin.com/in/nawras-mansour-3597499b/', 'Admin', 'BSc in Computer and Automation Engineering,I have 4 years of ecperience . I\'ve never stopped learning during that time\r\n\r\n\r\nInterested in computer technology and the integration between the hardware and software level.\r\n\r\nHighly enthusiastic Engineer welcomes opportunities with interesting challenges. therefore I want to succeed in a stimulating and challenging environment, building the success of the company ,while I experience advanced opportunities', '2019-12-04 21:01:06', '2020-01-08 19:31:04'),
(8, 2, 'Department official', '15758358531.jpg', '+96171456227', 'Lebanon - Beirut', 'www.linkedin.com/in/nawras-mansour-3597499b/', 'manager', 'BSc in Computer and Automation Engineering,I have 4 years of ecperience . I\'ve never stopped learning during that time\r\n\r\n\r\nInterested in computer technology and the integration between the hardware and software level.\r\n\r\nHighly enthusiastic Engineer welcomes opportunities with interesting challenges. therefore I want to succeed in a stimulating and challenging environment, building the success of the company ,while I experience advanced opportunities', '2019-12-08 18:10:53', '2020-01-19 12:48:13'),
(9, 3, 'Department official', '15758358531.jpg', '+963994258789', 'Syria - Damascus', 'http://www.linkedin.com/in/nawras-mansour-3597499b/', 'manager', 'BSc in Computer and Automation Engineering,I have 4 years of ecperience . I\'ve never stopped learning during that time\r\n\r\n\r\nInterested in computer technology and the integration between the hardware and software level.\r\n\r\nHighly enthusiastic Engineer welcomes opportunities with interesting challenges. therefore I want to succeed in a stimulating and challenging environment, building the success of the company ,while I experience advanced opportunities', '2020-01-03 01:19:46', '2020-01-03 01:19:46'),
(10, 4, 'Department official', '15758358531.jpg', '+9630933751456', 'Syria - Damascus', '//:www.linkedin.com/in/nawras-mansour-3597499b/', 'manager', 'BSc in Computer and Automation Engineering,I have 4 years of ecperience . I\'ve never stopped learning during that time\r\n\r\n\r\nInterested in computer technology and the integration between the hardware and software level.\r\n\r\nHighly enthusiastic Engineer welcomes opportunities with interesting challenges. therefore I want to succeed in a stimulating and challenging environment, building the success of the company ,while I experience advanced opportunities', '2020-01-03 08:26:15', '2020-01-03 08:26:15'),
(11, 5, 'Automation Engineering', '15830715691.jpg', '+9639990755', 'Syria-Damascus', 'http://linkedin,com/TayseerMohammad', 'student', 'this is a description of me \r\nthere is everything vision goals and skills', '2020-03-01 12:06:09', '2020-03-01 12:38:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg_lists`
--
ALTER TABLE `msg_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_pro_email_unique` (`pro_email`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_linked_unique` (`linked`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `msg_lists`
--
ALTER TABLE `msg_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
