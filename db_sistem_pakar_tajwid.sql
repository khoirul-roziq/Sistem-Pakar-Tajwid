-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2023 at 06:08 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_pakar_tajwid`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'K000', 'Inisialisasi', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(2, 'K001', 'Nun Mati/ Tanwin', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(3, 'K002', 'Mim Mati', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(4, 'K003', 'Ghunnah', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(5, 'K004', 'Lam Ta\'rif', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(6, 'K005', 'Ro\'', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(7, 'K006', 'Lam', '2023-06-04 18:19:28', '2023-06-04 18:19:28'),
(8, 'K007', 'Qolqolah', '2023-06-04 18:19:28', '2023-06-04 18:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pertanyaan`
--

CREATE TABLE `kategori_pertanyaan` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` int NOT NULL,
  `pertanyaan_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_pertanyaan`
--

INSERT INTO `kategori_pertanyaan` (`id`, `kategori_id`, `pertanyaan_id`, `created_at`, `updated_at`) VALUES
(8, 2, 17, NULL, NULL),
(9, 3, 17, NULL, NULL),
(10, 4, 17, NULL, NULL),
(11, 5, 17, NULL, NULL),
(12, 6, 17, NULL, NULL),
(13, 7, 17, NULL, NULL),
(14, 8, 17, NULL, NULL),
(22, 2, 8, NULL, NULL),
(23, 3, 8, NULL, NULL),
(24, 4, 8, NULL, NULL),
(25, 5, 8, NULL, NULL),
(26, 6, 8, NULL, NULL),
(27, 7, 8, NULL, NULL),
(28, 8, 8, NULL, NULL),
(43, 2, 1, NULL, NULL),
(44, 3, 1, NULL, NULL),
(45, 4, 1, NULL, NULL),
(46, 5, 1, NULL, NULL),
(47, 6, 1, NULL, NULL),
(48, 7, 1, NULL, NULL),
(49, 8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_27_141605_create_tanda_tajwid_table', 1),
(7, '2023_04_27_143738_create_tajwid_table', 1),
(8, '2023_05_03_125515_create_rule_tajwid_tanda_tajwid_table', 1),
(9, '2023_05_07_062723_create_pertanyaan_table', 1),
(12, '2023_05_08_075845_create_kategori_table', 1),
(13, '2023_05_08_080211_add_kategori_id_to_pertanyaan_table', 1),
(14, '2023_05_11_073214_add_kategori_id_to_tajwid_table', 1),
(15, '2023_05_11_084509_add_tajwid_id_to_pertanyaan_table', 1),
(17, '2023_06_05_204251_add_reference_to_pertanyaan_table', 2),
(21, '2023_06_06_224030_create_kategori_pertanyaan_table', 3),
(22, '2023_06_06_224134_create_pertanyaan_tajwid_table', 3),
(25, '2023_06_06_224228_create_pertanyaan_tanda_tajwid_table', 4),
(26, '2023_06_07_083959_add_last_question_to_pertanyaan_table', 5),
(28, '2023_04_27_142116_create_rule_tajwid_table', 6),
(30, '2023_06_11_233536_add_synonym_to_rule_tajwid_table', 7),
(31, '2023_06_17_200253_add_jenis_kelamin_to_users_table', 8),
(32, '2023_07_31_093404_add_contoh_ayat_to_tajwid_table', 9),
(34, '2023_08_02_214236_add_pattern_ex_to_tajwid_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` int NOT NULL,
  `tajwid_id` int NOT NULL,
  `reference` int NOT NULL,
  `last_question` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `kode`, `soal`, `created_at`, `updated_at`, `kategori_id`, `tajwid_id`, `reference`, `last_question`) VALUES
(1, 'P000', '<p>Kategori tajwid apa yang akan kamu pelajari?</p>', '2023-06-18 13:56:12', '2023-06-18 15:13:49', 1, 1, 0, 0),
(2, 'P001', '<p>Berikut ini adalah beberapa hukum bacaan nun mati dan tanwin. Hukum bacaan apakah yang kamu pilih?</p>', '2023-06-18 13:58:09', '2023-06-18 15:17:46', 2, 1, 1, 0),
(3, 'P002', '<p>Berikut ini adalah beberapa hukum bacaan mim mati. Hukum bacaan apakah yang kamu pilih?</p>', '2023-06-18 13:58:47', '2023-06-18 15:17:31', 3, 1, 1, 0),
(4, 'P003', '<p>Hukum bacaan ghunnah hanya satu. Silahkan klik opsi berikut untuk melanjutkan!</p>', '2023-06-18 14:00:53', '2023-06-18 15:20:27', 4, 1, 1, 0),
(5, 'P004', '<p>Hukum bacaan lam ta\'rif apa yang kamu pilih?</p>', '2023-06-18 14:01:36', '2023-06-18 15:28:01', 5, 1, 1, 0),
(6, 'P005', '<p>Hukum bacaan ro\' apa yang kamu pilih?</p>', '2023-06-18 14:02:21', '2023-06-18 15:28:33', 6, 1, 1, 0),
(7, 'P006', '<p>Hukum bacaan lam apa yang kamu pilih?</p>', '2023-06-18 14:02:55', '2023-06-18 15:27:48', 7, 1, 1, 0),
(8, 'P007', '<p>Hukum bacaan qolqolah apa yang kamu pilih?</p>', '2023-06-18 14:03:29', '2023-06-18 15:28:12', 8, 1, 1, 0),
(9, 'P008', '<p>Pilihlah salah satu diantara sebab dihukuminya bacaan berikut ini!</p>', '2023-06-18 14:11:40', '2023-06-18 15:31:37', 2, 2, 2, 0),
(10, 'P009', '<p>Pilih salah satu huruf holaq yang menyebabkan dihukuminya bacaan!</p>', '2023-06-18 14:16:12', '2023-06-18 14:32:29', 2, 2, 9, 1),
(11, 'P010', '<p>Pilihlah sebab dihukuminya bacaan!</p>', '2023-06-18 14:22:14', '2023-07-03 15:20:09', 2, 3, 2, 0),
(12, 'P011', '<p>Pilih salah satu dari 15 huruf ikhfa berikut ini!</p>', '2023-06-18 14:25:46', '2023-06-18 14:25:56', 2, 3, 11, 1),
(13, 'P012', '<p>Pilihlah salah satu sebab dihukuminya bacaan iqlab!</p>', '2023-06-18 15:07:26', '2023-06-18 15:07:26', 2, 4, 2, 0),
(14, 'P013', '<p>Silahkan pilih huruf iqlab berikut ini!</p>', '2023-06-18 15:08:46', '2023-06-18 15:09:11', 2, 4, 13, 1),
(15, 'P014', '<p>Pilihlah salah satu sebab dihukuminya bacaan!</p>', '2023-06-18 15:11:03', '2023-06-18 15:11:03', 2, 5, 2, 0),
(16, 'P015', '<p>Pilih salah satu dari 4 huruf idghom bighunnah berikut ini!</p>', '2023-06-18 15:12:54', '2023-06-18 15:12:54', 2, 5, 15, 1),
(17, 'P016', '<p>Pilihlah salah satu sebab dihukuminya bacaan!</p>', '2023-06-18 15:36:22', '2023-06-18 15:36:22', 2, 6, 2, 0),
(18, 'P017', '<p>Pilih salah satu dari dua huruf idghom bilaghunnah berikut!</p>', '2023-06-18 15:37:21', '2023-06-18 15:37:21', 2, 6, 17, 1),
(19, 'P018', '<p>Berikut ini adalah sebab dihukuminya Ikhfa\' Syafawi. Pilihlah opsi di bawah ini!</p>', '2023-07-09 13:36:26', '2023-07-09 13:36:26', 3, 7, 3, 0),
(20, 'P019', '<p>Pilihlah huruf berikut untuk menentukan hukum bacaan mim mati!</p>', '2023-07-09 13:38:22', '2023-07-09 13:38:22', 3, 7, 19, 1),
(21, 'P020', '<p>Berikut ini adalah sebab dihukuminya Idghom Mimi. Pilihlah opsi di bawah ini!</p>', '2023-07-09 13:39:52', '2023-07-09 13:39:52', 3, 8, 3, 0),
(22, 'P021', '<p>Pilihlah huruf berikut ini untuk menentukan hukum bacaan mim mati!</p>', '2023-07-09 13:42:58', '2023-07-09 13:42:58', 3, 8, 21, 1),
(23, 'P022', '<p>Berikut ini adalah sebab dihukuminya idzhar syafawi. Pilihlah opsi berikut untuk menentukan hukum bacaan!</p>', '2023-07-09 13:44:38', '2023-07-09 13:44:38', 3, 9, 3, 0),
(24, 'P023', '<p>Huruf apa yang akan kamu pilih dari opsi berikut ini, untuk menentukan bacaan mim mati?</p>', '2023-07-09 13:46:55', '2023-07-09 13:46:55', 3, 9, 23, 1),
(25, 'P024', '<p>Huruf ghunnah ada dua. Huruf apa yang akan kamu pilih?</p>', '2023-07-09 13:55:29', '2023-07-10 15:49:15', 4, 10, 4, 0),
(26, 'P025', '<p>Pilihlah tanda tasydid berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:01:07', '2023-07-10 15:49:38', 4, 10, 25, 1),
(27, 'P026', '<p>Pilihlah alif lam berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:05:49', '2023-07-09 14:05:49', 5, 11, 5, 0),
(28, 'P027', '<p>Berikut ini adalah huruf qomariyah yang berjumlah 14. huruf apa yang akan kamu pilih?</p>', '2023-07-09 14:07:36', '2023-07-09 14:07:36', 5, 11, 27, 1),
(29, 'P028', '<p>Pilihlah huruf alif lam berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:08:29', '2023-07-09 14:08:29', 5, 12, 5, 0),
(30, 'P029', '<p>Berikut ini adalah huruf syamsiyah yang berjumlah 14. Huruf apa yang akan kamu pilih?</p>', '2023-07-09 14:09:59', '2023-07-09 14:09:59', 5, 12, 29, 1),
(31, 'P030', '<p>Pilihlah huruf berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:20:44', '2023-07-09 14:20:44', 6, 13, 6, 0),
(32, 'P031', '<p>Berikut ini adalah harakat untuk menentukan hukum bacaan!</p>', '2023-07-09 14:23:55', '2023-07-09 14:23:55', 6, 13, 31, 1),
(33, 'P033', '<p>Pilihlah harakat berikut ini untuk mentukan hukum bacaan!</p>', '2023-07-09 14:30:42', '2023-07-10 16:42:56', 6, 14, 35, 1),
(35, 'P032', '<p>Pilihlah huruf berikut ini untuk mentukan hukum bacaan!</p>', '2023-07-09 14:33:03', '2023-07-10 16:42:41', 6, 14, 6, 0),
(36, 'P034', '<p>Pilihlah harakat berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:35:44', '2023-07-09 14:35:44', 7, 15, 7, 0),
(37, 'P035', '<p>Berikut ini adalah lafadz yang mengandung lam jalalah. Silahkan pilih untuk menentukan hukum bacaan!</p>', '2023-07-09 14:37:08', '2023-07-09 14:37:08', 7, 15, 36, 1),
(38, 'P036', '<p>Pilihlah salah satu harakat berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:40:14', '2023-07-09 14:40:14', 7, 16, 7, 0),
(39, 'P037', '<p>Berikut ini adalah lafadz yang mengandung lam jalalah. Pilihlah lafadz berikut ini!</p>', '2023-07-09 14:42:06', '2023-07-09 14:42:06', 7, 16, 38, 1),
(40, 'P038', '<p>Berikut ini adalah huruf qolqolah yang berjumlah 5. Huruf apa yang akan kamu pilih?</p>', '2023-07-09 14:50:03', '2023-07-09 14:50:03', 8, 17, 8, 0),
(41, 'P039', '<p>Pilihlah harakat berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:50:52', '2023-07-09 14:50:52', 8, 17, 40, 1),
(42, 'P040', '<p>Berikut ini adalah huruf qolqolah berjumlah 5. Huruf apa yang kamu pilih?</p>', '2023-07-09 14:52:14', '2023-07-09 14:52:14', 8, 18, 8, 0),
(43, 'P041', '<p>Pilihlah harakat berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:53:41', '2023-07-10 00:47:29', 8, 18, 42, 0),
(44, 'P042', '<p>Pilihlah tanda berikut ini untuk menentukan hukum bacaan!</p>', '2023-07-09 14:55:07', '2023-07-09 14:55:07', 8, 18, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_tajwid`
--

CREATE TABLE `pertanyaan_tajwid` (
  `id` bigint UNSIGNED NOT NULL,
  `tajwid_id` int NOT NULL,
  `pertanyaan_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan_tajwid`
--

INSERT INTO `pertanyaan_tajwid` (`id`, `tajwid_id`, `pertanyaan_id`, `created_at`, `updated_at`) VALUES
(6, 2, 18, NULL, NULL),
(7, 3, 18, NULL, NULL),
(8, 4, 18, NULL, NULL),
(9, 5, 18, NULL, NULL),
(10, 6, 18, NULL, NULL),
(11, 7, 20, NULL, NULL),
(12, 8, 20, NULL, NULL),
(13, 9, 20, NULL, NULL),
(14, 2, 2, NULL, NULL),
(15, 3, 2, NULL, NULL),
(16, 4, 2, NULL, NULL),
(17, 5, 2, NULL, NULL),
(18, 6, 2, NULL, NULL),
(22, 7, 3, NULL, NULL),
(23, 8, 3, NULL, NULL),
(24, 9, 3, NULL, NULL),
(25, 10, 4, NULL, NULL),
(26, 11, 5, NULL, NULL),
(27, 12, 5, NULL, NULL),
(28, 13, 6, NULL, NULL),
(29, 14, 6, NULL, NULL),
(30, 15, 7, NULL, NULL),
(31, 16, 7, NULL, NULL),
(32, 17, 8, NULL, NULL),
(33, 18, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_tanda_tajwid`
--

CREATE TABLE `pertanyaan_tanda_tajwid` (
  `id` bigint UNSIGNED NOT NULL,
  `tanda_tajwid_id` int NOT NULL,
  `pertanyaan_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan_tanda_tajwid`
--

INSERT INTO `pertanyaan_tanda_tajwid` (`id`, `tanda_tajwid_id`, `pertanyaan_id`, `created_at`, `updated_at`) VALUES
(15, 46, 3, NULL, NULL),
(16, 40, 3, NULL, NULL),
(17, 41, 3, NULL, NULL),
(18, 42, 3, NULL, NULL),
(19, 7, 4, NULL, NULL),
(20, 13, 4, NULL, NULL),
(21, 14, 4, NULL, NULL),
(22, 25, 4, NULL, NULL),
(23, 26, 4, NULL, NULL),
(24, 34, 4, NULL, NULL),
(25, 46, 5, NULL, NULL),
(26, 40, 5, NULL, NULL),
(27, 41, 5, NULL, NULL),
(28, 42, 5, NULL, NULL),
(29, 10, 6, NULL, NULL),
(30, 11, 6, NULL, NULL),
(31, 15, 6, NULL, NULL),
(32, 16, 6, NULL, NULL),
(33, 12, 6, NULL, NULL),
(34, 18, 6, NULL, NULL),
(35, 19, 6, NULL, NULL),
(36, 20, 6, NULL, NULL),
(37, 21, 6, NULL, NULL),
(38, 22, 6, NULL, NULL),
(39, 23, 6, NULL, NULL),
(40, 24, 6, NULL, NULL),
(41, 27, 6, NULL, NULL),
(42, 28, 6, NULL, NULL),
(43, 29, 6, NULL, NULL),
(54, 46, 11, NULL, NULL),
(58, 10, 12, NULL, NULL),
(59, 11, 12, NULL, NULL),
(60, 12, 12, NULL, NULL),
(61, 15, 12, NULL, NULL),
(62, 16, 12, NULL, NULL),
(63, 18, 12, NULL, NULL),
(64, 19, 12, NULL, NULL),
(65, 20, 12, NULL, NULL),
(66, 21, 12, NULL, NULL),
(67, 22, 12, NULL, NULL),
(68, 23, 12, NULL, NULL),
(69, 24, 12, NULL, NULL),
(70, 27, 12, NULL, NULL),
(71, 28, 12, NULL, NULL),
(72, 29, 12, NULL, NULL),
(73, 46, 9, NULL, NULL),
(74, 40, 9, NULL, NULL),
(75, 41, 9, NULL, NULL),
(76, 42, 9, NULL, NULL),
(77, 7, 10, NULL, NULL),
(78, 13, 10, NULL, NULL),
(79, 14, 10, NULL, NULL),
(80, 25, 10, NULL, NULL),
(81, 26, 10, NULL, NULL),
(82, 34, 10, NULL, NULL),
(83, 46, 13, NULL, NULL),
(84, 40, 13, NULL, NULL),
(85, 41, 13, NULL, NULL),
(86, 42, 13, NULL, NULL),
(87, 9, 14, NULL, NULL),
(88, 46, 15, NULL, NULL),
(89, 40, 15, NULL, NULL),
(90, 41, 15, NULL, NULL),
(91, 42, 15, NULL, NULL),
(92, 35, 16, NULL, NULL),
(93, 32, 16, NULL, NULL),
(94, 31, 16, NULL, NULL),
(95, 33, 16, NULL, NULL),
(96, 46, 17, NULL, NULL),
(97, 40, 17, NULL, NULL),
(98, 41, 17, NULL, NULL),
(99, 42, 17, NULL, NULL),
(100, 30, 18, NULL, NULL),
(101, 17, 18, NULL, NULL),
(102, 55, 11, NULL, NULL),
(103, 56, 11, NULL, NULL),
(104, 43, 11, NULL, NULL),
(105, 50, 19, NULL, NULL),
(106, 9, 20, NULL, NULL),
(107, 50, 21, NULL, NULL),
(108, 31, 22, NULL, NULL),
(109, 50, 23, NULL, NULL),
(110, 10, 24, NULL, NULL),
(111, 11, 24, NULL, NULL),
(112, 12, 24, NULL, NULL),
(113, 13, 24, NULL, NULL),
(114, 14, 24, NULL, NULL),
(115, 15, 24, NULL, NULL),
(116, 16, 24, NULL, NULL),
(117, 17, 24, NULL, NULL),
(118, 18, 24, NULL, NULL),
(119, 19, 24, NULL, NULL),
(120, 20, 24, NULL, NULL),
(121, 21, 24, NULL, NULL),
(122, 22, 24, NULL, NULL),
(123, 23, 24, NULL, NULL),
(124, 24, 24, NULL, NULL),
(125, 25, 24, NULL, NULL),
(126, 26, 24, NULL, NULL),
(127, 27, 24, NULL, NULL),
(128, 28, 24, NULL, NULL),
(129, 29, 24, NULL, NULL),
(130, 30, 24, NULL, NULL),
(131, 32, 24, NULL, NULL),
(132, 33, 24, NULL, NULL),
(133, 34, 24, NULL, NULL),
(134, 7, 24, NULL, NULL),
(135, 35, 24, NULL, NULL),
(136, 31, 25, NULL, NULL),
(137, 32, 25, NULL, NULL),
(138, 45, 26, NULL, NULL),
(139, 51, 27, NULL, NULL),
(140, 7, 28, NULL, NULL),
(141, 9, 28, NULL, NULL),
(142, 12, 28, NULL, NULL),
(143, 13, 28, NULL, NULL),
(144, 14, 28, NULL, NULL),
(145, 25, 28, NULL, NULL),
(146, 26, 28, NULL, NULL),
(147, 27, 28, NULL, NULL),
(148, 28, 28, NULL, NULL),
(149, 29, 28, NULL, NULL),
(150, 31, 28, NULL, NULL),
(151, 33, 28, NULL, NULL),
(152, 34, 28, NULL, NULL),
(153, 35, 28, NULL, NULL),
(154, 52, 29, NULL, NULL),
(155, 10, 30, NULL, NULL),
(156, 11, 30, NULL, NULL),
(157, 15, 30, NULL, NULL),
(158, 16, 30, NULL, NULL),
(159, 17, 30, NULL, NULL),
(160, 18, 30, NULL, NULL),
(161, 19, 30, NULL, NULL),
(162, 20, 30, NULL, NULL),
(163, 21, 30, NULL, NULL),
(164, 22, 30, NULL, NULL),
(165, 23, 30, NULL, NULL),
(166, 24, 30, NULL, NULL),
(167, 30, 30, NULL, NULL),
(168, 32, 30, NULL, NULL),
(169, 17, 31, NULL, NULL),
(170, 37, 32, NULL, NULL),
(171, 39, 32, NULL, NULL),
(174, 38, 33, NULL, NULL),
(175, 17, 35, NULL, NULL),
(176, 38, 36, NULL, NULL),
(177, 54, 37, NULL, NULL),
(178, 37, 38, NULL, NULL),
(179, 39, 38, NULL, NULL),
(180, 54, 39, NULL, NULL),
(181, 9, 40, NULL, NULL),
(182, 12, 40, NULL, NULL),
(183, 15, 40, NULL, NULL),
(184, 23, 40, NULL, NULL),
(185, 28, 40, NULL, NULL),
(186, 44, 41, NULL, NULL),
(187, 9, 42, NULL, NULL),
(188, 12, 42, NULL, NULL),
(189, 15, 42, NULL, NULL),
(190, 23, 42, NULL, NULL),
(191, 28, 42, NULL, NULL),
(195, 53, 44, NULL, NULL),
(196, 40, 43, NULL, NULL),
(197, 41, 43, NULL, NULL),
(198, 42, 43, NULL, NULL),
(199, 37, 43, NULL, NULL),
(200, 38, 43, NULL, NULL),
(201, 39, 43, NULL, NULL),
(202, 44, 43, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rule_tajwid`
--

CREATE TABLE `rule_tajwid` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tajwid` int NOT NULL,
  `deleted_tajwid_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_rule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `synonym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rule_tajwid`
--

INSERT INTO `rule_tajwid` (`id`, `kode`, `id_tajwid`, `deleted_tajwid_name`, `rule`, `second_rule`, `keterangan`, `created_at`, `updated_at`, `synonym`) VALUES
(1, 'R001', 2, NULL, '\\u0646\\u06e1\\u0621', '\\u0646\\u06e1\\u0020\\u0621', '<p>Nun mati bertemu dengan hamzah</p>', '2023-06-09 14:37:05', '2023-06-11 10:14:14', NULL),
(7, 'R002', 2, NULL, '\\u0646\\u06e1\\u062d', '\\u0646\\u06e1\\u0020\\u062d', '<p>Nun mati bertemu dengan ha\'</p>', '2023-06-10 07:04:14', '2023-06-11 10:22:28', NULL),
(8, 'R003', 2, NULL, '\\u0646\\u06e1\\u062e', '\\u0646\\u06e1\\u0020\\u062e', '<p>Nun mati bertemu denga kho\'</p>', '2023-06-10 07:05:02', '2023-06-11 10:22:20', NULL),
(9, 'R004', 2, NULL, '\\u0646\\u06e1\\u0639', '\\u0646\\u06e1\\u0020\\u0639', '<p>Nun mati bertemu dengan \'ain</p>', '2023-06-10 07:05:28', '2023-06-11 10:12:54', NULL),
(10, 'R005', 2, NULL, '\\u0646\\u06e1\\u063a', '\\u0646\\u06e1\\u0020\\u063a', '<p>Nun mati bertemu dengan ghoin</p>', '2023-06-10 07:05:55', '2023-06-10 07:05:55', NULL),
(11, 'R006', 2, NULL, '\\u0646\\u06e1\\u0647', '\\u0646\\u06e1\\u0020\\u0647', '<p>Nun mati bertemu dengan ha</p>', '2023-06-10 07:06:16', '2023-06-10 07:06:16', NULL),
(12, 'R007', 2, NULL, '\\u064b\\u0621', '\\u064b\\u0020\\u0621', '<p>Fatkhatain bertemu dengan hamzah</p>', '2023-06-11 10:15:25', '2023-06-11 15:19:23', NULL),
(13, 'R008', 2, NULL, '\\u064b\\u062d', '\\u064b\\u0020\\u062d', '<p>Fatkhatain bertemu dengan ha\'</p>', '2023-06-11 10:21:10', '2023-06-11 15:19:27', NULL),
(14, 'R009', 2, NULL, '\\u064b\\u062e', '\\u064b\\u0020\\u062e', '<p>Fatkhatain bertemu dengan kho\'</p>', '2023-06-11 10:22:09', '2023-06-11 15:19:33', NULL),
(15, 'R010', 2, NULL, '\\u064b\\u0639', '\\u064b\\u0020\\u0639', '<p>Fatkhatain bertemu dengan \'ain</p>', '2023-06-11 10:23:08', '2023-06-11 15:19:37', NULL),
(16, 'R011', 2, NULL, '\\u064b\\u063a', '\\u064b\\u0020\\u063a', '<p>Fatkhatain bertemu dengan ghoin</p>', '2023-06-11 10:23:57', '2023-06-11 15:19:44', NULL),
(17, 'R012', 2, NULL, '\\u064b\\u0647', '\\u064b\\u0020\\u0647', '<p>Fatkhatain bertemu dengan ha</p>', '2023-06-11 10:24:18', '2023-06-11 15:20:05', NULL),
(18, 'R013', 2, NULL, '\\u064d\\u0621', '\\u064d\\u0020\\u0621', '<p>Kasrotain bertemu dengan hamzah</p>', '2023-06-11 10:25:57', '2023-06-11 15:20:12', NULL),
(19, 'R014', 2, NULL, '\\u064d\\u062d', '\\u064d\\u0020\\u062d', '<p>Kasrotain bertemu dengan ha\'</p>', '2023-06-11 10:26:30', '2023-06-11 15:20:21', NULL),
(20, 'R015', 2, NULL, '\\u064d\\u062e', '\\u064d\\u0020\\u062e', '<p>Kasrotain bertemu dengan kho\'</p>', '2023-06-11 10:26:53', '2023-06-11 15:20:41', NULL),
(21, 'R016', 2, NULL, '\\u064d\\u0639', '\\u064d\\u0020\\u0639', '<p>Kasrotain bertemu dengan \'ain</p>', '2023-06-11 10:27:17', '2023-06-11 15:20:47', NULL),
(22, 'R017', 2, NULL, '\\u064d\\u063a', '\\u064d\\u0020\\u063a', '<p>Kasrotain bertemu dengan ghoin</p>', '2023-06-11 10:27:35', '2023-06-11 15:20:55', NULL),
(23, 'R018', 2, NULL, '\\u064d\\u0647', '\\u064d\\u0020\\u0647', '<p>Kasrotain bertemu dengan ha</p>', '2023-06-11 10:27:56', '2023-06-11 15:21:02', NULL),
(24, 'R019', 2, NULL, '\\u064c\\u0621', '\\u064c\\u0020\\u0621', '<p>Dhommatain bertemu dengan hamzah</p>', '2023-06-11 10:29:54', '2023-06-11 15:21:10', NULL),
(25, 'R020', 2, NULL, '\\u064c\\u062d', '\\u064c\\u0020\\u062d', '<p>Dhommatain bertemu dengan ha\'</p>', '2023-06-11 10:30:21', '2023-06-11 15:21:18', NULL),
(26, 'R021', 2, NULL, '\\u064c\\u062e', '\\u064c\\u0020\\u062e', '<p>Dhommatain bertemu dengan kho\'</p>', '2023-06-11 10:30:38', '2023-06-11 15:21:28', NULL),
(27, 'R022', 2, NULL, '\\u064c\\u0639', '\\u064c\\u0020\\u0639', '<p>Dhommatain bertemu dengan \'ain</p>', '2023-06-11 10:30:57', '2023-06-11 15:20:29', NULL),
(28, 'R023', 2, NULL, '\\u064c\\u063a', '\\u064c\\u0020\\u063a', '<p>Dhommatain bertemu dengan ghoin</p>', '2023-06-11 10:31:13', '2023-06-11 15:19:56', NULL),
(29, 'R024', 2, NULL, '\\u064c\\u0647', '\\u064c\\u0020\\u0647', '<p>Dhommatain bertemu dengan ha</p>', '2023-06-11 10:31:40', '2023-06-11 15:19:50', NULL),
(31, 'R025', 2, NULL, '\\u0646\\u06e1\\u0623', '\\u0646\\u06e1\\u0020\\u0623', '<p>Nun mati bertemu dengan hamzah qot\'i (atas)</p>', '2023-06-11 16:55:12', '2023-06-11 17:03:38', 'R001'),
(32, 'R026', 2, NULL, '\\u0646\\u06e1\\u0625', '\\u0646\\u06e1\\u0020\\u0625', '<p>Nun mati bertemu dengan hamzah qot\'i (bawah)</p>', '2023-06-11 17:02:23', '2023-06-11 17:02:23', 'R001'),
(33, 'R027', 2, NULL, '\\u0646\\u06e1\\u0649\\u0655', '\\u0646\\u06e1\\u0649\\u0020\\u0655', '<p>Nun mati bertemu dengan hamzah di tengah kata</p>', '2023-06-11 17:05:05', '2023-06-11 17:05:05', 'R001'),
(34, 'R028', 2, NULL, '\\u0646\\u06e1\\u0624', '\\u0646\\u06e1\\u0020\\u0624', '<p>Nun mati bertemu dengan hamzah di atas wawu</p>', '2023-06-11 17:07:31', '2023-06-11 17:07:31', 'R001'),
(35, 'R029', 2, NULL, '\\u0646\\u06e1\\u0640\\u0654', '\\u0646\\u06e1\\u0640\\u0020\\u0654', '<p>Nun mati bertemu dengan hamzah pada lam alif (prakiraan)</p>', '2023-06-11 17:11:57', '2023-06-11 17:11:57', 'R001'),
(36, 'R030', 2, NULL, '\\u0646\\u06e1\\u0626', '\\u0646\\u06e1\\u0020\\u0626', '<p>Nun mati bertemu dengan hamzah nabroh ya\'</p>', '2023-06-11 17:12:37', '2023-06-11 17:12:37', 'R001'),
(37, 'R031', 2, NULL, '\\u064b\\u0623', '\\u064b\\u0020\\u0623', '<p>Fatkhatain bertemu dengan hamzah qot\'i (atas)</p>', '2023-06-13 15:26:04', '2023-06-13 15:28:19', 'R007'),
(38, 'R032', 2, NULL, '\\u064b\\u0625', '\\u064b\\u0020\\u0625', '<p>Fatkhatain bertemu dengan hamzah qot\'i (bawah)</p>', '2023-06-13 15:28:04', '2023-06-13 15:28:04', 'R007'),
(39, 'R033', 2, NULL, '\\u064b\\u0649\\u0655', '\\u064b\\u0649\\u0020\\u0655', '<p>Fatkhatain bertemu dengan hamzah (tengah bawah)</p>', '2023-06-13 15:29:29', '2023-06-13 15:29:29', 'R007'),
(40, 'R034', 2, NULL, '\\u064b\\u0624', '\\u064b\\u0020\\u0624', '<p>Fatkhatain bertemu dengan hamzah (atas wawu)</p>', '2023-06-13 15:30:05', '2023-06-13 15:30:05', 'R007'),
(41, 'R035', 2, NULL, '\\u064b\\u0640\\u0654', '\\u064b\\u0640\\u0020\\u0654', '<p>Fatkhatain bertemu dengan hamzah (atas lam alif)</p>', '2023-06-13 15:30:57', '2023-06-13 15:30:57', 'R007'),
(42, 'R036', 2, NULL, '\\u064b\\u0626', '\\u064b\\u0020\\u0626', '<p>Fatkhatain bertemu dengan hamzah nabroh ya\'</p>', '2023-06-13 15:31:22', '2023-06-13 15:31:22', 'R007'),
(43, 'R037', 2, NULL, '\\u064d\\u0623', '\\u064d\\u0020\\u0623', '<p>Kasrotain bertemu dengan hamzah qot\'i (atas)</p>', '2023-06-13 15:32:51', '2023-06-13 15:32:51', 'R013'),
(44, 'R038', 2, NULL, '\\u064d\\u0625', '\\u064d\\u0020\\u0625', '<p>Kasrotain bertemu dengan hamzah qot\'i (bawah)</p>', '2023-06-13 15:33:16', '2023-06-13 15:33:16', 'R013'),
(45, 'R039', 2, NULL, '\\u064d\\u0649\\u0655', '\\u064d\\u0649\\u0020\\u0655', '<p>Kasrotain bertemu dengan hamzah (tengah bawah)</p>', '2023-06-13 15:35:42', '2023-06-13 15:35:42', 'R013'),
(46, 'R040', 2, NULL, '\\u064d\\u0624', '\\u064d\\u0020\\u0624', '<p>Kasrotain bertemu dengan hamzah (atas wawu)</p>', '2023-06-13 15:36:13', '2023-06-13 15:36:13', 'R013'),
(47, 'R041', 2, NULL, '\\u064d\\u0640\\u0654', '\\u064d\\u0640\\u0020\\u0654', '<p>Kasrotain bertemu dengan hamzah (atas lam alif)</p>', '2023-06-13 15:36:55', '2023-06-13 15:36:55', 'R013'),
(48, 'R042', 2, NULL, '\\u064d\\u0626', '\\u064d\\u0020\\u0626', '<p>Kasrotain bertemu dengan hamzah nabroh ya\'</p>', '2023-06-13 15:37:23', '2023-06-13 15:37:23', 'R013'),
(49, 'R043', 2, NULL, '\\u064c\\u0623', '\\u064c\\u0020\\u0623', '<p>Dhommatain bertemu dengan hamzah qot\'i (atas)</p>', '2023-06-13 15:40:54', '2023-06-13 15:40:54', 'R019'),
(50, 'R044', 2, NULL, '\\u064c\\u0625', '\\u064c\\u0020\\u0625', '<p>Dhommatain bertemu dengan hamzah qot\'i (bawah)</p>', '2023-06-13 15:41:20', '2023-06-13 15:41:20', 'R019'),
(51, 'R045', 2, NULL, '\\u064c\\u0649\\u0655', '\\u064c\\u0649\\u0020\\u0655', '<p>Dhommatain bertemu dengan hamzah (tengah bawah)</p>', '2023-06-13 15:42:02', '2023-06-13 15:42:02', 'R019'),
(52, 'R046', 2, NULL, '\\u064c\\u0624', '\\u064c\\u0020\\u0624', '<p>Dhommatain bertemu dengan hamzah (atas wawu)</p>', '2023-06-13 15:43:14', '2023-06-13 15:43:14', 'R019'),
(53, 'R047', 2, NULL, '\\u064c\\u0640\\u0654', '\\u064c\\u0640\\u0020\\u0654', '<p>Dhommatain bertemu dengan hamzah (atas lam alif)</p>', '2023-06-13 15:43:53', '2023-06-13 15:43:53', 'R019'),
(54, 'R048', 2, NULL, '\\u064c\\u0626', '\\u064c\\u0020\\u0626', '<p>Dhommatain bertemu dengan hamzah nabroh ya\'</p>', '2023-06-13 15:44:16', '2023-06-13 15:44:16', 'R019'),
(55, 'R049', 2, NULL, '\\u08f1\\u0621', '\\u08f1\\u0020\\u0621', '<p>Dhommatain bertemu dengan hamzah</p>', '2023-06-13 15:48:19', '2023-06-13 15:48:19', 'R019'),
(56, 'R050', 2, NULL, '\\u08f1\\u062d', '\\u08f1\\u0020\\u062d', '<p>Dhommatain bertemu dengan ha\'</p>', '2023-06-13 15:48:56', '2023-06-13 15:48:56', 'R020'),
(57, 'R051', 2, NULL, '\\u08f1\\u062e', '\\u08f1\\u0020\\u062e', '<p>Dhommatain bertemu dengan kho\'</p>', '2023-06-13 15:49:23', '2023-06-13 15:49:23', 'R021'),
(58, 'R052', 2, NULL, '\\u08f1\\u0639', '\\u08f1\\u0020\\u0639', '<p>Dhommatain bertemu dengan \'ain</p>', '2023-06-13 15:50:01', '2023-06-13 15:50:01', 'R022'),
(59, 'R053', 2, NULL, '\\u08f1\\u063a', '\\u08f1\\u0020\\u063a', '<p>Dhommatain bertemu dengan ghoin</p>', '2023-06-13 15:50:27', '2023-06-13 15:50:27', 'R023'),
(60, 'R054', 2, NULL, '\\u08f1\\u0647', '\\u08f1\\u0020\\u0647', '<p>Dhommatain bertemu dengan ha</p>', '2023-06-13 15:51:16', '2023-06-13 15:51:16', 'R024'),
(61, 'R055', 2, NULL, '\\u08f1\\u0623', '\\u08f1\\u0020\\u0623', '<p>Dhommatain bertemu dengan hamzah qot\'i (atas)</p>', '2023-06-13 15:52:14', '2023-06-13 15:52:14', 'R019'),
(62, 'R056', 2, NULL, '\\u08f1\\u0625', '\\u08f1\\u0020\\u0625', '<p>Dhommatain bertemu dengan hamzah qot\'i (bawah)</p>', '2023-06-13 15:52:33', '2023-06-13 15:52:33', 'R019'),
(63, 'R057', 2, NULL, '\\u08f1\\u0649\\u0655', '\\u08f1\\u0649\\u0020\\u0655', '<p>Dhommatain bertemu dengan hamzah (tengah bawah)</p>', '2023-06-13 15:53:32', '2023-06-13 15:53:32', 'R019'),
(64, 'R058', 2, NULL, '\\u08f1\\u0624', '\\u08f1\\u0020\\u0624', '<p>Dhommatain bertemu dengan hamzah (atas wawu)</p>', '2023-06-13 15:54:30', '2023-06-13 15:54:30', 'R019'),
(65, 'R059', 2, NULL, '\\u08f1\\u0640\\u0654', '\\u08f1\\u0640\\u0020\\u0654', '<p>Dhommatain bertemu dengan hamzah (atas lam alif)</p>', '2023-06-13 15:54:52', '2023-06-13 15:54:52', 'R019'),
(66, 'R060', 2, NULL, '\\u08f1\\u0626', '\\u08f1\\u0020\\u0626', '<p>Dhommatain bertemu dengan hamzah nabroh ya\'</p>', '2023-06-13 15:55:19', '2023-06-13 15:55:19', 'R019'),
(67, 'R061', 3, NULL, '\\u0646\\u06e1\\u062a', '\\u0646\\u06e1\\u0020\\u062a', '<p>Nun mati bertemu dengan ta\'</p>', '2023-06-26 02:56:34', '2023-06-26 02:56:34', NULL),
(68, 'R062', 3, NULL, '\\u0646\\u06e1\\u062b', '\\u0646\\u06e1\\u0020\\u062b', '<p>Nun mati bertemu dengan tsa</p>', '2023-06-26 02:57:08', '2023-06-26 02:57:08', NULL),
(69, 'R063', 3, NULL, '\\u0646\\u06e1\\u062f', '\\u0646\\u06e1\\u0020\\u062f', '<p>Nun mati bertemu dengan dal</p>', '2023-06-26 02:58:56', '2023-06-26 02:58:56', NULL),
(70, 'R064', 3, NULL, '\\u0646\\u06e1\\u0630', '\\u0646\\u06e1\\u0020\\u0630', '<p>Nun mati bertemu dengan dzal</p>', '2023-06-26 02:59:47', '2023-06-26 02:59:47', NULL),
(71, 'R065', 3, NULL, '\\u0646\\u06e1\\u062c', '\\u0646\\u06e1\\u0020\\u062c', '<p>Nun mati bertemu dengan jim</p>', '2023-06-26 03:00:17', '2023-06-26 03:00:17', NULL),
(72, 'R066', 3, NULL, '\\u0646\\u06e1\\u0632', '\\u0646\\u06e1\\u0020\\u0632', '<p>Nun mati bertemu dengan za</p>', '2023-06-26 03:00:57', '2023-06-26 03:00:57', NULL),
(73, 'R067', 3, NULL, '\\u0646\\u06e1\\u0633', '\\u0646\\u06e1\\u0020\\u0633', '<p>Nun mati bertemu dengan sin</p>', '2023-06-26 03:01:35', '2023-06-26 03:01:35', NULL),
(74, 'R068', 3, NULL, '\\u0646\\u06e1\\u0634', '\\u0646\\u06e1\\u0020\\u0634', '<p>Nun mati bertemu dengan syin</p>', '2023-06-26 03:02:27', '2023-06-26 03:02:27', NULL),
(75, 'R069', 3, NULL, '\\u0646\\u06e1\\u0635', '\\u0646\\u06e1\\u0020\\u0635', '<p>Nun mati bertemu dengan shod</p>', '2023-06-26 03:04:00', '2023-06-26 03:04:00', NULL),
(76, 'R070', 3, NULL, '\\u0646\\u06e1\\u0636', '\\u0646\\u06e1\\u0020\\u0636', '<p>Nun mati bertemu dengan dhod</p>', '2023-06-26 03:04:56', '2023-06-26 03:04:56', NULL),
(77, 'R071', 3, NULL, '\\u0646\\u06e1\\u0637', '\\u0646\\u06e1\\u0020\\u0637', '<p>Nun mati bertemu dengan tho\'</p>', '2023-06-26 03:05:29', '2023-07-10 04:19:38', NULL),
(78, 'R072', 3, NULL, '\\u0646\\u06e1\\u0638', '\\u0646\\u06e1\\u0020\\u0638', '<p>Nun mati bertemu dengan zho\'</p>', '2023-06-26 03:05:55', '2023-06-26 03:05:55', NULL),
(79, 'R073', 3, NULL, '\\u0646\\u06e1\\u0641', '\\u0646\\u06e1\\u0020\\u0641', '<p>Nun mati bertemu dengan fa\'</p>', '2023-06-26 03:06:27', '2023-06-26 03:06:27', NULL),
(80, 'R074', 3, NULL, '\\u0646\\u06e1\\u0642', '\\u0646\\u06e1\\u0020\\u0642', '<p>Nun mati bertemu dengan qof</p>', '2023-06-26 03:06:45', '2023-06-26 03:06:45', NULL),
(81, 'R075', 3, NULL, '\\u0646\\u06e1\\u0643', '\\u0646\\u06e1\\u0020\\u0643', '<p>Nun mati bertemu dengan kaf</p>', '2023-06-26 03:07:16', '2023-06-26 03:07:16', NULL),
(82, 'R076', 3, NULL, '\\u08f0\\u062a', '\\u08f0\\u0020\\u062a', '<p>Fatkhatain bertemu dengan ta\'</p>', '2023-06-26 03:28:26', '2023-07-03 15:07:27', NULL),
(83, 'R077', 3, NULL, '\\u08f0\\u062b', '\\u08f0\\u0020\\u062b', '<p>Fatkhatain bertemu dengan tsa</p>', '2023-06-26 03:28:55', '2023-07-03 15:07:52', NULL),
(84, 'R078', 3, NULL, '\\u08f0\\u062f', '\\u08f0\\u0020\\u062f', '<p>Fatkhatain bertemu dengan dal</p>', '2023-06-26 03:29:15', '2023-07-03 15:08:13', NULL),
(85, 'R079', 3, NULL, '\\u08f0\\u0630', '\\u08f0\\u0020\\u0630', '<p>Fatkhatain bertemu dengan dzal</p>', '2023-06-26 03:29:36', '2023-07-03 15:08:43', NULL),
(86, 'R080', 3, NULL, '\\u08f0\\u062c', '\\u08f0\\u0020\\u062c', '<p>Fatkhatain bertemu dengan</p>', '2023-06-26 03:29:49', '2023-07-03 15:09:09', NULL),
(87, 'R081', 3, NULL, '\\u08f0\\u0632', '\\u08f0\\u0020\\u0632', '<p>Fatkhatain bertemu dengan za</p>', '2023-06-26 03:30:32', '2023-07-03 15:09:38', NULL),
(88, 'R082', 3, NULL, '\\u08f0\\u0633', '\\u08f0\\u0020\\u0633', '<p>Fatkhatain bertemu dengan sin</p>', '2023-06-26 03:30:49', '2023-07-03 15:09:54', NULL),
(89, 'R083', 3, NULL, '\\u08f0\\u0634', '\\u08f0\\u0020\\u0634', '<p>Fatkhatain bertemu dengan syin</p>', '2023-06-26 03:31:00', '2023-07-03 15:10:10', NULL),
(90, 'R084', 3, NULL, '\\u08f0\\u0635', '\\u08f0\\u0020\\u0635', '<p>Fatkhatain bertemu dengan shod</p>', '2023-06-26 03:31:15', '2023-07-03 15:10:32', NULL),
(91, 'R085', 3, NULL, '\\u08f0\\u0636', '\\u08f0\\u0020\\u0636', '<p>Fatkhatain bertemu dengan dhod</p>', '2023-06-26 03:31:30', '2023-07-03 15:10:46', NULL),
(92, 'R086', 3, NULL, '\\u08f0\\u0637', '\\u08f0\\u0020\\u0637', '<p>Fatkhatain bertemu dengan tho\'</p>', '2023-06-26 03:31:55', '2023-07-03 15:11:02', NULL),
(93, 'R087', 3, NULL, '\\u08f0\\u0638', '\\u08f0\\u0020\\u0638', '<p>Fatkhatain bertemu dengan dho\'</p>', '2023-06-26 03:32:14', '2023-07-03 15:11:56', NULL),
(94, 'R088', 3, NULL, '\\u08f0\\u0641', '\\u08f0\\u0020\\u0641', '<p>Fatkhatain bertemu dengan fa\'</p>', '2023-06-26 03:32:32', '2023-07-03 15:12:16', NULL),
(95, 'R089', 3, NULL, '\\u08f0\\u0642', '\\u08f0\\u0020\\u0642', '<p>Fatkhatain bertemu dengan qof</p>', '2023-06-26 03:32:47', '2023-07-03 15:12:36', NULL),
(96, 'R090', 3, NULL, '\\u08f0\\u0643', '\\u08f0\\u0020\\u0643', '<p>Fatkhatain bertemu dengan kaf</p>', '2023-06-26 03:33:00', '2023-07-03 15:12:55', NULL),
(97, 'R091', 3, NULL, '\\u08f2\\u062a', '\\u08f2\\u0020\\u062a', '<p>Kasrotain bertemu dengan ta\'</p>', '2023-06-26 03:34:15', '2023-07-03 15:14:47', NULL),
(98, 'R092', 3, NULL, '\\u08f2\\u062b', '\\u08f2\\u0020\\u062b', '<p>Kasrotain bertemu dengan tsa</p>', '2023-06-26 03:34:32', '2023-07-03 15:15:08', NULL),
(99, 'R093', 3, NULL, '\\u08f2\\u062f', '\\u08f2\\u0020\\u062f', '<p>Kasrotain bertemu dengan dal</p>', '2023-06-26 03:34:50', '2023-07-03 15:15:27', NULL),
(100, 'R094', 3, NULL, '\\u08f2\\u0630', '\\u08f2\\u0020\\u0630', '<p>Kasrotain bertemu dengan dzal</p>', '2023-06-26 03:35:02', '2023-07-03 15:15:45', NULL),
(101, 'R095', 3, NULL, '\\u08f2\\u062c', '\\u08f2\\u0020\\u062c', '<p>Kasrotain bertemu dengan jim</p>', '2023-06-26 03:35:14', '2023-07-03 15:16:00', NULL),
(102, 'R096', 3, NULL, '\\u08f2\\u0632', '\\u08f2\\u0020\\u0632', '<p>Kasrotain bertemu dengan za</p>', '2023-06-26 03:35:27', '2023-07-03 15:16:21', NULL),
(103, 'R097', 3, NULL, '\\u08f2\\u0633', '\\u08f2\\u0020\\u0633', '<p>Kasrotain bertemu dengan sin</p>', '2023-06-26 03:35:39', '2023-07-03 15:16:41', NULL),
(104, 'R098', 3, NULL, '\\u08f2\\u0634', '\\u08f2\\u0020\\u0634', '<p>Kasrotain bertemu dengan syin</p>', '2023-06-26 03:35:51', '2023-07-03 15:16:54', NULL),
(105, 'R099', 3, NULL, '\\u08f2\\u0635', '\\u08f2\\u0020\\u0635', '<p>Kasrotain bertemu dengan shod</p>', '2023-06-26 03:36:07', '2023-07-03 15:17:07', NULL),
(106, 'R100', 3, NULL, '\\u08f2\\u0636', '\\u08f2\\u0020\\u0636', '<p>Kasrotain bertemu dengan dhod</p>', '2023-06-26 03:36:19', '2023-07-03 15:17:21', NULL),
(107, 'R101', 3, NULL, '\\u08f2\\u0637', '\\u08f2\\u0020\\u0637', '<p>Kasrotain bertemu dengan tho\'</p>', '2023-06-26 03:36:36', '2023-07-03 15:17:40', NULL),
(108, 'R102', 3, NULL, '\\u08f2\\u0638', '\\u08f2\\u0020\\u0638', '<p>Kasrotain bertemu dengan zho\'</p>', '2023-06-26 03:36:52', '2023-07-03 15:17:55', NULL),
(109, 'R103', 3, NULL, '\\u08f2\\u0641', '\\u08f2\\u0020\\u0641', '<p>Kasrotain bertemu dengan fa\'</p>', '2023-06-26 03:37:18', '2023-07-03 15:18:11', NULL),
(110, 'R104', 3, NULL, '\\u08f2\\u0642', '\\u08f2\\u0020\\u0642', '<p>Kasrotain bertemu dengan qof</p>', '2023-06-26 03:37:32', '2023-07-03 15:18:30', NULL),
(111, 'R105', 3, NULL, '\\u08f2\\u0643', '\\u08f2\\u0020\\u0643', '<p>Kasrotain bertemu dengan kaf</p>', '2023-06-26 03:37:59', '2023-07-03 15:18:43', NULL),
(112, 'R106', 3, NULL, '\\u08f1\\u062a', '\\u08f1\\u0020\\u062a', '<p>Dhommatain bertemu dengan ta\'</p>', '2023-06-26 03:39:25', '2023-06-26 03:45:01', NULL),
(113, 'R107', 3, NULL, '\\u08f1\\u062b', '\\u08f1\\u0020\\u062b', '<p>Dhommatain bertemu dengan tsa</p>', '2023-06-26 03:39:43', '2023-06-26 03:45:18', NULL),
(114, 'R108', 3, NULL, '\\u08f1\\u062f', '\\u08f1\\u0020\\u062f', '<p>Dhommatain bertemu dengan dal</p>', '2023-06-26 03:40:05', '2023-06-26 03:45:41', NULL),
(115, 'R109', 3, NULL, '\\u08f1\\u0630', '\\u08f1\\u0020\\u0630', '<p>Dhommatain bertemu dengan dzal</p>', '2023-06-26 03:46:47', '2023-06-26 03:46:47', NULL),
(116, 'R110', 3, NULL, '\\u08f1\\u062c', '\\u08f1\\u0020\\u062c', '<p>Dhommatain bertemu dengan jim</p>', '2023-06-26 03:47:13', '2023-06-26 03:47:13', NULL),
(117, 'R111', 3, NULL, '\\u08f1\\u0632', '\\u08f1\\u0020\\u0632', '<p>Dhommatain bertemu dengan za</p>', '2023-06-26 03:47:34', '2023-06-26 03:47:34', NULL),
(118, 'R112', 3, NULL, '\\u08f1\\u0633', '\\u08f1\\u0020\\u0633', '<p>Dhommatain bertemu dengan sin</p>', '2023-06-26 03:47:45', '2023-06-26 03:47:45', NULL),
(119, 'R113', 3, NULL, '\\u08f1\\u0634', '\\u08f1\\u0020\\u0634', '<p>Dhommatain bertemu dengan syin</p>', '2023-06-26 03:47:56', '2023-06-26 03:47:56', NULL),
(120, 'R114', 3, NULL, '\\u08f1\\u0635', '\\u08f1\\u0020\\u0635', '<p>Dhommatain bertemu dengan shod</p>', '2023-06-26 03:48:08', '2023-06-26 03:48:08', NULL),
(121, 'R115', 3, NULL, '\\u08f1\\u0636', '\\u08f1\\u0020\\u0636', '<p>Dhommatain bertemu dengan dhod</p>', '2023-06-26 03:48:20', '2023-06-26 03:48:20', NULL),
(122, 'R116', 3, NULL, '\\u08f1\\u0637', '\\u08f1\\u0020\\u0637', '<p>Dhommatain bertemu dengan tho\'</p>', '2023-06-26 03:48:36', '2023-06-26 03:48:36', NULL),
(123, 'R117', 3, NULL, '\\u08f1\\u0638', '\\u08f1\\u0020\\u0638', '<p>Dhommatain bertemu dengan zho\'</p>', '2023-06-26 03:48:59', '2023-06-26 03:48:59', NULL),
(124, 'R118', 3, NULL, '\\u08f1\\u0641', '\\u08f1\\u0020\\u0641', '<p>Dhommatain bertemu dengan fa\'</p>', '2023-06-26 03:49:40', '2023-06-26 03:49:40', NULL),
(125, 'R119', 3, NULL, '\\u08f1\\u0642', '\\u08f1\\u0020\\u0642', '<p>Dhommatain bertemu dengan qof</p>', '2023-06-26 03:49:58', '2023-06-26 03:49:58', NULL),
(126, 'R120', 3, NULL, '\\u08f1\\u0643', '\\u08f1\\u0020\\u0643', '<p>Dhommatain bertemu dengan kaf</p>', '2023-06-26 03:50:16', '2023-06-26 03:50:16', NULL),
(127, 'R121', 3, NULL, '\\u064c\\u062a', '\\u064c\\u0020\\u062a', '<p>Dhommatain bertemu dengan ta\'</p>', '2023-06-26 04:19:18', '2023-06-26 04:19:18', 'R106'),
(128, 'R122', 3, NULL, '\\u064c\\u062b', '\\u064c\\u0020\\u062b', '<p>Dhommatain bertemu dengan tsa</p>', '2023-06-26 04:19:43', '2023-06-26 04:19:43', 'R107'),
(129, 'R123', 3, NULL, '\\u064c\\u062f', '\\u064c\\u0020\\u062f', '<p>Dhommatain bertemu dengan dal</p>', '2023-06-26 04:20:27', '2023-06-26 04:20:27', 'R108'),
(130, 'R124', 3, NULL, '\\u064c\\u0630', '\\u064c\\u0020\\u0630', '<p>Dhommatain bertemu dengan dzal</p>', '2023-06-26 04:20:54', '2023-06-26 04:20:54', 'R109'),
(131, 'R125', 3, NULL, '\\u064c\\u062c', '\\u064c\\u0020\\u062c', '<p>Dhommatain bertemu dengan jim</p>', '2023-06-26 04:22:36', '2023-06-26 04:22:36', 'R110'),
(132, 'R126', 3, NULL, '\\u064c\\u0632', '\\u064c\\u0020\\u0632', '<p>Dhommatain bertemu dengan za</p>', '2023-06-26 04:23:23', '2023-06-26 04:23:23', 'R111'),
(133, 'R127', 3, NULL, '\\u064c\\u0633', '\\u064c\\u0020\\u0633', '<p>Dhommatain bertemu dengan sin</p>', '2023-06-26 04:23:38', '2023-06-26 04:23:38', 'R112'),
(134, 'R128', 3, NULL, '\\u064c\\u0634', '\\u064c\\u0020\\u0634', '<p>Dhommatain bertemu dengan syin</p>', '2023-06-26 04:23:57', '2023-06-26 04:23:57', 'R113'),
(135, 'R129', 3, NULL, '\\u064c\\u0635', '\\u064c\\u0020\\u0635', '<p>Dhommatain bertemu dengan shod</p>', '2023-06-26 04:24:13', '2023-06-26 04:24:13', 'R114'),
(136, 'R130', 3, NULL, '\\u064c\\u0636', '\\u064c\\u0020\\u0636', '<p>Dhommatain bertemu dengan dhod</p>', '2023-06-26 04:24:30', '2023-06-26 04:24:30', 'R115'),
(137, 'R131', 3, NULL, '\\u064c\\u0637', '\\u064c\\u0020\\u0637', '<p>Dhommatain bertemu dengan tho\'</p>', '2023-06-26 04:24:50', '2023-06-26 04:24:50', 'R116'),
(138, 'R132', 3, NULL, '\\u064c\\u0638', '\\u064c\\u0020\\u0638', '<p>Dhommatain bertemu dengan zho\'</p>', '2023-06-26 04:25:08', '2023-06-26 04:25:08', 'R117'),
(139, 'R133', 3, NULL, '\\u064c\\u0641', '\\u064c\\u0020\\u0641', '<p>Dhommatain bertemu dengan fa\'</p>', '2023-06-26 04:25:31', '2023-06-26 04:25:31', 'R118'),
(140, 'R134', 3, NULL, '\\u064c\\u0642', '\\u064c\\u0020\\u0642', '<p>Dhommatain bertemu dengan qof</p>', '2023-06-26 04:25:58', '2023-06-26 04:25:58', 'R119'),
(141, 'R135', 3, NULL, '\\u064c\\u0643', '\\u064c\\u0020\\u0643', '<p>Dhommatain bertemu dengan kaf</p>', '2023-06-26 04:26:22', '2023-06-26 04:26:22', 'R120'),
(142, 'R136', 4, NULL, '\\u0646\\u06e1\\u0628', '\\u0646\\u06e1\\u0020\\u0628', '<p>Nun mati bertemu dengan ba\'</p>', '2023-06-26 04:34:20', '2023-06-26 04:34:20', NULL),
(143, 'R137', 4, NULL, '\\u064b\\u0628', '\\u064b\\u0020\\u0628', '<p>Fatkhatain bertemu dengan ba\'</p>', '2023-06-26 04:34:45', '2023-06-26 04:34:45', NULL),
(144, 'R138', 4, NULL, '\\u064d\\u0628', '\\u064d\\u0020\\u0628', '<p>Kasrotain bertemu dengan ba\'</p>', '2023-06-26 04:35:19', '2023-06-26 04:35:19', NULL),
(145, 'R139', 4, NULL, '\\u064c\\u0628', '\\u064c\\u0020\\u0628', '<p>Dhommatain bertemu dengan ba\'</p>', '2023-06-26 04:35:38', '2023-06-26 04:35:38', NULL),
(146, 'R140', 4, NULL, '\\u08f1\\u0628', '\\u08f1\\u0020\\u0628', '<p>Dhommatain bertemu dengan ba\'</p>', '2023-06-26 04:36:36', '2023-06-26 04:36:36', 'R139'),
(147, 'R141', 4, NULL, '\\u064f\\u06e2\\u0628', '\\u064f\\u06e2\\u0020\\u0628', '<p>Dhommatain bertemu dengan ba\' (terdapat tanda mim di atas)</p>', '2023-06-26 04:40:43', '2023-07-10 11:29:34', 'R139'),
(148, 'R142', 4, NULL, '\\u0646\\u06e2\\u0628', '\\u0646\\u06e2\\u0020\\u0628', '<p>Nun mati bertemu dengan ba\' (terdapat tanda mim di atas nun)</p>', '2023-06-26 04:46:12', '2023-06-26 04:46:12', 'R136'),
(149, 'R143', 4, NULL, '\\u064e\\u06e2\\u0628', '\\u064e\\u06e2\\u0020\\u0628', '<p>Fatkhatain bertemu dengan ba\' (terdapat tanda mim di atas)</p>', '2023-06-26 04:57:25', '2023-06-26 04:57:25', 'R137'),
(150, 'R144', 4, NULL, '\\u064e\\u06e2\\u0627\\u0020\\u0628', NULL, '<p>Fatkhatain bertemu dengan ba\' (terdapat tanda mim di atas)</p>', '2023-06-26 04:59:19', '2023-06-26 04:59:19', 'R137'),
(151, 'R145', 5, NULL, '\\u0646\\u06e1\\u0020\\u064a', NULL, '<p>Nun mati bertemu dengan huruf ya\' pada kata berbeda</p>', '2023-07-03 07:03:02', '2023-07-03 07:03:02', NULL),
(152, 'R146', 5, NULL, '\\u0646\\u06e1\\u0646', '\\u0020\\u0646\\u06e1\\u0020\\u0646', '<p>Nun mati bertemu dengan nun</p>', '2023-07-03 07:03:46', '2023-07-03 07:03:46', NULL),
(153, 'R147', 5, NULL, '\\u0646\\u06e1\\u0020\\u0648', NULL, '<p>Nun mati bertemu dengan wawu pada kata berbeda</p>', '2023-07-03 07:04:29', '2023-07-03 07:04:29', NULL),
(154, 'R148', 5, NULL, '\\u0646\\u06e1\\u0645', '\\u0646\\u06e1\\u0020\\u0645', '<p>Nun mati bertemu dengan mim</p>', '2023-07-03 07:04:59', '2023-07-03 07:04:59', NULL),
(155, 'R149', 5, NULL, '\\u064b\\u064a', '\\u064b\\u0020\\u064a', '<p>Fatkhatain bertemu dengan huruf ya\'</p>', '2023-07-03 07:06:08', '2023-07-03 07:06:08', NULL),
(156, 'R150', 5, NULL, '\\u064b\\u0646', '\\u064b\\u0020\\u0646', '<p>Fatkhatain bertemu dengan huruf nun</p>', '2023-07-03 07:06:24', '2023-07-03 07:06:24', NULL),
(157, 'R151', 5, NULL, '\\u064b\\u0645', '\\u064b\\u0020\\u0645', '<p>Fatkhatain bertemu dengan mim</p>', '2023-07-03 07:07:08', '2023-07-03 07:07:08', NULL),
(158, 'R152', 5, NULL, '\\u064b\\u0648', '\\u064b\\u0020\\u0648', '<p>Fatkhatain bertemu dengan huruf wawu</p>', '2023-07-03 07:07:29', '2023-07-03 07:07:29', NULL),
(159, 'R153', 5, NULL, '\\u064d\\u064a', '\\u064d\\u0020\\u064a', '<p>Kasrotain bertemu dengan huruf ya\'</p>', '2023-07-03 07:08:11', '2023-07-03 07:08:11', NULL),
(160, 'R154', 5, NULL, '\\u064d\\u0646', '\\u064d\\u0020\\u0646', '<p>Kasrotain bertemu dengan huruf nun</p>', '2023-07-03 07:08:41', '2023-07-03 07:08:41', NULL),
(161, 'R155', 5, NULL, '\\u064d\\u0645', '\\u064d\\u0020\\u0645', '<p>Kasrotain bertemu dengan huruf mim</p>', '2023-07-03 07:08:59', '2023-07-03 07:08:59', NULL),
(162, 'R156', 5, NULL, '\\u064d\\u0020\\u0648', NULL, '<p>Kasrotain bertemu dengan huruf wawu</p>', '2023-07-03 07:09:18', '2023-07-10 12:11:57', NULL),
(163, 'R157', 5, NULL, '\\u08f1\\u064a', '\\u08f1\\u0020\\u064a', '<p>Dhommatain bertemu dengan huruf ya\'</p>', '2023-07-03 07:10:23', '2023-07-03 07:10:23', NULL),
(164, 'R158', 5, NULL, '\\u08f1\\u0646', '\\u08f1\\u0020\\u0646', '<p>Dhommatain bertemu dengan huruf nun</p>', '2023-07-03 07:10:41', '2023-07-11 07:04:43', 'R337'),
(165, 'R159', 5, NULL, '\\u08f1\\u0645', '\\u08f1\\u0020\\u0645', '<p>Dhommatain bertemu dengan huruf mim</p>', '2023-07-03 07:11:02', '2023-07-11 07:06:18', 'R338'),
(166, 'R160', 5, NULL, '\\u08f1\\u0648', '\\u08f1\\u0020\\u0648', '<p>Dhommatain bertemu dengan huruf wawu</p>', '2023-07-03 07:12:48', '2023-07-03 07:12:48', NULL),
(167, 'R161', 6, NULL, '\\u0646\\u06e1\\u0644', '\\u0646\\u06e1\\u0020\\u0644', '<p>Nun mati bertemu dengan huruf lam</p>', '2023-07-03 07:13:37', '2023-07-03 07:13:37', NULL),
(168, 'R162', 6, NULL, '\\u0646\\u06e1\\u0631', '\\u0646\\u06e1\\u0020\\u0631', '<p>Nun mati bertemu dengan huruf ro\'</p>', '2023-07-03 07:13:58', '2023-07-03 07:13:58', NULL),
(169, 'R163', 6, NULL, '\\u064b\\u0644', '\\u064b\\u0020\\u0644', '<p>Fatkhatain bertemu dengan lam</p>', '2023-07-03 07:14:41', '2023-07-03 07:14:41', NULL),
(170, 'R164', 6, NULL, '\\u064b\\u0631', '\\u064b\\u0020\\u0631', '<p>Fatkhatain bertemu dengan ro\'</p>', '2023-07-03 07:14:57', '2023-07-03 07:14:57', NULL),
(171, 'R165', 6, NULL, '\\u064d\\u0644', '\\u064d\\u0020\\u0644', '<p>Kasrotain bertemu dengan lam</p>', '2023-07-03 07:15:29', '2023-07-03 07:15:29', NULL),
(172, 'R166', 6, NULL, '\\u064d\\u0631', '\\u064d\\u0020\\u0631', '<p>Kasrotain bertemu dengan ro\'</p>', '2023-07-03 07:15:44', '2023-07-03 07:15:44', NULL),
(173, 'R167', 6, NULL, '\\u08f1\\u0644', '\\u08f1\\u0020\\u0644', '<p>Dhommatain bertemu dengan lam</p>', '2023-07-03 07:16:10', '2023-07-11 07:17:31', 'R341'),
(174, 'R168', 6, NULL, '\\u08f1\\u0631', '\\u08f1\\u0020\\u0631', '<p>Dhommatain bertemu dengan ro\'</p>', '2023-07-03 07:16:35', '2023-07-11 07:19:02', 'R342'),
(175, 'R169', 7, NULL, '\\u0645\\u06e1\\u0628', '\\u0645\\u06e1\\u0020\\u0628', '<p>Mim mati bertemu dengan huruf ba\'</p>', '2023-07-03 07:46:02', '2023-07-03 07:46:02', NULL),
(176, 'R170', 8, NULL, '\\u0645\\u06e1\\u0645', '\\u0645\\u06e1\\u0020\\u0645', '<p>Mim mati bertemu dengan mim</p>', '2023-07-03 07:46:24', '2023-07-03 07:46:24', NULL),
(177, 'R171', 9, NULL, '\\u0645\\u06e1\\u0621', '\\u0645\\u06e1\\u0020\\u0621', '<p>Mim mati bertemu dengan huruf hamzah</p>', '2023-07-03 07:48:02', '2023-07-03 07:48:02', NULL),
(178, 'R172', 9, NULL, '\\u0645\\u06e1\\u062a', '\\u0645\\u06e1\\u0020\\u062a', '<p>Mim mati bertemu dengan huruf ta\'</p>', '2023-07-03 07:48:44', '2023-07-03 07:48:44', NULL),
(179, 'R173', 9, NULL, '\\u0645\\u06e1\\u062b', '\\u0645\\u06e1\\u0020\\u062b', '<p>Mim mati bertemu dengan huruf tsa</p>', '2023-07-03 07:49:20', '2023-07-03 07:49:20', NULL),
(180, 'R174', 9, NULL, '\\u0645\\u06e1\\u062c', '\\u0645\\u06e1\\u0020\\u062c', '<p>Mim mati bertemu dengan huruf jim</p>', '2023-07-03 07:50:12', '2023-07-03 07:50:12', NULL),
(181, 'R175', 9, NULL, '\\u0645\\u06e1\\u062d', '\\u0645\\u06e1\\u0020\\u062d', '<p>Mim mati bertemu dengan huruf ha\'</p>', '2023-07-03 07:51:19', '2023-07-03 07:51:19', NULL),
(182, 'R176', 9, NULL, '\\u0645\\u06e1\\u062e', '\\u0645\\u06e1\\u0020\\u062e', '<p>Mim mati bertemu dengan huruf kho\'</p>', '2023-07-03 07:51:33', '2023-07-03 07:51:33', NULL),
(183, 'R177', 9, NULL, '\\u0645\\u06e1\\u062f', '\\u0645\\u06e1\\u0020\\u062f', '<p>Mim mati bertemu dengan huruf dal</p>', '2023-07-03 07:51:54', '2023-07-03 07:51:54', NULL),
(184, 'R178', 9, NULL, '\\u0645\\u06e1\\u0630', '\\u0645\\u06e1\\u0020\\u0630', '<p>Mim mati bertemu dengan huruf dzal</p>', '2023-07-03 07:52:10', '2023-07-03 07:52:10', NULL),
(185, 'R179', 9, NULL, '\\u0645\\u06e1\\u0631', '\\u0645\\u06e1\\u0020\\u0631', '<p>Mim mati bertemu dengan huruf ro\'</p>', '2023-07-03 07:52:31', '2023-07-03 07:52:31', NULL),
(186, 'R180', 9, NULL, '\\u0645\\u06e1\\u0632', '\\u0645\\u06e1\\u0020\\u0632', '<p>Mim mati bertemu dengan huruf za</p>', '2023-07-03 07:52:49', '2023-07-03 07:52:49', NULL),
(187, 'R181', 9, NULL, '\\u0645\\u06e1\\u0633', '\\u0645\\u06e1\\u0020\\u0633', '<p>Mim mati bertemu dengan huruf sin</p>', '2023-07-03 07:53:14', '2023-07-03 07:53:14', NULL),
(188, 'R182', 9, NULL, '\\u0645\\u06e1\\u0634', '\\u0645\\u06e1\\u0020\\u0634', '<p>Mim mati bertemu dengan huruf syin</p>', '2023-07-03 07:53:28', '2023-07-03 07:53:28', NULL),
(189, 'R183', 9, NULL, '\\u0645\\u06e1\\u0635', '\\u0645\\u06e1\\u0020\\u0635', '<p>Mim mati bertemu dengan huruf shod</p>', '2023-07-03 07:53:47', '2023-07-03 07:53:47', NULL),
(190, 'R184', 9, NULL, '\\u0645\\u06e1\\u0636', '\\u0645\\u06e1\\u0020\\u0636', '<p>Mim mati bertemu dengan huruf dhod</p>', '2023-07-03 07:54:06', '2023-07-03 07:54:06', NULL),
(191, 'R185', 9, NULL, '\\u0645\\u06e1\\u0637', '\\u0645\\u06e1\\u0020\\u0637', '<p>Mim mati bertemu dengan huruf tho\'</p>', '2023-07-03 07:54:23', '2023-07-03 07:54:23', NULL),
(192, 'R186', 9, NULL, '\\u0645\\u06e1\\u0638', '\\u0645\\u06e1\\u0020\\u0638', '<p>Mim mati bertemu dengan huruf zho\'</p>', '2023-07-03 07:54:39', '2023-07-03 07:54:39', NULL),
(193, 'R187', 9, NULL, '\\u0645\\u06e1\\u0639', '\\u0645\\u06e1\\u0020\\u0639', '<p>Mim mati bertemu dengan huruf \'ain</p>', '2023-07-03 07:55:02', '2023-07-03 07:55:02', NULL),
(194, 'R188', 9, NULL, '\\u0645\\u06e1\\u063a', '\\u0645\\u06e1\\u0020\\u063a', '<p>Mim mati bertemu dengan huruf ghoin</p>', '2023-07-03 07:55:20', '2023-07-03 07:55:20', NULL),
(195, 'R189', 9, NULL, '\\u0645\\u06e1\\u0641', '\\u0645\\u06e1\\u0020\\u0641', '<p>Mim mati bertemu dengan huruf fa\'</p>', '2023-07-03 07:55:40', '2023-07-03 07:55:40', NULL),
(196, 'R190', 9, NULL, '\\u0645\\u06e1\\u0642', '\\u0645\\u06e1\\u0020\\u0642', '<p>Mim mati bertemu dengan huruf qof</p>', '2023-07-03 07:55:55', '2023-07-03 07:55:55', NULL),
(197, 'R191', 9, NULL, '\\u0645\\u06e1\\u0643', '\\u0645\\u06e1\\u0020\\u0643', '<p>Mim mati bertemu dengan huruf kaf</p>', '2023-07-03 07:56:13', '2023-07-03 07:56:13', NULL),
(198, 'R192', 9, NULL, '\\u0645\\u06e1\\u0644', '\\u0645\\u06e1\\u0020\\u0644', '<p>Mim mati bertemu dengan huruf lam</p>', '2023-07-03 07:56:37', '2023-07-03 07:56:37', NULL),
(199, 'R193', 9, NULL, '\\u0645\\u06e1\\u0646', '\\u0645\\u06e1\\u0020\\u0646', '<p>Mim mati bertemu dengan huruf nun</p>', '2023-07-03 07:56:52', '2023-07-03 07:56:52', NULL),
(200, 'R194', 9, NULL, '\\u0645\\u06e1\\u0648', '\\u0645\\u06e1\\u0020\\u0648', '<p>Mim mati bertemu dengan huruf wawu</p>', '2023-07-03 07:57:16', '2023-07-03 07:57:16', NULL),
(201, 'R195', 9, NULL, '\\u0645\\u06e1\\u0647', '\\u0645\\u06e1\\u0020\\u0647', '<p>Mim mati bertemu dengan huruf ha</p>', '2023-07-03 07:57:38', '2023-07-03 07:57:38', NULL),
(202, 'R196', 9, NULL, '\\u0645\\u06e1\\u064a', '\\u0645\\u06e1\\u0020\\u064a', '<p>Mim mati bertemu dengan huruf ya\'</p>', '2023-07-03 07:57:52', '2023-07-11 07:34:50', NULL),
(203, 'R197', 10, NULL, '\\u0646\\u0651', NULL, '<p>Nun yang memiliki harokat tasydid</p>', '2023-07-03 08:03:17', '2023-07-03 08:03:17', NULL),
(204, 'R198', 10, NULL, '\\u0645\\u0651', NULL, '<p>Mim yang memiliki harokat tasydid</p>', '2023-07-03 08:03:38', '2023-07-03 08:03:38', NULL),
(205, 'R199', 11, NULL, '\\u0671\\u0644\\u06e1\\u0621', NULL, '<p>Alif lam bertemu dengan hamzah</p>', '2023-07-03 09:14:30', '2023-07-03 09:14:30', NULL),
(206, 'R200', 11, NULL, '\\u0671\\u0644\\u06e1\\u0628', NULL, '<p>Alif lam bertemu dengan ba\'</p>', '2023-07-03 09:14:50', '2023-07-03 09:14:50', NULL),
(207, 'R201', 11, NULL, '\\u0671\\u0644\\u06e1\\u062c', NULL, '<p>Alif lam bertemu dengan jim</p>', '2023-07-03 09:15:07', '2023-07-03 09:15:07', NULL),
(208, 'R202', 11, NULL, '\\u0671\\u0644\\u06e1\\u062d', NULL, '<p>Alif lam bertemu dengan ha\'</p>', '2023-07-03 09:15:34', '2023-07-03 09:15:34', NULL),
(209, 'R203', 11, NULL, '\\u0671\\u0644\\u06e1\\u062e', NULL, '<p>Alif lam bertemu dengan kho</p>', '2023-07-03 09:16:20', '2023-07-03 09:16:20', NULL),
(210, 'R204', 11, NULL, '\\u0671\\u0644\\u06e1\\u0639', NULL, '<p>Alif lam bertemu dengan \'ain</p>', '2023-07-03 09:16:40', '2023-07-03 09:16:40', NULL),
(211, 'R205', 11, NULL, '\\u0671\\u0644\\u06e1\\u063a', NULL, '<p>Alif lam bertemu dengan ghoin</p>', '2023-07-03 09:17:29', '2023-07-03 09:17:29', NULL),
(212, 'R206', 11, NULL, '\\u0671\\u0644\\u06e1\\u0641', NULL, '<p>Alif lam bertemu dengan fa\'</p>', '2023-07-03 09:17:53', '2023-07-03 09:17:53', NULL),
(213, 'R207', 11, NULL, '\\u0671\\u0644\\u06e1\\u0642', NULL, '<p>Alif lam bertemu dengan qof</p>', '2023-07-03 09:18:33', '2023-07-03 09:18:33', NULL),
(214, 'R208', 11, NULL, '\\u0671\\u0644\\u06e1\\u0643', NULL, '<p>Alif lam bertemu dengan kaf</p>', '2023-07-03 09:19:05', '2023-07-03 09:19:05', NULL),
(215, 'R209', 11, NULL, '\\u0671\\u0644\\u06e1\\u0645', NULL, '<p>Alif lam bertemu dengan mim</p>', '2023-07-03 09:19:22', '2023-07-03 09:19:22', NULL),
(216, 'R210', 11, NULL, '\\u0671\\u0644\\u06e1\\u0648', NULL, '<p>Alif lam bertemu dengan wawu</p>', '2023-07-03 09:19:40', '2023-07-03 09:19:40', NULL),
(217, 'R211', 11, NULL, '\\u0671\\u0644\\u06e1\\u0647', NULL, '<p>Alif lam bertemu dengan ha</p>', '2023-07-03 09:20:18', '2023-07-03 09:20:18', NULL),
(218, 'R212', 11, NULL, '\\u0671\\u0644\\u06e1\\u064a', NULL, '<p>Alif lam bertemu dengan ya\'</p>', '2023-07-03 09:20:36', '2023-07-03 09:20:36', NULL),
(219, 'R213', 12, NULL, '\\u0671\\u0644\\u062a', NULL, '<p>Alif lam bertemu dengan ta\'</p>', '2023-07-03 09:21:52', '2023-07-03 09:21:52', NULL),
(220, 'R214', 12, NULL, '\\u0671\\u0644\\u062b', NULL, '<p>Alif lam bertemu dengan tsa</p>', '2023-07-03 09:22:07', '2023-07-03 09:22:07', NULL),
(221, 'R215', 12, NULL, '\\u0671\\u0644\\u062f', NULL, '<p>Alif lam bertemu dengan dal</p>', '2023-07-03 09:22:25', '2023-07-03 09:22:25', NULL),
(222, 'R216', 12, NULL, '\\u0671\\u0644\\u0630', NULL, '<p>Alif lam bertemu dengan dzal</p>', '2023-07-03 09:22:52', '2023-07-03 09:22:52', NULL),
(223, 'R217', 12, NULL, '\\u0671\\u0644\\u0631', NULL, '<p>Alif lam bertemu dengan ro\'</p>', '2023-07-03 09:23:19', '2023-07-03 09:23:19', NULL),
(224, 'R218', 12, NULL, '\\u0671\\u0644\\u0632', NULL, '<p>Alif lam bertemu dengan za</p>', '2023-07-03 09:23:37', '2023-07-03 09:23:37', NULL),
(225, 'R219', 12, NULL, '\\u0671\\u0644\\u0633', NULL, '<p>Alif lam bertemu dengan sin</p>', '2023-07-03 09:23:52', '2023-07-03 09:23:52', NULL),
(226, 'R220', 12, NULL, '\\u0671\\u0644\\u0634', NULL, '<p>Alif lam bertemu dengan syin</p>', '2023-07-03 09:24:19', '2023-07-03 09:24:19', NULL),
(227, 'R221', 12, NULL, '\\u0671\\u0644\\u0635', NULL, '<p>Alif lam bertemu dengan shod</p>', '2023-07-03 09:24:39', '2023-07-03 09:24:39', NULL),
(228, 'R222', 12, NULL, '\\u0671\\u0644\\u0636', NULL, '<p>Alif lam bertemu dengan dhod</p>', '2023-07-03 09:24:54', '2023-07-03 09:24:54', NULL),
(229, 'R223', 12, NULL, '\\u0671\\u0644\\u0637', NULL, '<p>Alif lam bertemu dengan tho\'</p>', '2023-07-03 09:25:10', '2023-07-03 09:25:10', NULL),
(230, 'R224', 12, NULL, '\\u0671\\u0644\\u0638', NULL, '<p>Alif lam bertemu dengan zho\'</p>', '2023-07-03 09:25:27', '2023-07-03 09:25:27', NULL),
(231, 'R225', 12, NULL, '\\u0671\\u0644\\u0644', NULL, '<p>Alif lam bertemu dengan lam</p>', '2023-07-03 09:25:44', '2023-07-03 09:25:44', NULL),
(232, 'R226', 12, NULL, '\\u0671\\u0644\\u0646', NULL, '<p>Alif lam bertemu dengan nun</p>', '2023-07-03 09:26:06', '2023-07-03 09:26:06', NULL),
(233, 'R227', 13, NULL, '\\u0631\\u064e', NULL, '<p>Ro\' yang berharokat fatkhah</p>', '2023-07-03 10:25:47', '2023-07-03 10:25:47', NULL),
(234, 'R228', 13, NULL, '\\u0631\\u064f', NULL, '<p>Ro\' yang berharokat dhommah</p>', '2023-07-03 10:26:16', '2023-07-03 10:26:16', NULL),
(235, 'R229', 13, NULL, '\\u064e\\u0631', '\\u064e\\u0020\\u0631', '<p>Ro\' mati setelah harokat fatkhah</p>', '2023-07-03 10:29:33', '2023-07-03 10:29:33', NULL),
(236, 'R230', 13, NULL, '\\u064f\\u0631', '\\u064f\\u0020\\u0631', '<p>Ro\' mati setelah harokat dhommah</p>', '2023-07-03 10:30:08', '2023-07-03 10:30:08', NULL),
(237, 'R231', 13, NULL, '\\u0642\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf qof yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:32:19', '2023-07-03 10:40:01', NULL),
(238, 'R232', 13, NULL, '\\u063a\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf ghoin yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:34:34', '2023-07-03 10:40:13', NULL),
(239, 'R233', 13, NULL, '\\u0638\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf zho\' yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:35:31', '2023-07-03 10:39:51', NULL),
(240, 'R234', 13, NULL, '\\u0637\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf tho\' yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:35:55', '2023-07-03 10:38:57', NULL),
(241, 'R235', 13, NULL, '\\u0636\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf dhod yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:36:21', '2023-07-03 10:38:47', NULL),
(242, 'R236', 13, NULL, '\\u0635\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf shod yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:36:52', '2023-07-03 10:38:39', NULL),
(243, 'R237', 13, NULL, '\\u062e\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah huruf kho\' yang berharokat kasroh dan berada dalam satu kalimat</p>', '2023-07-03 10:38:25', '2023-07-03 10:38:25', NULL),
(244, 'R238', 14, NULL, '\\u0631\\u0650', NULL, '<p>Ro\' yang memiliki harokat kasroh</p>', '2023-07-03 10:41:21', '2023-07-03 10:41:21', NULL),
(245, 'R239', 14, NULL, '\\u0650\\u0631\\u06e1', NULL, '<p>Ro\' mati setelah harokat kasroh</p>', '2023-07-03 10:42:52', '2023-07-03 10:42:52', NULL),
(246, 'R240', 14, NULL, '\\u064a\\u06e1\\u0631', NULL, '<p>Ro\' mati yang berada setelah ya\' mati</p>', '2023-07-03 10:49:29', '2023-07-03 10:49:29', NULL),
(247, 'R241', 14, NULL, '\\u0650\\u0631\\u064e\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:51:20', '2023-07-03 10:51:20', NULL),
(248, 'R242', 14, NULL, '\\u0650\\u0631\\u0650\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:51:49', '2023-07-03 10:51:49', NULL),
(249, 'R243', 14, NULL, '\\u0650\\u0631\\u064f\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:52:13', '2023-07-03 10:52:13', NULL),
(250, 'R244', 14, NULL, '\\u0650\\u0631\\u064b\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:52:38', '2023-07-03 10:52:38', NULL),
(251, 'R245', 14, NULL, '\\u0650\\u0631\\u064d\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:53:02', '2023-07-03 10:53:02', NULL),
(252, 'R246', 14, NULL, '\\u0650\\u0631\\u064c\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:53:30', '2023-07-03 10:53:30', NULL),
(253, 'R247', 14, NULL, '\\u0650\\u0631\\u08f1\\n', NULL, '<p>Ro\' mati sebab waqof yang berada setelah kasroh</p>', '2023-07-03 10:53:50', '2023-07-03 10:53:50', NULL),
(254, 'R248', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u064e\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 10:55:17', '2023-07-03 10:55:17', NULL),
(255, 'R249', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u0650\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 10:56:07', '2023-07-03 10:58:05', NULL),
(256, 'R250', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u064f\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 10:57:33', '2023-07-03 10:57:33', NULL),
(257, 'R251', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u064b\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 10:59:19', '2023-07-03 10:59:19', NULL),
(258, 'R252', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u064d\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 10:59:41', '2023-07-03 10:59:41', NULL),
(259, 'R253', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u064c\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 11:00:27', '2023-07-03 11:00:27', NULL),
(260, 'R254', 14, NULL, '\\u0650\\u064a\\u06e1\\u0631\\u08f1\\n', NULL, '<p>Ro\' mati sebab waqof berada setelah kasroh yang dipisahkan ya\' mati</p>', '2023-07-03 11:00:50', '2023-07-03 11:00:50', NULL),
(261, 'R255', 15, NULL, '\\u0644\\u064e', NULL, '<p>Lam yang memiliki harokat fatkhah</p>', '2023-07-03 11:58:03', '2023-07-03 11:58:03', NULL),
(262, 'R256', 15, NULL, '\\u0644\\u0650', NULL, '<p>Lam yang memiliki harokat kasroh</p>', '2023-07-03 11:58:23', '2023-07-03 11:58:23', NULL),
(263, 'R257', 15, NULL, '\\u0644\\u064f', NULL, '<p>Lam yang memiliki harokat dhommah</p>', '2023-07-03 11:58:54', '2023-07-03 11:58:54', NULL),
(264, 'R258', 15, NULL, '\\u0644\\u06e1', NULL, '<p>Lam yang memiliki harokat sukun (lam mati)</p>', '2023-07-03 11:59:25', '2023-07-03 11:59:25', NULL),
(265, 'R259', 16, NULL, '\\u064e\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', NULL, '<p>Lafzhul jalalan \"Allah\" yang berada setelah fatkhah</p>', '2023-07-03 12:04:03', '2023-07-10 16:52:12', 'R331'),
(266, 'R260', 16, NULL, '\\u064f\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', NULL, '<p>Lafzhul jalalan \"Allah\" yang berada setelah dhommah</p>', '2023-07-03 12:04:29', '2023-07-10 16:52:45', 'R332'),
(267, 'R261', 17, NULL, '\\u0628\\u06e1', NULL, '<p>Ba\' mati ditengah kalimat</p>', '2023-07-03 12:06:54', '2023-07-03 12:06:54', NULL),
(268, 'R262', 17, NULL, '\\u062c\\u06e1', NULL, '<p>Jim mati ditengah kalimat</p>', '2023-07-03 12:07:16', '2023-07-03 12:07:16', NULL),
(269, 'R263', 17, NULL, '\\u062f\\u06e1', NULL, '<p>Dal mati ditengah kalimat</p>', '2023-07-03 12:07:49', '2023-07-03 12:07:49', NULL),
(270, 'R264', 17, NULL, '\\u0637\\u06e1', NULL, '<p>Tho\' mati ditengah kalimat</p>', '2023-07-03 12:08:09', '2023-07-03 12:08:09', NULL),
(271, 'R265', 17, NULL, '\\u0642\\u06e1', NULL, '<p>Qof mati ditengah kalimat</p>', '2023-07-03 12:08:30', '2023-07-03 12:08:30', NULL),
(272, 'R266', 18, NULL, '\\u0628\\u064b\\n', NULL, '<p>Ba\' yang mati karena waqof</p>', '2023-07-03 12:11:27', '2023-07-03 12:12:52', NULL),
(273, 'R267', 18, NULL, '\\u0628\\u064d\\n', NULL, '<p>yang mati karena waqof</p>', '2023-07-03 12:11:43', '2023-07-03 12:12:41', NULL),
(274, 'R268', 18, NULL, '\\u0628\\u064c\\n', NULL, '<p>yang mati karena waqof</p>', '2023-07-03 12:11:56', '2023-07-03 12:12:31', NULL),
(275, 'R269', 18, NULL, '\\u0628\\u08f1\\n', NULL, '<p>yang mati karena waqof</p>', '2023-07-03 12:12:16', '2023-07-03 12:12:16', NULL),
(276, 'R270', 18, NULL, '\\u062c\\u064b\\n', NULL, '<p>Jim yang mati karna waqof</p>', '2023-07-03 13:55:29', '2023-07-03 13:55:29', NULL),
(277, 'R271', 18, NULL, '\\u062c\\u064d\\n', NULL, '<p>Jim yang mati karna waqof</p>', '2023-07-03 13:56:17', '2023-07-03 13:56:17', NULL),
(278, 'R272', 18, NULL, '\\u062c\\u064c\\n', NULL, '<p>Jim yang mati karna waqof</p>', '2023-07-03 13:56:37', '2023-07-03 13:56:37', NULL),
(279, 'R273', 18, NULL, '\\u062c\\u08f1\\n', NULL, '<p>Jim yang mati karna waqof</p>', '2023-07-03 13:56:55', '2023-07-10 00:37:46', 'R272'),
(280, 'R274', 18, NULL, '\\u062f\\u064b\\n', NULL, '<p>Dal yang mati karna waqof</p>', '2023-07-03 13:57:19', '2023-07-03 13:57:19', NULL),
(281, 'R275', 18, NULL, '\\u062f\\u064d\\n', NULL, '<p>Dal yang mati karna waqof</p>', '2023-07-03 13:57:38', '2023-07-03 13:57:38', NULL),
(282, 'R276', 18, NULL, '\\u062f\\u064c\\n', NULL, '<p>Dal yang mati karna waqof</p>', '2023-07-03 13:57:55', '2023-07-03 13:57:55', NULL),
(283, 'R277', 18, NULL, '\\u062f\\u08f1\\n', NULL, '<p>Dal yang mati karna waqof</p>', '2023-07-03 13:58:16', '2023-07-03 13:58:16', NULL),
(284, 'R278', 18, NULL, '\\u0637\\u064b\\n', NULL, '<p>Tho\' yang mati karna waqof</p>', '2023-07-03 14:00:07', '2023-07-03 14:00:07', NULL),
(285, 'R279', 18, NULL, '\\u0637\\u064d\\n', NULL, '<p>Tho\' yang mati karna waqof</p>', '2023-07-03 14:00:21', '2023-07-03 14:00:21', NULL),
(286, 'R280', 18, NULL, '\\u0637\\u064c\\n', NULL, '<p>Tho\' yang mati karna waqof</p>', '2023-07-03 14:00:40', '2023-07-03 14:00:40', NULL),
(287, 'R281', 18, NULL, '\\u0637\\u08f1\\n', NULL, '<p>Tho\' yang mati karna waqof</p>', '2023-07-03 14:00:57', '2023-07-03 14:00:57', NULL),
(288, 'R282', 18, NULL, '\\u0642\\u064b\\n', NULL, '<p>Qof yang mati karna waqof</p>', '2023-07-03 14:01:19', '2023-07-03 14:01:19', NULL),
(289, 'R283', 18, NULL, '\\u0642\\u064d\\n', NULL, '<p>Qof yang mati karna waqof</p>', '2023-07-03 14:01:34', '2023-07-03 14:01:34', NULL),
(290, 'R284', 18, NULL, '\\u0642\\u064c\\n', NULL, '<p>Qof yang mati karna waqof</p>', '2023-07-03 14:01:48', '2023-07-03 14:01:48', NULL),
(291, 'R285', 18, NULL, '\\u0642\\u08f1\\n', NULL, '<p>Qof yang mati karna waqof</p>', '2023-07-03 14:02:04', '2023-07-03 14:02:04', NULL),
(292, 'R286', 3, NULL, '\\u08f0\\u0627\\u0020\\u0643', NULL, '<p>Fatkhatain bertemu dengan huruf kaf</p>', '2023-07-03 14:56:44', '2023-07-03 15:05:05', 'R090'),
(293, 'R287', 3, NULL, '\\u0646\\u062a', '\\u0646\\u0020\\u062a', '<p>Nun mati bertemu dengan ta\'</p>', '2023-07-10 04:06:33', '2023-07-10 04:06:33', 'R061'),
(294, 'R288', 3, NULL, '\\u0646\\u062b', '\\u0646\\u0020\\u062b', '<p>Nun mati bertemu dengan tsa</p>', '2023-07-10 04:07:46', '2023-07-10 04:07:46', 'R062'),
(295, 'R289', 3, NULL, '\\u0646\\u062f', '\\u0646\\u0020\\u062f', '<p>Nun mati bertemu dengan dal</p>', '2023-07-10 04:08:38', '2023-07-10 04:08:38', 'R063'),
(296, 'R290', 3, NULL, '\\u0646\\u0630', '\\u0646\\u0020\\u0630', '<p>Nun mati bertemu dengan dzal</p>', '2023-07-10 04:11:31', '2023-07-10 04:11:31', 'R064'),
(297, 'R291', 3, NULL, '\\u0646\\u062c', '\\u0646\\u0020\\u062c', '<p>Nun mati bertemu dengan jim</p>', '2023-07-10 04:12:37', '2023-07-10 04:12:37', 'R065'),
(298, 'R292', 3, NULL, '\\u0646\\u0632', '\\u0646\\u0020\\u0632', '<p>Nun mati bertemu dengan za</p>', '2023-07-10 04:12:56', '2023-07-10 04:12:56', 'R066'),
(299, 'R293', 3, NULL, '\\u0646\\u0633', '\\u0646\\u0020\\u0633', '<p>Nun mati bertemu dengan sin</p>', '2023-07-10 04:13:15', '2023-07-10 04:13:15', 'R067'),
(300, 'R294', 3, NULL, '\\u0646\\u0634', '\\u0646\\u0020\\u0634', '<p>Nun mati bertemu dengan syin</p>', '2023-07-10 04:13:40', '2023-07-10 04:13:40', 'R068'),
(301, 'R295', 3, NULL, '\\u0646\\u0635', '\\u0646\\u0020\\u0635', '<p>Nun mati bertemu dengan shod</p>', '2023-07-10 04:14:05', '2023-07-10 04:14:05', 'R069'),
(302, 'R296', 3, NULL, '\\u0646\\u0636', '\\u0646\\u0020\\u0636', '<p>Nun mati bertemu dengan dhod</p>', '2023-07-10 04:14:27', '2023-07-10 04:14:27', 'R070'),
(304, 'R297', 3, NULL, '\\u0646\\u0637', '\\u0646\\u0020\\u0637', '<p>Nun mati bertemu dengan tho\'</p>', '2023-07-10 04:17:28', '2023-07-10 04:17:28', 'R071'),
(305, 'R298', 3, NULL, '\\u0646\\u0638', '\\u0646\\u0020\\u0638', '<p>Nun mati bertemu dengan zho\'</p>', '2023-07-10 04:18:02', '2023-07-10 04:18:02', 'R072'),
(306, 'R299', 3, NULL, '\\u0646\\u0641', '\\u0646\\u0020\\u0641', '<p>Nun mati bertemu dengan fa\'</p>', '2023-07-10 04:18:34', '2023-07-10 04:18:34', 'R073'),
(307, 'R300', 3, NULL, '\\u0646\\u0642', '\\u0646\\u0020\\u0642', '<p>Nun mati bertemu dengan qof</p>', '2023-07-10 04:18:53', '2023-07-10 04:18:53', 'R074'),
(308, 'R301', 3, NULL, '\\u0646\\u0643', '\\u0646\\u0020\\u0643', '<p>Nun mati bertemu dengan kaf</p>', '2023-07-10 04:19:11', '2023-07-10 04:19:11', 'R075'),
(309, 'R302', 3, NULL, '\\u08f0\\u0627\\u062a', '\\u08f0\\u0627\\u0020\\u062a', '<p>Fatkhatain bertemu dengan ta\'</p>', '2023-07-10 05:35:22', '2023-07-10 05:35:22', 'R076'),
(310, 'R303', 3, NULL, '\\u08f0\\u0627\\u062b', '\\u08f0\\u0627\\u0020\\u062b', '<p>Fatkhatain bertemu dengan tsa</p>', '2023-07-10 05:35:43', '2023-07-10 05:35:43', 'R077'),
(311, 'R304', 3, NULL, '\\u08f0\\u0627\\u062c', '\\u08f0\\u0627\\u0020\\u062c', '<p>Fatkhatain bertemu dengan jim</p>', '2023-07-10 05:36:54', '2023-07-10 05:45:16', 'R080');
INSERT INTO `rule_tajwid` (`id`, `kode`, `id_tajwid`, `deleted_tajwid_name`, `rule`, `second_rule`, `keterangan`, `created_at`, `updated_at`, `synonym`) VALUES
(312, 'R305', 3, NULL, '\\u08f0\\u0627\\u062f', '\\u08f0\\u0627\\u0020\\u062f', '<p>Fatkhatain bertemu dengan dal</p>', '2023-07-10 05:37:23', '2023-07-10 05:37:23', 'R078'),
(313, 'R306', 3, NULL, '\\u08f0\\u0627\\u0630', '\\u08f0\\u0627\\u0020\\u0630', '<p>Fatkhatain bertemu dengan dzal</p>', '2023-07-10 05:37:44', '2023-07-10 05:37:44', 'R079'),
(314, 'R307', 3, NULL, '\\u08f0\\u0627\\u0632', '\\u08f0\\u0627\\u0020\\u0632', '<p>Fatkhatain bertemu dengan&nbsp;</p>', '2023-07-10 05:38:36', '2023-07-10 05:38:36', 'R081'),
(315, 'R308', 3, NULL, '\\u08f0\\u0627\\u0633', '\\u08f0\\u0627\\u0020\\u0633', '<p>Fatkhatain bertemu dengan sin</p>', '2023-07-10 05:38:58', '2023-07-10 05:38:58', 'R082'),
(316, 'R309', 3, NULL, '\\u08f0\\u0627\\u0634', '\\u08f0\\u0627\\u0020\\u0634', '<p>Fatkhatain bertemu dengan syin</p>', '2023-07-10 05:39:19', '2023-07-10 05:39:19', 'R083'),
(317, 'R310', 3, NULL, '\\u08f0\\u0627\\u0635', '\\u08f0\\u0627\\u0020\\u0635', '<p>Fatkhatain bertemu dengan shod</p>', '2023-07-10 05:39:37', '2023-07-10 05:39:37', 'R084'),
(318, 'R311', 3, NULL, '\\u08f0\\u0627\\u0636', '\\u08f0\\u0627\\u0020\\u0636', '<p>Fatkhatain bertemu dengan dhod</p>', '2023-07-10 05:39:54', '2023-07-10 05:39:54', 'R085'),
(319, 'R312', 3, NULL, '\\u08f0\\u0627\\u0637', '\\u08f0\\u0627\\u0020\\u0637', '<p>Fatkhatain bertemu dengan tho\'</p>', '2023-07-10 05:40:13', '2023-07-10 05:40:13', 'R086'),
(320, 'R313', 3, NULL, '\\u08f0\\u0627\\u0638', '\\u08f0\\u0627\\u0020\\u0638', '<p>Fatkhatain bertemu dengan dho\'</p>', '2023-07-10 05:40:59', '2023-07-10 05:40:59', 'R087'),
(321, 'R314', 3, NULL, '\\u08f0\\u0627\\u0641', '\\u08f0\\u0627\\u0020\\u0641', '<p>Fatkhatain bertemu dengan fa\'</p>', '2023-07-10 05:41:18', '2023-07-10 05:41:18', 'R088'),
(322, 'R315', 3, NULL, '\\u08f0\\u0627\\u0642', '\\u08f0\\u0627\\u0020\\u0642', '<p>Fatkhatain bertemu dengan qof</p>', '2023-07-10 05:41:36', '2023-07-10 05:41:36', 'R089'),
(323, 'R316', 3, NULL, '\\u08f0\\u0627\\u0643', '\\u08f0\\u0627\\u0020\\u0643', '<p>Fatkhatain bertemu dengan kaf</p>', '2023-07-10 05:41:54', '2023-07-10 05:41:54', 'R090'),
(324, 'R317', 5, NULL, '\\u08f2\\u0646', '\\u08f2\\u0020\\u0646', '<p>Kasrotain bertemu dengan huruf nun</p>', '2023-07-10 11:47:26', '2023-07-10 11:47:26', 'R154'),
(325, 'R318', 5, NULL, '\\u0646\\u0646', '\\u0646\\u0020\\u0646', '<p>Nun mati bertemu dengan nun</p>', '2023-07-10 11:48:39', '2023-07-10 11:48:39', 'R146'),
(326, 'R319', 5, NULL, '\\u0646\\u0645', '\\u0646\\u0020\\u0645', '<p>Nun mati bertemu dengan mim</p>', '2023-07-10 11:54:45', '2023-07-10 11:54:45', 'R148'),
(329, 'R320', 5, NULL, '\\u08f2\\u0645', '\\u08f2\\u0020\\u0645', '<p>Kasrotain bertemu dengan huruf mim</p>', '2023-07-10 12:08:00', '2023-07-10 12:09:33', 'R155'),
(330, 'R321', 5, NULL, '\\u08f0\\u0649\\u0020\\u0645', NULL, '<p>Fatkhatain bertemu dengan mim</p>', '2023-07-10 14:41:59', '2023-07-10 14:41:59', 'R151'),
(331, 'R322', 6, NULL, '\\u0646\\u0644', '\\u0646\\u0020\\u0644', '<p>Nun mati bertemu dengan huruf lam</p>', '2023-07-10 14:44:31', '2023-07-10 14:44:31', 'R161'),
(332, 'R323', 6, NULL, '\\u0646\\u0631', '\\u0646\\u0020\\u0631', '<p>Nun mati bertemu dengan huruf ro\'</p>', '2023-07-10 14:46:01', '2023-07-10 14:46:01', 'R162'),
(337, 'R324', 6, NULL, '\\u08f0\\u0649\\u0020\\u0644', '\\u08f0\\u0649\\u0020\\u0020\\u0644', '<p>Fatkhatain bertemu dengan lam</p>', '2023-07-10 14:59:40', '2023-07-10 14:59:40', 'R163'),
(338, 'R325', 7, NULL, '\\u0645\\u0628', '\\u0645\\u0020\\u0628', '<p>Mim mati bertemu dengan huruf ba\'</p>', '2023-07-10 15:01:54', '2023-07-10 15:01:54', 'R169'),
(339, 'R326', 8, NULL, '\\u0645\\u0645', '\\u0645\\u0020\\u0645', '<p>Mim mati bertemu dengan mim</p>', '2023-07-10 15:03:36', '2023-07-10 15:03:36', 'R170'),
(341, 'R327', 11, NULL, '\\u0671\\u0644\\u06e1\\u0623', NULL, '<p>Alif lam bertemu dengan hamzah</p>', '2023-07-10 15:57:29', '2023-07-10 15:57:29', 'R199'),
(342, 'R328', 11, NULL, '\\u0671\\u0644\\u06e1\\u06cc', NULL, '<p>Alif lam bertemu dengan ya\'</p>', '2023-07-10 16:10:54', '2023-07-10 16:10:54', 'R212'),
(343, 'R329', 15, NULL, '\\u0650\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', NULL, '<p>Lafadz Allah yang didahului harakat kasroh</p>', '2023-07-10 16:46:23', '2023-07-10 16:48:08', NULL),
(344, 'R330', 15, NULL, '\\u0650\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', NULL, '<p>Lafadz Allah yang didahului harakat kasroh</p>', '2023-07-10 16:48:55', '2023-07-10 16:48:55', 'R329'),
(345, 'R331', 16, NULL, '\\u064e\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', NULL, '<p>Lafadz Allah yang didahului harakat fatkhah</p>', '2023-07-10 16:50:57', '2023-07-10 16:50:57', NULL),
(346, 'R332', 16, NULL, '\\u064f\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', NULL, '<p>Lafadz Allah yang didahului harakat Dhommah</p>', '2023-07-10 16:51:36', '2023-07-10 16:51:36', NULL),
(347, 'R333', 18, NULL, '\\u0628\\u0650\\n', NULL, '<p>Huruf ba\' yang mati sebab waqof</p>', '2023-07-10 23:50:36', '2023-07-10 23:50:36', NULL),
(348, 'R334', 18, NULL, '\\u062c\\u0650\\n', NULL, '<p>Jim yang mati sebab waqof</p>', '2023-07-10 23:52:33', '2023-07-10 23:52:33', NULL),
(349, 'R335', 18, NULL, '\\u0637\\u08f2\\n', NULL, '<p>Tho\' yag mati sebab waqof</p>', '2023-07-11 00:00:17', '2023-07-11 00:00:17', 'R279'),
(350, 'R336', 18, NULL, '\\u0642\\u0650\\n', NULL, '<p>Huruf qof yang mati sebab waqof</p>', '2023-07-11 00:02:38', '2023-07-11 00:02:38', NULL),
(351, 'R337', 5, NULL, '\\u064c\\u0646', '\\u064c\\u0020\\u0646', '<p>Dhommatain bertemu dengan nun</p>', '2023-07-11 07:04:04', '2023-07-11 07:04:04', NULL),
(352, 'R338', 5, NULL, '\\u064c\\u0645', '\\u064c\\u0020\\u0645', '<p>Dhommatain bertemu dengan mim</p>', '2023-07-11 07:05:40', '2023-07-11 07:05:40', NULL),
(353, 'R339', 5, NULL, '\\u08f0\\u0646', '\\u08f0\\u0020\\u0646', '<p>Fatkhatain bertemu dengan huruf nun</p>', '2023-07-11 07:08:54', '2023-07-11 07:08:54', 'R150'),
(354, 'R340', 5, NULL, '\\u08f0\\u0627\\u0646', '\\u08f0\\u0627\\u0020\\u0646', '<p>Fatkhatain bertemu dengan huruf nun</p>', '2023-07-11 07:10:13', '2023-07-11 07:10:13', 'R150'),
(355, 'R341', 6, NULL, '\\u064c\\u0644', '\\u064c\\u0020\\u0644', '<p>Dhommatain bertemu dengan lam</p>', '2023-07-11 07:17:02', '2023-07-11 07:17:02', NULL),
(356, 'R342', 6, NULL, '\\u064c\\u0631', '\\u064c\\u0020\\u0631', '<p>Dhommatain bertemu dengan ro\'</p>', '2023-07-11 07:18:26', '2023-07-11 07:18:26', NULL),
(357, 'R343', 6, NULL, '\\u08f2\\u0644', '\\u08f2\\u0020\\u0644', '<p>Kasrotain bertemu dengan lam</p>', '2023-07-11 07:24:33', '2023-07-11 07:24:33', 'R165'),
(358, 'R344', 6, NULL, '\\u08f2\\u0631', '\\u08f2\\u0020\\u0631', '<p>Kasrotain bertemu dengan ro\'</p>', '2023-07-11 07:25:27', '2023-07-11 07:25:27', 'R166'),
(359, 'R345', 9, NULL, '\\u0645\\u06e1\\u06cc', '\\u0645\\u06e1\\u0020\\u06cc', '<p>Mim mati bertemu dengan huruf ya\'</p>', '2023-07-11 07:36:00', '2023-07-11 07:36:00', 'R196'),
(360, 'R346', 4, NULL, '\\u0650\\u06ed\\u0628', '\\u0650\\u06ed\\u0020\\u0628', '<p>Kasrotain bertemu dengan ba</p>', '2023-07-11 07:41:30', '2023-07-11 07:41:30', 'R138'),
(361, 'R347', 3, NULL, '\\u08f0\\u0649\\u0641', '\\u08f0\\u0649\\u0020\\u0641', '<p>Fatkhatain bertemu dengan fa\'</p>', '2023-07-11 07:44:38', '2023-07-11 07:44:38', 'R088'),
(362, 'R348', 2, NULL, '\\u064b\\u0627\\u0020\\u0623', NULL, '<p>Fatkhatain bertemu dengan hamzah</p>', '2023-07-11 07:48:27', '2023-07-11 07:48:53', 'R007'),
(363, 'R349', 2, NULL, '\\u064b\\u0627\\u0020\\u0647', NULL, '<p>Fatkhatain bertemu dengan ha</p>', '2023-07-11 07:58:40', '2023-07-11 07:58:55', 'R012'),
(364, 'R350', 2, NULL, '\\u064b\\u0627\\u0020\\u062e', NULL, '<p>Fatkhatain bertemu dengan kho\'</p>', '2023-07-11 08:00:37', '2023-07-11 08:00:37', 'R009'),
(365, 'R351', 2, NULL, '\\u064b\\u0627\\u0020\\u0639', NULL, '<p>Fatkhatain bertemu dengan \'ain</p>', '2023-07-11 08:02:12', '2023-07-11 08:02:12', 'R010');

-- --------------------------------------------------------

--
-- Table structure for table `rule_tajwid_tanda_tajwid`
--

CREATE TABLE `rule_tajwid_tanda_tajwid` (
  `id` bigint UNSIGNED NOT NULL,
  `rule_tajwid_id` int NOT NULL,
  `tanda_tajwid_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rule_tajwid_tanda_tajwid`
--

INSERT INTO `rule_tajwid_tanda_tajwid` (`id`, `rule_tajwid_id`, `tanda_tajwid_id`, `created_at`, `updated_at`) VALUES
(20, 6, 46, NULL, NULL),
(21, 6, 7, NULL, NULL),
(22, 7, 46, NULL, NULL),
(23, 7, 13, NULL, NULL),
(24, 8, 46, NULL, NULL),
(25, 8, 14, NULL, NULL),
(26, 9, 46, NULL, NULL),
(27, 9, 25, NULL, NULL),
(28, 10, 46, NULL, NULL),
(29, 10, 26, NULL, NULL),
(30, 11, 46, NULL, NULL),
(31, 11, 34, NULL, NULL),
(32, 1, 46, NULL, NULL),
(33, 1, 7, NULL, NULL),
(34, 12, 40, NULL, NULL),
(35, 12, 7, NULL, NULL),
(36, 13, 40, NULL, NULL),
(37, 13, 13, NULL, NULL),
(38, 14, 40, NULL, NULL),
(39, 14, 14, NULL, NULL),
(40, 15, 40, NULL, NULL),
(41, 15, 25, NULL, NULL),
(42, 16, 40, NULL, NULL),
(43, 16, 26, NULL, NULL),
(44, 17, 40, NULL, NULL),
(45, 17, 34, NULL, NULL),
(46, 18, 41, NULL, NULL),
(47, 18, 7, NULL, NULL),
(48, 19, 41, NULL, NULL),
(49, 19, 13, NULL, NULL),
(50, 20, 41, NULL, NULL),
(51, 20, 14, NULL, NULL),
(52, 21, 41, NULL, NULL),
(53, 21, 25, NULL, NULL),
(54, 22, 41, NULL, NULL),
(55, 22, 26, NULL, NULL),
(56, 23, 41, NULL, NULL),
(57, 23, 34, NULL, NULL),
(58, 24, 42, NULL, NULL),
(59, 24, 7, NULL, NULL),
(60, 25, 42, NULL, NULL),
(61, 25, 13, NULL, NULL),
(62, 26, 42, NULL, NULL),
(63, 26, 14, NULL, NULL),
(64, 27, 42, NULL, NULL),
(65, 27, 25, NULL, NULL),
(66, 28, 42, NULL, NULL),
(67, 28, 26, NULL, NULL),
(68, 29, 42, NULL, NULL),
(69, 29, 34, NULL, NULL),
(70, 30, 46, NULL, NULL),
(71, 30, 1, NULL, NULL),
(72, 31, 46, NULL, NULL),
(73, 31, 1, NULL, NULL),
(74, 32, 46, NULL, NULL),
(75, 32, 2, NULL, NULL),
(76, 33, 46, NULL, NULL),
(77, 33, 3, NULL, NULL),
(78, 34, 46, NULL, NULL),
(79, 34, 4, NULL, NULL),
(80, 35, 46, NULL, NULL),
(81, 35, 5, NULL, NULL),
(82, 36, 46, NULL, NULL),
(83, 36, 6, NULL, NULL),
(84, 37, 40, NULL, NULL),
(85, 37, 1, NULL, NULL),
(86, 38, 40, NULL, NULL),
(87, 38, 2, NULL, NULL),
(88, 39, 40, NULL, NULL),
(89, 39, 3, NULL, NULL),
(90, 40, 40, NULL, NULL),
(91, 40, 4, NULL, NULL),
(92, 41, 40, NULL, NULL),
(93, 41, 5, NULL, NULL),
(94, 42, 40, NULL, NULL),
(95, 42, 6, NULL, NULL),
(96, 43, 41, NULL, NULL),
(97, 43, 1, NULL, NULL),
(98, 44, 41, NULL, NULL),
(99, 44, 2, NULL, NULL),
(100, 45, 41, NULL, NULL),
(101, 45, 3, NULL, NULL),
(102, 46, 41, NULL, NULL),
(103, 46, 4, NULL, NULL),
(104, 47, 41, NULL, NULL),
(105, 47, 5, NULL, NULL),
(106, 48, 41, NULL, NULL),
(107, 48, 6, NULL, NULL),
(108, 49, 42, NULL, NULL),
(109, 49, 1, NULL, NULL),
(110, 50, 42, NULL, NULL),
(111, 50, 2, NULL, NULL),
(112, 51, 42, NULL, NULL),
(113, 51, 3, NULL, NULL),
(114, 52, 42, NULL, NULL),
(115, 52, 4, NULL, NULL),
(116, 53, 42, NULL, NULL),
(117, 53, 5, NULL, NULL),
(118, 54, 42, NULL, NULL),
(119, 54, 6, NULL, NULL),
(120, 55, 43, NULL, NULL),
(121, 55, 7, NULL, NULL),
(122, 56, 43, NULL, NULL),
(123, 56, 13, NULL, NULL),
(124, 57, 43, NULL, NULL),
(125, 57, 14, NULL, NULL),
(126, 58, 43, NULL, NULL),
(127, 58, 25, NULL, NULL),
(128, 59, 43, NULL, NULL),
(129, 59, 26, NULL, NULL),
(130, 60, 43, NULL, NULL),
(131, 60, 34, NULL, NULL),
(132, 61, 43, NULL, NULL),
(133, 61, 1, NULL, NULL),
(134, 62, 43, NULL, NULL),
(135, 62, 2, NULL, NULL),
(136, 63, 43, NULL, NULL),
(137, 63, 3, NULL, NULL),
(138, 64, 43, NULL, NULL),
(139, 64, 4, NULL, NULL),
(140, 65, 43, NULL, NULL),
(141, 65, 5, NULL, NULL),
(142, 66, 43, NULL, NULL),
(143, 66, 6, NULL, NULL),
(144, 67, 46, NULL, NULL),
(145, 67, 10, NULL, NULL),
(146, 68, 46, NULL, NULL),
(147, 68, 11, NULL, NULL),
(148, 69, 46, NULL, NULL),
(149, 69, 15, NULL, NULL),
(150, 70, 46, NULL, NULL),
(151, 70, 16, NULL, NULL),
(152, 71, 46, NULL, NULL),
(153, 71, 12, NULL, NULL),
(154, 72, 46, NULL, NULL),
(155, 72, 18, NULL, NULL),
(156, 73, 46, NULL, NULL),
(157, 73, 19, NULL, NULL),
(158, 74, 46, NULL, NULL),
(159, 74, 20, NULL, NULL),
(160, 75, 46, NULL, NULL),
(161, 75, 21, NULL, NULL),
(162, 76, 46, NULL, NULL),
(163, 76, 22, NULL, NULL),
(164, 77, 46, NULL, NULL),
(165, 77, 23, NULL, NULL),
(166, 78, 46, NULL, NULL),
(167, 78, 24, NULL, NULL),
(168, 79, 46, NULL, NULL),
(169, 79, 27, NULL, NULL),
(170, 80, 46, NULL, NULL),
(171, 80, 28, NULL, NULL),
(172, 81, 46, NULL, NULL),
(173, 81, 29, NULL, NULL),
(175, 82, 10, NULL, NULL),
(177, 83, 11, NULL, NULL),
(179, 84, 15, NULL, NULL),
(181, 85, 16, NULL, NULL),
(183, 86, 12, NULL, NULL),
(185, 87, 18, NULL, NULL),
(187, 88, 19, NULL, NULL),
(189, 89, 20, NULL, NULL),
(191, 90, 21, NULL, NULL),
(193, 91, 22, NULL, NULL),
(195, 92, 23, NULL, NULL),
(197, 93, 24, NULL, NULL),
(199, 94, 27, NULL, NULL),
(201, 95, 28, NULL, NULL),
(203, 96, 29, NULL, NULL),
(205, 97, 10, NULL, NULL),
(207, 98, 11, NULL, NULL),
(209, 99, 15, NULL, NULL),
(211, 100, 16, NULL, NULL),
(213, 101, 12, NULL, NULL),
(215, 102, 18, NULL, NULL),
(217, 103, 19, NULL, NULL),
(219, 104, 20, NULL, NULL),
(221, 105, 21, NULL, NULL),
(223, 106, 22, NULL, NULL),
(225, 107, 23, NULL, NULL),
(227, 108, 24, NULL, NULL),
(229, 109, 27, NULL, NULL),
(231, 110, 28, NULL, NULL),
(233, 111, 29, NULL, NULL),
(235, 112, 10, NULL, NULL),
(237, 113, 11, NULL, NULL),
(239, 114, 15, NULL, NULL),
(240, 112, 43, NULL, NULL),
(241, 113, 43, NULL, NULL),
(242, 114, 43, NULL, NULL),
(243, 115, 43, NULL, NULL),
(244, 115, 16, NULL, NULL),
(245, 116, 43, NULL, NULL),
(246, 116, 12, NULL, NULL),
(247, 117, 43, NULL, NULL),
(248, 117, 18, NULL, NULL),
(249, 118, 43, NULL, NULL),
(250, 118, 19, NULL, NULL),
(251, 119, 43, NULL, NULL),
(252, 119, 20, NULL, NULL),
(253, 120, 43, NULL, NULL),
(254, 120, 21, NULL, NULL),
(255, 121, 43, NULL, NULL),
(256, 121, 22, NULL, NULL),
(257, 122, 43, NULL, NULL),
(258, 122, 23, NULL, NULL),
(259, 123, 43, NULL, NULL),
(260, 123, 24, NULL, NULL),
(261, 124, 43, NULL, NULL),
(262, 124, 27, NULL, NULL),
(263, 125, 43, NULL, NULL),
(264, 125, 28, NULL, NULL),
(265, 126, 43, NULL, NULL),
(266, 126, 29, NULL, NULL),
(267, 127, 42, NULL, NULL),
(268, 127, 10, NULL, NULL),
(269, 128, 42, NULL, NULL),
(270, 128, 11, NULL, NULL),
(271, 129, 42, NULL, NULL),
(272, 129, 15, NULL, NULL),
(273, 130, 42, NULL, NULL),
(274, 130, 16, NULL, NULL),
(275, 131, 42, NULL, NULL),
(276, 131, 12, NULL, NULL),
(277, 132, 42, NULL, NULL),
(278, 132, 18, NULL, NULL),
(279, 133, 42, NULL, NULL),
(280, 133, 19, NULL, NULL),
(281, 134, 42, NULL, NULL),
(282, 134, 20, NULL, NULL),
(283, 135, 42, NULL, NULL),
(284, 135, 21, NULL, NULL),
(285, 136, 42, NULL, NULL),
(286, 136, 22, NULL, NULL),
(287, 137, 42, NULL, NULL),
(288, 137, 23, NULL, NULL),
(289, 138, 42, NULL, NULL),
(290, 138, 24, NULL, NULL),
(291, 139, 42, NULL, NULL),
(292, 139, 27, NULL, NULL),
(293, 140, 42, NULL, NULL),
(294, 140, 28, NULL, NULL),
(295, 141, 42, NULL, NULL),
(296, 141, 29, NULL, NULL),
(297, 142, 46, NULL, NULL),
(298, 142, 9, NULL, NULL),
(299, 143, 40, NULL, NULL),
(300, 143, 9, NULL, NULL),
(301, 144, 41, NULL, NULL),
(302, 144, 9, NULL, NULL),
(303, 145, 42, NULL, NULL),
(304, 145, 9, NULL, NULL),
(305, 146, 43, NULL, NULL),
(306, 146, 9, NULL, NULL),
(307, 147, 39, NULL, NULL),
(308, 147, 47, NULL, NULL),
(309, 147, 9, NULL, NULL),
(310, 148, 32, NULL, NULL),
(311, 148, 47, NULL, NULL),
(312, 148, 9, NULL, NULL),
(313, 149, 37, NULL, NULL),
(314, 149, 47, NULL, NULL),
(315, 149, 9, NULL, NULL),
(316, 150, 37, NULL, NULL),
(317, 150, 47, NULL, NULL),
(318, 150, 8, NULL, NULL),
(319, 150, 48, NULL, NULL),
(320, 150, 9, NULL, NULL),
(321, 151, 46, NULL, NULL),
(322, 151, 48, NULL, NULL),
(323, 151, 35, NULL, NULL),
(324, 152, 46, NULL, NULL),
(325, 152, 32, NULL, NULL),
(326, 153, 46, NULL, NULL),
(327, 153, 48, NULL, NULL),
(328, 153, 33, NULL, NULL),
(329, 154, 46, NULL, NULL),
(330, 154, 31, NULL, NULL),
(331, 155, 40, NULL, NULL),
(332, 155, 35, NULL, NULL),
(333, 156, 40, NULL, NULL),
(334, 156, 32, NULL, NULL),
(335, 157, 40, NULL, NULL),
(336, 157, 31, NULL, NULL),
(337, 158, 40, NULL, NULL),
(338, 158, 33, NULL, NULL),
(339, 159, 41, NULL, NULL),
(340, 159, 35, NULL, NULL),
(341, 160, 41, NULL, NULL),
(342, 160, 32, NULL, NULL),
(343, 161, 41, NULL, NULL),
(344, 161, 31, NULL, NULL),
(345, 162, 41, NULL, NULL),
(346, 162, 33, NULL, NULL),
(347, 163, 43, NULL, NULL),
(348, 163, 35, NULL, NULL),
(349, 164, 43, NULL, NULL),
(350, 164, 32, NULL, NULL),
(351, 165, 43, NULL, NULL),
(352, 165, 31, NULL, NULL),
(353, 166, 43, NULL, NULL),
(354, 166, 33, NULL, NULL),
(355, 167, 46, NULL, NULL),
(356, 167, 30, NULL, NULL),
(357, 168, 46, NULL, NULL),
(358, 168, 17, NULL, NULL),
(359, 169, 40, NULL, NULL),
(360, 169, 30, NULL, NULL),
(361, 170, 40, NULL, NULL),
(362, 170, 17, NULL, NULL),
(363, 171, 41, NULL, NULL),
(364, 171, 30, NULL, NULL),
(365, 172, 41, NULL, NULL),
(366, 172, 17, NULL, NULL),
(367, 173, 43, NULL, NULL),
(368, 173, 30, NULL, NULL),
(369, 174, 43, NULL, NULL),
(370, 174, 17, NULL, NULL),
(371, 175, 50, NULL, NULL),
(372, 175, 9, NULL, NULL),
(373, 176, 50, NULL, NULL),
(374, 176, 31, NULL, NULL),
(375, 177, 50, NULL, NULL),
(376, 177, 7, NULL, NULL),
(377, 178, 50, NULL, NULL),
(378, 178, 10, NULL, NULL),
(379, 179, 50, NULL, NULL),
(380, 179, 11, NULL, NULL),
(381, 180, 50, NULL, NULL),
(382, 180, 12, NULL, NULL),
(383, 181, 50, NULL, NULL),
(384, 181, 13, NULL, NULL),
(385, 182, 50, NULL, NULL),
(386, 182, 14, NULL, NULL),
(387, 183, 50, NULL, NULL),
(388, 183, 15, NULL, NULL),
(389, 184, 50, NULL, NULL),
(390, 184, 16, NULL, NULL),
(391, 185, 50, NULL, NULL),
(392, 185, 17, NULL, NULL),
(393, 186, 50, NULL, NULL),
(394, 186, 18, NULL, NULL),
(395, 187, 50, NULL, NULL),
(396, 187, 19, NULL, NULL),
(397, 188, 50, NULL, NULL),
(398, 188, 20, NULL, NULL),
(399, 189, 50, NULL, NULL),
(400, 189, 21, NULL, NULL),
(401, 190, 50, NULL, NULL),
(402, 190, 22, NULL, NULL),
(403, 191, 50, NULL, NULL),
(404, 191, 23, NULL, NULL),
(405, 192, 50, NULL, NULL),
(406, 192, 24, NULL, NULL),
(407, 193, 50, NULL, NULL),
(408, 193, 25, NULL, NULL),
(409, 194, 50, NULL, NULL),
(410, 194, 26, NULL, NULL),
(411, 195, 50, NULL, NULL),
(412, 195, 27, NULL, NULL),
(413, 196, 50, NULL, NULL),
(414, 196, 28, NULL, NULL),
(415, 197, 50, NULL, NULL),
(416, 197, 29, NULL, NULL),
(417, 198, 50, NULL, NULL),
(418, 198, 30, NULL, NULL),
(419, 199, 50, NULL, NULL),
(420, 199, 32, NULL, NULL),
(421, 200, 50, NULL, NULL),
(422, 200, 33, NULL, NULL),
(423, 201, 50, NULL, NULL),
(424, 201, 34, NULL, NULL),
(425, 202, 50, NULL, NULL),
(426, 202, 35, NULL, NULL),
(427, 203, 32, NULL, NULL),
(428, 203, 45, NULL, NULL),
(429, 204, 31, NULL, NULL),
(430, 204, 45, NULL, NULL),
(431, 205, 51, NULL, NULL),
(432, 205, 7, NULL, NULL),
(433, 206, 51, NULL, NULL),
(434, 206, 9, NULL, NULL),
(435, 207, 51, NULL, NULL),
(436, 207, 12, NULL, NULL),
(437, 208, 51, NULL, NULL),
(438, 208, 13, NULL, NULL),
(439, 209, 51, NULL, NULL),
(440, 209, 14, NULL, NULL),
(441, 210, 51, NULL, NULL),
(442, 210, 25, NULL, NULL),
(443, 211, 51, NULL, NULL),
(444, 211, 26, NULL, NULL),
(445, 212, 51, NULL, NULL),
(446, 212, 27, NULL, NULL),
(447, 213, 51, NULL, NULL),
(448, 213, 28, NULL, NULL),
(449, 214, 51, NULL, NULL),
(450, 214, 29, NULL, NULL),
(451, 215, 51, NULL, NULL),
(452, 215, 31, NULL, NULL),
(453, 216, 51, NULL, NULL),
(454, 216, 33, NULL, NULL),
(455, 217, 51, NULL, NULL),
(456, 217, 34, NULL, NULL),
(457, 218, 51, NULL, NULL),
(458, 218, 35, NULL, NULL),
(459, 219, 52, NULL, NULL),
(460, 219, 10, NULL, NULL),
(461, 220, 52, NULL, NULL),
(462, 220, 11, NULL, NULL),
(463, 221, 52, NULL, NULL),
(464, 221, 15, NULL, NULL),
(465, 222, 52, NULL, NULL),
(466, 222, 16, NULL, NULL),
(467, 223, 52, NULL, NULL),
(468, 223, 17, NULL, NULL),
(469, 224, 52, NULL, NULL),
(470, 224, 18, NULL, NULL),
(471, 225, 52, NULL, NULL),
(472, 225, 19, NULL, NULL),
(473, 226, 52, NULL, NULL),
(474, 226, 20, NULL, NULL),
(475, 227, 52, NULL, NULL),
(476, 227, 21, NULL, NULL),
(477, 228, 52, NULL, NULL),
(478, 228, 22, NULL, NULL),
(479, 229, 52, NULL, NULL),
(480, 229, 23, NULL, NULL),
(481, 230, 52, NULL, NULL),
(482, 230, 24, NULL, NULL),
(483, 231, 52, NULL, NULL),
(484, 231, 30, NULL, NULL),
(485, 232, 52, NULL, NULL),
(486, 232, 32, NULL, NULL),
(487, 233, 17, NULL, NULL),
(488, 233, 37, NULL, NULL),
(489, 234, 17, NULL, NULL),
(490, 234, 39, NULL, NULL),
(491, 235, 37, NULL, NULL),
(492, 235, 17, NULL, NULL),
(493, 236, 39, NULL, NULL),
(494, 236, 17, NULL, NULL),
(495, 237, 28, NULL, NULL),
(496, 237, 38, NULL, NULL),
(497, 237, 17, NULL, NULL),
(498, 237, 44, NULL, NULL),
(499, 238, 26, NULL, NULL),
(500, 238, 38, NULL, NULL),
(501, 238, 17, NULL, NULL),
(502, 238, 44, NULL, NULL),
(503, 239, 24, NULL, NULL),
(504, 239, 38, NULL, NULL),
(505, 239, 17, NULL, NULL),
(506, 239, 44, NULL, NULL),
(507, 240, 23, NULL, NULL),
(508, 240, 38, NULL, NULL),
(509, 240, 17, NULL, NULL),
(510, 240, 44, NULL, NULL),
(511, 241, 22, NULL, NULL),
(512, 241, 38, NULL, NULL),
(513, 241, 17, NULL, NULL),
(514, 241, 44, NULL, NULL),
(515, 242, 21, NULL, NULL),
(516, 242, 38, NULL, NULL),
(517, 242, 17, NULL, NULL),
(518, 242, 44, NULL, NULL),
(519, 243, 14, NULL, NULL),
(520, 243, 38, NULL, NULL),
(521, 243, 17, NULL, NULL),
(522, 243, 44, NULL, NULL),
(523, 244, 17, NULL, NULL),
(524, 244, 38, NULL, NULL),
(525, 245, 38, NULL, NULL),
(526, 245, 17, NULL, NULL),
(527, 245, 44, NULL, NULL),
(528, 246, 35, NULL, NULL),
(529, 246, 44, NULL, NULL),
(530, 246, 17, NULL, NULL),
(531, 247, 38, NULL, NULL),
(532, 247, 17, NULL, NULL),
(533, 247, 37, NULL, NULL),
(534, 247, 53, NULL, NULL),
(535, 248, 38, NULL, NULL),
(536, 248, 17, NULL, NULL),
(537, 248, 53, NULL, NULL),
(538, 249, 38, NULL, NULL),
(539, 249, 17, NULL, NULL),
(540, 249, 39, NULL, NULL),
(541, 249, 53, NULL, NULL),
(542, 250, 38, NULL, NULL),
(543, 250, 17, NULL, NULL),
(544, 250, 40, NULL, NULL),
(545, 250, 53, NULL, NULL),
(546, 251, 38, NULL, NULL),
(547, 251, 17, NULL, NULL),
(548, 251, 41, NULL, NULL),
(549, 251, 53, NULL, NULL),
(550, 252, 38, NULL, NULL),
(551, 252, 17, NULL, NULL),
(552, 252, 42, NULL, NULL),
(553, 252, 53, NULL, NULL),
(554, 253, 38, NULL, NULL),
(555, 253, 17, NULL, NULL),
(556, 253, 43, NULL, NULL),
(557, 253, 53, NULL, NULL),
(558, 254, 38, NULL, NULL),
(559, 254, 35, NULL, NULL),
(560, 254, 44, NULL, NULL),
(561, 254, 17, NULL, NULL),
(562, 254, 37, NULL, NULL),
(563, 254, 53, NULL, NULL),
(564, 255, 38, NULL, NULL),
(565, 255, 35, NULL, NULL),
(566, 255, 44, NULL, NULL),
(567, 255, 17, NULL, NULL),
(568, 256, 38, NULL, NULL),
(569, 256, 35, NULL, NULL),
(570, 256, 44, NULL, NULL),
(571, 256, 17, NULL, NULL),
(572, 256, 39, NULL, NULL),
(573, 256, 53, NULL, NULL),
(574, 255, 53, NULL, NULL),
(575, 257, 38, NULL, NULL),
(576, 257, 35, NULL, NULL),
(577, 257, 44, NULL, NULL),
(578, 257, 17, NULL, NULL),
(579, 257, 40, NULL, NULL),
(580, 257, 53, NULL, NULL),
(581, 258, 38, NULL, NULL),
(582, 258, 35, NULL, NULL),
(583, 258, 44, NULL, NULL),
(584, 258, 17, NULL, NULL),
(585, 258, 41, NULL, NULL),
(586, 258, 53, NULL, NULL),
(587, 259, 38, NULL, NULL),
(588, 259, 35, NULL, NULL),
(589, 259, 44, NULL, NULL),
(590, 259, 17, NULL, NULL),
(591, 259, 42, NULL, NULL),
(592, 259, 53, NULL, NULL),
(593, 260, 38, NULL, NULL),
(594, 260, 35, NULL, NULL),
(595, 260, 44, NULL, NULL),
(596, 260, 17, NULL, NULL),
(597, 260, 43, NULL, NULL),
(598, 260, 53, NULL, NULL),
(599, 261, 30, NULL, NULL),
(600, 261, 37, NULL, NULL),
(601, 262, 30, NULL, NULL),
(602, 262, 38, NULL, NULL),
(603, 263, 30, NULL, NULL),
(604, 263, 39, NULL, NULL),
(605, 264, 30, NULL, NULL),
(606, 264, 44, NULL, NULL),
(607, 265, 37, NULL, NULL),
(608, 265, 48, NULL, NULL),
(609, 265, 54, NULL, NULL),
(610, 266, 39, NULL, NULL),
(611, 266, 48, NULL, NULL),
(612, 266, 54, NULL, NULL),
(613, 267, 9, NULL, NULL),
(614, 267, 44, NULL, NULL),
(615, 268, 12, NULL, NULL),
(616, 268, 44, NULL, NULL),
(617, 269, 15, NULL, NULL),
(618, 269, 44, NULL, NULL),
(619, 270, 23, NULL, NULL),
(620, 270, 44, NULL, NULL),
(621, 271, 28, NULL, NULL),
(622, 271, 44, NULL, NULL),
(623, 272, 9, NULL, NULL),
(624, 272, 40, NULL, NULL),
(625, 273, 9, NULL, NULL),
(626, 273, 41, NULL, NULL),
(627, 274, 9, NULL, NULL),
(628, 274, 42, NULL, NULL),
(629, 275, 9, NULL, NULL),
(630, 275, 43, NULL, NULL),
(631, 275, 53, NULL, NULL),
(632, 274, 53, NULL, NULL),
(633, 273, 53, NULL, NULL),
(634, 272, 53, NULL, NULL),
(635, 276, 12, NULL, NULL),
(636, 276, 40, NULL, NULL),
(637, 276, 53, NULL, NULL),
(638, 277, 12, NULL, NULL),
(639, 277, 41, NULL, NULL),
(640, 277, 53, NULL, NULL),
(641, 278, 12, NULL, NULL),
(642, 278, 42, NULL, NULL),
(643, 278, 53, NULL, NULL),
(644, 279, 12, NULL, NULL),
(645, 279, 43, NULL, NULL),
(646, 279, 53, NULL, NULL),
(647, 280, 15, NULL, NULL),
(648, 280, 40, NULL, NULL),
(649, 280, 53, NULL, NULL),
(650, 281, 15, NULL, NULL),
(651, 281, 41, NULL, NULL),
(652, 281, 53, NULL, NULL),
(653, 282, 15, NULL, NULL),
(654, 282, 42, NULL, NULL),
(655, 282, 53, NULL, NULL),
(656, 283, 15, NULL, NULL),
(657, 283, 43, NULL, NULL),
(658, 283, 53, NULL, NULL),
(659, 284, 23, NULL, NULL),
(660, 284, 40, NULL, NULL),
(661, 284, 53, NULL, NULL),
(662, 285, 23, NULL, NULL),
(663, 285, 41, NULL, NULL),
(664, 285, 53, NULL, NULL),
(665, 286, 23, NULL, NULL),
(666, 286, 42, NULL, NULL),
(667, 286, 53, NULL, NULL),
(668, 287, 23, NULL, NULL),
(669, 287, 43, NULL, NULL),
(670, 287, 53, NULL, NULL),
(671, 288, 28, NULL, NULL),
(672, 288, 40, NULL, NULL),
(673, 288, 53, NULL, NULL),
(674, 289, 28, NULL, NULL),
(675, 289, 41, NULL, NULL),
(676, 289, 53, NULL, NULL),
(677, 290, 28, NULL, NULL),
(678, 290, 42, NULL, NULL),
(679, 290, 53, NULL, NULL),
(680, 291, 28, NULL, NULL),
(681, 291, 43, NULL, NULL),
(682, 291, 53, NULL, NULL),
(684, 292, 8, NULL, NULL),
(685, 292, 29, NULL, NULL),
(686, 292, 48, NULL, NULL),
(687, 292, 55, NULL, NULL),
(688, 82, 55, NULL, NULL),
(689, 83, 55, NULL, NULL),
(690, 84, 55, NULL, NULL),
(691, 85, 55, NULL, NULL),
(692, 86, 55, NULL, NULL),
(693, 87, 55, NULL, NULL),
(694, 88, 55, NULL, NULL),
(695, 89, 55, NULL, NULL),
(696, 90, 55, NULL, NULL),
(697, 91, 55, NULL, NULL),
(698, 92, 55, NULL, NULL),
(699, 93, 55, NULL, NULL),
(700, 94, 55, NULL, NULL),
(701, 95, 55, NULL, NULL),
(702, 96, 55, NULL, NULL),
(703, 97, 56, NULL, NULL),
(704, 98, 56, NULL, NULL),
(705, 99, 56, NULL, NULL),
(706, 100, 56, NULL, NULL),
(707, 101, 56, NULL, NULL),
(708, 102, 56, NULL, NULL),
(709, 103, 56, NULL, NULL),
(710, 104, 56, NULL, NULL),
(711, 105, 56, NULL, NULL),
(712, 106, 56, NULL, NULL),
(713, 107, 56, NULL, NULL),
(714, 108, 56, NULL, NULL),
(715, 109, 56, NULL, NULL),
(716, 110, 56, NULL, NULL),
(717, 111, 56, NULL, NULL),
(718, 293, 32, NULL, NULL),
(719, 293, 10, NULL, NULL),
(720, 294, 32, NULL, NULL),
(721, 294, 11, NULL, NULL),
(722, 295, 32, NULL, NULL),
(723, 295, 15, NULL, NULL),
(724, 296, 32, NULL, NULL),
(725, 296, 16, NULL, NULL),
(726, 297, 32, NULL, NULL),
(727, 297, 12, NULL, NULL),
(728, 298, 32, NULL, NULL),
(729, 298, 18, NULL, NULL),
(730, 299, 32, NULL, NULL),
(731, 299, 19, NULL, NULL),
(732, 300, 32, NULL, NULL),
(733, 300, 20, NULL, NULL),
(734, 301, 32, NULL, NULL),
(735, 301, 21, NULL, NULL),
(736, 302, 32, NULL, NULL),
(737, 302, 22, NULL, NULL),
(738, 304, 32, NULL, NULL),
(739, 304, 23, NULL, NULL),
(740, 305, 32, NULL, NULL),
(741, 305, 24, NULL, NULL),
(742, 306, 32, NULL, NULL),
(743, 306, 27, NULL, NULL),
(744, 307, 32, NULL, NULL),
(745, 307, 28, NULL, NULL),
(746, 308, 32, NULL, NULL),
(747, 308, 29, NULL, NULL),
(748, 309, 55, NULL, NULL),
(749, 309, 8, NULL, NULL),
(750, 309, 10, NULL, NULL),
(751, 310, 55, NULL, NULL),
(752, 310, 8, NULL, NULL),
(753, 310, 11, NULL, NULL),
(754, 311, 55, NULL, NULL),
(755, 311, 8, NULL, NULL),
(756, 311, 12, NULL, NULL),
(757, 312, 55, NULL, NULL),
(758, 312, 8, NULL, NULL),
(759, 312, 15, NULL, NULL),
(760, 313, 55, NULL, NULL),
(761, 313, 8, NULL, NULL),
(762, 313, 16, NULL, NULL),
(763, 314, 55, NULL, NULL),
(764, 314, 8, NULL, NULL),
(765, 314, 18, NULL, NULL),
(766, 315, 55, NULL, NULL),
(767, 315, 8, NULL, NULL),
(768, 315, 19, NULL, NULL),
(769, 316, 55, NULL, NULL),
(770, 316, 8, NULL, NULL),
(771, 316, 20, NULL, NULL),
(772, 317, 55, NULL, NULL),
(773, 317, 8, NULL, NULL),
(774, 317, 21, NULL, NULL),
(775, 318, 55, NULL, NULL),
(776, 318, 8, NULL, NULL),
(777, 318, 22, NULL, NULL),
(778, 319, 55, NULL, NULL),
(779, 319, 8, NULL, NULL),
(780, 319, 23, NULL, NULL),
(781, 320, 55, NULL, NULL),
(782, 320, 8, NULL, NULL),
(783, 320, 24, NULL, NULL),
(784, 321, 55, NULL, NULL),
(785, 321, 8, NULL, NULL),
(786, 321, 27, NULL, NULL),
(787, 322, 55, NULL, NULL),
(788, 322, 8, NULL, NULL),
(789, 322, 28, NULL, NULL),
(790, 323, 55, NULL, NULL),
(791, 323, 8, NULL, NULL),
(792, 323, 29, NULL, NULL),
(793, 324, 56, NULL, NULL),
(794, 324, 32, NULL, NULL),
(795, 325, 32, NULL, NULL),
(796, 326, 32, NULL, NULL),
(797, 326, 31, NULL, NULL),
(800, 329, 56, NULL, NULL),
(801, 329, 31, NULL, NULL),
(802, 162, 48, NULL, NULL),
(803, 330, 55, NULL, NULL),
(804, 330, 57, NULL, NULL),
(805, 330, 48, NULL, NULL),
(806, 330, 31, NULL, NULL),
(807, 331, 32, NULL, NULL),
(808, 331, 30, NULL, NULL),
(809, 332, 32, NULL, NULL),
(810, 332, 17, NULL, NULL),
(811, 337, 55, NULL, NULL),
(812, 337, 57, NULL, NULL),
(813, 337, 48, NULL, NULL),
(814, 337, 30, NULL, NULL),
(815, 338, 31, NULL, NULL),
(816, 338, 9, NULL, NULL),
(817, 339, 31, NULL, NULL),
(820, 341, 51, NULL, NULL),
(821, 341, 1, NULL, NULL),
(822, 342, 51, NULL, NULL),
(823, 342, 58, NULL, NULL),
(824, 343, 38, NULL, NULL),
(825, 343, 54, NULL, NULL),
(827, 344, 38, NULL, NULL),
(828, 344, 48, NULL, NULL),
(829, 344, 54, NULL, NULL),
(830, 345, 37, NULL, NULL),
(831, 345, 54, NULL, NULL),
(832, 346, 39, NULL, NULL),
(833, 346, 54, NULL, NULL),
(834, 347, 9, NULL, NULL),
(835, 347, 38, NULL, NULL),
(836, 347, 53, NULL, NULL),
(837, 348, 12, NULL, NULL),
(838, 348, 38, NULL, NULL),
(839, 348, 53, NULL, NULL),
(840, 349, 23, NULL, NULL),
(841, 349, 56, NULL, NULL),
(842, 349, 53, NULL, NULL),
(843, 350, 28, NULL, NULL),
(844, 350, 38, NULL, NULL),
(845, 350, 53, NULL, NULL),
(846, 351, 42, NULL, NULL),
(847, 351, 32, NULL, NULL),
(848, 352, 42, NULL, NULL),
(849, 352, 31, NULL, NULL),
(850, 353, 55, NULL, NULL),
(851, 353, 32, NULL, NULL),
(852, 354, 55, NULL, NULL),
(853, 354, 8, NULL, NULL),
(854, 354, 32, NULL, NULL),
(855, 355, 42, NULL, NULL),
(856, 355, 30, NULL, NULL),
(857, 356, 42, NULL, NULL),
(858, 356, 17, NULL, NULL),
(859, 357, 56, NULL, NULL),
(860, 357, 30, NULL, NULL),
(861, 358, 56, NULL, NULL),
(862, 358, 17, NULL, NULL),
(863, 359, 50, NULL, NULL),
(864, 359, 58, NULL, NULL),
(865, 360, 38, NULL, NULL),
(866, 360, 59, NULL, NULL),
(867, 360, 9, NULL, NULL),
(868, 361, 55, NULL, NULL),
(869, 361, 57, NULL, NULL),
(870, 361, 27, NULL, NULL),
(871, 362, 40, NULL, NULL),
(872, 362, 8, NULL, NULL),
(873, 362, 1, NULL, NULL),
(874, 362, 48, NULL, NULL),
(875, 363, 40, NULL, NULL),
(876, 363, 8, NULL, NULL),
(877, 363, 34, NULL, NULL),
(878, 363, 48, NULL, NULL),
(879, 364, 40, NULL, NULL),
(880, 364, 8, NULL, NULL),
(881, 364, 48, NULL, NULL),
(882, 364, 14, NULL, NULL),
(883, 365, 40, NULL, NULL),
(884, 365, 8, NULL, NULL),
(885, 365, 48, NULL, NULL),
(886, 365, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tajwid`
--

CREATE TABLE `tajwid` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tajwid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `ex_surah` int DEFAULT NULL,
  `ex_ayah` int DEFAULT NULL,
  `pattern_ex` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tajwid`
--

INSERT INTO `tajwid` (`id`, `kode`, `nama_tajwid`, `penjelasan`, `created_at`, `updated_at`, `kategori_id`, `ex_surah`, `ex_ayah`, `pattern_ex`) VALUES
(1, 'H000', 'Inisialisasi', NULL, '2023-06-06 18:02:45', '2023-06-06 18:02:45', 1, NULL, NULL, NULL),
(2, 'H001', 'Idzhar Halqi', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><span style=\"font-size: 18.6667px;\">Idzhar Halqi terjadi apabila terdapat nun mati atau tanwin bertemu dengan salah satu dari enam huruf hijaiyah yaitu <span class=\"TextRun Highlight SCXW265598519 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW265598519 BCX0\">ء ه ح خ ع غ. Cara membacanya harus terang, jelas dan pendek. Bunyi suaranya tetap jelas, tidak samar dan tidak berdengung.</span></span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:26:13', 2, 6, 26, '\\u0648\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u06cc\\u064e<tajwid>\\u0646\\u06e1\\u0647</tajwid>\\u064e\\u0648\\u06e1\\u0646\\u064e\\u0020\\u0639\\u064e<tajwid>\\u0646\\u06e1\\u0647</tajwid>\\u064f\\u0020\\u0648\\u064e\\u06cc\\u064e<tajwidSec>\\u0646\\u06e1\\u0640\\u0654</tajwidSec>\\u064e\\u0648\\u06e1\\u0646\\u064e\\u0020\\u0639\\u064e<tajwid>\\u0646\\u06e1\\u0647</tajwid>\\u064f\\u06d6\\u0020\\u0648\\u064e\\u0625\\u0650\\u0646\\u0020\\u06cc\\u064f\\u0647\\u06e1\\u0644\\u0650\\u0643\\u064f\\u0648\\u0646\\u064e\\u0020\\u0625\\u0650\\u0644\\u0651\\u064e\\u0627\\u06e4\\u0020\\u0623\\u064e\\u0646\\u0641\\u064f\\u0633\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u0648\\u064e\\u0645\\u064e\\u0627\\u0020\\u06cc\\u064e\\u0634\\u06e1\\u0639\\u064f\\u0631\\u064f\\u0648\\u0646\\u064e\\n'),
(3, 'H002', 'Ikhfa\'', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW255053046 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255053046 BCX0\">Ikhfa</span><span class=\"NormalTextRun SCXW255053046 BCX0\">&rsquo;</span><span class=\"NormalTextRun SCXW255053046 BCX0\"> terjadi apabila terdapat nun mati atau tanwin </span></span><span class=\"TextRun Highlight SCXW255053046 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255053046 BCX0\">bertemu dengan salah satu dari</span><span class=\"NormalTextRun SCXW255053046 BCX0\"> 15 huruf </span><span class=\"NormalTextRun SCXW255053046 BCX0\">hijaiyah</span><span class=\"NormalTextRun SCXW255053046 BCX0\"> yaitu </span></span><span class=\"TextRun Highlight SCXW255053046 BCX0\" lang=\"EN-US\" xml:lang=\"EN-US\" data-contrast=\"none\"><span class=\"NormalTextRun SCXW255053046 BCX0\"> </span></span><span class=\"TextRun Highlight SCXW255053046 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255053046 BCX0\">ت ث د ذ</span></span> <span class=\"TextRun Highlight SCXW255053046 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255053046 BCX0\">ج</span><span class=\"NormalTextRun SCXW255053046 BCX0\"> ز س ش ص ض ط ظ ف ق ك</span></span><span class=\"TextRun Highlight SCXW255053046 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255053046 BCX0\">. Cara membacanya yaitu menyamarkan suaranya nun atau tanwin antara idzhar dan idghom.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:38:42', 2, 35, 22, '\\u0648\\u064e\\u0645\\u064e\\u0627\\u0020\\u06cc\\u064e\\u0633\\u06e1\\u062a\\u064e\\u0648\\u0650\\u06cc\\u0020\\u0671\\u0644\\u06e1\\u0623\\u064e\\u062d\\u06e1\\u06cc\\u064e\\u0627\\u06e4\\u0621\\u064f\\u0020\\u0648\\u064e\\u0644\\u064e\\u0627\\u0020\\u0671\\u0644\\u06e1\\u0623\\u064e\\u0645\\u06e1\\u0648\\u064e\\u200a\\u0670\\u2060\\u062a\\u064f\\u06da\\u0020\\u0625\\u0650\\u0646\\u0651\\u064e\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647\\u064e\\u0020\\u06cc\\u064f\\u0633\\u06e1\\u0645\\u0650\\u0639\\u064f\\u0020\\u0645\\u064e\\u0646\\u0020\\u06cc\\u064e\\u0634\\u064e\\u0627\\u06e4\\u0621\\u064f\\u06d6\\u0020\\u0648\\u064e\\u0645\\u064e\\u0627\\u06e4\\u0020\\u0623\\u064e<tajwid>\\u0646\\u062a</tajwid>\\u064e\\u0020\\u0628\\u0650\\u0645\\u064f\\u0633\\u06e1\\u0645\\u0650\\u0639\\u08f2\\u0020\\u0645\\u0651\\u064e<tajwidSec>\\u0646\\u0020\\u0641</tajwidSec>\\u0650\\u06cc\\u0020\\u0671\\u0644\\u06e1\\u0642\\u064f\\u0628\\u064f\\u0648\\u0631\\u0650\\n'),
(4, 'H003', 'Iqlab', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW168257350 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW168257350 BCX0\">Iqlab</span><span class=\"NormalTextRun SCXW168257350 BCX0\"> adalah hukum bacaan yang hanya terjadi apabila nun mati</span></span><span class=\"TextRun Highlight SCXW168257350 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\">&nbsp;<span class=\"NormalTextRun SCXW168257350 BCX0\">atau</span></span> tanwin <span class=\"TextRun Highlight SCXW168257350 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW168257350 BCX0\">bertemu dengan huruf&nbsp; </span></span><span class=\"TextRun Highlight SCXW168257350 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW168257350 BCX0\">ب</span></span><span class=\"TextRun Highlight SCXW168257350 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW168257350 BCX0\">. Cara membacanya yaitu mengubah suaranyan nun atau tanwin menjadi suaranya mim disertai dengan dengung.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:41:19', 2, 56, 6, '\\u0641\\u064e\\u0643\\u064e\\u0627\\u0646\\u064e\\u062a\\u06e1\\u0020\\u0647\\u064e\\u0628\\u064e\\u0627\\u06e4\\u0621\\u08f0\\u0020\\u0645\\u0651\\u064f<tajwid>\\u0646\\u06e2\\u0628</tajwid>\\u064e\\u062b\\u0651\\u08f0\\u0627\\n'),
(5, 'H004', 'Idghom Bighunnah', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW255821708 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255821708 BCX0\">Hukum bacaan </span><span class=\"NormalTextRun SCXW255821708 BCX0\">idghom</span> <span class=\"NormalTextRun SCXW255821708 BCX0\">big</span><span class=\"NormalTextRun SCXW255821708 BCX0\">h</span><span class=\"NormalTextRun SCXW255821708 BCX0\">unnah</span><span class=\"NormalTextRun SCXW255821708 BCX0\"> bisa terjadi apabila nun mati </span></span><span class=\"TextRun Highlight SCXW255821708 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255821708 BCX0\">atau</span></span><span class=\"TextRun Highlight SCXW255821708 BCX0\" lang=\"EN-US\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255821708 BCX0\">  tanwin</span></span><span class=\"TextRun Highlight SCXW255821708 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255821708 BCX0\">&nbsp;bertemu dengan salah satu dari empat huruf yaitu </span></span><span class=\"TextRun Highlight SCXW255821708 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255821708 BCX0\">ي ن م و</span></span><span class=\"TextRun Highlight SCXW255821708 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW255821708 BCX0\">. Cara membacanya yaitu dengan melebur suaranya nun mati atau tanwin ke dalam huruf idghom bighunnah disertai dengan dengung.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:42:15', 2, 55, 15, '\\u0648\\u064e\\u062e\\u064e\\u0644\\u064e\\u0642\\u064e\\u0020\\u0671\\u0644\\u06e1\\u062c\\u064e\\u0627\\u06e4\\u0646\\u0651\\u064e\\u0020\\u0645\\u0650<tajwidSec>\\u0646\\u0020\\u0645</tajwidSec>\\u0651\\u064e\\u0627\\u0631\\u0650\\u062c<tajwidSec>\\u08f2\\u0020\\u0645</tajwidSec>\\u0651\\u0650<tajwid>\\u0646\\u0020\\u0646</tajwid>\\u0651\\u064e\\u0627\\u0631\\u08f2\\n'),
(6, 'H005', 'Idghom Bilaghunnah', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW39605801 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW39605801 BCX0\">Hukum bacaan </span><span class=\"NormalTextRun SCXW39605801 BCX0\">idgham</span> <span class=\"NormalTextRun SCXW39605801 BCX0\">bilaghunnah</span><span class=\"NormalTextRun SCXW39605801 BCX0\"> dapat terjadi jika terdapat nun mati atau tanwin </span></span><span class=\"TextRun Highlight SCXW39605801 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW39605801 BCX0\">bertemu dengan salah satu dari dua huruf yaitu </span></span><span class=\"TextRun Highlight SCXW39605801 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW39605801 BCX0\">ل ر</span></span><span class=\"TextRun Highlight SCXW39605801 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW39605801 BCX0\">. Cara membacanya yaitu dengan memasukkan suaranya nun mati atau tanwin ke dalam huruf idghom bilaghunnah tanpa disertai dengung.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:43:07', 2, 55, 20, '\\u0628\\u064e\\u06cc\\u06e1\\u0646\\u064e\\u0647\\u064f\\u0645\\u064e\\u0627\\u0020\\u0628\\u064e\\u0631\\u06e1\\u0632\\u064e\\u062e<tajwidSec>\\u08f1\\u0020\\u0644</tajwidSec>\\u0651\\u064e\\u0627\\u0020\\u06cc\\u064e\\u0628\\u06e1\\u063a\\u0650\\u06cc\\u064e\\u0627\\u0646\\u0650\\n'),
(7, 'H006', 'Ikhfa\' Syafawi', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW258129561 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW258129561 BCX0\">Hukum bacaan </span><span class=\"NormalTextRun SCXW258129561 BCX0\">ikhfa</span> <span class=\"NormalTextRun SCXW258129561 BCX0\">syafawi</span><span class=\"NormalTextRun SCXW258129561 BCX0\"> dapat terjadi ketika terdapat</span></span> <span class=\"TextRun SCXW258129561 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW258129561 BCX0\">مْ</span></span><span class=\"TextRun SCXW258129561 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW258129561 BCX0\"> bertemu dengan huruf </span><span class=\"NormalTextRun SCXW258129561 BCX0\">hijaiyah</span> </span><span class=\"TextRun Highlight SCXW258129561 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW258129561 BCX0\">ب. Cara membacanya yaitu dengan samar-samar dan sedikit didengungkan.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:46:13', 3, 2, 8, '\\u0648\\u064e\\u0645\\u0650\\u0646\\u064e\\u0020\\u0671\\u0644\\u0646\\u0651\\u064e\\u0627\\u0633\\u0650\\u0020\\u0645\\u064e\\u0646\\u0020\\u06cc\\u064e\\u0642\\u064f\\u0648\\u0644\\u064f\\u0020\\u0621\\u064e\\u0627\\u0645\\u064e\\u0646\\u0651\\u064e\\u0627\\u0020\\u0628\\u0650\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647\\u0650\\u0020\\u0648\\u064e\\u0628\\u0650\\u0671\\u0644\\u06e1\\u06cc\\u064e\\u0648\\u06e1\\u0645\\u0650\\u0020\\u0671\\u0644\\u06e1\\u0640\\u0654\\u064e\\u0627\\u062e\\u0650\\u0631\\u0650\\u0020\\u0648\\u064e\\u0645\\u064e\\u0627\\u0020\\u0647\\u064f<tajwid>\\u0645\\u0020\\u0628</tajwid>\\u0650\\u0645\\u064f\\u0624\\u06e1\\u0645\\u0650\\u0646\\u0650\\u06cc\\u0646\\u064e\\n'),
(8, 'H007', 'Idghom Mimi', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW194263256 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW194263256 BCX0\">Hukum bacaan </span><span class=\"NormalTextRun SCXW194263256 BCX0\">idgham</span><span class=\"NormalTextRun SCXW194263256 BCX0\"> mimi bisa terjadi apabila </span></span><span class=\"TextRun SCXW194263256 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW194263256 BCX0\">م</span><span class=\"NormalTextRun SCXW194263256 BCX0\">ْ</span></span><span class=\"TextRun SCXW194263256 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW194263256 BCX0\"> bertemu dengan huruf </span><span class=\"NormalTextRun SCXW194263256 BCX0\">hijaiyah</span> </span><span class=\"TextRun Highlight SCXW194263256 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW194263256 BCX0\">م. Cara membacanya yaitu dengan menyuarakan mim rangkap atau ditasyididkan disertai dengan dengung.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:47:08', 3, 2, 10, '\\u0641\\u0650\\u06cc\\u0020\\u0642\\u064f\\u0644\\u064f\\u0648\\u0628\\u0650\\u0647\\u0650<tajwid>\\u0645\\u0020\\u0645</tajwid>\\u0651\\u064e\\u0631\\u064e\\u0636\\u08f1\\u0020\\u0641\\u064e\\u0632\\u064e\\u0627\\u062f\\u064e\\u0647\\u064f\\u0645\\u064f\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647\\u064f\\u0020\\u0645\\u064e\\u0631\\u064e\\u0636\\u08f0\\u0627\\u06d6\\u0020\\u0648\\u064e\\u0644\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u0639\\u064e\\u0630\\u064e\\u0627\\u0628\\u064c\\u0020\\u0623\\u064e\\u0644\\u0650\\u06cc\\u0645\\u064f\\u06e2\\u0020\\u0628\\u0650\\u0645\\u064e\\u0627\\u0020\\u0643\\u064e\\u0627\\u0646\\u064f\\u0648\\u0627\\u06df\\u0020\\u06cc\\u064e\\u0643\\u06e1\\u0630\\u0650\\u0628\\u064f\\u0648\\u0646\\u064e\\n'),
(9, 'H008', 'Idzhar Syafawi', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW147936535 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\">Hukum bacaan disebut </span><span class=\"NormalTextRun SCXW147936535 BCX0\">idzhar</span> <span class=\"NormalTextRun SCXW147936535 BCX0\">syafawi</span><span class=\"NormalTextRun SCXW147936535 BCX0\"> apabila terdapat </span></span><span class=\"TextRun SCXW147936535 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\">م</span><span class=\"NormalTextRun SCXW147936535 BCX0\">ْ</span></span><span class=\"TextRun SCXW147936535 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\"> bertemu dengan salah satu huruf </span><span class=\"NormalTextRun SCXW147936535 BCX0\">hijaiyah</span><span class=\"NormalTextRun SCXW147936535 BCX0\"> selain huruf </span></span><span class=\"TextRun Highlight SCXW147936535 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\">ب</span></span><span class=\"TextRun Highlight SCXW147936535 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\"> dan </span></span><span class=\"TextRun Highlight SCXW147936535 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\">م</span></span><span class=\"TextRun Highlight SCXW147936535 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW147936535 BCX0\">. Cara membacanya yaitu dengan jelas dan terang dengan merapatkan bibir.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:47:57', 3, 2, 6, '\\u0625\\u0650\\u0646\\u0651\\u064e\\u0020\\u0671\\u0644\\u0651\\u064e\\u0630\\u0650\\u06cc\\u0646\\u064e\\u0020\\u0643\\u064e\\u0641\\u064e\\u0631\\u064f\\u0648\\u0627\\u06df\\u0020\\u0633\\u064e\\u0648\\u064e\\u0627\\u06e4\\u0621\\u064c\\u0020\\u0639\\u064e\\u0644\\u064e\\u06cc\\u06e1\\u0647\\u0650<tajwidSec>\\u0645\\u06e1\\u0020\\u0621</tajwidSec>\\u064e\\u0623\\u064e\\u0646\\u0630\\u064e\\u0631\\u06e1\\u062a\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u0623\\u064e<tajwidSec>\\u0645\\u06e1\\u0020\\u0644</tajwidSec>\\u064e<tajwid>\\u0645\\u06e1\\u0020\\u062a</tajwid>\\u064f\\u0646\\u0630\\u0650\\u0631\\u06e1\\u0647\\u064f<tajwidSec>\\u0645\\u06e1\\u0020\\u0644</tajwidSec>\\u064e\\u0627\\u0020\\u06cc\\u064f\\u0624\\u06e1\\u0645\\u0650\\u0646\\u064f\\u0648\\u0646\\u064e\\n'),
(10, 'H009', 'Ghunnah', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW172903449 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW172903449 BCX0\">Ghunnah</span><span class=\"NormalTextRun SCXW172903449 BCX0\"> bisa terjadi apabila terdapat huruf nun atau nun bertasydid </span></span><span class=\"TextRun SCXW172903449 BCX0\" lang=\"EN-US\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW172903449 BCX0\">( </span></span><span class=\"TextRun SCXW172903449 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW172903449 BCX0\">نّ م</span><span class=\"NormalTextRun SCXW172903449 BCX0\">ّ</span></span><span class=\"TextRun SCXW172903449 BCX0\" lang=\"EN-US\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW172903449 BCX0\"> )</span></span><span class=\"TextRun SCXW172903449 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW172903449 BCX0\"> didahului oleh salah satu harakat </span><span class=\"NormalTextRun SCXW172903449 BCX0\">fathah</span><span class=\"NormalTextRun SCXW172903449 BCX0\">, kasrah dan </span><span class=\"NormalTextRun SCXW172903449 BCX0\">dhommah. Cara membacanya dengan cara mendengungkan suaranya mim atau nun di pangkal hidung selama 2-3 ketukan.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:49:51', 4, 35, 24, '\\u0625\\u0650<tajwidSec>\\u0646\\u0651</tajwidSec>\\u064e\\u0627\\u06e4\\u0020\\u0623\\u064e\\u0631\\u06e1\\u0633\\u064e\\u0644\\u06e1\\u0646\\u064e\\u0640\\u0670\\u0643\\u064e\\u0020\\u0628\\u0650\\u0671\\u0644\\u06e1\\u062d\\u064e\\u0642\\u0651\\u0650\\u0020\\u0628\\u064e\\u0634\\u0650\\u06cc\\u0631\\u08f0\\u0627\\u0020\\u0648\\u064e\\u0646\\u064e\\u0630\\u0650\\u06cc\\u0631\\u08f0\\u0627\\u06da\\u0020\\u0648\\u064e\\u0625\\u0650\\u0646\\u0020<tajwid>\\u0645\\u0651</tajwid>\\u0650\\u0646\\u06e1\\u0020\\u0623\\u064f<tajwid>\\u0645\\u0651</tajwid>\\u064e\\u0629\\u064d\\u0020\\u0625\\u0650\\u0644\\u0651\\u064e\\u0627\\u0020\\u062e\\u064e\\u0644\\u064e\\u0627\\u0020\\u0641\\u0650\\u06cc\\u0647\\u064e\\u0627\\u0020\\u0646\\u064e\\u0630\\u0650\\u06cc\\u0631\\u08f1\\n'),
(11, 'H010', 'Al-Qomariyah', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW128665972 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW128665972 BCX0\">Hukum bacaan </span><span class=\"NormalTextRun SCXW128665972 BCX0\">al-qamariyah</span><span class=\"NormalTextRun SCXW128665972 BCX0\"> terjadi jika ada huruf alif lam ( </span></span><span class=\"TextRun SCXW128665972 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW128665972 BCX0\">ال</span></span><span class=\"TextRun SCXW128665972 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW128665972 BCX0\"> ) bertemu dengan salah satu dari 14 huruf </span><span class=\"NormalTextRun SCXW128665972 BCX0\">qomariyah</span><span class=\"NormalTextRun SCXW128665972 BCX0\"> yaitu </span></span><span class=\"TextRun SCXW128665972 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW128665972 BCX0\">ء ب ج ح خ ع غ ف ق ك م </span><span class=\"NormalTextRun SCXW128665972 BCX0\">و ه</span><span class=\"NormalTextRun SCXW128665972 BCX0\"> ي</span></span><span class=\"TextRun SCXW128665972 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW128665972 BCX0\">.&nbsp;</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:51:15', 5, 55, 15, '\\u0648\\u064e\\u062e\\u064e\\u0644\\u064e\\u0642\\u064e\\u0020<tajwidSec>\\u0671\\u0644\\u06e1\\u062c</tajwidSec>\\u064e\\u0627\\u06e4\\u0646\\u0651\\u064e\\u0020\\u0645\\u0650\\u0646\\u0020\\u0645\\u0651\\u064e\\u0627\\u0631\\u0650\\u062c\\u08f2\\u0020\\u0645\\u0651\\u0650\\u0646\\u0020\\u0646\\u0651\\u064e\\u0627\\u0631\\u08f2\\n'),
(12, 'H011', 'Al-Syamsiyah', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW184648372 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW184648372 BCX0\">Hukum bacan al-syamsiyah terjadi jika ada huruf alif lam ( </span></span><span class=\"TextRun SCXW184648372 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW184648372 BCX0\">ال</span></span><span class=\"TextRun SCXW184648372 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW184648372 BCX0\"> ) bertemu dengan salah satu dari 14 huruf syamsiyah yaitu</span></span> <span class=\"TextRun SCXW184648372 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW184648372 BCX0\">ت ث د ذ ر ز س ش ص ض ط ظ ل ن</span></span><span class=\"TextRun SCXW184648372 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW184648372 BCX0\">. </span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:52:26', 5, 95, 1, '\\u0628\\u0651\\u0650\\u0633\\u06e1\\u0645\\u0650\\u0020<tajwidSec>\\u0671\\u0644\\u0644</tajwidSec>\\u0651\\u064e\\u0647\\u0650\\u0020<tajwidSec>\\u0671\\u0644\\u0631</tajwidSec>\\u0651\\u064e\\u062d\\u06e1\\u0645\\u064e\\u0640\\u0670\\u0646\\u0650\\u0020<tajwidSec>\\u0671\\u0644\\u0631</tajwidSec>\\u0651\\u064e\\u062d\\u0650\\u06cc\\u0645\\u0650\\u0020\\u0648\\u064e<tajwidSec>\\u0671\\u0644\\u062a</tajwidSec>\\u0651\\u0650\\u06cc\\u0646\\u0650\\u0020\\u0648\\u064e<tajwidSec>\\u0671\\u0644\\u0632</tajwidSec>\\u0651\\u064e\\u06cc\\u06e1\\u062a\\u064f\\u0648\\u0646\\u0650\\n'),
(13, 'H012', 'Ro\' Tafkhim', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; tafkhim adalah ro&rsquo; yang dibaca tebal disebabkan adanya kondisi-kondisi tertentu seperti:&nbsp;</span></p>\r\n<ul>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"20\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"1\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; yang berharokat fathah atau dhommah&nbsp;</span></li>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"20\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"2\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; mati atau sebab waqof yang huruf sebelumnya berharokat fathah atau dhommah walaupun terpisah oleh huruf mati selain ya&rsquo;.&nbsp;</span></li>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"20\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"3\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; mati yang berada setelah kasrah dan huruf sesudahnya huruf isti&rsquo;la ( خ ص ض ط ظ غ ق ) yang berada dalam satu kalimat.&nbsp;</span></li>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"20\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"4\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; mati yang berada setelah hamzah washol.&nbsp;</span></li>\r\n</ul>', '2023-06-06 18:02:45', '2023-08-05 15:53:36', 6, 48, 28, '\\u0647\\u064f\\u0648\\u064e\\u0020\\u0671\\u0644\\u0651\\u064e\\u0630\\u0650\\u06cc\\u06e4\\u0020\\u0623<tajwidSec>\\u064e\\u0631</tajwidSec>\\u06e1\\u0633\\u064e\\u0644\\u064e\\u0020<tajwid>\\u0631\\u064e</tajwid>\\u0633\\u064f\\u0648\\u0644\\u064e\\u0647\\u064f\\u06e5\\u0020\\u0628\\u0650\\u0671\\u0644\\u06e1\\u0647\\u064f\\u062f\\u064e\\u0649\\u0670\\u0020\\u0648\\u064e\\u062f\\u0650\\u06cc\\u0646\\u0650\\u0020\\u0671\\u0644\\u06e1\\u062d\\u064e\\u0642\\u0651\\u0650\\u0020\\u0644\\u0650\\u06cc\\u064f\\u0638\\u06e1\\u0647\\u0650<tajwid>\\u0631\\u064e</tajwid>\\u0647\\u064f\\u06e5\\u0020\\u0639\\u064e\\u0644\\u064e\\u0649\\u0020\\u0671\\u0644\\u062f\\u0651\\u0650\\u06cc\\u0646\\u0650\\u0020\\u0643\\u064f\\u0644\\u0651\\u0650\\u0647\\u0650\\u06e6\\u06da\\u0020\\u0648\\u064e\\u0643\\u064e\\u0641\\u064e\\u0649\\u0670\\u0020\\u0628\\u0650\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647\\u0650\\u0020\\u0634\\u064e\\u0647\\u0650\\u06cc\\u062f\\u08f0\\u0627\\n'),
(14, 'H013', 'Ro\' Tarqiq', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; tarqiq adalah ro&rsquo; yang dibaca tipis disebabkan adanya kondisi-kondisi tertentu seperti:&nbsp;</span></p>\r\n<ul>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"21\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"1\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Semua huruf ro&rsquo; yang berharokat kasroh.&nbsp;</span></li>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"21\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"2\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; mati yang berada setelah kasroh, muttasil dan sesudah ro&rsquo; bukan berupa huruf isti&rsquo;la.&nbsp;</span></li>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"21\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"3\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; mati yang berada sesudah ya&rsquo; mati.&nbsp;</span></li>\r\n<li data-leveltext=\"%1)\" data-font=\"Calibri\" data-listid=\"21\" data-list-defn-props=\"{&quot;335552541&quot;:0,&quot;335559684&quot;:-1,&quot;335559685&quot;:1800,&quot;335559991&quot;:360,&quot;469769242&quot;:[65533,4],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;%1)&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}\" aria-setsize=\"-1\" data-aria-posinset=\"4\" data-aria-level=\"1\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\">Ro&rsquo; mati disebabkan waqof yang berada setelah kasroh secara muttasil atau terpisah oleh huruf mati.&nbsp;</span></li>\r\n</ul>', '2023-06-06 18:02:45', '2023-08-05 15:54:21', 6, 101, 1, '\\u0628\\u0650\\u0633\\u06e1\\u0645\\u0650\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647\\u0650\\u0020\\u0671\\u0644\\u0631\\u0651\\u064e\\u062d\\u06e1\\u0645\\u064e\\u0640\\u0670\\u0646\\u0650\\u0020\\u0671\\u0644\\u0631\\u0651\\u064e\\u062d\\u0650\\u06cc\\u0645\\u0650\\u0020\\u0671\\u0644\\u06e1\\u0642\\u064e\\u0627<tajwid>\\u0631\\u0650</tajwid>\\u0639\\u064e\\u0629\\u064f\\n'),
(15, 'H014', 'Lam Tarqiq', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW185635498 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW185635498 BCX0\">Semua jenis lam selain lam yang terdapat pada </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW185635498 BCX0\">lafzhul</span><span class=\"NormalTextRun SCXW185635498 BCX0\"> Jalalah &ldquo;Allah&rdquo; yang berada setelah harakat </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW185635498 BCX0\">fat</span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW185635498 BCX0\">k</span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW185635498 BCX0\">hah</span><span class=\"NormalTextRun SCXW185635498 BCX0\"> atau </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW185635498 BCX0\">dhommah</span><span class=\"NormalTextRun SCXW185635498 BCX0\"> wajib dibaca </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW185635498 BCX0\">tarqiq atau tipis</span><span class=\"NormalTextRun SCXW185635498 BCX0\">.</span></span><span class=\"EOP SCXW185635498 BCX0\" data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335551550&quot;:6,&quot;335551620&quot;:6,&quot;335559685&quot;:1080,&quot;335559731&quot;:0,&quot;335559740&quot;:360}\">&nbsp;</span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:56:06', 7, 1, 1, '\\u0628\\u0650\\u0633\\u06e1\\u0645<tajwid>\\u0650\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647</tajwid>\\u0650\\u0020\\u0671\\u0644\\u0631\\u0651\\u064e\\u062d\\u06e1\\u0645\\u064e\\u0640\\u0670\\u0646\\u0650\\u0020\\u0671\\u0644\\u0631\\u0651\\u064e\\u062d\\u0650\\u06cc\\u0645\\u0650\\n'),
(16, 'H015', 'Lam Tafkhim', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"TextRun SCXW51904479 BCX0\" lang=\"ID-ID\" xml:lang=\"ID-ID\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW51904479 BCX0\">Lam harus dibaca </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW51904479 BCX0\">tafkhim</span><span class=\"NormalTextRun SCXW51904479 BCX0\"> atau tebal jika lam yang berada pada </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW51904479 BCX0\">lafzhul</span><span class=\"NormalTextRun SCXW51904479 BCX0\"> jalalah &ldquo;Allah&rdquo; didahului harakat </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW51904479 BCX0\">fatkhah</span><span class=\"NormalTextRun SCXW51904479 BCX0\"> atau </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW51904479 BCX0\">dhommah</span><span class=\"NormalTextRun SCXW51904479 BCX0\">.</span></span><span class=\"EOP SCXW51904479 BCX0\" data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335551550&quot;:6,&quot;335551620&quot;:6,&quot;335559685&quot;:1080,&quot;335559731&quot;:0,&quot;335559740&quot;:360}\">&nbsp;</span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:56:55', 7, 2, 7, '\\u062e\\u064e\\u062a\\u064e\\u0645<tajwid>\\u064e\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647</tajwid>\\u064f\\u0020\\u0639\\u064e\\u0644\\u064e\\u0649\\u0670\\u0020\\u0642\\u064f\\u0644\\u064f\\u0648\\u0628\\u0650\\u0647\\u0650\\u0645\\u06e1\\u0020\\u0648\\u064e\\u0639\\u064e\\u0644\\u064e\\u0649\\u0670\\u0020\\u0633\\u064e\\u0645\\u06e1\\u0639\\u0650\\u0647\\u0650\\u0645\\u06e1\\u06d6\\u0020\\u0648\\u064e\\u0639\\u064e\\u0644\\u064e\\u0649\\u0670\\u06e4\\u0020\\u0623\\u064e\\u0628\\u06e1\\u0635\\u064e\\u0640\\u0670\\u0631\\u0650\\u0647\\u0650\\u0645\\u06e1\\u0020\\u063a\\u0650\\u0634\\u064e\\u0640\\u0670\\u0648\\u064e\\u0629\\u08f1\\u06d6\\u0020\\u0648\\u064e\\u0644\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u0639\\u064e\\u0630\\u064e\\u0627\\u0628\\u064c\\u0020\\u0639\\u064e\\u0638\\u0650\\u06cc\\u0645\\u08f1\\n'),
(17, 'H016', 'Qolqolah Sughro', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"NormalTextRun SpellingErrorV2Themed SCXW92911188 BCX0\">Qolqolah</span> <span class=\"NormalTextRun SpellingErrorV2Themed SCXW92911188 BCX0\">sughro</span><span class=\"NormalTextRun SCXW92911188 BCX0\"> bisa terjadi apabila sala</span><span class=\"NormalTextRun SCXW92911188 BCX0\">h satu</span><span class=\"NormalTextRun SCXW92911188 BCX0\"> dari lima huruf </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW92911188 BCX0\">qolqolah ( <span class=\"TextRun SCXW262618462 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW262618462 BCX0\">ب ج د ط ق</span></span> )</span><span class=\"NormalTextRun SCXW92911188 BCX0\"> yang mati di tengah kalimat</span><span class=\"NormalTextRun SCXW92911188 BCX0\">.</span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:58:06', 8, 35, 27, '\\u0623\\u064e\\u0644\\u064e\\u0645\\u06e1\\u0020\\u062a\\u064e\\u0631\\u064e\\u0020\\u0623\\u064e\\u0646\\u0651\\u064e\\u0020\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647\\u064e\\u0020\\u0623\\u064e\\u0646\\u0632\\u064e\\u0644\\u064e\\u0020\\u0645\\u0650\\u0646\\u064e\\u0020\\u0671\\u0644\\u0633\\u0651\\u064e\\u0645\\u064e\\u0627\\u06e4\\u0621\\u0650\\u0020\\u0645\\u064e\\u0627\\u06e4\\u0621\\u08f0\\u0020\\u0641\\u064e\\u0623\\u064e\\u062e\\u06e1\\u0631\\u064e<tajwidSec>\\u062c\\u06e1</tajwidSec>\\u0646\\u064e\\u0627\\u0020\\u0628\\u0650\\u0647\\u0650\\u06e6\\u0020\\u062b\\u064e\\u0645\\u064e\\u0631\\u064e\\u200a\\u0670\\u2060\\u062a\\u08f2\\u0020\\u0645\\u0651\\u064f\\u062e\\u06e1\\u062a\\u064e\\u0644\\u0650\\u0641\\u064b\\u0627\\u0020\\u0623\\u064e\\u0644\\u06e1\\u0648\\u064e\\u200a\\u0670\\u2060\\u0646\\u064f\\u0647\\u064e\\u0627\\u06da\\u0020\\u0648\\u064e\\u0645\\u0650\\u0646\\u064e\\u0020\\u0671\\u0644\\u06e1\\u062c\\u0650\\u0628\\u064e\\u0627\\u0644\\u0650\\u0020\\u062c\\u064f\\u062f\\u064e\\u062f\\u064f\\u06e2\\u0020\\u0628\\u0650\\u06cc\\u0636\\u08f1\\u0020\\u0648\\u064e\\u062d\\u064f\\u0645\\u06e1\\u0631\\u08f1\\u0020\\u0645\\u0651\\u064f\\u062e\\u06e1\\u062a\\u064e\\u0644\\u0650\\u0641\\u064c\\u0020\\u0623\\u064e\\u0644\\u06e1\\u0648\\u064e\\u200a\\u0670\\u2060\\u0646\\u064f\\u0647\\u064e\\u0627\\u0020\\u0648\\u064e\\u063a\\u064e\\u0631\\u064e\\u0627\\u0628\\u0650\\u06cc\\u0628\\u064f\\u0020\\u0633\\u064f\\u0648\\u062f\\u08f1\\n'),
(18, 'H017', 'Qolqolah Qubro', '<p><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt;\"><span class=\"NormalTextRun SCXW92911188 BCX0\"><span class=\"NormalTextRun SpellingErrorV2Themed SCXW262162391 BCX0\">Qolqolah</span> <span class=\"NormalTextRun SpellingErrorV2Themed SCXW262162391 BCX0\">kubro</span><span class=\"NormalTextRun SCXW262162391 BCX0\"> bisa terjadi apabila salah satu dari lima huruf </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW262162391 BCX0\">qolqolah</span><span class=\"NormalTextRun SCXW262162391 BCX0\"> <span class=\"NormalTextRun SpellingErrorV2Themed SCXW92911188 BCX0\">( <span class=\"TextRun SCXW262618462 BCX0\" lang=\"AR-SA\" xml:lang=\"AR-SA\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW262618462 BCX0\">ب ج د ط ق</span></span> )</span> yang mati </span><span class=\"NormalTextRun SCXW262162391 BCX0\">karena </span><span class=\"NormalTextRun SpellingErrorV2Themed SCXW262162391 BCX0\">waqof.</span></span></span></p>', '2023-06-06 18:02:45', '2023-08-05 15:59:11', 8, 85, 10, '\\u0625\\u0650\\u0646\\u0651\\u064e\\u0020\\u0671\\u0644\\u0651\\u064e\\u0630\\u0650\\u06cc\\u0646\\u064e\\u0020\\u0641\\u064e\\u062a\\u064e\\u0646\\u064f\\u0648\\u0627\\u06df\\u0020\\u0671\\u0644\\u06e1\\u0645\\u064f\\u0624\\u06e1\\u0645\\u0650\\u0646\\u0650\\u06cc\\u0646\\u064e\\u0020\\u0648\\u064e\\u0671\\u0644\\u06e1\\u0645\\u064f\\u0624\\u06e1\\u0645\\u0650\\u0646\\u064e\\u0640\\u0670\\u062a\\u0650\\u0020\\u062b\\u064f\\u0645\\u0651\\u064e\\u0020\\u0644\\u064e\\u0645\\u06e1\\u0020\\u06cc\\u064e\\u062a\\u064f\\u0648\\u0628\\u064f\\u0648\\u0627\\u06df\\u0020\\u0641\\u064e\\u0644\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u0639\\u064e\\u0630\\u064e\\u0627\\u0628\\u064f\\u0020\\u062c\\u064e\\u0647\\u064e\\u0646\\u0651\\u064e\\u0645\\u064e\\u0020\\u0648\\u064e\\u0644\\u064e\\u0647\\u064f\\u0645\\u06e1\\u0020\\u0639\\u064e\\u0630\\u064e\\u0627\\u0628\\u064f\\u0020\\u0671\\u0644\\u06e1\\u062d\\u064e\\u0631\\u0650\\u06cc<tajwidSec>\\u0642\\u0650\\n</tajwidSec>');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_tajwid`
--

CREATE TABLE `tanda_tajwid` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tanda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unicode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanda_tajwid`
--

INSERT INTO `tanda_tajwid` (`id`, `kode`, `nama_tanda`, `unicode`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'T001', 'Hamzah Qot\'i (atas)', '\\u0623', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(2, 'T002', 'Hamzah Qot\'i (bawah)', '\\u0625', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(3, 'T003', 'Hamzah (Tengah Bawah)', '\\u0649\\u0655', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(4, 'T004', 'Hamzah (Atas Wawu)', '\\u0624', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(5, 'T005', 'Hamzah (Atas tengah lam alif)', '\\u0640\\u0654', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(6, 'T006', 'Hamzah Nabroh Ya\'', '\\u0626', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(7, 'T007', 'Hamzah', '\\u0621', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(8, 'T008', 'Alif', '\\u0627', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(9, 'T009', 'Ba\'', '\\u0628', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(10, 'T010', 'Ta\'', '\\u062a', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(11, 'T011', 'Tsa', '\\u062b', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(12, 'T012', 'Jim', '\\u062c', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(13, 'T013', 'Ha', '\\u062d', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(14, 'T014', 'Kho', '\\u062e', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(15, 'T015', 'Dal', '\\u062f', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(16, 'T016', 'Dzal', '\\u0630', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(17, 'T017', 'Ro\'', '\\u0631', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(18, 'T018', 'Za', '\\u0632', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(19, 'T019', 'Sin', '\\u0633', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(20, 'T020', 'Syin', '\\u0634', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(21, 'T021', 'Shod', '\\u0635', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(22, 'T022', 'Dhod', '\\u0636', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(23, 'T023', 'Tho\'', '\\u0637', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(24, 'T024', 'Zho\'', '\\u0638', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(25, 'T025', '\'Ain', '\\u0639', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(26, 'T026', 'Ghoin', '\\u063a', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(27, 'T027', 'Fa\'', '\\u0641', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(28, 'T028', 'Qof', '\\u0642', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(29, 'T029', 'Kaf', '\\u0643', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(30, 'T030', 'Lam', '\\u0644', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(31, 'T031', 'Mim', '\\u0645', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(32, 'T032', 'Nun', '\\u0646', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(33, 'T033', 'Wawu', '\\u0648', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(34, 'T034', 'Ha', '\\u0647', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(35, 'T035', 'Ya\'', '\\u064a', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(36, 'T036', 'Hamzah Washol', '\\u0671', 'huruf', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(37, 'T037', 'Fatkhah', '\\u064e', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:14:13'),
(38, 'T038', 'Kasroh', '\\u0650', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:14:24'),
(39, 'T039', 'Dhommah', '\\u064f', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:14:36'),
(40, 'T040', 'Fatkhatain', '\\u064b', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:14:45'),
(41, 'T041', 'Kasrotain', '\\u064d', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:14:54'),
(42, 'T042', 'Dhommatain', '\\u064c', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:15:04'),
(43, 'T043', 'Dhommatain 2', '\\u08f1', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:15:25'),
(44, 'T044', 'Sukun', '\\u06e1', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:15:38'),
(45, 'T045', 'Syiddah/ Tasydid', '\\u0651', 'tanda', '2023-06-05 13:30:16', '2023-06-11 15:15:15'),
(46, 'T046', 'Nun Mati', '\\u0646\\u06e1', 'huruf', '2023-06-05 13:30:16', '2023-06-08 03:53:44'),
(47, 'T047', 'Mim Kecil (Tanda iqlab)', '\\u06e2', 'tanda', '2023-06-05 13:30:16', '2023-06-05 13:30:16'),
(48, 'T048', 'Spasi', '\\u0020', 'tanda', '2023-06-05 13:30:16', '2023-06-09 14:06:09'),
(50, 'T049', 'Mim mati', '\\u0645\\u06e1', 'huruf', '2023-07-03 07:45:28', '2023-07-03 07:45:28'),
(51, 'T050', 'Alif Lam (dengan sukun)', '\\u0671\\u0644\\u06e1', 'huruf', '2023-07-03 09:08:52', '2023-07-03 09:08:52'),
(52, 'T051', 'Alif Lam (tanpa sukun)', '\\u0671\\u0644', 'huruf', '2023-07-03 09:10:56', '2023-07-03 09:10:56'),
(53, 'T052', 'Akhir Ayat', '\\n', 'tanda', '2023-07-03 10:46:14', '2023-07-03 10:46:47'),
(54, 'T053', 'Lafaz Allah', '\\u0671\\u0644\\u0644\\u0651\\u064e\\u0647', 'huruf', '2023-07-03 12:01:26', '2023-07-03 12:01:26'),
(55, 'T054', 'Fatkhatain 2', '\\u08f0', 'tanda', '2023-07-03 15:03:23', '2023-07-03 15:03:23'),
(56, 'T055', 'Kasrotain 2', '\\u08f2', 'tanda', '2023-07-03 15:13:54', '2023-07-03 15:13:54'),
(57, 'T056', 'Alif Layyinah', '\\u0649', 'huruf', '2023-07-10 14:40:54', '2023-07-10 14:40:54'),
(58, 'T057', 'Ya\' (tengah)', '\\u06cc', 'huruf', '2023-07-10 16:09:48', '2023-07-10 16:09:48'),
(59, 'T058', 'Mim kecil (tanda iqlab bawah)', '\\u06ed', 'tanda', '2023-07-11 07:40:20', '2023-07-11 07:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES
(1, 'admin', 'admin@user.com', NULL, '$2y$10$SMdq.fGnioycc06MrmyDLOpPJ2DljKPXZsdA07P8ta3mow0CWeJie', 'admin', 'dQLWu9pIjSU0ljXqsRTNpHGw1N9mrh9UFI87IZiU5KF7APw4VpZteDQNXj0x', '2023-06-04 18:19:27', '2023-07-25 15:16:28', 'L'),
(2, 'guest', 'guest@user.com', NULL, '$2y$10$6Eo0rMmyZxjcAFAOOmyn2.4nqonez0qKRSTZDSC8tVFQKSRVcXjd6', 'guest', 'EhGGpwy1P1p8ygA4hl5LXyHuJUE6IFdkCoS5VjAT1Tl7eLw9bvbwfUm6OSvq', '2023-06-04 18:19:27', '2023-07-25 15:19:07', 'L'),
(21, 'Khoirul Roziq', 'khoirulroziq75@gmail.com', '2023-06-17 16:24:23', '$2y$10$NeGioGxvPnUdZh9/ar6BC.6jDV1EGJDQ4eAdxvlm..2tTclRqAkXG', 'admin', 'ltF0CSt4W8c7bm67WWeQg6OQSB2ivTCpiVOn5D1DpdL73Pn9hd7wNFO0t0EL', '2023-06-17 16:24:06', '2023-07-25 14:50:45', 'L'),
(30, 'Layla', 'layla@gmail.com', NULL, '$2y$10$zJW.pEChoRpmGYe/EQhg0eFnmwVUEMwkyoeGiH80nbDdUpfjxqiei', 'guest', '4aF1sNtdbHNX7TofXn4MDQdEGWwUCRIfzOpdAkERL5dBEeYI5s3R50IKfIvo', '2023-08-06 01:40:34', '2023-08-06 01:40:34', 'P'),
(31, 'Lutfi', 'lutfi@gmail.com', NULL, '$2y$10$qhIAqom0518YgqY4G9TZle0B272bimtv1bSUXqUM/hIXrernkeVhC', 'guest', NULL, '2023-08-21 08:03:12', '2023-08-21 08:03:12', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pertanyaan`
--
ALTER TABLE `kategori_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan_tajwid`
--
ALTER TABLE `pertanyaan_tajwid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan_tanda_tajwid`
--
ALTER TABLE `pertanyaan_tanda_tajwid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_tajwid`
--
ALTER TABLE `rule_tajwid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_base_kode_unique` (`kode`),
  ADD UNIQUE KEY `role_base_role_unique` (`rule`),
  ADD UNIQUE KEY `role_base_second_role_unique` (`second_rule`);

--
-- Indexes for table `rule_tajwid_tanda_tajwid`
--
ALTER TABLE `rule_tajwid_tanda_tajwid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tajwid`
--
ALTER TABLE `tajwid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanda_tajwid`
--
ALTER TABLE `tanda_tajwid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_pertanyaan`
--
ALTER TABLE `kategori_pertanyaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pertanyaan_tajwid`
--
ALTER TABLE `pertanyaan_tajwid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pertanyaan_tanda_tajwid`
--
ALTER TABLE `pertanyaan_tanda_tajwid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `rule_tajwid`
--
ALTER TABLE `rule_tajwid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `rule_tajwid_tanda_tajwid`
--
ALTER TABLE `rule_tajwid_tanda_tajwid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=887;

--
-- AUTO_INCREMENT for table `tajwid`
--
ALTER TABLE `tajwid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tanda_tajwid`
--
ALTER TABLE `tanda_tajwid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
