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

-- Listage des données de la table symfony_introduction.company : ~5 rows (environ)
INSERT INTO `company` (`id`, `name`, `creation_date`, `adress`, `postal_code`, `city`) VALUES
	(1, 'Elan Formation', '1993-07-10', '14 rue du rhone', '67000', 'Strasbourg'),
	(2, 'Coactis', '2015-07-10', '10 rue de la fougère', '67000', 'Strasbourg'),
	(3, 'Louis Hayotte', '2021-01-10', '7 rue de la saone', '90000', 'Belfort'),
	(4, 'Ghost Company', '2014-01-10', '1 rue du rien', '15000', 'Nowhere'),
	(5, 'My awesome Company', '2023-03-24', '9 rue random', '45000', 'Lyon');

-- Listage des données de la table symfony_introduction.employee : ~7 rows (environ)
INSERT INTO `employee` (`id`, `company_id`, `lastname`, `firstname`, `birthdate`, `hire_date`, `city`) VALUES
	(1, 1, 'SMAIL', 'Stephane', '1982-01-10 14:00:25', '2019-01-10 14:00:27', 'Strasbourg'),
	(2, 1, 'MATHIEU', 'Quentin', '1991-07-10 14:01:14', '2021-01-10 14:01:34', NULL),
	(3, 1, 'MURMANN', 'Mickael', '1986-02-10 14:02:01', '2022-01-10 14:02:17', NULL),
	(4, 3, 'HAYOTTE', 'Louis', '1998-04-04 14:02:31', '2025-01-10 14:02:32', NULL),
	(5, 2, 'ANDRES', 'Mathilde', '1989-02-08 14:02:51', '2021-01-05 14:02:51', NULL),
	(6, 5, 'Jean', 'Nicoy', '1997-10-04 00:00:00', '2019-12-05 00:00:00', 'France'),
	(7, 1, 'Smith', 'Patrick', '1979-02-04 00:00:00', '2007-12-05 00:00:00', 'Allemagne'),
	(9, 2, 'test', 'test', '1997-05-05 00:00:00', '1997-06-04 00:00:00', NULL);

-- Listage des données de la table symfony_introduction.messenger_messages : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
