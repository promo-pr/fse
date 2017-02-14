-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2017 г., 14:40
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1486018620),
('m160611_134542_create_page_table', 1486382728),
('m160612_193004_create_files_table', 1486018622),
('m170206_063129_create_reestr_table', 1486363079);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `slug` varchar(255) DEFAULT NULL,
  `seotitle` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `category_id`, `title`, `body`, `slug`, `seotitle`, `keywords`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 'Основы деятельности', '<h2>Основной целью деятельности Союза</h2>\r\n<p>является содействие его членам в осуществлении деятельности, направленной на совершенствование процесса формирования и развития профессиональной деятельности финансово-экономических судебных экспертов.\r\n</p>\r\n<h2>Для достижения цели Союз решает следующие задачи:</h2>\r\n<ul>\r\n	<li>повышение и укрепление престижа статуса финансово-экономического судебного эксперта;</li>\r\n	<li>представление и защита законных интересов Союза и его членов в государственных и общественных структурах, а так же в отншениях с негосударственными организациями;</li>\r\n	<li>разработка и утверждение стандартов и правил профессиональной деятельности финансово-экономических судебных экспертов, правил деловой и профессиональной этики;</li>\r\n	<li>организация взаимного сотрудничества между членами Союза в их профессиональной деятельности, а так же расширение круга потребителей профессиональных услуг членов Союза;</li>\r\n	<li>организация информационного обслуживания членов Союза; </li>\r\n	<li>содействие повышению профессионального уровня членов Союза;</li>\r\n	<li>содействие переподготовке и повышению квалификации финансово-экономических судебных экспертов;</li>\r\n</ul>\r\n<h2>Союз вправе:</h2>\r\n<ul>\r\n	<li>проводить финансово-экономическую, судебную экспертизу;</li>\r\n	<li>проводить бухгалтерскую судебную экспертизу; </li>\r\n	<li>проводить товароведческую экспертизу; </li>\r\n	<li>проводить строительно-техническую экспертизу;</li>\r\n	<li>проводить стоимостную экспертизу,в том числе судебную.</li>\r\n</ul>', 'o_sojuze', '', '', '', 1486384740, 1486984103, 1),
(2, 2, 'Органы управления', '<h2>ЦЕНТРАЛЬНЫЕ ОРГАНЫ УПРАВЛЕНИЯ СОЮЗА ФЭСЭ</h2><h3>ПРЕЗИДЕНТ</h3><p><strong>КУЛАКОВ Кирилл Юрьевич - </strong>Первый заместитель генерального директора ООО "Центр независимой экспертизы собственности", профессор МГСУ, д.э.н.\r\n</p><h3>ВИЦЕ-ПРЕЗИДЕНТ, ГЕНЕРАЛЬНЫЙ ДИРЕКТОР</h3><p><strong>РОГИЧ (ВЕРХОЗИНА) Алена Валерьевна</strong>\r\n</p><h3>ВИЦЕ-ПРЕЗИДЕНТ</h3><p><strong>САВИЦКИЙ Алексей Анатольевич -</strong> Кандидат экономических наук, доцент кафедры судебных экспертиз Института судебных экспертиз ФГБОУ ВПО "Московский государственный юридический университет имени О.Е.Кутафина" (МГЮА)\r\n</p><h3>ВИЦЕ-ПРЕЗИДЕНТ</h3><p><strong>ШВЕЧКОВ Валерий Иванович</strong> - Генеральный директор ООО "Агенство поддержки бизнеса", оценщик 1-й категории\r\n</p>', 'control', '', '', '', 1486983960, 1486985134, 1),
(3, 3, 'Библиотека', '', 'library', '', '', '', 1486985280, 1486985414, 1),
(4, 3, 'Федеральные нормативные акты', '', 'regulation', '', '', '', 1486985400, 1486985476, 1),
(5, 3, 'Документы союза', '', 'main', '', '', '', 1486985520, 1486985530, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `page_category`
--

CREATE TABLE IF NOT EXISTS `page_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page_category`
--

INSERT INTO `page_category` (`id`, `title`, `body`, `slug`) VALUES
(1, 'Контакты', NULL, 'contact'),
(2, 'О союзе', NULL, 'about'),
(3, 'Документы', NULL, 'docs'),
(4, 'Услуги', NULL, 'service'),
(5, 'Членство в Союзе', '<h2>Условия вступления</h2><p>ЧЛЕНАМИ СОЮЗА могут быть физические лица, имеющие специальное образование и опыт профессиональной деятельности не менее пяти лет в области права, экономики, финансов, оценки, землеустройства и градостроительства.\r\n</p><p><strong>ВЗНОСЫ:</strong>\r\n</p><p>Вступительный взнос – 6 000 рублей<br>Членский взнос – 7 000 рублей\r\n</p><p>Для вступления в СОЮЗ ФЭСэ небходимо заполнить Анкету и Заявление.\r\n</p><h3>Документы для вступления:</h3><ul>\r\n	<li><a href="/doc/anketa.doc">Анкета</a></li>\r\n	<li><a href="/doc/zayavlenie.doc">Заявление</a></li>\r\n	<li><a href="/doc/oplata.doc">Квитанция об оплате</a></li>\r\n</ul><p>Оригиналы заполненных документов необходимо направить по адресу:\r\n</p><p>121170, Россия, г.Москва, ул. Генерала Ермолова, д.2\r\n</p>', 'join'),
(7, 'Экспертиза', NULL, 'expertize');

-- --------------------------------------------------------

--
-- Структура таблицы `reestr`
--

CREATE TABLE IF NOT EXISTS `reestr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reestr`
--

INSERT INTO `reestr` (`id`, `name`) VALUES
(1, 'Иванов Иван Иванович'),
(2, 'Петров Петр Петрович');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `idx-files-uri` (`uri`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-page-slug` (`slug`);

--
-- Индексы таблицы `page_category`
--
ALTER TABLE `page_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-page-category-slug` (`slug`);

--
-- Индексы таблицы `reestr`
--
ALTER TABLE `reestr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-reestr-name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `page_category`
--
ALTER TABLE `page_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `reestr`
--
ALTER TABLE `reestr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
