-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mrt 2020 om 14:51
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_extension` varchar(255) DEFAULT NULL,
  `file_full_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `attachment`
--

INSERT INTO `attachment` (`id`, `blog_id`, `file_name`, `file_extension`, `file_full_name`) VALUES
(1, 3, 'smile', 'png', 'smile.png'),
(2, 44, 'WhatsApp Image 2020-03-16 at 09.29.23', 'jpeg', 'WhatsApp Image 2020-03-16 at 09.29.23.jpeg'),
(3, 3, 'WhatsApp Image 2020-03-16 at 09.29.23 _1_', 'jpeg', 'WhatsApp Image 2020-03-16 at 09.29.23 _1_.jpeg'),
(6, 168, 'WhatsApp Image 2020-03-16 at 09.29.23', 'jpeg', 'WhatsApp Image 2020-03-16 at 09.29.23.jpeg'),
(7, 3, 'WhatsApp Image 2020-03-16 at 09.29.23', 'jpeg', 'WhatsApp Image 2020-03-16 at 09.29.23.jpeg'),
(22, 7, 'WhatsApp Image 2020-03-16 at 09.29.23 _2_', 'jpeg', 'WhatsApp Image 2020-03-16 at 09.29.23 _2_.jpeg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `inleiding` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `blog`
--

INSERT INTO `blog` (`id`, `author_id`, `publish_date`, `title`, `slug`, `inleiding`) VALUES
(3, 187, '2020-03-11 11:50:17', 'piet', '<p>pietfghgh</p>', 'fgfgfgfg'),
(4, 12, '2020-03-24 00:00:00', 'g', 'g', 'gfdgdgdf'),
(5, 12, '2020-03-17 09:22:58', 'lorem ipsum', '<p>Bold</p>\r\n<p><em>Cursief</em></p>\r\n<p style=\"text-align: right;\"><em>aan de rechter kant</em></p>', 'gfdgdfgdgf'),
(6, 12, '2020-03-10 10:36:00', 'gfgfgf', 'gfgfgf', 'gdfgdfgdfgdfgdf'),
(7, 187, '2020-03-23 11:47:09', 'fefeas', '<p>feaf</p>', 'gdfgdfgdfgdf'),
(8, 12, '2020-03-23 08:24:18', 'dfafda', 'dfafdaf', 'hhhhhhhh'),
(9, 13, '2020-03-09 11:37:34', 'afdafdafda', '<p>fdadf</p>', 'fgfggtrrrr'),
(22, 12, '2020-03-06 13:20:39', 'upload test', '<p>fffff</p>', 'fffff'),
(23, 12, '2020-03-06 13:22:24', 'lorem ipsum', '<p>ffff</p>', 'fffff'),
(44, 12, '2020-03-06 14:18:54', 'cc', '<p>cc</p>', 'cc'),
(46, 12, '2020-03-23 11:47:36', 'twee', '<p>php</p>', 'php'),
(47, 12, '2020-03-06 14:38:06', 'php', '<p>php</p>', 'php'),
(48, 12, '2020-03-06 14:39:17', 'php', '<p>php</p>', 'php'),
(49, 12, '2020-03-06 14:40:16', 'php', '<p>php</p>', 'php'),
(50, 12, '2020-03-06 14:40:38', 'php', '<p>php</p>', 'php'),
(51, 12, '2021-03-06 14:42:42', 'php', '<p>php</p>', 'php'),
(56, 13, '2020-03-09 14:51:10', 'sssssss', '<p>ssssssssssss</p>', 'ssssssssss'),
(89, 13, '2020-03-09 15:40:47', 'testTitle', '<p>testSlug</p>', 'testInleiding'),
(148, 187, '2020-03-11 11:27:04', 'chandelier', '<p>chandelier</p>', 'chandelier'),
(152, 187, '2020-03-11 11:31:36', 'marry you', '<p>marry you</p>', 'marry you'),
(153, 187, '2020-03-11 11:33:08', 'marry you', '<p>marry you</p>', 'marry you'),
(167, 12, '2020-03-16 17:24:47', 'dddddddd', '<p>ddddddd</p>', 'dddddd'),
(168, 187, '2020-03-17 09:47:01', 'Asset test', '<p>Dit is voor de gekke enige echte moker stoeren Asset test</p>', 'Asset test'),
(189, 187, '2020-03-17 13:15:46', 'fffff', '<p>&lt;p&gt;even testen toch&lt;/p&gt;</p>', 'ffff'),
(190, 12, '2020-03-17 13:40:53', 'testTitle', '<p>some html</p>', 'testInleiding'),
(191, 12, '2020-03-17 13:42:47', 'testTitle', '<p>even testen html</p>', 'testInleiding'),
(349, 187, '2020-03-23 14:20:59', 'testTitle', '<p>even testen html</p>', 'testInleiding'),
(350, 12, '2020-03-23 14:21:23', 'testTitle', '<p>even testen html</p>', 'testInleiding'),
(351, 187, '2020-03-23 14:37:00', 'testTitle', '<p>even testen html</p>', 'testInleiding'),
(352, 12, '2020-03-23 14:37:24', 'testTitle', '<p>even testen html</p>', 'testInleiding');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comment`
--

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
(46, 46, '2020-03-09 11:34:37', 'php', 'jatoch php'),
(97, 7, '2020-03-17 09:03:03', 'gekkeTitle', 'gekkeSlug'),
(98, 7, '2020-03-17 09:04:28', 'gekkeTitle', 'gekkeSlug'),
(99, 7, '2020-03-17 09:05:29', 'gekkeTitle', 'gekkeSlug'),
(100, 3, '2020-03-17 09:34:21', 'testTitle', 'testSlug'),
(101, 168, '2020-03-17 09:47:18', 'Wow mooi verhaal', 'Jij bent echt super retarted'),
(102, 7, '2020-03-17 10:14:35', 'gekkeTitle', 'gekkeSlug'),
(103, 3, '2020-03-17 10:15:19', 'testTitle', 'testSlug'),
(108, 7, '2020-03-17 10:31:11', 'gekkeTitle', 'gekkeSlug'),
(109, 3, '2020-03-17 10:31:53', 'testTitle', 'testSlug'),
(110, 7, '2020-03-17 10:39:48', 'gekkeTitle', 'gekkeSlug'),
(111, 3, '2020-03-17 10:40:57', 'testTitle', 'testSlug'),
(115, 7, '2020-03-17 10:52:04', 'gekkeTitle', 'gekkeSlug'),
(116, 3, '2020-03-17 10:52:46', 'testTitle', 'testSlug'),
(128, 7, '2020-03-17 11:38:45', 'gekkeTitle', 'gekkeSlug'),
(129, 3, '2020-03-17 11:40:02', 'testTitle', 'testSlug'),
(130, 7, '2020-03-17 13:44:31', 'gekkeTitle', 'gekkeSlug'),
(131, 7, '2020-03-17 14:00:01', 'gekkeTitle', 'gekkeSlug'),
(132, 3, '2020-03-17 14:01:18', 'testTitle', 'testSlug'),
(133, 7, '2020-03-17 14:03:27', 'gekkeTitle', 'gekkeSlug'),
(284, 7, '2020-03-23 14:21:04', 'gekkeTitle', 'gekkeSlug'),
(285, 3, '2020-03-23 14:22:37', 'testTitle', 'testSlug'),
(286, 7, '2020-03-23 14:37:05', 'gekkeTitle', 'gekkeSlug'),
(287, 3, '2020-03-23 14:38:40', 'testTitle', 'testSlug');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migration`
--

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
('m200306_151844_add_comment_table', 1583508148),
('m200312_140633_add_attachments_table', 1584346695);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

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
(12, 'jan', '$2y$13$dslVB5rN5210JEDe5tccmeGR4ytVm9qyFxhMHDnBxGHMxjXSoWCXe', 'hakkerman', 'hekkermen', 99),
(13, 'piet', '$2y$13$Uvvfq/2w5Z.O89DaBn4OneYcVw5OdnNDSJmCyf/NMrreeJoMeae2O', 'calve', 'Wisselen', 16),
(187, 'Coen', '$2y$13$1vSXhNHDRssihGsRNiCRBOAg8zrFneiEXaYsPxYVNB54aeoNiw/Mm', 'coen', 'coen', 123),
(236, 'testUser', '$2y$13$YYAwflXbkhUSWlOsQV5xp.clFr.AG52v4WLia4rnNVouF2Q1BGGXu', 'testAuthKey', 'testToken', 12),
(237, 'testUser', '$2y$13$EGcJDSQreHrtFv1yjDm4tOSI0sxruVd8PBymMN4oeHLfXAAw62eHa', 'testAuthKey', 'testToken', 12);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-attachment-blog_id` (`blog_id`);

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
-- AUTO_INCREMENT voor een tabel `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT voor een tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT voor een tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `fk-attachment-blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
