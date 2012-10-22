-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 17 2012 г., 19:35
-- Версия сервера: 5.1.63
-- Версия PHP: 5.2.10-2ubuntu6.7

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
-- Структура таблицы `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(120) DEFAULT NULL,
  `first_name` varchar(300) NOT NULL,
  `patronymic` varchar(120) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `document` text,
  `address` text NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `mobile_phone` varchar(30) DEFAULT NULL,
  `mobile_phone_second` varchar(30) DEFAULT NULL,
  `decision` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `patronymic`, `sex`, `document`, `address`, `phone`, `mobile_phone`, `mobile_phone_second`, `decision`)
VALUES (1, '?????????', '????????', '', '', '', '', '', '', '', '');

CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(10) DEFAULT NULL,
  `closed` bool,
  `sent` bool,
  `date` TIMESTAMP(14),
  `parameter_type_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `preparation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `parameter_types_id_FK_1`
    FOREIGN KEY (`parameter_type_id`)
    REFERENCES `parameter_types` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  CONSTRAINT `parameter_types_id_FK_2`
    FOREIGN KEY (`patient_id`)
    REFERENCES `patients` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE
  CONSTRAINT `preparation_id_FK_3`
    FOREIGN KEY (`preparation_id`)
    REFERENCES `preparations` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `parameter_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `code` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `parameter_norms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(120) DEFAULT NULL,
  `start_norm` int(11) NOT NULL,
  `end_norm` int(11) NOT NULL,
  `below_start_norm` int(11) NOT NULL,
  `below_end_norm` int(11) NOT NULL,
  `above_start_norm` int(11) NOT NULL,
  `above_end_norm` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `parameter_types_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `patient_id_FK_4`
    FOREIGN KEY (`patient_id`)
    REFERENCES `patients` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE
  CONSTRAINT `parameter_types_id_FK_5`
    FOREIGN KEY (`parameter_types_id`)
    REFERENCES `parameter_types` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `preparations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
