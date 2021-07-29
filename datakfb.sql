-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 05:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakfb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`) VALUES
(1, 'Makanan', 1),
(2, 'Minuman', 1),
(3, 'Snack', 1),
(4, 'Dessert', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'KFB', '5', '15', 'Universitas Multimedia Nusantara Jl. Scientia Boulevard, Gading Serpong, Tangerang, Banten-15811 Indonesia', '02154220808', 'Indonesia', 'This is our new restaurant', 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Super Administrator', 'a:32:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createStore\";i:9;s:11:\"updateStore\";i:10;s:9:\"viewStore\";i:11;s:11:\"deleteStore\";i:12;s:11:\"createTable\";i:13;s:11:\"updateTable\";i:14;s:9:\"viewTable\";i:15;s:11:\"deleteTable\";i:16;s:14:\"createCategory\";i:17;s:14:\"updateCategory\";i:18;s:12:\"viewCategory\";i:19;s:14:\"deleteCategory\";i:20;s:13:\"createProduct\";i:21;s:13:\"updateProduct\";i:22;s:11:\"viewProduct\";i:23;s:13:\"deleteProduct\";i:24;s:11:\"createOrder\";i:25;s:11:\"updateOrder\";i:26;s:9:\"viewOrder\";i:27;s:11:\"deleteOrder\";i:28;s:10:\"viewReport\";i:29;s:13:\"updateCompany\";i:30;s:11:\"viewProfile\";i:31;s:13:\"updateSetting\";}'),
(4, 'Members', 'a:5:{i:0;s:12:\"viewCategory\";i:1;s:11:\"viewProduct\";i:2;s:11:\"createOrder\";i:3;s:11:\"updateOrder\";i:4;s:9:\"viewOrder\";}');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge_amount` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge_amount` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge_amount`, `vat_charge_rate`, `vat_charge_amount`, `net_amount`, `user_id`) VALUES
(7, 'BILPR-974D', '1589700665', '14000.00', '5', '700.00', '15', '2100.00', '16800.00', 1),
(8, 'BILPR-789D', '1589730887', '20000.00', '5', '1000.00', '15', '3000.00', '24000.00', 1),
(15, 'BILPR-A2A9', '1589793602', '68000.00', '5', '3400.00', '15', '10200.00', '81600.00', 15),
(16, 'BILPR-F2EF', '1589796058', '73000.00', '5', '3650.00', '15', '10950.00', '87600.00', 15),
(17, 'BILPR-FCE2', '1589808477', '13000.00', '5', '650.00', '15', '1950.00', '15600.00', 15),
(18, 'BILPR-D2AB', '1589817655', '76000.00', '5', '3800.00', '15', '11400.00', '91200.00', 15),
(19, 'BILPR-F858', '1591061575', '68000.00', '5', '3400.00', '15', '10200.00', '81600.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`) VALUES
(22, 7, 34, '2', '7000', '14000.00'),
(23, 8, 34, '1', '7000', '7000.00'),
(24, 8, 33, '1', '13000', '13000.00'),
(30, 15, 4, '1', '68000', '68000.00'),
(31, 16, 4, '1', '68000', '68000.00'),
(32, 16, 9, '1', '5000', '5000.00'),
(33, 17, 8, '1', '13000', '13000.00'),
(34, 18, 5, '1', '70000', '70000.00'),
(35, 18, 6, '2', '3000', '6000.00'),
(36, 19, 4, '1', '68000', '68000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `total_rating` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `stock`, `price`, `description`, `image`, `total_rating`, `active`) VALUES
(4, '[\"1\"]', 'Eggsy Classic', 9, '68000', '<p>Kata eggstraordinary memiliki telur di dalamnya dan begitu juga kata eggcellent ... Kebetulan? Kami tidak berpikir begitu. Dari pengamatan kami menyimpulkan bahwa banyak hal besar mengandung telur di dalamnya, jadi kami menciptakan Eggsy. Telur orak-arik tebal, bawang karamel, Flip Sauce, satu iris keju bbq asap, semuanya diletakkan di atas roti brioche yang baru dipanggang.</p>', 'assets/images/product_image/00000000103.png', 5, 1),
(5, '[\"1\"]', 'Eggsy Beef Strips', 13, '70000', '<p>Kata egg straordinary memiliki telur di dalamnya dan begitu juga kata eggcellent ... Kebetulan? Kami tidak berpikir begitu. Dari pengamatan kami menyimpulkan bahwa banyak hal besar mengandung telur di dalamnya, jadi kami menciptakan Eggsy. Telur orak-arik tebal, bawang karamel, Flip Sauce, satu iris keju bbq asap, semuanya diletakkan di atas roti brioche yang baru dipanggang.</p>', 'assets/images/product_image/00000000104.png', 5, 1),
(6, '[\"2\"]', 'Air putih', 97, '3000', '<p>Aqua berukuran kecil</p>', 'assets/images/product_image/00000000001.png', 4, 1),
(7, '[\"2\"]', 'Coca cola', 12, '3500', '<p>Coca cola ukuran sedang</p>', 'assets/images/product_image/00000000006.png', 3, 1),
(8, '[\"3\"]', 'Crinkle Cut Fries', 14, '13000', '<p>Kentang goreng yang akan bersinar mata anda dengan warna emas dan menggelitik lidah anda dengan kerutannya.\r\n\r\n<br></p>', 'assets/images/product_image/00000000065.png', 5, 1),
(9, '[\"4\"]', 'Vanilla Ice Cream', 14, '5000', '<p>Es krim vanilla asli dari tahun 1990</p>', 'assets/images/product_image/00000001002.png', 2, 1),
(10, '[\"2\"]', 'Fruit Tea Lemon', 14, '8000', '<p>Teh rasa buah lemon yang segar</p>', 'assets/images/product_image/00000000002.png', 0, 1),
(11, '[\"2\"]', 'Fanta', 15, '3500', '<p>Minuman berkarbonasi dengan rasa strawberry</p>', 'assets/images/product_image/00000000004.png', 0, 1),
(12, '[\"2\"]', 'Sprite', 15, '4000', '<p>Minuman berkarbonasi dengan rasa perpaduan lemon lime dan soda</p>', 'assets/images/product_image/00000000005.png', 0, 1),
(13, '[\"2\"]', 'Orange Drink', 15, '8000', '<p>Minuman rasa jeruk yang segar dari Country Choice/p>', 'assets/images/product_image/00000000003.png', 0, 1),
(14, '[\"2\"]', 'Neast Tea', 15, '4000', '<p>Minuman dari Buah Lemon dengan rasa teh yang menyegarkan dari Neast tea</p>', 'assets/images/product_image/00000000007.png', 0, 1),
(15, '[\"2\"]', 'Teh Botol Sosro', 15, '4500', '<p>Perpaduan daun teh asli dan bunga jasmin alami yang khas</p>', 'assets/images/product_image/00000000008.png', 0, 1),
(16, '[\"2\"]', 'Caffe Latte', 15, '15000', '<p>Paduan Double shot espresso, susu yang di-steam, dan foam</p>', 'assets/images/product_image/00000000009.png', 0, 1),
(17, '[\"2\"]', 'Hazelnut Latte', 15, '20000', '<p>Paduan Espresso 100% Arabica dan susu segar dalam cita rasa Hazelnut</p>', 'assets/images/product_image/00000000010.png', 0, 1),
(18, '[\"2\"]', 'Caramel Latte', 15, '18000', '<p>Paduan Espresso 100% Arabica dan susu segar dalam cita rasa karamel</p>', 'assets/images/product_image/00000000011.png', 0, 1),
(19, '[\"3\"]', 'Chiken Skin', 15, '26000', 'Mari kita hadapi itu, Anda mungkin tidak pernah cukup mencintai seseorang untuk berbagi kulit ayam Anda. Tetapi Anda dapat cukup mencintai mereka untuk memberi tahu mereka.<br>', 'assets/images/product_image/00000000061.png', 0, 1),
(20, '[\"3\"]', 'Chicken Finger', 15, '25000', '<p>Makanan jari yang akan membuat lidah Anda menyerah. Tapi lidah tidak punya ibu jari, bukan? Lidah mungkin? Kedengarannya aneh, Anda mengerti maksudnya.<br></p>', 'assets/images/product_image/00000000062.png', 0, 1),
(21, '[\"3\"]', 'Beef Strips & Cheese Tots Fries', 15, '32000', '<p>Tots goreng + saus keju + taburan potongan daging sapi goreng renyah halal = ini waktu untuk hidup.<br></p>', 'assets/images/product_image/00000000063.png', 0, 1),
(22, '[\"3\"]', 'Hash Brown', 15, '18000', '<p>Makan Hash Brown yang banyak!</p><p>#lesshashtagmorehashbrown&nbsp;</p><p>#okaymaybewedoneedhashtagafterall&nbsp;</p><p>#justnottoomany<br></p>', 'assets/images/product_image/00000000064.png', 0, 1),
(23, '[\"1\"]', 'Eggys Beef', 15, '70000', '<p>Yang mana yang lebih dulu? Telur atau ayam? Kami tidak punya jawabannya. Tapi kita tahu jawaban untuk \"apa yang enak untuk sarapan, makan siang, dan makan malam?\", Itu Eggsy Beef. Telur orak-arik tebal, patty daging sapi segar Australia, 2 irisan daging sapi halal, lapisan irisan keju barbeque asap, bawang karamel, Flip Sauce, semuanya roti brioche yang baru dipanggang.<br></p>', 'assets/images/product_image/00000000105.png', 0, 1),
(24, '[\"1\"]', 'Beef burger', 15, '40000', '<p>Lihatlah! Burger daging sapi yang mengalahkan burger daging sapi dari burger daging sapi lainnya. Apa artinya itu, Anda bertanya? Dapatkan dan Anda akan mendapatkannya. Patty daging sapi Australia segar yang dipanggang dengan sempurna, bawang karamel, Sauce, dan roti brioche yang baru dipanggang.&nbsp;</p><p>Tidak usah berterimakasih.<br></p>', 'assets/images/product_image/00000000106.png', 0, 1),
(25, '[\"1\"]', 'Double Cheese Burger', 15, '55000', '<p>\"Ada terlalu banyak keju dalam hal ini\", kata tidak ada yang pernah. Gandakan fraksi sa-keju Anda dengan Burger Keju Ganda kami: 2 lapis patty daging sapi Australia segar, 2 lapis irisan keju barbeque smokey, bawang karamel, dan Flip Sauce, semuanya dikunci dengan baik oleh roti brioche yang baru dipanggang.<br></p>', 'assets/images/product_image/00000000108.png', 0, 1),
(26, '[\"1\"]', 'Fish Burger', 15, '35000', '<p>Akan selalu ada banyak ikan di laut, tetapi sayangnya, tidak di Flip. Karena rasanya yang lezat, burger ikan kami sering terjual habis. Fillet ikan dory goreng di atasnya dengan irisan keju asap barbeque, saus tartar dan bawang karamel, semuanya disajikan dengan roti brioche hangat. Jelas tangkapan!<br></p>', 'assets/images/product_image/00000000110.png', 0, 1),
(27, '[\"1\"]', 'Chicken Burger', 15, '33000', '<p>Hanya ada 2 tipe orang, mereka yang suka ayam &amp; mereka yang menyukainya. Di kategori mana pun Anda berada, Anda mungkin ingin mencoba menu ini. Potongan tebal fillet ayam super juicy bermandikan saus flip &amp; dipeluk oleh 2 roti halus,</p>', 'assets/images/product_image/00000000291.png', 0, 1),
(28, '[\"1\"]', 'Smacker', 15, '98000', '<p>Rasa lapar di wajah figuratifnya dengan rasa nikmat dari Smacker® kami. 2 lapis patty daging sapi Australia dengan 2 strip irisan daging sapi halal, 2 lapis irisan keju barbeque asap dan bawang karamel, semuanya ditambah dengan saus bbq dan Flip Sauce pada roti brioche yang baru dipanggang.<br></p>', 'assets/images/product_image/00000000109.png', 0, 1),
(29, '[\"1\"]', 'Mushroom Black Papper Burger', 15, '49000', '<p>Apa yang Anda dapatkan jika Anda menyatukan daging sapi Australia yang baru dipanggang, jamur tumis, lada hitam dan keju leleh? Keangkeran murni itulah yang !! Jadi tunggu apa lagi? Berhenti membaca ini dan dapatkan kehebatan murni itu di mulut Anda !!<br></p>', 'assets/images/product_image/00000000300.png', 0, 1),
(30, '[\"1\"]', 'Barbeque Jack with Onion Rings', 15, '65000', '<p>Menu baru! Burger dengan patty tebal, onion rings yang buanyaak, keju lumer, beef strips gurih dan lumuran saus barbeque\r\n\r\n<br></p>', 'assets/images/product_image/00000000358.png', 0, 1),
(31, '[\"4\"]', 'Chocolate Sundae', 15, '11000', '<p>Es krim vanilla lembut dengan pilihan topping saus coklat</p>', 'assets/images/product_image/00000001000.png', 0, 1),
(32, '[\"4\"]', 'Strawberry Sundae', 15, '11000', '<p>Es krim vanilla lembut dengan pilihan topping saus strawberry</p>', 'assets/images/product_image/00000001001.png', 0, 1),
(33, '[\"4\"]', 'Choco lover', 14, '13000', '<p>Cake favorit yang cocok bagi Anda pecinta coklat</p>', 'assets/images/product_image/00000001004.png', 0, 1),
(34, '[\"4\"]', 'Choco Chip Muffin', 12, '7000', '<p>Muffin lembut dengan taburan choco chip</p>', 'assets/images/product_image/00000001003.png', 0, 1),
(35, '[\"4\"]', 'Lemon Cake', 15, '19000', '<p>Cake vanilla dengan cream rasa lemon segar bertaburkan cake crumbs</p>', 'assets/images/product_image/00000001005.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `user_id`, `status`, `score`) VALUES
(1, 8, 15, 1, 5),
(2, 5, 15, 1, 5),
(3, 6, 15, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `profile_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `birthday`, `phone`, `gender`, `profile_picture`) VALUES
(1, 'admin', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@admin.com', 'Gordon', 'Ramsay', '1996-11-08', '081111111111', 1, 'assets/images/user_image/admin.jpg'),
(14, 'Hanniball', '$2y$10$OKLlkcNLa8oFZfWYyYPm7.4aRCx0YY4x9NXiABc0ueBop.4n5EMBa', 'hanniballecter@gmail.com', 'Hannibal', 'Lecter', '2004-04-04', '098609876543', 1, 'assets/images/user_image/5ec521a28ec34.JPG'),
(15, 'RickS', '$2y$10$M37lyn3smOeuf3eUWIKIquE2.QXy4qAJ1UBVxNwayQ7g1ceu4TGSu', 'rick.sanchez@gmail.com', 'Rick', 'Sanchez', '2001-01-01', '085780407555', 1, 'assets/images/user_image/5ec5217c2d32e.png'),
(16, 'sherlock', '$2y$10$3vOvkgJ36zP1q19sXmMthupYt.EoHJBhTNjuXHNQOx92lvxC/joQW', 'sherlock.holmes@gmail.com', 'Sherlock', 'Sherlock', '2002-02-02', '089608960896', 2, 'assets/images/user_image/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(12, 14, 4),
(13, 15, 4),
(14, 16, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
