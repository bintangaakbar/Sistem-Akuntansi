-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 04:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duoputri`
--

-- --------------------------------------------------------

--
-- Table structure for table `perhiasan`
--

CREATE TABLE `perhiasan` (
  `id` bigint(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `no_hp`) VALUES
(1, 'Bintang', 'banugrah2@gmail.com', '$2y$10$k7iWF9udKmxjlfgx.YYMg.MpztBttvilnkE4CDjq9wUgQ6AdO8Y3W', '353221'),
(2, 'Joel R. Damanik', 'joeldamanik2001@gmail.com', '$2y$10$MefH2fI7iFm7iSTEOUnI6O7BRJLwMdHshEEvT24zoNivobwQCDgHK', '081362552455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perhiasan`
--
ALTER TABLE `perhiasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perhiasan`
--
ALTER TABLE `perhiasan`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
