-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 09:10 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL,
  `shipped` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Pria', 1),
(2, 'Wanita', 2),
(3, 'Lainnya', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis_barang`) VALUES
(1, 'Celana'),
(2, 'Baju'),
(3, 'Kain'),
(4, 'Rok');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `jenis_barang` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `sizes` text NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `jenis_barang`, `categories`, `image`, `description`, `featured`, `sizes`, `deleted`) VALUES
(1, 'Celana A', 125000, 1, '1', 'images/celanaA.jpg', 'Celana Chino kasual untuk daily outfit, Warna coklat, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(2, 'Celana B', 125000, 1, '1', 'images/celanaB.jpg', 'Celana Chino kasual untuk daily outfit, Warna coklat tua, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(3, 'Celana C', 135000, 1, '1', 'images/celanaC.jpg', 'Skinny jeans kasual untuk daily outfit, Warna denim, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(4, 'Celana D', 140000, 1, '1', 'images/celanaD.jpg', 'Skinny jeans kasual untuk daily outfit, Warna coklat, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(5, 'Celana E', 145000, 1, '2', 'images/celanaE.jpg', 'Skinny jeans kasual untuk daily outfit, Warna denim, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(6, 'Celana F', 150000, 1, '2', 'images/celanaF.jpg', 'Skinny jeans kasual untuk daily outfit, Warna Hitam, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(7, 'Celana G', 150000, 1, '2', 'images/celanaG.jpg', 'Skinny jeans kasual untuk daily outfit, Warna Hitam, Kancing dengan resleting depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(8, 'Kemeja A', 180000, 2, '2', 'images/kemejaA.jpg', 'Kemeja jeans wanita kasual untuk daily outfit, Warna Biru, Kancing depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(9, 'Kemeja B', 185000, 2, '1', 'images/kemejaB.jpg', 'Kemeja jeans pria kasual untuk daily outfit, Warna Biru, Kancing depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(10, 'Kemeja C', 180000, 2, '1', 'images/kemejaC.jpg', 'Kemeja jeans pria kasual untuk daily outfit, Warna Biru, Kancing depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(11, 'Kemeja D', 185000, 2, '1', 'images/kemejaD.jpg', 'Kemeja jeans pria kasual untuk daily outfit, Warna Biru, Kancing depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(12, 'Kemeja E', 180000, 2, '2', 'images/kemejaE.jpg', 'Kemeja jeans wanita kasual untuk daily outfit, Warna Biru, Kancing depan, 2 kantong depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(13, 'Rok A', 85000, 4, '2', 'images/rokA.jpg', 'Rok berbahan katun untuk daily outfit, Warna Abu-Abu, Kancing depan, Tanpa Kantong', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(14, 'Rok B', 85000, 4, '2', 'images/rokB.jpg', 'Rok berbahan katun untuk daily outfit, Warna Hitam, Kancing depan, Tanpa Kantong', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(15, 'Rok C', 75000, 4, '2', 'images/rokC.jpg', 'Rok berbahan jeans untuk daily outfit, Warna Biru Dongker, Tanpa Kancing, Kantong dua di depan', 1, 'S:3:,M:3:,L:3:,XL:2:', 0),
(16, 'Kain Denim', 75000, 3, '3', 'images/kain1.jpg', 'Berbahan jeans untuk daily outfit, Warna Denim', 1, '1M:5:', 0),
(17, 'Kain Katun', 75000, 3, '3', 'images/kain2.jpg', 'Berbahan Katun untuk daily outfit, Warna Komplit', 1, '1M:5:', 0),
(18, 'Kain Velvet atau Satin', 75000, 3, '3', 'images/kain3.jpg', 'Berbahan Velvet atau Satin untuk daily outfit, Warna Pink', 1, '1M:5:', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `no_telp` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `sizes` varchar(255) NOT NULL,
  `qty_array` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `discon` int(255) NOT NULL,
  `jum_bayar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
