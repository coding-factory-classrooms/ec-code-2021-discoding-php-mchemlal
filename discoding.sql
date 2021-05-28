-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 28 mai 2021 à 16:41
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discoding`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `user1_id`, `user2_id`, `updated_at`) VALUES
(7, 14, 11, '2021-05-22 15:30:01'),
(8, 15, 14, '2021-05-27 16:19:29'),
(12, 14, 7, '2021-05-18 20:21:41'),
(13, 14, 8, '2021-05-19 20:21:41'),
(17, 17, 8, '2021-05-09 00:47:13'),
(18, 17, 7, '2021-05-14 00:47:13'),
(19, 18, 5, '2021-05-28 11:42:07'),
(20, 18, 5, '2021-05-11 11:43:39'),
(21, 18, 7, '2021-05-18 11:43:39'),
(27, 18, 8, '2021-05-03 11:45:11'),
(28, 18, 10, '2021-05-21 11:45:11'),
(29, 18, 17, '2021-05-07 11:45:11'),
(30, 18, 11, '2021-05-01 11:45:11'),
(31, 18, 6, '2021-05-06 11:45:11'),
(32, 18, 14, '2021-05-28 12:06:50'),
(33, 18, 9, '2021-05-28 12:11:36');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_user_id`) VALUES
(3, 13, 8),
(8, 14, 11),
(10, 15, 14),
(12, 14, 8),
(13, 17, 8),
(14, 17, 7),
(15, 14, 16),
(16, 14, 18),
(17, 12, 5),
(18, 12, 6),
(19, 12, 7),
(20, 12, 8),
(21, 12, 9),
(22, 12, 10),
(23, 12, 11),
(24, 12, 12),
(25, 12, 13),
(26, 12, 18),
(27, 18, 5),
(28, 18, 6),
(29, 18, 7),
(30, 18, 10),
(31, 18, 14),
(32, 18, 17),
(33, 18, 9);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_id`, `content`, `created_at`) VALUES
(21, 7, 14, 'hello', '2021-05-27 15:30:59'),
(23, 17, 17, 'hello', '2021-05-28 00:59:28'),
(24, 18, 17, 'hello', '2021-05-28 00:59:54'),
(25, 12, 14, 'hello', '2021-05-28 01:13:52'),
(28, 13, 14, 'ohoh', '2021-05-28 01:46:18'),
(29, 7, 14, 'ca va jef', '2021-05-28 01:51:41'),
(34, 12, 14, 'hello', '2021-05-28 03:26:40'),
(35, 12, 14, 'hello', '2021-05-28 03:28:23'),
(37, 19, 18, 'Hey ca biche ? ', '2021-05-28 11:43:10'),
(38, 27, 18, 'Oh oH c\'est le père noêl !!', '2021-05-28 11:47:29'),
(39, 19, 18, 'Ouais c\'est cool man on se fait des guez ...', '2021-05-28 12:00:48'),
(40, 19, 18, 'lkdmdk', '2021-05-28 12:00:57'),
(41, 19, 18, 'mxqklkxqlks', '2021-05-28 12:01:01'),
(42, 19, 18, 'ksùdkdùsk', '2021-05-28 12:01:04'),
(43, 19, 18, 'skdùdùskkdùskdùs', '2021-05-28 12:01:09'),
(44, 19, 18, 'ksdùqkdùqkdùqdk', '2021-05-28 12:01:14'),
(45, 31, 18, 'Si tu rêves que tu dors, ca veut dire que tu dors deux fois ...', '2021-05-28 12:02:24'),
(47, 31, 18, 'ksùqksùqks', '2021-05-28 12:02:34'),
(48, 31, 18, 'q,xsùqkxsùqkx;', '2021-05-28 12:02:38'),
(49, 31, 18, 'kqsxùqksxùqkx', '2021-05-28 12:02:41'),
(50, 31, 18, 'kxùqkxùqk;', '2021-05-28 12:02:44'),
(51, 31, 18, 'kxmùqkxlmk,lsx', '2021-05-28 12:02:49'),
(52, 31, 18, 'jdmjqmqjd', '2021-05-28 12:03:10'),
(53, 31, 18, 'kdùkdlùkdlùqksd,', '2021-05-28 12:03:19'),
(54, 31, 18, 'ksldmklmsdklmsdk,s', '2021-05-28 12:03:26'),
(55, 31, 18, 'id^poqiôpqdo^qd', '2021-05-28 12:03:32'),
(56, 21, 18, 'Ouais c\'est vrai !', '2021-05-28 12:03:54'),
(57, 21, 18, 'ksfpkzfzmùfko', '2021-05-28 12:03:59'),
(58, 21, 18, 'ksmlkdsmkdlskd,xlsd,x', '2021-05-28 12:04:02'),
(59, 21, 18, ';sdùkddùskdms;', '2021-05-28 12:04:06'),
(60, 21, 18, 'smdkùùskdmskd', '2021-05-28 12:04:10'),
(61, 21, 18, 'lsdplùsmksdlmskdmsk', '2021-05-28 12:04:20'),
(62, 21, 18, 'mùdkzùmkdùlzkdlmzù', '2021-05-28 12:04:25'),
(63, 21, 18, 'ksdmksùùmksd', '2021-05-28 12:04:28'),
(64, 21, 18, 'dlmùqkdmùqkdùlk', '2021-05-28 12:04:41'),
(65, 21, 18, 'skdmsùmslkdlk', '2021-05-28 12:04:46'),
(66, 28, 18, 'Mais  voyons ! Repondez ! Les français veulent savoir ! Jean Jacques Bourdin', '2021-05-28 12:05:54'),
(67, 28, 18, 'jqdmlqjkdljqljdlqjdm', '2021-05-28 12:06:01'),
(68, 28, 18, 'mqkùdkdqùdùqd', '2021-05-28 12:06:05'),
(69, 28, 18, 'ùkxmqkùdxùqdxqùd', '2021-05-28 12:06:09'),
(70, 28, 18, 'lmqxdmqdxl;mqkùdxmq;', '2021-05-28 12:06:13'),
(71, 28, 18, 'qlx`ùlx`qùldx', '2021-05-28 12:06:15'),
(72, 28, 18, 'q^ld^qld^qld^q', '2021-05-28 12:06:20'),
(73, 28, 18, 'ls^fl^zplfkdp^$zld', '2021-05-28 12:06:24'),
(74, 28, 18, 'kqlqkldmqlkdml', '2021-05-28 12:06:28'),
(75, 28, 18, 'kfdpùkfùdkf', '2021-05-28 12:06:33'),
(76, 28, 18, 'lù;fskmkdlkfldjklfjdlfjdklfj', '2021-05-28 12:06:39'),
(77, 28, 18, 'ùdlfgmùdlffmlùfl', '2021-05-28 12:06:43'),
(78, 32, 18, 'Si tu parles à ton eau de Javel pendant que tu fais la vaisselle, elle est moins concentrée.', '2021-05-28 12:07:40'),
(79, 32, 18, 'ksfdlmjsdljslkjd', '2021-05-28 12:07:43'),
(81, 32, 18, 'dmlskdmksd', '2021-05-28 12:07:52'),
(82, 32, 18, 'ldmldkmskdmùd', '2021-05-28 12:07:55'),
(83, 32, 18, 'mdlmsdlùlsdmùdls', '2021-05-28 12:07:58'),
(84, 32, 18, 'dldsklsdklskdldklsd', '2021-05-28 12:08:03'),
(85, 32, 18, 'sdklmsdkmskùdms', '2021-05-28 12:08:07'),
(86, 32, 18, 'skdlmksmdklskd', '2021-05-28 12:08:11'),
(87, 32, 18, 'dsmkdmlskdmlskd', '2021-05-28 12:08:15'),
(88, 32, 18, 'sldklskdlskdlskd', '2021-05-28 12:08:19'),
(89, 32, 18, 'mdkmksdmskd', '2021-05-28 12:08:23'),
(90, 29, 18, 'Quand tu prends confiance en la confiance tu deviens confiant.', '2021-05-28 12:10:35'),
(91, 29, 18, 'jsdkjkdjsjdklqjdlkj', '2021-05-28 12:10:40'),
(92, 29, 18, 'kdlqkdlkd', '2021-05-28 12:10:44'),
(93, 29, 18, 'mldmkdm', '2021-05-28 12:10:46'),
(94, 29, 18, 'mdlmqldmqd', '2021-05-28 12:10:49'),
(95, 29, 18, 'mdlkdmqkd', '2021-05-28 12:10:52'),
(96, 29, 18, 'dpmqkdlqkd', '2021-05-28 12:10:55'),
(97, 29, 18, 'jdklqjdkqjq', '2021-05-28 12:10:59'),
(98, 29, 18, 'kdkdkùlmqkd', '2021-05-28 12:11:03'),
(99, 29, 18, 'kqdkmqk', '2021-05-28 12:11:06'),
(100, 29, 18, 'dmkmdk', '2021-05-28 12:11:09'),
(101, 29, 18, 'dkmdmlkdkl', '2021-05-28 12:11:14'),
(102, 29, 18, 'ldklqkdl', '2021-05-28 12:11:18'),
(103, 29, 18, 'dlmkdlmkd', '2021-05-28 12:11:21'),
(104, 29, 18, 'dmkmkd', '2021-05-28 12:11:24'),
(105, 33, 18, 'jdkzjdkzhdkls', '2021-05-28 12:18:04'),
(106, 33, 18, 'hello world', '2021-05-28 12:18:07'),
(107, 33, 18, 'lkdmljdlz', '2021-05-28 12:18:10'),
(108, 33, 18, 's,dklsdj', '2021-05-28 12:18:13'),
(109, 33, 18, 'sdklmskd,l', '2021-05-28 12:18:16'),
(110, 33, 18, 'ldklqsdklmqdk', '2021-05-28 12:18:19'),
(111, 33, 18, 'mldqjlmjd', '2021-05-28 12:18:25'),
(112, 33, 18, 'qldsklmqkds', '2021-05-28 12:18:30'),
(113, 33, 18, 'qlmdklmqkd', '2021-05-28 12:18:33'),
(114, 33, 18, 'qldmqkdmqk', '2021-05-28 12:18:36'),
(116, 33, 18, 'sdkùskùqk', '2021-05-28 12:18:43'),
(117, 33, 18, 'qdlùmqkdq', '2021-05-28 12:18:53'),
(119, 32, 18, 'hello', '2021-05-28 18:19:57'),
(120, 32, 18, 'hello', '2021-05-28 18:26:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `activation_key` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `avatar_url` varchar(500) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `activation_key`, `active`, `avatar_url`) VALUES
(2, 'robin', 'robin@factory.fr', 'robin', '0', 1, 'https://i.pinimg.com/originals/92/57/8a/92578adbf3632f085bffdc00c0eccb47.jpg'),
(5, 'morade#4946', 'm@m.com', '5c161b9b61782f8412c09b67e5e2837494c06f8c967e258606ede9d970dd71b0', '26947bcbefadc435e88be2fd212a7c70', 1, 'https://www.benintimes.info/wp-content/uploads/2021/01/lavraieinfo.com-la-verite-sur-la-mysterieuse-mort-de-bruce-lee-et-de-son-fils-01.jpg'),
(6, 'm#7355', 'hello1@gmail.com', 'd3813aed6490bf0d22e9ecf64033034e3c7902a1b6d05451c936ac6266aedc9c', 'fad11a43e1496298029827717b81d74a', 1, 'https://www.justfocus.fr/wp-content/uploads/2020/10/1535.jpg'),
(7, 'jean#1704', 'jean@gmail.com', '67700f4a39d2d66a4b6eae2f23fc4e912f8078fb84c1e9823474779299405140', '878b6eb3676e004ff140a17c04a630cd', 1, 'https://www.benintimes.info/wp-content/uploads/2021/01/lavraieinfo.com-la-verite-sur-la-mysterieuse-mort-de-bruce-lee-et-de-son-fils-01.jpg'),
(8, 'roger#9328', 'roger@gmail.com', '2d797d10b079be8df3adf78450d5cceba5ea592e951a2d78af1d978a5528322e', '3b55a16d95713c1fd87952137559d3ff', 1, 'https://cdn.radiofrance.fr/s3/cruiser-production/2019/09/31a9cba2-d57f-4172-9ff1-93a0fe505e75/1200x680_eric_cartman_south_park.jpg'),
(9, 'ro#9878', 'ro@gmail.com', '530fe0e0d55493c93d3140b0f8fc929323ec34a82ddeb60bbf5090e5e3b49b5e', '32e0e23c847736cca9df78b84f2b8489', 1, 'https://www.benintimes.info/wp-content/uploads/2021/01/lavraieinfo.com-la-verite-sur-la-mysterieuse-mort-de-bruce-lee-et-de-son-fils-01.jpg'),
(10, 'bebert#9832', 'bebert@gmail.com', 'e56eb3737eb9c2f4642d7fd42720585b5fb13ad84cb6f213c9564b4fe405a566', 'e555140cd2af2de6b3b190c17017c658', 1, 'https://intrld.com/wp-content/uploads/2018/10/GTA-documentaire.jpg'),
(11, 'coucou#6082', 'coucou@gmail.com', '97c616706adfd68f1290dfa6463adcf7605b93b0f6a549804862c434ba54b96c', '82cd0e7638d3329cb9226fef8edb6974', 1, 'https://www.jeuxactu.com/datas/jeux/g/t/gta-5/vn/gta-5-604203ffb580b.jpg'),
(12, 'a#8740', 'a@gmail.com', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', 'bc2c79cbeec37cfa95512aa3c6a8893b', 1, 'https://roadtocinema.paris/wp-content/uploads/2021/01/gto-artwork-1280x720-1.png'),
(13, 'g#3965', 'g@gmail.com', '21f1df4cca171176e1e7f1e5744cebac5eff81ee761b6e695d2a2b37b0f8d49d', '5fec8fca500653958d6c4d7771c007de', 1, 'https://www.nautiljon.com/images/perso/00/17/vegeta_1771.jpg'),
(14, 'jef#8311', 'jef@gmail.com', '5216877eb4b7f9e15f56fdfd53e9c3bede62166fa48f8957b222b89979756c93', '29001aecbec39cea4adf2b2df18fc3bf', 1, 'https://i.pinimg.com/originals/67/d9/aa/67d9aa9494b94764101e9fd53bed0f4c.jpg'),
(15, 'yoann#7527', 'yoann@gmail.com', '30fc2b6f85ce85003242d12acc551a16d292f7ad065826915e95f1ba9e0d5dda', 'bca9c820f8fa558f4feddd14801028e4', 1, 'https://www.thmmagazine.fr/wp-content/uploads/2016/04/SF5-Guile.jpg'),
(16, 'merde#3486', 'merde@gmail.com', 'af4b010110a894a4887fb8f8064e75a4390899d218e5ad7f8ec884a8dfc7b847', '5dc06ab51b56444e46c2f7c6d0d8119d', 1, '/static/img/discord_logo.png'),
(17, 'chris#8080', 'chris@gmail.com', '7c1ca3a79201055a9e5310b43ca17be11acd11a6b649d227c62b4e5a7fff4f53', 'bed77739894e1d87e35bbddc0e6a73f6', 1, 'https://www.lenouvelliste.ch/media/image/65/normal_16_9/323474090.jpg'),
(18, 'coding#8546', 'coding@factory.fr', '91ffdb7bf20347f15e47039da3969b317c703d3085772493ec53dc06ca2b6af8', '03ebd281f86affb313a8a470aae13e23', 1, 'https://media-exp1.licdn.com/dms/image/C560BAQFveTMznUt80w/company-logo_200_200/0/1606411224030?e=2159024400&amp;v=beta&amp;t=Q_n0Ieldw9WSqZs5sNwqS4cfTKRJW1nmud2xhjRrgZM'),
(19, 'rene#8167', 'rene@gmail.com', 'e8f5f8fc90572fc9af1ccb5b66ccb304779fddc513278d3e58cca742ddf8359f', 'b06a4f06a072f01c6be42cc266fdce0d', 1, 'https://roadtocinema.paris/wp-content/uploads/2021/01/gto-artwork-1280x720-1.png'),
(20, 'pierre#7568', 'pierre@gmail.com', '4044ee603373799bcb1be350008ddd2161ce84f8e0af1e4d7b1cdf2ccef36281', 'e964d4de10fed580ffc4df8a5abe71e0', 1, 'https://roadtocinema.paris/wp-content/uploads/2021/01/gto-artwork-1280x720-1.png'),
(21, 'eddy#2248', 'eddy@gmail.com', 'a9a6bca7a28698caf2d3b77dd7c767af7129e34ef91814778e3c7ef62705cc29', '7e4816440b13ef39a8aa986f89f70803', 1, 'https://roadtocinema.paris/wp-content/uploads/2021/01/gto-artwork-1280x720-1.png'),
(22, 'bonjour#3880', 'bonjour@gmail.com', '5c161b9b61782f8412c09b67e5e2837494c06f8c967e258606ede9d970dd71b0', 'd027909581a2d2c9c1959cdb17005279', 1, 'https://d3isma7snj3lcx.cloudfront.net/images/gallery/34/346175/street-fighter-v-arcade-edition-ps4-pc-f2a50ec4.jpg'),
(23, 'christian#7212', 'christian@gmail.com', 'a4db7174f83d201a86ef0599061db2c770b3f3adbbfec1ca2fb9ed5852138d9d', '1c6caca62a8bc6d9b61bd313c4645d21', 1, 'https://d3isma7snj3lcx.cloudfront.net/images/gallery/34/346175/street-fighter-v-arcade-edition-ps4-pc-f2a50ec4.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conversations_to_user1_id` (`user1_id`),
  ADD KEY `fk_conversations_to_user2_id` (`user2_id`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_friends_to_user_id` (`user_id`),
  ADD KEY `fk_friends_to_friend_user_id` (`friend_user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_to_conversation_id` (`conversation_id`),
  ADD KEY `fk_messages_to_user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `fk_to_user1_id` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_user2_id` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_to_friend_user_id` FOREIGN KEY (`friend_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_to_conversation_id` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_to_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
