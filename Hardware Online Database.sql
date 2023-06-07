-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 01:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `phone_number`, `password`) VALUES
(1, 'Ngatia Mwai', 'ngatiamwai25@gmail.com', '0793693224', '6798hsxnh'),
(2, 'Mwai Ngatia', 'mwaingatia25@gmail.com', '0793693224', '0e07f0d6c11c416b514e82f2acea8255');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `phonenumber` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`, `seller_name`, `phonenumber`, `user_id`, `product_id`, `location`) VALUES
(41, 'Helmet', '1000', 'helmet 1.jpg', '2', 'Sharon ', 793693224, 15, 6, 'Nairobi'),
(42, 'Saw', '600', 'saw 1.jpg', '1', 'Happie', 793001881, 15, 8, 'Nakuru'),
(43, 'Helmet', '1000', 'helmet 1.jpg', '1', 'Sharon ', 793693224, 6, 6, 'Nairobi'),
(44, 'Chain Saw', '3000', 'chain saw 1.jpg', '1', 'irene ', 794349788, 6, 12, 'Nyeri'),
(45, 'Hammer', '1000', 'hammer 1.jpg', '1', 'Sharon ', 793693224, 3, 4, 'Eldoret'),
(46, 'Generic Crimping Tool', '1099', 'Generic Crimping Tool 2.jpg', '2', 'Lucky', 757884520, 18, 14, 'Kisumu'),
(49, 'Saw', '600', 'saw 1.jpg', '3', 'Happie', 793001881, 3, 8, 'Nakuru'),
(50, 'Chain Saw', '3500', 'chain saw 3.jpg', '2', 'Joy', 741401187, 14, 16, 'Nakuru'),
(51, 'Chain Saw', '3500', 'chain saw 3.jpg', '1', 'Joy', 741401187, 19, 16, 'Nakuru'),
(52, 'Chain Saw', '3000', 'chain saw 1.jpg', '1', 'irene ', 794349788, 0, 12, 'Nyeri'),
(53, 'Generic Heavy Duty Computer Dust Blower,', '999', 'Generic Heavy Duty Computer Dust Blower, 1.jpg', '1', 'Lucky', 745493943, 21, 15, 'Kisumu'),
(54, 'HEAVY DUTY CONCRETE MIXER', '335999', 'HEAVY DUTY CONCRETE MIXER.jpg', '1', 'Ngatia', 793693224, 14, 54, 'Kisumu');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `number`, `email`, `payment_method`, `flat`, `street`, `city`, `state`, `country`, `pin`, `total_products`, `total_price`, `user_id`) VALUES
(8, 'Ngatia Mwai', '0793693224', 'ngatiamwai25@gmail.com', 'cash on delivery', '182', '182', 'Nyeri', 'Nairobi', 'Kenya', '10105', 'Helmet (1 ), Saw (1 ), Helmet (1 ), Chain Saw (1 ), Hammer (1 ), Generic Crimping Tool (1 )', '607', 0),
(9, 'Samwel Mwangi', '074920958', 'samco.techies@gmail.com', '', '', 'Mayor Road', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '7,699.00', 0),
(10, 'Samwel Mwangi', '074920958', 'samco.techies@gmail.com', '', '', 'Mayor Road', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '7,699.00', 0),
(11, 'Samwel Mwangi', '074920958', 'samco.techies@gmail.com', '', '', 'Mayor Road', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '9,798.00', 0),
(22, 'Mwai Ngatia', '076543358', 'mwaingatia25@gmail.com', '', '', '182', 'Nyeri', 'home', 'Kenya', '10105', '', '9,798.00', 0),
(23, 'Mwai Ngatia', '076543358', 'mwaingatia25@gmail.com', '', '', '182', 'Nyeri', 'home', 'Kenya', '10105', '', '9,798.00', 0),
(24, 'Ngatia Mwai', '079374872', 'ngatiamwai25@gmail.com', '', '', '182', 'Nyeri', 'Nairobi', 'Kenya', '10105', '', '9,798.00', 0),
(25, 'Ngatia Mwai', '079374872', 'ngatiamwai25@gmail.com', '', '', '182', 'Nyeri', 'Nairobi', 'Kenya', '10105', '', '9,798.00', 0),
(34, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', '', '', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '9,798.00', 0),
(35, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', '', '', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '9,798.00', 0),
(36, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', '', '', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '2,198.00', 0),
(52, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', '', '', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '2,198.00', 0),
(53, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', '', '', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '00400', '', '2,198.00', 0),
(54, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', 'cash on delivery', '', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '00400', '$product_names_str', '2,198.00', 0),
(55, 'Samwel Mwangi', '0745493943', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '5678', '', '2,198.00', 0),
(56, 'Samwel Mwangi', '0745493943', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Kajiado', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 0),
(57, 'Samwel Mwangi', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 0),
(58, 'francis njenga', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 0),
(59, 'francis njenga', '703526941', 'ngatiamwai25@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 18),
(80, 'francis njenga', '703526941', 'ngatiamwai25@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 18),
(81, 'Samwel Mwangi', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 ), Generic Heavy Duty Computer Dust Blower, (1 ), Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm  (1 )', '3,697.00', 18),
(82, 'Samwel Mwangi', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 ), Generic Heavy Duty Computer Dust Blower, (1 ), Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm  (1 )', '3,697.00', 18),
(86, 'Samwel Mwangi', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 ), Generic Heavy Duty Computer Dust Blower, (1 ), Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm  (1 )', '3,697.00', 18),
(87, 'Ngatia Mwai', '703526941', 'ngatiamwai25@gmail.com', 'cash on delivery', '22400', 'Maasai Lodge', 'Nairobi', 'Nairobi', 'Kenya', '00400', 'Generic Crimping Tool (2 ), Generic Heavy Duty Computer Dust Blower, (1 ), Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm  (1 )', '3,697.00', 18),
(88, 'Ngatia Mwai', '703526941', 'ngatiamwai25@gmail.com', 'cash on delivery', '22400', 'Maasai Lodge', 'Nairobi', 'Nairobi', 'Kenya', '00400', 'Generic Crimping Tool (2 ), Generic Heavy Duty Computer Dust Blower, (1 ), Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm  (1 )', '3,697.00', 18),
(89, 'Samwel Mwangi', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 18),
(99, 'Samwel Mwangi', '703526941', 'samco.techies@gmail.com', 'cash on delivery', '234', 'Maasai Lodge', 'Rongai', 'Nairobi', 'Kenya', '5678', 'Generic Crimping Tool (2 )', '2,198.00', 18),
(100, 'Lucky Law', '0745493943', 'luckylaw95@gmail.com', 'cash on delivery', '098', 'Magadi Road', 'Karen', 'Nairobi', 'Kenya', '4465', 'Hammer (1 )', '1,000.00', 3),
(101, 'Ngatia Mwai', '757884520', 'ngatiamwai25@gmail.com', 'cash on delivery', '098', 'Magadi Road', 'Karen', 'Nairobi', 'Kenya', '00400', 'Hammer (1 ), Saw (1 )', '1,600.00', 3),
(102, 'Lucky Law', '757884520', 'luckylaw95@gmail.com', 'cash on delivery', '098', 'Magadi Road', 'Karen', 'Nairobi', 'Kenya', '4465', 'Hammer (1 ), Saw (1 )', '1,600.00', 3),
(103, 'Lucky Law', '757884520', 'luckylaw95@gmail.com', 'cash on delivery', '098', 'Magadi Road', 'Karen', 'Nairobi', 'Kenya', '4465', 'Hammer (1 ), Saw (3 )', '2,800.00', 3),
(104, 'irene  wangui', '794349788', 'wangui@gmail.com', 'cash on delivery', '48F', 'Kerio', 'Kerio', 'Kericho', 'Kenya', '2344', 'Chain Saw (2 )', '7,000.00', 14),
(105, 'Trevor Nderitu', '114859998', 'nderitutrevor891@gmail.com', 'cash on delivery', '098', 'Magadi Road', 'Karen', 'Kajiado', 'Kenya', '4465', 'Chain Saw (1 )', '3,500.00', 19),
(106, 'Ngatia Mwai', '794349788', 'ngatiamwai25@gmail.com', 'cash on delivery', '48F', 'Kerio', 'Kerio', 'Nairobi', 'Kenya', '2344', 'Chain Saw (2 )', '7,000.00', 14),
(107, 'Mwai Ngatia', '0793693224', 'mwaingatia25@gmail.com', 'cash on delivery', '22400', '7990', 'Nairobi', 'Kajiado', 'Kenya', '00400', 'Generic Heavy Duty Computer Dust Blower, (1 )', '999.00', 21),
(128, 'Mwai Ngatia', '0793693224', 'mwaingatia25@gmail.com', 'cash on delivery', '22400', '7990', 'Nairobi', 'Kajiado', 'Kenya', '00400', 'Generic Heavy Duty Computer Dust Blower, (1 )', '999.00', 21),
(129, 'Sharon  wanjiku', '793693224', 'sharonwanjku@gmail.com', 'cash on delivery', '48F', 'Kerio', 'Kerio', 'Nairobi', 'Kenya', '2344', 'Helmet (2 ), Saw (1 )', '2,600.00', 15),
(130, 'Sharon  wanjiku', '793693224', 'sharonwanjku@gmail.com', 'cash on delivery', '48F', 'Kerio', 'Kerio', 'Nairobi', 'Kenya', '2344', 'Helmet (2 ), Saw (1 )', '2,600.00', 15),
(131, 'Sharon  wanjiku', '793693224', 'sharonwanjku@gmail.com', 'cash on delivery', '48F', 'Kerio', 'Kerio', 'Nairobi', 'Kenya', '2344', 'Helmet (2 ), Saw (1 )', '2,600.00', 15),
(132, 'irene  wangui', '794349788', 'wangui@gmail.com', 'cash on delivery', '22400', 'uiowqr', 'Nairobi', 'Kajiado', 'Kenya', '00400', 'Chain Saw (2 ), HEAVY DUTY CONCRETE MIXER (1 )', '342,999.00', 14),
(133, 'irene  wangui', '794349788', 'wangui@gmail.com', 'cash on delivery', '22400', 'uiowqr', 'Nairobi', 'Kajiado', 'Kenya', '00400', 'Chain Saw (2 ), HEAVY DUTY CONCRETE MIXER (1 )', '342,999.00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(200) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productPrice` varchar(200) NOT NULL,
  `productImage` varchar(200) NOT NULL,
  `productImage1` varchar(300) NOT NULL,
  `productImage2` varchar(300) NOT NULL,
  `sellerID` int(200) NOT NULL,
  `productDescription` varchar(3000) NOT NULL,
  `location` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productPrice`, `productImage`, `productImage1`, `productImage2`, `sellerID`, `productDescription`, `location`, `dateAdded`) VALUES
(4, 'Hammer', '1000', 'hammer 1.jpg', 'hammer 2.jpg', '', 15, '', 'Eldoret', '2023-03-14 10:03:39'),
(6, 'Helmet', '1000', 'helmet 1.jpg', 'helmet 2.jpg', '', 15, 'This are the best helmets in the market', 'Nairobi', '2023-03-15 18:56:22'),
(8, 'Saw', '600', 'saw 1.jpg', 'saw 1.jpg', '', 8, '', 'Nakuru', '2023-03-15 19:13:47'),
(11, 'Tweezer Screw Driver Tool Kit For Phone And PC', '2500', 'Tweezer Screw Driver Tool Kit For Phone And PC.jpg', 'Tweezer Screw Driver Tool Kit For Phone And PC.jpg', '', 14, 'This Tweezer Screw Driver is on of the best. It has all the screws that you may ever need for openning any of your devices. Trust me it will not let you down', 'Nairobi', '2023-03-20 10:46:10'),
(12, 'Chain Saw', '3000', 'chain saw 1.jpg', 'chain saw 2.jpg', 'chain saw 3.jpg', 14, 'This Chain saw is the latest product in the market.\nIt has been supplied all over the country and it has not dissappointed any of our customer.', 'Nyeri', '2023-03-20 10:48:03'),
(13, 'Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm ', '500', 'Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm (10).jpg', 'Iron GI Nut Bolt l 2.5MM Hex Head Stainless Steel bolt With Nut & Washer 5mm (10).jpg', '', 3, 'Material	Iron\r\nExterior Finish	Iron, Stainless Steel\r\nHead Style	Hex\r\nColour	Silver\r\nFastener Type	Hexagon Bolt', 'Nakuru', '2023-03-21 19:13:20'),
(14, 'Generic Crimping Tool', '1099', 'Generic Crimping Tool 2.jpg', 'Generic Crimping Tool 1.jpg', '', 3, 'The crimping tool features a quality plastic handle, which is durable and has a long service life, a ratchet design to control the tool tension, and it requires less force, easy to operate.\r\nIt is made of high quality hardening steel that is oxidized black to prevent rusting and to increase efficien', 'Kisumu', '2023-03-22 07:23:21'),
(15, 'Generic Heavy Duty Computer Dust Blower,', '999', 'Generic Heavy Duty Computer Dust Blower, 1.jpg', 'Generic Heavy Duty Computer Dust Blower, 2.jpg', '', 3, 'new and high quality electric air blower with motor produces 2.5m³/ min air volume and high max RPM.\nHelps to remove dust from computer case, keyboard, monitor, laptop, voice box, electric fan and other devices, and it can also used to clean the car interior dirt.\nThe round attachment is designed new and high quality electric air blower with motor produces 2.5m³/ min air volume and high max RPM.\nHelps to remove dust from computer case, keyboard, monitor, laptop, voice box, electric fan and other devices, and it can also used to clean the car interior dirt.\nThe round attachment is designed to blast a powerful surge of air into a specific location and do the work in high efficiency.\nThis control switch is comfortably located on the handle, and falls naturally beneath your thumb.\nErgonomic handle with non-slip surface for easy and convenient use for a long time without fatigue.', 'Kisumu', '2023-03-22 07:30:56'),
(16, 'Chain Saw', '3500', 'chain saw 3.jpg', 'chain saw 1.jpg', '', 17, 'The most affordable chain saw. Made in China and has been tested to be the best. Carpenters have used it and they have given the best reviews.\r\n', 'Nakuru', '2023-03-24 09:54:57'),
(17, 'FORTUNE REFLECTIVE JACKET 105 GRAMS – YELLOW', '290', 'reflector.jpeg', 'reflector.jpeg', '', 21, 'FORTUNE REFLECTIVE JACKET 105 GRAMS – YELLOW', 'Kisumu', '2023-04-23 12:33:52'),
(18, 'RYOBI Handyline Bench Grinder', '7996', 'Bench Grinder.jpeg', '', '', 21, 'RYOBI Handyline Bench Grinder 150 Watts – 50mm (HBG-150)', 'Kisumu', '2023-04-23 12:36:48'),
(19, 'RYOBI Folding Work Bench', '5200', 'RYOBI Folding Work Bench.jpeg', '', '', 21, 'RYOBI Folding Work Bench 60.5-76CM (RWB-100)', 'Nairobi', '2023-04-23 12:40:12'),
(20, 'RYOBI Work Bench Bench', '41000', 'RYOBI Work Bench Bench.jpeg', '', '', 21, 'RYOBI Work Bench Bench 1200mm – 600Kg Load W/Shelf (RWB-1200)', 'Nairobi', '2023-04-23 12:41:30'),
(21, 'CORDLESS LAWN MOVER', '23000', 'RYOBI CORDLESS LAWN MOVER.jpeg', '', '', 21, 'RYOBI CORDLESS LAWN MOVER 18 VOLTS “BARE” (XRM-350-PLUS)', 'Nyeri', '2023-04-23 12:43:33'),
(22, 'CORDLESS ANGLE GRINDER ', '25000', 'RYOBI CORDLESS ANGLE GRINDER.jpeg', '', '', 14, 'RYOBI CORDLESS ANGLE GRINDER 115MM/4.5″ – 1 X LION + 1 CHARGER (XG-115K)', 'Nairobi', '2023-04-23 12:46:39'),
(23, 'TUNGSTEN TIG WELDING ROD', '1999', 'RYOBI TUNGSTEN TIG WELDING ROD.jpeg', '', '', 14, 'RYOBI TUNGSTEN TIG WELDING ROD THORIATED – 1.6MM (RW-TT16)', 'Nairobi', '2023-04-23 12:50:57'),
(24, 'Toilet Seat + cover', '7895', 'WC CLOSE COUPLE TOILE.jpeg', '', '', 14, 'WC CLOSE COUPLE TOILET (WC+SEAT COVER+CISTERN)', 'Nairobi', '2023-04-23 12:52:20'),
(26, 'MANHOLE COVER', '3000', 'MANHOLE-COVER-H-DUTY-RESIN-593x600.jpeg', '', '', 14, 'MANHOLE COVER H/DUTY RESIN – 24″ X 24″ GREY', 'Nairobi', '2023-04-23 12:54:43'),
(27, 'Green Braided Hose Pipe', '14999', 'green-braided-hose-pipe.jpg', '', '', 14, 'CALYPSO Green Braided Hose Pipe – 1 1/4″ X 30 Meters', 'Nairobi', '2023-04-23 12:56:57'),
(28, 'GARDEN HOSE PIPE', '3500', 'GARDEN HOSE PIPE.jpg', '', '', 14, 'TOLSEN GARDEN HOSE PIPE – 1/2″ X 30MTRS (57213)', 'Nairobi', '2023-04-23 12:58:28'),
(29, 'Table Saw', '110999', 'Table Saw.jpeg', '', '', 14, 'Ryobi Table Saw 1500W (HBT-255L)', 'Nyeri', '2023-04-23 13:00:04'),
(30, 'CONTRACTORS TABLE SAW', '229996', 'CONTRACTORS TABLE SAW.jpeg', '', '', 14, 'RYOBI CONTRACTORS TABLE SAW 254MM 1800W (TCS-1065)', 'Nairobi', '2023-04-23 13:01:23'),
(31, 'Round Manhole Cover', '23000', 'ci-di-ms-manhole-cover.png', '', '', 14, 'Polysynthetic Round Manhole Cover Type A30 (20TONS) DIA-530MM (LIGHT GREY)', 'Nairobi', '2023-04-23 13:04:31'),
(32, 'Triangular Manhole Cover', '19000', 'Manhole_Cover.png', '', '', 14, 'Polysynthetic Triangular Manhole Cover (40Tones) – 700mm x 700mm', 'Nairobi', '2023-04-23 13:05:41'),
(33, 'DOOR LOCKS', '2500', 'Door Locks.png', '', '', 15, 'ALDROPS DOOR LOCKS', 'Nakuru', '2023-04-23 13:14:31'),
(34, 'DOOR LOCKS', '2499', 'Door Locks2.png', '', '', 15, 'ALDROPS DOOR LOCKS (A5512)', 'Nakuru', '2023-04-23 13:17:28'),
(35, 'DURACOAT SUPERFAST', '1499', 'DURACOAT SUPERFAST.jpg', '', '', 15, 'DURACOAT SUPERFAST – BRILLIANT WHITE – 4 LTRS (FDUSFWH114)', 'Nakuru', '2023-04-23 13:20:18'),
(36, 'DURACOAT EXTERIOR SKIM COAT', '120', 'DURACOAT EXTERIOR SKIM COAT.png', '', '', 15, 'DURACOAT EXTERIOR SKIM COAT 1 – KG (FDUWAPTY09)', 'Nakuru', '2023-04-23 13:21:23'),
(37, 'DURACOAT PG MATT GREYOXIDE PRIMER', '450', 'DURACOAT PG MATT GREYOXIDE PRIMER.png', '', '', 15, 'DURACOAT PG MATT GREYOXIDE PRIMER – 1 LITRE (FBPGGPR09)', 'Mombasa', '2023-04-23 13:23:11'),
(38, 'CONVERTIBLE LADDER & HAND TRUCK', '10000', 'CONVERTIBLE LADDER & HAND TRUCK.jpg', '', '', 15, 'CRAFT RIGHT 3-STEP – 2-IN-1 CONVERTIBLE LADDER & HAND TRUCK- 135KG CAPACITY', 'Mombasa', '2023-04-23 13:27:32'),
(39, 'ROPE OPERATED ALLUMINIUM LADDER', '29999', 'MetafoRope-Operated-Extension-Ladder.jpg', '', '', 15, 'METAFORM TWO SECTION ROPE OPERATED ALLUMINIUM LADDER (TYPE R36)', 'Mombasa', '2023-04-23 13:29:12'),
(40, 'Roller Brush & Tray', '815', 'Roller Brush & Tray.png', '', '', 15, 'UYUSTOOL Roller Brush & Tray Set 9″ (RDB03U)', 'Eldoret', '2023-04-23 13:33:13'),
(41, 'Putty Trowel Stainless Steel', '450', 'Putty Trowel Stainless Steel.jpg', '', '', 6, 'TOTAL Putty Trowel Stainless Steel – 4″/100mm (THT831006)', 'Eldoret', '2023-04-23 13:35:14'),
(42, 'FINISHING PLASTERING TROWEL', '450', 'FINISHING PLASTERING TROWEL.jpeg', '', '', 6, 'UYUSTOOL SMOOTH FINISHING PLASTERING TROWEL 300 X 130MM (LLS108)', 'Mombasa', '2023-04-23 13:36:50'),
(43, 'WELDING GENERATOR', '127997', 'WELDING GENERATOR.jpg', '', '', 6, 'AICO WELDING GENERATOR 7.5KVA – 160 AMPS (ADG190LX)', 'Mombasa', '2023-04-23 13:37:49'),
(44, 'Measuring Tape', '749', 'Measuring Tape.jpg', '', '', 6, 'TOTAL Measuring Tape – 8 Meters – Self Lock System ( TMT126281)', 'Nyeri', '2023-04-23 13:39:20'),
(45, 'UNI-T MULTIMETER INSULATION TESTER MODEL (UT505B)', '47999', 'MULTIMETER INSULATION TESTER 1.jpg', 'MULTIMETER INSULATION TESTER 2.jpg', '', 6, 'UNI-T MULTIMETER INSULATION TESTER MODEL (UT505B)\r\nUT505 series handheld true RMS insulation resistance testers combine features of a digital multimeter and insulation resistance tester. Aside from the  typical multimeter functions, these meters can also measure insulation resistance, PI, DAR, and automatically calculate resistance ratio to determine the insulation status.', 'Mombasa', '2023-04-23 13:41:59'),
(46, 'SQUARE SHOVEL METAL SHAFT', '498', 'SQUARE SHOVEL.jpg', '', '', 6, 'SQUARE SHOVEL METAL SHAFT', 'Nakuru', '2023-04-23 13:44:59'),
(47, 'HAND PLANER', '3250', 'HAND PLANER.jpg', '', '', 22, 'UYUSTOOL HAND PLANER NO.3 (CPM03U)', 'Ruguru', '2023-04-23 13:56:07'),
(48, 'HACKSAW', '2998', 'HACKSAW.jpeg', '', '', 22, 'UYUSTOOL HACKSAW HEAVY DUTY PROFESSIONAL 12″ (MC12PL)', 'Nairobi', '2023-04-23 13:57:28'),
(49, 'TOTAL ALLUMINIUM SPIRIT LEVEL', '999', 'TOTAL ALLUMINIUM SPIRIT LEVEL.png', '', '', 22, 'TOTAL ALLUMINIUM SPIRIT LEVEL 200CM (TMT22001)', 'Kisumu', '2023-04-23 13:58:51'),
(50, 'TMAK JUMPING JACK/RAMMER ', '147999', 'JUMPING-JACK-RAMMER.png', '', '', 22, 'TMAK JUMPING JACK/RAMMER – GX160 HONDA ENGINE – PETROL -82KG – 10-13KN', 'Kisumu', '2023-04-23 14:00:59'),
(51, 'AUTO LEVEL WITH STAND & RULER', '37998', 'AUTO-LEVEL-WITH-STAND-RULER.png', '', '', 22, 'TMAK AUTO LEVEL WITH STAND & RULER', 'Kisumu', '2023-04-23 14:02:43'),
(52, 'FORWARD PLATE COMPACTOR', '99997', 'FORWARD PLATE COMPACTOR.jpg', '', '', 22, 'ENAR SPAIN FORWARD PLATE COMPACTOR – 94KG – PETROL', 'Nairobi', '2023-04-23 14:04:17'),
(53, 'CABRO CUTTER ', '12999', 'CABRO CUTTER.png', '', '', 22, 'CABRO CUTTER STANDARD (CNBS42)', 'Mombasa', '2023-04-23 14:07:39'),
(54, 'HEAVY DUTY CONCRETE MIXER', '335999', 'HEAVY DUTY CONCRETE MIXER.jpg', '', '', 22, 'HEAVY DUTY CONCRETE MIXER – 500 LTRS – DIESEL – INDIAN ENGINE (MCMI-500)', 'Kisumu', '2023-04-23 14:17:36'),
(55, 'CONCRETE POWER SCREED', '459999', 'CONCRETE POWER SCREED.jpg', '', '', 22, 'CONCRETE POWER SCREED 6.5 MTRS – HONDA 5.5HP ENGINE (CPS-5.5)', 'Eldoret', '2023-04-23 14:18:48'),
(56, 'MIKASA DRUM ROLLER ', '2000000', 'MIKASA DRUM ROLLER.jpg', '', '', 22, 'MIKASA DRUM ROLLER DOUBLE 2.4 TONNE – DIESEL YANMAR ENGINE', 'Nairobi', '2023-04-23 14:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `register1`
--

CREATE TABLE `register1` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register1`
--

INSERT INTO `register1` (`id`, `firstname`, `lastname`, `phonenumber`, `email`, `password`, `profile_pic`) VALUES
(3, 'Lucky', 'Law', '0745493943', 'luckylaw95@gmail.com', '508df4cb2f4d8f80519256258cfb975f', 'me.jpg'),
(4, 'Samuel', 'Mwai', '757884520', 'mwaisammy50@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'me.jpg'),
(6, 'Bibo', 'Boom', '704400735', 'biboboom@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'me.jpg'),
(8, 'Happie', 'Mwaniki', '793001881', 'happimwaniki@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'me.jpg'),
(13, 'francis', 'njenga', '794349788', 'francisnjenga@gmail.com', 'b69fa55dfa811dd474e2821838411153', 'me.jpg'),
(14, 'irene ', 'wangui', '794349788', 'wangui@gmail.com', 'b9c4ab42f9b97c339fcc91b2ad226fde', 'me.jpg'),
(15, 'Sharon ', 'wanjiku', '793693224', 'sharonwanjku@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'me.jpg'),
(17, 'Joy', 'Kakai', '741401187', 'joynkakai@gmail.com', 'ab8d5fe84fcde8c254e11b0d9b3af8be', 'me.jpg'),
(18, 'Samwel', 'Mwangi', '703526941', 'samco.techies@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'me.jpg'),
(19, 'Trevor', 'Nderitu', '114859998', 'nderitutrevor891@gmail.com', '5722ed70b9f73a5d881af8e19f806125', 'me.jpg'),
(20, 'June', 'Akinyi', '793693224', 'juneakinyi@gmail.com', '21bfbcc4a571bc6c791801a384cdb9ae', 'me.jpg'),
(21, 'Mwai', 'Ngatia', '0793693224', 'mwaingatia25@gmail.com', '72900aafb1962f2e89350e587d3f9372', 'me.jpg'),
(22, 'Ngatia', 'Mwai', '0793693224', 'ngatiamwai25@gmail.com', '5801f8c897a652cecc1802f628ba029f', 'me.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `register1`
--
ALTER TABLE `register1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `register1`
--
ALTER TABLE `register1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
