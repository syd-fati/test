-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 08:47 PM
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
-- Database: `pharmacy489`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerCPR` int(9) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tel` int(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `cardInfo` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `shippingInfo` varchar(50) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer1`
--

CREATE TABLE `customer1` (
  `PID` int(10) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `PhoneNo` int(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `CreditCardInfo` varchar(255) NOT NULL,
  `ShippingInfo` varchar(255) NOT NULL,
  `AccBalance` varchar(255) NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer1`
--

INSERT INTO `customer1` (`PID`, `FName`, `LName`, `PhoneNo`, `Email`, `Address`, `DOB`, `CreditCardInfo`, `ShippingInfo`, `AccBalance`, `UserID`) VALUES
(1, 'tahera', 'isa', 37326414, 'tahera.muhammad121@gmail.com', 'fffffffffffffffffffff33333333333', '2023-11-01', '66666666', 'huuhiuhihiu', '', 9),
(2, 'rehab', 'isa', 37326414, 'jniiuiuuihii@gmail.com', 'kokoikooo', '2023-11-01', '99999', '88u8', '', 10),
(3, 'llisa', 'hygfd', 77776666, 'tahera.muh@gmail.com', 'gtgtgygytgyt6', '2023-12-20', '666', '77777njnj', '', 11),
(4, 'rehab90', 'isa', 37326414, 'jniiuiuuihii@gmail.com', 'kokoikooo', '2023-12-20', '789065432', '888888888888888', '', 40);

-- --------------------------------------------------------

--
-- Table structure for table `customer2`
--

CREATE TABLE `customer2` (
  `id` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `PhoneNo` varchar(8) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `CreditCardInfo` varchar(255) NOT NULL,
  `ShippingInfo` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `totalAmount` double(10,2) NOT NULL,
  `shippingInfo` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL,
  `cardInfo` varchar(255) NOT NULL,
  `paymentMethod` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `totalAmount` double(10,2) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `date` date NOT NULL,
  `cardInfo` varchar(255) NOT NULL,
  `paymentMethod` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `ProductDetail` varchar(255) NOT NULL,
  `expiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffandadmin`
--

CREATE TABLE `staffandadmin` (
  `StaffID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `jobTitle` text NOT NULL,
  `PhoneNo` int(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `dateOfJoin` date NOT NULL,
  `gender` text NOT NULL,
  `DOB` date NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffandadmin1`
--

CREATE TABLE `staffandadmin1` (
  `SID` int(10) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `PhoneNo` int(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Email`, `type`) VALUES
(7, 'yghjkd', '$2y$10$P48xrhk2J8Di028erZrkvOMOIJhTQ0sJq4RI7mGGPwaZWeZX2Avue', 'lolo.muhammad121@gmail.com', ''),
(8, 'toto78', '$2y$10$yA58FI4hjfhoUCmtA2JJOueQ7z23RTPUfrEitEVPI4feDn6MeFzwC', 'tahera.muhammad121@gmail.com', ''),
(9, 'toto78', '$2y$10$39xNbS4LgFHANH9x.HImM.C4Qg/1.lGU6BT6yi/Xp3d6cPdp2V4dy', 'tahera.muhammad121@gmail.com', ''),
(10, 'rehad', '$2y$10$wnou1mxcTCVmIlSoDc9pp.6xhLZhm.pYJ7VjVFTuPsnus9TioUaMa', 'jniiuiuuihii@gmail.com', ''),
(11, 'tahera', '$2y$10$OG89WsRhy9a0jYTCWEfE1uTY1bSS78DoiEciuJyMcIEAvrdMknO0u', 'tahera.muh@gmail.com', ''),
(16, 'toto78', '$2y$10$EHGWVL1SGKHXQvIMd.RquuRsEZMLRtEcWKUri7wEc2i3rPu5/c59y', 'tahera.muh@gmail.com', ''),
(17, 'yghjkd', '$2y$10$FYGsIjI149ydTV26ajRQjO.Mvoysz3Co6PTFwdGvLJebcVAX6DIaW', 'tahera.muh@gmail.com', ''),
(18, 'yghjkd', '$2y$10$cPHaB69QKG.nLCRXYEfI2.fhT.UTFGpci27Nwgh.4sLTBWDdhp7H2', 'tahera.muh@gmail.com', ''),
(31, 'yuoon898', '$2y$10$qbsl09Z9B9vPTJxT1KEC6.41nVB4czTbZPVRQy0vMXoyYPz38vhrq', 'tahera.muhammad121@gmail.com', ''),
(32, 'yuoon898', '$2y$10$Jc4zfmEF.1pc/bElho/uiOR3/wmwADpL5aLF5aHf22.wl0i7HQvNu', 'tahera.muhammad121@gmail.com', ''),
(33, 'yuoon898', '$2y$10$0UdPfo7i0ft.0V.gVmLzfejP8wtO9af.2vIp/JkwaN80LrEp93lIe', 'tahera.muhammad121@gmail.com', ''),
(34, 'yuoon898', '$2y$10$oIk7x3/Z/g0olJCyxapIIuX2zVHp93r0mqa0qbcwN1SpqZkEAQcte', 'tahera.muhammad121@gmail.com', ''),
(35, 'yuoon898', '$2y$10$Is.QvbQeGFI5ftmeye1RJ.9tJypo8hVAr9e2RrcwP/.VOonp8pJ2G', 'tahera.muhammad121@gmail.com', ''),
(36, 'yuoon898', '$2y$10$4y/0cyoMPJ/hQyF/JTYTgu5EFTYfafvAsP/Vobh4J5A6tgOYDd1F2', 'tahera.muhammad121@gmail.com', ''),
(37, 'yuoon898', '$2y$10$l6h2ECO6HEAdJ9ULTgZxc.rsZOUI/v.UHQUUwtyXjmwSDaXzAFVTO', 'tahera.muhammad121@gmail.com', ''),
(38, 'yuoon898', '$2y$10$SuY7ehITLKI3.1i9D9zv2OxEMGEjvxRchjxMJO3VYWGFqmZ9i.tKm', 'tahera.muhammad121@gmail.com', ''),
(39, 'tahoora', '$2y$10$T34znSbROG6GtY2D8yBSP.1a4XYeK/1yZD2RBUcwOB7DV7szY/5kq', 'tahera.muhammad121@gmail.com', ''),
(40, 'hoho890', '$2y$10$zhgP7sS3hjfz2qkN7uvFmOyP.D4YyqGnJgkuvxo/8LsM8Gm9YmD5q', 'jniiuiuuihii@gmail.com', ''),
(41, 'nonoe', '$2y$10$Dtp7DMkCz0ch1ZAxC5R1EeIKTgGPGpgqd8GE6WhNstYmCGZhmWssC', 'tahera.muhammad121@gmail.com', ''),
(42, 'nonoe', '$2y$10$EhCE3zWB5YOb81LIKHa3P.iHFNtXKUHBkKg0kIjudoFlGpkUbWvGm', 'tahera.muhammad121@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerCPR`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `customer1`
--
ALTER TABLE `customer1`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `userid` (`UserID`);

--
-- Indexes for table `customer2`
--
ALTER TABLE `customer2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `staffandadmin`
--
ALTER TABLE `staffandadmin`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `userid` (`UserID`);

--
-- Indexes for table `staffandadmin1`
--
ALTER TABLE `staffandadmin1`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerCPR` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer1`
--
ALTER TABLE `customer1`
  MODIFY `PID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer2`
--
ALTER TABLE `customer2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffandadmin`
--
ALTER TABLE `staffandadmin`
  MODIFY `StaffID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffandadmin1`
--
ALTER TABLE `staffandadmin1`
  MODIFY `SID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer1`
--
ALTER TABLE `customer1`
  ADD CONSTRAINT `customer1_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer2`
--
ALTER TABLE `customer2`
  ADD CONSTRAINT `customer2_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `staffandadmin`
--
ALTER TABLE `staffandadmin`
  ADD CONSTRAINT `staffandadmin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `staffandadmin1`
--
ALTER TABLE `staffandadmin1`
  ADD CONSTRAINT `staffandadmin1_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
