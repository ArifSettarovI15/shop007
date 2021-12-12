-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2021 г., 17:33
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `content_items`
--

CREATE TABLE `content_items` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `core_comments`
--

CREATE TABLE `core_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_status` int(1) NOT NULL DEFAULT 0,
  `comment_object_name` varchar(100) NOT NULL,
  `comment_object_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `comment_text` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  `comment_time` int(11) NOT NULL,
  `comment_rank` int(2) NOT NULL DEFAULT 0,
  `comment_data` varchar(2000) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_comments`
--

INSERT INTO `core_comments` (`comment_id`, `comment_status`, `comment_object_name`, `comment_object_id`, `user_id`, `comment_author`, `comment_text`, `comment_time`, `comment_rank`, `comment_data`) VALUES
(1, 1, 'shop_item', 0, 0, 'Иванов Иван', '<h5>Достоинства:</h5>\n<p>Достоинства есть</p>\n<h5>Недостатки:</h5>\n<p>Недостатков нет</p>\n<h5>Комментарий:</h5>\n<p>Краткость сестра таланта</p>', 1637566543, 4, 'a:0:{}'),
(2, 1, 'shop_item', 0, 0, 'Дмитрий Киселёв', '<h5>Достоинства:</h5>\n<p>Тяжелый, можно скинуть с балкона на орущих детей</p>\n<h5>Недостатки:</h5>\n<p>Тяжелый</p>\n<h5>Комментарий:</h5>\n<p>Уронил на ногу, перелом, 3 месяца больничного, крутой радиатор</p>', 1637567366, 5, 'a:0:{}'),
(3, 1, 'shop_item', 2, 0, 'Дмитрий Киселёв', '<h5>Достоинства:</h5>\n<p>Тяжелый, можно скинуть с балкона на орущих детей</p>\n<h5>Недостатки:</h5>\n<p>Тяжелый</p>\n<h5>Комментарий:</h5>\n<p>Уронил на ногу, перелом, 3 месяца больничного, крутой радиатор</p>', 1637567396, 5, 'a:0:{}'),
(4, 1, 'shop_item', 2, 0, 'Дмитрий Киселёв', '<h5>Достоинства:</h5>\n<p>Тяжелый, можно скинуть с балкона на орущих детей</p>\n<h5>Недостатки:</h5>\n<p>Тяжелый</p>\n<h5>Комментарий:</h5>\n<p>Уронил на ногу, перелом, 3 месяца больничного, крутой радиатор</p>', 1637567437, 5, 'a:0:{}'),
(5, 1, 'shop_item', 2, 0, 'Дмитрий Киселёв', '<h5>Достоинства:</h5>\n<p>Тяжелый, можно скинуть с балкона на орущих детей</p>\n<h5>Недостатки:</h5>\n<p>Тяжелый</p>\n<h5>Комментарий:</h5>\n<p>Уронил на ногу, перелом, 3 месяца больничного, крутой радиатор</p>', 1637567485, 5, 'a:0:{}'),
(6, 0, 'IRSAP TESI 30565/16 CL.10 RAL9005 черный', 1, 0, 'asdasd', '<h5>Преимущества</h5><p>asdsd</p><h5>Недостатки</h5><p>asdsdas</p><h5>Комментарий</h5><p>dadsda</p>', 1638025619, 4, 'a:0:{}'),
(7, 0, 'IRSAP TESI 30565/16 CL.10 RAL9005 черный', 1, 0, 'asdasd', '<h5>Преимущества</h5><p>asdsd</p><h5>Недостатки</h5><p>asdsdas</p><h5>Комментарий</h5><p>dadsda</p>', 1638025648, 4, 'a:0:{}'),
(8, 0, 'IRSAP TESI 30565/16 CL.10 RAL9005 черный', 1, 0, 'asdasd', '<h5>Преимущества</h5><p>asdsd</p><h5>Недостатки</h5><p>asdsdas</p><h5>Комментарий</h5><p>dadsda</p>', 1638025675, 4, 'a:0:{}'),
(9, 0, 'IRSAP TESI 30565/16 CL.10 RAL9005 черный', 1, 0, 'asdasd', '<h5>Преимущества</h5><p>asdsd</p><h5>Недостатки</h5><p>asdsdas</p><h5>Комментарий</h5><p>dadsda</p>', 1638025683, 4, 'a:0:{}');

-- --------------------------------------------------------

--
-- Структура таблицы `core_content`
--

CREATE TABLE `core_content` (
  `content_id` int(11) NOT NULL,
  `content_cat` int(11) NOT NULL DEFAULT 0,
  `content_status` int(1) NOT NULL DEFAULT 0,
  `content_title` varchar(250) NOT NULL,
  `content_url` varchar(250) NOT NULL,
  `content_type` varchar(50) NOT NULL DEFAULT 'page',
  `content_short` varchar(2000) NOT NULL DEFAULT '',
  `content_text_id` int(11) NOT NULL,
  `content_time` int(11) NOT NULL,
  `content_time_end` int(11) NOT NULL DEFAULT 0,
  `content_date` varchar(10) NOT NULL DEFAULT '',
  `content_thumb_id` int(11) NOT NULL DEFAULT 0,
  `content_thumb_id3` int(11) NOT NULL DEFAULT 0,
  `content_views` int(11) NOT NULL DEFAULT 0,
  `head_title` varchar(255) NOT NULL DEFAULT '',
  `head_desc` varchar(255) NOT NULL DEFAULT '',
  `head_keywords` varchar(255) NOT NULL DEFAULT '',
  `content_template` varchar(100) NOT NULL,
  `content_vendor_id` int(11) NOT NULL DEFAULT 0,
  `source_url` varchar(250) NOT NULL DEFAULT '',
  `content_dop` varchar(250) NOT NULL DEFAULT '',
  `content_sort` int(3) NOT NULL DEFAULT 5,
  `share_position` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_content`
--

INSERT INTO `core_content` (`content_id`, `content_cat`, `content_status`, `content_title`, `content_url`, `content_type`, `content_short`, `content_text_id`, `content_time`, `content_time_end`, `content_date`, `content_thumb_id`, `content_thumb_id3`, `content_views`, `head_title`, `head_desc`, `head_keywords`, `content_template`, `content_vendor_id`, `source_url`, `content_dop`, `content_sort`, `share_position`) VALUES
(1, 0, 1, 'Дизайнерские радиаторы в интерьере: за или против?', '2021/11/18/dizajnerskie-radiatory-v-interere-za-ili-protiv', 'articles', 'Впечатляющие декоративные возможности нестандартных батарей', 15, 1637244203, 0, '20211118', 0, 70, 0, '', '', '', '', 0, '', '', 5, 0),
(2, 0, 1, 'Политика сайта', 'private-policy', 'pages', '', 17, 1637306082, 0, '20211119', 0, 0, 0, '', '', '', '', 0, '', '', 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_content_views`
--

CREATE TABLE `core_content_views` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_content_views`
--

INSERT INTO `core_content_views` (`id`, `count`) VALUES
(1, 12),
(2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `core_files`
--

CREATE TABLE `core_files` (
  `file_id` int(11) NOT NULL,
  `file_title` varchar(250) NOT NULL DEFAULT '',
  `file_name` varchar(150) NOT NULL,
  `file_module` varchar(50) NOT NULL DEFAULT 'core',
  `file_user_id` int(11) NOT NULL DEFAULT 0,
  `file_type` varchar(50) NOT NULL DEFAULT '',
  `file_folder` varchar(200) NOT NULL DEFAULT '',
  `file_sizes` varchar(500) NOT NULL,
  `file_time` int(11) NOT NULL DEFAULT 0,
  `file_webp` int(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_files`
--

INSERT INTO `core_files` (`file_id`, `file_title`, `file_name`, `file_module`, `file_user_id`, `file_type`, `file_folder`, `file_sizes`, `file_time`, `file_webp`) VALUES
(1, '', 'S89KDUyp.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635764391, 0),
(2, '', '0KnhRKdZ.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767411, 0),
(3, '', '7ELxcndy.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767415, 0),
(4, '', 'Q5qtjUfc.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767826, 0),
(5, '', 'PWOhZE9L.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767913, 0),
(6, '', 'vcZ6Tdk1.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767917, 0),
(7, '', 'amRr9T0c.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767945, 0),
(8, '', '4rLnE8OR.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635767976, 0),
(9, '', 'NZYr7P5p.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768016, 0),
(10, '', 'dWURnCZQ.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768020, 0),
(11, '', 'Y1r0c63m.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768047, 0),
(12, '', 'MVYVCkdX.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768052, 0),
(13, '', 's0mJbJQs.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768077, 0),
(14, '', '8aYVtLj5.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768083, 0),
(15, '', 'UOpTQx93.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768104, 0),
(16, '', 'vhaXXVrS.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768127, 0),
(17, '', 'DFTFYjVa.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768163, 0),
(18, '', 'w3yaJQIF.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768175, 0),
(19, '', 'H87GApLa.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768194, 0),
(20, '', 'hICgLhY4.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768198, 0),
(21, '', 'zhGtpU1F.jpg', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768226, 0),
(22, '', 'UEAC3RzC.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635768232, 0),
(23, '', 'AxzY4ftf.jpg', 'settings', 10117, 'image', 'main_slider', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635769954, 0),
(24, '', 'IqfpHM9P.jpg', 'settings', 10117, 'image', 'main_slider', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635772852, 0),
(25, '', 'TAyvrAkc.jpg', 'settings', 10117, 'image', 'main_slider', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635772919, 0),
(26, '', 'b9vtrgsV.png', 'shop', 10117, 'image', 'products', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635774781, 0),
(27, '', 'jzI6K40y.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775403, 0),
(28, '', 'g44U2xjN.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775412, 0),
(29, '', '7ft0X37Y.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775419, 0),
(30, '', 'Q4gdchUb.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775428, 0),
(31, '', 'vjyqvQs4.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775435, 0),
(32, '', '7ZNa3p02.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775458, 0),
(33, '', '7hdx3jbV.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775466, 0),
(34, '', 'BKZnZkZk.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775473, 0),
(35, '', 'KFQyjmWc.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775479, 0),
(36, '', 'jQKzryZ3.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775487, 0),
(37, '', '8MW2Sxx9.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775498, 0),
(38, '', 'D8fwjUSK.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775507, 0),
(39, '', 'I8xGYcMb.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775514, 0),
(40, '', 'kk4ZC0Cg.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775522, 0),
(41, '', 'vkJHYB0I.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775529, 0),
(42, '', 'nZHqkFm5.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775544, 0),
(43, '', 'vUYX4fhP.png', 'sprav', 10117, 'image', 'sprav_', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775552, 0),
(44, '', 'HXMjvtcK.png', 'sprav', 10117, 'image', 'sprav_6', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635775587, 0),
(45, '', '7sqnrhpE.png', 'shop', 10117, 'image', 'products', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635855109, 0),
(46, '', 'FjbKxzsX.png', 'shop', 10117, 'image', 'product_photos', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635855111, 0),
(47, '', 'NqdpHT6L.png', 'shop', 10117, 'image', 'product_photos', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635855115, 0),
(48, '', 'KhMw0ytO.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932278, 0),
(49, '', '07kphAA3.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932738, 0),
(50, '', 'SLyqvwLv.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932754, 0),
(51, '', 'gt4g8pax.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932760, 0),
(52, '', 'an4FKzT3.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932767, 0),
(53, '', 'tLGPd4X2.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932776, 0),
(54, '', 'M2TRpd9B.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932782, 0),
(55, '', 'LJZjghk1.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932803, 0),
(56, '', 'rTL5nmcJ.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932817, 0),
(57, '', 'KhZVaPTr.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932823, 0),
(58, '', 'M3fW6QtO.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1635932829, 0),
(59, '', 'pO93SL9B.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1636364568, 0),
(60, '', 'TFqm0sff.jpg', 'settings', 10117, 'image', 'about', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637137666, 0),
(61, '', 'K99IVYfz.jpg', 'settings', 10117, 'image', 'about', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637137672, 0),
(62, '', '3L0DcHMV.jpg', 'settings', 10117, 'image', 'about', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637137677, 0),
(63, '', 'gGtXGUFc.jpg', 'settings', 10117, 'image', 'about', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637137683, 0),
(64, '', 'aT7j2fKC.png', 'settings', 10117, 'image', 'payment', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637151906, 0),
(65, '', '1SZTTJQH.png', 'settings', 10117, 'image', 'payment', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637151914, 0),
(66, '', 'jRVpNKhZ.png', 'settings', 10117, 'image', 'delivery_payment', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637152669, 0),
(67, '', '7HCOYFwb.png', 'settings', 10117, 'image', 'delivery_payment', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637152677, 0),
(68, '', 'V4fK3cJa.jpg', 'settings', 10117, 'image', 'cooperate_block', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637222125, 0),
(69, '', '3dGKbQZM.jpg', 'settings', 10117, 'image', 'cooperate_block', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637222128, 0),
(70, '', 'xCJjRjfd.jpg', 'content', 10117, 'image', 'content/articles', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637242496, 0),
(71, '', 'yPNJbYq9.jpg', 'settings', 10117, 'image', 'main_slider', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637318336, 0),
(72, '', '8zBqLIWH.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637567767, 0),
(73, '', 'IK5fzLqq.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637567824, 0),
(74, '', 'cDdz37Jw.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637567841, 0),
(75, '', '44rVkX78.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637568004, 0),
(76, '', '2ncnOSWI.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637568032, 0),
(77, '', 'r0I0N3jW.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637568953, 0),
(78, '', 'DgcW4W41.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637569049, 0),
(79, '', 'M9aDvODr.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637569063, 0),
(80, '', 'CyMAPIMw.png', 'shop', 10117, 'image', 'vendors', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637569076, 0),
(81, '', 'GOGa4Ghb.png', 'shop', 10117, 'image', 'products', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637571455, 0),
(82, '', 'PWVbQLLv.png', 'shop', 10117, 'image', 'product_photos', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637571459, 0),
(83, '', 'scSvtM1V.png', 'shop', 10117, 'image', 'products', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637571813, 0),
(84, '', 'X1BUpKQS.png', 'shop', 10117, 'image', 'product_photos', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637571818, 0),
(85, '', 'SXICvVMw.png', 'shop', 10117, 'image', 'products', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637571952, 0),
(86, '', 'bOvzpzEn.png', 'shop', 10117, 'image', 'product_photos', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637571957, 0),
(87, '', 'HX4Ott7Y.png', 'shop', 10117, 'image', 'products', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637666186, 0),
(88, '', 'Of3sn71m.png', 'shop', 10117, 'image', 'product_photos', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637666192, 0),
(89, '', 'aFAAZH4U.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637672406, 0),
(90, '', 'kqI69810.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637672412, 0),
(91, '', 'fd8rC3mM.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637672418, 0),
(92, '', 'wNsJRXMB.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637672424, 0),
(93, '', 'mw0pLg6h.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637672430, 0),
(94, '', 'TLpvCj43.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637672434, 0),
(95, '', 'pdnZZf1Y.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637674568, 0),
(96, '', '7BRjB1QV.jpg', 'settings', 10117, 'image', 'instagram', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637674572, 0),
(97, '', 'CWCB2pHK.jpg', 'settings', 10117, 'image', 'main_slider', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637677138, 0),
(98, '', 'Qnm85gb9.png', 'settings', 10117, 'image', 'main_slider', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637677145, 0),
(99, '', 'dOFCC4qa.png', 'shop', 10117, 'image', 'cats', 'a:5:{i:0;s:5:\"small\";i:1;s:6:\"medium\";i:2;s:6:\"normal\";i:3;s:5:\"large\";i:4;s:8:\"original\";}', 1637678138, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_files_ids`
--

CREATE TABLE `core_files_ids` (
  `object` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_files_ids`
--

INSERT INTO `core_files_ids` (`object`, `item_id`, `file_id`, `sort`) VALUES
('product_photos', 7, 88, 0),
('product_photos', 2, 46, 0),
('product_photos', 2, 47, 1),
('product_photos', 3, 82, 0),
('product_photos', 4, 84, 0),
('product_photos', 6, 86, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_lang`
--

CREATE TABLE `core_lang` (
  `name` varchar(50) NOT NULL,
  `category` enum('global','users') NOT NULL DEFAULT 'global',
  `ru` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `core_log_errors`
--

CREATE TABLE `core_log_errors` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority` varchar(50) NOT NULL DEFAULT 'normal',
  `type` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(150) NOT NULL DEFAULT '',
  `errortext` text NOT NULL,
  `error_code` varchar(75) NOT NULL DEFAULT '',
  `page_url` varchar(250) NOT NULL DEFAULT '',
  `referer` varchar(250) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `user_agent` varchar(250) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_log_errors`
--

INSERT INTO `core_log_errors` (`id`, `time`, `priority`, `type`, `title`, `errortext`, `error_code`, `page_url`, `referer`, `ip`, `user_agent`, `user_id`) VALUES
(173, '2021-12-12 13:32:53', 'high', 'db', 'Ошибка базы данных', 'Database error:\r\n            Invalid SQL:\r\nSELECT   shop_items.*, `shop_item_basket`.* FROM \r\n        `shop_items`\r\n        \r\n        LEFT JOIN `shop_item_basket` ON shop_item_basket.`basket_item_id` = `shop_items`.`item_id`\r\n        WHERE `shop_aitem_basket`.basket_sessionhash=\'de4051c6a8a43a65317ebe27f85c168c\' AND basket_id\r\n        GROUP BY basket_id;\r\n            MySQL Error   : Unknown column \'shop_aitem_basket.basket_sessionhash\' in \'where clause\'<br/>\r\n            Error Number  : 1054<br/>\r\n            Classname     : DatabaseClass<br/>\r\n            Script        : http://project.loc/basket/', 'database_error', 'http://project.loc/basket/', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_options`
--

CREATE TABLE `core_options` (
  `option_name` varchar(50) NOT NULL,
  `option_value` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `core_routes`
--

CREATE TABLE `core_routes` (
  `id` int(11) NOT NULL,
  `regexp_value` varchar(250) NOT NULL DEFAULT '',
  `value` varchar(250) NOT NULL DEFAULT '',
  `module` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL DEFAULT '',
  `rules` varchar(2000) NOT NULL,
  `twig` varchar(100) NOT NULL DEFAULT '',
  `sort` int(4) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_routes`
--

INSERT INTO `core_routes` (`id`, `regexp_value`, `value`, `module`, `action`, `rules`, `twig`, `sort`, `parent_id`, `level`) VALUES
(7, '', '', 'static', '/home.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:0:\"\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:5:\"index\";s:6:\"static\";s:1:\"1\";}}', 'static/index.html.twig', 142, 0, 0),
(12, 'login', 'login', 'users', '/auth/login.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"login\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:5:\"login\";s:6:\"static\";s:1:\"1\";}}', 'users/auth/login.html.twig', 59, 0, 0),
(13, 'logout', 'logout', 'users', '/auth/logout.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"logout\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:6:\"logout\";s:6:\"static\";s:1:\"1\";}}', '', 60, 0, 0),
(14, 'forgot', 'forgot', 'users', '/auth/forgot.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"forgot\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:6:\"forgot\";s:6:\"static\";s:1:\"1\";}}', 'users/auth/forgot.html.twig', 62, 0, 0),
(15, 'register', 'register', 'users', '/auth/register.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:8:\"register\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:8:\"register\";s:6:\"static\";s:1:\"1\";}}', 'users/auth/register.html.twig', 61, 0, 0),
(16, 'confirm/([0-9a-z]*)', '([0-9a-z]*)', 'users', '/auth/confirm.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:11:\"([0-9a-z]*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"hash_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";i:1;}i:1;a:4:{s:4:\"rule\";s:0:\"\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:7:\"confirm\";s:6:\"static\";s:1:\"1\";}}', 'users/auth/confirm.html.twig', 65, 169, 1),
(17, 'recover/([0-9a-z]*)', 'recover/([0-9a-z]*)', 'users', '/auth/recover.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:7:\"recover\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:7:\"recover\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:11:\"([0-9a-z]*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"hash_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";i:1;}}', 'users/auth/recover.html.twig', 63, 0, 0),
(20, 'manager', 'manager', 'manager', '/home.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:7:\"manager\";s:6:\"static\";s:1:\"1\";}}', 'manager/manager.html.twig', 67, 0, 0),
(72, 'manager/routes', 'routes', 'routes', '/view.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"routes\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"view\";s:6:\"static\";s:1:\"1\";}}', 'routes/manager/view.html.twig', 135, 20, 1),
(73, 'manager/routes/add', 'add', 'routes', '/add.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:3:\"add\";s:6:\"static\";s:1:\"1\";}}', 'routes/manager/add.html.twig', 136, 72, 2),
(76, 'manager/routes/edit/([0-9]*)', 'edit/([0-9]*)', 'routes', '/add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";i:1;}}', 'routes/manager/add.html.twig', 137, 72, 2),
(189, 'manager/users', 'users', 'users', '/manage/list.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"users\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:10:\"users_list\";s:6:\"static\";s:1:\"1\";}}', 'users/manage/manage_users.html.twig', 141, 20, 1),
(169, 'confirm', 'confirm', 'users', '/auth/confirm.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"confirm\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:7:\"confirm\";s:6:\"static\";s:1:\"1\";}}', 'users/auth/confirm.html.twig', 64, 0, 0),
(167, 'assets/js/lang/(.*).js', 'assets/js/lang/(.*).js', 'lang', '/js.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:6:\"assets\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:7:\"js_lang\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:2:\"js\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"lang\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:7:\"(.*).js\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:9:\"lang_code\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";i:1;}}', 'lang/js.html.twig', 66, 0, 0),
(492, 'subscribe', 'subscribe', 'static', '/subscribe.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:9:\"subscribe\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 26, 0, 0),
(194, '(articles|blog)', '(articles|blog)', 'content', '/news.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:15:\"(articles|blog)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:12:\"content_type\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'content/news_list.html.twig', 54, 0, 0),
(536, '(.*)/page/([0-9]*)', 'page/([0-9]*)', 'shop', '/catalog/top_cat.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"page\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:4:\"page\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'shop/catalog/top_cat.twig', 148, 449, 1),
(195, '(articles|blog)/(.*).html', '(.*).html', 'content', '/view.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:9:\"(.*).html\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:11:\"content_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'content/view_page.html.twig', 55, 194, 1),
(490, 'manager/users/view/([0-9]*)', 'manager/users/view/([0-9]*)', 'users', '/manage/view.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"users\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:7:\"user_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'users/manage/view.twig', 25, 0, 0),
(491, 'orders/([0-9]*)/bill', 'bill', 'shop', '/order/bill.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:4:\"bill\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/order/bill.twig', 44, 310, 2),
(269, 'manager/content', 'content', 'content', '/manager/list.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"content\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'content/manager/list.html.twig', 105, 20, 1),
(270, 'manager/content/([^/]+)', '([^/]+)', 'content', '/manager/list.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:12:\"content_type\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'content/manager/list.html.twig', 108, 269, 2),
(271, 'manager/content/add', 'add', 'content', '/manager/add.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'content/manager/content_add.html.twig', 106, 269, 2),
(272, 'manager/content/edit/([0-9]*)', 'edit/([0-9]*)', 'content', '/manager/add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:10:\"content_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'content/manager/content_add.html.twig', 107, 269, 2),
(203, 'files/upload', 'upload', 'files', '/upload.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"upload\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:11:\"upload_file\";s:6:\"static\";s:1:\"1\";}}', '', 53, 206, 1),
(205, 'files/delete', 'delete', 'files', '/delete.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"delete\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:11:\"delete_file\";s:6:\"static\";s:1:\"1\";}}', '', 52, 206, 1),
(206, 'files', 'files', 'files', '/list.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"files\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"list\";s:6:\"static\";s:1:\"1\";}}', 'files/list.html.twig', 49, 0, 0),
(207, 'files/list', 'list', 'files', '/list.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:4:\"list\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'files/list.html.twig', 51, 206, 1),
(208, 'files/get', 'get', 'files', '/get.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"get\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 50, 206, 1),
(258, 'manager/shop', 'shop', 'shop', '/manage/index.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/index.html.twig', 110, 20, 1),
(259, 'manager/shop/cats', 'cats', 'shop', '/manage/cats.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:4:\"cats\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/cats.html.twig', 129, 258, 2),
(260, 'manager/shop/cats/add', 'add', 'shop', '/manage/cats_add.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/cats_add.html.twig', 130, 259, 3),
(261, 'manager/shop/cats/edit/([0-9]*)', 'edit/([0-9]*)', 'shop', '/manage/cats_add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";i:1;}}', 'shop/manage/cats_add.html.twig', 131, 259, 3),
(282, 'manager/shop/parser', 'parser', 'shop', '/manage/parser.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"parser\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 125, 258, 2),
(281, 'manager/files/sort_media', 'files/sort_media', 'files', '/sort_media.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:5:\"files\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:10:\"sort_media\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 104, 20, 1),
(264, '(.*).html', '(.*).html', 'content', '/view.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:9:\"(.*).html\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:10:\"conent_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'content/view_page.html.twig', 146, 0, 0),
(315, 'manager/shop/vendors/edit/([0-9]*)', 'vendors/edit/([0-9]*)', 'shop', '/manage/vendors_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:7:\"vendors\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:9:\"vendor_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/vendors_add.html.twig', 121, 258, 2),
(266, 'manager/shop/products', 'products', 'shop', '/manage/products.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:8:\"products\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/products.html.twig', 126, 258, 2),
(267, 'manager/shop/products/add', 'add', 'shop', '/manage/products_add.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/products_add.html.twig', 127, 266, 3),
(268, 'manager/shop/products/edit/([0-9]*)', 'edit/([0-9]*)', 'shop', '/manage/products_add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/products_add.html.twig', 128, 266, 3),
(273, 'manager/content/([^/]+)/add', '([^/]+)/add', 'content', '/manager/add.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:12:\"content_type\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'content/manager/content_add.html.twig', 109, 269, 2),
(274, '([^/]+).html', '([^/]+).html', 'content', '/view.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:12:\"([^/]+).html\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:11:\"content_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'content/view_page.html.twig', 144, 0, 0),
(275, '(articles|blog)/page/([0-9]*)', 'page/([0-9]*)', 'content', '/news.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"page\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:4:\"page\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'content/news_list.html.twig', 57, 194, 1),
(254, 'basket', 'basket', 'shop', '/order/basket.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"basket\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/order/basket.html.twig', 47, 0, 0),
(255, 'fav', 'fav', 'shop', '/order/fav.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"fav\";s:4:\"name\";s:3:\"fav\";s:5:\"value\";s:1:\"1\";s:6:\"static\";s:1:\"1\";}}', 'shop/order/fav.twig', 48, 0, 0),
(257, 'orders', 'orders', 'shop', '/order/orders.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"orders\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/order/orders.html.twig', 41, 0, 0),
(252, 'goods/([0-9]*)', 'goods/([0-9]*)', 'shop', '/product/view.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:5:\"goods\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:7:\"item_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/product/view.html.twig', 38, 0, 0),
(313, 'manager/shop/filters', 'filters', 'shop', '/manage/filters.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"filters\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/filters.html.twig', 118, 258, 2),
(18, 'change_email/([0-9a-z]*)', 'change_email/([0-9a-z]*)', 'users', '/auth/change_email.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:12:\"change_email\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:11:\"([0-9a-z]*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"hash_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'users/auth/change_email.html.twig', 58, 0, 0),
(314, 'manager/shop/vendors', 'vendors', 'shop', '/manage/vendors.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"vendors\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/vendors.html.twig', 119, 258, 2),
(285, 'manager/settings', 'settings', 'settings', '/view.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:8:\"settings\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'settings/manager/view.html.twig', 95, 20, 1),
(286, 'manager/settings/add', 'add', 'settings', '/add.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'settings/manager/add.html.twig', 96, 285, 2),
(287, 'manager/settings/edit/([0-9]*)', 'edit/([0-9]*)', 'settings', '/add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'settings/manager/add.html.twig', 98, 285, 2),
(288, 'manager/settings/view/([0-9]*)', 'view/([0-9]*)', 'settings', '/view_group.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"group_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'settings/manager/view_group.html.twig', 97, 285, 2),
(289, 'manager/settings/values/([0-9]*)/add', 'values/([0-9]*)/add', 'settings', '/add_value.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:6:\"values\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:9:\"parent_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'settings/manager/add_value.html.twig', 102, 285, 2),
(290, 'manager/settings/values/([0-9]*)/edit/([^/]+)', 'values/([0-9]*)/edit/([^/]+)', 'settings', '/add_value.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:6:\"values\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:9:\"parent_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:8:\"line_key\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'settings/manager/add_value.html.twig', 103, 285, 2),
(291, 'manager/settings/([0-9]*)/fields/add', '([0-9]*)/fields/add', 'settings', '/add_field.php', 'a:3:{i:0;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"group_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:6:\"fields\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'settings/manager/add_field.html.twig', 99, 285, 2),
(292, 'manager/settings/([0-9]*)/fields/edit/([0-9]*)', '([0-9]*)/fields/edit/([0-9]*)', 'settings', '/add_field.php', 'a:4:{i:0;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"group_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:6:\"fields\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'settings/manager/add_field.html.twig', 100, 285, 2),
(293, 'manager/settings/fields/([0-9]*)', 'fields/([0-9]*)', 'settings', '/view_group_fields.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:6:\"fields\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"group_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'settings/manager/view_group_fields.html.twig', 101, 285, 2),
(296, 'callback', 'callback', 'static', '/callback.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:8:\"callback\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 46, 0, 0),
(297, 'manager/shop/orders', 'orders', 'shop', '/manage/orders.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"orders\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/orders.html.twig', 123, 258, 2),
(298, 'manager/shop/orders/view/([0-9]*)', 'view/([0-9]*)', 'shop', '/manage/order_view.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/order_view.html.twig', 124, 297, 3),
(301, 'manager/shop/comments', 'comments', 'shop', '/manage/comments.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:8:\"comments\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/comments.html.twig', 122, 258, 2),
(336, 'brands', 'brands', 'shop', '/brands/brands.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"brands\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/brands/brands.twig', 40, 0, 0),
(316, 'manager/shop/vendors/add', 'vendors/add', 'shop', '/manage/vendors_add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:7:\"vendors\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/vendors_add.html.twig', 120, 258, 2),
(310, 'orders/([0-9]*)', '([0-9]*)', 'shop', '/order/order_view.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/order/order_view.twig', 43, 257, 1),
(312, 'orders/page/([0-9]*)', 'page/([0-9]*)', 'shop', '/order/orders.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"page\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:4:\"page\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/order/orders.html.twig', 42, 257, 1),
(504, 'manager/import177', 'manager/import177', 'shop', '/manage/import.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:9:\"import177\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 24, 0, 0),
(328, 'manager/shop/types', 'types', 'shop', '/manage/types.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"types\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/types.html.twig', 117, 258, 2),
(330, 'manager/sprav/([0-9]*)/edit/([0-9]*)', 'sprav/([0-9]*)/edit/([0-9]*)', 'sprav', '/sprav_values_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:5:\"sprav\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"sprav_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:4:\"svid\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'sprav/manage/sprav_values_add.twig', 140, 20, 1),
(331, 'manager/sprav/([0-9]*)/add', 'sprav/([0-9]*)/add', 'sprav', '/sprav_values_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:5:\"sprav\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"sprav_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'sprav/manage/sprav_values_add.twig', 139, 20, 1),
(332, 'manager/sprav/([0-9]*)/view', 'sprav/([0-9]*)/view', 'sprav', '/sprav_values.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:5:\"sprav\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"sprav_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'sprav/manage/sprav_values.twig', 132, 20, 1),
(333, 'manager/sprav/edit/([0-9]*)', 'sprav/edit/([0-9]*)', 'sprav', '/sprav_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:5:\"sprav\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:8:\"sprav_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'sprav/manage/sprav_add.twig', 134, 20, 1),
(334, 'manager/sprav/add', 'sprav/add', 'sprav', '/sprav_add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:5:\"sprav\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'sprav/manage/sprav_add.twig', 133, 20, 1),
(335, 'manager/sprav', 'sprav', 'sprav', '/sprav.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"sprav\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'sprav/manage/sprav.twig', 138, 20, 1),
(342, '404', '404', 'static', '/404.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"404\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'static/404.twig', 143, 0, 0),
(344, 'goods/([0-9]*)/([^/]+)', 'goods/([0-9]*)/([^/]+)', 'shop', '/product/view.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:5:\"goods\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:7:\"item_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:9:\"offer_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'shop/product/view.html.twig', 37, 0, 0),
(345, 'brands/(.*)', 'brands/(.*)', 'shop', '/brands/brand.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:6:\"brands\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:4:\"(.*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:9:\"brand_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/brands/vendor.twig', 39, 0, 0),
(485, 'product/([^/]+)', 'product/([^/]+)', 'shop', '/product/view.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:7:\"product\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:8:\"item_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/product/view.html.twig', 27, 0, 0),
(449, '(.*)', '(.*)', 'shop', '/catalog/view.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:4:\"(.*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"cat_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:0:\"\";s:4:\"name\";s:10:\"direct_cat\";s:5:\"value\";s:1:\"1\";s:6:\"static\";s:1:\"1\";}}', 'shop/catalog/view.html.twig', 147, 0, 0),
(357, 'oauth', 'oauth', 'users', '/auth/oauth.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"oauth\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 36, 0, 0),
(361, 'manager/shop/subscribes', 'shop/subscribes', 'shop', '/manage/subscibes.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:10:\"subscribes\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/subscibes.twig', 91, 20, 1),
(362, 'manager/shop/subscribes/send', 'shop/subscribes/send', 'shop', '/manage/subscibes_send.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:10:\"subscribes\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"send\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/subscibes_send.twig', 94, 20, 1),
(363, 'manager/shop/subscribes/add', 'shop/subscribes/add', 'shop', '/manage/subscribe_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:10:\"subscribes\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/subscribe_add.twig', 92, 20, 1),
(364, 'manager/shop/subscribes/edit/(.*)', 'shop/subscribes/edit/(.*)', 'shop', '/manage/subscribe_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:10:\"subscribes\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:4:\"(.*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:5:\"email\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/subscribe_add.twig', 93, 20, 1),
(505, 'manager/shop/offers/([0-9]*)/view', '([0-9]*)/view', 'shop', '/manage/offers.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:7:\"item_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/offers.twig', 73, 498, 2),
(366, 'manager/shop/delivery/([0-9]*)/print', '([0-9]*)/print', 'shop', '/manage/order_view.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"print\";s:4:\"name\";s:6:\"action\";s:5:\"value\";s:5:\"print\";s:6:\"static\";s:1:\"1\";}}', '', 57, 308, 3),
(370, 'promo', 'promo', 'static', '/promo.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:5:\"promo\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'static/promo.twig', 31, 0, 0),
(506, 'manager/chat', 'chat', 'shop', '/manage/chat.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:4:\"chat\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/chat.twig', 68, 20, 1),
(494, 'manager/shop/delivery/cities/add', 'shop/delivery/cities/add', 'shop', '/manage/delivery_cities_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:8:\"delivery\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:6:\"cities\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/delivery_cities_add.twig', 70, 20, 1),
(481, '(articles|blog)/([^/]+)', '([^/]+)', 'content', '/news.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:12:\"news_cat_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'content/news_list.html.twig', 56, 194, 1),
(483, '([^/]+)/([^/]+)', '([^/]+)/([^/]+)', 'shop', '/product/view.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"cat_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:8:\"item_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'shop/product/view.html.twig', 149, 0, 0),
(523, 'manager/shop/complectations', 'manager/shop/complectations', 'shop', '/manage/complectations.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:14:\"complectations\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/complectations.twig', 12, 0, 0),
(495, 'manager/shop/delivery/cities/edit/([0-9]*)', 'shop/delivery/cities/edit/([0-9]*)', 'shop', '/manage/delivery_cities_add.php', 'a:5:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:8:\"delivery\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:6:\"cities\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:4;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/delivery_cities_add.twig', 71, 20, 1),
(380, 'manager/shop/cats/tree', 'manager/shop/cats/tree', 'shop', '/manage/cats_tree.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"cats\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"tree\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/cats_tree.twig', 32, 0, 0),
(381, 'manager/shop/errors', 'shop/errors', 'shop', '/manage/errors.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:6:\"errors\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/errors.twig', 90, 20, 1),
(502, 'manager/users/add', 'users/add', 'users', '/manage/add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:5:\"users\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'users/manage/add.html.twig', 76, 20, 1),
(503, 'manager/users/edit/([0-9]*)', 'users/edit/([0-9]*)', 'users', '/manage/add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:5:\"users\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'users/manage/add.html.twig', 77, 20, 1),
(501, 'manager/shop/offers/add/([0-9]*)', 'shop/offers/add/([0-9]*)', 'shop', '/manage/offers_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:6:\"offers\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:10:\"product_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/offers_add.twig', 74, 20, 1),
(440, 'manager/seo/edit/([0-9]*)', 'manager/seo/edit/([0-9]*)', 'seo', '/manager/add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"seo\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'seo/manager/seo_add.html.twig', 35, 0, 0),
(439, 'manager/seo/add', 'manager/seo/add', 'seo', '/manager/add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"seo\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'seo/manager/seo_add.html.twig', 34, 0, 0),
(438, 'manager/seo', 'manager/seo', 'seo', '/manager/list.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"seo\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'seo/manager/list.html.twig', 33, 0, 0),
(441, 'manager/shop/delivery', 'shop/delivery', 'shop', '/manage/delivery.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:8:\"delivery\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/delivery.html.twig', 87, 20, 1),
(442, 'manager/shop/delivery/add', 'shop/delivery/add', 'shop', '/manage/delivery_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:8:\"delivery\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/delivery_add.twig', 88, 20, 1),
(443, 'manager/shop/delivery/edit/([0-9]*)', 'shop/delivery/edit/([0-9]*)', 'shop', '/manage/delivery_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:8:\"delivery\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/delivery_add.twig', 89, 20, 1),
(493, 'manager/shop/delivery/cities', 'shop/delivery/cities', 'shop', '/manage/delivery_cities.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:8:\"delivery\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:6:\"cities\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/delivery_cities.twig', 69, 20, 1),
(448, 'catalog', 'catalog', 'shop', '/catalog/main.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"catalog\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/catalog/main.twig', 30, 0, 0),
(450, '(.*)/([^/]+).html', '(.*)/([^/]+).html', 'shop', '/product/view.php', 'a:2:{i:0;a:6:{s:4:\"rule\";s:4:\"(.*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"cat_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:6:{s:4:\"rule\";s:12:\"([^/]+).html\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:8:\"item_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'shop/product/view.html.twig', 145, 0, 0),
(476, 'manager/shop/suppliers', 'suppliers', 'shop', '/manage/suppliers.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:9:\"suppliers\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/suppliers.html.twig', 111, 258, 2),
(477, 'manager/shop/suppliers/add', 'suppliers/add', 'shop', '/manage/suppliers_add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:9:\"suppliers\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/suppliers_add.html.twig', 112, 258, 2),
(498, 'manager/shop/offers', 'shop/offers', 'shop', '/manage/offers.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:6:\"offers\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/offers.twig', 72, 20, 1),
(500, 'manager/shop/offers/edit/([0-9]*)', 'shop/offers/edit/([0-9]*)', 'shop', '/manage/offers_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:6:\"offers\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/offers_add.twig', 75, 20, 1),
(455, 'manager/shop/parts', 'shop/parts', 'shop', '/manage/parts.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"parts\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/parts.twig', 84, 20, 1),
(456, 'manager/shop/parts/add', 'shop/parts/add', 'shop', '/manage/parts_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"parts\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/parts_add.twig', 85, 20, 1),
(457, 'manager/shop/parts/edit/([0-9]*)', 'shop/parts/edit/([0-9]*)', 'shop', '/manage/parts_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"parts\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:7:\"part_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/parts_add.twig', 86, 20, 1),
(458, 'profile', 'profile', 'users', '/profile/profile.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"profile\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'users/profile/profile.twig', 28, 0, 0),
(460, 'profile/edit', 'edit', 'users', '/profile/profile_edit.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'users/profile/profile_edit.twig', 29, 458, 1),
(462, 'manager/shop/notify', 'notify', 'shop', '/manage/notify.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:6:\"notify\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/notify.twig', 114, 258, 2),
(463, 'manager/shop/notify/edit/([0-9]*)', 'notify/edit/([0-9]*)', 'shop', '/manage/notify_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:6:\"notify\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/notify_add.twig', 116, 258, 2),
(464, 'manager/shop/notify/add', 'notify/add', 'shop', '/manage/notify_add.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:6:\"notify\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/notify_add.twig', 115, 258, 2),
(465, 'manager/shop/banners', 'shop/banners', 'shop', '/manage/banners.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:7:\"banners\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/banners.twig', 81, 20, 1),
(466, 'manager/shop/banners/add', 'shop/banners/add', 'shop', '/manage/banners_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:7:\"banners\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/banners_add.twig', 82, 20, 1),
(467, 'manager/shop/banners/edit/([0-9]*)', 'shop/banners/edit/([0-9]*)', 'shop', '/manage/banners_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:7:\"banners\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/banners_add.twig', 83, 20, 1),
(470, 'orders/(.*)', '(.*)', 'shop', '/order/order_view.php', 'a:1:{i:0;a:6:{s:4:\"rule\";s:4:\"(.*)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:9:\"order_key\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/order/order_view.twig', 45, 257, 1),
(471, 'manager/shop/home-blocks', 'shop/home-blocks', 'shop', '/manage/home-blocks.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:11:\"home-blocks\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/home-blocks.twig', 80, 20, 1),
(472, 'manager/shop/clone/([0-9]*)', 'shop/clone/([0-9]*)', 'shop', '/manage/products_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:5:\"clone\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"clone\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:7:\"item_id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', '', 79, 20, 1),
(473, 'manager/notify_admin', 'notify_admin', 'shop', '/manage/notify_admin.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:12:\"notify_admin\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 78, 20, 1),
(478, 'manager/shop/suppliers/edit/([0-9]*)', 'suppliers/edit/([0-9]*)', 'shop', '/manage/suppliers_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:9:\"suppliers\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/suppliers_add.html.twig', 113, 258, 2),
(517, 'manager/faqs', 'manager/faqs', 'shop', '/manage/faqs.php', 'a:2:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"faqs\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/faqs.twig', 18, 0, 0),
(518, 'manager/faqs/add', 'manager/faqs/add', 'shop', '/manage/faqs_add.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"faqs\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/faqs_add.twig', 19, 0, 0),
(519, 'manager/faqs/view/([0-9]*)', 'manager/faqs/view/([0-9]*)', 'shop', '/manage/faqs_list.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"faqs\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/faq_list.twig', 21, 0, 0),
(520, 'manager/faqs/view/([0-9]*)/add', 'add', 'shop', '/manage/faqs_list_add.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/faq_list_add.twig', 22, 519, 1),
(521, 'manager/faqs/view/([0-9]*)/edit/([0-9]*)', 'manager/faqs/view/([0-9]*)/edit/([0-9]*)', 'shop', '/manage/faqs_list_add.php', 'a:6:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"faqs\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"view\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:4;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:5;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:3:\"fid\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'shop/manage/faq_list_add.twig', 23, 0, 0);
INSERT INTO `core_routes` (`id`, `regexp_value`, `value`, `module`, `action`, `rules`, `twig`, `sort`, `parent_id`, `level`) VALUES
(522, 'manager/faqs/edit/([0-9]*)', 'manager/faqs/edit/([0-9]*)', 'shop', '/manage/faqs_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"faqs\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/faqs_add.twig', 20, 0, 0),
(524, 'manager/shop/reviews', 'manager/shop/reviews', 'shop', '/manage/reviews.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:7:\"reviews\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/reviews.twig', 15, 0, 0),
(525, 'manager/shop/reviews/add', 'manager/shop/reviews/add', 'shop', '/manage/review_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:7:\"reviews\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/review_add.twig', 16, 0, 0),
(526, 'manager/shop/reviews/edit/([0-9]*)', 'manager/shop/reviews/edit/([0-9]*)', 'shop', '/manage/review_add.php', 'a:5:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:7:\"reviews\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:4;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/review_add.twig', 17, 0, 0),
(527, 'callbacks', 'callbacks', 'shop', '/callbacks/callbacks.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:9:\"callbacks\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 8, 0, 0),
(528, 'manager/shop/callbacks', 'manager/shop/callbacks', 'shop', '/manage/callbacks.php', 'a:3:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:9:\"callbacks\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/callbacks.twig', 9, 0, 0),
(529, 'manager/shop/callbacks/add', 'manager/shop/callbacks/add', 'shop', '/manage/callbacks_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:9:\"callbacks\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/callback_add.twig', 10, 0, 0),
(530, 'manager/shop/callbacks/edit/([0-9]*)', 'manager/shop/callbacks/edit/([0-9]*)', 'shop', '/manage/callbacks_add.php', 'a:5:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:9:\"callbacks\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:4;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/callback_add.twig', 11, 0, 0),
(531, 'manager/shop/complectations/add', 'manager/shop/complectations/add', 'shop', '/manage/complectations_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:14:\"complectations\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/complectation_add.twig', 13, 0, 0),
(533, 'manager/shop/complectations/edit/([0-9]*)', 'manager/shop/complectations/edit/([0-9]*)', 'shop', '/manage/complectations_add.php', 'a:5:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:14:\"complectations\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:4;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/complectation_add.twig', 14, 0, 0),
(534, 'reviews', 'reviews', 'shop', '/reviews/reviews.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"reviews\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 7, 0, 0),
(535, '([^/]+)/parts/([^/]+)', '([^/]+)/parts/([^/]+)', 'shop', '/catalog/top_cat.php', 'a:3:{i:0;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:7:\"cat_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:5:\"parts\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:8:\"get_part\";s:6:\"static\";s:1:\"1\";}i:2;a:6:{s:4:\"rule\";s:7:\"([^/]+)\";s:4:\"type\";s:8:\"TYPE_STR\";s:4:\"name\";s:8:\"part_url\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"2\";}}', 'shop/catalog/top_cat.twig', 6, 0, 0),
(537, 'manager/shop/popular/recommended', 'manager/shop/popular/recommended', 'shop', '/manage/popular_items/popular_recomended.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:7:\"popular\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:11:\"recommended\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/popular_items/popular_recomended.twig', 5, 0, 0),
(538, 'manager/shop/popular/new', 'manager/shop/popular/new', 'shop', '/manage/popular_items/popular_new.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:7:\"popular\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:3:\"new\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/popular_items/popular_new.twig', 4, 0, 0),
(539, 'manager/shop/popular/hits', 'manager/shop/popular/hits', 'shop', '/manage/popular_items/popular_hits.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:7:\"popular\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"hits\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/popular_items/popular_hits.twig', 3, 0, 0),
(540, 'manager/shop/comments/add', 'manager/shop/comments/add', 'shop', '/manage/comment_add.php', 'a:4:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:8:\"comments\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:3:\"add\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', 'shop/manage/comment_add.twig', 1, 0, 0),
(541, 'manager/shop/comments/edit/([0-9]*)', 'manager/shop/comments/edit/([0-9]*)', 'shop', '/manage/comment_add.php', 'a:5:{i:0;a:4:{s:4:\"rule\";s:7:\"manager\";s:4:\"name\";s:2:\"do\";s:5:\"value\";s:4:\"edit\";s:6:\"static\";s:1:\"1\";}i:1;a:4:{s:4:\"rule\";s:4:\"shop\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:2;a:4:{s:4:\"rule\";s:8:\"comments\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:3;a:4:{s:4:\"rule\";s:4:\"edit\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}i:4;a:6:{s:4:\"rule\";s:8:\"([0-9]*)\";s:4:\"type\";s:9:\"TYPE_UINT\";s:4:\"name\";s:2:\"id\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"0\";s:3:\"pos\";s:1:\"1\";}}', 'shop/manage/comment_add.twig', 2, 0, 0),
(542, 'cron777', 'cron777', 'static', '/cron.php', 'a:1:{i:0;a:4:{s:4:\"rule\";s:7:\"cron777\";s:4:\"name\";s:0:\"\";s:5:\"value\";s:0:\"\";s:6:\"static\";s:1:\"1\";}}', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_search`
--

CREATE TABLE `core_search` (
  `search_id` int(11) NOT NULL,
  `search_time` datetime NOT NULL DEFAULT current_timestamp(),
  `search_thread_id` int(11) NOT NULL,
  `search_user_session` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `core_seo`
--

CREATE TABLE `core_seo` (
  `seo_id` int(11) NOT NULL,
  `seo_url` varchar(250) NOT NULL,
  `seo_title` varchar(250) NOT NULL DEFAULT '',
  `seo_keywords` varchar(250) NOT NULL DEFAULT '',
  `seo_desc` varchar(250) NOT NULL DEFAULT '',
  `seo_text_id` int(11) NOT NULL DEFAULT 0,
  `seo_skip_last` int(1) NOT NULL DEFAULT 0,
  `seo_page_title` varchar(250) NOT NULL DEFAULT '',
  `seo_icon` int(11) NOT NULL DEFAULT 0,
  `seo_icon_text` varchar(250) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_seo`
--

INSERT INTO `core_seo` (`seo_id`, `seo_url`, `seo_title`, `seo_keywords`, `seo_desc`, `seo_text_id`, `seo_skip_last`, `seo_page_title`, `seo_icon`, `seo_icon_text`) VALUES
(1, '/', 'Дизайн радиаторы от мировых брендов в Крыму', '', '', 16, 0, 'Дизайн радиаторы от мировых брендов в Крыму', 0, ''),
(2, '/catalog/', 'Каталог радиаторов', '', '', 18, 0, 'Каталог радиаторов', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `core_settings_fields`
--

CREATE TABLE `core_settings_fields` (
  `cs_id` int(11) NOT NULL,
  `cs_parent_id` int(11) NOT NULL DEFAULT 0,
  `cs_level` int(11) NOT NULL DEFAULT 1,
  `cs_status` int(1) NOT NULL DEFAULT 1,
  `cs_group_id` int(11) NOT NULL DEFAULT 0,
  `cs_key` varchar(50) NOT NULL,
  `cs_title` varchar(250) NOT NULL,
  `cs_caption` varchar(255) NOT NULL DEFAULT '',
  `cs_sort` int(11) NOT NULL DEFAULT 0,
  `cs_type` varchar(50) NOT NULL DEFAULT '0',
  `cs_required` int(1) NOT NULL DEFAULT 0,
  `cs_visible` int(1) NOT NULL DEFAULT 1,
  `cs_values` varchar(2000) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_settings_fields`
--

INSERT INTO `core_settings_fields` (`cs_id`, `cs_parent_id`, `cs_level`, `cs_status`, `cs_group_id`, `cs_key`, `cs_title`, `cs_caption`, `cs_sort`, `cs_type`, `cs_required`, `cs_visible`, `cs_values`) VALUES
(1, 0, 1, 1, 1, 'info_phone', 'Телефон', '', 4, 'text_input', 1, 1, ''),
(2, 0, 1, 1, 1, 'info_email', 'Email', '', 5, 'text_input', 1, 1, ''),
(3, 0, 1, 1, 1, 'info_addres', 'Адрес', '', 7, 'text_input', 1, 1, ''),
(5, 0, 1, 1, 1, 'info_title', 'Название', '', 2, 'text_input', 1, 1, ''),
(6, 0, 1, 1, 1, 'info_socials', 'Соц. сети', '', 9, 'repeater', 1, 1, ''),
(7, 6, 2, 1, 1, 'info_socials_title', 'Название', '', 10, 'text_input', 1, 1, ''),
(8, 6, 2, 1, 1, 'info_socials_url', 'Ссылка', '', 11, 'text_input', 1, 1, ''),
(9, 6, 2, 1, 1, 'info_socials_icon', 'Иконка', '', 12, 'text_input', 1, 1, ''),
(10, 0, 1, 1, 5, 'steps_steps', 'Шаги', '', 0, 'repeater', 1, 1, ''),
(11, 10, 2, 1, 5, 'steps_steps_title', 'Заголовок', '', 0, 'text_input', 1, 1, ''),
(12, 10, 2, 1, 5, 'steps_steps_description', 'Описание', '', 0, 'text_input', 1, 1, ''),
(13, 10, 2, 1, 5, 'steps_steps_icon', 'Иконка', '', 0, 'text_input', 1, 1, ''),
(14, 42, 2, 1, 3, 'about_icon', 'Изображение', '', 3, 'image', 1, 1, ''),
(15, 0, 1, 1, 3, 'about_text', 'Текст', '', 1, 'text_rich', 1, 1, ''),
(16, 0, 1, 1, 3, 'about_skills', 'Преимущества', '', 4, 'repeater', 1, 1, ''),
(17, 16, 2, 1, 3, 'about_skills_title', 'Название', '', 5, 'text_input', 1, 1, ''),
(18, 16, 2, 1, 3, 'about_skills_icon', 'Иконка', '', 6, 'text_input', 1, 1, ''),
(19, 0, 1, 1, 2, 'skills_list', 'Список преимуществ', '', 1, 'repeater', 1, 1, ''),
(20, 19, 2, 1, 2, 'skills_list_title', 'Название', '', 2, 'text_input', 1, 1, ''),
(21, 19, 2, 1, 2, 'skills_list_icon', 'Иконка', '', 3, 'text_input', 1, 1, ''),
(22, 0, 1, 1, 6, 'main_slider_list', 'Список слайдов', '', 1, 'repeater', 1, 1, ''),
(23, 22, 2, 1, 6, 'main_slider_list_title', 'Заголовок', '', 3, 'text_input', 1, 1, ''),
(24, 22, 2, 1, 6, 'main_slider_list_text', 'Текст', '', 4, 'text_input', 1, 1, ''),
(26, 22, 2, 1, 6, 'main_slider_list_bg', 'Фон', '', 5, 'image', 1, 1, ''),
(47, 0, 1, 1, 8, 'cooperate_designer_photo', 'Фото для Дизайнеров', '', 4, 'image', 1, 1, ''),
(45, 0, 1, 1, 8, 'cooperate_architect_text', 'Текст для Архитекторов', '', 1, 'text_rich', 1, 1, ''),
(46, 0, 1, 1, 8, 'cooperate_designer_text', 'Текст для Дизайнеров', '', 3, 'text_rich', 1, 1, ''),
(44, 0, 1, 1, 4, 'payment_icon', 'Фото оплата', '', 6, 'image', 1, 1, ''),
(43, 0, 1, 1, 4, 'delivery_icon', 'Фото доставка', '', 3, 'image', 1, 1, ''),
(31, 0, 1, 1, 4, 'payment_info', 'Иноформация по оплате', '', 4, 'repeater', 1, 1, ''),
(32, 31, 2, 1, 4, 'payment_info_item', 'Пункт', '', 5, 'text_input', 1, 1, ''),
(55, 0, 1, 1, 1, 'info_desc', 'Подпись', '', 3, 'text_input', 1, 1, ''),
(34, 0, 1, 1, 4, 'delivery_info', 'Информация о доставке', '', 1, 'repeater', 1, 1, ''),
(35, 34, 2, 1, 4, 'delivery_info_item', 'Пункт', '', 2, 'text_input', 1, 1, ''),
(37, 0, 1, 1, 1, 'email_notify', 'Уведомление Email', '', 6, 'text_input', 1, 1, ''),
(38, 0, 1, 1, 1, 'info_name', 'Name', '', 1, 'text_input', 1, 1, ''),
(39, 22, 2, 1, 6, 'main_slider_list_link', 'Ссылка', '', 8, 'text_input', 0, 1, ''),
(40, 22, 2, 1, 6, 'main_slider_list_link_title', 'Текст кнопки', '', 7, 'text_input', 0, 1, ''),
(41, 22, 2, 1, 6, 'main_slider_list_badge', 'Бадж', '', 2, 'select', 1, 1, 'a:4:{i:0;s:19:\"0:Без баджа\";i:1;s:18:\"new:Новинка\";i:2;s:10:\"hit:Хит\";i:3;s:15:\"sale:Акция\";}'),
(42, 0, 1, 1, 3, 'about_photos', 'Фотографии', '', 2, 'repeater', 1, 1, ''),
(48, 0, 1, 1, 8, 'cooperate_architect_photo', 'Фото для Архитекторов', '', 2, 'image', 1, 1, ''),
(49, 0, 1, 1, 1, 'info_copy', 'Copyright', '', 8, 'text_input', 1, 1, ''),
(50, 0, 1, 1, 9, 'photos', 'Список фотографии', '', 2, 'repeater', 1, 1, ''),
(51, 50, 2, 1, 9, 'photo', 'Фотография', '', 3, 'image', 1, 1, ''),
(52, 0, 1, 1, 9, 'link', 'Ссылка на аккаунт', '', 1, 'text_input', 1, 1, ''),
(53, 22, 2, 1, 6, 'main_slider_list_icon', 'Фото справа от текста', '', 6, 'image', 0, 1, ''),
(54, 0, 1, 1, 10, 'about_text', 'Статья', '', 0, 'text_rich', 1, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `core_settings_groups`
--

CREATE TABLE `core_settings_groups` (
  `cs_group_id` int(11) NOT NULL,
  `cs_group_status` int(1) NOT NULL DEFAULT 1,
  `cs_group_name` varchar(150) NOT NULL,
  `cs_group_key` varchar(250) NOT NULL,
  `cs_group_sort` int(11) NOT NULL DEFAULT 0,
  `cs_group_superadmin` int(1) NOT NULL DEFAULT 0,
  `cs_group_is_sub` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_settings_groups`
--

INSERT INTO `core_settings_groups` (`cs_group_id`, `cs_group_status`, `cs_group_name`, `cs_group_key`, `cs_group_sort`, `cs_group_superadmin`, `cs_group_is_sub`) VALUES
(1, 1, 'Основная информация', 'info', 0, 0, 0),
(2, 1, 'Преимущества', 'skills', 0, 0, 0),
(10, 1, 'О магазине', 'about', 0, 0, 0),
(6, 1, 'Главный слайдер', 'main_slider', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `core_settings_values`
--

CREATE TABLE `core_settings_values` (
  `cs_line` varchar(32) NOT NULL,
  `cs_id` int(11) NOT NULL DEFAULT 0,
  `csv_value` varchar(2000) NOT NULL,
  `csv_status` int(1) NOT NULL DEFAULT 1,
  `cs_sort` int(11) NOT NULL DEFAULT 0,
  `cs_sub` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_settings_values`
--

INSERT INTO `core_settings_values` (`cs_line`, `cs_id`, `csv_value`, `csv_status`, `cs_sort`, `cs_sub`) VALUES
('4GHm0X7rXW2h5SScZzXw3mvFB26K1hSW', 23, 'Какой то заголовок в несколько строк', 1, 1, ''),
('4GHm0X7rXW2h5SScZzXw3mvFB26K1hSW', 24, 'Очень занимательная акция либо товары. Не упустите свой шанс пощупать его в нашем Шоу-руме!', 1, 1, ''),
('4GHm0X7rXW2h5SScZzXw3mvFB26K1hSW', 26, '25', 1, 1, ''),
('4GHm0X7rXW2h5SScZzXw3mvFB26K1hSW', 40, '', 1, 1, ''),
('4GHm0X7rXW2h5SScZzXw3mvFB26K1hSW', 39, 'http://artradiator.tiger/', 1, 1, ''),
('4GHm0X7rXW2h5SScZzXw3mvFB26K1hSW', 41, 'new', 1, 1, ''),
('ywyfMdLZcwrI5cCWs2CXPCcHxXzFUxQr', 20, 'Только оригинальная продукция из натуральных ингридиентов', 1, 0, ''),
('ywyfMdLZcwrI5cCWs2CXPCcHxXzFUxQr', 21, 'skill1', 1, 0, ''),
('NymR2tpz8DAjvdGZZtvcwvxJA7R1U1pz', 20, 'Доставка по всей России в максимально короткие сроки', 1, 1, ''),
('NymR2tpz8DAjvdGZZtvcwvxJA7R1U1pz', 21, 'skill2', 1, 1, ''),
('0PVSZd0dbMnn0XCbq243Lb6UM4vhCwD2', 20, 'Всегда поможем советом и расскажем о товаре', 1, 2, ''),
('0PVSZd0dbMnn0XCbq243Lb6UM4vhCwD2', 21, 'skill3', 1, 2, ''),
('', 38, 'SamSweets', 1, 0, ''),
('', 5, 'ORIGINAL GREEK PRODUCTS', 1, 0, ''),
('', 1, '+7 (991) 299-19-01', 1, 0, ''),
('', 2, 'info@samsweets.ru', 1, 0, ''),
('', 37, 'info@samsweets.ru', 1, 0, ''),
('', 3, 'Московская Область, ул. Березовая, дом 13', 1, 0, ''),
('', 33, '000,0000', 1, 0, ''),
('', 4, 'Пн-Вс с 10:00-20:00', 1, 0, ''),
('dDW8QSdg50aE4AtX3JI7mWvnOSKtbb78', 7, 'Написать в WhatsApp', 1, 0, ''),
('dDW8QSdg50aE4AtX3JI7mWvnOSKtbb78', 8, 'whats_app.com', 1, 0, ''),
('dDW8QSdg50aE4AtX3JI7mWvnOSKtbb78', 9, 'whatsapp', 1, 0, ''),
('', 55, 'Интернет магазин восточных сладостей и средиземноморской продукции', 1, 0, ''),
('', 14, '', 1, 0, ''),
('', 15, '<h3><span style=\"color: #98cc3c;\">Самый тёплый Шоу-рум</span> в Крыму &mdash; огромный выбор арт радиаторов!</h3>\n<p>Оценить все модели в живую, сравнить несколько вариантов и выбрать лучший &mdash; это все вы можете сделать посетив наш <strong><span style=\"color: #98cc3c;\">шоу-рум</span></strong> размером в <strong><span style=\"color: #98cc3c;\">120 м2</span></strong> по адресу<strong><span style=\"color: #98cc3c;\"> улица Безымянная 123, этаж 2</span></strong>. Получить бесплатную консультацию от наших инженеров.</p>\n<p>Меняем стандартное представление о приборах отопления. Тепло может быть со вкусом. Мы хотим поставить необычный радиатор в каждое отапливаемое пространство и этим создать более теплое настроение у владельца. В этом нам помогают наши клиенты: заказчики со вкусом, дизайнеры, архитекторы, прорабы, монтажники.</p>', 1, 0, ''),
('WJF0zR4Or6tQTBXDI2N5JqPEC75L6pn3', 14, '60', 1, 0, ''),
('Pr8zKf1QswGwK8LzJspFHfVbb6vIxNM5', 14, '61', 1, 2, ''),
('zQGKV923kH8tb8qyXmIEVWPvtvfTQyFN', 14, '62', 1, 1, ''),
('MOsGfcrzv2sA4TyVnVFV8zwz5qL05nC7', 14, '63', 1, 3, ''),
('U9pIpmDGACDkSVnDmRN71XSUJTPbmk64', 17, 'Сертификация всего оборудования по ГОСТ', 1, 0, ''),
('U9pIpmDGACDkSVnDmRN71XSUJTPbmk64', 18, 'skill-1', 1, 0, ''),
('Z8DC5zhSzzOp99ZUq21F2Fyfj89GhTcN', 17, 'Гарантия 5 лет, а срок эксплуатации 30 лет', 1, 1, ''),
('Z8DC5zhSzzOp99ZUq21F2Fyfj89GhTcN', 18, 'skill-2', 1, 1, ''),
('cG1nzgg5THFAHVs7UZqLaJzRFcja6WLk', 17, 'Можно использовать в любых помещениях', 1, 2, ''),
('cG1nzgg5THFAHVs7UZqLaJzRFcja6WLk', 18, 'skill-3', 1, 2, ''),
('HXK7vT7DBJvYMyEJ2f1KDs6hQ6JsM0Oh', 17, '4 стандартных цвета окраски без доплаты', 1, 3, ''),
('HXK7vT7DBJvYMyEJ2f1KDs6hQ6JsM0Oh', 18, 'skill-4', 1, 3, ''),
('SZX3AkxGqnV8BCChaLnwIScxafhJVUtn', 35, 'Самовывоз по адресу г. Симферополь, ул. Безымянная 103, этаж 2', 1, 0, ''),
('aCGzqQsR1QYZQxEURw4P9GxmvEbD1CJ9', 35, 'Стоимость доставки по городу фиксированная — 500 ₽ (с 10:00-20:00)', 1, 1, ''),
('w10AGSYP4c2IQQCazOIRJn6XWd5OKtxs', 35, 'Доставка осуществляется до подъезда.', 1, 2, ''),
('1whcIwpHXmO0FFkFgfQUyGmBB3I4FZkT', 35, 'Доставка позиций со склада 1-2 дня. Срок доставки моделей под заказ оговаривается индивидуально.', 1, 3, ''),
('vDwgcsBmRRM7C60nm0S0zC29PDKVUBj0', 32, 'Работаем по предоплате - 100% от стоимости заказа', 1, 0, ''),
('qSKTPkCZbsnHj2UcU0UR1Xh1LYa3g8sI', 32, 'Внести предоплату вы можете любым удобным для вас способом - переводом на карту МИР или Юмани кошелек', 1, 0, ''),
('DXHBB5JrGQFSVXKdM0mgdRypWaz5NDyg', 32, 'Наличными или картой в нашем офисе', 1, 0, ''),
('', 43, '66', 1, 0, ''),
('', 44, '67', 1, 0, ''),
('', 45, '<p>Мы специализируемся на продаже дизайн радиаторов и другого отопительного оборудования, мы &mdash; это команда профессионалов. Взаимодействие с архитектурными бюро является одним из таких направлений.</p>\n<h5>Почему стоит работать именно с нами:</h5>\n<ul>\n<li>Все просто &mdash; мы предлагаем выгодные и гибкие условия для работы, которые подойдут вам и вашим клиентам. Наша партнерская программа учитывает интересы обеих сторон.</li>\n<li>Вы получите доступ к самому широкому ассортименту отопительного оборудования в РФ, большая часть которого представлена в наличии на нашем складе.</li>\n<li>Мы предоставим в ваше распоряжение наш шоу-рум &mdash; современное лофтовое пространство общей площадью 120 м2.</li>\n</ul>', 1, 0, ''),
('', 48, '68', 1, 0, ''),
('', 46, '<p>Мы специализируемся на продаже дизайн радиаторов и другого отопительного оборудования, мы &mdash; это команда профессионалов. Взаимодействие с архитектурными бюро является одним из таких направлений.</p>\n<h3>Почему стоит работать именно с нами:</h3>\n<ul>\n<li>Все просто &mdash; мы предлагаем выгодные и гибкие условия для работы, которые подойдут вам и вашим клиентам. Наша партнерская программа учитывает интересы обеих сторон.</li>\n<li>Вы получите доступ к самому широкому ассортименту отопительного оборудования в РФ, большая часть которого представлена в наличии на нашем складе.</li>\n<li>Мы предоставим в ваше распоряжение наш шоу-рум &mdash; современное лофтовое пространство общей площадью 120 м2.</li>\n</ul>', 1, 0, ''),
('', 47, '69', 1, 0, ''),
('', 49, '© 2021 SamSweets', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 41, 'new', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 23, 'Какой то заголовок в несколько строк', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 24, 'Очень занимательная акция либо товары. Не упустите свой шанс пощупать его в нашем Шоу-руме!', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 26, '97', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 40, '', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 39, '', 1, 0, ''),
('RObK94kctrstwstSKqA0TKNjCC5NSvS3', 51, '89', 1, 0, ''),
('vPKcLKW5EEL0NYmWBRTBbB8OrfrxcHMw', 51, '90', 1, 0, ''),
('LdXfmM12yHmhkbAWAM0SpHVkaL8SYg8m', 51, '91', 1, 0, ''),
('3tNHHvccbvI0Mhw6t7NxTDUYSX8NbQbp', 51, '92', 1, 0, ''),
('62OnzJxIOXAA3rgPNsRj3QtUcpMzURFk', 51, '93', 1, 0, ''),
('6SUdjMO6kAjcOs7Mpf1R0bxBm8MaWV5Z', 51, '94', 1, 0, ''),
('', 52, 'https://www.instagram.com/instagram/', 1, 0, ''),
('xLpA7cXaa8gs0k03b3br3rybsZ2ZVNXd', 51, '95', 1, 0, ''),
('Ucq64992zjCRQvW7RTs7xSVRMBq4P9CY', 53, '98', 1, 0, ''),
('', 54, 'В нашем интернет-магазине представлены натуральные продукты высочайшего качества, приготовленные в Греции по оригинальной рецептуре, соответствующие европейским сертификатам безопасности и экологичности. У нас вы можете купить консервированные оливки и маслины, оливковое масло, овощная консервация, фруктовая консервация, бальзамические уксусы, хлебобулочные, кондитерские изделия греческих производителей.\nТакже у нас вы можете приобрести продукцию из Турции под брендом KOSKA. Это только натуральные ингредиенты, а особая технология производства позволяет сохранять полезные витамины и микроэлементы. Также, есть диабетическая линейка, которая не содержит в составе сахар.', 1, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `core_sprav`
--

CREATE TABLE `core_sprav` (
  `sprav_id` int(11) NOT NULL,
  `sprav_name` varchar(50) NOT NULL,
  `sprav_status` int(1) NOT NULL DEFAULT 1,
  `sprav_title` varchar(100) NOT NULL DEFAULT '',
  `sprav_label` varchar(100) NOT NULL DEFAULT '',
  `sprav_filter` int(1) NOT NULL DEFAULT 0,
  `sprav_option` int(1) NOT NULL DEFAULT 1,
  `sprav_style` varchar(50) NOT NULL DEFAULT 'cheks',
  `sprav_ext` varchar(50) NOT NULL DEFAULT '',
  `sprav_desc` varchar(255) NOT NULL DEFAULT '',
  `sprav_object_id` int(1) NOT NULL DEFAULT 1,
  `sprav_main` int(1) NOT NULL DEFAULT 0,
  `sprav_data_type` varchar(25) NOT NULL DEFAULT 'string',
  `sprav_top` int(1) NOT NULL DEFAULT 0,
  `sprav_sort` int(3) NOT NULL DEFAULT 999,
  `sprav_code` varchar(50) NOT NULL DEFAULT '',
  `sprav_similar` int(1) NOT NULL DEFAULT 0,
  `sprav_icon` varchar(50) NOT NULL DEFAULT '',
  `sprav_unit` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_sprav`
--

INSERT INTO `core_sprav` (`sprav_id`, `sprav_name`, `sprav_status`, `sprav_title`, `sprav_label`, `sprav_filter`, `sprav_option`, `sprav_style`, `sprav_ext`, `sprav_desc`, `sprav_object_id`, `sprav_main`, `sprav_data_type`, `sprav_top`, `sprav_sort`, `sprav_code`, `sprav_similar`, `sprav_icon`, `sprav_unit`) VALUES
(1, 'tip-radiatora', 1, 'Тип радиатора', '', 1, 1, 'checks', '', '', 1, 0, 'string', 0, 1, '', 0, '', ''),
(2, 'cenovoj-segment', 1, 'Ценовой сегмент', '', 1, 1, 'checks', '', '', 1, 0, 'string', 0, 2, '', 0, '', ''),
(3, 'cvet', 1, 'Цвет', '', 1, 1, 'colors', '', '', 1, 0, 'string', 0, 4, '', 0, '', ''),
(4, 'moschnost', 1, 'Мощность', 'Мощность, вт', 1, 1, 'text', '', '', 1, 0, 'num', 0, 0, '', 0, '', 'Вт'),
(5, 'ploschad-obogreva', 1, 'Площадь обогрева', 'Площадь обогрева, м2', 1, 1, 'text', '', '', 1, 0, 'num', 0, 5, '', 0, '', ''),
(6, 'country', 1, 'Страна', '', 1, 1, 'radios', '', '', 1, 0, 'string', 0, 6, '', 0, '', ''),
(7, 'ves-netto', 1, 'Вес нетто', 'Вес нетто, кг', 1, 1, 'text', '', '', 1, 0, 'num', 0, 7, '', 0, '', ''),
(8, 'obem-vody-v-sekcii', 1, 'Объем воды в секции', 'Объем воды в секции, л', 1, 1, 'text', '', '', 1, 0, 'num', 0, 8, '', 0, '', ''),
(9, 'material', 1, 'Материал', 'Материал', 1, 1, 'radios', '', '', 1, 0, 'string', 0, 9, '', 0, '', ''),
(10, 'shag-vertikalnyh-vodoprovodnyh-trub', 1, 'Шаг вертикальных водопроводных труб', 'Шаг труб', 1, 1, 'text', '', '', 1, 0, 'num', 0, 3, '', 0, '', ''),
(11, 'davlenie', 1, 'Давление', 'Давление, бар', 0, 1, 'text', '', '', 1, 0, 'num', 0, 10, '', 0, '', ''),
(12, 'obrabotka-poverhnostej', 1, 'Обработка поверхностей', 'Обработка поверхностей', 1, 1, 'radios', '', '', 1, 0, 'string', 0, 11, '', 0, '', ''),
(13, 'ispytatelnoe-davlenie', 1, 'Испытательное давление', 'Испытательное давление, бар', 1, 1, 'radios', '', '', 1, 0, 'num', 0, 12, '', 0, '', ''),
(14, 'max-temperatura', 1, 'Max температура', 'Max температура, °С', 1, 1, 'text', '', '', 1, 0, 'num', 0, 13, '', 0, '', ''),
(15, 'vysota-radiatorov', 1, 'Высота радиаторов', 'Высота радиаторов', 1, 1, 'text', '', '', 1, 0, 'num', 0, 14, '', 0, '', ''),
(16, 'dlina-radiatorov', 1, 'Длина радиаторов', 'Длина радиаторов', 1, 1, 'text', '', '', 1, 0, 'num', 0, 15, '', 0, '', ''),
(17, 'mezhosevoe-rasstojanie', 1, 'Межосевое расстояние', 'Межосевое расстояние', 1, 1, 'text', '', '', 1, 0, 'num', 0, 16, '', 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `core_sprav_values`
--

CREATE TABLE `core_sprav_values` (
  `svid` int(11) NOT NULL,
  `svid_status` int(1) NOT NULL DEFAULT 1,
  `sprav_id` int(11) NOT NULL,
  `svid_title` varchar(250) NOT NULL,
  `svid_eng` varchar(150) NOT NULL DEFAULT '',
  `svid_value` varchar(255) NOT NULL DEFAULT '',
  `svid_icon` int(11) NOT NULL DEFAULT 0,
  `svid_svg` varchar(25) NOT NULL DEFAULT '',
  `svid_syn_id` int(11) NOT NULL DEFAULT 0,
  `svid_syn_data` varchar(500) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_sprav_values`
--

INSERT INTO `core_sprav_values` (`svid`, `svid_status`, `sprav_id`, `svid_title`, `svid_eng`, `svid_value`, `svid_icon`, `svid_svg`, `svid_syn_id`, `svid_syn_data`) VALUES
(1, 1, 1, 'Вертикальные', '', '', 0, '', 0, ''),
(2, 1, 1, 'Горизонтальные', '', '', 0, '', 0, ''),
(3, 1, 1, 'Напольные', '', '', 0, '', 0, ''),
(4, 1, 1, 'Электрические', '', '', 0, '', 0, ''),
(5, 1, 2, 'Бюджетные', '', '', 0, '', 0, ''),
(6, 1, 2, 'Среднеценовые', '', '', 0, '', 0, ''),
(7, 1, 2, 'Премиум', '', '', 0, '', 0, ''),
(8, 1, 3, 'Черный', '', '', 0, '', 0, ''),
(9, 1, 3, 'Белый', '', '', 0, '', 0, ''),
(10, 1, 3, 'Серебристый', '', '', 0, '', 0, ''),
(11, 1, 3, 'Хром', '', '', 0, '', 0, ''),
(12, 1, 3, 'Золотистый', '', '', 0, '', 0, ''),
(13, 1, 6, 'Австрия', '', '', 27, '', 0, ''),
(14, 1, 6, 'Белоруссия', '', '', 28, '', 0, ''),
(15, 1, 6, 'Бельгия', '', '', 29, '', 0, ''),
(16, 1, 6, 'Великобритания', '', '', 30, '', 0, ''),
(17, 1, 6, 'Германия', '', '', 31, '', 0, ''),
(18, 1, 6, 'Дания', '', '', 32, '', 0, ''),
(19, 1, 6, 'Италия', '', '', 33, '', 0, ''),
(20, 1, 6, 'Канада', '', '', 34, '', 0, ''),
(21, 1, 6, 'Китай', '', '', 35, '', 0, ''),
(22, 1, 6, 'Корея', '', '', 36, '', 0, ''),
(23, 1, 6, 'польша', '', '', 37, '', 0, ''),
(24, 1, 6, 'Россия', '', '', 38, '', 0, ''),
(25, 1, 6, 'Сша', '', '', 39, '', 0, ''),
(26, 1, 6, 'Турция', '', '', 40, '', 0, ''),
(27, 1, 6, 'Финляндия', '', '', 41, '', 0, ''),
(28, 1, 6, 'Чехия', '', '', 42, '', 0, ''),
(29, 1, 6, 'Швеция', '', '', 44, '', 0, ''),
(30, 1, 9, 'Сталь', '', '', 0, '', 0, ''),
(31, 1, 9, 'Чугун', '', '', 0, '', 0, ''),
(32, 1, 9, 'Алюминий', '', '', 0, '', 0, ''),
(33, 1, 12, 'Эмаль', '', '', 0, '', 0, ''),
(34, 1, 12, 'Порошковая эмаль', '', '', 0, '', 0, ''),
(35, 1, 12, 'Хромирование', '', '', 0, '', 0, ''),
(36, 1, 12, 'Акрил', '', '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `core_text`
--

CREATE TABLE `core_text` (
  `text_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `core_text`
--

INSERT INTO `core_text` (`text_id`, `text`) VALUES
(1, 'Описание категории'),
(2, 'Описание категории'),
(3, 'Описание категории'),
(4, 'Описание категории'),
(5, 'Описание категории'),
(6, 'Описание категории'),
(7, 'Описание категории'),
(8, 'Описание категории'),
(9, 'Описание категории'),
(10, 'Описание категории'),
(11, 'Описание категории'),
(12, '<p>Описание Стальные радиаторы Irsap Tesi &mdash; энергосберегающие приборы, безопасные для окружающей среды, обеспечивая низкое потребление электроэнергии. Благодаря высокому тепловому КПД и теплоотдаче, радиаторы Irsap являются идеальным решением для строительной индустрии последнего поколения и самых современных низкотемпературных систем. Непрерывные конструкторские разработки и тесное сотрудничество с престижными проектными бюро (студиями дизайна) и научными институтами привели к созданию дизайн-радиаторов еще задолго до того, как радиаторы стали рассматриваться сами по себе в качестве декоративных элементов. Радиаторы и полотенцесушители IRSAP отличаются высоким качеством и прекрасными внешними характеристиками. Вся продукция производится в Италии на современном оборудовании под строгим контролем качества. Новый процесс лазерной сварки гарантирует не только идеальный сварной шов, что дает исключительную герметичность, но также оптимизирует процесс окрашивания, обеспечивая ровное распространение эпоксидного покрытия и отсутствие дефектов на каждой из частей продукта.</p>'),
(13, '<p>Описание Стальные радиаторы Irsap Tesi &mdash; энергосберегающие приборы, безопасные для окружающей среды, обеспечивая низкое потребление электроэнергии. Благодаря высокому тепловому КПД и теплоотдаче, радиаторы Irsap являются идеальным решением для строительной индустрии последнего поколения и самых современных низкотемпературных систем. Непрерывные конструкторские разработки и тесное сотрудничество с престижными проектными бюро (студиями дизайна) и научными институтами привели к созданию дизайн-радиаторов еще задолго до того, как радиаторы стали рассматриваться сами по себе в качестве декоративных элементов. Радиаторы и полотенцесушители IRSAP отличаются высоким качеством и прекрасными внешними характеристиками. Вся продукция производится в Италии на современном оборудовании под строгим контролем качества. Новый процесс лазерной сварки гарантирует не только идеальный сварной шов, что дает исключительную герметичность, но также оптимизирует процесс окрашивания, обеспечивая ровное распространение эпоксидного покрытия и отсутствие дефектов на каждой из частей продукта.</p>'),
(14, '<p>Lorem</p>'),
(15, '<p>Впечатляющие декоративные возможности нестандартных батарей</p>'),
(16, '<h4>Дизайн радиаторы от мировых брендов в Крыму&nbsp;</h4>\n<p>Дизайн радиаторы &mdash; основной продукт компании ART Radiator. Это высококачественные приборы отопления из Европы. Мы гарантируем качество своей продукции и предоставляем 10 лет гарантии на все отопительные приборы. Наши инженеры помогут вам в подборе приборов отопления. На сайте так же доступны Каталоги для скачивания, которые включают в себя все технические данные, а так же цветовые гаммы, доступные для покраски радиаторов &mdash; около 100 цветов.</p>\n<p>Широкий выбор моделей отопительных приборов, цветовой гаммы, геометрии исполнения, позволят Вам найти Свое решение, которое создаст уникальное впечатление в самом широком смысле.</p>\n<p>Дизайн радиаторы &mdash; основной продукт компании ART Radiator. Это высококачественные приборы отопления из Европы. Мы гарантируем качество своей продукции и предоставляем 10 лет гарантии на все отопительные приборы. Наши инженеры помогут вам в подборе приборов отопления. На сайте так же доступны Каталоги для скачивания, которые включают в себя все технические данные, а так же цветовые гаммы, доступные для покраски радиаторов &mdash; около 100 цветов.</p>'),
(17, '<p>Политика сайта</p>'),
(18, '<h4>Дизайн радиаторы от мировых брендов в Крыму&nbsp;</h4>\n<p>Дизайн радиаторы &mdash; основной продукт компании ART Radiator. Это высококачественные приборы отопления из Европы. Мы гарантируем качество своей продукции и предоставляем 10 лет гарантии на все отопительные приборы. Наши инженеры помогут вам в подборе приборов отопления. На сайте так же доступны Каталоги для скачивания, которые включают в себя все технические данные, а так же цветовые гаммы, доступные для покраски радиаторов &mdash; около 100 цветов.</p>\n<p>Широкий выбор моделей отопительных приборов, цветовой гаммы, геометрии исполнения, позволят Вам найти Свое решение, которое создаст уникальное впечатление в самом широком смысле.</p>\n<p>Дизайн радиаторы &mdash; основной продукт компании ART Radiator. Это высококачественные приборы отопления из Европы. Мы гарантируем качество своей продукции и предоставляем 10 лет гарантии на все отопительные приборы. Наши инженеры помогут вам в подборе приборов отопления. На сайте так же доступны Каталоги для скачивания, которые включают в себя все технические данные, а так же цветовые гаммы, доступные для покраски радиаторов &mdash; около 100 цветов.</p>'),
(19, '<p>Описание Стальные радиаторы Irsap Tesi &mdash; энергосберегающие приборы, безопасные для окружающей среды, обеспечивая низкое потребление электроэнергии. Благодаря высокому тепловому КПД и теплоотдаче, радиаторы Irsap являются идеальным решением для строительной индустрии последнего поколения и самых современных низкотемпературных систем. Непрерывные конструкторские разработки и тесное сотрудничество с престижными проектными бюро (студиями дизайна) и научными институтами привели к созданию дизайн-радиаторов еще задолго до того, как радиаторы стали рассматриваться сами по себе в качестве декоративных элементов. Радиаторы и полотенцесушители IRSAP отличаются высоким качеством и прекрасными внешними характеристиками. Вся продукция производится в Италии на современном оборудовании под строгим контролем качества. Новый процесс лазерной сварки гарантирует не только идеальный сварной шов, что дает исключительную герметичность, но также оптимизирует процесс окрашивания, обеспечивая ровное распространение эпоксидного покрытия и отсутствие дефектов на каждой из частей продукта.</p>'),
(20, '<p>Описание Стальные радиаторы Irsap Tesi &mdash; энергосберегающие приборы, безопасные для окружающей среды, обеспечивая низкое потребление электроэнергии. Благодаря высокому тепловому КПД и теплоотдаче, радиаторы Irsap являются идеальным решением для строительной индустрии последнего поколения и самых современных низкотемпературных систем. Непрерывные конструкторские разработки и тесное сотрудничество с престижными проектными бюро (студиями дизайна) и научными институтами привели к созданию дизайн-радиаторов еще задолго до того, как радиаторы стали рассматриваться сами по себе в качестве декоративных элементов. Радиаторы и полотенцесушители IRSAP отличаются высоким качеством и прекрасными внешними характеристиками. Вся продукция производится в Италии на современном оборудовании под строгим контролем качества. Новый процесс лазерной сварки гарантирует не только идеальный сварной шов, что дает исключительную герметичность, но также оптимизирует процесс окрашивания, обеспечивая ровное распространение эпоксидного покрытия и отсутствие дефектов на каждой из частей продукта.</p>'),
(21, '<p>Арматура 1</p>'),
(22, 'Описание категории');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `content_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news_cats`
--

CREATE TABLE `news_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `url` varchar(50) NOT NULL DEFAULT '',
  `meta_title` varchar(100) NOT NULL DEFAULT '',
  `meta_keywords` varchar(150) NOT NULL DEFAULT '',
  `meta_desc` varchar(250) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages_stat`
--

CREATE TABLE `pages_stat` (
  `stat_id` int(11) NOT NULL,
  `stat_time` datetime NOT NULL DEFAULT current_timestamp(),
  `stat_rate` int(1) NOT NULL DEFAULT 1,
  `stat_url` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_bills`
--

CREATE TABLE `shop_bills` (
  `bill_id` int(11) NOT NULL,
  `bill_order_id` int(11) NOT NULL,
  `bill_time` datetime NOT NULL DEFAULT current_timestamp(),
  `bill_name` varchar(150) NOT NULL DEFAULT '',
  `bill_phone` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_callbacks`
--

CREATE TABLE `shop_callbacks` (
  `callback_id` int(11) NOT NULL,
  `callback_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `callback_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `callback_status` int(1) NOT NULL DEFAULT 0,
  `callback_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop_callbacks`
--

INSERT INTO `shop_callbacks` (`callback_id`, `callback_name`, `callback_phone`, `callback_status`, `callback_time`) VALUES
(1, 'Ариф', '79780728194', 0, '2021-11-26 13:24:19'),
(2, 'Ариф', '79780728194', 0, '2021-11-26 13:27:04'),
(3, 'Ариф', '79780728194', 0, '2021-11-26 13:29:57');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_categories`
--

CREATE TABLE `shop_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_status` int(1) NOT NULL DEFAULT 1,
  `cat_new` int(1) NOT NULL DEFAULT 0,
  `cat_title` varchar(255) NOT NULL DEFAULT '',
  `cat_title2` varchar(500) NOT NULL DEFAULT '',
  `cat_short_title` varchar(255) NOT NULL DEFAULT '',
  `cat_top` int(1) NOT NULL DEFAULT 0,
  `cat_url` varchar(250) NOT NULL DEFAULT '',
  `cat_parent_id` int(11) NOT NULL DEFAULT 0,
  `cat_text_id` int(11) NOT NULL DEFAULT 0,
  `cat_sort` int(11) NOT NULL DEFAULT 0,
  `cat_count` int(11) NOT NULL DEFAULT 0,
  `cat_icon` int(11) NOT NULL DEFAULT 0,
  `cat_icon2` int(11) NOT NULL DEFAULT 0,
  `cat_head_title` varchar(255) NOT NULL DEFAULT '',
  `cat_head_title2` varchar(250) NOT NULL DEFAULT '',
  `cat_head_desc` varchar(255) NOT NULL DEFAULT '',
  `cat_head_keywords` varchar(255) NOT NULL DEFAULT '',
  `cat_code` varchar(50) NOT NULL DEFAULT '',
  `cat_1c_title` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_categories`
--

INSERT INTO `shop_categories` (`cat_id`, `cat_status`, `cat_new`, `cat_title`, `cat_title2`, `cat_short_title`, `cat_top`, `cat_url`, `cat_parent_id`, `cat_text_id`, `cat_sort`, `cat_count`, `cat_icon`, `cat_icon2`, `cat_head_title`, `cat_head_title2`, `cat_head_desc`, `cat_head_keywords`, `cat_code`, `cat_1c_title`) VALUES
(13670790, 1, 0, 'Бальзамические уксусы и соусы', 'Бальзамические уксусы и соусы', '', 0, 'balzamicheskie-uksusy-i-sousytwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670795, 1, 0, 'DELPHI', 'Бальзамические уксусы и соусы DELPHI', '', 0, 'balzamicheskie-uksusy-i-sousy-delphitwo', 13670790, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670792, 1, 0, 'KOLYMPARI', 'Бальзамические уксусы и соусы KOLYMPARI', '', 0, 'balzamicheskie-uksusy-i-sousy-kolymparitwo', 13670790, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670791, 1, 0, 'PAPADIMITRIOU', 'Бальзамические уксусы и соусы PAPADIMITRIOU', '', 0, 'balzamicheskie-uksusy-i-sousy-papadimitrioutwo', 13670790, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670793, 1, 0, 'Горчица', 'Бальзамические уксусы и соусы Горчица', '', 0, 'balzamicheskie-uksusy-i-sousy-gorchitsatwo', 13670790, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670794, 1, 0, 'PAPADIMITRIOU', 'Бальзамические уксусы и соусы Горчица PAPADIMITRIOU', '', 0, 'balzamicheskie-uksusy-i-sousy-gorchitsa-papadimitriou', 13670793, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670721, 1, 0, 'Варенье', 'Варенье', '', 0, 'varenetwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670722, 1, 0, 'Koska', 'Варенье Koska', '', 0, 'varene-koskatwo', 13670721, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670711, 1, 0, 'Восточные сладости', 'Восточные сладости', '', 0, 'vostochnye-sladostitwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670796, 1, 0, 'Греческие сладости', 'Восточные сладости Греческие сладости', '', 0, 'vostochnye-sladosti-grecheskie-sladostitwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670802, 1, 0, 'KANDY’S', 'Восточные сладости Греческие сладости KANDY’S', '', 0, 'vostochnye-sladosti-grecheskie-sladosti-kandy-s', 13670796, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670801, 1, 0, 'Вафли CAPRICE', 'Восточные сладости Греческие сладости Вафли CAPRICE', '', 0, 'vostochnye-sladosti-grecheskie-sladosti-vafli-caprice', 13670796, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670799, 1, 0, 'Кунжутная паста KANDYLAS', 'Восточные сладости Греческие сладости Кунжутная паста KANDYLAS', '', 0, 'vostochnye-sladosti-grecheskie-sladosti-kunzhutnaya-pasta-kandylas', 13670796, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670798, 1, 0, 'Лукум SARANTIS', 'Восточные сладости Греческие сладости Лукум SARANTIS', '', 0, 'vostochnye-sladosti-grecheskie-sladosti-lukum-sarantis', 13670796, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670797, 1, 0, 'Халва DELPHI', 'Восточные сладости Греческие сладости Халва DELPHI', '', 0, 'vostochnye-sladosti-grecheskie-sladosti-khalva-delphi', 13670796, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670800, 1, 0, 'Халва KANDYLAS', 'Восточные сладости Греческие сладости Халва KANDYLAS', '', 0, 'vostochnye-sladosti-grecheskie-sladosti-khalva-kandylas', 13670796, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670712, 1, 0, 'Ливанские сладости', 'Восточные сладости Ливанские сладости', '', 0, 'vostochnye-sladosti-livanskie-sladostitwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670713, 1, 0, 'Pate D\'Or', 'Восточные сладости Ливанские сладости Pate D\'Or', '', 0, 'vostochnye-sladosti-livanskie-sladosti-pate-d-or', 13670712, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670727, 1, 0, 'Пекмез', 'Восточные сладости Пекмез', '', 0, 'vostochnye-sladosti-pekmeztwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670728, 1, 0, 'Koska', 'Восточные сладости Пекмез Koska', '', 0, 'vostochnye-sladosti-pekmez-koska', 13670727, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670719, 1, 0, 'Пишмание', 'Восточные сладости Пишмание', '', 0, 'vostochnye-sladosti-pishmanietwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670720, 1, 0, 'Adlin, Hajabdollah', 'Восточные сладости Пишмание Adlin, Hajabdollah', '', 0, 'vostochnye-sladosti-pishmanie-adlin-hajabdollah', 13670719, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670729, 1, 0, 'Koska', 'Восточные сладости Пишмание Koska', '', 0, 'vostochnye-sladosti-pishmanie-koska', 13670719, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670723, 1, 0, 'Продукты из кунжутной пасты (тахины)', 'Восточные сладости Продукты из кунжутной пасты (тахины)', '', 0, 'vostochnye-sladosti-produkty-iz-kunzhutnoy-pasty-takhinytwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670724, 1, 0, 'Koska', 'Восточные сладости Продукты из кунжутной пасты (тахины) Koska', '', 0, 'vostochnye-sladosti-produkty-iz-kunzhutnoy-pasty-takhiny-koska', 13670723, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670730, 1, 0, 'Рахат-лукум', 'Восточные сладости Рахат-лукум', '', 0, 'vostochnye-sladosti-rakhat-lukumtwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670731, 1, 0, 'Koska', 'Восточные сладости Рахат-лукум Koska', '', 0, 'vostochnye-sladosti-rakhat-lukum-koska', 13670730, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670725, 1, 0, 'Халва', 'Восточные сладости Халва', '', 0, 'vostochnye-sladosti-khalvatwo', 13670711, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670726, 1, 0, 'Koska', 'Восточные сладости Халва Koska', '', 0, 'vostochnye-sladosti-khalva-koska', 13670725, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670823, 1, 0, 'Греческие напитки', 'Греческие напитки', '', 0, 'grecheskie-napitkitwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670824, 1, 0, 'Безалкогольные напитки LOUX', 'Греческие напитки Безалкогольные напитки LOUX', '', 0, 'grecheskie-napitki-bezalkogolnye-napitki-louxtwo', 13670823, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670825, 1, 0, 'Безалкогольные напитки THEONI', 'Греческие напитки Безалкогольные напитки THEONI', '', 0, 'grecheskie-napitki-bezalkogolnye-napitki-theonitwo', 13670823, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670803, 1, 0, 'Греческие хлебобулочные изделия', 'Греческие хлебобулочные изделия', '', 0, 'grecheskie-khlebobulochnye-izdeliyatwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670815, 1, 0, 'Греческая выпечка (заморозка)', 'Греческие хлебобулочные изделия Греческая выпечка (заморозка)', '', 0, 'grecheskie-khlebobulochnye-izdeliya-grecheskaya-vypechka-zamorozkatwo', 13670803, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670818, 1, 0, 'FILOSOPHY', 'Греческие хлебобулочные изделия Греческая выпечка (заморозка) FILOSOPHY', '', 0, 'grecheskie-khlebobulochnye-izdeliya-grecheskaya-vypechka-zamorozka-filosophy', 13670815, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670816, 1, 0, 'IONIKI', 'Греческие хлебобулочные изделия Греческая выпечка (заморозка) IONIKI', '', 0, 'grecheskie-khlebobulochnye-izdeliya-grecheskaya-vypechka-zamorozka-ioniki', 13670815, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670817, 1, 0, 'KOLIOS', 'Греческие хлебобулочные изделия Греческая выпечка (заморозка) KOLIOS', '', 0, 'grecheskie-khlebobulochnye-izdeliya-grecheskaya-vypechka-zamorozka-kolios', 13670815, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670811, 1, 0, 'Печенье MANNA', 'Греческие хлебобулочные изделия Печенье MANNA', '', 0, 'grecheskie-khlebobulochnye-izdeliya-pechene-mannatwo', 13670803, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670804, 1, 0, 'Печенье PAPADOPOULOS', 'Греческие хлебобулочные изделия Печенье PAPADOPOULOS', '', 0, 'grecheskie-khlebobulochnye-izdeliya-pechene-papadopoulostwo', 13670803, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670810, 1, 0, 'Сухари MANNA', 'Греческие хлебобулочные изделия Сухари MANNA', '', 0, 'grecheskie-khlebobulochnye-izdeliya-sukhari-mannatwo', 13670803, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670821, 1, 0, 'Консервированные морепродукты', 'Консервированные морепродукты', '', 0, 'konservirovannye-moreproduktytwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670822, 1, 0, 'TRATA', 'Консервированные морепродукты TRATA', '', 0, 'konservirovannye-moreprodukty-tratatwo', 13670821, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670714, 1, 0, 'Кофе', 'Кофе', '', 0, 'kofetwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670717, 1, 0, 'Какао', 'Кофе Какао', '', 0, 'kofe-kakaotwo', 13670714, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670718, 1, 0, 'Mehmet Efendi', 'Кофе Какао Mehmet Efendi', '', 0, 'kofe-kakao-mehmet-efendi', 13670717, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670715, 1, 0, 'Турецкий кофе', 'Кофе Турецкий кофе', '', 0, 'kofe-turetskiy-kofetwo', 13670714, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670716, 1, 0, 'Mehmet Efendi', 'Кофе Турецкий кофе Mehmet Efendi', '', 0, 'kofe-turetskiy-kofe-mehmet-efendi', 13670715, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670805, 1, 0, 'Макаронные изделия', 'Макаронные изделия', '', 0, 'makaronnye-izdeliyatwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670807, 1, 0, 'Melissa', 'Макаронные изделия Melissa', '', 0, 'makaronnye-izdeliya-melissatwo', 13670805, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670806, 1, 0, 'Melissa- Primo Gusto', 'Макаронные изделия Melissa- Primo Gusto', '', 0, 'makaronnye-izdeliya-melissa-primo-gustotwo', 13670805, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670809, 1, 0, 'Primo Gusto', 'Макаронные изделия Primo Gusto', '', 0, 'makaronnye-izdeliya-primo-gustotwo', 13670805, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670808, 1, 0, 'VLAHA', 'Макаронные изделия VLAHA', '', 0, 'makaronnye-izdeliya-vlahatwo', 13670805, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670851, 1, 0, 'Масло', 'Масло', '', 0, 'maslotwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670852, 1, 0, 'Оливковое масло', 'Масло Оливковое масло', '', 0, 'maslo-olivkovoe-maslotwo', 13670851, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670855, 1, 0, 'ANOSKELI', 'Масло Оливковое масло ANOSKELI', '', 0, 'maslo-olivkovoe-maslo-anoskeli', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670862, 1, 0, 'ATРLON', 'Масло Оливковое масло ATРLON', '', 0, 'maslo-olivkovoe-maslo-atrlon', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670858, 1, 0, 'CRETAN MILL', 'Масло Оливковое масло CRETAN MILL', '', 0, 'maslo-olivkovoe-maslo-cretan-mill', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670853, 1, 0, 'DELPHI', 'Масло Оливковое масло DELPHI', '', 0, 'maslo-olivkovoe-maslo-delphi', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670856, 1, 0, 'IONIS', 'Масло Оливковое масло IONIS', '', 0, 'maslo-olivkovoe-maslo-ionis', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670857, 1, 0, 'KOLYMVARI', 'Масло Оливковое масло KOLYMVARI', '', 0, 'maslo-olivkovoe-maslo-kolymvari', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670860, 1, 0, 'OLEUM CRETE', 'Масло Оливковое масло OLEUM CRETE', '', 0, 'maslo-olivkovoe-maslo-oleum-crete', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670859, 1, 0, 'Roumeliotis Family', 'Масло Оливковое масло Roumeliotis Family', '', 0, 'maslo-olivkovoe-maslo-roumeliotis-family', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670854, 1, 0, 'SITIA', 'Масло Оливковое масло SITIA', '', 0, 'maslo-olivkovoe-maslo-sitia', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670861, 1, 0, 'TOPLOU', 'Масло Оливковое масло TOPLOU', '', 0, 'maslo-olivkovoe-maslo-toplou', 13670852, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670831, 1, 0, 'Овощная консервация', 'Овощная консервация', '', 0, 'ovoshchnaya-konservatsiyatwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670837, 1, 0, 'BUONO', 'Овощная консервация BUONO', '', 0, 'ovoshchnaya-konservatsiya-buonotwo', 13670831, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670833, 1, 0, 'DELPHI', 'Овощная консервация DELPHI', '', 0, 'ovoshchnaya-konservatsiya-delphitwo', 13670831, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670836, 1, 0, 'NESTOS', 'Овощная консервация NESTOS', '', 0, 'ovoshchnaya-konservatsiya-nestostwo', 13670831, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670832, 1, 0, 'PALIRRIA', 'Овощная консервация PALIRRIA', '', 0, 'ovoshchnaya-konservatsiya-palirriatwo', 13670831, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670838, 1, 0, 'ROYAL MEDITERRANEAN', 'Овощная консервация ROYAL MEDITERRANEAN', '', 0, 'ovoshchnaya-konservatsiya-royal-mediterraneantwo', 13670831, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670839, 1, 0, 'Оливки и маслины', 'Оливки и маслины', '', 0, 'olivki-i-maslinytwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670844, 1, 0, 'В вакууме', 'Оливки и маслины В вакууме', '', 0, 'olivki-i-masliny-v-vakuumetwo', 13670839, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670846, 1, 0, 'ASTIR', 'Оливки и маслины В вакууме ASTIR', '', 0, 'olivki-i-masliny-v-vakuume-astir', 13670844, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670847, 1, 0, 'DELPHI', 'Оливки и маслины В вакууме DELPHI', '', 0, 'olivki-i-masliny-v-vakuume-delphi', 13670844, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670845, 1, 0, 'LELIA', 'Оливки и маслины В вакууме LELIA', '', 0, 'olivki-i-masliny-v-vakuume-lelia', 13670844, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670848, 1, 0, 'OLIVE GARDENS', 'Оливки и маслины В вакууме OLIVE GARDENS', '', 0, 'olivki-i-masliny-v-vakuume-olive-gardens', 13670844, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670840, 1, 0, 'В жести', 'Оливки и маслины В жести', '', 0, 'olivki-i-masliny-v-zhestitwo', 13670839, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670841, 1, 0, 'DELPHI', 'Оливки и маслины В жести DELPHI', '', 0, 'olivki-i-masliny-v-zhesti-delphi', 13670840, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670842, 1, 0, 'В стекле', 'Оливки и маслины В стекле', '', 0, 'olivki-i-masliny-v-stekletwo', 13670839, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670843, 1, 0, 'DELPHI', 'Оливки и маслины В стекле DELPHI', '', 0, 'olivki-i-masliny-v-stekle-delphi', 13670842, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670813, 1, 0, 'Приправы', 'Приправы', '', 0, 'pripravytwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670814, 1, 0, 'VRINO', 'Приправы VRINO', '', 0, 'pripravy-vrinotwo', 13670813, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670827, 1, 0, 'Томатная группа', 'Томатная группа', '', 0, 'tomatnaya-gruppatwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670850, 1, 0, 'BUONO', 'Томатная группа BUONO', '', 0, 'tomatnaya-gruppa-buonotwo', 13670827, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670849, 1, 0, 'DELPHI', 'Томатная группа DELPHI', '', 0, 'tomatnaya-gruppa-delphitwo', 13670827, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670829, 1, 0, 'KYKNOS', 'Томатная группа KYKNOS', '', 0, 'tomatnaya-gruppa-kyknostwo', 13670827, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670828, 1, 0, 'Perfetto special', 'Томатная группа Perfetto special', '', 0, 'tomatnaya-gruppa-perfetto-specialtwo', 13670827, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670830, 1, 0, 'Primo Gusto', 'Томатная группа Primo Gusto', '', 0, 'tomatnaya-gruppa-primo-gustotwo', 13670827, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670819, 1, 0, 'Фруктовая консервация', 'Фруктовая консервация', '', 0, 'fruktovaya-konservatsiyatwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670820, 1, 0, 'DELPHI', 'Фруктовая консервация DELPHI', '', 0, 'fruktovaya-konservatsiya-delphitwo', 13670819, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670785, 1, 0, 'Чай и Кофе', 'Чай и Кофе', '', 0, 'chay-i-kofetwo', 0, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670812, 1, 0, 'Греческий кофе LOUMIDIS PAPAGALOS', 'Чай и Кофе Греческий кофе LOUMIDIS PAPAGALOS', '', 0, 'chay-i-kofe-grecheskiy-kofe-loumidis-papagalostwo', 13670785, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670826, 1, 0, 'Греческий чай Othrys Farm', 'Чай и Кофе Греческий чай Othrys Farm', '', 0, 'chay-i-kofe-grecheskiy-chay-othrys-farmtwo', 13670785, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670788, 1, 0, 'Какао', 'Чай и Кофе Какао', '', 0, 'chay-i-kofe-kakaotwo', 13670785, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670786, 1, 0, 'Турецкий кофе', 'Чай и Кофе Турецкий кофе', '', 0, 'chay-i-kofe-turetskiy-kofetwo', 13670785, 0, 0, 0, 0, 0, '', '', '', '', '', NULL),
(13670787, 1, 0, 'Mehmet Efendi', 'Чай и Кофе Турецкий кофе Mehmet Efendi', '', 0, 'chay-i-kofe-turetskiy-kofe-mehmet-efendi', 13670786, 0, 0, 0, 0, 0, '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_categories_also`
--

CREATE TABLE `shop_categories_also` (
  `sca_cat_id` int(11) NOT NULL,
  `sca_also_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_categories_also`
--

INSERT INTO `shop_categories_also` (`sca_cat_id`, `sca_also_id`) VALUES
(9, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_categories_filters`
--

CREATE TABLE `shop_categories_filters` (
  `scf_category_id` int(11) NOT NULL,
  `scf_sprav_id` int(11) NOT NULL,
  `scf_sort` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_categories_filters`
--

INSERT INTO `shop_categories_filters` (`scf_category_id`, `scf_sprav_id`, `scf_sort`) VALUES
(1, 1, 1),
(1, 2, 2),
(5, 8, 80),
(5, 7, 77),
(8, 1, 5),
(8, 2, 6),
(6, 1, 7),
(6, 2, 8),
(9, 1, 75),
(9, 2, 76),
(7, 1, 11),
(7, 2, 12),
(2, 1, 13),
(2, 2, 14),
(3, 3, 58),
(3, 1, 57),
(4, 1, 17),
(4, 2, 18),
(5, 1, 76),
(8, 3, 20),
(6, 3, 21),
(7, 3, 22),
(1, 3, 23),
(2, 3, 24),
(3, 5, 56),
(4, 3, 26),
(9, 3, 78),
(5, 6, 75),
(8, 4, 29),
(6, 4, 30),
(9, 4, 80),
(7, 4, 32),
(1, 4, 33),
(2, 4, 34),
(3, 4, 55),
(4, 4, 36),
(0, 1, 37),
(0, 3, 38),
(10, 1, 39),
(10, 3, 40),
(10, 2, 41),
(10, 4, 42),
(11, 1, 43),
(11, 3, 44),
(11, 2, 45),
(11, 4, 46),
(12, 1, 47),
(12, 3, 48),
(12, 2, 49),
(12, 4, 50),
(3, 2, 59),
(3, 6, 54),
(5, 9, 78),
(5, 10, 79),
(5, 11, 81),
(5, 4, 82),
(5, 3, 83),
(5, 2, 84),
(5, 12, 85),
(3, 9, 60),
(3, 11, 61),
(3, 7, 62),
(3, 15, 63),
(3, 14, 64),
(3, 16, 65),
(3, 13, 66),
(3, 17, 67),
(9, 14, 81),
(9, 7, 82),
(9, 15, 83),
(9, 11, 84),
(9, 9, 79),
(9, 16, 85),
(9, 13, 86),
(9, 17, 87),
(9, 12, 88),
(9, 8, 89),
(9, 5, 90),
(9, 10, 91),
(9, 6, 77);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_complectation`
--

CREATE TABLE `shop_complectation` (
  `comp_id` int(11) NOT NULL,
  `comp_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop_complectation`
--

INSERT INTO `shop_complectation` (`comp_id`, `comp_title`) VALUES
(1, 'Радиатор'),
(2, 'Кронштейны'),
(3, 'Заглушка'),
(4, 'Клапан Маевского');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_delivery_cities`
--

CREATE TABLE `shop_delivery_cities` (
  `city_id` int(11) NOT NULL,
  `city_status` int(1) NOT NULL DEFAULT 1,
  `city_title` varchar(100) NOT NULL,
  `city_url` varchar(250) NOT NULL,
  `city_text_id` int(11) NOT NULL DEFAULT 0,
  `city_icon` int(11) NOT NULL DEFAULT 0,
  `city_head_title` varchar(250) NOT NULL DEFAULT '',
  `city_head_desc` varchar(250) NOT NULL DEFAULT '',
  `city_head_keywords` varchar(250) NOT NULL DEFAULT '',
  `city_price` varchar(30) NOT NULL DEFAULT '0',
  `city_delay` int(11) NOT NULL DEFAULT 0,
  `city_until` varchar(20) NOT NULL DEFAULT '',
  `city_pickup` varchar(100) NOT NULL DEFAULT '',
  `city_pickup_price` int(11) NOT NULL DEFAULT 0,
  `city_pickup_delay` int(11) NOT NULL DEFAULT 0,
  `city_pickup_until` varchar(20) NOT NULL DEFAULT '',
  `city_cat` int(11) NOT NULL DEFAULT 0,
  `city_show` int(1) NOT NULL DEFAULT 0,
  `city_related` int(11) NOT NULL DEFAULT 0,
  `city_meta_title2` varchar(250) NOT NULL DEFAULT '',
  `city_site` varchar(50) NOT NULL DEFAULT '',
  `city_group_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_delivery_cities`
--

INSERT INTO `shop_delivery_cities` (`city_id`, `city_status`, `city_title`, `city_url`, `city_text_id`, `city_icon`, `city_head_title`, `city_head_desc`, `city_head_keywords`, `city_price`, `city_delay`, `city_until`, `city_pickup`, `city_pickup_price`, `city_pickup_delay`, `city_pickup_until`, `city_cat`, `city_show`, `city_related`, `city_meta_title2`, `city_site`, `city_group_id`) VALUES
(1, 1, 'Севастополь', 'sevastopol', 19611, 0, '', 'Купить керамическую плитку, кафель, сантехнику в интернет магазине Ударник Севастополь. Официальный сайт. Недорогие цены. Доставка по Крыму.', '', '0', 0, '', 'ул. Вакуленчука 33А, корпус 2', 0, 2, '', 0, 1, 0, '', 'https://sevastopol.udarnik.com.ru', 4),
(2, 1, 'Ялта', 'jalta', 19618, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(3, 1, 'Алушта', 'alushta', 0, 0, '', '', '', '', 0, '', '', 0, 0, '', 0, 1, 0, '', '', 1),
(4, 1, 'Евпатория', 'evpatorija', 19613, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(5, 1, 'Саки', 'saki', 19615, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(6, 1, 'Черноморское', 'chernomorskoe', 19629, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(7, 1, 'Феодосия', 'feodosija', 19617, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(8, 1, 'Коктебель', 'koktebel', 19624, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(9, 1, 'Судак', 'sudak', 19616, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(10, 1, 'Керчь', 'kerch', 19610, 0, '', 'Купить керамическую плитку, кафель, сантехнику в интернет магазине Ударник Симферополь. Официальный сайт. Недорогие цены. Доставка по Крыму.', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(11, 1, 'Бахчисарай', 'bahchisaraj', 19620, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(12, 1, 'Белогорск', 'belogorsk', 19621, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(13, 1, 'Джанкой', 'dzhankoj', 19622, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(14, 1, 'Кировское', 'kirovskoe', 19623, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(15, 1, 'Красногвардейское', 'krasnogvardejskoe', 19625, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(16, 1, 'Красноперекопск', 'krasnoperekopsk', 19614, 0, '', '', '', '200', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 16, '', '', 6),
(17, 1, 'Нижнегорский', 'nizhnegorskij', 19626, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(18, 1, 'Октябрьское', 'oktjabrskoe', 19627, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(19, 1, 'Щелкино', 'schelkino', 19630, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(20, 1, 'Армянск', 'armjansk', 19619, 0, '', '', '', '', 0, '', '', 0, 0, '', 0, 1, 0, '', '', 1),
(21, 1, 'Алупка', 'alupka', 15860, 0, '', '', '', '500-800', 2, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(22, 1, 'Укромное', 'ukromnoe', 19628, 0, '', '', '', '0', 0, '', 'Симферополь, ул. Воровского 13', 0, 0, '', 0, 1, 0, '', '', 1),
(23, 1, 'Симферополь', 'simferopol', 0, 0, '', '', '', '', 0, '', '', 0, 0, '', 0, 1, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_faqs`
--

CREATE TABLE `shop_faqs` (
  `faqs_id` int(11) NOT NULL,
  `faqs_title` varchar(500) NOT NULL,
  `faqs_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_faqs`
--

INSERT INTO `shop_faqs` (`faqs_id`, `faqs_title`, `faqs_status`) VALUES
(1, 'Main FAQ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_faqs_items`
--

CREATE TABLE `shop_faqs_items` (
  `fitem_id` int(11) NOT NULL,
  `fitem_status` int(1) NOT NULL DEFAULT 1,
  `fitem_ask` varchar(500) NOT NULL,
  `fitem_answer` text DEFAULT NULL,
  `fitem_sort` int(11) NOT NULL DEFAULT 999,
  `fitem_faq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_faqs_items`
--

INSERT INTO `shop_faqs_items` (`fitem_id`, `fitem_status`, `fitem_ask`, `fitem_answer`, `fitem_sort`, `fitem_faq`) VALUES
(1, 1, 'Как сделать заказ?', '<p>Чтобы сделать заказ, Вы можете связаться с нашим менеджером по телефону <strong>+7978-834-98-05</strong> или заполнить форму на сайте. Мы сами свяжемся с Вами в ближайшее время.&nbsp; &nbsp;</p>', 999, 1),
(2, 1, 'Сколько хранится букет?', '<p class=\"p2mrcssattr\" style=\"margin: 0cm; margin-bottom: .0001pt;\"><span class=\"s1mrcssattr\"><span style=\"color: black;\">Мы всегда очень внимательно и кропотливо выбираем ингредиенты для наших композиций, тщательно и подробно изучаем сроки годности каждого составляющего.</span></span></p>\n<p class=\"p2mrcssattr\" style=\"margin: 0cm; margin-bottom: .0001pt; font-stretch: normal; caret-color: #000000; -webkit-tap-highlight-color: rgba(26, 26, 26, 0.3); text-size-adjust: auto;\"><span class=\"s1mrcssattr\"><span style=\"color: black;\">Но тем не менее у каждого букета есть свой срок годности.</span></span></p>\n<p class=\"p2mrcssattr\" style=\"margin: 0cm; margin-bottom: .0001pt; font-stretch: normal; caret-color: #000000; -webkit-tap-highlight-color: rgba(26, 26, 26, 0.3); text-size-adjust: auto;\"><span class=\"s1mrcssattr\"><span style=\"color: black;\">Самыми быстро портящимися продуктами в букетах являются ягоды, поскольку они изначально очень хрупкие и нежные. Соответственно, и композиции с ними мы рекомендуем употребить сразу после вручения.</span></span></p>\n<p class=\"p2mrcssattr\" style=\"margin: 0cm; margin-bottom: .0001pt; font-stretch: normal; caret-color: #000000; -webkit-tap-highlight-color: rgba(26, 26, 26, 0.3); text-size-adjust: auto;\"><span class=\"s1mrcssattr\"><span style=\"color: black;\">Букеты из фруктов, сыров, колбас, раков и морепродуктов мы рекомендуем употребить в течение суток. В крайнем случае &mdash; если хотите продлить им жизнь, то все ингредиенты необходимо снять со шпажек и отправить в холодильник (но максимальный срок хранения в нем &mdash; не более трех суток).</span></span></p>\n<p class=\"p2mrcssattr\" style=\"margin: 0cm; margin-bottom: .0001pt; font-stretch: normal; caret-color: #000000; -webkit-tap-highlight-color: rgba(26, 26, 26, 0.3); text-size-adjust: auto;\"><span class=\"s1mrcssattr\"><span style=\"color: black;\">Ну и самые долгоиграющие составные в композициях &mdash; конфеты, орехи и сухофрукты. Их можно кушать не спеша, растягивая удовольствие (максимальный срок хранения таких композиций &mdash; 1 месяц).</span></span></p>\n<p class=\"p2mrcssattr\" style=\"margin: 0cm; margin-bottom: .0001pt;\"><span class=\"s1mrcssattr\"><span style=\"color: black;\">Для информирования получателя о хранении и сроках годности наших композиций, к каждой из них мы прилагаем отдельную инструкцию.</span></span></p>', 999, 1),
(3, 1, 'Возможен ли индивидуальный заказ?', '<p>Конечно!</p>\n<p>Мы с радостью воплотим любые ваши идеи в жизнь.</p>\n<p>Если вы не нашли подходящего букета у нас на сайте, мы можем собрать его по вашим предпочтениям &mdash; просто перечислите желаемые ингридиенты.</p>\n<p>Если Вам приглянулась какая-то модель букета, но хотелось бы убрать/добавить/заменить отдельные составляющие, сообщите об этом нашему менджеру, и мы обязательно это учтем при выполнении вашего заказа.</p>', 999, 1),
(4, 1, 'За сколько дней нужно делать заказ?', '<p>Все ингредиенты мы закупаем непосредственно под ваш заказ. Поэтому очень важно сделать заказ хотя бы сутки (в праздничные дни - за 7-10 дней), чтобы мы успели найти и закупить все необходимые составляющие.</p>', 999, 1),
(5, 1, 'Есть ли доставка?', '<p>Мы можем доставить вам букет по удобному адресу, либо же доставить его сюрпризом непосредственно получателю (предварительно согласовав время и место вручения).</p>\n<p>Стоимость доставки по г. Симферополь фиксированая-300р.</p>\n<p>Условия доставки в другие населеные пункты согласовывается отдельно с менеджером.</p>', 999, 1),
(6, 1, 'Букет будет как на фото?', '<p>Учитывая то, что ингредиенты могут отличаться по форме и размеру, соответственно, будет меняться их компановка и расположение в букете, то возможны незначительные несоответсвия фотографии на сайте и получившегося букета. Однако состав, вес, объём, количество и качество ингредиентов будет идентичным.&nbsp;</p>\n<p>При этом в зависимости от сезонности, наличия ингредиентов и Ваших пожеланий фото может значительно отличаться от итогового результата. Разумеется, все изменения и дополнения согласовываются с клиентом.</p>', 999, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_items`
--

CREATE TABLE `shop_items` (
  `item_id` int(11) NOT NULL,
  `item_is_model` int(1) NOT NULL DEFAULT 0,
  `item_cat_id` int(11) NOT NULL DEFAULT 0,
  `item_status` int(1) NOT NULL DEFAULT 1,
  `item_vendor_id` int(11) NOT NULL DEFAULT 0,
  `item_title` varchar(255) NOT NULL,
  `item_short_title` varchar(100) NOT NULL DEFAULT '',
  `item_url` varchar(255) NOT NULL DEFAULT '',
  `item_amount` int(11) NOT NULL DEFAULT 0,
  `item_amount_nal` int(11) NOT NULL DEFAULT 0,
  `item_amount_nal_opt` int(11) NOT NULL DEFAULT 0,
  `item_price` int(11) NOT NULL DEFAULT 0,
  `item_price_fakt` int(11) NOT NULL DEFAULT 0,
  `item_price_opt_vip` int(11) NOT NULL DEFAULT 0,
  `item_price_opt` int(11) NOT NULL DEFAULT 0,
  `item_price_before` int(11) NOT NULL DEFAULT 0,
  `item_short_text` varchar(2000) NOT NULL DEFAULT '',
  `item_text_id` int(11) NOT NULL DEFAULT 0,
  `item_composition_id` int(11) DEFAULT NULL,
  `item_video_id` int(11) NOT NULL DEFAULT 0,
  `item_comments` int(11) NOT NULL DEFAULT 0,
  `item_icon` varchar(100) NOT NULL DEFAULT '0',
  `item_icon_back` int(11) NOT NULL DEFAULT 0,
  `item_rate` decimal(4,2) NOT NULL DEFAULT 0.00,
  `item_views` int(11) NOT NULL DEFAULT 0,
  `item_head_title` varchar(255) NOT NULL DEFAULT '',
  `item_head_desc` varchar(255) NOT NULL DEFAULT '',
  `item_head_keywords` varchar(255) NOT NULL DEFAULT '',
  `item_sale` int(1) NOT NULL DEFAULT 0,
  `item_new` int(1) NOT NULL DEFAULT 0,
  `item_hit` int(1) NOT NULL DEFAULT 0,
  `item_badge` int(1) NOT NULL DEFAULT 0,
  `item_up` int(1) NOT NULL DEFAULT 0,
  `item_sort` decimal(11,4) NOT NULL DEFAULT 0.0000,
  `item_time` datetime NOT NULL DEFAULT current_timestamp(),
  `item_parent_id` int(11) NOT NULL DEFAULT 0,
  `item_has_child` int(1) NOT NULL DEFAULT 0,
  `item_offers` int(11) NOT NULL DEFAULT 0,
  `item_source_url` varchar(250) NOT NULL DEFAULT '',
  `item_icons_dop` varchar(500) NOT NULL DEFAULT '',
  `item_dop_urls` varchar(1000) NOT NULL DEFAULT '',
  `item_dop` varchar(250) NOT NULL DEFAULT '',
  `item_full_title` varchar(250) NOT NULL DEFAULT '',
  `item_offers_total` int(11) NOT NULL DEFAULT 0,
  `item_last_zero` varchar(20) DEFAULT NULL,
  `item_sale_percent` int(11) DEFAULT NULL,
  `item_article` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_items`
--

INSERT INTO `shop_items` (`item_id`, `item_is_model`, `item_cat_id`, `item_status`, `item_vendor_id`, `item_title`, `item_short_title`, `item_url`, `item_amount`, `item_amount_nal`, `item_amount_nal_opt`, `item_price`, `item_price_fakt`, `item_price_opt_vip`, `item_price_opt`, `item_price_before`, `item_short_text`, `item_text_id`, `item_composition_id`, `item_video_id`, `item_comments`, `item_icon`, `item_icon_back`, `item_rate`, `item_views`, `item_head_title`, `item_head_desc`, `item_head_keywords`, `item_sale`, `item_new`, `item_hit`, `item_badge`, `item_up`, `item_sort`, `item_time`, `item_parent_id`, `item_has_child`, `item_offers`, `item_source_url`, `item_icons_dop`, `item_dop_urls`, `item_dop`, `item_full_title`, `item_offers_total`, `item_last_zero`, `item_sale_percent`, `item_article`) VALUES
(23596988, 0, 13555973, 1, 0, 'Винт 5*16 мм', '', 'vint-5-16-mm', 0, 0, 0, 12, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '900238-05016'),
(23596987, 0, 13555973, 1, 0, 'Леска для триммера квадратная 2.4 MM ORANGE L=34M (226 gr)', '', 'leska-dlya-trimmera-kvadratnaya-2-4-mm-orange-l-34m-226-gr', 0, 0, 0, 403, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '781025'),
(23596986, 0, 13555973, 1, 0, 'Пильный диск tct 165x20 z36 тонкофрезерный', '', 'pilnyy-disk-tct-165x20-z36-tonkofrezernyy', 0, 0, 0, 1657, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '752415'),
(23596985, 0, 13555973, 1, 0, 'Патрон быстрозажимной 10mm с адаптером на 1/4\"', '', 'patron-bystrozazhimnoy-10mm-s-adapterom-na-1-4', 0, 0, 0, 1937, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '752083'),
(23596984, 0, 13555973, 1, 0, 'Зажимной патрон аккумуляторного шуроповерта', '', 'zazhimnoy-patron-akkumulyatornogo-shuropoverta', 0, 0, 0, 907, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '752082'),
(23596983, 0, 13555973, 1, 0, 'DRILL CHUCK 3/8 X24UNF, 0.8-10MM KEYLESS LOCK (OLD 752078)', '', 'drill-chuck-3-8-x24unf-0-8-10mm-keyless-lock-old-752078', 0, 0, 0, 1054, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '752079'),
(23596982, 0, 13555973, 1, 0, 'Быстрозажимной патрон 1/2\"x20unf, 1,5-13mm (old 6686379)', '', 'bystrozazhimnoy-patron-1-2-x20unf-1-5-13mm-old-6686379', 0, 0, 0, 2016, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '752067'),
(23596980, 0, 13555973, 1, 0, 'Ходовой вал', '', 'khodovoy-val', 0, 0, 0, 1629, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '726409'),
(23596981, 0, 13555973, 1, 0, 'Адаптер для ударных головок 1/2 in-1/4 hex-in (old 955135b)', '', 'adapter-dlya-udarnykh-golovok-1-2-in-1-4-hex-in-old-955135b', 0, 0, 0, 149, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '751874'),
(23596979, 0, 13555973, 1, 0, 'Сетевой кабель 5 м. (old 500390z/500235z)', '', 'setevoy-kabel-5-m-old-500390z-500235z', 0, 0, 0, 523, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '714520'),
(23596978, 0, 13555973, 1, 0, 'Свеча зажигания RCJ6Y(OLD 018-12710-20/791157/6685782/668577', '', 'svecha-zazhiganiya-rcj6y-old-018-12710-20-791157-6685782-668577', 0, 0, 0, 219, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6699326'),
(23596977, 0, 13555973, 1, 0, 'Цилиндр', '', 'tsilindr', 0, 0, 0, 2096, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6698537'),
(23596976, 0, 13555973, 1, 0, 'Картер кшм (a) comp', '', 'karter-kshm-a-comp', 0, 0, 0, 855, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6696537'),
(23596975, 0, 13555973, 1, 0, 'Рычаг', '', 'rychag', 0, 0, 0, 65, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6696488'),
(23596974, 0, 13555973, 1, 0, 'Цилиндр в сборе', '', 'tsilindr-v-sbore', 0, 0, 0, 2349, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6696413'),
(23596973, 0, 13555973, 1, 0, 'Катушка с леской TH-97LM M10X1.25 LH (OLD 000-33842-00/66932', '', 'katushka-s-leskoy-th-97lm-m10x1-25-lh-old-000-33842-00-66932', 0, 0, 0, 1617, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6695781'),
(23596972, 0, 13555973, 1, 0, 'Шуруп 5X57/S (OLD 994-14050-571)', '', 'shurup-5x57-s-old-994-14050-571', 0, 0, 0, 23, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6695353'),
(23596971, 0, 13555973, 1, 0, 'Шуруп фиксирующий М6X65 (OLD 990-53060-653)', '', 'shurup-fiksiruyushchiy-m6x65-old-990-53060-653', 0, 0, 0, 86, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6695088'),
(23596970, 0, 13555973, 1, 0, 'Карбюратор в сборе wyl-177 (old 455-07130-90)', '', 'karbyurator-v-sbore-wyl-177-old-455-07130-90', 0, 0, 0, 2706, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6690510'),
(23596969, 0, 13555973, 1, 0, 'Карбюратор в сборе (OLD 455-0422W-90) (NEW 6697732)', '', 'karbyurator-v-sbore-old-455-0422w-90-new-6697732', 0, 0, 0, 3949, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6690468'),
(23596968, 0, 13555973, 1, 0, 'Муфта сцепления 7t 0.325 (old 310-3252l-82)', '', 'mufta-stsepleniya-7t-0-325-old-310-3252l-82', 0, 0, 0, 1902, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6689009'),
(23596967, 0, 13555973, 1, 0, 'Шина пильная 12 INCH 3/8 SP HITACHI (OLD 109-32770-20/669570', '', 'shina-pilnaya-12-inch-3-8-sp-hitachi-old-109-32770-20-669570', 0, 0, 0, 1152, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6685294'),
(23596966, 0, 13555973, 1, 0, 'Контейнер для мусора (old 315-31820-20/6689086/6684975)', '', 'konteyner-dlya-musora-old-315-31820-20-6689086-6684975', 0, 0, 0, 2043, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6684948'),
(23596965, 0, 13555973, 1, 0, 'Болт крепёжный M5X18/S (OLD 994-61050-184)', '', 'bolt-krepezhnyy-m5x18-s-old-994-61050-184', 0, 0, 0, 42, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6684586'),
(23596964, 0, 13555973, 1, 0, 'Крышка воздушного фильтра', '', 'kryshka-vozdushnogo-filtra', 0, 0, 0, 116, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6600726'),
(23596963, 0, 13555973, 1, 0, 'Подшипник шариковый 22 мм.', '', 'podshipnik-sharikovyy-22-mm', 0, 0, 0, 228, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '627vvm'),
(23596962, 0, 13555973, 1, 0, 'Подшипник шариковый d 62 мм', '', 'podshipnik-sharikovyy-d-62-mm', 0, 0, 0, 705, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6007dd'),
(23596961, 0, 13555973, 1, 0, 'Подшипник шариковый D 35 мм', '', 'podshipnik-sharikovyy-d-35-mm', 0, 0, 0, 231, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6003dd'),
(23596960, 0, 13555973, 1, 0, 'Подшипник шариковый 32 мм.', '', 'podshipnik-sharikovyy-32-mm', 0, 0, 0, 304, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '6002vv'),
(23596959, 0, 13555973, 1, 0, 'Элемент фильтрующий O185x140(NEW 4100601)', '', 'element-filtruyushchiy-o185x140-new-4100601', 0, 0, 0, 1220, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '372152'),
(23596958, 0, 13555973, 1, 0, 'Приспособление для проверки бесщеточного инструмента', '', 'prisposoblenie-dlya-proverki-besshchetochnogo-instrumenta', 0, 0, 0, 4794, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '370956'),
(23596956, 0, 13555973, 1, 0, 'Якорь электродвигателя 220-240в', '', 'yakor-elektrodvigatelya-220-240v', 0, 0, 0, 3089, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '360762e'),
(23596957, 0, 13555973, 1, 0, 'Якорь электродвигателя 220-240в', '', 'yakor-elektrodvigatelya-220-240v', 0, 0, 0, 1069, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '360799e'),
(23596955, 0, 13555973, 1, 0, 'Якорь электродвигателя 220-230В', '', 'yakor-elektrodvigatelya-220-230v', 0, 0, 0, 5812, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '360750e'),
(23596954, 0, 13555973, 1, 0, 'Статор электродвигателя 230-240В (с 12.2005 г.в.) с проводам', '', 'stator-elektrodvigatelya-230-240v-s-12-2005-g-v-s-provodam', 0, 0, 0, 1056, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '340666e'),
(23596953, 0, 13555973, 1, 0, 'Статор электродвигателя 220-230В', '', 'stator-elektrodvigatelya-220-230v', 0, 0, 0, 708, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '340616e'),
(23596952, 0, 13555973, 1, 0, 'Статор электродвигателя', '', 'stator-elektrodvigatelya', 0, 0, 0, 1692, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '340485e'),
(23596951, 0, 13555973, 1, 0, 'Якорь 220-240В в сборе', '', 'yakor-220-240v-v-sbore', 0, 0, 0, 3068, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335972'),
(23596950, 0, 13555973, 1, 0, 'Кабель в сборе (5m) (EUROPE) для AW150', '', 'kabel-v-sbore-5m-europe-dlya-aw150', 0, 0, 0, 390, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335936'),
(23596949, 0, 13555973, 1, 0, 'Смазка для перфораторов DH24-28 (500гр.)', '', 'smazka-dlya-perforatorov-dh24-28-500gr', 0, 0, 0, 2476, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335781'),
(23596948, 0, 13555973, 1, 0, 'Шланг(a) (10m)(200bar)', '', 'shlang-a-10m-200bar', 0, 0, 0, 1152, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335621'),
(23596947, 0, 13555973, 1, 0, 'Шланг(a) (10m)(160bar)', '', 'shlang-a-10m-160bar', 0, 0, 0, 979, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335578'),
(23596945, 0, 13555973, 1, 0, 'Шланг(a) (5m)(120bar)+5q4-1', '', 'shlang-a-5m-120bar-5q4-1', 0, 0, 0, 598, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335526'),
(23596946, 0, 13555973, 1, 0, 'Основной выключатель', '', 'osnovnoy-vyklyuchatel', 0, 0, 0, 63, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335554'),
(23596944, 0, 13555973, 1, 0, 'Вторичная шестерня', '', 'vtorichnaya-shesternya', 0, 0, 0, 450, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335278'),
(23596943, 0, 13555973, 1, 0, 'Боек ударного механизма', '', 'boek-udarnogo-mekhanizma', 0, 0, 0, 247, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335269'),
(23596942, 0, 13555973, 1, 0, 'Сальник', '', 'salnik', 0, 0, 0, 109, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '335262'),
(23596941, 0, 13555973, 1, 0, 'Передняя опорная площадка P20ST', '', 'perednyaya-opornaya-ploshchadka-p20st', 0, 0, 0, 413, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '334738'),
(23596940, 0, 13555973, 1, 0, 'Часть корпуса шпинделя ушм (old 316489)', '', 'chast-korpusa-shpindelya-ushm-old-316489', 0, 0, 0, 162, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '333838'),
(23596939, 0, 13555973, 1, 0, 'Быстрозажимной патрон 13VLRK-N', '', 'bystrozazhimnoy-patron-13vlrk-n', 0, 0, 0, 1792, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '333691'),
(23596938, 0, 13555973, 1, 0, 'Корпус электродвигателя UM12VST', '', 'korpus-elektrodvigatelya-um12vst', 0, 0, 0, 436, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '333599'),
(23596937, 0, 13555973, 1, 0, 'Статор электродвигателя UM12VST', '', 'stator-elektrodvigatelya-um12vst', 0, 0, 0, 837, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '333598'),
(23596936, 0, 13555973, 1, 0, 'Приводной ремень (10PH432) (OLD 307736)', '', 'privodnoy-remen-10ph432-old-307736', 0, 0, 0, 763, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '332810'),
(23596935, 0, 13555973, 1, 0, 'Рукоятка боковая', '', 'rukoyatka-bokovaya', 0, 0, 0, 439, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '331906'),
(23596934, 0, 13555973, 1, 0, 'Корпус комплект (A+B) GREEN', '', 'korpus-komplekt-a-b-green', 0, 0, 0, 759, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '330953'),
(23596932, 0, 13555973, 1, 0, 'Блок электронный', '', 'blok-elektronnyy', 0, 0, 0, 8262, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '329826'),
(23596933, 0, 13555973, 1, 0, 'Защитный кожух в сборе G18SS', '', 'zashchitnyy-kozhukh-v-sbore-g18ss', 0, 0, 0, 690, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '330038'),
(23596931, 0, 13555973, 1, 0, 'Держатель пружины (OLD 328892)', '', 'derzhatel-pruzhiny-old-328892', 0, 0, 0, 1706, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '329330'),
(23596930, 0, 13555973, 1, 0, 'Корпус цилиндра ударного механизма', '', 'korpus-tsilindra-udarnogo-mekhanizma', 0, 0, 0, 3601, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '328896'),
(23596929, 0, 13555973, 1, 0, 'Печатная плата управления', '', 'pechatnaya-plata-upravleniya', 0, 0, 0, 2348, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '328765'),
(23596928, 0, 13555973, 1, 0, 'Корпус ударного механизма', '', 'korpus-udarnogo-mekhanizma', 0, 0, 0, 891, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '328041'),
(23596926, 0, 13555973, 1, 0, 'Крышка зажимного патрона', '', 'kryshka-zazhimnogo-patrona', 0, 0, 0, 211, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '324527'),
(23596927, 0, 13555973, 1, 0, 'Аккумулятор для шуруповерта 14,4V 3.0Ah Ni-MH (old 322883)', '', 'akkumulyator-dlya-shurupoverta-14-4v-3-0ah-ni-mh-old-322883', 0, 0, 0, 7979, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '326054'),
(23596925, 0, 13555973, 1, 0, 'Держатель демпфера', '', 'derzhatel-dempfera', 0, 0, 0, 422, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '324524'),
(23596924, 0, 13555973, 1, 0, 'Передний демпфер', '', 'peredniy-dempfer', 0, 0, 0, 623, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '323735'),
(23596923, 0, 13555973, 1, 0, 'Пружина муфты сцепления, сталь', '', 'pruzhina-mufty-stsepleniya-stal', 0, 0, 0, 109, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '323182'),
(23596922, 0, 13555973, 1, 0, 'Сальник резиновый, тип \"о\"', '', 'salnik-rezinovyy-tip-o', 0, 0, 0, 109, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '322808'),
(23596921, 0, 13555973, 1, 0, 'Стопорное кольцо, сталь', '', 'stopornoe-koltso-stal', 0, 0, 0, 109, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '322807'),
(23596920, 0, 13555973, 1, 0, 'Втулка демпферная', '', 'vtulka-dempfernaya', 0, 0, 0, 109, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '322805'),
(23596919, 0, 13555973, 1, 0, 'Часть рукоятки (В)', '', 'chast-rukoyatki-v', 0, 0, 0, 383, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '322546'),
(23596918, 0, 13555973, 1, 0, 'Пластиковая боковая рукоятка', '', 'plastikovaya-bokovaya-rukoyatka', 0, 0, 0, 550, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '322411'),
(23596917, 0, 13555973, 1, 0, 'Стальная направляющая втулка', '', 'stalnaya-napravlyayushchaya-vtulka', 0, 0, 0, 328, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '320818'),
(23596916, 0, 13555973, 1, 0, 'Направлющая ударника', '', 'napravlyushchaya-udarnika', 0, 0, 0, 85, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '320816'),
(23596915, 0, 13555973, 1, 0, 'Пыльник патрона для dh24pc3', '', 'pylnik-patrona-dlya-dh24pc3', 0, 0, 0, 99, 0, 0, 0, 0, '', 0, NULL, 0, 0, '1639233150.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '306345'),
(23815189, 0, 13670713, 1, 0, 'Борма с фисташками, 1 кг', '', 'borma-s-fistashkami-1-kg', 0, 0, 0, 1980, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:15', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '00001'),
(23815190, 0, 13670713, 1, 0, 'Борма с кешью, 1 кг', '', 'borma-s-keshyu-1-kg', 0, 0, 0, 1452, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10001'),
(23815191, 0, 13670713, 1, 0, 'Роза с фисташками, 250 г', '', 'roza-s-fistashkami-250-g', 0, 0, 0, 446, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10002'),
(23815192, 0, 13670713, 1, 0, 'Роза с кешью, 250 г', '', 'roza-s-keshyu-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10003'),
(23815193, 0, 13670713, 1, 0, 'Ракушки, 250 г', '', 'rakushki-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10004'),
(23815194, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Библос\", 700 г', '', 'assorti-livanskikh-sladostey-biblos-700-g', 0, 0, 0, 1155, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10005'),
(23815195, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Библос\", 1000 г', '', 'assorti-livanskikh-sladostey-biblos-1000-g', 0, 0, 0, 1485, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10006'),
(23815196, 0, 13670713, 1, 0, 'Пахлава Бакинская, 300 г', '', 'pakhlava-bakinskaya-300-g', 0, 0, 0, 363, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10007'),
(23815198, 0, 13670713, 1, 0, 'Пальчики, 250 г', '', 'palchiki-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10008'),
(23815199, 0, 13670713, 1, 0, 'Осмалия с фисташками, 250 г', '', 'osmaliya-s-fistashkami-250-g', 0, 0, 0, 512, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10009'),
(23815200, 0, 13670713, 1, 0, 'Козинаки ассорти с кунжутом и арахисом, 300 г', '', 'kozinaki-assorti-s-kunzhutom-i-arakhisom-300-g', 0, 0, 0, 281, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10011'),
(23815201, 0, 13670713, 1, 0, 'Баклава шоколадная с фундуком, 1 кг', '', 'baklava-shokoladnaya-s-fundukom-1-kg', 0, 0, 0, 1238, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10012'),
(23815202, 0, 13670713, 1, 0, 'Браслет с тертыми фисташками, 250 г', '', 'braslet-s-tertymi-fistashkami-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10013'),
(23815203, 0, 13670713, 1, 0, 'Ромбики, 250 г', '', 'rombiki-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10014'),
(23815204, 0, 13670713, 1, 0, 'Гнездо с кешью, 1 кг', '', 'gnezdo-s-keshyu-1-kg', 0, 0, 0, 1650, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10015'),
(23815205, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Финикия\", 350 г', '', 'assorti-livanskikh-sladostey-finikiya-350-g', 0, 0, 0, 479, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10016'),
(23815206, 0, 13670713, 1, 0, 'Борма с фисташками, 250 г', '', 'borma-s-fistashkami-250-g', 0, 0, 0, 512, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10017'),
(23815207, 0, 13670713, 1, 0, 'Баклава шоколадная с фундуком, 250 г', '', 'baklava-shokoladnaya-s-fundukom-250-g', 0, 0, 0, 347, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10018'),
(23815208, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Голд\", 450 г', '', 'assorti-livanskikh-sladostey-gold-450-g', 0, 0, 0, 660, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10019'),
(23815209, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Беритос\", 350 г', '', 'assorti-livanskikh-sladostey-beritos-350-g', 0, 0, 0, 479, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10020'),
(23815210, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Арвад\", 250 г', '', 'assorti-livanskikh-sladostey-arvad-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10021'),
(23815211, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Кармель\", 180 г', '', 'assorti-livanskikh-sladostey-karmel-180-g', 0, 0, 0, 248, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10022'),
(23815212, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Mix\", 1000 г', '', 'assorti-livanskikh-sladostey-mix-1000-g', 0, 0, 0, 1485, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10024'),
(23815213, 0, 13670713, 1, 0, 'Ассорти восточного десерта Намура \"Угорит\", 400 г', '', 'assorti-vostochnogo-deserta-namura-ugorit-400-g', 0, 0, 0, 165, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10025'),
(23815214, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"1000 и 1 ночь\", 1000 г', '', 'assorti-livanskikh-sladostey-1000-i-1-noch-1000-g', 0, 0, 0, 1403, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10027'),
(23815215, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Жемчужина Востока\", 400 г', '', 'assorti-livanskikh-sladostey-zhemchuzhina-vostoka-400-g', 0, 0, 0, 495, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10029'),
(23815216, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Палитра вкуса\", 1500 г', '', 'assorti-livanskikh-sladostey-palitra-vkusa-1500-g', 0, 0, 0, 2145, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10030'),
(23815217, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Королевское\", 3000 г', '', 'assorti-livanskikh-sladostey-korolevskoe-3000-g', 0, 0, 0, 3960, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10031'),
(23815218, 0, 13670713, 1, 0, 'Браслет с цельными фисташками, 250 г', '', 'braslet-s-tselnymi-fistashkami-250-g', 0, 0, 0, 380, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10032'),
(23815219, 0, 13670713, 1, 0, 'Браслет с цельными фисташками, 1 кг', '', 'braslet-s-tselnymi-fistashkami-1-kg', 0, 0, 0, 1353, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10033'),
(23815220, 0, 13670713, 1, 0, 'Гнездо с кешью, 250 г', '', 'gnezdo-s-keshyu-250-g', 0, 0, 0, 380, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10034'),
(23815221, 0, 13670713, 1, 0, 'Борма с кешью, 250 г', '', 'borma-s-keshyu-250-g', 0, 0, 0, 363, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10035'),
(23815222, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Акко\", 250 г', '', 'assorti-livanskikh-sladostey-akko-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10036'),
(23815223, 0, 13670713, 1, 0, 'Гнездо с фисташками, 250 г', '', 'gnezdo-s-fistashkami-250-g', 0, 0, 0, 512, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10037'),
(23815224, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Подарочное\", 2000 г', '', 'assorti-livanskikh-sladostey-podarochnoe-2000-g', 0, 0, 0, 2970, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10038'),
(23815225, 0, 13670713, 1, 0, 'Грекорех, 250 г', '', 'grekorekh-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10039'),
(23815226, 0, 13670713, 1, 0, 'Ассорти \"Pate D\'or\", 1000 г', '', 'assorti-pate-d-or-1000-g', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10043'),
(23815227, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Королевское\", 5000 г', '', 'assorti-livanskikh-sladostey-korolevskoe-5000-g', 0, 0, 0, 6353, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10044'),
(23815228, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Оронт\", 600 г', '', 'assorti-livanskikh-sladostey-oront-600-g', 0, 0, 0, 858, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10047'),
(23815229, 0, 13670713, 1, 0, 'Осмалия с кешью, 250 г', '', 'osmaliya-s-keshyu-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10048'),
(23815230, 0, 13670713, 1, 0, 'Осмалия с фисташками, 1 кг', '', 'osmaliya-s-fistashkami-1-kg', 0, 0, 0, 2063, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10049'),
(23815231, 0, 13670713, 1, 0, 'Роза шоколадная с фисташками, 250 г', '', 'roza-shokoladnaya-s-fistashkami-250-g', 0, 0, 0, 462, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10053'),
(23815232, 0, 13670713, 1, 0, 'Гнездо с фисташками, 1 кг', '', 'gnezdo-s-fistashkami-1-kg', 0, 0, 0, 1980, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10056'),
(23815233, 0, 13670713, 1, 0, 'Грекорех, 1 кг', '', 'grekorekh-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10057'),
(23815234, 0, 13670713, 1, 0, 'Осмалия с кешью, 1 кг', '', 'osmaliya-s-keshyu-1-kg', 0, 0, 0, 1287, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10060'),
(23815235, 0, 13670713, 1, 0, 'Роза с фисташками, 1 кг', '', 'roza-s-fistashkami-1-kg', 0, 0, 0, 1683, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10072'),
(23815236, 0, 13670713, 1, 0, 'Ассорти ливанских сладостей \"Восток\", 250 г', '', 'assorti-livanskikh-sladostey-vostok-250-g', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10078'),
(23815237, 0, 13670713, 1, 0, 'Пальчики, 1 кг', '', 'palchiki-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10083'),
(23815238, 0, 13670713, 1, 0, 'Пахлава Бакинская, 1 кг', '', 'pakhlava-bakinskaya-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10084'),
(23815239, 0, 13670713, 1, 0, 'Роза с кешью, 1 кг', '', 'roza-s-keshyu-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10085'),
(23815240, 0, 13670713, 1, 0, 'Роза шоколадная с фисташками, 1 кг', '', 'roza-shokoladnaya-s-fistashkami-1-kg', 0, 0, 0, 1733, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10086'),
(23815241, 0, 13670713, 1, 0, 'Ракушки, 1 кг', '', 'rakushki-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10087'),
(23815242, 0, 13670713, 1, 0, 'Ромбики, 1 кг', '', 'rombiki-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10088'),
(23815243, 0, 13670713, 1, 0, 'Браслет с тертыми фисташками, 1 кг', '', 'braslet-s-tertymi-fistashkami-1-kg', 0, 0, 0, 1188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10090'),
(23815244, 0, 13670713, 1, 0, 'Подарочное ассорти ливанских сладостей \"Большой секрет Востока\": шкатулка (фанера) с логотипом компании Pate D\'or, внутри ассорти ливанских сладостей весом 2 кг.', '', 'podarochnoe-assorti-livanskikh-sladostey-bolshoy-sekret-vostoka-shkatulka-fanera-s-logotipom-kompanii-pate-d-or-vnutri-assorti-livanskikh-sladostey-vesom-2-kg', 0, 0, 0, 5115, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '10134'),
(23815245, 0, 13670713, 1, 0, 'Восточное печенье Фингерз с финиками, 800 г', '', 'vostochnoe-pechene-fingerz-s-finikami-800-g', 0, 0, 0, 627, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '50001'),
(23815246, 0, 13670713, 1, 0, 'Печенье с финиками, 350 г', '', 'pechene-s-finikami-350-g', 0, 0, 0, 198, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '50002'),
(23815247, 0, 13670713, 1, 0, 'Печенье с кунжутом Баразик, 500 г', '', 'pechene-s-kunzhutom-barazik-500-g', 0, 0, 0, 462, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '50003'),
(23815248, 0, 13670713, 1, 0, 'Восточное печенье ассорти \"Микс\", 500 г', '', 'vostochnoe-pechene-assorti-miks-500-g', 0, 0, 0, 413, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '50004'),
(23815249, 0, 13670713, 1, 0, 'Восточное печенье Грайбе, 800 г', '', 'vostochnoe-pechene-graybe-800-g', 0, 0, 0, 512, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '50005'),
(23815250, 0, 13670787, 1, 0, 'Турецкий кофе Mehmet Efendi натуральный молотый, 500 г', '', 'turetskiy-kofe-mehmet-efendi-naturalnyy-molotyy-500-g', 0, 0, 0, 998, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60105'),
(23815251, 0, 13670788, 1, 0, 'Какао Mehmet Efendi, 250 г', '', 'kakao-mehmet-efendi-250-g', 0, 0, 0, 527, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60106'),
(23815252, 0, 13670787, 1, 0, 'Кофе в зернах Espresso, Mehmet Efendi, 1 кг', '', 'kofe-v-zernakh-espresso-mehmet-efendi-1-kg', 0, 0, 0, 2145, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60107'),
(23815253, 0, 13670787, 1, 0, 'Кофе в зернах Colombian, Mehmet Efendi, 1 кг', '', 'kofe-v-zernakh-colombian-mehmet-efendi-1-kg', 0, 0, 0, 2145, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60109'),
(23815254, 0, 13670720, 1, 0, 'Ассорти пишмание в подарочной деревянной упаковке, Hajabdollah, 200 г', '', 'assorti-pishmanie-v-podarochnoy-derevyannoy-upakovke-hajabdollah-200-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60140'),
(23815255, 0, 13670720, 1, 0, 'Ассорти пишмание в подарочной деревянной упаковке, Hajabdollah, 500 г', '', 'assorti-pishmanie-v-podarochnoy-derevyannoy-upakovke-hajabdollah-500-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60141'),
(23815256, 0, 13670720, 1, 0, 'Ассорти пишмание в подарочной упаковке \"Шафран и Фисташки\", Hajabdollah, 300 г', '', 'assorti-pishmanie-v-podarochnoy-upakovke-shafran-i-fistashki-hajabdollah-300-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60145'),
(23815257, 0, 13670720, 1, 0, 'Ассорти пишмание в подарочной упаковке \"Каллиграфия\", Hajabdollah, 300 г', '', 'assorti-pishmanie-v-podarochnoy-upakovke-kalligrafiya-hajabdollah-300-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60146'),
(23815258, 0, 13670720, 1, 0, 'Пишмание со вкусом дыни, клубники и апельсина, Adlin, 350 г', '', 'pishmanie-so-vkusom-dyni-klubniki-i-apelsina-adlin-350-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60152'),
(23815259, 0, 13670720, 1, 0, 'Пишмание с молочным и ванильным вкусом в глазури, Adlin, 350 г', '', 'pishmanie-s-molochnym-i-vanilnym-vkusom-v-glazuri-adlin-350-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60153'),
(23815260, 0, 13670720, 1, 0, 'Пишмание со вкусом имбиря, какао и кофе в шоколадной глазури, Adlin, 350 г', '', 'pishmanie-so-vkusom-imbirya-kakao-i-kofe-v-shokoladnoy-glazuri-adlin-350-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '60157'),
(23815261, 0, 13670787, 1, 0, 'Турецкий кофе Mehmet Efendi натуральный молотый, 100 г', '', 'turetskiy-kofe-mehmet-efendi-naturalnyy-molotyy-100-g', 0, 0, 0, 182, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70011'),
(23815262, 0, 13670787, 1, 0, 'Турецкий кофе Mehmet Efendi натуральный молотый, 250 г', '', 'turetskiy-kofe-mehmet-efendi-naturalnyy-molotyy-250-g', 0, 0, 0, 518, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70012'),
(23815263, 0, 13670722, 1, 0, 'Варенье ежевичное без сахара, Koska, 290 г', '', 'varene-ezhevichnoe-bez-sakhara-koska-290-g', 0, 0, 0, 356, 0, 0, 0, 0, 'Линейка варенья без сахара была разработана крупнейшей турецкой компанией Koska с заботой о тех, кто хочет наслаждаться сладкими десертами без вреда для здоровья. Ежевичное варенье не содержит сахар, сладость ему придает полезный виноградный сок и натуральные ягоды высочайшего качества.\n\nСостав: Деионизированный концентрат виноградного сока, ежевика 45%, загуститель (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 250 ккал / 1047 кДж.\nПищевая ценность: белки - 1,6 г, жиры 0,3 г, углеводы 59,7 г.', 0, NULL, 0, 0, '1639233192.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70056'),
(23815264, 0, 13670724, 1, 0, 'Кунжутная паста, виноградный пекмез и Гриссини, Koska, 55 г', '', 'kunzhutnaya-pasta-vinogradnyy-pekmez-i-grissini-koska-55-g', 0, 0, 0, 111, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70058'),
(23815265, 0, 13670726, 1, 0, 'Кунжутная халва, Koska, 80 г', '', 'kunzhutnaya-khalva-koska-80-g', 0, 0, 0, 63, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80010'),
(23815266, 0, 13670726, 1, 0, 'Кунжутная халва с фисташками, Koska, 80 г', '', 'kunzhutnaya-khalva-s-fistashkami-koska-80-g', 0, 0, 0, 116, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80011'),
(23815267, 0, 13670726, 1, 0, 'Кунжутная халва горячая, Koska, 250 г', '', 'kunzhutnaya-khalva-goryachaya-koska-250-g', 0, 0, 0, 266, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80012'),
(23815268, 0, 13670726, 1, 0, 'Кунжутная халва, Koska, 200 г', '', 'kunzhutnaya-khalva-koska-200-g', 0, 0, 0, 152, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80014'),
(23815269, 0, 13670726, 1, 0, 'Кунжутная халва с какао, Koska, 200 г', '', 'kunzhutnaya-khalva-s-kakao-koska-200-g', 0, 0, 0, 146, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80015'),
(23815270, 0, 13670726, 1, 0, 'Кунжутная халва с фисташками, Koska, 200 г', '', 'kunzhutnaya-khalva-s-fistashkami-koska-200-g', 0, 0, 0, 255, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80016'),
(23815271, 0, 13670726, 1, 0, 'Кунжутная халва, Koska, 500 г', '', 'kunzhutnaya-khalva-koska-500-g', 0, 0, 0, 383, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80017'),
(23815272, 0, 13670726, 1, 0, 'Кунжутная халва с какао, Koska, 500 г', '', 'kunzhutnaya-khalva-s-kakao-koska-500-g', 0, 0, 0, 347, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80018'),
(23815273, 0, 13670726, 1, 0, 'Кунжутная халва с фисташками, Koska, 500 г', '', 'kunzhutnaya-khalva-s-fistashkami-koska-500-g', 0, 0, 0, 693, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80019'),
(23815274, 0, 13670726, 1, 0, 'Летняя халва с грецким орехом, Koska, 200 г', '', 'letnyaya-khalva-s-gretskim-orekhom-koska-200-g', 0, 0, 0, 188, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80020'),
(23815275, 0, 13670726, 1, 0, 'Летняя халва с сухофруктами, Koska, 200 г', '', 'letnyaya-khalva-s-sukhofruktami-koska-200-g', 0, 0, 0, 165, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80021'),
(23815276, 0, 13670726, 1, 0, 'Летняя халва с грецким орехом и карамелью, Koska, 200 г', '', 'letnyaya-khalva-s-gretskim-orekhom-i-karamelyu-koska-200-g', 0, 0, 0, 200, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80022'),
(23815277, 0, 13670726, 1, 0, 'Кунжутная халва с фисташками, Koska, 400 г', '', 'kunzhutnaya-khalva-s-fistashkami-koska-400-g', 0, 0, 0, 705, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80023'),
(23815278, 0, 13670724, 1, 0, 'Кунжутная паста и виноградный пекмез, Koska, 140 г', '', 'kunzhutnaya-pasta-i-vinogradnyy-pekmez-koska-140-g', 0, 0, 0, 150, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80024'),
(23815279, 0, 13670724, 1, 0, 'Кунжутная паста, Koska, 300 г', '', 'kunzhutnaya-pasta-koska-300-g', 0, 0, 0, 347, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80025'),
(23815280, 0, 13670724, 1, 0, 'Кунжутная паста и виноградный пекмез с пюре из фундука, Koska, 320 г', '', 'kunzhutnaya-pasta-i-vinogradnyy-pekmez-s-pyure-iz-funduka-koska-320-g', 0, 0, 0, 341, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80026'),
(23815281, 0, 13670728, 1, 0, 'Пекмез из винограда, Koska, 380 г', '', 'pekmez-iz-vinograda-koska-380-g', 0, 0, 0, 314, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80027'),
(23815282, 0, 13670729, 1, 0, 'Пишмание традиционная с фисташками, Koska, 250 г', '', 'pishmanie-traditsionnaya-s-fistashkami-koska-250-g', 0, 0, 0, 372, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80028');
INSERT INTO `shop_items` (`item_id`, `item_is_model`, `item_cat_id`, `item_status`, `item_vendor_id`, `item_title`, `item_short_title`, `item_url`, `item_amount`, `item_amount_nal`, `item_amount_nal_opt`, `item_price`, `item_price_fakt`, `item_price_opt_vip`, `item_price_opt`, `item_price_before`, `item_short_text`, `item_text_id`, `item_composition_id`, `item_video_id`, `item_comments`, `item_icon`, `item_icon_back`, `item_rate`, `item_views`, `item_head_title`, `item_head_desc`, `item_head_keywords`, `item_sale`, `item_new`, `item_hit`, `item_badge`, `item_up`, `item_sort`, `item_time`, `item_parent_id`, `item_has_child`, `item_offers`, `item_source_url`, `item_icons_dop`, `item_dop_urls`, `item_dop`, `item_full_title`, `item_offers_total`, `item_last_zero`, `item_sale_percent`, `item_article`) VALUES
(23815283, 0, 13670729, 1, 0, 'Пишмание традиционная, Koska, 250 г', '', 'pishmanie-traditsionnaya-koska-250-g', 0, 0, 0, 329, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80029'),
(23815284, 0, 13670726, 1, 0, 'Чекме халва, Koska, 120 г', '', 'chekme-khalva-koska-120-g', 0, 0, 0, 189, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80030'),
(23815285, 0, 13670726, 1, 0, 'Чекме халва с фисташками, Koska, 120 г', '', 'chekme-khalva-s-fistashkami-koska-120-g', 0, 0, 0, 215, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80031'),
(23815286, 0, 13670726, 1, 0, 'Кунжутная халва в металлической упаковке, Koska, 350 г', '', 'kunzhutnaya-khalva-v-metallicheskoy-upakovke-koska-350-g', 0, 0, 0, 407, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80032'),
(23815287, 0, 13670731, 1, 0, 'Рахат-лукум с фундуком, фисташками и кокосом, Koska, 125 г', '', 'rakhat-lukum-s-fundukom-fistashkami-i-kokosom-koska-125-g', 0, 0, 0, 159, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80033'),
(23815288, 0, 13670731, 1, 0, 'Рахат-лукум с фундуком, Koska, 125 г', '', 'rakhat-lukum-s-fundukom-koska-125-g', 0, 0, 0, 150, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80034'),
(23815289, 0, 13670731, 1, 0, 'Рахат-лукум с фисташками, Koska, 125 г', '', 'rakhat-lukum-s-fistashkami-koska-125-g', 0, 0, 0, 191, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80035'),
(23815290, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы, Koska, 125 г', '', 'rakhat-lukum-so-vkusom-rozy-koska-125-g', 0, 0, 0, 105, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80036'),
(23815291, 0, 13670731, 1, 0, 'Рахат-лукум ассорти вкусов, Koska, 125 г', '', 'rakhat-lukum-assorti-vkusov-koska-125-g', 0, 0, 0, 102, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80037'),
(23815292, 0, 13670731, 1, 0, 'Рахат-лукум, Koska, 125 г', '', 'rakhat-lukum-koska-125-g', 0, 0, 0, 110, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80038'),
(23815293, 0, 13670731, 1, 0, 'Дворцовый рахат-лукум с миксом из орехов в кокосовой стружке, Koska, 300 г', '', 'dvortsovyy-rakhat-lukum-s-miksom-iz-orekhov-v-kokosovoy-struzhke-koska-300-g', 0, 0, 0, 293, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80041'),
(23815294, 0, 13670731, 1, 0, 'Дворцовый рахат-лукум с миндалем в кокосовой стружке, Koska, 300 г', '', 'dvortsovyy-rakhat-lukum-s-mindalem-v-kokosovoy-struzhke-koska-300-g', 0, 0, 0, 276, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80042'),
(23815295, 0, 13670731, 1, 0, 'Султан-лукум с фисташками в кокосовой стружке, Koska, 250 г', '', 'sultan-lukum-s-fistashkami-v-kokosovoy-struzhke-koska-250-g', 0, 0, 0, 327, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80043'),
(23815296, 0, 13670731, 1, 0, 'Рахат-лукум с фисташками, Koska, 250 г', '', 'rakhat-lukum-s-fistashkami-koska-250-g', 0, 0, 0, 347, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80044'),
(23815297, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы, Koska, 250 г', '', 'rakhat-lukum-so-vkusom-rozy-koska-250-g', 0, 0, 0, 197, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80045'),
(23815298, 0, 13670731, 1, 0, 'Рахат-лукум ассорти вкусов, Koska, 250 г', '', 'rakhat-lukum-assorti-vkusov-koska-250-g', 0, 0, 0, 197, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80046'),
(23815299, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы и лимона, Koska, 250 г', '', 'rakhat-lukum-so-vkusom-rozy-i-limona-koska-250-g', 0, 0, 0, 219, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80047'),
(23815300, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом мяты в молочном шоколаде, Koska, 140 г', '', 'rakhat-lukum-so-vkusom-myaty-v-molochnom-shokolade-koska-140-g', 0, 0, 0, 296, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80048'),
(23815301, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы в молочном шоколаде, Koska, 140 г', '', 'rakhat-lukum-so-vkusom-rozy-v-molochnom-shokolade-koska-140-g', 0, 0, 0, 296, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80049'),
(23815302, 0, 13670731, 1, 0, 'Рахат-лукум с фундуком в молочном шоколаде, Koska, 140 г', '', 'rakhat-lukum-s-fundukom-v-molochnom-shokolade-koska-140-g', 0, 0, 0, 336, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80050'),
(23815303, 0, 13670731, 1, 0, 'Мини-лукум ассорти вкусов в темном шоколаде, Koska, 300 г', '', 'mini-lukum-assorti-vkusov-v-temnom-shokolade-koska-300-g', 0, 0, 0, 524, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80051'),
(23815304, 0, 13670726, 1, 0, 'Кунжутная халва, Koska, 400 г', '', 'kunzhutnaya-khalva-koska-400-g', 0, 0, 0, 314, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80056'),
(23815305, 0, 13670726, 1, 0, 'Кунжутная халва с какао, Koska, 400 г', '', 'kunzhutnaya-khalva-s-kakao-koska-400-g', 0, 0, 0, 318, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80057'),
(23815306, 0, 13670728, 1, 0, 'Пекмез из шелковицы, Koska, 380 г', '', 'pekmez-iz-shelkovitsy-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80060'),
(23815307, 0, 13670728, 1, 0, 'Пекмез из плодов рожкового дерева, Koska, 380 г', '', 'pekmez-iz-plodov-rozhkovogo-dereva-koska-380-g', 0, 0, 0, 267, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80061'),
(23815308, 0, 13670722, 1, 0, 'Варенье абрикосовое без сахара, Koska, 290 г', '', 'varene-abrikosovoe-bez-sakhara-koska-290-g', 0, 0, 0, 356, 0, 0, 0, 0, 'Натуральное варенье из абрикоса от известного турецкого производителя Koska - это натуральные ингредиенты и яркий вкус спелого абрикоса. В составе данного варенья отсутствует сахар, благодаря чему можно не опасаться за свое здоровье и фигуру, наслаждаясь вареньем из абрикоса Koska!\n\nСостав: Концентрат деионизированного виноградного сока, абрикосы (45%), загуститель (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 258 кКал/1080 кДж.\nПищевая ценность: белки - 1,6 г, жиры - 0,3 г, углеводы - 62,9 г', 0, NULL, 0, 0, '1639233204.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80065'),
(23815309, 0, 13670722, 1, 0, 'Варенье апельсиновое без сахара, Koska, 290 г', '', 'varene-apelsinovoe-bez-sakhara-koska-290-g', 0, 0, 0, 345, 0, 0, 0, 0, 'Варенье без сахара с апельсином от крупнейшего турецкого производителя Koska. Варенье отличается приятный цитрусовой кислинкой, ярким апельсиновым ароматом и отличным вкусом. В его составе исключительно натуральные ингредиенты, а сладость ему придает концентрат виноградного сока. В составе данного варенья в большом количестве содержится полезная корка апельсина. Цедра апельсина, как и сам плод, полезны при простудах и отлично повышают иммунитет. Благодаря особой технологии приготовления все витамины и важные микроэлементы сохраняются.\n\nСостав: Концентрат деионизированного виноградного сока, корка апельсина (45%), загуститель (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 261 кКал/1093 кДж.\nПищевая ценность: белки - 1,6 г, жиры - 0,3 г, углеводы - 60,6 г.', 0, NULL, 0, 0, '1639233204.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80066'),
(23815310, 0, 13670731, 1, 0, 'Мини рахат-лукум ассорти вкусов, Koska, 150 г', '', 'mini-rakhat-lukum-assorti-vkusov-koska-150-g', 0, 0, 0, 129, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80068'),
(23815311, 0, 13670720, 1, 0, 'Пишмание со вкусом арбуза во фруктовой глазури в подарочной упаковке, Hajabdollah, 300 г', '', 'pishmanie-so-vkusom-arbuza-vo-fruktovoy-glazuri-v-podarochnoy-upakovke-hajabdollah-300-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80076'),
(23815312, 0, 13670726, 1, 0, 'Кунжутная халва с фисташками без сахара, Koska, 200 г', '', 'kunzhutnaya-khalva-s-fistashkami-bez-sakhara-koska-200-g', 0, 0, 0, 371, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80150'),
(23815313, 0, 13670724, 1, 0, 'Кунжутная паста темная, Koska, 300 г', '', 'kunzhutnaya-pasta-temnaya-koska-300-g', 0, 0, 0, 336, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80164'),
(23815314, 0, 13670724, 1, 0, 'Кунжутная паста, Koska, 550 г', '', 'kunzhutnaya-pasta-koska-550-g', 0, 0, 0, 555, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80165'),
(23815315, 0, 13670729, 1, 0, 'Пишмание с фисташками, Koska, 250 г', '', 'pishmanie-s-fistashkami-koska-250-g', 0, 0, 0, 276, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80166'),
(23815316, 0, 13670731, 1, 0, 'Рахат-лукум, Koska, 250 г', '', 'rakhat-lukum-koska-250-g', 0, 0, 0, 210, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80168'),
(23815317, 0, 13670731, 1, 0, 'Рахат-лукум с фундуком, фисташками и кокосом, Koska, 250 г', '', 'rakhat-lukum-s-fundukom-fistashkami-i-kokosom-koska-250-g', 0, 0, 0, 273, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80169'),
(23815319, 0, 13670731, 1, 0, 'Рахат-лукум с фундуком, Koska, 250 г', '', 'rakhat-lukum-s-fundukom-koska-250-g', 0, 0, 0, 308, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80170'),
(23815321, 0, 13670731, 1, 0, 'Дворцовый рахат-лукум с грецким орехом, Koska, 300 г', '', 'dvortsovyy-rakhat-lukum-s-gretskim-orekhom-koska-300-g', 0, 0, 0, 375, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80171'),
(23815323, 0, 13670726, 1, 0, 'Кунжутная халва без сахара с фундуком, Koska, 250 г', '', 'kunzhutnaya-khalva-bez-sakhara-s-fundukom-koska-250-g', 0, 0, 0, 383, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80172'),
(23815324, 0, 13670726, 1, 0, 'Кунжутная халва без сахара, Koska, 200 г', '', 'kunzhutnaya-khalva-bez-sakhara-koska-200-g', 0, 0, 0, 224, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80173'),
(23815325, 0, 13670722, 1, 0, 'Варенье вишневое без сахара, Koska, 290 г', '', 'varene-vishnevoe-bez-sakhara-koska-290-g', 0, 0, 0, 356, 0, 0, 0, 0, 'Если Вы хотите наслаждаться любимыми сладостями и не переживать за свое здоровье и фигуру, то Вам обязательно стоит купить варенье без сахара с вишней от крупнейшего турецкого производителя Koska! Вишневое варенье - это любимая с детства классика: приятная кислинка и яркий ягодный аромат. В составе варенья исключительно натуральные ингредиенты, а сладость ему придает концентрат виноградного сока. Благодаря особой технологии приготовления и низкой температуре все витамины и важные микроэлементы сохраняются в вишневом варенье.\n\nСостав: Деионизированный концентрат виноградного сока, вишня (45%), желирующий агент (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 260 ккал/ 1104 кДж.\nПищевая ценность: белки - 1,4 г, жиры - 0,3 г, углеводы - 62,4 г.\n', 0, NULL, 0, 0, '1639233208.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80176'),
(23815326, 0, 13670722, 1, 0, 'Варенье малиновое без сахара, Koska, 290 г', '', 'varene-malinovoe-bez-sakhara-koska-290-g', 0, 0, 0, 345, 0, 0, 0, 0, 'Варенье без сахара было разработано крупнейшей турецкой компанией Koska с заботой о тех, кто хочет наслаждаться сладкими десертами без вреда для здоровья. Малиновое варенье не содержит сахар, сладость ему придает полезный виноградный сок и натуральные фрукты высочайшего качества.\n\nСостав: Деионизированный концентрат виноградного сока, малина (45%), желирующий агент (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 263 ккал/ 1113 кДж.\nПищевая ценность: белки - 3,2 г, жиры - 0,3 г, углеводы - 60,1 г.', 0, NULL, 0, 0, '1639233208.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80177'),
(23815327, 0, 13670731, 1, 0, 'Рахат-лукум с фисташками без сахара, Koska, 160 г', '', 'rakhat-lukum-s-fistashkami-bez-sakhara-koska-160-g', 0, 0, 0, 375, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80178'),
(23815328, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы без сахара, Koska, 160 г', '', 'rakhat-lukum-so-vkusom-rozy-bez-sakhara-koska-160-g', 0, 0, 0, 192, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80179'),
(23815329, 0, 13670724, 1, 0, 'Кунжутная паста и виноградный пекмез, Koska, 350 г', '', 'kunzhutnaya-pasta-i-vinogradnyy-pekmez-koska-350-g', 0, 0, 0, 332, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80181'),
(23815330, 0, 13670726, 1, 0, 'Нуга с грецким орехом, Koska, 250 г', '', 'nuga-s-gretskim-orekhom-koska-250-g', 0, 0, 0, 300, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80199'),
(23815331, 0, 13670720, 1, 0, 'Пишмание со вкусом апельсина, дыни и клубники в глазури \"Фруктовое ассорти\", Hajabdollah, 200 г', '', 'pishmanie-so-vkusom-apelsina-dyni-i-klubniki-v-glazuri-fruktovoe-assorti-hajabdollah-200-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80229'),
(23815332, 0, 13670720, 1, 0, 'Пишмание со вкусом горького шоколада, ванили и кофе \"Шоколадное ассорти\", Hajabdollah, 200 г', '', 'pishmanie-so-vkusom-gorkogo-shokolada-vanili-i-kofe-shokoladnoe-assorti-hajabdollah-200-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80231'),
(23815333, 0, 13670726, 1, 0, 'Кунжутная халва с пюре из фундука, Koska, 200 г', '', 'kunzhutnaya-khalva-s-pyure-iz-funduka-koska-200-g', 0, 0, 0, 239, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80295'),
(23815334, 0, 13670726, 1, 0, 'Кунжутная халва с фундуком и кэробом, Koska, 200 г', '', 'kunzhutnaya-khalva-s-fundukom-i-kerobom-koska-200-g', 0, 0, 0, 255, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80296'),
(23815335, 0, 13670726, 1, 0, 'Кунжутная халва, Koska, 300 г', '', 'kunzhutnaya-khalva-koska-300-g', 0, 0, 0, 287, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80297'),
(23815336, 0, 13670724, 1, 0, 'Кунжутная паста и пекмез из плодов рожкового дерева, Koska, 350 г', '', 'kunzhutnaya-pasta-i-pekmez-iz-plodov-rozhkovogo-dereva-koska-350-g', 0, 0, 0, 323, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80304'),
(23815337, 0, 13670722, 1, 0, 'Варенье традиционное из лепестков роз, Koska, 380 г', '', 'varene-traditsionnoe-iz-lepestkov-roz-koska-380-g', 0, 0, 0, 258, 0, 0, 0, 0, 'Варенье из розовых лепестков обладает нежным сладким вкусом, поэтому оно часто используется для приготовления вкусной выпечки. Благодаря большому содержанию углеводов сладость отлично насыщает.\n\nСостав: Глюкозный сироп (кукуруза, пшеница, вода), лепестки роз (10%), сахар, желирующий агент (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 287 ккал/ 1217 кДж.\nПищевая ценность: белки - 0 г, жиры - 0 г, углеводы - 71,1 г.', 0, NULL, 0, 0, '1639233211.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:53', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80305'),
(23815338, 0, 13670722, 1, 0, 'Варенье традиционное из айвы, Koska, 380 г', '', 'varene-traditsionnoe-iz-ayvy-koska-380-g', 0, 0, 0, 255, 0, 0, 0, 0, 'Варенье из айвы содержит большое количество железа. Пектиновые соединения и антиоксиданты делают лакомство незаменимым источником полезных компонентов.\n\nСостав: Глюкозный сироп (кукуруза, пшеница, вода), айва (35%), сахар, желирующий агент (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 281 ккал/ 1190 кДж.\nПищевая ценность: белки - 0 г, жиры - 0 г, углеводы - 69 г.', 0, NULL, 0, 0, '1639233211.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:53', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80306'),
(23815339, 0, 13670722, 1, 0, 'Варенье традиционное из инжира, Koska, 380 г', '', 'varene-traditsionnoe-iz-inzhira-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:53', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80307'),
(23815340, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом апельсина и лимона в молочном шоколаде, Koska, 140 г', '', 'rakhat-lukum-so-vkusom-apelsina-i-limona-v-molochnom-shokolade-koska-140-g', 0, 0, 0, 267, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:54', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80308'),
(23815341, 0, 13670731, 1, 0, 'Рахат-лукум с фисташками в молочном шоколаде, Koska, 140 г', '', 'rakhat-lukum-s-fistashkami-v-molochnom-shokolade-koska-140-g', 0, 0, 0, 377, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:54', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80309'),
(23815342, 0, 13670726, 1, 0, 'Вафельная халва, Koska, 140 г', '', 'vafelnaya-khalva-koska-140-g', 0, 0, 0, 266, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:54', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80310'),
(23815343, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы и лимона, Koska, 125 г', '', 'rakhat-lukum-so-vkusom-rozy-i-limona-koska-125-g', 0, 0, 0, 105, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:54', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80311'),
(23815344, 0, 13670726, 1, 0, 'Кунжутная халва без сахара, Koska, 9 шт по 40 г', '', 'kunzhutnaya-khalva-bez-sakhara-koska-9-sht-po-40-g', 0, 0, 0, 435, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80315'),
(23815345, 0, 13670726, 1, 0, 'Кунжутная халва без сахара, Koska, 350 г', '', 'kunzhutnaya-khalva-bez-sakhara-koska-350-g', 0, 0, 0, 423, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80316'),
(23815346, 0, 13670726, 1, 0, 'Кунжутная халва с какао без сахара, Koska, 350 г', '', 'kunzhutnaya-khalva-s-kakao-bez-sakhara-koska-350-g', 0, 0, 0, 423, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80317'),
(23815347, 0, 13670726, 1, 0, 'Кунжутная халва с фисташками без сахара, Koska, 350 г', '', 'kunzhutnaya-khalva-s-fistashkami-bez-sakhara-koska-350-g', 0, 0, 0, 621, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80318'),
(23815348, 0, 13670720, 1, 0, 'Нуга с грецким орехом в подарочной упаковке, Hajabdollah, 200 г', '', 'nuga-s-gretskim-orekhom-v-podarochnoy-upakovke-hajabdollah-200-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80325'),
(23815349, 0, 13670713, 1, 0, 'Подарочное ассорти ливанских сладостей \"Сладкий ларец\" 1 кг: шкатулка резная с логотипом компании Pate D\'or, внутри ассорти ливанских сладостей \"1000 и 1 ночь\".', '', 'podarochnoe-assorti-livanskikh-sladostey-sladkiy-larets-1-kg-shkatulka-reznaya-s-logotipom-kompanii-pate-d-or-vnutri-assorti-livanskikh-sladostey-1000-i-1-noch', 0, 0, 0, 3465, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80326'),
(23815350, 0, 13670713, 1, 0, 'Подарочное ассорти ливанских сладостей \"Сладкий ларец\" 2 кг: шкатулка резная с логотипом компании Pate D\'or, внутри ассорти ливанских сладостей весом 2 кг.', '', 'podarochnoe-assorti-livanskikh-sladostey-sladkiy-larets-2-kg-shkatulka-reznaya-s-logotipom-kompanii-pate-d-or-vnutri-assorti-livanskikh-sladostey-vesom-2-kg', 0, 0, 0, 5280, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80327'),
(23815351, 0, 13670724, 1, 0, 'Кунжутная паста, Koska, 1100 г', '', 'kunzhutnaya-pasta-koska-1100-g', 0, 0, 0, 1131, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80337'),
(23815352, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы и лимона в подарочной упаковке \"Сердце\", Koska, 150 г', '', 'rakhat-lukum-so-vkusom-rozy-i-limona-v-podarochnoy-upakovke-serdtse-koska-150-g', 0, 0, 0, 215, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80338'),
(23815353, 0, 13670722, 1, 0, 'Варенье традиционное из вишни, Koska, 380 г', '', 'varene-traditsionnoe-iz-vishni-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, 'Благодаря особой технологии производства варенье сохраняет полезные свойства и богатый состав ягод: витамины В и Е, аскорбиновую кислоту, рибофлавин, каротин, цинк, медь, йод и железо.\n\nСостав: Глюкозный сироп, вишня ( 45%),сахар, желирующий агент (пектин), регулятор кислотности (лимонная кислота).\nЭнергетическая ценность: 284 ккал/ 1205 кДж.\nПищевая ценность: белки - 0 г, жиры - 0 г, углеводы - 70,4 г.', 0, NULL, 0, 0, '1639233215.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80399'),
(23815354, 0, 13670722, 1, 0, 'Варенье традиционное из клубники, Koska, 380 г', '', 'varene-traditsionnoe-iz-klubniki-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80400'),
(23815355, 0, 13670722, 1, 0, 'Варенье традиционное из абрикоса, Koska, 380 г', '', 'varene-traditsionnoe-iz-abrikosa-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80401'),
(23815356, 0, 13670722, 1, 0, 'Варенье традиционное из малины, Koska, 380 г', '', 'varene-traditsionnoe-iz-maliny-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80402'),
(23815357, 0, 13670722, 1, 0, 'Варенье традиционное из апельсина, Koska, 380 г', '', 'varene-traditsionnoe-iz-apelsina-koska-380-g', 0, 0, 0, 263, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80404'),
(23815358, 0, 13670731, 1, 0, 'Рахат-лукум со вкусом розы и лимона без сахара, Koska, 160 г', '', 'rakhat-lukum-so-vkusom-rozy-i-limona-bez-sakhara-koska-160-g', 0, 0, 0, 192, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80410'),
(23815359, 0, 13670731, 1, 0, 'Чурчхела с грецким орехом (закрученный рахат-лукум), Koska, 80 г', '', 'churchkhela-s-gretskim-orekhom-zakruchennyy-rakhat-lukum-koska-80-g', 0, 0, 0, 122, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80411'),
(23815360, 0, 13670724, 1, 0, 'Кунжутная паста с виноградным пекмезом и арахисовой пастой, Koska, 320 г', '', 'kunzhutnaya-pasta-s-vinogradnym-pekmezom-i-arakhisovoy-pastoy-koska-320-g', 0, 0, 0, 353, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80473'),
(23815361, 0, 13670720, 1, 0, 'Пишмание со вкусом клубники, арбуза и апельсина \"Зимняя сказка\", Hajabdollah, 300 г', '', 'pishmanie-so-vkusom-klubniki-arbuza-i-apelsina-zimnyaya-skazka-hajabdollah-300-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80495'),
(23815362, 0, 13670731, 1, 0, 'Султан-лукум ассорти вкусов, Koska, 300 г', '', 'sultan-lukum-assorti-vkusov-koska-300-g', 0, 0, 0, 270, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80550'),
(23815363, 0, 13670728, 1, 0, 'Пекмез из плодов рожкового дерева, Koska, 700 г', '', 'pekmez-iz-plodov-rozhkovogo-dereva-koska-700-g', 0, 0, 0, 420, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80586'),
(23815364, 0, 13670728, 1, 0, 'Пекмез из шелковицы, Koska, 700 г', '', 'pekmez-iz-shelkovitsy-koska-700-g', 0, 0, 0, 420, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:56:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80587'),
(23815365, 0, 13670728, 1, 0, 'Пекмез из винограда, Koska, 700 г', '', 'pekmez-iz-vinograda-koska-700-g', 0, 0, 0, 492, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80588'),
(23815366, 0, 13670728, 1, 0, 'Смесь пекмезов, Koska, 300 г', '', 'smes-pekmezov-koska-300-g', 0, 0, 0, 278, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80593'),
(23815367, 0, 13670728, 1, 0, 'Пекмез из шелковицы, Koska, 1400 г', '', 'pekmez-iz-shelkovitsy-koska-1400-g', 0, 0, 0, 893, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80595'),
(23815368, 0, 13670728, 1, 0, 'Пекмез из плодов рожкового дерева, Koska, 1400 г', '', 'pekmez-iz-plodov-rozhkovogo-dereva-koska-1400-g', 0, 0, 0, 893, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80596'),
(23815369, 0, 13670728, 1, 0, 'Экстракт из плодов рожкового дерева, Koska, 310 г', '', 'ekstrakt-iz-plodov-rozhkovogo-dereva-koska-310-g', 0, 0, 0, 278, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80597'),
(23815370, 0, 13670720, 1, 0, 'Пишмание со вкусом мяты в шоколадной глазури в подарочной упаковке, Hajabdollah, 300 г', '', 'pishmanie-so-vkusom-myaty-v-shokoladnoy-glazuri-v-podarochnoy-upakovke-hajabdollah-300-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80606'),
(23815371, 0, 13670720, 1, 0, 'Пишмание со вкусом ванили с драже в шоколадной глазури, Adlin, 350 г', '', 'pishmanie-so-vkusom-vanili-s-drazhe-v-shokoladnoy-glazuri-adlin-350-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80607'),
(23815372, 0, 13670720, 1, 0, 'Пишмание с фисташкой в молочной глазури и мятой в шоколадной глазури, Hajabdollah, 200 г', '', 'pishmanie-s-fistashkoy-v-molochnoy-glazuri-i-myatoy-v-shokoladnoy-glazuri-hajabdollah-200-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80617'),
(23815373, 0, 13670720, 1, 0, 'Пишмание со вкусом двойного шоколада и кунжута в шоколадной глазури, Hajabdollah, 200 г', '', 'pishmanie-so-vkusom-dvoynogo-shokolada-i-kunzhuta-v-shokoladnoy-glazuri-hajabdollah-200-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80618'),
(23815374, 0, 13670720, 1, 0, 'Пишмание со вкусом кофе в шоколадной глазури и молочным вкусом в белой глазури, Adlin, 300 г', '', 'pishmanie-so-vkusom-kofe-v-shokoladnoy-glazuri-i-molochnym-vkusom-v-beloy-glazuri-adlin-300-g', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '80619'),
(23827666, 0, 13670791, 1, 0, 'Уксус бальзамический Каламата', '', 'uksus-balzamicheskiy-kalamata', 0, 0, 0, 268, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0001-1'),
(23827667, 0, 13670791, 1, 0, 'Соус бальзамический', '', 'sous-balzamicheskiy', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0012-1'),
(23827668, 0, 13670791, 1, 0, 'Соус белый бальзамический', '', 'sous-belyy-balzamicheskiy', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0013-1'),
(23827669, 0, 13670791, 1, 0, 'Соус бальзамический с инжиром', '', 'sous-balzamicheskiy-s-inzhirom', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0014-1'),
(23827670, 0, 13670791, 1, 0, 'Соус бальзамическийс апельсином и лимоном', '', 'sous-balzamicheskiys-apelsinom-i-limonom', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0016-1'),
(23827671, 0, 13670792, 1, 0, 'Уксус бальзамический спрей', '', 'uksus-balzamicheskiy-sprey', 0, 0, 0, 369, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0017-1'),
(23827672, 0, 13670794, 1, 0, 'Горчица острая с оливковым маслом', '', 'gorchitsa-ostraya-s-olivkovym-maslom', 0, 0, 0, 260, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0019-1'),
(23827673, 0, 13670794, 1, 0, 'Горчица мягкая с оливковым маслом', '', 'gorchitsa-myagkaya-s-olivkovym-maslom', 0, 0, 0, 260, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0020-1'),
(23827674, 0, 13670791, 1, 0, 'Соус бальзамический с гранатом', '', 'sous-balzamicheskiy-s-granatom', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0021-1'),
(23827675, 0, 13670794, 1, 0, 'Горчица с медом', '', 'gorchitsa-s-medom', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0024-1'),
(23827676, 0, 13670791, 1, 0, 'Соус бальзамический  с гранатом без сахара', '', 'sous-balzamicheskiy-s-granatom-bez-sakhara', 0, 0, 0, 345, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0026-1'),
(23827677, 0, 13670791, 1, 0, 'Соус бальзамический без сахара', '', 'sous-balzamicheskiy-bez-sakhara', 0, 0, 0, 345, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0027-1'),
(23827678, 0, 13670795, 1, 0, 'Cоус бальзамический', '', 'cous-balzamicheskiy', 0, 0, 0, 342, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0031'),
(23827679, 0, 13670795, 1, 0, 'Cоус бальзамический с инжиром', '', 'cous-balzamicheskiy-s-inzhirom', 0, 0, 0, 342, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0032'),
(23827680, 0, 13670795, 1, 0, 'Cоус бальзамический с гранатом', '', 'cous-balzamicheskiy-s-granatom', 0, 0, 0, 342, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0033'),
(23827681, 0, 13670795, 1, 0, 'Уксус бальзамический', '', 'uksus-balzamicheskiy', 0, 0, 0, 268, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0034'),
(23827682, 0, 13670795, 1, 0, 'Уксус бальзамический с манго', '', 'uksus-balzamicheskiy-s-mango', 0, 0, 0, 320, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '12-0035'),
(23827683, 0, 13670797, 1, 0, 'Халва Ваниль', '', 'khalva-vanil', 0, 0, 0, 152, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0008-1'),
(23827684, 0, 13670797, 1, 0, 'Халва Миндаль', '', 'khalva-mindal', 0, 0, 0, 167, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0009-1'),
(23827685, 0, 13670797, 1, 0, 'Халва Шоколад', '', 'khalva-shokolad', 0, 0, 0, 156, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0010-1'),
(23827686, 0, 13670798, 1, 0, 'Лукум фруктовый', '', 'lukum-fruktovyy', 0, 0, 0, 238, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0019-1'),
(23827687, 0, 13670798, 1, 0, 'Лукум Роза', '', 'lukum-roza', 0, 0, 0, 238, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0020-1'),
(23827688, 0, 13670798, 1, 0, 'Лукум с миндалем', '', 'lukum-s-mindalem', 0, 0, 0, 238, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0021-1'),
(23827689, 0, 13670799, 1, 0, 'Кунжутная паста \"ТАХИНИ\"', '', 'kunzhutnaya-pasta-takhini', 0, 0, 0, 513, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0022-1'),
(23827690, 0, 13670799, 1, 0, 'Кунжутная паста \"ТАХИНИ\" цельнозерновая', '', 'kunzhutnaya-pasta-takhini-tselnozernovaya', 0, 0, 0, 513, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0023-1'),
(23827691, 0, 13670800, 1, 0, 'Халва с ароматом ванили (бруском)', '', 'khalva-s-aromatom-vanili-bruskom', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0024-1'),
(23827692, 0, 13670800, 1, 0, 'Халва с миндалем (бруском)', '', 'khalva-s-mindalem-bruskom', 0, 0, 0, 316, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0025-1'),
(23827693, 0, 13670800, 1, 0, 'Халва с арахисом (бруском)', '', 'khalva-s-arakhisom-bruskom', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0026-1'),
(23827694, 0, 13670799, 1, 0, 'Кунжутная паста \"ТАХИНИ\"', '', 'kunzhutnaya-pasta-takhini', 0, 0, 0, 833, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:10', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0027-1'),
(23827695, 0, 13670801, 1, 0, 'Вафли венские с ванильным кремом', '', 'vafli-venskie-s-vanilnym-kremom', 0, 0, 0, 400, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:10', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0030'),
(23827696, 0, 13670801, 1, 0, 'Вафли венские с кремом капучино', '', 'vafli-venskie-s-kremom-kapuchino', 0, 0, 0, 400, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:10', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0031'),
(23827697, 0, 13670801, 1, 0, 'Вафли венские с фундуком и шоколадным кремом', '', 'vafli-venskie-s-fundukom-i-shokoladnym-kremom', 0, 0, 0, 229, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:11', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0032'),
(23827698, 0, 13670801, 1, 0, 'Вафли венские с фундуком и шоколадным кремом', '', 'vafli-venskie-s-fundukom-i-shokoladnym-kremom', 0, 0, 0, 400, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:11', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0033'),
(23827699, 0, 13670801, 1, 0, 'Вафли венские с фундуком и шоколадным кремом', '', 'vafli-venskie-s-fundukom-i-shokoladnym-kremom', 0, 0, 0, 454, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:11', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0034'),
(23827700, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с медом', '', 'kunzhutnaya-pasta-takhini-s-medom', 0, 0, 0, 566, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0035'),
(23827701, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с медом и какао', '', 'kunzhutnaya-pasta-takhini-s-medom-i-kakao', 0, 0, 0, 566, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0036'),
(23827702, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с лимоном', '', 'kunzhutnaya-pasta-takhini-s-limonom', 0, 0, 0, 473, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0037'),
(23827703, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с шоколадом', '', 'kunzhutnaya-pasta-takhini-s-shokoladom', 0, 0, 0, 473, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0038'),
(23827704, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с какао и фундуком', '', 'kunzhutnaya-pasta-takhini-s-kakao-i-fundukom', 0, 0, 0, 387, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0039'),
(23827705, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с какао', '', 'kunzhutnaya-pasta-takhini-s-kakao', 0, 0, 0, 397, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0040'),
(23827706, 0, 13670799, 1, 0, 'Кунжутная паста ”ТАХИНИ” с апельсином', '', 'kunzhutnaya-pasta-takhini-s-apelsinom', 0, 0, 0, 473, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0041'),
(23827707, 0, 13670797, 1, 0, 'Халва с ванилью Монастырская', '', 'khalva-s-vanilyu-monastyrskaya', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0049'),
(23827708, 0, 13670797, 1, 0, 'Халва с миндалем Монастырская', '', 'khalva-s-mindalem-monastyrskaya', 0, 0, 0, 316, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:14', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0050'),
(23827709, 0, 13670798, 1, 0, 'Лукум с мастикой', '', 'lukum-s-mastikoy', 0, 0, 0, 238, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:14', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0051'),
(23827710, 0, 13670802, 1, 0, 'Десерт из кунжута с фруктами и шоколадом', '', 'desert-iz-kunzhuta-s-fruktami-i-shokoladom', 0, 0, 0, 424, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:14', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0054'),
(23827711, 0, 13670802, 1, 0, 'Десерт из кунжута с какао и грецким орехом “каридопасто”', '', 'desert-iz-kunzhuta-s-kakao-i-gretskim-orekhom-karidopasto', 0, 0, 0, 424, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:15', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0055'),
(23827712, 0, 13670802, 1, 0, 'Десерт из арахиса', '', 'desert-iz-arakhisa', 0, 0, 0, 424, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0056'),
(23827713, 0, 13670802, 1, 0, 'Десерт из кунжута с апельсином и шоколадом', '', 'desert-iz-kunzhuta-s-apelsinom-i-shokoladom', 0, 0, 0, 424, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0057'),
(23827714, 0, 13670797, 1, 0, 'Халва с арахисом Монастырская', '', 'khalva-s-arakhisom-monastyrskaya', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0067'),
(23827715, 0, 13670802, 1, 0, 'Сладость греческая АССОРТИ', '', 'sladost-grecheskaya-assorti', 0, 0, 0, 1014, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0068'),
(23827716, 0, 13670802, 1, 0, 'Сладость греческая БАКЛАВА', '', 'sladost-grecheskaya-baklava', 0, 0, 0, 1014, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0069'),
(23827717, 0, 13670802, 1, 0, 'Сладость греческая САРАГЛИ', '', 'sladost-grecheskaya-saragli', 0, 0, 0, 1014, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0070'),
(23827718, 0, 13670804, 1, 0, 'Злаковый батончик с кусочками печенья DIGESTIVE, ягодами и молочным шоколадом', '', 'zlakovyy-batonchik-s-kusochkami-pechenya-digestive-yagodami-i-molochnym-shokoladom', 0, 0, 0, 445, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0071'),
(23827719, 0, 13670804, 1, 0, 'Злаковый батончик с кусочками печенья DIGESTIVE и молочным шоколадом', '', 'zlakovyy-batonchik-s-kusochkami-pechenya-digestive-i-molochnym-shokoladom', 0, 0, 0, 445, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0072'),
(23827720, 0, 13670802, 1, 0, 'Сладость греческая БАКЛАВА', '', 'sladost-grecheskaya-baklava', 0, 0, 0, 2828, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0073'),
(23827721, 0, 13670802, 1, 0, 'Сладость греческая КАТАИФИ', '', 'sladost-grecheskaya-kataifi', 0, 0, 0, 2828, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0074'),
(23827722, 0, 13670802, 1, 0, 'Сладость греческая САРАГЛИ', '', 'sladost-grecheskaya-saragli', 0, 0, 0, 2828, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0075'),
(23827723, 0, 13670802, 1, 0, 'Сладость греческая АССОРТИ', '', 'sladost-grecheskaya-assorti', 0, 0, 0, 2828, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '13-0076');
INSERT INTO `shop_items` (`item_id`, `item_is_model`, `item_cat_id`, `item_status`, `item_vendor_id`, `item_title`, `item_short_title`, `item_url`, `item_amount`, `item_amount_nal`, `item_amount_nal_opt`, `item_price`, `item_price_fakt`, `item_price_opt_vip`, `item_price_opt`, `item_price_before`, `item_short_text`, `item_text_id`, `item_composition_id`, `item_video_id`, `item_comments`, `item_icon`, `item_icon_back`, `item_rate`, `item_views`, `item_head_title`, `item_head_desc`, `item_head_keywords`, `item_sale`, `item_new`, `item_hit`, `item_badge`, `item_up`, `item_sort`, `item_time`, `item_parent_id`, `item_has_child`, `item_offers`, `item_source_url`, `item_icons_dop`, `item_dop_urls`, `item_dop`, `item_full_title`, `item_offers_total`, `item_last_zero`, `item_sale_percent`, `item_article`) VALUES
(23827724, 0, 13670806, 1, 0, 'Паста \"Спагетти №7\"', '', 'pasta-spagetti-7', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0000-1'),
(23827725, 0, 13670806, 1, 0, 'Паста \"Спагетти №2\"', '', 'pasta-spagetti-2', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0001-1'),
(23827726, 0, 13670806, 1, 0, 'Паста \"Ригатони\"', '', 'pasta-rigatoni', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0005-1'),
(23827727, 0, 13670806, 1, 0, 'Паста \"Стеллини\"', '', 'pasta-stellini', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0008-1'),
(23827728, 0, 13670806, 1, 0, 'Паста \"Кускус\"', '', 'pasta-kuskus', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0009-1'),
(23827729, 0, 13670807, 1, 0, 'Паста \"Энималс\"', '', 'pasta-enimals', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0014-1'),
(23827730, 0, 13670807, 1, 0, 'Паста \"Вордс\"', '', 'pasta-vords', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0015-1'),
(23827731, 0, 13670807, 1, 0, 'Паста \"Намберс\"', '', 'pasta-nambers', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0016-1'),
(23827732, 0, 13670807, 1, 0, 'Паста  свинка \"Пеппа\"', '', 'pasta-svinka-peppa', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0021-1'),
(23827733, 0, 13670807, 1, 0, 'Паста \"Фусилли\" без глютена', '', 'pasta-fusilli-bez-glyutena', 0, 0, 0, 268, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0022-1'),
(23827734, 0, 13670807, 1, 0, 'Паста \"Спагетти\" без глютена', '', 'pasta-spagetti-bez-glyutena', 0, 0, 0, 268, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0023-1'),
(23827735, 0, 13670807, 1, 0, 'Паста \"Орцо Медиум\" цельнозерновая', '', 'pasta-ortso-medium-tselnozernovaya', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0026-1'),
(23827736, 0, 13670807, 1, 0, 'Паста \"Карс\"', '', 'pasta-kars', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0027'),
(23827737, 0, 13670807, 1, 0, 'Паста \"Миньоны\"', '', 'pasta-minony', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0028'),
(23827738, 0, 13670807, 1, 0, 'Паста \"Щенячий патруль\"', '', 'pasta-shchenyachiy-patrul', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0029'),
(23827739, 0, 13670808, 1, 0, 'Паста \"Траханас\"', '', 'pasta-trakhanas', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0030'),
(23827740, 0, 13670807, 1, 0, 'Паста  \"Спагетти\" с морковью', '', 'pasta-spagetti-s-morkovyu', 0, 0, 0, 155, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0031'),
(23827741, 0, 13670807, 1, 0, 'Паста \"Спагетти\" высокопротеиновая', '', 'pasta-spagetti-vysokoproteinovaya', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0032'),
(23827742, 0, 13670807, 1, 0, 'Паста \"Пенне Ригате\" высокопротеиновая', '', 'pasta-penne-rigate-vysokoproteinovaya', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0033'),
(23827743, 0, 13670809, 1, 0, 'Паста \"Орцо Медиум\" Primo Gusto 500г', '', 'pasta-ortso-medium-primo-gusto-500g', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0034'),
(23827744, 0, 13670809, 1, 0, 'Паста \"Фусилли\"', '', 'pasta-fusilli', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0035'),
(23827745, 0, 13670809, 1, 0, 'Паста \"Фусилли\" цельнозерновая', '', 'pasta-fusilli-tselnozernovaya', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0036'),
(23827746, 0, 13670809, 1, 0, 'Паста \"Пенне Ригате\" цельнозерновая', '', 'pasta-penne-rigate-tselnozernovaya', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0037'),
(23827747, 0, 13670809, 1, 0, 'Паста \"Спагетти \" цельнозерновая', '', 'pasta-spagetti-tselnozernovaya', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0038'),
(23827748, 0, 13670809, 1, 0, 'Паста \"Фарфалле\"', '', 'pasta-farfalle', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0039'),
(23827749, 0, 13670809, 1, 0, 'Паста \"Гнохи\"', '', 'pasta-gnokhi', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0040'),
(23827750, 0, 13670809, 1, 0, 'Паста \"Пенне Ригате\"', '', 'pasta-penne-rigate', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0041'),
(23827751, 0, 13670807, 1, 0, 'Паста \"Спагетти\"  с морковью', '', 'pasta-spagetti-s-morkovyu', 0, 0, 0, 186, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0042'),
(23827752, 0, 13670807, 1, 0, 'Паста \"Спагетти\"  со свеклой', '', 'pasta-spagetti-so-svekloy', 0, 0, 0, 186, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0043'),
(23827753, 0, 13670807, 1, 0, 'Паста \"Спагетти\" со шпинатом', '', 'pasta-spagetti-so-shpinatom', 0, 0, 0, 186, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0044'),
(23827754, 0, 13670807, 1, 0, 'Паста \"Пенне Ригате Триколор\" томатно-шпинатная', '', 'pasta-penne-rigate-trikolor-tomatno-shpinatnaya', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0045'),
(23827755, 0, 13670807, 1, 0, 'Паста \"Линквини\"', '', 'pasta-linkvini', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0046'),
(23827756, 0, 13670809, 1, 0, 'Паста \"Спагетти №6\"', '', 'pasta-spagetti-6', 0, 0, 0, 118, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0047'),
(23827757, 0, 13670807, 1, 0, 'Паста \"Футбол\"', '', 'pasta-futbol', 0, 0, 0, 124, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '14-0048'),
(23827758, 0, 13670810, 1, 0, 'Сухари ячменные', '', 'sukhari-yachmennye', 0, 0, 0, 356, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0000-1'),
(23827759, 0, 13670810, 1, 0, 'Сухари ржаные цельнозерновые', '', 'sukhari-rzhanye-tselnozernovye', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0001-1'),
(23827760, 0, 13670810, 1, 0, 'Сухари ячменные \"мини\"', '', 'sukhari-yachmennye-mini', 0, 0, 0, 196, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0002-1'),
(23827761, 0, 13670810, 1, 0, 'Сухари пшеничные с оливковым маслом', '', 'sukhari-pshenichnye-s-olivkovym-maslom', 0, 0, 0, 204, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0003-1'),
(23827762, 0, 13670810, 1, 0, 'Cухари пшеничные \"крутоны\" MANNA 80г', '', 'cukhari-pshenichnye-krutony-manna-80g', 0, 0, 0, 176, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0004-1'),
(23827763, 0, 13670811, 1, 0, 'Печенье с оливковым маслом, апельсиновым соком и корицей', '', 'pechene-s-olivkovym-maslom-apelsinovym-sokom-i-koritsey', 0, 0, 0, 249, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0005-1'),
(23827764, 0, 13670811, 1, 0, 'Печенье с оливковым маслом и кэробом', '', 'pechene-s-olivkovym-maslom-i-kerobom', 0, 0, 0, 292, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0006-1'),
(23827765, 0, 13670810, 1, 0, 'Сухари ячменные цельнозерновые с кэробом', '', 'sukhari-yachmennye-tselnozernovye-s-kerobom', 0, 0, 0, 493, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0007-1'),
(23827766, 0, 13670811, 1, 0, 'Печенье \"бискотти\" с миндалём и оливковым маслом', '', 'pechene-biskotti-s-mindalem-i-olivkovym-maslom', 0, 0, 0, 365, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0012-1'),
(23827767, 0, 13670811, 1, 0, 'Печенье “бискотти” с цедрой апельсина и оливковым маслом', '', 'pechene-biskotti-s-tsedroy-apelsina-i-olivkovym-maslom', 0, 0, 0, 365, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0013-1'),
(23827768, 0, 13670804, 1, 0, 'Печенье  c цельнозерновой мукой без  сахара Digestive', '', 'pechene-c-tselnozernovoy-mukoy-bez-sakhara-digestive', 0, 0, 0, 186, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0014-1'),
(23827769, 0, 13670804, 1, 0, 'Печенье   Digestive', '', 'pechene-digestive', 0, 0, 0, 156, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0015-1'),
(23827770, 0, 13670804, 1, 0, 'Печенье  c темным шоколадом  Digestive', '', 'pechene-c-temnym-shokoladom-digestive', 0, 0, 0, 205, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0016-1'),
(23827771, 0, 13670804, 1, 0, 'Печенье \"Petit Beurre\" затяжное', '', 'pechene-petit-beurre-zatyazhnoe', 0, 0, 0, 119, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0017-1'),
(23827772, 0, 13670804, 1, 0, 'Печенье \"Petit Beurre\" затяжное c цельнозерновой мукой', '', 'pechene-petit-beurre-zatyazhnoe-c-tselnozernovoy-mukoy', 0, 0, 0, 119, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0018-1'),
(23827773, 0, 13670804, 1, 0, 'Печенье сливочное', '', 'pechene-slivochnoe', 0, 0, 0, 774, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '15-0019-1'),
(23827774, 0, 13670812, 1, 0, 'Кофе натуральный молотый', '', 'kofe-naturalnyy-molotyy', 0, 0, 0, 204, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '17-0000-1'),
(23827775, 0, 13670812, 1, 0, 'Кофе натуральный молотый', '', 'kofe-naturalnyy-molotyy', 0, 0, 0, 402, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '17-0001-1'),
(23827776, 0, 13670812, 1, 0, 'Кофе натуральный молотый темной обжарки \"Скурос\"', '', 'kofe-naturalnyy-molotyy-temnoy-obzharki-skuros', 0, 0, 0, 220, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '17-0004-1'),
(23827777, 0, 13670812, 1, 0, 'Кофе натуральный молотый', '', 'kofe-naturalnyy-molotyy', 0, 0, 0, 1034, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '17-0007'),
(23827778, 0, 13670812, 1, 0, 'Кофе натуральный молотый светлой обжарки \"Купатос\"', '', 'kofe-naturalnyy-molotyy-svetloy-obzharki-kupatos', 0, 0, 0, 573, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '17-0008'),
(23827779, 0, 13670814, 1, 0, 'Приправа Орегано', '', 'priprava-oregano', 0, 0, 0, 122, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '18-0000'),
(23827780, 0, 13670814, 1, 0, 'Приприва для курицы', '', 'pripriva-dlya-kuritsy', 0, 0, 0, 141, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '18-0001'),
(23827781, 0, 13670814, 1, 0, 'Приправа для мяса', '', 'priprava-dlya-myasa', 0, 0, 0, 141, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '18-0002-1'),
(23827782, 0, 13670814, 1, 0, 'Приправа для рыбы', '', 'priprava-dlya-ryby', 0, 0, 0, 141, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '18-0003-1'),
(23827783, 0, 13670814, 1, 0, 'Приправа для салатов', '', 'priprava-dlya-salatov', 0, 0, 0, 122, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '18-0004'),
(23827784, 0, 13670816, 1, 0, 'Мини роллы с сыром Фета и оливковым маслом', '', 'mini-rolly-s-syrom-feta-i-olivkovym-maslom', 0, 0, 0, 341, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0006-1'),
(23827785, 0, 13670816, 1, 0, 'Пирог традиционный греческий с кремом \"Бугаца\"', '', 'pirog-traditsionnyy-grecheskiy-s-kremom-bugatsa', 0, 0, 0, 371, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0007-1'),
(23827786, 0, 13670816, 1, 0, 'Пирожки спиральные \"Филло\" с сыром Фета, шпинатом и оливковым маслом', '', 'pirozhki-spiralnye-fillo-s-syrom-feta-shpinatom-i-olivkovym-maslom', 0, 0, 0, 353, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0008-1'),
(23827787, 0, 13670816, 1, 0, 'Пирожки из слоёного теста с сыром Фета \"тиропита\"', '', 'pirozhki-iz-sloenogo-testa-s-syrom-feta-tiropita', 0, 0, 0, 341, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0009-1'),
(23827788, 0, 13670816, 1, 0, 'Пирог  традиционный \"Филло\" с сыром Фета и оливковым маслом', '', 'pirog-traditsionnyy-fillo-s-syrom-feta-i-olivkovym-maslom', 0, 0, 0, 640, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0010-1'),
(23827789, 0, 13670816, 1, 0, 'Пирог  \"Филло\" с сыром Фета, шпинатом и оливковом маслом спиральный', '', 'pirog-fillo-s-syrom-feta-shpinatom-i-olivkovom-maslom-spiralnyy', 0, 0, 0, 569, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0011-1'),
(23827790, 0, 13670816, 1, 0, 'Пирог греческий  с дикой зеленью, сыром Фета и оливковым маслом', '', 'pirog-grecheskiy-s-dikoy-zelenyu-syrom-feta-i-olivkovym-maslom', 0, 0, 0, 640, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0012-1'),
(23827791, 0, 13670816, 1, 0, 'Тесто слоёное \"Филло\" для выпечки', '', 'testo-sloenoe-fillo-dlya-vypechki', 0, 0, 0, 460, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0018-1'),
(23827792, 0, 13670817, 1, 0, 'Пита греческая кукурузная', '', 'pita-grecheskaya-kukuruznaya', 0, 0, 0, 216, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0022'),
(23827793, 0, 13670817, 1, 0, 'Пита греческая традиционная', '', 'pita-grecheskaya-traditsionnaya', 0, 0, 0, 208, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0023'),
(23827794, 0, 13670817, 1, 0, 'Пита греческая традиционная', '', 'pita-grecheskaya-traditsionnaya', 0, 0, 0, 149, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0024'),
(23827795, 0, 13670817, 1, 0, 'Пита кипрская традиционная', '', 'pita-kiprskaya-traditsionnaya', 0, 0, 0, 147, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0025'),
(23827796, 0, 13670818, 1, 0, 'Тесто \"Филло\" (листовое) для всех видов выпечки', '', 'testo-fillo-listovoe-dlya-vsekh-vidov-vypechki', 0, 0, 0, 409, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0033'),
(23827797, 0, 13670817, 1, 0, 'Пита греческая традиционная', '', 'pita-grecheskaya-traditsionnaya', 0, 0, 0, 107, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0034'),
(23827798, 0, 13670816, 1, 0, 'Пирог \"Филло\" со шпинатом и оливковым маслом спиральный', '', 'pirog-fillo-so-shpinatom-i-olivkovym-maslom-spiralnyy', 0, 0, 0, 610, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0036'),
(23827799, 0, 13670816, 1, 0, 'Греческий пирог с картофелем и оливковым маслом Extra Virgin спиральный', '', 'grecheskiy-pirog-s-kartofelem-i-olivkovym-maslom-extra-virgin-spiralnyy', 0, 0, 0, 551, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0037'),
(23827800, 0, 13670816, 1, 0, 'Пирожки из слоёного теста с сосиской', '', 'pirozhki-iz-sloenogo-testa-s-sosiskoy', 0, 0, 0, 380, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '19-0038'),
(23827801, 0, 13670820, 1, 0, 'Персики половинки в сиропе', '', 'persiki-polovinki-v-sirope', 0, 0, 0, 194, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:39', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '20-0005-1'),
(23827802, 0, 13670820, 1, 0, 'Персики половинки отборные в сиропе', '', 'persiki-polovinki-otbornye-v-sirope', 0, 0, 0, 257, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '20-0006'),
(23827803, 0, 13670820, 1, 0, 'Персики половинки с корицей в сиропе', '', 'persiki-polovinki-s-koritsey-v-sirope', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '20-0007'),
(23827804, 0, 13670820, 1, 0, 'Персики половинки с ванилью в сиропе', '', 'persiki-polovinki-s-vanilyu-v-sirope', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '20-0008'),
(23827805, 0, 13670822, 1, 0, 'Анчоус европейский маринованный с луком и петрушкой в масле', '', 'anchous-evropeyskiy-marinovannyy-s-lukom-i-petrushkoy-v-masle', 0, 0, 0, 213, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:40', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '21-0000'),
(23827806, 0, 13670822, 1, 0, 'Сардины атлантические в масле', '', 'sardiny-atlanticheskie-v-masle', 0, 0, 0, 201, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '21-0001'),
(23827807, 0, 13670822, 1, 0, 'Осьминог «пикантный» в масле', '', 'osminog-pikantnyy-v-masle', 0, 0, 0, 357, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '21-0002'),
(23827808, 0, 13670822, 1, 0, 'Кальмар щупальца нарезанный  с орегано и маслом \"пикантный\"', '', 'kalmar-shchupaltsa-narezannyy-s-oregano-i-maslom-pikantnyy', 0, 0, 0, 255, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '21-0003'),
(23827809, 0, 13670822, 1, 0, 'Тунец копченый в масле', '', 'tunets-kopchenyy-v-masle', 0, 0, 0, 335, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:41', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '21-0004'),
(23827810, 0, 13670822, 1, 0, 'Тунец копченый «пикантный» в масле', '', 'tunets-kopchenyy-pikantnyy-v-masle', 0, 0, 0, 335, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '21-0005'),
(23827811, 0, 13670824, 1, 0, 'Напиток безалк.сокосодержащий газированный «ЛИМОНАДА»', '', 'napitok-bezalk-sokosoderzhashchiy-gazirovannyy-limonada', 0, 0, 0, 92, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0000'),
(23827812, 0, 13670824, 1, 0, 'Напиток  безалк.сокосодержащий газированный «ВИСИНАДА»', '', 'napitok-bezalk-sokosoderzhashchiy-gazirovannyy-visinada', 0, 0, 0, 112, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0001'),
(23827813, 0, 13670824, 1, 0, 'Напиток  безалк.сокосодержащий негазированный «ПОРТОКАЛАДА»', '', 'napitok-bezalk-sokosoderzhashchiy-negazirovannyy-portokalada', 0, 0, 0, 92, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:42', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0002'),
(23827814, 0, 13670824, 1, 0, 'Напиток  безалк.сокосодержащий газированный «ПОРТОКАЛАДА»', '', 'napitok-bezalk-sokosoderzhashchiy-gazirovannyy-portokalada', 0, 0, 0, 92, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0003'),
(23827815, 0, 13670825, 1, 0, 'Вода минер. питьевая природная столовая газированная', '', 'voda-miner-pitevaya-prirodnaya-stolovaya-gazirovannaya', 0, 0, 0, 138, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0005'),
(23827816, 0, 13670825, 1, 0, 'Вода минер. питьевая природная столовая негазированная', '', 'voda-miner-pitevaya-prirodnaya-stolovaya-negazirovannaya', 0, 0, 0, 109, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:43', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0006'),
(23827817, 0, 13670825, 1, 0, 'Вода минер. питьевая природная столовая газированная', '', 'voda-miner-pitevaya-prirodnaya-stolovaya-gazirovannaya', 0, 0, 0, 257, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0007'),
(23827818, 0, 13670825, 1, 0, 'Вода минер. питьевая природная столовая негазированная', '', 'voda-miner-pitevaya-prirodnaya-stolovaya-negazirovannaya', 0, 0, 0, 205, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0008'),
(23827819, 0, 13670825, 1, 0, 'Вода минер. питьевая природная столовая негазированная', '', 'voda-miner-pitevaya-prirodnaya-stolovaya-negazirovannaya', 0, 0, 0, 1098, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '23-0009'),
(23827820, 0, 13670826, 1, 0, 'Шалфей', '', 'shalfey', 0, 0, 0, 182, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:44', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '24-0000'),
(23827821, 0, 13670826, 1, 0, 'Горный чай', '', 'gornyy-chay', 0, 0, 0, 208, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '24-0001'),
(23827822, 0, 13670820, 1, 0, 'Десерт персиковый', '', 'desert-persikovyy', 0, 0, 0, 177, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '25-0000-1'),
(23827823, 0, 13670820, 1, 0, 'Десерт персиковый с фруктовым миксом', '', 'desert-persikovyy-s-fruktovym-miksom', 0, 0, 0, 177, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '25-0001'),
(23827824, 0, 13670820, 1, 0, 'Десерт персиковый с маракуйей', '', 'desert-persikovyy-s-marakuyey', 0, 0, 0, 177, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:45', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '25-0002'),
(23827825, 0, 13670820, 1, 0, 'Десерт персиковый с ананасом', '', 'desert-persikovyy-s-ananasom', 0, 0, 0, 177, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '25-0004'),
(23827826, 0, 13670828, 1, 0, 'Томаты резанные очищенные в собственном соку', '', 'tomaty-rezannye-ochishchennye-v-sobstvennom-soku', 0, 0, 0, 103, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0003'),
(23827827, 0, 13670828, 1, 0, 'Томаты протертые в собственном соку (пассата)', '', 'tomaty-protertye-v-sobstvennom-soku-passata', 0, 0, 0, 103, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0004'),
(23827828, 0, 13670828, 1, 0, 'Томаты очищенные в собственном соку', '', 'tomaty-ochishchennye-v-sobstvennom-soku', 0, 0, 0, 106, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:46', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0005-1'),
(23827829, 0, 13670828, 1, 0, 'Томаты резанные очищенные в собственном соку', '', 'tomaty-rezannye-ochishchennye-v-sobstvennom-soku', 0, 0, 0, 103, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0006-1'),
(23827830, 0, 13670829, 1, 0, 'Кетчуп томатный', '', 'ketchup-tomatnyy', 0, 0, 0, 161, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0014'),
(23827831, 0, 13670829, 1, 0, 'Кетчуп томатный острый', '', 'ketchup-tomatnyy-ostryy', 0, 0, 0, 161, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0015'),
(23827832, 0, 13670829, 1, 0, 'Томаты резанные в собственном соку', '', 'tomaty-rezannye-v-sobstvennom-soku', 0, 0, 0, 103, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:47', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0018'),
(23827833, 0, 13670829, 1, 0, 'Сок томатный слабоконцентрированный  7%  (ПАССАТА)', '', 'sok-tomatnyy-slabokontsentrirovannyy-7-passata', 0, 0, 0, 103, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0019'),
(23827834, 0, 13670830, 1, 0, 'Соус томатный с овощами на гриле', '', 'sous-tomatnyy-s-ovoshchami-na-grile', 0, 0, 0, 257, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0021'),
(23827835, 0, 13670830, 1, 0, 'Соус томатный с базиликом', '', 'sous-tomatnyy-s-bazilikom', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0022'),
(23827836, 0, 13670830, 1, 0, 'Соус томатный с Маскарпоне и рукколой', '', 'sous-tomatnyy-s-maskarpone-i-rukkoloy', 0, 0, 0, 292, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:48', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0023'),
(23827837, 0, 13670829, 1, 0, 'Томаты целые очищенные в собственном соку', '', 'tomaty-tselye-ochishchennye-v-sobstvennom-soku', 0, 0, 0, 113, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0024'),
(23827838, 0, 13670829, 1, 0, 'Кетчуп томатный', '', 'ketchup-tomatnyy', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0025'),
(23827839, 0, 13670829, 1, 0, 'Кетчуп томатный острый', '', 'ketchup-tomatnyy-ostryy', 0, 0, 0, 241, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '41-0026'),
(23827840, 0, 13670832, 1, 0, 'Фасоль печеная в томатном соусе', '', 'fasol-pechenaya-v-tomatnom-souse', 0, 0, 0, 1414, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0000-1'),
(23827841, 0, 13670833, 1, 0, 'Лютеница по-домашнему', '', 'lyutenitsa-po-domashnemu', 0, 0, 0, 226, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0002-1'),
(23827842, 0, 13670833, 1, 0, 'Долма вегетарианская', '', 'dolma-vegetarianskaya', 0, 0, 0, 305, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0003-1'),
(23827843, 0, 13670833, 1, 0, 'Фасоль печеная в томатном соусе', '', 'fasol-pechenaya-v-tomatnom-souse', 0, 0, 0, 296, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0004-1'),
(23827844, 0, 13670833, 1, 0, 'Перец кр. фаршир. греческим сыром с травами в подсолнечном масле', '', 'perets-kr-farshir-grecheskim-syrom-s-travami-v-podsolnechnom-masle', 0, 0, 0, 469, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0008-1'),
(23827845, 0, 13670836, 1, 0, 'Перец красный', '', 'perets-krasnyy', 0, 0, 0, 368, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0011-1'),
(23827846, 0, 13670836, 1, 0, 'Виноградный лист', '', 'vinogradnyy-list', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0013-1'),
(23827847, 0, 13670836, 1, 0, 'Печеный красный перец', '', 'pechenyy-krasnyy-perets', 0, 0, 0, 1503, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0014-1'),
(23827848, 0, 13670836, 1, 0, 'Каперсы', '', 'kapersy', 0, 0, 0, 418, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0016-1'),
(23827849, 0, 13670836, 1, 0, 'Перец желтый', '', 'perets-zheltyy', 0, 0, 0, 409, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0017-1'),
(23827850, 0, 13670833, 1, 0, 'Артишоки в подсолнечном масле', '', 'artishoki-v-podsolnechnom-masle', 0, 0, 0, 442, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0018-1'),
(23827851, 0, 13670833, 1, 0, 'Артишоки в подсолнечном масле', '', 'artishoki-v-podsolnechnom-masle', 0, 0, 0, 3766, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0019-1'),
(23827852, 0, 13670833, 1, 0, 'Артишоки в подсолнечном масле с сушеными томатами и маслинами Каламата', '', 'artishoki-v-podsolnechnom-masle-s-sushenymi-tomatami-i-maslinami-kalamata', 0, 0, 0, 442, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0021-1'),
(23827853, 0, 13670837, 1, 0, 'Перец золотистый', '', 'perets-zolotistyy', 0, 0, 0, 1265, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:53', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0022-1'),
(23827854, 0, 13670833, 1, 0, 'Перец зеленый маринованный', '', 'perets-zelenyy-marinovannyy', 0, 0, 0, 252, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:53', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0023-1'),
(23827855, 0, 13670836, 1, 0, 'Каперсы', '', 'kapersy', 0, 0, 0, 226, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:54', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0027-1'),
(23827856, 0, 13670838, 1, 0, 'Перец красный сладкий фаршированный сыром peppedoro', '', 'perets-krasnyy-sladkiy-farshirovannyy-syrom-peppedoro', 0, 0, 0, 3721, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:54', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0028'),
(23827857, 0, 13670838, 1, 0, 'Перец красный сладкий фаршированный сыром peppedoro', '', 'perets-krasnyy-sladkiy-farshirovannyy-syrom-peppedoro', 0, 0, 0, 482, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0029'),
(23827858, 0, 13670832, 1, 0, 'Баклажаны фаршированые в томатном соусе \"Имам\"', '', 'baklazhany-farshirovanye-v-tomatnom-souse-imam', 0, 0, 0, 281, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0031'),
(23827859, 0, 13670832, 1, 0, 'Долма сладко-пикантная с рисом и перцем черри', '', 'dolma-sladko-pikantnaya-s-risom-i-pertsem-cherri', 0, 0, 0, 352, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0032'),
(23827860, 0, 13670832, 1, 0, 'Баклажаны очищенные жареные на гриле', '', 'baklazhany-ochishchennye-zharenye-na-grile', 0, 0, 0, 259, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:55', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0033'),
(23827861, 0, 13670832, 1, 0, 'Долма вегетарианская', '', 'dolma-vegetarianskaya', 0, 0, 0, 1588, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0035'),
(23827862, 0, 13670832, 1, 0, 'Долма фаршированная киноа', '', 'dolma-farshirovannaya-kinoa', 0, 0, 0, 342, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0036'),
(23827863, 0, 13670836, 1, 0, 'Плоды каперсов', '', 'plody-kapersov', 0, 0, 0, 299, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0037'),
(23827864, 0, 13670838, 1, 0, 'Перец мини оранжевый, фаршированный сыром, в масле', '', 'perets-mini-oranzhevyy-farshirovannyy-syrom-v-masle', 0, 0, 0, 503, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:56', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0038'),
(23827865, 0, 13670838, 1, 0, 'Перец мини оранжевый, фаршированный сыром, в масле', '', 'perets-mini-oranzhevyy-farshirovannyy-syrom-v-masle', 0, 0, 0, 3870, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0039'),
(23827866, 0, 13670838, 1, 0, 'Перец зелёный, фаршированный сыром, в масле', '', 'perets-zelenyy-farshirovannyy-syrom-v-masle', 0, 0, 0, 454, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0040'),
(23827867, 0, 13670838, 1, 0, 'Перец зелёный, фаршированный сыром, в масле', '', 'perets-zelenyy-farshirovannyy-syrom-v-masle', 0, 0, 0, 2902, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0041'),
(23827868, 0, 13670838, 1, 0, 'Перец красный сладкий peppedoro', '', 'perets-krasnyy-sladkiy-peppedoro', 0, 0, 0, 2679, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:57', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0042'),
(23827869, 0, 13670838, 1, 0, 'Перец зеленый маринованный', '', 'perets-zelenyy-marinovannyy', 0, 0, 0, 5648, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0043'),
(23827870, 0, 13670837, 1, 0, 'Перец острый ассорти', '', 'perets-ostryy-assorti', 0, 0, 0, 222, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0044'),
(23827871, 0, 13670833, 1, 0, 'Средиземноморский микс с оливками, грибами и артишоками в масле', '', 'sredizemnomorskiy-miks-s-olivkami-gribami-i-artishokami-v-masle', 0, 0, 0, 424, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '42-0045'),
(23827872, 0, 13670830, 1, 0, 'Соус песто по-генуэзски', '', 'sous-pesto-po-genuezski', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:58', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '44-0000'),
(23827873, 0, 13670830, 1, 0, 'Соус песто средиземноморский', '', 'sous-pesto-sredizemnomorskiy', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '44-0001'),
(23827874, 0, 13670841, 1, 0, 'Маслины Каламата  с косточкой в рассоле Extra Large 201-230', '', 'masliny-kalamata-s-kostochkoy-v-rassole-extra-large-201-230', 0, 0, 0, 1980, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0001-1'),
(23827875, 0, 13670843, 1, 0, 'Маслины с косточкой Каламата в рассоле', '', 'masliny-s-kostochkoy-kalamata-v-rassole', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0002-1'),
(23827876, 0, 13670843, 1, 0, 'Оливки фаршированные миндалем в рассоле', '', 'olivki-farshirovannye-mindalem-v-rassole', 0, 0, 0, 330, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:57:59', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0003-1'),
(23827877, 0, 13670843, 1, 0, 'Оливки фаршированные сушеными томатами в рассоле', '', 'olivki-farshirovannye-sushenymi-tomatami-v-rassole', 0, 0, 0, 339, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0004-1'),
(23827878, 0, 13670843, 1, 0, 'Оливки с косточкой в рассоле', '', 'olivki-s-kostochkoy-v-rassole', 0, 0, 0, 229, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0005-1'),
(23827879, 0, 13670841, 1, 0, 'Маслины без косточек  в рассоле Colossal 121-140', '', 'masliny-bez-kostochek-v-rassole-colossal-121-140', 0, 0, 0, 1756, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0008-1'),
(23827880, 0, 13670841, 1, 0, 'Оливки без косточек  в рассоле  Colossal 121-140', '', 'olivki-bez-kostochek-v-rassole-colossal-121-140', 0, 0, 0, 1786, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:00', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0009-1'),
(23827881, 0, 13670841, 1, 0, 'Оливки с косточкой в рассоле  Colossal 121-140', '', 'olivki-s-kostochkoy-v-rassole-colossal-121-140', 0, 0, 0, 1771, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0010-1'),
(23827882, 0, 13670841, 1, 0, 'Оливки фаршированные миндалем Colossal 121-140', '', 'olivki-farshirovannye-mindalem-colossal-121-140', 0, 0, 0, 3111, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0011-1'),
(23827883, 0, 13670841, 1, 0, 'Маслины с косточкой в рассоле Atlas 70-90', '', 'masliny-s-kostochkoy-v-rassole-atlas-70-90', 0, 0, 0, 1808, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0016-1'),
(23827884, 0, 13670841, 1, 0, 'Маслины с косточкой в рассоле Super Mammouth 91-100', '', 'masliny-s-kostochkoy-v-rassole-super-mammouth-91-100', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:01', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0018-1'),
(23827885, 0, 13670843, 1, 0, 'Оливки фаршированные пастой из перца в рассоле', '', 'olivki-farshirovannye-pastoy-iz-pertsa-v-rassole', 0, 0, 0, 259, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0019-1'),
(23827886, 0, 13670843, 1, 0, 'Маслины с косточкой Зароменес в масле', '', 'masliny-s-kostochkoy-zaromenes-v-masle', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0020-1'),
(23827887, 0, 13670843, 1, 0, 'Маслины с косточкой натуральные в рассоле', '', 'masliny-s-kostochkoy-naturalnye-v-rassole', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0021-1'),
(23827888, 0, 13670841, 1, 0, 'Оливки с косточкой в рассоле Super Mammouth 91-100', '', 'olivki-s-kostochkoy-v-rassole-super-mammouth-91-100', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:02', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0022-1'),
(23827889, 0, 13670843, 1, 0, 'Оливки фаршированные чесноком в рассоле', '', 'olivki-farshirovannye-chesnokom-v-rassole', 0, 0, 0, 305, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0023-1'),
(23827890, 0, 13670841, 1, 0, 'Оливки без косточек в рассоле  Atlas 70-90', '', 'olivki-bez-kostochek-v-rassole-atlas-70-90', 0, 0, 0, 1957, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0025-1'),
(23827891, 0, 13670841, 1, 0, 'Оливки с косточкой в рассоле Superior 261-290', '', 'olivki-s-kostochkoy-v-rassole-superior-261-290', 0, 0, 0, 172, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:03', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0027-1'),
(23827892, 0, 13670841, 1, 0, 'Оливки без косточек в рассоле Superior 261-290', '', 'olivki-bez-kostochek-v-rassole-superior-261-290', 0, 0, 0, 178, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0028-1'),
(23827893, 0, 13670841, 1, 0, 'Маслины с косточкой в рассоле Superior 261-290', '', 'masliny-s-kostochkoy-v-rassole-superior-261-290', 0, 0, 0, 172, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0029-1');
INSERT INTO `shop_items` (`item_id`, `item_is_model`, `item_cat_id`, `item_status`, `item_vendor_id`, `item_title`, `item_short_title`, `item_url`, `item_amount`, `item_amount_nal`, `item_amount_nal_opt`, `item_price`, `item_price_fakt`, `item_price_opt_vip`, `item_price_opt`, `item_price_before`, `item_short_text`, `item_text_id`, `item_composition_id`, `item_video_id`, `item_comments`, `item_icon`, `item_icon_back`, `item_rate`, `item_views`, `item_head_title`, `item_head_desc`, `item_head_keywords`, `item_sale`, `item_new`, `item_hit`, `item_badge`, `item_up`, `item_sort`, `item_time`, `item_parent_id`, `item_has_child`, `item_offers`, `item_source_url`, `item_icons_dop`, `item_dop_urls`, `item_dop`, `item_full_title`, `item_offers_total`, `item_last_zero`, `item_sale_percent`, `item_article`) VALUES
(23827894, 0, 13670841, 1, 0, 'Маслины без косточек в рассоле Superior 261-290', '', 'masliny-bez-kostochek-v-rassole-superior-261-290', 0, 0, 0, 178, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0030-1'),
(23827895, 0, 13670843, 1, 0, 'Оливки с косточкой маринованные  с лимоном и кориандром', '', 'olivki-s-kostochkoy-marinovannye-s-limonom-i-koriandrom', 0, 0, 0, 378, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:04', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0031-1'),
(23827896, 0, 13670841, 1, 0, 'Маслины без косточек  в рассоле Colossal 121-140', '', 'masliny-bez-kostochek-v-rassole-colossal-121-140', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0032-1'),
(23827897, 0, 13670841, 1, 0, 'Оливки без косточек  в рассоле Colossal 121-140', '', 'olivki-bez-kostochek-v-rassole-colossal-121-140', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0034-1'),
(23827898, 0, 13670843, 1, 0, 'Маслины без косточек Каламата в рассоле', '', 'masliny-bez-kostochek-kalamata-v-rassole', 0, 0, 0, 327, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0037-1'),
(23827899, 0, 13670843, 1, 0, 'Маслины Каламата с косточкой в рассоле', '', 'masliny-kalamata-s-kostochkoy-v-rassole', 0, 0, 0, 729, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:05', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0040-1'),
(23827900, 0, 13670841, 1, 0, 'Оливки фарш.пастой из лимона', '', 'olivki-farsh-pastoy-iz-limona', 0, 0, 0, 2530, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0044-1'),
(23827901, 0, 13670843, 1, 0, 'Паста из оливок Каламата', '', 'pasta-iz-olivok-kalamata', 0, 0, 0, 219, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0045-1'),
(23827902, 0, 13670843, 1, 0, 'Паста из маслин', '', 'pasta-iz-maslin', 0, 0, 0, 211, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0046-1'),
(23827903, 0, 13670843, 1, 0, 'Паста из зеленых оливок', '', 'pasta-iz-zelenykh-olivok', 0, 0, 0, 202, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0047-1'),
(23827904, 0, 13670845, 1, 0, 'Оливки с косточкой сушеные в оливковом масле (Фурнистес)', '', 'olivki-s-kostochkoy-sushenye-v-olivkovom-masle-furnistes', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:06', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0052-1'),
(23827905, 0, 13670845, 1, 0, 'Оливки с косточкой  черные натуральные в оливковом масле', '', 'olivki-s-kostochkoy-chernye-naturalnye-v-olivkovom-masle', 0, 0, 0, 265, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0053-1'),
(23827906, 0, 13670845, 1, 0, 'Оливки с косточкой Каламата в оливковом масле', '', 'olivki-s-kostochkoy-kalamata-v-olivkovom-masle', 0, 0, 0, 381, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0054-1'),
(23827907, 0, 13670845, 1, 0, 'Оливки с косточкой вяленые (Трубес)  в оливковом масле с острова Тассос', '', 'olivki-s-kostochkoy-vyalenye-trubes-v-olivkovom-masle-s-ostrova-tassos', 0, 0, 0, 249, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0056-2'),
(23827908, 0, 13670843, 1, 0, 'Оливки фаршированные перцем Джалопено в рассоле', '', 'olivki-farshirovannye-pertsem-dzhalopeno-v-rassole', 0, 0, 0, 327, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:07', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0057-1'),
(23827909, 0, 13670843, 1, 0, 'Оливки фаршированные корнишонами в рассоле', '', 'olivki-farshirovannye-kornishonami-v-rassole', 0, 0, 0, 369, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0059-1'),
(23827910, 0, 13670841, 1, 0, 'Оливки с косточкой в рассоле Atlas 70-90', '', 'olivki-s-kostochkoy-v-rassole-atlas-70-90', 0, 0, 0, 1908, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0061-1'),
(23827911, 0, 13670841, 1, 0, 'Маслины без косточек в рассоле Atlas 70-90', '', 'masliny-bez-kostochek-v-rassole-atlas-70-90', 0, 0, 0, 1863, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0062-1'),
(23827912, 0, 13670841, 1, 0, 'Оливки с косточкой в рассоле  Super Mammouth 91-100', '', 'olivki-s-kostochkoy-v-rassole-super-mammouth-91-100', 0, 0, 0, 1883, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:08', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0063-1'),
(23827913, 0, 13670841, 1, 0, 'Маслины с косточкой в рассоле Super Mammouth 91-100', '', 'masliny-s-kostochkoy-v-rassole-super-mammouth-91-100', 0, 0, 0, 1793, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0064-1'),
(23827914, 0, 13670841, 1, 0, 'Оливки фаршированные чесноком Colossal 121-140', '', 'olivki-farshirovannye-chesnokom-colossal-121-140', 0, 0, 0, 2620, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0065-1'),
(23827915, 0, 13670841, 1, 0, 'Оливки фаршированные сушеными томатами Colossal 121-140', '', 'olivki-farshirovannye-sushenymi-tomatami-colossal-121-140', 0, 0, 0, 3029, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0066-1'),
(23827916, 0, 13670841, 1, 0, 'Маслины с косточкой в рассоле  Colossal 121-140', '', 'masliny-s-kostochkoy-v-rassole-colossal-121-140', 0, 0, 0, 1660, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:09', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0067-1'),
(23827917, 0, 13670841, 1, 0, 'Маслины Каламата  без косточки в рассоле Extra Large 201-230', '', 'masliny-kalamata-bez-kostochki-v-rassole-extra-large-201-230', 0, 0, 0, 2262, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:10', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0068-1'),
(23827918, 0, 13670841, 1, 0, 'Маслины  Каламата с косточкой в рассоле Super Colossal 111-120', '', 'masliny-kalamata-s-kostochkoy-v-rassole-super-colossal-111-120', 0, 0, 0, 2307, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:10', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0069-1'),
(23827919, 0, 13670841, 1, 0, 'Маслины Каламата с косточкой в рассоле Colossal 121-140', '', 'masliny-kalamata-s-kostochkoy-v-rassole-colossal-121-140', 0, 0, 0, 2203, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:10', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0070-1'),
(23827920, 0, 13670843, 1, 0, 'Оливки без косточек в рассоле', '', 'olivki-bez-kostochek-v-rassole', 0, 0, 0, 259, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:11', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0071-1'),
(23827921, 0, 13670846, 1, 0, 'Ассорти оливок традиционное', '', 'assorti-olivok-traditsionnoe', 0, 0, 0, 365, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:11', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0072-1'),
(23827922, 0, 13670846, 1, 0, 'Ассорти оливок пикантное', '', 'assorti-olivok-pikantnoe', 0, 0, 0, 365, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:11', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0073-1'),
(23827923, 0, 13670846, 1, 0, 'Оливки с косточкой вяленые (Трубес) XXL', '', 'olivki-s-kostochkoy-vyalenye-trubes-xxl', 0, 0, 0, 485, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0074-1'),
(23827924, 0, 13670846, 1, 0, 'Оливки зеленые с косточкой', '', 'olivki-zelenye-s-kostochkoy', 0, 0, 0, 369, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0075-1'),
(23827925, 0, 13670846, 1, 0, 'Оливки Каламата с косточкой', '', 'olivki-kalamata-s-kostochkoy', 0, 0, 0, 339, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0076-1'),
(23827926, 0, 13670843, 1, 0, 'Маслины с косточкой Каламата в рассоле БИО', '', 'masliny-s-kostochkoy-kalamata-v-rassole-bio', 0, 0, 0, 320, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:12', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0083-1'),
(23827927, 0, 13670843, 1, 0, 'Оливки с косточкой в рассоле БИО', '', 'olivki-s-kostochkoy-v-rassole-bio', 0, 0, 0, 260, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0084-1'),
(23827928, 0, 13670843, 1, 0, 'Оливки с косточкой рассоле', '', 'olivki-s-kostochkoy-rassole', 0, 0, 0, 426, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0085-1'),
(23827929, 0, 13670843, 1, 0, 'Маслины с косточкой в рассоле', '', 'masliny-s-kostochkoy-v-rassole', 0, 0, 0, 426, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0086-1'),
(23827930, 0, 13670843, 1, 0, 'Маслины Каламата с косточкой сушеные', '', 'masliny-kalamata-s-kostochkoy-sushenye', 0, 0, 0, 275, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:13', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0087'),
(23827931, 0, 13670843, 1, 0, 'Паста из заленых оливок', '', 'pasta-iz-zalenykh-olivok', 0, 0, 0, 509, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:14', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0088-1'),
(23827932, 0, 13670843, 1, 0, 'Маслины с косточкой в рассоле Монастырские', '', 'masliny-s-kostochkoy-v-rassole-monastyrskie', 0, 0, 0, 357, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:14', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0089-1'),
(23827933, 0, 13670843, 1, 0, 'Маслины Каламата с косточкой в рассоле Монастырские', '', 'masliny-kalamata-s-kostochkoy-v-rassole-monastyrskie', 0, 0, 0, 388, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:14', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0090-1'),
(23827934, 0, 13670843, 1, 0, 'Оливки с косточкой в рассоле Монастырские', '', 'olivki-s-kostochkoy-v-rassole-monastyrskie', 0, 0, 0, 357, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:15', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0091-1'),
(23827935, 0, 13670841, 1, 0, 'Оливки фаршированные пастой из перца  JUMBO 181-200', '', 'olivki-farshirovannye-pastoy-iz-pertsa-jumbo-181-200', 0, 0, 0, 2047, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:15', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0097-1'),
(23827936, 0, 13670843, 1, 0, 'Маслины без косточки в рассоле', '', 'masliny-bez-kostochki-v-rassole', 0, 0, 0, 466, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:15', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0098-1'),
(23827937, 0, 13670843, 1, 0, 'Оливки без косточки в рассоле', '', 'olivki-bez-kostochki-v-rassole', 0, 0, 0, 466, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:15', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0099-1'),
(23827938, 0, 13670841, 1, 0, 'Маслины Дамаскинэлия с косточкой Atlas 70-90', '', 'masliny-damaskineliya-s-kostochkoy-atlas-70-90', 0, 0, 0, 1808, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0100-1'),
(23827939, 0, 13670843, 1, 0, 'Оливки фаршированные пастой из лимона в рассоле', '', 'olivki-farshirovannye-pastoy-iz-limona-v-rassole', 0, 0, 0, 327, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0101-1'),
(23827940, 0, 13670843, 1, 0, 'Паста из маслин', '', 'pasta-iz-maslin', 0, 0, 0, 551, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:16', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0105'),
(23827941, 0, 13670843, 1, 0, 'Оливки фаршированные перцем чили в рассоле', '', 'olivki-farshirovannye-pertsem-chili-v-rassole', 0, 0, 0, 365, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0111'),
(23827942, 0, 13670841, 1, 0, 'Маслины Каламата с косточкой  Colossal 121-140', '', 'masliny-kalamata-s-kostochkoy-colossal-121-140', 0, 0, 0, 573, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0112'),
(23827943, 0, 13670841, 1, 0, 'Оливки фаршированные корнишонами Colossal 121-140', '', 'olivki-farshirovannye-kornishonami-colossal-121-140', 0, 0, 0, 3193, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:17', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0113'),
(23827944, 0, 13670843, 1, 0, 'Маслины Каламата с косточкой  в рассоле', '', 'masliny-kalamata-s-kostochkoy-v-rassole', 0, 0, 0, 558, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0114'),
(23827945, 0, 13670847, 1, 0, 'Маслины Каламата с косточкой маринованные с оливковым маслом  DELPHI 250г  в/у', '', 'masliny-kalamata-s-kostochkoy-marinovannye-s-olivkovym-maslom-delphi-250g-v-u', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0115'),
(23827946, 0, 13670847, 1, 0, 'Оливки с косточкой маринованные с оливковым маслом', '', 'olivki-s-kostochkoy-marinovannye-s-olivkovym-maslom', 0, 0, 0, 278, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0116'),
(23827947, 0, 13670847, 1, 0, 'Оливки и маслины Каламата с косточкой маринованные с оливковым маслом', '', 'olivki-i-masliny-kalamata-s-kostochkoy-marinovannye-s-olivkovym-maslom', 0, 0, 0, 311, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:18', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0117'),
(23827948, 0, 13670848, 1, 0, 'Оливки с косточкой  “Дамаскиноэлия”', '', 'olivki-s-kostochkoy-damaskinoeliya', 0, 0, 0, 475, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0119'),
(23827949, 0, 13670847, 1, 0, 'Оливки с косточкой вяленые (Трубес) с оливковым маслом', '', 'olivki-s-kostochkoy-vyalenye-trubes-s-olivkovym-maslom', 0, 0, 0, 391, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0120'),
(23827950, 0, 13670843, 1, 0, 'Оливки с косточкой копченые, в рассоле', '', 'olivki-s-kostochkoy-kopchenye-v-rassole', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0121'),
(23827951, 0, 13670843, 1, 0, 'Маслины Каламата с косточкой копченые, в рассоле', '', 'masliny-kalamata-s-kostochkoy-kopchenye-v-rassole', 0, 0, 0, 365, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:19', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0122'),
(23827952, 0, 13670847, 1, 0, 'Оливки с косточкой вяленые \"Трубес\"', '', 'olivki-s-kostochkoy-vyalenye-trubes', 0, 0, 0, 3319, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0124'),
(23827953, 0, 13670845, 1, 0, 'Оливки с косточкой сушеные \"Фурнистес\"в оливковом масле', '', 'olivki-s-kostochkoy-sushenye-furnistes-v-olivkovom-masle', 0, 0, 0, 2634, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0125'),
(23827954, 0, 13670843, 1, 0, 'Оливки фаршированные кешью, в рассоле', '', 'olivki-farshirovannye-keshyu-v-rassole', 0, 0, 0, 342, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '51-0126'),
(23827955, 0, 13670820, 1, 0, 'Джем из киви', '', 'dzhem-iz-kivi', 0, 0, 0, 307, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:20', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '62-0006'),
(23827956, 0, 13670820, 1, 0, 'Джем из инжира', '', 'dzhem-iz-inzhira', 0, 0, 0, 307, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '62-0007'),
(23827957, 0, 13670820, 1, 0, 'Джем из ежевики', '', 'dzhem-iz-ezheviki', 0, 0, 0, 307, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '62-0008'),
(23827958, 0, 13670820, 1, 0, 'Джем из граната', '', 'dzhem-iz-granata', 0, 0, 0, 307, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:21', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '62-0009'),
(23827959, 0, 13670820, 1, 0, 'Конфитюр из ежевики', '', 'konfityur-iz-ezheviki', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '63-0005-1'),
(23827960, 0, 13670820, 1, 0, 'Конфитюр из апельсинов', '', 'konfityur-iz-apelsinov', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '63-0006-1'),
(23827961, 0, 13670820, 1, 0, 'Конфитюр из черешни', '', 'konfityur-iz-chereshni', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:22', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '63-0007-1'),
(23827962, 0, 13670820, 1, 0, 'Конфитюр из клубники', '', 'konfityur-iz-klubniki', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '63-0008-1'),
(23827963, 0, 13670820, 1, 0, 'Конфитюр из лесных ягод', '', 'konfityur-iz-lesnykh-yagod', 0, 0, 0, 283, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '63-0009-1'),
(23827964, 0, 13670820, 1, 0, 'Вишня в сиропе', '', 'vishnya-v-sirope', 0, 0, 0, 476, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0009-1'),
(23827965, 0, 13670820, 1, 0, 'Черешня в сиропе', '', 'chereshnya-v-sirope', 0, 0, 0, 476, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:23', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0010-1'),
(23827966, 0, 13670820, 1, 0, 'Мандарин в сиропе', '', 'mandarin-v-sirope', 0, 0, 0, 447, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0011-1'),
(23827967, 0, 13670820, 1, 0, 'Инжир в сиропе', '', 'inzhir-v-sirope', 0, 0, 0, 447, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0012-1'),
(23827968, 0, 13670820, 1, 0, 'Айва в сиропе', '', 'ayva-v-sirope', 0, 0, 0, 447, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0013-1'),
(23827969, 0, 13670820, 1, 0, 'Лепестки розы в сиропе', '', 'lepestki-rozy-v-sirope', 0, 0, 0, 640, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:24', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0014-1'),
(23827970, 0, 13670820, 1, 0, 'Грецкий орех в сиропе', '', 'gretskiy-orekh-v-sirope', 0, 0, 0, 640, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '66-0015-1'),
(23827971, 0, 13670849, 1, 0, 'Томаты очищенные в собст.соку', '', 'tomaty-ochishchennye-v-sobst-soku', 0, 0, 0, 156, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0000-1'),
(23827972, 0, 13670849, 1, 0, 'Томаты очищенные в собст.соку', '', 'tomaty-ochishchennye-v-sobst-soku', 0, 0, 0, 417, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0001-1'),
(23827973, 0, 13670849, 1, 0, 'Томаты сушеные в масле', '', 'tomaty-sushenye-v-masle', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:25', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0002-1'),
(23827974, 0, 13670833, 1, 0, 'Брускетта из печеного перца', '', 'brusketta-iz-pechenogo-pertsa', 0, 0, 0, 350, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0004-1'),
(23827975, 0, 13670833, 1, 0, 'Брускетта  из зеленых оливок и оливок  Каламата', '', 'brusketta-iz-zelenykh-olivok-i-olivok-kalamata', 0, 0, 0, 350, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0005-1'),
(23827976, 0, 13670833, 1, 0, 'Брускетта из сушеных томатов', '', 'brusketta-iz-sushenykh-tomatov', 0, 0, 0, 350, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0006-1'),
(23827977, 0, 13670849, 1, 0, 'Томаты сушеные в масле Монастырские', '', 'tomaty-sushenye-v-masle-monastyrskie', 0, 0, 0, 313, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:26', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0007-1'),
(23827978, 0, 13670850, 1, 0, 'Томаты сушеные в масле', '', 'tomaty-sushenye-v-masle', 0, 0, 0, 2962, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '70-0008'),
(23827979, 0, 13670853, 1, 0, 'Оливковое масло с Крита', '', 'olivkovoe-maslo-s-krita', 0, 0, 0, 908, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0001'),
(23827980, 0, 13670853, 1, 0, 'Оливковое масло с Крита', '', 'olivkovoe-maslo-s-krita', 0, 0, 0, 646, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0002'),
(23827981, 0, 13670853, 1, 0, 'Оливковое масло c Крита', '', 'olivkovoe-maslo-c-krita', 0, 0, 0, 351, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:27', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0003'),
(23827982, 0, 13670854, 1, 0, 'Масло оливковое E.V. кислотность 0,3%', '', 'maslo-olivkovoe-e-v-kislotnost-0-3', 0, 0, 0, 1182, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0009-1'),
(23827983, 0, 13670855, 1, 0, 'Масло оливковое E.V. БИО', '', 'maslo-olivkovoe-e-v-bio', 0, 0, 0, 817, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0010'),
(23827984, 0, 13670853, 1, 0, 'Масло оливковое E. V. С ароматическими  травами', '', 'maslo-olivkovoe-e-v-s-aromaticheskimi-travami', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0011-1'),
(23827985, 0, 13670855, 1, 0, 'Масло оливковое E.V.', '', 'maslo-olivkovoe-e-v', 0, 0, 0, 5157, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:28', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0012'),
(23827986, 0, 13670854, 1, 0, 'Масло оливковое E.V. кислотность 0,3%', '', 'maslo-olivkovoe-e-v-kislotnost-0-3', 0, 0, 0, 689, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0020-1'),
(23827987, 0, 13670853, 1, 0, 'Масло оливковое Помас', '', 'maslo-olivkovoe-pomas', 0, 0, 0, 470, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0033'),
(23827988, 0, 13670854, 1, 0, 'Масло оливковое E.V. кислотность 0,2%', '', 'maslo-olivkovoe-e-v-kislotnost-0-2', 0, 0, 0, 1223, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0035-1'),
(23827989, 0, 13670855, 1, 0, 'Масло оливковое E.V.', '', 'maslo-olivkovoe-e-v', 0, 0, 0, 2128, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:29', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0037-1'),
(23827990, 0, 13670856, 1, 0, 'Масло оливковое Помас', '', 'maslo-olivkovoe-pomas', 0, 0, 0, 2233, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0038-1'),
(23827991, 0, 13670857, 1, 0, 'Масло оливковое E.V.  Спрей', '', 'maslo-olivkovoe-e-v-sprey', 0, 0, 0, 375, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0039-1'),
(23827992, 0, 13670853, 1, 0, 'Масло оливковое Помас', '', 'maslo-olivkovoe-pomas', 0, 0, 0, 2307, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0045-1'),
(23827993, 0, 13670854, 1, 0, 'Масло оливковое  E.V. кислотность0,2%', '', 'maslo-olivkovoe-e-v-kislotnost0-2', 0, 0, 0, 737, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:30', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0046-1'),
(23827994, 0, 13670854, 1, 0, 'Масло оливковое E.V. кислотность0,2%', '', 'maslo-olivkovoe-e-v-kislotnost0-2', 0, 0, 0, 1223, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0047-1'),
(23827995, 0, 13670854, 1, 0, 'Масло оливковое E.V. кислотность0,3%', '', 'maslo-olivkovoe-e-v-kislotnost0-3', 0, 0, 0, 677, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0048-1'),
(23827996, 0, 13670854, 1, 0, 'Масло оливковое E.V. кислотность0,3%', '', 'maslo-olivkovoe-e-v-kislotnost0-3', 0, 0, 0, 1182, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0049-1'),
(23827997, 0, 13670855, 1, 0, 'Масло оливковое E.V.', '', 'maslo-olivkovoe-e-v', 0, 0, 0, 5157, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:31', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0052-1'),
(23827998, 0, 13670858, 1, 0, 'Масло оливковое E.V. с апельсином', '', 'maslo-olivkovoe-e-v-s-apelsinom', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0059-1'),
(23827999, 0, 13670858, 1, 0, 'Масло оливковое E. V. с бальзамическим уксусом', '', 'maslo-olivkovoe-e-v-s-balzamicheskim-uksusom', 0, 0, 0, 353, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0060-1'),
(23828000, 0, 13670858, 1, 0, 'Масло оливковое E. V. с оливками', '', 'maslo-olivkovoe-e-v-s-olivkami', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:32', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0061'),
(23828001, 0, 13670858, 1, 0, 'Масло оливковое Е.V. с перцем чили', '', 'maslo-olivkovoe-e-v-s-pertsem-chili', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0062-1'),
(23828002, 0, 13670858, 1, 0, 'Масло оливковое E. V.с сушеными томатами', '', 'maslo-olivkovoe-e-v-s-sushenymi-tomatami', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0063'),
(23828003, 0, 13670858, 1, 0, 'Масло оливковое E. V. с чесноком', '', 'maslo-olivkovoe-e-v-s-chesnokom', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0064-1'),
(23828004, 0, 13670858, 1, 0, 'Масло оливковое E. V. с базиликом', '', 'maslo-olivkovoe-e-v-s-bazilikom', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:33', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0065-1'),
(23828005, 0, 13670858, 1, 0, 'Масло оливковое E. V. с лимоном', '', 'maslo-olivkovoe-e-v-s-limonom', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0066-1'),
(23828006, 0, 13670858, 1, 0, 'Масло оливковое E. V. с орегано', '', 'maslo-olivkovoe-e-v-s-oregano', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0067-1'),
(23828007, 0, 13670858, 1, 0, 'Масло оливковое E. V. с розмарином', '', 'maslo-olivkovoe-e-v-s-rozmarinom', 0, 0, 0, 326, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0068-1'),
(23828008, 0, 13670858, 1, 0, 'Масло оливковое E. V. с трюфелем', '', 'maslo-olivkovoe-e-v-s-tryufelem', 0, 0, 0, 353, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:34', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0069-1'),
(23828009, 0, 13670854, 1, 0, 'Масло оливковое  E.V.  кислотность0,2%', '', 'maslo-olivkovoe-e-v-kislotnost0-2', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0070-1'),
(23828010, 0, 13670854, 1, 0, 'Масло оливковое  E.V.  кислотность0,2%', '', 'maslo-olivkovoe-e-v-kislotnost0-2', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0072'),
(23828011, 0, 13670859, 1, 0, 'Масло оливковое \"Агурелео\"', '', 'maslo-olivkovoe-agureleo', 0, 0, 0, 1116, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0074'),
(23828012, 0, 13670860, 1, 0, 'Масло оливковое E.V.', '', 'maslo-olivkovoe-e-v', 0, 0, 0, 4763, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:35', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0079'),
(23828013, 0, 13670853, 1, 0, 'Масло оливковое  E.V. Каламата', '', 'maslo-olivkovoe-e-v-kalamata', 0, 0, 0, 342, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0082'),
(23828014, 0, 13670853, 1, 0, 'Масло оливковое  E.V. Каламата', '', 'maslo-olivkovoe-e-v-kalamata', 0, 0, 0, 619, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0083'),
(23828015, 0, 13670853, 1, 0, 'Масло оливковое  \"Агурелео\"', '', 'maslo-olivkovoe-agureleo', 0, 0, 0, 647, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0089'),
(23828016, 0, 13670853, 1, 0, 'Масло оливковое  E.V. Каламата', '', 'maslo-olivkovoe-e-v-kalamata', 0, 0, 0, 3185, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:36', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0090'),
(23828017, 0, 13670853, 1, 0, 'Масло оливковое Помас Монастырское', '', 'maslo-olivkovoe-pomas-monastyrskoe', 0, 0, 0, 470, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0092'),
(23828018, 0, 13670861, 1, 0, 'Масло оливковое E.V.Монастырское SITIA P.D.O.', '', 'maslo-olivkovoe-e-v-monastyrskoe-sitia-p-d-o', 0, 0, 0, 740, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0094'),
(23828019, 0, 13670861, 1, 0, 'Масло оливковое E.V.Монастырское SITIA P.D.O.', '', 'maslo-olivkovoe-e-v-monastyrskoe-sitia-p-d-o', 0, 0, 0, 1273, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0095'),
(23828020, 0, 13670861, 1, 0, 'Масло оливковое E.V.Монастырское', '', 'maslo-olivkovoe-e-v-monastyrskoe', 0, 0, 0, 1176, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0096'),
(23828021, 0, 13670853, 1, 0, 'Масло оливковое E.V. Монастырское', '', 'maslo-olivkovoe-e-v-monastyrskoe', 0, 0, 0, 491, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:37', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0097'),
(23828022, 0, 13670853, 1, 0, 'Масло оливковое E.V. Монастырское', '', 'maslo-olivkovoe-e-v-monastyrskoe', 0, 0, 0, 900, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0098'),
(23828023, 0, 13670853, 1, 0, 'Масло оливковое нераф/ высшего качества E. V.  BIO KIDS', '', 'maslo-olivkovoe-neraf-vysshego-kachestva-e-v-bio-kids', 0, 0, 0, 469, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0099'),
(23828024, 0, 13670862, 1, 0, 'Масло оливковое E. V. Athlon', '', 'maslo-olivkovoe-e-v-athlon', 0, 0, 0, 4614, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-04 19:58:38', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '81-0100'),
(23596989, 0, 13555973, 1, 0, 'UC18YRL Устройство зарядное для аккумуляторов до 18В', '', 'uc18yrl-ustroystvo-zaryadnoe-dlya-akkumulyatorov-do-18v', 0, 0, 0, 3457, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '93199571'),
(23596990, 0, 13555973, 1, 0, 'CARBON BRUSH (1 PAIR)', '', 'carbon-brush-1-pair', 0, 0, 0, 414, 0, 0, 0, 0, '', 0, NULL, 0, 0, '1639233169.jpg', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999001'),
(23596991, 0, 13555973, 1, 0, 'Угольные щетки (1 пара)', '', 'ugolnye-shchetki-1-para', 0, 0, 0, 278, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:49', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999041'),
(23596992, 0, 13555973, 1, 0, 'Угольные щетки (1 пара)', '', 'ugolnye-shchetki-1-para', 0, 0, 0, 340, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999056'),
(23596993, 0, 13555973, 1, 0, 'Угольные щетки (с автостопом)', '', 'ugolnye-shchetki-s-avtostopom', 0, 0, 0, 755, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999075'),
(23596994, 0, 13555973, 1, 0, 'Угольные щетки (1 пара)', '', 'ugolnye-shchetki-1-para', 0, 0, 0, 295, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999088'),
(23596995, 0, 13555973, 1, 0, 'CARBON BRUSH A.S. TYPE (1 PAIR)', '', 'carbon-brush-a-s-type-1-pair', 0, 0, 0, 600, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:50', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999089'),
(23596996, 0, 13555973, 1, 0, 'Угольные щетки (1 пара) с автостопом', '', 'ugolnye-shchetki-1-para-s-avtostopom', 0, 0, 0, 723, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999090'),
(23596997, 0, 13555973, 1, 0, 'Угольные щетки (1 пара) с автостопом', '', 'ugolnye-shchetki-1-para-s-avtostopom', 0, 0, 0, 689, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '999091'),
(23596998, 0, 13555973, 1, 0, 'Прокладка головки цилиндра', '', 'prokladka-golovki-tsilindra', 0, 0, 0, 119, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, 'kc66009aa'),
(23596999, 0, 13555973, 1, 0, 'Пружина рычага управления', '', 'pruzhina-rychaga-upravleniya', 0, 0, 0, 69, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:51', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, 'kg42013aa'),
(23597000, 0, 13555973, 1, 0, 'Поршневые кольца, комплект', '', 'porshnevye-koltsa-komplekt', 0, 0, 0, 1959, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, 'kp02012aa'),
(23597001, 0, 13555973, 1, 0, 'UC18YG Устройство зарядное (OLD 93199606)', '', 'uc18yg-ustroystvo-zaryadnoe-old-93199606', 0, 0, 0, 2168, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, 'uc18ygr0z'),
(23597005, 0, 13555973, 1, 0, 'Комплект угольных щеток для УШМ', '', 'komplekt-ugolnykh-shchetok-dlya-ushm', 0, 0, 0, 290, 0, 0, 0, 0, '', 0, NULL, 0, 0, '', 0, '0.00', 0, '', '', '', 0, 0, 0, 0, 0, '0.0000', '2021-12-11 17:32:52', 0, 0, 0, '', '', '', '', '', 0, NULL, NULL, '316097800');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_items_also`
--

CREATE TABLE `shop_items_also` (
  `item_id` int(11) NOT NULL,
  `item_related_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_items_cat`
--

CREATE TABLE `shop_items_cat` (
  `item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_items_cat`
--

INSERT INTO `shop_items_cat` (`item_id`, `cat_id`, `sort`) VALUES
(7, 3, 0),
(7, 9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_items_filters`
--

CREATE TABLE `shop_items_filters` (
  `sif_id` int(11) NOT NULL,
  `sif_item_id` int(11) NOT NULL,
  `sif_sprav_id` int(11) NOT NULL DEFAULT 0,
  `sif_svid` int(11) NOT NULL,
  `sif_value` varchar(255) NOT NULL DEFAULT '',
  `sif_price` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_items_filters`
--

INSERT INTO `shop_items_filters` (`sif_id`, `sif_item_id`, `sif_sprav_id`, `sif_svid`, `sif_value`, `sif_price`) VALUES
(26, 2, 10, 0, '40', 0),
(2, 1, 1, 2, '', 0),
(3, 1, 7, 0, '14', 0),
(4, 1, 8, 0, '14.56', 0),
(5, 1, 10, 0, '45', 0),
(6, 1, 11, 0, '10', 0),
(7, 1, 3, 8, '', 0),
(8, 1, 2, 6, '', 0),
(9, 1, 9, 30, '', 0),
(10, 1, 12, 34, '', 0),
(11, 2, 1, 3, '', 0),
(12, 2, 2, 6, '', 0),
(13, 2, 6, 24, '', 0),
(14, 2, 3, 8, '', 0),
(15, 2, 9, 31, '', 0),
(27, 2, 4, 0, '1600', 0),
(17, 2, 14, 0, '102', 0),
(18, 2, 7, 0, '54', 0),
(19, 2, 15, 0, '80', 0),
(20, 2, 11, 0, '15', 0),
(21, 2, 16, 0, '120', 0),
(22, 2, 17, 0, '30', 0),
(23, 2, 12, 34, '', 0),
(24, 2, 8, 0, '6', 0),
(25, 2, 5, 0, '40', 0),
(28, 5, 6, 14, '', 0),
(29, 5, 1, 1, '', 0),
(30, 5, 7, 0, '123', 0),
(31, 5, 8, 0, '1232', 0),
(32, 5, 9, 31, '', 0),
(33, 5, 10, 0, '122', 0),
(34, 5, 11, 0, '6', 0),
(35, 5, 4, 0, '4', 0),
(36, 5, 3, 10, '', 0),
(37, 5, 12, 34, '', 0),
(38, 5, 2, 5, '', 0),
(39, 7, 7, 0, '11', 0),
(40, 7, 8, 0, '5', 0),
(41, 7, 9, 30, '', 0),
(42, 7, 1, 2, '', 0),
(43, 7, 6, 17, '', 0),
(44, 7, 10, 0, '77', 0),
(45, 7, 11, 0, '6', 0),
(46, 7, 4, 0, '1440', 0),
(47, 7, 3, 9, '', 0),
(48, 7, 2, 7, '', 0),
(49, 7, 12, 33, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_item_basket`
--

CREATE TABLE `shop_item_basket` (
  `basket_id` int(11) NOT NULL,
  `basket_item_id` int(11) NOT NULL,
  `basket_sessionhash` varchar(64) NOT NULL,
  `basket_user_id` int(11) NOT NULL DEFAULT 0,
  `basket_price` int(11) NOT NULL DEFAULT 0,
  `basket_count` decimal(7,2) NOT NULL DEFAULT 0.00,
  `basket_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_item_basket`
--

INSERT INTO `shop_item_basket` (`basket_id`, `basket_item_id`, `basket_sessionhash`, `basket_user_id`, `basket_price`, `basket_count`, `basket_time`) VALUES
(1, 23827666, '0f28a66606b69ff91ca7787661d56bd1', 0, 0, '1.00', '2021-12-12 10:23:27'),
(2, 23827668, '0f28a66606b69ff91ca7787661d56bd1', 0, 0, '1.00', '2021-12-12 10:37:03'),
(3, 23827666, 'de4051c6a8a43a65317ebe27f85c168c', 0, 0, '1.00', '2021-12-12 13:13:54'),
(4, 23827667, 'de4051c6a8a43a65317ebe27f85c168c', 0, 0, '2.00', '2021-12-12 13:13:58'),
(5, 23827668, 'de4051c6a8a43a65317ebe27f85c168c', 0, 0, '1.00', '2021-12-12 13:14:20');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_item_decorations`
--

CREATE TABLE `shop_item_decorations` (
  `sid_id` int(11) NOT NULL,
  `sid_dec_id` int(11) NOT NULL,
  `sid_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_item_decorations`
--

INSERT INTO `shop_item_decorations` (`sid_id`, `sid_dec_id`, `sid_item_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 4, 2),
(4, 3, 2),
(5, 1, 5),
(6, 2, 7),
(7, 4, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_item_order`
--

CREATE TABLE `shop_item_order` (
  `oid_id` int(11) NOT NULL,
  `oid_order_id` int(11) NOT NULL,
  `oid_item_id` int(11) NOT NULL,
  `oid_name` varchar(250) NOT NULL DEFAULT '',
  `oid_article` varchar(30) NOT NULL DEFAULT '',
  `oid_item_price` int(11) NOT NULL DEFAULT 0,
  `oid_item_count` int(11) NOT NULL DEFAULT 0,
  `oid_item_setup` int(1) NOT NULL DEFAULT 0,
  `oid_item_setup_price` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_item_views`
--

CREATE TABLE `shop_item_views` (
  `siv_id` int(11) NOT NULL,
  `siv_item_id` int(11) NOT NULL,
  `siv_sessionhash` varchar(64) NOT NULL,
  `siv_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_item_views`
--

INSERT INTO `shop_item_views` (`siv_id`, `siv_item_id`, `siv_sessionhash`, `siv_time`) VALUES
(1, 2, 'a0bbfdeb70eb9d86d76cf3fc407ce731', 1637586605),
(2, 2, '0ac7cfe78cf6b023c907b439b3e256b4', 1637587328),
(3, 2, 'bd3075ae8e0cf069e7baa7915138a79f', 1637593483),
(4, 1, 'bd3075ae8e0cf069e7baa7915138a79f', 1637590898),
(5, 2, '7554ed1f092491648d8da34277f05a92', 1637668391),
(6, 1, '7554ed1f092491648d8da34277f05a92', 1637667943),
(7, 1, '88cd5ed10d20d0945c40f2e77834d6b4', 1637851019),
(8, 7, '88cd5ed10d20d0945c40f2e77834d6b4', 1637847101),
(9, 2, 'dcd92972db6752111a11c1121962d28c', 1637915646),
(10, 2, '7b359aef68646ab01b5a717d9cabd431', 1637929104),
(11, 1, '7b359aef68646ab01b5a717d9cabd431', 1637930350),
(12, 5, '7b359aef68646ab01b5a717d9cabd431', 1637930568),
(13, 2, '388836777496f8652176686c21a65f8f', 1637938053),
(14, 1, '1f04ad2828266c170f4d87b3a98ff5ce', 1638026503);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_offers`
--

CREATE TABLE `shop_offers` (
  `offer_id` int(11) NOT NULL,
  `offer_article` varchar(50) NOT NULL DEFAULT '',
  `offer_code` varchar(50) NOT NULL DEFAULT '',
  `offer_status` int(1) NOT NULL DEFAULT 1,
  `offer_item_id` int(11) NOT NULL,
  `offer_title` varchar(250) NOT NULL DEFAULT '0',
  `offer_short_title` varchar(150) NOT NULL DEFAULT '',
  `offer_price` int(11) NOT NULL DEFAULT 0,
  `offer_price_before` int(11) NOT NULL DEFAULT 0,
  `offer_price_sale` int(11) DEFAULT NULL,
  `offer_price_opt` int(11) NOT NULL DEFAULT 0,
  `offer_price_opt_vip` int(11) NOT NULL DEFAULT 0,
  `offer_price_fakt` int(11) NOT NULL DEFAULT 0,
  `offer_diam` float NOT NULL,
  `offer_weight` float NOT NULL,
  `offer_amount` int(11) NOT NULL DEFAULT 0,
  `offer_amount_nal` int(11) NOT NULL DEFAULT 0,
  `offer_amount_nal_opt` int(11) NOT NULL DEFAULT 0,
  `offer_key` varchar(250) NOT NULL DEFAULT '',
  `offer_up` int(1) NOT NULL DEFAULT 0,
  `offer_icon` int(11) NOT NULL DEFAULT 0,
  `offer_source_url` varchar(250) NOT NULL DEFAULT '',
  `offer_group` varchar(25) NOT NULL DEFAULT '',
  `offer_url` varchar(250) NOT NULL DEFAULT '',
  `offer_1c` varchar(50) NOT NULL DEFAULT '',
  `offer_sort` decimal(11,4) NOT NULL DEFAULT 0.0000,
  `offer_string` varchar(250) NOT NULL DEFAULT '',
  `offer_search` int(1) NOT NULL DEFAULT 0,
  `offer_is_decoration` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_offers`
--

INSERT INTO `shop_offers` (`offer_id`, `offer_article`, `offer_code`, `offer_status`, `offer_item_id`, `offer_title`, `offer_short_title`, `offer_price`, `offer_price_before`, `offer_price_sale`, `offer_price_opt`, `offer_price_opt_vip`, `offer_price_fakt`, `offer_diam`, `offer_weight`, `offer_amount`, `offer_amount_nal`, `offer_amount_nal_opt`, `offer_key`, `offer_up`, `offer_icon`, `offer_source_url`, `offer_group`, `offer_url`, `offer_1c`, `offer_sort`, `offer_string`, `offer_search`, `offer_is_decoration`) VALUES
(21, '', '', 1, 0, 'Открытка с пожеланиями для мужских букетов', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 27, '', '', 'otkrytka-s-pozhelanijami-dlja-muzhskih-buketov', '', '0.0000', '', 0, 1),
(22, '', '', 1, 0, 'Топпер для мужских букетов', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 28, '', '', 'topper-dlja-muzhskih-buketov', '', '0.0000', '', 0, 1),
(28, '', '', 1, 9, 'Сухофруктовый гигант с инжировым вареньем S', '', 1000, 1000, 0, 0, 0, 0, 30, 1.5, 0, 0, 0, 'S', 0, 0, '', '', 'suhofruktovyj-gigant-s-inzhirovym-varenem-s', '', '0.0000', '', 0, 0),
(46, '', '', 1, 24, 'Букет осенний', '', 1300, 1300, 0, 0, 0, 0, 23, 0, 0, 0, 0, 'М', 0, 0, '', '', 'buket-osennij', '', '0.0000', '', 0, 0),
(47, '', '', 1, 25, 'Корзина с раками', '', 5500, 5500, 0, 0, 0, 0, 35, 0, 0, 0, 0, 'L', 0, 0, '', '', 'korzina-s-rakami', '', '0.0000', '', 0, 0),
(48, '', '', 1, 26, 'Фруктовый чемоданчик', '', 3300, 3300, 0, 0, 0, 0, 35, 0, 0, 0, 0, 'L', 0, 0, '', '', 'fruktovyj-chemodanchik', '', '0.0000', '', 0, 0),
(49, '', '', 1, 27, 'Фруктово-ягодный', '', 1800, 1800, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'M', 0, 0, '', '', 'fruktovo-jagodnyj', '', '0.0000', '', 0, 0),
(50, '', '', 1, 28, 'Букет с батончиками и бананами', '', 1500, 1500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'M', 0, 0, '', '', 'buket-s-batonchikami-i-bananami', '', '0.0000', '', 0, 0),
(45, '', '', 1, 22, 'Крымская феерия S', '', 2000, 2000, 0, 0, 0, 0, 25, 1.5, 0, 0, 0, 'S', 0, 0, '', '', 'krymskaja-feerija-s', '', '0.0000', '', 0, 0),
(51, '', '', 1, 29, 'С раками и лаймом M', '', 2900, 2900, 0, 0, 0, 0, 15, 2.5, 0, 0, 0, 'M', 0, 227, '', '', 's-rakami-i-lajmom-M', '', '0.0000', '', 0, 0),
(53, '', '', 1, 30, 'Дела сердечные', '', 1300, 1300, 0, 0, 0, 0, 17, 0, 0, 0, 0, 'S', 0, 0, '', '', 'dela-serdechnye', '', '0.0000', '', 0, 0),
(54, '', '', 1, 31, 'Букет с киндерами', '', 2200, 2200, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'M', 0, 0, '', '', 'buket-s-kinderami', '', '0.0000', '', 0, 0),
(55, '', '', 1, 32, 'С батончиками', '', 1300, 1300, 0, 0, 0, 0, 22, 0, 0, 0, 0, 'M', 0, 0, '', '', 's-batonchikami', '', '0.0000', '', 0, 0),
(56, '', '', 1, 33, 'Букет \"Milkyway\"', '', 2100, 2100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'M', 0, 0, '', '', 'buket-milkyway', '', '0.0000', '', 0, 0),
(57, '', '', 1, 34, 'Шоколадное удовольствие', '', 2200, 2200, 0, 0, 0, 0, 30, 0, 0, 0, 0, 'M', 0, 0, '', '', 'shokoladnoe-udovolstvie', '', '0.0000', '', 0, 0),
(58, '', '', 1, 35, 'Фруктовый герой', '', 1900, 1900, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'M', 0, 0, '', '', 'fruktovyj-geroj', '', '0.0000', '', 0, 0),
(59, '', '', 1, 36, 'Микс', '', 2000, 2000, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'M', 0, 0, '', '', 'miks', '', '0.0000', '', 0, 0),
(60, '', '', 1, 37, 'Корзинка с сезонными фруктами', '', 0, 0, 0, 0, 0, 0, 22, 0, 0, 0, 0, 'S', 0, 0, '', '', 'korzinka-s-sezonnymi-fruktami', '', '0.0000', '', 0, 0),
(61, '', '', 1, 38, 'Рыжик M', '', 1900, 1900, 0, 0, 0, 0, 25, 2, 0, 0, 0, 'M', 0, 0, '', '', 'ryzhik-m', '', '0.0000', '', 0, 0),
(62, '', '', 1, 39, 'Зимний фруктовый M', '', 1800, 1800, 0, 0, 0, 0, 25, 2, 0, 0, 0, 'M', 0, 0, '', '', 'zimnij-fruktovyj-m', '', '0.0000', '', 0, 0),
(63, '', '', 1, 19, 'Букет девичий M', '', 1400, 1400, 0, 0, 0, 0, 22, 1, 0, 0, 0, 'M', 0, 0, '', '', 'buket-devichij-m', '', '0.0000', '', 0, 0),
(64, '', '', 1, 19, 'Букет девичий L', '', 2100, 2100, 0, 0, 0, 0, 30, 3, 0, 0, 0, 'L', 0, 0, '', '', 'buket-devichij-l', '', '0.0000', '', 0, 0),
(65, '', '', 1, 40, 'Букет девичий2 L', '', 2200, 2200, 0, 0, 0, 0, 33, 3, 0, 0, 0, 'L', 0, 0, '', '', 'buket-devichij2-l', '', '0.0000', '', 0, 0),
(66, '', '', 1, 41, 'Мужской фруктовый L', '', 2200, 2200, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'muzhskoj-fruktovyj-l', '', '0.0000', '', 0, 0),
(67, '', '', 1, 42, 'Зефирное облако L', '', 1800, 1800, 0, 0, 0, 0, 30, 1, 0, 0, 0, 'L', 0, 0, '', '', 'zefirnoe-oblako-l', '', '0.0000', '', 0, 0),
(68, '', '', 1, 43, 'Самый шоколадный L', '', 2700, 2700, 0, 0, 0, 0, 30, 1.5, 0, 0, 0, 'L', 0, 0, '', '', 'samyj-shokoladnyj-l', '', '0.0000', '', 0, 0),
(69, '', '', 1, 44, 'Ореховый комплимент M', '', 1100, 1100, 0, 0, 0, 0, 25, 2, 0, 0, 0, 'M', 0, 0, '', '', 'orehovyj-kompliment-m', '', '0.0000', '', 0, 0),
(70, '', '', 1, 45, '6 сыров L', '', 3200, 3200, 0, 0, 0, 0, 25, 3, 0, 0, 0, 'L', 0, 0, '', '', '6-syrov-l', '', '0.0000', '', 0, 0),
(71, '', '', 1, 46, 'Фруктовый романс M', '', 1300, 1300, 0, 0, 0, 0, 23, 2, 0, 0, 0, 'M', 0, 0, '', '', 'fruktovyj-romans-m', '', '0.0000', '', 0, 0),
(72, '', '', 1, 47, 'Гастрономическая корзина M', '', 2500, 2500, 0, 0, 0, 0, 32, 2, 0, 0, 0, 'M', 0, 0, '', '', 'gastronomicheskaja-korzina-m', '', '0.0000', '', 0, 0),
(73, '', '', 1, 23, 'Корзинка с медом и сухофруктами L', '', 3000, 3000, 0, 0, 0, 0, 33, 2, 0, 0, 0, 'L', 0, 0, '', '', 'korzinka-s-medom-i-suhofruktami-l', '', '0.0000', '', 0, 0),
(74, '', '', 1, 22, 'Крымская феерия L', '', 4400, 4400, 0, 0, 0, 0, 35, 2, 0, 0, 0, 'L', 0, 0, '', '', 'krymskaja-feerija-l', '', '0.0000', '', 0, 0),
(75, '', '', 1, 21, 'Изумрудный L', '', 2000, 2000, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'izumrudnyj-l', '', '0.0000', '', 0, 0),
(76, '', '', 1, 20, 'Мужской комплимент S', '', 1000, 1000, 0, 0, 0, 0, 15, 1, 0, 0, 0, 'S', 0, 0, '', '', 'muzhskoj-kompliment-s', '', '0.0000', '', 0, 0),
(77, '', '', 1, 18, 'Лукошко с сухофруктами M', '', 1700, 1700, 0, 0, 0, 0, 20, 1, 0, 0, 0, 'M', 0, 0, '', '', 'lukoshko-s-suhofruktami-m', '', '0.0000', '', 0, 0),
(78, '', '', 1, 17, 'Букет Рождественский M', '', 1500, 1500, 0, 0, 0, 0, 20, 1, 0, 0, 0, 'M', 0, 0, '', '', 'buket-rozhdestvenskij-m', '', '0.0000', '', 0, 0),
(79, '', '', 1, 16, 'Корзина с сухофруктами L', '', 3100, 3100, 0, 0, 0, 0, 33, 2.5, 0, 0, 0, 'L', 0, 0, '', '', 'korzina-s-suhofruktami-l', '', '0.0000', '', 0, 0),
(80, '', '', 1, 15, 'Сухофруктовый с конфетами L', '', 2500, 2500, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'suhofruktovyj-s-konfetami-l', '', '0.0000', '', 0, 0),
(81, '', '', 1, 14, 'Изысканный вкус L', '', 2500, 2500, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'izyskannyj-vkus-l', '', '0.0000', '', 0, 0),
(82, '', '', 1, 13, 'Прованс L', '', 2500, 2500, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'provans-l', '', '0.0000', '', 0, 0),
(83, '', '', 1, 12, 'Сухофруктовый гигант XL', '', 3000, 3000, 0, 0, 0, 0, 35, 3, 0, 0, 0, 'XL', 0, 0, '', '', 'suhofruktovyj-gigant-xl', '', '0.0000', '', 0, 0),
(84, '', '', 1, 11, 'Витаминный вихрь L', '', 2500, 2500, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'vitaminnyj-vihr-l', '', '0.0000', '', 0, 0),
(85, '', '', 1, 10, 'Мужской сухофруктовый M', '', 2000, 2000, 0, 0, 0, 0, 25, 1, 0, 0, 0, 'M', 0, 0, '', '', 'muzhskoj-suhofruktovyj-m', '', '0.0000', '', 0, 0),
(86, '', '', 1, 8, 'Сухофруктовый изыск M', '', 1800, 1800, 0, 0, 0, 0, 20, 1.5, 0, 0, 0, 'M', 0, 0, '', '', 'suhofruktovyj-izysk-m', '', '0.0000', '', 0, 0),
(87, '', '', 1, 48, 'Дамский угодник L', '', 2000, 2000, 0, 0, 0, 0, 30, 2.2, 0, 0, 0, 'L', 0, 0, '', '', '-damskij-ugodnik-l', '', '0.0000', '', 0, 0),
(88, '', '', 1, 49, 'Красный бархат L', '', 2200, 2200, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 0, '', '', 'krasnyj-barhat-l', '', '0.0000', '', 0, 0),
(89, '', '', 1, 50, 'Щелкунчик L', '', 2600, 2600, 0, 0, 0, 0, 30, 2.5, 0, 0, 0, 'L', 0, 0, '', '', 'schelkunchik-l', '', '0.0000', '', 0, 0),
(90, '', '', 1, 51, 'Конфетный гигант L', '', 2100, 2100, 0, 0, 0, 0, 40, 2, 0, 0, 0, 'L', 0, 0, '', '', 'konfetnyj-gigant-l', '', '0.0000', '', 0, 0),
(91, '', '', 1, 52, 'Букет детский M', '', 1000, 1000, 0, 0, 0, 0, 18, 1, 0, 0, 0, 'M', 0, 0, '', '', 'buket-detskij-m', '', '0.0000', '', 0, 0),
(92, '', '', 1, 53, 'Далекие грезы L', '', 6500, 6500, 0, 0, 0, 0, 30, 3, 0, 0, 0, 'L', 0, 0, '', '', 'dalekie-grezy-l', '', '0.0000', '', 0, 0),
(93, '', '', 1, 54, 'Коробочка с орешками M', '', 850, 850, 0, 0, 0, 0, 20, 1, 0, 0, 0, 'M', 0, 0, '', '', 'korobochka-s-oreshkami-m', '', '0.0000', '', 0, 0),
(94, '', '', 1, 55, 'Коробочка с орешками №2', '', 850, 850, 0, 0, 0, 0, 18, 1, 0, 0, 0, 'M', 0, 0, '', '', 'korobochka-s-oreshkami-2', '', '0.0000', '', 0, 0),
(95, '', '', 1, 56, 'Коробочка со сладостями S', '', 390, 390, 0, 0, 0, 0, 17, 1, 0, 0, 0, 'S', 0, 0, '', '', 'korobochka-so-sladostjami-s', '', '0.0000', '', 0, 0),
(96, '', '', 1, 57, 'Приятные воспоминания M', '', 1950, 1950, 0, 0, 0, 0, 20, 1, 0, 0, 0, 'M', 0, 0, '', '', 'prijatnye-vospominanija-m', '', '0.0000', '', 0, 0),
(97, '', '', 1, 58, 'Коробочка с сухофруктами M', '', 2000, 2000, 0, 0, 0, 0, 26, 1, 0, 0, 0, 'M', 0, 0, '', '', 'korobochka-s-suhofruktami-m', '', '0.0000', '', 0, 0),
(98, '', '', 1, 56, 'Коробочка со сладостями', '', 390, 390, 0, 0, 0, 0, 15, 1, 0, 0, 0, 'S', 0, 0, '', '', 'korobochka-so-sladostjami', '', '0.0000', '', 0, 0),
(99, '', '', 1, 54, 'Коробочка с орешками S', '', 850, 850, 0, 0, 0, 0, 17, 1, 0, 0, 0, 'S', 0, 0, '', '', 'korobochka-s-oreshkami-s', '', '0.0000', '', 0, 0),
(100, '', '', 1, 59, 'Чайный набор M', '', 2800, 2800, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'M', 0, 0, '', '', 'chajnyj-nabor-m', '', '0.0000', '', 0, 0),
(101, '', '', 0, 60, 'Бокс к пенному M', '', 1300, 1300, 0, 0, 0, 0, 20, 1, 0, 0, 0, 'M', 0, 0, '', '', 'boks-k-pennomu-m', '', '0.0000', '', 0, 0),
(102, '', '', 1, 61, 'Букет раковый M', '', 2900, 2900, 0, 0, 0, 0, 20, 1.2, 0, 0, 0, 'M', 0, 0, '', '', 'buket-rakovyj', '', '0.0000', '', 0, 0),
(103, '', '', 1, 62, 'Ящик с раками M', '', 3100, 3100, 0, 0, 0, 0, 20, 1.2, 0, 0, 0, 'M', 0, 0, '', '', 'jaschik-s-rakami-m', '', '0.0000', '', 0, 0),
(104, '', '', 1, 63, 'Раковый бум M', '', 2900, 2900, 0, 0, 0, 0, 20, 1.3, 0, 0, 0, 'M', 0, 0, '', '', 'rakovyj-bum-m', '', '0.0000', '', 0, 0),
(105, '', '', 1, 64, 'Усатый-полосатый M', '', 2900, 2900, 0, 0, 0, 0, 20, 1.6, 0, 0, 0, 'M', 0, 291, '', '', 'usatyj-polosatyj-m', '', '0.0000', '', 0, 0),
(106, '', '', 1, 65, 'Букет 2 в 1 M', '', 2800, 2800, 0, 0, 0, 0, 20, 1.6, 0, 0, 0, 'M', 0, 0, '', '', 'buket-2-v-1-m', '', '0.0000', '', 0, 0),
(107, '', '', 1, 66, 'Конверт с раками', '', 2900, 2900, 0, 0, 0, 0, 23, 1, 0, 0, 0, 'M', 0, 0, '', '', '-konvert-s-rakami', '', '0.0000', '', 0, 0),
(108, '', '', 1, 67, '2 кило счастья', '', 4100, 4100, 0, 0, 0, 0, 25, 2.4, 0, 0, 0, 'L', 0, 0, '', '', '2-kilo-schastja', '', '0.0000', '', 0, 0),
(109, '', '', 1, 68, 'Рак-and-рок', '', 2900, 2900, 0, 0, 0, 0, 20, 1.7, 0, 0, 0, 'M', 0, 293, '', '', 'rak-and-rok', '', '0.0000', '', 0, 0),
(110, '', '', 1, 69, 'Мужское счастье', '', 3500, 3500, 0, 0, 0, 0, 28, 2.1, 0, 0, 0, 'L', 0, 0, '', '', 'muzhskoe-schaste', '', '0.0000', '', 0, 0),
(111, '', '', 1, 70, 'Детские шалости M', '', 990, 990, 0, 0, 0, 0, 20, 1.3, 0, 0, 0, 'M', 0, 0, '', '', 'detskie-shalosti-m', '', '0.0000', '', 0, 0),
(112, '', '', 1, 71, 'Букет ягодный 1', '', 3200, 3200, 0, 0, 0, 0, 30, 1.3, 0, 0, 0, 'M', 0, 0, '', '', 'buket-jagodnyj-1', '', '0.0000', '', 0, 0),
(113, '', '', 1, 72, 'Витаминная бомба', '', 3100, 3100, 0, 0, 0, 0, 20, 1.5, 0, 0, 0, 'M', 0, 0, '', '', 'vitaminnaja-bomba', '', '0.0000', '', 0, 0),
(114, '', '', 1, 73, 'Букет с клубникой M', '', 2200, 2200, 0, 0, 0, 0, 23, 1, 0, 0, 0, 'M', 0, 0, '', '', 'buket-s-klubnikoj-m', '', '0.0000', '', 0, 0),
(115, '', '', 1, 74, 'Букет с клубникой 2', '', 3400, 3400, 0, 0, 0, 0, 30, 1.6, 0, 0, 0, 'L', 0, 0, '', '', 'buket-s-klubnikoj-2', '', '0.0000', '', 0, 0),
(116, '', '', 1, 75, 'Букет ягодный 2', '', 3600, 3600, 0, 0, 0, 0, 22, 1.9, 0, 0, 0, 'M', 0, 0, '', '', 'buket-jagodnyj-2', '', '0.0000', '', 0, 0),
(117, '', '', 1, 76, 'Малиновый романс', '', 3800, 3800, 0, 0, 0, 0, 33, 1.7, 0, 0, 0, 'L', 0, 0, '', '', 'malinovyj-romans', '', '0.0000', '', 0, 0),
(118, '', '', 1, 77, 'Космос', '', 1200, 1200, 0, 0, 0, 0, 30, 1.1, 0, 0, 0, 'L', 0, 0, '', '', 'kosmos', '', '0.0000', '', 0, 0),
(119, '', '', 1, 78, 'Букет с клубникой 3', '', 3400, 3400, 0, 0, 0, 0, 30, 1.6, 0, 0, 0, 'L', 0, 0, '', '', 'buket-s-klubnikoj-3', '', '0.0000', '', 0, 0),
(120, '', '', 1, 79, 'Клубничный с конфетами', '', 3200, 3200, 0, 0, 0, 0, 30, 1, 0, 0, 0, 'L', 0, 0, '', '', 'klubnichnyj-s-konfetami', '', '0.0000', '', 0, 0),
(121, '', '', 1, 80, 'Ореховый бокс', '', 2700, 2700, 0, 0, 0, 0, 25, 2.5, 0, 0, 0, 'L', 0, 0, '', '', 'orehovyj-boks', '', '0.0000', '', 0, 0),
(122, '', '', 1, 81, 'Крепкий орешек L', '', 2700, 2700, 0, 0, 0, 0, 30, 2.3, 0, 0, 0, 'L', 0, 0, '', '', 'krepkij-oreshek-l', '', '0.0000', '', 0, 0),
(123, '', '', 1, 82, 'Чайный бокс', '', 5300, 5300, 0, 0, 0, 0, 25, 3.4, 0, 0, 0, 'L', 0, 0, '', '', 'chajnyj-boks', '', '0.0000', '', 0, 0),
(124, '', '', 1, 83, 'Кофейный бокс', '', 3100, 3100, 0, 0, 0, 0, 23, 2, 0, 0, 0, 'M', 0, 0, '', '', 'kofejnyj-boks', '', '0.0000', '', 0, 0),
(125, '', '', 1, 84, 'Новогодний бокс', '', 2500, 2500, 0, 0, 0, 0, 23, 3, 0, 0, 0, 'L', 0, 0, '', '', 'novogodnij-boks', '', '0.0000', '', 0, 0),
(126, '', '', 1, 85, 'Новогодний бокс 2', '', 3200, 3200, 0, 0, 0, 0, 23, 3, 0, 0, 0, 'L', 0, 0, '', '', 'novogodnij-boks-2', '', '0.0000', '', 0, 0),
(127, '', '', 1, 86, 'Новогодний бокс 3', '', 2500, 2500, 0, 0, 0, 0, 23, 2.5, 0, 0, 0, 'L', 0, 0, '', '', 'novogodnij-boks-3', '', '0.0000', '', 0, 0),
(128, '', '', 1, 87, 'Рассказы Шахерезады L', '', 3000, 3000, 0, 0, 0, 0, 33, 2.5, 0, 0, 0, 'L', 0, 0, '', '', 'rasskazy-shaherezady-l', '', '0.0000', '', 0, 0),
(129, '', '', 1, 88, 'Сладкая жизнь L', '', 2000, 2000, 0, 0, 0, 0, 28, 1, 0, 0, 0, 'L', 0, 233, '', '', 'sladkaja-zhizn-l', '', '0.0000', '', 0, 0),
(130, '', '', 1, 89, 'Орешник L', '', 2100, 2100, 0, 0, 0, 0, 26, 1.5, 0, 0, 0, 'L', 0, 235, '', '', 'oreshnik-l', '', '0.0000', '', 0, 0),
(131, '', '', 1, 90, 'Козырная карта L', '', 4200, 4200, 0, 0, 0, 0, 33, 3, 0, 0, 0, 'L', 0, 240, '', '', 'kozyrnaja-karta-l', '', '0.0000', '', 0, 0),
(132, '', '', 1, 91, 'Ход конем S', '', 1200, 1200, 0, 0, 0, 0, 18, 1, 0, 0, 0, 'S', 0, 242, '', '', 'hod-konem-s', '', '0.0000', '', 0, 0),
(133, '', '', 1, 92, 'Прямо в цель S', '', 1100, 1100, 0, 0, 0, 0, 17, 1.3, 0, 0, 0, 'S', 0, 259, '', '', 'prjamo-v-cel-s', '', '0.0000', '', 0, 0),
(134, '', '', 1, 93, 'Конверт \"Хрустящий\" S', '', 1300, 1300, 0, 0, 0, 0, 25, 1, 0, 0, 0, 'S', 0, 245, '', '', 'konvert-hrustjaschij-s', '', '0.0000', '', 0, 0),
(135, '', '', 1, 94, 'Импозантный конверт M', '', 2000, 2000, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'M', 0, 247, '', '', 'impozantnyj-konvert-m', '', '0.0000', '', 0, 0),
(136, '', '', 1, 95, 'Илья Муромец M', '', 2300, 2300, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'M', 0, 249, '', '', 'ilja-muromec-m', '', '0.0000', '', 0, 0),
(137, '', '', 1, 96, 'Силушка богатырская L', '', 2750, 2750, 0, 0, 0, 0, 35, 3, 0, 0, 0, 'L', 0, 262, '', '', 'silushka-bogatyrskaja-l', '', '0.0000', '', 0, 0),
(138, '', '', 1, 97, 'Корзина \"Мужские радости\"', '', 3000, 3000, 0, 0, 0, 0, 30, 2, 0, 0, 0, 'L', 0, 255, '', '', 'korzina-muzhskie-radosti', '', '0.0000', '', 0, 0),
(139, '', '', 1, 98, 'Мясной барон L', '', 3200, 3200, 0, 0, 0, 0, 32, 3.2, 0, 0, 0, 'L', 0, 260, '', '', 'mjasnoj-baron-l', '', '0.0000', '', 0, 0),
(140, '', '', 1, 99, 'Корзина \"Море удовольствия\"', '', 5800, 5800, 0, 0, 0, 0, 35, 3.5, 0, 0, 0, 'L', 0, 0, '', '', 'korzina-more-udovolstvija', '', '0.0000', '', 0, 0),
(141, '', '', 1, 100, 'Фаворит', '', 2300, 2300, 0, 0, 0, 0, 28, 2.5, 0, 0, 0, 'L', 0, 288, '', '', 'favorit', '', '0.0000', '', 0, 0),
(142, '', '', 1, 101, 'Крепыш', '', 600, 600, 0, 0, 0, 0, 10, 1, 0, 0, 0, 'S', 0, 271, '', '', 'krepysh', '', '0.0000', '', 0, 0),
(143, '', '', 1, 102, 'Букет с перчинкой', '', 1900, 1900, 0, 0, 0, 0, 30, 1.5, 0, 0, 0, 'M', 0, 272, '', '', 'buket-s-perchinkoj', '', '0.0000', '', 0, 0),
(144, '', '', 1, 103, 'Морской царь', '', 1600, 1600, 0, 0, 0, 0, 28, 2, 0, 0, 0, 'M', 0, 270, '', '', 'morskoj-car', '', '0.0000', '', 0, 0),
(145, '', '', 1, 104, 'Хрустящий гигант', '', 2400, 2400, 0, 0, 0, 0, 35, 2.5, 0, 0, 0, 'L', 0, 274, '', '', 'hrustjaschij-gigant', '', '0.0000', '', 0, 0),
(146, '', '', 1, 105, 'Бокал закусочный', '', 900, 900, 0, 0, 0, 0, 15, 1.2, 0, 0, 0, 'M', 0, 276, '', '', 'bokal-zakusochnyj', '', '0.0000', '', 0, 0),
(147, '', '', 1, 106, 'Козырный туз', '', 6100, 6100, 0, 0, 0, 0, 35, 5, 0, 0, 0, 'L', 0, 282, '', '', 'kozyrnyj-tuz', '', '0.0000', '', 0, 0),
(148, '', '', 1, 107, 'Корзина \"Искры счастья\"', '', 3000, 3000, 0, 0, 0, 0, 30, 2.5, 0, 0, 0, 'L', 0, 305, '', '', 'korzina-iskry-schastja', '', '0.0000', '', 0, 0),
(149, '', '', 1, 108, 'Фруктовая корзина \"Нежные чувства\"', '', 4000, 4000, 0, 0, 0, 0, 38, 4, 0, 0, 0, 'XL', 0, 310, '', '', 'fruktoФруктовая корзина \"Нежные чувства\"vaja-korzina-nezhnye-chuvstva', '', '0.0000', '', 0, 0),
(150, '', '', 1, 109, 'Любовные истории', '', 1300, 1300, 0, 0, 0, 0, 20, 1, 0, 0, 0, 'S', 0, 313, '', '', 'ljubovnye-istorii', '', '0.0000', '', 0, 0),
(151, '', '', 1, 110, 'Сытый кум', '', 2600, 2600, 0, 0, 0, 0, 25, 1, 0, 0, 0, 'L', 0, 321, '', '', 'sytyj-kum', '', '0.0000', '', 0, 0),
(152, '', '', 1, 111, 'Морские баталии', '', 1800, 1800, 0, 0, 0, 0, 25, 1, 0, 0, 0, 'M', 0, 325, '', '', 'morskie-batalii', '', '0.0000', '', 0, 0),
(153, '', '', 1, 112, 'Конверт \"Козырная карта\"', '', 2100, 2100, 0, 0, 0, 0, 25, 1.7, 0, 0, 0, 'M', 0, 327, '', '', 'konvert-kozyrnaja-karta', '', '0.0000', '', 0, 0),
(154, '', '', 1, 113, 'Мужской восторг', '', 2500, 2500, 0, 0, 0, 0, 25, 1, 0, 0, 0, 'M', 0, 329, '', '', 'muzhskoj-vostorg', '', '0.0000', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_offers_filters`
--

CREATE TABLE `shop_offers_filters` (
  `sif_id` int(11) NOT NULL,
  `sif_offer_id` int(11) NOT NULL,
  `sif_sprav_id` int(11) NOT NULL DEFAULT 0,
  `sif_svid` int(11) NOT NULL,
  `sif_value` varchar(255) NOT NULL DEFAULT '',
  `sif_price` int(11) NOT NULL DEFAULT 0,
  `sif_up` int(1) NOT NULL DEFAULT 0,
  `sif_auto` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_offers_filters`
--

INSERT INTO `shop_offers_filters` (`sif_id`, `sif_offer_id`, `sif_sprav_id`, `sif_svid`, `sif_value`, `sif_price`, `sif_up`, `sif_auto`) VALUES
(1, 6, 1, 2, '', 0, 0, 0),
(2, 1, 1, 2, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_orders`
--

CREATE TABLE `shop_orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_user_lastname` varchar(100) DEFAULT NULL,
  `order_user_name` varchar(100) NOT NULL,
  `order_user_phone` varchar(50) NOT NULL DEFAULT '',
  `order_user_email` varchar(100) NOT NULL DEFAULT '',
  `order_time` int(11) NOT NULL,
  `order_reserv_time` int(11) NOT NULL DEFAULT 0,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_group_id` int(2) NOT NULL DEFAULT 2,
  `order_comment` varchar(2000) NOT NULL DEFAULT '',
  `order_note` varchar(500) DEFAULT NULL,
  `order_delivery` varchar(50) NOT NULL,
  `order_delivery_city` varchar(150) NOT NULL DEFAULT '',
  `order_delivery_city_id` int(11) NOT NULL DEFAULT 0,
  `order_delivery_cost` int(11) NOT NULL DEFAULT 0,
  `order_delivery_addr` varchar(250) NOT NULL DEFAULT '',
  `order_delivery_time` varchar(50) NOT NULL DEFAULT '',
  `order_delivery_fast` int(1) NOT NULL DEFAULT 0,
  `order_payment` varchar(50) NOT NULL,
  `order_payment_time` int(11) NOT NULL DEFAULT 0,
  `order_payment_status` int(1) NOT NULL DEFAULT 0,
  `order_payment_invoiceId` varchar(100) NOT NULL DEFAULT '',
  `order_payment_date` varchar(30) NOT NULL DEFAULT '',
  `order_payment_type` varchar(10) NOT NULL DEFAULT '',
  `order_ya_comment` int(1) NOT NULL DEFAULT 0,
  `order_items_cost` decimal(11,2) NOT NULL DEFAULT 0.00,
  `order_total_cost` decimal(11,2) NOT NULL DEFAULT 0.00,
  `order_key` varchar(32) NOT NULL DEFAULT '',
  `order_del_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_orders_history`
--

CREATE TABLE `shop_orders_history` (
  `h_id` int(11) NOT NULL,
  `h_order_id` int(11) NOT NULL,
  `h_order_status_id` int(11) NOT NULL,
  `h_notify` int(1) NOT NULL DEFAULT 0,
  `h_comment` varchar(250) NOT NULL DEFAULT '',
  `h_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_parts`
--

CREATE TABLE `shop_parts` (
  `part_id` int(11) NOT NULL,
  `part_cat_id` int(11) NOT NULL,
  `part_title` varchar(250) NOT NULL,
  `part_short_title` varchar(100) NOT NULL DEFAULT '',
  `part_status` int(1) NOT NULL DEFAULT 1,
  `part_url` varchar(250) NOT NULL,
  `part_text_id` int(11) NOT NULL DEFAULT 0,
  `part_head_title` varchar(250) NOT NULL DEFAULT '',
  `part_head_desc` varchar(250) NOT NULL DEFAULT '',
  `part_head_keywords` varchar(250) NOT NULL DEFAULT '',
  `part_sort` int(3) NOT NULL DEFAULT 999
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_parts`
--

INSERT INTO `shop_parts` (`part_id`, `part_cat_id`, `part_title`, `part_short_title`, `part_status`, `part_url`, `part_text_id`, `part_head_title`, `part_head_desc`, `part_head_keywords`, `part_sort`) VALUES
(1, 1, 'Папе', 'Папе', 0, 'father', 0, '', '', '', 999),
(2, 1, '23 февраля', '23 февраля', 0, '23-fevralja', 0, '', '', '', 999);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_popular_blocks_items`
--

CREATE TABLE `shop_popular_blocks_items` (
  `pbi_id` int(11) NOT NULL,
  `pbi_item_id` int(11) NOT NULL,
  `pbi_sort` int(2) NOT NULL DEFAULT 99,
  `pbi_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop_popular_blocks_items`
--

INSERT INTO `shop_popular_blocks_items` (`pbi_id`, `pbi_item_id`, `pbi_sort`, `pbi_type`) VALUES
(1, 2, 99, 'recommended'),
(2, 1, 99, 'new'),
(3, 1, 99, 'recommended');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_reviews`
--

CREATE TABLE `shop_reviews` (
  `review_id` int(11) NOT NULL,
  `review_uname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_uemail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_comment` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_admin_comment` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_item_id` int(10) NOT NULL,
  `review_rating` float NOT NULL,
  `review_icon` int(10) NOT NULL DEFAULT 0,
  `review_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `review_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop_reviews`
--

INSERT INTO `shop_reviews` (`review_id`, `review_uname`, `review_uemail`, `review_comment`, `review_admin_comment`, `review_item_id`, `review_rating`, `review_icon`, `review_time`, `review_status`) VALUES
(1, 'Ирина', 'irina@ne.olga', 'Спасибо за неординарное оформление подарочной корзины, маленькое художественное произведение. Вы большой профессионал своего дела. Удачи Вам и большого количества заказчиков!', 'Рады что вам понравилось', 2, 4, 0, '2020-12-22 07:46:02', 1),
(3, 'Ольга', '', 'Большое спасибо!!!Заказ выполнен с любовью, вовремя!Обязательно еще раз обращусь и порекомендую!!!!!', 'Рады что вам понравилось', 0, 5, 0, '2020-12-22 07:46:02', 1),
(4, 'Ариф Сеттаров', 'settarov.a.i15@gmail.com', 'Отличный букет. Спасибо большое', NULL, 2, 5, 34, '2020-12-25 13:11:20', 0),
(5, 'Ирина', '', 'Спасибо большое за оперативно принятый заказ и очень крутое исполнение! Заказывали накануне 23 февраля, решили отойти от стандартных букетов с колбасками и орешками, а тут такие красивые букеты раков. Вобщем готовы были услышать, что раков нет, заказывать заранее и т.д. Но нет, все приняли и исполнили, букет огонь! Очень красиво и очень вкусно! Спасибо, будем рекомендовать вас!', NULL, 61, 5, 0, '2021-02-23 09:14:47', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_vendors`
--

CREATE TABLE `shop_vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor_pop` int(1) NOT NULL DEFAULT 0,
  `vendor_new` int(1) NOT NULL DEFAULT 0,
  `vendor_minus` int(1) NOT NULL DEFAULT 0,
  `vendor_status` int(1) NOT NULL DEFAULT 1,
  `vendor_name` varchar(150) NOT NULL,
  `vendor_url` varchar(150) NOT NULL,
  `vendor_icon` int(11) NOT NULL DEFAULT 0,
  `vendor_bg` int(11) NOT NULL DEFAULT 0,
  `vendor_meta_title` varchar(255) NOT NULL DEFAULT '',
  `vendor_meta_keywords` varchar(255) NOT NULL DEFAULT '',
  `vendor_meta_desc` varchar(255) NOT NULL DEFAULT '',
  `vendor_text_id` int(1) NOT NULL DEFAULT 0,
  `vendor_letter` varchar(1) NOT NULL,
  `vendor_alias` varchar(250) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_vendors`
--

INSERT INTO `shop_vendors` (`vendor_id`, `vendor_pop`, `vendor_new`, `vendor_minus`, `vendor_status`, `vendor_name`, `vendor_url`, `vendor_icon`, `vendor_bg`, `vendor_meta_title`, `vendor_meta_keywords`, `vendor_meta_desc`, `vendor_text_id`, `vendor_letter`, `vendor_alias`) VALUES
(2, 0, 0, 0, 1, 'Arbonia', 'arbonia', 59, 0, '', '', '', 14, 'A', ''),
(5, 0, 0, 0, 1, 'Aura Technology', 'aura-technology', 75, 0, '', '', '', 0, 'A', ''),
(6, 0, 0, 0, 1, 'Caleo', 'caleo', 76, 0, '', '', '', 0, 'C', ''),
(7, 0, 0, 0, 1, 'Carisa', 'carisa', 77, 0, '', '', '', 0, 'C', ''),
(8, 0, 0, 0, 1, 'Devi', 'devi', 78, 0, '', '', '', 0, 'D', ''),
(9, 0, 0, 0, 1, 'Electrolux', 'electrolux', 79, 0, '', '', '', 0, 'E', ''),
(10, 0, 0, 0, 1, 'EvaSystems', 'evasystems', 80, 0, '', '', '', 0, 'E', '');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_vendors_filters`
--

CREATE TABLE `shop_vendors_filters` (
  `svf_id` int(11) NOT NULL,
  `svf_item_id` int(11) NOT NULL,
  `svf_sprav_id` int(11) NOT NULL DEFAULT 0,
  `svf_svid` int(11) NOT NULL,
  `svf_value` varchar(255) NOT NULL DEFAULT '',
  `svf_price` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_vendors_filters`
--

INSERT INTO `shop_vendors_filters` (`svf_id`, `svf_item_id`, `svf_sprav_id`, `svf_svid`, `svf_value`, `svf_price`) VALUES
(1, 2, 6, 17, '', 0),
(16, 10, 6, 24, '', 0),
(3, 3, 6, 17, '', 0),
(4, 3, 6, 24, '', 0),
(5, 5, 6, 17, '', 0),
(6, 5, 6, 24, '', 0),
(7, 6, 6, 22, '', 0),
(8, 6, 6, 24, '', 0),
(14, 7, 6, 17, '', 0),
(13, 8, 6, 18, '', 0),
(12, 9, 6, 29, '', 0),
(15, 7, 6, 24, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_salt` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_active` int(1) NOT NULL DEFAULT 0,
  `user_regtime` int(11) NOT NULL,
  `user_oauth` varchar(150) NOT NULL DEFAULT '',
  `user_role_id` int(2) NOT NULL DEFAULT 1,
  `user_manager_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_salt`, `user_email`, `user_active`, `user_regtime`, `user_oauth`, `user_role_id`, `user_manager_id`) VALUES
(10117, 'arif@tigerweb.ru', 'f772e081227f18c67bbfe586eb4b6485f871152c', 'W$9+n@M4hd', 'arif.settarov@mail.ru', 1, 1606734806, '', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_delivery`
--

CREATE TABLE `users_delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_user_id` int(11) NOT NULL,
  `delivery_to_name` varchar(150) NOT NULL DEFAULT '',
  `delivery_type` varchar(15) NOT NULL DEFAULT '',
  `delivery_city` int(11) NOT NULL DEFAULT 0,
  `delivery_addr` varchar(250) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_hashes`
--

CREATE TABLE `users_hashes` (
  `id` int(11) NOT NULL,
  `hash` varchar(32) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_profile`
--

CREATE TABLE `users_profile` (
  `profile_user_id` int(11) NOT NULL,
  `profile_name` varchar(75) NOT NULL DEFAULT '',
  `profile_lastname` varchar(100) NOT NULL DEFAULT '',
  `profile_phone` varchar(30) NOT NULL DEFAULT '',
  `profile_payment` varchar(100) NOT NULL DEFAULT '',
  `profile_bonus` int(11) NOT NULL DEFAULT 0,
  `profile_subscribed` int(1) NOT NULL DEFAULT 0,
  `profile_notify` int(1) NOT NULL DEFAULT 0,
  `profile_company` varchar(250) NOT NULL DEFAULT '',
  `profile_city` varchar(100) NOT NULL DEFAULT '',
  `profile_inn` varchar(50) NOT NULL DEFAULT '',
  `profile_site` varchar(50) NOT NULL DEFAULT '',
  `profile_bank` varchar(50) NOT NULL DEFAULT '',
  `profile_bik` varchar(50) NOT NULL DEFAULT '',
  `profile_bank_account` varchar(50) NOT NULL DEFAULT '',
  `profile_corr_account` varchar(50) NOT NULL DEFAULT '',
  `profile_kpp` varchar(50) NOT NULL DEFAULT '',
  `profile_ogrn` varchar(50) NOT NULL DEFAULT '',
  `profile_balance` int(11) NOT NULL DEFAULT 0,
  `profile_timeout` int(11) NOT NULL DEFAULT 0,
  `profile_credit` int(11) NOT NULL DEFAULT 0,
  `profile_discount` int(3) NOT NULL DEFAULT 0,
  `profile_discounts` varchar(2000) NOT NULL DEFAULT '',
  `profile_price_id` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_profile`
--

INSERT INTO `users_profile` (`profile_user_id`, `profile_name`, `profile_lastname`, `profile_phone`, `profile_payment`, `profile_bonus`, `profile_subscribed`, `profile_notify`, `profile_company`, `profile_city`, `profile_inn`, `profile_site`, `profile_bank`, `profile_bik`, `profile_bank_account`, `profile_corr_account`, `profile_kpp`, `profile_ogrn`, `profile_balance`, `profile_timeout`, `profile_credit`, `profile_discount`, `profile_discounts`, `profile_price_id`) VALUES
(10122, 'Администратор', 'Администратор', '+7978134567', '', 0, 0, 0, 'TheSmak', 'Симферополь', '1345', 'thesmak.ru', '', '', '', '', '', '', 0, 0, 0, 0, '', 1),
(10123, 'Администратор', 'Администратор', '+7978134567', '', 0, 0, 0, 'TheSmak', 'Симферополь', '1345', 'thesmak.ru', '', '', '', '', '', '', 0, 0, 0, 0, '', 1),
(10124, 'Наталья', 'Андреева', '', '', 0, 0, 0, 'TigerWeb', 'Симферополь', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_session`
--

CREATE TABLE `users_session` (
  `sessionhash` varchar(64) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `host` varchar(15) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_session`
--

INSERT INTO `users_session` (`sessionhash`, `user_hash`, `user_id`, `last_activity`, `host`) VALUES
('de4051c6a8a43a65317ebe27f85c168c', 'e4a915e2c52e2acf012bae9f6c4d34f5', 0, 1639314798, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `users_strikes`
--

CREATE TABLE `users_strikes` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_strikes`
--

INSERT INTO `users_strikes` (`id`, `login`, `ip`, `time`) VALUES
(1, '', '185.205.239.157', 1610455994),
(2, '', '31.40.143.160', 1610977934),
(3, '', '31.40.143.160', 1610978013),
(4, '', '127.0.0.1', 1635759619),
(5, '', '127.0.0.1', 1635759625);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `content_items`
--
ALTER TABLE `content_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_id_2` (`content_id`,`item_id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `sort` (`sort`);

--
-- Индексы таблицы `core_comments`
--
ALTER TABLE `core_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `status` (`comment_status`),
  ADD KEY `comment_object_name` (`comment_object_name`),
  ADD KEY `comment_time` (`comment_time`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_object_id` (`comment_object_id`),
  ADD KEY `comment_object_name_2` (`comment_object_name`,`comment_object_id`);

--
-- Индексы таблицы `core_content`
--
ALTER TABLE `core_content`
  ADD PRIMARY KEY (`content_id`),
  ADD UNIQUE KEY `url` (`content_url`),
  ADD KEY `content_type` (`content_type`),
  ADD KEY `content_thumb_id` (`content_thumb_id`),
  ADD KEY `content_status` (`content_status`),
  ADD KEY `content_cat` (`content_cat`),
  ADD KEY `content_date` (`content_date`),
  ADD KEY `content_thumb_id3` (`content_thumb_id3`),
  ADD KEY `content_time` (`content_time`),
  ADD KEY `content_vendor_id` (`content_vendor_id`),
  ADD KEY `content_time_end` (`content_time_end`),
  ADD KEY `content_sort` (`content_sort`);
ALTER TABLE `core_content` ADD FULLTEXT KEY `content_date_2` (`content_date`);

--
-- Индексы таблицы `core_content_views`
--
ALTER TABLE `core_content_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_item_id` (`count`);

--
-- Индексы таблицы `core_files`
--
ALTER TABLE `core_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `module` (`file_module`),
  ADD KEY `user_id` (`file_user_id`);

--
-- Индексы таблицы `core_files_ids`
--
ALTER TABLE `core_files_ids`
  ADD KEY `sort` (`sort`),
  ADD KEY `object` (`object`),
  ADD KEY `object_2` (`object`,`item_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Индексы таблицы `core_lang`
--
ALTER TABLE `core_lang`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `core_log_errors`
--
ALTER TABLE `core_log_errors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority` (`priority`),
  ADD KEY `type` (`type`),
  ADD KEY `error_code` (`error_code`);

--
-- Индексы таблицы `core_options`
--
ALTER TABLE `core_options`
  ADD PRIMARY KEY (`option_name`);

--
-- Индексы таблицы `core_routes`
--
ALTER TABLE `core_routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regexp_value` (`regexp_value`),
  ADD KEY `controller` (`module`),
  ADD KEY `sort` (`sort`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `level` (`level`);

--
-- Индексы таблицы `core_search`
--
ALTER TABLE `core_search`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `search_user_id` (`search_user_session`),
  ADD KEY `search_thread_id` (`search_thread_id`),
  ADD KEY `search_thead_id_2` (`search_user_session`,`search_thread_id`) USING BTREE;

--
-- Индексы таблицы `core_seo`
--
ALTER TABLE `core_seo`
  ADD PRIMARY KEY (`seo_id`),
  ADD UNIQUE KEY `seo_url` (`seo_url`),
  ADD KEY `set_text_id` (`seo_text_id`),
  ADD KEY `seo_icon` (`seo_icon`);

--
-- Индексы таблицы `core_settings_fields`
--
ALTER TABLE `core_settings_fields`
  ADD PRIMARY KEY (`cs_id`),
  ADD UNIQUE KEY `cs_group_id_3` (`cs_group_id`,`cs_title`,`cs_parent_id`),
  ADD UNIQUE KEY `cs_key` (`cs_key`,`cs_group_id`) USING BTREE,
  ADD KEY `cs_group_id` (`cs_group_id`),
  ADD KEY `cs_sort` (`cs_sort`),
  ADD KEY `cs_status` (`cs_status`),
  ADD KEY `cs_visible` (`cs_visible`),
  ADD KEY `cs_parent_id` (`cs_parent_id`),
  ADD KEY `cs_level` (`cs_level`);

--
-- Индексы таблицы `core_settings_groups`
--
ALTER TABLE `core_settings_groups`
  ADD PRIMARY KEY (`cs_group_id`),
  ADD UNIQUE KEY `cs_group_name` (`cs_group_name`),
  ADD UNIQUE KEY `cs_group_key` (`cs_group_key`),
  ADD KEY `cs_group_sort` (`cs_group_sort`),
  ADD KEY `cs_group_status` (`cs_group_status`);

--
-- Индексы таблицы `core_settings_values`
--
ALTER TABLE `core_settings_values`
  ADD UNIQUE KEY `cs_line_3` (`cs_line`,`cs_id`),
  ADD KEY `cs_id` (`cs_id`),
  ADD KEY `csv_status` (`csv_status`),
  ADD KEY `cs_line` (`cs_line`),
  ADD KEY `cs_sort` (`cs_sort`);

--
-- Индексы таблицы `core_sprav`
--
ALTER TABLE `core_sprav`
  ADD PRIMARY KEY (`sprav_id`),
  ADD UNIQUE KEY `sprav_title` (`sprav_title`),
  ADD UNIQUE KEY `sprav_name` (`sprav_name`),
  ADD KEY `sprav_status` (`sprav_status`),
  ADD KEY `sprav_filter` (`sprav_filter`),
  ADD KEY `sprav_option` (`sprav_option`),
  ADD KEY `sprav_object_id` (`sprav_object_id`),
  ADD KEY `sprav_main` (`sprav_main`),
  ADD KEY `sprav_top` (`sprav_top`),
  ADD KEY `sprav_sort` (`sprav_sort`);

--
-- Индексы таблицы `core_sprav_values`
--
ALTER TABLE `core_sprav_values`
  ADD PRIMARY KEY (`svid`),
  ADD KEY `sprav_id` (`sprav_id`),
  ADD KEY `sprav_value` (`svid_title`),
  ADD KEY `svid_status` (`svid_status`),
  ADD KEY `svid_name` (`svid_eng`),
  ADD KEY `svid_image` (`svid_icon`),
  ADD KEY `svid_syn_id` (`svid_syn_id`);

--
-- Индексы таблицы `core_text`
--
ALTER TABLE `core_text`
  ADD PRIMARY KEY (`text_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `content_id` (`content_id`);

--
-- Индексы таблицы `news_cats`
--
ALTER TABLE `news_cats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `sort` (`sort`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `pages_stat`
--
ALTER TABLE `pages_stat`
  ADD PRIMARY KEY (`stat_id`);

--
-- Индексы таблицы `shop_bills`
--
ALTER TABLE `shop_bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD UNIQUE KEY `bill_order_id` (`bill_order_id`);

--
-- Индексы таблицы `shop_callbacks`
--
ALTER TABLE `shop_callbacks`
  ADD PRIMARY KEY (`callback_id`);

--
-- Индексы таблицы `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `sort` (`cat_sort`),
  ADD KEY `parent` (`cat_parent_id`),
  ADD KEY `status` (`cat_status`),
  ADD KEY `cat_icon` (`cat_icon`),
  ADD KEY `cat_title` (`cat_title`),
  ADD KEY `cat_short_title` (`cat_short_title`),
  ADD KEY `cat_top` (`cat_top`),
  ADD KEY `cat_new` (`cat_new`);

--
-- Индексы таблицы `shop_categories_also`
--
ALTER TABLE `shop_categories_also`
  ADD UNIQUE KEY `cat_id` (`sca_cat_id`,`sca_also_id`),
  ADD KEY `cat_id_2` (`sca_cat_id`),
  ADD KEY `also_cat_id` (`sca_also_id`);

--
-- Индексы таблицы `shop_categories_filters`
--
ALTER TABLE `shop_categories_filters`
  ADD UNIQUE KEY `scf_category_id_2` (`scf_category_id`,`scf_sprav_id`),
  ADD KEY `scf_category_id` (`scf_category_id`),
  ADD KEY `scf_sprav_id` (`scf_sprav_id`),
  ADD KEY `scf_sort` (`scf_sort`);

--
-- Индексы таблицы `shop_complectation`
--
ALTER TABLE `shop_complectation`
  ADD PRIMARY KEY (`comp_id`);

--
-- Индексы таблицы `shop_delivery_cities`
--
ALTER TABLE `shop_delivery_cities`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `city_vendor_id_2` (`city_url`),
  ADD KEY `city_status` (`city_status`),
  ADD KEY `city_text_id` (`city_text_id`),
  ADD KEY `city_icon` (`city_icon`),
  ADD KEY `city_cat` (`city_cat`),
  ADD KEY `city_show` (`city_show`),
  ADD KEY `city_related` (`city_related`),
  ADD KEY `city_group_id` (`city_group_id`);

--
-- Индексы таблицы `shop_faqs`
--
ALTER TABLE `shop_faqs`
  ADD PRIMARY KEY (`faqs_id`);

--
-- Индексы таблицы `shop_faqs_items`
--
ALTER TABLE `shop_faqs_items`
  ADD PRIMARY KEY (`fitem_id`);

--
-- Индексы таблицы `shop_items`
--
ALTER TABLE `shop_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `views` (`item_views`),
  ADD KEY `status` (`item_status`),
  ADD KEY `cat_id` (`item_cat_id`),
  ADD KEY `item_sale` (`item_sale`),
  ADD KEY `item_new` (`item_new`),
  ADD KEY `item_hit` (`item_hit`),
  ADD KEY `item_rate` (`item_rate`),
  ADD KEY `item_price` (`item_price`),
  ADD KEY `item_title` (`item_title`),
  ADD KEY `item_vendor` (`item_vendor_id`),
  ADD KEY `item_icon` (`item_icon`),
  ADD KEY `item_badge` (`item_badge`),
  ADD KEY `item_url` (`item_url`),
  ADD KEY `item_icon_back2` (`item_icon_back`),
  ADD KEY `item_amount` (`item_amount`),
  ADD KEY `item_sort` (`item_sort`),
  ADD KEY `item_video_id` (`item_video_id`),
  ADD KEY `item_time` (`item_time`),
  ADD KEY `item_parent_id` (`item_parent_id`),
  ADD KEY `item_has_child` (`item_has_child`),
  ADD KEY `item_vendor_id` (`item_vendor_id`,`item_title`),
  ADD KEY `item_vendor_id_2` (`item_vendor_id`,`item_url`),
  ADD KEY `item_source_url` (`item_source_url`),
  ADD KEY `item_cat_id` (`item_cat_id`,`item_status`,`item_has_child`),
  ADD KEY `item_amount_nal` (`item_amount_nal`),
  ADD KEY `item_amount_nal_opt` (`item_amount_nal_opt`),
  ADD KEY `item_price_opt_vip` (`item_price_opt_vip`),
  ADD KEY `item_price_fakt` (`item_price_fakt`);

--
-- Индексы таблицы `shop_items_also`
--
ALTER TABLE `shop_items_also`
  ADD UNIQUE KEY `item_id_2` (`item_id`,`item_related_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `item_related_id` (`item_related_id`),
  ADD KEY `sort` (`sort`);

--
-- Индексы таблицы `shop_items_cat`
--
ALTER TABLE `shop_items_cat`
  ADD UNIQUE KEY `item_id_2` (`item_id`,`cat_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `item_related_id` (`cat_id`),
  ADD KEY `sort` (`sort`);

--
-- Индексы таблицы `shop_items_filters`
--
ALTER TABLE `shop_items_filters`
  ADD PRIMARY KEY (`sif_id`),
  ADD UNIQUE KEY `sif_item_id` (`sif_item_id`,`sif_sprav_id`,`sif_svid`),
  ADD KEY `sif_item_id_2` (`sif_item_id`),
  ADD KEY `sif_sprav_id` (`sif_sprav_id`),
  ADD KEY `sif_sprav_id_2` (`sif_sprav_id`,`sif_svid`),
  ADD KEY `sif_item_id_3` (`sif_item_id`,`sif_sprav_id`),
  ADD KEY `sif_svid` (`sif_svid`);

--
-- Индексы таблицы `shop_item_basket`
--
ALTER TABLE `shop_item_basket`
  ADD PRIMARY KEY (`basket_id`),
  ADD UNIQUE KEY `basket_item_id_2` (`basket_item_id`,`basket_sessionhash`),
  ADD KEY `basket_item_id` (`basket_item_id`),
  ADD KEY `basket_sessionhash` (`basket_sessionhash`),
  ADD KEY `basket_user_id` (`basket_user_id`);

--
-- Индексы таблицы `shop_item_decorations`
--
ALTER TABLE `shop_item_decorations`
  ADD PRIMARY KEY (`sid_id`);

--
-- Индексы таблицы `shop_item_order`
--
ALTER TABLE `shop_item_order`
  ADD PRIMARY KEY (`oid_id`),
  ADD KEY `oid_order_id` (`oid_order_id`),
  ADD KEY `oid_item_id` (`oid_item_id`);

--
-- Индексы таблицы `shop_item_views`
--
ALTER TABLE `shop_item_views`
  ADD PRIMARY KEY (`siv_id`),
  ADD UNIQUE KEY `siv_item_id_2` (`siv_item_id`,`siv_sessionhash`),
  ADD KEY `siv_item_id` (`siv_item_id`),
  ADD KEY `siv_sessionhash` (`siv_sessionhash`),
  ADD KEY `siv_time` (`siv_time`);

--
-- Индексы таблицы `shop_offers`
--
ALTER TABLE `shop_offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD UNIQUE KEY `offer_item_id_2` (`offer_url`) USING BTREE,
  ADD KEY `offer_item_id` (`offer_item_id`),
  ADD KEY `offer_status` (`offer_status`),
  ADD KEY `offer_article` (`offer_article`),
  ADD KEY `offer_icon` (`offer_icon`),
  ADD KEY `offer_code` (`offer_code`),
  ADD KEY `offer_group` (`offer_group`),
  ADD KEY `offer_title` (`offer_title`),
  ADD KEY `offer_url` (`offer_url`),
  ADD KEY `offer_amount` (`offer_amount`),
  ADD KEY `offer_price` (`offer_price`),
  ADD KEY `offer_source_url` (`offer_source_url`),
  ADD KEY `offer_short_title` (`offer_short_title`),
  ADD KEY `offer_1c` (`offer_1c`),
  ADD KEY `offer_sort` (`offer_sort`),
  ADD KEY `offer_price_opt` (`offer_price_opt`),
  ADD KEY `offer_amount_nal` (`offer_amount_nal`),
  ADD KEY `offer_amount_nal_opt` (`offer_amount_nal_opt`),
  ADD KEY `offer_price_opt_vip` (`offer_price_opt_vip`),
  ADD KEY `offer_price_fakt` (`offer_price_fakt`),
  ADD KEY `offer_status_2` (`offer_status`,`offer_price`,`offer_amount`),
  ADD KEY `offer_title_3` (`offer_title`,`offer_article`),
  ADD KEY `offer_string` (`offer_string`),
  ADD KEY `offer_search` (`offer_search`),
  ADD KEY `offer_search_2` (`offer_search`,`offer_string`);
ALTER TABLE `shop_offers` ADD FULLTEXT KEY `offer_title_2` (`offer_title`);

--
-- Индексы таблицы `shop_offers_filters`
--
ALTER TABLE `shop_offers_filters`
  ADD PRIMARY KEY (`sif_id`),
  ADD UNIQUE KEY `sif_item_id` (`sif_offer_id`,`sif_svid`,`sif_sprav_id`) USING BTREE,
  ADD KEY `sif_sprav_id` (`sif_sprav_id`),
  ADD KEY `sif_sprav_id_2` (`sif_sprav_id`,`sif_svid`),
  ADD KEY `sif_item_id_3` (`sif_offer_id`,`sif_sprav_id`),
  ADD KEY `sif_svid` (`sif_svid`),
  ADD KEY `sif_offer_id` (`sif_offer_id`);

--
-- Индексы таблицы `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`order_user_id`),
  ADD KEY `order_payment` (`order_payment`),
  ADD KEY `order_delivery` (`order_delivery`),
  ADD KEY `order_key` (`order_key`),
  ADD KEY `order_group_id` (`order_group_id`),
  ADD KEY `order_payment_time` (`order_payment_time`),
  ADD KEY `order_delivery_city_id` (`order_delivery_city_id`),
  ADD KEY `order_del_id` (`order_del_id`);

--
-- Индексы таблицы `shop_orders_history`
--
ALTER TABLE `shop_orders_history`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `h_order_id` (`h_order_id`);

--
-- Индексы таблицы `shop_parts`
--
ALTER TABLE `shop_parts`
  ADD PRIMARY KEY (`part_id`),
  ADD UNIQUE KEY `part_cat_id_2` (`part_cat_id`,`part_url`),
  ADD KEY `part_cat_id` (`part_cat_id`),
  ADD KEY `part_status` (`part_status`),
  ADD KEY `part_text_id` (`part_text_id`),
  ADD KEY `part_sort` (`part_sort`);

--
-- Индексы таблицы `shop_popular_blocks_items`
--
ALTER TABLE `shop_popular_blocks_items`
  ADD PRIMARY KEY (`pbi_id`);

--
-- Индексы таблицы `shop_reviews`
--
ALTER TABLE `shop_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_rating_id` (`review_rating`),
  ADD KEY `review_class` (`review_item_id`);

--
-- Индексы таблицы `shop_vendors`
--
ALTER TABLE `shop_vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `vendor_name` (`vendor_name`),
  ADD UNIQUE KEY `vendor_url` (`vendor_url`),
  ADD KEY `vendor_icon` (`vendor_icon`),
  ADD KEY `vendor_status` (`vendor_status`),
  ADD KEY `vendor_text_id` (`vendor_text_id`),
  ADD KEY `vendor_bg` (`vendor_bg`),
  ADD KEY `vendor_pop` (`vendor_pop`),
  ADD KEY `vendor_letter` (`vendor_letter`),
  ADD KEY `vendor_new` (`vendor_new`),
  ADD KEY `vendor_minus` (`vendor_minus`);
ALTER TABLE `shop_vendors` ADD FULLTEXT KEY `vendor_name_2` (`vendor_name`);

--
-- Индексы таблицы `shop_vendors_filters`
--
ALTER TABLE `shop_vendors_filters`
  ADD PRIMARY KEY (`svf_id`),
  ADD UNIQUE KEY `sif_item_id` (`svf_item_id`,`svf_sprav_id`,`svf_svid`),
  ADD KEY `sif_item_id_2` (`svf_item_id`),
  ADD KEY `sif_sprav_id` (`svf_sprav_id`),
  ADD KEY `sif_sprav_id_2` (`svf_sprav_id`,`svf_svid`),
  ADD KEY `sif_item_id_3` (`svf_item_id`,`svf_sprav_id`),
  ADD KEY `sif_svid` (`svf_svid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_login` (`user_login`);

--
-- Индексы таблицы `users_delivery`
--
ALTER TABLE `users_delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `delivery_user_id` (`delivery_user_id`),
  ADD KEY `delivery_city` (`delivery_city`);

--
-- Индексы таблицы `users_hashes`
--
ALTER TABLE `users_hashes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Индексы таблицы `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`profile_user_id`),
  ADD KEY `profile_price_id` (`profile_price_id`);

--
-- Индексы таблицы `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`sessionhash`);

--
-- Индексы таблицы `users_strikes`
--
ALTER TABLE `users_strikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`,`ip`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `content_items`
--
ALTER TABLE `content_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `core_comments`
--
ALTER TABLE `core_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `core_content`
--
ALTER TABLE `core_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `core_content_views`
--
ALTER TABLE `core_content_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `core_files`
--
ALTER TABLE `core_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT для таблицы `core_log_errors`
--
ALTER TABLE `core_log_errors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT для таблицы `core_routes`
--
ALTER TABLE `core_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT для таблицы `core_search`
--
ALTER TABLE `core_search`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `core_seo`
--
ALTER TABLE `core_seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `core_settings_fields`
--
ALTER TABLE `core_settings_fields`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `core_settings_groups`
--
ALTER TABLE `core_settings_groups`
  MODIFY `cs_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `core_sprav`
--
ALTER TABLE `core_sprav`
  MODIFY `sprav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `core_sprav_values`
--
ALTER TABLE `core_sprav_values`
  MODIFY `svid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `core_text`
--
ALTER TABLE `core_text`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `news_cats`
--
ALTER TABLE `news_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages_stat`
--
ALTER TABLE `pages_stat`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_bills`
--
ALTER TABLE `shop_bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_callbacks`
--
ALTER TABLE `shop_callbacks`
  MODIFY `callback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13670863;

--
-- AUTO_INCREMENT для таблицы `shop_complectation`
--
ALTER TABLE `shop_complectation`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `shop_delivery_cities`
--
ALTER TABLE `shop_delivery_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `shop_faqs`
--
ALTER TABLE `shop_faqs`
  MODIFY `faqs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `shop_faqs_items`
--
ALTER TABLE `shop_faqs_items`
  MODIFY `fitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23828025;

--
-- AUTO_INCREMENT для таблицы `shop_items_filters`
--
ALTER TABLE `shop_items_filters`
  MODIFY `sif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `shop_item_basket`
--
ALTER TABLE `shop_item_basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `shop_item_decorations`
--
ALTER TABLE `shop_item_decorations`
  MODIFY `sid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `shop_item_order`
--
ALTER TABLE `shop_item_order`
  MODIFY `oid_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_item_views`
--
ALTER TABLE `shop_item_views`
  MODIFY `siv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `shop_offers`
--
ALTER TABLE `shop_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT для таблицы `shop_offers_filters`
--
ALTER TABLE `shop_offers_filters`
  MODIFY `sif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_orders_history`
--
ALTER TABLE `shop_orders_history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_parts`
--
ALTER TABLE `shop_parts`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shop_popular_blocks_items`
--
ALTER TABLE `shop_popular_blocks_items`
  MODIFY `pbi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `shop_reviews`
--
ALTER TABLE `shop_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `shop_vendors`
--
ALTER TABLE `shop_vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `shop_vendors_filters`
--
ALTER TABLE `shop_vendors_filters`
  MODIFY `svf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10125;

--
-- AUTO_INCREMENT для таблицы `users_delivery`
--
ALTER TABLE `users_delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_hashes`
--
ALTER TABLE `users_hashes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_strikes`
--
ALTER TABLE `users_strikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
