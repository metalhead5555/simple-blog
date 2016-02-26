-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 06 2015 г., 21:36
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `annadb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `mainphoto` varchar(255) NOT NULL,
  `descr` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `name`, `id_cat`, `mainphoto`, `descr`) VALUES
(1, 'asd', 1, '1424963152ie.jpg', 'qweasdzxcasd'),
(2, 'asd', 2, '1424965895web-logos.png', 'sdl'),
(5, 'tyuiopbn', 3, '1425169909IMG_20131123_155740.jpg', 'if(!empty($_POST[''id''])&&isset($_POST[''enter''])){\n		if($_FILES[''wrap''][''error'']!=0) $wrap = $_POST[''oldphoto'']; \n		else{\n			$wrap = time().$_FILES[''wrap''][''name''];\n			@unlink(IMGDIR.$_POST[''oldphoto'']);\n			move_uploaded_file($_FILES[''wrap''][''tmp_name'),
(6, 'set', 1, '1425249731IMG_20131103_174843.jpg', ''),
(8, 'sefse', 1, '1425249762IMG_20131031_200636.jpg', ''),
(9, 'adfdsdf', 1, '1425249818ad.PNG', ''),
(10, 'asd;lk', 1, '1425308010IMG_20131212_122504.jpg', ''),
(11, 'tets', 2, '1425311848IMG_20131212_152007.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Portfolio'),
(2, 'Model Test'),
(3, 'Fashion Week');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `bigpic` varchar(255) NOT NULL,
  `smallpic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `id_album`, `bigpic`, `smallpic`) VALUES
(18, 5, 'resized1425169943IMG_20131106_141834.jpg', ''),
(19, 5, 'resized1425169948IMG_20131031_200729.jpg', ''),
(21, 5, 'resized1425170059IMG_20131103_174843.jpg', ''),
(27, 2, 'resized1425242879Nyy05vXWyB4.jpg', ''),
(28, 2, 'resized1425242879platinumwall.ru_201005110742056582 (1).jpg', ''),
(30, 1, 'resized1425243005001.jpg', ''),
(34, 2, 'resized1425243413007.jpg', ''),
(37, 2, 'resized1425243573001.jpg', ''),
(40, 1, 'resized1425243731bootstrapfail.PNG', ''),
(41, 1, 'resized1425243855bootstrapfail.png', ''),
(42, 2, 'resized1425246731IMG_20131103_174843.jpg', ''),
(43, 2, 'resized1425246737IMG_20130709_161224.jpg', ''),
(44, 2, 'resized1425246742IMG_20131031_200636.jpg', ''),
(46, 5, 'resized1425247139IMG_20131104_122026.jpg', ''),
(47, 5, 'resized1425247163web-logos.png', ''),
(58, 1, 'resized1425507728bootstrapfail.png', ''),
(59, 1, 'resized1425507737bootstrapfail.png', ''),
(60, 10, 'resized1425574343ie.jpg', ''),
(102, 10, 'resized1425577175rltbkjxebcc.jpg', ''),
(103, 10, 'resizedbgjreckn.jpg', ''),
(104, 10, 'resizedeqelpwkupqu.jpg', ''),
(105, 10, 'resized1425577470gdmaetoijik.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `pagetitle` varchar(150) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `keywords`, `descr`, `pagetitle`, `filename`, `content`) VALUES
(1, 'asd,asd,vcv,df', 'nfopsdfgopri', 'About|', 'about', '<p><img alt="" src="http://cs624129.vk.me/v624129721/24587/093Q7_IJ0dA.jpg" style="float:right; height:480px; width:480px" /></p>'),
(2, 'photografhy,kiev,fashion', '//About me', 'ANNA VYALOVA | Main', 'index', ''),
(3, '', '', 'Contact Me', 'contact', '<h3 >Kiev.Ukraine</h3><h4>+38 (093) 261-21-17</h4><strong style="letter-spacing:1px">anyavyalova@gmail.com</strong>'),
(4, '', '', '', 'viewcat', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
