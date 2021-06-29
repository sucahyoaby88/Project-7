-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 03:07 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinkbike`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `content_id`, `text`, `date_comment`) VALUES
(1, 2, 4, 'halo', '2020-10-04 13:34:47'),
(2, 3, 4, 'hai', '2020-10-06 15:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` enum('photo','video','story') NOT NULL,
  `category` enum('regular','premium') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `summary` varchar(50) NOT NULL,
  `date_content` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `user_id`, `type`, `category`, `title`, `description`, `summary`, `date_content`, `source`) VALUES
(4, 3, 'video', 'regular', 'Petualangan seru', 'Pagi sekali, Herman datang ke rumahku. Wajahnya cerah. Di tangannya ada map hijau. Aku langsung mencium bau penting, atau paling tidak serius. Tanpa basa-basi ia usulkan sebuah ide baru. Yang tadinya terasa penting, atau serius, langsung menjadi sedikit gila, menurutku. Menurutnya? Ide cemerlang.', 'Pagi sekali', '2020-10-01 21:22:47', 'https://youtu.be/CZYcV9SvwAc'),
(6, 3, 'story', 'regular', 'Petualangan asik', 'Tentu saja mudah', 'Mudah', '2020-10-01 21:22:59', '-'),
(7, 2, 'photo', 'regular', 'Petualangan menantang', 'Saat itu saya bersepeda ke gunung', 'bersepeda', '2020-10-01 21:23:12', '1601503507_laptop6.jpg'),
(8, 2, 'photo', 'regular', 'Uphill Sprint, Diego Ulissi Kalahkan Peter Sagan', 'Peter Sagan (Bora-Hansgrohe) gagal meraih kemenangan perdana dalam debutnya di Giro d\'Italia 2020. Adalah pembalap tuan rumah Diego Ulissi (UAE-Team Emirates) yang mengalahkan Sagan dalam uphill sprint di Agrigento pada etape 2, Minggu (4/10) malam.\r\n\r\nEtape 2 menyajikan balapan sejauh 149 kilometer dari Alcamo menuju Agrigento. Hampir keseluruhan rutenya datar. Hanya saja finisnya di tanjakan Kategori 4 di Agrigento. Pembalap harus mendaki sepanjang 3,7 kilometer dengan gradien 5,2 persen.\r\n\r\nThomas De Gendt (Lotto Soudal), Ben Gastauer (AG2R La Mondiale), Mattia Bais (Androni Giocattoli-Sidermec), Alessandro Tonelli (Bardiani-CSF-Faizane), dan Etienne Van Empel (Vini Zabù-KTM) langsung melakukan breakaway saat lomba baru berjalan lima kilometer.\r\n\r\nSempat meninggalkan peloton hingga gap lebih dari lima menit, kelima pembalap terdepan berhasil ditangkao oleh peloton di sepuluh kilometer terakhir. Setelah semua pembalap kembali ke rombongan besar, tim-tim mulai mengatur kereta cepatnya.\r\nUlisi, Sagan, Mikkel Frolich Honore (Deceuninck-QuickStep), dan Luca Wackermann (Vini Zabu\' KTM) memimpin di kilometer terakhir. Honore mengawali manuver di sisa 200 meter. Ulisi menyalipnya dari sisi kiri dan berhasil merebut tempat pertama di etape 2. Sementara Sagan dan Honore finis kedua dan ketiga.\r\n\r\nDalam wawancara seusai balapan, Ulissi secara khusus berterima kasih kepada rekan setimnya Valerio Conti. Conti adalah kunci utamanya memenangkan etape 2 ini. Conti memainkan peran vital untuk menyingkirkan para sprinter di kilometer terakhir.\r\n\r\n\"Saya mengatakan kepada Valerio untuk berakselerasi guna menyingkirkan pada sprinter di kilometer terakhir. Kami melakukanya dengan sempurna. Saya sangat senang atas kesuksesan luar biasa ini,\" kata Ulissi.', 'gagal meraih kemenangan', '2020-10-07 04:25:35', '1602044735_post1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_confirm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `level` enum('admin','member','premium') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `phone`, `level`, `username`, `password`) VALUES
(1, 'aby@gmail.com', '0842382983', 'admin', 'aby', '7e47b0bfc5b4331818414fca5176f7db'),
(2, 'abc@gmail.com', '0832837791', 'member', 'abc', 'e99a18c428cb38d5f260853678922e03'),
(3, 'qwe@gmail.com', '08434675647', 'member', 'qwe', '200820e3227815ed1756a6b531e7e0d2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
