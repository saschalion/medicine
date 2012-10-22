-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 22 2012 г., 03:11
-- Версия сервера: 5.1.53
-- Версия PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `medicine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `parameters`
--

CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(10) DEFAULT NULL,
  `closed` tinyint(1) DEFAULT '0',
  `sent` tinyint(1) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parameter_type_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `preparation_id` int(11) NOT NULL,
  `parameter_norm_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parameter_types_id_FK_1` (`parameter_type_id`),
  KEY `parameter_types_id_FK_2` (`patient_id`),
  KEY `preparation_id_FK_2` (`preparation_id`),
  KEY `parameter_types_id_FK_6` (`parameter_norm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `parameters`
--

INSERT INTO `parameters` (`id`, `value`, `closed`, `sent`, `date`, `parameter_type_id`, `patient_id`, `preparation_id`, `parameter_norm_id`) VALUES
(3, '50', 1, NULL, '2012-09-18 18:10:00', 3, 80, 1, 1),
(6, '30', NULL, NULL, '2012-10-22 01:41:49', 2, 80, 1, 1),
(7, '60', NULL, NULL, '2006-06-11 17:37:22', 3, 80, 1, 1),
(8, '65', NULL, NULL, '2007-03-11 17:37:22', 3, 80, 1, 1),
(9, '70', NULL, NULL, '2012-02-11 17:37:22', 3, 80, 1, 1),
(11, '80', NULL, NULL, '2012-10-22 01:42:28', 2, 80, 1, 1),
(12, '22', NULL, NULL, '2009-07-11 17:37:22', 3, 80, 1, 1),
(13, '30', NULL, NULL, '2009-09-11 17:37:22', 3, 80, 1, 1),
(14, '35', NULL, NULL, '2008-12-11 17:37:22', 3, 80, 1, 1),
(15, '40', NULL, NULL, '2008-11-11 17:37:22', 3, 80, 1, 1),
(16, '45', NULL, NULL, '2008-09-11 17:37:22', 3, 80, 1, 1),
(17, '50', NULL, NULL, '2002-07-11 17:37:22', 3, 80, 1, 1),
(18, '60', NULL, NULL, '2001-01-11 17:37:22', 3, 80, 1, 1),
(19, '76', NULL, NULL, '2000-02-11 17:37:22', 3, 80, 1, 1),
(20, '90', NULL, NULL, '1999-03-11 17:37:22', 3, 80, 1, 1),
(21, '100', NULL, NULL, '1996-04-11 17:37:22', 3, 80, 1, 1),
(22, '110', NULL, NULL, '2011-05-11 17:37:22', 3, 80, 1, 1),
(23, '79', NULL, NULL, '2010-02-11 17:37:22', 3, 80, 1, 1),
(24, '89', NULL, NULL, '2010-01-11 17:37:22', 3, 80, 1, 1),
(25, '69', NULL, NULL, '2006-02-11 17:37:22', 3, 80, 1, 1),
(26, '29', NULL, NULL, '2006-03-11 17:37:22', 3, 80, 1, 1),
(27, '36', NULL, NULL, '2005-04-11 17:37:22', 3, 80, 1, 1),
(28, '48', NULL, NULL, '2005-05-11 17:37:22', 3, 80, 1, 1),
(29, '56', NULL, NULL, '2004-08-11 17:37:22', 3, 80, 1, 1),
(30, '54', NULL, NULL, '2003-09-11 17:37:22', 3, 80, 1, 1),
(31, '26', NULL, NULL, '2003-10-11 17:37:22', 3, 80, 1, 1),
(32, '90', NULL, NULL, '2003-11-11 17:37:22', 3, 80, 1, 1),
(33, '28', NULL, NULL, '2002-12-11 17:37:22', 3, 80, 1, 1),
(34, '50', NULL, NULL, '2002-01-11 17:37:22', 3, 80, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `parameter_norms`
--

CREATE TABLE IF NOT EXISTS `parameter_norms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_norm` int(11) NOT NULL,
  `end_norm` int(11) NOT NULL,
  `below_start_norm` int(11) NOT NULL,
  `below_end_norm` int(11) NOT NULL,
  `above_start_norm` int(11) NOT NULL,
  `above_end_norm` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `parameter_types_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id_FK_4` (`patient_id`),
  KEY `parameter_types_id_FK_5` (`parameter_types_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `parameter_norms`
--

INSERT INTO `parameter_norms` (`id`, `start_norm`, `end_norm`, `below_start_norm`, `below_end_norm`, `above_start_norm`, `above_end_norm`, `patient_id`, `parameter_types_id`) VALUES
(1, 57, 66, 30, 56, 66, 120, 80, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `parameter_types`
--

CREATE TABLE IF NOT EXISTS `parameter_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `code` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `parameter_types`
--

INSERT INTO `parameter_types` (`id`, `name`, `code`) VALUES
(1, 'Холестерин', 'holesterin'),
(2, 'Сахар', 'sugar'),
(3, 'Пульс', 'pulse');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `patronymic` varchar(120) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `document` text,
  `address` text NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile_phone` varchar(30) DEFAULT NULL,
  `mobile_phone_second` varchar(30) DEFAULT NULL,
  `desease` text,
  `date_birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `patronymic`, `sex`, `document`, `address`, `phone`, `mobile_phone`, `mobile_phone_second`, `desease`, `date_birth`) VALUES
(30, 'Александр', 'Берсеньев', 'Георгиевич', 'М', '450900552', 'г. Москва', '1129248000000', '', '', 'грипп', '1912-10-17'),
(45, 'Алексей', 'Кондратьев', 'Андреевич', 'М', '45089625', 'г. Омск', '1243814400000', '', '', '', '0000-00-00'),
(50, 'Артем', 'Троицкий', 'Анатольевич', 'М', '4850852', 'г. Омск', '1259625600000', '', '', '', '0000-00-00'),
(80, 'Иван', 'Проскурин', 'Исинбаевич', '', '', '', '1277942400000', '', '', '', '1970-10-16'),
(81, 'Андройд', 'Ластоногих', 'Борисович', 'М', '45', 'Омск', '', '', '', 'заболелый', '1987-01-01');

-- --------------------------------------------------------

--
-- Структура таблицы `preparations`
--

CREATE TABLE IF NOT EXISTS `preparations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `preparations`
--

INSERT INTO `preparations` (`id`, `name`, `code`) VALUES
(1, 'Анальгин', 'analgin'),
(2, 'Бисептол', 'biseptol');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `parameters`
--
ALTER TABLE `parameters`
  ADD CONSTRAINT `parameter_types_id_FK_1` FOREIGN KEY (`parameter_type_id`) REFERENCES `parameter_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parameter_types_id_FK_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parameter_types_id_FK_6` FOREIGN KEY (`parameter_norm_id`) REFERENCES `parameter_norms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preparation_id_FK_3` FOREIGN KEY (`preparation_id`) REFERENCES `preparations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `parameter_norms`
--
ALTER TABLE `parameter_norms`
  ADD CONSTRAINT `parameter_types_id_FK_5` FOREIGN KEY (`parameter_types_id`) REFERENCES `parameter_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_id_FK_4` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
