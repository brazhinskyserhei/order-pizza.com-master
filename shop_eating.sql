-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 15 2017 г., 14:48
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_eating`
--
CREATE DATABASE IF NOT EXISTS `shop_eating` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop_eating`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `simvol` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `simvol`) VALUES
(1, 'Пица и гамбургеры', 1, 'Q'),
(2, 'Другие блюда', 1, 'a'),
(3, 'Напитки', 1, 'f'),
(4, 'Десерты', 1, 'd');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `avalability` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_recomendation` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_action` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `avalability`, `description`, `is_new`, `is_recomendation`, `status`, `is_action`, `image`) VALUES
(2, 'Оригинальная метровая ', 1, 1506, '208.00', 8, 'Грудинка копченая, куриное филе sous-vide, шампиньоны, моцарелла, орегано, томат, перец чили, базилик, соус Pomodoro', 1, 1, 1, 0, NULL),
(3, 'Цезарь', 2, 15090, '80.00', 7, 'Куриное филе на гриле, бекон, перепелиное яйцо, томаты, салат ромен, пармезан, фокачча, соус Caesa', 0, 1, 1, 0, NULL),
(4, 'Гурмео', 1, 3453, '145.00', 9, 'Охотничьи колбаски, салями пепперони, ветчина, куриное филе sous-vide, шампиньоны, орегано, соус BBQ', 0, 1, 1, 0, NULL),
(5, 'Криспи', 1, 4567, '129.00', 9, '310 г\r\nСыр фета, помидоры черри и вяленые, шампиньоны, руккола и базилик', 0, 0, 1, 1, NULL),
(6, 'Пицца с лососем и шпинатом', 1, 4569, '134.00', 5, '415 г\r\nФиле лосося, шпинат, сыры моцарелла и фета, томаты, сливочный соус, соус Pesto', 1, 1, 1, 1, NULL),
(7, 'Чизкейк малиновый', 4, 1, '50.00', 30, '140 г<br/>\r\nКлассический сырный десерт с маскарпоне и малиной', 1, 1, 1, 0, NULL),
(9, 'Inkerman Древний Херсонес', 3, 2, '200.00', 60, '0,75 л <br/>\r\nКрасное полусладкое вино. Украина\r\n* приобрести алкогольные напитки могут лица, достигшие совершеннолетия', 0, 0, 1, 0, NULL),
(10, 'Греческий', 2, 3, '79.00', 20, '225 г<br/>\r\nТоматы, сладкий перец, огурцы, микс салатов, сыр фета, красный лук, орегано, оливковое масло, соус Balsamic', 0, 1, 1, 0, NULL),
(12, 'Пицца от шефа', 1, 4, '145.00', 5, '450 г<br/>\r\nХамон, помидоры черри, пармезан, маскарпоне, моцарелла, сливки, руккола, орегано, соус Pomodoro', 0, 1, 1, 0, NULL),
(13, 'Пратайоло', 2, 5, '40.00', 4, '280 г<br/>\r\nКрем-суп грибной со сливками', 1, 1, 1, 0, NULL),
(14, 'Pepsi', 3, 6, '20.00', 5, '1 л\r\nГазированный напиток', 0, 0, 1, 0, NULL),
(15, 'Каппа маки', 2, 7, '40.00', 12, 'Ролл с огурцом', 0, 1, 1, 0, NULL),
(16, 'Супер мясная метровая', 1, 8, '300.00', 2, '1350 г<br/>\r\nОхотничьи колбаски, салями Пеперони, куриное филе  sous-vide, шампиньоны, соус Pomodoro и BBQ, моцарелла, орегано', 0, 1, 1, 0, NULL),
(17, 'Берлускони', 1, 9, '130.00', 4, '390 г<br/>\r\nСливочный соус из белых грибов и шампиньонов с трюфельным маслом, моцарелла, дор блю, орегано, лук', 1, 1, 1, 0, NULL),
(18, 'Пицца \"Эдуард\"', 1, 88, '100.00', 8, 'Фирменный соус, сыр, колбаса', 1, 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

DROP TABLE IF EXISTS `product_order`;
CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `products` text NOT NULL,
  `с_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `products`, `с_date`) VALUES
(7, 'Sergey', '+386656554544', '', 3, '{\"13\":2,\"2\":2,\"6\":2,\"7\":2}', '2017-10-14 21:35:45'),
(8, 'Sergey', '+386656554544', '', 3, '{\"13\":3,\"17\":6}', '2017-10-14 21:46:48'),
(9, 'User1', '+386656554544', '', 4, '{\"10\":2,\"3\":3,\"13\":3}', '2017-10-14 21:51:08'),
(10, 'Sergey', '+386656554544', '', 3, '{\"7\":1}', '2017-10-15 09:38:33');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'Sergey', 'myemail@mail.ua', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(4, 'User1', 'usermail@mail.ua', '25d55ad283aa400af464c76d713c07ad', NULL);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
