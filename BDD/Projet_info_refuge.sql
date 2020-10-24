-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 08 juil. 2020 à 17:12
-- Version du serveur :  8.0.20-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Projet_info_refuge`
--
CREATE DATABASE IF NOT EXISTS `Projet_info_refuge` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Projet_info_refuge`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` bigint UNSIGNED NOT NULL,
  `titre_article` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contenu_article` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_event` date DEFAULT NULL,
  `date_post_article` date DEFAULT NULL,
  `id_cat` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` bigint UNSIGNED NOT NULL,
  `nom_cat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Evenement | Nouvelle de l’assoc | Nouvelle des chats'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(1, 'Éventements'),
(2, 'Nouvelles de l\'association'),
(3, 'Nouvelles des chats'),
(4, 'Le refuge'),
(5, 'Notre mission'),
(6, 'Règles'),
(7, 'Lutte contre la prolifération'),
(8, 'Adoption'),
(9, 'Livre d\'or'),
(10, 'Lien externe'),
(11, 'Contact');

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE `chats` (
  `id_chat` bigint UNSIGNED NOT NULL,
  `nom_chat` varchar(255) NOT NULL,
  `naissance_chat` date DEFAULT NULL,
  `sexe_chat` int NOT NULL COMMENT '1 = Femelle | 2 = Male',
  `description_chat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_chat_perdu` bigint UNSIGNED NOT NULL,
  `id_com` bigint UNSIGNED NOT NULL,
  `id_com_parent` bigint UNSIGNED DEFAULT NULL,
  `contenu_com` text NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_img` bigint UNSIGNED NOT NULL,
  `nom_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_img`, `nom_img`) VALUES
(1, '_Logo.png'),
(2, '_chat_img.jpg'),
(3, '_texte_trouve.png'),
(4, 'Prolifération1.jpg'),
(5, 'Sterilisation1.jpg'),
(6, 'Gang_de_chat.png'),
(7, 'vide-grenier-bis-site.jpg'),
(8, 'vente-ete-bis-site.jpg'),
(9, 'polymix-don-bis-site.jpg'),
(10, 'marche-de-noel-2019-bis-site.jpg'),
(11, 'comment-suaver-100-chats-site.jpg'),
(12, 'chats-errants-site.jpg'),
(13, 'Prolifération2.jpg'),
(14, 'affiche-poesie-site-bis.jpg'),
(15, 'Nourissage_chat_errant.jpg'),
(16, 'Alice.jpg'),
(17, 'Arthur.jpg'),
(18, 'Chatons_16_juin.jpg'),
(19, 'chatons-site_v3.jpg'),
(20, 'Chat_bozonnzt.jpg'),
(21, 'chats-du-doubs.jpg'),
(22, 'Chaussette.jpg'),
(23, 'clochette-et-rosette.jpg'),
(24, 'damme_blanche.jpg'),
(25, 'figaro-et-simba.jpg'),
(26, 'hermine.jpg'),
(27, 'bebe_roux.jpg'),
(28, 'bebe_blanc.jpg'),
(29, 'bebe_ecaille.jpg'),
(30, 'kalia.jpg'),
(31, 'lilou.jpg'),
(32, 'miko.jpg'),
(33, 'mutzala.jpg'),
(34, 'nala.jpg'),
(35, 'odeon-et-sherif.jpg'),
(36, 'refuge1.jpg'),
(37, 'refuge2.jpg'),
(38, 'refuge3.jpg'),
(39, 'Refuge4.jpg'),
(40, 'loulou_adopte.jpg'),
(41, 'hermine_adopte.jpg'),
(42, 'chemin-prive-site.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `perdu`
--

CREATE TABLE `perdu` (
  `id_chat_pt` bigint UNSIGNED NOT NULL,
  `nom_chat_pt` varchar(255) NOT NULL,
  `img_chat_pt` varchar(255) NOT NULL DEFAULT '_chat_img.jpg',
  `description_chat_pt` text NOT NULL,
  `date_chat_pt` datetime NOT NULL,
  `date_post_pt` date NOT NULL,
  `perdu_trouve` tinyint(1) NOT NULL COMMENT 'true = perdu | false = trouvé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nom_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mail_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_user` text,
  `mdp_user` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rang_user` int NOT NULL DEFAULT '3' COMMENT '1 = admin | 2 = bénévole | 3= membre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `phone_user`, `mdp_user`, `rang_user`) VALUES
(1, 'REMOND', 'Sven', 'sven.remond.sti2@gmail.com', '', '$2y$10$MJGKKjr307jpx8U0cKbWtuy5/xBTr7rBGUKFOp3sosNToPNLPQPUe', 1),
(2, 'CECERE', 'Sven', 'sven@gmail.com', '', '$2y$10$3IPOA4qeuBd5mgFGyGoq/eYgwpXFDx8WclbVkuTDgLuRQ6V5NTanq', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chat`) USING BTREE,
  ADD UNIQUE KEY `id_chat` (`id_chat`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_com` (`id_com`),
  ADD KEY `id_com_parent` (`id_com_parent`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_chat` (`id_chat_perdu`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `perdu`
--
ALTER TABLE `perdu`
  ADD PRIMARY KEY (`id_chat_pt`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chat` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_com` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_img` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `perdu`
--
ALTER TABLE `perdu`
  MODIFY `id_chat_pt` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_3` FOREIGN KEY (`id_com_parent`) REFERENCES `commentaires` (`id_com`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_4` FOREIGN KEY (`id_chat_perdu`) REFERENCES `perdu` (`id_chat_pt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
