-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 04 2017 г., 17:03
-- Версия сервера: 5.6.31-log
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sauna`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bs16_articles`
--

CREATE TABLE IF NOT EXISTS `bs16_articles` (
  `article_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `full_text` text NOT NULL,
  `add_date` timestamp NOT NULL,
  `edit_date` timestamp NOT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bs16_articles`
--

INSERT INTO `bs16_articles` (`article_id`, `title`, `alias`, `meta_k`, `meta_d`, `full_text`, `add_date`, `edit_date`, `thumb`) VALUES
(1, 'Сауны от 350 рублей', 'sauni-ot-350-rublei', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut commodi dolores eaque, eveniet fuga illum incidunt ipsa laboriosam maiores molestiae odio odit perspiciatis quae quod ratione sapiente tempore unde.Ab accusantium adipisci eum explicabo in nisi quae. Ab animi aut dolores, dolorum, earum harum, id incidunt maxime minima optio quae quo quod ullam. Animi doloribus excepturi expedita omnis sunt.Animi expedita, ipsam. Accusamus ad amet animi, dignissimos distinctio doloremque enim facere facilis hic magni nisi nobis nostrum nulla officiis provident, quo tenetur! Accusantium aliquam animi est ipsam nesciunt repellendus', '2017-05-03 02:16:22', '2017-05-03 05:22:22', 'default.jpg'),
(2, 'Скидка 10% в день рождения!', 'skidka-10-v-dr', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', ' Ab animi aut dolores, dolorum, earum harum, id incidunt maxime minima optio quae quo quod ullam. Animi doloribus excepturi expedita omnis sunt.Animi expedita, ipsam. Accusamus ad amet animi, dignissimos distinctio doloremque enim facere facilis hic magni nisi nobis nostrum nulla officiis provident, quo tenetur! Accusantium aliquam animi est ipsam nesciunt repellendus Ab animi aut dolores, dolorum, earum harum, id incidunt maxime minima optio quae quo quod ullam. Animi doloribus excepturi expedita omnis sunt.Animi expedita, ipsam. Accusamus ad amet animi, dignissimos distinctio doloremque enim facere facilis hic magni nisi nobis nostrum nulla officiis provident, quo tenetur! Accusantium aliquam animi est ipsam nesciunt repellendus', '2017-05-03 10:19:05', '2017-05-03 10:19:05', 'default.jpg'),
(3, 'Подарочные карты', 'podarochnie-karty', 'A animi aspernatur assumenda beatae ducimus eligendi', 'A animi aspernatur assumenda beatae ducimus eligendi', 'A animi aspernatur assumenda beatae ducimus eligendi harum in iste maiores minus nam natus necessitatibus nesciunt nulla perferendis porro quia quibusdam quisquam quod sed, sit soluta suscipit unde velit, voluptatem.Aliquam aspernatur commodi consectetur consequatur cumque dolore dolorem enim eos ex excepturi explicabo fugit harum id maxime molestiae, nesciunt non obcaecati odit officiis possimus quas quod rerum similique voluptatem voluptates.Accusantium adipisci aliquid atque, dolorem dolores earum eveniet excepturi hic labore laboriosam modi natus odit optio quae quia quibusdam, quidem quo, recusandae rem rerum suscipit tempora tenetur voluptates? Consectetur, id!Esse exercitationem molestias nam quaerat quibusdam. Illo libero quo ratione? Consequuntur cupiditate delectus dolorem, error est eveniet maxime quae quis tempora tenetur totam unde veniam. Aut commodi eaque quia soluta.', '2017-05-03 10:20:17', '2017-05-03 10:20:17', 'default.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `bs16_site_settings`
--

CREATE TABLE IF NOT EXISTS `bs16_site_settings` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bs16_site_settings`
--

INSERT INTO `bs16_site_settings` (`id`, `name`, `info`) VALUES
(1, 'refresh_token', '1/gb_XO9wO-jny7eieny_Qe07TlzU1XWCG1w1iNS8ElKNaeFGFfmCeT5fAnfohjwa4');

-- --------------------------------------------------------

--
-- Структура таблицы `bs16_users`
--

CREATE TABLE IF NOT EXISTS `bs16_users` (
  `id` tinyint(3) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bs16_users`
--

INSERT INTO `bs16_users` (`id`, `email`, `password`) VALUES
(1, 'example@mail.ru', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bs16_articles`
--
ALTER TABLE `bs16_articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `alias` (`alias`);

--
-- Индексы таблицы `bs16_site_settings`
--
ALTER TABLE `bs16_site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bs16_users`
--
ALTER TABLE `bs16_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bs16_articles`
--
ALTER TABLE `bs16_articles`
  MODIFY `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `bs16_site_settings`
--
ALTER TABLE `bs16_site_settings`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `bs16_users`
--
ALTER TABLE `bs16_users`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
