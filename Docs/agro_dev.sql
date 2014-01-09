SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE `agro_dev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agro_dev`;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `estates` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`typeId` int(11) NOT NULL,
	`photoId` int(11) DEFAULT NULL,
	`date` datetime NOT NULL,
	`description` text DEFAULT NULL,
	`title` varchar(256) NOT NULL,
	`active` tinyint(1) DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `typeId` (`typeId`),
	KEY `photoId` (`photoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `estates` (`id`, `typeId`, `photoId`, `date`, `description`, `title`, `active`) VALUES
	('1', '2', '1', '2013-02-21 16:49:15', 'A 800 mts. ruta 205 c/mejoras, casa, galpon, molino, alambrado perimetral, antes ganado ahora SOJA!!OPORTUNIDAD..u$s12.000ha.', 'Campo Sojero 84 has. - Canuelas', '1'),
	('2', '1', '2', '2013-02-21 16:49:15', '3 Pisos, 12 Habitaciones por piso, todos en suite Spa, Sauna, Restaurant, Salon de eventos con retroproyector y pantalla. u$s300.000 y ctas.', 'Hotel Spa - Canuelas', '1');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `machineries` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`photoId` int(11) DEFAULT NULL,
	`date` datetime NOT NULL,
	`description` text DEFAULT NULL,
	`title` varchar(256) NOT NULL,
	`active` tinyint(1) DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `photoId` (`photoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `machineries` (`id`, `photoId`, `date`, `description`, `title`, `active`) VALUES
	('1', '3', '2013-02-21 16:49:15', 'Muy buen estado!!! Toma de fuerza  polea y traba en diferencial.u$s6.000.- ', 'HANOMAG 35 HP FULL-FULL ORIG -mod.1955', '1'),
	('2', '4', '2013-02-21 16:49:15', 'En Muy buen estado, posee toma de fuerza, levante de tres puntos,y salida de control remoto. u$s14.500', 'Tractor Massey Ferguson 1175 Mod.80', '1');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `partners` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`photoId` int(11) DEFAULT NULL,
	`date` datetime NOT NULL,
	`description` text DEFAULT NULL,
	`title` varchar(256) NOT NULL,
	`premium` tinyint(1) DEFAULT NULL,
	`active` tinyint(1) DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `photoId` (`photoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `partners` (`id`, `photoId`, `date`, `description`, `title`, `premium`, `active`) VALUES
	('1', '5', '2013-02-21 16:49:15', 'mscpropiedades@hotmail.com', 'MSC Propiedades', '1', '1'),
	('2', '6', '2013-02-21 16:49:15', '(011) 1569164666 distribuidoraelvalentin@hotmail.com', 'El Valentin', '1', '1'),
	('3', '7', '2013-02-21 16:49:15', '', 'Altos de Piriapolis', '1', '1'),
	('4', NULL, '2013-02-21 16:49:15', '(0341) 156362922', 'Productos Agricolas', '0', '1');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `photos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`alt` varchar(256) DEFAULT NULL,
	`thumbnail` varchar(256) NOT NULL,
	`url` varchar(256) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `photos` (`id`, `alt`, `thumbnail`, `url`) VALUES
	('1', 'Campo 84 has', 'img/photos/inmueble-0001-thumb.jpg', 'img/photos/inmueble-0001.jpg'),
	('2', 'Hotel Spa', 'img/photos/inmueble-0002-thumb.jpg', 'img/photos/inmueble-0002.jpg'),
	('3', 'Tractor Ferguson 1175', 'img/photos/maquinaria-0001-thumb.jpg', 'img/photos/maquinaria-0001.jpg'),
	('4', 'HANOMAG 35', 'img/photos/maquinaria-0002-thumb.jpg', 'img/photos/maquinaria-0002.jpg'),
	('5', 'MSC Propiedades', 'img/photos/asociado-0001-thumb.png', 'img/photos/asociado-0001.png'),
	('6', 'El Valentin', 'img/photos/asociado-0002-thumb.jpg', 'img/photos/asociado-0002.jpg'),
	('7', 'Altos de Piriapolis', 'img/photos/asociado-0003-thumb.png', 'img/photos/asociado-0003.png');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `types` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(256) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `types` (`id`, `name`) VALUES
	('1', 'Venta'),
	('2', 'Alquiler'),
	('3', 'Venta - Alquiler');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `roles` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(256) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `roles` (`id`, `name`) VALUES
	('1', 'Admin'),
	('2', 'User');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `users` (
	`id` varchar(32) NOT NULL,
	`password` varchar(32) NOT NULL,
	`name` varchar(256) NOT NULL,
	`lastActionDate` datetime NOT NULL,
	`roleId` int(11) NOT NULL,
	`active` tinyint(1) DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `roleId` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `password`, `name`, `lastActionDate`, `roleId`, `active`) VALUES
	('david', 'a83507a48bf2f2ae2a40f73d43620ef2', 'German Dosko', '2012-05-30 00:00:00', '1', '1'),
	('mauricio', '099f6f3b3ddd223d280aec96545e477c', 'Mauricio Sosa Cabral', '2012-05-30 00:00:00', '1', '1'),
	('sergio', '481c9ca773899d42c673742b2638f164', 'Sergio Sosa Cabral', '2012-05-30 00:00:00', '1', '1');

-- --------------------------------------------------------

ALTER TABLE `estates`
	ADD CONSTRAINT `estates_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `types` (`id`),
	ADD CONSTRAINT `estates_ibfk_2` FOREIGN KEY (`photoId`) REFERENCES `photos` (`id`);

ALTER TABLE `machineries`
	ADD CONSTRAINT `machineries_ibfk_1` FOREIGN KEY (`photoId`) REFERENCES `photos` (`id`);

ALTER TABLE `partners`
	ADD CONSTRAINT `partners_ibfk_1` FOREIGN KEY (`photoId`) REFERENCES `photos` (`id`);

ALTER TABLE `users`
	ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`);

