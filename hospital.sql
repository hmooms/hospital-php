CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hospital`;

DROP TABLE IF EXISTS `species`;
CREATE TABLE IF NOT EXISTS `species` (
	`species_id` int(11) NOT NULL AUTO_INCREMENT,
	`species_description` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`species_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `species` (`species_id`, `species_description`) VALUES
(1, 'Hond'),
(2, 'Kat');

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
	`client_id` int(11) NOT NULL AUTO_INCREMENT,
	`client_firstname` varchar(50) DEFAULT NULL,
	`client_lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `clients` (`client_id`, `client_firstname`, `client_lastname`) VALUES
(1, 'Jane', 'Doe', '06-12345678', 'janedoe@hermail.com'), 
(2, 'John', 'Doe', '06-87654321', 'johndoe@hismail.com');

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(50) DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `patient_gender` varchar(50) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `patient_status` text,
  PRIMARY KEY (`patient_id`),
  FOREIGN KEY (`species_id`) REFERENCES `species`(`species_id`),
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `patients` (`patient_id`, `patient_name`, `species_id`, `patient_gender`, `client_id` ,`patient_status`) VALUES
(1, 'Bobbie', 1, 'Mannelijk', 1,'Koorts, eet slecht, blaft veel te veel'),
(2, 'Minoes', 2, 'Vrouwelijk', 2,'Drinkt niet, haaruitval, mager'),
(3, 'Kees', 1, 'Mannelijk', 2,'Eet te veel, vetzucht, jankt en kotst');

