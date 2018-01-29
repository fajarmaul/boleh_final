-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 01:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_boleh`
--

-- --------------------------------------------------------

--
-- Table structure for table `has_item`
--

CREATE TABLE `has_item` (
  `quantity` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `has_item`
--

INSERT INTO `has_item` (`quantity`, `id_item`, `id_user`) VALUES
(10, 19, 14),
(10, 20, 14),
(9, 22, 14),
(10, 23, 14),
(10, 24, 14),
(7, 25, 10),
(10, 26, 10),
(10, 27, 10),
(10, 28, 10),
(10, 29, 8),
(10, 30, 8);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `type` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `item_name`, `price`, `type`, `pic`, `description`) VALUES
(19, 'Wedang Jahe 2', 19000, 0, '29052017033816wedang-jahe2.jpg', 'Asiik'),
(20, 'T shirt 1', 70000, 1, '27052017141527tshirtjabar.jpg', 'T Shirt anti mainstream dari Toko Maulana, menjamin Kepuasan anda berbisnis'),
(22, 'Cimol Bandung', 20000, 0, '27052017141923cimol.jpg', 'Cimol Aseli dari bandung menjamin kenikmatan berbuka'),
(23, 'Batagor Bandung', 15000, 0, '27052017142001batagor.jpg', 'Batagor dari bandung yang cocok untuk disantap bersama keluarga ketika menunggu waktu berbuka'),
(24, 'Gantungan Kunci Kujang', 20000, 0, '29052017033725gantungan-kunci4.jpg', 'Gantungan Yang sangat bagus, Menambahkan Stamina Penggunanya'),
(25, 'Keripik Bambang', 20000, 0, '27052017152415keripik.jpg', 'Keripik aseli pak bambang dari palembang, dijual di bogor'),
(26, 'Tumbler Gaul', 50000, 1, '27052017152446tumbler2.jpg', 'Tumbler gaul keren aseli cibanteng'),
(27, 'T Shirt', 70000, 1, '27052017152511tshirt1.jpg', 'T Shirt bang ganteng'),
(28, 'Wedang Jahe Kalengan', 40000, 0, '27052017152543wedang-jahe-kalengan.jpeg', 'Wedang Jahe Kalengan Penyembuh hati yang sedang Dilara\r\n'),
(29, 'Lapis Legit Sangkuriang', 35000, 0, '27052017153636sangkuriang2.jpg', 'Lapis Legit Sangkuriang, cocok untuk menemani anda di kala senggang dengan secangkir teh atau kopi khas Taman Japari Indonesia'),
(30, 'Secret Japari Lapis Legit', 45000, 0, '27052017160637sangkuriang.jpg', 'Super Secret Recipe from Japari cafe Finest Cook');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `paid` int(3) NOT NULL DEFAULT '0',
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `order_total`, `price_total`, `order_date`, `id_user`, `id_item`, `paid`, `pic`) VALUES
(2, 4, 80000, '2017-05-30', 17, 24, 2, '31052017060706Bukti Pembayaran3.PNG'),
(3, 4, 160000, '2017-05-30', 19, 28, 1, '31052017060943Bukti Pembayaran4.PNG'),
(4, 4, 280000, '2017-05-30', 17, 20, 2, '31052017080622Bukti Pembayaran5.PNG'),
(5, 30, 1350000, '2017-05-31', 19, 30, 1, '31052017071642Bukti Pembayaran6.PNG'),
(6, 1, 20000, '2017-05-31', 19, 22, 0, NULL),
(7, 2, 100000, '2017-05-31', 19, 26, 0, NULL),
(8, 3, 210000, '2017-05-31', 19, 20, 0, NULL),
(9, 3, 210000, '2017-05-31', 19, 20, 0, NULL),
(10, 3, 60000, '2017-05-31', 19, 25, 0, NULL),
(11, 1, 20000, '2018-01-22', 9, 22, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `vote` float NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `vote`, `id_item`) VALUES
(1, 3.7, 1),
(2, 4.5, 1),
(3, 5, 1),
(4, 3.5, 1),
(5, 3.6, 3),
(6, 2.5, 1),
(7, 2.4, 3),
(8, 2.6, 3),
(9, 3.7, 6),
(10, 2.4, 6),
(11, 1.6, 6),
(12, 3.7, 0),
(13, 3.3, 0),
(14, 3.7, 3),
(15, 4.5, 3),
(16, 4.5, 3),
(17, 4.5, 3),
(18, 3.4, 8),
(19, 3.8, 12),
(20, 3.4, 0),
(21, 2.4, 0),
(22, 4.6, 1),
(23, 3.6, 6),
(24, 4.6, 6),
(25, 4.7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL DEFAULT '0',
  `userpic` varchar(255) NOT NULL DEFAULT 'default-user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `password`, `name`, `address`, `phone`, `email`, `code`, `userpic`) VALUES
(5, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Truno', 'Mansion', '0999777171717', 'johan@mansion.com', 0, 'default-user.jpg'),
(8, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Japari Cafe', 'Japari Park Cafe, Yamamoto Prefecture, Kanto, Japan', '0777777777', 'japaricafe@mail.com', 1, '24052017112042__alpaca_suri_kemono_friends_drawn_by_karahai_31448823__351ebae1fcf016c07d19528747a78758.jpg'),
(9, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Irawan Gunawan', 'Depok Lama', '0988819732', 'irawan@gmail.com', 0, '2405201711182557664986_p0.jpg'),
(10, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Bambang Shop 2', 'Kebon Waru', '0217727722', 'bambang@mail.com', 1, 'default-user.jpg'),
(14, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Maulana Bakery', 'Moskwa', '0998977729', 'maulana@maul.com', 1, '29052017034200logoipb.png'),
(15, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'admin', 'Central Mansion', '0000000000000', 'admin@admin.com', 2, 'default-pic.png'),
(16, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Maybach', 'Central London', '09988776655', 'pambudi@mail.com', 0, 'default-user.jpg'),
(17, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Fajar Maulana', 'Manggarai Selatan 8 no 171K', '09988776655', 'maulana@mail.com', 0, '2905201703251857664986_p0.jpg'),
(18, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Yonglek 2', 'Jalan kebagusan', '09999888777', 'yonglek@mail.com', 0, 'default-user.jpg'),
(19, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Alan Wake', 'Groove Street Los Santos', '0657754392', 'alan@mail.com', 0, 'default-user.jpg'),
(20, 'e10adc3949ba59abbe56e057f20f883e', 'yoga', 'balebak', '087677854546', 'yoga@gmail.com', 0, '2905201704025877151.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `has_item`
--
ALTER TABLE `has_item`
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `has_item`
--
ALTER TABLE `has_item`
  ADD CONSTRAINT `has_item_id_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`),
  ADD CONSTRAINT `has_item_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`),
  ADD CONSTRAINT `orders_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
