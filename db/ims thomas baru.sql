-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 04:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `location`, `createDate`, `updateAt`) VALUES
(1, 'Cabang Jakarta Timur', 'Jakarta Timur', '2021-04-19 00:00:00', '2021-04-19 00:00:00'),
(2, 'Cabang Jakarta Selatan', 'Jakarta Selatan', '2021-04-19 00:00:00', '2021-04-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch_has_product`
--

CREATE TABLE `branch_has_product` (
  `id` int(11) NOT NULL,
  `productID` varchar(99) NOT NULL,
  `productName` varchar(99) NOT NULL,
  `branchID` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_has_product`
--

INSERT INTO `branch_has_product` (`id`, `productID`, `productName`, `branchID`, `stock`, `price`, `createdDate`, `updateAt`) VALUES
(36, 'K-0001', 'Keyboard HP', 2, 3, 150000, '2021-05-12 13:31:24', '2021-05-12 13:31:24'),
(37, 'K-0003', 'Keyboard Lenovo', 2, 2, 340000, '2021-05-12 13:33:53', '2021-05-12 13:33:53'),
(38, 'M-0001', 'Mouse Asus2', 1, 10, 250000, '2021-05-14 09:46:02', '2021-05-14 09:46:02'),
(39, 'HP-0002', 'HP Real Me', 2, 7, 4400000, '2021-05-18 13:29:23', '2021-05-18 13:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kodePos` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `createDate` date DEFAULT NULL,
  `createBy` varchar(100) DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `updateBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `address`, `provinsi`, `kota`, `kodePos`, `phoneNumber`, `createDate`, `createBy`, `updateDate`, `updateBy`) VALUES
(1, 'Fatika Raditya Putri', 'Pondok Aren, Tangsel', '', '', '', '081284999613', '2020-11-03', 'Admin', NULL, NULL),
(2, 'Josia Maranatha', 'Pamulang, Tangsel', '', '', '', '081284999621', '2020-11-03', 'Owner', NULL, NULL),
(3, 'Martha Veronica', 'Bintaro, Jaksel', '', '', '', '081284999644', '2020-11-03', 'Admin', NULL, NULL),
(9, 'Kresti Susanti', 'Jakarta Barat', '', '', '', '878921281', NULL, NULL, NULL, NULL),
(11, 'Umum', '-', '', '', '', '081284999612', NULL, NULL, NULL, NULL),
(13, 'Juang Bintang', 'Pondok Aren, Tangsel', '', '', '', '089630558943', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorder`
--
-- Error reading structure for table ims.deliveryorder: #1932 - Table 'ims.deliveryorder' doesn't exist in engine
-- Error reading data for table ims.deliveryorder: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `ims`.`deliveryorder`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `salesOrderID` int(11) NOT NULL,
  `invoiceAmount` int(100) NOT NULL,
  `details` text,
  `invoiceDate` date NOT NULL,
  `dueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `salesOrderID`, `invoiceAmount`, `details`, `invoiceDate`, `dueDate`) VALUES
(1, 1, 0, '', '2020-11-23', '2020-11-23'),
(2, 4, 10000, '', '2021-01-10', '2021-01-13'),
(3, 5, 9000, '', '2021-01-11', '2021-01-12'),
(4, 7, 10000, '', '2021-01-11', '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `salesOrderID` int(11) NOT NULL,
  `invoiceID` int(11) DEFAULT NULL,
  `amount` int(100) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `CreateDate` date NOT NULL,
  `CreateBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `salesOrderID`, `invoiceID`, `amount`, `paymentDate`, `paymentMethod`, `CreateDate`, `CreateBy`) VALUES
(1, 1, NULL, 0, '2020-11-26', 'Cash', '0000-00-00', ''),
(2, 4, 2, 10000, '2021-01-11', 'Cash', '0000-00-00', ''),
(3, 5, 3, 84000, '2021-01-11', 'Cash', '0000-00-00', ''),
(4, 7, 4, 10000, '2021-01-12', 'Cash', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productCode`, `productName`, `price`, `stock`, `createdDate`, `updateAt`) VALUES
(17, 'K-0001', 'Keyboard HP', 300000, 33, '2021-05-12 13:05:47', '2021-05-12 13:05:47'),
(18, 'K-0002', 'Keyboard Asus', 424000, 98, '2021-05-12 13:08:19', '2021-05-12 13:08:19'),
(19, 'M-0001', 'Mouse Asus2', 240000, 25, '2021-05-12 13:15:19', '2021-05-12 14:13:46'),
(20, 'K-0003', 'Keyboard Lenovo', 375000, 15, '2021-05-12 13:25:49', '2021-05-12 13:25:49'),
(22, 'HP-0002', 'HP Real Me', 4400000, 12, '2021-05-18 13:29:01', '2021-05-18 13:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `purchase_Id` int(10) NOT NULL,
  `id_vendor` int(10) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `create_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`purchase_Id`, `id_vendor`, `produk`, `jumlah`, `harga`, `tanggal_pengiriman`, `alamat`, `pembayaran`, `create_date`, `create_by`) VALUES
(1, 4, 'Buku Gambar', 200, 150000, '2021-01-04', 'Ciputat', 'Tunai', '2021-01-03', 'Admin'),
(2, 1, 'Spidol', 20, 250000, '2021-01-06', 'Bintaro', 'Kredit', '2021-01-03', 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `receive_id` int(100) NOT NULL,
  `purchase_id` int(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `kualitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`receive_id`, `purchase_id`, `nama_produk`, `jumlah`, `kualitas`) VALUES
(1, 1, 'Buku Gambar', 100, 'Baik'),
(3, 2, 'Spidol', 50, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `orderDate` date NOT NULL,
  `retur_id` varchar(100) NOT NULL,
  `purchase_id` int(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `alasan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`orderDate`, `retur_id`, `purchase_id`, `alamat`, `nama_produk`, `jumlah`, `alasan`) VALUES
('2021-01-03', '', 1, 'Ciputat', 'Buku Gambar', 100, 'Ada Buku Yang Robek');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `salesOrderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `orderDate` date NOT NULL,
  `statusOrder` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`salesOrderID`, `customerID`, `amount`, `orderDate`, `statusOrder`) VALUES
(1, 1, 0, '2020-11-02', 'Paid'),
(2, 2, 0, '2020-11-01', 'Delivered'),
(4, 3, 0, '2020-11-01', 'Created'),
(5, 13, 9000, '2021-01-11', 'Created'),
(6, 9, 10000, '2021-01-12', 'Created'),
(7, 11, 10000, '2021-01-11', 'Created');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--
-- Error reading structure for table ims.sales_product: #1932 - Table 'ims.sales_product' doesn't exist in engine
-- Error reading data for table ims.sales_product: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `ims`.`sales_product`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `branch_productID` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `branch_productID`, `unit`, `createdDate`, `updateAt`) VALUES
(2, 38, 1, '2021-05-12 00:00:00', '2021-04-26 00:00:00'),
(3, 36, 1, '2021-04-07 00:00:00', '2021-04-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roles` enum('superadmin','owner','staff','admin') NOT NULL,
  `createDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `password`, `roles`, `createDate`, `updateDate`) VALUES
(1, 'Juwita Ginting', 'owner', '5f4dcc3b5aa765d61d8327deb882cf99', 'owner', '2020-11-06', NULL),
(2, 'Doni', 'staff_1', 'd1b1482936aa96f41f64199dfadd1ab6', 'staff', '2020-11-06', NULL),
(3, 'Desqy', 'staff_2', 'd1b1482936aa96f41f64199dfadd1ab6', 'staff', '2020-11-06', NULL),
(4, 'Admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2021-01-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_branch`
--

CREATE TABLE `user_has_branch` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `branchID` int(11) NOT NULL COMMENT '0 => Gak punya cabang ya'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_branch`
--

INSERT INTO `user_has_branch` (`id`, `userID`, `branchID`) VALUES
(1, 1, 0),
(2, 2, 1),
(3, 3, 2),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(10) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `alamat`, `no_tlp`) VALUES
(1, 'Toko Marshall', 'Ciputat', '081284999613'),
(2, 'Toko Timothy', 'jl. Cendrawasih', '081284999612'),
(4, 'Toko Sahabat', 'Jln. Ciputat No 1 Tangerang Selatan', '083899571255'),
(5, 'Jeevan ', 'Jl. Alam Asri 1 Blok H8 No 20-21 Vila Dago Pamulang Tangerang Selatan', '083801231233');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `description`, `createdDate`, `updateAt`) VALUES
(1, 'Warehouse Jakarta Timur', 'Test Warehouse A', '2021-04-23 00:00:00', '2021-04-23 00:00:00'),
(3, 'Warehouse Jakarta Selatan', 'Test Warehouse B', '2021-04-23 13:49:48', '2021-04-23 13:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_has_branch`
--

CREATE TABLE `warehouse_has_branch` (
  `id` int(11) NOT NULL,
  `warehouseID` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_has_branch`
--

INSERT INTO `warehouse_has_branch` (`id`, `warehouseID`, `branchID`, `createdDate`, `updateAt`) VALUES
(1, 1, 1, '2021-04-23 00:00:00', '2021-04-23 00:00:00'),
(2, 3, 2, '2021-05-10 10:48:01', '2021-05-10 10:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_has_stock`
--

CREATE TABLE `warehouse_has_stock` (
  `id` int(11) NOT NULL,
  `warehouseID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_has_stock`
--

INSERT INTO `warehouse_has_stock` (`id`, `warehouseID`, `productID`, `createdDate`, `updateAt`) VALUES
(7, 3, 17, '2021-05-12 13:05:47', '2021-05-12 13:05:47'),
(8, 3, 18, '2021-05-12 13:08:19', '2021-05-12 13:08:19'),
(9, 1, 19, '2021-05-12 13:15:20', '2021-05-12 13:15:20'),
(10, 3, 20, '2021-05-12 13:25:50', '2021-05-12 13:25:50'),
(12, 3, 22, '2021-05-18 13:29:02', '2021-05-18 13:29:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_has_product`
--
ALTER TABLE `branch_has_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `salesOrderID` (`salesOrderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `salesOrderID` (`salesOrderID`),
  ADD KEY `invoiceID` (`invoiceID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`purchase_Id`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`receive_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`retur_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`salesOrderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_has_branch`
--
ALTER TABLE `user_has_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_has_branch`
--
ALTER TABLE `warehouse_has_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_has_stock`
--
ALTER TABLE `warehouse_has_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_has_product`
--
ALTER TABLE `branch_has_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `purchase_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `receive_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `salesOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_has_branch`
--
ALTER TABLE `user_has_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse_has_branch`
--
ALTER TABLE `warehouse_has_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse_has_stock`
--
ALTER TABLE `warehouse_has_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`salesOrderID`) REFERENCES `salesorder` (`salesOrderID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`salesOrderID`) REFERENCES `salesorder` (`salesOrderID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`invoiceID`);

--
-- Constraints for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD CONSTRAINT `purchaseorder_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);

--
-- Constraints for table `receive`
--
ALTER TABLE `receive`
  ADD CONSTRAINT `receive_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchaseorder` (`purchase_Id`);

--
-- Constraints for table `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchaseorder` (`purchase_Id`);

--
-- Constraints for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD CONSTRAINT `salesorder_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

