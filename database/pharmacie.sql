-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 juil. 2022 à 22:08
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE `medicaments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`id`, `name`) VALUES
(1, 'DOLIPRANE'),
(2, 'EFFERALGAN'),
(3, 'DAFALGAN'),
(4, 'SPASFON');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `title`, `content`, `address`, `tel`) VALUES
(1, 'Pharmacie Pessac Modifié', 'La nouvelle pharmacie de Pessac est enfin ouverte au grand public.', '105 rue du grand parc', '0789584520'),
(2, 'Pharmacie Talence', 'La nouvelle pharmacie de Talence est enfin ouverte au grand public.', '3 rue de la forêt', '0650403020'),
(12, 'Pharmacie du Grand Parc', 'Très jolie pharmacie', '3 rue de la forêt', '0650403020'),
(13, 'Exemple de Pharmacie à supprimer', 'Pharmacie de test', '5 avenue des platanes', '0650403020'),
(14, 'Pharmacie de Bègles', 'Pharmacie courtoise et bourgeoise. ', '30 route de la fauconnière', '0545857485');

-- --------------------------------------------------------

--
-- Structure de la table `phar_med`
--

CREATE TABLE `phar_med` (
  `id` int(11) NOT NULL,
  `pharmacie_id` int(11) DEFAULT NULL,
  `medicament_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `phar_med`
--

INSERT INTO `phar_med` (`id`, `pharmacie_id`, `medicament_id`) VALUES
(1, 1, 3),
(65, 13, 4),
(66, 13, 3),
(67, 13, 2),
(68, 14, 4),
(69, 14, 3),
(70, 14, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'admin', '$2y$10$xkUxUQBTUrwBwFuLJozBVukudtoTFILGr3hkuXvWyQ08uZylKTycu', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phar_med`
--
ALTER TABLE `phar_med`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`pharmacie_id`),
  ADD KEY `tag_id` (`medicament_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `phar_med`
--
ALTER TABLE `phar_med`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `phar_med`
--
ALTER TABLE `phar_med`
  ADD CONSTRAINT `phar_med_ibfk_1` FOREIGN KEY (`pharmacie_id`) REFERENCES `pharmacies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phar_med_ibfk_2` FOREIGN KEY (`medicament_id`) REFERENCES `medicaments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
