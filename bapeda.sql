-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2020 at 01:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bapeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `musrenbang`
--

CREATE TABLE `musrenbang` (
  `musrenbang_id` int(11) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `sasaran` varchar(128) NOT NULL,
  `volume` int(11) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `biaya` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `diakomodir` varchar(128) NOT NULL,
  `alasan` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musrenbang`
--

INSERT INTO `musrenbang` (`musrenbang_id`, `kegiatan`, `sasaran`, `volume`, `lokasi`, `biaya`, `date`, `diakomodir`, `alasan`, `user_id`) VALUES
(1, 'jalan  baru', 'jl.simatupang', 1000, '1000', 1000, 1603637998, 'Menunggu Konfirmasi', '', 2),
(2, '1603637998', '1603637998', 1603637998, '1603637998', 1603637998, 1603637998, 'Diakomodir', 'Diakomodir', 2),
(3, '1000', '1000', 1000, '1000', 1000, 1603637998, 'Tidak Diakomodir', 'Tidak Diakomodir', 2),
(4, '1000', '1603637998', 1603637998, '1603637998', 1603637998, 1603638398, 'Menunggu Konfirmasi', '', 2),
(6, '1000', '100011111', 1000, '1000', 1000, 1603640895, 'Diakomodir', '', 2),
(10, 'penghancuran kota', 'semua kota yang ada k-popnya', 1000, 'jakarta', 2147483647, 1603713806, 'Menunggu Konfirmasi', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `role_id` int(11) NOT NULL,
  `posisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`role_id`, `posisi`) VALUES
(3, 'Adminstrasi'),
(1, 'Kecamatan'),
(2, 'Verifikator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `Kecamatan` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `Kecamatan`, `password`, `role_id`) VALUES
(1, 'Aditiya Prastio', 'Aprastio', '', '$2y$10$sQgcduIAOyWoUjUL6n3Bc.9me6NgiK7HlQf9ueXig/ZdTYFstfBUe', 3),
(2, 'Aditiya Prastio', 'pamulang', 'pamulang', '$2y$10$vF9KBrdSWMtPmuEL2e9lAe1zdO0uD6uWlyyvuHR7w9JPAC2HJGXi6', 1),
(12, 'Aditiya Prastio', 'verifikator', '', '$2y$10$jl/Rg.DR.NoyUgedHBhS2eyUskJnTkyfSuZLEkQ3JyZ0RxkV/UZk6', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musrenbang`
--
ALTER TABLE `musrenbang`
  ADD PRIMARY KEY (`musrenbang_id`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musrenbang`
--
ALTER TABLE `musrenbang`
  MODIFY `musrenbang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `musrenbang`
--
ALTER TABLE `musrenbang`
  ADD CONSTRAINT `musrenbang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
