-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.26 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных phplessons
DROP DATABASE IF EXISTS `phplessons`;
CREATE DATABASE IF NOT EXISTS `phplessons` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `phplessons`;


-- Дамп структуры для таблица phplessons.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `published` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` smallint(2) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы phplessons.news: ~4 rows (приблизительно)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id_news`, `title`, `description`, `published`, `user_id`, `status`) VALUES
	(1, 'Первая новость', 'Это подробное описание первой новости', '2016-01-01 12:32:00', 1, 1),
	(2, 'Вторая новость', 'Подробное описание второй новости', '2016-01-11 06:00:00', 2, 1),
	(3, 'Третья новость', 'Описание третьей новости', '2016-01-22 06:00:00', 1, 1),
	(4, 'Четвёртая новость', 'Подробно написано о четвёртой новости', '2016-01-27 17:00:00', 2, 1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Дамп структуры для таблица phplessons.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `birthday` datetime NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы phplessons.users: ~2 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `birthday`, `email`) VALUES
	(1, 'Иван', 'Иванов', '2000-09-27 07:10:35', 'ivan@mail.ru'),
	(2, 'Пётр', 'Петров', '1980-01-12 16:19:20', 'petr@yandex.ru');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
