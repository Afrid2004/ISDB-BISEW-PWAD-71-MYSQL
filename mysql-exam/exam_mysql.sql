-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2026 at 08:30 AM
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
-- Database: `exam_mysql`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertManufacturerData` (IN `m_name` VARCHAR(50), IN `m_location` VARCHAR(20))   BEGIN
	INSERT INTO manufacturer (name, location) VALUES (m_name, m_location);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProductData` (IN `p_name` VARCHAR(50), IN `p_price` INT, IN `p_manufacturer_id` INT)   BEGIN
	INSERT INTO product (name, price, manufacturer_id) VALUES (p_name, p_price, p_manufacturer_id);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `allmanufacturer`
-- (See below for the actual view)
--
CREATE TABLE `allmanufacturer` (
`id` int(11)
,`name` varchar(50)
,`location` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `allproduct`
-- (See below for the actual view)
--
CREATE TABLE `allproduct` (
`id` int(11)
,`name` varchar(50)
,`price` int(11)
,`Manufacturer` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `location`) VALUES
(3, 'AKIJ FOODS', 'Chattogram');

--
-- Triggers `manufacturer`
--
DELIMITER $$
CREATE TRIGGER `delete_product_before_delete_manufacturer` BEFORE DELETE ON `manufacturer` FOR EACH ROW BEGIN
	DELETE FROM product
    WHERE manufacturer_id= OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `manufacturer_id`) VALUES
(6, 'Mango Juice', 80, 3);

-- --------------------------------------------------------

--
-- Structure for view `allmanufacturer`
--
DROP TABLE IF EXISTS `allmanufacturer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allmanufacturer`  AS SELECT `manufacturer`.`id` AS `id`, `manufacturer`.`name` AS `name`, `manufacturer`.`location` AS `location` FROM `manufacturer` ;

-- --------------------------------------------------------

--
-- Structure for view `allproduct`
--
DROP TABLE IF EXISTS `allproduct`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allproduct`  AS SELECT `p`.`id` AS `id`, `p`.`name` AS `name`, `p`.`price` AS `price`, `manufacturer`.`name` AS `Manufacturer` FROM (`product` `p` join `manufacturer` on(`p`.`manufacturer_id` = `manufacturer`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
