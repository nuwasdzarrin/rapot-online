-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 06:33 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `nama`, `alamat`, `jenis_kelamin`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Agung', 'Surabaya', 'L', '123', '2019-09-21 15:30:20', '0000-00-00 00:00:00'),
(2, 24, 'Mukhammad Avif Firmansyah, S.Pd', 'Sidoarjo', 'L', '123', '2019-09-21 08:31:17', '2019-09-29 05:48:09'),
(3, 25, 'Ria Suciniranti,S.Pd', 'Sidoarjo', 'L', '123', '2019-09-22 04:17:46', '2019-09-29 05:48:21'),
(4, 45, 'admin', 'Surabaya', 'L', 'admin', '2019-10-08 22:59:01', '2019-10-09 05:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `aktif`
--

CREATE TABLE `aktif` (
  `id` int(11) NOT NULL,
  `semester` varchar(25) NOT NULL COMMENT 'ganjil genap',
  `periode` varchar(25) NOT NULL COMMENT '2019/2020',
  `status` int(2) NOT NULL DEFAULT 0 COMMENT 'On Off',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktif`
--

INSERT INTO `aktif` (`id`, `semester`, `periode`, `status`, `created_at`, `updated_at`) VALUES
(0, 'off', 'off', 0, '2019-10-15 23:54:19', '2019-10-23 08:57:21'),
(1, 'Ganjil', '2019/2020', 1, '2019-10-15 12:49:41', '2019-10-23 08:57:21'),
(2, 'Ganjil', '2018/2019', 0, '2019-10-15 12:49:41', '2019-10-18 17:37:35'),
(3, 'Genap', '2019/2020', 0, '2019-10-15 12:49:41', '2019-10-23 08:57:17'),
(4, 'Genap', '2018/2019', 0, '2019-10-15 12:49:41', '2019-10-17 18:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `tahun_angkatan` char(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id`, `nama`, `semester`, `tahun_angkatan`, `created_at`, `updated_at`) VALUES
(1, 'UKS', 'Ganjil', '2019/2020', '2019-07-24 19:26:15', '2019-10-20 06:22:12'),
(2, 'B.inggris', 'Gansal', '2018/2019', '2019-07-24 19:26:15', '0000-00-00 00:00:00'),
(3, 'Pramuka', 'Ganjil\r\n', '2019/2020', '2019-10-20 02:59:41', '0000-00-00 00:00:00'),
(4, 'Badminton', 'Ganjil', '2019/2020', '2019-10-19 23:09:55', '2019-10-20 06:09:55'),
(5, 'Menyanyi', 'Ganjil', '2019/2020', '2019-10-19 23:10:06', '2019-10-20 06:10:06'),
(7, 'uks', 'Genap', '2019/2020', '2019-10-20 00:23:15', '2019-10-20 07:23:15'),
(8, 'E Sport', 'Ganjil', '2019/2020', '2019-10-22 06:10:32', '2019-10-22 13:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_siswa`
--

CREATE TABLE `ekstra_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `aktif_id` int(2) DEFAULT NULL,
  `ekstra_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_siswa`
--

INSERT INTO `ekstra_siswa` (`id`, `siswa_id`, `aktif_id`, `ekstra_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'sdsa', '2019-07-24 19:33:37', '0000-00-00 00:00:00'),
(4, 11, 1, 1, 'Baik', '2019-07-25 01:46:39', '2019-07-25 08:46:39'),
(5, 11, 1, 2, 'jh', '2019-07-25 01:54:09', '2019-07-25 08:54:09'),
(9, 3, 1, 2, 'unlimited', '2019-10-18 18:00:56', '2019-10-19 01:00:56'),
(10, 8, 1, 1, 'uyit', '2019-10-20 00:23:43', '2019-10-20 07:23:43'),
(11, 8, 1, 7, 'ryy', '2019-10-20 00:25:46', '2019-10-20 07:25:46'),
(12, 3, 3, 1, 'ggg', '2019-10-20 00:41:13', '2019-10-20 07:41:13'),
(14, 3, 3, 2, 'jv', '2019-10-20 00:42:16', '2019-10-20 07:42:16'),
(15, 3, 3, 3, 'hb,b', '2019-10-20 00:43:53', '2019-10-20 07:43:53'),
(16, 21, 1, 1, 'j', '2019-10-23 20:14:47', '2019-10-24 03:14:47'),
(17, 12, 1, 1, 'iu', '2019-10-24 07:45:17', '2019-10-24 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_guru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif_guru` tinyint(1) NOT NULL,
  `avatar` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `user_id`, `nama_guru`, `nip_guru`, `email_guru`, `password_guru`, `alamat`, `jenis_kelamin_guru`, `no_tlp_guru`, `jabatan_guru`, `status_aktif_guru`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 27, 'Supeno, S.Pd', '196306621 198504 1 001', 'supeno@gmail.com', '123', 'Sidoarjo', 'L', '08529807612', 'Kepala Sekolah', 0, NULL, '2019-09-23 07:12:53', '2019-09-27 23:28:12'),
(4, 28, 'Dian Pregiwati, S.Pd', '19700701 200701 2 013', 'dian@gmail.com', '123', 'Pasuruan', 'P', '087654333588', 'Guru Pengajar', 0, NULL, '2019-09-23 07:14:07', '2019-09-27 23:29:16'),
(5, 29, 'Ida Mauludiyah, S.Pd', '19750310 201406 2 001', 'diah@gmail.com', '123', 'Pasuruan', 'P', '08765433788', 'Guru Kelas', 0, NULL, '2019-09-23 07:15:11', '2019-09-27 23:30:36'),
(7, 34, 'Widiarti Wahyuningsih, S.Pd', '19750325 200801 2 007', 'wahyu1@gmail.com', '123', 'Surabaya', 'P', '908438509', 'Guru Kelas', 0, NULL, '2019-09-24 04:17:40', '2019-09-27 23:32:09'),
(8, 36, 'Jumiati, S.Pd', '19621230 198303 2 020', 'jumiati@gmail.com', '123', 'Pasuruan', 'P', '087654234567', 'Guru Kelas', 0, NULL, '2019-09-27 23:33:32', '2019-09-27 23:33:32'),
(9, 37, 'Endang Sujiati, S.Pd', '19651016 198703 2 007', 'endang@gmail.com', '123', 'Pasuruan', 'P', '087567987654', 'Guru Kelas', 0, NULL, '2019-09-27 23:34:50', '2019-09-27 23:34:50'),
(10, 38, 'Bawon Sulasih, S.Pd', '19661209 200012 2 001', 'bawon@gmail.com', '123', 'Pasuruan', 'P', '083890876567', 'Guru Kelas', 0, NULL, '2019-09-27 23:36:12', '2019-09-27 23:36:12'),
(11, 39, 'Suciasri, S.Pd', '19710705 200012 2 002', 'suci@gmail.com', '123', 'Pasuruan', 'P', '089765467987', 'Guru Pengajar', 0, NULL, '2019-09-27 23:37:33', '2019-09-27 23:37:33'),
(12, 40, 'Siti Nawiyah, S.Pd', '991017011', 'nawiyah@gmail.com', '123', 'Pasuruan', 'P', '083833987567', 'Guru Pengajar', 0, NULL, '2019-09-27 23:39:58', '2019-09-27 23:39:58'),
(13, 42, 'Ris Suciniranti, S.Pd', '-', 'ria1@gmail.com', '123', 'Pasuruan', 'P', '086897567456', 'Guru Kelas', 0, NULL, '2019-09-27 23:41:42', '2019-09-27 23:41:42'),
(14, 43, 'Mukhammad Avif Firmansyah, S.Pd', '-', 'avif@gmail.com', '123', 'Sidoarjo', 'L', '085456789987', 'Guru Pengajar', 0, NULL, '2019-09-27 23:43:29', '2019-09-27 23:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_siswa`
--

CREATE TABLE `kehadiran_siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` enum('sakit','izin','alpa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kehadiran_siswa`
--

INSERT INTO `kehadiran_siswa` (`id`, `siswa_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(0, 3, 'alpa', '2019-09-25 08:29:07', '2019-09-25 08:29:07'),
(0, 11, 'alpa', '2019-09-25 09:14:56', '2019-09-25 09:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `kkms`
--

CREATE TABLE `kkms` (
  `id` int(10) UNSIGNED NOT NULL,
  `predA1` int(11) DEFAULT NULL,
  `predA2` int(11) DEFAULT NULL,
  `predB1` int(11) DEFAULT NULL,
  `predB2` int(11) DEFAULT NULL,
  `predC1` int(11) DEFAULT NULL,
  `predC2` int(11) DEFAULT NULL,
  `predD1` int(11) DEFAULT NULL,
  `predD2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kkms`
--

INSERT INTO `kkms` (`id`, `predA1`, `predA2`, `predB1`, `predB2`, `predC1`, `predC2`, `predD1`, `predD2`, `created_at`, `updated_at`) VALUES
(1, 100, 90, 90, 80, 80, 70, 70, 0, NULL, '2019-10-31 22:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `kd` varchar(12) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `tahun_angkatan` char(10) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `kd`, `semester`, `tahun_angkatan`, `id_semester`, `created_at`, `updated_at`) VALUES
(1, 'M-09', 'Matematika', 'KD 1', 'Ganjil', '2019/2020', 2, '2019-06-20 15:33:07', '0000-00-00 00:00:00'),
(2, 'B-08', 'Bahasa indonesia', 'KD 2', 'Ganjil', '2018/2019', 2, '2019-06-20 15:33:07', '0000-00-00 00:00:00'),
(3, 'B-003', 'Ilmu Pengetahuan Alam', 'KD 3', 'Ganjil', '2019/2020', 2, '2019-08-06 12:16:34', '0000-00-00 00:00:00'),
(4, 'B-004', 'Ilmu Penegtahuan Sosial', 'KD 4', 'Ganjil', '2019/2020', 2, '2019-08-06 12:16:34', '0000-00-00 00:00:00'),
(5, 'M-007', 'Pendidikan Pancasila dan Kewarganegaraan', 'KD 5', 'Ganjil', '2018/2019', 2, '2019-08-06 12:18:30', '0000-00-00 00:00:00'),
(6, 'B-009', 'Pendidikan Agama dan Budi Pekerti', 'KD 6', 'Ganjil', '2018/2019', 2, '2019-08-06 12:18:30', '0000-00-00 00:00:00'),
(7, 'M-006', 'Seni Budaya dan Prakarya', 'KD 7', 'Ganjil', '2018/2019', 2, '2019-08-06 12:20:00', '0000-00-00 00:00:00'),
(8, 'B-67', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'KD 8', 'Ganjil', '2018/2019', 2, '2019-08-06 12:20:00', '0000-00-00 00:00:00'),
(9, 'B-10', 'Matematika', 'KD 9', 'Genap', '2019/2020', 1, '2019-10-08 05:36:14', '2019-10-08 00:00:00'),
(10, 'A-10', 'Bahasa Indonesia', 'KD 10', 'Genap', '2019/2020', 1, '2019-10-08 05:36:54', '2019-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `aktif_id` int(255) DEFAULT NULL,
  `p_kd1` int(11) DEFAULT NULL,
  `p_kd2` int(11) DEFAULT NULL,
  `p_kd3` int(11) DEFAULT NULL,
  `p_kd4` int(11) DEFAULT NULL,
  `p_kd5` int(11) DEFAULT NULL,
  `p_kd6` int(11) DEFAULT NULL,
  `p_kd7` int(11) DEFAULT NULL,
  `p_kd8` int(11) DEFAULT NULL,
  `p_kd9` int(11) DEFAULT NULL,
  `p_kd10` int(11) DEFAULT NULL,
  `p_deskripsi` text DEFAULT NULL,
  `k_kd1` int(11) DEFAULT NULL,
  `k_kd2` int(11) DEFAULT NULL,
  `k_kd3` int(11) DEFAULT NULL,
  `k_kd4` int(11) DEFAULT NULL,
  `k_kd5` int(11) DEFAULT NULL,
  `k_kd6` int(11) DEFAULT NULL,
  `k_kd7` int(11) DEFAULT NULL,
  `k_kd8` int(11) DEFAULT NULL,
  `k_kd9` int(11) DEFAULT NULL,
  `k_kd10` int(11) DEFAULT NULL,
  `k_deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `aktif_id`, `p_kd1`, `p_kd2`, `p_kd3`, `p_kd4`, `p_kd5`, `p_kd6`, `p_kd7`, `p_kd8`, `p_kd9`, `p_kd10`, `p_deskripsi`, `k_kd1`, `k_kd2`, `k_kd3`, `k_kd4`, `k_kd5`, `k_kd6`, `k_kd7`, `k_kd8`, `k_kd9`, `k_kd10`, `k_deskripsi`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 1, 0, 70, 78, 78, 76, 0, 0, 0, 0, 0, 'ananda baikdasd', 0, 75, 76, 79, 90, 0, 0, 0, 0, 0, 'A', '2019-06-20 15:38:28', '2019-10-20 06:26:36'),
(3, 2, 1, 1, 86, 80, 7, 7, 7, 0, 0, 0, 0, 0, '7', NULL, 7, 7, 7, 7, 0, 0, 0, 0, 0, NULL, '2019-06-20 15:49:53', '2019-10-15 14:18:48'),
(46, 13, 1, 1, 90, 80, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, '2019-06-22 11:27:54', '2019-10-15 14:18:48'),
(47, 13, 1, 1, 90, 80, 78, NULL, NULL, 0, 0, 0, 0, 0, 'jksa', NULL, 78, 87, 76, NULL, 0, 0, 0, 0, 0, NULL, '2019-06-22 11:31:44', '2019-10-15 14:18:48'),
(48, 13, 1, 1, 89, 78, 79, NULL, NULL, 0, 0, 0, 0, 0, 'jsk', NULL, 90, 78, 76, NULL, 0, 0, 0, 0, 0, NULL, '2019-06-22 11:34:02', '2019-10-15 14:18:48'),
(49, 13, 1, 1, 89, 90, 98, 87, 78, 0, 0, 0, 0, 0, 'njk', NULL, 87, 78, 76, 67, 0, 0, 0, 0, 0, NULL, '2019-06-22 11:38:06', '2019-10-15 14:18:48'),
(50, 2, 2, 1, 70, 90, 89, 70, 76, 0, 0, 0, 0, 0, 'sangat bagus', NULL, 78, 78, 78, 8, 0, 0, 0, 0, 0, NULL, '2019-06-23 08:55:13', '2019-10-15 14:18:48'),
(52, 8, 1, 1, 60, 78, 67, 89, 98, 0, 0, 0, 0, 0, 'gfdsh', 80, 78, 87, 79, 80, 0, 0, 0, 0, 0, 'jhkds', '2019-07-04 01:00:29', '2019-10-15 14:18:48'),
(54, 11, 1, 1, 70, 78, 89, 76, 75, 0, 0, 0, 0, 0, 'sjdfskjl', NULL, 56, 89, 89, 78, 0, 0, 0, 0, 0, NULL, '2019-07-08 19:12:39', '2019-10-15 14:18:48'),
(56, 12, 1, 1, 70, 78, 78, 89, 88, 0, 0, 0, 0, 0, 'hjskaf', NULL, 67, 78, 79, 89, 0, 0, 0, 0, 0, NULL, '2019-07-08 19:13:38', '2019-10-15 14:18:48'),
(57, 12, 2, 1, 78, 87, 88, 86, 85, 0, 0, 0, 0, 0, 'dsg', NULL, 67, 78, 98, 87, 0, 0, 0, 0, 0, NULL, '2019-07-08 19:14:03', '2019-10-15 14:18:48'),
(58, 15, 1, 1, 68, 78, 76, 75, 67, 0, 0, 0, 0, 0, 'kgsa', NULL, 80, 87, 88, 87, 0, 0, 0, 0, 0, NULL, '2019-07-08 19:14:50', '2019-10-15 14:18:48'),
(59, 15, 2, 1, 56, 76, 86, 87, 84, 0, 0, 0, 0, 0, 'sdfnm', NULL, 82, 83, 84, 88, 0, 0, 0, 0, 0, NULL, '2019-07-08 19:15:18', '2019-10-15 14:18:48'),
(60, 16, 1, 1, 90, 80, 78, 78, 76, 0, 0, 0, 0, 0, 'jhdsl', 90, 67, 88, 77, 76, 0, 0, 0, 0, 0, 'lllllk', '2019-07-25 09:05:44', '2019-10-21 13:04:43'),
(61, 8, 2, 1, 80, 89, 70, 60, 67, 0, 0, 0, 0, 0, 'jkhhhh', 70, 67, 78, 67, 67, 0, 0, 0, 0, 0, 'djs', '2019-07-31 20:03:18', '2019-10-24 16:52:06'),
(62, 3, 7, 1, 88, 70, 67, 88, 98, 0, 0, 0, 0, 0, 'baik', NULL, 67, 88, 9, 98, 0, 0, 0, 0, 0, NULL, '2019-09-23 20:44:19', '2019-10-15 14:18:48'),
(63, 8, 3, 1, 88, 88, 87, 85, 77, 0, 0, 0, 0, 0, 'Ananda baik dalam memahami', 78, 70, 89, 76, 75, 0, 0, 0, 0, 0, 'dsj', '2019-09-25 07:08:16', '2019-10-24 16:52:28'),
(64, 8, 4, 1, 66, 70, 78, 0, 0, 0, 0, 0, 0, 0, 'jjjjkjn', 90, 60, 70, 76, 90, 0, 0, 0, 0, 0, 'hdk', '2019-09-25 07:10:13', '2019-10-24 01:45:56'),
(66, 3, 3, 1, 66, 87, 78, 99, 78, 77, 88, 76, 98, 78, 'kl', 67, 67, 89, 87, 89, 76, 78, 77, 77, 66, 'jk', '2019-10-10 19:02:53', '2019-10-15 14:18:48'),
(68, 3, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '2019-10-15 15:56:25', '2019-10-21 13:02:24'),
(70, 3, 4, 1, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, '80', 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, '80', '2019-10-16 02:56:07', '2019-10-16 09:56:07'),
(72, 3, 5, 4, 80, 78, 88, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'jksldsd', 90, 80, 99, 78, NULL, NULL, NULL, NULL, NULL, NULL, 'ewfbhjew', '2019-10-16 18:50:05', '2019-10-21 13:02:24'),
(74, 3, 5, 1, 70, 80, 77, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'jss', 77, 87, 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jldkm', '2019-10-20 00:54:43', '2019-10-21 13:02:24'),
(75, 3, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-20 00:55:29', '2019-10-20 07:55:29'),
(76, 3, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-20 00:56:25', '2019-10-20 07:56:25'),
(78, 20, 1, 1, NULL, NULL, NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-21 06:17:26', '2019-10-21 13:17:26'),
(79, 20, 5, 1, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-21 06:34:09', '2019-10-21 13:34:09'),
(80, 21, 1, 1, NULL, NULL, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-21 06:38:54', '2019-10-21 13:38:54'),
(82, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-10-23 03:53:16', '2019-10-23 10:53:16'),
(83, 22, 5, 1, 90, 0, 70, 0, 80, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-10-23 09:16:32', '2019-10-26 03:11:59'),
(84, 21, 3, 1, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-23 20:13:29', '2019-10-24 03:13:29'),
(86, 3, 6, 1, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-24 01:05:06', '2019-10-24 08:05:06'),
(87, 11, 5, 1, 80, 90, 100, 70, 0, 0, 0, 0, 65, 0, 'bdg', 0, 0, 80, 0, 0, 0, 0, 0, 0, 0, 'hg', '2019-10-24 09:49:52', '2019-11-01 04:06:08'),
(88, 25, 1, 1, 50, 50, 0, 0, 0, 0, 0, 0, 0, 0, 'Tingkatkan', 100, 20, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-10-30 18:46:38', '2019-10-31 01:46:38'),
(89, 11, 2, 1, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 'Bagus', 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 'Tingkatkan', '2019-10-31 23:10:25', '2019-11-01 06:10:25'),
(90, 11, 4, 1, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, '50', 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, '100', '2019-11-02 21:16:45', '2019-11-03 04:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_16_141136_create_siswas_table', 2),
(4, '2019_05_30_120134_create_gurus_table', 3),
(5, '2019_05_30_120359_create_gurus_table', 4),
(6, '2019_09_19_111911_create_kehadiran_siswa_table', 5),
(8, '2019_10_16_011144_create_kkms_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mulok`
--

CREATE TABLE `mulok` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mulok`
--

INSERT INTO `mulok` (`id`, `nama`, `semester`, `periode`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Jawa', 'Ganjil', '2019/2020', '2019-10-22 17:00:00', '2019-10-23 00:00:00'),
(2, 'Bahasa Jawa', 'Genap', '2019/2020', '2019-10-22 17:00:00', '2019-10-23 00:00:00'),
(3, 'Baca Tulis Alqur\'an', 'Ganjil', '2019/2020', '2019-10-22 17:00:00', '2019-10-23 00:00:00'),
(4, 'Baca Tulis Alqur\'an', 'Genap', '2019/2020', '2019-10-22 17:00:00', '2019-10-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mulok_siswa`
--

CREATE TABLE `mulok_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `aktif_id` int(2) DEFAULT NULL,
  `mulok_id` int(11) DEFAULT NULL,
  `p_kd1` int(11) DEFAULT NULL,
  `p_kd2` int(11) DEFAULT NULL,
  `p_kd3` int(11) DEFAULT NULL,
  `p_kd4` int(11) DEFAULT NULL,
  `p_deskripsi` text DEFAULT NULL,
  `k_kd1` int(11) DEFAULT NULL,
  `k_kd2` int(11) DEFAULT NULL,
  `k_kd3` int(11) DEFAULT NULL,
  `k_kd4` int(11) DEFAULT NULL,
  `k_kd5` int(11) DEFAULT NULL,
  `k_deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mulok_siswa`
--

INSERT INTO `mulok_siswa` (`id`, `siswa_id`, `aktif_id`, `mulok_id`, `p_kd1`, `p_kd2`, `p_kd3`, `p_kd4`, `p_deskripsi`, `k_kd1`, `k_kd2`, `k_kd3`, `k_kd4`, `k_kd5`, `k_deskripsi`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-23 00:25:46', '2019-10-23 07:25:46'),
(5, 0, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 08:13:32', '2019-10-23 15:13:32'),
(6, 3, 1, 3, 90, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 08:15:18', '2019-10-23 15:15:18'),
(8, 8, 1, 9, 0, 90, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 08:36:34', '2019-10-23 15:36:34'),
(9, 8, 1, 2, 0, 90, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 08:37:02', '2019-10-23 15:37:02'),
(10, 8, 1, 3, 90, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 08:47:56', '2019-10-23 15:47:56'),
(11, 8, 3, 1, 80, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 08:51:38', '2019-10-23 15:51:38'),
(12, 22, 1, 1, 90, 70, 88, 66, 'ghd', 78, 86, 84, 77, NULL, 'GHJV', '2019-10-23 11:00:44', '2019-10-23 18:00:44'),
(13, 21, 1, 1, 80, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, '2019-10-23 20:13:44', '2019-10-24 03:13:44'),
(14, 11, 1, 1, 100, 100, 100, 100, '100', 100, 100, 100, 100, NULL, '100', '2019-11-02 22:06:24', '2019-11-03 05:06:24');

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
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `periode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `semester`, `periode`) VALUES
(1, 'ganjil', '2019/2020'),
(2, 'genap', '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `saran_siswa`
--

CREATE TABLE `saran_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `aktif_id` int(2) DEFAULT NULL,
  `saran_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran_siswa`
--

INSERT INTO `saran_siswa` (`id`, `siswa_id`, `aktif_id`, `saran_id`, `deskripsi`) VALUES
(1, 3, 1, 1, 'Tingkatkan lagi'),
(2, 3, 2, 2, 'Ini fd'),
(3, 8, 1, 1, 'dasdas'),
(4, 8, 2, 2, ''),
(5, 16, 1, 1, ''),
(6, 16, 2, 2, ''),
(7, 11, 1, 1, 'lebih ditingkatkan'),
(8, 11, 2, 2, 'gd'),
(9, 2, 1, 1, ''),
(10, 2, 2, 2, ''),
(11, 12, 1, 1, ''),
(12, 12, 2, 2, ''),
(13, 15, 1, 1, 'tingkatkan lagi'),
(14, 15, 2, 2, 'belajar lebih giat'),
(15, 23, 1, 1, ''),
(16, 23, 2, 2, ''),
(17, 24, 1, 1, ''),
(18, 24, 2, 2, ''),
(67, 24, 1, 1, 'MANTUL GAN'),
(68, 24, 1, 1, 'testment'),
(69, 3, 1, 1, 'fjfcd'),
(84, 3, NULL, 1, ''),
(85, 3, NULL, 2, ''),
(86, 8, NULL, 1, ''),
(87, 8, NULL, 2, ''),
(88, 3, NULL, 1, ''),
(89, 3, NULL, 2, ''),
(90, 12, NULL, 1, ''),
(91, 12, NULL, 2, ''),
(92, 20, NULL, 1, ''),
(93, 20, NULL, 2, ''),
(94, 20, NULL, 1, ''),
(95, 20, NULL, 2, ''),
(96, 20, NULL, 1, ''),
(97, 20, NULL, 2, ''),
(98, 20, NULL, 1, ''),
(99, 20, NULL, 2, ''),
(100, 20, NULL, 1, ''),
(101, 20, NULL, 2, ''),
(102, 20, NULL, 1, ''),
(103, 20, NULL, 2, ''),
(104, 21, NULL, 1, ''),
(105, 21, NULL, 2, ''),
(106, 21, NULL, 1, ''),
(107, 21, NULL, 2, ''),
(108, 20, NULL, 1, ''),
(109, 20, NULL, 2, ''),
(110, 20, NULL, 1, ''),
(111, 20, NULL, 2, ''),
(112, 8, NULL, 1, ''),
(113, 8, NULL, 2, ''),
(114, 8, NULL, 1, ''),
(115, 8, NULL, 2, ''),
(116, 22, NULL, 1, ''),
(117, 22, NULL, 2, ''),
(118, 22, NULL, 1, ''),
(119, 22, NULL, 2, ''),
(120, 22, NULL, 1, ''),
(121, 22, NULL, 2, ''),
(122, 22, NULL, 1, ''),
(123, 22, NULL, 2, ''),
(124, 22, NULL, 1, ''),
(125, 22, NULL, 2, ''),
(126, 22, NULL, 1, ''),
(127, 22, NULL, 2, ''),
(128, 22, NULL, 1, ''),
(129, 22, NULL, 2, ''),
(130, 22, NULL, 1, ''),
(131, 22, NULL, 2, ''),
(132, 22, NULL, 1, ''),
(133, 22, NULL, 2, ''),
(134, 22, NULL, 1, ''),
(135, 22, NULL, 2, ''),
(136, 22, NULL, 1, ''),
(137, 22, NULL, 2, ''),
(138, 22, NULL, 1, ''),
(139, 22, NULL, 2, ''),
(140, 22, NULL, 1, ''),
(141, 22, NULL, 2, ''),
(142, 22, NULL, 1, ''),
(143, 22, NULL, 2, ''),
(144, 22, NULL, 1, ''),
(145, 22, NULL, 2, ''),
(146, 22, NULL, 1, ''),
(147, 22, NULL, 2, ''),
(148, 22, NULL, 1, ''),
(149, 22, NULL, 2, ''),
(150, 22, NULL, 1, ''),
(151, 22, NULL, 2, ''),
(152, 22, NULL, 1, ''),
(153, 22, NULL, 2, ''),
(154, 22, NULL, 1, ''),
(155, 22, NULL, 2, ''),
(156, 22, NULL, 1, ''),
(157, 22, NULL, 2, ''),
(158, 22, NULL, 1, ''),
(159, 22, NULL, 2, ''),
(160, 22, NULL, 1, ''),
(161, 22, NULL, 2, ''),
(162, 22, NULL, 1, ''),
(163, 22, NULL, 2, ''),
(164, 22, NULL, 1, ''),
(165, 22, NULL, 2, ''),
(166, 22, NULL, 1, ''),
(167, 22, NULL, 2, ''),
(168, 22, NULL, 1, ''),
(169, 22, NULL, 2, ''),
(170, 22, NULL, 1, ''),
(171, 22, NULL, 2, ''),
(172, 22, NULL, 1, ''),
(173, 22, NULL, 2, ''),
(174, 22, NULL, 1, ''),
(175, 22, NULL, 2, ''),
(176, 22, NULL, 1, ''),
(177, 22, NULL, 2, ''),
(178, 22, NULL, 1, ''),
(179, 22, NULL, 2, ''),
(180, 22, NULL, 1, ''),
(181, 22, NULL, 2, ''),
(182, 22, NULL, 1, ''),
(183, 22, NULL, 2, ''),
(184, 22, NULL, 1, ''),
(185, 22, NULL, 2, ''),
(186, 22, NULL, 1, ''),
(187, 22, NULL, 2, ''),
(188, 22, NULL, 1, ''),
(189, 22, NULL, 2, ''),
(190, 22, NULL, 1, ''),
(191, 22, NULL, 2, ''),
(192, 21, NULL, 1, ''),
(193, 21, NULL, 2, ''),
(194, 22, NULL, 1, ''),
(195, 22, NULL, 2, ''),
(196, 22, NULL, 1, ''),
(197, 22, NULL, 2, ''),
(198, 22, NULL, 1, ''),
(199, 22, NULL, 2, ''),
(200, 21, NULL, 1, ''),
(201, 21, NULL, 2, ''),
(202, 21, NULL, 1, ''),
(203, 21, NULL, 2, ''),
(204, 21, NULL, 1, ''),
(205, 21, NULL, 2, ''),
(206, 21, NULL, 1, ''),
(207, 21, NULL, 2, ''),
(208, 21, NULL, 1, ''),
(209, 21, NULL, 2, ''),
(210, 21, NULL, 1, ''),
(211, 21, NULL, 2, ''),
(212, 21, NULL, 1, ''),
(213, 21, NULL, 2, ''),
(214, 21, NULL, 1, ''),
(215, 21, NULL, 2, ''),
(216, 21, NULL, 1, ''),
(217, 21, NULL, 2, ''),
(218, 22, NULL, 1, ''),
(219, 22, NULL, 2, ''),
(220, 22, NULL, 1, ''),
(221, 22, NULL, 2, ''),
(222, 22, NULL, 1, ''),
(223, 22, NULL, 2, ''),
(224, 22, NULL, 1, ''),
(225, 22, NULL, 2, ''),
(226, 22, NULL, 1, ''),
(227, 22, NULL, 2, ''),
(228, 22, NULL, 1, ''),
(229, 22, NULL, 2, ''),
(230, 22, NULL, 1, ''),
(231, 22, NULL, 2, ''),
(232, 22, NULL, 1, ''),
(233, 22, NULL, 2, ''),
(234, 22, NULL, 1, ''),
(235, 22, NULL, 2, ''),
(236, 22, NULL, 1, ''),
(237, 22, NULL, 2, ''),
(238, 22, NULL, 1, ''),
(239, 22, NULL, 2, ''),
(240, 22, NULL, 1, ''),
(241, 22, NULL, 2, ''),
(242, 22, NULL, 1, ''),
(243, 22, NULL, 2, ''),
(244, 22, NULL, 1, ''),
(245, 22, NULL, 2, ''),
(246, 21, NULL, 1, ''),
(247, 21, NULL, 2, ''),
(248, 21, NULL, 1, ''),
(249, 21, NULL, 2, ''),
(250, 22, NULL, 1, ''),
(251, 22, NULL, 2, ''),
(252, 22, NULL, 1, ''),
(253, 22, NULL, 2, ''),
(254, 22, NULL, 1, ''),
(255, 22, NULL, 2, ''),
(256, 25, NULL, 1, ''),
(257, 25, NULL, 2, ''),
(258, 25, NULL, 1, ''),
(259, 25, NULL, 2, ''),
(260, 25, NULL, 1, ''),
(261, 25, NULL, 2, ''),
(262, 25, NULL, 1, ''),
(263, 25, NULL, 2, ''),
(264, 25, NULL, 1, ''),
(265, 25, NULL, 2, ''),
(266, 25, NULL, 1, ''),
(267, 25, NULL, 2, ''),
(268, 25, NULL, 1, ''),
(269, 25, NULL, 2, ''),
(270, 21, NULL, 1, ''),
(271, 21, NULL, 2, ''),
(272, 25, NULL, 1, ''),
(273, 25, NULL, 2, ''),
(274, 20, NULL, 1, ''),
(275, 20, NULL, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(1, 'Genap'),
(2, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `sikap`
--

CREATE TABLE `sikap` (
  `id` int(11) NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikap`
--

INSERT INTO `sikap` (`id`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Sikap Perilaku', 'Sangat Baik', '2019-10-23 16:31:35', '0000-00-00 00:00:00'),
(2, 'Sikap Sosial', 'Baik', '2019-10-23 16:31:35', '0000-00-00 00:00:00'),
(3, '', 'Perlu Bimbingan', '2019-10-23 17:00:00', '2019-10-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sikap_siswa`
--

CREATE TABLE `sikap_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `aktif_id` int(2) DEFAULT NULL,
  `sikap_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikap_siswa`
--

INSERT INTO `sikap_siswa` (`id`, `siswa_id`, `aktif_id`, `sikap_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 22, 1, 1, 'Baik dalam sikap ketaatan beribadah, berperilaku jujur,berdoa, toleransi agama di sekolah', '2019-10-23 10:53:57', '2019-10-23 17:53:57'),
(3, 22, 1, 2, 'Baik dalam sikap ketaatan beribadah, berperilaku jujur,berdoa, toleransi agama di sekolah', '2019-10-23 10:58:06', '2019-10-23 17:58:06'),
(4, 21, 1, 1, 'Baik dalam sikap ketaatan beribadah, berperilaku jujur,berdoa, toleransi agama di sekolah', '2019-10-23 20:14:36', '2019-10-24 03:14:36'),
(5, 12, 1, 2, 'tswe', '2019-10-24 09:45:37', '2019-10-24 16:45:37'),
(6, 12, 1, 1, 'ui', '2019-10-24 09:47:01', '2019-10-24 16:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_angkatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username_siswa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_siswa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_aktif_siswa` tinyint(4) DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `user_id`, `name`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `nis`, `agama`, `alamat`, `tahun_angkatan`, `username_siswa`, `password_siswa`, `status_aktif_siswa`, `profile`, `kelas_id`, `created_at`, `updated_at`) VALUES
(3, 0, 'Agung', 'L', 'Pasuruan', '1998-01-01', '1609820834', 'Islam', 'Jl.WOrtel No.45 - Pagak', '2018', 'agung', '123', NULL, 'DSC_7266 - Copy copy.png', 6, '2019-07-05 02:07:59', '2019-05-25 08:06:13'),
(8, 0, 'Alin p', 'P', 'Surabaya', '2000-08-12', '123456', 'Islam', 'Surabya', '2018', 'alin', '123', NULL, 'DSC_7266 - Copy.jpg', 4, '2019-09-28 06:19:19', '2019-09-27 23:19:19'),
(11, 0, 'Wahyu', 'L', 'Pasuruan', '1998-09-08', '1234567', 'Islam', 'Surabya', '2019', 'wahyu', '123', NULL, NULL, 1, '2019-07-05 02:08:12', '2019-05-29 05:50:29'),
(12, 5, 'santoso', 'L', 'Pasuruan', '1998-09-08', '1243687608', 'Islam', 'Surabaya', '2017', 'santoso', '123', NULL, NULL, 6, '2019-07-06 07:33:59', '2019-06-01 07:48:19'),
(15, 12, 'Billy', 'L', 'Pasuruan', '1997-07-17', '35425', 'Islam', 'surabaya', '2016', 'billy', '123', NULL, 'DSC_7266 - Copy copy.png', 2, '2019-07-06 07:34:05', '2019-06-21 09:20:03'),
(16, 20, 'Ade Irma Kusuma Wardani', 'P', 'Pasuruan', '1997-07-17', '9803204-32', 'Islam', 'Surabaya', '2017', 'ade', '123', NULL, NULL, 3, '2019-07-21 09:50:58', '2019-07-21 09:50:58'),
(20, 26, 'Rama', 'L', 'Surabaya', '2002-11-11', '314568', 'Islam', 'Surabaya', '2019', '', '123', NULL, NULL, 1, '2019-09-23 07:05:59', '2019-09-23 07:05:59'),
(21, 30, 'Nabil', 'L', 'Pasuruan', '2009-10-13', '123545687', 'Islam', 'Pasuruan', '2018', 'nabil', '123', NULL, NULL, 5, '2019-09-23 09:26:40', '2019-09-23 09:26:40'),
(22, 31, 'vivi', 'P', 'Pasuruan', '2005-12-08', '1235667889', 'Islam', 'Pasuruan', '2016', 'vivi1', '123', NULL, NULL, 1, '2019-09-23 09:39:25', '2019-09-23 09:39:25'),
(23, 35, 'Susanti p', 'L', 'Surabaya', '2007-12-05', '191919', 'Islam', 'Surabaya', '2018', 'susanti', '123', NULL, NULL, 1, '2019-09-28 16:30:44', '2019-09-28 09:30:44'),
(24, 44, 'Ahmad Raisa Yakutun Nafis', 'L', 'Pasuruan', '2019-09-11', '2465', 'Islam', 'saf', '45', NULL, '123', NULL, NULL, 1, '2019-09-28 10:14:43', '2019-09-28 10:14:43'),
(25, 47, 'Rizky Bagus', 'L', 'Jepara', '2019-01-31', '00000000', 'Islam', 'Jepara Kota', '2019', NULL, '12345678', NULL, '580b585b2edbce24c47b2abd.png', 1, '2019-10-31 01:40:33', '2019-10-30 18:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `nip`, `nis`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Agung', 'agung', '', '', 'agung@gmail.com', '$2y$10$JYRJ21pUJzDm3PI2tmq.LeALGunvhtuYsqg2rcEhF/TJBe5lV6R4u', 'PitSqAlvGHiJBijB1f8PE8EUWdEskhLL46etKHeH2pfDB1FiDlnvc1Caz9Ve', '2019-05-23 07:47:24', '2019-09-22 04:07:54'),
(3, 'siswa', 'ade irma', 'ade', '', '', 'ade@gmail.com', '$2y$10$5LP4EJMNLERfrnOkfNkKcu0VO0SkqG3U60dSjRx.Jp1j5rE4OCYHO', 'F9uKj9VJgiwRok1FuIsq2qkTg7OhnpKX6GamMIHeyVVmx4KW3cHaQNsKRvav', '2019-05-29 21:24:32', '2019-05-29 21:24:32'),
(5, 'siswa', 'santoso', 'santoso', '', '', 'santoso@gmail.com', '$2y$10$hYSzU9eFpOKB4Ua9w2Z57uEUUNVT9PqreYdlgqfUhUsg.GlbNtTNe', 'EJM4e5IngOUENG4RNmiy2FSBd9nSluZvL8eZmvIzbJsBlY3RcAqAAaHdZSjz', '2019-05-29 21:28:03', '2019-09-22 04:08:58'),
(9, 'guru', 'Agung Wahyu', 'wahyu', '', '', 'wahyu@gmail.com', '$2y$10$vwyhN.tYUNgJ5P4TkWZqj.EOOrIrM30DGwt3zCFmNEkAmLHzPdQra', 'JrTQYkgYNgDvdtvXC3dDA5lwG7dtpHJsw9VehlrKFx253cuvZDzsPViDR53p', '2019-06-14 07:39:57', '2019-06-14 07:39:57'),
(10, 'siswa', 'ade irma k', 'irma', '', '', 'as@gmail.com', '$2y$10$f1REOSqDbgnlNhJTj0/hh./Kn9KbP49lbXbElms4LoPRRRS7ZmK/m', 'gA8jdRzsljqk3xp7xoGPhDMtTMuYV71kocghzdpDmjB1o04s0UP0V9xPpfM9', '2019-06-20 21:15:57', '2019-06-20 21:15:57'),
(12, 'siswa', 'Billy', 'billy', '', '', 'billy12@gmail.com', '$2y$10$fYlQpmoXFD2p5luOBvqC.u0Fg.DDT6m03CAYgYPDRKay2yw5Z2IU2', 'xGyBF0EXeYWLoqzrrIKABPEI9nxElF78BzmYJimiVWvPWyxnVfcbgKPMIL9r', '2019-06-21 09:20:03', '2019-06-21 09:20:03'),
(13, 'siswa', 'ade irma k', '123', '', '', 'kusuma@gmail.com', '$2y$10$Wi53p8U2zbwFWbcY/NlQrOaBmd1FaDcrWueUXiOE6DjDWbyecTfw.', 'dgIjmN1cf2bdKQmFAxPnvMo7seJCjYEegRYCwCNCdHTbZ4Hh51FHMs4kkOEn', '2019-07-01 01:16:06', '2019-07-01 01:16:06'),
(20, 'siswa', 'Ade Irma Kusuma Wardani', '123', '', '', 'ade01@gmail.com', '$2y$10$zgL1od0FjnEpV03cdLxOi.vq3dLiytZYe30p7LLzyWnSAfH.0vU/m', 'IJsILjnBb39JkeqZ1NjReobBrafWcxmHE3Voks3GBD4DVFcj4je3p21qVPCP', '2019-07-21 09:50:58', '2019-07-21 09:50:58'),
(21, 'siswa', 'test', '', '', '', 'tmail9424@gmail.com', '$2y$10$hMBSiIab6W/FYu43kvPhTO3GJwUym2wcQbX3JZc4Ewqvgd6aC31W.', 'f32Bhk0IzmLnZqMJAtqb4Esu0SSGftHiuH3WOUVZ4uhjz6nVYxdSLvmd1U0z', '2019-09-01 07:44:51', '2019-09-01 07:44:51'),
(22, 'siswa', 'test', '', '', '', 'sdasd@gmail.com', '$2y$10$iw2uDrGr6DCNwcOMk6y7cOOPDS5.gW5EbntZZN71SdXFxctaAXyiC', 'riSFnrOwLim3QLO5uFwWMC0Y31mNTRgtYztmlLfPI2L0glI2ALJOQmbHl2PP', '2019-09-01 07:48:13', '2019-09-01 07:48:13'),
(23, 'siswa', 'test', '', '', '', 'aaaaaa@gmail.com', '$2y$10$T9IITS/gbspObY870GZM0eWEL9HuzhqMcmmzNssUoO/hDWNKMATHm', 'pdyb1Glgz1kP0kJcshQj74wqbd3eH9MTMBNpsTwFIZq9ZPG2jXnab4E7F0Kd', '2019-09-01 07:51:09', '2019-09-01 07:51:09'),
(24, 'admin', 'Mukhammad Avif Firmansyah, S.Pd', 'afif', '', '', 'afif1@gmail.com', '$2y$10$YldMKV8LPYm6JirTckj6fe/XVAjVLUjrs5C/3BsTxqxjhMt4WbGS.', 'SQbTS6gesV3Ku44ImeiSmLMsw4lQDjm3D23fVnQMherFM0jFnYfPzJ6E9oLV', '2019-09-21 08:31:17', '2019-09-21 08:31:46'),
(25, 'admin', 'Ris Suciniranti, S.Pd', 'ria', '', '', 'ria@gmail.com', '$2y$10$8ULnB7iYphn6joVIXRb0su3d5b2onxyE.jBJpM0vObmC1lLJzKcxG', '9YyLh8xCy4AIf7MfKZx1w0gz01fQTSYhTdrPgpHfnrMmqCLqWQDJzfI9RAlu', '2019-09-22 04:17:46', '2019-09-22 04:17:46'),
(26, 'siswa', 'Rama', 'rama', '', '', 'rama@gmail.com', '$2y$10$lBQN/3VfeKu8s2DyJZWRKuX4VbhFSap6X0T1HPjpI3CSFmywWbmba', 'zJrIwhlNy06YRU32z1QjSoob0KsfO9kGBiXLBrkW77HGwTaJO9Wc3h3RQFv1', '2019-09-23 07:05:59', '2019-09-23 07:05:59'),
(27, 'guru', 'Supeno, S.Pd', '', '196306621 198504 1 001', '', 'supeno@gmail.com', '$2y$10$/W1s2aouPwTbuGl6JsLzK.QHfrGvYrQFk0ilKPBtGwViJL4xufVLq', 'zPvREQUMZYiEQRIvXXvp2rhCcCOALs7dfgzprJnSUAB1SWJdut6QOMDG6Gp1', '2019-09-23 07:12:53', '2019-09-23 07:12:53'),
(28, 'guru', 'Dian Pregiwati, S.Pd', 'dian', '19700701 200701 2 013', '', 'dian@gmail.com', '$2y$10$HVlPGB9rWyKlL.JmgOas5e9I6fvxXYbh25zUvNnRzMzPlOr1kA2ie', 'rDDmh5XQ9akv4Wf9dZnnCbvxOmULTgEAJ2XK4J8lsCTtxxAxGZuSWjXnIdVs', '2019-09-23 07:14:07', '2019-09-23 07:14:07'),
(29, 'guru', 'Ida Mauludiyah, S.Pd', 'diah', '19750310 201406 2 001', '', 'diah@gmail.com', '$2y$10$CiiVQeeiNugZ07Y9mohWV.CCn1ADsnkO14n5KgY7gEgtJvxDCRzfy', 'M86F5QEbx1lboVDxbRrYRwx9rUxppSFjt393MDfL43toEM8USO42cZqns8B3', '2019-09-23 07:15:10', '2019-09-23 07:15:10'),
(30, 'siswa', 'Nabil', 'nabil', '', '', 'nabil@gmail.com', '$2y$10$Al1s8JgaiWAqjKstO6rx0O0WPzeBqMKNXfolMYDrvJ/TR7hb58KGC', 'XzhxWnvkM2eQ5k5ITTygofOpEJluaPa6pt5eFBTqGNiRmYlZqJKxdiF7IJ74', '2019-09-23 09:26:40', '2019-09-23 09:26:40'),
(31, 'siswa', 'vivi', 'vivi1', '', '', 'vivi@gmail.com', '$2y$10$BQqxpdIBlrNnd.yM2xbPqO0SekZgmCcqA2bzkyCN9KPwq.anZXjgG', 'c2MVkYR7PseY2xDEJa8bZIB1xfBvejLHgd9f7iPSBTbnV2B6OBxGoyqxTwyG', '2019-09-23 09:39:25', '2019-09-23 09:39:25'),
(34, 'guru', 'Widiarti Wahyuningsih, S.Pd', '', '19750325 200801 2 007', '', 'wahyu1@gmail.com', '$2y$10$0ubtUZQk4R2IpczIwCKHueyj0E23y64g1hio4o2n4.c2KCvzVxBNq', 'hdd8dXvNKAq8FlRs0CzuzOqmLhZxN1L8cpcvT6h1Z7FeR1c5BA0xJbDZ6qrO', '2019-09-24 04:17:40', '2019-09-24 04:17:40'),
(35, 'siswa', 'Susanti', 'susanti', '', '191919', 'susanti@gmail.com', '$2y$10$rXLaoL7kffK9zzs8RZavyuM8TiR7zSFkq1oQRIpenbrjA58prrXV.', '3lXUPd39DEcBrwb1lCSe2hguyonxkCsqnKVoXUD84rEIY12Bvod1drJm3kCE', '2019-09-24 04:21:36', '2019-09-24 04:21:36'),
(36, 'guru', 'Jumiati, S.Pd', '', '19621230 198303 2 020', '', 'jumiati@gmail.com', '$2y$10$33fnNora3FkPUsesQY52kOTjGbGxujpJO4I4C78nU.GBqQXy2fmWq', '6BXvPtK5CQ7Gi1S2T5AJJ1pbihki3ruyuoBtL2llmkFmw25q6drvDsYt9VaK', '2019-09-27 23:33:32', '2019-09-27 23:33:32'),
(37, 'guru', 'Endang Sujiati, S.Pd', '', '19651016 198703 2 007', '', 'endang@gmail.com', '$2y$10$5/QDICwF18yw8vMOkjx4qOBUDY/m5CWOM1ArNJjbAA2pIAVPPHlOe', '7C7WATXMyHmNEn1mZoRwTtL84BSWR8d6zlMzZJwTIaA80UuNKcmviK0zWTcO', '2019-09-27 23:34:50', '2019-09-27 23:34:50'),
(38, 'guru', 'Bawon Sulasih, S.Pd', '', '19661209 200012 2 001', '', 'bawon@gmail.com', '$2y$10$RNZwD0/Zfq4KIRKFK3eEOuf1Uah2N.GdgN5fNoWqDNu3lg663t.WC', 'YQ0uMzMw5Hmqek1ZOb6Am7X2SxrvdXugbDMYMuzzEa9vye9pqdk6Flt7YmKl', '2019-09-27 23:36:12', '2019-09-27 23:36:12'),
(39, 'guru', 'Suciasri, S.Pd', '', '19710705 200012 2 002', '', 'suci@gmail.com', '$2y$10$3ia9zSzmoL5qGX5y0trtDOERjDoUmdkXpNhJJcQxt5/psAThebuKy', '4wLtbhOPSWG9UjKQLX7JpnxyXxgVe2zTwSjAuoRF556Wo0lnNoCtenVyFGYy', '2019-09-27 23:37:33', '2019-09-27 23:37:33'),
(40, 'guru', 'Siti Nawiyah, S.Pd', '', '991017011', '', 'nawiyah@gmail.com', '$2y$10$2e937.L0diL49Ta7W8GTa.vp86I4FOvjJ.YVS2A8RmSZiTiu3OOom', 'rNZn1sK2DP1Mlyaz25ZkaV2kMaxpeQ0PNl5tSX7a9ZqVl9jWz4VXUkAIqvVN', '2019-09-27 23:39:58', '2019-09-27 23:39:58'),
(42, 'guru', 'Ris Suciniranti, S.Pd', '', '-', '', 'ria1@gmail.com', '$2y$10$rGaiHB9/IgzEFqklGkOytO.m/WCYhDFqxbHQ8Qq0CgOLcpL5mjFKq', 'TgGKmWSB5lzzAnUXhBgn5YR9j8RL6QQ5aDg4kJzNP8KcwxWoiyKouwDvApXS', '2019-09-27 23:41:41', '2019-09-27 23:41:41'),
(43, 'guru', 'Mukhammad Avif Firmansyah, S.Pd', '', '-', '', 'avif@gmail.com', '$2y$10$AYT9zGOOLcV8whWHO8xlwOMEcyiu6sC5uMg46Th1kV9MteYnSIYOa', 'ydl4yRtvkvGK0T68khAYs8fvGMLQT18XOtDwN44tnVoQp1fJnChXcKZCsePj', '2019-09-27 23:43:29', '2019-09-27 23:43:29'),
(44, 'siswa', 'Ahmad Raisa Yakutun Nafis', NULL, NULL, '2465', NULL, '$2y$10$KRKOlefh75pQovArh8XE2OQTPv0E4r7.XySVKllG19CgR..LO162a', '5lncdoWtEm6b3nXUC616bemXbJFCZVokKBB8kVrhuGskJjXJ0xrWrMxy1qsd', '2019-09-28 10:14:43', '2019-09-28 10:14:43'),
(45, 'admin', 'admin', 'admin', NULL, NULL, NULL, '$2y$10$WLuF5g0YW.CnIABI.RxSsOYAftTkExsfnVi6pRG2j/L2nZLRwAeh2', '82SrBI1QGWONk0vOV1Q196aFsxeLBnQ8won2ND0QQyoTubKVlSXZI6aFNtXr', '2019-10-08 22:59:00', '2019-10-08 22:59:00'),
(46, 'admin', 'Teguh Rijanandi', 'teguh02', NULL, NULL, 'teguh@sholat.xyz', '$2y$10$A4tHlY.BXcmePpsgXUeQ2ev8K.PrQ7f6y1BHq4gwvvJIbUfP1h7C.', 'NO2jlxhTwDIqIECLp8oE1UQQjIJ7PhtSgt8mLTTsSKix6NdEG8Y8giFvo64v', NULL, NULL),
(47, 'siswa', 'Rizky Bagus', NULL, NULL, '00000000', NULL, '$2y$10$lWEhZHehZOnNvX31kJVnN.62ssiWRaz73hlsjup6clI4s4wg2bIFe', '3IXikTZXxnrJ0dWGlYjAgkePDGzVUHhBniV7p7JLHu0uYlHvIQByAPd8WgBy', '2019-10-30 18:40:33', '2019-10-30 18:40:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktif`
--
ALTER TABLE `aktif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstra_siswa`
--
ALTER TABLE `ekstra_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkms`
--
ALTER TABLE `kkms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulok`
--
ALTER TABLE `mulok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulok_siswa`
--
ALTER TABLE `mulok_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `saran_siswa`
--
ALTER TABLE `saran_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `sikap`
--
ALTER TABLE `sikap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sikap_siswa`
--
ALTER TABLE `sikap_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aktif`
--
ALTER TABLE `aktif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ekstra_siswa`
--
ALTER TABLE `ekstra_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kkms`
--
ALTER TABLE `kkms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mulok`
--
ALTER TABLE `mulok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mulok_siswa`
--
ALTER TABLE `mulok_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `saran_siswa`
--
ALTER TABLE `saran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sikap`
--
ALTER TABLE `sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sikap_siswa`
--
ALTER TABLE `sikap_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
