-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 05:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `address`, `dob`, `password`, `image`) VALUES
(2, 'Nikesh Pyakurel', 'nikeshpyakurel32@gmail.com', 'biratnagar', '2003-07-27', 'd41d8cd98f00b204e9800998ecf8427e', '65157947_348866759127087_4617712750896873472_n.jpg'),
(3, 'bhawesh_kafle', 'bhawesh@gmail.com', 'Kathmandu', '2000-04-11', '81dc9bdb52d04dc20036dbd8313ed055', 'image 10.png'),
(4, '', '', '', '', '', ''),
(5, 'bhawesh_kafl', 'n@gmail.com', 'abt', '2022-11-11', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(6, 'Nikesh', 'nikeshpyakurel32@gmail.com', '', '2022-01-11', 'd41d8cd98f00b204e9800998ecf8427e', 'team-1.jpg'),
(7, 'ram', 'ram1@gmail.com', 'brt', '1000-11-11', 'b59c67bf196a4758191e42f76670ceba', ''),
(8, 'hari', 'hari@gmail.com', 'brt', '2022-11-11', 'b59c67bf196a4758191e42f76670ceba', ''),
(9, 'sita', 'sita@gmail.com', 'brt', '1111-11-11', 'b59c67bf196a4758191e42f76670ceba', ''),
(10, 'qq', 'qq@gmail.com', 'brt', '1111-11-11', 'b59c67bf196a4758191e42f76670ceba', ''),
(11, 'admi', 'aaaa@g.com', 'nn', '1111-11-11', 'b59c67bf196a4758191e42f76670ceba', ''),
(12, 'ram', 'nikeshpyakurel32@gmail.com', 'qq', '1111-11-11', 'b59c67bf196a4758191e42f76670ceba', ''),
(13, 'Nikesh Pyakurel', 'nikeshpyakurel32@gmail.com', 'Birtamode Jhapa', '22-22-22', '96e79218965eb72c92a549dd5a330112', ''),
(14, 'Nikesh Pyakurel', 'nikeshpyakurel@gmail.com', 'Biratnagar', '2000-07-27', 'd41d8cd98f00b204e9800998ecf8427e', 'nikesh 1.svg'),
(15, 'Nikesh Pyakurel', 'nikeshpyakurel@gmail.com', 'Biratnagar', '2000-07-27', 'e1a5381afad455f23299ca845012fa47', 'nikesh 1.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
