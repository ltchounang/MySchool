-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2020 at 09:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14


--
-- Database: `gestionetudiant`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparteniraugroupe`
--

DROP TABLE IF EXISTS `apparteniraugroupe`;
CREATE TABLE IF NOT EXISTS `apparteniraugroupe` (
  `idEtud` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`idEtud`,`idGroupe`),
  KEY `appartenirAuGroupe_groupe0_FK` (`idGroupe`)
);

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `idEtablissement` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtablissement` varchar(64) NOT NULL,
  `typeEtab` varchar(100) NOT NULL,
  PRIMARY KEY (`idEtablissement`)
);

--
-- Dumping data for table `etablissement`
--

INSERT INTO `etablissement` (`idEtablissement`, `nomEtablissement`, `typeEtab`) VALUES
(9, 'premiere ecole', 'ecole'),
(10, 'iut montreuil', 'entreprise'),
(11, 'mais bien venue enfin', 'entreprise');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtud` int(11) NOT NULL AUTO_INCREMENT,
  `numApogee` int(11) DEFAULT NULL,
  `photoEtud` varchar(100) DEFAULT NULL,
  `nomEtud` varchar(64) NOT NULL,
  `prenomEtud` varchar(64) NOT NULL,
  `dateNaiss` varchar(32) DEFAULT NULL,
  `courriel` varchar(64) DEFAULT NULL,
  `telEtud` int(11) DEFAULT NULL,
  `adr1` varchar(100) DEFAULT NULL,
  `adr2` varchar(100) DEFAULT NULL,
  `anneePromotion` varchar(100) DEFAULT NULL,
  `situationActuelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEtud`)
);

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`idEtud`, `numApogee`, `photoEtud`, `nomEtud`, `prenomEtud`, `dateNaiss`, `courriel`, `telEtud`, `adr1`, `adr2`, `anneePromotion`, `situationActuelle`) VALUES
(424, 24138, NULL, 'AYADI 5', 'GUILLAUME', '36195', 'a.a2001@iut.univ-paris8.fr', 600000035, '49 RUE CORONA', '', '2019-2020', ''),
(422, 24136, NULL, 'AYADI 21', 'MYLENE', '36193', 'a.a2001@iut.univ-paris8.fr', 600000033, '47 RUE CORONA', '', '2019-2020', ''),
(423, 24137, NULL, 'AYADI 29', 'ABDELOUAHAB', '36194', 'a.a2001@iut.univ-paris8.fr', 600000034, '48 RUE CORONA', '', '2019-2020', ''),
(420, 24134, NULL, 'AYADI 22', 'ALEXANDRE', '36191', 'a.a2001@iut.univ-paris8.fr', 600000031, '45 RUE CORONA', '', '2017-2018', ''),
(421, 24135, NULL, 'AYADI 7', 'ROBIN', '36192', 'a.a2001@iut.univ-paris8.fr', 600000032, '46 RUE CORONA', '', '2017-2018', ''),
(419, 24133, NULL, 'AYADI 19', 'MAXIME', '36190', 'a.a2001@iut.univ-paris8.fr', 600000030, '44 RUE CORONA', '', '2016-2017', ''),
(418, 24132, NULL, 'AYADI 33', 'JAMES', '36189', 'a.a2001@iut.univ-paris8.fr', 600000029, '43 RUE CORONA', '', '2016-2017', ''),
(417, 24131, NULL, 'AYADI 16', 'FATIMA', '36188', 'a.a2001@iut.univ-paris8.fr', 600000028, '42 RUE CORONA', '', '2016-2017', 'Entreprise 28'),
(416, 24130, NULL, 'AYADI 11', 'JORDAN', '36187', 'a.a2001@iut.univ-paris8.fr', 600000027, '41 RUE CORONA', '', '2016-2017', 'Entreprise 27'),
(415, 24129, NULL, 'AYADI 20', 'ARNAUD', '36186', 'a.a2001@iut.univ-paris8.fr', 600000026, '40 RUE CORONA', '', '2016-2017', 'Entreprise 26'),
(414, 24128, NULL, 'AYADI 12', 'HICHAM', '36185', 'a.a2001@iut.univ-paris8.fr', 600000025, '39 RUE CORONA', '', '2016-2017', 'Entreprise 25'),
(413, 24127, NULL, 'AYADI 17', 'AKBAR', '36184', 'a.a2001@iut.univ-paris8.fr', 600000024, '38 RUE CORONA', '', '2016-2017', 'Entreprise 24'),
(412, 24126, NULL, 'AYADI 9', 'THOMAS', '36183', 'a.a2001@iut.univ-paris8.fr', 600000023, '37 RUE CORONA', '', '2015-2016', 'Entreprise 23'),
(411, 24125, NULL, 'AYADI 14', 'ADRIEN', '36182', 'a.a2001@iut.univ-paris8.fr', 600000022, '36 RUE CORONA', '', '2015-2016', 'Entreprise 22'),
(409, 24123, NULL, 'AYADI 28', 'CECILIA', '36180', 'a.a2001@iut.univ-paris8.fr', 600000020, '34 RUE CORONA', 'MME ARCHAMBAULT VALERIE', '2015-2016', 'Entreprise 20'),
(410, 24124, NULL, 'AYADI 23', 'YOANN', '36181', 'a.a2001@iut.univ-paris8.fr', 600000021, '35 RUE CORONA', 'REUILS', '2015-2016', 'Entreprise 21'),
(408, 24122, NULL, 'AYADI 25', 'ROMAIN', '36179', 'a.a2001@iut.univ-paris8.fr', 600000019, '33 RUE CORONA', '', '2015-2016', ''),
(407, 24121, NULL, 'AYADI 15', 'JEREMY', '36178', 'a.a2001@iut.univ-paris8.fr', 600000018, '32 RUE CORONA', '', '2015-2016', 'Entreprise 18'),
(406, 24120, NULL, 'AYADI 13', 'ROMAIN', '36177', 'a.a2001@iut.univ-paris8.fr', 600000017, '31 RUE CORONA', '', '2015-2016', 'Entreprise 17'),
(405, 24119, NULL, 'AYADI 24', 'JEROME', '36176', 'a.a2001@iut.univ-paris8.fr', 600000016, '30 RUE CORONA', '', '2014-2015', 'Entreprise 16'),
(404, 24118, NULL, 'AYADI 4', 'MAXIME', '36175', 'a.a2001@iut.univ-paris8.fr', 600000015, '29 RUE CORONA', '', '2014-2015', 'Entreprise 15'),
(403, 24117, NULL, 'AYADI 3', 'BENJAMIN', '36174', 'a.a2001@iut.univ-paris8.fr', 600000014, '28 RUE CORONA', '', '2014-2015', 'Entreprise 14'),
(402, 24116, NULL, 'AYADI 6', 'TRISTAN', '36173', 'a.a2001@iut.univ-paris8.fr', 600000013, '27 RUE CORONA', '', '2014-2015', 'Entreprise 13'),
(401, 24115, NULL, 'AYADI 32', 'FLORIAN', '36172', 'a.a2001@iut.univ-paris8.fr', 600000012, '26 RUE CORONA', '', '2013-2014', 'Entreprise 12'),
(400, 24114, NULL, 'AYADI 26', 'BENOIT', '36171', 'a.a2001@iut.univ-paris8.fr', 600000011, '25 RUE CORONA', '', '2013-2014', 'Entreprise 11'),
(398, 24112, NULL, 'AYADI 18', 'ARTHUR', '36169', 'a.a2001@iut.univ-paris8.fr', 600000009, '23 RUE CORONA', '', '2013-2014', 'Entreprise 9'),
(399, 24113, NULL, 'AYADI 27', 'MELANIE', '36170', 'a.a2001@iut.univ-paris8.fr', 600000010, '24 RUE CORONA', '', '2013-2014', 'Entreprise 10'),
(397, 24111, NULL, 'AYADI 10', 'FRANCOIS', '36168', 'a.a2001@iut.univ-paris8.fr', 600000008, '22 RUE CORONA', '', '2013-2014', 'Entreprise 8'),
(396, 24110, NULL, 'AYADI 31', 'REMY', '36167', 'a.a2001@iut.univ-paris8.fr', 600000007, '21 RUE CORONA', '', '2013-2014', 'Entreprise 7'),
(395, 24109, NULL, 'AYADI 43', 'MYLENE', '36166', 'a.a2001@iut.univ-paris8.fr', 600000006, '20 RUE CORONA', '', '2011-2012', 'Entreprise 6'),
(394, 24108, NULL, 'AYADI 35', 'MOHAMMED', '36165', 'a.a2001@iut.univ-paris8.fr', 600000005, '19 RUE CORONA', '', '2011-2012', 'Entreprise 5'),
(393, 24107, NULL, 'AYADI 30', 'IDRIS', '36164', 'a.a2001@iut.univ-paris8.fr', 600000004, '18 RUE CORONA', '', '2011-2012', 'Entreprise 4'),
(392, 24106, NULL, 'AYADI 8', 'PAUL', '36163', 'a.a2001@iut.univ-paris8.fr', 600000003, '17 RUE CORONA', '', '2011-2012', 'Entreprise 3'),
(390, 2410, NULL, 'AYADI 42', 'AHMED', '36161', 'a.a2001@iut.univ-paris8.fr', 600000001, '15 RUE CORONA', '', '2011-2012', 'Entreprise 1'),
(391, 24105, NULL, 'AYADI 1', 'AMINE', '36162', 'a.a2001@iut.univ-paris8.fr', 600000002, '16 RUE CORONA', '', '2011-2012', 'Entreprise 2');

-- --------------------------------------------------------

--
-- Table structure for table `former`
--

DROP TABLE IF EXISTS `former`;
CREATE TABLE IF NOT EXISTS `former` (
  `idEtablissement` int(11) NOT NULL,
  `idEtud` int(11) NOT NULL,
  `infoFormation` varchar(150) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`idEtablissement`,`idEtud`),
  KEY `former_etudiant0_FK` (`idEtud`)
);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `idGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `nomGroupe` varchar(250) NOT NULL,
  PRIMARY KEY (`idGroupe`),
  UNIQUE KEY `nomGroupe` (`nomGroupe`)
);

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `idResp` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(32) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  PRIMARY KEY (`idResp`)
);

--
-- Dumping data for table `responsable`
--

INSERT INTO `responsable` (`idResp`, `identifiant`, `motDePasse`) VALUES
(11, 'test2', 'test2'),
(8, 'a', '$2y$10$NmodFK4BDInwEAJLHVcDCO2J.7XXKNPFpaiOg/TYD6ZAF4nuZs4Cm'),
(2, 'admin2', '$2y$10$iiaQJFyS2tbGgM2m6slgzOGJknWmZ43evJyKXPH282tbiXw6Cuvzy'),
(3, 'aze', '$2y$10$AHjBGtiJ2dvc/9WJ5Zci3OuoZlBE482OfHQ7M0H6PnlCXaTTRv9yy'),
(21, 'qouqa', '$2y$10$fTXLdQbcX3.vMASFcOKVSufdj2sQKRPxE6E9nnaCJ66BU37I.XReu'),
(6, 'qq', '$2y$10$kE.VypAqSvs2xTHZCE.Nwugo0D0D/Thtp0Wg8rgKDVbFaWadsYj.C'),
(7, 'responsable3', 'responsable3'),
(9, 'admina', '$2y$10$eVSeLhSRwoMV6IG7LgLNTeYjz/Zq1PPzedhNWxF/VBVFUw1H2iQtK'),
(10, 'vb', '$2y$10$vA5WeCZieI1U1vQJtugL8uYl0PDEhCvCLFrhk0CduADLkNxBYMDsK'),
(12, 'test2', '$2y$10$Vix/b1.2k0CwjF50AG5YmOvn27zyjxzNC5U5R82G9Ge9/4aJrP1A6'),
(13, 'abcd5', '$2y$10$TK2IJVTVjDYV.ix32u59Jex5dY83f4.wQYGby2DcrB7kgeevcNfRK'),
(14, 'tata', '$2y$10$/gegfKpF.p1qAs6H1fhPROBcedBvRjzEcJNXFhZ1bE6.xkS4.H/.e'),
(15, 'tteasratat', '$2y$10$5hdHgDlZNyIFL2l/QA9scuEEo7yoY1eUmbO6QcDoGo3z79.PkB7nK'),
(16, 'fazfazef', '$2y$10$IpOayRZCu9nmPzgUMJ/lTu.J0JJ3whT.U6r.PiCOQ6ynPsoFsYlgq'),
(17, 'aefefzerg', '$2y$10$JYW.JiS1aN/DowJk8c1x1.IbH2Nq8T0T3Jg0K/HsIFUAQGgxll75K'),
(18, 'quoc', '$2y$10$rpDNK8NHOnISeW85oyifx.UacYlqQ4h79L4afrw7mJb45mqLmtd/6'),
(20, 'aq', '$2y$10$uu0OKSuCLMJMXac.JZ0ho.ZSy7oRCPM55L.ODtF29nSkTBWex7s9.');
COMMIT;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, RELOAD, SHUTDOWN, PROCESS, FILE, REFERENCES, INDEX, ALTER, SHOW DATABASES, SUPER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, REPLICATION SLAVE, REPLICATION CLIENT, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, CREATE USER, EVENT, TRIGGER, CREATE TABLESPACE, CREATE ROLE, DROP ROLE ON *.* TO `user`@`%` WITH GRANT OPTION;

GRANT APPLICATION_PASSWORD_ADMIN,AUDIT_ADMIN,BACKUP_ADMIN,BINLOG_ADMIN,BINLOG_ENCRYPTION_ADMIN,CLONE_ADMIN,CONNECTION_ADMIN,ENCRYPTION_KEY_ADMIN,GROUP_REPLICATION_ADMIN,INNODB_REDO_LOG_ARCHIVE,PERSIST_RO_VARIABLES_ADMIN,REPLICATION_SLAVE_ADMIN,RESOURCE_GROUP_ADMIN,RESOURCE_GROUP_USER,ROLE_ADMIN,SERVICE_CONNECTION_ADMIN,SESSION_VARIABLES_ADMIN,SET_USER_ID,SYSTEM_USER,SYSTEM_VARIABLES_ADMIN,TABLE_ENCRYPTION_ADMIN,XA_RECOVER_ADMIN ON *.* TO `user`@`%` WITH GRANT OPTION;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
