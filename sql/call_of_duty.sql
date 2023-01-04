-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 04 jan. 2023 à 17:41
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `call_of_duty`
--
CREATE DATABASE IF NOT EXISTS `call_of_duty` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `call_of_duty`;

-- --------------------------------------------------------

--
-- Structure de la table `arme`
--

CREATE TABLE `arme` (
  `id_arme` int(255) NOT NULL,
  `Nom` int(30) NOT NULL,
  `Rechargement` int(50) NOT NULL,
  `Penetration` int(30) NOT NULL,
  `Cadence` int(50) NOT NULL,
  `Temps de Viser` int(50) NOT NULL,
  `Chargeur` int(50) NOT NULL,
  `Photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(255) NOT NULL,
  `Fusil d'Assaut` varchar(30) NOT NULL,
  `Pistolet Mitrailleur` varchar(30) NOT NULL,
  `Mitrailleuse` varchar(30) NOT NULL,
  `Fusil Tactique` varchar(30) NOT NULL,
  `Fusil de Précision` varchar(30) NOT NULL,
  `Lanceur` varchar(30) NOT NULL,
  `Fusil à Pompe` varchar(30) NOT NULL,
  `Arme Blanche` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(255) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `objet` varchar(35) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(255) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `pseudo`, `mail`, `mobile`, `mdp`, `admin`) VALUES
(1, 'Monteiro', 'Sleyter', 'sleyter92k', 'sleytermonteiro92@protonmail.com', 699746092, '$2y$10$TMhSVs5ctK2WZgYENowHyO7ckb9JKD4OH5474FtX.IDh6oNoJWKYS', 0),
(4, 'Faridi', 'Myriam', 'thegentleslayer', 'mg@gmail.com', 678877887, '$2y$10$kdk5jb51IbS6Lm/oy4u/8.fHpOIvY9CF36WCpGGmRNQ4X2Rf1lVEe', 0),
(5, 'fournier', 'ludovic', 'ludo', 'ludo@prontonmail.com', 60000000, '$2y$10$9qE5DYQb3fG.EG9t6v/1Tegm2U2DNpvmi5qHc6bo0Y.5.9yWMmjNS', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arme`
--
ALTER TABLE `arme`
  ADD PRIMARY KEY (`id_arme`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arme`
--
ALTER TABLE `arme`
  MODIFY `id_arme` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
