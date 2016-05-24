-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 13:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `free_ads`
--
CREATE DATABASE IF NOT EXISTS `free_ads` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `free_ads`;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `user_id`, `titre`, `description`, `prix`, `activate`, `remember_token`, `created_at`, `updated_at`, `images`, `lieu`, `categorie`) VALUES
(1, 1, 'dfghjk', 'lkjhgfd', '50', 0, NULL, '2015-03-24 15:15:45', '2015-03-24 15:15:45', '', '', ''),
(2, 1, 'Nouvelle Annonce', 'encor un esssais', '30.20', 1, NULL, '2015-03-25 12:55:22', '2015-03-25 12:55:22', '', '', ''),
(3, 1, 'Modifié', 'kijuhytgrf jy\r\n\r\ny\r\nhytrg  grguj\r\nf ^foj f', '88', 1, NULL, '2015-03-25 12:56:01', '2015-03-25 12:56:01', '', '', ''),
(4, 1, 'test', 'efhikjuh trgtr \r\ngvf\r\nb rt535g4v1 f \r\ng bla\r\n tgt8f54v', '55.55', 1, NULL, '2015-03-25 12:56:28', '2015-03-25 12:56:28', '', '', ''),
(5, 1, 'bla reee', 'g(h tbgfvdcwdcsgdf\r\nv ergfdscxljkv jjj\r\ngg rfds', '99', 1, NULL, '2015-03-25 12:56:54', '2015-03-25 12:56:54', '', '', ''),
(6, 1, 'molikujhgfd', 'g(h tbgfvdcwdcsgdf\r\nv ergfdscxljkv \r\n rfds', '99', 0, NULL, '2015-03-25 12:57:09', '2015-03-25 12:57:09', '', '', ''),
(7, 2, 'kikouuuuu', 'sdyfyguoi hmjnm jmk\r\n oohlk nl\r\n pj ùj l\r\n', '6668', 1, NULL, '2015-03-25 21:06:40', '2015-03-25 21:06:40', '', '', ''),
(8, 2, 'trhjyf ', 'srst         yjgfgf g', '55.11', 1, NULL, '2015-03-25 21:14:48', '2015-03-25 21:14:48', '', '', ''),
(9, 1, 'image', 'kuyujtytg', '66', 1, NULL, '2015-03-25 21:37:16', '2015-03-25 21:37:16', '', '', ''),
(10, 1, 'hhhh', 'hhhhh', '77', 1, NULL, '2015-03-25 21:52:51', '2015-03-25 21:52:51', '', '', ''),
(11, 1, 'hgfds', 'gfd', '22', 1, NULL, '2015-03-25 21:53:38', '2015-03-25 21:53:38', '', '', ''),
(12, 1, 'rrrrrrrrrr', 'rrrrrrrrrrrrr', '66', 1, NULL, '2015-03-25 21:58:50', '2015-03-25 21:58:50', '', '', ''),
(13, 1, '', '', '', 0, NULL, '2015-03-25 22:06:13', '2015-03-25 22:06:13', '', '', ''),
(14, 1, '', '', '', 0, NULL, '2015-03-25 22:07:06', '2015-03-25 22:07:06', '', '', ''),
(15, 1, '', '', '', 0, NULL, '2015-03-25 22:34:01', '2015-03-25 22:34:01', '', '', ''),
(16, 1, '', '', '', 0, NULL, '2015-03-25 22:44:42', '2015-03-25 22:44:42', '', '', ''),
(17, 1, '', '', '', 0, NULL, '2015-03-25 22:46:51', '2015-03-25 22:46:51', '', '', ''),
(18, 1, '', '', '', 0, NULL, '2015-03-25 22:48:40', '2015-03-25 22:48:40', '', '', ''),
(19, 1, '', '', '', 0, NULL, '2015-03-25 22:51:06', '2015-03-25 22:51:06', '', '', ''),
(20, 1, '', '', '', 0, NULL, '2015-03-25 22:52:18', '2015-03-25 22:52:18', '', '', ''),
(21, 1, '', '', '', 0, NULL, '2015-03-25 22:53:34', '2015-03-25 22:53:34', '', '', ''),
(22, 1, '', '', '', 0, NULL, '2015-03-25 22:55:06', '2015-03-25 22:55:06', '', '', ''),
(23, 1, '', '', '', 0, NULL, '2015-03-25 23:02:23', '2015-03-25 23:02:23', '', '', ''),
(24, 1, '', '', '', 0, NULL, '2015-03-25 23:06:29', '2015-03-25 23:06:29', '', '', ''),
(25, 1, '', '', '', 0, NULL, '2015-03-25 23:07:00', '2015-03-25 23:07:00', '', '', ''),
(26, 1, '', '', '', 0, NULL, '2015-03-25 23:07:55', '2015-03-25 23:07:55', '', '', ''),
(27, 1, '', '', '', 0, NULL, '2015-03-25 23:16:35', '2015-03-25 23:16:35', '', '', ''),
(28, 1, '', '', '', 0, NULL, '2015-03-25 23:17:31', '2015-03-25 23:17:31', '', '', ''),
(29, 1, '', '', '', 0, NULL, '2015-03-25 23:17:47', '2015-03-25 23:17:47', '', '', ''),
(30, 1, '', '', '', 0, NULL, '2015-03-25 23:18:38', '2015-03-25 23:18:38', '', '', ''),
(31, 1, '', '', '', 0, NULL, '2015-03-25 23:19:06', '2015-03-25 23:19:06', '', '', ''),
(32, 1, '', '', '', 0, NULL, '2015-03-25 23:19:19', '2015-03-25 23:19:19', '', '', ''),
(33, 1, '', '', '', 0, NULL, '2015-03-25 23:19:26', '2015-03-25 23:19:26', '', '', ''),
(34, 1, '', '', '', 0, NULL, '2015-03-25 23:19:37', '2015-03-25 23:19:37', '', '', ''),
(35, 1, '', '', '', 0, NULL, '2015-03-25 23:20:00', '2015-03-25 23:20:00', '', '', ''),
(36, 1, '', '', '', 0, NULL, '2015-03-25 23:20:14', '2015-03-25 23:20:14', '', '', ''),
(37, 1, '', '', '', 0, NULL, '2015-03-25 23:20:34', '2015-03-25 23:20:34', '', '', ''),
(38, 1, 'image', 'qsdfjk', '54.32', 0, NULL, '2015-03-26 10:32:14', '2015-03-26 10:32:14', '', '', ''),
(39, 1, 'image', 'qsdfjk', '54.32', 0, NULL, '2015-03-26 10:32:37', '2015-03-26 10:32:37', '', '', ''),
(40, 1, 'image', 'qsdfjk', '54.32', 1, NULL, '2015-03-26 10:32:58', '2015-03-26 10:32:58', '', '', ''),
(41, 1, 're essais', 'Image', '55', 1, NULL, '2015-03-26 10:43:25', '2015-03-26 10:43:25', '', '', ''),
(42, 1, 're essais', 'Image', '55', 1, NULL, '2015-03-26 10:43:39', '2015-03-26 10:43:39', '', '', ''),
(43, 1, 'lien', 'image', '44', 1, NULL, '2015-03-26 11:04:16', '2015-03-26 11:04:16', '90456.jpg', '', ''),
(44, 1, 'multipasss', 'blouuu', '125', 1, NULL, '2015-03-26 11:26:39', '2015-03-26 11:26:39', '90502.jpg', '', ''),
(45, 1, 'plussieur', 'bdd? upload? bug?', '150', 1, NULL, '2015-03-26 12:30:39', '2015-03-26 12:30:39', '89274.jpg;', '', ''),
(46, 1, 'bdd?', 'test', '820', 1, NULL, '2015-03-26 12:33:06', '2015-03-26 12:33:06', '91848.jpg;29687.jpg;24980.jpg;', '', ''),
(47, 2, 'article', 'bla blou bli', '55', 1, NULL, '2015-03-26 20:24:10', '2015-03-26 20:24:10', '78252.jpg;42176.jpg;14075.jpg;16389.jpg;', '', ''),
(48, 2, 'sans image', 'blaaaaaaaaaaaa', '64', 1, NULL, '2015-03-27 14:16:39', '2015-03-27 14:16:39', '', '', ''),
(49, 2, 'avec image', 'aaaaaaaaaaaaaaaaaaaaahhhhhhhhhhhhhhhhhhhhrrrrrrrrrrrrrrrrrrrrrrrrrrrrggggggggggggggggggggg', '', 1, NULL, '2015-03-27 14:18:09', '2015-03-27 14:18:09', '44327.jpg;91606.jpg;71427.jpg;81575.jpg;', '', ''),
(50, 1, 'ville/ categorie', 'Ajouter', '12.2', 1, NULL, '2015-03-28 21:43:07', '2015-03-28 21:43:07', '94794.jpg;', 'Lyon', 'Animaux'),
(51, 1, 'jhg', 'hgf', '55', 1, NULL, '2015-03-28 21:51:07', '2015-03-28 21:51:07', '64686.jpg;', 'Paris', 'Animaux'),
(52, 1, 'juhyt', 'tygrf', '66', 1, NULL, '2015-03-28 21:51:56', '2015-03-28 21:51:56', '52978.jpg;83146.jpg;70030.jpg;', 'Bordeaux', 'Animaux');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_sender`, `id_receiver`, `id_annonce`, `content`, `activate`, `remember_token`, `created_at`, `updated_at`, `date`) VALUES
(1, 2, 2, 49, 'bla', 1, NULL, '2015-03-27 15:35:27', '2015-03-27 15:35:27', '2015-03-29 00:03:40'),
(2, 2, 1, 45, 'beau chateau', 1, NULL, '2015-03-27 15:36:17', '2015-03-27 15:36:17', '2015-03-28 21:36:19'),
(3, 1, 1, 45, 'test', 1, NULL, '2015-03-28 17:32:14', '2015-03-28 17:32:14', '2015-03-28 21:36:19'),
(4, 1, 1, 43, 'lu? non lu?', 1, NULL, '2015-03-28 20:38:32', '2015-03-28 20:38:32', '2015-03-28 23:03:10'),
(5, 1, 2, 49, 'Yo test envoi mess a eres sbra', 1, NULL, '2015-03-28 21:52:52', '2015-03-28 21:52:52', '2015-03-29 00:03:45'),
(6, 2, 1, 52, 'eres envoi a test', 1, NULL, '2015-03-28 21:53:35', '2015-03-28 21:53:35', '2015-03-29 00:00:43'),
(7, 2, 1, 50, 'Le fenec', 1, NULL, '2015-03-28 21:53:46', '2015-03-28 21:53:46', '0000-00-00 00:00:00'),
(8, 2, 1, 52, 'renard', 1, NULL, '2015-03-28 22:00:07', '2015-03-28 22:00:07', '0000-00-00 00:00:00'),
(9, 1, 2, 7, 'cherrrrr', 1, NULL, '2015-03-28 22:02:03', '2015-03-28 22:02:03', '0000-00-00 00:00:00'),
(10, 1, 2, 47, 'art lezars', 1, NULL, '2015-03-28 22:02:27', '2015-03-28 22:02:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_24_151626_create_annonces_table', 1),
('2015_03_26_115752_add_images_annonces', 2),
('2015_03_27_091848_add_columns_annonces', 3),
('2015_03_27_092642_create_messagerie_table', 4),
('2015_03_27_161841_create_messages_table', 5),
('2015_03_28_174053_add_date_messages', 6);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '1',
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `activate`, `code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.fr', '$2y$10$e.Sy4v2MT8DTy2FWPDJ2QOC7IQNXjrxV3W/hvrpI3QD7H.hebpy86', 2, 'c9f0f895fb98ab9159f51fd0297e236d', 'OzdoWtxI5lMl5K8v3nXCqq7S6ZFjVbKwvL6O3RJDYBsq67vkAkE84m68JW9V', '2015-03-24 14:55:43', '2015-03-28 22:03:11'),
(2, 'eresy', 'eresy18@gmail.com', '$2y$10$m.gvbH3qCcL9haKpvumdh.rj1BawEenoMdhpBSooptS4crwhT86jq', 2, 'd09bf41544a3365a46c9077ebb5e35c3', 'U5R8MyX2ncKnaKAWRMMcvpWmIdl7iqID0f2m7J8W31xk9gfv25d6B46ZzBkL', '2015-03-24 14:56:50', '2015-03-28 22:00:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
