-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 juil. 2024 à 19:25
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
-- Base de données : `essec_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `centres`
--

CREATE TABLE `centres` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `centres`
--

INSERT INTO `centres` (`id`, `nom`, `active`) VALUES
(1, 'Douala', 1),
(2, 'Yaoundé', 1),
(3, 'Bafoussam', 1),
(4, 'Garoua', 1),
(5, 'Bamenda', 0),
(6, 'Ebolowa', 0),
(7, 'Bertoua', 0),
(8, 'Ngaoundéré', 0),
(9, 'Buea', 1),
(10, 'Maroua', 0);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` varchar(12) NOT NULL,
  `annuler` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `config`
--

INSERT INTO `config` (`id`, `annuler`) VALUES
('10/10/2024', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE `cursus` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `groupe` varchar(20) DEFAULT NULL,
  `fullname` varchar(60) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `cursus`
--

INSERT INTO `cursus` (`id`, `code`, `groupe`, `fullname`, `active`) VALUES
(1, 'ESC-L1', 'FIC', 'LICENCE 1', 1),
(2, 'ESC-L3', 'FIC', 'LICENCE 3', 1),
(3, 'ESC-M', 'FIC', 'Master professionnel - ESC Formation initiale continue', 0),
(4, 'EPA-M', 'FIC', 'Master professionnel - EPA formation initiale continue', 0),
(5, 'LIC-PRO', 'FCP', 'LICENCES PROFESSIONNELLES EN FORMATION CONTINUE ', 0),
(6, 'MAS-PRO', 'FCP', 'MASTERS PROFESSIONNELS EN FORMATION CONTINUE ', 0),
(7, 'MBA-1', 'FCMBA', 'MASTER OF BUSINESS ADMINISTRATION 1', 0),
(8, 'MBA-2', 'FCMBA', 'MASTER OF BUSINESS ADMINISTRATION 2', 0),
(9, 'EMBA-1', 'FCMBA', 'EXECUTIVE MASTER OF BUSINESS ADMINISTRATION 1', 0),
(10, 'EMBA-2', 'FCMBA', 'EXECUTIVE MASTER OF BUSINESS ADMINISTRATION 2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `code_cursus` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `code`, `fullname`, `code_cursus`, `active`) VALUES
(1, 'L1ESC', 'Gestion 1', 'ESC-L1', 1),
(2, 'L3ESC-MKT', 'Marketing', 'ESC-L3', 1),
(3, 'L3ESC-RH', 'Ressources Humaines et Relations Sociales', 'ESC-L3', 1),
(4, 'L3ESC-CFA', 'Comptabilité-Finance-Audit', 'ESC-L3', 1),
(5, 'L3ESC-CISC', 'Commerce International et Supply Chain', 'ESC-L3', 1),
(6, 'L3ESC-IEF', 'Ingénierie Economique et Financière', 'ESC-L3', 1),
(7, 'MESC-MKT', 'Marketing', 'ESC-M', 1),
(8, 'MESC-RHRS', 'Ressources Humaines et Relations Sociales', 'ESC-M', 1),
(9, 'MESC-FICO', 'Finance et Comptabilité ', 'ESC-M', 1),
(10, 'MESC-ACOG', 'Audit et Contrôle de Gestion', 'ESC-M', 1),
(11, 'MESC-CISC', 'Commerce International et Supply Chain Management', 'ESC-M', 1),
(12, 'MESC-IEF', 'Ingénierie Economique et Financière', 'ESC-M', 1),
(13, 'MESC-ISBA', 'Information System and Business Analytics ', 'ESC-M', 1),
(14, 'MEPA-POSE', 'Politique Sociale de l’Entreprise', 'EPA-M', 1),
(15, 'MEPA-ENT', 'Entrepreneuriat', 'EPA-M', 1),
(16, 'MEPA-FICO', 'Finance et comptabilité', 'EPA-M', 1),
(17, 'MEPA-VNC', 'Vente et Négociation Commerciale', 'EPA-M', 1),
(18, 'MEPA-COM', 'Communication d’Entreprise', 'EPA-M', 1),
(19, 'MEPA-AEP', 'Analyse et Evaluation des Projets', 'EPA-M', 1),
(20, 'MEPA-QHSE', 'Qualité Hygiène Sécurité Environnement', 'EPA-M', 1),
(21, 'MEPA-ISBA', 'Systèmes d’Information et Business analytics', 'EPA-M', 1),
(22, 'LPMDE', 'Marketing Digital et E-Commerce', 'LIC-PRO', 1),
(23, 'LPMSO', 'Marketing Stratégique et Opérationnel', 'LIC-PRO', 1),
(24, 'LPOM', 'Organisation et Management', 'LIC-PRO', 1),
(25, 'LPBA', 'Banque et Assurance', 'LIC-PRO', 1),
(26, 'LPLT', 'Logistique et Transport', 'LIC-PRO', 1),
(27, 'LPRH', 'Gestion des Ressources Humaines', 'LIC-PRO', 1),
(28, 'LPTSD', 'Traitement Statistiques & Big Data', 'LIC-PRO', 1),
(29, 'LPBDBD', 'Base de données et Big Data', 'LIC-PRO', 0),
(30, 'MPMDE', 'Marketing Digital et E-commerce', 'MAS-PRO', 1),
(31, 'MPMSO', 'Marketing Stratégique et Opérationnel', 'MAS-PRO', 1),
(32, 'MPGRC', 'Gestion de la Relation Client', 'MAS-PRO', 1),
(33, 'MPCC', 'Communication Commerciale', 'MAS-PRO', 1),
(34, 'MPSIBD', 'Mgt des Systèmes d’Informations et Big Data', 'MAS-PRO', 1),
(35, 'MPDLGCT', 'Dévelopm. Local et Gestion des Col. Territoriales', 'MAS-PRO', 0),
(38, 'MPQHSE', 'Qualité hygiène sécurité et environnement', 'MAS-PRO', 1),
(39, 'MPAEP', 'Analyse et Evaluation des Projets', 'MAS-PRO', 1),
(40, 'MPFICO', 'Finance et Comptabilité', 'MAS-PRO', 1),
(41, 'MPACOG', 'Audit et Contrôle de Gestion', 'MAS-PRO', 1),
(42, 'MPMF', 'Microfinance', 'MAS-PRO', 0),
(43, 'MPFISC', 'Fiscalité', 'MAS-PRO', 1),
(44, 'MPGRH', 'Gestion des ressources humaines ', 'MAS-PRO', 1),
(45, 'MPRSEDD', 'Responsabilité Sociétale et développement Durable', 'MAS-PRO', 0),
(81, 'LPOM', 'Organisation et Management', 'ESC-L3', 0),
(63, 'MO', 'Management des organisations', 'MBA-2', 1),
(64, 'GHR', 'Gestion des Ressources Humaines', 'MBA-2', 1),
(52, 'MPBA', 'Banque – Assurance', 'MAS-PRO', 1),
(53, 'MPFNMP', 'Finance et Négoce des matières premières', 'MAS-PRO', 1),
(66, 'MKT', 'Gestion Marketing', 'MBA-2', 1),
(67, 'PQ', 'Gestion de la production et de la qualité', 'MBA-2', 0),
(68, 'FICO', 'Gestion financière et Comptable', 'MBA-2', 1),
(69, 'ACOG', 'Audit et Contrôle de Gestion', 'MBA-2', 1),
(80, 'MBA1', 'Business Administration (tronc commun)', 'MBA-1', 1),
(65, 'CISC', 'Commerce International et Supply Chain', 'MBA-2', 1),
(62, 'MPCISC', 'Cce International et Supply Chain (gestion chaine logistique)', 'MAS-PRO', 1),
(72, 'EMBA-RSE', 'Executive MBA en RSE et développement durable', 'EMBA-1', 0),
(73, 'EMBA-BAW', 'Executive MBA en business awareness', 'EMBA-1', 0),
(74, 'EMBA-CNPPEC', 'Executive MBA en conception, négociation et pilotage des projets d’entreprises commerciales', 'EMBA-1', 0),
(75, 'EMBA-MSO', 'Executive MBA en management stratégique des organisations', 'EMBA-1', 1),
(76, 'EMBA-RSE2', 'Executive MBA en RSE et développement durable', 'EMBA-2', 0),
(77, 'EMBA-BAW2', 'Executive MBA en business awareness', 'EMBA-2', 0),
(78, 'EMBA-CNPPEC2', 'Executive MBA en conception, négociation et pilotage des projets d’entreprises commerciales', 'EMBA-2', 0),
(79, 'EMBA-MSO2', 'Executive MBA en management stratégique des organisations', 'EMBA-2', 1),
(89, 'LPCFA', 'Comptabilité Finance et Audit', 'LIC-PRO', 1),
(90, 'MPVCN', 'Master Professionnelle en Ventes et Négociations Commerciales', 'MAS-PRO', 0),
(91, 'QHSE', 'Gestion Qualité Hygiène Sécurité Environnement', 'MBA-2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `annee` varchar(6) NOT NULL DEFAULT '',
  `centre_exam` varchar(20) NOT NULL,
  `filiere` varchar(250) NOT NULL,
  `niveau` varchar(10) DEFAULT NULL,
  `mode_formation` varchar(40) DEFAULT NULL,
  `etablissement` varchar(20) NOT NULL DEFAULT 'essec (Dla)',
  `etablissement2` varchar(255) DEFAULT NULL,
  `etablissement3` varchar(255) DEFAULT NULL,
  `choix1` varchar(255) DEFAULT NULL,
  `choix2` varchar(255) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `date_n` varchar(15) NOT NULL,
  `lieu_n` varchar(100) NOT NULL,
  `civilite` varchar(15) NOT NULL,
  `matrimonial` varchar(255) DEFAULT NULL,
  `pays` varchar(30) NOT NULL,
  `region` varchar(10) NOT NULL,
  `departement` varchar(20) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `langue` varchar(15) DEFAULT NULL,
  `handicap` varchar(5) NOT NULL,
  `worker` varchar(250) NOT NULL,
  `profession` varchar(250) DEFAULT NULL,
  `diplome` varchar(150) NOT NULL,
  `etat_diplom` varchar(10) NOT NULL,
  `serie` varchar(30) DEFAULT NULL,
  `moyenne` varchar(10) DEFAULT NULL,
  `mention` varchar(30) DEFAULT NULL,
  `diplom_lieu_obt` varchar(100) DEFAULT NULL,
  `diplom_an_obt` varchar(20) DEFAULT NULL,
  `father` varchar(100) DEFAULT NULL,
  `father_work` varchar(100) DEFAULT NULL,
  `father_contact` varchar(100) DEFAULT NULL,
  `mother` varchar(100) DEFAULT NULL,
  `mother_work` varchar(100) DEFAULT NULL,
  `mother_contact` varchar(100) DEFAULT NULL,
  `parcours_pro1` varchar(300) DEFAULT NULL,
  `parcours_pro2` varchar(300) DEFAULT NULL,
  `parcours_pro3` varchar(300) DEFAULT NULL,
  `parcours_acad1` varchar(300) DEFAULT NULL,
  `parcours_acad2` varchar(300) DEFAULT NULL,
  `parcours_acad3` varchar(300) DEFAULT NULL,
  `parcours_acad4` varchar(300) DEFAULT NULL,
  `transID` varchar(10) DEFAULT NULL,
  `creation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'danielbaleba@gmail.com', '$2y$10$t18wkZBsRNYwiq2Avk5f/eBmUBAfcWB7u/EUd.HdH4RNm1QtfeDZS'),
(2, 'danielbaleba@gmail.com', '$2y$10$BGc4dZ8E5m1wg1VkAa0W3.w2zXd5xTWY6nRS6KoRxEtdsYJD87m92'),
(3, 'tamokwe@yahoo.fr', '$2y$10$/4XgftFWDumJvPcOmun2w.3hqDYd3Xpvzk6FDqMk5Uy.kIOc/baO.'),
(4, 'ibrahimadoc@yahoo.fr', '$2y$10$v20Cdkx.Yal13W1HM8Acge/GwZgl68aopW3j94utsfHHU2Hq9VG1S'),
(5, 'admin@gmail.com', '$2y$10$qqMuOxhadeMrHn6nKPvtquoLPvm6GtzzZSjQ4Juk1O53Z1a1tPu4W'),
(6, 'tamokwe@gmail.com', '$2y$10$v1fHaycyTwDYdmPAISAAKeKSUKC6XOvcCOuCvu6G4xHcC45oNv/cy'),
(7, 'altantebiboum@gmail.com', '$2y$10$CEiVOCxh0YlIjcYn8lx.LO2ldAgHU8FrjLfq9taNNirGm1SqsTgxm'),
(8, 'nelson@gmail.com', '$2y$10$xHGWK1oKnW35vP2Yd0cUrOv7E21smstlNyMaWeosdkacNG4AjHhxy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `cursus`
--
ALTER TABLE `cursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
