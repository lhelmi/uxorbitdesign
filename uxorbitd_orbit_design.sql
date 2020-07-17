-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2020 at 01:52 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uxorbitd_orbit_design`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank_account`
--

CREATE TABLE `tb_bank_account` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` enum('bni','bca','bri','mandiri') NOT NULL,
  `account_number` int(11) NOT NULL,
  `receiver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bank_account`
--

INSERT INTO `tb_bank_account` (`id`, `id_user`, `type`, `account_number`, `receiver`) VALUES
(1, 5, 'bca', 10000001, 'aryx'),
(3, 5, 'mandiri', 10000002, 'antonx'),
(21, 1, 'bni', 455667931, 'Dalih Rusmana'),
(22, 11, 'bca', 2147483647, 'Opank Juan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobs`
--

CREATE TABLE `tb_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `payload` text DEFAULT NULL COMMENT 'JSON payload',
  `response` text DEFAULT NULL,
  `status` enum('running','queued','done') NOT NULL DEFAULT 'queued',
  `run_time` double DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_jobs`
--

INSERT INTO `tb_jobs` (`id`, `name`, `payload`, `response`, `status`, `run_time`, `created`) VALUES
(1, 'sendEmail', '{\"to\":\"programmer.irfaan@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/b69b245dd7a7166b1c9d52fffb00cfc2\'>http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/b69b245dd7a7166b1c9d52fffb00cfc2<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-05-03 20:01:58'),
(2, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-11 10:44:19'),
(3, 'sendEmail', '{\"to\":\"arysugiarto10@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/97792ed18f466a5ce5fbdd5f9160051f\'>http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/97792ed18f466a5ce5fbdd5f9160051f<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-11 10:54:36'),
(4, 'sendEmail', '{\"to\":\"yollanthef@yahoo.co.id\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/0e67bc55d734b2f0777b893cbb193bf0\'>http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/0e67bc55d734b2f0777b893cbb193bf0<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-11 11:23:49'),
(5, 'sendEmail', '{\"to\":\"uxorbitdesign@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/cc3e5ddf78df5e5d9889418eccf77af6\'>http:\\/\\/localhost\\/kurteyki\\/auth\\/confirm\\/cc3e5ddf78df5e5d9889418eccf77af6<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-18 07:21:33'),
(6, 'sendEmail', '{\"to\":\"jmbtpnk@jmbtpnk.jmbtpnk\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/280edc783dad82b46e4c8123570aa177\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/280edc783dad82b46e4c8123570aa177<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:16:37'),
(7, 'sendEmail', '{\"to\":\"asdasdas@asdas.asdas\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/1e569dba8f07c709124287dd8f4b888c\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/1e569dba8f07c709124287dd8f4b888c<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:30:30'),
(8, 'sendEmail', '{\"to\":\"asdasdasdas@asdasdasdas.asdasdasdas\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/d4ebbae9fbe93a591a3cdf6c41606c5f\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/d4ebbae9fbe93a591a3cdf6c41606c5f<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:31:43'),
(9, 'sendEmail', '{\"to\":\"asdasdasdas@asdasdasdas.asdasdasdas\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/d4ebbae9fbe93a591a3cdf6c41606c5f\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/d4ebbae9fbe93a591a3cdf6c41606c5f<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:33:18'),
(10, 'sendEmail', '{\"to\":\"jk@jk.jk\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/30a2a7e9ea2b8d2979549c8ad72dc335\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/30a2a7e9ea2b8d2979549c8ad72dc335<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:34:11'),
(11, 'sendEmail', '{\"to\":\"1231231231230@1231231231230.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/6ec9132af9729dca8fe231c01f8f015b\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/6ec9132af9729dca8fe231c01f8f015b<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:34:55'),
(12, 'sendEmail', '{\"to\":\"1231231231230@1231231231230.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\n            <br\\/><br\\/>\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\n            <br\\/><br\\/>\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/6ec9132af9729dca8fe231c01f8f015b\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/6ec9132af9729dca8fe231c01f8f015b<\\/a>\\n            <br\\/><br\\/>\\n            \"}', NULL, 'queued', NULL, '2020-06-29 01:37:22'),
(13, 'sendEmail', '{\"to\":\"opang@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/1fe14386928fbd961a3f0250338263c0\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/1fe14386928fbd961a3f0250338263c0<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-15 11:42:09'),
(14, 'sendEmail', '{\"to\":\"juandapesek@juandapesek.cop\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/0098a5ba8b52030ecbc120f43d01799a\'>http:\\/\\/localhost\\/Orbit-Courses\\/auth\\/confirm\\/0098a5ba8b52030ecbc120f43d01799a<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-15 22:45:45'),
(15, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 14:02:01'),
(16, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 14:30:05'),
(17, 'sendEmail', '{\"to\":\"arysugiarto10@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/97792ed18f466a5ce5fbdd5f9160051f\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/97792ed18f466a5ce5fbdd5f9160051f<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 14:32:31'),
(18, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 14:50:39'),
(19, 'sendEmail', '{\"to\":\"dalihrusmana@mahasiswa.unikom.ac.id\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5e0397664bce3febdd74d16da2060fc3\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5e0397664bce3febdd74d16da2060fc3<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 14:52:13'),
(20, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 17:37:24'),
(21, 'sendEmail', '{\"to\":\"wowwow@wow.wow\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5dc725dd13f134145b9f5eb810cdf6f4\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5dc725dd13f134145b9f5eb810cdf6f4<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 17:39:06'),
(22, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 17:41:30'),
(23, 'sendEmail', '{\"to\":\"perpopoop@perpopoop.perpopoop\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5b65149133bdee2007960ef4091f691e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5b65149133bdee2007960ef4091f691e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 17:49:15'),
(24, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 17:56:41'),
(25, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:07:15'),
(26, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:20:15'),
(27, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:21:01'),
(28, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:22:57'),
(29, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:24:20'),
(30, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:34:23'),
(31, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:49:41'),
(32, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:50:42'),
(33, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:56:33'),
(34, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 18:58:47'),
(35, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 19:03:11'),
(36, 'sendEmail', '{\"to\":\"jsksks@sksks.kskssm\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/2a549506873e0c9dd73581fb9794efb2\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/2a549506873e0c9dd73581fb9794efb2<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 19:04:26'),
(37, 'sendEmail', '{\"to\":\"gimmihel@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/d310ebd76db2204b81628cc12f6490a8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/d310ebd76db2204b81628cc12f6490a8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 21:52:43'),
(38, 'sendEmail', '{\"to\":\"lazer.helmi@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/0c70d8a372d157a5e741526e2078d66e<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 21:55:14'),
(39, 'sendEmail', '{\"to\":\"dalihrusmana@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/5140bf72bca99fca90d6264b112a6bc8<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-16 21:58:03'),
(40, 'sendEmail', '{\"to\":\"arysugiarto10@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/97792ed18f466a5ce5fbdd5f9160051f\'>https:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/97792ed18f466a5ce5fbdd5f9160051f<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-17 15:21:35'),
(41, 'sendEmail', '{\"to\":\"opangs82@gmail.com\",\"subject\":\"Vertifikasi Email\",\"message\":\"Terima kasih telah mendaftar,\\r\\n            <br\\/><br\\/>\\r\\n            Silahkan klik link dibawah ini untuk mengaktifkan akun anda :\\r\\n            <br\\/><br\\/>\\r\\n            <a href=\'http:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/180409ce1493e35fa3a159f975023bcf\'>http:\\/\\/class.uxorbitdesign.com\\/auth\\/confirm\\/180409ce1493e35fa3a159f975023bcf<\\/a>\\r\\n            <br\\/><br\\/>\\r\\n            \"}', NULL, 'queued', NULL, '2020-07-17 21:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lesson_upload`
--

CREATE TABLE `tb_lesson_upload` (
  `id` int(11) NOT NULL,
  `id_lms_courses_lesson` int(11) NOT NULL,
  `file` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_read` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lesson_upload`
--

INSERT INTO `tb_lesson_upload` (`id`, `id_lms_courses_lesson`, `file`, `id_user`, `description`, `is_read`) VALUES
(12, 28, 'HelmiYahya1594926741Newfolder.rar', 8, 'anda tydack mampuuu', '0'),
(13, 28, 'dalih1594462319Singleton.zip', 4, 'silahkan diperbaiki lagi', '0'),
(14, 35, 'dalih1594824854img004.zip', 4, 'Selamat anda dinyatakan lulus', '0'),
(15, 46, 'dalihrusmana1594920508bebas_neue.zip', 41, 'Bagus, selamat anda lulus submission', '0'),
(17, 54, 'arysugiarto1594997035Newfolder.rar', 43, '', '1'),
(18, 54, 'farhan1594998253Yanto2-01.rar', 44, 'Selamat Anda Sudah Lolos Submisi!\r\n\r\nGunakan ilmu nya dengan baik.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_category`
--

CREATE TABLE `tb_lms_category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent` int(255) NOT NULL,
  `time` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_category`
--

INSERT INTO `tb_lms_category` (`id`, `name`, `slug`, `parent`, `time`, `updated`, `icon`, `image`) VALUES
(1, 'User Experience Design', 'user-experience-design', 0, '2020-04-11 16:51:46', '2020-06-16 05:58:24', 'fa fa-mobile', ''),
(2, 'Afinity Diagram', 'afinity-diagram', 1, '2020-04-11 16:52:14', '2020-06-16 06:00:03', 'fa fa', ''),
(3, 'UX Process', 'ux-process', 1, '2020-04-11 19:37:18', '2020-06-16 06:45:36', 'fa fa', ''),
(4, 'User Interface Design', 'user-interface-design', 0, '2020-06-16 04:36:05', '0000-00-00 00:00:00', 'fa fa-heart', ''),
(7, 'Adobe XD', 'adobe-xd', 4, '2020-06-16 06:44:41', '0000-00-00 00:00:00', 'fa fa', ''),
(9, 'Information Architecture ', 'information-architecture', 1, '2020-07-07 06:58:17', '2020-07-16 18:54:52', '', ''),
(10, 'Figma', 'figma', 4, '2020-07-16 18:55:13', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_coupon`
--

CREATE TABLE `tb_lms_coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `expired` datetime NOT NULL,
  `type` enum('Price','Percent') NOT NULL,
  `data` varchar(255) NOT NULL,
  `for` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_coupon`
--

INSERT INTO `tb_lms_coupon` (`id`, `code`, `expired`, `type`, `data`, `for`) VALUES
(2, 'Covid19 ', '2020-07-18 21:00:00', 'Percent', '20', 'all-product');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_courses`
--

CREATE TABLE `tb_lms_courses` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `faq` text NOT NULL,
  `id_category` varchar(255) NOT NULL,
  `id_sub_category` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `price` int(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `views` int(11) NOT NULL,
  `status` enum('Published','Draft') NOT NULL,
  `is_new` enum('Terverifikasi','Belum Verifikasi') NOT NULL DEFAULT 'Belum Verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_courses`
--

INSERT INTO `tb_lms_courses` (`id`, `id_user`, `title`, `permalink`, `image`, `description`, `faq`, `id_category`, `id_sub_category`, `time`, `updated`, `price`, `discount`, `views`, `status`, `is_new`) VALUES
(21, 1, 'ini kelas baru', 'ini-kelas-baru-baru', 'images/ini-kelas-baru159483426028667.jpg', '&lt;p&gt;ini kelas baru&lt;/p&gt;\r\n', '', '1', '3', '2020-07-16 00:31:00', '2020-07-16 00:35:47', 98000, 0, 6, 'Published', ''),
(22, 11, 'Kelas Membuat Desain Aplikasi Kursus Online', 'kelas-membuat-desain-aplikasi-kursus-online', 'images/1594913615Login.png', '&lt;p&gt;ini adalah deskripsi aplikasi kursus online&lt;/p&gt;\r\n', '&lt;h4&gt;&lt;strong&gt;Pertanyaan 1&lt;/strong&gt;&lt;/h4&gt;\r\n\r\n&lt;p&gt;Jawaban 1&lt;/p&gt;\r\n\r\n&lt;h4&gt;&lt;strong&gt;Pertanyaan 2&lt;/strong&gt;&lt;/h4&gt;\r\n\r\n&lt;p&gt;Jawaban 2&lt;/p&gt;\r\n', '1', '9', '2020-07-16 22:29:06', '2020-07-17 00:24:39', 220000, 0, 6, 'Published', 'Terverifikasi'),
(23, 42, 'Kelas Online Figma UI Design', 'kelas-online-figma-ui-design', 'images/kelas-online-figma-ui-design1594972887banner.png', '&lt;p&gt;&lt;iframe __idm_id__=&quot;97303553&quot; allow=&quot;autoplay;&quot; allowfullscreen=&quot;&quot; frameborder=&quot;0&quot; height=&quot;360&quot; src=&quot;https://www.youtube.com/embed/wE-eGh8gWAk?rel=0&amp;amp;autoplay=1&amp;amp;controls=0&quot; width=&quot;100%&quot;&gt;&lt;/iframe&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Pada kelas ini, temen-temen akan belajar tentang dasar-dasar cara menggunakan Figma.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Seperti yang kita ketahui, Figma adalah software untuk membuat desain mockup aplikasi atau website. Figma ini bisa temen-temen gunakan untuk membuat ilustrasi juga hasil karya grafik lainnya.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelebihan dari software Figma ini adalah gratis. Kekurangannya mungkin figma ini tidak dijalankan ketika tidak ada jaringan internet.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Tertarik untuk belajar, silahkan beli kelasnya dan pelajari secara mendalam. Kami tunggu dikelas yah.&amp;nbsp;&lt;/p&gt;\r\n', '', '4', '10', '2020-07-17 15:01:27', '2020-07-17 15:14:13', 60000, 0, 5, 'Published', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_courses_comment`
--

CREATE TABLE `tb_lms_courses_comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lms_courses_comment`
--

INSERT INTO `tb_lms_courses_comment` (`id`, `comment`, `date`, `forum_id`, `user_id`) VALUES
(1, 'wek', '2020-07-09 03:24:35', 18, 8),
(2, 'lol', '2020-07-09 03:26:03', 18, 8),
(3, 'NANII', '2020-07-09 03:41:01', 18, 8),
(6, 'mkaaaa', '2020-07-09 15:06:45', 18, 4),
(7, 'ggggg', '2020-07-09 15:07:10', 18, 4),
(8, 'Kryhaaa', '2020-07-09 18:36:58', 20, 4),
(9, 'krahyaaaaaaaaa', '2020-07-09 18:39:57', 25, 8),
(10, 'broooooooo', '2020-07-09 18:40:31', 20, 4),
(11, 'drooooooooooooo', '2020-07-09 18:54:18', 20, 8),
(12, 'mantuoooooo', '2020-07-09 18:57:13', 20, 8),
(13, 'anda', '2020-07-10 01:15:08', 18, 5),
(14, 'Anda yah', '2020-07-17 15:34:21', 30, 42),
(15, 'Hai guys, comment, subscribe yah', '2020-07-17 21:25:28', 30, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_courses_forum`
--

CREATE TABLE `tb_lms_courses_forum` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `tb_lms_courses_lesson_id` int(11) NOT NULL,
  `tb_lms_courses_section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lms_courses_forum`
--

INSERT INTO `tb_lms_courses_forum` (`id`, `title`, `description`, `date`, `user_id`, `tb_lms_courses_lesson_id`, `tb_lms_courses_section_id`) VALUES
(18, 'Tegapkan otong mu', 'gannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnngannnnnnnnnnnnnnnnnnnnnnnnn', '2020-07-08 23:50:50', 8, 13, 10),
(19, 'NANIIIIIIIIIIIIIIIIII', 'NANIIIIIIIIIIIIIIIIII', '2020-07-08 23:51:08', 8, 14, 10),
(20, 'krhyaaaaaaaaaaaaaaaa', 'krhyaaaaaaaaaaaaaaaakrhyaaaaaaaaaaaaaaaakrhyaaaaaaaaaaaaaaaa', '2020-07-08 23:51:58', 8, 17, 13),
(23, 'percobaan 1', 'percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1percobaan 1', '2020-07-09 05:02:40', 8, 13, 10),
(26, 'Perkelahian', 'ini pertanyaan perkelahian', '2020-07-15 17:34:20', 4, 33, 22),
(27, 'ini pertanyaan', 'ini uraian pertanyaan', '2020-07-16 00:33:58', 4, 36, 24),
(28, 'Ini pertanyaan', 'Pertanyaan uraikan', '2020-07-16 12:53:24', 4, 18, 16),
(29, 'ini pertanyaan', 'ini uraian pertanyaan', '2020-07-16 22:39:57', 41, 45, 28),
(30, 'sdf', 'sadda', '2020-07-17 15:33:02', 43, 47, 29),
(31, 'CU  ini gimana', 'Bebebl', '2020-07-17 22:02:34', 44, 50, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_courses_lesson`
--

CREATE TABLE `tb_lms_courses_lesson` (
  `id` int(255) NOT NULL,
  `id_courses` int(255) NOT NULL,
  `id_section` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `order` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_courses_lesson`
--

INSERT INTO `tb_lms_courses_lesson` (`id`, `id_courses`, `id_section`, `title`, `type`, `content`, `order`) VALUES
(11, 3, 9, 'Perkenalan 1', 'Video', '<p><iframe __idm_id__=\"749121537\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/OVxmfBkmDl0?autoplay=1\" width=\"640\"></iframe></p>\r\n\r\n<p>&nbsp;</p>\r\n', 0),
(12, 3, 9, 'Perkenalan 2', 'Video', '<p><iframe __idm_id__=\"707278849\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/MCiE7VRAceY?autoplay=1\" width=\"640\"></iframe></p>\r\n', 0),
(36, 21, 24, 'ini lesson', 'Text', '<p>hahahaha</p>\r\n', 0),
(37, 22, 25, 'ini judul lesson', 'Text', '<p>ini judul lesson</p>\r\n', 0),
(38, 22, 25, 'ini judul lesson 2', 'Video', '<p>asdasdasdasd</p>\r\n', 0),
(40, 22, 26, 'ini lesson 5', 'Text', '<p>ini lesson 5&nbsp;ini lesson 5</p>\r\n', 0),
(41, 22, 26, 'lesson layak ', 'Text', '<p>lesson layak&nbsp;lesson layak&nbsp;lesson layak&nbsp;</p>\r\n', 0),
(42, 22, 25, 'ini lesson lesson 5', 'Text', '<p>ini lesson lesson 5&nbsp;ini lesson lesson 5</p>\r\n', 0),
(44, 22, 28, 'ini lesson 58595', 'Text', '<p>ini lesson 58595&nbsp;ini lesson 58595</p>\r\n', 0),
(45, 22, 28, 'ini lesson dari kapan', 'Text', '<p>ini lesson dari kapan&nbsp;ini lesson dari kapan</p>\r\n', 0),
(46, 22, 28, 'Submission', 'Quiz', '<p>silahkan kirimkan submissionnya</p>\r\n', 0),
(47, 23, 29, 'Trailer Kelas', 'Video', '<p><iframe __idm_id__=\"159072257\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/wE-eGh8gWAk?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(48, 23, 30, 'Perkenalan Figma', 'Video', '<p><iframe __idm_id__=\"976947201\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/wE-eGh8gWAk?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(49, 23, 30, 'Frame', 'Video', '<p><iframe __idm_id__=\"746880001\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/299j6ovxfms?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(50, 23, 30, 'Layers & Group', 'Video', '<p><iframe __idm_id__=\"379741185\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/CIUjNIEj2sI?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(51, 23, 30, 'Basic Shapes', 'Video', '<p><iframe __idm_id__=\"194338817\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/RMdSzc9IO0c?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(52, 23, 31, 'Part 1', 'Video', '<p><iframe __idm_id__=\"65538049\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/jaLhTcc1D5M?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(53, 23, 31, 'Part 2', 'Video', '<p><iframe __idm_id__=\"971950081\" allow=\"autoplay;\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/ex6GsDnqysw?rel=0&amp;autoplay=1&amp;controls=0\" width=\"100%\"></iframe></p>\r\n', 0),
(54, 23, 32, 'Challange 1', 'Quiz', '<p>Silahkan buat desain aplikasi seperti berikut ini di Figma.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://ucarecdn.com/204363c6-65b0-4d88-8957-3c6524a97a17/-/preview/\" /><br />\r\nPada Challange pertama ini, kamu belajar untuk membuat desain seperti diatas menggunakan Figma dan menerapkan ilmu yang sudah dijelaskan pada video-video sebelumnya. K</p>\r\n\r\n<p>Setelah selesai, kirimkan file nya dalam bentuk .zip atau .rar</p>\r\n\r\n<p><strong>Selamat Mengerjakan!</strong></p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_courses_section`
--

CREATE TABLE `tb_lms_courses_section` (
  `id` int(255) NOT NULL,
  `id_courses` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_courses_section`
--

INSERT INTO `tb_lms_courses_section` (`id`, `id_courses`, `title`, `order`) VALUES
(24, 21, 'ini judul section', 0),
(25, 22, 'ini judul section', 0),
(26, 22, 'ini judul section 2', 0),
(28, 22, 'ini section 3', 0),
(29, 23, 'Persiapan', 0),
(30, 23, 'Basic Figma', 0),
(31, 23, 'Prototype', 0),
(32, 23, 'Kirim Submission', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_template`
--

CREATE TABLE `tb_lms_template` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status` enum('Active','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_template`
--

INSERT INTO `tb_lms_template` (`id`, `name`, `path`, `status`) VALUES
(1, 'Default - App', 'default-app', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_template_widget`
--

CREATE TABLE `tb_lms_template_widget` (
  `id` int(255) NOT NULL,
  `id_template` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `var` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `data_json` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_user_courses`
--

CREATE TABLE `tb_lms_user_courses` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_courses` int(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_user_courses`
--

INSERT INTO `tb_lms_user_courses` (`id`, `id_user`, `id_courses`, `time`) VALUES
(1, 4, 2, '2020-06-11 10:51:53'),
(2, 4, 3, '2020-06-11 11:05:33'),
(21, 8, 6, '2020-07-11 18:59:46'),
(22, 8, 7, '2020-07-11 19:17:04'),
(23, 8, 5, '2020-07-12 23:05:47'),
(24, 8, 5, '2020-07-12 23:06:14'),
(25, 8, 5, '2020-07-12 23:24:19'),
(26, 8, 5, '2020-07-12 23:24:31'),
(33, 4, 7, '2020-07-14 07:42:28'),
(34, 4, 13, '2020-07-15 17:11:46'),
(36, 4, 4, '2020-07-15 21:49:16'),
(37, 4, 19, '2020-07-15 21:51:16'),
(38, 4, 21, '2020-07-16 00:33:09'),
(43, 43, 23, '2020-07-17 15:25:36'),
(44, 40, 21, '2020-07-17 16:13:21'),
(45, 4, 23, '2020-07-17 21:22:22'),
(46, 44, 23, '2020-07-17 22:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_user_lesson`
--

CREATE TABLE `tb_lms_user_lesson` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_courses` int(255) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_user_lesson`
--

INSERT INTO `tb_lms_user_lesson` (`id`, `id_user`, `id_courses`, `data`) VALUES
(13, 4, 7, '[{\"id_lesson\":\"18\",\"status\":true},{\"id_lesson\":\"19\",\"status\":true}]'),
(14, 4, 19, '[{\"id_lesson\":\"34\",\"status\":false},{\"id_lesson\":\"35\",\"status\":true}]'),
(15, 4, 13, '[{\"id_lesson\":\"33\",\"status\":false}]'),
(16, 8, 13, '[{\"id_lesson\":\"33\",\"status\":true}]'),
(17, 4, 21, '[{\"id_lesson\":\"36\",\"status\":true}]'),
(19, 8, 4, '[{\"id_lesson\":\"28\",\"status\":true}]'),
(20, 43, 23, '[{\"id_lesson\":\"48\",\"status\":true},{\"id_lesson\":\"53\",\"status\":false},{\"id_lesson\":\"47\",\"status\":true},{\"id_lesson\":\"49\",\"status\":true},{\"id_lesson\":\"50\",\"status\":true},{\"id_lesson\":\"51\",\"status\":true},{\"id_lesson\":\"52\",\"status\":false},{\"id_lesson\":\"54\",\"status\":false}]'),
(21, 44, 23, '[{\"id_lesson\":\"48\",\"status\":true},{\"id_lesson\":\"49\",\"status\":true},{\"id_lesson\":\"50\",\"status\":true},{\"id_lesson\":\"51\",\"status\":true},{\"id_lesson\":\"52\",\"status\":true},{\"id_lesson\":\"53\",\"status\":true},{\"id_lesson\":\"47\",\"status\":true},{\"id_lesson\":\"54\",\"status\":true}]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_user_payment`
--

CREATE TABLE `tb_lms_user_payment` (
  `id` varchar(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_courses` int(255) NOT NULL,
  `id_courses_user` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `proof` text NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` enum('Purchased','Pending','Checking','Failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_user_payment`
--

INSERT INTO `tb_lms_user_payment` (`id`, `id_user`, `id_courses`, `id_courses_user`, `type`, `amount`, `token`, `proof`, `coupon`, `time`, `updated`, `status`) VALUES
('40C19T200716221833', 40, 19, 11, 'Manual', '189000', 'bni', '', '', '2020-07-16 22:18:33', '0000-00-00 00:00:00', 'Pending'),
('40C23T200717160558', 40, 21, 1, 'Manual', '98000', 'bri', '{\"file\":\"40C23T200717160558_confirmation_20200717160652.jpg\",\"sender\":\"helmi h\"}', '', '2020-07-17 16:09:12', '2020-07-17 16:09:12', 'Purchased'),
('43C23T200717152424', 43, 23, 42, 'Manual', '48000', 'bni', '{\"file\":\"43C23T200717152424_confirmation_20200717152444.png\",\"sender\":\"joni\"}', 'covid19', '2020-07-17 15:24:24', '2020-07-17 15:25:36', 'Purchased'),
('44C23T200717215931', 44, 23, 42, 'Manual', '60000', 'bni', '{\"file\":\"44C23T200717215931_confirmation_20200717220007.jpg\",\"sender\":\"Farhan\"}', '', '2020-07-17 21:59:31', '2020-07-17 22:00:30', 'Purchased'),
('4C13T200713161105', 4, 13, 1, 'Manual', '5000', 'bri', '{\"file\":\"4C13T200713161105_confirmation_20200713161118.jpg\",\"sender\":\"anjng kau admin\"}', '', '2020-07-13 16:11:05', '2020-07-13 16:11:53', 'Failed'),
('4C13T200715110040', 4, 13, 1, 'Manual', '5000', 'mandiri', '{\"file\":\"4C13T200715110040_confirmation_20200715142046.jpg\",\"sender\":\"asdasdas\"}', '', '2020-07-15 11:00:40', '0000-00-00 00:00:00', 'Failed'),
('4C13T200715121211', 4, 13, 1, 'Manual', '5000', 'mandiri', '{\"file\":\"4C13T200715121211_confirmation_20200715152906.jpg\",\"sender\":\"gggg\"}', '', '2020-07-15 12:12:11', '2020-07-15 17:11:45', 'Purchased'),
('4C19T200715173309', 4, 19, 11, 'Manual', '189000', 'bri', '{\"file\":\"4C19T200715173309_confirmation_20200715173321.jpg\",\"sender\":\"jono surono\"}', '', '2020-07-15 17:33:09', '2020-07-15 21:51:16', 'Purchased'),
('4C21T200716003234', 4, 21, 1, 'Manual', '98000', 'bri', '{\"file\":\"4C21T200716003234_confirmation_20200716003243.jpg\",\"sender\":\"Dalih\"}', '', '2020-07-16 00:32:34', '2020-07-16 00:33:09', 'Purchased'),
('4C23T200717212059', 4, 23, 42, 'Manual', '60000', 'bni', '{\"file\":\"4C23T200717212059_confirmation_20200717212133.jpg\",\"sender\":\"Dal dal\"}', '', '2020-07-17 21:20:59', '2020-07-17 21:22:22', 'Purchased'),
('4C4T200715110232', 4, 4, 5, 'Manual', '40000', 'bri', '{\"file\":\"4C4T200715110232_confirmation_20200715152559.jpg\",\"sender\":\"okoko op\"}', '', '2020-07-15 11:02:32', '0000-00-00 00:00:00', 'Failed'),
('4C4T200715122054', 4, 4, 5, 'Manual', '40000', 'mandiri', '{\"file\":\"4C4T200715122054_confirmation_20200715140752.jpg\",\"sender\":\"narthodd uzu\"}', '', '2020-07-15 12:20:54', '0000-00-00 00:00:00', 'Failed'),
('4C4T200715214815', 4, 4, 5, 'Manual', '40000', 'bri', '{\"file\":\"4C4T200715214815_confirmation_20200715214829.jpg\",\"sender\":\"Dalih Rusmana\"}', '', '2020-07-15 21:48:15', '2020-07-15 21:49:16', 'Purchased'),
('4C7T200714074151', 4, 7, 5, 'Manual', '20000', 'bri', '{\"file\":\"4C7T200714074151_confirmation_20200714074210.jpg\",\"sender\":\"oh mty\"}', '', '2020-07-14 07:41:51', '2020-07-14 07:42:28', 'Purchased'),
('4C7T200714074153', 4, 7, 5, 'Manual', '20000', '', '', '', '2020-07-14 07:41:53', '0000-00-00 00:00:00', 'Failed'),
('8C13T200713152046', 8, 13, 1, 'Manual', '5000', 'bri', '{\"file\":\"8C13T200713152046_confirmation_20200713152529.jpg\",\"sender\":\"admin anjng\"}', '', '2020-07-13 15:20:46', '2020-07-13 15:31:54', 'Failed'),
('8C13T200715173834', 8, 13, 1, 'Manual', '5000', 'bri', '{\"file\":\"8C13T200715173834_confirmation_20200715173845.jpg\",\"sender\":\"naga\"}', '', '2020-07-15 17:38:34', '2020-07-15 17:39:14', 'Purchased'),
('8C4T200707033019', 8, 4, 5, 'Manual', '40000', 'bri', '{\"file\":\"8C4T200707033019_confirmation_20200707033045.jpg\",\"sender\":\"gglool\"}', '', '2020-07-14 23:30:05', '0000-00-00 00:00:00', 'Purchased'),
('8C4T200707054940', 8, 4, 5, 'Manual', '40000', 'bri', '{\"file\":\"8C4T200707054940_confirmation_20200707054954.jpg\",\"sender\":\"gogogog\"}', '', '2020-07-07 05:49:40', '2020-07-07 06:29:06', 'Purchased'),
('8C5T200712162543', 8, 5, 5, 'Manual', '95000', 'bri', '{\"file\":\"8C5T200712162543_confirmation_20200712163208.jpg\",\"sender\":\"rando oooo\"}', '', '2020-07-12 16:25:43', '2020-07-13 15:07:52', 'Purchased'),
('8C5T200712181416', 8, 5, 5, 'Manual', '95000', 'bri', '', '', '2020-07-12 18:14:16', '0000-00-00 00:00:00', 'Failed'),
('8C7T200711190256', 8, 7, 5, 'Manual', '20000', 'bri', '{\"file\":\"8C7T200711190256_confirmation_20200711190318.jpg\",\"sender\":\"ggmild\"}', '', '2020-07-11 19:02:56', '2020-07-11 19:17:04', 'Purchased');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lms_user_review`
--

CREATE TABLE `tb_lms_user_review` (
  `id` int(255) NOT NULL,
  `id_courses` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `review` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lms_user_review`
--

INSERT INTO `tb_lms_user_review` (`id`, `id_courses`, `id_user`, `rating`, `review`, `time`) VALUES
(1, 2, 4, '4', 'bagus banget', '2020-06-11 10:52:26'),
(2, 4, 4, '4', 'Keren Bangett', '2020-06-11 11:31:11'),
(3, 3, 4, '4', 'Aku sukaaaaa!!', '2020-07-07 06:49:27'),
(5, 13, 4, '3', 'tolol anjng', '2020-07-15 17:12:08'),
(6, 23, 43, '5', 'Tertarik!', '2020-07-17 15:47:01'),
(7, 23, 44, '4', 'Mantep JASA', '2020-07-17 22:02:12'),
(8, 23, 4, '5', 'Bagus sih, keren!', '2020-07-17 22:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site`
--

CREATE TABLE `tb_site` (
  `type` varchar(255) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_site`
--

INSERT INTO `tb_site` (`type`, `data`) VALUES
('ads_txt', ''),
('blog_comment', 'null'),
('blog_limit_post', '1'),
('cache', 'No'),
('cookie_notification', '{\"status\":null,\"message\":null}'),
('currency_format', 'IDR'),
('description', 'Pelajari ilmu yang mendalam tentang cara bagaimana membangun User Interface (UI) dan User Experience (UX) pada sebuah produk digital.'),
('fb_app', '{\"facebook_app_id\":\"\",\"facebook_app_secret\":\"\"}'),
('google_api', '{\"client_id\":\"\",\"client_secret\":\"\"}'),
('google_recaptcha', '{\"status\":\"No\",\"site_key\":\"\",\"secret_key\":\"\"}'),
('icon', 'icon_20200611171057.png'),
('image', 'logo_20200716153148.png'),
('language', 'indonesia'),
('lms_free_courses_readable', 'No'),
('lms_limit_post', '9'),
('meta_open_graph', '{\"app_id\":\"\",\"publisher\":\"https:\\/\\/www.facebook.com\\/dalih.rusmana\",\"author\":\"https:\\/\\/www.facebook.com\\/kurteyki\",\"default_image\":\"classuxorbit.png\"}'),
('meta_schema', '{\"type\":\"Person\",\"content\":{\"person_name\":\"Dalih Rusmana\",\"person_alternateName\":\"Dalih\",\"person_gender\":\"male\",\"person_height\":\"160 centimetre\",\"person_birthDate\":\"1997-08-23\",\"person_birthPlace\":\"Sukabumi, Jawabarat\",\"person_nationality\":\"Indonesia\",\"person_alumniOf\":\"rusmana\",\"person_memberOf\":\"Dalih\",\"person_streetAddress\":\"RT.04 RW.05\",\"person_addressLocality\":\"Bandung\",\"person_addressRegion\":\"Indonesia\",\"person_postalCode\":\"43176\",\"person_email\":\"dalihrusmana@gmail.com\",\"person_telephone\":\"+62 857 9316 7490\",\"person_url\":\"https:\\/\\/uxorbitdesign.com\",\"person_sameAs\":\"https:\\/\\/facebook.com\\/dalih.rusmana\",\"person_jobTitle\":\"UX Designer\",\"person_worksFor_name\":\"UX Orbit Design\",\"person_worksFor_sameAs\":\"https:\\/\\/facebook.com\\/dalih.rusmana\",\"organization_name\":\"UX Orbit Design\",\"organization_url\":\"https:\\/\\/uxorbitdesign.com\\/\",\"organization_contactPoint_telephone\":\"+62 857 9316 7490\",\"organization_contactPoint_contactType\":\"customer service\",\"organization_sameAs\":\"https:\\/\\/facebook.com\\/uxorbitdesign\",\"organization_logo_url\":\"classuxorbit.png\",\"person_image\":\"person_image_20200611181021.png\"}}'),
('meta_twitter_card', '{\"publisher\":\"@dalihrusmana\",\"default_image\":\"classuxorbit.png\"}'),
('no_image', 'no_image_20200716105543.png'),
('payment_method', 'Manual'),
('payment_midtrans', '{\"status_production\":null,\"client_key\":null,\"server_key\":null}'),
('robots_txt', ''),
('slogan', 'Learn UI/UX With Experts'),
('smtp', '{\"protocol\":\"smtp\",\"smtp_host\":\"smtp.googlemail.com\",\"smtp_port\":\"465\",\"smtp_user\":\"uxorbitdesign@gmail.com\",\"smtp_pass\":\"UXOrbit123\"}'),
('time_zone', 'Asia/Jakarta'),
('title', 'Belajar UI/UX di Jalur yang Benar - UX Orbit Design'),
('updated', '2020-07-16 15:33:27'),
('user_limit_data', '5'),
('vertification_email', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_pages`
--

CREATE TABLE `tb_site_pages` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `content` longtext NOT NULL,
  `status` enum('Published','Draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_site_pages`
--

INSERT INTO `tb_site_pages` (`id`, `title`, `permalink`, `time`, `updated`, `content`, `status`) VALUES
(1, 'Kebijakan Privasi', 'privacy-policy', '2020-03-21 18:36:40', '2020-04-14 08:31:36', '&lt;p&gt;Di Kurteyki, dapat diakses dari kurteyki.com, salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan dicatat oleh Kurteyki dan bagaimana kami menggunakannya.&lt;/p&gt;\r\n\r\n&lt;p&gt;Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami.&lt;/p&gt;\r\n\r\n&lt;h2&gt;File Log&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kurteyki mengikuti prosedur standar menggunakan file log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan bagian dari analisis layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), tipe browser, Penyedia Layanan Internet (ISP), cap tanggal dan waktu, halaman rujukan / keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi. Tujuan dari informasi ini adalah untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Cookie dan Beacon Web&lt;/h2&gt;\r\n\r\n&lt;p&gt;Seperti situs web lainnya, Kurteyki menggunakan &amp;#39;cookies&amp;#39;. Cookie ini digunakan untuk menyimpan informasi termasuk preferensi pengunjung, dan halaman-halaman di situs web yang diakses atau dikunjungi pengunjung. Informasi ini digunakan untuk mengoptimalkan pengalaman pengguna dengan menyesuaikan konten halaman web kami berdasarkan jenis browser pengunjung dan / atau informasi lainnya.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Google DoubleClick Cookie DART&lt;/h2&gt;\r\n\r\n&lt;p&gt;Google adalah salah satu vendor pihak ketiga di situs kami. Itu juga menggunakan cookie, yang dikenal sebagai cookie DART, untuk menayangkan iklan kepada pengunjung situs kami berdasarkan kunjungan mereka ke www.website.com dan situs lain di internet. Namun, pengunjung dapat memilih untuk menolak penggunaan cookie DART dengan mengunjungi iklan Google dan jaringan konten Kebijakan Privasi di URL berikut - https://policies.google.com/technologies/ads&lt;/p&gt;\r\n\r\n&lt;h2&gt;Mitra Iklan Kami&lt;/h2&gt;\r\n\r\n&lt;p&gt;Beberapa pengiklan di situs kami mungkin menggunakan cookie dan suar web. Mitra iklan kami tercantum di bawah ini. Setiap mitra periklanan kami memiliki Kebijakan Privasi sendiri untuk kebijakan mereka tentang data pengguna. Untuk akses yang lebih mudah, kami hyperlink ke Kebijakan Privasi mereka di bawah ini.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n  &lt;li&gt;Google\r\n  &lt;ul&gt;\r\n    &lt;li&gt;https://policies.google.com/technologies/ads&lt;/li&gt;\r\n &lt;/ul&gt;\r\n &lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;Kebijakan Privasi&lt;/h2&gt;\r\n\r\n&lt;p&gt;Anda dapat berkonsultasi daftar ini untuk menemukan Kebijakan Privasi untuk masing-masing mitra periklanan Kurteyki. Kebijakan Privasi kami dibuat dengan bantuan Generator Kebijakan Privasi Gratis dan Generator Kebijakan Privasi Online.&lt;/p&gt;\r\n\r\n&lt;p&gt;Server iklan pihak ketiga atau jaringan iklan menggunakan teknologi seperti cookie, JavaScript, atau Web Beacon yang digunakan dalam iklan masing-masing dan tautan yang muncul di Kurteyki, yang dikirim langsung ke browser pengguna. Mereka secara otomatis menerima alamat IP Anda ketika ini terjadi. Teknologi ini digunakan untuk mengukur efektivitas kampanye iklan mereka dan / atau untuk mempersonalisasi konten iklan yang Anda lihat di situs web yang Anda kunjungi.&lt;/p&gt;\r\n\r\n&lt;p&gt;Perhatikan bahwa Kurteyki tidak memiliki akses ke atau kontrol terhadap cookie ini yang digunakan oleh pengiklan pihak ketiga.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Kebijakan Privasi Pihak Ketiga&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kebijakan Privasi Kurteyki tidak berlaku untuk pengiklan atau situs web lain. Karenanya, kami menyarankan Anda untuk berkonsultasi dengan masing-masing Kebijakan Privasi dari server iklan pihak ketiga ini untuk informasi yang lebih terperinci. Ini mungkin termasuk praktik dan instruksi mereka tentang cara menyisih dari opsi tertentu. Anda dapat menemukan daftar lengkap Kebijakan Privasi ini dan tautannya di sini: Tautan Kebijakan Privasi.&lt;/p&gt;\r\n\r\n&lt;p&gt;Anda dapat memilih untuk menonaktifkan cookie melalui opsi peramban individual. Untuk mengetahui informasi lebih rinci tentang manajemen cookie dengan browser web tertentu, dapat ditemukan di situs web masing-masing browser. Apa Itu Cookie?&lt;/p&gt;\r\n\r\n&lt;h2&gt;Informasi Anak&lt;/h2&gt;\r\n\r\n&lt;p&gt;Bagian lain dari prioritas kami adalah menambahkan perlindungan untuk anak-anak saat menggunakan internet. Kami mendorong orang tua dan wali untuk mengamati, berpartisipasi, dan / atau memantau dan membimbing aktivitas online mereka.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kurteyki tidak secara sadar mengumpulkan Informasi Identifikasi Pribadi apa pun dari anak-anak di bawah usia 13. Jika Anda berpikir bahwa anak Anda memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan Anda untuk menghubungi kami segera dan kami akan melakukan upaya terbaik kami untuk segera menghapus informasi tersebut dari catatan kami.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Hanya Kebijakan Privasi Online&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kebijakan Privasi ini hanya berlaku untuk aktivitas online kami dan berlaku untuk pengunjung situs web kami sehubungan dengan informasi yang mereka bagikan dan / atau kumpulkan di Kurteyki. Kebijakan ini tidak berlaku untuk informasi apa pun yang dikumpulkan secara offline atau melalui saluran selain dari situs web ini.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Persetujuan&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui Syarat dan Ketentuannya.&lt;/p&gt;\r\n', 'Published'),
(2, 'Bantuan', 'help', '2020-04-14 07:52:45', '2020-04-16 08:22:28', '&lt;meta name=&quot;robots&quot; content=&quot;noindex&quot;&gt;\r\n&lt;p&gt;Belum ada konten untuk dibuat.&lt;/p&gt;\r\n', 'Published'),
(3, 'Kontak', 'contact', '2020-04-14 07:53:12', '2020-04-16 08:24:26', '&lt;p&gt;Anda dapat menghubungi tim melalui kontak dibawah ini&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Email : kurteyki@gmail.com&lt;/p&gt;\r\n\r\n&lt;p&gt;Facebook : &lt;a href=&quot;https://facebook.com/kurteyki&quot;&gt;facebook.com/kurteyki&lt;/a&gt;&lt;/p&gt;\r\n', 'Published'),
(4, 'Tentang Kurteyki', 'about', '2020-04-14 07:53:19', '2020-04-16 08:20:59', '&lt;p&gt;kurteyki.com situs belajar pengembangan diri, situs dibuat pada tahun 2019.&lt;/p&gt;\r\n', 'Published'),
(5, 'Syarat dan Ketentuan', 'term-and-condition', '2020-04-14 07:54:26', '2020-04-14 08:39:27', '&lt;p&gt;Selamat datang di Kurteyki!&lt;/p&gt;\r\n\r\n&lt;p&gt;Syarat dan ketentuan ini menguraikan aturan dan peraturan untuk penggunaan Situs Web Kurteyki, yang terletak di kurteyki.com.&lt;/p&gt;\r\n\r\n&lt;p&gt;Dengan mengakses situs web ini, kami menganggap Anda menerima syarat dan ketentuan ini. Jangan terus menggunakan Kurteyki jika Anda tidak setuju untuk mengambil semua syarat dan ketentuan yang tercantum di halaman ini.&lt;/p&gt;\r\n\r\n&lt;p&gt;Terminologi berikut ini berlaku untuk Syarat dan Ketentuan ini, Pernyataan Privasi dan Pemberitahuan Sangkalan dan semua Perjanjian: &amp;quot;Klien&amp;quot;, &amp;quot;Anda&amp;quot; dan &amp;quot;Anda&amp;quot; mengacu pada Anda, orang yang masuk ke situs web ini dan mematuhi persyaratan dan ketentuan Perusahaan. &amp;quot;Perusahaan&amp;quot;, &amp;quot;Diri Kami&amp;quot;, &amp;quot;Kami&amp;quot;, &amp;quot;Kami&amp;quot; dan &amp;quot;Kami&amp;quot;, mengacu pada Perusahaan kami. &amp;quot;Pihak&amp;quot;, &amp;quot;Pihak&amp;quot;, atau &amp;quot;Kami&amp;quot;, mengacu pada Klien dan diri kami sendiri. Semua istilah mengacu pada penawaran, penerimaan, dan pertimbangan pembayaran yang diperlukan untuk melakukan proses bantuan kami kepada Klien dengan cara yang paling tepat untuk tujuan yang jelas dalam memenuhi kebutuhan Klien sehubungan dengan penyediaan layanan yang dinyatakan Perusahaan, sesuai dengan dan tunduk pada, hukum Belanda yang berlaku. Setiap penggunaan terminologi di atas atau kata-kata lain dalam bentuk tunggal, jamak, huruf besar dan / atau dia, dianggap sebagai dapat dipertukarkan dan karena itu merujuk pada yang sama.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Cookies&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kami menggunakan penggunaan cookie. Dengan mengakses Kurteyki, Anda setuju untuk menggunakan cookie sesuai dengan Kebijakan Privasi Kurteyki.&lt;/p&gt;\r\n\r\n&lt;p&gt;Sebagian besar situs web interaktif menggunakan cookie untuk memungkinkan kami mengambil detail pengguna untuk setiap kunjungan. Cookie digunakan oleh situs web kami untuk mengaktifkan fungsionalitas area tertentu agar lebih mudah bagi orang yang mengunjungi situs web kami. Beberapa mitra afiliasi / iklan kami juga dapat menggunakan cookie.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Lisensi&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kecuali dinyatakan sebaliknya, Kurteyki dan / atau pemberi lisensinya memiliki hak kekayaan intelektual untuk semua materi tentang Kurteyki. Semua hak kekayaan intelektual dilindungi. Anda dapat mengakses ini dari Kurteyki untuk penggunaan pribadi Anda dengan batasan yang diatur dalam syarat dan ketentuan ini.&lt;/p&gt;\r\n\r\n&lt;p&gt;Anda tidak harus:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n &lt;li&gt;Publikasikan ulang materi dari Kurteyki&lt;/li&gt;\r\n  &lt;li&gt;Menjual, menyewakan atau mensublisensikan materi dari Kurteyki&lt;/li&gt;\r\n &lt;li&gt;Mereproduksi, menggandakan atau menyalin materi dari Kurteyki&lt;/li&gt;\r\n  &lt;li&gt;Mendistribusikan kembali konten dari Kurteyki&lt;/li&gt;\r\n  &lt;li&gt;Perjanjian ini akan dimulai pada tanggal perjanjian ini.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Bagian dari situs web ini menawarkan kesempatan bagi pengguna untuk memposting dan bertukar pendapat dan informasi di area situs web tertentu. Kurteyki tidak memfilter, mengedit, menerbitkan atau meninjau Komentar sebelum kehadiran mereka di situs web. Komentar tidak mencerminkan pandangan dan pendapat Kurteyki, agen dan / atau afiliasinya. Komentar mencerminkan pandangan dan pendapat orang yang memposting pandangan dan pendapat mereka. Sejauh diizinkan oleh undang-undang yang berlaku, Kurteyki tidak akan bertanggung jawab atas Komentar atau untuk setiap kewajiban, kerusakan atau biaya yang disebabkan dan / atau diderita sebagai akibat dari penggunaan dan / atau pengeposan dan / atau penampilan Komentar mengenai hal ini. situs web.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kurteyki berhak untuk memantau semua Komentar dan menghapus Komentar yang dapat dianggap tidak pantas, menyinggung, atau menyebabkan pelanggaran terhadap Syarat dan Ketentuan ini.&lt;/p&gt;\r\n\r\n&lt;p&gt;Anda menjamin dan menyatakan bahwa:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n  &lt;li&gt;Anda berhak memposting Komentar di situs web kami dan memiliki semua lisensi dan persetujuan yang diperlukan untuk melakukannya;&lt;/li&gt;\r\n &lt;li&gt;Komentar tidak melanggar hak kekayaan intelektual apa pun, termasuk tanpa batasan hak cipta, paten, atau merek dagang pihak ketiga mana pun;&lt;/li&gt;\r\n &lt;li&gt;Komentar tidak mengandung materi yang memfitnah, memfitnah, menyinggung, tidak senonoh, atau melanggar hukum yang merupakan pelanggaran privasi&lt;/li&gt;\r\n  &lt;li&gt;Komentar tidak akan digunakan untuk meminta atau mempromosikan bisnis atau kebiasaan atau menyajikan kegiatan komersial atau kegiatan yang melanggar hukum.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Anda dengan ini memberi Kurteyki lisensi non-eksklusif untuk menggunakan, mereproduksi, mengedit, dan memberi otorisasi kepada orang lain untuk menggunakan, mereproduksi, dan mengedit komentar Anda dalam segala bentuk, format, atau media.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Hyperlink ke Konten kami&lt;/h2&gt;\r\n\r\n&lt;p&gt;Organisasi berikut dapat menautkan ke situs web kami tanpa persetujuan tertulis sebelumnya:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n &lt;li&gt;Agensi pemerintahan;&lt;/li&gt;\r\n &lt;li&gt;Mesin pencari;&lt;/li&gt;\r\n &lt;li&gt;Organisasi berita;&lt;/li&gt;\r\n &lt;li&gt;Distributor direktori online dapat menautkan ke situs web kami dengan cara yang sama seperti mereka hyperlink ke situs web bisnis terdaftar lainnya; dan&lt;/li&gt;\r\n &lt;li&gt;Bisnis Terakreditasi di seluruh sistem kecuali meminta organisasi nirlaba, pusat perbelanjaan amal, dan kelompok penggalangan dana amal yang mungkin tidak hyperlink ke situs Web kami.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Organisasi-organisasi ini dapat menautkan ke beranda kami, ke publikasi atau ke informasi situs web lainnya selama tautan: (a) tidak menipu dengan cara apa pun; (B) tidak secara tidak langsung menyiratkan sponsor, dukungan atau persetujuan dari pihak yang menghubungkan dan produk dan / atau layanannya; dan (c) sesuai dengan konteks situs pihak yang menghubungkan.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami dapat mempertimbangkan dan menyetujui permintaan tautan lain dari jenis organisasi berikut:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n  &lt;li&gt;sumber informasi konsumen dan / atau bisnis yang umum dikenal;&lt;/li&gt;\r\n &lt;li&gt;situs komunitas dot.com;&lt;/li&gt;\r\n &lt;li&gt;asosiasi atau kelompok lain yang mewakili badan amal;&lt;/li&gt;\r\n  &lt;li&gt;distributor direktori online;&lt;/li&gt;\r\n  &lt;li&gt;portal internet;&lt;/li&gt;\r\n &lt;li&gt;perusahaan akuntansi, hukum dan konsultasi; dan&lt;/li&gt;\r\n  &lt;li&gt;lembaga pendidikan dan asosiasi perdagangan.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Kami akan menyetujui permintaan tautan dari organisasi-organisasi ini jika kami memutuskan bahwa: (a) tautan tersebut tidak akan membuat kami terlihat tidak menguntungkan bagi diri kami sendiri atau untuk bisnis terakreditasi kami; (B) organisasi tidak memiliki catatan negatif dengan kami; (c) manfaat bagi kami dari visibilitas hyperlink mengkompensasi ketiadaan Kurteyki; dan (d) tautannya ada dalam konteks informasi sumber daya umum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Organisasi-organisasi ini dapat menautkan ke beranda kami selama tautan tersebut: (a) sama sekali tidak menipu; (B) tidak secara tidak langsung menyiratkan sponsor, dukungan atau persetujuan dari pihak yang menghubungkan dan produk atau layanannya; dan (c) sesuai dengan konteks situs pihak yang menghubungkan.&lt;/p&gt;\r\n\r\n&lt;p&gt;Jika Anda salah satu organisasi yang tercantum dalam paragraf 2 di atas dan tertarik untuk menautkan ke situs web kami, Anda harus memberi tahu kami dengan mengirim email ke Kurteyki. Harap sertakan nama Anda, nama organisasi Anda, informasi kontak serta URL situs Anda, daftar URL apa pun yang ingin Anda tautkan ke Situs web kami, dan daftar URL di situs kami yang ingin Anda kunjungi tautan. Tunggu 2-3 minggu untuk tanggapan.&lt;/p&gt;\r\n\r\n&lt;p&gt;Organisasi yang disetujui dapat hyperlink ke Situs web kami sebagai berikut:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n &lt;li&gt;Dengan menggunakan nama perusahaan kami; atau&lt;/li&gt;\r\n  &lt;li&gt;Dengan menggunakan pencari sumber daya seragam yang ditautkan ke; atau&lt;/li&gt;\r\n &lt;li&gt;Dengan menggunakan uraian lain apa pun dari Situs Web kami yang ditautkan dengan yang masuk akal dalam konteks dan format konten di situs pihak yang menautkan.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Penggunaan logo Kurteyki atau karya seni lainnya tidak akan diizinkan untuk menghubungkan tidak adanya perjanjian lisensi merek dagang.&lt;/p&gt;\r\n\r\n&lt;h2&gt;iFrames&lt;/h2&gt;\r\n\r\n&lt;p&gt;Tanpa persetujuan sebelumnya dan izin tertulis, Anda tidak boleh membuat bingkai di sekitar Halaman Web kami yang mengubah cara tampilan visual atau tampilan Situs Web kami.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Pertanggungjawaban Konten&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kami tidak akan bertanggung jawab atas konten yang muncul di Situs Web Anda. Anda setuju untuk melindungi dan membela kami terhadap semua klaim yang muncul di Situs Web Anda. Tidak ada tautan yang muncul di Situs web mana pun yang dapat ditafsirkan sebagai fitnah, cabul atau kriminal, atau yang melanggar, jika tidak melanggar, atau menganjurkan pelanggaran atau pelanggaran lain terhadap, hak pihak ketiga.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Reservasi Hak&lt;/h2&gt;\r\n\r\n&lt;p&gt;Kami berhak meminta Anda menghapus semua tautan atau tautan tertentu apa pun ke Situs Web kami. Anda menyetujui untuk segera menghapus semua tautan ke Situs web kami berdasarkan permintaan. Kami juga berhak mengubah syarat dan ketentuan ini dan ini menautkan kebijakan kapan saja. Dengan terus menautkan ke Situs web kami, Anda setuju untuk terikat dan mengikuti syarat dan ketentuan tautan ini.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Penghapusan tautan dari situs web kami&lt;/h2&gt;\r\n\r\n&lt;p&gt;Jika Anda menemukan tautan apa pun di Situs Web kami yang menyinggung karena alasan apa pun, Anda bebas untuk menghubungi dan memberi tahu kami kapan saja. Kami akan mempertimbangkan permintaan untuk menghapus tautan tetapi kami tidak berkewajiban untuk menanggapi Anda secara langsung.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami tidak memastikan bahwa informasi di situs web ini benar, kami tidak menjamin kelengkapan atau keakuratannya; kami juga tidak berjanji untuk memastikan bahwa situs web tetap tersedia atau bahwa materi di situs web tetap terbaru.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Penolakan&lt;/h2&gt;\r\n\r\n&lt;p&gt;Sejauh diizinkan oleh hukum yang berlaku, kami mengecualikan semua representasi, jaminan, dan ketentuan yang berkaitan dengan situs web kami dan penggunaan situs web ini. Tidak ada dalam penafian ini yang akan:&lt;/p&gt;\r\n\r\n&lt;p&gt;membatasi atau mengecualikan tanggung jawab kami atau Anda atas kematian atau cedera pribadi;&lt;br /&gt;\r\nmembatasi atau mengecualikan tanggung jawab kami atau Anda untuk penipuan atau penggambaran yang salah;&lt;br /&gt;\r\nbatasi salah satu dari kewajiban kami atau Anda dengan cara apa pun yang tidak diizinkan berdasarkan hukum yang berlaku; atau&lt;br /&gt;\r\nmengecualikan salah satu dari kewajiban kami atau Anda yang mungkin tidak dikecualikan berdasarkan hukum yang berlaku.&lt;br /&gt;\r\nBatasan dan larangan tanggung jawab yang diatur dalam Bagian ini dan di tempat lain dalam penafian ini: (a) tunduk pada paragraf sebelumnya; dan (b) mengatur semua kewajiban yang timbul berdasarkan penafian, termasuk kewajiban yang timbul dalam kontrak, dalam gugatan hukum dan untuk pelanggaran kewajiban hukum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Selama situs web dan informasi serta layanan di situs web disediakan secara gratis, kami tidak akan bertanggung jawab atas kehilangan atau kerusakan apa pun.&lt;/p&gt;\r\n', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_visitor`
--

CREATE TABLE `tb_site_visitor` (
  `id` int(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `browser` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `hits` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `referrer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_site_visitor`
--

INSERT INTO `tb_site_visitor` (`id`, `ip`, `date`, `browser`, `os`, `country_name`, `country_code`, `hits`, `url`, `referrer`) VALUES
(1, '::1', '2020-05-03 11:49:04', 'Chrome', 'Windows 7', '', '', 78, 'http://localhost/kurteyki/', ''),
(2, '::1', '2020-05-03 11:49:12', 'Chrome', 'Windows 7', '', '', 13, 'http://localhost/kurteyki/blog', ''),
(3, '::1', '2020-05-03 11:49:22', 'Chrome', 'Windows 7', '', '', 21, 'http://localhost/kurteyki/courses-filter', ''),
(4, '::1', '2020-05-03 11:49:32', 'Chrome', 'Windows 7', '', '', 1, 'http://localhost/kurteyki/blog-search', ''),
(5, '::1', '2020-05-03 11:56:13', 'Chrome', 'Windows 7', '', '', 9, 'http://localhost/kurteyki/blog-post/konten-baru-dan-rencana-kedepannya-situs-ini', ''),
(6, '::1', '2020-05-03 11:56:45', 'Chrome', 'Windows 7', '', '', 2, 'http://localhost/kurteyki/blog-category/news', ''),
(7, '::1', '2020-05-03 11:57:14', 'Chrome', 'Windows 7', '', '', 2, 'http://localhost/kurteyki/blog-tags/berita', ''),
(8, '::1', '2020-05-03 12:01:06', 'Chrome', 'Windows 7', '', '', 15, 'http://localhost/kurteyki/courses-detail/ilmu-dari-building-the-dream', ''),
(9, '::1', '2020-05-03 12:02:03', 'Chrome', 'Windows 7', '', '', 14, 'http://localhost/kurteyki/courses-detail/ilmu-dari-adam-khoo', ''),
(10, '::1', '2020-05-03 15:47:23', 'Chrome', 'Windows 10', '', '', 3, 'http://localhost/kurteyki/p/term-and-condition', ''),
(11, '::1', '2020-05-03 15:47:26', 'Chrome', 'Windows 10', '', '', 3, 'http://localhost/kurteyki/p/about', ''),
(12, '::1', '2020-05-03 15:47:32', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/p/privacy-policy', ''),
(13, '::1', '2020-05-03 15:47:33', 'Chrome', 'Windows 10', '', '', 3, 'http://localhost/kurteyki/p/contact', ''),
(14, '::1', '2020-05-03 15:47:34', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/p/help', ''),
(15, '::1', '2020-05-04 15:15:17', 'Chrome', 'Windows 7', '', '', 2, 'http://localhost/kurteyki/', ''),
(16, '::1', '2020-06-11 10:40:43', 'Chrome', 'Windows 10', '', '', 52, 'http://localhost/kurteyki/', ''),
(17, '::1', '2020-06-11 10:42:53', 'Chrome', 'Windows 10', '', '', 9, 'http://localhost/kurteyki/courses-detail/ilmu-dari-building-the-dream', ''),
(18, '::1', '2020-06-11 10:43:33', 'Chrome', 'Windows 10', '', '', 7, 'http://localhost/kurteyki/courses-filter', ''),
(19, '::1', '2020-06-11 11:03:05', 'Chrome', 'Windows 10', '', '', 9, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(20, '::1', '2020-06-11 11:21:11', 'Chrome', 'Windows 10', '', '', 9, 'http://localhost/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(21, '::1', '2020-06-11 11:27:49', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/blog-post/konten-baru-dan-rencana-kedepannya-situs-ini', ''),
(22, '::1', '2020-06-11 14:32:41', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/p/term-and-condition', ''),
(23, '::1', '2020-06-11 17:29:19', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/blog', ''),
(24, '::1', '2020-06-11 17:50:28', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/p/help', ''),
(25, '::1', '2020-06-11 17:50:57', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/p/contact', ''),
(26, '::1', '2020-06-11 17:57:32', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/p/about', ''),
(27, '::1', '2020-06-11 18:02:27', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/site', ''),
(28, '::1', '2020-06-12 06:52:28', 'Chrome', 'Windows 10', '', '', 117, 'http://localhost/kurteyki/', ''),
(29, '::1', '2020-06-12 06:55:00', 'Chrome', 'Android', '', '', 2, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(30, '::1', '2020-06-12 06:56:44', 'Chrome', 'Windows 10', '', '', 9, 'http://localhost/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(31, '::1', '2020-06-12 07:03:26', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/courses-detail/ilmu-dari-building-the-dream', ''),
(32, '::1', '2020-06-12 07:03:42', 'Chrome', 'Windows 10', '', '', 7, 'http://localhost/kurteyki/courses-filter', ''),
(33, '::1', '2020-06-13 07:40:57', 'Chrome', 'Windows 10', '', '', 94, 'http://localhost/kurteyki/', ''),
(34, '::1', '2020-06-13 07:40:57', 'Chrome', 'Windows 10', '', '', 94, 'http://localhost/kurteyki/', ''),
(35, '::1', '2020-06-13 09:06:08', 'Chrome', 'Windows 10', '', '', 29, 'http://localhost/kurteyki/courses-filter', ''),
(36, '::1', '2020-06-13 09:52:01', 'Chrome', 'Windows 10', '', '', 7, 'http://localhost/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(37, '::1', '2020-06-13 13:22:42', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(38, '::1', '2020-06-13 16:36:40', 'Chrome', 'Windows 10', '', '', 4, 'http://localhost/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(39, '::1', '2020-06-13 21:44:41', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(40, '127.0.0.1', '2020-06-14 22:30:23', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/', ''),
(41, '127.0.0.1', '2020-06-14 22:30:23', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/', ''),
(42, '127.0.0.1', '2020-06-14 22:38:16', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/courses-filter', ''),
(43, '::1', '2020-06-15 16:49:16', 'Chrome', 'Windows 10', '', '', 6, 'http://localhost/kurteyki/', ''),
(44, '::1', '2020-06-15 16:49:31', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(45, '::1', '2020-06-15 17:03:17', 'Chrome', 'Windows 10', '', '', 1, 'http://localhost/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(46, '::1', '2020-06-15 17:04:26', 'Chrome', 'Windows 10', '', '', 14, 'http://localhost/kurteyki/courses-filter', ''),
(47, '::1', '2020-06-16 03:38:38', 'Chrome', 'Windows 10', '', '', 71, 'http://localhost/kurteyki/', ''),
(48, '::1', '2020-06-16 03:39:17', 'Chrome', 'Windows 10', '', '', 17, 'http://localhost/kurteyki/courses-filter', ''),
(49, '::1', '2020-06-16 04:40:39', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(50, '::1', '2020-06-16 05:52:16', 'Chrome', 'Windows 10', '', '', 13, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(51, '::1', '2020-06-16 09:54:35', 'Chrome', 'Windows 10', '', '', 5, 'http://localhost/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(52, '::1', '2020-06-16 12:56:41', 'Chrome', 'Windows 10', '', '', 2, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(53, '::1', '2020-06-17 07:03:50', 'Chrome', 'Windows 10', '', '', 23, 'http://localhost/kurteyki/', ''),
(54, '::1', '2020-06-17 07:03:54', 'Chrome', 'Windows 10', '', '', 8, 'http://localhost/kurteyki/courses-filter', ''),
(55, '::1', '2020-06-17 09:11:33', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(56, '::1', '2020-06-17 09:49:10', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(57, '::1', '2020-06-17 09:49:22', 'Chrome', 'Windows 10', 'Other', 'Other', 5, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(58, '::1', '2020-06-18 07:05:04', 'Chrome', 'Windows 10', 'Other', 'Other', 82, 'http://localhost/kurteyki/', ''),
(59, '::1', '2020-06-18 07:05:12', 'Chrome', 'Windows 10', 'Other', 'Other', 28, 'http://localhost/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(60, '::1', '2020-06-18 07:20:41', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/kurteyki/courses-filter', ''),
(61, '::1', '2020-06-18 07:24:58', 'Chrome', 'Windows 10', 'Other', 'Other', 71, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(62, '::1', '2020-06-18 07:36:57', 'Chrome', 'Windows 10', 'Other', 'Other', 103, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(63, '::1', '2020-06-18 08:07:16', 'Chrome', 'Windows 10', 'Other', 'Other', 34, 'http://localhost/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(64, '192.168.43.1', '2020-06-18 22:39:10', 'Chrome', 'Android', 'Other', 'Other', 4, 'http://192.168.43.196/kurteyki/', ''),
(65, '192.168.43.1', '2020-06-18 22:40:11', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://192.168.43.196/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(66, '192.168.43.1', '2020-06-18 22:42:11', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://192.168.43.196/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(67, '192.168.43.1', '2020-06-18 22:43:35', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://192.168.43.196/kurteyki/courses-filter', ''),
(68, '::1', '2020-06-19 08:57:54', 'Chrome', 'Windows 10', 'Other', 'Other', 44, 'http://localhost/kurteyki/', ''),
(69, '::1', '2020-06-19 08:58:09', 'Chrome', 'Windows 10', 'Other', 'Other', 12, 'http://localhost/kurteyki/courses-filter', ''),
(70, '::1', '2020-06-19 10:15:36', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(71, '::1', '2020-06-19 10:42:16', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(72, '192.168.1.11', '2020-06-19 11:04:24', 'Chrome', 'Android', 'Other', 'Other', 40, 'http://192.168.1.11/kurteyki/', ''),
(73, '192.168.1.11', '2020-06-19 11:04:39', 'Chrome', 'Android', 'Other', 'Other', 4, 'http://192.168.1.11/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(74, '192.168.1.11', '2020-06-19 11:05:11', 'Chrome', 'Android', 'Other', 'Other', 20, 'http://192.168.1.11/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(75, '192.168.1.11', '2020-06-19 11:06:56', 'Chrome', 'Android', 'Other', 'Other', 4, 'http://192.168.1.11/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(76, '192.168.1.11', '2020-06-19 11:08:38', 'Chrome', 'Android', 'Other', 'Other', 8, 'http://192.168.1.11/kurteyki/courses-filter', ''),
(77, '::1', '2020-06-19 13:49:28', 'Chrome', 'Windows 10', 'Other', 'Other', 10, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(78, '192.168.1.11', '2020-06-19 14:36:00', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://192.168.1.11/kurteyki/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(79, '192.168.1.2', '2020-06-19 18:51:12', 'Chrome', 'Android', 'Other', 'Other', 4, 'http://192.168.1.11/kurteyki/', ''),
(80, '192.168.1.2', '2020-06-19 18:53:06', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://192.168.1.11/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(81, '::1', '2020-06-24 12:36:02', 'Chrome', 'Windows 10', 'Other', 'Other', 51, 'http://localhost/kurteyki/', ''),
(82, '::1', '2020-06-24 12:36:08', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/kurteyki/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(83, '::1', '2020-06-24 12:37:48', 'Chrome', 'Android', 'Other', 'Other', 4, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(84, '::1', '2020-06-24 12:49:05', 'Chrome', 'Windows 10', 'Other', 'Other', 86, 'http://localhost/kurteyki/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(85, '::1', '2020-06-24 12:50:19', 'Chrome', 'Windows 10', 'Other', 'Other', 6, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(86, '::1', '2020-06-24 23:33:04', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/kurteyki/courses-filter', ''),
(87, '::1', '2020-06-25 00:00:18', 'Chrome', 'Windows 10', 'Other', 'Other', 134, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(88, '::1', '2020-06-25 00:21:32', 'Chrome', 'Windows 10', 'Other', 'Other', 25, 'http://localhost/kurteyki/', ''),
(89, '::1', '2020-06-26 19:21:02', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/kurteyki/', ''),
(90, '::1', '2020-06-26 19:21:16', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/kurteyki/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(91, '::1', '2020-06-26 19:41:51', 'Chrome', 'Windows 10', 'Other', 'Other', 15, 'http://localhost/kurteyki/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(92, '::1', '2020-06-28 23:33:57', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses-master/', ''),
(93, '::1', '2020-06-28 23:37:32', 'Chrome', 'Windows 10', 'Other', 'Other', 10, 'http://localhost/Orbit-Courses/', ''),
(94, '::1', '2020-06-28 23:45:42', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/kurteyki1/', ''),
(95, '::1', '2020-06-28 23:45:45', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/kurteyki1/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(96, '::1', '2020-06-28 23:46:33', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(97, '::1', '2020-06-28 23:46:36', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(98, '::1', '2020-06-28 23:46:41', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(99, '::1', '2020-06-29 00:54:44', 'Chrome', 'Windows 10', 'Other', 'Other', 16, 'http://localhost/Orbit-Courses/', ''),
(100, '::1', '2020-06-29 00:54:49', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(101, '::1', '2020-06-29 00:54:53', 'Chrome', 'Windows 10', 'Other', 'Other', 22, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(102, '::1', '2020-06-30 00:29:50', 'Chrome', 'Windows 10', 'Other', 'Other', 13, 'http://localhost/Orbit-Courses/', ''),
(103, '::1', '2020-06-30 00:29:57', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(104, '::1', '2020-06-30 00:47:01', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(105, '::1', '2020-07-02 13:04:51', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/', ''),
(106, '::1', '2020-07-04 02:22:22', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/', ''),
(107, '::1', '2020-07-05 12:08:00', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/', ''),
(108, '::1', '2020-07-05 14:07:11', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(109, '::1', '2020-07-05 14:16:39', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/kurteyki1/', ''),
(110, '::1', '2020-07-05 14:16:43', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/kurteyki1/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(111, '::1', '2020-07-06 16:17:25', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/', ''),
(112, '::1', '2020-07-06 18:29:41', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(113, '::1', '2020-07-07 00:50:01', 'Chrome', 'Windows 10', 'Other', 'Other', 61, 'http://localhost/Orbit-Courses/', ''),
(114, '::1', '2020-07-07 01:18:42', 'Chrome', 'Windows 10', 'Other', 'Other', 5, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(115, '::1', '2020-07-07 03:30:13', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(116, '::1', '2020-07-07 05:48:50', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/belajar-cara-belajar-dengan-baik', ''),
(117, '::1', '2020-07-07 05:48:59', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(118, '::1', '2020-07-07 06:50:35', 'Chrome', 'Windows 10', 'Other', 'Other', 5, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(119, '::1', '2020-07-07 06:51:19', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/courses-filter', ''),
(120, '::1', '2020-07-07 19:19:45', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses/courses-detail/coba', ''),
(121, '::1', '2020-07-08 12:22:46', 'Chrome', 'Windows 10', 'Other', 'Other', 10, 'http://localhost/Orbit-Courses/', ''),
(122, '::1', '2020-07-08 13:27:35', 'Chrome', 'Windows 10', 'Other', 'Other', 13, 'http://localhost/Orbit-Courses/lms/Forum', ''),
(123, '::1', '2020-07-08 15:28:35', 'Chrome', 'Windows 10', 'Other', 'Other', 7, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(124, '::1', '2020-07-08 16:03:39', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/coba', ''),
(125, '::1', '2020-07-08 16:38:07', 'Chrome', 'Windows 10', 'Other', 'Other', 7, 'http://localhost/Orbit-Courses/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(126, '::1', '2020-07-09 04:23:06', 'Chrome', 'Windows 10', 'Other', 'Other', 12, 'http://localhost/Orbit-Courses/', ''),
(127, '::1', '2020-07-09 06:26:17', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(128, '::1', '2020-07-09 15:17:35', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(129, '::1', '2020-07-09 17:57:16', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/kurteyki1/', ''),
(130, '::1', '2020-07-10 02:24:20', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses/', ''),
(131, '::1', '2020-07-11 02:14:34', 'Chrome', 'Windows 10', 'Other', 'Other', 37, 'http://localhost/Orbit-Courses/', ''),
(132, '::1', '2020-07-11 18:49:34', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(133, '::1', '2020-07-11 18:49:42', 'Chrome', 'Windows 10', 'Other', 'Other', 11, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(134, '::1', '2020-07-11 18:49:43', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(135, '::1', '2020-07-11 19:01:29', 'Chrome', 'Windows 10', 'Other', 'Other', 5, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(136, '::1', '2020-07-12 16:24:49', 'Chrome', 'Windows 10', 'Other', 'Other', 10, 'http://localhost/Orbit-Courses/', ''),
(137, '::1', '2020-07-12 16:25:24', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(138, '::1', '2020-07-12 16:25:29', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(139, '::1', '2020-07-13 15:01:38', 'Chrome', 'Windows 10', 'Other', 'Other', 9, 'http://localhost/Orbit-Courses/', ''),
(140, '::1', '2020-07-13 15:20:31', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/asjdasjdlasj', ''),
(141, '::1', '2020-07-13 17:30:52', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(142, '::1', '2020-07-13 17:30:53', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(143, '::1', '2020-07-13 23:10:36', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-filter', ''),
(144, '::1', '2020-07-14 06:29:14', 'Chrome', 'Windows 10', 'Other', 'Other', 5, 'http://localhost/Orbit-Courses/', ''),
(145, '::1', '2020-07-14 07:32:41', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/asjdasjdlasj', ''),
(146, '::1', '2020-07-14 07:33:04', 'Chrome', 'Windows 10', 'Other', 'Other', 2, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(147, '::1', '2020-07-15 10:50:49', 'Chrome', 'Windows 10', 'Other', 'Other', 42, 'http://localhost/Orbit-Courses/', ''),
(148, '::1', '2020-07-15 11:00:28', 'Chrome', 'Windows 10', 'Other', 'Other', 14, 'http://localhost/Orbit-Courses/courses-detail/asjdasjdlasj', ''),
(149, '::1', '2020-07-15 11:02:19', 'Chrome', 'Windows 10', 'Other', 'Other', 3, 'http://localhost/Orbit-Courses/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(150, '::1', '2020-07-15 11:02:22', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(151, '::1', '2020-07-15 11:02:25', 'Chrome', 'Windows 10', 'Other', 'Other', 6, 'http://localhost/Orbit-Courses/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(152, '::1', '2020-07-15 17:27:45', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-filter', ''),
(153, '::1', '2020-07-15 17:32:22', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/courses-detail/tegapkan-otong-mux', ''),
(154, '::1', '2020-07-15 17:35:28', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(155, '::1', '2020-07-15 17:52:00', 'Chrome', 'Windows 10', 'Other', 'Other', 16, 'http://localhost/Orbit-Courses/courses-detail/aryloverando', ''),
(156, '::1', '2020-07-16 00:29:50', 'Chrome', 'Windows 10', 'Other', 'Other', 4, 'http://localhost/Orbit-Courses/', ''),
(157, '::1', '2020-07-16 00:29:54', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(158, '::1', '2020-07-16 00:32:27', 'Chrome', 'Windows 10', 'Other', 'Other', 1, 'http://localhost/Orbit-Courses/courses-detail/ini-kelas-baru', ''),
(159, '61.94.89.76', '2020-07-16 01:36:27', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 118, 'https://class.uxorbitdesign.com/', ''),
(160, '61.94.89.76', '2020-07-16 01:36:30', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 13, 'https://class.uxorbitdesign.com/courses-detail/tegapkan-otong-mux', ''),
(161, '61.94.89.76, 147.92.179.117', '2020-07-16 10:48:01', 'Unknown Browser', 'Unknown Platform', 'Other', 'Other', 2, 'https://class.uxorbitdesign.com/', ''),
(162, '61.94.89.76', '2020-07-16 12:43:21', 'Chrome', 'Android', 'Indonesia', 'ID', 3, 'https://class.uxorbitdesign.com/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(163, '61.94.89.76', '2020-07-16 12:43:46', 'Chrome', 'Android', 'Indonesia', 'ID', 21, 'https://class.uxorbitdesign.com/courses-detail/ini-kelas-baru-baru', ''),
(164, '61.94.89.76', '2020-07-16 12:44:14', 'Chrome', 'Android', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/aryloverando', ''),
(165, '61.94.89.76', '2020-07-16 12:44:27', 'Chrome', 'Android', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/membuat-sistem-login-lengkap-menggunakan-codeigniter', ''),
(166, '114.5.212.155', '2020-07-16 15:45:02', 'Chrome', 'Android', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/', ''),
(167, '36.79.248.225', '2020-07-16 16:27:09', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 9, 'https://class.uxorbitdesign.com/', ''),
(168, '36.79.248.225', '2020-07-16 16:40:32', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 13, 'https://class.uxorbitdesign.com/courses-detail/tegapkan-otong-mux', ''),
(169, '36.79.248.225', '2020-07-16 16:56:22', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 3, 'https://class.uxorbitdesign.com/courses-detail/ini-kelas-baru-baru', ''),
(170, '36.79.248.225', '2020-07-16 16:57:26', 'Chrome', 'Android', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(171, '36.79.248.225', '2020-07-16 16:57:41', 'Chrome', 'Android', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(172, '61.94.89.76', '2020-07-16 18:51:40', 'Chrome', 'Android', 'Indonesia', 'ID', 7, 'https://class.uxorbitdesign.com/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(173, '61.94.89.76', '2020-07-16 21:59:23', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(174, '61.94.89.76', '2020-07-16 22:35:35', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/kelas-membuat-desain-aplikasi-kursus-online', ''),
(175, '61.94.89.76', '2020-07-17 00:16:15', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 15, 'https://class.uxorbitdesign.com/', ''),
(176, '61.94.89.76', '2020-07-17 00:21:35', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(177, '61.94.89.76', '2020-07-17 00:24:46', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 5, 'https://class.uxorbitdesign.com/courses-detail/kelas-membuat-desain-aplikasi-kursus-online', ''),
(178, '36.79.248.225', '2020-07-17 02:09:07', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 5, 'https://class.uxorbitdesign.com/', ''),
(179, '36.79.248.225', '2020-07-17 02:09:11', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 3, 'https://class.uxorbitdesign.com/courses-detail/kelas-membuat-desain-aplikasi-kursus-online', ''),
(180, '36.79.248.225', '2020-07-17 02:09:17', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/ini-kelas-baru-baru', ''),
(181, '36.79.248.225', '2020-07-17 02:09:43', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/belajar-membangun-aplikasi-android-sederhana', ''),
(182, '36.79.248.225', '2020-07-17 02:10:01', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/belajar-membuat-aplikasi-menggunakan-codeigniter', ''),
(183, '61.94.89.76', '2020-07-17 06:45:03', 'Chrome', 'Android', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/ini-kelas-baru-baru', ''),
(184, '61.94.89.76', '2020-07-17 06:49:32', 'Chrome', 'Android', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/kelas-pemula-membuat-micro-interaction-design', ''),
(185, '61.94.89.76', '2020-07-17 07:32:38', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-filter', ''),
(186, '180.245.181.246', '2020-07-17 11:16:28', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 17, 'https://class.uxorbitdesign.com/', ''),
(187, '180.245.181.246', '2020-07-17 15:14:33', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 3, 'https://class.uxorbitdesign.com/courses-filter', ''),
(188, '180.245.181.246', '2020-07-17 15:14:41', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 11, 'https://class.uxorbitdesign.com/courses-detail/kelas-online-figma-ui-design', ''),
(189, '36.79.248.225', '2020-07-17 16:05:44', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/kelas-online-figma-ui-design', ''),
(190, '192.168.150.20, 36.79.248.225', '2020-07-17 17:51:24', 'Chrome', 'Android', 'Other', 'Other', 3, 'http://class.uxorbitdesign.com/', ''),
(191, '192.168.150.20, 36.79.248.225', '2020-07-17 18:11:32', 'Chrome', 'Android', 'Other', 'Other', 1, 'http://class.uxorbitdesign.com/courses-detail/kelas-online-figma-ui-design', ''),
(192, '114.124.170.54', '2020-07-17 21:15:02', 'Chrome', 'Android', 'Indonesia', 'ID', 4, 'https://class.uxorbitdesign.com/', ''),
(193, '114.124.170.54', '2020-07-17 21:15:10', 'Chrome', 'Android', 'Indonesia', 'ID', 2, 'https://class.uxorbitdesign.com/courses-detail/kelas-online-figma-ui-design', ''),
(194, '114.124.170.54', '2020-07-17 21:31:20', 'Chrome', 'Android', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/kelas-membuat-desain-aplikasi-kursus-online', ''),
(195, '180.245.181.246', '2020-07-17 21:50:39', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 1, 'https://class.uxorbitdesign.com/courses-detail/kelas-membuat-desain-aplikasi-kursus-online', ''),
(196, '180.245.181.246', '2020-07-17 21:51:28', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 9, 'http://class.uxorbitdesign.com/', ''),
(197, '180.245.181.246', '2020-07-17 21:55:14', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 8, 'http://class.uxorbitdesign.com/courses-detail/kelas-online-figma-ui-design', ''),
(198, '180.245.181.246', '2020-07-17 21:56:11', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 1, 'http://class.uxorbitdesign.com/courses-detail/kelas-membuat-desain-aplikasi-kursus-online', ''),
(199, '180.245.181.246', '2020-07-17 21:56:17', 'Chrome', 'Windows 10', 'Indonesia', 'ID', 2, 'http://class.uxorbitdesign.com/courses-detail/ini-kelas-baru-baru', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarik`
--

CREATE TABLE `tb_tarik` (
  `id` int(11) NOT NULL,
  `id_lms_user_payment` varchar(255) NOT NULL,
  `status_penarikan` enum('0','1') NOT NULL,
  `permintaan_id` varchar(255) NOT NULL,
  `tgl_permintaan` datetime NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `bukti_transfer` text NOT NULL,
  `is_read` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tarik`
--

INSERT INTO `tb_tarik` (`id`, `id_lms_user_payment`, `status_penarikan`, `permintaan_id`, `tgl_permintaan`, `tgl_kirim`, `bukti_transfer`, `is_read`) VALUES
(8, '8C7T200711190256', '1', '5ary20200714-082207', '2020-07-14 08:22:07', '2020-07-14 22:22:38', '1539679787858.jpg', '1'),
(11, '8C5T200712162543', '1', '5ary20200714-174900', '2020-07-14 17:49:00', '2020-07-16 22:11:05', 'Log_in.png', '1'),
(23, '4C7T200714074151', '1', '5ary20200715-012903', '2020-07-15 01:29:03', '2020-07-16 22:11:15', 'Annotation_2020-07-09_154946.png', '1'),
(28, '8C4T200707033019', '1', '5ary20200715-034401', '2020-07-15 03:44:01', '2020-07-16 22:11:24', 'admin_orbit_screenshot_1.png', '1'),
(29, '8C4T200707054940', '1', '5ary20200715-034401', '2020-07-15 03:44:01', '2020-07-16 22:11:24', 'admin_orbit_screenshot_1.png', '1'),
(32, '4C19T200715173309', '1', '11opang20200715-221305', '2020-07-15 22:13:05', '2020-07-15 22:15:10', '28667.jpg', '1'),
(37, '41C19T200716221624', '1', '11opang20200717-001538', '2020-07-17 00:15:38', '2020-07-17 00:17:05', 'zr4ZhdEBFjduMsR6GyTp1592017869.png', '1'),
(38, '41C22T200716223609', '1', '11opang20200717-001538', '2020-07-17 00:15:38', '2020-07-17 00:17:05', 'zr4ZhdEBFjduMsR6GyTp1592017869.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_handphone` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `grade` enum('App','User','Instructor') NOT NULL,
  `payment` text NOT NULL,
  `created` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` enum('Active','Blocked','UnActive') NOT NULL DEFAULT 'UnActive',
  `jk` enum('0','1') NOT NULL,
  `institusi` varchar(255) NOT NULL,
  `pekerjaan` enum('0','1','2') NOT NULL,
  `keahlian` varchar(255) NOT NULL,
  `portfolio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_lengkap`, `username`, `password`, `headline`, `email`, `no_handphone`, `photo`, `grade`, `payment`, `created`, `last_login`, `status`, `jk`, `institusi`, `pekerjaan`, `keahlian`, `portfolio`) VALUES
(1, 'UX Orbit Design', 'UXOrbitDesign', '556eacad73fd8c5fb0988f60e904d150cbe37cce', 'Owner', 'admin@uxorbitdesign.com', '085793167490', 'user_photo_20200716110355.png', 'App', '{\"transaction\":[{\"identity\":\"bri20200425130634\",\"type\":\"bri\",\"account_number\":\"1923892138192\",\"receiver\":\"irfan\"},{\"identity\":\"bni20200629221926\",\"type\":\"bni\",\"account_number\":\"84091248\",\"receiver\":\"ashdasdjkasd\"}],\"confirmation\":[{\"identity\":\"whatsapp20200425130641\",\"type\":\"whatsapp\",\"data\":\"6285280815735\"},{\"identity\":\"facebook20200501131607\",\"type\":\"facebook\",\"data\":\"https:\\/\\/www.facebook.com\\/riedayme\"}]}', '0000-00-00 00:00:00', '2020-07-17 22:16:55', 'Active', '0', '', '0', '', ''),
(4, 'Dalih Rusmana', 'DalihRusmana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'UI/UX Designer', 'dalih@gmail.com', '085793167490', 'user_photo_20200715220038.jpg', 'User', '{\"transaction\":[{\"identity\":\"bri20200425130634\",\"type\":\"bri\",\"account_number\":\"1923892138192\",\"receiver\":\"irfan\"},{\"identity\":\"bni20200629221926\",\"type\":\"bni\",\"account_number\":\"84091248\",\"receiver\":\"ashdasdjkasd\"}],\"confirmation\":[{\"identity\":\"whatsapp20200425130641\",\"type\":\"whatsapp\",\"data\":\"6285280815735\"},{\"identity\":\"facebook20200501131607\",\"type\":\"facebook\",\"data\":\"https:\\/\\/www.facebook.com\\/riedayme\"}]}', '2020-06-11 10:44:19', '2020-07-17 22:05:16', 'Active', '0', 'UNIKOM', '0', 'UX Designer', ''),
(11, 'opang', 'opang', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Hokage', 'opang@gmail.com', '081947583459', 'user_photo_20200717144742.jpg', 'Instructor', '', '2020-07-15 11:42:09', '2020-07-17 00:23:49', 'Active', '0', '', '0', '', ''),
(40, 'helmi h', 'helmi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'helmi@gmail.cum', '', '', 'User', '', '2020-07-16 21:55:14', '2020-07-17 21:34:42', 'Active', '0', '', '0', '', ''),
(42, 'Dalih Rusmana', 'dalihrusmana', '377f87eb1fea38d8eff02ede0ed6cf9e778b76ba', 'Product Designer', 'dalihrusmana@gmail.com', '085793167490', 'user_photo_20200717145201.jpg', 'Instructor', '', '2020-07-17 14:52:01', '2020-07-17 22:06:26', 'Active', '0', '', '0', '', ''),
(43, 'Ary Sugiarto', 'arysugiarto', '8cb2237d0679ca88db6464eac60da96345513964', '', 'arysugiarto10@gmail.com', '', '', 'User', '', '2020-07-17 15:21:35', '2020-07-17 21:50:22', 'Active', '0', '', '0', '', ''),
(44, 'Farhan', 'farhan', '829a496eebff40fdac7b104c9ca9ef62ceb8e456', '', 'opangs82@gmail.com', '', 'user_photo_20200717220304.jpg', 'User', '', '2020-07-17 21:54:10', '2020-07-17 21:54:55', 'Active', '0', '', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_contacts`
--

CREATE TABLE `tb_user_contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medium` enum('Facebook','Whatapps','mobile phone') NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_contacts`
--

INSERT INTO `tb_user_contacts` (`id`, `user_id`, `medium`, `description`) VALUES
(5, 1, 'Whatapps', '085793167490'),
(9, 5, 'Whatapps', 'wok'),
(10, 5, 'Facebook', 'xxxxxxxx'),
(11, 5, 'Whatapps', 'wokxxxxxxxxx'),
(15, 11, 'Whatapps', '12345678910');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bank_account`
--
ALTER TABLE `tb_bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lesson_upload`
--
ALTER TABLE `tb_lesson_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_category`
--
ALTER TABLE `tb_lms_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `tb_lms_coupon`
--
ALTER TABLE `tb_lms_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_courses`
--
ALTER TABLE `tb_lms_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permalink` (`permalink`),
  ADD KEY `time` (`time`),
  ADD KEY `status` (`status`),
  ADD KEY `id_tags` (`id_sub_category`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `views` (`views`),
  ADD KEY `image` (`image`);

--
-- Indexes for table `tb_lms_courses_comment`
--
ALTER TABLE `tb_lms_courses_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_courses_forum`
--
ALTER TABLE `tb_lms_courses_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_courses_lesson`
--
ALTER TABLE `tb_lms_courses_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_courses_section`
--
ALTER TABLE `tb_lms_courses_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_template`
--
ALTER TABLE `tb_lms_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tb_lms_template_widget`
--
ALTER TABLE `tb_lms_template_widget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `id_template` (`id_template`);

--
-- Indexes for table `tb_lms_user_courses`
--
ALTER TABLE `tb_lms_user_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_user_lesson`
--
ALTER TABLE `tb_lms_user_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_user_payment`
--
ALTER TABLE `tb_lms_user_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lms_user_review`
--
ALTER TABLE `tb_lms_user_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_courses` (`id_courses`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_site`
--
ALTER TABLE `tb_site`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `tb_site_pages`
--
ALTER TABLE `tb_site_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permalink` (`permalink`,`time`,`status`),
  ADD KEY `time` (`time`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tb_site_visitor`
--
ALTER TABLE `tb_site_visitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`),
  ADD KEY `date` (`date`),
  ADD KEY `hits` (`hits`),
  ADD KEY `url` (`url`);

--
-- Indexes for table `tb_tarik`
--
ALTER TABLE `tb_tarik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_contacts`
--
ALTER TABLE `tb_user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bank_account`
--
ALTER TABLE `tb_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_lesson_upload`
--
ALTER TABLE `tb_lesson_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_lms_category`
--
ALTER TABLE `tb_lms_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_lms_coupon`
--
ALTER TABLE `tb_lms_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_lms_courses`
--
ALTER TABLE `tb_lms_courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_lms_courses_comment`
--
ALTER TABLE `tb_lms_courses_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_lms_courses_forum`
--
ALTER TABLE `tb_lms_courses_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_lms_courses_lesson`
--
ALTER TABLE `tb_lms_courses_lesson`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_lms_courses_section`
--
ALTER TABLE `tb_lms_courses_section`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_lms_template`
--
ALTER TABLE `tb_lms_template`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lms_template_widget`
--
ALTER TABLE `tb_lms_template_widget`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lms_user_courses`
--
ALTER TABLE `tb_lms_user_courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_lms_user_lesson`
--
ALTER TABLE `tb_lms_user_lesson`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_lms_user_review`
--
ALTER TABLE `tb_lms_user_review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_site_pages`
--
ALTER TABLE `tb_site_pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_site_visitor`
--
ALTER TABLE `tb_site_visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `tb_tarik`
--
ALTER TABLE `tb_tarik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user_contacts`
--
ALTER TABLE `tb_user_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
