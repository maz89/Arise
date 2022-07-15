-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2022 at 05:31 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arise_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

DROP TABLE IF EXISTS `apartments`;
CREATE TABLE IF NOT EXISTS `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nb_rooms` int(11) DEFAULT NULL,
  `num_apartment` int(11) DEFAULT NULL,
  `building_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arrivals`
--

DROP TABLE IF EXISTS `arrivals`;
CREATE TABLE IF NOT EXISTS `arrivals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_arrival` date DEFAULT NULL,
  `flight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_arrival` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arrivals`
--

INSERT INTO `arrivals` (`id`, `date_arrival`, `flight`, `time_arrival`, `border`, `traveler_id`, `status`, `created_at`, `updated_at`) VALUES
(2, '2022-07-10', 'AIR  IVOIRE', '12h15', 'GHANA', 64, 2, '2022-07-09 18:52:44', '2022-07-09 18:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `position_id` bigint(20) DEFAULT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `is_manager` smallint(6) DEFAULT NULL,
  `is_encours` smallint(6) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

DROP TABLE IF EXISTS `bands`;
CREATE TABLE IF NOT EXISTS `bands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_infos`
--

DROP TABLE IF EXISTS `bank_infos`;
CREATE TABLE IF NOT EXISTS `bank_infos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rib` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
CREATE TABLE IF NOT EXISTS `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_manager` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_manager` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_manager` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `code`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IZ', 'Industrial Zone', 1, '2022-07-06 11:22:33', '2022-07-06 11:22:33'),
(2, 'ICD', 'ICD', 1, '2022-07-06 20:44:08', '2022-07-06 20:45:00'),
(3, 'TEXTILE', 'TEXTILE', 1, '2022-07-06 20:46:15', '2022-07-06 20:46:15'),
(4, 'Supply Chain', 'Supply Chain', 1, '2022-07-06 20:47:03', '2022-07-06 20:47:03'),
(5, 'AVC', 'AVC', 1, '2022-07-06 20:47:54', '2022-07-06 20:47:54'),
(6, 'SEQUOIA', 'SEQUOIA', 1, '2022-07-06 20:50:15', '2022-07-06 20:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

DROP TABLE IF EXISTS `continents`;
CREATE TABLE IF NOT EXISTS `continents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`id`, `libelle`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Africa', 1, '2022-07-06 11:18:03', '2022-07-06 11:18:03'),
(2, 'Asia', 1, '2022-07-06 21:13:47', '2022-07-06 21:13:47'),
(3, 'Europa', 1, '2022-07-06 21:14:01', '2022-07-06 21:14:01'),
(4, 'America', 1, '2022-07-06 21:14:14', '2022-07-06 21:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status_contract` smallint(6) DEFAULT NULL,
  `contract_type_id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `date_start`, `date_end`, `status_contract`, `contract_type_id`, `employe_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-07-05', '2022-07-10', 1, 2, 271, 1, '2022-07-08 07:47:57', '2022-07-08 07:47:57'),
(2, '2022-07-04', '2022-07-12', 1, 1, 276, 1, '2022-07-08 08:01:56', '2022-07-11 09:04:33'),
(3, '2022-07-05', '2022-07-20', 1, 1, 276, 1, '2022-07-11 09:05:09', '2022-07-11 09:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

DROP TABLE IF EXISTS `contract_types`;
CREATE TABLE IF NOT EXISTS `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FIXED-TERM CONTRACT', 1, '2022-07-07 12:00:36', '2022-07-07 12:00:36'),
(2, 'Intern', 1, '2022-07-07 12:00:52', '2022-07-07 12:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `continent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `libelle`, `nationality`, `region_id`, `continent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Togo', 'Togolese', 1, 1, 1, '2022-07-06 11:19:07', '2022-07-06 11:19:07'),
(2, 'India', 'indian', 6, 2, 1, '2022-07-06 21:17:47', '2022-07-06 21:17:47'),
(3, 'Dubai', 'Dubai', 5, 2, 1, '2022-07-06 21:18:34', '2022-07-06 21:18:34'),
(4, 'Nigeria', 'Nigerian', 2, 1, 1, '2022-07-06 21:19:27', '2022-07-06 21:19:27'),
(5, 'Gabon', 'Gabonian', 2, 1, 1, '2022-07-06 21:19:52', '2022-07-06 21:19:52'),
(6, 'France', 'France', 4, 3, 1, '2022-07-06 21:20:20', '2022-07-06 21:20:20'),
(7, 'Senegal', 'Senegal', 2, 1, 1, '2022-07-06 21:21:47', '2022-07-06 21:21:47'),
(8, 'Cameroon', 'Cameroon', 2, 1, 1, '2022-07-06 21:22:11', '2022-07-06 21:22:11'),
(9, 'Ghana', 'Ghana', 2, 1, 1, '2022-07-06 21:22:30', '2022-07-06 21:22:30'),
(10, 'Kenya', 'kenya', 2, 1, 1, '2022-07-06 21:22:53', '2022-07-06 21:22:53'),
(11, 'Benin', 'Beninese', 2, 1, 1, '2022-07-06 21:23:23', '2022-07-07 11:27:03'),
(12, 'Britanique', 'Britanique', 4, 3, 1, '2022-07-06 21:24:24', '2022-07-06 21:24:24'),
(13, 'Ivory Coast', 'Ivorian', 2, 1, 1, '2022-07-07 11:19:33', '2022-07-07 11:19:33'),
(14, 'Burkina Faso', 'Burkinabe', 2, 1, 1, '2022-07-07 11:24:32', '2022-07-07 11:24:32'),
(15, 'Central African Republic', 'Central African', 2, 1, 1, '2022-07-07 11:35:34', '2022-07-07 11:35:34'),
(16, 'Congo', 'Congolese', 2, 1, 1, '2022-07-07 11:36:18', '2022-07-07 11:36:18'),
(17, 'Tunisia', 'Tunisian', 2, 1, 1, '2022-07-07 11:36:55', '2022-07-07 11:36:55'),
(18, 'Serbia', 'Serbian', 4, 3, 1, '2022-07-07 11:37:33', '2022-07-07 11:37:33'),
(19, 'USA', 'American', 3, 4, 1, '2022-07-07 11:38:30', '2022-07-07 11:38:30'),
(20, 'Niger', 'Niger', 2, 1, 1, '2022-07-07 11:39:03', '2022-07-07 11:39:03'),
(21, 'China', 'Chinese', 5, 2, 1, '2022-07-07 11:39:26', '2022-07-07 11:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `coutumes`
--

DROP TABLE IF EXISTS `coutumes`;
CREATE TABLE IF NOT EXISTS `coutumes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefecture_id` bigint(20) UNSIGNED NOT NULL,
  `countrie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `continent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coutumes`
--

INSERT INTO `coutumes` (`id`, `libelle`, `prefecture_id`, `countrie_id`, `region_id`, `continent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ewe', 1, 1, 1, 1, 1, '2022-07-06 11:21:31', '2022-07-06 11:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
CREATE TABLE IF NOT EXISTS `departements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IT', 1, '2022-07-06 11:21:50', '2022-07-06 11:22:06'),
(2, 'HR', 1, '2022-07-07 11:40:20', '2022-07-07 11:40:20'),
(3, 'Legal', 1, '2022-07-07 11:40:30', '2022-07-07 11:40:30'),
(4, 'Admin', 1, '2022-07-07 11:40:42', '2022-07-07 11:40:42'),
(5, 'Finance', 1, '2022-07-07 11:40:53', '2022-07-07 11:40:53'),
(6, 'Procurment', 1, '2022-07-07 11:41:07', '2022-07-07 11:41:07'),
(7, 'Construction', 1, '2022-07-07 11:44:22', '2022-07-07 11:44:22'),
(8, 'Marketing', 1, '2022-07-07 11:45:07', '2022-07-07 11:45:07'),
(9, 'HSE', 1, '2022-07-07 11:47:57', '2022-07-07 11:47:57'),
(10, 'Operation', 1, '2022-07-07 11:58:51', '2022-07-07 11:58:51'),
(11, 'PCH', 1, '2022-07-07 12:38:49', '2022-07-07 12:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `departures`
--

DROP TABLE IF EXISTS `departures`;
CREATE TABLE IF NOT EXISTS `departures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_departure` date DEFAULT NULL,
  `flight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_departure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE IF NOT EXISTS `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `libelle`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Covid  19', 1, '2022-07-11 10:23:56', '2022-07-11 10:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drives`
--

DROP TABLE IF EXISTS `drives`;
CREATE TABLE IF NOT EXISTS `drives` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_id` bigint(20) DEFAULT NULL,
  `driver_id` bigint(20) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricule` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usual_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_date_correct` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  `is_contrat` smallint(6) DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_perso` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_pro` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perso` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pro` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_cnss` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_policy` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civile` smallint(6) DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_id` bigint(20) DEFAULT NULL,
  `categorie_id` bigint(20) DEFAULT NULL,
  `former_employer_id` bigint(20) DEFAULT NULL,
  `continent_id` bigint(20) DEFAULT NULL,
  `region_id` bigint(20) DEFAULT NULL,
  `countrie_id` bigint(20) DEFAULT NULL,
  `prefecture_id` bigint(20) DEFAULT NULL,
  `coutume_id` bigint(20) DEFAULT NULL,
  `band_id` bigint(20) DEFAULT NULL,
  `niveau_id` bigint(20) DEFAULT NULL,
  `contract_type_id` bigint(20) DEFAULT NULL,
  `departement_id` bigint(20) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `position_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=284 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `matricule`, `first_name`, `last_name`, `usual_name`, `emergency_contact`, `birth_date`, `birth_date_correct`, `date_debut`, `date_fin`, `gender`, `type`, `is_contrat`, `address`, `password`, `phone_perso`, `phone_pro`, `email_perso`, `email_pro`, `num_cnss`, `num_policy`, `civile`, `photo`, `contract_id`, `categorie_id`, `former_employer_id`, `continent_id`, `region_id`, `countrie_id`, `prefecture_id`, `coutume_id`, `band_id`, `niveau_id`, `contract_type_id`, `departement_id`, `business_id`, `position_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '600000', 'Tushar Shridar', 'KHAIRNAR', 'Tushar', NULL, '1980-06-22', '1980-06-22', '2020-07-01', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '561538', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(2, '600001', 'Yingjuan Beatrice', 'NIE', 'Beatrice', NULL, '1996-01-03', '1996-01-03', '2020-07-01', NULL, 2, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '561537', NULL, 2, NULL, NULL, NULL, NULL, 2, 5, 21, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(3, '600002', 'Venu Gopal', 'RAO', 'Venu', NULL, '1976-06-06', '1976-06-06', '2020-07-01', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '561536', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(4, '600003', 'Pawan', 'KUMAR', 'Pawan', NULL, '1980-06-25', '1980-06-25', '2020-08-01', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '579083', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(5, '600005', 'Kalimou', 'GOUNTENI', 'Kalimou', NULL, '1983-05-28', '1983-05-28', '2020-09-14', NULL, 1, 1, NULL, 'Legbassito', NULL, NULL, NULL, NULL, NULL, '282190', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(6, '600006', 'Kossi Ngnidabe', 'DJAMOUSSA', 'Djamoussa', NULL, '1992-11-01', '1992-11-01', '2020-08-27', NULL, 1, 1, NULL, 'Agbalepedo', NULL, NULL, NULL, NULL, NULL, '381043', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(7, '600009', 'Frank', 'OWUSU - ANSAH', 'Frank', NULL, '1974-01-25', '1974-01-25', '2020-09-15', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '579082', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, 9, NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(8, '600012', 'Swapnil', 'THETE', 'Swapnil', NULL, '1991-11-23', '1991-11-23', '2020-09-14', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '634467', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(9, '600013', 'Mariama', 'ALOU', 'Mariama', NULL, '1982-11-03', '1982-11-03', '2020-11-02', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '406405', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, 20, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(10, '600014', 'Eli', 'DJONDO', 'Eli', NULL, '1981-05-04', '1981-05-04', '2020-11-02', NULL, 1, 1, NULL, 'Kégué', NULL, NULL, NULL, NULL, NULL, '283442', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(11, '600015', 'Sachin', 'GAWDE', 'Sachin', NULL, '1979-07-30', '1979-07-30', '2020-11-02', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '580596', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(12, '600016', 'Jesse', 'DAMSKY', 'Jesse', NULL, '1980-03-30', '1980-03-30', '2020-11-15', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '680538', NULL, 1, NULL, NULL, NULL, NULL, 4, 3, 19, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(13, '600017', 'Sivasankara Reddy', 'KANTCHARLA', 'Shankar', NULL, '1985-08-10', '1985-08-10', '2020-08-25', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '578287', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(14, '600019', 'Adindu Charles', 'UZOWANNE', 'Charles', NULL, '1981-12-28', '1981-12-28', '2020-11-09', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '579086', NULL, 1, NULL, NULL, NULL, NULL, 1, 3, 4, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(15, '600021', 'Reginald', 'ZOUNON', 'Reginald', NULL, '1991-02-15', '1991-02-15', '2020-12-13', NULL, 1, 1, NULL, 'Hedzranawoe', NULL, NULL, NULL, NULL, NULL, '467221', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(16, '600023', 'Gaurav', 'AWASTHI', 'Gaurav', NULL, '1985-11-24', '1985-11-24', '2021-01-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '579084', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(17, '600024', 'Milap', 'SUBA', 'Milap', NULL, '1980-12-31', '1980-12-31', '2021-01-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '579167', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(18, '600025', 'Christelle', 'Kunakey', 'Christelle', NULL, '1989-07-15', '1989-07-15', '2020-12-21', NULL, 2, 1, NULL, 'Baguida', NULL, NULL, NULL, NULL, NULL, '468467', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(19, '600026', 'Ibrahima', 'BEYE', 'Ibrahima', NULL, '1988-10-02', '1988-10-02', '2021-01-04', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '415761', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(20, '600027', 'Cedric', 'HUNLEDE', 'Cedric', NULL, '1983-11-08', '1983-11-08', '2021-02-01', NULL, 1, 1, NULL, 'Attiegou', NULL, NULL, NULL, NULL, NULL, '319213', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(21, '600028', 'Foli', 'AMAH', 'Foli', NULL, '1989-03-09', '1989-03-09', '2021-02-01', NULL, 1, 1, NULL, 'Kegue', NULL, NULL, NULL, NULL, NULL, '596530', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(22, '600029', 'Abel', 'PAKAMEY', 'Abel', NULL, '1994-05-09', '1994-05-09', '2021-03-01', NULL, 1, 1, NULL, 'Kegue', NULL, NULL, NULL, NULL, NULL, '597929', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(23, '600031', 'Mathilde', 'HONYIGLO', 'Mathilde', NULL, '1995-03-14', '1995-03-14', '2021-03-15', NULL, 2, 1, NULL, 'Avedji', NULL, NULL, NULL, NULL, NULL, '597921', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(24, '600032', 'Girish', 'MAHAJAN', 'Girish', NULL, '1969-05-29', '1969-05-29', '2021-04-05', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '597926', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, 7, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(25, '600033', 'Aboudala', 'Sidi-Issah', 'Sidi', NULL, '1987-10-17', '1987-10-17', '2021-04-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '363610', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 8, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(26, '600034', 'Géraud', 'TIOU', 'Tiou', NULL, '1995-10-13', '1995-10-13', '2021-04-01', NULL, 1, 1, NULL, 'Agoe Panou', NULL, NULL, NULL, NULL, NULL, '429616', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 9, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(27, '600035', 'Carole', 'TRENOU', 'Carole', NULL, '1978-06-24', '1978-06-24', '2021-04-01', NULL, 2, 1, NULL, 'Ablogamé', NULL, NULL, NULL, NULL, NULL, '512926', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 3, 10, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(28, '600036', 'Bertin', 'ABIASSI', 'Bertin', NULL, '1968-09-04', '1968-09-04', '2021-04-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '598137', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 3, 11, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(29, '600037', 'Dora', 'BOUKARI', 'Dora', NULL, '1986-03-03', '1986-03-03', '2021-04-01', NULL, 2, 1, NULL, 'Agoe Sogbossito', NULL, NULL, NULL, NULL, NULL, '343837', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 2, NULL, NULL, 2, 12, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(30, '600039', 'Kpatcha Jean-Pierre', 'KOUMAÏ', 'Jean-Pierre', NULL, '1979-10-26', '1979-10-26', '2021-05-04', NULL, 1, 1, NULL, 'Sagbado', NULL, NULL, NULL, NULL, NULL, '292736', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(31, '600040', 'Synthia', 'AMAVI-AYIKOUE', 'Synthia', NULL, '1987-12-31', '1987-12-31', '2021-05-25', NULL, 2, 1, NULL, 'Djidjole', NULL, NULL, NULL, NULL, NULL, '597924', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 3, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(32, '600041', 'Boubacar', 'DIALLO', 'Boubacar', NULL, '1973-05-03', '1973-05-03', '2021-05-17', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '597927', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, 7, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(33, '600042', 'Pafio', 'BYLL', 'Pafio', NULL, '1984-04-09', '1984-04-09', '2021-05-19', NULL, 1, 1, NULL, 'Djidjolé', NULL, NULL, NULL, NULL, NULL, '373456', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 13, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(34, '600044', 'Shiva', 'SIMHA', 'shiva', NULL, '1972-01-01', '1972-01-01', '2021-06-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '621734', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(35, '600045', 'Rajendra Pratap', 'SINGH', 'Rajendra', NULL, '1970-01-07', '1970-01-07', '2021-06-25', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '621821', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(36, '600046', 'Sandesh', 'GUPTA', 'Sandesh', NULL, '1971-08-13', '1971-08-13', '2021-06-01', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '621732', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(37, '600052', 'Dominique', 'NYAZOZO', 'Dominique', NULL, '1987-06-20', '1987-06-20', '2021-05-24', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '334658', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, 14, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(38, '600053', 'Mohamed', 'SOUMANOU', 'Mohamed', NULL, '1986-07-30', '1986-07-30', '2021-05-24', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '345861', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(39, '600054', 'Edwige', 'MOGBANTE DABONTIN', 'Edwige', NULL, '1994-07-02', '1994-07-02', '2021-06-04', NULL, 2, 1, NULL, 'Agoe Sogbossito', NULL, NULL, NULL, NULL, NULL, '609234', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(40, '600055', 'Napo', 'FARE', 'Napo', NULL, '1990-01-01', '1990-01-01', '2021-06-07', NULL, 1, 1, NULL, 'Adidoadin', NULL, NULL, NULL, NULL, NULL, '350431', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(41, '600066', 'Milind', 'BHORTAKKE', 'Milind', NULL, '1966-04-17', '1966-04-17', '2021-06-25', NULL, 1, 2, NULL, 'Sogbossito', NULL, NULL, NULL, NULL, NULL, '621824', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(42, '600067', 'Anand', 'RAJAGURU', 'Anand', NULL, NULL, NULL, '2021-08-16', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(43, '600068', 'Senam Kwami D', 'DOGBE', 'Sénam', NULL, '1986-05-03', '1986-05-03', '2021-12-15', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '619615', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(44, '600070', 'Sewa', 'HOUNDJOE', 'Sewa', NULL, '1981-06-06', '1981-06-06', '2021-06-17', NULL, 1, 1, NULL, 'Adidogomé', NULL, NULL, NULL, NULL, NULL, '293126', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(45, '600072', 'Omkar', 'SUTAR', 'Omkar', NULL, '1988-07-31', '1988-07-31', '2021-07-05', NULL, 1, 2, NULL, 'Agoe Assiyeye', NULL, NULL, NULL, NULL, NULL, '622564', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(46, '600073', 'Sriramulu', 'KANNAPPAN', 'Sriramulu', NULL, '1971-12-07', '1971-12-07', '2021-07-12', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '645074', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(47, '600074', 'Govindaraj', 'VELUMANI', 'Govindaraj', NULL, '1964-06-24', '1964-06-24', '2021-07-12', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '622561', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(48, '600075', 'David', 'GBADJI', 'David', NULL, '1986-04-30', '1986-04-30', '2021-07-06', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '354634', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(49, '600076', 'Spring', 'AHOLOU', 'Spring', NULL, '1994-03-18', '1994-03-18', '2021-09-01', NULL, 2, 1, NULL, 'Adetikope WellCity', NULL, NULL, NULL, NULL, NULL, '400489', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(50, '600077', 'Boris', 'POULIKI', 'Boris', NULL, '1987-02-07', '1987-02-07', '2021-08-16', NULL, 1, 1, NULL, 'Bé-Klikamé', NULL, NULL, NULL, NULL, NULL, '401178', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(51, '600078', 'Gloria', 'MUSINDE', 'Gloria', NULL, '1994-04-20', '1994-04-20', '2022-01-31', NULL, 2, 1, NULL, 'Agoe', NULL, NULL, NULL, NULL, NULL, '611677', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(52, '600080', 'Abdoukarime', 'YANDJA', 'Abdoukarime', NULL, '1998-12-19', '1998-12-19', '2021-06-18', NULL, 1, 1, NULL, 'Attiégouvi', NULL, NULL, NULL, NULL, NULL, '605990', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(53, '600081', 'Madje', 'HUNLEDE', 'Madjé', NULL, '1984-11-29', '1984-11-29', '2021-01-06', NULL, 2, 1, NULL, 'Kégué Zogbedji', NULL, NULL, NULL, NULL, NULL, '407314', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(54, '600084', 'Sunil', 'MISTRY', 'Sunil', NULL, '1983-08-24', '1983-08-24', '2021-08-09', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622566', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(55, '600085', 'Sankar', 'GANESSAN', 'Sankar', NULL, '1982-05-30', '1982-05-30', '2021-08-09', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622562', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(56, '600088', 'JAGADISH', 'PATNAIK BEHARA', 'JAGADISH', NULL, '1985-10-21', '1985-10-21', '2021-08-15', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648179', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(57, '600095', 'Eli', 'AWOMA', 'Eli', NULL, '1995-01-28', '1995-01-28', '2021-08-30', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '635866', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(58, '600104', 'Arun', 'KONDAJI', 'Arun', NULL, '1994-06-10', '1994-06-10', '2021-09-15', NULL, 1, 2, NULL, 'Yokoe', NULL, NULL, NULL, NULL, NULL, '667753', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(59, '600105', 'Ana', 'MAKIC', 'Ana', NULL, '1977-11-04', '1977-11-04', '2021-09-01', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '674379', NULL, 2, NULL, NULL, NULL, NULL, 3, 4, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(60, '600106', 'Ganesh', 'REDDY', 'Ganesh', NULL, '1967-06-01', '1967-06-01', '2021-08-16', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(61, '600107', 'Eglina', 'ABBI TOYI', 'Eglina', NULL, '1996-10-25', '1996-10-25', '2021-09-13', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648189', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(62, '600108', 'Sohoume', 'AGBEKO', 'Sohoume', NULL, '1991-03-14', '1991-03-14', '2021-09-01', NULL, 1, 1, NULL, 'Avedji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(63, '600109', 'Sitsopedem', 'NKUAKOO', 'Sitsopedem', NULL, '1986-03-04', '1986-03-04', '2021-09-01', NULL, 1, 1, NULL, 'Adidogomé', NULL, NULL, NULL, NULL, NULL, '422434', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(64, '600110', 'Yaovi Assion', 'GNAHOUAMEY', 'Gnahouamey', NULL, '1992-05-28', '1992-05-28', '2021-09-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '443340', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(65, '600111', 'Abdou Malik', 'ALASSANI', 'Alassani', NULL, '1989-06-27', '1989-06-27', '2021-09-13', NULL, 1, 1, NULL, 'Dabarakondji', NULL, NULL, NULL, NULL, NULL, '578934', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(66, '600112', 'Manamantey', 'TAKELEY', 'Takeley', NULL, '1987-07-19', '1987-07-19', '2021-09-13', NULL, 1, 1, NULL, 'Agoè-zongo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(67, '600113', 'Ayao Tata', 'KUEGAH-TOYO', 'Gilbert', NULL, '1990-06-07', '1990-06-07', '2021-09-01', NULL, 1, 1, NULL, 'Agoe-Assiyeye', NULL, NULL, NULL, NULL, NULL, '390537', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(68, '600114', 'Wake Yves', 'GUITCHA', 'Yves', NULL, '1971-05-18', '1971-05-18', '2021-09-06', NULL, 1, 1, NULL, 'Kegue Nasod', NULL, NULL, NULL, NULL, NULL, '324236', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(69, '600115', 'Yao Mawuli', 'SEDEDJI', 'Sededji', NULL, '1981-05-28', '1981-05-28', '2021-09-01', NULL, 1, 1, NULL, 'Aflao Gakly', NULL, NULL, NULL, NULL, NULL, '423716', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(70, '600116', 'Guillaume', 'DJAHO', 'Guillaume', NULL, '1995-01-10', '1995-01-10', '2021-09-01', NULL, 1, 1, NULL, 'Baguida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(71, '600117', 'Chimene', 'KOUEVIDJIN', 'Chimene', NULL, '1989-07-25', '1989-07-25', '2021-09-01', NULL, 2, 1, NULL, 'Attiegou', NULL, NULL, NULL, NULL, NULL, '415252', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(72, '600119', 'Assih', 'KIBANOU', 'Assih', NULL, '1996-06-17', '1996-06-17', '2021-09-13', NULL, 1, 1, NULL, 'Kegue Nasod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(73, '600121', 'Valhda', 'AYIVI', 'Valhda', NULL, '1993-12-27', '1993-12-27', '2021-09-20', NULL, 2, 1, NULL, 'Amadahome', NULL, NULL, NULL, NULL, NULL, '648194', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(74, '600122', 'Mangama Guillaume', 'ADJAGBA', 'Guillaume', NULL, NULL, NULL, '2021-09-01', NULL, 1, 1, NULL, 'Agoe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(75, '600124', 'Fidelia', 'SAKITI', 'Fidelia', NULL, '1995-07-07', '1995-07-07', '2022-03-07', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(76, '600125', 'Adhia', 'VISHAL', 'Adhia', NULL, '1977-05-19', '1977-05-19', '2021-09-09', NULL, 1, 2, NULL, 'St Joseph', NULL, NULL, NULL, NULL, NULL, '648180', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(77, '600126', 'HumnaBadkar', 'VAIBHAV', 'HumnaBadkar', NULL, '1994-01-25', '1994-01-25', '2021-09-22', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648184', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(78, '600127', 'BEN AICHA', 'HOUDA', 'Houda', NULL, '1984-09-30', '1984-09-30', '2021-10-12', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '556886', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, 17, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(79, '600128', 'KHAN', 'IRFAN MATIN', 'KHAN', NULL, '1984-07-25', '1984-07-25', '2021-10-03', NULL, 1, 2, NULL, 'Adidoadin', NULL, NULL, NULL, NULL, NULL, '648185', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(80, '600129', 'ASWAL', 'ATUL', 'ASWAL', NULL, '1984-08-06', '1984-08-06', '2021-10-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648178', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(81, '600130', 'Sharma', 'GAURAV KANT', 'Sharma', NULL, '1979-08-15', '1979-08-15', '2021-10-15', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648187', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(82, '600131', 'Kafui', 'ATTIKPO-MAGLOE', 'Kafui', NULL, '1986-05-24', '1986-05-24', '2021-10-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '324771', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(83, '600141', 'Baki', 'ADOH', 'Adoh', NULL, '1981-01-01', '1981-01-01', '2021-10-10', NULL, 1, 1, NULL, 'Tokoin Gbadago', NULL, NULL, NULL, NULL, NULL, '312467', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(84, '600142', 'KODJO AGBEKO', 'AHOMBO', 'Agbeko', NULL, '1985-12-31', '1985-12-31', '2021-09-27', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '296421', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(85, '600143', 'Kokouvi Mawuli', 'ASSEMUATSUA', 'Mawuli', NULL, '1987-04-01', '1987-04-01', '2021-10-18', NULL, 1, 1, NULL, 'Adidogomé', NULL, NULL, NULL, NULL, NULL, '448801', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(86, '600144', 'Youkoutema', 'PADJEPESSI', 'Youkoutema', NULL, '1981-10-21', '1981-10-21', '2021-09-27', NULL, 1, 1, NULL, 'Agoé Sogbossito', NULL, NULL, NULL, NULL, NULL, '314135', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(87, '600145', 'Essolakina', 'POLLE', 'Polle', NULL, '1988-05-12', '1988-05-12', '2021-10-18', NULL, 1, 1, NULL, 'Avédji', NULL, NULL, NULL, NULL, NULL, '385060', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(88, '600146', 'Yao Nestor', 'TOUDJI', 'Toudji', NULL, '1975-02-26', '1975-02-26', '2021-10-12', NULL, 1, 1, NULL, 'Léo 2000', NULL, NULL, NULL, NULL, NULL, '294518', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(89, '600147', 'Kossi Wilfried', 'AGBETO', 'Wilfried', NULL, NULL, NULL, '2021-10-11', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(90, '600148', 'Assiakla Benedictus Gerard', 'ASSINGUIME', 'Benedictus', NULL, NULL, NULL, '2021-10-06', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(91, '600149', 'Tchilalo', 'PISSAI', 'Ange', NULL, NULL, NULL, '2021-10-04', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(92, '600150', 'Adjo', 'AKAKPO', 'Tatiana', NULL, '1987-01-12', '1987-01-12', '2022-03-14', NULL, 2, 1, NULL, 'Attiégou', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(93, '600151', 'Komlan', 'AZIAMBLE', 'Lucien', NULL, '1981-06-23', '1981-06-23', '2021-11-08', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '311819', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(94, '600152', 'Adjoa Yale Vanessa', 'ATTIVOR', 'Vanessa', NULL, '1988-12-05', '1988-12-05', '2021-11-01', NULL, 2, 1, NULL, 'Agbalépédo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(95, '600153', 'Yao Dzifa', 'AMEGANVI', 'James', NULL, '1981-06-04', '1981-06-04', '2021-11-01', NULL, 1, 1, NULL, 'Adéticopé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(96, '600154', 'Ama Albertine', 'DONOUKPO', 'Albertine', NULL, '1996-01-06', '1996-01-06', '2021-11-08', NULL, 2, 1, NULL, 'Agoé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(97, '600155', 'Essohanam Patrick', 'TAGBA', 'Patrick', NULL, '1987-06-15', '1987-06-15', '2021-11-01', NULL, 1, 1, NULL, 'Adidogomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(98, '600158', 'Bachirou', 'SAMBIANI', 'Bachirou', NULL, '1998-02-03', '1998-02-03', '2021-11-01', NULL, 1, 1, NULL, 'Agoé Zongo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(99, '600159', 'Yentchabli', 'SILI', 'Yentchabli', NULL, '1997-07-09', '1997-07-09', '2021-11-01', NULL, 1, 1, NULL, 'Amadahome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(100, '600160', 'Ekoe Guillaume', 'KOMLAN', 'Guillaume', NULL, '1994-11-13', '1994-11-13', '2021-11-01', NULL, 1, 1, NULL, 'Agoé Légbassito', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(101, '600161', 'Sharad', 'JAIN', 'Sharad', NULL, '1978-06-11', '1978-06-11', '2021-11-19', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(102, '600164', 'Srinivas', 'BODDAPATI', 'Srinivas', NULL, NULL, NULL, '2021-10-02', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '674376', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(103, '600167', 'Pascaline', 'AKAKPO', 'Pascaline', NULL, '1988-02-23', '1988-02-23', '2021-11-02', NULL, 2, 1, NULL, 'Sagbado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(104, '600168', 'david', 'EGLE', 'David', NULL, '1988-09-03', '1988-09-03', '2021-11-01', NULL, 1, 1, NULL, 'Yokoé', NULL, NULL, NULL, NULL, NULL, '430932', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(105, '600169', 'kodzo', 'NYAGBE', 'Kodzo', NULL, '1975-08-17', '1975-08-17', '2021-11-01', NULL, 1, 1, NULL, 'Atigangomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(106, '600170', 'Edem', 'ATIGLA', 'Dr', NULL, '1990-01-03', '1990-01-03', '2021-11-24', NULL, 1, 1, NULL, 'Kohé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(107, '600171', 'Nawab', 'BONGUE', 'Nawab', NULL, '1989-09-08', '1989-09-08', '2021-12-01', NULL, 1, 1, NULL, 'Tokoin Séminaire', NULL, NULL, NULL, NULL, NULL, '354093', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(108, '600172', 'Komlan', 'KAMEDO', 'Komlan', NULL, '1975-12-31', '1975-12-31', '2021-12-01', NULL, 1, 1, NULL, 'Aveta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(109, '600173', 'Clément', 'LARE', 'Clément', NULL, '1972-11-21', '1972-11-21', '2021-12-01', NULL, 1, 1, NULL, 'Novissi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(110, '600174', 'Messan Aristide', 'AYIKA', 'Aristide', NULL, '1994-06-13', '1994-06-13', '2021-12-13', NULL, 1, 1, NULL, 'Hedzranawoé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(111, '600175', 'Nadia', 'BOUSSELMI', 'Nadia', NULL, '1980-12-07', '1980-12-07', '2021-12-19', NULL, 2, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '674380', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(112, '600176', 'Rajendran', 'SUBRAMANIAN', 'Subu', NULL, NULL, NULL, '2021-12-17', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '677757', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(113, '600177', 'Nagajaraiah', 'HITHESH', 'Nagajaraiah', NULL, '1994-02-23', '1994-02-23', '2021-01-20', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(114, '600178', 'Monoule', 'YENTCHABRE', 'Monoule', NULL, '1991-08-08', '1991-08-08', '2022-01-17', NULL, 1, 1, NULL, 'Agoé Sogbossito', NULL, NULL, NULL, NULL, NULL, '641250', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(115, '600180', 'Conchita Marilene', 'ANANI MEKLE', 'Conchita', NULL, '1995-02-02', '1995-02-02', '2022-01-10', NULL, 2, 1, NULL, 'Agodeke', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(116, '600181', 'Amedi', 'KAZANDOU', 'Amedi', NULL, '1997-12-17', '1997-12-17', '2022-01-10', NULL, 1, 1, NULL, 'Agoe-Nyivé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(117, '600182', 'Chelsea Afivi Venusia', 'KEOULA', 'Chelsea', NULL, '1996-09-06', '1996-09-06', '2022-01-17', NULL, 2, 1, NULL, 'Hedzranawoé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(118, '600183', 'Kanoune', 'OURO GBELE', 'Kanoune', NULL, '1996-05-23', '1996-05-23', '2022-01-10', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(119, '600184', 'Koami Junior', 'SESSI EYRAM', 'Junior', NULL, '1983-02-05', '1983-02-05', '2022-01-17', NULL, 1, 1, NULL, 'Adéticopé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(120, '600185', 'Rachida', 'TCHAGOUNI', 'Rachida', NULL, '1994-01-24', '1994-01-24', '2022-01-10', NULL, 2, 1, NULL, 'Agoe Logope', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(121, '600189', 'Mamalinesso', 'TCHALIM KAISSA', 'Mamalinesso', NULL, '1987-02-23', '1987-02-23', '2022-01-10', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(122, '600190', 'Akwavi', 'KOUWONOU', 'Akwavi', NULL, '1981-12-30', '1981-12-30', '2022-01-01', NULL, 2, 1, NULL, 'Adidogomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(123, '600192', 'Kossivi', 'AGBO', 'Kossivi', NULL, '1990-12-31', '1990-12-31', '2021-01-03', NULL, 1, 1, NULL, 'Adewui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(124, '600195', 'Sahil', 'SHARMA', 'Sahil', NULL, '1998-09-06', '1998-09-06', '2021-11-18', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(125, '600199', 'Krys Dorphel', 'KOUSSEMOKINA', 'Krys', NULL, '1992-12-02', '1992-12-02', '2022-02-10', NULL, 1, 2, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 2, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(126, '600200', 'Sepopo Fafa', 'KANGNI', 'Fafa', NULL, '1986-05-17', '1986-05-17', '2022-02-01', NULL, 2, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(127, '600196', 'Murugan', 'SURESH KUMAR', 'Murugan', NULL, '1990-07-16', '1990-07-16', '2022-01-31', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(128, '600197', 'RAJAMANIKKAM', 'SATHIYAMURTHY', 'RAJAMANIKKAM', NULL, '1971-08-06', '1971-08-06', '2022-02-04', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(129, '600213', 'Sitsope Victoire', 'AWANYO', 'Victoire', NULL, '1996-12-08', '1996-12-08', '2022-02-07', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(130, '600103', 'Ashish kumar', 'GUPTA', 'kumar', NULL, '1971-07-14', '1971-07-14', '2021-08-30', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '542711', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(131, '600123', 'Joel', 'YELENEKE', 'Joel', NULL, '1995-12-12', '1995-12-12', '2022-01-22', NULL, 1, 1, NULL, 'Nukafu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(132, '600162', 'Chikkanna', 'LOKESH', 'Chikkanna', NULL, '1976-03-27', '1976-03-27', '2022-01-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(133, '600163', 'Lourdusamy', 'Joseph Muthaiyan', 'Lourdusamy', NULL, '1970-08-30', '1970-08-30', '2022-01-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(134, '600227', 'Gasparienne', 'NOGODE INGAMAKO', 'Gasparienne', NULL, '1990-07-09', '1990-07-09', '2022-01-31', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 2, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(135, '600244', 'Edolom Victoire', 'ATEFEIBU', 'Victoire', NULL, '1992-12-09', '1992-12-09', '2022-03-01', NULL, 2, 1, NULL, 'Agbalepedogan', NULL, NULL, NULL, NULL, NULL, '693402', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(136, '600020', 'Shyam', 'PONAPPA', 'Shyam', NULL, '1958-10-12', '1958-10-12', '2020-11-16', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '580599', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(137, '600030', 'Claude Bandele', 'ORE', 'Claude', NULL, '1967-12-28', '1967-12-28', '2021-12-01', NULL, 1, 1, NULL, 'Attiegou', NULL, NULL, NULL, NULL, NULL, '241912', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(138, '600038', 'Anurag', 'SINHA', 'Anurag', NULL, '1982-10-23', '1982-10-23', '2021-04-09', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '597928', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(139, '600047', 'Essosolim', 'AWI', 'Essosolim', NULL, '1990-11-04', '1990-11-04', '2021-05-01', NULL, 1, 1, NULL, 'Notsè', NULL, NULL, NULL, NULL, NULL, '382316', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(140, '600048', 'Fidèle', 'EFAKO', 'Fidèle', NULL, '1994-04-24', '1994-04-24', '2021-05-01', NULL, 1, 1, NULL, 'Atikoume', NULL, NULL, NULL, NULL, NULL, '597417', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(141, '600049', 'Komi', 'AMEGBLETO', 'Komi', NULL, '1992-12-31', '1992-12-31', '2021-05-01', NULL, 1, 1, NULL, 'Avedji', NULL, NULL, NULL, NULL, NULL, '597413', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(142, '600050', 'Akouvi', 'TOZO', 'Esther', NULL, '1988-05-11', '1988-05-11', '2021-05-01', NULL, 2, 1, NULL, 'Agoe Telessou', NULL, NULL, NULL, NULL, NULL, '572362', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(143, '600051', 'Kossi Denis', 'DOGBE', 'Denis', NULL, '1994-05-15', '1994-05-15', '2021-05-01', NULL, 1, 1, NULL, 'Sotouboua', NULL, NULL, NULL, NULL, NULL, '597414', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(144, '600056', 'Bougatem', 'BAROUZIE', 'Bougatem', NULL, '1989-11-06', '1989-11-06', '2021-05-01', NULL, 1, 1, NULL, 'Atakpame', NULL, NULL, NULL, NULL, NULL, '445144', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(145, '600057', 'Amidou Zarifou', 'MOUSSA', 'Zarifou', NULL, '1995-02-22', '1995-02-22', '2021-05-01', NULL, 1, 1, NULL, 'AMOUTIVE', NULL, NULL, NULL, NULL, NULL, '574603', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(146, '600058', 'Gnimwè Joseph', 'PELELEKI', 'Joseph', NULL, '1998-01-26', '1998-01-26', '2021-05-01', NULL, 1, 1, NULL, 'Adeta Kpotame', NULL, NULL, NULL, NULL, NULL, 'en validation', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(147, '600059', 'Koffi Eugène', 'NUTSUDZE', 'Eugène', NULL, '1990-02-07', '1990-02-07', '2021-05-01', NULL, 1, 1, NULL, 'Kpele Akata', NULL, NULL, NULL, NULL, NULL, '605991', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(148, '600060', 'Koffi Richard', 'N\'TCHOU', 'Richard', NULL, '1994-04-03', '1994-04-03', '2021-05-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '596615', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(149, '600061', 'Koku Mawufemo', 'TOGUE', 'Mawufemo', NULL, '1995-12-31', '1995-12-31', '2021-05-01', NULL, 1, 1, NULL, 'Kpalime Kpeta', NULL, NULL, NULL, NULL, NULL, '596611', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(150, '600062', 'Pouwouziwe', 'AWIZOBA', 'Pouwouziwe', NULL, '1988-12-31', '1988-12-31', '2021-05-01', NULL, 2, 1, NULL, 'Djagble', NULL, NULL, NULL, NULL, NULL, '597403', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(151, '600063', 'Songuimpal', 'TCHAGOU', 'Songuimpal', NULL, '1993-03-23', '1993-03-23', '2021-05-01', NULL, 2, 1, NULL, 'Atakpame', NULL, NULL, NULL, NULL, NULL, '450112', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(152, '600064', 'Oukore Edouard', 'DJEHANI', 'Edouard', NULL, '1991-01-25', '1991-01-25', '2021-05-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '596612', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(153, '600065', 'Pab-kgani', 'KAMANE', 'kgani', NULL, '1994-09-13', '1994-09-13', '2021-05-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '596530', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(154, '600069', 'Gildas', 'TOSSOU', 'Gildas', NULL, '1991-07-29', '1991-07-29', '2021-08-16', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(155, '600071', 'Amar Jeet', 'SINGH', 'Jeet', NULL, '1976-01-08', '1976-01-08', '2021-06-25', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '651047', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(156, '600079', 'Rishav', 'BAISHAKHIYAR', 'Rishav', NULL, '1983-09-29', '1983-09-29', '2021-07-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '621825', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(157, '600082', 'Imtinen', 'HAMLAOUI', 'Imtinen', NULL, '1988-05-25', '1988-05-25', '2021-07-26', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '621827', NULL, 2, NULL, NULL, NULL, NULL, 1, 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(158, '600083', 'Ahmadu', 'NAVFAL', 'Ahmadu', NULL, '1991-10-14', '1991-10-14', '2021-08-09', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622563', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(159, '600086', 'Sudeep', 'SINGH', 'Sudeep', NULL, '1986-02-05', '1986-02-05', '2021-07-21', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '653231', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(160, '600087', 'Manish', 'CHANDRAN', 'Manish', NULL, '1991-03-05', '1991-03-05', '2021-08-16', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622569', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(161, '600091', 'Komivi', 'DOKIN', 'Komivi', NULL, '1988-01-30', '1988-01-30', '2021-08-01', NULL, 1, 1, NULL, 'Lomé Atiegougan', NULL, NULL, NULL, NULL, NULL, '635873', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(162, '600092', 'Jean', 'PANABASSE', 'Jean', NULL, '1994-09-13', '1994-09-13', '2021-07-01', NULL, 1, 1, NULL, 'Kegue', NULL, NULL, NULL, NULL, NULL, '635870', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(163, '600096', 'Amivi', 'NKOUNOU', 'Amivi', NULL, '1998-11-28', '1998-11-28', '2022-03-01', NULL, 1, 1, NULL, 'Zossimé', NULL, NULL, NULL, NULL, NULL, '615602', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(164, '600118', 'Ouless', 'TCHANGBADE', 'Ouless', NULL, '1984-09-23', '1984-09-23', '2021-09-13', NULL, 1, 1, NULL, 'ATIEGOU – LOME', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54');
INSERT INTO `employes` (`id`, `matricule`, `first_name`, `last_name`, `usual_name`, `emergency_contact`, `birth_date`, `birth_date_correct`, `date_debut`, `date_fin`, `gender`, `type`, `is_contrat`, `address`, `password`, `phone_perso`, `phone_pro`, `email_perso`, `email_pro`, `num_cnss`, `num_policy`, `civile`, `photo`, `contract_id`, `categorie_id`, `former_employer_id`, `continent_id`, `region_id`, `countrie_id`, `prefecture_id`, `coutume_id`, `band_id`, `niveau_id`, `contract_type_id`, `departement_id`, `business_id`, `position_id`, `status`, `created_at`, `updated_at`) VALUES
(165, '600132', 'Nouroudine', 'SOUMANOU', 'Nouroudine', NULL, '1996-04-14', '1996-04-14', '2021-10-20', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(166, '600133', 'Follykoue Gah M F', 'AGOSSOU', 'F', NULL, '1986-07-02', '1986-07-02', '2021-10-07', NULL, 1, 1, NULL, 'Zanguéra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(167, '600134', 'Nassivou Olawale', 'ATSOU', 'Olawale', NULL, '1993-11-14', '1993-11-14', '2021-10-11', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(168, '600135', 'IROKO', 'AYODELE', 'IROKO', NULL, '1984-06-15', '1984-06-15', '2021-10-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(169, '600136', 'Dovene Komlan', 'COMLAN', 'Komlan', NULL, '1989-02-07', '1989-02-07', '2021-10-01', NULL, 1, 1, NULL, 'Sada-Atakpamé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(170, '600137', 'Komla Mawuto', 'DONYO', 'Mawuto', NULL, '1989-11-07', '1989-11-07', '2021-10-19', NULL, 1, 1, NULL, 'Djidjolé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(171, '600138', 'Matieyendou', 'GOUTI', 'Matieyendou', NULL, '1986-05-11', '1986-05-11', '2021-10-18', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(172, '600139', 'Kodjovi Mokpokpo', 'KLOHOUN', 'Mokpokpo', NULL, '1993-04-23', '1993-04-23', '2021-10-10', NULL, 1, 1, NULL, 'Totsi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(173, '600156', 'Koffi Serge', 'AZIAWODE', 'Serge', NULL, '1994-10-07', '1994-10-07', '2021-11-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(174, '600157', 'Laila Adjovi', 'EYOU', 'Adjovi', NULL, NULL, NULL, '2021-11-09', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(175, '600187', 'Afi Adotcho', 'LOGOSSOU', 'Adotcho', NULL, '1995-05-19', '1995-05-19', '2022-01-10', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(176, '600191', 'Elie M.K', 'AFFOGNON', 'K', NULL, '1995-01-31', '1995-01-31', '2022-01-24', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(177, '600193', 'Surya Prakash', 'DWIVEDI', 'Prakash', NULL, '1987-07-05', '1987-07-05', '2022-01-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(178, '600194', 'Rakesh', 'BATCHU', 'Rakesh', NULL, '1997-05-09', '1997-05-09', '2021-11-18', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(179, '600202', 'Kpante', 'TCHOYOKE', 'Kpante', NULL, '1996-04-26', '1996-04-26', '2022-02-14', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(180, '600201', 'Roland Kodjovi Messan', 'AZIAMALE', 'Messan', NULL, '1993-05-10', '1993-05-10', '2022-02-14', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(181, '600198', 'Shingate', 'KIRAN VISHWANATH', 'Shingate', NULL, '1983-10-21', '1983-10-21', '2022-02-18', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(182, '600140', 'LANWI', 'ESSOYOMEWE LUC', 'LANWI', NULL, '1998-12-31', '1998-12-31', '2021-10-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(183, '600210', 'Koffi Mawugnon', 'ABOTCHI', 'Mawugnon', NULL, '1996-04-26', '1996-04-26', '2022-01-27', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(184, '600215', 'Komivi Holali David', 'YEVU', 'David', NULL, '1995-12-31', '1995-12-31', '2022-01-27', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(185, '600089', 'Aavaneesh', 'ARJA', 'Aavaneesh', NULL, '1990-09-17', '1990-09-17', '2021-08-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622567', NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(186, '600090', 'Meera', 'NAGUL SHAIK', 'Meera', NULL, '1985-06-12', '1985-06-12', '2021-08-01', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622568', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(187, '600093', 'Elom Yao', 'AMOUZOU', 'Yao', NULL, '1980-02-21', '1980-02-21', '2021-08-01', NULL, 1, 1, NULL, 'Lomé Atiegouvi', NULL, NULL, NULL, NULL, NULL, 'en validation', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(188, '600094', 'Jocelyn Ekoe', 'KIDJA', 'Ekoe', NULL, '1988-06-23', '1988-06-23', '2021-08-01', NULL, 1, 1, NULL, 'Be Kpota', NULL, NULL, NULL, NULL, NULL, '430245', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(189, '600097', 'Pitale', 'ASSENOUWE', 'Pitale', NULL, '1995-10-25', '1995-10-25', '2022-02-01', NULL, 1, 1, NULL, 'Agoé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(190, '600098', 'Akossiwa Chinene', 'DOGBLA', 'Chinene', NULL, '1992-03-29', '1992-03-29', '2022-02-01', NULL, 2, 1, NULL, 'Tsévié', NULL, NULL, NULL, NULL, NULL, '635885', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(191, '600099', 'Arjoume', 'LALLE', 'Arjoume', NULL, '1993-03-10', '1993-03-10', '2022-02-01', NULL, 1, 1, NULL, 'Atakpamé', NULL, NULL, NULL, NULL, NULL, '635892', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(192, '600100', 'Moubarak', 'TCHADOUWA', 'Moubarak', NULL, '1999-12-31', '1999-12-31', '2022-02-01', NULL, 1, 1, NULL, 'Assigomé', NULL, NULL, NULL, NULL, NULL, '635882', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(193, '600101', 'Djelle Nafang', 'SAMBOGOU', 'Nafang', NULL, '1989-08-26', '1989-08-26', '2022-02-01', NULL, 1, 1, NULL, 'Agoé-Cacaveli', NULL, NULL, NULL, NULL, NULL, '635879', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(194, '600102', 'Doufogou Teni', 'LARE', 'Teni', NULL, '1993-09-20', '1993-09-20', '2022-02-01', NULL, 2, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, '635890', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(195, '600165', 'Samarou Ramdane', 'TCHAGODOMOU', 'Ramdane', NULL, '1988-05-08', '1988-05-08', '2021-11-08', NULL, 1, 1, NULL, 'Légbassito', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(196, '600166', 'pakabawi', 'BAGNABANA', 'pakabawi', NULL, '1966-01-11', '1966-01-11', '2021-11-12', NULL, 1, 1, NULL, 'Zanguera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(197, '600179', 'Taman Solange', 'BODJOK DOUTI', 'Solange', NULL, '1995-10-23', '1995-10-23', '2022-01-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(198, '600186', 'Kokou Dieudonne', 'FIAFONOU', 'Dieudonne', NULL, '1993-05-27', '1993-05-27', '2022-01-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(199, '600188', 'Essohanam Aimee', 'WALLAH', 'Aimee', NULL, '1996-03-06', '1996-03-06', '2022-01-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(200, '600204', 'Pitalé', 'ASSENOUWE', 'Pitalé', NULL, '1994-10-25', '1994-10-25', '2022-02-01', NULL, 1, 1, NULL, 'Agoé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(201, '600206', 'Akossiwa Chimène', 'DOGBLA', 'Chimène', NULL, '1992-03-29', '1992-03-29', '2022-02-01', NULL, 2, 1, NULL, 'Tsévié', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(202, '600229', 'Ardjoume', 'LALLE', 'Ardjoume', NULL, '1993-03-10', '1993-03-10', '2022-02-01', NULL, 1, 1, NULL, 'Atakpamé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(203, '600230', 'Moubarak', 'TCHADOUWA', 'Moubarak', NULL, '1999-12-31', '1999-12-31', '2022-02-01', NULL, 1, 1, NULL, 'Assigomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(204, '600231', 'Djelle Nanfang', 'SAMBOGOU', 'Nanfang', NULL, '1989-08-26', '1989-08-26', '2022-02-01', NULL, 1, 1, NULL, 'Atakpamé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(205, '600237', 'Doufogou Teni', 'LARE', 'Teni', NULL, '1993-09-20', '1993-09-20', '2022-02-01', NULL, 2, 1, NULL, 'Aného', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(206, '600232', 'Agbéko Kokou', 'TSOGBE', 'Kokou', NULL, '1981-07-22', '1981-07-22', '2022-02-01', NULL, 1, 1, NULL, 'Kpalimé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(207, '600233', 'Djehina', 'ADJANLA', 'Djehina', NULL, '1997-08-22', '1997-08-22', '2022-02-01', NULL, 2, 1, NULL, 'Kara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(208, '600205', 'Disserama Sidonie', 'BARANDAO', 'Sidonie', NULL, '1995-11-14', '1995-11-14', '2022-02-01', NULL, 2, 1, NULL, 'Adewui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(209, '600234', 'Kokou Hervé', 'MOLAGUI', 'Hervé', NULL, '1992-06-17', '1992-06-17', '2022-02-01', NULL, 1, 1, NULL, 'Blitta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(210, '600235', 'G. Outchanabagni', 'TILIERE', 'Outchanabagni', NULL, '1986-12-31', '1986-12-31', '2022-02-01', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(211, '600236', 'Djadame', 'KONDJINGUE', 'Djadame', NULL, '1989-12-31', '1989-12-31', '2022-02-01', NULL, 1, 1, NULL, 'Agoé-Nyivé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(212, '600203', 'Kodjo Amewovo', 'AKAKPO', 'Amewovo', NULL, '1959-12-31', '1959-12-31', '2022-02-17', NULL, 1, 1, NULL, 'Agbelouvé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(213, '600207', 'Pakidame', 'BOUKARI', 'Pakidame', NULL, '1991-09-15', '1991-09-15', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675639', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(214, '600208', 'Awovi Venunye', 'EDZAVE', 'Venunye', NULL, '1993-12-23', '1993-12-23', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675658', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(215, '600209', 'Tani', 'FEYEME', 'Tani', NULL, '1996-06-21', '1996-06-21', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675684', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(216, '600211', 'Patoussi Benissa', 'ADJARO', 'Benissa', NULL, '1993-12-06', '1993-12-06', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675680', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(217, '600214', 'Abla Armel', 'AYADOME', 'Armel', NULL, '1994-08-16', '1994-08-16', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(218, '600216', 'Rachel Aku', 'SEGBEDJI', 'Aku', NULL, '1996-04-03', '1996-04-03', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(219, '600217', 'Nazifatou', 'TCHA -KOLON', 'Nazifatou', NULL, '1995-02-23', '1995-02-23', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675664', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(220, '600218', 'Koboyo I Elise', 'TCHANDAO', 'Elise', NULL, '1994-06-14', '1994-06-14', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(221, '600219', 'Komlan Novinyo', 'WOGLO', 'Novinyo', NULL, '1985-01-01', '1985-01-01', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(222, '600220', 'Lalbile', 'YAMBANDJOA', 'Lalbile', NULL, '1996-09-19', '1996-09-19', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675682', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(223, '600221', 'Moucharafatou', 'PESSINABA M', 'Moucharafatou', NULL, '1998-02-13', '1998-02-13', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675683', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(224, '600222', 'Moudjibatou', 'ISSOTOU', 'Moudjibatou', NULL, '1997-06-09', '1997-06-09', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675660', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(225, '600223', 'piboata', 'KANHA', 'piboata', NULL, '1997-03-04', '1997-03-04', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675679', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(226, '600224', 'Gnamii Marie Reine', 'KONDOW', 'Reine', NULL, '1999-09-17', '1999-09-17', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675681', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(227, '600225', 'Sadoli', 'KONLANI', 'Sadoli', NULL, '1991-12-14', '1991-12-14', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675693', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(228, '600226', 'Pakiyedou', 'NAPOLI', 'Pakiyedou', NULL, '1996-09-08', '1996-09-08', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675666', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(229, '600228', 'Ogoubi Mathieu', 'OLOU', 'Mathieu', NULL, '1994-07-29', '1994-07-29', '2022-02-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(230, '600212', 'Falak', 'ALASSANI', 'Blessing', NULL, '1995-10-26', '1995-10-26', '2022-02-01', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675619', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(231, '600238', 'Abla Mireille Victoire', 'MALM', 'Victoire', NULL, '1992-05-08', '1992-05-08', '2022-01-31', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(232, '600239', 'Yves-Roland', 'DOSSOU', 'Roland', NULL, '1990-04-29', '1990-04-29', '2022-01-31', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(233, '600240', 'Ananivi Etagbévoin Parfait', 'BOSSA', 'Parfait', NULL, '1983-09-08', '1983-09-08', '2022-02-14', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(234, '600241', 'Assion', 'GOLO-ANANI', 'Assion', NULL, '1990-07-25', '1990-07-25', '2022-02-09', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(235, '600242', 'Kumar', 'MUKESH', 'Kumar', NULL, '1986-12-11', '1986-12-11', '2022-02-25', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '691820', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(236, '600243', 'SEMASINGHE MUDIYANSELAGE', 'TILAK WEERAKUMARA', 'MUDIYANSELAGE', NULL, '1993-04-09', '1993-04-09', '2022-03-06', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(237, '600245', 'GUIBIEN CLEOPHAS', 'ZERBO', 'CLEOPHAS', NULL, '1978-04-09', '1978-04-09', '2022-03-01', NULL, 1, 2, NULL, 'Cacaveli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 2, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(238, '600246', 'Milodgue NNi', 'SOA', 'NNi', NULL, '1995-01-26', '1995-01-26', '2022-03-01', NULL, 1, 1, NULL, 'Attiégou', NULL, NULL, NULL, NULL, NULL, '693426', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(239, '600247', 'Laurence', 'DJAFALO', 'Laurence', NULL, '1997-10-12', '1997-10-12', '2022-03-14', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(240, '600248', 'Farahane', 'TCHACONDOH', 'Farahane', NULL, '1999-02-26', '1999-02-26', '2022-03-14', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(241, '600249', 'Honorine', 'PALI', 'Honorine', NULL, '1999-05-16', '1999-05-16', '2022-03-21', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(242, '600250', 'Ayikoe', 'ANENOU', 'Ayikoe', NULL, '1997-05-02', '1997-05-02', '2022-03-01', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(243, '600251', 'Badayo', 'BAGARAM', 'Badayo', NULL, '1986-10-16', '1986-10-16', '2022-03-03', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(244, '600252', 'Koffi Deladem', 'FIANYEKU', 'Deladem', NULL, '1987-06-12', '1987-06-12', '2022-03-03', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(245, '600253', 'Rajesh', 'SIRANGI', 'Rajesh', NULL, '1987-05-24', '1987-05-24', '2022-03-25', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '693401', NULL, 2, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(246, '600255', 'Motcho', 'AKAKPO', 'Motcho', NULL, '1991-01-16', '1991-01-16', '2022-04-04', NULL, 1, 1, NULL, 'Yokoé', NULL, NULL, NULL, NULL, NULL, '345733', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(247, '600266', 'Caryle Bieta', 'ZOZO BOLI', 'Bieta', NULL, '1996-11-21', '1996-11-21', '2022-04-19', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 2, 13, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(248, '999501', 'KUMAR', 'Vijendra', 'Vijendra', NULL, '1988-06-06', '1988-06-06', '2022-04-11', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(249, '600431', 'AGOUDA', 'Nazifatou', 'Nazifatou', NULL, '1999-01-08', '1999-01-08', '2022-05-16', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(250, '600435', 'BESSI', 'Miranda Hajda', 'Hajda', NULL, '1996-10-21', '1996-10-21', '2022-05-16', NULL, 2, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(251, '600433', 'AKPELI', 'Evelyn', 'Evelyn', NULL, '1992-04-08', '1992-04-08', '2022-05-16', NULL, 2, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(252, '600434', 'AZAMATI', 'Chantal Adjo', 'Adjo', NULL, '1994-02-08', '1994-02-08', '2022-05-16', NULL, 2, 1, NULL, 'Tsévié', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(253, '600429', 'ADJALLE', 'Koffi Giovani Guiliano', 'Guiliano', NULL, '1997-06-27', '1997-06-27', '2022-05-16', NULL, 1, 1, NULL, 'Lomé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(254, '600439', 'GNONOUKE', 'Ernest', 'Ernest', NULL, '1995-09-22', '1995-09-22', '2022-05-16', NULL, 1, 1, NULL, 'Kara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(255, '600443', 'PALAWIYA', 'Patrice', 'Patrice', NULL, '1993-03-16', '1993-03-16', '2022-05-16', NULL, 1, 1, NULL, 'Kara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(256, '600444', 'TAMBATE', 'Anate', 'Anate', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, 'Dapaong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(257, '600438', 'FOLIKOE', 'Mawulolo KOSSI', 'Folikoe', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(258, '600441', 'IBRAHIM-NAIM', 'Roukiyatou Ablavi', 'Ablavi', NULL, NULL, NULL, '2022-05-16', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(259, '600436', 'BONI', 'Kansame', 'Kassame', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(260, '600440', 'HOUESSOU', 'Kossivi', 'Kossivi', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(261, '600432', 'KOFFI', 'Andre', 'Andre', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(262, '600437', 'DJAKIN', 'Yendou', 'Yendou', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(263, '600442', 'KOMBATE', 'Fitiman', 'Fitiman', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(264, '600430', 'AGO', 'Ake Esso', 'Esso', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(265, '600445', 'TCHAMEDI', 'Kokou Luc', 'Luc', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(266, '600451', 'KAMPOR', 'Esther', 'Esther', NULL, NULL, NULL, '2022-05-27', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(267, '600449', 'N\'DANOU', 'Adjo', 'Adjo', NULL, NULL, NULL, '2022-05-27', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(268, '600448', 'AMEWOUNOU', 'Kayi', 'Kayi', NULL, NULL, NULL, '2022-05-31', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(269, '600422', 'DUBEY', 'Alkesh', 'Alkesh', NULL, NULL, NULL, '2022-05-20', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(270, '600423', 'ATCHA', 'Messa Noutifafa', 'Noutifafa', NULL, NULL, NULL, '2022-05-09', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(271, '600424', 'PAKA', 'Mazamesso', 'Mazamesso', NULL, NULL, NULL, '2022-05-16', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(272, '999525', 'BARIGUE', 'Yimpape', 'Yimpape', NULL, NULL, NULL, '2022-05-27', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(273, '999526', 'ADAKPAM', 'Kodjo Mensah', 'Mensah', NULL, NULL, NULL, '2022-05-27', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(274, '600454', 'YATA TCHOUA', 'Téta', 'Téta', NULL, '1991-04-06', '1991-04-06', '2022-06-08', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(275, '600453', 'ALLOKPENOU', 'Mashoudi Ayé-Férè', 'Férè', NULL, '1990-02-13', '1990-02-13', '2022-06-07', NULL, 1, 1, NULL, 'Avedji Elavagnon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(276, '600452', 'ADONKOR', 'Komlanvi', 'Komlanvi', NULL, '1984-12-25', '1984-12-25', '2022-06-15', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(277, '600455', 'Manojkumar Vishwweshwar', 'Bargat', 'Vishwweshwar', NULL, '1979-07-26', '1979-07-26', '2022-06-11', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(278, '600425', 'Prithwish kar', 'Purkayastha', 'kar', NULL, NULL, NULL, '2022-02-06', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(279, '600426', 'Samir Kumar', 'Bhal', 'Kumar', NULL, '1989-04-14', '1989-04-14', '2022-01-06', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(280, '600427', 'Prabudha Bhimrao', 'Tembhurkar', 'Bhimrao', NULL, NULL, NULL, '2022-01-06', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-05 09:46:54', '2022-07-05 09:46:54'),
(281, '0001', 'Adanlete', 'Adanlete', 'Adan', NULL, '2007-05-11', '2002-01-11', NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, 2, '2022-07-11 07:00:31', '2022-07-11 07:08:49'),
(282, '000001', 'TEST1', 'TEST1', 'TEST', NULL, '2022-07-15', '2022-07-07', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 2, '2022-07-15 09:00:52', '2022-07-15 09:01:15'),
(283, '00001', 'TEST1', 'TEST1', 'TEST', NULL, '2013-08-05', '2013-08-05', NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 2, '2022-07-15 09:04:51', '2022-07-15 13:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

DROP TABLE IF EXISTS `families`;
CREATE TABLE IF NOT EXISTS `families` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` smallint(6) NOT NULL,
  `telephone` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `former_employers`
--

DROP TABLE IF EXISTS `former_employers`;
CREATE TABLE IF NOT EXISTS `former_employers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immunizations`
--

DROP TABLE IF EXISTS `immunizations`;
CREATE TABLE IF NOT EXISTS `immunizations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vaccine_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_immunization` date DEFAULT NULL,
  `is_vaccine` smallint(6) DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_16_125753_create_assignments_table', 1),
(5, '2022_06_16_130250_create_positions_table', 1),
(6, '2022_06_16_131011_create_departements_table', 1),
(7, '2022_06_16_133158_create_businesses_table', 1),
(8, '2022_06_16_133849_create_companies_table', 1),
(9, '2022_06_16_133849_create_employes_table', 1),
(10, '2022_06_16_134229_create_bank_infos_table', 1),
(11, '2022_06_16_140622_create_experiences_table', 1),
(12, '2022_06_16_141047_create_families_table', 1),
(13, '2022_06_16_141155_create_contract_types_table', 1),
(14, '2022_06_16_141430_create_contracts_table', 1),
(15, '2022_06_16_141803_create_vaccines_table', 1),
(16, '2022_06_16_141938_create_profils_table', 1),
(17, '2022_06_16_142539_create_roles_table', 1),
(18, '2022_06_16_142712_create_profil_roles_table', 1),
(19, '2022_06_16_143927_create_apartments_table', 1),
(20, '2022_06_16_144028_create_buildings_table', 1),
(21, '2022_06_16_144156_create_vehicles_table', 1),
(22, '2022_06_16_144304_create_modeles_table', 1),
(23, '2022_06_16_144406_create_brands_table', 1),
(24, '2022_06_16_144517_create_drivers_table', 1),
(25, '2022_06_16_144719_create_drives_table', 1),
(26, '2022_06_16_144835_create_immunizations_table', 1),
(27, '2022_06_22_121454_create_categories_table', 1),
(28, '2022_06_22_121949_create_niveaux_table', 1),
(29, '2022_06_22_122340_create_former_employers_table', 1),
(30, '2022_06_22_122610_create_coutumes_table', 1),
(31, '2022_06_22_122737_create_prefectures_table', 1),
(32, '2022_06_22_122914_create_countries_table', 1),
(33, '2022_06_22_123124_create_regions_table', 1),
(34, '2022_06_22_123209_create_continents_table', 1),
(35, '2022_06_22_124758_create_bands_table', 1),
(36, '2022_06_22_132436_create_diseases_table', 1),
(37, '2022_06_29_021059_create_arrivals_table', 1),
(38, '2022_06_29_021320_create_departures_table', 1),
(39, '2022_06_29_021412_create_natures_table', 1),
(40, '2022_06_29_021450_create_permits_table', 1),
(41, '2022_06_29_021519_create_visas_table', 1),
(42, '2022_06_29_021542_create_travelers_table', 1),
(43, '2022_06_29_021621_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` bigint(20) DEFAULT NULL,
  `modele` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `natures`
--

DROP TABLE IF EXISTS `natures`;
CREATE TABLE IF NOT EXISTS `natures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `natures`
--

INSERT INTO `natures` (`id`, `libelle`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Contractor', 1, '2022-07-06 11:15:33', '2022-07-06 11:15:33'),
(2, 'Employee', 1, '2022-07-06 20:51:50', '2022-07-06 20:51:50'),
(3, 'consultant', 1, '2022-07-06 20:52:47', '2022-07-06 20:52:47'),
(4, 'Investor', 1, '2022-07-06 20:53:19', '2022-07-06 20:53:19'),
(5, 'visitors', 1, '2022-07-06 20:53:51', '2022-07-06 20:53:51'),
(6, 'PCH', 1, '2022-07-06 20:54:31', '2022-07-06 20:54:31'),
(7, 'Manager', 1, '2022-07-06 20:56:17', '2022-07-06 20:56:17'),
(8, 'vendor', 1, '2022-07-06 20:56:54', '2022-07-06 20:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

DROP TABLE IF EXISTS `niveaux`;
CREATE TABLE IF NOT EXISTS `niveaux` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `libelle`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MBA', 1, '2022-07-07 10:57:16', '2022-07-07 10:57:16'),
(2, 'Master', 1, '2022-07-07 10:59:23', '2022-07-07 10:59:23'),
(3, 'Diploma', 1, '2022-07-07 10:59:36', '2022-07-07 10:59:36'),
(4, 'ICCFP', 1, '2022-07-07 10:59:49', '2022-07-07 10:59:49'),
(5, 'Baccalaureat', 1, '2022-07-07 11:00:04', '2022-07-07 11:00:04'),
(6, 'Certificat', 1, '2022-07-07 11:00:18', '2022-07-07 11:00:18'),
(7, 'Doctorat', 1, '2022-07-07 11:00:32', '2022-07-07 11:00:32'),
(8, 'B.TEXT.', 1, '2022-07-07 11:00:52', '2022-07-07 11:00:52'),
(9, 'University Degree', 1, '2022-07-07 11:01:13', '2022-07-07 11:01:13'),
(10, 'Bachelor', 1, '2022-07-07 11:01:44', '2022-07-07 11:01:44'),
(11, 'M.Teen', 1, '2022-07-07 11:02:01', '2022-07-07 11:02:01'),
(12, 'B.E', 1, '2022-07-07 11:02:12', '2022-07-07 11:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

DROP TABLE IF EXISTS `permits`;
CREATE TABLE IF NOT EXISTS `permits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `validity` date DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `validity`, `expiry`, `traveler_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-07-06', '2022-07-09', 1, 2, '2022-07-06 15:05:21', '2022-07-15 16:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_french` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefectures`
--

DROP TABLE IF EXISTS `prefectures`;
CREATE TABLE IF NOT EXISTS `prefectures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countrie_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `continent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefectures`
--

INSERT INTO `prefectures` (`id`, `libelle`, `countrie_id`, `region_id`, `continent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Golf', 1, 1, 1, 1, '2022-07-06 11:21:09', '2022-07-06 11:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

DROP TABLE IF EXISTS `profils`;
CREATE TABLE IF NOT EXISTS `profils` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_roles`
--

DROP TABLE IF EXISTS `profil_roles`;
CREATE TABLE IF NOT EXISTS `profil_roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profil_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `continent_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `libelle`, `continent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Togo', 1, 1, '2022-07-06 11:18:24', '2022-07-06 11:18:24'),
(2, 'Africa', 1, 1, '2022-07-06 11:18:44', '2022-07-06 11:18:44'),
(3, 'Others', 4, 1, '2022-07-06 21:16:18', '2022-07-06 21:16:18'),
(4, 'Others', 3, 1, '2022-07-06 21:16:45', '2022-07-06 21:16:45'),
(5, 'Others', 2, 1, '2022-07-06 21:17:02', '2022-07-06 21:17:02'),
(6, 'India', 2, 1, '2022-07-06 21:17:18', '2022-07-06 21:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_task` date DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accomplie` smallint(6) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `libelle`, `date_task`, `description`, `accomplie`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mathematiques', '2022-07-12', 'CONTENEUR 40 PIEDS', 1, 1, '2022-07-11 10:05:52', '2022-07-11 10:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `travelers`
--

DROP TABLE IF EXISTS `travelers`;
CREATE TABLE IF NOT EXISTS `travelers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countrie_id` bigint(20) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `nature_id` bigint(20) DEFAULT NULL,
  `trip_purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travelers`
--

INSERT INTO `travelers` (`id`, `firstname`, `lastname`, `countrie_id`, `business_id`, `nature_id`, `trip_purpose`, `status`, `created_at`, `updated_at`) VALUES
(30, 'Patra', 'Lingaraj', 2, 1, 3, 'Milap', 1, '2022-07-06 11:23:49', '2022-07-06 11:19:36'),
(31, 'Jesper Harring', 'Boll', 5, 1, 5, 'Jesse', 1, '2022-07-06 11:23:50', '2022-07-06 11:19:37'),
(29, 'Namasivayam Raja', 'Ram', 2, 1, 3, 'Milap', 1, '2022-07-06 11:23:48', '2022-07-06 11:19:35'),
(28, 'Mukesh', 'Kumar', 2, 4, 2, 'Joining PIA AVC', 1, '2022-07-06 11:23:47', '2022-07-06 11:19:34'),
(26, 'Ukinamemen', 'Faith', 4, 2, 5, 'Frank', 1, '2022-07-06 11:23:45', '2022-07-06 11:19:32'),
(27, 'Taiwo', 'Peter', 4, 2, 5, 'Frank', 1, '2022-07-06 11:23:46', '2022-07-06 11:19:33'),
(25, 'Jha', 'Vinodanand', 5, 1, 5, 'Information and Technology officer', 1, '2022-07-06 11:23:44', '2022-07-06 11:19:31'),
(24, 'Singh', 'Jasveer', 2, 1, 3, 'Gaurav', 1, '2022-07-06 11:23:43', '2022-07-06 11:19:30'),
(23, 'Shingate', NULL, 2, 4, 2, 'Joining PIA as Manager-Raw Material', 1, '2022-07-06 11:23:42', '2022-07-06 11:19:29'),
(22, 'Subramanian', NULL, 2, 4, 2, 'Zeeshan', 1, '2022-07-06 11:23:41', '2022-07-06 11:19:28'),
(21, 'Rohan', 'Gupta', 2, 1, 2, 'Frank', 1, '2022-07-06 11:23:40', '2022-07-06 11:19:27'),
(20, 'Obeng & Nsiah', NULL, 9, 1, 5, 'Jesse', 1, '2022-07-06 11:23:39', '2022-07-06 11:19:26'),
(19, 'Mahadevia', NULL, 2, 1, 8, 'sachin', 1, '2022-07-06 11:23:38', '2022-07-06 11:19:25'),
(18, 'Raja & Mayavanshi', NULL, 2, 1, 3, 'Sachin', 1, '2022-07-06 11:23:37', '2022-07-06 11:19:24'),
(17, 'Rohan & Ramaktoulah', NULL, 2, 1, 2, 'frank', 1, '2022-07-06 11:23:36', '2022-07-06 11:19:23'),
(16, 'Bhavin', 'Vyas', 12, 1, 2, 'Frank', 1, '2022-07-06 11:23:35', '2022-07-06 11:19:22'),
(15, 'Sudeep', 'Anurag', 2, 1, 2, NULL, 1, '2022-07-06 11:23:34', '2022-07-06 11:19:21'),
(14, 'Gebregziabher & Ayelew', NULL, 10, 1, 5, 'Houda', 1, '2022-07-06 11:23:33', '2022-07-06 11:19:20'),
(13, 'Kibri', NULL, 8, 1, 5, NULL, 1, '2022-07-06 11:23:32', '2022-07-06 11:19:19'),
(12, 'Shailesh', 'Barrot', 5, 1, 2, NULL, 1, '2022-07-06 11:23:31', '2022-07-06 11:19:18'),
(11, 'Atul', 'Aswal', 2, 3, 2, 'Joining PIA as Finance Manager', 1, '2022-07-06 11:23:30', '2022-07-06 11:19:17'),
(10, 'Basantha', 'Kumar', 2, 1, 4, 'Mathilde', 1, '2022-07-06 11:23:29', '2022-07-06 11:19:16'),
(9, 'Romain', 'Amond', 5, 1, 6, NULL, 1, '2022-07-06 11:23:28', '2022-07-06 11:19:15'),
(8, 'Sergino', 'LASSISSI', 11, 1, 7, 'Induction', 1, '2022-07-06 11:23:27', '2022-07-06 11:19:14'),
(7, 'Dey', 'Sanjay', 2, 1, 3, 'Milap', 1, '2022-07-06 11:23:26', '2022-07-06 11:19:13'),
(6, 'Naven', NULL, 2, 1, 1, 'Visitor (SAP)', 1, '2022-07-06 11:23:25', '2022-07-06 11:19:12'),
(5, 'Srinivas', NULL, 5, 1, 2, 'joining PIA', 1, '2022-07-06 11:23:24', '2022-07-06 11:19:11'),
(4, 'Irfan', 'Khan', 2, 3, 2, 'Joining PIA', 1, '2022-07-06 11:23:23', '2022-07-06 11:19:10'),
(3, 'Ashish', 'Gupta', 2, 1, 2, 'Joining PIA', 1, '2022-07-06 11:23:22', '2022-07-06 11:19:09'),
(2, 'Gaurav Kant', 'Sharma', 2, 3, 2, 'Joining PIA as Processing Manager', 1, '2022-07-06 11:23:21', '2022-07-06 11:19:08'),
(1, 'Jagadish', 'Behara', 2, 3, 2, 'Joining PIA as Procurement Manager', 1, '2022-07-06 11:23:20', '2022-07-06 11:19:07'),
(32, 'Anurag', 'Sinha', 7, 5, 2, NULL, 1, '2022-07-06 11:23:51', '2022-07-06 11:19:38'),
(33, 'Sudeep', 'Singh', 7, 5, 2, NULL, 1, '2022-07-06 11:23:52', '2022-07-06 11:19:39'),
(34, 'Batra', 'Bhawna', 2, 1, 5, NULL, 1, '2022-07-06 11:23:53', '2022-07-06 11:19:40'),
(35, 'Parichha Snehal', 'John Chandra', 2, 2, 1, 'OCR commissionning', 1, '2022-07-06 11:23:54', '2022-07-06 11:19:41'),
(36, 'Sebastian', 'Joshua Joice', 2, 2, 1, 'OCR commissionning', 1, '2022-07-06 11:23:55', '2022-07-06 11:19:42'),
(37, 'Vermeren', 'Hubert', 6, 1, 5, NULL, 1, '2022-07-06 11:23:56', '2022-07-06 11:19:43'),
(38, 'Sibe', 'Simon', 6, 1, 5, NULL, 1, '2022-07-06 11:23:57', '2022-07-06 11:19:44'),
(39, 'Romain', 'Benjamin', 6, 1, 5, NULL, 1, '2022-07-06 11:23:58', '2022-07-06 11:19:45'),
(40, 'Shaikh Mahiuddin', 'Ahammad', 5, 1, 5, 'Ashish Gupta - SOLAR', 1, '2022-07-06 11:23:20', '2022-07-06 11:19:46'),
(41, 'Sirangi', 'Rajesh', 2, 6, 2, 'Product-officer Natural gas', 1, '2022-07-06 11:23:21', '2022-07-06 11:19:47'),
(42, 'Rathwa', 'nashrubhai', 4, 1, 1, 'Vimal Fire Control', 1, '2022-07-06 11:23:22', '2022-07-06 11:19:48'),
(43, 'Marathe', 'Yubraj Keshav', 4, 1, 1, 'Vimal Fire Control', 1, '2022-07-06 11:23:23', '2022-07-06 11:19:49'),
(44, 'Gideon', 'Oyenka', 4, 1, 1, 'Vimal Fire Control', 1, '2022-07-06 11:23:24', '2022-07-06 11:19:50'),
(45, 'Jai', 'Mahesh', 2, 1, 1, 'Sewage treatment plant operation', 1, '2022-07-06 11:23:25', '2022-07-06 11:19:51'),
(46, 'Harendra', NULL, 2, 1, 1, 'Sewage treatment plant operation', 1, '2022-07-06 11:23:26', '2022-07-06 11:19:52'),
(47, 'Pai', 'Praveen', 3, 1, 5, 'PCH SOLAR', 1, '2022-07-06 11:23:27', '2022-07-06 11:19:53'),
(55, 'Vijendra', 'Kumar', 2, 5, 2, 'Operations Manager', 1, '2022-07-06 11:23:35', '2022-07-06 11:19:08'),
(56, 'Navaneetha Krishnan', 'SANNASI', 11, 1, 5, 'IT Vice-President', 1, '2022-07-06 11:23:36', '2022-07-06 11:19:09'),
(57, 'Pradeep Kumar', 'Venkata', 2, 1, 1, NULL, 1, '2022-07-06 11:23:37', '2022-07-06 11:19:10'),
(58, 'Prithwish', 'Kar', 2, 5, 2, 'Sales team', 1, '2022-07-06 11:23:38', '2022-07-06 11:19:11'),
(59, 'Prabuddha', NULL, 2, 5, 2, NULL, 1, '2022-07-06 11:23:39', '2022-07-06 11:19:12'),
(60, 'Prakash', 'Chatwani', 2, 5, 2, NULL, 1, '2022-07-06 11:23:40', '2022-07-06 11:19:13'),
(61, 'Bhal Samir', 'Kumar', 2, 1, 2, NULL, 1, '2022-07-06 11:23:41', '2022-07-06 11:19:14'),
(62, 'Manojkumar', 'BARGAT', 2, 1, 2, 'General Manager-Construction', 1, '2022-07-06 11:23:42', '2022-07-06 11:19:15'),
(63, 'Bhagat Hiren', 'Nitin', 11, 1, 5, NULL, 1, '2022-07-06 11:23:43', '2022-07-06 11:19:16'),
(64, 'Mohan', 'Sachin', 2, 1, 5, NULL, 1, '2022-07-06 11:23:44', '2022-07-06 11:19:17'),
(65, 'Doshi Jigar', 'Arvindkumar', 2, 1, 5, NULL, 1, '2022-07-06 11:23:45', '2022-07-06 11:19:18'),
(66, 'Mohit', 'GANGWANI', 2, 5, 2, 'Finance Trainee', 1, '2022-07-15 10:28:17', '2022-07-15 10:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mot_passe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` smallint(6) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `login`, `mot_passe`, `role`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Adanlete Manivelle', 'admin', 'aboukadani', 1, 1, '2022-07-12 11:57:00', '2022-07-12 13:29:46'),
(4, 'Victoire', 'vic', 'vic', 1, 1, '2022-07-14 17:23:13', '2022-07-14 17:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
CREATE TABLE IF NOT EXISTS `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_doses` smallint(6) DEFAULT NULL,
  `disease_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `nb_doses`, `disease_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'javascript', 2, 1, 1, '2022-07-11 10:42:47', '2022-07-11 10:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plate` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `modele_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visas`
--

DROP TABLE IF EXISTS `visas`;
CREATE TABLE IF NOT EXISTS `visas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `validity` date DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visas`
--

INSERT INTO `visas` (`id`, `validity`, `expiry`, `traveler_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-06-28', '2022-07-08', 1, 2, '2022-07-06 11:23:58', '2022-07-15 10:42:19'),
(2, '2022-07-14', '2022-07-28', 66, 1, '2022-07-15 10:38:56', '2022-07-15 10:38:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
