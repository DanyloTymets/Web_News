-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 16 2022 р., 19:21
-- Версія сервера: 10.4.10-MariaDB
-- Версія PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `lnu-news`
--

-- --------------------------------------------------------

--
-- Структура таблиці `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_country`, `admin_pass`, `admin_job`, `admin_about`) VALUES
(1, 'TD', '+298 485 254', 'TD@gmail.com', 'Faroe Islands', 'TD', 'Webshop creator', 'Was working hard to create this site)'),
(2, 'TD1', '+380000000', 'TD1@gmail.com', 'country1', 'TD1', 'webdev', ' Was working hard to create this site)');

-- --------------------------------------------------------

--
-- Структура таблиці `cart`
--

CREATE TABLE `cart` (
  `ip_add` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_group` text NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_city`, `customer_group`, `customer_pass`, `customer_ip`) VALUES
(1, 'user1', '+3809756452', 'user1@gmail.com', 'address', 'city', 'pmi43', 'user', '::1'),
(4, 'user2', '+380585295', 'user2@gmail.com', 'afjgv', 'city1', 'pmi41', 'user2', '::1');

-- --------------------------------------------------------

--
-- Структура таблиці `customer_categories`
--

CREATE TABLE `customer_categories` (
  `cat_id` int(10) NOT NULL,
  `cat_group` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `customer_categories`
--

INSERT INTO `customer_categories` (`cat_id`, `cat_group`, `cat_desc`) VALUES
(1, 'pmi43', 'pmi43'),
(2, 'pmi41', 'pmi41');

-- --------------------------------------------------------

--
-- Структура таблиці `customer_events`
--

CREATE TABLE `customer_events` (
  `event_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `sub_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `customer_events`
--

INSERT INTO `customer_events` (`event_id`, `customer_id`, `sub_date`) VALUES
(1, 1, '2020-05-24'),
(2, 1, '2020-05-24'),
(3, 1, '2021-05-22'),
(5, 1, '2021-05-22');

-- --------------------------------------------------------

--
-- Структура таблиці `events`
--

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL,
  `e_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `event_title` text NOT NULL,
  `event_img1` text NOT NULL,
  `event_keywords` text NOT NULL,
  `event_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `events`
--

INSERT INTO `events` (`event_id`, `e_cat_id`, `cat_id`, `date`, `event_title`, `event_img1`, `event_keywords`, `event_desc`) VALUES
(1, 1, 1, '2022-05-16 17:19:30', 'New test system', 'lnu.jpg', 'News', '                            <p>Введено нову систему тестування</p>                                                    '),
(2, 2, 2, '2022-05-16 17:18:03', 'Конференція трудового колективу та засідання Вченої ради', 'graduation.jpg', 'Event', '                            <p>В середу 13 квітня 2022 року о 15 год. (дистанційно в MS Teams) відбудеться  Конференція трудового колективу факультету\r\n</br>\r\n</br>\r\nПосилання на нараду: https://cutt.ly/ZFWiAb8.</p>                                                    '),
(3, 2, 2, '2022-05-16 17:14:52', 'Компанія Noltic запрошує на знайомство з технологією Salesforce', 'ns.jpg', 'Event', '<p >14 квітня о 10:30 запрошуємо на лекцію про роботу з технологією Salesforce та\r\nкар’єрні можливості від Salesforce-розробника компанії Noltic.\r\n</br> </br> \r\nПочаток навчання: 16 червня. Всі деталі тут: courses.noltic.com\r\n</p>                                                    '),
(4, 1, 1, '2022-05-16 17:08:18', 'Student scholarships for women from Ukraine', 'students2.jpg', 'News', '<p>ECCEDU, in cooperation with Dataiku, offers a special scholarship to female refugees from Ukraine to join our IT summer program in Prague. The scholarship aims to help the women during these challenging times, not only to learn about technology and AI but also to gain adequate expertise in the field to be granted a work opportunity after finishing the program.\r\n</br>\r\n</br>\r\nThe deadline for the application is May 7, 2022.\r\n</p>                          '),
(5, 2, 2, '2022-05-16 17:04:13', 'Барди у парку', 'bards.jpg', 'Event', '                            <p>Красива природа, приємна компанія та музика! Запрошуємо всіх на барди у парку навпроти ЛНУ! Якщо ви маєте музичний інструмент (гітару/укулеле/саксофон і т.д.), добре граєте, то реєструйтесь (самі чи з друзями), щоб стати виконавцем (виконавцями) на бардах.</p>                          '),
(6, 1, 1, '2022-05-16 16:24:13', 'В Університеті обговорили особливості реалізації прав у сфері праці та соціального захисту в умовах воєнного стану', 'lnu.jpg', 'News', '<p>12 травня 2022 року у Львівському національному університеті імені Івана Франка відбувся круглий стіл «Особливості реалізації прав у сфері праці та соціального захисту в умовах воєнного стану». Захід провели у змішаному форматі з використанням платформи Zoom. Організаторами круглого столу є кафедра соціального права юридичного факультету Львівського національного університету імені Івана Франка, кафедра трудового права Національного юридичного університету імені Ярослава Мудрого, кафедра цивільного права і процесу Донецького національного університету імені Василя Стуса та Громадська організація «Український центр соціально-правових досліджень».</p>\r\n</br>\r\n<p>Наукова проблематика круглого столу охопила низку важливих та актуальних питань. Учасники засідання, зокрема, обговорили питання законодавчих новацій і правозастосування робочого часу і часу відпочинку в умовах воєнного стану, питання реалізації конституційного права на працю в умовах воєнного стану, вплив на стан трудових відносин призову або вступу сторони трудового договору на військову службу. </p>                                                    '),
(7, 2, 2, '2022-05-16 17:02:10', 'Міжнародна Студентська Наукова Конференція з Прикладної Математики та Комп’ютерних Наук', 'ns.jpg', 'Event', '                                                                                    <p>The annual International Student Scientific Conference of Applied Mathematics and Computer Science brings together students, graduate students and teachers from various educational institutions, not only from Lviv, but also from all over Ukraine and abroad.\r\n</br>\r\n</br>\r\nStudents, IT specialists, as well as young scientists and invited guests doing research in the field of applied mathematics and computer science are invited to participate.\r\n</br>\r\n</br>\r\nConference languages are Ukrainian and English.\r\n</br>\r\n</br>\r\nParticipation is free.</p>                                                                              ');

-- --------------------------------------------------------

--
-- Структура таблиці `events_comments`
--

CREATE TABLE `events_comments` (
  `Id` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `EventId` int(11) NOT NULL,
  `Message` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `events_comments`
--

INSERT INTO `events_comments` (`Id`, `CustomerID`, `EventId`, `Message`, `Date`) VALUES
(1, 1, 7, 'asgjvcjabwfkbwf', '2022-05-14'),
(2, 1, 7, 'awfawfawfawfw', '2022-05-15'),
(3, 1, 3, 'Interesting', '2022-05-15'),
(4, 1, 3, 'gxgxdh', '2022-05-15'),
(6, 1, 7, 'awfaffwfawfawfzcsvzcsvzsvzsvzsv', '2022-05-15'),
(7, 1, 4, 'afsezGEGSEG', '2022-05-15'),
(9, 1, 4, 'aFfafFawf', '2022-05-15');

-- --------------------------------------------------------

--
-- Структура таблиці `event_categories`
--

CREATE TABLE `event_categories` (
  `e_cat_id` int(10) NOT NULL,
  `e_cat_title` text NOT NULL,
  `e_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `event_categories`
--

INSERT INTO `event_categories` (`e_cat_id`, `e_cat_title`, `e_cat_desc`) VALUES
(1, 'Новини', 'All possible news about LNU'),
(2, 'Події', 'All posiible events');

-- --------------------------------------------------------

--
-- Структура таблиці `pending_events`
--

CREATE TABLE `pending_events` (
  `event_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `pending_events`
--

INSERT INTO `pending_events` (`event_id`, `customer_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 1),
(7, 1),
(7, 4);

-- --------------------------------------------------------

--
-- Структура таблиці `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide 1', 'lnu1.jpg'),
(2, 'slide 2', 'lnu.jpg'),
(3, 'slide 3', 'students2.jpg');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Індекси таблиці `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Індекси таблиці `customer_categories`
--
ALTER TABLE `customer_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Індекси таблиці `customer_events`
--
ALTER TABLE `customer_events`
  ADD PRIMARY KEY (`event_id`,`customer_id`);

--
-- Індекси таблиці `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Індекси таблиці `events_comments`
--
ALTER TABLE `events_comments`
  ADD PRIMARY KEY (`Id`);

--
-- Індекси таблиці `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`e_cat_id`);

--
-- Індекси таблиці `pending_events`
--
ALTER TABLE `pending_events`
  ADD PRIMARY KEY (`event_id`,`customer_id`);

--
-- Індекси таблиці `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `customer_categories`
--
ALTER TABLE `customer_categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `events_comments`
--
ALTER TABLE `events_comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `e_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
