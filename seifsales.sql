-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2023 at 07:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seifsales`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total` double NOT NULL,
  `ordered_at` timestamp NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total`, `ordered_at`, `status`) VALUES
(93, 3, 72, 3, 119.97, '2023-06-17 07:22:53', 'checked_out'),
(101, 3, 77, 3, 1499.97, '2023-06-18 13:58:03', 'checked_out'),
(104, 3, 80, 2, 599.98, '2023-06-23 17:58:31', 'checked_out');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `Bdescription` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `price`, `Bdescription`, `description`, `category`, `image`, `created_at`) VALUES
(72, 3, 'The Legend of Zelda™', 39.99, 'The Legend of Zelda™: Tears of the Kingdom ', 'The Legend of Zelda: Tears of the Kingdom offers a vast world full of varied quests, challenging puzzles, ferocious monsters, and unique sights to behold. Working closely with Nintendo®, we have created the authoritative, all-encompassing guide that this game so richly deserves. We have explored all features and facets of The Legend of Zelda: Tears of the Kingdom with a single mission: to help you discover and enjoy every moment of this game.', 'books', '64786bf4583c3.jpg', '2023-06-01 09:59:16'),
(73, 3, 'Basketball', 29.99, 'WILSON Evolution Game Basketball', 'When you focus on getting better, and not just on getting results, success takes care of itself. That is why the Wilson Evolution Game Ball is the preferred basketball in high schools across the country.\r\nTHE INDOOR BALL: The Evolution is the indoor game basketball in America, on more courts than any other basketball\r\nSignature EVO feel: the soft feel that the evolution basketball is famous for is due it’s cushion core carcass, making the ball softer to the touch and easier to grip around the rim\r\nGrip & durability: the premium evo microfiber composite cover provides grip that players love and durability to last all season and beyond\r\nUltimate control: laid in composite channels create a consistent feel and texture over the entire surfACe of the basketball to provide unparalleled control', 'sports', '64786d573f1d7.png', '2023-06-01 10:05:11'),
(74, 3, 'Sofa', 399.99, 'Oversized Sofa Couch, 89\"W, Slate', 'Get comfort you can literally sink into with this contemporary overstuffed sofa. A clean and simple silhouette with track arms in a durable performance fabric, it\'s the perfect addition for your living room.\r\nDimensions: 89.4\'\'W x 44.9”D x 37.4”H; seat height 18.5\", seat depth 25\"\r\nSolid hardwood frame with moisture repellent, stain resistant fabric and down-filled cushions\r\nRemovable and reversible seat cushion.\r\nNo assembly required\r\nAvoid moisture. Wipe with a soft, dry cloth.\r\nFree returns for 30 days. 3-year warranty.', 'home', '64786db276a8d.png', '2023-06-01 10:06:42'),
(75, 3, 'Earphone', 100, 'All-new Echo Buds', 'TRUE WIRELESS EARBUDS WITH RICH, BALANCED SOUND — Hear it loud and clear with 12mm drivers delivering crisp audio, balanced bass, and full sound. Be heard with 2 microphones and a voice detection accelerometer for crystal clear communication.\r\nLONG-LASTING BATTERY — Never pause with up to 5 hours of music playback (6 hours without wake word on), up to 20 total hours with the charging case, and up to 2 hours with a 15-minute quick charge.\r\nSEAMLESS SWITCHING — Connect to two devices at the same time and automatically move between devices with multipoint pairing. Move from a video call on your laptop to music on your phone without skipping a beat.', 'electronics', '64786e08669f6.png', '2023-06-01 10:08:08'),
(76, 3, 'Dress', 39.99, 'English Teacher Dress', '95% Rayon, 5% Elastane\r\nImported\r\nNo Closure closure\r\nMachine Wash\r\nFitted through chest and waist; flared to hem\r\nSoft, smooth, luxe jersey with beautiful drape\r\nV neckline\r\nAn Amazon brand', 'clothing', '64786e35c8c6a.png', '2023-06-01 10:08:53'),
(77, 3, 'Iphone', 499.99, 'Iphone Seifeddine pro max', 'Unlocked\r\nTested for battery health and guaranteed to come with a battery that exceeds 90% of original capacity.\r\nInspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm’s length. Successfully passed a full diagnostic test which ensures like-new functionality and removal of any prior-user personal information.\r\nIncludes a brand new, generic charging cable that is certified Mfi (Made for iPhone) and a brand new, generic wall plug that is UL certified for performance and safety. Also includes a SIM tray removal tool but does not come with headphones or a SIM card.\r\nBacked by the same one-year satisfaction guarantee as brand new Apple products.', 'electronics', '64786e730952e.png', '2023-06-01 10:09:55'),
(78, 3, 'Smart Watch', 129.99, 'Smartwatch with Daily Readiness, GPS, 24/7 ', 'et inspired and stay accountable with Versa 4 + Premium - learn when to work out or recover, see real-time stats during exercise and find new ways to keep your routine fresh and fun\r\nBuilt for better fitness results: Daily Readiness Score(1), built-in GPS and workout intensity map, Active Zone Minutes, all-day activity tracking and 24/7 heart rate, 40+ exercise modes and automatic exercise tracking, water resistant to 50 meters\r\nTools to measure and improve sleep quality: personalized Sleep Profile(1), daily sleep stages & Sleep Score, smart wake alarm and do not disturb mode\r\nMaintain a healthy body and mind:  daily Stress Management Score, reflection logging, SpO2(2), health metrics dashboard(3), guided breathing sessions, menstrual health tracking and mindfulness content', 'electronics', '64786ec661278.png', '2023-06-01 10:11:18'),
(79, 3, 'Lenovo Laptop', 450, 'Lenovo laptop intel core i7 11800h', 'Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications.Voltage:240.0 volts\r\nMaximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels\r\nBacklit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure\r\nInternal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media\r\nAcer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.', 'electronics', '64786ef5ae729.png', '2023-06-01 10:12:05'),
(80, 3, 'Xbox', 299.99, 'Xbox 360 open box', 'XBOX SERIES X: The fastest, most powerful Xbox ever. Explore rich new worlds with 12 teraflops of raw graphic processing power, DirectX ray tracing, a custom SSD, and 4K gaming.*\r\nFASTER LOAD TIMES: Make the most of every gaming minute with Quick Resume, lightning-fast load times, and gameplay of up to 120 FPS – all powered by Xbox Velocity Architecture.\r\nLOOKS AND PLAYS BEST: Enjoy thousands of games from four generations of Xbox, with hundreds of optimized titles that look and play better than ever.\r\nIN THE BOX: Xbox Series X console, one Xbox Wireless Controller, an ultra high-speed HDMI cable, power cable, and 2 AA batteries.\r\nSURROUND SOUND: Enhance gameplay with both full-spectrum visuals and immersive audio with Dolby Vision and Dolby Atmos', 'electronics', '64786f1b233a7.png', '2023-06-01 10:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `status`) VALUES
(2, 'dany', 'scorpien@outlook.com', '$2y$10$WRy1PMCBYmh0.d83JGK3r.gkO1ZQYHUu7s2J9set7ZjeAME8Ek7dy', '2023-05-20 14:35:59', 'user'),
(3, 'Ahmadadmin', 'admin@admin.com', '$2y$10$FqxXyif82v2o2CVkUX/UjuPUIfhGbrwpeMPZF0Ysi6oW5pdAzhTOu', '2023-05-21 10:30:49', 'admin'),
(4, 'ahmaddany', 'ahmadoflegen1d@outlook.com', '$2y$10$.J.3/1IWdVJSxvh.oUStKOS6sHZNlySWWFDN.LqwaPfikFlDCzTfK', '2023-05-24 09:33:52', 'user'),
(5, 'rafe3', 'rafe3@gmail.com', '$2y$10$WK0qXn1qpqmPgNXxp0euhuneVRQQ1yuIrjx/R1h.Bv/u1BblZ5RFa', '2023-05-24 18:03:37', 'user'),
(6, 'ahmadchebbo', 'ahmadchebbo@gmail.com', '$2y$10$OJ5mJ4X8Qj3WJEYl3viQ6eslj5KbrYdPm3qs8/iP/cPJ6H1kLlyIK', '2023-05-28 18:16:46', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cs_order_user` (`user_id`),
  ADD KEY `cs_order_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cs_user_product` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cs_order_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cs_user_product` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
