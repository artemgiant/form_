-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2019 г., 17:00
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `form`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` varchar(122) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(43, 'Mistake, all neffex\'s songs are the best', 32, '13:03, 06 май 2019', ''),
(44, 'There\'s so many songs missing but who cares it\'s finally here﻿', 33, '13:06, 06 май 2019', ''),
(45, 'Rumors :D﻿', 34, '13:07, 06 май 2019', ''),
(46, 'his is the first comment ihave ever made on a video and i have had this account for 3 year, i just wanted to say awsome video﻿', 35, '13:13, 06 май 2019', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(121) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `photo`, `email`, `password`, `role`) VALUES
(32, 'Izuru', 'Gubareas', 'a313fbd71218ad9189cc66f37ee5b65f.jpg', 'izuru@gmail.com', '$2y$10$dltJbgxYhVEB9Sgz.Ki5leHqmsJrD6MOX7CMlcLXjLLx7QnmCEYky', 'user'),
(33, 'TheGreenMamba12345', 'Gubareas', '4fc77516f2e22ec4b773bcd531983dc7.jpg', 'mamba12345@gmail.com', '$2y$10$NvRu59BwfzO4LIQTpU0oMeO7sbtuy1KMHEvp8pETaLpRmdAWQgatm', 'user'),
(34, 'HUN Killer', 'Gubareas', 'a365b19aa423347f8a71d716d808d4bd.jpg', 'pash@gmail.com', '$2y$10$/X11RV.RpG1HLHV/HFytW.PXGf21zx616TXcZ9tqymhg0jvv8hl2i', 'user'),
(35, 'MEGA EMPIRE', 'Gubareas', '18e05b4added2401bb8003138748931c.jpg', 'test@gmail.com', '$2y$10$EhnACMOwqPr1gtRbpr5SAO.A5vqjHjQzk9oH4kNdc1Urej2Abk0z6', 'user'),
(36, 'сЯЧС', 'яЧСяЧС', 'e4ee977911358eb469c5976334cdfd0f.jpg', 'admin@admin.com', '$2y$10$l9xyKKNoZaUnsKrSTOPFY.fx1Th9LpQLVSQQcRcbbXBhbKPC71asG', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
