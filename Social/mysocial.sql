-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 mars 2022 à 10:29
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mysocial`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `commented_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `commented_at`) VALUES
(1, ' Hello', 1, 2, '2022-02-15 11:33:02'),
(2, 'Nice pic', 1, 6, '2022-02-15 12:02:34'),
(3, 'Yeah i know this guy. this is his number ********  ', 1, 8, '2022-02-15 12:03:30'),
(4, 'Don\'t forget to tell him that\'s i help you!', 1, 8, '2022-02-15 12:04:09'),
(5, 'Of course', 2, 8, '2022-02-15 12:05:19'),
(6, 'Ah ah... thanks!', 2, 4, '2022-02-15 12:05:19'),
(7, 'ggg', 1, 10, '2022-02-15 12:53:52'),
(8, 'Hello', 1, 9, '2022-03-01 13:21:14');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friends_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friends_email`) VALUES
(13, 1, 'ivan@gmail.com'),
(14, 3, 'fabienbrou99@gmail.com'),
(15, 1, 'ahou@gmail.com'),
(16, 2, 'fabienbrou99@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(1, 2, 1),
(2, 2, 1),
(3, 6, 1),
(4, 8, 1),
(5, 4, 1),
(6, 10, 1),
(7, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `text`, `image`, `posted_at`) VALUES
(1, 1, 'This is my first post', 'assets/image/posts/IMG-620b788755ce06.63738766.jpeg', '2022-02-15 09:55:19'),
(2, 1, 'hey', NULL, '2022-02-15 09:57:30'),
(3, 1, 'aPPPP', NULL, '2022-02-15 11:35:11'),
(4, 2, 'Hello guys', NULL, '2022-02-15 11:59:21'),
(5, 3, 'I\'am ivann, nice to meet you.', 'assets/image/user/profile/male.png', '2022-02-15 11:59:21'),
(6, 2, 'Cool... this is a fun app!', 'assets/image/user/profile/female.png', '2022-02-15 12:01:35'),
(7, 1, 'Hey; can someone hear me?\r\nThat\'s greet. This is my face.', 'assets/image/user/profile/male.png', '2022-02-15 12:01:35'),
(8, 2, 'OH look like i need a good friend.\r\nThis is one of my friend. if you saw him tell me. thanks.', 'assets/image/user/profile/male.png', '2022-02-15 12:01:35'),
(9, 1, 'aPPPP', NULL, '2022-02-15 12:01:39'),
(10, 1, 'gg', NULL, '2022-02-15 12:53:47'),
(11, 5, 'I have a new profil picture...', 'assets/image/posts/IMG-621e1ef82f76c8.88230671.png', '2022-03-01 13:26:16');

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `request_email`, `date`) VALUES
(13, 4, 'fabienbrou99@gmail.com', '2022-02-18 10:06:20'),
(14, 4, 'ivan@gmail.com', '2022-02-18 10:07:15'),
(15, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:20'),
(16, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:25'),
(17, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:26'),
(18, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:26'),
(19, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:27'),
(20, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:30'),
(21, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:24:30'),
(22, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:25:11'),
(23, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:25:14'),
(24, 5, 'fabienbrou99@gmail.com', '2022-03-01 13:25:18');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `profil` text DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `profil`, `phone`, `email`, `birth`, `gender`, `password`, `created_at`) VALUES
(1, 'Brou', 'Kouadio Stephane Fabien', 'assets/image/user/profile/male.png', '', 'fabienbrou99@gmail.com', '1999-02-01', 'male', 'fabien', '2022-02-15 11:31:22'),
(2, 'Brou', 'Ahou Marie Constance', 'assets/image/user/profile/female.png', '002250700000000', 'ahou@gmail.com', '2015-02-11', 'female', 'fabien', '2022-02-15 11:58:02'),
(3, 'Brou', 'Kouakou Ivan', 'assets/image/user/profile/male.png', '002250709167244', 'ivan@gmail.com', '2018-02-15', 'male', 'fabien', '2022-02-15 11:58:02'),
(4, 'Michael', 'Combs', 'assets/image/user/profile/male.png', '+1 (777) 173-5103', 'fabien@gmail.com', '2006-12-01', 'male', '43cefd5b354b52ed4a6ded2a8e666dd60eb329eebbb3dbb7280663dc74cd3c1a', '2022-02-18 11:05:10'),
(5, 'Essoh', 'Jean Penuel', 'assets/image/posts/IMG-621e1ef82f76c8.88230671.png', '', 'essoh@gmail.com', '2004-03-21', 'male', 'essoh', '2022-03-01 13:26:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friends_email` (`friends_email`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `request_email` (`request_email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_POST_COMMENT` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `FK_FRIEND_EMAIL` FOREIGN KEY (`friends_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_POST_LIKE` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_LIKE` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_USER_POST` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `FK_REQUEST_FRIEND_EMAIL` FOREIGN KEY (`request_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_REQUEST_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
