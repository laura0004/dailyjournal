-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 09:28 AM
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
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'That Summer is Saturated', 'By the time I realized it, I was caught. I couldn’t find you anywhere. You were the only one who wasn’t anywhere. And then time passed. Just those hot, hot days passed. Even though our families and classmates are here, why are you the only one who isn’t anywhere.', 'ykmr5.jpg', '2024-12-11 12:55:15', 'laulua'),
(2, 'SHANTI', 'Hey, young man who’s hanging his head. Did something bad happen? If you’re fine with me, do you wanna talk about it? I can help you. What in the world happened? That sounds terrible, brother. I\'ll give you this, so cheer up, ok', 'ykmr1.jpg', '2024-12-11 13:08:17', 'laulua'),
(3, 'EYE(yukimura cover)', 'Having lied about the most inconsequential of things. I\'m unable to go back. No statute of limitations for my crime. Robbed of forgiveness for that thievery of mine. Things don\'t look any better today', 'ykmr3.jpg', '2024-12-11 13:13:01', 'laulua'),
(4, 'KING(yukimura cover)', 'Locking up the clever one before they die. You, hey, you know that it’s a pain to get you to be obedient, darling. Don’t lock me up! It’s not like I knew. Give me a break! You’re so cruel. The wishes of the people feel like scraps of irony', 'ykmr7.jpg', '2024-12-11 13:15:21', 'laulua'),
(5, 'Sainou Sampler(yuimura cover)', 'You’re spread out On my lab table. I’m pleased with your overflowing talent.I took up my scalpel because I wanted you to share it with me.A mysterious sensation or a comfortable sensation? It’s pleasurable either way, but it only lasts a brief moment.', 'ykmr2.jpg', '2024-12-11 13:25:30', 'laulua'),
(6, 'tes artikel', 'name', '20250111170227.jpg', '2025-01-12 13:42:30', 'laulua');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gambar`, `tanggal`, `username`) VALUES
(1, 'ykmr1.jpg', '2025-01-11 09:04:01', 'laulua'),
(2, 'ykmr2.jpg', '2025-01-11 09:05:28', 'laulua'),
(3, 'ykmr3.jpg', '2025-01-11 09:05:42', 'laulua'),
(4, 'ykmr4.jpg', '2025-01-11 09:05:55', 'laulua'),
(5, 'ykmr5.jpg', '2025-01-11 09:06:10', 'laulua'),
(6, 'ykmr6.jpg', '2025-01-11 09:06:23', 'laulua'),
(7, 'ykmr7.jpg', '2025-01-11 09:06:40', 'laulua'),
(71, '20250112135039.jpg', '2025-01-12 13:50:39', 'laulua');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `gambar`) VALUES
(1, 'laulua', '332a0eb2bf3c6ce2c13b81384888faf8', '20250112135222.jpg'),
(2, 'danny', '21232f297a57a5a743894a0e4a801fc3', 'ykmr2.jpg'),
(3, 'dazai', 'd4532312eb5adbd1adcdeab843c898e1', 'ykmr3.jpg'),
(4, 'chuya', '38cd424a2fed1fb971ad7f36c30cb9f0', 'ykmr4.jpg'),
(5, 'mafumafu', '4feb6b81108c1089cbc1dc387f158af2', 'ykmr5.jpg'),
(6, 'soraru', 'e6c651a4132fdf544878c73cb2b0645a', 'ykmr6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
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
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
