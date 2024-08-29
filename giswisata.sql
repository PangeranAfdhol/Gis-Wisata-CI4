-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 04:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giswisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_login` varchar(128) DEFAULT NULL,
  `latitude_login` varchar(128) DEFAULT NULL,
  `longitude_login` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `id_user`, `tanggal_login`, `latitude_login`, `longitude_login`) VALUES
(82, 1, 'Tanggal: 12-06-2023 / Pukul: 13:13:21', '0.5013504', '101.4398976'),
(84, 1, 'Tanggal: 12-06-2023 / Pukul: 13:31:16', '0.5013504', '101.4398976'),
(86, 5, 'Tanggal: 12-06-2023 / Pukul: 13:56:59', '0.5013504', '101.4398976'),
(87, 1, 'Tanggal: 12-06-2023 / Pukul: 14:00:35', '0.5013504', '101.4398976'),
(88, 1, 'Tanggal: 12-06-2023 / Pukul: 17:39:57', '0.5013504', '101.4398976'),
(89, 1, 'Tanggal: 12-06-2023 / Pukul: 19:12:46', '0.5013504', '101.4398976'),
(91, 1, 'Tanggal: 13-06-2023 / Pukul: 10:46:03', '0.5013504', '101.4398976'),
(92, 1, 'Tanggal: 13-06-2023 / Pukul: 16:27:17', '0.4947968', '101.4267904'),
(93, 1, 'Tanggal: 13-06-2023 / Pukul: 17:55:30', '0.4947968', '101.4267904'),
(94, 5, 'Tanggal: 13-06-2023 / Pukul: 17:58:53', '0.4947968', '101.4267904'),
(95, 1, 'Tanggal: 13-06-2023 / Pukul: 17:59:20', '0.4947968', '101.4267904'),
(96, 1, 'Tanggal: 13-06-2023 / Pukul: 21:12:00', '0.5013504', '101.4267904'),
(97, 1, 'Tanggal: 14-06-2023 / Pukul: 10:28:13', '0.897363', '100.326948'),
(98, 1, 'Tanggal: 14-06-2023 / Pukul: 13:02:39', '0.5013504', '101.4267904'),
(99, 5, 'Tanggal: 14-06-2023 / Pukul: 13:03:00', '0.5013504', '101.4267904'),
(100, 1, 'Tanggal: 14-06-2023 / Pukul: 13:03:10', '0.5013504', '101.4267904'),
(101, 5, 'Tanggal: 14-06-2023 / Pukul: 13:13:32', '0.5013504', '101.4267904'),
(102, 1, 'Tanggal: 14-06-2023 / Pukul: 17:19:45', '0.4980736', '101.433344'),
(103, 1, 'Tanggal: 15-06-2023 / Pukul: 04:15:21', '0.8973559', '100.3269407'),
(104, 1, 'Tanggal: 15-06-2023 / Pukul: 11:08:17', '0.5013504', '101.4267904'),
(105, 5, 'Tanggal: 15-06-2023 / Pukul: 18:58:54', '0.507904', '101.4235136'),
(106, 1, 'Tanggal: 15-06-2023 / Pukul: 19:00:21', '0.507904', '101.4235136'),
(107, 1, 'Tanggal: 16-06-2023 / Pukul: 13:43:15', '0.507904', '101.4267904'),
(108, 1, 'Tanggal: 17-06-2023 / Pukul: 15:26:56', '0.5013504', '101.4202368'),
(109, 1, 'Tanggal: 17-06-2023 / Pukul: 21:09:20', '0.5070677', '101.4477793'),
(110, 5, 'Tanggal: 17-06-2023 / Pukul: 21:10:54', '0.5070677', '101.4477793'),
(111, 1, 'Tanggal: 17-06-2023 / Pukul: 21:11:40', '0.5070677', '101.4477793'),
(112, 1, 'Tanggal: 19-06-2023 / Pukul: 19:15:29', '0.5144576', '101.4398976'),
(113, 1, 'Tanggal: 19-06-2023 / Pukul: 19:27:09', '0.5144576', '101.4398976'),
(114, 1, 'Tanggal: 20-06-2023 / Pukul: 11:19:24', '0.8977164', '100.3270532'),
(115, 1, 'Tanggal: 20-06-2023 / Pukul: 12:07:47', '', ''),
(116, 1, 'Tanggal: 20-06-2023 / Pukul: 22:50:38', '0.5070677', '101.4477793'),
(118, 1, 'Tanggal: 21-06-2023 / Pukul: 21:03:52', '0.8974471', '100.3269647'),
(119, 1, 'Tanggal: 22-06-2023 / Pukul: 00:30:00', '0.5070677', '101.4477793'),
(121, 1, 'Tanggal: 22-06-2023 / Pukul: 00:32:45', '0.5070677', '101.4477793'),
(123, 1, 'Tanggal: 22-06-2023 / Pukul: 00:45:40', '0.5070677', '101.4477793'),
(124, 1, 'Tanggal: 22-06-2023 / Pukul: 11:19:48', '0.5070677', '101.4477793'),
(126, 1, 'Tanggal: 22-06-2023 / Pukul: 12:58:15', '0.5070677', '101.4477793'),
(128, 1, 'Tanggal: 22-06-2023 / Pukul: 13:04:49', '0.5070677', '101.4477793'),
(129, 1, 'Tanggal: 22-06-2023 / Pukul: 21:12:37', '0.5070677', '101.4477793'),
(130, 1, 'Tanggal: 22-06-2023 / Pukul: 21:17:05', '0.5070677', '101.4477793'),
(131, 1, 'Tanggal: 22-06-2023 / Pukul: 21:17:57', '0.5070677', '101.4477793'),
(132, 1, 'Tanggal: 22-06-2023 / Pukul: 21:27:47', '0.5070677', '101.4477793'),
(133, 1, 'Tanggal: 22-06-2023 / Pukul: 23:41:22', '0.5070677', '101.4477793'),
(134, 1, 'Tanggal: 22-06-2023 / Pukul: 23:44:06', '', ''),
(135, 1, 'Tanggal: 22-06-2023 / Pukul: 23:47:08', '0.5070677', '101.4477793'),
(136, 1, 'Tanggal: 23-06-2023 / Pukul: 10:29:16', '0.5070677', '101.4477793'),
(138, 1, 'Tanggal: 23-06-2023 / Pukul: 10:35:07', '0.5070677', '101.4477793'),
(140, 1, 'Tanggal: 23-06-2023 / Pukul: 12:02:11', '0.5070677', '101.4477793'),
(141, 1, 'Tanggal: 23-06-2023 / Pukul: 21:16:28', '0.5070677', '101.4477793'),
(142, 1, 'Tanggal: 23-06-2023 / Pukul: 22:00:19', '0.49152', '101.41696'),
(143, 1, 'Tanggal: 23-06-2023 / Pukul: 22:09:57', '0.49152', '101.41696'),
(144, 1, 'Tanggal: 23-06-2023 / Pukul: 22:25:13', '0.49152', '101.41696'),
(145, 5, 'Tanggal: 24-06-2023 / Pukul: 13:39:53', '0.5070677', '101.4477793'),
(146, 1, 'Tanggal: 24-06-2023 / Pukul: 20:58:11', '0.8975472', '100.3269936'),
(147, 1, 'Tanggal: 24-06-2023 / Pukul: 21:06:07', '0.5070677', '101.4477793'),
(148, 5, 'Tanggal: 24-06-2023 / Pukul: 21:18:33', '0.5070677', '101.4477793'),
(149, 13, 'Tanggal: 24-06-2023 / Pukul: 21:43:58', '0.5070677', '101.4477793'),
(150, 1, 'Tanggal: 24-06-2023 / Pukul: 22:09:02', '0.4882432', '101.4235136'),
(151, 13, 'Tanggal: 24-06-2023 / Pukul: 22:14:06', '0.5070677', '101.4477793'),
(152, 1, 'Tanggal: 24-06-2023 / Pukul: 22:57:00', '0.5070677', '101.4477793'),
(153, 1, 'Tanggal: 25-06-2023 / Pukul: 00:35:40', '0.4849664', '101.4300672'),
(154, 1, 'Tanggal: 25-06-2023 / Pukul: 11:58:49', '0.5070677', '101.4477793'),
(156, 13, 'Tanggal: 25-06-2023 / Pukul: 12:09:21', '0.5070677', '101.4477793'),
(157, 1, 'Tanggal: 25-06-2023 / Pukul: 12:26:15', '0.5070677', '101.4477793'),
(158, 1, 'Tanggal: 25-06-2023 / Pukul: 22:18:02', '0.5070677', '101.4477793'),
(159, 1, 'Tanggal: 26-06-2023 / Pukul: 11:48:41', '0.4882432', '101.433344'),
(160, 1, 'Tanggal: 26-06-2023 / Pukul: 14:02:59', '0.4816896', '101.433344'),
(161, 1, 'Tanggal: 26-06-2023 / Pukul: 14:06:40', '0.4882432', '101.433344'),
(162, 5, 'Tanggal: 26-06-2023 / Pukul: 14:07:38', '0.4882432', '101.433344'),
(163, 1, 'Tanggal: 26-06-2023 / Pukul: 14:10:41', '0.897571', '100.3269914'),
(164, 1, 'Tanggal: 27-06-2023 / Pukul: 13:48:19', '0.9295512', '100.3293751'),
(166, 1, 'Tanggal: 27-06-2023 / Pukul: 14:17:23', '0.9301584', '100.3275649'),
(167, 1, 'Tanggal: 29-06-2023 / Pukul: 18:07:44', '0.4882432', '101.4235136'),
(168, 13, 'Tanggal: 29-06-2023 / Pukul: 22:19:17', '0.4882432', '101.4235136'),
(169, 1, 'Tanggal: 30-06-2023 / Pukul: 21:01:43', '0.5070677', '101.4477793');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `pwd` varchar(256) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  `nama_depan` varchar(128) DEFAULT NULL,
  `nama_belakang` varchar(128) DEFAULT NULL,
  `nik` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `telepon` varchar(128) DEFAULT NULL,
  `tanggal_register` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `pwd`, `role`, `nama_depan`, `nama_belakang`, `nik`, `alamat`, `email`, `telepon`, `tanggal_register`) VALUES
(1, 'admin', '$2y$10$ShIElAlpZR0Bttq1VcNTk.k20pugKS0DHm4RiJdnkzwcLeMOrNGPG', 'Admin', 'Pangeran', 'Afdhol', '19082938172839', 'ujung batu', 'pangeranafdhol@gmail.com', '082128984122', 'Tanggal: 11-06-2023 / Pukul: 08:25:53'),
(5, 'abubakar', '$2y$10$BUWIuRvQ7ySlPHh3.q36u.QzMRsSBYL7ngjpMkhxjb2PPw9bHYG.2', 'User', 'abu', 'simonangkir', '20392817283928', 'tandun', 'abubakar@gmail.com', '08299388192', 'Tanggal: 12-06-2023 / Pukul: 13:56:43'),
(13, 'eyan', '$2y$10$Z922m/9rhxhVq71effFvp.CKH52Znk81pKb8nZbSsry5E4e6jKRRC', 'User', 'Eyan', 'Eyan', '19283928372819', 'Gg kelapa', 'eyan@gmail.com', '082178765567', 'Tanggal: 24-06-2023 / Pukul: 21:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `Kabupaten` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
