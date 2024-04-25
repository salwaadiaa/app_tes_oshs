-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 01:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes_oshs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(60) NOT NULL DEFAULT 'admin.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama`, `email`, `password`, `foto`) VALUES
(4, 'Administrator', 'admin@gmail.com', '$2y$10$tf2VKfD.kjhXFc16fbaNY.EvtMhvhb8iYFWvHVr5MURTg443VwmIm', 'administrator-1579273408.png'),
(13, 'SALWA ADIA ZAHRA', 'zahrasalwaa@gmail.com', '$2y$10$KAo/rl/eLmuinSTx2Sbo.e.Z7oKnCmhzXEe7FY7KRFQDOgjVdpsIe', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_brand` varchar(255) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `merk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `gambar`, `nama_brand`, `kategori_id`, `merk_id`) VALUES
(8, 'skintific-5x-ceramide-skin-barrier-repair-moisturize-gel-maintains-skin-barrier-1714042532.jpg', 'Skintific 5x Ceramide Skin Barrier Repair Moisturize Gel-maintains Skin Barrier', 11, 2),
(9, 'skintific-cover-all-perfect-air-cushion-high-coverage-poreless-&-flawless-foundation-1714042986.jpg', 'SKINTIFIC Cover All Perfect Air Cushion High Coverage Poreless & Flawless Foundation', 12, 2),
(10, 'serum-the-originote-hyalu-c-serum---vitamin-c-1714043037.jpg', 'Serum The Originote Hyalu C Serum - Vitamin C', 11, 4),
(11, 'skintific-mugwort-acne-clay-stick-40g-1714042845.jpg', 'SKINTIFIC Mugwort Acne Clay Stick 40g', 11, 2),
(13, 'viva-liquid-foundation-1714043011.jpg', 'Viva liquid foundation', 12, 6),
(14, 'cosrx-advanced-snail-92-crème-tout-en-un-1714043073.jpg', 'COSRX Advanced Snail 92 Crème tout en un', 11, 3),
(15, 'acne-24h-longwear-foundation-1714043165.jpg', 'Acne 24h Longwear Foundation', 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kategori`) VALUES
(11, 'Skincare'),
(12, 'Make-Up');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_merk`
--

INSERT INTO `tbl_merk` (`id`, `merk`) VALUES
(2, 'Skintific'),
(3, 'COSRX'),
(4, 'The Originote'),
(6, 'Viva Cosmetic'),
(8, 'Sea Make-Up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merk_id` (`merk_id`),
  ADD KEY `tbl_barang_ibfk_1` (`kategori_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`merk_id`) REFERENCES `tbl_merk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
