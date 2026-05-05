-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 mai 2026
-- Version du serveur : MariaDB
-- Version de PHP : 8.x

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

--
-- Base de données : `site`
--

CREATE DATABASE IF NOT EXISTS `site`;
USE `site`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'DVD'),
(2, 'Ordinateur'),
(3, 'Cassette'),
(4, 'Camera'),
(5, 'Portable');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `designation`, `prix`, `id_categorie`) VALUES
(1, 'DVD vierge par 3', 17.00, 1),
(2, 'Ordinateur', 500000.00, 2),
(3, 'Cassette DV60 par 5', 27.00, 3),
(4, 'Caméscope Sony DCR-PC330', 1629.00, 4),
(5, 'Nikon F80', 479.00, 4),
(6, 'Portable Samsung X15 XVM', 1999.00, 5);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `age`, `nom`, `prenom`, `adresse`, `ville`, `mail`) VALUES
(1, 20, 'admin', 'admin', 'Cotonou', 'Cotonou', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_comm`, `id_client`, `date_commande`) VALUES
(1, 1, '2026-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

CREATE TABLE `ligne` (
  `id_comm` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix_unit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne`
--

INSERT INTO `ligne` (`id_comm`, `id_article`, `qte`, `prix_unit`) VALUES
(1, 1, 2, 17.00),
(1, 2, 1, 500000.00);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `username`, `password_hash`, `date_inscription`) VALUES
(1, 'admin', '$2y$10$examplehashxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', NOW());

-- --------------------------------------------------------

--
-- Index pour les tables
--

ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `nom` (`nom`);

ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_categorie` (`id_categorie`);

ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `id_client` (`id_client`);

ALTER TABLE `ligne`
  ADD PRIMARY KEY (`id_comm`, `id_article`),
  ADD KEY `id_article` (`id_article`);

ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT
--

ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `commande`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------

--
-- Contraintes
--

ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_categorie`
  FOREIGN KEY (`id_categorie`) REFERENCES `categorie`(`id_categorie`)
  ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_client`
  FOREIGN KEY (`id_client`) REFERENCES `client`(`id_client`)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ligne`
  ADD CONSTRAINT `fk_ligne_commande`
  FOREIGN KEY (`id_comm`) REFERENCES `commande`(`id_comm`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ligne_article`
  FOREIGN KEY (`id_article`) REFERENCES `article`(`id_article`)
  ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;
