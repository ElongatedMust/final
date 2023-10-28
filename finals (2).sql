-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 05:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finals`
--

-- --------------------------------------------------------

--
-- Table structure for table `contentbox`
--

CREATE TABLE `contentbox` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contentbox`
--

INSERT INTO `contentbox` (`id`, `title`, `text`) VALUES
(1, 'Test', 'this is a test'),
(3, '2', 'asedasdasd'),
(4, 'Road Safety', 'The key to road safety is your self awareness'),
(6, 'ace', 'aceccec'),
(7, 'test5', 'This is a test to see if this works'),
(8, 'test demo', 'test demo 1');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path_image` varchar(255) DEFAULT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path_image`, `content_id`) VALUES
(1, './images/moto1.jpg', 1),
(56, './images/moto1.jpg', 3),
(57, './images/slide1.jpg', 4),
(59, 'images/HD-wallpaper-purple-galaxy-espacio-nebula-nebulae-solar-space-star-stars-system-tumblr.jpg', 6),
(60, 'images/image_2023-10-17_115134551-removebg-preview.png', 7),
(61, 'images/timthumb.gif', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `is_admin`) VALUES
(1, 'alex2001pinault@gmail.com', 'Alex', '$2y$10$37lQ7vxaUZtkc87JQElnK.WH3TnDGAagPFtSR22eFiMjBqsJzSbOa', 1),
(4, 'eva@gmail.com', 'eva', '$2y$10$mQQYfJpp5mflMINQJWBQiOskcz1cU41m2wa14OLSaOyGRDHZdpote', NULL),
(5, 'bruisedwang@gmail.com', 'bruisedwang', '$2y$10$8w.21kCBPz.a3eRxyB4JI.Ix89KhavPrwpt84l4/ixmhD3k3bpEJC', NULL),
(6, 'rene.pinault@gmai.com', 'alex2001pinault@gmail.com', '$2y$10$4TpCd6q3fBPQlw4ZyCoGyuEIJaCKpV0sYGYdweB0ieJTBApE9XCRG', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contentbox`
--
ALTER TABLE `contentbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_content_id` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contentbox`
--
ALTER TABLE `contentbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_content_id` FOREIGN KEY (`content_id`) REFERENCES `contentbox` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
