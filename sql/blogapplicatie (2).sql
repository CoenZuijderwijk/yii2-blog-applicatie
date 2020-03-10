-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 mrt 2020 om 12:33
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogapplicatie`
--
CREATE DATABASE IF NOT EXISTS `blogapplicatie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blogapplicatie`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `inleiding` varchar(255) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `blog`
--

INSERT INTO `blog` (`id`, `author_id`, `publish_date`, `title`, `slug`, `inleiding`, `attachment`) VALUES
(3, 12, '2020-03-06 11:22:40', 'piet', '<p>pietf</p>', 'fgfgfgfg', NULL),
(4, 12, '2020-03-24 00:00:00', 'g', 'g', 'gfdgdgdf', NULL),
(5, 12, '2020-03-06 09:39:46', 'lorem ipsum', '<p>Bold</p>\r\n<p><em>Cursief</em></p>\r\n<p style=\"text-align: right;\"><em>aan de rechter kant</em></p>\r\n<p style=\"text-align: center;\"><em>In het midden kan ook</em></p>\r\n<ol style=\"list-style-type: lower-alpha;\">\r\n<li style=\"text-align: center;\"><em>a</em></li>\r\n<li style=\"text-align: center;\"><em>b</em></li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><em><img src=\"../img/artikelen.png\" alt=\"een image die het niet doet\" width=\"247\" height=\"204\" /></em></p>', 'gfdgdfgdgf', NULL),
(6, 12, '2020-03-10 10:36:00', 'gfgfgf', 'gfgfgf', 'gdfgdfgdfgdfgdf', NULL),
(7, 12, '2020-03-12 07:15:18', 'fefeas', 'feaf', 'gdfgdfgdfgdf', NULL),
(8, 12, '2020-03-23 08:24:18', 'dfafda', 'dfafdaf', 'hhhhhhhh', NULL),
(9, 13, '2020-03-09 11:37:34', 'afdafdafda', '<p>fdadf</p>', 'fgfggtrrrr', NULL),
(22, 12, '2020-03-06 13:20:39', 'upload test', '<p>fffff</p>', 'fffff', 'uploads/hello.png'),
(23, 12, '2020-03-06 13:22:24', 'lorem ipsum', '<p>ffff</p>', 'fffff', 'uploads/smile54.png'),
(44, 12, '2020-03-06 14:18:54', 'cc', '<p>cc</p>', 'cc', NULL),
(45, 12, '2020-03-06 14:19:10', 'cc', '<p>cc</p>', 'cc', NULL),
(46, 12, '2020-03-06 14:20:24', 'php', '<p>php</p>', 'php', NULL),
(47, 12, '2020-03-06 14:38:06', 'php', '<p>php</p>', 'php', NULL),
(48, 12, '2020-03-06 14:39:17', 'php', '<p>php</p>', 'php', NULL),
(49, 12, '2020-03-06 14:40:16', 'php', '<p>php</p>', 'php', NULL),
(50, 12, '2020-03-06 14:40:38', 'php', '<p>php</p>', 'php', NULL),
(51, 12, '2021-03-06 14:42:42', 'php', '<p>php</p>', 'php', NULL),
(56, 13, '2020-03-09 14:51:10', 'sssssss', '<p>ssssssssssss</p>', 'ssssssssss', NULL),
(89, 13, '2020-03-09 15:40:47', 'testTitle', '<p>testSlug</p>', 'testInleiding', NULL),
(128, 187, '2020-03-10 11:54:48', 'ffff', '<p>ffffffffff</p>', 'ffffffffff', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `publish_date`, `title`, `slug`) VALUES
(13, 3, '2020-03-09 09:25:53', 'hh', 'hh'),
(14, 51, '2020-03-09 11:20:11', 'f', '5'),
(15, 3, '2020-03-09 11:32:32', 'pietje toch', 'ja dat was pietje dit is een heel goed verhaal. Ik luister best veel muziek. Naya rivera is best een mooie vrouw, toch vind ik heather morris knapper. Zij heeft een meer natuurlijke look, geen van deze beide vrouwen kunnen op tegen piet hoor'),
(16, 7, '2020-03-09 11:34:26', '??', 'leer typen man\r\n'),
(17, 46, '2020-03-09 11:34:37', 'php', 'jatoch php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1583319862),
('m010101_100001_init_comment', 1583503749),
('m141119_220432_comments', 1583505386),
('m160629_121330_add_relatedTo_column_to_comment', 1583503749),
('m161109_092304_rename_comment_table', 1583503750),
('m161114_094902_add_url_column_to_comment_table', 1583503750),
('m200304_105641_create_tabel_user', 1583319864),
('m200304_141705_alter_user_table', 1583331493),
('m200305_100125_add_blog_table', 1583405988),
('m200306_100455_add_inleiding_blog', 1583489185),
('m200306_104825_alter_blog_table', 1583491759),
('m200306_115644_edit_file_to_attachment', 1583495902),
('m200306_151844_add_comment_table', 1583508148);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `accessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `accessToken`, `accessLevel`) VALUES
(12, 'jan', '$2y$13$N4PVS7mwoner0TvT/EMnbenYpKFLpL85QP0d0uHBgDKwOgTG/rFxu', 'hakkerman', 'hekkermen', 99),
(13, 'piet', '$2y$13$L46I25y0xAkK5QAjJMnkf.KqaUEbd/kTCFY80Iwjzp/VARej.VVPe', 'calve', 'Wisselen', 16),
(187, 'Coen', '$2y$13$1vSXhNHDRssihGsRNiCRBOAg8zrFneiEXaYsPxYVNB54aeoNiw/Mm', 'coen', 'coen', 123);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-post-author_id` (`author_id`);

--
-- Indexen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-comment-blog_id` (`blog_id`);

--
-- Indexen voor tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT voor een tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk-post-author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk-comment-blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
