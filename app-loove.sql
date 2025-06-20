-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 20 juin 2025 à 09:55
-- Version du serveur : 8.0.42-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app-loove`
--

-- --------------------------------------------------------

--
-- Structure de la table `crush`
--

CREATE TABLE `crush` (
  `id` int NOT NULL,
  `id_liker` int NOT NULL,
  `id_liked` int NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `crush`
--

INSERT INTO `crush` (`id`, `id_liker`, `id_liked`, `date`) VALUES
(55, 27, 29, '2025-06-18 15:13:00'),
(56, 29, 27, '2025-06-18 15:13:35'),
(57, 33, 29, '2025-06-19 11:06:18'),
(58, 29, 33, '2025-06-19 11:10:19');

-- --------------------------------------------------------

--
-- Structure de la table `film_genres`
--

CREATE TABLE `film_genres` (
  `movie_id` int NOT NULL,
  `genres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film_genres`
--

INSERT INTO `film_genres` (`movie_id`, `genres`) VALUES
(105, '[\"Aventure\",\"Com\\u00e9die\",\"Science-Fiction\"]'),
(329, '[\"Aventure\",\"Science-Fiction\"]'),
(601, '[\"Science-Fiction\",\"Aventure\",\"Familial\",\"Fantastique\"]'),
(2899, '[\"Familial\",\"Fantastique\",\"Com\\u00e9die\",\"Aventure\"]'),
(4256, '[\"Com\\u00e9die\"]'),
(6977, '[\"Crime\",\"Drame\",\"Thriller\"]'),
(10020, '[\"Romance\",\"Familial\",\"Animation\",\"Fantastique\"]'),
(12155, '[\"Familial\",\"Fantastique\",\"Aventure\"]'),
(151960, '[\"Animation\",\"Familial\",\"Aventure\",\"Com\\u00e9die\"]'),
(157336, '[\"Aventure\",\"Drame\",\"Science-Fiction\"]'),
(346364, '[\"Horreur\",\"Thriller\"]'),
(396535, '[\"Horreur\",\"Thriller\",\"Action\",\"Aventure\"]'),
(467673, '[\"Com\\u00e9die\"]'),
(559969, '[\"Crime\",\"Drame\",\"Thriller\"]'),
(1045781, '[\"Drame\",\"Histoire\"]'),
(1100988, '[\"Horreur\",\"Thriller\",\"Science-Fiction\"]');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `content` text NOT NULL,
  `sent_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `sent_at`) VALUES
(16, 27, 29, 'Bonjour', '2025-06-18 19:21:36'),
(17, 29, 27, 'Je t\'aime pas, je me suis fait report à cause de toit, sale caca!', '2025-06-19 15:10:49'),
(18, 29, 33, 'J\'adore les glass effect', '2025-06-19 15:11:18'),
(19, 33, 29, 'T\'es cringe', '2025-06-19 15:13:32');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` int NOT NULL,
  `os` int NOT NULL,
  `bio` text NOT NULL,
  `img` text NOT NULL,
  `movie_id_1` int NOT NULL,
  `movie_id_2` int NOT NULL,
  `movie_id_3` int NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `user_name`, `age`, `name`, `prenom`, `sexe`, `os`, `bio`, `img`, `movie_id_1`, `movie_id_2`, `movie_id_3`, `city`) VALUES
(27, 'z', 45, 'Scott ', 'Zenya', 1, 0, 'Bonjour !', '/uploads/1750155082_terr.jpeg', 105, 329, 4256, '0'),
(28, 'e', 26, 'Khant', 'Emanuel', 0, 2, 'J\'aime bien le chocolat', '/uploads/1750155164_ffff.jpeg', 601, 6977, 467673, '0'),
(29, 'r', 29, 'Matt', 'Raphael', 0, 0, 'Vous êtes team chien ou chat ?', '/uploads/1750338736_ffff.jpeg', 10020, 396535, 1100988, '0'),
(30, 't', 21, 'Marchant', 'Théo', 0, 1, 'Grand fan d\'aviation !', '/uploads/1750155547_srestdf.jpeg', 151960, 105, 559969, '0'),
(32, 'y', 44, 'Bout', 'Yveline', 1, 0, 'oui', '/uploads/1750182302_Rouge Résumé Ingénieur Logiciel CV (2)_page-0001.jpg', 105, 1100988, 1045781, '0'),
(33, 'manille', 55, 'CSS Queen', 'Manille', 1, 0, 'love front', '/uploads/1750338283_Bongos.webp', 346364, 2899, 157336, '0');

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE `report` (
  `id` int NOT NULL,
  `usernam_rep` varchar(50) NOT NULL,
  `mes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `Acc_priv` tinyint(1) NOT NULL,
  `Pic_priv` tinyint(1) NOT NULL,
  `Real_name` tinyint(1) NOT NULL,
  `id_profil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `Acc_priv`, `Pic_priv`, `Real_name`, `id_profil`) VALUES
(14, 0, 0, 0, 35),
(15, 0, 0, 0, 36),
(16, 0, 0, 0, 37),
(17, 0, 0, 0, 38),
(18, 0, 0, 0, 39),
(20, 0, 0, 0, 41),
(21, 0, 1, 1, 42);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `prem` tinyint(1) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prem`, `username`, `password`, `enabled`, `admin`) VALUES
(35, 0, 'a', '$2y$10$jDmLTbOFYxxuwAUG2d0SjeoWKsEQDg5TBk/e725lmn73aweLCJNiq', 1, 1),
(36, 0, 'z', '$2y$10$aY/vY/T6TEu2XmacRGoEiucu1C.xEynL/ifWgCbF80x29DgEwchDC', 1, 0),
(37, 0, 'e', '$2y$10$QrHV9KVFeD95XYapzXAtS.7QWPvnT9luabUlAMcnMVb5x3r8FX71i', 1, 0),
(38, 0, 'r', '$2y$10$GXQcVj.ZIGMujzXdF4STuut/AspxqhLceshxYutcG3lq46eAm4bA.', 0, 0),
(39, 0, 't', '$2y$10$IIxevsVshDZ5dIq/zkTt2OSy/Z3jJUGGOvJm703hvnpnCEcDBon1S', 1, 0),
(41, 0, 'y', '$2y$10$odrXLNKMfCIC1R2UmXNNluirLi29D6hZYvwPO7GtWdb3/Fn3Y7DI.', 1, 0),
(42, 0, 'manille', '$2y$10$bJi57xxNVyoxLZnOHYr.2edSA9tdSAkXIxuNqraDWCv0bbaa40MVm', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `crush`
--
ALTER TABLE `crush`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film_genres`
--
ALTER TABLE `film_genres`
  ADD PRIMARY KEY (`movie_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `crush`
--
ALTER TABLE `crush`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `report`
--
ALTER TABLE `report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
