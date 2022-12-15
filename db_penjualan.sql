-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 10:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cartID` int(11) NOT NULL,
  `productcart_id` int(11) NOT NULL,
  `usercart_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `userID` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`userID`, `user`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `productID` int(11) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `currency` varchar(5) NOT NULL,
  `discount` float NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`productID`, `productCode`, `productName`, `price`, `currency`, `discount`, `dimension`, `unit`) VALUES
(3, 'P002', 'Pepsoden', 2000, 'IDR', 0.2, '13 cm x 10 cm', 'PCS'),
(4, 'P003', 'Le Minerale', 60000, 'IDR', 0.3, '3cm x 5cm', 'PCS'),
(6, 'P004', 'Good Day', 20000, 'IDR', 0.4, '3cm x 5cm', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction_detail`
--

CREATE TABLE `tb_transaction_detail` (
  `transactionDetailID` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL,
  `subTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction_detail`
--

INSERT INTO `tb_transaction_detail` (`transactionDetailID`, `transaction_id`, `product_id`, `quantity`, `subTotal`) VALUES
(161, 108, 3, 2, 3996),
(162, 108, 4, 3, 179820);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction_header`
--

CREATE TABLE `tb_transaction_header` (
  `transactionID` int(11) NOT NULL,
  `documentCode` varchar(50) NOT NULL,
  `documentNumber` varchar(3) NOT NULL,
  `user_id` int(50) NOT NULL,
  `total` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction_header`
--

INSERT INTO `tb_transaction_header` (`transactionID`, `documentCode`, `documentNumber`, `user_id`, `total`, `date`) VALUES
(104, 'TRX', '001', 1, 29990, '2022-12-16'),
(105, 'TRX', '002', 1, 19990, '2022-12-16'),
(106, 'TRX', '002', 1, 30000, '2022-12-16'),
(107, 'TRX', '003', 1, 19990, '2022-12-16'),
(108, 'TRX', '004', 1, 203816, '2022-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userRules` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`userID`, `userName`, `userPassword`, `userRules`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'ad', 'aas', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productcart_id` (`productcart_id`),
  ADD KEY `usercart_id` (`usercart_id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tb_transaction_detail`
--
ALTER TABLE `tb_transaction_detail`
  ADD PRIMARY KEY (`transactionDetailID`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `tb_transaction_header`
--
ALTER TABLE `tb_transaction_header`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaction_detail`
--
ALTER TABLE `tb_transaction_detail`
  MODIFY `transactionDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `tb_transaction_header`
--
ALTER TABLE `tb_transaction_header`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `productcart_id` FOREIGN KEY (`productcart_id`) REFERENCES `tb_product` (`productID`) ON DELETE CASCADE,
  ADD CONSTRAINT `usercart_id` FOREIGN KEY (`usercart_id`) REFERENCES `tb_user` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tb_transaction_detail`
--
ALTER TABLE `tb_transaction_detail`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`productID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `tb_transaction_header` (`transactionID`);

--
-- Constraints for table `tb_transaction_header`
--
ALTER TABLE `tb_transaction_header`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
