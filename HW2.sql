-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 11:43 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hw`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_25_075120_create_pokes_table', 1),
('2016_09_25_075138_create_trainers_table', 1),
('2016_09_27_052227_create_poke_trainer_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pokes`
--

CREATE TABLE IF NOT EXISTS `pokes` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pokes`
--

INSERT INTO `pokes` (`id`, `name`) VALUES
(1, 'Bulbasaur'),
(4, 'Charmander'),
(5, 'Charmeleon'),
(2, 'Ivysaur'),
(7, 'Pikachu'),
(3, 'Venusaur');

-- --------------------------------------------------------

--
-- Table structure for table `poke_trainer`
--

CREATE TABLE IF NOT EXISTS `poke_trainer` (
`id` int(10) unsigned NOT NULL,
  `poke_id` int(10) unsigned NOT NULL,
  `trainer_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poke_trainer`
--

INSERT INTO `poke_trainer` (`id`, `poke_id`, `trainer_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 3, 1),
(6, 4, 1),
(8, 5, 1),
(9, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
`id` int(10) unsigned NOT NULL,
  `hometown` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `hometown`, `user_id`) VALUES
(1, 'Los Angeles', 1),
(2, 'Los Angeles', 2),
(3, 'Los Angeles', 3),
(4, 'Los Angeles', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nurse Joy', 'nursejoy@usc.edu', '$2y$10$H6hNoHVcqurX4wEKlhT1seyf9FqHIYKdi8T.McUEaBGSU7WeAchfS', 1, 'mfu6FYEaq4eXTyEkbmjgGYb9AWyTzbuY3gkmSryJxVRPCnDbE9fzAlc3HtoR', '2016-09-27 12:42:30', '2016-09-27 13:41:46'),
(2, 'Professor Oak', 'professoroak@usc.edu', '$2y$10$.v6b9lcQbcLXQgoRWDvcdeYaeBI9PoHjFVhWheaQPmjE4ohtPRMF.', 1, '', '2016-09-27 12:42:30', '2016-09-27 12:42:30'),
(3, 'Meiyi Yang', 'meiyiyan@usc.edu', '$2y$10$CASrV6lzJwy64ZnjA708GOKZJ4IfDw1mt4gzJHZIBKfIOYUHDOB42', 0, 'DnY92pVNs3R6RV4Zo1tZ9dIiTBXjWiX9MZHvvBre40vDhiNZkDQIyY8STB1e', '2016-09-27 12:42:30', '2016-09-27 13:28:43'),
(4, 'Maggie Yang', 'meiyiyan2@usc.edu', '$2y$10$UEOlfSu138X2E8QhGo9Ak.3qfYQCIbMt1UrSYqrqnJiLfjxh0uPGK', 0, '', '2016-09-27 12:42:30', '2016-09-27 12:42:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pokes`
--
ALTER TABLE `pokes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pokes_name_unique` (`name`);

--
-- Indexes for table `poke_trainer`
--
ALTER TABLE `poke_trainer`
 ADD PRIMARY KEY (`id`), ADD KEY `poke_trainer_poke_id_foreign` (`poke_id`), ADD KEY `poke_trainer_trainer_id_foreign` (`trainer_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
 ADD PRIMARY KEY (`id`), ADD KEY `trainers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokes`
--
ALTER TABLE `pokes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `poke_trainer`
--
ALTER TABLE `poke_trainer`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `poke_trainer`
--
ALTER TABLE `poke_trainer`
ADD CONSTRAINT `poke_trainer_poke_id_foreign` FOREIGN KEY (`poke_id`) REFERENCES `pokes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `poke_trainer_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
ADD CONSTRAINT `trainers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
