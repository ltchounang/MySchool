-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- HÃ´te : localhost:3306
-- GÃ©nÃ©rÃ© le : Dim 22 mars 2020 Ã  10:42
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es : `id12990171_db_myschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `idEtablissement` bigint(20) UNSIGNED NOT NULL,
  `nomEtablissement` varchar(64) NOT NULL,
  `typeEtab` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- DÃ©chargement des donnÃ©es de la table `etablissement`
--

INSERT INTO `etablissement` (`idEtablissement`, `nomEtablissement`, `typeEtab`) VALUES
(9, 'premiere ecole', 'ecole'),
(10, 'iut montreuil', 'entreprise'),
(11, 'mais bien venue enfin', 'entreprise'),
(12, 'ca y est ', 'entreprise'),
(13, 'zefdsfsdfq', 'entreprise'),
(14, 'je me presente', 'ecole'),
(15, 'iut montreuil', 'ecole'),
(16, 'CNAM3', 'ecole'),
(17, 'iut montreuil', 'ecole'),
(18, 'Renault', 'entreprise');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtud` bigint(20) UNSIGNED NOT NULL,
  `numApogee` int(128) DEFAULT NULL,
  `photoEtud` varchar(128) DEFAULT NULL,
  `nomEtud` varchar(64) NOT NULL,
  `prenomEtud` varchar(64) NOT NULL,
  `dateNaiss` date DEFAULT NULL,
  `courriel` varchar(128) DEFAULT NULL,
  `telEtud` int(64) DEFAULT NULL,
  `adr1` varchar(256) DEFAULT NULL,
  `adr2` varchar(256) DEFAULT NULL,
  `anneePromotion` varchar(64) DEFAULT NULL,
  `situationActuelle` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- DÃ©chargement des donnÃ©es de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtud`, `numApogee`, `photoEtud`, `nomEtud`, `prenomEtud`, `dateNaiss`, `courriel`, `telEtud`, `adr1`, `adr2`, `anneePromotion`, `situationActuelle`) VALUES
(60, 12, NULL, 'tv', 'junior', '2000-03-10', 'juniortv@gmail.com', 645893265, '210 rue la boissiÃ¨re', '', '2010-2020', ''),
(55, 0, NULL, 'Dj', 'Loris', '0000-00-00', '', 0, '', '', '', ''),
(59, 0, 'mod_etudiant/photos/1937.png', 't', 'Test', '0000-00-00', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `former`
--

CREATE TABLE `former` (
  `idEtablissement` bigint(20) NOT NULL,
  `idEtud` bigint(20) NOT NULL,
  `typeFormation` varchar(256) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- DÃ©chargement des donnÃ©es de la table `former`
--

INSERT INTO `former` (`idEtablissement`, `idEtud`, `typeFormation`, `dateDebut`, `dateFin`) VALUES
(18, 60, 'Aprentissage', '2020-03-03', '0000-00-00'),
(17, 55, '', '0000-00-00', '0000-00-00'),
(0, 52, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `idResp` bigint(20) UNSIGNED NOT NULL,
  `identifiant` varchar(64) NOT NULL,
  `motDePasse` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- DÃ©chargement des donnÃ©es de la table `responsable`
--

INSERT INTO `responsable` (`idResp`, `identifiant`, `motDePasse`) VALUES
(1, 'responsable', '$2y$10$js3qTAQEajAECf3IXcw6weQVSpKDXBsT210T2i8VJS/tguf72gkp6'),
(2, 'admin', '$2y$10$mAPGa9BSXVXFdRn2bTDk8O0tAbSFnr4fnWIaZuI9dS/iDa9kd8hl2'),
(3, 'admin', '$2y$10$5M9gwxeDma6/gH5dBwXsD.oX6mASrUlpU/mrK14453Mpz87OKrjAm'),
(4, 'Yanis', '$2y$10$aEgX5U5IKnKUsHykd1.gWeulndwdh2NaQvyV2cG8S2XV0vlpMW/wq'),
(5, 'Yanis2', ''),
(6, 'b', '$2y$10$arRGYOQsGEMZcSckhrVVX.c7E9asRm9LTKhvaKyP.SY4M5rEslISK'),
(7, 'bb', '$2y$10$18G864h1pBfsZ2w8mz6G4.CxvdIZ3ZpwX9XXUG/Ws2sRzSSS5.pOi');

--
-- Index pour les tables dÃ©chargÃ©es
--

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`idEtablissement`),
  ADD UNIQUE KEY `idEtablissement` (`idEtablissement`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtud`),
  ADD UNIQUE KEY `idEtud` (`idEtud`);

--
-- Index pour la table `former`
--
ALTER TABLE `former`
  ADD PRIMARY KEY (`idEtablissement`,`idEtud`),
  ADD KEY `former_etablissement_FK` (`idEtablissement`) USING BTREE,
  ADD KEY `former_etudiant_FK` (`idEtud`) USING BTREE;

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`idResp`),
  ADD UNIQUE KEY `idResp` (`idResp`);

--
-- AUTO_INCREMENT pour les tables dÃ©chargÃ©es
--

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `idEtablissement` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtud` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `idResp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
