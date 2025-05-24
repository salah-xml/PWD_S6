-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 mai 2025 à 18:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gab`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `crn_horaire` varchar(255) NOT NULL,
  `type_absence` varchar(255) NOT NULL,
  `is_old` tinyint(1) NOT NULL DEFAULT 0,
  `module` varchar(255) DEFAULT NULL,
  `professeur` int(11) DEFAULT NULL,
  `date_absence` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `id_etudiant`, `crn_horaire`, `type_absence`, `is_old`, `module`, `professeur`, `date_absence`) VALUES
(25, 3, '15-17', 'Absence non-justifiée', 0, 'IHM', 14, '6666-06-06'),
(26, 5, '10-12', 'Absence justifiée', 0, 'modelisation', 14, '9979-05-05'),
(27, 4, '17-19', 'Absence justifiée', 1, 'programmation web dynamique', 14, '3432-06-26'),
(28, 6, '13-15', 'Absence justifiée', 0, 'IHM', 14, '0005-03-05');

-- --------------------------------------------------------

--
-- Structure de la table `element_module`
--

CREATE TABLE `element_module` (
  `id` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `proportion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `cne` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` text DEFAULT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `id_user`, `cin`, `nom`, `cne`, `prenom`, `date_naissance`, `adresse`, `lieu_naissance`, `telephone`, `email`) VALUES
(3, 10, '123456789', 'el-attaoui', '222222222', 'fatima', '2017-05-17', 'adress rue appart', 'lieu de naissance', '0655555555', 'fatima@gmail.com'),
(4, 11, 'ss', 'malika', 'ss', 'malika', '2018-02-02', 'ss', 'ss', NULL, 'malika@ss'),
(5, 12, '2662', 'Ketlas', '2525', 'Abdelali', '2004-03-01', 'U\r\nOuarzazate', 'gsfbs', '0654074509', 'Ali.katalas1234@gmail.com'),
(6, 15, '55353535', 'daoud ', 'd131729917', 'salahEddine', '0013-12-31', 'U\r\nOuarzazate', 'zagora', '0655555555', 'salaheddinedaoud@gmail.com'),
(7, 16, '635547476', 'boulaazafar', '47473ed7', 'abdelali', '0000-00-00', 'مركز تمكروت زاكورة', 'zagora', '069999999', 'abdelaliboulaazafar@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `nom_module` varchar(255) NOT NULL,
  `nature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `nom_module`, `nature`) VALUES
(2, 'programmation web dynamique', ''),
(3, 'IHM', ''),
(4, 'geni logiciel', ''),
(5, 'modelisation', '');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `som` int(7) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `id_user`, `som`, `nom`, `prenom`, `email`, `telephone`) VALUES
(1, 7, 7777777, 'Yacine', 'Lyounssi', 'yacine@gmail.com', '0666552288'),
(2, 13, 1111111, 'Ketlas', 'Abdelali', 'Ali.katalas1234@gmail.com', '0654074509'),
(3, 14, 1111111, 'Ketlas', 'Abdelali', 'Ali.katalas1234@gmail.com', '0654074509');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT 'etudiant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `type`) VALUES
(12, 'kv', 'bwb', 'etudiant'),
(13, 'kv', 'bwb', 'professeur'),
(14, 'ali', '123', 'professeur'),
(15, 'salah', '123', 'etudiant'),
(16, 'bx', '123', 'etudiant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `element_module`
--
ALTER TABLE `element_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module` (`module`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `element_module`
--
ALTER TABLE `element_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
