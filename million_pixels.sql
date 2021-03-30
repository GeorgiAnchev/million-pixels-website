-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 02:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `million_pixels`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `row` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `placed_on` date NOT NULL,
  `price` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `reviewer_id`, `is_accepted`, `row`, `height`, `col`, `width`, `img_path`, `placed_on`, `price`, `url`, `caption`) VALUES
(43, 2, NULL, 1, 0, 40, 0, 40, 'images/6008680a5d0cf_capital.png', '2021-01-20', 16, 'https://www.capital.bg/', 'capital'),
(44, 1, NULL, 1, 100, 10, 200, 10, 'images/60087238a353d_pink1.png', '2021-01-20', 1, 'https://www.kaldata.com/', 'kaldata'),
(45, 8, NULL, 1, 50, 30, 40, 20, 'images/6008b8ad3e23d_sinoptik.png', '2021-01-21', 6, 'https://www.sinoptik.bg/', 'sinoptik'),
(46, 8, NULL, 1, 50, 100, 60, 100, 'images/6009712cc2b41_reddit.png', '2021-01-21', 100, 'https://www.reddit.com/', 'reddit'),
(47, 9, NULL, 1, 300, 160, 400, 300, 'images/60098fe52c496_zamunda.png', '2021-01-21', 480, 'zamunda.net', 'banani'),
(48, 1, 1, 1, 110, 200, 160, 200, 'images/6009bbe6e02ee_bitcoin.png', '2021-01-21', 400, 'https://coinmarketcap.com/currencies/bitcoin/', 'bitcoin'),
(49, 1, 1, 1, 90, 20, 190, 10, 'images/6009df14a4ee0_netflix.png', '2021-01-21', 2, 'https://www.netflix.com/bg/', 'netflix and chill'),
(50, 1, 1, 0, 100, 160, 500, 240, 'images/6009e01bd4ba3_twitch.png', '2021-01-21', 384, 'https://www.twitch.tv/', 'twitch.tv'),
(62, 1, 1, 0, 400, 50, 400, 50, 'images/6009e86d06f53_google.png', '2021-01-21', 25, 'www.google.com', 'google'),
(65, 1, 1, 1, 460, 50, 400, 50, 'images/6009e8ad8ee57_google.png', '2021-01-21', 25, 'www.google.com', 'google'),
(66, 1, 1, 0, 600, 10, 600, 10, 'images/6009f23a8f4f9_pink1.png', '2021-01-21', 1, 'asdad', 'sadasd'),
(67, 1, 1, 1, 20, 170, 400, 310, 'images/601069e4c5b01_php.png', '2021-01-26', 527, 'https://www.php.net/', 'php'),
(79, 10, 1, 1, 450, 10, 700, 10, 'images/6010a0175b41e_pink1.png', '2021-01-27', 1, 'gmedd.com', 'gme'),
(80, 1, 1, 0, 100000, 10, 0, 10, 'images/6010a6d478e6b_pink1.png', '2021-01-27', 1, 'goaodsoao', 'asdadads'),
(81, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a80023f49_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(82, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a8cedef02_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(83, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a8f469778_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(84, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a90074248_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(85, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a909b84af_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(86, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a90e7879c_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(87, 1, 1, 0, 10000000, 10, 140000, 10, 'images/6010a91c38857_pink1.png', '2021-01-27', 1, 'sadsad', 'sadada'),
(88, 9, 9, 1, 300, 50, 900, 50, 'images/6010bcd29f659_microsoft.png', '2021-01-27', 25, 'https://www.microsoft.com/', 'microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `fn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `points`, `is_admin`, `fn`) VALUES
(1, 'georgianchev', 'georgianchev', 10000, 1, 61816),
(2, 'ivanivanov', 'ivanivanov', 68, 0, 12345),
(8, 'dragan', 'dragan', 100, 0, 65432),
(9, 'mimi', 'mimi123', 495, 1, 6545678),
(10, 'martin', 'martin', 507, 0, 69420),
(11, 'katq', 'katq', 1, 0, 123453);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
