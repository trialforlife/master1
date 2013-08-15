-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 13 2013 г., 19:38
-- Версия сервера: 5.1.62-community
-- Версия PHP: 5.3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `now-yakutsk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) NOT NULL,
  `cat_code` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_code`) VALUES
(4, 'Афиша', 'poster'),
(1, 'Кинотеатры', 'cinema'),
(2, 'Театры', 'theatre'),
(3, 'Городские мероприятия', 'events'),
(6, 'Рестораны', 'restaurants'),
(7, 'Доставка', 'shipment'),
(8, 'Развлечения', 'entertainment'),
(9, 'Красота и здоровье', 'beautyandhealh'),
(10, 'Избранное', 'favorite'),
(5, 'Ночная жизнь', 'nightlife');

-- --------------------------------------------------------

--
-- Структура таблицы `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(40) NOT NULL,
  `c_image` text NOT NULL,
  `c_adress` text NOT NULL,
  `c_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `cinema`
--

INSERT INTO `cinema` (`c_id`, `c_name`, `c_image`, `c_adress`, `c_published`) VALUES
(1, 'Первый кионтеатр', 't', 'Улица кино номер 34', 0),
(2, 'Одесский киноетатр', 'cartinka', 'Улица пушкина 3', 1),
(3, 'Довженка кинотетр', '', 'Улица серверная 1', 0),
(4, 'Мир', 'сылка', 'Проспект асеибера 2а', 0),
(5, 'АйМакс', 'картина', 'Переулок модема 54', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cinema_banner`
--

CREATE TABLE IF NOT EXISTS `cinema_banner` (
  `cb_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL,
  `cb_banner` varchar(10000) NOT NULL,
  `cb_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`cb_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `cinema_banner`
--

INSERT INTO `cinema_banner` (`cb_id`, `c_id`, `cb_banner`, `cb_published`) VALUES
(1, 1, '/kino.png', 1),
(2, 1, '/kino1.png', 1),
(3, 1, '/kino1.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `entertainment`
--

CREATE TABLE IF NOT EXISTS `entertainment` (
  `en_id` int(10) NOT NULL AUTO_INCREMENT,
  `en_name` varchar(1000) NOT NULL,
  `en_content` text NOT NULL,
  `en_image` text NOT NULL,
  `en_type` varchar(1000) NOT NULL,
  `en_time` varchar(1000) NOT NULL,
  `en_price` varchar(1000) NOT NULL,
  `en_content_add` varchar(10000) NOT NULL,
  `en_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`en_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `entertainment_banner`
--

CREATE TABLE IF NOT EXISTS `entertainment_banner` (
  `enb_id` int(10) NOT NULL AUTO_INCREMENT,
  `en_id` int(10) NOT NULL,
  `enb_banner` text NOT NULL,
  PRIMARY KEY (`enb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `ev_id` int(10) NOT NULL AUTO_INCREMENT,
  `ev_name` varchar(1000) NOT NULL,
  `ev_time` varchar(10000) NOT NULL,
  `ev_image` text NOT NULL,
  `ev_content` text NOT NULL,
  `ev_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`ev_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `events_banner`
--

CREATE TABLE IF NOT EXISTS `events_banner` (
  `evb_id` int(10) NOT NULL AUTO_INCREMENT,
  `ev_id` int(10) NOT NULL,
  `evb_banner` text NOT NULL,
  `evb_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`evb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL,
  `f_name` varchar(1000) NOT NULL,
  `f_time` varchar(10000) NOT NULL,
  `f_price` varchar(1000) NOT NULL,
  `f_content` text NOT NULL,
  `f_image` text NOT NULL,
  `f_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `play`
--

CREATE TABLE IF NOT EXISTS `play` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `t_id` int(10) NOT NULL,
  `p_name` varchar(1000) NOT NULL,
  `p_time` text NOT NULL,
  `p_content` text NOT NULL,
  `p_price` varchar(1000) NOT NULL,
  `p_image` varchar(10000) NOT NULL,
  `p_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(1000) NOT NULL,
  `r_image` text NOT NULL,
  `r_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `restaurants_banner`
--

CREATE TABLE IF NOT EXISTS `restaurants_banner` (
  `rb_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_id` int(10) NOT NULL,
  `rb_banner` text NOT NULL,
  `rb_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`rb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `restaurant_special`
--

CREATE TABLE IF NOT EXISTS `restaurant_special` (
  `rs_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_id` int(10) NOT NULL,
  `rs_name` varchar(1000) NOT NULL,
  `rs_image` text NOT NULL,
  `rs_content` text NOT NULL,
  `rs_price` varchar(1000) NOT NULL,
  `rs_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`rs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(1000) NOT NULL,
  `s_content` text NOT NULL,
  `s_image` text NOT NULL,
  `s_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `shipment_banner`
--

CREATE TABLE IF NOT EXISTS `shipment_banner` (
  `sb_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `sb_banner` text NOT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `shipment_special`
--

CREATE TABLE IF NOT EXISTS `shipment_special` (
  `ss_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `ss_name` varchar(1000) NOT NULL,
  `ss_image` varchar(10000) NOT NULL,
  `ss_content` text NOT NULL,
  `ss_price` varchar(1000) NOT NULL,
  `ss_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `theatre`
--

CREATE TABLE IF NOT EXISTS `theatre` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(1000) NOT NULL,
  `t_image` varchar(10000) NOT NULL,
  `t_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `theatre`
--

INSERT INTO `theatre` (`t_id`, `t_name`, `t_image`, `t_published`) VALUES
(1, '12', 'dwd', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `theatre_banner`
--

CREATE TABLE IF NOT EXISTS `theatre_banner` (
  `tb_id` int(10) NOT NULL AUTO_INCREMENT,
  `t_id` int(10) NOT NULL,
  `tb_banner` varchar(10000) NOT NULL,
  `tb_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`tb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
