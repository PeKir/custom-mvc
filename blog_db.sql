-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2018 г., 23:12
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL COMMENT 'Coments id.',
  `post_id` int(11) NOT NULL COMMENT 'Post id.',
  `user_id` int(11) NOT NULL COMMENT 'User id.',
  `text` mediumtext NOT NULL COMMENT 'Comment text.',
  `date` int(11) NOT NULL COMMENT 'Add comment date.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `text`, `date`) VALUES
(1, 1, 1, 'Great article!', 1523032910),
(2, 1, 3, 'Nice ))', 1523042293);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL COMMENT 'Post id.',
  `title` varchar(250) NOT NULL COMMENT 'Post title',
  `machine_name` varchar(250) NOT NULL COMMENT 'Machine representation of title.',
  `text` mediumtext NOT NULL COMMENT 'Post text',
  `date` int(11) NOT NULL COMMENT 'Date in UNIX datestamp format.',
  `token` varchar(20) NOT NULL COMMENT 'Unique token.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `machine_name`, `text`, `date`, `token`) VALUES
(1, 'Hello', 'hello', '<p>Hello all!!! - 1</p>', 1522861588, '29YlNCFbLkgMAOTb9NpG'),
(4, 'Fourth', 'fourth', '<p>FourthFourthFourth</p>', 1522865847, 'HBPJk9BUsaz9gGTOUEat'),
(5, 'Five', 'five', '<p>FourthFourthFourth</p>', 1522865865, '7biB38jkagMk1bC1VEeg'),
(6, 'Six', 'six', '<p>FourthFourthFourth</p>', 1522865878, 'Xe6h3GXsWR6IGz24hlUV'),
(7, 'Seven', 'seven', '<p>FourthFourthFourthFourth</p>', 1522865890, 'ffAARtmmguFavavltWvI'),
(8, 'Eight', 'eight', '<p>FourthFourthFourth</p>', 1522865910, 'qp9UKnvfKCHNUL5MLf2h'),
(9, 'Nine', 'nine', '<p>FourthFourthFourthFourth</p>', 1522865932, 'SCUAxWjQ823xWl3cuR9g'),
(10, 'Ten', 'ten', '<p>FourthFourthFourth</p>', 1522865944, '43jvapSBRlYbjGJSavc4'),
(11, 'Eleven', 'eleven', '<p>FourthFourthFourth</p>', 1522865960, 'Mb4JjBf3A1dTiHnz8fCw'),
(12, 'Twelve', 'twelve', '<p>twelvetwelvetwelve</p>', 1522916304, 'CKrmv7Y9meO0lv3gNGXX'),
(13, 'Thirteen', 'thirteen', '<p>thirteenthirteen</p>', 1522916586, 'bxpnlTfeQ8u62bAfNxbO');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'Role id.',
  `name` varchar(50) NOT NULL COMMENT 'Role name.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'User id.',
  `name` varchar(150) NOT NULL COMMENT 'User name.',
  `password` varchar(128) NOT NULL COMMENT 'User password.',
  `email` varchar(128) NOT NULL COMMENT 'User email.',
  `role` varchar(15) NOT NULL DEFAULT '2' COMMENT 'User role.',
  `token` varchar(25) NOT NULL COMMENT 'User token.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `token`) VALUES
(1, 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin@admin.new', '1', 'kinR6WqGqQCIxZqmoz9QL7pXC'),
(3, 'qwerty', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'qwerty@qwerty.com', '2', 'FvWVxz66D9lDwdMrPdKdx1uWu'),
(4, 'qaz', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'qaz@qaz.qaz', '2', '0fE32pWnXwIDnnfhIUmv2aTHr'),
(5, 'wsx', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'wsx@wsx.ru', '2', 'y2oNXDMBur7MJ0Wv4d7nDhmma');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Coments id.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Post id.', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Role id.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User id.', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
