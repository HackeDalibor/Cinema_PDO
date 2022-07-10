-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema`;

-- Listage de la structure de la table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) DEFAULT NULL,
  `prenom_acteur` varchar(50) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `photo_acteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteur : ~18 rows (environ)
DELETE FROM `acteur`;
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `sexe`, `date_naissance`, `photo_acteur`) VALUES
	(1, 'Shun-yee', 'Yuen', 'homme', '1953-06-11', 'shun-yee-yuen.jpg'),
	(2, 'Chan', 'Jackie', 'homme', '1954-04-07', 'jackie-chan.jfif'),
	(3, 'Farmiga', 'Vera', 'femme', '1973-08-06', 'vera-farmiga.jpg'),
	(4, 'Wilson', 'Patrick', 'homme', '1973-07-03', 'patrick-wilson.jpg'),
	(5, 'Hardy', 'Tom', 'homme', '1977-09-15', 'tom-hardy.jpeg'),
	(6, 'Williams', 'Michelle', 'femme', '1980-09-09', 'michelle-williams.jpg'),
	(7, 'Wayne Gacy', 'John', 'cloune', '1942-03-17', 'jwg.jpg'),
	(8, 'Myers', 'Mike', 'homme', '1963-05-25', 'mike-myers.jpeg'),
	(9, 'Murphy', 'Eddie', 'homme', '1961-04-03', 'eddie-murphy.jpeg'),
	(10, 'Nozawa', 'Masako', 'femme', '1936-10-25', 'Masako-Nozawa.jpg'),
	(11, 'Horikawa', 'Makoto', 'homme', '1958-02-01', 'Horikawa.jpg'),
	(12, 'Shimada', 'Bin', 'homme', '1954-11-20', 'Bin-Shimada.jpg'),
	(13, 'Mizuki', 'Nana', 'femme', '1980-01-21', 'mizuki-nana.jpg'),
	(14, 'Yamashita', 'Daiki', 'homme', '1989-09-07', 'yamashita.jpg'),
	(15, 'Wood', 'Elijah', 'homme', '1981-01-28', 'elijah-wood.jfif'),
	(16, 'McKellen', 'Ian', 'homme', '1939-03-25', 'ian-mckellen.jpg'),
	(17, 'Reeves', 'Keanu', 'homme', '1964-09-02', 'keanu-reeves.jpg'),
	(18, 'Gibson', 'Mel', 'homme', '1956-01-03', 'mel-gibson.jpg');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. attribuer
CREATE TABLE IF NOT EXISTS `attribuer` (
  `role_id` int(11) NOT NULL,
  `acteur_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  KEY `attribuer_role` (`role_id`),
  KEY `film_attribuer` (`film_id`),
  KEY `attribuer_acteur` (`acteur_id`),
  CONSTRAINT `attribuer_acteur` FOREIGN KEY (`acteur_id`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `attribuer_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`),
  CONSTRAINT `film_attribuer` FOREIGN KEY (`film_id`) REFERENCES `film` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.attribuer : ~17 rows (environ)
DELETE FROM `attribuer`;
/*!40000 ALTER TABLE `attribuer` DISABLE KEYS */;
INSERT INTO `attribuer` (`role_id`, `acteur_id`, `film_id`) VALUES
	(17, 16, 7),
	(16, 15, 7),
	(2, 1, 8),
	(1, 2, 8),
	(8, 8, 4),
	(9, 9, 4),
	(18, 17, 9),
	(7, 7, 3),
	(3, 3, 1),
	(4, 4, 1),
	(10, 10, 5),
	(11, 11, 5),
	(12, 12, 5),
	(13, 10, 5),
	(13, 11, 5),
	(14, 13, 5),
	(5, 5, 2),
	(6, 6, 2),
	(15, 14, 6),
	(19, 18, 10);
/*!40000 ALTER TABLE `attribuer` ENABLE KEYS */;

-- Listage de la structure de la table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(50) DEFAULT NULL,
  `date_sortiefr` date DEFAULT NULL,
  `duree_min` int(11) DEFAULT NULL,
  `resume_film` text,
  `note` varchar(5) DEFAULT NULL,
  `affiche` varchar(50) DEFAULT NULL,
  `realisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `realisateur_film` (`realisateur_id`),
  CONSTRAINT `realisateur_film` FOREIGN KEY (`realisateur_id`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.film : ~9 rows (environ)
DELETE FROM `film`;
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre_film`, `date_sortiefr`, `duree_min`, `resume_film`, `note`, `affiche`, `realisateur_id`) VALUES
	(1, 'Conjuring : Les dossiers Warren', '2013-08-21', 111, 'Confrontée à de terrifiants phénomènes surnaturels après avoir emménagé dans une ferme à Rhode Island, une famille fait appel à un couple de démonologues réputés.', '*****', 'conjuring.jpg', 1),
	(2, 'Venom', '2018-10-10', 112, 'Après avoir fusionné avec un symbiote extraterrestre qui lui confère d\'incroyables super-pouvoirs, un journaliste lutte pour sa survie contre un chercheur fou.', '*****', 'venom.jpg', 2),
	(3, 'John Wayne Gacy : Autoportrait d\'un tueur', '2022-04-07', 184, 'Il s\'est assis à la table des puissants. Il s\'en est pris aux plus vulnérables. Derrière un sourire trompeur se cachait en réalité un tueur en série sadique.', '***', 'jwg.jpg', 3),
	(4, 'Shrek', '2001-07-04', 90, 'En mission pour sauver une princesse d\'un dragon cracheur de feu, Shrek, l\'ogre bourru, fait équipe avec un compagnon improbable : un âne râleur.', '****', 'shrek.jpg', 4),
	(5, 'Dragon Ball Super : Broly', '2019-01-23', 100, 'Goku et Vegeta font face à un nouvel ennemi, le Super Saïyen Légendaire Broly, dans un combat explosif pour sauver notre planète.', '*****', 'dbs-broly.jpg', 8),
	(6, 'My Hero Academia : Heroes Rising', '2020-08-20', 104, 'La classe 1-A visite l\'île de Nabu où ils peuvent enfin faire un vrai travail de héros. L\'endroit est si paisible que ça ressemble plus à des vacances… jusqu\'à ce qu\'ils soient attaqués par un super-vilain avec un alter insondable ! Son pouvoir est étrangement familier, et il semble que Shigaraki ait joué un rôle dans son plan. Mais avec All Might à la retraite et la vie des citoyens en jeu, il n\'y a pas de temps pour les questions. Deku et ses amis sont la prochaine génération de héros, et ils sont le seul espoir de l\'île.', '****', 'mha-hr.jpg', 6),
	(7, 'Le Seigneur des Anneaux', '2001-12-19', 178, 'Dans ce chapitre de la trilogie, le jeune et timide Hobbit, Frodon Sacquet, hérite d\'un anneau. Bien loin d\'être une simple babiole, il s\'agit de l\'Anneau Unique, un instrument de pouvoir absolu qui permettrait à Sauron, le Seigneur des ténèbres, de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. À moins que Frodon, aidé d\'une Compagnie constituée de Hobbits, d\'Hommes, d\'un Magicien, d\'un Nain, et d\'un Elfe, ne parvienne à emporter l\'Anneau à travers la Terre du Milieu jusqu\'à la Crevasse du Destin, lieu où il a été forgé, et à le détruire pour toujours. Un tel périple signifie s\'aventurer très loin en Mordor, les terres du Seigneur des ténèbres, où est rassemblée son armée d\'Orques maléfiques... La Compagnie doit non seulement combattre les forces extérieures du mal mais aussi les dissensions internes et l\'influence corruptrice qu\'exerce l\'Anneau lui-même.', '***', 'seigneur-des-anneaux.jpg', 9),
	(8, 'Le Maître Chinois', '1985-01-01', 111, 'Fei-Hung est le fils d\'un grand maître chinois spécialisé dans les arts martiaux. Après une bagarre, son père l\'envoie pour le punir chez son oncle, lui aussi expert dans les techniques de combat... Excepté qu\'il pratique le kung-fu d\'une manière très particulière. En effet, l\'homme, relativement fou, ne combat que lorsqu\'il est ivre !', '**', 'maitre-chinois.jpg', 10),
	(9, 'John Wick', '2014-10-29', 101, 'Depuis la mort de sa femme bien-aimée, John Wick passe ses journées à retaper sa Ford Mustang de 1969, avec pour seule compagnie sa chienne Daisy. Il mène une vie sans histoire, jusqu’à ce qu’un malfrat sadique nommé Iosef Tarasof remarque sa voiture. John refuse de la lui vendre. Iosef n’acceptant pas qu’on lui résiste, s’introduit chez John avec deux complices pour voler la Mustang, et tuer sauvagement Daisy…', '****', 'john-wick.jpg', 11),
	(10, 'Braveheart', '1995-10-04', 178, 'Evocation de la vie tumultueuse de William Wallace, héros et symbole de l\'indépendance écossaise, qui à la fin du XIIIe siècle affronta les troupes du roi d\'Angleterre Edward I qui venaient d\'envahir son pays.', '*', 'braveheart.jpg', 7);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `type_genre` varchar(50) DEFAULT NULL,
  `numero_film` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre : ~13 rows (environ)
DELETE FROM `genre`;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `type_genre`, `numero_film`) VALUES
	(1, 'action', NULL),
	(2, 'horreur', NULL),
	(3, 'comédie', NULL),
	(4, 'aventure', NULL),
	(5, 'drame', NULL),
	(6, 'fantastique', NULL),
	(7, 'guerre', NULL),
	(8, 'policier', NULL),
	(9, 'western', NULL),
	(10, 'science-fiction', NULL),
	(11, 'documentaire', NULL),
	(12, 'cartoon', NULL),
	(13, 'animé', NULL);
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. posseder
CREATE TABLE IF NOT EXISTS `posseder` (
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`film_id`,`genre_id`),
  KEY `posseder_genre` (`genre_id`),
  CONSTRAINT `film_posseder` FOREIGN KEY (`film_id`) REFERENCES `film` (`id_film`),
  CONSTRAINT `posseder_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.posseder : ~13 rows (environ)
DELETE FROM `posseder`;
/*!40000 ALTER TABLE `posseder` DISABLE KEYS */;
INSERT INTO `posseder` (`film_id`, `genre_id`) VALUES
	(5, 1),
	(6, 1),
	(9, 1),
	(1, 2),
	(4, 3),
	(8, 3),
	(7, 4),
	(8, 4),
	(10, 5),
	(2, 10),
	(3, 11),
	(4, 12),
	(5, 13),
	(6, 13);
/*!40000 ALTER TABLE `posseder` ENABLE KEYS */;

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) DEFAULT NULL,
  `prenom_realisateur` varchar(50) DEFAULT NULL,
  `photo_realisateur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~10 rows (environ)
DELETE FROM `realisateur`;
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`, `photo_realisateur`) VALUES
	(1, 'Wan', 'James', 'James_Wan.jpg'),
	(2, 'Fleischer', 'Ruben', 'Ruben_Fleischer.jpg'),
	(3, 'Berlinger', 'Joe', 'joe_berlinger.jpg'),
	(4, 'Adamson', 'Andrew', 'andrew_adamson.jpg'),
	(6, 'Nagasaki', 'Kenji', 'kenji_nagasaki.jpg'),
	(7, 'Gibson', 'Mel', 'mel-gibson.jpg'),
	(8, 'Nagamine', 'Tatsuya', 'tatsuya_nagamine.jpg'),
	(9, 'Jackson', 'Peter', 'Peter_Jackson.jpg'),
	(10, 'Woo-ping', 'Yuen', 'Yuen_Woo_Ping.jpg'),
	(11, 'Stahelski', 'Chad', 'Chad_Stahelski.jpg');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perso` varchar(50) DEFAULT NULL,
  `prenom_perso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.role : ~18 rows (environ)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_perso`, `prenom_perso`) VALUES
	(1, 'Fei-hung', 'Wong'),
	(2, 'Kuo-wei', 'Chen'),
	(3, 'Warren', 'Lorraine'),
	(4, 'Warren', 'Edward'),
	(5, 'Brock', 'Eddie'),
	(6, 'Weying', 'Anne'),
	(7, 'Wayne Gacy', 'John'),
	(8, NULL, 'Shrek'),
	(9, NULL, 'L\'Ane'),
	(10, NULL, 'Goku'),
	(11, NULL, 'Vegeta'),
	(12, NULL, 'Broly'),
	(13, NULL, 'Gogeta'),
	(14, NULL, 'Cheelai'),
	(15, 'Midoriya', 'Izuku'),
	(16, 'Sacquet', 'Frodon'),
	(17, NULL, 'Gandalf'),
	(18, 'Wick', 'John'),
	(19, 'Wallace', 'William');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
