-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Dareen Mazen', 'dareen@gmail.com', 'sha1('123456789')');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `type`) VALUES
(1, 'PC Accessories'),
(2, 'Mobile Accessories'),
(3, 'Mobiles'),
(4, 'Tablets'),
(5, 'Men Watches'),
(6, 'Digital Cameras');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `priceEach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customerEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customerPhone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 10,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `desc`, `img`, `price`, `category_id`, `quantity`, `created_at`) VALUES
(37, 'Huawei MatePad T8 2GB 16GB Deepsea Blue', 'Display Type : IPS LCD capacitive touchscreen, 16M colors ,\r\nDisplay Resolution In Pixels : 800 x 1280 ,\r\nTouch Screen : YES ,\r\nProcessor Chipset : Mediatek MT8768 ,\r\nProcessor CPU : Octa-core ,\r\nInternal Memory Capacity In GB : 16 GB ,\r\nMemory RAM In GB : 2 GB ,\r\nOperating System : Android ,\r\nOperating System Version : Android 10, EMUI 10, no Google Play Services ,\r\nRear Camera : 5 MP ,\r\nFront Camera : 2 MP ,\r\nVideo Recording Type : 1080p@30fps ,\r\nNetwork Type : 2G,3G,4G ,\r\nSIM Type : Nano SIM ,\r\nWiFi : YES ,\r\nBluetooth : YES ,\r\nInfrared : NO,\r\nRadio : NO ,\r\nNFC : NO ,\r\nBattery capacity : 5100 mAh battery', '5f5ada75cc26f.jpg', 2199, 4, 3, '2020-09-11 04:01:25'),
(38, 'ThinkVision T2254 22-inch LED Backlit LCD Monitor', 'ThinkVision T2254 offers the quality visual performance needed to improve professional productivity. It provides a large screen size with its 22” widescreen in 16:10 aspect ratio. The VGA and DVI interface allows easy connectivity with legacy systems. The 1680 x 1050 resolution, lightning-fast speed of 5 milliseconds, 250 nits brightness, 72% colour gamut and 1000:1 contrast ratio provide clarity for comfortable viewing. With its ergonomic lift and tilt stand, it is easy to use. And it is built with the highest industry standards in mind, including Energy Star 6.0, TCO 6.0, TCO Edge 2.0, EPEAT Gold, ULE Gold, TUV Green Mark, CEL Tier 1 and more. DISPLAY: LED backlit LCD panel 22\" wide, 16:10, 1680 x 1050 resolution TN panel with 170°/160° viewing angle 250 nits brightness 1000:1 contrast ratio and 3M:1 DCR 5 ms response time 72% colour gamut and 16.7M colours Anti-glare screen CONNECTIVITY & STAND: 1 x VGA 1 x DVI MECHANICAL: LT Stand Support ThinkCentre Tiny Clamp Bracket Cable management', '5f5addac05308.jpg', 1856, 1, 4, '2020-09-11 04:15:08'),
(39, 'XiaoMi 10000 mAh 5V 2A Power Bank', 'Forming a perfect backup whenever your gadget runs low is the XiaoMi Power Bank 10000 mAh. This portable XiaoMi Power Bank 10000 mAh uses Panasonic and LG\'s latest 735Wh L polymer cell technology to help keep the form factor of this device small but at the same time provide power to charge your device to the fullest. The XiaoMi Power Bank 10000 mAh is built by Texas Instruments and Monolithic Power Systems Inc. It adopts USB smart control chips with nine layers of protection and improves charging conversion rate by up to 93 percent. Furthermore, this power bank is compatible with smartphones and tablets belonging to various brands as well as digital cameras and handheld gaming devices.', '5f5ae67dca19d.jpg', 485, 2, 5, '2020-09-11 04:52:45'),
(41, 'Huawei Y9 Prime 2019 4GB 128GB - Sapphire Blue', 'Display Type : IPS , Display Size In Inches : 6.59 Inches , Display Resolution In Pixels : 1080×2340 , Touch Screen : Yes , Processor Chipset : Hisilicon , Processor CPU : Octa-core , Internal Memory Capacity In GB : 128 GB , Memory RAM In GB : 4 GB , Memory Card Slot : microSD, up to 512 GB , Operating System : Android , Operating System Version : Android 9.0 (Pie) , Rear Camera : 16 MP + 8 MP + 2 MP , Front Camera : 16 MP , Video Recording Type : 1080p@30fps , Network Type : 2G, 3G, 4G , SIM Card : Dual SIM , SIM Type : Nano SIM , Product Color : SAPPHIRE BLUE , WiFi : Yes , Bluetooth : Yes , Infrared : No , Radio : Yes , NFC : No , Battery capacity : 4000 mAh battery', '5f5ae7b5f273d.jpg', 3784, 3, 2, '2020-09-11 04:57:58'),
(42, 'Emporio Armani Sports Men\'s Blue Dial Stainless Steel Band Watch - AR2448', 'Dial Color: Blue Dial Window Material: Mineral Display Type: Analog Case Material: Stainless steel Case Dimension: 45 mm Band Material: Stainless steel Band Width: 22 mm Clasp Type: Clasp Movement: Quartz Water Resistant: 50 M Shock Resistant', '5f5ae8860b145.jpg', 7995, 5, 3, '2020-09-11 05:01:26'),
(43, 'Canon EOS 700D 18-55mm IS STM Lens Kit', 'Incorporating a host of features that let your creativity run wild, the Canon EOS 700D with 18 to 55mm Lens Kit is the DSLR camera of choice for serious photographers and semi professionals alike. The advanced camera’s DIGIC 5 Image Processor and 18MP CMOS sensor makes it possible for you to capture stunning images and videos with the utmost ease. The camera’s 3inch Clear View II LCD swivels and rotates as per your requirements. This LCD displays approximately 1,040,000 pixels in the given frame. Not only does the Cannon EOS 700D let you click stunningly lifelike still photos, but also captures Full HD videos at 5fps. The Cannon EOS 700D measures 133.1 x 99.8 x 78.8mm approximately and has a total weight of just 580g. With this DSLR in your arsenal, the creative opportunities with photos and video are seemingly endless. This advanced camera comes in a sleek black color.', '5f5ae9595c7b3.jpg', 12500, 6, 3, '2020-09-11 05:04:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `customerEmail` (`customerEmail`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
