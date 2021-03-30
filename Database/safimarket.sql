-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2021 at 12:38 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safimarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'simou.hero@gmail.com', 'simokhzami'),
(2, 'lahssairi@gmail.com', 'ali@you'),
(3, 'jbakkas@gmail.com', 'jamalbakkas');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(32, 'Airpods', '2021-01-30 16:20:24', '2021-01-30 16:20:24'),
(33, 'watches', '2021-01-30 16:25:38', '2021-01-30 16:25:38'),
(34, 'Car Accessories', '2021-01-30 16:26:04', '2021-01-30 16:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `msg` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `msg`, `created_at`, `updated_at`) VALUES
(4, 'lkhzami@hotmail.fr', 'cdcdcdc', '2021-01-30 17:15:36', '2021-01-30 17:15:36'),
(5, 'simou.hero@gmail.com', 'good review', '2021-01-30 17:17:27', '2021-01-30 17:17:27'),
(6, 'simou.hero@gmail.com', 'good review', '2021-01-30 17:18:13', '2021-01-30 17:18:13'),
(7, 'lkhzami@hotmail.fr', 'googd job', '2021-01-30 18:44:45', '2021-01-30 18:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(4, 'simou.hero@gmail.com', 'test', '2021-01-30 17:46:38', '2021-01-30 17:46:38'),
(5, 'lahssairi@gmail.com', 'simo', '2021-01-30 18:28:19', '2021-01-30 18:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `adress` varchar(70) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `total` int(20) NOT NULL,
  `pay_methode` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `adress`, `phone`, `total`, `pay_methode`, `created_at`, `updated_at`) VALUES
(32, 4, '55 rue kortoba oued el bacha safi', '+212 2616358321', 396, 'cash', '2021-02-01 00:33:32', '2021-02-01 00:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

DROP TABLE IF EXISTS `orders_details`;
CREATE TABLE IF NOT EXISTS `orders_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `quantite`, `created_at`, `updated_at`) VALUES
(43, 32, 111, 4, '2021-02-01 00:33:32', '2021-02-01 00:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

DROP TABLE IF EXISTS `prod`;
CREATE TABLE IF NOT EXISTS `prod` (
  `product_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`product_id`, `path`) VALUES
(105, 'uploads/-8763280581476972680.jpg'),
(105, 'uploads/1877301821-633254316.jpg'),
(105, 'uploads/-762362492-2131794795.jpg'),
(106, 'uploads/1618010251682725437.jpg'),
(107, 'uploads/banner-02.jpg'),
(107, 'uploads/2533384511936212943.jpg'),
(108, 'uploads/172573259-154870863.jpg'),
(108, 'uploads/547677310-1139044296.jpg'),
(109, 'uploads/-2017693-2064712171.jpg'),
(109, 'uploads/1336331830-2147037463.jpg'),
(110, 'uploads/1087985294-2093370759.jpg'),
(111, 'uploads/-85716826-1406157812.jpg'),
(111, 'uploads/978485179-2031156567.jpg'),
(112, 'uploads/-873444152-1077729520.jpg'),
(113, 'uploads/-440001193-1317546692.jpg'),
(113, 'uploads/-190363708-374746018.jpg'),
(114, 'uploads/-1173584531-1354562486.jpg'),
(116, 'uploads/1450457976-738247066.jpg'),
(117, 'uploads/1981272515-1224768385.jpg'),
(118, 'uploads/-272494323-829001779.jpg'),
(118, 'uploads/-1024752667-797299969.jpg'),
(119, 'uploads/-829655306726711510.jpg'),
(120, 'uploads/-320231881-611662845.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(100) NOT NULL,
  `description` varchar(20000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(105, 'L21 PRO', 199, 'uploads/-1874502860-1691520135.jpg', 'TWS Bluetooth 5.1 Ã©couteurs 2500mAh boÃ®te de charge sans fil casque 9D stÃ©rÃ©o sport Ã©tanche Ã©couteurs casques avec Microphone\r\n', 32, '2021-01-30 16:23:22', '2021-01-30 16:23:22'),
(106, 'P8 ', 300, 'uploads/803837156-408457756.jpg', '2021 nouvelle montre intelligente P6 1.54 pouces moniteur de frÃ©quence cardiaque Bluetooth appel cadrans personnalisÃ©s IP67 Ã©tanche SmartWatch hommes femmes PK P8\r\n', 33, '2021-01-30 16:27:32', '2021-01-30 16:27:32'),
(107, 'R20 PRO', 190, 'uploads/-1890855725-139126949.jpg', 'TWS Bluetooth 5.1 Ã©couteurs 2500mAh boÃ®te de charge sans fil casque 9D stÃ©rÃ©o sport Ã©tanche Ã©couteurs casques avec Microphone', 32, '2021-01-30 16:32:33', '2021-01-30 16:32:33'),
(108, 'Car charger', 120, 'uploads/124461594-376407182.jpg', 'LISM ventouse voiture Support de tÃ©lÃ©phone Support de tÃ©lÃ©phone portable Support dans la voiture pas de Support de montage GPS magnÃ©tique pour iPhone 12 11 Pro Xiaomi HUAWEI\r\n', 34, '2021-01-30 16:36:46', '2021-01-30 16:36:46'),
(109, 'Car support', 150, 'uploads/13675520871772599919.jpg', 'LISM ventouse voiture Support de tÃ©lÃ©phone Support de tÃ©lÃ©phone portable Support dans la voiture pas de Support de montage GPS magnÃ©tique pour iPhone 12 11 Pro Xiaomi HUAWEI\r\n', 34, '2021-01-30 18:36:11', '2021-01-30 18:36:11'),
(110, 'I11 pro', 150, 'uploads/-248310659-1696870997.jpg', 'Original TWS Inpods i12 Auriculares Bluetooth Ã©couteurs 5.0 HiFi stÃ©rÃ©o Ã©couteurs casque sans fil PK Air I900 I9000 Pro\r\n', 32, '2021-01-30 18:38:02', '2021-01-30 18:38:02'),
(111, 'Watch ', 99, 'uploads/437242888-1762383459.jpg', 'Montre-bracelet en cuir pour hommes, Ã  Quartz, Sport, tendance, 2019\r\n', 32, '2021-01-31 23:48:16', '2021-01-31 23:48:16'),
(112, 'i12', 120, 'uploads/1448511787-795434892.jpg', 'Original TWS Inpods i12 Auriculares Bluetooth Ã©couteurs 5.0 HiFi stÃ©rÃ©o Ã©couteurs casque sans fil PK Air I900 I9000 Pro\r\n', 32, '2021-01-31 23:58:04', '2021-01-31 23:58:04'),
(113, 'Montre Cuir', 140, 'uploads/838643430-1819124622.jpg', 'YAZOLE hommes montres Top marque de luxe hommes montre de mode en cuir montre pour hommes Unique conception horloge erkek kol saati relogio masculino\r\n', 33, '2021-01-31 23:59:30', '2021-01-31 23:59:30'),
(114, 'Y30', 150, 'uploads/1182852565-576957554.jpg', 'Original TWS Inpods i12 Auriculares Bluetooth Ã©couteurs 5.0 HiFi stÃ©rÃ©o Ã©couteurs casque sans fil PK Air I900 I9000 Pro\r\n', 32, '2021-02-01 00:03:57', '2021-02-01 00:03:57'),
(115, 'Watch Men', 199, 'uploads/-62815436846670574.jpg', 'Montre-bracelet en cuir pour hommes, Ã  Quartz, Sport, tendance, 2019 .', 33, '2021-02-01 00:06:17', '2021-02-01 00:06:17'),
(116, 'Montre Femme', 150, 'uploads/-199351637-1182149780.jpg', 'Ensemble de montre femmes 5 piÃ¨ces femme Quartz montre-Bracelet en cuir dames Bracelet de luxe montre dÃ©contractÃ© Relogio Femenino cadeau pour petite amie\r\n', 33, '2021-02-01 00:08:25', '2021-02-01 00:08:25'),
(117, 'Car support', 70, 'uploads/486740758997372369.jpg', 'LISM ventouse voiture Support de tÃ©lÃ©phone Support de tÃ©lÃ©phone portable Support dans la voiture pas de Support de montage GPS magnÃ©tique pour iPhone 12 11 Pro Xiaomi HUAWEI\r\n', 34, '2021-02-01 00:11:23', '2021-02-01 00:11:23'),
(118, 'D20 ', 150, 'uploads/-1628215630-1754762560.jpg', '2021 nouvelle montre intelligente P6 1.54 pouces moniteur de frÃ©quence cardiaque Bluetooth appel cadrans personnalisÃ©s IP67 Ã©tanche SmartWatch hommes femmes PK P8\r\n', 33, '2021-02-01 00:12:54', '2021-02-01 00:12:54'),
(119, 'R20 PRO', 130, 'uploads/-165846564857083988.jpg', 'TWS casque sans fil Bluetooth V5.1 Ã©couteurs 9D stÃ©rÃ©o Sport Ã©couteurs Ã©tanche casques 2000mAh boÃ®te de charge PK F9 M11', 32, '2021-02-01 00:15:03', '2021-02-01 00:15:03'),
(120, 'Mifa X3', 150, 'uploads/-621972652676834355.jpg', 'TWS casque sans fil Bluetooth V5.1 Ã©couteurs 9D stÃ©rÃ©o Sport Ã©couteurs Ã©tanche casques 2000mAh boÃ®te de charge PK F9 M11', 32, '2021-02-01 00:17:34', '2021-02-01 00:17:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
