-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 08:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `produk` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id`, `order_id`, `produk`, `qty`, `harga`) VALUES
(21, 24, 1, 1, '7699001'),
(22, 24, 20, 1, '120000'),
(23, 25, 5, 1, '11500000'),
(24, 25, 6, 1, '15100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Laptop'),
(2, 'Smartphone'),
(3, 'Televisi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `users` int(10) DEFAULT NULL,
  `nama_tujuan` varchar(100) DEFAULT NULL,
  `alamat_tujuan` varchar(100) DEFAULT NULL,
  `telepon_tujuan` varchar(20) DEFAULT NULL,
  `invoice` varchar(8) NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `tanggal`, `users`, `nama_tujuan`, `alamat_tujuan`, `telepon_tujuan`, `invoice`, `status`, `total`) VALUES
(24, '2021-06-22', 8, 'komnum', 'Jl. Letjen Suprapto I/41 Jember', '0812345678901', 'VpxrfNz6', 0, 7819001),
(25, '2021-06-22', 8, 'Iqbaal', 'Jalan Kebonsari Indah', '0812345678901', '2quLKGf1', 0, 26600000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `kategori`) VALUES
(1, 'ASUS - VIVOBOOK A516JA-HD3121 INTEL CORE I3-1005G1', ' Processor Intel Core i3-1005G1', '7699001', 'laptop1.jpg', 1),
(2, 'ACER - SWIFT 1 SF114-34-P3ZB SILVER', 'FREE ACER DAY SLEEVE CASE BLUE HADIAH', '6299000', 'laptop2.jpg', 1),
(3, 'LENOVO - IDEAPAD SLIM 3I-14IGL05 N4020', 'FREE TARGUS - WIRELESS MOUSE AMW605 BLACK', '4899000', 'laptop3.jpg', 1),
(4, 'Iphone X', 'Ready Silver, Gold, White', '10000000', 'hp1.jpg', 2),
(5, 'Iphone X Pro', 'Ready Silver, Gold, White', '11500000', 'hp2.jpg', 2),
(6, 'Iphone X Plus', 'Ready Silver, Gold, White', '15100000', 'hp3.jpg', 2),
(7, 'LG Monitor 27\" UHD', 'IPS Full HD 3 Side Borderless 27\"', '2699000', 'robot1.jpg', 3),
(8, 'SAMSUNG - 23,5\" LED', 'Samsung MagicBright', '1549000', 'robot2.jpg', 3),
(18, 'komnum', 'sasasa', '120000', 'komnum.jpg', 1),
(19, 'Laptop', 'ASDFGHJKL', '120000', NULL, 1),
(20, 'ALBERTO SANJAYA', 'sasasa', '120000', 'ALBERTO_SANJAYA.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'evelyn', 'evelyn', 'marsella.eve@gmail.com', 'evelyn', '03123232194', 'admin', '2021-06-17 16:12:02', 'user_no_image.jpg', '2021-06-17 14:21:02', 0),
(2, 'amel', 'amel', 'amel@gmail.com', 'amel', '023232123123', 'customer', '2021-06-17 15:44:44', 'user_no_image.jpg', '2021-06-17 15:44:44', 0),
(3, 'iqbaal', 'iqbaal', 'iqbaal@yahoo.com', 'iqbaal', '023232123123', 'customer', '2021-06-17 16:13:38', 'user_no_image.jpg', '2021-06-17 16:13:31', 0),
(4, 'iqbaal', '$2y$10$3dTApUJQPvtofqGvgG7zL.pjfWyG9dks1MYTZ/0hj4xSztD2VyixW', 'iqbaal@gmail.com', 'Iqbaal Pratama', '08111111111', 'customer', '2021-06-17 18:18:26', 'user_no_image.jpg', '2021-06-17 18:18:26', 0),
(5, 'Evelyn', '$2y$10$DCWAEXcNl3zERMhAjsMlt.sD.XwrOmr9dZxX5f1SnRKVC7hxnH26W', 'evelyn@gmail.com', 'Evelyn', '08111111122', 'admin', '2021-06-22 18:21:17', 'user_no_image.jpg', '2021-06-18 05:45:32', 0),
(6, 'Amel', '$2y$10$GSCIFOO9VSOR7k9ePCc5P.hgCpnEU21nRXL8gDMTHJKVRdg2ZhD22', 'amel@gmail.com', 'amelia puji', '081111111122', 'admin', '2021-06-18 05:52:26', 'user_no_image.jpg', '2021-06-18 05:52:26', 0),
(7, 'pembeli', '$2y$10$mKsAU.KcyyvSFwNEBjTwc.PBTDcQggGuYObnGar66N8.bTbe4B9Ui', 'pembeli@gmail.com', 'pembeli pertama', '08123456789', 'customer', '2021-06-18 14:23:00', 'user_no_image.jpg', '2021-06-18 06:20:40', 0),
(8, 'iqbaale', '$2y$10$Jhej9nhUCRyJ2FrQ/hGM3.Ls94YbHpLOTr0eTmb9hp4E5E8dcPoD.', 'iqbaal@gmail.com', 'Iqbaal Pratama', '08123456789', 'customer', '2021-06-22 17:32:01', 'user_no_image.jpg', '2021-06-22 10:38:20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice` (`invoice`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
