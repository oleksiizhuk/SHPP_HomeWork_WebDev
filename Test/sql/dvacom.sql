-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 25 2018 г., 23:56
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dvacom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `data_created`
--

CREATE TABLE `data_created` (
  `id` int(11) NOT NULL,
  `category` varchar(80) CHARACTER SET utf8 NOT NULL,
  `name` varchar(80) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `img_src` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_created` varchar(33) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `data_created`
--

INSERT INTO `data_created` (`id`, `category`, `name`, `price`, `img_src`, `date_created`, `date`) VALUES
(31, 'джинсы', 'Джинсы Colin’s CL1031095DN09003 33-32', 1000, 'img/5c1c34464af299.86742873.jpg', '1545352262', '2018-12-25 13:29:56'),
(32, 'футболка', 'ФУТБОЛКА С ПРИНТОМ ', 5001, 'img/5c1c34891126a1.98482978.jpg', '1545352329', '2018-12-25 22:50:34'),
(33, 'брюки', 'Классные брюки', 2828, 'img/5c1c34d27076a8.12148936.jpg', '1545352402', '2018-12-21 00:33:22'),
(34, 'футболка', 'крутая футболк', 1160, 'img/5c1d8cf60a4df0.83620312.jpg', '1545440502', '2018-12-22 01:01:42'),
(35, 'брюки', 'Colins', 3000, 'img/5c1d8ec0647793.45952136.jpg', '1545440960', '2018-12-22 01:09:20'),
(36, 'джинсы', 'Colins', 999, 'img/5c1d9299bdbcc5.01171074.jpg', '1545441945', '2018-12-22 01:31:50'),
(38, 'брюки', 'брюки брюки', 25000, 'img/5c22b21018aff8.31446099.jpg', '1545777680', '2018-12-25 22:41:20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user'),
(3, 'Aleks', 'qwe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`category`);

--
-- Индексы таблицы `data_created`
--
ALTER TABLE `data_created`
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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `data_created`
--
ALTER TABLE `data_created`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
