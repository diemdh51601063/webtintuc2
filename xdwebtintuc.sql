-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2020 at 08:36 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xdwebtintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` char(255) NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noidung` text NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '0',
  `id_tin` int(10) UNSIGNED NOT NULL,
  `id_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `an` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_tin` (`id_tin`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `email`, `thoigian`, `noidung`, `trangthai`, `id_tin`, `id_admin`, `an`) VALUES
(1, 'a@gmail.com', '2020-05-05 14:50:23', 'abc', 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

DROP TABLE IF EXISTS `loaitin`;
CREATE TABLE IF NOT EXISTS `loaitin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tenloaitin` char(255) NOT NULL,
  `loaitinseo` char(255) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `id_nhomtin` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nhomtin` (`id_nhomtin`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`id`, `tenloaitin`, `loaitinseo`, `trangthai`, `id_nhomtin`) VALUES
(1, 'Chính Trị', 'chinh-tri', 1, 1),
(2, 'Giáo dục', 'giao-duc', 1, 1),
(3, 'Giao thông', 'giao-thong', 1, 1),
(4, 'Tư liệu', 'tu-lieu', 1, 2),
(5, 'Phân tích', 'phan-tich', 1, 2),
(6, 'Chuyện lạ', 'chuyen-la', 1, 2),
(7, 'Bất động sản', 'bat-dong-san', 1, 3),
(8, 'Hàng không', 'hang-khong', 1, 3),
(9, 'Tài chính', 'tai-chinh', 1, 3),
(11, 'Làm đẹp', 'lam-dep', 1, 4),
(12, 'Trang sức', 'trang-suc', 1, 4),
(14, 'Mặc đẹp', 'mac-dep', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nhomtin`
--

DROP TABLE IF EXISTS `nhomtin`;
CREATE TABLE IF NOT EXISTS `nhomtin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tennhomtin` char(255) NOT NULL,
  `nhomtinseo` char(255) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhomtin`
--

INSERT INTO `nhomtin` (`id`, `tennhomtin`, `nhomtinseo`, `trangthai`) VALUES
(1, 'Xã Hội', 'xa-hoi', 0),
(2, 'Thế giới', 'the-gioi', 1),
(3, 'Kinh doanh', 'kinh-doanh', 1),
(4, 'Thời trang', 'thoi-trang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tin`
--

DROP TABLE IF EXISTS `tin`;
CREATE TABLE IF NOT EXISTS `tin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tieude` char(255) NOT NULL,
  `tieudeseo` char(255) NOT NULL,
  `hinhdaidien` char(255) NOT NULL,
  `mota` char(255) NOT NULL,
  `noidung` text NOT NULL,
  `ngaydangtin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tacgia` char(255) NOT NULL,
  `solanxem` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tinhot` tinyint(1) NOT NULL DEFAULT '0',
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `id_loaitin` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_loaitin` (`id_loaitin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tin`
--

INSERT INTO `tin` (`id`, `tieude`, `tieudeseo`, `hinhdaidien`, `mota`, `noidung`, `ngaydangtin`, `tacgia`, `solanxem`, `tinhot`, `trangthai`, `id_loaitin`) VALUES
(1, 'A', 'a', 'A', 'A', 'A', '2020-05-05 14:05:55', 'A', 0, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `remember_token` char(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `create_at`, `update_at`) VALUES
(1, 'Từ Chí Thành', 'tuchithanh1998@gmail.com', '$2a$12$wzwIv1Za4P6M29xG2iX9xeRenE/MB5..Z18POBC9Uze1TJ7ii4MC6', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_tin`) REFERENCES `tin` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

--
-- Constraints for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_ibfk_1` FOREIGN KEY (`id_nhomtin`) REFERENCES `nhomtin` (`id`);

--
-- Constraints for table `tin`
--
ALTER TABLE `tin`
  ADD CONSTRAINT `tin_ibfk_1` FOREIGN KEY (`id_loaitin`) REFERENCES `loaitin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
