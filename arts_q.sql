-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 09:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arts`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `id` int(11) NOT NULL,
  `art_title` varchar(80) NOT NULL,
  `art_description` varchar(1000) DEFAULT NULL,
  `art_size` varchar(50) DEFAULT NULL,
  `art_canvas` varchar(50) DEFAULT NULL,
  `art_paint` varchar(50) DEFAULT NULL,
  `art_price` double DEFAULT NULL,
  `art_titleimage` varchar(255) NOT NULL,
  `art_image` varchar(255) NOT NULL,
  `art_date` datetime NOT NULL,
  `art_category` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `art_title`, `art_description`, `art_size`, `art_canvas`, `art_paint`, `art_price`, `art_titleimage`, `art_image`, `art_date`, `art_category`) VALUES
(39, 'City house in Varna', 'Varna (Bulgarian: Варна, pronounced [ˈvarnɐ]) is the third largest city in Bulgaria and the largest city and seaside resort on the Bulgarian Black Sea Coast. Situated strategically in the Gulf of Varna, the city has been a major economic, social and cultural centre for allmost three millennia. Varna, historically known as Odessos, grew from a Thracian seaside settlement to a major seaport on the Black Sea.\r\n\r\nVarna is an important centre for business, transportation, education, tourism, entertainment, healthcare. The city is referred to as the maritime capital of Bulgaria and headquarters the Bulgarian Navy and merchant marine. In 2008, Varna was designated seat of the Black Sea Euro-Region by the Council of Europe.[3] In 2014, Varna was awarded the title of European Youth Capital 2017.', '60/60', 'tarboard', 'Water paint', 220, '6cf90d50226797eb8433d10023e92c2a.jpeg', '8c8c3e7ebd90a8beb1b0121a851e0286.jpeg', '2017-03-04 22:51:33', 'Gallery'),
(35, 'Jordans Day', 'In the cold of winter, young men all over Bulgaria are to jump into the waters of rivers and lakes this Friday, keeping an old tradition in commemoration of St Jordan\'s Day.\r\n\r\nThe main ritual is performed by a priest who throws a cross into a river or a lake for young men to catch it. It is believed that the first person that gets to the cross will enjoy good health throughout the whole year.\r\n\r\nSince so many Bulgarians are named Yordan, Ivan or various derivatives, the holiday is very popular in the country, all the more so that it comes just days after the particularly demanding New Year celebrations and St Basil\'s day.', '30/80', 'canvas', 'acrylic paint', 220, 'c0c31ef46d6f9184b3741c96a5a75b05.jpeg', 'bff7e2b60f40684a3c6fc3ad8b965f00.jpeg', '2017-03-04 22:30:28', 'Paintings for sale'),
(36, 'Afternoon tea', 'Afternoon Tea is a quintessentially English tradition and is upheld in its finest form here at The Milestone, recently highly commended at the Afternoon Tea Awards, 2016. Served in Chenestons Restaurant, the Park Lounge or the Conservatory, it is a treat in more ways than one - a delicious array of delicate finger sandwiches is accompanied by warm freshly baked scones served with Devonshire clotted cream and home-made preserves, as well as a selection of pastries including éclairs, tartlets, cupcakes and macaroons.', '80/60', 'canvas', 'acrylic paint', 150, 'fbf6337524ab8ad3e3271029312bd5d5.jpeg', 'e8390ce49372998cd8e02f29816fb5ee.jpeg', '2017-03-04 22:32:34', 'Paintings for sale'),
(37, 'Point of view', 'Each time that I have sat for my portrait, the physical and psychological experience has been very different. The first time was when I was Director of the National Portrait Gallery. I sat in my office upstairs in Orange Street for a young artist, Stuart Pearson Wright, who had recently graduated from the Slade, and won the BP Travel Award in 1998 with a large Hogarthian composition. He asked if I would sit for him partly because he was building up a portfolio of portraits and partly because he was grateful for the encouragement he had been given by the NPG (at the Slade he had been marked down as a mere illustrator, whereas we all regarded him, as I still do, as exceptionally talented).', '90/50', 'canvas', 'Oil paint', 180, '141cd73547c479f16756c33d3aff5457.jpeg', '2168c3264a0535f23638a7e99f875214.jpeg', '2017-03-04 22:38:51', 'Paintings for sale'),
(38, 'Bulgarian village house', 'Spring is upon us, the days are getting longer and sunnier and you want to use any opportunity to explore Bulgaria off the beaten path. Perhaps you’re looking for a weekend getaway? It’s still cold and partially snowy high up in the mountains and a beach holiday on the Black Sea is not an option yet.', '60/60', 'canvas', 'Water paint', 260, '00a9b90a42e418a7f8749be6de73ae66.jpeg', '2f407343b02b771672efdfd55b6b6887.jpeg', '2017-03-04 22:48:49', 'Gallery'),
(40, 'Abstract girl', 'Vector illustration of an abstract girl with fantasy haircut and wonderful colors', '80/60', 'canvas', 'acrylic paint', 300, '0eae42b9a84da3d0d63b095884d5c75f.jpeg', 'f4f3572fc613029deaadb59956b5be22.jpeg', '2017-03-04 23:12:43', 'Paintings for sale'),
(41, 'Flowers', 'One of the main pleasures of taking up a hobby is surely acquiring all the necessary equipment, preferably new, with everything matching and on a professional scale.\r\n\r\nWomen taking up watercolour painting in 1797 obviously felt the same\r\n\r\n“Every lady who has a taste for painting, furnishes herself with a box of colours, probably eighteen, twenty-four or thirty cakes of colours, the latter of which is recommended as the most complete and best”.', '90/60', 'canvas', 'watercolor paint', 125, '268a17813f6cefe96053a9135518a7bb.jpeg', '7f068d61cdb051e835669347178e84f2.jpeg', '2017-03-04 23:14:49', 'Paintings for sale'),
(43, 'Just old shoes', 'On the left there is an apple impaled by a fork, then a bottle, a loaf of bread and the shoe of the title. The main colours are black, red and acidic yellow, which symbolize an apocalyptic landscape, all in flames (the fire being actually outside the painting) This infernal sight is underlined by the shades in the horizon. The silhouettes of all objects can be clearly defined and the round-shaped lines of the whole composition create dynamism.', '90/50', 'canvas', 'acrylic paint', 250, 'ff159946ddfa6e25520f881bf4c32c61.jpeg', 'add6454875b11ba5b0df35129e5b1584.jpeg', '2017-03-11 14:36:50', 'Paintings for sale'),
(44, 'Kids', 'Art is a language in its own and even the tiniest babies respond to the contrasts in light and color. You might have noticed small children expressing their feelings, and needs through paints. Here the sharing of ideas becomes easier and safer between parents and children. For young children, painting is an enriching experience that will support their growth, development and self-expression. The benefit and value of painting are enormous. Here we bring educational possibilities of painting.', '80/50', 'canvas', 'acrylic paint', NULL, '6b85a2c45652eaac238c96701b60d8d7.jpeg', 'e724a0e4dea91c3dbb1801ad9c00140f.jpeg', '2017-03-11 14:58:34', 'Gallery'),
(46, 'Dancing', 'Dance is practiced in many forms and for many reasons, including social, educative, political and therapeutic reasons. This article will consider the philosophy of dance as a Western theater or concert art, by which I mean the sort of art that is practiced in a performance space and that is offered for some sort of audience or spectator appreciation. Further, this entry will focus on the philosophy of dance that has developed as a subset of philosophical aesthetics, considering philosophical questions such as “what is the nature of a dance?” and “how are dance performances appreciated, experienced and perceived?”', '70/40', 'tarboard', 'acrylic paint', 90, 'b1082953c7047ab61a5dd997d7b4bb04.jpeg', '65f61a2b023c37bb216006ada3b52b6f.jpeg', '2017-03-11 15:16:59', 'Paintings for sale');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_id` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  `comment_date` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `art_comment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_id`, `art_id`, `comment_date`, `id`, `art_comment`) VALUES
(15, 46, '2017-03-12 00:33:07', 19, 'Some new comment'),
(13, 43, '2017-03-17 21:46:58', 20, 'Hi, i like this very much'),
(13, 41, '2017-03-17 21:47:52', 21, 'Wonderful flowers!'),
(15, 43, '2017-03-19 00:32:45', 22, 'Thank you');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `user_email`, `user_name`, `user_role`) VALUES
(15, '$2y$13$jOruJhaYRoQqobOWokJB..kRqNQXHNyDkF9TXyXCx5AB6LnuYR7PG', 'megsstoyanova@gmail.com', 'admin', 'ROLE_ADMIN'),
(13, '$2y$13$TvOwsjucMZZb.rEu2i9o8uWv5LCh2QrtemVIn9OonDh5P.F0GnIdK', 'bibita@abv.bg', 'bibita', 'ROLE_USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962AA76ED395` (`user_id`),
  ADD KEY `IDX_5F9E962A8C25E51A` (`art_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
