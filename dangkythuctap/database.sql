-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 12:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangkythuctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(2, 'Trà'),
(14, 'Cafe'),
(15, 'Ngọt');

-- --------------------------------------------------------

--
-- Table structure for table `phieudangkythuctap`
--

CREATE TABLE `phieudangkythuctap` (
  `HoTen` varchar(50) DEFAULT NULL,
  `MaSinhVien` varchar(50) DEFAULT NULL,
  `ChuyenNganh` varchar(50) DEFAULT NULL,
  `CongTy` varchar(50) DEFAULT NULL,
  `MaSoPhieu` int(11) NOT NULL,
  `SoTien` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieudangkythuctap`
--

INSERT INTO `phieudangkythuctap` (`HoTen`, `MaSinhVien`, `ChuyenNganh`, `CongTy`, `MaSoPhieu`, `SoTien`) VALUES
('hung', '123', 'cntt', 'ams', 6, '1000000'),
('quoc', '123', 'kinh te', 'ams', 7, '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductDes` varchar(255) DEFAULT NULL,
  `ProductSize` varchar(255) DEFAULT NULL,
  `ProductPrice` varchar(255) DEFAULT NULL,
  `ProductDiscount` varchar(255) DEFAULT NULL,
  `ProductNumber` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `ProductDes`, `ProductSize`, `ProductPrice`, `ProductDiscount`, `ProductNumber`, `ProductImage`) VALUES
(12, 'Trà Sữa 1', 'sdwd', 'XL', '22323', '222', '10003', 'trasua1.jpg'),
(13, 'Trà Sữa 2', 'ádasdasd', 'L', '100000', '222', '12', 'trasua2.jpg'),
(14, 'Trà Sữa 3', 'sadasdaasda', 'M', '100000', '60000', '10', 'trasua3.jpg'),
(15, 'Trà Sữa 4', 'sdwd', 'S', '223223', '12033', '1000', 'trasua4.jpg'),
(16, 'Trà Sữa 5', 'qwewddsds', 'L', '100000', '12033', '23', 'trasua5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Pass` varchar(250) DEFAULT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Pass`, `FullName`, `Avatar`, `Email`) VALUES
(1, 'abc', '$2y$10$eID9Ng2UAnB67YMdqOQ1OOzxAEMneTExNW9nTFBiFJu.lgRHPxO/C', '0', 'emre.png', NULL),
(2, 'hungg', '$2y$10$/OQXWaKBiQHLm.rLx.PfiOO0QcfYLbLLrTipBATlWvQLYi3bZvLga', '0', NULL, NULL),
(3, 'lam', '$2y$10$cQlxrWQrKt5ESzUN6A439uXzA8IA0k2eZVCzmjltu1xTMUaakGxdK', 'lam', NULL, NULL),
(4, 'quoc', '$2y$10$i8CbmHq2jtYVZbj1fYXlfO09rSRpB3J1ud3.c5y.OxfSmcmBKHoCm', 'quoc', 'noway.png', NULL),
(5, '123', '$2y$10$J981Smx0.oFO2kiSYW9fhunObeTHomsyqP29FpHC8sxtXiIW1Z.lC', '123', NULL, NULL),
(6, 'abc', '$2y$10$2sN92m2KpS.Ih77o8c6oeeoF06VCj7rbUELCEKusZl4RflS2N0AGe', 'abc', NULL, NULL),
(7, 'hung', '$2y$10$2rxwbFivD2BfP1N3XOZzt.KOdJWSftmvZ6go0awZZA46KyCUeJG7q', 'hung', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `phieudangkythuctap`
--
ALTER TABLE `phieudangkythuctap`
  ADD PRIMARY KEY (`MaSoPhieu`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phieudangkythuctap`
--
ALTER TABLE `phieudangkythuctap`
  MODIFY `MaSoPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
