-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 12:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtest`
--
CREATE DATABASE IF NOT EXISTS `webtest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webtest`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'trinhadmin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

DROP TABLE IF EXISTS `tb_cart`;
CREATE TABLE IF NOT EXISTS `tb_cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(1, 4, '5731', 1),
(2, 6, '9349', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart_details`
--

DROP TABLE IF EXISTS `tb_cart_details`;
CREATE TABLE IF NOT EXISTS `tb_cart_details` (
  `id_cart_details` int(11) NOT NULL AUTO_INCREMENT,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`id_cart_details`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cart_details`
--

INSERT INTO `tb_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluong`) VALUES
(4, '9349', 6, 3),
(5, '9349', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dangky`
--

DROP TABLE IF EXISTS `tb_dangky`;
CREATE TABLE IF NOT EXISTS `tb_dangky` (
  `id_dangky` int(11) NOT NULL AUTO_INCREMENT,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dangky`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dangky`
--

INSERT INTO `tb_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(6, 'trinh', 'tpt@gmail.com', 'SG', '28415172efb5548286345b74313c260f', '09838763768');

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc`
--

DROP TABLE IF EXISTS `tb_danhmuc`;
CREATE TABLE IF NOT EXISTS `tb_danhmuc` (
  `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL,
  PRIMARY KEY (`id_danhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id_danhmuc`, `tendanhmuc`, `mota`) VALUES
(9, 'S???a b???t ', 'S???a b???t d??nh cho m??? v?? b??'),
(10, 'B???m, t??', 'D??nh cho b??'),
(12, 'Th???i trang', 'Th???i trang cho b??'),
(13, '????? ch??i', 'Gi??p b?? vui ch??i, h???c t???p, gi???i tr??');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

DROP TABLE IF EXISTS `tb_sanpham`;
CREATE TABLE IF NOT EXISTS `tb_sanpham` (
  `id_sanpham` int(11) NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL,
  `masanpham` varchar(100) NOT NULL,
  `giatien` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  PRIMARY KEY (`id_sanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id_sanpham`, `tensanpham`, `mota`, `masanpham`, `giatien`, `soluong`, `hinhanh`, `id_danhmuc`, `tinhtrang`) VALUES
(26, 'Th?? b??ng con cua Animo ', 'Th?? b??ng con cua Animo ??????????c l??m t??? ch???t li???u ???100% polyester cho c???m gi??c m???m m???i v?? an to??n v???i b??', '001', '99000', 33, '1670755865_thu-bong-con-cua-animo-td.png', 13, 1),
(29, '????? ch??i ?????t n???n kem c??y ng???t ng??o', 'V???i ????? ch??i ?????t n???n kem c??y ng???t ng??o Play Doh - E5332, b?? c?? th??? ph???i c??c m??u, t???o h??nh c??c m??n y??u', '232', '56000', 44, '1670756445_cua.png', 13, 1),
(33, 'S???a b???t NAN PLUS cho b??', 'S???a b???t PLUS cho b??', '32', '340000', 10, '1670756812_s???a.png', 9, 1),
(34, 'B??? qu???n ??o b?? trai', '??o ?????m cho b?? g??i', '2211', '90000', 33, '1670756866_ao.png', 12, 1),
(35, 'B??? qu???n ??o b?? trai', 'B??? qu???n ??o b?? trai', '97', '90000', 89, '1670756895_ao1.png', 12, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
