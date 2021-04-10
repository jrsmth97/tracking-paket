-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 01:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t_xpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `type`, `city_name`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 21, 'Kabupaten', 'Aceh Barat', '23681', NULL, NULL),
(2, 21, 'Kabupaten', 'Aceh Barat Daya', '23764', NULL, NULL),
(3, 21, 'Kabupaten', 'Aceh Besar', '23951', NULL, NULL),
(4, 21, 'Kabupaten', 'Aceh Jaya', '23654', NULL, NULL),
(5, 21, 'Kabupaten', 'Aceh Selatan', '23719', NULL, NULL),
(6, 21, 'Kabupaten', 'Aceh Singkil', '24785', NULL, NULL),
(7, 21, 'Kabupaten', 'Aceh Tamiang', '24476', NULL, NULL),
(8, 21, 'Kabupaten', 'Aceh Tengah', '24511', NULL, NULL),
(9, 21, 'Kabupaten', 'Aceh Tenggara', '24611', NULL, NULL),
(10, 21, 'Kabupaten', 'Aceh Timur', '24454', NULL, NULL),
(11, 21, 'Kabupaten', 'Aceh Utara', '24382', NULL, NULL),
(12, 32, 'Kabupaten', 'Agam', '26411', NULL, NULL),
(13, 23, 'Kabupaten', 'Alor', '85811', NULL, NULL),
(14, 19, 'Kota', 'Ambon', '97222', NULL, NULL),
(15, 34, 'Kabupaten', 'Asahan', '21214', NULL, NULL),
(16, 24, 'Kabupaten', 'Asmat', '99777', NULL, NULL),
(17, 1, 'Kabupaten', 'Badung', '80351', NULL, NULL),
(18, 13, 'Kabupaten', 'Balangan', '71611', NULL, NULL),
(19, 15, 'Kota', 'Balikpapan', '76111', NULL, NULL),
(20, 21, 'Kota', 'Banda Aceh', '23238', NULL, NULL),
(21, 18, 'Kota', 'Bandar Lampung', '35139', NULL, NULL),
(22, 9, 'Kabupaten', 'Bandung', '40311', NULL, NULL),
(23, 9, 'Kota', 'Bandung', '40111', NULL, NULL),
(24, 9, 'Kabupaten', 'Bandung Barat', '40721', NULL, NULL),
(25, 29, 'Kabupaten', 'Banggai', '94711', NULL, NULL),
(26, 29, 'Kabupaten', 'Banggai Kepulauan', '94881', NULL, NULL),
(27, 2, 'Kabupaten', 'Bangka', '33212', NULL, NULL),
(28, 2, 'Kabupaten', 'Bangka Barat', '33315', NULL, NULL),
(29, 2, 'Kabupaten', 'Bangka Selatan', '33719', NULL, NULL),
(30, 2, 'Kabupaten', 'Bangka Tengah', '33613', NULL, NULL),
(31, 11, 'Kabupaten', 'Bangkalan', '69118', NULL, NULL),
(32, 1, 'Kabupaten', 'Bangli', '80619', NULL, NULL),
(33, 13, 'Kabupaten', 'Banjar', '70619', NULL, NULL),
(34, 9, 'Kota', 'Banjar', '46311', NULL, NULL),
(35, 13, 'Kota', 'Banjarbaru', '70712', NULL, NULL),
(36, 13, 'Kota', 'Banjarmasin', '70117', NULL, NULL),
(37, 10, 'Kabupaten', 'Banjarnegara', '53419', NULL, NULL),
(38, 28, 'Kabupaten', 'Bantaeng', '92411', NULL, NULL),
(39, 5, 'Kabupaten', 'Bantul', '55715', NULL, NULL),
(40, 33, 'Kabupaten', 'Banyuasin', '30911', NULL, NULL),
(41, 10, 'Kabupaten', 'Banyumas', '53114', NULL, NULL),
(42, 11, 'Kabupaten', 'Banyuwangi', '68416', NULL, NULL),
(43, 13, 'Kabupaten', 'Barito Kuala', '70511', NULL, NULL),
(44, 14, 'Kabupaten', 'Barito Selatan', '73711', NULL, NULL),
(45, 14, 'Kabupaten', 'Barito Timur', '73671', NULL, NULL),
(46, 14, 'Kabupaten', 'Barito Utara', '73881', NULL, NULL),
(47, 28, 'Kabupaten', 'Barru', '90719', NULL, NULL),
(48, 17, 'Kota', 'Batam', '29413', NULL, NULL),
(49, 10, 'Kabupaten', 'Batang', '51211', NULL, NULL),
(50, 8, 'Kabupaten', 'Batang Hari', '36613', NULL, NULL),
(51, 11, 'Kota', 'Batu', '65311', NULL, NULL),
(52, 34, 'Kabupaten', 'Batu Bara', '21655', NULL, NULL),
(53, 30, 'Kota', 'Bau-Bau', '93719', NULL, NULL),
(54, 9, 'Kabupaten', 'Bekasi', '17837', NULL, NULL),
(55, 9, 'Kota', 'Bekasi', '17121', NULL, NULL),
(56, 2, 'Kabupaten', 'Belitung', '33419', NULL, NULL),
(57, 2, 'Kabupaten', 'Belitung Timur', '33519', NULL, NULL),
(58, 23, 'Kabupaten', 'Belu', '85711', NULL, NULL),
(59, 21, 'Kabupaten', 'Bener Meriah', '24581', NULL, NULL),
(60, 26, 'Kabupaten', 'Bengkalis', '28719', NULL, NULL),
(61, 12, 'Kabupaten', 'Bengkayang', '79213', NULL, NULL),
(62, 4, 'Kota', 'Bengkulu', '38229', NULL, NULL),
(63, 4, 'Kabupaten', 'Bengkulu Selatan', '38519', NULL, NULL),
(64, 4, 'Kabupaten', 'Bengkulu Tengah', '38319', NULL, NULL),
(65, 4, 'Kabupaten', 'Bengkulu Utara', '38619', NULL, NULL),
(66, 15, 'Kabupaten', 'Berau', '77311', NULL, NULL),
(67, 24, 'Kabupaten', 'Biak Numfor', '98119', NULL, NULL),
(68, 22, 'Kabupaten', 'Bima', '84171', NULL, NULL),
(69, 22, 'Kota', 'Bima', '84139', NULL, NULL),
(70, 34, 'Kota', 'Binjai', '20712', NULL, NULL),
(71, 17, 'Kabupaten', 'Bintan', '29135', NULL, NULL),
(72, 21, 'Kabupaten', 'Bireuen', '24219', NULL, NULL),
(73, 31, 'Kota', 'Bitung', '95512', NULL, NULL),
(74, 11, 'Kabupaten', 'Blitar', '66171', NULL, NULL),
(75, 11, 'Kota', 'Blitar', '66124', NULL, NULL),
(76, 10, 'Kabupaten', 'Blora', '58219', NULL, NULL),
(77, 7, 'Kabupaten', 'Boalemo', '96319', NULL, NULL),
(78, 9, 'Kabupaten', 'Bogor', '16911', NULL, NULL),
(79, 9, 'Kota', 'Bogor', '16119', NULL, NULL),
(80, 11, 'Kabupaten', 'Bojonegoro', '62119', NULL, NULL),
(81, 31, 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '95755', NULL, NULL),
(82, 31, 'Kabupaten', 'Bolaang Mongondow Selatan', '95774', NULL, NULL),
(83, 31, 'Kabupaten', 'Bolaang Mongondow Timur', '95783', NULL, NULL),
(84, 31, 'Kabupaten', 'Bolaang Mongondow Utara', '95765', NULL, NULL),
(85, 30, 'Kabupaten', 'Bombana', '93771', NULL, NULL),
(86, 11, 'Kabupaten', 'Bondowoso', '68219', NULL, NULL),
(87, 28, 'Kabupaten', 'Bone', '92713', NULL, NULL),
(88, 7, 'Kabupaten', 'Bone Bolango', '96511', NULL, NULL),
(89, 15, 'Kota', 'Bontang', '75313', NULL, NULL),
(90, 24, 'Kabupaten', 'Boven Digoel', '99662', NULL, NULL),
(91, 10, 'Kabupaten', 'Boyolali', '57312', NULL, NULL),
(92, 10, 'Kabupaten', 'Brebes', '52212', NULL, NULL),
(93, 32, 'Kota', 'Bukittinggi', '26115', NULL, NULL),
(94, 1, 'Kabupaten', 'Buleleng', '81111', NULL, NULL),
(95, 28, 'Kabupaten', 'Bulukumba', '92511', NULL, NULL),
(96, 16, 'Kabupaten', 'Bulungan (Bulongan)', '77211', NULL, NULL),
(97, 8, 'Kabupaten', 'Bungo', '37216', NULL, NULL),
(98, 29, 'Kabupaten', 'Buol', '94564', NULL, NULL),
(99, 19, 'Kabupaten', 'Buru', '97371', NULL, NULL),
(100, 19, 'Kabupaten', 'Buru Selatan', '97351', NULL, NULL),
(101, 30, 'Kabupaten', 'Buton', '93754', NULL, NULL),
(102, 30, 'Kabupaten', 'Buton Utara', '93745', NULL, NULL),
(103, 9, 'Kabupaten', 'Ciamis', '46211', NULL, NULL),
(104, 9, 'Kabupaten', 'Cianjur', '43217', NULL, NULL),
(105, 10, 'Kabupaten', 'Cilacap', '53211', NULL, NULL),
(106, 3, 'Kota', 'Cilegon', '42417', NULL, NULL),
(107, 9, 'Kota', 'Cimahi', '40512', NULL, NULL),
(108, 9, 'Kabupaten', 'Cirebon', '45611', NULL, NULL),
(109, 9, 'Kota', 'Cirebon', '45116', NULL, NULL),
(110, 34, 'Kabupaten', 'Dairi', '22211', NULL, NULL),
(111, 24, 'Kabupaten', 'Deiyai (Deliyai)', '98784', NULL, NULL),
(112, 34, 'Kabupaten', 'Deli Serdang', '20511', NULL, NULL),
(113, 10, 'Kabupaten', 'Demak', '59519', NULL, NULL),
(114, 1, 'Kota', 'Denpasar', '80227', NULL, NULL),
(115, 9, 'Kota', 'Depok', '16416', NULL, NULL),
(116, 32, 'Kabupaten', 'Dharmasraya', '27612', NULL, NULL),
(117, 24, 'Kabupaten', 'Dogiyai', '98866', NULL, NULL),
(118, 22, 'Kabupaten', 'Dompu', '84217', NULL, NULL),
(119, 29, 'Kabupaten', 'Donggala', '94341', NULL, NULL),
(120, 26, 'Kota', 'Dumai', '28811', NULL, NULL),
(121, 33, 'Kabupaten', 'Empat Lawang', '31811', NULL, NULL),
(122, 23, 'Kabupaten', 'Ende', '86351', NULL, NULL),
(123, 28, 'Kabupaten', 'Enrekang', '91719', NULL, NULL),
(124, 25, 'Kabupaten', 'Fakfak', '98651', NULL, NULL),
(125, 23, 'Kabupaten', 'Flores Timur', '86213', NULL, NULL),
(126, 9, 'Kabupaten', 'Garut', '44126', NULL, NULL),
(127, 21, 'Kabupaten', 'Gayo Lues', '24653', NULL, NULL),
(128, 1, 'Kabupaten', 'Gianyar', '80519', NULL, NULL),
(129, 7, 'Kabupaten', 'Gorontalo', '96218', NULL, NULL),
(130, 7, 'Kota', 'Gorontalo', '96115', NULL, NULL),
(131, 7, 'Kabupaten', 'Gorontalo Utara', '96611', NULL, NULL),
(132, 28, 'Kabupaten', 'Gowa', '92111', NULL, NULL),
(133, 11, 'Kabupaten', 'Gresik', '61115', NULL, NULL),
(134, 10, 'Kabupaten', 'Grobogan', '58111', NULL, NULL),
(135, 5, 'Kabupaten', 'Gunung Kidul', '55812', NULL, NULL),
(136, 14, 'Kabupaten', 'Gunung Mas', '74511', NULL, NULL),
(137, 34, 'Kota', 'Gunungsitoli', '22813', NULL, NULL),
(138, 20, 'Kabupaten', 'Halmahera Barat', '97757', NULL, NULL),
(139, 20, 'Kabupaten', 'Halmahera Selatan', '97911', NULL, NULL),
(140, 20, 'Kabupaten', 'Halmahera Tengah', '97853', NULL, NULL),
(141, 20, 'Kabupaten', 'Halmahera Timur', '97862', NULL, NULL),
(142, 20, 'Kabupaten', 'Halmahera Utara', '97762', NULL, NULL),
(143, 13, 'Kabupaten', 'Hulu Sungai Selatan', '71212', NULL, NULL),
(144, 13, 'Kabupaten', 'Hulu Sungai Tengah', '71313', NULL, NULL),
(145, 13, 'Kabupaten', 'Hulu Sungai Utara', '71419', NULL, NULL),
(146, 34, 'Kabupaten', 'Humbang Hasundutan', '22457', NULL, NULL),
(147, 26, 'Kabupaten', 'Indragiri Hilir', '29212', NULL, NULL),
(148, 26, 'Kabupaten', 'Indragiri Hulu', '29319', NULL, NULL),
(149, 9, 'Kabupaten', 'Indramayu', '45214', NULL, NULL),
(150, 24, 'Kabupaten', 'Intan Jaya', '98771', NULL, NULL),
(151, 6, 'Kota', 'Jakarta Barat', '11220', NULL, NULL),
(152, 6, 'Kota', 'Jakarta Pusat', '10540', NULL, NULL),
(153, 6, 'Kota', 'Jakarta Selatan', '12230', NULL, NULL),
(154, 6, 'Kota', 'Jakarta Timur', '13330', NULL, NULL),
(155, 6, 'Kota', 'Jakarta Utara', '14140', NULL, NULL),
(156, 8, 'Kota', 'Jambi', '36111', NULL, NULL),
(157, 24, 'Kabupaten', 'Jayapura', '99352', NULL, NULL),
(158, 24, 'Kota', 'Jayapura', '99114', NULL, NULL),
(159, 24, 'Kabupaten', 'Jayawijaya', '99511', NULL, NULL),
(160, 11, 'Kabupaten', 'Jember', '68113', NULL, NULL),
(161, 1, 'Kabupaten', 'Jembrana', '82251', NULL, NULL),
(162, 28, 'Kabupaten', 'Jeneponto', '92319', NULL, NULL),
(163, 10, 'Kabupaten', 'Jepara', '59419', NULL, NULL),
(164, 11, 'Kabupaten', 'Jombang', '61415', NULL, NULL),
(165, 25, 'Kabupaten', 'Kaimana', '98671', NULL, NULL),
(166, 26, 'Kabupaten', 'Kampar', '28411', NULL, NULL),
(167, 14, 'Kabupaten', 'Kapuas', '73583', NULL, NULL),
(168, 12, 'Kabupaten', 'Kapuas Hulu', '78719', NULL, NULL),
(169, 10, 'Kabupaten', 'Karanganyar', '57718', NULL, NULL),
(170, 1, 'Kabupaten', 'Karangasem', '80819', NULL, NULL),
(171, 9, 'Kabupaten', 'Karawang', '41311', NULL, NULL),
(172, 17, 'Kabupaten', 'Karimun', '29611', NULL, NULL),
(173, 34, 'Kabupaten', 'Karo', '22119', NULL, NULL),
(174, 14, 'Kabupaten', 'Katingan', '74411', NULL, NULL),
(175, 4, 'Kabupaten', 'Kaur', '38911', NULL, NULL),
(176, 12, 'Kabupaten', 'Kayong Utara', '78852', NULL, NULL),
(177, 10, 'Kabupaten', 'Kebumen', '54319', NULL, NULL),
(178, 11, 'Kabupaten', 'Kediri', '64184', NULL, NULL),
(179, 11, 'Kota', 'Kediri', '64125', NULL, NULL),
(180, 24, 'Kabupaten', 'Keerom', '99461', NULL, NULL),
(181, 10, 'Kabupaten', 'Kendal', '51314', NULL, NULL),
(182, 30, 'Kota', 'Kendari', '93126', NULL, NULL),
(183, 4, 'Kabupaten', 'Kepahiang', '39319', NULL, NULL),
(184, 17, 'Kabupaten', 'Kepulauan Anambas', '29991', NULL, NULL),
(185, 19, 'Kabupaten', 'Kepulauan Aru', '97681', NULL, NULL),
(186, 32, 'Kabupaten', 'Kepulauan Mentawai', '25771', NULL, NULL),
(187, 26, 'Kabupaten', 'Kepulauan Meranti', '28791', NULL, NULL),
(188, 31, 'Kabupaten', 'Kepulauan Sangihe', '95819', NULL, NULL),
(189, 6, 'Kabupaten', 'Kepulauan Seribu', '14550', NULL, NULL),
(190, 31, 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862', NULL, NULL),
(191, 20, 'Kabupaten', 'Kepulauan Sula', '97995', NULL, NULL),
(192, 31, 'Kabupaten', 'Kepulauan Talaud', '95885', NULL, NULL),
(193, 24, 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '98211', NULL, NULL),
(194, 8, 'Kabupaten', 'Kerinci', '37167', NULL, NULL),
(195, 12, 'Kabupaten', 'Ketapang', '78874', NULL, NULL),
(196, 10, 'Kabupaten', 'Klaten', '57411', NULL, NULL),
(197, 1, 'Kabupaten', 'Klungkung', '80719', NULL, NULL),
(198, 30, 'Kabupaten', 'Kolaka', '93511', NULL, NULL),
(199, 30, 'Kabupaten', 'Kolaka Utara', '93911', NULL, NULL),
(200, 30, 'Kabupaten', 'Konawe', '93411', NULL, NULL),
(201, 30, 'Kabupaten', 'Konawe Selatan', '93811', NULL, NULL),
(202, 30, 'Kabupaten', 'Konawe Utara', '93311', NULL, NULL),
(203, 13, 'Kabupaten', 'Kotabaru', '72119', NULL, NULL),
(204, 31, 'Kota', 'Kotamobagu', '95711', NULL, NULL),
(205, 14, 'Kabupaten', 'Kotawaringin Barat', '74119', NULL, NULL),
(206, 14, 'Kabupaten', 'Kotawaringin Timur', '74364', NULL, NULL),
(207, 26, 'Kabupaten', 'Kuantan Singingi', '29519', NULL, NULL),
(208, 12, 'Kabupaten', 'Kubu Raya', '78311', NULL, NULL),
(209, 10, 'Kabupaten', 'Kudus', '59311', NULL, NULL),
(210, 5, 'Kabupaten', 'Kulon Progo', '55611', NULL, NULL),
(211, 9, 'Kabupaten', 'Kuningan', '45511', NULL, NULL),
(212, 23, 'Kabupaten', 'Kupang', '85362', NULL, NULL),
(213, 23, 'Kota', 'Kupang', '85119', NULL, NULL),
(214, 15, 'Kabupaten', 'Kutai Barat', '75711', NULL, NULL),
(215, 15, 'Kabupaten', 'Kutai Kartanegara', '75511', NULL, NULL),
(216, 15, 'Kabupaten', 'Kutai Timur', '75611', NULL, NULL),
(217, 34, 'Kabupaten', 'Labuhan Batu', '21412', NULL, NULL),
(218, 34, 'Kabupaten', 'Labuhan Batu Selatan', '21511', NULL, NULL),
(219, 34, 'Kabupaten', 'Labuhan Batu Utara', '21711', NULL, NULL),
(220, 33, 'Kabupaten', 'Lahat', '31419', NULL, NULL),
(221, 14, 'Kabupaten', 'Lamandau', '74611', NULL, NULL),
(222, 11, 'Kabupaten', 'Lamongan', '64125', NULL, NULL),
(223, 18, 'Kabupaten', 'Lampung Barat', '34814', NULL, NULL),
(224, 18, 'Kabupaten', 'Lampung Selatan', '35511', NULL, NULL),
(225, 18, 'Kabupaten', 'Lampung Tengah', '34212', NULL, NULL),
(226, 18, 'Kabupaten', 'Lampung Timur', '34319', NULL, NULL),
(227, 18, 'Kabupaten', 'Lampung Utara', '34516', NULL, NULL),
(228, 12, 'Kabupaten', 'Landak', '78319', NULL, NULL),
(229, 34, 'Kabupaten', 'Langkat', '20811', NULL, NULL),
(230, 21, 'Kota', 'Langsa', '24412', NULL, NULL),
(231, 24, 'Kabupaten', 'Lanny Jaya', '99531', NULL, NULL),
(232, 3, 'Kabupaten', 'Lebak', '42319', NULL, NULL),
(233, 4, 'Kabupaten', 'Lebong', '39264', NULL, NULL),
(234, 23, 'Kabupaten', 'Lembata', '86611', NULL, NULL),
(235, 21, 'Kota', 'Lhokseumawe', '24352', NULL, NULL),
(236, 32, 'Kabupaten', 'Lima Puluh Koto/Kota', '26671', NULL, NULL),
(237, 17, 'Kabupaten', 'Lingga', '29811', NULL, NULL),
(238, 22, 'Kabupaten', 'Lombok Barat', '83311', NULL, NULL),
(239, 22, 'Kabupaten', 'Lombok Tengah', '83511', NULL, NULL),
(240, 22, 'Kabupaten', 'Lombok Timur', '83612', NULL, NULL),
(241, 22, 'Kabupaten', 'Lombok Utara', '83711', NULL, NULL),
(242, 33, 'Kota', 'Lubuk Linggau', '31614', NULL, NULL),
(243, 11, 'Kabupaten', 'Lumajang', '67319', NULL, NULL),
(244, 28, 'Kabupaten', 'Luwu', '91994', NULL, NULL),
(245, 28, 'Kabupaten', 'Luwu Timur', '92981', NULL, NULL),
(246, 28, 'Kabupaten', 'Luwu Utara', '92911', NULL, NULL),
(247, 11, 'Kabupaten', 'Madiun', '63153', NULL, NULL),
(248, 11, 'Kota', 'Madiun', '63122', NULL, NULL),
(249, 10, 'Kabupaten', 'Magelang', '56519', NULL, NULL),
(250, 10, 'Kota', 'Magelang', '56133', NULL, NULL),
(251, 11, 'Kabupaten', 'Magetan', '63314', NULL, NULL),
(252, 9, 'Kabupaten', 'Majalengka', '45412', NULL, NULL),
(253, 27, 'Kabupaten', 'Majene', '91411', NULL, NULL),
(254, 28, 'Kota', 'Makassar', '90111', NULL, NULL),
(255, 11, 'Kabupaten', 'Malang', '65163', NULL, NULL),
(256, 11, 'Kota', 'Malang', '65112', NULL, NULL),
(257, 16, 'Kabupaten', 'Malinau', '77511', NULL, NULL),
(258, 19, 'Kabupaten', 'Maluku Barat Daya', '97451', NULL, NULL),
(259, 19, 'Kabupaten', 'Maluku Tengah', '97513', NULL, NULL),
(260, 19, 'Kabupaten', 'Maluku Tenggara', '97651', NULL, NULL),
(261, 19, 'Kabupaten', 'Maluku Tenggara Barat', '97465', NULL, NULL),
(262, 27, 'Kabupaten', 'Mamasa', '91362', NULL, NULL),
(263, 24, 'Kabupaten', 'Mamberamo Raya', '99381', NULL, NULL),
(264, 24, 'Kabupaten', 'Mamberamo Tengah', '99553', NULL, NULL),
(265, 27, 'Kabupaten', 'Mamuju', '91519', NULL, NULL),
(266, 27, 'Kabupaten', 'Mamuju Utara', '91571', NULL, NULL),
(267, 31, 'Kota', 'Manado', '95247', NULL, NULL),
(268, 34, 'Kabupaten', 'Mandailing Natal', '22916', NULL, NULL),
(269, 23, 'Kabupaten', 'Manggarai', '86551', NULL, NULL),
(270, 23, 'Kabupaten', 'Manggarai Barat', '86711', NULL, NULL),
(271, 23, 'Kabupaten', 'Manggarai Timur', '86811', NULL, NULL),
(272, 25, 'Kabupaten', 'Manokwari', '98311', NULL, NULL),
(273, 25, 'Kabupaten', 'Manokwari Selatan', '98355', NULL, NULL),
(274, 24, 'Kabupaten', 'Mappi', '99853', NULL, NULL),
(275, 28, 'Kabupaten', 'Maros', '90511', NULL, NULL),
(276, 22, 'Kota', 'Mataram', '83131', NULL, NULL),
(277, 25, 'Kabupaten', 'Maybrat', '98051', NULL, NULL),
(278, 34, 'Kota', 'Medan', '20228', NULL, NULL),
(279, 12, 'Kabupaten', 'Melawi', '78619', NULL, NULL),
(280, 8, 'Kabupaten', 'Merangin', '37319', NULL, NULL),
(281, 24, 'Kabupaten', 'Merauke', '99613', NULL, NULL),
(282, 18, 'Kabupaten', 'Mesuji', '34911', NULL, NULL),
(283, 18, 'Kota', 'Metro', '34111', NULL, NULL),
(284, 24, 'Kabupaten', 'Mimika', '99962', NULL, NULL),
(285, 31, 'Kabupaten', 'Minahasa', '95614', NULL, NULL),
(286, 31, 'Kabupaten', 'Minahasa Selatan', '95914', NULL, NULL),
(287, 31, 'Kabupaten', 'Minahasa Tenggara', '95995', NULL, NULL),
(288, 31, 'Kabupaten', 'Minahasa Utara', '95316', NULL, NULL),
(289, 11, 'Kabupaten', 'Mojokerto', '61382', NULL, NULL),
(290, 11, 'Kota', 'Mojokerto', '61316', NULL, NULL),
(291, 29, 'Kabupaten', 'Morowali', '94911', NULL, NULL),
(292, 33, 'Kabupaten', 'Muara Enim', '31315', NULL, NULL),
(293, 8, 'Kabupaten', 'Muaro Jambi', '36311', NULL, NULL),
(294, 4, 'Kabupaten', 'Muko Muko', '38715', NULL, NULL),
(295, 30, 'Kabupaten', 'Muna', '93611', NULL, NULL),
(296, 14, 'Kabupaten', 'Murung Raya', '73911', NULL, NULL),
(297, 33, 'Kabupaten', 'Musi Banyuasin', '30719', NULL, NULL),
(298, 33, 'Kabupaten', 'Musi Rawas', '31661', NULL, NULL),
(299, 24, 'Kabupaten', 'Nabire', '98816', NULL, NULL),
(300, 21, 'Kabupaten', 'Nagan Raya', '23674', NULL, NULL),
(301, 23, 'Kabupaten', 'Nagekeo', '86911', NULL, NULL),
(302, 17, 'Kabupaten', 'Natuna', '29711', NULL, NULL),
(303, 24, 'Kabupaten', 'Nduga', '99541', NULL, NULL),
(304, 23, 'Kabupaten', 'Ngada', '86413', NULL, NULL),
(305, 11, 'Kabupaten', 'Nganjuk', '64414', NULL, NULL),
(306, 11, 'Kabupaten', 'Ngawi', '63219', NULL, NULL),
(307, 34, 'Kabupaten', 'Nias', '22876', NULL, NULL),
(308, 34, 'Kabupaten', 'Nias Barat', '22895', NULL, NULL),
(309, 34, 'Kabupaten', 'Nias Selatan', '22865', NULL, NULL),
(310, 34, 'Kabupaten', 'Nias Utara', '22856', NULL, NULL),
(311, 16, 'Kabupaten', 'Nunukan', '77421', NULL, NULL),
(312, 33, 'Kabupaten', 'Ogan Ilir', '30811', NULL, NULL),
(313, 33, 'Kabupaten', 'Ogan Komering Ilir', '30618', NULL, NULL),
(314, 33, 'Kabupaten', 'Ogan Komering Ulu', '32112', NULL, NULL),
(315, 33, 'Kabupaten', 'Ogan Komering Ulu Selatan', '32211', NULL, NULL),
(316, 33, 'Kabupaten', 'Ogan Komering Ulu Timur', '32312', NULL, NULL),
(317, 11, 'Kabupaten', 'Pacitan', '63512', NULL, NULL),
(318, 32, 'Kota', 'Padang', '25112', NULL, NULL),
(319, 34, 'Kabupaten', 'Padang Lawas', '22763', NULL, NULL),
(320, 34, 'Kabupaten', 'Padang Lawas Utara', '22753', NULL, NULL),
(321, 32, 'Kota', 'Padang Panjang', '27122', NULL, NULL),
(322, 32, 'Kabupaten', 'Padang Pariaman', '25583', NULL, NULL),
(323, 34, 'Kota', 'Padang Sidempuan', '22727', NULL, NULL),
(324, 33, 'Kota', 'Pagar Alam', '31512', NULL, NULL),
(325, 34, 'Kabupaten', 'Pakpak Bharat', '22272', NULL, NULL),
(326, 14, 'Kota', 'Palangka Raya', '73112', NULL, NULL),
(327, 33, 'Kota', 'Palembang', '30111', NULL, NULL),
(328, 28, 'Kota', 'Palopo', '91911', NULL, NULL),
(329, 29, 'Kota', 'Palu', '94111', NULL, NULL),
(330, 11, 'Kabupaten', 'Pamekasan', '69319', NULL, NULL),
(331, 3, 'Kabupaten', 'Pandeglang', '42212', NULL, NULL),
(332, 9, 'Kabupaten', 'Pangandaran', '46511', NULL, NULL),
(333, 28, 'Kabupaten', 'Pangkajene Kepulauan', '90611', NULL, NULL),
(334, 2, 'Kota', 'Pangkal Pinang', '33115', NULL, NULL),
(335, 24, 'Kabupaten', 'Paniai', '98765', NULL, NULL),
(336, 28, 'Kota', 'Parepare', '91123', NULL, NULL),
(337, 32, 'Kota', 'Pariaman', '25511', NULL, NULL),
(338, 29, 'Kabupaten', 'Parigi Moutong', '94411', NULL, NULL),
(339, 32, 'Kabupaten', 'Pasaman', '26318', NULL, NULL),
(340, 32, 'Kabupaten', 'Pasaman Barat', '26511', NULL, NULL),
(341, 15, 'Kabupaten', 'Paser', '76211', NULL, NULL),
(342, 11, 'Kabupaten', 'Pasuruan', '67153', NULL, NULL),
(343, 11, 'Kota', 'Pasuruan', '67118', NULL, NULL),
(344, 10, 'Kabupaten', 'Pati', '59114', NULL, NULL),
(345, 32, 'Kota', 'Payakumbuh', '26213', NULL, NULL),
(346, 25, 'Kabupaten', 'Pegunungan Arfak', '98354', NULL, NULL),
(347, 24, 'Kabupaten', 'Pegunungan Bintang', '99573', NULL, NULL),
(348, 10, 'Kabupaten', 'Pekalongan', '51161', NULL, NULL),
(349, 10, 'Kota', 'Pekalongan', '51122', NULL, NULL),
(350, 26, 'Kota', 'Pekanbaru', '28112', NULL, NULL),
(351, 26, 'Kabupaten', 'Pelalawan', '28311', NULL, NULL),
(352, 10, 'Kabupaten', 'Pemalang', '52319', NULL, NULL),
(353, 34, 'Kota', 'Pematang Siantar', '21126', NULL, NULL),
(354, 15, 'Kabupaten', 'Penajam Paser Utara', '76311', NULL, NULL),
(355, 18, 'Kabupaten', 'Pesawaran', '35312', NULL, NULL),
(356, 18, 'Kabupaten', 'Pesisir Barat', '35974', NULL, NULL),
(357, 32, 'Kabupaten', 'Pesisir Selatan', '25611', NULL, NULL),
(358, 21, 'Kabupaten', 'Pidie', '24116', NULL, NULL),
(359, 21, 'Kabupaten', 'Pidie Jaya', '24186', NULL, NULL),
(360, 28, 'Kabupaten', 'Pinrang', '91251', NULL, NULL),
(361, 7, 'Kabupaten', 'Pohuwato', '96419', NULL, NULL),
(362, 27, 'Kabupaten', 'Polewali Mandar', '91311', NULL, NULL),
(363, 11, 'Kabupaten', 'Ponorogo', '63411', NULL, NULL),
(364, 12, 'Kabupaten', 'Pontianak', '78971', NULL, NULL),
(365, 12, 'Kota', 'Pontianak', '78112', NULL, NULL),
(366, 29, 'Kabupaten', 'Poso', '94615', NULL, NULL),
(367, 33, 'Kota', 'Prabumulih', '31121', NULL, NULL),
(368, 18, 'Kabupaten', 'Pringsewu', '35719', NULL, NULL),
(369, 11, 'Kabupaten', 'Probolinggo', '67282', NULL, NULL),
(370, 11, 'Kota', 'Probolinggo', '67215', NULL, NULL),
(371, 14, 'Kabupaten', 'Pulang Pisau', '74811', NULL, NULL),
(372, 20, 'Kabupaten', 'Pulau Morotai', '97771', NULL, NULL),
(373, 24, 'Kabupaten', 'Puncak', '98981', NULL, NULL),
(374, 24, 'Kabupaten', 'Puncak Jaya', '98979', NULL, NULL),
(375, 10, 'Kabupaten', 'Purbalingga', '53312', NULL, NULL),
(376, 9, 'Kabupaten', 'Purwakarta', '41119', NULL, NULL),
(377, 10, 'Kabupaten', 'Purworejo', '54111', NULL, NULL),
(378, 25, 'Kabupaten', 'Raja Ampat', '98489', NULL, NULL),
(379, 4, 'Kabupaten', 'Rejang Lebong', '39112', NULL, NULL),
(380, 10, 'Kabupaten', 'Rembang', '59219', NULL, NULL),
(381, 26, 'Kabupaten', 'Rokan Hilir', '28992', NULL, NULL),
(382, 26, 'Kabupaten', 'Rokan Hulu', '28511', NULL, NULL),
(383, 23, 'Kabupaten', 'Rote Ndao', '85982', NULL, NULL),
(384, 21, 'Kota', 'Sabang', '23512', NULL, NULL),
(385, 23, 'Kabupaten', 'Sabu Raijua', '85391', NULL, NULL),
(386, 10, 'Kota', 'Salatiga', '50711', NULL, NULL),
(387, 15, 'Kota', 'Samarinda', '75133', NULL, NULL),
(388, 12, 'Kabupaten', 'Sambas', '79453', NULL, NULL),
(389, 34, 'Kabupaten', 'Samosir', '22392', NULL, NULL),
(390, 11, 'Kabupaten', 'Sampang', '69219', NULL, NULL),
(391, 12, 'Kabupaten', 'Sanggau', '78557', NULL, NULL),
(392, 24, 'Kabupaten', 'Sarmi', '99373', NULL, NULL),
(393, 8, 'Kabupaten', 'Sarolangun', '37419', NULL, NULL),
(394, 32, 'Kota', 'Sawah Lunto', '27416', NULL, NULL),
(395, 12, 'Kabupaten', 'Sekadau', '79583', NULL, NULL),
(396, 28, 'Kabupaten', 'Selayar (Kepulauan Selayar)', '92812', NULL, NULL),
(397, 4, 'Kabupaten', 'Seluma', '38811', NULL, NULL),
(398, 10, 'Kabupaten', 'Semarang', '50511', NULL, NULL),
(399, 10, 'Kota', 'Semarang', '50135', NULL, NULL),
(400, 19, 'Kabupaten', 'Seram Bagian Barat', '97561', NULL, NULL),
(401, 19, 'Kabupaten', 'Seram Bagian Timur', '97581', NULL, NULL),
(402, 3, 'Kabupaten', 'Serang', '42182', NULL, NULL),
(403, 3, 'Kota', 'Serang', '42111', NULL, NULL),
(404, 34, 'Kabupaten', 'Serdang Bedagai', '20915', NULL, NULL),
(405, 14, 'Kabupaten', 'Seruyan', '74211', NULL, NULL),
(406, 26, 'Kabupaten', 'Siak', '28623', NULL, NULL),
(407, 34, 'Kota', 'Sibolga', '22522', NULL, NULL),
(408, 28, 'Kabupaten', 'Sidenreng Rappang/Rapang', '91613', NULL, NULL),
(409, 11, 'Kabupaten', 'Sidoarjo', '61219', NULL, NULL),
(410, 29, 'Kabupaten', 'Sigi', '94364', NULL, NULL),
(411, 32, 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '27511', NULL, NULL),
(412, 23, 'Kabupaten', 'Sikka', '86121', NULL, NULL),
(413, 34, 'Kabupaten', 'Simalungun', '21162', NULL, NULL),
(414, 21, 'Kabupaten', 'Simeulue', '23891', NULL, NULL),
(415, 12, 'Kota', 'Singkawang', '79117', NULL, NULL),
(416, 28, 'Kabupaten', 'Sinjai', '92615', NULL, NULL),
(417, 12, 'Kabupaten', 'Sintang', '78619', NULL, NULL),
(418, 11, 'Kabupaten', 'Situbondo', '68316', NULL, NULL),
(419, 5, 'Kabupaten', 'Sleman', '55513', NULL, NULL),
(420, 32, 'Kabupaten', 'Solok', '27365', NULL, NULL),
(421, 32, 'Kota', 'Solok', '27315', NULL, NULL),
(422, 32, 'Kabupaten', 'Solok Selatan', '27779', NULL, NULL),
(423, 28, 'Kabupaten', 'Soppeng', '90812', NULL, NULL),
(424, 25, 'Kabupaten', 'Sorong', '98431', NULL, NULL),
(425, 25, 'Kota', 'Sorong', '98411', NULL, NULL),
(426, 25, 'Kabupaten', 'Sorong Selatan', '98454', NULL, NULL),
(427, 10, 'Kabupaten', 'Sragen', '57211', NULL, NULL),
(428, 9, 'Kabupaten', 'Subang', '41215', NULL, NULL),
(429, 21, 'Kota', 'Subulussalam', '24882', NULL, NULL),
(430, 9, 'Kabupaten', 'Sukabumi', '43311', NULL, NULL),
(431, 9, 'Kota', 'Sukabumi', '43114', NULL, NULL),
(432, 14, 'Kabupaten', 'Sukamara', '74712', NULL, NULL),
(433, 10, 'Kabupaten', 'Sukoharjo', '57514', NULL, NULL),
(434, 23, 'Kabupaten', 'Sumba Barat', '87219', NULL, NULL),
(435, 23, 'Kabupaten', 'Sumba Barat Daya', '87453', NULL, NULL),
(436, 23, 'Kabupaten', 'Sumba Tengah', '87358', NULL, NULL),
(437, 23, 'Kabupaten', 'Sumba Timur', '87112', NULL, NULL),
(438, 22, 'Kabupaten', 'Sumbawa', '84315', NULL, NULL),
(439, 22, 'Kabupaten', 'Sumbawa Barat', '84419', NULL, NULL),
(440, 9, 'Kabupaten', 'Sumedang', '45326', NULL, NULL),
(441, 11, 'Kabupaten', 'Sumenep', '69413', NULL, NULL),
(442, 8, 'Kota', 'Sungaipenuh', '37113', NULL, NULL),
(443, 24, 'Kabupaten', 'Supiori', '98164', NULL, NULL),
(444, 11, 'Kota', 'Surabaya', '60119', NULL, NULL),
(445, 10, 'Kota', 'Surakarta (Solo)', '57113', NULL, NULL),
(446, 13, 'Kabupaten', 'Tabalong', '71513', NULL, NULL),
(447, 1, 'Kabupaten', 'Tabanan', '82119', NULL, NULL),
(448, 28, 'Kabupaten', 'Takalar', '92212', NULL, NULL),
(449, 25, 'Kabupaten', 'Tambrauw', '98475', NULL, NULL),
(450, 16, 'Kabupaten', 'Tana Tidung', '77611', NULL, NULL),
(451, 28, 'Kabupaten', 'Tana Toraja', '91819', NULL, NULL),
(452, 13, 'Kabupaten', 'Tanah Bumbu', '72211', NULL, NULL),
(453, 32, 'Kabupaten', 'Tanah Datar', '27211', NULL, NULL),
(454, 13, 'Kabupaten', 'Tanah Laut', '70811', NULL, NULL),
(455, 3, 'Kabupaten', 'Tangerang', '15914', NULL, NULL),
(456, 3, 'Kota', 'Tangerang', '15111', NULL, NULL),
(457, 3, 'Kota', 'Tangerang Selatan', '15332', NULL, NULL),
(458, 18, 'Kabupaten', 'Tanggamus', '35619', NULL, NULL),
(459, 34, 'Kota', 'Tanjung Balai', '21321', NULL, NULL),
(460, 8, 'Kabupaten', 'Tanjung Jabung Barat', '36513', NULL, NULL),
(461, 8, 'Kabupaten', 'Tanjung Jabung Timur', '36719', NULL, NULL),
(462, 17, 'Kota', 'Tanjung Pinang', '29111', NULL, NULL),
(463, 34, 'Kabupaten', 'Tapanuli Selatan', '22742', NULL, NULL),
(464, 34, 'Kabupaten', 'Tapanuli Tengah', '22611', NULL, NULL),
(465, 34, 'Kabupaten', 'Tapanuli Utara', '22414', NULL, NULL),
(466, 13, 'Kabupaten', 'Tapin', '71119', NULL, NULL),
(467, 16, 'Kota', 'Tarakan', '77114', NULL, NULL),
(468, 9, 'Kabupaten', 'Tasikmalaya', '46411', NULL, NULL),
(469, 9, 'Kota', 'Tasikmalaya', '46116', NULL, NULL),
(470, 34, 'Kota', 'Tebing Tinggi', '20632', NULL, NULL),
(471, 8, 'Kabupaten', 'Tebo', '37519', NULL, NULL),
(472, 10, 'Kabupaten', 'Tegal', '52419', NULL, NULL),
(473, 10, 'Kota', 'Tegal', '52114', NULL, NULL),
(474, 25, 'Kabupaten', 'Teluk Bintuni', '98551', NULL, NULL),
(475, 25, 'Kabupaten', 'Teluk Wondama', '98591', NULL, NULL),
(476, 10, 'Kabupaten', 'Temanggung', '56212', NULL, NULL),
(477, 20, 'Kota', 'Ternate', '97714', NULL, NULL),
(478, 20, 'Kota', 'Tidore Kepulauan', '97815', NULL, NULL),
(479, 23, 'Kabupaten', 'Timor Tengah Selatan', '85562', NULL, NULL),
(480, 23, 'Kabupaten', 'Timor Tengah Utara', '85612', NULL, NULL),
(481, 34, 'Kabupaten', 'Toba Samosir', '22316', NULL, NULL),
(482, 29, 'Kabupaten', 'Tojo Una-Una', '94683', NULL, NULL),
(483, 29, 'Kabupaten', 'Toli-Toli', '94542', NULL, NULL),
(484, 24, 'Kabupaten', 'Tolikara', '99411', NULL, NULL),
(485, 31, 'Kota', 'Tomohon', '95416', NULL, NULL),
(486, 28, 'Kabupaten', 'Toraja Utara', '91831', NULL, NULL),
(487, 11, 'Kabupaten', 'Trenggalek', '66312', NULL, NULL),
(488, 19, 'Kota', 'Tual', '97612', NULL, NULL),
(489, 11, 'Kabupaten', 'Tuban', '62319', NULL, NULL),
(490, 18, 'Kabupaten', 'Tulang Bawang', '34613', NULL, NULL),
(491, 18, 'Kabupaten', 'Tulang Bawang Barat', '34419', NULL, NULL),
(492, 11, 'Kabupaten', 'Tulungagung', '66212', NULL, NULL),
(493, 28, 'Kabupaten', 'Wajo', '90911', NULL, NULL),
(494, 30, 'Kabupaten', 'Wakatobi', '93791', NULL, NULL),
(495, 24, 'Kabupaten', 'Waropen', '98269', NULL, NULL),
(496, 18, 'Kabupaten', 'Way Kanan', '34711', NULL, NULL),
(497, 10, 'Kabupaten', 'Wonogiri', '57619', NULL, NULL),
(498, 10, 'Kabupaten', 'Wonosobo', '56311', NULL, NULL),
(499, 24, 'Kabupaten', 'Yahukimo', '99041', NULL, NULL),
(500, 24, 'Kabupaten', 'Yalimo', '99481', NULL, NULL),
(501, 5, 'Kota', 'Yogyakarta', '55111', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_agen`
--

CREATE TABLE `data_agen` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama_agen` varchar(100) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `telepon_seluler` varchar(50) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_agen`
--

INSERT INTO `data_agen` (`id`, `kode`, `nama_agen`, `telepon`, `telepon_seluler`, `wilayah`, `alamat`, `updated_at`, `created_at`) VALUES
(13, 'TES', 'PT. TRANS ENGINEERING SENTOSA', '(021) 633 6789', '0', 'Medan', 'Jl. Garu II B No.48, Harjosari I, Kec. Medan Amplas, Kota Medan, Sumatera Utara', '2021-01-29 20:53:34', '2021-01-28 22:53:07'),
(16, 'ALL', 'PT. ANGGIA LESTARI LOGISTIK', '0', '081267131008', 'Padang', 'JL. KIS MANGUN SARKORO NO.54', '2021-01-29 21:26:58', '2021-01-29 21:26:58'),
(21, 'BBA', 'PT. BERLIAN BASUKI ANJAY', '(0431)39238', '230239', 'Ambon', 'JL. KIS MANGUN SARKRI NO.99', '2021-02-04 04:12:22', '2021-02-04 04:12:22'),
(24, 'SSS', 'PT SATU SAMA RASA', '(0271) 098832', '3892383', 'Surakarta', 'Jl Classified', '2021-02-07 01:07:32', '2021-02-06 08:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `data_detail_paket`
--

CREATE TABLE `data_detail_paket` (
  `paket_id` int(11) NOT NULL,
  `no_stt` varchar(20) NOT NULL,
  `koli` varchar(10) NOT NULL,
  `panjang` int(10) DEFAULT NULL,
  `lebar` int(10) DEFAULT NULL,
  `tinggi` int(10) DEFAULT NULL,
  `berat` varchar(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_detail_paket`
--

INSERT INTO `data_detail_paket` (`paket_id`, `no_stt`, `koli`, `panjang`, `lebar`, `tinggi`, `berat`, `keterangan`, `created_at`, `updated_at`) VALUES
(11, '20200901000', '1', 1, 1, 1, '2', 'Anu Ya', '2021-02-02 18:20:24', '2021-02-03 04:47:49'),
(25, '3090290093', '2', 2, 2, 1, '10', 'Mashuk', '2021-02-05 07:37:07', '2021-02-05 07:37:07'),
(26, '210002002', '1', 1, 1, 1, '1', 'Mashuk', '2021-02-05 07:37:07', '2021-02-05 07:37:07'),
(27, '209238833', '1', 1, 1, 1, '20', 'Rahasia bangets dongss', '2021-02-06 07:41:15', '2021-02-06 07:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `data_harga_agen`
--

CREATE TABLE `data_harga_agen` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `harga_normal` int(10) NOT NULL,
  `harga_express` int(10) NOT NULL,
  `harga_super_express` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_harga_agen`
--

INSERT INTO `data_harga_agen` (`id`, `kode`, `tujuan`, `harga_normal`, `harga_express`, `harga_super_express`, `created_at`, `updated_at`) VALUES
(2, 'TES', 'Bengkulu', 20000, 30000, 50000, '2021-01-30 08:51:11', '2021-01-30 08:51:11'),
(3, 'TES', 'Bantul', 5000, 13000, 20000, '2021-01-30 08:52:21', '2021-01-30 08:52:21'),
(4, 'ALL', 'Bangka', 10000, 25000, 30000, '2021-01-30 22:51:43', '2021-01-30 22:54:29'),
(6, 'ACC', 'Surabaya', 15000, 20000, 25000, '2021-02-04 08:10:18', '2021-02-04 08:10:18'),
(7, 'ACC', 'Gunung Kidul', 11000, 13000, 20000, '2021-02-06 06:24:44', '2021-02-06 06:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `data_harga_general`
--

CREATE TABLE `data_harga_general` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `harga_normal` int(10) NOT NULL,
  `harga_express` int(10) NOT NULL,
  `harga_super_express` int(10) NOT NULL,
  `edd_normal` varchar(20) NOT NULL,
  `edd_express` varchar(20) NOT NULL,
  `edd_super_express` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_harga_general`
--

INSERT INTO `data_harga_general` (`id`, `tujuan`, `harga_normal`, `harga_express`, `harga_super_express`, `edd_normal`, `edd_express`, `edd_super_express`, `created_at`, `updated_at`) VALUES
(2, 'Aceh Barat', 59000, 69000, 75000, '3 - 6 hari', '2 - 4 hari', '1 - 3 hari', '2021-01-31 07:49:02', '2021-01-31 07:49:02'),
(3, 'Ambon', 70000, 1, 1, '2 - 3 hari', '-', '-', '2021-01-31 07:51:04', '2021-01-31 07:51:04'),
(4, 'Malang', 20000, 25000, 30000, '3-4 Hari', '2-3 Hari', '1-3 Hari', '2021-02-04 08:45:22', '2021-02-04 08:45:22'),
(5, 'Manado', 40000, 45000, 50000, '4-5 Hari', '3-4 Hari', '2-3 Hari', '2021-02-04 08:45:22', '2021-02-04 08:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `data_harga_kustomer`
--

CREATE TABLE `data_harga_kustomer` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `harga_normal` int(10) NOT NULL,
  `harga_express` int(10) DEFAULT NULL,
  `harga_super_express` int(10) DEFAULT NULL,
  `edd_normal` varchar(20) DEFAULT NULL,
  `edd_express` varchar(20) DEFAULT NULL,
  `edd_super_express` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_harga_kustomer`
--

INSERT INTO `data_harga_kustomer` (`id`, `kode`, `tujuan`, `harga_normal`, `harga_express`, `harga_super_express`, `edd_normal`, `edd_express`, `edd_super_express`, `created_at`, `updated_at`) VALUES
(4, 'BTB', 'Badung', 20000, 25000, 30000, '4-5 Hari', '3-4 Hari', '2-3 Hari', '2021-02-04 07:35:47', '2021-02-04 07:35:47'),
(5, 'BTC', 'Malang', 18000, 25000, 30000, '3-4 Hari', '2-3 Hari', '1-3 Hari', '2021-02-04 08:38:26', '2021-02-04 08:38:26'),
(6, 'BTC', 'Manado', 35000, 45000, 50000, '4-5 Hari', '3-4 Hari', '2-3 Hari', '2021-02-04 08:38:26', '2021-02-04 08:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `data_kurir`
--

CREATE TABLE `data_kurir` (
  `id` int(11) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `nama_agen` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `merk_kendaraan` varchar(100) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kurir`
--

INSERT INTO `data_kurir` (`id`, `nama_kurir`, `nama_agen`, `no_hp`, `alamat`, `kendaraan`, `merk_kendaraan`, `no_plat`, `created_at`, `updated_at`) VALUES
(2, 'M.G. ramadans', 'PT. TRANS ENGINEERING SENTOSA', '0811', 'jl. Kali Besar Timur 3', 'Sepeda Motor', 'motor', 'B 1231 ac', '2021-01-29 20:57:00', '2021-01-29 21:47:00'),
(3, 'Jasik sekali', 'PT. ANGGIA LESTARI LOGISTIK', '909283729', 'Jl Gawoks', 'Mobil Pick Up', 'carry', 'AD 777 BF', '2021-01-29 21:51:18', '2021-02-05 03:31:22'),
(5, 'Sujono', 'PT. TRANS ENGINEERING SENTOSA', '81828988', 'Gawok', 'Sepeda Motor', 'Revo', 'AD 837 BB', '2021-02-04 05:15:54', '2021-02-04 05:15:54'),
(6, 'Sujini', 'PT. TRANS ENGINEERING SENTOSA', '628198239', 'Gawik', 'Mobil Pick Up', 'Carry', 'AB 2887 FF', '2021-02-04 05:15:54', '2021-02-04 05:15:54'),
(7, 'Jr Pmd', 'PT. BERLIAN BASUKI ANJAY', '08122374882', 'Pajang Laweyan', 'Sepeda Motor', 'Vario', 'AD 1 RI', '2021-02-05 03:30:09', '2021-02-05 03:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `data_kustomer`
--

CREATE TABLE `data_kustomer` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_kustomer` varchar(100) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `telepon_seluler` varchar(30) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kustomer`
--

INSERT INTO `data_kustomer` (`id`, `kode`, `nama_kustomer`, `telepon`, `telepon_seluler`, `fax`, `email`, `wilayah`, `alamat`, `created_at`, `updated_at`) VALUES
(4, 'BTN', 'BANK BTN JAKARTA', '081111111111', '081111111111', '111', 'btn@office.com', 'Jakarta Pusat', 'Jl. Jakarta No.22A', '2021-01-29 22:32:23', '2021-01-30 00:00:09'),
(6, 'BTC', 'BANK TAY CUK', '98989', '887828398', '78676', 'btc@mail.com', 'Jakarta Utara', 'Jl. Jakarta No.8788', '2021-02-04 04:48:37', '2021-02-04 04:48:37'),
(8, 'JRS', 'PT JRSMITH SANGAR', '02739898', '08112626', '2090', 'jr@jr.com', 'Wonogiri', 'Rahasia', '2021-02-06 06:42:49', '2021-02-06 06:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `data_paket`
--

CREATE TABLE `data_paket` (
  `id` int(11) NOT NULL,
  `no_stt` varchar(50) NOT NULL,
  `no_sik` varchar(25) DEFAULT NULL,
  `kustomer` varchar(100) NOT NULL,
  `agen_perwakilan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `kota_tujuan` varchar(100) NOT NULL,
  `tipe_paket` varchar(20) NOT NULL,
  `alamat_pengirim` varchar(350) NOT NULL,
  `alamat_penerima` varchar(350) NOT NULL,
  `pelayanan` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_paket`
--

INSERT INTO `data_paket` (`id`, `no_stt`, `no_sik`, `kustomer`, `agen_perwakilan`, `tujuan`, `kota_tujuan`, `tipe_paket`, `alamat_pengirim`, `alamat_penerima`, `pelayanan`, `updated_at`, `created_at`) VALUES
(11, '20200901000', NULL, 'BANK BTN JAKARTA', 'PT. ANGGIA LESTARI LOGISTIK', 'PT. TRIPA CAB ACEH', 'Aceh Barat', 'Barang', 'Faletehan I No.17-19. Kebayoran Baru, Jakarta Selatan, 12160.', 'Aceh', 'harga_express', '2021-02-03 04:47:49', '2021-02-02 18:20:24'),
(25, '3090290093', 'SIK / BTC / 001', 'BANK TAY CUK', 'PT. ANGGIA LESTARI LOGISTIK', 'BANK TAY BAB', 'Jakarta Barat', 'Barang', 'ALAMAT_PENGIRIM', 'Faletehan I No.17-19. Kebayoran Baru, Jakarta Barat, 12160.', 'harga_express', '2021-02-05 07:37:07', '2021-02-05 07:37:07'),
(26, '210002002', 'SIK / BTC / 002', 'BANK TAY CUK', 'PT. ANGGIA LESTARI LOGISTIK', 'BANK TAY BAS', 'Jakarta Timur', 'Dokumen', 'ALAMAT_PENGIRIM', 'Faletehan I No.17-19. Kebayoran Baru, Jakarta Timur, 12160.', 'harga_super_express', '2021-02-05 07:37:07', '2021-02-05 07:37:07'),
(27, '209238833', 'SIK / JRS / 001', 'PT JRSMITH SANGAR', 'PT. TRANS ENGINEERING SENTOSA', 'MASJID BAITURAHMAN', 'Aceh Barat', 'Lain-lain', 'Rahasia', 'Rahasia', 'harga_normal', '2021-02-06 07:41:15', '2021-02-06 07:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran_paket`
--

CREATE TABLE `data_pembayaran_paket` (
  `paket_id` int(11) NOT NULL,
  `no_stt` varchar(20) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_pickup` date NOT NULL,
  `biaya_tambahan` int(10) DEFAULT NULL,
  `diskon` int(10) DEFAULT NULL,
  `total_harga` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pembayaran_paket`
--

INSERT INTO `data_pembayaran_paket` (`paket_id`, `no_stt`, `pembayaran`, `tanggal_input`, `tanggal_pickup`, `biaya_tambahan`, `diskon`, `total_harga`, `created_at`, `updated_at`) VALUES
(11, '20200901000', 'Tunai', '2020-10-10', '2020-10-22', 0, 0, 118000, '2021-02-02 18:20:24', '2021-02-02 18:20:24'),
(25, '3090290093', 'Tunai', '2021-02-05', '2021-02-05', 10000, 10000, 500000, '2021-02-05 07:37:07', '2021-02-05 07:37:07'),
(26, '210002002', 'Tunai', '2021-02-05', '2021-02-05', 10000, 10000, 600000, '2021-02-05 07:37:07', '2021-02-05 07:37:07'),
(27, '209238833', 'Tunai', '2021-02-06', '2021-02-06', NULL, NULL, 1180000, '2021-02-06 07:41:15', '2021-02-06 07:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_tipe_paket`
--

CREATE TABLE `data_tipe_paket` (
  `id` int(11) NOT NULL,
  `no_stt` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_tracking_paket`
--

CREATE TABLE `data_tracking_paket` (
  `id` int(11) NOT NULL,
  `no_stt` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tracking_paket`
--

INSERT INTO `data_tracking_paket` (`id`, `no_stt`, `lokasi`, `kurir`, `detail`, `photo`, `created_at`, `updated_at`) VALUES
(1, '20200901000', 'Bengkulu Selatan', 'M.G. ramadans', 'Paket aman markiman', 'storage/track_photo/03-02-2021passfotomerah.jpg', '2021-02-03 03:42:28', '2021-02-03 03:42:28'),
(2, '20200901000', 'Bukittinggi', 'M.G. ramadans', 'Paket Aman markimaannn', 'storage/track_photo/06-02-2021qrcode_chrome.png', '2021-02-06 02:36:48', '2021-02-06 02:36:48'),
(3, '209238833', 'Pandeglang', 'Jr Pmd', 'Paket sedang nganu', 'storage/track_photo/06-02-2021qrcode_chrome.png', '2021-02-06 07:46:09', '2021-02-06 07:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `messages` varchar(100) NOT NULL,
  `action` varchar(100) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `messages`, `action`, `active`, `created_at`, `updated_at`) VALUES
(28, 'Admin Titipan Express', 'telah menambahkan admin baru [admin2]', 'admin', 0, '2021-02-06 08:42:44', '2021-02-06 08:42:56'),
(29, 'Fajar P', 'telah menghapus agen [PT. ANGGIA COMEL CEKALIE]', NULL, 0, '2021-02-06 23:59:45', '2021-02-06 23:59:53'),
(30, 'Fajar P', 'telah menghapus agen [PT KWOK KOWK KWOK]', NULL, 0, '2021-02-07 00:02:54', '2021-02-07 00:03:00'),
(31, 'Fajar P', 'telah mengedit agen [PT SATU SAMA RASA]', 'data-agen/24', 0, '2021-02-07 01:07:32', '2021-02-07 01:07:37'),
(32, 'Fajar P', 'telah menambahkan admin baru [Admin]', 'admin', 0, '2021-04-09 23:42:41', '2021-04-09 23:44:18'),
(33, 'Admin', 'telah menghapus admin [admin2]', NULL, 0, '2021-04-09 23:42:52', '2021-04-09 23:44:18'),
(34, 'Admin', 'telah menghapus admin [admin-te]', NULL, 0, '2021-04-09 23:44:00', '2021-04-09 23:44:18'),
(35, 'Admin', 'telah menghapus admin [ariospandu]', NULL, 0, '2021-04-09 23:44:06', '2021-04-09 23:44:18'),
(36, 'Admin', 'telah menghapus admin [jrsmth]', NULL, 0, '2021-04-09 23:44:13', '2021-04-09 23:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Bangka Belitung', NULL, NULL),
(3, 'Banten', NULL, NULL),
(4, 'Bengkulu', NULL, NULL),
(5, 'DI Yogyakarta', NULL, NULL),
(6, 'DKI Jakarta', NULL, NULL),
(7, 'Gorontalo', NULL, NULL),
(8, 'Jambi', NULL, NULL),
(9, 'Jawa Barat', NULL, NULL),
(10, 'Jawa Tengah', NULL, NULL),
(11, 'Jawa Timur', NULL, NULL),
(12, 'Kalimantan Barat', NULL, NULL),
(13, 'Kalimantan Selatan', NULL, NULL),
(14, 'Kalimantan Tengah', NULL, NULL),
(15, 'Kalimantan Timur', NULL, NULL),
(16, 'Kalimantan Utara', NULL, NULL),
(17, 'Kepulauan Riau', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Maluku', NULL, NULL),
(20, 'Maluku Utara', NULL, NULL),
(21, 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
(22, 'Nusa Tenggara Barat (NTB)', NULL, NULL),
(23, 'Nusa Tenggara Timur (NTT)', NULL, NULL),
(24, 'Papua', NULL, NULL),
(25, 'Papua Barat', NULL, NULL),
(26, 'Riau', NULL, NULL),
(27, 'Sulawesi Barat', NULL, NULL),
(28, 'Sulawesi Selatan', NULL, NULL),
(29, 'Sulawesi Tengah', NULL, NULL),
(30, 'Sulawesi Tenggara', NULL, NULL),
(31, 'Sulawesi Utara', NULL, NULL),
(32, 'Sumatera Barat', NULL, NULL),
(33, 'Sumatera Selatan', NULL, NULL),
(34, 'Sumatera Utara', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(355) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `remember_token` varchar(300) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `nama`, `username`, `email`, `password`, `kode`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(12, 'kurir', 'M.G. ramadan', 'rama', NULL, '$2y$10$wG70LiNazQzwCcxviaa/8Oxlhbfm8LTrmsyrsR4pDpKE1oiBJn0Zq', NULL, NULL, NULL, '2021-01-29 20:57:00', '2021-01-29 20:57:00'),
(13, 'kurir', 'Jas', 'jas', NULL, '$2y$10$5YbN4W0wr6pZjleWUV1xyemks9U5VkCijWVWSHstgY8JLoHon2iYC', NULL, NULL, NULL, '2021-01-29 21:51:18', '2021-01-29 21:51:18'),
(14, 'kustomer', 'BANK BTN JAKARTA', 'btn2020', 'btn@office.com', '$2y$10$wG70LiNazQzwCcxviaa/8Oxlhbfm8LTrmsyrsR4pDpKE1oiBJn0Zq', 'BTN', NULL, NULL, '2021-01-29 22:32:23', '2021-01-29 22:32:23'),
(15, 'kustomer', 'BANK TAY BOSK', 'btb', 'btb@mail.com', '$2y$10$ocA7Z/yr8390pzsQm8jjbu/7PrJQBDbLGaj7PK.V1oQ1LjQX2ESoi', 'BTB', NULL, NULL, '2021-02-04 04:48:37', '2021-02-04 04:48:37'),
(16, 'kustomer', 'BANK TAY CUK', 'btc', 'btc@mail.com', '$2y$10$Gok5lh85CYRnaOp84NOMtedQeV.khD30gtevRHRD1aZnckcvQcB4y', 'BTC', NULL, NULL, '2021-02-04 04:48:37', '2021-02-04 04:48:37'),
(17, 'kurir', 'Sujono', 'sujono', NULL, '$2y$10$yXCo6uGruDGDA7JQD1.cYuChPuChQzW1uoNy7n9c2KKYTaGDtsjeO', NULL, NULL, NULL, '2021-02-04 05:15:54', '2021-02-04 05:15:54'),
(18, 'kurir', 'Sujini', 'sujini', NULL, '$2y$10$PBiHUyokRHS7XAY.zsKJ9eqGy7OOKAirRjc6E6EvElTj9hba7jeQa', NULL, NULL, NULL, '2021-02-04 05:15:54', '2021-02-04 05:15:54'),
(20, 'kurir', 'Jr Pmd', 'jrpmd', NULL, '$2y$10$Q7YiFfxiyBZ2WzwmBGR27.UvtaSh5hkNFgTGCGrod47UmFnQBTZd2', NULL, NULL, NULL, '2021-02-05 03:30:09', '2021-02-05 03:30:09'),
(28, 'admin', 'Admin', 'Admin', 'admin@admin.com', '$2y$10$fvrEzwc3Rl5rEgpI.cO1vuLbr.tw0yP0YyN1mdw27gzi1F6p31knS', NULL, NULL, NULL, '2021-04-09 23:42:40', '2021-04-09 23:42:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_agen`
--
ALTER TABLE `data_agen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_detail_paket`
--
ALTER TABLE `data_detail_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `data_harga_agen`
--
ALTER TABLE `data_harga_agen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_harga_general`
--
ALTER TABLE `data_harga_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_harga_kustomer`
--
ALTER TABLE `data_harga_kustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kurir`
--
ALTER TABLE `data_kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kustomer`
--
ALTER TABLE `data_kustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_paket`
--
ALTER TABLE `data_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pembayaran_paket`
--
ALTER TABLE `data_pembayaran_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `data_tipe_paket`
--
ALTER TABLE `data_tipe_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tracking_paket`
--
ALTER TABLE `data_tracking_paket`
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
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `data_agen`
--
ALTER TABLE `data_agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `data_detail_paket`
--
ALTER TABLE `data_detail_paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_harga_agen`
--
ALTER TABLE `data_harga_agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_harga_general`
--
ALTER TABLE `data_harga_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_harga_kustomer`
--
ALTER TABLE `data_harga_kustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_kurir`
--
ALTER TABLE `data_kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_kustomer`
--
ALTER TABLE `data_kustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_paket`
--
ALTER TABLE `data_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_pembayaran_paket`
--
ALTER TABLE `data_pembayaran_paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_tipe_paket`
--
ALTER TABLE `data_tipe_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_tracking_paket`
--
ALTER TABLE `data_tracking_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
