-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 17 Mars 2016 à 17:05
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `jeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id_personnage` smallint(5) unsigned NOT NULL,
  `name_personnage` varchar(50) NOT NULL,
  `degats_personnage` tinyint(3) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id_personnage`, `name_personnage`, `degats_personnage`) VALUES
(19, 'thomas', 100),
(18, 'ludo', 100),
(17, 'alexandre', 100),
(16, 'herve', 100),
(15, 'test pascal', 100);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id_personnage`),
  ADD UNIQUE KEY `nom` (`name_personnage`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;