-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лис 24 2021 р., 22:06
-- Версія сервера: 10.3.22-MariaDB
-- Версія PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `users`
--

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirthDay` date NOT NULL,
  `dateChange` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`uid`, `firstName`, `lastName`, `dirthDay`, `dateChange`, `description`) VALUES
(1, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #1'),
(2, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #2'),
(3, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #3'),
(4, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #4'),
(5, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #5'),
(6, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:53', 'User description #69'),
(7, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #7'),
(8, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #8'),
(9, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #9'),
(10, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #10'),
(12, 'Ura', 'Kyziv', '2001-03-28', '2021-11-12 12:21:11', 'User description #14');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
