-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2021 at 01:38 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_undagi`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_book`
--

CREATE TABLE `master_book` (
  `id` char(8) NOT NULL,
  `book_name` varchar(128) NOT NULL,
  `id_category` char(8) NOT NULL,
  `writer` varchar(128) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  `year_created` char(4) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_book`
--

INSERT INTO `master_book` (`id`, `book_name`, `id_category`, `writer`, `publisher`, `year_created`, `created_at`, `updated_at`) VALUES
('12312', 'Habis Gelap Terbitlah Terang', '127481', 'R.A Kartini', 'Jakarta Post', '1982', '2021-01-25', '2021-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `master_product`
--

CREATE TABLE `master_product` (
  `id` int(11) NOT NULL,
  `text` varchar(50) NOT NULL,
  `checkbox` varchar(16) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL,
  `textbox` text NOT NULL,
  `price` int(11) NOT NULL,
  `password` char(32) NOT NULL,
  `radio` varchar(16) NOT NULL,
  `url` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_product`
--

INSERT INTO `master_product` (`id`, `text`, `checkbox`, `date`, `email`, `image`, `textbox`, `price`, `password`, `radio`, `url`) VALUES
(978176438, 'happy birthday', 'Value 2', '2021-01-28', 'tr9smlm5wa@temporary-mail.net', '1611551109_fb6b6cef9f45b0ae44a6.png', 'yes this is text area', 200000, '1234567', 'Value1', 'http://qquapdwzm2kq2a5jzz4jpw-on.drv.tw/www.twick-store.xyz/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_book`
--
ALTER TABLE `master_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_product`
--
ALTER TABLE `master_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2098695885;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
