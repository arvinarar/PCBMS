-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 06:00 AM
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
-- Database: `arar_pcbms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `consigned_details`
--

CREATE TABLE `consigned_details` (
  `item_id` int(11) NOT NULL,
  `cp_id` int(10) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `barcode` varchar(12) NOT NULL,
  `particulars` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `quantity` mediumint(8) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consigned_details`
--

INSERT INTO `consigned_details` (`item_id`, `cp_id`, `prod_id`, `barcode`, `particulars`, `expiry_date`, `unit_price`, `selling_price`, `quantity`, `amount`) VALUES
(1, 1, 4, '1031', 'Very white huehuehue', '2023-07-17', 12.00, 15.00, 8, 20.00),
(2, 2, 3, '1032', '1032', '2024-01-01', 12.00, 15.00, 5, 5.00),
(3, 3, 5, '1033', '', '2023-07-01', 12.00, 15.00, 3, 5.00),
(4, 4, 1, '1034', 'goods ra', '2023-07-18', 50.00, 60.00, 15, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `consigned_product`
--

CREATE TABLE `consigned_product` (
  `cp_id` int(10) NOT NULL,
  `supp_id` smallint(6) NOT NULL,
  `userid` smallint(6) NOT NULL,
  `date_delivered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consigned_product`
--

INSERT INTO `consigned_product` (`cp_id`, `supp_id`, `userid`, `date_delivered`) VALUES
(1, 7, 1, '2023-06-27'),
(2, 5, 1, '2023-07-02'),
(3, 5, 1, '2023-07-01'),
(4, 7, 1, '2023-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `address`) VALUES
(1, 'Bacalso', NULL),
(3, 'Maed', NULL),
(4, 'Jovert', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` bigint(20) NOT NULL,
  `empid` smallint(6) NOT NULL,
  `log` datetime NOT NULL,
  `state` enum('in','out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `empid`, `log`, `state`) VALUES
(1, 1, '2023-06-26 21:53:20', 'in'),
(2, 1, '2023-06-27 02:27:08', 'in'),
(3, 1, '2023-07-02 09:19:58', 'in'),
(4, 1, '2023-07-02 10:06:32', 'in'),
(5, 1, '2023-07-02 10:14:06', 'in'),
(6, 1, '2023-07-02 19:08:17', 'in'),
(7, 1, '2023-07-03 08:34:32', 'in'),
(8, 1, '2023-07-03 10:59:30', 'in'),
(9, 1, '2023-07-04 08:35:13', 'in'),
(10, 1, '2023-07-04 11:28:50', 'in'),
(11, 1, '2023-07-04 11:44:18', 'out'),
(12, 2, '2023-07-04 11:44:28', 'in'),
(13, 2, '2023-07-04 12:51:38', 'out'),
(14, 1, '2023-07-04 12:51:46', 'in'),
(15, 1, '2023-07-04 12:53:03', 'out'),
(16, 2, '2023-07-04 12:53:12', 'in'),
(17, 2, '2023-07-04 20:04:10', 'in'),
(18, 2, '2023-07-04 20:19:41', 'in'),
(19, 1, '2023-07-05 10:44:18', 'in'),
(20, 1, '2023-07-05 11:43:18', 'out'),
(21, 2, '2023-07-05 11:43:25', 'in'),
(22, 2, '2023-07-05 11:43:55', 'out'),
(23, 1, '2023-07-05 11:44:02', 'in'),
(24, 1, '2023-07-05 11:51:58', 'out'),
(25, 1, '2023-07-05 11:53:11', 'in'),
(26, 1, '2023-07-05 11:53:17', 'out'),
(27, 3, '2023-07-05 11:53:25', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `exp_id` int(11) NOT NULL,
  `supp_id` smallint(6) NOT NULL,
  `userid` smallint(6) NOT NULL,
  `assess_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`exp_id`, `supp_id`, `userid`, `assess_date`) VALUES
(6, 5, 1, '2023-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `expired_items`
--

CREATE TABLE `expired_items` (
  `exp_no` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expired_items`
--

INSERT INTO `expired_items` (`exp_no`, `exp_id`, `item_id`, `quantity`) VALUES
(4, 6, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `supp_id` smallint(6) NOT NULL,
  `userid` smallint(6) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Received','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `supp_id`, `userid`, `order_date`, `status`) VALUES
(3, 5, 1, '2023-06-26', 'Pending'),
(4, 5, 1, '2023-06-26', 'Pending'),
(5, 5, 1, '2023-06-26', 'Pending'),
(8, 5, 1, '2023-06-26', 'Received'),
(9, 6, 1, '2023-06-27', 'Cancelled'),
(10, 7, 1, '2023-06-27', 'Received'),
(11, 5, 1, '2023-07-02', 'Received'),
(12, 5, 1, '2023-07-03', 'Cancelled'),
(13, 7, 1, '2023-07-03', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `or_no` int(11) NOT NULL,
  `or_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`or_no`, `or_id`, `prod_id`, `quantity`) VALUES
(3, 8, 3, 5),
(4, 9, 1, 20),
(5, 10, 4, 10),
(6, 11, 5, 5),
(7, 12, 3, 500),
(8, 13, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `empid` smallint(6) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`empid`, `fname`, `mname`, `lname`) VALUES
(1, 'Ray Arvin', 'Giva', 'Arar'),
(2, 'Jovert', 'Makatol', 'Bacalso'),
(3, 'Allisa', 'Decarabia', 'Artwaltz');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `shelf_life` int(10) UNSIGNED NOT NULL,
  `unit` enum('piece','pack','bottle','bag') NOT NULL,
  `appreciation` decimal(7,2) NOT NULL,
  `max_quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `shelf_life`, `unit`, `appreciation`, `max_quantity`) VALUES
(1, 'Methamphetamine', 15, 'bag', 50.00, 5),
(3, '7.62mm Rifle Rounds', 183, 'pack', 20.00, 300),
(4, 'Nescafe Creamy White ', 20, 'pack', 50.00, 25),
(5, 'Creamy White', 1, 'pack', 50.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `date_issued` datetime NOT NULL,
  `cust_id` int(11) NOT NULL,
  `userid` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `date_issued`, `cust_id`, `userid`) VALUES
(1, '2023-07-05 02:20:52', 1, 2),
(2, '2023-07-05 02:28:07', 1, 2),
(3, '2023-07-05 02:31:14', 3, 2),
(4, '2023-07-05 11:43:41', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `item_no` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty_sold` int(11) NOT NULL,
  `amount_sold` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`item_no`, `sale_id`, `item_id`, `qty_sold`, `amount_sold`) VALUES
(4, 1, 1, 1, 15.00),
(5, 1, 2, 1, 15.00),
(6, 1, 4, 1, 60.00),
(7, 2, 1, 2, 30.00),
(8, 3, 1, 2, 30.00),
(9, 4, 4, 5, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` smallint(6) NOT NULL,
  `company` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `sex` enum('Male','Female','Non-binary') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `company`, `contact_person`, `sex`, `phone`, `address`) VALUES
(5, 'AOG', 'Simon', 'Male', '123454', 'cnnncaiajcos'),
(6, 'Bacalso Corporated', 'Jovert', 'Non-binary', '45642132', 'cnnncaiajcos'),
(7, 'Nescafe', 'Jonas Bacalso', 'Male', '09204625135', 'Naungan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` smallint(6) NOT NULL,
  `empid` smallint(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('Manager','Cashier','Personnel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `empid`, `username`, `password`, `role`) VALUES
(1, 1, 'arvin', 'arvin', 'Manager'),
(2, 2, 'Bacalso123', 'bacalso', 'Cashier'),
(3, 3, 'Allisa', 'Allisa', 'Personnel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consigned_details`
--
ALTER TABLE `consigned_details`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cp_id` (`cp_id`);

--
-- Indexes for table `consigned_product`
--
ALTER TABLE `consigned_product`
  ADD PRIMARY KEY (`cp_id`),
  ADD KEY `cp_id` (`cp_id`),
  ADD KEY `supp_id` (`supp_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `exp_id` (`exp_id`),
  ADD KEY `supp_id` (`supp_id`);

--
-- Indexes for table `expired_items`
--
ALTER TABLE `expired_items`
  ADD PRIMARY KEY (`exp_no`),
  ADD KEY `item_no` (`exp_no`),
  ADD KEY `exp_id` (`exp_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `or_id` (`or_id`),
  ADD KEY `supp_id` (`supp_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`or_no`),
  ADD KEY `item_no` (`or_no`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `or_id` (`or_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `prod_id` (`prod_id`,`prod_name`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`item_no`),
  ADD KEY `item_no` (`item_no`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`),
  ADD KEY `supp_id` (`supp_id`),
  ADD KEY `supp_id_2` (`supp_id`,`company`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `empid` (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consigned_details`
--
ALTER TABLE `consigned_details`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consigned_product`
--
ALTER TABLE `consigned_product`
  MODIFY `cp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expired_items`
--
ALTER TABLE `expired_items`
  MODIFY `exp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `or_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `empid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consigned_details`
--
ALTER TABLE `consigned_details`
  ADD CONSTRAINT `consigned_details_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `consigned_details_ibfk_2` FOREIGN KEY (`cp_id`) REFERENCES `consigned_product` (`cp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `consigned_product`
--
ALTER TABLE `consigned_product`
  ADD CONSTRAINT `consigned_product_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `supplier` (`supp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `consigned_product_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dtr`
--
ALTER TABLE `dtr`
  ADD CONSTRAINT `dtr_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `personnel` (`empid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `expired`
--
ALTER TABLE `expired`
  ADD CONSTRAINT `expired_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `supplier` (`supp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `expired_items`
--
ALTER TABLE `expired_items`
  ADD CONSTRAINT `expired_items_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `expired` (`exp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `expired_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `consigned_details` (`item_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `supplier` (`supp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`or_id`) REFERENCES `orders` (`or_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `consigned_details` (`item_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `personnel` (`empid`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
