-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.categorie : ~2 rows (environ)
REPLACE INTO `categorie` (`id_categorie`, `nomCategorie`) VALUES
	(1, 'Zone de ride'),
	(2, 'Jeu entre rider');

-- Listage de la structure de table forum. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sujet_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `sujet_id` (`sujet_id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.message : ~6 rows (environ)
REPLACE INTO `message` (`id_message`, `texte`, `dateCreation`, `sujet_id`, `utilisateur_id`) VALUES
	(1, 'Le Bowl (ou "piscine") :\n\nC\'est une structure en forme de cuvette, souvent en béton, qui simule les bords d\'une piscine. Le bowl est utilisé pour les transitions, où les skateurs passent de la bordure supérieure vers le fond et remontent sur l\'autre côté. Il existe généralement plusieurs niveaux de hauteur dans un bowl.\nIl est idéal pour les skateurs qui aiment les figures verticales et les descentes rapides.\n', '2023-12-20 14:28:18', 1, 2),
	(2, 'Règles de base du jeu "Out" pour les skateurs :\nNombre de joueurs : Il peut y avoir plusieurs skateurs, généralement entre 4 et 10.\n\nObjectif : L\'objectif est de rester dans le jeu sans être éliminé (d\'où le terme "Out").\n\nDébut du jeu : Un skateur commence le jeu en effectuant un trick (figure) que les autres participants doivent reproduire.\n\nLes tricks : Le skateur qui commence choisit une figure à réaliser. Tous les autres skateurs doivent essayer de faire exactement la même figure. Si un skateur échoue à reproduire la figure, il est éliminé et est "out".\n\nTour suivant : Si tous les skateurs réussissent la figure, c\'est au skateur suivant de proposer un nouveau trick. Les skateurs qui échouent sont éliminés au fur et à mesure.\n\nÉlimination : Le jeu continue jusqu\'à ce qu\'il ne reste plus qu\'un seul skateur, qui est déclaré vainqueur.', '2022-12-20 09:50:00', 2, 1),
	(3, 'La Rampe (ou "half-pipe") :\n\nUne rampe est une structure en forme de "U" (comme un demi-tube), permettant aux skateurs de monter et descendre sur les bords. Elle est parfaite pour les tricks aériens, où les skateurs prennent de la hauteur pour effectuer des figures.\nLa "quarter pipe" est une rampe qui représente un quart de cercle, souvent utilisée pour les figures plus petites mais aussi populaires pour des figures rapides.', '2024-08-12 09:53:11', 1, 1),
	(4, 'Le Street Area (zone street) :\n\nCette zone est inspirée de l\'environnement urbain, avec des éléments comme des rails, des curb (bordures de trottoir), des marches (escaliers), des ramps, et des planches inclinées. Ces structures permettent aux skateurs de faire des tricks comme des grinds ou des slides sur les bords ou de sauter les marches.\nLa zone street est plus variée et adaptée pour ceux qui veulent reproduire des figures qu\'ils feraient dans la rue, mais dans un cadre sécurisé.', '2022-08-20 09:55:01', 1, 3),
	(5, 'La Funbox :\n\nC\'est une structure combinant plusieurs éléments, comme un petit ramp, une plateforme, des rails et des courbes. Elle permet aux skateurs de s\'entraîner à une variété de figures en une seule section du skatepark.\nElle est souvent utilisée pour des sauts ou des tricks plus complexes combinant plusieurs types d\'obstacles.', '2214-08-03 09:56:00', 1, 2),
	(6, 'Le Curbs et Rails :\n\nLes curbs sont des bords arrondis, généralement en béton, qu\'un skateur peut "grinder" (glisser) dessus. Les rails sont des barres métalliques, souvent fixées sur le sol ou des structures, permettant aux skateurs de réaliser des grinds et des slides. Ces éléments sont incontournables dans la zone street du skatepark.', '2020-12-02 17:56:35', 1, 1);

-- Listage de la structure de table forum. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL DEFAULT '0',
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verrouillage` tinyint NOT NULL DEFAULT '0',
  `categorie_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `categorie_id` (`categorie_id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.sujet : ~2 rows (environ)
REPLACE INTO `sujet` (`id_sujet`, `titre`, `dateCreation`, `verrouillage`, `categorie_id`, `utilisateur_id`) VALUES
	(1, 'Skatepark', '2020-08-14 12:10:38', 0, 1, 2),
	(2, 'OUT', '2022-11-18 09:47:12', 0, 2, 1);

-- Listage de la structure de table forum. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'utilisateur',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.utilisateur : ~3 rows (environ)
REPLACE INTO `utilisateur` (`id_utilisateur`, `pseudo`, `motDePasse`, `dateInscription`, `role`) VALUES
	(1, 'rollerman', 'azerty', '2020-05-12 09:44:00', 'utilisateur'),
	(2, 'skateman', 'qwerty', '2024-12-20 19:14:46', 'utilisateur'),
	(3, 'veloman', 'aqwzsx', '2022-10-14 07:22:29', 'utilisateur');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
