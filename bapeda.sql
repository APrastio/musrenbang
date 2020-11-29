-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2020 at 12:34 AM
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
-- Table structure for table `instasi`
--

CREATE TABLE `instasi` (
  `instasi_id` int(11) NOT NULL,
  `nama_instansi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instasi`
--

INSERT INTO `instasi` (`instasi_id`, `nama_instansi`) VALUES
(1, 'Bidang Perencanaan,Data dan Evaluasi Pembangunan'),
(2, 'Bidang Ekonomi dan Sosial Kemasyarakatan'),
(3, 'Bidang Fisik dan Prasarana'),
(4, 'Bidang Penelitian, Pengembangan dan Pemerintahan Umum'),
(5, '');

-- --------------------------------------------------------

--
-- Table structure for table `musrenbang`
--

CREATE TABLE `musrenbang` (
  `musrenbang_id` int(11) NOT NULL,
  `jenis_kegiatan` varchar(128) NOT NULL,
  `sasaran` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `volume` varchar(128) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `biaya` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musrenbang`
--

INSERT INTO `musrenbang` (`musrenbang_id`, `jenis_kegiatan`, `sasaran`, `keterangan`, `volume`, `lokasi`, `biaya`, `date`, `user_id`) VALUES
(1, 'FISK/KONTRUKSI', 'Pelebaran Jalan', 'Mempermudah Sarana Transportasi. Menghindari Kemacetan', '2 Km', 'Cimuncang', 200000000, 1605260132, 2),
(16, 'NON FISIK', 'Bantuan Sembako', 'Bantuan korban bencana', '200 Kg', 'Paninggilan', 30000, 1605339159, 2),
(17, 'FISIK/KONTRUKSI', 'perbaikan jalan', 'memperbaiki jalan yang rusak', '100 km', 'cisaug', 100000000, 1605429876, 23),
(18, 'NON FISIK', 'perbaikan jalan', 'Mempermudah Sarana Transportasi. Menghindari Kemacetan', '5 km', 'curug', 2147483647, 1605953604, 23);

-- --------------------------------------------------------

--
-- Table structure for table `pengesahan`
--

CREATE TABLE `pengesahan` (
  `pengesahan_id` int(11) NOT NULL,
  `musrenbang_id` int(11) NOT NULL,
  `keputusan` varchar(128) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengesahan`
--

INSERT INTO `pengesahan` (`pengesahan_id`, `musrenbang_id`, `keputusan`, `date`) VALUES
(1, 1, 'Disetujui', 1606690541),
(7, 16, 'Ditolak', 1606690555),
(8, 17, 'Diproses', 1606690371),
(9, 18, 'Diproses', 1606050844);

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan`
--

CREATE TABLE `persetujuan` (
  `persetujuan_id` int(11) NOT NULL,
  `musrenbang_id` int(11) NOT NULL,
  `instasi_id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persetujuan`
--

INSERT INTO `persetujuan` (`persetujuan_id`, `musrenbang_id`, `instasi_id`, `status`, `keterangan`) VALUES
(1, 1, 1, 'Disetujui', ''),
(2, 1, 2, 'Tidak Disetujui', ''),
(3, 1, 3, 'Tidak Terkait', ''),
(4, 1, 4, 'Disetujui', ''),
(5, 18, 1, 'Disetujui', 'sesuai'),
(6, 18, 2, 'Tidak Disetujui', 'tidak sesuai sasaran'),
(7, 18, 3, 'Tidak Terkait', 'nga tau'),
(8, 18, 4, 'Disetujui', 'Disetujui'),
(9, 16, 1, 'Disetujui', 'ok'),
(11, 16, 3, 'Tidak Disetujui', 'nga suka\r\n'),
(14, 17, 3, 'Tidak Terkait', 'Instasi tidak terkait dengan musrenbang yanga ada'),
(17, 17, 2, 'Disetujui', 'aku si oke');

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
  `role_id` int(11) NOT NULL,
  `instasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `Kecamatan`, `password`, `role_id`, `instasi_id`) VALUES
(1, 'Aditiya Prastio', 'Aprastio', '', '$2y$10$sQgcduIAOyWoUjUL6n3Bc.9me6NgiK7HlQf9ueXig/ZdTYFstfBUe', 3, 5),
(2, 'Aditiya Prastio', 'pamulang', 'pamulang', '$2y$10$vF9KBrdSWMtPmuEL2e9lAe1zdO0uD6uWlyyvuHR7w9JPAC2HJGXi6', 1, 5),
(12, 'Aditiya Prastio', 'verifikator', '', '$2y$10$jl/Rg.DR.NoyUgedHBhS2eyUskJnTkyfSuZLEkQ3JyZ0RxkV/UZk6', 2, 5),
(19, 'Aditiya Prastio', 'pembangunan', '', '$2y$10$.ArC4UFXasXQnsSqfoA52eA7QJ5LyXtB6frdO7TxhOcjVhhA/VHSG', 4, 1),
(23, 'Aditiya Prastio', 'ciledug', 'ciledug', '$2y$10$BMAWTRr8tVjI1RhfMXenQeyREP0zfUKZBoZaSwuhzcdBaZZ2Uy9N6', 1, 5),
(24, 'Aditiya Prastio', 'ekonomi', '', '$2y$10$lY/CwXChYJLEyLSoe8oa5e28LRZe7MF3QY2A.cP35c3hgVD9ab9eC', 4, 2),
(25, 'Aditiya Prastio', 'fisik', '', '$2y$10$9LWM1CN.rZZ3D4hLBkP8ueLQv9qrwrcMlve4e6EwTYtq2zOqqxuwC', 4, 3),
(26, 'Aditiya Prastio', 'penelitian', '', '$2y$10$A2t66836E3uWcS.punmsAejhhQ3p3RAo51SGOrMeJJ0wCVbHDh4/u', 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instasi`
--
ALTER TABLE `instasi`
  ADD PRIMARY KEY (`instasi_id`);

--
-- Indexes for table `musrenbang`
--
ALTER TABLE `musrenbang`
  ADD PRIMARY KEY (`musrenbang_id`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `pengesahan`
--
ALTER TABLE `pengesahan`
  ADD PRIMARY KEY (`pengesahan_id`),
  ADD KEY `musrenbang_id` (`musrenbang_id`);

--
-- Indexes for table `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD PRIMARY KEY (`persetujuan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instasi`
--
ALTER TABLE `instasi`
  MODIFY `instasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `musrenbang`
--
ALTER TABLE `musrenbang`
  MODIFY `musrenbang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengesahan`
--
ALTER TABLE `pengesahan`
  MODIFY `pengesahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `persetujuan`
--
ALTER TABLE `persetujuan`
  MODIFY `persetujuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `musrenbang`
--
ALTER TABLE `musrenbang`
  ADD CONSTRAINT `musrenbang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `pengesahan`
--
ALTER TABLE `pengesahan`
  ADD CONSTRAINT `pengesahan_ibfk_1` FOREIGN KEY (`musrenbang_id`) REFERENCES `musrenbang` (`musrenbang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
