-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2014 at 03:47 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hanai`
--
CREATE DATABASE `db_mandaka` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_mandaka`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_nama` varchar(255) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_sale` int(11) NOT NULL,
  `id_produk_status` int(11) NOT NULL,
  `id_produk_kategori` int(11) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk_nama`, `produk_deskripsi`, `harga`, `harga_sale`, `id_produk_status`, `id_produk_kategori`, `url_title`) VALUES
(1, 'baju hamil 1', 'adalah baju hamil', 100000, 75000, 2, 1, 'bajuhamil1'),
(2, 'baju 2', '<p>adalah baju anak</p>\r\n', 1000, 500, 2, 2, 'baju2'),
(3, 'baju 3', '<p><strong>baju menyusui</strong></p>\r\n', 40000, 35000, 3, 3, 'baju3'),
(4, 'baju anak muslim', '<p>adalah baju anak muslim</p>\r\n', 300000, 200000, 2, 2, 'bajuanakmuslim'),
(5, 'baju menyusui cotton', '<p>adalah baju</p>\r\n', 100000, 90000, 3, 3, 'bajumenyusuicotton'),
(6, 'baju anak cotton 1 set', '<p>adalah baju</p>\r\n', 100000, 90000, 2, 2, 'bajuanakcotton1set'),
(7, 'baju anak cotton 2 set', '<p>On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks.</p>\r\n\r\n<p>When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab.</p>\r\n', 100000, 90000, 2, 2, 'bajuanakcotton2set'),
(9, 'sepatu anak', '<p>adalah sepatu</p>\r\n', 200000, 150000, 2, 2, 'sepatuanak'),
(10, 'baju baju', '<p>On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks.</p>\r\n\r\n<p>When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab.</p>\r\n', 100000, 75000, 2, 1, 'bajubaju'),
(11, 'topi koboi', '<p>topppi</p>\r\n', 55000, 35000, 3, 2, 'topikoboi');

-- --------------------------------------------------------

--
-- Table structure for table `produk_detail`
--

CREATE TABLE IF NOT EXISTS `produk_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_foto` varchar(255) NOT NULL,
  `produk_foto_deskripsi` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `produk_detail`
--

INSERT INTO `produk_detail` (`id`, `produk_foto`, `produk_foto_deskripsi`, `id_produk`) VALUES
(1, 'a44b91e3035d0db06440a3d89d1ac9b0.jpg', '', 1),
(4, '045a3467c4cd65e6d051e1afe92fa97b.jpg', '', 7),
(5, 'de5220f875312d15620ef6346ef1fb06.jpg', '', 7),
(6, '59ba327b4fe8634e21ca3c9ce5a943a7.jpg', '', 7),
(7, 'dbdb63ec2494085a348bf1f5fb8e5703.jpg', '', 7),
(8, '7bb32137c12412d5003de59624632f30.jpg', '', 11),
(9, '6e310dd02269b358eea1da9fd4fd86c6.jpg', '', 11),
(10, 'cf2e0569c3c7ac7418cae1b149ad8d13.jpg', '', 11),
(11, '5a5492e6d13b542a8ece59d0b732fbc9.jpg', '', 10),
(12, '42d53548a514b665e0e0f800329d8ae4.jpg', '', 10),
(13, 'b7a97dbd5d9d7001b0e5b8faf4e0fe22.jpg', '', 9),
(14, 'dee9e5b0e24e50e82f817245f75adf8a.jpg', '', 9),
(15, '6fc75e8c2c6a076b6eaf99c3c3cf6121.jpg', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE IF NOT EXISTS `produk_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_kategori` varchar(255) NOT NULL,
  `kategori_url_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id`, `produk_kategori`, `kategori_url_title`) VALUES
(1, 'baju hamil', 'bajuhamil-1'),
(2, 'baju anak', 'bajuanak-2'),
(3, 'baju menyusui', 'bajumenyusui-3'),
(4, 'aksesoris', 'aksesoris-4');

-- --------------------------------------------------------

--
-- Table structure for table `produk_ketentuan`
--

CREATE TABLE IF NOT EXISTS `produk_ketentuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ketentuan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `produk_ketentuan`
--

INSERT INTO `produk_ketentuan` (`id`, `ketentuan`) VALUES
(1, '<p>On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.</p>\r\n\r\n<p>You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</p>\r\n\r\n<p>To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `produk_status`
--

CREATE TABLE IF NOT EXISTS `produk_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `produk_status`
--

INSERT INTO `produk_status` (`id`, `produk_status`) VALUES
(1, 'default'),
(2, 'baru'),
(3, 'sale'),
(4, 'habis');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_profiles`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$2a$08$Oq0n4AzX7TOZ6QTPgeNxP.mWvwOnyBofl.R6WDzDYJf2eWIX2FXeS', 'admin@admin.com', 1, 0, NULL, NULL, NULL, NULL, 'fb72117767edcc7d3c6f48e31d57bb44', '127.0.0.1', '2014-03-10 15:43:32', '2013-06-23 20:46:17', '2014-03-10 21:43:32');
