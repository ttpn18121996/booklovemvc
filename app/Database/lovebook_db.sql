-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2018 lúc 06:44 AM
-- Phiên bản máy phục vụ: 10.1.22-MariaDB
-- Phiên bản PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lovebook_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_bill`
--

CREATE TABLE `tb_bill` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `payments` varchar(200) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `note` text,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_bill`
--

INSERT INTO `tb_bill` (`id`, `full_name`, `email`, `phone`, `address`, `status`, `payments`, `total`, `note`, `created`, `updated`) VALUES
(1, 'Trịnh Trần  Phương Nam', 'ttpn18121996@gmail.com', '01264196421', '590/19 CMT8, p11, q3, tpHCM', 0, 'giao hàng thanh toán', 110000, 'thứ 2 đến sáng thứ 7 giao hàng tại Công ty TNHH MTV TM – DV PTIT', '2018-03-30', '2018-03-30'),
(2, 'Nguyễn Thị Ngọc Nhi', 'ngocnhi.nt95@gmail.com', '0913945131', 'Quận 8', 0, 'giao hàng thanh toán', 130000, '', '2018-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_billdetail`
--

CREATE TABLE `tb_billdetail` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_billdetail`
--

INSERT INTO `tb_billdetail` (`id`, `id_bill`, `id_product`, `quantity`, `total`) VALUES
(1, 1, 16, 2, 90000),
(2, 1, 21, 1, 20000),
(3, 2, 21, 1, 20000),
(4, 2, 16, 2, 90000),
(5, 2, 9, 1, 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `parent_id_1` int(11) DEFAULT NULL,
  `parent_id_2` int(11) DEFAULT NULL,
  `parent_id_3` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `module` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_category`
--

INSERT INTO `tb_category` (`id`, `parent_id_1`, `parent_id_2`, `parent_id_3`, `name`, `alias`, `level`, `module`, `status`) VALUES
(1, NULL, NULL, NULL, 'Văn học', 'van-hoc', 1, 'san-pham', 1),
(2, NULL, NULL, NULL, 'Kinh tế', 'kinh-te', 1, 'san-pham', 1),
(3, NULL, NULL, NULL, 'Thiếu nhi', 'thieu-nhi', 1, 'san-pham', 1),
(4, NULL, NULL, NULL, 'Công nghệ thông tin', 'cong-nghe-thong-tin', 1, 'san-pham', 1),
(5, NULL, NULL, NULL, 'Nguyễn Nhật Ánh', 'nguyen-nhat-anh', 1, 'tac-gia', 1),
(6, NULL, NULL, NULL, 'Vũ Trọng Phụng', 'vu-trong-phung', 1, 'tac-gia', 1),
(7, NULL, NULL, NULL, 'Nam Cao', 'nam-cao', 1, 'tac-gia', 1),
(8, NULL, NULL, NULL, 'Ngô Tất Tố', 'ngo-tat-to', 1, 'tac-gia', 1),
(9, NULL, NULL, NULL, 'Nguyễn Công Hoan', 'nguyen-cong-hoan', 1, 'tac-gia', 1),
(10, NULL, NULL, NULL, 'Nguyên Hồng', 'nguyen-hong', 1, 'tac-gia', 1),
(11, NULL, NULL, NULL, 'Robin Sharma', 'robin-sharma', 1, 'tac-gia', 1),
(12, NULL, NULL, NULL, 'Trác Nhã', 'trac-nha', 1, 'tac-gia', 1),
(13, NULL, NULL, NULL, 'Fujiko F Fujio', 'fujiko-f-fujio', 1, 'tac-gia', 1),
(14, NULL, NULL, NULL, 'Gosho Aoyama', 'gosho-aoyama', 1, 'tac-gia', 1),
(15, NULL, NULL, NULL, 'Yoshito Usui', 'yoshito-usui', 1, 'tac-gia', 1),
(16, NULL, NULL, NULL, 'WaterPC', 'waterpc', 1, 'tac-gia', 1),
(17, NULL, NULL, NULL, 'Trẻ', 'tre', 1, 'nxb', 1),
(18, NULL, NULL, NULL, 'Kim Đồng', 'kim-dong', 1, 'nxb', 1),
(19, NULL, NULL, NULL, 'Văn Hoá Thông Tin', 'van-hoa-thong-tin', 1, 'nxb', 1),
(20, NULL, NULL, NULL, 'Văn học', 'van-hoc', 1, 'nxb', 1),
(21, NULL, NULL, NULL, 'Kazuki Takahashi', 'kazuki-takahashi', 1, 'tac-gia', 1),
(22, NULL, NULL, NULL, 'Eiichiro Oda', 'eiichiro-oda', 1, 'tac-gia', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `note` text NOT NULL,
  `module` varchar(50) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `banner` varchar(255) DEFAULT 'noimg.png',
  `logo` varchar(255) DEFAULT 'noimg.png',
  `favicon` varchar(255) DEFAULT 'noimg.png',
  `keyword` text,
  `description` text,
  `content` text,
  `footer` text,
  `google_map` text,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hotline` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook` text,
  `twitter` text,
  `google_plus` text,
  `skype` text,
  `youtube` text,
  `zalo` text,
  `website` text,
  `updated` datetime NOT NULL DEFAULT '1990-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_info`
--

INSERT INTO `tb_info` (`id`, `name`, `alias`, `title`, `banner`, `logo`, `favicon`, `keyword`, `description`, `content`, `footer`, `google_map`, `email`, `phone`, `hotline`, `address`, `facebook`, `twitter`, `google_plus`, `skype`, `youtube`, `zalo`, `website`, `updated`) VALUES
(1, 'Love Book', 'love-book', 'LoveBook', '', 'logo-medium-1521530309.png', 'favicon-1-1521530930.png', 'love book', 'Website bán sách... Love Book...', '<p style=\"text-align:center\"><span style=\"font-size:16px\">Đang cập nhật...</span></p>\r\n', '<p>Đang cập nhật footer</p>\r\n', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1132.0465015983875!2d106.6666465130421!3d10.787512564527807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed25b17505f%3A0xfedbd8732e21d79d!2zNDYyLzRCIEPDoWNoIE3huqFuZyBUaMOhbmcgOCwgcGjGsOG7nW5nIDExLCBRdeG6rW4gMywgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1517755447887\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'ttpn18121996@gmail.com', '0126 419 6421', '(028) 39 934 27', '590/19 Cách Mạng tháng 8, P.11, Q.3, TP.HCM', 'https://www.facebook.com/trinhtranphuongnam', 'https://twitter.com/ttpn18121996?lang=vi', 'https://plus.google.com/u/0/101632086256745025357', 'ttpn18121996', 'https://www.youtube.com/channel/UC9fb33KV86hOIKGGCfjqMjA?view_as=subscriber', '01264196421', 'lovebook', '2018-03-22 11:07:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_module`
--

CREATE TABLE `tb_module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `keyword` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_module`
--

INSERT INTO `tb_module` (`id`, `name`, `alias`, `keyword`, `description`, `content`, `status`, `created`, `updated`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', 'Giới thiệu', 'Giới thiệu', '<p style=\"text-align:center\"><span style=\"font-size:20px\">Đang cập nhật...</span></p>\r\n', 1, 1522792800, 1522857137),
(2, 'Liên hệ', 'lien-he', 'Liên hệ', 'Liên hệ', '', 1, 1522792800, 1522792800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `category_id1` int(11) NOT NULL DEFAULT '0',
  `category_id2` int(11) NOT NULL DEFAULT '0',
  `parent_id_3` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `keyword` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created` date NOT NULL DEFAULT '0000-00-00',
  `updated` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_online`
--

CREATE TABLE `tb_online` (
  `id` int(11) NOT NULL,
  `id_online` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_online`
--

INSERT INTO `tb_online` (`id`, `id_online`, `time`, `ip`, `name`) VALUES
(1, '15221166931281035852', 1522116693, '::1', 'VPHUONG'),
(2, '15222873481333641843', 1522287348, '::1', 'VPHUONG'),
(3, '15223731471484221015', 1522373147, '::1', 'VPHUONG'),
(4, '1522395371177184345', 1522395371, '::1', 'VPHUONG'),
(5, '15224840152024872379', 1522484015, '::1', 'PH-NAM'),
(6, '152248426789522845', 1522484267, '::1', 'PH-NAM'),
(7, '15224843131568924946', 1522484313, '::1', 'PH-NAM'),
(8, '152268983584829808', 1522689835, '::1', 'PH-NAM'),
(9, '15227566941115025828', 1522756694, '::1', 'PH-NAM'),
(10, '1522892269180766439', 1522892269, '::1', 'VPHUONG'),
(11, '1522978452518325601', 1522978452, '::1', 'VPHUONG'),
(12, '15230001681838249905', 1523000168, '::1', 'VPHUONG'),
(13, '1523071978713111370', 1523071978, '::1', 'VPHUONG'),
(14, '1523416829573731651', 1523416829, '::1', 'VPHUONG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_picture`
--

CREATE TABLE `tb_picture` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `picture` text NOT NULL,
  `link` text NOT NULL,
  `level` int(11) NOT NULL,
  `module` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_picture`
--

INSERT INTO `tb_picture` (`id`, `product_id`, `name`, `alias`, `picture`, `link`, `level`, `module`, `status`, `created`, `updated`) VALUES
(1, 0, 'Banner Fairy tail', 'banner-fairy-tail', 'banner-1.jpg', '', 1, 'slide', 1, '0000-00-00', '2018-04-05'),
(2, 0, 'Banner Shin chan', 'banner-shin-chan', 'banner-2.jpg', '', 1, 'slide', 1, '0000-00-00', '0000-00-00'),
(3, 0, 'Banner Harry Potter', 'banner-harry-potter', 'banner-3.jpg', '', 1, 'slide', 1, '0000-00-00', '0000-00-00'),
(4, 0, 'Banner One piece', 'banner-one-piece', 'banner-4.jpg', '', 1, 'slide', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `category_id1` int(11) DEFAULT '0',
  `category_id2` int(11) DEFAULT '0',
  `category_id3` int(11) DEFAULT '0',
  `name` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `producer` varchar(200) DEFAULT NULL,
  `picture` text,
  `price` int(11) DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT '0',
  `real_price` int(11) NOT NULL DEFAULT '0',
  `currency` varchar(10) DEFAULT NULL,
  `description` text,
  `content` text,
  `hot_1` int(11) NOT NULL DEFAULT '0',
  `hot_2` int(11) NOT NULL DEFAULT '0',
  `hot_3` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `created` date NOT NULL DEFAULT '0000-00-00',
  `updated` date NOT NULL DEFAULT '1990-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_product`
--

INSERT INTO `tb_product` (`id`, `category_id1`, `category_id2`, `category_id3`, `name`, `alias`, `author`, `producer`, `picture`, `price`, `sale`, `real_price`, `currency`, `description`, `content`, `hot_1`, `hot_2`, `hot_3`, `status`, `created`, `updated`) VALUES
(1, 3, 14, 18, 'Thám Tử Lừng Danh Conan - Tuyển Tập Đặc Biệt: Những Câu Chuyện Lãng Mạn - Tập 1', 'tham-tu-lung-danh-conan-tuyen-tap-dac-biet-nhung-cau-chuyen-lang-man-tap-1', 'Gosho Aoyama', 'Kim Đồng', 'conan-tap-1.jpg', 45000, 0, 45000, 'VNĐ', 'Cuốn sách này tập hợp những mẩu chuyện lãng mạn giữa Conan (Shinichi) và Ran. Chuyện tình giữa Conan (Shinichi) và Ran khiến độc giả không sao rời mắt được... Tình cảm giữa họ tiến triển từng bước, như mưa dầm thấm lâu...!?', 'Cuốn sách này tập hợp những mẩu chuyện lãng mạn giữa Conan (Shinichi) và Ran. Chuyện tình giữa Conan (Shinichi) và Ran khiến độc giả không sao rời mắt được... Tình cảm giữa họ tiến triển từng bước, như mưa dầm thấm lâu...!?', 1, 0, 0, 1, '2018-03-09', '2018-03-09'),
(2, 1, 5, 17, 'Cho Tôi Xin Một Vé Đi Tuổi Thơ', 'cho-toi-xin-mot-ve-di-tuoi-tho', 'Nguyễn Nhật Ánh', 'Trẻ', 'cho-toi-mot-ve-di-tuoi-tho.gif', 63000, 30, 44000, 'VNĐ', 'Truyện Cho tôi xin một vé đi tuổi thơ là sáng tác mới nhất của nhà văn Nguyễn Nhật Ánh.', 'Truyện Cho tôi xin một vé đi tuổi thơ là sáng tác mới nhất của nhà văn Nguyễn Nhật Ánh. Nhà văn mời người đọc lên chuyến tàu quay ngược trở lại thăm tuổi thơ và tình bạn dễ thương của 4 bạn nhỏ. Những trò chơi dễ thương thời bé, tính cách thật thà, thẳng thắn một cách thông minh và dại dột, những ước mơ tự do trong lòng… khiến cuốn sách có thể làm các bậc phụ huynh lo lắng rồi thở phào. Không chỉ thích hợp với người đọc trẻ, cuốn sách còn có thể hấp dẫn và thực sự có ích cho người lớn trong quan hệ với con mình.', 0, 0, 0, 1, '2018-03-11', '2018-03-11'),
(3, 1, 5, 17, 'Đi Qua Hoa Cúc', 'di-qua-hoa-cuc', 'Nguyễn Nhật Ánh', 'Trẻ', 'di-qua-hoa-cuc-tai-ban.gif', 56000, 10, 50000, 'VNĐ', 'Cuốn Đi Qua Hoa Cúc là tập truyện dài của Nguyễn Nhật Ánh, mở đầu câu truyện tác giả kể lại tuổi ấu thơ hồn nhiên của nhân vật trong truyện, kết hợp với tả cảnh ở miền quê, những ngôi nhà nằm dọc hai bên đường đá sỏi dọc theo hai bên hàng dâm bụt và cả cây sứ cây bàng tỏa bóng mát, tỏa hương thơm trước sân nhà.', '<p>Cuốn Đi Qua Hoa Cúc là tập truyện dài của Nguyễn Nhật Ánh, mở đầu câu truyện tác giả kể lại tuổi ấu thơ hồn nhiên của nhân vật trong truyện, kết hợp với tả cảnh ở miền quê, những ngôi nhà nằm dọc hai bên đường đá sỏi dọc theo hai bên hàng dâm bụt và cả cây sứ cây bàng tỏa bóng mát, tỏa hương thơm trước sân nhà. Một nét vẽ nên thơ thật đầm ấm ở một vùng quê xa xôi tác giả dường như làm ấm lòng cho người đọc. Thật vậy mỗi cốt truyện của Nguyễn Nhật Ánh đã phác họa lên một nét quê hương ngọt ngào, một thời ấu thơ đẹp, một tình yêu của tuổi học trò cũng hòa lẫn tình yêu khát khao của bao lứa tuổi. Cuốn truyện dài Đi Qua Hoa Cúc là một trong những tác phẩm tuyệt tác hay của tác giả làm thôi thúc người đọc thêm nhiều ấn tượng và sự lôi cuốn tràn dâng trong lòng bạn đọc</p>\r\n&nbsp;\r\n<p>\"Trước nhà bà nội tôi có một cây bàng cao thật cao. Mỗi lần về thăm nội, khi chiếc xe gobel của ba tôi ngoặt quanh cái giếng đá đầu làng, bao giờ tôi cũng nhấp nhổm ở yên sau và hồi hộp ngước mắt trông lên. So với dãy hàng rào dâm bụt của những ngôi nhà nằm dọc hai bên con đường đá sỏi, kể cả ngọn sầu đông và cây sứ trắng toả hương thơm nức mũi trước sân nhà bà tôi lúc nào cũng vươn cao sừng sững. Khi nhìn lên, hễ thấy tán bàng xanh um kia hiện ra trong tầm mắt như một chấm đen mỗi lúc một lớn dần, tôi biết ngay đã sắp đến nhà bà. Và thế là tôi không nén nổi nụ cười sung sướng. Và cả e thẹn nữa, chẳng hiểu vì sao. Những lúc đó, bao giờ tôi cũng úp mặt vào lưng ba tôi để giấu đi nỗi xao xuyến của mình. Cũng như vậy, trước ngõ nhà ông ngoại tôi là một hàng rào hoa giấy đỏ. Hoa không thẫm, chỉ đỏ hồng. Vì trồng lâu năm nên cây uốn lượn chằng chịt, gốc nào gốc nấy to bằng bắp chân người. Hoa rực rỡ từng chùm, từng nhánh, phủ kín cả hai trụ cổng bằng đá ong lâu ngày lên rêu xanh mướt. Quê nội tôi thuộc một làng miền núi. Quê ngoại tôi ở miệt đồng bằng. Nhà ông tôi ở cách đường quốc lộ non một cây số về phía biển. Nhưng vì không bị cây cối che khuất nên đứng trên đường người ta vẫn có thể trông thấy rõ mồn một vừng hoa đỏ ối dưới kia. Sau này, khi đã đi xa, mỗi lần về thăm ngoại, tôi ngồi trên xe đò băng qua cầu Cẩm Lễ, mắt nôn nao ngóng về phía biển, hễ thấy hoa đỏ vẫy tay là biết đã tới nhà.\"</p>', 0, 0, 0, 1, '2018-03-11', '2018-03-11'),
(4, 3, 15, 18, 'Shin - Cậu Bé Bút Chì (Hoạt Hình Màu) - Tập 21', 'shin-cau-be-but-chi-hoat-hinh-mau-tap-21', 'Yoshito Usui', 'Kim Đồng', 'shin.jpg', 28000, 15, 24000, 'VNĐ', 'Được phát hành lần đầu vào năm 1992, bộ truyện sớm gây được tiếng vang đối với độc giả Nhật Bản và nhiều nước khác trên thế giới. Vài năm sau đó, loạt phim hoạt hình về cậu bé Shin cũng được sản xuất và phát sóng liên tục cho đến bây giờ.', '<p>Được phát hành lần đầu vào năm 1992, bộ truyện sớm gây được tiếng vang đối với độc giả Nhật Bản và nhiều nước khác trên thế giới. Vài năm sau đó, loạt phim hoạt hình về cậu bé Shin cũng được sản xuất và phát sóng liên tục cho đến bây giờ.</p>\r\n<p>Về hình thức thể hiện, tác giả sử dụng bút pháp đơn giản, thậm chí có vẻ \"ngây ngô\" hơn so với các mộ manga khác. Nội dung truyện cũng đơn giản: tất cả xoay quanh nhân vật chính là cậu bé Shin 5 tuổi với những mối quan hệ thân, sơ - bố, mẹ, hàng xóm, thầy cô, bạn bè, người quen và... cả những người không quen.</p>\r\n<p>Mỗi tập truyện khoảng 120 trang, nhưng cứ thử cầm lên xem, bạn sẽ không thể rời mắt khỏi cuốn sách cho đến tận trang cuối cùng. Với tài năng kể chuyện hấp dẫn, tác giả đã biến các trang sách của mình thành những sân chơi ngập tràn tiếng cười của những cô bé, cậu bé hồn nhiên và một thế giới tuổi thơ đa sắc màu. Những bài học giáo dục nhẹ nhàng, thấm thía cũng được lồng ghép một cách khéo léo trong từng tình huống truyện. Có thể Shin là một cậu bé cá tính, hiếu động. Có thể những trò tinh nghịch của Shin đôi khi quá trớn, chẳng chừa một ai. Nhưng sau những \"sự cố\" do Shin gây ra, người lớn thấy mình cần \"quan tâm\" đến trẻ con nhiều hơn nữa, các bạn đọc nhỏ tuổi chắc hẳn cũng được dịp nhìn nhận lại bản thân, để phân biệt điều tốt điều xấu trong cuộc sống.</p>', 0, 0, 0, 1, '2018-03-11', '2018-03-11'),
(5, 1, 5, 17, 'Ngồi Khóc Trên Cây: Truyện Dài', 'ngoi-khoc-tren-cay-truyen-dai', 'Nguyễn Nhật Ánh', 'Trẻ', 'ngoi-khoc-tren-cay.jpg', 110000, 10, 99000, 'VNĐ', 'Mở đầu là kỳ nghỉ hè tại một ngôi làng thơ mộng ven sông với nhân vật là những đứa trẻ mới lớn có vô vàn trò chơi đơn sơ hấp dẫn ghi dấu mãi trong lòng.', '<p>Mở đầu là kỳ nghỉ hè tại một ngôi làng thơ mộng ven sông với nhân vật là những đứa trẻ mới lớn có vô vàn trò chơi đơn sơ hấp dẫn ghi dấu mãi trong lòng. Mối tình đầu trong veo của cô bé Rùa và chàng sinh viên quê học ở thành phố có giống tình đầu của bạn thời đi học? Và cái cách họ thương nhau giấu giếm, không dám làm nhau buồn, khát khao hạnh phúc đến nghẹt thở có phải là câu chuyện chính?</p><p>\"Nồng nàn lên với</p><p>Cốc rượu trên tay</p><p>Xanh xanh lên với</p><p>Trời cao ngàn ngày</p><p>Dài nhanh lên với</p><p>Tóc xõa ngang mày</p><p>Lớn nhanh lên với</p><p>Bé bỏng chiều nay”</p><p>Bạn sẽ được tác giả dẫn đi liền một mạch trong một thứ cảm xúc rưng rưng của tình yêu thương. Bạn sẽ thấy may mắn vì đang đuợc sống trong cuộc sống này, thấy yêu thế những tấm tình người… tất cả đều đẹp hồn hậu một cách giản dị.</p><p>Với cuốn sách này, một lần nữa người đọc lại được Nguyễn Nhật Ánh tặng món quà quý giá: lòng tin vào điều tốt có thật trên đời.</p>', 1, 0, 0, 1, '2018-03-11', '2018-03-11'),
(6, 4, 16, 19, 'Tự Học Nhanh Đồ Họa Văn Phòng', 'tu-hoc-nhanh-do-hoa-van-phong', 'WaterPC', 'Văn Hoá Thông Tin', 'tu_hoc_nhanh_do_hoa_van_phong.jpg', 32000, 0, 32000, 'VNĐ', 'Với quyển Tự Học Nhanh Đồ Họa Văn Phòng, người học sẽ được trang bị kiến thức đồ họa văn phòng, những cách chỉnh sửa, vẽ hình ảnh, sơ đồ tổ chức đơn giản sử dụng cho mục đích văn phòng.', '<p>Với quyển Tự Học Nhanh Đồ Họa Văn Phòng, người học sẽ được trang bị kiến thức đồ họa văn phòng, những cách chỉnh sửa, vẽ hình ảnh, sơ đồ tổ chức đơn giản sử dụng cho mục đích văn phòng.</p><p>Sách gồm các phần sau:</p><p>- Cách pha trộn hình ảnh với Ms Autocollage</p><p>- Chỉnh sửa hình ảnh Snipping Tool của Windows Vista</p><p>- Học các hiệu ứng Macromedia Flash</p><p>- Học đồ họa trong Microsoft Office Word 2007</p><p>- Tạo Wordart trong Excel 2007</p><p>- Tạo sơ đồ tổ chức trong Powerpoint</p><p>- Vẽ đồ họa trên Microsoft Paint</p><p>- Hướng dẫn làm đồ họa trên Photoshop</p><p>- Chương trình đồ họa Paint.net</p><p>- Giới thiệu các chương trình xử lý ảnh</p>', 0, 0, 0, 1, '2018-03-11', '2018-03-11'),
(7, 4, 16, 19, 'Tự Khắc Phục Máy Tính Khi Bị Vi Rút Tấn Công', 'tu-khac-phuc-may-tinh-khi-bi-vi-rut-tan-cong', 'WaterPC', 'Văn Hoá Thông Tin', 'khac_phuc_mt_khi_bi_virus.jpg', 35000, 0, 35000, 'VNĐ', 'Virus máy tính có một quá trình phát triển khá dài, và nó luôn song hành cùng những chiếc \"máy tính\". Khi công nghệ phần mềm cũng như phần cứng phát triển thì virus cũng phát triển theo. Hệ điều hành thay đổi thì virus máy tính cũng tự thay đổi mình để phù hợp với hệ điều hành đó và để có thể ăn bám ký sinh. Tất nhiên virus không tự sinh ra.', '<p>Virus máy tính có một quá trình phát triển khá dài, và nó luôn song hành cùng những chiếc \"máy tính\". Khi công nghệ phần mềm cũng như phần cứng phát triển thì virus cũng phát triển theo. Hệ điều hành thay đổi thì virus máy tính cũng tự thay đổi mình để phù hợp với hệ điều hành đó và để có thể ăn bám ký sinh. Tất nhiên virus không tự sinh ra.</p><p>Có thể việc viết virus mang mục đích phá hoại, thử nghiệm hay đơn giản chỉ là một thú đùa vui ác ý. Nhưng chỉ có điều những cái đầu thông minh này khiến chúng ta phải đau đầu đối phó và cuộc chiến này gần như không chấm dứt, nó vẫn đang tiếp diễn.</p><p>Có nhiều tài liệu khác nhau nói về xuất xứ virus máy tính, âu cũng là điều dễ hiểu, bởi lẽ vào thời điểm đó con người chưa thể hình dung ra nổi một \"xã hội\" đông đúc và nguy hiểm của virus máy tính như ngày nay, điều đó cũng có nghĩa là không mấy người quan tâm tới chúng. Chỉ khi chúng ta gây ra những hậu quả nghiêm trọng như ngày nay, người ta mới lật lại hồ sơ để tìm hiểu. Vì vậy, cuốn sách Tự Khắc Phục Máy Tính Khi Bị Vi Rút Tấn Công sẽ là tài liệu bổ ích cho bạn trong việc khắc phục máy tính khi virus tấn công.</p>', 0, 0, 0, 1, '2018-03-11', '2018-03-11'),
(8, 3, 13, 18, 'Doraemon Truyện Ngắn Tập 8 (2014)', 'doraemon-truyen-ngan-tap-8-2014', 'Fujiko.F.Fujio', 'Kim Đồng', 'doraemon-tap-8-2014.jpg', 13000, 0, 13000, 'VNĐ', 'Doraemon Truyện Ngắn Tập 8 (2014)', '<p>Doraemon Truyện Ngắn Tập 8 (2014)</p>', 0, 0, 0, 1, '2018-03-15', '2018-03-15'),
(9, 1, 7, 20, 'Chí Phèo (Tập Truyện Ngắn)', 'chi-pheo-tap-truyen-ngan', 'Nam Cao', 'Văn học', 'chipheo-namcao.jpg', 40000, 50, 20000, 'VNĐ', 'Chí Phèo – tập truyện ngắn tái hiện bức tranh chân thực nông thôn Việt Nam trước 1945, nghèo đói, xơ xác trên con đường phá sản, bần cùng, hết sức thê thảm, người nông dân bị đẩy vào con đường tha hóa, lưu manh hóa.', '<p>Chí Phèo – tập truyện ngắn tái hiện bức tranh chân thực nông thôn Việt Nam trước 1945, nghèo đói, xơ xác trên con đường phá sản, bần cùng, hết sức thê thảm, người nông dân bị đẩy vào con đường tha hóa, lưu manh hóa. Nam Cao không hề bôi nhọ người nông dân, trái lại nhà văn đi sâu vào nội tâm nhân vật để khẳng định nhân phẩm và bản chất lương thiện ngay cả khi bị vùi dập, cướp mất cà nhân hình, nhân tính của người nông dân, đồng thời kết án đanh thép cái xã hội tàn bạo đó trước 1945.</p>\r\n<p>Những sáng tác của Nam Cao ngoài giá trị hiện thực sâu sắc, các tác phẩm đi sâu vào nội tâm nhân vật, để lại những cảm xúc sâu lắng trong lòng người đọc.</p>', 0, 0, 0, 1, '2018-03-15', '2018-03-15'),
(10, 2, 11, 17, 'Đời Ngắn Đừng Ngủ Dài', 'doi-ngan-ngui-dung-ngu-dai', 'Robin Sharma', 'Trẻ', 'doi-ngan-dung-ngu-dai.jpg', 42000, 0, 42000, 'VNĐ', 'Mọi lựa chọn đều giá trị. Mọi bước đi đều quan trọng. Cuộc sống vẫn diễn ra theo cách của nó, không phải theo cách của ta.', '<p>“Mọi lựa chọn đều giá trị. Mọi bước đi đều quan trọng. Cuộc sống vẫn diễn ra theo cách của nó, không phải theo cách của ta. Hãy kiên nhẫn. Tin tưởng. Hãy giống như người thợ cắt đá, đều đặn từng nhịp, ngày qua ngày. Cuối cùng, một nhát cắt duy nhất sẽ phá vỡ tảng đá và lộ ra viên kim cương. Người tràn đầy nhiệt huyết và tận tâm với việc mình làm không bao giờ bị chối bỏ. Sự thật là thế.”</p>\r\n<p>Bằng những lời chia sẻ thật ngắn gọn, dễ hiểu về những trải nghiệm và suy ngẫm trong đời, Robin Sharma tiếp tục phong cách viết của ông từ cuốn sách Điều vĩ đại đời thường để mang đến cho độc giả những bài viết như lời tâm sự, vừa chân thành vừa sâu sắc.</p>', 1, 0, 0, 1, '2018-03-15', '2018-03-15'),
(11, 2, 12, 20, 'Khéo Ăn Nói Sẽ Có Được Thiên Hạ', 'kheo-an-noi-se-co-duoc-thien-ha', 'Trác Nhã', 'Văn học', 'kheo-an-noi-se-co-duoc-thien-ha.jpg', 100000, 40, 60000, 'VNĐ', 'Xã hội hiện đại, từ xin việc đến thăng chức, từ tình yêu đến hôn nhân, từ giao lưu đến hợp tác… không việc gì không cần tài ăn nói.', '<p>Xã hội hiện đại, từ xin việc đến thăng chức, từ tình yêu đến hôn nhân, từ giao lưu đến hợp tác… không việc gì không cần tài ăn nói.</p><p>Khéo ăn nói giống như sở hữu loại “dầu bôi trơn” đảm bảo các mối quan hệ của bạn “vận hành” trơn tru. Không khéo ăn nói, gặp chuyện nhỏ mắc trở ngại, gặp chuyện lớn vấp thất bại.</p><p>Làm thế nào để nói năng trôi chảy? Làm thế nào để nói lời “đi vào lòng người”? Trong những dịp khác nhau, với những người khác nhau, ở những tình huống không giống nhau… có cuốn sách này gợi ý, bạn sẽ thành người khéo ăn nói.</p>', 1, 0, 0, 1, '2018-03-15', '2018-03-15'),
(12, 1, 8, 20, 'Tắt Đèn', 'tat-den', 'Ngô Tất Tố', 'Văn học', 'tatden.jpg', 42000, 40, 25000, 'VNĐ', 'Tắt đèn là một cuốn xã hội tiểu thuyết tả cảnh đau khổ của dân quê, của một người đàn bà nhà quê An Nam suốt đời sống trong sự nghèo đói và sự ức hiếp của bọn cường hào và người có thế lực mà lúc nào cũng vẫn hết lòng vì chồng, vì con', '<p>Tắt đèn là một cuốn xã hội tiểu thuyết tả cảnh đau khổ của dân quê, của một người đàn bà nhà quê An Nam suốt đời sống trong sự nghèo đói và sự ức hiếp của bọn cường hào và người có thế lực mà lúc nào cũng vẫn hết lòng vì chồng, vì con</p>', 1, 0, 0, 1, '2018-03-15', '2018-03-15'),
(13, 1, 7, 20, 'Lão Hạc', 'lao-hac', 'Nam Cao', 'Văn học', 'laohac.jpg', 41000, 0, 41000, 'VNĐ', 'Lão Hạc là một truyện ngắn của nhà văn Nam Cao được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.', '<p>Lão Hạc là một truyện ngắn của nhà văn Nam Cao được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.</p><p>Lão Hạc, một người nông dân chất phác, hiền lành. Lão góa vợ và có một người con trai nhưng vì quá nghèo nên không thể lấy vợ cho người con trai của mình. Người con trai lão vì thế đã rời bỏ quê hương để đến đồn điền cao su làm ăn kiếm tiền. Lão luôn trăn trở, suy nghĩ về tương lai của đứa con. Lão sống bằng nghề làm vườn, mảnh vườn mà vợ lão đã mất bao công sức để mua về và để lại cho con trai lão. So với những người khác lúc đó, gia cảnh của lão khá đầy đủ, tuy nhiên do ốm yếu hơn hai tháng và cũng vì trận bão mà lão không có việc gì để làm .</p><p>Lão có một con chó tên là Vàng - con chó do con trai lão trước khi đi đồn điền cao su đã để lại. Lão vừa coi như con vừa coi như một người thân trong gia đình. Tuy nhiên, vì gia cảnh nghèo khó không nuôi nổi nó nên ông lão đành cắn răng bán con chó đi. Lão đã rất dằn vặt bản thân mình khi mang một \"tội lỗi\" là đã nỡ tâm \"lừa một con chó\". Lão đã khóc rất nhiều với ông giáo (người hàng xóm thân thiết của lão). Nhưng cũng kể từ đó, lão sống khép kín, lủi thủi một mình. Rồi một hôm, lão quyết định tìm đến cái chết để được giải thoát sau bao tháng ngày cùng cực, đau khổ.</p><p>Và sau khi trao gửi hết tài sản cũng như nhờ vả chuyện ma chay sau này cho ông giáo, Lão Hạc đã kết thúc cuộc đời bằng một liều bả chó do xin từ Binh Tư. Cái chết của lão đau đớn và dữ dội, gây cho người đọc nhiều sự xúc động, xót xa. Lão chết để bảo toàn lòng tự trọng của mình, không để cho cái đói, cái nghèo dồn vào con đường tha hóa như Binh Tư.</p>', 1, 0, 0, 1, '2018-03-15', '2018-03-15'),
(14, 1, 10, 20, 'Bỉ Vỏ', 'bi-vo', 'Nguyên Hồng', 'Văn học', 'bi-vo.jpg', 43000, 0, 43000, 'VNĐ', 'Bỉ vỏ của Nguyên Hồng là một trong những tác phẩm xuất sắc nhất của dòng văn học hiện thực phê phán.', '<p>Bỉ vỏ của Nguyên Hồng là một trong những tác phẩm xuất sắc nhất của dòng văn học hiện thực phê phán.</p>', 1, 0, 0, 1, '2018-03-19', '2018-03-19'),
(15, 1, 9, 20, 'Người Ngựa Ngựa Người', 'nguoi-ngua-ngua-nguoi', 'Nguyễn Công Hoan', 'Văn học', 'nguoi-ngua-ngua-nguoi.jpg', 64000, 50, 32000, 'VNĐ', 'Người ngựa ngựa người là tập truyện ngắn chọn lọc của nhà văn Nguyễn Công Hoan. Từ những truyện đầu tiên, ông đã tìm đề tài trong những người nghèo khổ, cùng khốn của xã hội.', '<p>Người ngựa ngựa người là tập truyện ngắn chọn lọc của nhà văn </p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(16, 1, 6, 20, 'Số Đỏ', 'so-do', 'Vũ Trọng Phụng', 'Văn học', 'so_do.jpg', 45000, 0, 45000, 'VNĐ', 'Số đỏ là một tiểu thuyết văn học của nhà văn Vũ Trọng Phụng, đăng ở Hà Nội báo từ số 40 ngày 7 tháng 10 1936 và được in thành sách lần đầu vào năm 1938.', '<p>Số đỏ là một tiểu thuyết văn học của nhà văn Vũ Trọng Phụng, đăng ở Hà Nội báo từ số 40 ngày 7 tháng 10 1936 và được in thành sách lần đầu vào năm 1938.</p>', 1, 0, 0, 1, '2018-03-19', '2018-03-19'),
(17, 1, 7, 20, 'Đôi Mắt', 'doi-mat', 'Nam Cao', 'Văn học', 'doi-mat.jpg', 50000, 0, 50000, 'VNĐ', 'Cái cơ nghiệp một con người giàu ở nhà quê có bao nhiêu! Một mình thằng con nuôi phá đã đi đứt ngay một nửa. Các bạn bè hắn phá một phần của cái nửa kia. Còn phần trót thì những kẻ thù của hắn phá nốt khi hắn chết.', '<p>Cái cơ nghiệp một con người giàu ở nhà quê có bao nhiêu! Một mình thằng con nuôi phá đã đi đứt ngay một nửa. Các bạn bè hắn phá một phần của cái nửa kia. Còn phần trót thì những kẻ thù của hắn phá nốt khi hắn chết.</p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(18, 3, 13, 18, 'Doraemon - Chú Mèo Máy Đến Từ Tương Lai - Tập 16 (2014)', 'doraemon-chu-meo-may-den-tu-tuong-lai-tap-16-2014', 'Fujiko-F-Fujio', 'Kim Đồng', 'doraemon-tap-16.jpg', 16000, 0, 16000, 'VNĐ', 'Một chú mèo máy sinh ngày 3 tháng 9 năm 2112. Đôrêmon đã cưỡi cỗ máy thời gian đi ngược từ thế kỷ 22 về thế kỷ 20 để làm bạn với Nôbita.', '<p>Một chú mèo máy sinh ngày 3 tháng 9 năm 2112. Đôrêmon đã cưỡi cỗ máy thời gian đi ngược từ thế kỷ 22 về thế kỷ 20 để làm bạn với Nôbita. Chiếc túi 4 chiều trước bụng Đôrêmon chứa đủ loại bảo bối thần kỳ, có thể cứu nguy cho Nôbita mỗi khi cậu bạn hậu đậu này gặp rắc rối.</p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(19, 3, 21, 18, 'Yu-Gi-Oh! - Vua trò chơi (Tập 32)', 'yu-gi-oh-vui-tro-choi-tap-32', 'Kazuki Takahashi', 'Kim Đồng', 'yugioh-tap-32.jpg', 20000, 0, 20000, 'VNĐ', 'Cách đây đúng 16 năm, Yu-Gi-Oh! hay còn được biết đến với tên Vua Trò Chơi là bộ truyện tranh đã tạo nên \"hiện tượng xuất bản\" tại Nhật và Việt Nam, thu hút lượng fan hùng hậu trên cả nước.', '<p>Cách đây đúng 16 năm, Yu-Gi-Oh! hay còn được biết đến với tên Vua Trò Chơi là bộ truyện tranh đã tạo nên \"hiện tượng xuất bản\" tại Nhật và Việt Nam, thu hút lượng fan hùng hậu trên cả nước.</p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(20, 3, 13, 18, 'Doraemon - Chú Mèo Máy Đến Từ Tương Lai (Tập 37)', 'doraemon-chu-meo-may-den-tu-tuong-lai-tap-37', 'Fujiko-F-Fujio', 'Kim Đồng', 'meo-may-den-tu-tuong-lai-tap-37.jpg', 16000, 0, 16000, 'VNĐ', 'Những câu chuyện về chú mèo máy thông minh Doraemon và nhóm bạn Nobita, Shizuka, Suneo, Jaian, Dekisugi sẽ đưa chúng ta bước vào thế giới hồn nhiên, trong sáng đầy ắp tiếng cười với một kho bảo bối kì diệu - những bảo bối biến ước mơ của chúng ta thành sự thật.', '<p>Những câu chuyện về chú mèo máy thông minh Doraemon và nhóm bạn Nobita, Shizuka, Suneo, Jaian, Dekisugi sẽ đưa chúng ta bước vào thế giới hồn nhiên, trong sáng đầy ắp tiếng cười với một kho bảo bối kì diệu - những bảo bối biến ước mơ của chúng ta thành sự thật. Nhưng trên tất cả, Doraemon là hiện thân của tình bạn cao đẹp, của niềm khát khao vươn tới những tầm cao.</p>', 1, 0, 0, 1, '2018-03-19', '2018-03-19'),
(21, 3, 21, 18, 'Yu-Gi-Oh! - Vua Trò Chơi (Tập 31)', 'yu-gi-oh-vui-tro-choi-tap-31', 'Kazuki Takahashi', 'Kim Đồng', 'yugioh-tap-31.jpg', 20000, 0, 20000, 'VNĐ', 'Cách đây đúng 16 năm, Yu-Gi-Oh! hay còn được biết đến với tên Vua Trò Chơi là bộ truyện tranh đã tạo nên \"hiện tượng xuất bản\" tại Nhật và Việt Nam, thu hút lượng fan hùng hậu trên cả nước.', '<p>Cách đây đúng 16 năm, Yu-Gi-Oh! hay còn được biết đến với tên Vua Trò Chơi là bộ truyện tranh đã tạo nên \"hiện tượng xuất bản\" tại Nhật và Việt Nam, thu hút lượng fan hùng hậu trên cả nước.</p>', 1, 0, 0, 1, '2018-03-19', '2018-03-19'),
(22, 3, 14, 18, 'Thám Tử Lừng Danh Conan Tập 19 (Tái Bản 2014)', 'tham-tu-lung-danh-conan-tap-19-tai-ban-2014', 'Gosho Aoyama', 'Kim Đồng', 'conan_19.jpg', 18000, 0, 18000, 'VNĐ', 'Thám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gõshõ.', '<p>Thám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gõshõ.</p><p>Nhân vật chính của truyện là một thám tử học sinh trung học có tên là Kudo Shinichi - thám tử học đường xuất sắc - một lần bị bọn tội phạm ép uống thuốc độc và bị teo nhỏ thành học sinh tiểu học lấy tên là Conan Edogawa và luôn cố gắng truy tìm tung tích tổ chức Áo Đen nhằm lấy lại hình dáng cũ.</p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(23, 3, 15, 18, 'Shin - Cậu Bé Bút Chì 2 (Bản Đặc Biệt)', 'shin-cau-be-but-chi-2-ban-dac-biet', 'Yoshito Usui', 'Kim Đồng', 'shin-dac-biet.jpg', 16000, 0, 16000, 'VNĐ', 'Crayon Shin-chan (tên tiếng Việt: Shin-cậu bé bút chì) của tác giả Yoshito Usui là một trong những bộ manga nổi tiếng của Nhật Bản.', '<p>Crayon Shin-chan (tên tiếng Việt: Shin-cậu bé bút chì) của tác giả Yoshito Usui là một trong những bộ manga nổi tiếng của Nhật Bản. Sau khi tập 50 được xuất bản tại Nhật vào năm 2010, tác giả tiếp tục đăng tải những mẩu truyện ngắn đầy thú vị xoay quanh nhân vật chính, cậu bé Shin tinh nghịch đáng yêu, lên nguyệt san Town Manga. Và cuốn Shin đặc biệt này tập hợp 21 mẩu truyện ngắn đã được đăng trong 2 năm đó.</p>', 1, 0, 0, 1, '2018-03-19', '2018-03-19'),
(24, 3, 22, 18, 'One Piece Party (Tập 2)', 'one-piece-party-tap-2', 'Eiichiro Oda', 'Kim Đồng', 'one-piece-party-2.jpg', 19000, 0, 19000, 'VNĐ', 'Bạn đã sẵn sàng đến với cuốn ngoại truyện siêu hài hước về ONE PIECE hay chưa? Có tới 5 mẩu truyện đấy nhé!! Nào!! Cùng bắt đầu chuyến phiêu lưu đầu tiên với đầy đủ các nhân vật rất được yêu thích đi thôi...!!', '<p>Bạn đã sẵn sàng đến với cuốn ngoại truyện siêu hài hước về ONE PIECE hay chưa? Có tới 5 mẩu truyện đấy nhé!! Nào!! Cùng bắt đầu chuyến phiêu lưu đầu tiên với đầy đủ các nhân vật rất được yêu thích đi thôi...!!</p>', 1, 0, 0, 1, '2018-03-19', '2018-03-19'),
(25, 3, 22, 18, 'One Piece Party - Tập 1', 'one-piece-party-tap-1', 'Eiichiro Oda', 'Kim Đồng', 'one-piece-party-1.jpg', 19000, 0, 19000, 'VNĐ', 'Bạn đã sẵn sàng đến với cuốn ngoại truyện siêu hài hước về ONE PIECE hay chưa!? Có tới 5 mẩu truyện đấy nhé!! Nào!! Cùng bắt đầu chuyến phiêu lưu đầu tiên với đầy đủ các nhân vật rất được yêu thích đi thôi...!!', '<p>Bạn đã sẵn sàng đến với cuốn ngoại truyện siêu hài hước về ONE PIECE hay chưa!? Có tới 5 mẩu truyện đấy nhé!! Nào!! Cùng bắt đầu chuyến phiêu lưu đầu tiên với đầy đủ các nhân vật rất được yêu thích đi thôi...!!</p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(26, 1, 6, 20, 'Làm Đĩ', 'lam-di', 'Vũ Trọng Phụng', 'Văn học', 'lam-di.jpg', 45000, 0, 45000, 'VNĐ', 'Làm đĩ là một trong số những cuốn sách gây ra nhiều cuộc tranh luận trong hơn suốt nửa thế kỷ qua.', '<p>Làm đĩ là một trong số những cuốn sách gây ra nhiều cuộc tranh luận trong hơn suốt nửa thế kỷ qua.</p>', 0, 0, 0, 1, '2018-03-19', '2018-03-19'),
(27, 3, 21, 18, 'Yu-Gi-Oh! - Vua Trò Chơi (Tập 34)', 'yu-gi-oh-vua-tro-choi-tap-34', 'Kazuki Takahashi', 'Kim Đồng', 'yu-gi-oh-tap34-1521620867.jpg', 20000, 20, 16000, 'VNĐ', 'Cách đây đúng 16 năm, Yu-Gi-Oh! hay còn được biết đến với tên Vua Trò Chơi là bộ truyện tranh đã tạo nên \"hiện tượng xuất bản\" tại Nhật và Việt Nam, thu hút lượng fan hùng hậu trên cả nước.', '<p><span style=\"font-size:14px\">C&aacute;ch đ&acirc;y đ&uacute;ng 16 năm, Yu-Gi-Oh! hay c&ograve;n được biết đến với t&ecirc;n Vua Tr&ograve; Chơi l&agrave; bộ&nbsp;truyện tranh đ&atilde; tạo n&ecirc;n &quot;hiện tượng xuất bản&quot; tại Nhật v&agrave; Việt Nam, thu h&uacute;t lượng fan h&ugrave;ng hậu tr&ecirc;n cả nước. Người ta nhớ đến Yugi với những trận đấu b&agrave;i chiến thuật (Hay b&agrave;i ma thuật, b&agrave;i Magic đ&ograve;i hỏi tư duy, sự t&iacute;nh to&aacute;n v&agrave; tr&iacute; tuệ của người chơi) đầy hấp dẫn v&agrave; kịch t&iacute;nh, k&eacute;o theo l&agrave; cơn sốt chơi b&agrave;i ở ngo&agrave;i đời thực, với h&agrave;ng trăm triệu qu&acirc;n b&agrave;i được b&aacute;n ra tr&ecirc;n to&agrave;n thế giới, c&ugrave;ng với những giải đấu quốc tế nhận được rất nhiều sự quan t&acirc;m của cộng đồng &quot;b&agrave;i thủ&quot; ở c&aacute;c quốc gia. Trong lần trở lại n&agrave;y, &quot;huyền thoại&quot; Yu-Gi-0h! sẽ được chỉn chu lại về cả nội dung v&agrave; h&igrave;nh thức để đ&aacute;p ứng sự k&igrave; vọng của độc giả.</span></p>\r\n', 1, 0, 0, 1, '2018-03-21', '2018-03-22'),
(28, 3, 22, 18, 'One Piece (Tái bản 2014) - Tập 3', 'one-piece-tai-ban-2014-tap-3', 'Eiichiro Oda', 'Kim Đồng', 'one-piece-tap-3-1521622972.jpg', 20000, 0, 20000, 'VNĐ', 'One Piece (Vua hải tặc) bộ thuộc thể loại truyện tranh Hành động kể về một cậu bé tên Monkey D. Luffy, giong buồm ra khơi trên chuyến hành trình tìm kho báu huyền thoại One Piece và trở thành Vua hải tặc.', '<p><span style=\"font-size:14px\">One Piece (Vua hải tặc) bộ thuộc thể loại truyện tranh H&agrave;nh động kể về một cậu b&eacute; t&ecirc;n Monkey D. Luffy, giong buồm ra khơi tr&ecirc;n chuyến h&agrave;nh tr&igrave;nh t&igrave;m kho b&aacute;u huyền thoại One Piece v&agrave; trở th&agrave;nh Vua hải tặc. Để l&agrave;m được điều n&agrave;y, cậu phải đến được tận c&ugrave;ng của v&ugrave;ng biển nguy hiểm v&agrave; chết ch&oacute;c nhất thế giới: Grand Line (Đại Hải Tr&igrave;nh). Luffy đội tr&ecirc;n đầu chiếc mũ rơm như một nh&acirc;n chứng lịch sử v&igrave; chiếc mũ rơm đ&oacute; đ&atilde; từng thuộc về hải tặc h&ugrave;ng mạnh: Hải tặc vương Gol. D. Roger v&agrave; tứ ho&agrave;ng Shank &quot;t&oacute;c đỏ&quot;. Luffy l&atilde;nh đạo nh&oacute;m hải tặc Mũ Rơm qua East Blue (Biển Đ&ocirc;ng) v&agrave; rồi tiến đến Grand Line. Cậu theo dấu ch&acirc;n của vị vua hải tặc qu&aacute; cố, Gol. D. Roger, chu du từ đảo n&agrave;y sang đảo kh&aacute;c để đến với kho b&aacute;u vĩ đại.</span></p>\r\n', 0, 0, 0, 1, '2018-03-21', '2018-03-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `picture` varchar(255) DEFAULT 'user.png',
  `role_id` int(10) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `remember_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `picture`, `role_id`, `status`, `remember_token`) VALUES
(1, '6626', '92a25094d222672e9b145f8a74171bc8', 'Phương Nam', 'Trịnh Trần', 'ttpn18121996@gmail.com', '01264196421', '590/19 Cách Mạng tháng 8, p11, q3, tpHCM', 'user.png', 0, 1, ''),
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'Minh Nguyệt', 'Tằng', 'minhnguyet1196@gmail.com', '01696845713', 'Quận 12', 'Nguyet.jpg', 1, 1, ''),
(3, 'ngocnhi.nt95@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ngọc Nhi', 'Nguyễn Thị', 'ngocnhi.nt95@gmail.com', '0913945131', 'Quận 8', 'user.png', 2, 1, ''),
(4, 'ttpn18121996@gmail.com', '202cb962ac59075b964b07152d234b70', ' Phương Nam', 'Trịnh Trần', 'ttpn18121996@gmail.com', '01264196421', '590/19 CMT8, p11, q3, tpHCM', 'user.png', 2, 1, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_billdetail`
--
ALTER TABLE `tb_billdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_module`
--
ALTER TABLE `tb_module`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_online`
--
ALTER TABLE `tb_online`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_picture`
--
ALTER TABLE `tb_picture`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_bill`
--
ALTER TABLE `tb_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tb_billdetail`
--
ALTER TABLE `tb_billdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT cho bảng `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tb_module`
--
ALTER TABLE `tb_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tb_online`
--
ALTER TABLE `tb_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `tb_picture`
--
ALTER TABLE `tb_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
