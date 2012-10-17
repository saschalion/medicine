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
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `patronymic` varchar(120) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `document` text,
  `address` text NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `mobile_phone` varchar(30) DEFAULT NULL,
  `mobile_phone_second` varchar(30) DEFAULT NULL,
  `decision` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `patronymic`, `sex`, `document`, `address`, `phone`, `mobile_phone`, `mobile_phone_second`, `decision`) VALUES
(1, '?????????', '????????', '', '', '', '', '', '', '', '');
