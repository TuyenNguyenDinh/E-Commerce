-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2021 lúc 03:59 AM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `description`) VALUES
(1, 'LG', '1617581124_9303111_9c31505fc8e3def1e6d7e1eada5038ef.svg', '<p>LG Electronics, INC (LG) l&agrave; một C&ocirc;ng ty đổi mới c&ocirc;ng nghệ h&agrave;ng đầu thế giới chuy&ecirc;n sản xuất c&ocirc;ng nghệ điện tử d&acirc;n dụng, truyền th&ocirc;ng di động v&agrave; thiết bị gia dụng, với hơn 84.000 nh&acirc;n vi&ecirc;n l&agrave;m việc trong 112 lĩnh vực bao gồm 81 c&ocirc;ng ty con tr&ecirc;n to&agrave;n thế giới. LG gồm c&oacute; năm đơn vị kinh doanh - giải tr&iacute; gia đ&igrave;nh, truyền th&ocirc;ng di động, thiết bị gia dụng, điều h&ograve;a kh&ocirc;ng kh&iacute; v&agrave; giải ph&aacute;p kinh doanh. LG l&agrave; một trong những nh&agrave; sản xuất TV m&agrave;n h&igrave;nh phẳng, c&aacute;c sản phẩm &acirc;m thanh v&agrave; video, điện thoại di động, điều h&ograve;a kh&ocirc;ng kh&iacute; v&agrave; m&aacute;y giặt h&agrave;ng đầu thế giới. LG tiếp tục nỗ lực tăng cường sự hiện diện thương hiệu LG tr&ecirc;n to&agrave;n cầu v&agrave; tối đa h&oacute;a tăng trưởng lợi nhuận. C&ocirc;ng ty chuy&ecirc;n về c&aacute;c lĩnh vực kinh doanh: thiết bị giải tr&iacute; gia đ&igrave;nh, truyền th&ocirc;ng di động, thiết bị gia đ&igrave;nh,...</p>'),
(2, 'Panasonic', '1617581219_7466281_ed084c1b6a5f835ce5ba86f5703a01a4.png', '<p><a href=\"http://www.panasonic.com/vn/\" target=\"_blank\">Panasonic</a>&nbsp;l&agrave; nh&agrave; sản xuất h&agrave;ng đầu thế giới về chế tạo v&agrave; ph&aacute;t triển c&aacute;c sản phẩm điện tử d&acirc;n dụng, điện tử doanh nghiệp, v&agrave; điện tử c&ocirc;ng nghiệp. Trong đ&oacute; c&oacute; thể kể đến như:&nbsp;<a href=\"https://www.dienmayxanh.com/tivi-panasonic\" target=\"_blank\">tivi</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/may-lanh-panasonic\" target=\"_blank\">m&aacute;y lạnh</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/may-giat-panasonic\" target=\"_blank\">m&aacute;y giặt</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/tu-lanh-panasonic\" target=\"_blank\">tủ lạnh</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/may-nuoc-nong-panasonic\" target=\"_blank\">m&aacute;y nước n&oacute;ng</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/quat-panasonic\" target=\"_blank\">quạt</a>&hellip;</p>'),
(3, 'Sony', '1617581262_8973853_f57f6fe2fecadc1cc9fac59b781a26d9.png', '<p>Sony l&agrave; một trong những thương hiệu to&agrave;n cầu nổi tiếng nhất về điện tử ti&ecirc;u d&ugrave;ng nhờ v&agrave;o những s&aacute;ng tạo đột ph&aacute; mang t&iacute;nh c&aacute;ch mạng v&agrave; chất lượng sản phẩm. Th&agrave;nh c&ocirc;ng của Sony tại thị trường Việt Nam l&agrave; bởi thương hiệu Sony lu&ocirc;n thể hiện được bản sắc ri&ecirc;ng một c&aacute;ch mạnh mẽ v&agrave; ấn tượng, kết hợp giữa chất lượng sản phẩm-c&ocirc;ng nghệ h&agrave;ng đầu-kiểu d&aacute;ng thiết kế độc đ&aacute;o v&agrave; c&aacute;ch x&acirc;y dựng thương hiệu s&aacute;ng tạo-t&ocirc;n trọng văn h&oacute;a bản địa tiếp tục n&acirc;ng cao tinh thần s&aacute;ng tạo của m&igrave;nh để lu&ocirc;n tạo ra sản phẩm chất lượng cho người d&ugrave;ng.</p>'),
(4, 'JBL', '1617581578_8122837_273ba401550d97d1c89c0924100f168d.jpg', '<p>N&oacute;i đến thương hiệu JBL, kh&ocirc;ng chỉ ở c&aacute;c nước phương T&acirc;y m&agrave; ngay tại Việt Nam, những người ở thập ni&ecirc;n 80, 90 vẫn c&ograve;n nhớ đến chiếc loa th&ugrave;ng cỡ lớn với chất &acirc;m mạnh mẽ, s&ocirc;i động. Trong suốt 60 năm ph&aacute;t triển, JBL Hoa K&igrave; đ&atilde; để lại nhiều dấu ấn trong tiềm thức của người y&ecirc;u &acirc;m thanh.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'TV', '1617580934_9600978_efc84b25992fe6c316284c02d2862a13.jpg'),
(2, 'Tủ lạnh', '1617580983_5968750_c365cbc58efcb1507dd8e88da0580d01.jpg'),
(3, 'Loa Karaoke', '1617580993_7674246_1b5a2cc4b1a1097b6d0b1543d6a4416a.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_district` bigint(20) UNSIGNED NOT NULL,
  `id_province` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_acc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `password`, `address`, `email`, `id_district`, `id_province`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `image_acc`) VALUES
(1, 'Nguyễn Đình Tuyên Nguyễn Đình', '+84856014749', '$2y$10$TynzjUdmd3X8g14asjZfSugdZRdsbc..tjIwhAikuq86iRy/rQUX6', 'Thông Phước Yên, xã Quảng Thọ, huyện Quảng Điền, tỉnh Thừa Thiên Huế', 'tuyennguyendinh1608@gmail.com', 201, 57, NULL, NULL, '2021-04-02 19:53:19', '2021-04-02 19:53:19', 'image_user.jpg'),
(2, 'Guest', '1234567890', '$2y$10$Yo6tZuax6tiWPos0y7sAjefEYjyEO3M6OIzO0XSPLPUOERGpBsFHq', '2149 Grove Street', 'guest@gmail.com', 484, 13, NULL, NULL, '2021-04-03 01:09:29', '2021-04-03 01:09:29', 'image_user.jpg'),
(3, 'Gues1', '123456677', '$2y$10$IKb42RJ7zLBV2AapxWFnVumCBKWtexZuRBNlSZaZeX1yXFc6acj9O', 'Thôn Phước Yên, xã Quảng Thọ,', 'pessi01478522@gmail.com', 239, 56, NULL, NULL, '2021-04-03 18:53:13', '2021-04-04 16:58:02', 'image_user.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_shipping_address`
--

CREATE TABLE `customer_shipping_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_province` bigint(20) UNSIGNED NOT NULL,
  `id_district` bigint(20) UNSIGNED NOT NULL,
  `address_detail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `discount_percent` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `id_product`, `discount_percent`) VALUES
(1, 1, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_province` bigint(20) UNSIGNED DEFAULT NULL,
  `district_name` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `id_province`, `district_name`) VALUES
(1, 59, 'Bình Chánh'),
(2, 59, 'Bình Tân'),
(3, 59, 'Bình Thạnh'),
(4, 59, 'Cần Giờ'),
(5, 59, 'Củ Chi'),
(6, 59, 'Gò Vấp'),
(7, 59, 'Hóc Môn'),
(8, 59, 'Nhà Bè'),
(9, 59, 'Phú Nhuận'),
(10, 59, 'Quận 1'),
(11, 59, 'Quận 10'),
(12, 59, 'Quận 11'),
(13, 59, 'Quận 12'),
(14, 59, 'Quận 2'),
(15, 59, 'Quận 3'),
(16, 59, 'Quận 4'),
(17, 59, 'Quận 5'),
(18, 59, 'Quận 6'),
(19, 59, 'Quận 7'),
(20, 59, 'Quận 8'),
(21, 59, 'Quận 9'),
(22, 59, 'Tân Bình'),
(23, 59, 'Tân Phú'),
(24, 59, 'Thủ Đức'),
(25, 25, 'Ba Đình'),
(26, 25, 'Ba Vì'),
(27, 25, 'Bắc Từ Liêm'),
(28, 25, 'Cầu Giấy'),
(29, 25, 'Chương Mỹ'),
(30, 25, 'Đan Phượng'),
(31, 25, 'Đông Anh'),
(32, 25, 'Đống Đa'),
(33, 25, 'Gia Lâm'),
(34, 25, 'Hà Đông'),
(35, 25, 'Hai Bà Trưng'),
(36, 25, 'Hoài Đức'),
(37, 25, 'Hoàn Kiếm'),
(38, 25, 'Hoàng Mai'),
(39, 25, 'Long Biên'),
(40, 25, 'Mê Linh'),
(41, 25, 'Mỹ Đức'),
(42, 25, 'Nam Từ Liêm'),
(43, 25, 'Phú Xuyên'),
(44, 25, 'Phúc Thọ'),
(45, 25, 'Quốc Oai'),
(46, 25, 'Sóc Sơn'),
(47, 25, 'Sơn Tây'),
(48, 25, 'Tây Hồ'),
(49, 25, 'Thạch Thất'),
(50, 25, 'Thanh Oai'),
(51, 25, 'Thanh Trì'),
(52, 25, 'Thanh Xuân'),
(53, 25, 'Thường Tín'),
(54, 25, 'Ứng Hòa'),
(55, 16, 'Cẩm Lệ'),
(56, 16, 'Hải Châu'),
(57, 16, 'Hòa Vang'),
(58, 16, 'Hoàng Sa'),
(59, 16, 'Liên Chiểu'),
(60, 16, 'Ngũ Hành Sơn'),
(61, 16, 'Sơn Trà'),
(62, 16, 'Thanh Khê'),
(63, 9, 'Bàu Bàng'),
(64, 9, 'Bến Cát'),
(65, 9, 'Dầu Tiếng'),
(66, 9, 'Dĩ An'),
(67, 9, 'Phú Giáo'),
(68, 9, 'Tân Uyên'),
(69, 9, 'Thủ Dầu Một'),
(70, 9, 'Thuận An'),
(71, 20, 'Biên Hòa'),
(72, 20, 'Cẩm Mỹ'),
(73, 20, 'Định Quán'),
(74, 20, 'Long Khánh'),
(75, 20, 'Long Thành'),
(76, 20, 'Nhơn Trạch'),
(77, 20, 'Tân Phú'),
(78, 20, 'Thống Nhất'),
(79, 20, 'Trảng Bom'),
(80, 20, 'Vĩnh Cửu'),
(81, 20, 'Xuân Lộc'),
(82, 32, 'Cam Lâm'),
(83, 32, 'Cam Ranh'),
(84, 32, 'Diên Khánh'),
(85, 32, 'Khánh Sơn'),
(86, 32, 'Khánh Vĩnh'),
(87, 32, 'Nha Trang'),
(88, 32, 'Ninh Hòa'),
(89, 32, 'Trường Sa'),
(90, 32, 'Vạn Ninh'),
(91, 28, 'An Dương'),
(92, 28, 'An Lão'),
(93, 28, 'Bạch Long Vĩ'),
(94, 28, 'Cát Hải'),
(95, 28, 'Đồ Sơn'),
(96, 28, 'Dương Kinh'),
(97, 28, 'Hải An'),
(98, 28, 'Hồng Bàng'),
(99, 28, 'Kiến An'),
(100, 28, 'Kiến Thụy'),
(101, 28, 'Lê Chân'),
(102, 28, 'Ngô Quyền'),
(103, 28, 'Thủy Nguyên'),
(104, 28, 'Tiên Lãng'),
(105, 28, 'Vĩnh Bảo'),
(106, 39, 'Bến Lức'),
(107, 39, 'Cần Đước'),
(108, 39, 'Cần Giuộc'),
(109, 39, 'Châu Thành'),
(110, 39, 'Đức Hòa'),
(111, 39, 'Đức Huệ'),
(112, 39, 'Kiến Tường'),
(113, 39, 'Mộc Hóa'),
(114, 39, 'Tân An'),
(115, 39, 'Tân Hưng'),
(116, 39, 'Tân Thạnh'),
(117, 39, 'Tân Trụ'),
(118, 39, 'Thạnh Hóa'),
(119, 39, 'Thủ Thừa'),
(120, 39, 'Vĩnh Hưng'),
(121, 47, 'Bắc Trà My'),
(122, 47, 'Đại Lộc'),
(123, 47, 'Điện Bàn'),
(124, 47, 'Đông Giang'),
(125, 47, 'Duy Xuyên'),
(126, 47, 'Hiệp Đức'),
(127, 47, 'Hội An'),
(128, 47, 'Nam Giang'),
(129, 47, 'Nam Trà My'),
(130, 47, 'Nông Sơn'),
(131, 47, 'Núi Thành'),
(132, 47, 'Phú Ninh'),
(133, 47, 'Phước Sơn'),
(134, 47, 'Quế Sơn'),
(135, 47, 'Tam Kỳ'),
(136, 47, 'Tây Giang'),
(137, 47, 'Thăng Bình'),
(138, 47, 'Tiên Phước'),
(139, 2, 'Bà Rịa'),
(140, 2, 'Châu Đức'),
(141, 2, 'Côn Đảo'),
(142, 2, 'Đất Đỏ'),
(143, 2, 'Long Điền'),
(144, 2, 'Tân Thành'),
(145, 2, 'Vũng Tàu'),
(146, 2, 'Xuyên Mộc'),
(147, 17, 'Buôn Đôn'),
(148, 17, 'Buôn Hồ'),
(149, 17, 'Buôn Ma Thuột'),
(150, 17, 'Cư Kuin'),
(151, 17, 'Cư M\'gar\''),
(152, 17, 'Ea H\'Le'),
(153, 17, 'Ea Kar'),
(154, 17, 'Ea Súp'),
(155, 17, 'Krông Ana'),
(156, 17, 'Krông Bông'),
(157, 17, 'Krông Buk'),
(158, 17, 'Krông Năng'),
(159, 17, 'Krông Pắc'),
(160, 17, 'Lăk'),
(161, 17, 'M\'Đrăk'),
(162, 14, ' Thới Lai'),
(163, 14, 'Bình Thủy'),
(164, 14, 'Cái Răng'),
(165, 14, 'Cờ Đỏ'),
(166, 14, 'Ninh Kiều'),
(167, 14, 'Ô Môn'),
(168, 14, 'Phong Điền'),
(169, 14, 'Thốt Nốt'),
(170, 14, 'Vĩnh Thạnh'),
(171, 12, 'Bắc Bình'),
(172, 12, 'Đảo Phú Quý'),
(173, 12, 'Đức Linh'),
(174, 12, 'Hàm Tân'),
(175, 12, 'Hàm Thuận Bắc'),
(176, 12, 'Hàm Thuận Nam'),
(177, 12, 'La Gi'),
(178, 12, 'Phan Thiết'),
(179, 12, 'Tánh Linh'),
(180, 12, 'Tuy Phong'),
(181, 36, 'Bảo Lâm'),
(182, 36, 'Bảo Lộc'),
(183, 36, 'Cát Tiên'),
(184, 36, 'Đạ Huoai'),
(185, 36, 'Đà Lạt'),
(186, 36, 'Đạ Tẻh'),
(187, 36, 'Đam Rông'),
(188, 36, 'Di Linh'),
(189, 36, 'Đơn Dương'),
(190, 36, 'Đức Trọng'),
(191, 36, 'Lạc Dương'),
(192, 36, 'Lâm Hà'),
(193, 57, 'A Lưới'),
(194, 57, 'Huế'),
(195, 57, 'Hương Thủy'),
(196, 57, 'Hương Trà'),
(197, 57, 'Nam Đông'),
(198, 57, 'Phong Điền'),
(199, 57, 'Phú Lộc'),
(200, 57, 'Phú Vang'),
(201, 57, 'Quảng Điền'),
(202, 33, 'An Biên'),
(203, 33, 'An Minh'),
(204, 33, 'Châu Thành'),
(205, 33, 'Giang Thành'),
(206, 33, 'Giồng Riềng'),
(207, 33, 'Gò Quao'),
(208, 33, 'Hà Tiên'),
(209, 33, 'Hòn Đất'),
(210, 33, 'Kiên Hải'),
(211, 33, 'Kiên Lương'),
(212, 33, 'Phú Quốc'),
(213, 33, 'Rạch Giá'),
(214, 33, 'Tân Hiệp'),
(215, 33, 'U minh Thượng'),
(216, 33, 'Vĩnh Thuận'),
(217, 6, 'Bắc Ninh'),
(218, 6, 'Gia Bình'),
(219, 6, 'Lương Tài'),
(220, 6, 'Quế Võ'),
(221, 6, 'Thuận Thành'),
(222, 6, 'Tiên Du'),
(223, 6, 'Từ Sơn'),
(224, 6, 'Yên Phong'),
(225, 49, 'Ba Chẽ'),
(226, 49, 'Bình Liêu'),
(227, 49, 'Cẩm Phả'),
(228, 49, 'Cô Tô'),
(229, 49, 'Đầm Hà'),
(230, 49, 'Đông Triều'),
(231, 49, 'Hạ Long'),
(232, 49, 'Hải Hà'),
(233, 49, 'Hoành Bồ'),
(234, 49, 'Móng Cái'),
(235, 49, 'Quảng Yên'),
(236, 49, 'Tiên Yên'),
(237, 49, 'Uông Bí'),
(238, 49, 'Vân Đồn'),
(239, 56, 'Bá Thước'),
(240, 56, 'Bỉm Sơn'),
(241, 56, 'Cẩm Thủy'),
(242, 56, 'Đông Sơn'),
(243, 56, 'Hà Trung'),
(244, 56, 'Hậu Lộc'),
(245, 56, 'Hoằng Hóa'),
(246, 56, 'Lang Chánh'),
(247, 56, 'Mường Lát'),
(248, 56, 'Nga Sơn'),
(249, 56, 'Ngọc Lặc'),
(250, 56, 'Như Thanh'),
(251, 56, 'Như Xuân'),
(252, 56, 'Nông Cống'),
(253, 56, 'Quan Hóa'),
(254, 56, 'Quan Sơn'),
(255, 56, 'Quảng Xương'),
(256, 56, 'Sầm Sơn'),
(257, 56, 'Thạch Thành'),
(258, 56, 'Thanh Hóa'),
(259, 56, 'Thiệu Hóa'),
(260, 56, 'Thọ Xuân'),
(261, 56, 'Thường Xuân'),
(262, 56, 'Tĩnh Gia'),
(263, 56, 'Triệu Sơn'),
(264, 56, 'Vĩnh Lộc'),
(265, 56, 'Yên Định'),
(266, 41, 'Anh Sơn'),
(267, 41, 'Con Cuông'),
(268, 41, 'Cửa Lò'),
(269, 41, 'Diễn Châu'),
(270, 41, 'Đô Lương'),
(271, 41, 'Hoàng Mai'),
(272, 41, 'Hưng Nguyên'),
(273, 41, 'Kỳ Sơn'),
(274, 41, 'Nam Đàn'),
(275, 41, 'Nghi Lộc'),
(276, 41, 'Nghĩa Đàn'),
(277, 41, 'Quế Phong'),
(278, 41, 'Quỳ Châu'),
(279, 41, 'Quỳ Hợp'),
(280, 41, 'Quỳnh Lưu'),
(281, 41, 'Tân Kỳ'),
(282, 41, 'Thái Hòa'),
(283, 41, 'Thanh Chương'),
(284, 41, 'Tương Dương'),
(285, 41, 'Vinh'),
(286, 41, 'Yên Thành'),
(287, 27, 'Bình Giang'),
(288, 27, 'Cẩm Giàng'),
(289, 27, 'Chí Linh'),
(290, 27, 'Gia Lộc'),
(291, 27, 'Hải Dương'),
(292, 27, 'Kim Thành'),
(293, 27, 'Kinh Môn'),
(294, 27, 'Nam Sách'),
(295, 27, 'Ninh Giang'),
(296, 27, 'Thanh Hà'),
(297, 27, 'Thanh Miện'),
(298, 27, 'Tứ Kỳ'),
(299, 22, 'An Khê'),
(300, 22, 'AYun Pa'),
(301, 22, 'Chư Păh'),
(302, 22, 'Chư Pưh'),
(303, 22, 'Chư Sê'),
(304, 22, 'ChưPRông'),
(305, 22, 'Đăk Đoa'),
(306, 22, 'Đăk Pơ'),
(307, 22, 'Đức Cơ'),
(308, 22, 'Ia Grai'),
(309, 22, 'Ia Pa'),
(310, 22, 'KBang'),
(311, 22, 'Kông Chro'),
(312, 22, 'Krông Pa'),
(313, 22, 'Mang Yang'),
(314, 22, 'Phú Thiện'),
(315, 22, 'Plei Ku'),
(316, 11, 'Bình Long'),
(317, 11, 'Bù Đăng'),
(318, 11, 'Bù Đốp'),
(319, 11, 'Bù Gia Mập'),
(320, 11, 'Chơn Thành'),
(321, 11, 'Đồng Phú'),
(322, 11, 'Đồng Xoài'),
(323, 11, 'Hớn Quản'),
(324, 11, 'Lộc Ninh'),
(325, 11, 'Phú Riềng'),
(326, 11, 'Phước Long'),
(327, 31, 'Ân Thi'),
(328, 31, 'Hưng Yên'),
(329, 31, 'Khoái Châu'),
(330, 31, 'Kim Động'),
(331, 31, 'Mỹ Hào'),
(332, 31, 'Phù Cừ'),
(333, 31, 'Tiên Lữ'),
(334, 31, 'Văn Giang'),
(335, 31, 'Văn Lâm'),
(336, 31, 'Yên Mỹ'),
(337, 8, 'An Lão'),
(338, 8, 'An Nhơn'),
(339, 8, 'Hoài Ân'),
(340, 8, 'Hoài Nhơn'),
(341, 8, 'Phù Cát'),
(342, 8, 'Phù Mỹ'),
(343, 8, 'Quy Nhơn'),
(344, 8, 'Tây Sơn'),
(345, 8, 'Tuy Phước'),
(346, 8, 'Vân Canh'),
(347, 8, 'Vĩnh Thạnh'),
(348, 58, 'Cái Bè'),
(349, 58, 'Cai Lậy'),
(350, 58, 'Châu Thành'),
(351, 58, 'Chợ Gạo'),
(352, 58, 'Gò Công'),
(353, 58, 'Gò Công Đông'),
(354, 58, 'Gò Công Tây'),
(355, 58, 'Huyện Cai Lậy'),
(356, 58, 'Mỹ Tho'),
(357, 58, 'Tân Phú Đông'),
(358, 58, 'Tân Phước'),
(359, 54, 'Đông Hưng'),
(360, 54, 'Hưng Hà'),
(361, 54, 'Kiến Xương'),
(362, 54, 'Quỳnh Phụ'),
(363, 54, 'Thái Bình'),
(364, 54, 'Thái Thuỵ'),
(365, 54, 'Tiền Hải'),
(366, 54, 'Vũ Thư'),
(367, 3, 'Bắc Giang'),
(368, 3, 'Hiệp Hòa'),
(369, 3, 'Lạng Giang'),
(370, 3, 'Lục Nam'),
(371, 3, 'Lục Ngạn'),
(372, 3, 'Sơn Động'),
(373, 3, 'Tân Yên'),
(374, 3, 'Việt Yên'),
(375, 3, 'Yên Dũng'),
(376, 3, 'Yên Thế'),
(377, 30, 'Cao Phong'),
(378, 30, 'Đà Bắc'),
(379, 30, 'Hòa Bình'),
(380, 30, 'Kim Bôi'),
(381, 30, 'Kỳ Sơn'),
(382, 30, 'Lạc Sơn'),
(383, 30, 'Lạc Thủy'),
(384, 30, 'Lương Sơn'),
(385, 30, 'Mai Châu'),
(386, 30, 'Tân Lạc'),
(387, 30, 'Yên Thủy'),
(388, 1, 'An Phú'),
(389, 1, 'Châu Đốc'),
(390, 1, 'Châu Phú'),
(391, 1, 'Châu Thành'),
(392, 1, 'Chợ Mới'),
(393, 1, 'Long Xuyên'),
(394, 1, 'Phú Tân'),
(395, 1, 'Tân Châu'),
(396, 1, 'Thoại Sơn'),
(397, 1, 'Tịnh Biên'),
(398, 1, 'Tri Tôn'),
(399, 63, 'Bình Xuyên'),
(400, 63, 'Lập Thạch'),
(401, 63, 'Phúc Yên'),
(402, 63, 'Sông Lô'),
(403, 63, 'Tam Đảo'),
(404, 63, 'Tam Dương'),
(405, 63, 'Vĩnh Tường'),
(406, 63, 'Vĩnh Yên'),
(407, 63, 'Yên Lạc'),
(408, 53, 'Bến Cầu'),
(409, 53, 'Châu Thành'),
(410, 53, 'Dương Minh Châu'),
(411, 53, 'Gò Dầu'),
(412, 53, 'Hòa Thành'),
(413, 53, 'Tân Biê'),
(414, 53, 'Tân Châu'),
(415, 53, 'Tây Ninh'),
(416, 53, 'Trảng Bàng'),
(417, 55, 'Đại Từ'),
(418, 55, 'Định Hóa'),
(419, 55, 'Đồng Hỷ'),
(420, 55, 'Phổ Yên'),
(421, 55, 'Phú Bình'),
(422, 55, 'Phú Lương'),
(423, 55, 'Sông Công'),
(424, 55, 'Thái Nguyên'),
(425, 55, 'Võ Nhai'),
(426, 38, 'Bắc Hà'),
(427, 38, 'Bảo Thắng'),
(428, 38, 'Bảo Yên'),
(429, 38, 'Bát Xát'),
(430, 38, 'Lào Cai'),
(431, 38, 'Mường Khương'),
(432, 38, 'Sa Pa'),
(433, 38, 'Văn Bàn'),
(434, 38, 'Xi Ma Cai'),
(435, 40, 'Giao Thủy'),
(436, 40, 'Hải Hậu'),
(437, 40, 'Mỹ Lộc'),
(438, 40, 'Nam Định'),
(439, 40, 'Nam Trực'),
(440, 40, 'Nghĩa Hưng'),
(441, 40, 'Trực Ninh'),
(442, 40, 'Vụ Bản'),
(443, 40, 'Xuân Trường'),
(444, 40, 'Ý Yên'),
(445, 48, 'Ba Tơ'),
(446, 48, 'Bình Sơn'),
(447, 48, 'Đức Phổ'),
(448, 48, 'Lý Sơn'),
(449, 48, 'Minh Long'),
(450, 48, 'Mộ Đức'),
(451, 48, 'Nghĩa Hành'),
(452, 48, 'Quảng Ngãi'),
(453, 48, 'Sơn Hà'),
(454, 48, 'Sơn Tây'),
(455, 48, 'Sơn Tịnh'),
(456, 48, 'Tây Trà'),
(457, 48, 'Trà Bồng'),
(458, 48, 'Tư Nghĩa'),
(459, 7, 'Ba Tri'),
(460, 7, 'Bến Tre'),
(461, 7, 'Bình Đại'),
(462, 7, 'Châu Thành'),
(463, 7, 'Chợ Lách'),
(464, 7, 'Giồng Trôm'),
(465, 7, 'Mỏ Cày Bắc'),
(466, 7, 'Mỏ Cày Nam'),
(467, 7, 'Thạnh Phú'),
(468, 18, 'Cư Jút'),
(469, 18, 'Dăk GLong'),
(470, 18, 'Dăk Mil'),
(471, 18, 'Dăk R\'Lấp'),
(472, 18, 'Dăk Song'),
(473, 18, 'Gia Nghĩa'),
(474, 18, 'Krông Nô'),
(475, 18, 'Tuy Đức'),
(476, 13, 'Cà Mau'),
(477, 13, 'Cái Nước'),
(478, 13, 'Đầm Dơi'),
(479, 13, 'Năm Căn'),
(480, 13, 'Ngọc Hiển'),
(481, 13, 'Phú Tân'),
(482, 13, 'Thới Bình'),
(483, 13, 'Trần Văn Thời'),
(484, 13, 'U Minh'),
(485, 62, 'Bình Minh'),
(486, 62, 'Bình Tân'),
(487, 62, 'Long Hồ'),
(488, 62, 'Mang Thít'),
(489, 62, 'Tam Bình'),
(490, 62, 'Trà Ôn'),
(491, 62, 'Vĩnh Long'),
(492, 62, 'Vũng Liêm'),
(493, 42, 'Gia Viễn'),
(494, 42, 'Hoa Lư'),
(495, 42, 'Kim Sơn'),
(496, 42, 'Nho Quan'),
(497, 42, 'Ninh Bình'),
(498, 42, 'Tam Điệp'),
(499, 42, 'Yên Khánh'),
(500, 42, 'Yên Mô'),
(501, 44, 'Cẩm Khê'),
(502, 44, 'Đoan Hùng'),
(503, 44, 'Hạ Hòa'),
(504, 44, 'Lâm Thao'),
(505, 44, 'Phù Ninh'),
(506, 44, 'Phú Thọ'),
(507, 44, 'Tam Nông'),
(508, 44, 'Tân Sơn'),
(509, 44, 'Thanh Ba'),
(510, 44, 'Thanh Sơn'),
(511, 44, 'Thanh Thủy'),
(512, 44, 'Việt Trì'),
(513, 44, 'Yên Lập'),
(514, 43, 'Bác Ái'),
(515, 44, 'Ninh Hải'),
(516, 44, 'Ninh Phước'),
(517, 44, 'Ninh Sơn'),
(518, 44, 'Phan Rang - Tháp Chàm'),
(519, 44, 'Thuận Bắc'),
(520, 44, 'Thuận Nam'),
(521, 45, 'Đông Hòa'),
(522, 45, 'Đồng Xuân'),
(523, 45, 'Phú Hòa'),
(524, 45, 'Sơn Hòa'),
(525, 45, 'Sông Cầu'),
(526, 45, 'Sông Hinh'),
(527, 45, 'Tây Hòa'),
(528, 45, 'Tuy An'),
(529, 45, 'Tuy Hòa'),
(530, 24, 'Bình Lục'),
(531, 24, 'Duy Tiên'),
(532, 24, 'Kim Bảng'),
(533, 24, 'Lý Nhân'),
(534, 24, 'Phủ Lý'),
(535, 24, 'Thanh Liêm'),
(536, 26, 'Cẩm Xuyên'),
(537, 26, 'Can Lộc'),
(538, 26, 'Đức Thọ'),
(539, 26, 'Hà Tĩnh'),
(540, 26, 'Hồng Lĩnh'),
(541, 26, 'Hương Khê'),
(542, 26, 'Hương Sơn'),
(543, 26, 'Kỳ Anh'),
(544, 26, 'Lộc Hà'),
(545, 26, 'Nghi Xuân'),
(546, 26, 'Thạch Hà'),
(547, 26, 'Vũ Quang'),
(548, 21, 'Cao Lãnh'),
(549, 21, 'Châu Thành'),
(550, 21, 'Hồng Ngự'),
(551, 21, 'Huyện Cao Lãnh'),
(552, 21, 'Huyện Hồng Ngự'),
(553, 21, 'Lai Vung'),
(554, 21, 'Lấp Vò'),
(555, 21, 'Sa Đéc'),
(556, 21, 'Tam Nông'),
(557, 21, 'Tân Hồng'),
(558, 21, 'Thanh Bình'),
(559, 21, 'Tháp Mười'),
(560, 51, 'Châu Thành'),
(561, 51, 'Cù Lao Dung'),
(562, 51, 'Kế Sách'),
(563, 51, 'Long Phú'),
(564, 51, 'Mỹ Tú'),
(565, 51, 'Mỹ Xuyên'),
(566, 51, 'Ngã Năm'),
(567, 51, 'Sóc Trăng'),
(568, 51, 'Thạnh Trị'),
(569, 51, 'Trần Đề'),
(570, 51, 'Vĩnh Châu'),
(571, 34, 'Đăk Glei'),
(572, 34, 'Đăk Hà'),
(573, 34, 'Đăk Tô'),
(574, 34, 'Ia H\'Drai'),
(575, 34, 'Kon Plông'),
(576, 34, 'Kon Rẫy'),
(577, 34, 'KonTum'),
(578, 34, 'Ngọc Hồi'),
(579, 34, 'Sa Thầy'),
(580, 34, 'Tu Mơ Rông'),
(581, 46, 'Ba Đồn'),
(582, 46, 'Bố Trạch'),
(583, 46, 'Đồng Hới'),
(584, 46, 'Lệ Thủy'),
(585, 46, 'Minh Hóa'),
(586, 46, 'Quảng Ninh'),
(587, 46, 'Quảng Trạch'),
(588, 46, 'Tuyên Hóa'),
(589, 50, 'Cam Lộ'),
(590, 50, 'Đa Krông'),
(591, 50, 'Đảo Cồn Cỏ'),
(592, 50, 'Đông Hà'),
(593, 50, 'Gio Linh'),
(594, 50, 'Hải Lăng'),
(595, 50, 'Hướng Hóa'),
(596, 50, 'Quảng Trị'),
(597, 50, 'Triệu Phong'),
(598, 50, 'Vĩnh Linh'),
(599, 60, 'Càng Long'),
(600, 60, 'Cầu Kè'),
(601, 60, 'Cầu Ngang'),
(602, 60, 'Châu Thành'),
(603, 60, 'Duyên Hải'),
(604, 60, 'Tiểu Cần'),
(605, 60, 'Trà Cú'),
(606, 60, 'Trà Vinh'),
(607, 29, 'Châu Thành'),
(608, 29, 'Châu Thành A'),
(609, 29, 'Long Mỹ'),
(610, 29, 'Ngã Bảy'),
(611, 29, 'Phụng Hiệp'),
(612, 29, 'Vị Thanh'),
(613, 29, 'Vị Thủy'),
(614, 52, 'Bắc Yên'),
(615, 52, 'Mai Sơn'),
(616, 52, 'Mộc Châu'),
(617, 52, 'Mường La'),
(618, 52, 'Phù Yên'),
(619, 52, 'Quỳnh Nhai'),
(620, 52, 'Sơn La'),
(621, 52, 'Sông Mã'),
(622, 52, 'Sốp Cộp'),
(623, 52, 'Thuận Châu'),
(624, 52, 'Vân Hồ'),
(625, 52, 'Yên Châu'),
(626, 5, 'Bạc Liêu'),
(627, 5, 'Đông Hải'),
(628, 5, 'Giá Rai'),
(629, 5, 'Hòa Bình'),
(630, 5, 'Hồng Dân'),
(631, 5, 'Phước Long'),
(632, 5, 'Vĩnh Lợi'),
(633, 64, 'Lục Yên'),
(634, 64, 'Mù Cang Chải'),
(635, 64, 'Nghĩa Lộ'),
(636, 64, 'Trạm Tấu'),
(637, 64, 'Trấn Yên'),
(638, 64, 'Văn Chấn'),
(639, 64, 'Văn Yên'),
(640, 64, 'Yên Bái'),
(641, 64, 'Yên Bình'),
(642, 61, 'Chiêm Hóa'),
(643, 61, 'Hàm Yên'),
(644, 61, 'Lâm Bình'),
(645, 61, 'Na Hang'),
(646, 61, 'Sơn Dương'),
(647, 61, 'Tuyên Quang'),
(648, 61, 'Yên Sơn'),
(649, 19, 'Điện Biên'),
(650, 19, 'Điện Biên Đông'),
(651, 19, 'Điện Biên Phủ'),
(652, 19, 'Mường Ảng'),
(653, 19, 'Mường Chà'),
(654, 19, 'Mường Lay'),
(655, 19, 'Mường Nhé'),
(656, 19, 'Nậm Pồ'),
(657, 19, 'Tủa Chùa'),
(658, 19, 'Tuần Giáo'),
(659, 35, 'Lai Châu'),
(660, 35, 'Mường Tè'),
(661, 35, 'Nậm Nhùn'),
(662, 35, 'Phong Thổ'),
(663, 35, 'Sìn Hồ'),
(664, 35, 'Tam Đường'),
(665, 35, 'Tân Uyên'),
(666, 35, 'Than Uyên'),
(667, 37, 'Bắc Sơn'),
(668, 37, 'Bình Gia'),
(669, 37, 'Cao Lộc'),
(670, 37, 'Chi Lăng'),
(671, 37, 'Đình Lập'),
(672, 37, 'Hữu Lũng'),
(673, 37, 'Lạng Sơn'),
(674, 37, 'Lộc Bình'),
(675, 37, 'Tràng Định'),
(676, 37, 'Văn Lãng'),
(677, 37, 'Văn Quan'),
(678, 23, 'Bắc Mê'),
(679, 23, 'Bắc Quang'),
(680, 23, 'Đồng Văn'),
(681, 23, 'Hà Giang'),
(682, 23, 'Hoàng Su Phì'),
(683, 23, 'Mèo Vạc'),
(684, 23, 'Quản Bạ'),
(685, 23, 'Quang Bình'),
(686, 23, 'Vị Xuyên'),
(687, 23, 'Xín Mần'),
(688, 23, 'Yên Minh'),
(689, 4, 'Ba Bể'),
(690, 4, 'Bắc Kạn'),
(691, 4, 'Bạch Thông'),
(692, 4, 'Chợ Đồn'),
(693, 4, 'Chợ Mới'),
(694, 4, 'Na Rì'),
(695, 4, 'Ngân Sơn'),
(696, 4, 'Pác Nặm'),
(697, 15, 'Bảo Lạc'),
(698, 15, 'Bảo Lâm'),
(699, 15, 'Cao Bằng'),
(700, 15, 'Hạ Lang'),
(701, 15, 'Hà Quảng'),
(702, 15, 'Hòa An'),
(703, 15, 'Nguyên Bình'),
(704, 15, 'Phục Hòa'),
(705, 15, 'Quảng Uyên'),
(706, 15, 'Thạch An'),
(707, 15, 'Thông Nông'),
(708, 15, 'Trà Lĩnh'),
(709, 15, 'Trùng Khánh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_24_003720_create_brands_table', 1),
(5, '2021_03_24_003734_create_products_table', 1),
(6, '2021_03_24_003747_create_categories_table', 1),
(7, '2021_03_24_003800_create_customers_table', 1),
(8, '2021_03_24_003815_create_orders_table', 1),
(9, '2021_03_24_003827_create_orderdetails_table', 1),
(10, '2021_03_24_003901_create_comments_table', 1),
(11, '2021_03_24_003915_create_coupons_table', 1),
(12, '2021_03_24_003939_create_wishlist_table', 1),
(13, '2021_03_24_004618_add_foreignkey_to_orderdetails', 1),
(14, '2021_03_24_004630_add_foreignkey_to_comments', 1),
(15, '2021_03_24_004643_add_foreignkey_to_orders', 1),
(16, '2021_03_24_004656_add_foreignkey_to_products', 1),
(17, '2021_03_24_004709_add_foreignkey_to_wishlist', 1),
(18, '2021_03_27_010730_add_oldprice_to_products', 1),
(19, '2021_03_30_003755_add_image_acc_to_customers', 1),
(20, '2021_03_30_065935_create_discount_table', 1),
(21, '2021_03_30_070804_add_foreignkey_to_discount', 1),
(22, '2021_03_30_084010_add_description_to_brands', 1),
(23, '2021_03_31_021032_create_district_table', 1),
(24, '2021_03_31_021111_create_province_table', 1),
(25, '2021_03_31_022732_add_foreignkey_to_district', 1),
(26, '2021_04_02_064807_create_customer_shipping_address_table', 1),
(27, '2021_04_02_090239_add_foreignkey_to_customers', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `ship_date` date NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `id_brand` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `lenght` double NOT NULL DEFAULT 0,
  `weight` double NOT NULL DEFAULT 0,
  `height` double NOT NULL DEFAULT 0,
  `width` double NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` int(11) NOT NULL DEFAULT 0,
  `old_price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_category`, `id_brand`, `name_product`, `image1`, `image2`, `image3`, `image4`, `price`, `quantity`, `lenght`, `weight`, `height`, `width`, `description`, `like`, `old_price`) VALUES
(1, 1, 1, 'Smart Tivi NanoCell LG 4K 43 inch 43NANO79TND', '1617585089_9150145_a81b93f5c47ff6d065f57d035862329a.jpg', '1617585089_3194022_9191735e0ad347a2d54fcb62f6b32a88.jpg', '1617585089_2988537_dff3f65601cd5c4abe57f439e44affaa.jpg', '1617585089_676800_149dc5eeede19b7c203f33fd695a21fa.jpg', 12030000, 22, 97.3, 99, 57.2, 0, '<p>asdfasdfasdf</p>', 0, 0),
(2, 3, 4, 'Cặp Loa Karaoke JBL Pasion 10', '1617581764_6262166_9fcaf09f07de2e5633bbe29dca773cd6.jpg', '1617581764_7040447_32fd318120a5043fb54939e1dc6395fb.jpg', '1617581764_260034_8e9f32e010d636af6eba58a07369c458.jpg', '1617581764_9623466_a781b2cbaf8515f3da192c8cae8975fe.jpg', 14000000, 10, 52, 11, 29.5, 0, '<p><img alt=\"Thông số kỹ thuật Cặp Loa Karaoke JBL Pasion 10\" src=\"https://cdn.tgdd.vn/Products/Images/2162/230732/Kit/cap-loa-jbl-pasion-10-note-1.jpg\" style=\"height:585px; width:780px\" /></p>\r\n\r\n<h3>Kiểu d&aacute;ng đơn giản, thiết kế thời thượng</h3>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/dan-loa-dvd/bo-loa-jbl-pasion-10\" target=\"_blank\">Cặp loa Karaoke&nbsp;JBL Pasion 10</a>&nbsp;c&oacute; kết cấu tinh tế, khung viền nh&ocirc;m v&agrave;ng b&oacute;ng lo&aacute;ng cho loa nổi bật từ mọi g&oacute;c nh&igrave;n. Sản phẩm tạo n&ecirc;n &acirc;m thanh hay đặc sắc hơn nhờ sử dụng chất liệu vỏ loa l&agrave; gỗ MDF cao cấp phủ nhựa vinyl, lớp lưới bảo vệ hợp kim sơn tĩnh điện&nbsp;d&agrave;y bền.</p>\r\n\r\n<p>Cho kh&ocirc;ng kh&iacute; bữa tiệc tại gia đ&igrave;nh, địa điểm kinh doanh dịch vụ&nbsp;Karaoke th&ecirc;m h&agrave;o hứng với logo&nbsp;JBL Entertainment cho &aacute;nh s&aacute;ng trắng rất đẹp khi loa ph&aacute;t &acirc;m thanh.</p>', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province`
--

CREATE TABLE `province` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `province`
--

INSERT INTO `province` (`id`, `province`) VALUES
(1, 'An Giang'),
(2, 'Bà Rịa - Vũng Tàu'),
(3, 'Bắc Giang'),
(4, 'Bắc Kạn'),
(5, 'Bạc Liêu'),
(6, 'Bắc Ninh'),
(7, 'Bến Tre'),
(8, 'Bình Định'),
(9, 'Bình Dương'),
(11, 'Bình Phước'),
(12, 'Bình Thuận'),
(13, 'Cà Mau'),
(14, 'Cần Thơ'),
(15, 'Cao Bằng'),
(16, 'Đà Nẵng'),
(17, 'Đắk Lắk'),
(18, 'Đắk Nông'),
(19, 'Điện Biên'),
(20, 'Đồng Nai'),
(21, 'Đồng Tháp'),
(22, 'Gia Lai'),
(23, 'Hà Giang'),
(24, 'Hà Nam'),
(25, 'Hà Nội'),
(26, 'Hà Tĩnh'),
(27, 'Hải Dương'),
(28, 'Hải Phòng'),
(29, 'Hậu Giang'),
(30, 'Hòa Bình'),
(31, 'Hưng Yên'),
(32, 'Khánh Hòa'),
(33, 'Kiên Giang'),
(34, 'Kon Tum'),
(35, 'Lai Châu'),
(36, 'Lâm Đồng'),
(37, 'Lạng Sơn'),
(38, 'Lào Cai'),
(39, 'Long An'),
(40, 'Nam Định'),
(41, 'Nghệ An'),
(42, 'Ninh Bình'),
(43, 'Ninh Thuận'),
(44, 'Phú Thọ'),
(45, 'Phú Yên'),
(46, 'Quảng Bình'),
(47, 'Quảng Nam'),
(48, 'Quảng Ngãi'),
(49, 'Quảng Ninh'),
(50, 'Quảng Trị'),
(51, 'Sóc Trăng'),
(52, 'Sơn La'),
(53, 'Tây Ninh'),
(54, 'Thái Bình'),
(55, 'Thái Nguyên'),
(56, 'Thanh Hóa'),
(57, 'Thừa Thiên Huế'),
(58, 'Tiền Giang'),
(59, 'TP Hồ Chí Minh'),
(60, 'Trà Vinh'),
(61, 'Tuyên Quang'),
(62, 'Vĩnh Long'),
(63, 'Vĩnh Phúc'),
(64, 'Yên Bái');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id_product_foreign` (`id_product`),
  ADD KEY `comments_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_id_district_foreign` (`id_district`),
  ADD KEY `customers_id_province_foreign` (`id_province`);

--
-- Chỉ mục cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_shipping_address_id_customer_foreign` (`id_customer`),
  ADD KEY `customer_shipping_address_id_province_foreign` (`id_province`),
  ADD KEY `customer_shipping_address_id_district_foreign` (`id_district`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id_province_foreign` (`id_province`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_id_order_foreign` (`id_order`),
  ADD KEY `orderdetails_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`),
  ADD KEY `products_id_brand_foreign` (`id_brand`);

--
-- Chỉ mục cho bảng `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_id_customer_foreign` (`id_customer`),
  ADD KEY `wishlist_id_product_foreign` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `province`
--
ALTER TABLE `province`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_id_district_foreign` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_id_province_foreign` FOREIGN KEY (`id_province`) REFERENCES `province` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD CONSTRAINT `customer_shipping_address_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_shipping_address_id_district_foreign` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_shipping_address_id_province_foreign` FOREIGN KEY (`id_province`) REFERENCES `province` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_id_province_foreign` FOREIGN KEY (`id_province`) REFERENCES `province` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
