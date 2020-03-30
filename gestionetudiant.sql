-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 30 mars 2020 à 07:09
-- Version du serveur :  8.0.17
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionetudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `apparteniraugroupe`
--

CREATE TABLE `apparteniraugroupe` (
  `idGroupe` int(11) NOT NULL,
  `idEtud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `idEtablissement` int(11) NOT NULL,
  `nomEtablissement` varchar(64) NOT NULL,
  `typeEtab` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`idEtablissement`, `nomEtablissement`, `typeEtab`) VALUES
(5, 'olympe de gouges', 'entreprise'),
(8, 'iut montreuil', 'ecole');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtud` int(11) NOT NULL,
  `numApogee` int(11) NOT NULL,
  `photoEtud` varchar(100) DEFAULT NULL,
  `nomEtud` varchar(64) NOT NULL,
  `prenomEtud` varchar(64) NOT NULL,
  `dateNaiss` varchar(64) DEFAULT NULL,
  `courriel` varchar(64) DEFAULT NULL,
  `telEtud` int(11) DEFAULT NULL,
  `adr1` varchar(100) DEFAULT NULL,
  `adr2` varchar(100) DEFAULT NULL,
  `anneePromotion` varchar(100) DEFAULT NULL,
  `situationActuelle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtud`, `numApogee`, `photoEtud`, `nomEtud`, `prenomEtud`, `dateNaiss`, `courriel`, `telEtud`, `adr1`, `adr2`, `anneePromotion`, `situationActuelle`) VALUES
(5, 0, NULL, 'djanwou', 'loris', '0000-00-00', '', 0, 'yes la premiere a droite', 'cdcdcd', '', 'vfvfvfv');

-- --------------------------------------------------------

--
-- Structure de la table `former`
--

CREATE TABLE `former` (
  `idEtablissement` int(11) NOT NULL,
  `idEtud` int(11) NOT NULL,
  `infoFormation` varchar(100) NOT NULL,
  `dateDebut` varchar(100) NOT NULL,
  `dateFin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `idResp` int(11) NOT NULL,
  `identifiant` varchar(32) NOT NULL,
  `motDePasse` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`idResp`, `identifiant`, `motDePasse`) VALUES
(1, 'responsable', '$2y$10$xVWCqdgEsI33b94AnE4MdO1gCNBPP2dvM.ggpyu9VYgncgoKp2wIS'),
(2, 'admin', '$2y$10$jVxDNqsYZvqAzJVG5iky7e02JlVQXQXT0qiJgQusE2wxaTlWJZtsC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apparteniraugroupe`
--
ALTER TABLE `apparteniraugroupe`
  ADD PRIMARY KEY (`idGroupe`,`idEtud`),
  ADD KEY `appartenirAuGroupe_etudiant0_FK` (`idEtud`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`idEtablissement`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtud`);

--
-- Index pour la table `former`
--
ALTER TABLE `former`
  ADD PRIMARY KEY (`idEtablissement`,`idEtud`),
  ADD KEY `former_etudiant0_FK` (`idEtud`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`idResp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `idEtablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `idResp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apparteniraugroupe`
--
ALTER TABLE `apparteniraugroupe`
  ADD CONSTRAINT `appartenirAuGroupe_etudiant0_FK` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtud`),
  ADD CONSTRAINT `appartenirAuGroupe_groupe_FK` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);

--
-- Contraintes pour la table `former`
--
ALTER TABLE `former`
  ADD CONSTRAINT `former_etablissement_FK` FOREIGN KEY (`idEtablissement`) REFERENCES `etablissement` (`idEtablissement`),
  ADD CONSTRAINT `former_etudiant0_FK` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtud`);
COMMIT;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, RELOAD, SHUTDOWN, PROCESS, FILE, REFERENCES, INDEX, ALTER, SHOW DATABASES, SUPER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, REPLICATION SLAVE, REPLICATION CLIENT, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, CREATE USER, EVENT, TRIGGER, CREATE TABLESPACE, CREATE ROLE, DROP ROLE ON *.* TO `user`@`%` WITH GRANT OPTION;

GRANT APPLICATION_PASSWORD_ADMIN,AUDIT_ADMIN,BACKUP_ADMIN,BINLOG_ADMIN,BINLOG_ENCRYPTION_ADMIN,CLONE_ADMIN,CONNECTION_ADMIN,ENCRYPTION_KEY_ADMIN,GROUP_REPLICATION_ADMIN,INNODB_REDO_LOG_ARCHIVE,PERSIST_RO_VARIABLES_ADMIN,REPLICATION_SLAVE_ADMIN,RESOURCE_GROUP_ADMIN,RESOURCE_GROUP_USER,ROLE_ADMIN,SERVICE_CONNECTION_ADMIN,SESSION_VARIABLES_ADMIN,SET_USER_ID,SYSTEM_USER,SYSTEM_VARIABLES_ADMIN,TABLE_ENCRYPTION_ADMIN,XA_RECOVER_ADMIN ON *.* TO `user`@`%` WITH GRANT OPTION;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
