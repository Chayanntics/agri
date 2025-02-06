-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 05:08 PM
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
-- Database: `db_agrikulture`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `tbl_account_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `account_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`tbl_account_id`, `username`, `password`, `account_type`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'association', '1', 'association'),
(3, 'customer', '1', 'customer'),
(4, 'driver', '1', 'driver'),
(5, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `tbl_address_id` int(11) NOT NULL,
  `tbl_customer_id` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`tbl_address_id`, `tbl_customer_id`, `address`) VALUES
(1, 1, 'Bacolod City Negros Occidental');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_association`
--

CREATE TABLE `tbl_association` (
  `tbl_association_id` int(11) NOT NULL,
  `association_name` text NOT NULL,
  `tbl_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_association`
--

INSERT INTO `tbl_association` (`tbl_association_id`, `association_name`, `tbl_account_id`) VALUES
(1, 'association', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_association_farmer`
--

CREATE TABLE `tbl_association_farmer` (
  `tbl_association_farmer_id` int(11) NOT NULL,
  `tbl_association_id` int(11) NOT NULL,
  `tbl_farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_association_farmer`
--

INSERT INTO `tbl_association_farmer` (`tbl_association_farmer_id`, `tbl_association_id`, `tbl_farmer_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business`
--

CREATE TABLE `tbl_business` (
  `tbl_business_id` int(11) NOT NULL,
  `business_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `tbl_cart_id` int(11) NOT NULL,
  `quantity_cart` int(11) NOT NULL,
  `datetime_cart` datetime NOT NULL DEFAULT current_timestamp(),
  `tbl_product_id` int(11) NOT NULL,
  `tbl_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`tbl_cart_id`, `quantity_cart`, `datetime_cart`, `tbl_product_id`, `tbl_customer_id`) VALUES
(1, 2, '2025-02-05 14:33:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `tbl_category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`tbl_category_id`, `category_name`) VALUES
(1, 'cereals'),
(2, 'vegetables'),
(3, 'fruits'),
(4, 'nuts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crop`
--

CREATE TABLE `tbl_crop` (
  `tbl_crop_id` int(11) NOT NULL,
  `crop_name` text NOT NULL,
  `tbl_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_crop`
--

INSERT INTO `tbl_crop` (`tbl_crop_id`, `crop_name`, `tbl_category_id`) VALUES
(1, 'Apple', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `tbl_customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `tbl_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`tbl_customer_id`, `customer_name`, `tbl_account_id`) VALUES
(1, 'customer 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_business`
--

CREATE TABLE `tbl_customer_business` (
  `tbl_customer_business_id` int(11) NOT NULL,
  `tbl_customer_id` int(11) NOT NULL,
  `tbl_business_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `tbl_delivery_id` int(11) NOT NULL,
  `tbl_order_id` int(11) NOT NULL,
  `tbl_driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`tbl_delivery_id`, `tbl_order_id`, `tbl_driver_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dispose`
--

CREATE TABLE `tbl_dispose` (
  `tbl_dispose_id` int(11) NOT NULL,
  `tbl_stockin_id` int(11) NOT NULL,
  `tbl_crop_id` int(11) NOT NULL,
  `quantity_dispose` int(11) NOT NULL,
  `datetime_dispose` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dispose`
--

INSERT INTO `tbl_dispose` (`tbl_dispose_id`, `tbl_stockin_id`, `tbl_crop_id`, `quantity_dispose`, `datetime_dispose`) VALUES
(1, 0, 1, 2, '2025-02-07 00:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `tbl_driver_id` int(11) NOT NULL,
  `driver_name` text NOT NULL,
  `vehicle` text NOT NULL,
  `tbl_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`tbl_driver_id`, `driver_name`, `vehicle`, `tbl_account_id`) VALUES
(1, 'driver 1', '', 4),
(2, '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmer`
--

CREATE TABLE `tbl_farmer` (
  `tbl_farmer_id` int(11) NOT NULL,
  `farmer_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_farmer`
--

INSERT INTO `tbl_farmer` (`tbl_farmer_id`, `farmer_name`) VALUES
(1, 'farmer1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merchandise`
--

CREATE TABLE `tbl_merchandise` (
  `tbl_merchandise_id` int(11) NOT NULL,
  `quantity_merchandise` int(11) NOT NULL,
  `datetime_merchandise` datetime NOT NULL DEFAULT current_timestamp(),
  `tbl_association_id` int(11) NOT NULL,
  `tbl_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_merchandise`
--

INSERT INTO `tbl_merchandise` (`tbl_merchandise_id`, `quantity_merchandise`, `datetime_merchandise`, `tbl_association_id`, `tbl_product_id`) VALUES
(1, 10, '2025-02-06 23:53:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `tbl_order_id` int(11) NOT NULL,
  `order_no` text NOT NULL,
  `datetime_order` datetime NOT NULL DEFAULT current_timestamp(),
  `tbl_address_id` int(11) NOT NULL,
  `tbl_customer_id` int(11) NOT NULL,
  `tbl_association_id` int(11) NOT NULL,
  `current_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`tbl_order_id`, `order_no`, `datetime_order`, `tbl_address_id`, `tbl_customer_id`, `tbl_association_id`, `current_status`) VALUES
(1, '00001', '2025-02-05 20:41:32', 1, 1, 1, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cart`
--

CREATE TABLE `tbl_order_cart` (
  `tbl_order_cart_id` int(11) NOT NULL,
  `tbl_order_id` int(11) NOT NULL,
  `tbl_cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_cart`
--

INSERT INTO `tbl_order_cart` (`tbl_order_cart_id`, `tbl_order_id`, `tbl_cart_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_status`
--

CREATE TABLE `tbl_order_status` (
  `tbl_order_status_id` int(11) NOT NULL,
  `tbl_order_id` int(11) NOT NULL,
  `order_status` text NOT NULL,
  `datetime_status` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_status`
--

INSERT INTO `tbl_order_status` (`tbl_order_status_id`, `tbl_order_id`, `order_status`, `datetime_status`) VALUES
(1, 1, 'Pending', '2025-02-05 20:41:32'),
(2, 1, 'On The Way', '2025-02-06 21:51:38'),
(3, 1, 'Ready for pickup', '2025-02-06 21:52:09'),
(5, 1, 'On the way', '2025-02-06 23:40:06'),
(6, 1, 'Delivered', '2025-02-06 23:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `tbl_payment_id` int(11) NOT NULL,
  `tbl_payment_method_id` int(11) NOT NULL,
  `amount_paid` text NOT NULL,
  `datetime_paid` datetime NOT NULL DEFAULT current_timestamp(),
  `tbl_sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_method`
--

CREATE TABLE `tbl_payment_method` (
  `tbl_payment_method_id` int(11) NOT NULL,
  `payment_method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment_method`
--

INSERT INTO `tbl_payment_method` (`tbl_payment_method_id`, `payment_method`) VALUES
(1, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `tbl_product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` text NOT NULL,
  `tbl_association_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`tbl_product_id`, `product_name`, `product_price`, `tbl_association_id`) VALUES
(1, 'Apple x12', '250', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_crop`
--

CREATE TABLE `tbl_product_crop` (
  `tbl_product_crop_id` int(11) NOT NULL,
  `tbl_product_id` int(11) NOT NULL,
  `tbl_crop_id` int(11) NOT NULL,
  `crop_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_crop`
--

INSERT INTO `tbl_product_crop` (`tbl_product_crop_id`, `tbl_product_id`, `tbl_crop_id`, `crop_quantity`) VALUES
(1, 1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `tbl_sales_id` int(11) NOT NULL,
  `tbl_order_id` int(11) NOT NULL,
  `amount` text NOT NULL,
  `datetime_sales` datetime NOT NULL DEFAULT current_timestamp(),
  `sales_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockin`
--

CREATE TABLE `tbl_stockin` (
  `tbl_stockin_id` int(11) NOT NULL,
  `tbl_association_id` int(11) NOT NULL,
  `stockin_code` text NOT NULL,
  `datetime_stockin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stockin`
--

INSERT INTO `tbl_stockin` (`tbl_stockin_id`, `tbl_association_id`, `stockin_code`, `datetime_stockin`) VALUES
(1, 1, '002001', '2025-02-05 23:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockin_crop`
--

CREATE TABLE `tbl_stockin_crop` (
  `tbl_stockin_crop_id` int(11) NOT NULL,
  `tbl_stockin_id` int(11) NOT NULL,
  `tbl_farmer_id` int(11) NOT NULL,
  `tbl_crop_id` int(11) NOT NULL,
  `quantity_added` int(11) NOT NULL,
  `datetime_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stockin_crop`
--

INSERT INTO `tbl_stockin_crop` (`tbl_stockin_crop_id`, `tbl_stockin_id`, `tbl_farmer_id`, `tbl_crop_id`, `quantity_added`, `datetime_added`) VALUES
(1, 1, 1, 1, 5, '2025-02-07 00:01:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`tbl_account_id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`tbl_address_id`);

--
-- Indexes for table `tbl_association`
--
ALTER TABLE `tbl_association`
  ADD PRIMARY KEY (`tbl_association_id`);

--
-- Indexes for table `tbl_association_farmer`
--
ALTER TABLE `tbl_association_farmer`
  ADD PRIMARY KEY (`tbl_association_farmer_id`);

--
-- Indexes for table `tbl_business`
--
ALTER TABLE `tbl_business`
  ADD PRIMARY KEY (`tbl_business_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`tbl_cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`tbl_category_id`);

--
-- Indexes for table `tbl_crop`
--
ALTER TABLE `tbl_crop`
  ADD PRIMARY KEY (`tbl_crop_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`tbl_customer_id`);

--
-- Indexes for table `tbl_customer_business`
--
ALTER TABLE `tbl_customer_business`
  ADD PRIMARY KEY (`tbl_customer_business_id`);

--
-- Indexes for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`tbl_delivery_id`);

--
-- Indexes for table `tbl_dispose`
--
ALTER TABLE `tbl_dispose`
  ADD PRIMARY KEY (`tbl_dispose_id`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`tbl_driver_id`);

--
-- Indexes for table `tbl_farmer`
--
ALTER TABLE `tbl_farmer`
  ADD PRIMARY KEY (`tbl_farmer_id`);

--
-- Indexes for table `tbl_merchandise`
--
ALTER TABLE `tbl_merchandise`
  ADD PRIMARY KEY (`tbl_merchandise_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`tbl_order_id`);

--
-- Indexes for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  ADD PRIMARY KEY (`tbl_order_cart_id`);

--
-- Indexes for table `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  ADD PRIMARY KEY (`tbl_order_status_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`tbl_payment_id`);

--
-- Indexes for table `tbl_payment_method`
--
ALTER TABLE `tbl_payment_method`
  ADD PRIMARY KEY (`tbl_payment_method_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`tbl_product_id`);

--
-- Indexes for table `tbl_product_crop`
--
ALTER TABLE `tbl_product_crop`
  ADD PRIMARY KEY (`tbl_product_crop_id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`tbl_sales_id`);

--
-- Indexes for table `tbl_stockin`
--
ALTER TABLE `tbl_stockin`
  ADD PRIMARY KEY (`tbl_stockin_id`);

--
-- Indexes for table `tbl_stockin_crop`
--
ALTER TABLE `tbl_stockin_crop`
  ADD PRIMARY KEY (`tbl_stockin_crop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `tbl_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `tbl_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_association`
--
ALTER TABLE `tbl_association`
  MODIFY `tbl_association_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_association_farmer`
--
ALTER TABLE `tbl_association_farmer`
  MODIFY `tbl_association_farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `tbl_business_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `tbl_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `tbl_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_crop`
--
ALTER TABLE `tbl_crop`
  MODIFY `tbl_crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `tbl_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_business`
--
ALTER TABLE `tbl_customer_business`
  MODIFY `tbl_customer_business_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `tbl_delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dispose`
--
ALTER TABLE `tbl_dispose`
  MODIFY `tbl_dispose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `tbl_driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_farmer`
--
ALTER TABLE `tbl_farmer`
  MODIFY `tbl_farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_merchandise`
--
ALTER TABLE `tbl_merchandise`
  MODIFY `tbl_merchandise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `tbl_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order_cart`
--
ALTER TABLE `tbl_order_cart`
  MODIFY `tbl_order_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  MODIFY `tbl_order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `tbl_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment_method`
--
ALTER TABLE `tbl_payment_method`
  MODIFY `tbl_payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `tbl_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product_crop`
--
ALTER TABLE `tbl_product_crop`
  MODIFY `tbl_product_crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `tbl_sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stockin`
--
ALTER TABLE `tbl_stockin`
  MODIFY `tbl_stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stockin_crop`
--
ALTER TABLE `tbl_stockin_crop`
  MODIFY `tbl_stockin_crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
