-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2022 lúc 02:51 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `codelean`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'adidas', '2022-11-20 07:02:12', '2022-11-29 08:18:46'),
(2, 'Channel', 'channel', '2022-11-20 07:02:58', '2022-11-20 07:02:58'),
(4, 'Louis Vuitton', 'louis-vuitton', '2022-11-20 07:03:51', '2022-11-20 07:05:17'),
(5, 'Prada', 'prada', '2022-11-20 07:07:01', '2022-11-20 07:07:01'),
(6, 'Dior', 'dior', '2022-11-20 07:12:35', '2022-11-20 07:12:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_12_09_085528_create_orders_table', 1),
(6, '2020_12_09_085832_create_order_details_table', 1),
(7, '2020_12_09_085936_create_products_table', 1),
(8, '2020_12_09_090029_create_brands_table', 1),
(9, '2020_12_09_090110_create_product_categories_table', 1),
(10, '2020_12_09_090148_create_product_images_table', 1),
(11, '2020_12_09_090228_create_product_details_table', 1),
(12, '2020_12_09_090308_create_product_comments_table', 1),
(13, '2020_12_09_090355_create_blogs_table', 1),
(14, '2020_12_09_090437_create_blog_comments_table', 1),
(15, '2022_11_30_131936_create_sizes_table', 2),
(16, '2022_11_30_141641_create_product_size_table', 3),
(17, '2022_12_02_025935_create_sliders_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('huyenha200204@gmail.com', '$2y$10$yb2CyPcMNr1q3pVtA4A1VO27jZ0hhhBmYzDZ0cqNILaajVC3zq0hm', '2022-11-17 07:28:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_category_id`, `name`, `slug`, `description`, `price`, `qty`, `discount`, `sku`, `featured`, `tag`, `image`, `created_at`, `updated_at`) VALUES
(14, 6, 6, 'Áo khoác blazer, áo vest nữ kiểu Hàn Quốc tay lỡ', 'ao-khoac-blazer-ao-vest-nu-kieu-han-quoc-tay-lo', '<p>TH&Ocirc;NG TIN SẢN PHẨM<br />\r\n-&nbsp;&nbsp; &nbsp;T&ecirc;n sản phẩm: &Aacute;o vest nữ phong c&aacute;ch thời trang c&ocirc;ng sở<br />\r\n-&nbsp;&nbsp; &nbsp;Thương hiệu: WFSTUDIOS<br />\r\n-&nbsp;&nbsp; &nbsp;Xuất xứ: Việt Nam<br />\r\n-&nbsp;&nbsp; &nbsp;Chất liệu: Vải tuyết mưa cao cấp nhẹ m&aacute;t, &iacute;t nhăn, co gi&atilde;n nhẹ<br />\r\n-&nbsp;&nbsp; &nbsp;M&agrave;u sắc: Đen, trắng, xanh, v&agrave;ng<br />\r\n-&nbsp;&nbsp; &nbsp;Size: S, M, L, XL</p>\r\n\r\n<p>M&Ocirc; TẢ SẢN PHẨM<br />\r\n&nbsp;&nbsp; &nbsp;&Aacute;o kho&aacute;c vest blazer nữ phong c&aacute;ch H&agrave;n Quốc - &nbsp;BLZ01 - h&agrave;ng thiết kế được l&agrave;m từ chất liệu vải tuyết mưa cao cấp, d&agrave;y dặn nhưng vẫn đủ tho&aacute;ng m&aacute;t, &iacute;t nhăn, co gi&atilde;n nhẹ gi&uacute;p bạn thoải m&aacute;i hoạt động.&nbsp;<br />\r\nPhần t&uacute;i ch&igrave;m kết hợp với nắp t&uacute;i phong c&aacute;ch H&agrave;n Quốc sẽ khiến bạn tr&ocirc;ng thật trẻ trung, thời thượng.&nbsp;<br />\r\nSản phẩm được thiết kế v&agrave; ho&agrave;n thiện tại Việt Nam, tỉ mỉ trong từng đường kim mũi chỉ.&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&Aacute;o vest nữ rất dễ d&agrave;ng phối đồ, đa phong c&aacute;ch, đi l&agrave;m hay đi chơi đều cực kỳ ổn. Sẽ l&agrave; ho&agrave;n hảo nếu được kết hợp c&ugrave;ng những chiếc &aacute;o hai d&acirc;y lụa ngọc trai mềm mịn của WF Studios. Ngo&agrave;i ra b&ecirc;n m&igrave;nh đ&atilde; c&oacute; ch&acirc;n v&aacute;y, quần ngắn v&agrave; quần d&agrave;i c&ugrave;ng t&ocirc;ng m&agrave;u, c&ugrave;ng chất vải với &aacute;o blazer để phối th&agrave;nh 1 set ho&agrave;nh chỉnh</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&Aacute;o blazer nữ nh&agrave; WF c&oacute; 4 m&agrave;u đen, trắng, xanh v&agrave; v&agrave;ng để lựa chọn. C&aacute;c n&agrave;ng c&oacute; thể lựa chọn cho m&igrave;nh một em &aacute;o hai d&acirc;y xinh xắn n&agrave;y theo bảng size sau nh&eacute;: S (40-48kg), M (48-53kg), L (54-58kg), XL (58-64kg)</p>\r\n\r\n<p><br />\r\nLƯU &Yacute;<br />\r\n- Bảng size chỉ mang t&iacute;nh chất tham khảo, t&ugrave;y thuộc v&agrave;o số đo cơ thể mỗi người v&agrave; chất liệu vải kh&aacute;c nhau sẽ c&oacute; sự ch&ecirc;nh lệch nhất định từ 1 - 2cm<br />\r\n- M&agrave;u sắc vải/ sản phẩm c&oacute; thể sẽ ch&ecirc;nh lệch thực tế một phần nhỏ, do ảnh hưởng về độ lệch m&agrave;u của &aacute;nh s&aacute;ng nhưng vẫn đảm bảo chất lượng.&nbsp;</p>', 567, 0, 456, 'g43', 0, 'ao nu', 'vest21669649441.jfif', '2022-11-28 15:30:41', '2022-11-28 15:30:41'),
(15, 2, 3, 'Áo thun blazer nữ', 'ao-thun-blazer-nu', '<p>&nbsp;</p>\r\n\r\n<p>TH&Ocirc;NG TIN SẢN PHẨM<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;T&ecirc;n sản phẩm: &Aacute;o vest nữ phong c&aacute;ch thời trang c&ocirc;ng sở<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;Thương hiệu: WFSTUDIOS<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;Xuất xứ: Việt Nam<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;Chất liệu: Vải tuyết mưa cao cấp nhẹ m&aacute;t, &iacute;t nhăn, co gi&atilde;n nhẹ<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;M&agrave;u sắc: Đen, trắng, xanh, v&agrave;ng<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;Size: S, M, L, XL</p>\r\n\r\n<p>M&Ocirc; TẢ SẢN PHẨM<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&Aacute;o kho&aacute;c vest blazer nữ phong c&aacute;ch H&agrave;n Quốc - &nbsp;BLZ01 - h&agrave;ng thiết kế được l&agrave;m từ chất liệu vải tuyết mưa cao cấp, d&agrave;y dặn nhưng vẫn đủ tho&aacute;ng m&aacute;t, &iacute;t nhăn, co gi&atilde;n nhẹ gi&uacute;p bạn thoải m&aacute;i hoạt động.&nbsp;<br />\r\nPhần t&uacute;i ch&igrave;m kết hợp với nắp t&uacute;i phong c&aacute;ch H&agrave;n Quốc sẽ khiến bạn tr&ocirc;ng thật trẻ trung, thời thượng.&nbsp;<br />\r\nSản phẩm được thiết kế v&agrave; ho&agrave;n thiện tại Việt Nam, tỉ mỉ trong từng đường kim mũi chỉ.&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&Aacute;o vest nữ rất dễ d&agrave;ng phối đồ, đa phong c&aacute;ch, đi l&agrave;m hay đi chơi đều cực kỳ ổn. Sẽ l&agrave; ho&agrave;n hảo nếu được kết hợp c&ugrave;ng những chiếc &aacute;o hai d&acirc;y lụa ngọc trai mềm mịn của WF Studios. Ngo&agrave;i ra b&ecirc;n m&igrave;nh đ&atilde; c&oacute; ch&acirc;n v&aacute;y, quần ngắn v&agrave; quần d&agrave;i c&ugrave;ng t&ocirc;ng m&agrave;u, c&ugrave;ng chất vải với &aacute;o blazer để phối th&agrave;nh 1 set ho&agrave;nh chỉnh</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&Aacute;o blazer nữ nh&agrave; WF c&oacute; 4 m&agrave;u đen, trắng, xanh v&agrave; v&agrave;ng để lựa chọn. C&aacute;c n&agrave;ng c&oacute; thể lựa chọn cho m&igrave;nh một em &aacute;o hai d&acirc;y xinh xắn n&agrave;y theo bảng size sau nh&eacute;: S (40-48kg), M (48-53kg), L (54-58kg), XL (58-64kg)</p>\r\n\r\n<p><br />\r\nLƯU &Yacute;<br />\r\n- Bảng size chỉ mang t&iacute;nh chất tham khảo, t&ugrave;y thuộc v&agrave;o số đo cơ thể mỗi người v&agrave; chất liệu vải kh&aacute;c nhau sẽ c&oacute; sự ch&ecirc;nh lệch nhất định từ 1 - 2cm<br />\r\n- M&agrave;u sắc vải/ sản phẩm c&oacute; thể sẽ ch&ecirc;nh lệch thực tế một phần nhỏ, do ảnh hưởng về độ lệch m&agrave;u của &aacute;nh s&aacute;ng nhưng vẫn đảm bảo chất lượng.&nbsp;</p>', 456, 0, NULL, 'a111', 0, 'ao nu', 'ao thun1669733003.jfif', '2022-11-29 14:43:23', '2022-12-02 08:49:16'),
(16, 2, 9, 'Áo Thun Nam In Chữ I Don\'T Need Google My friend Knows Everything!', 'ao-thun-nam-in-chu-i-don-t-need-google-my-friend-knows-everything', '<p>Lưu &yacute;: c&ugrave;ng một h&igrave;nh in, bạn c&oacute; thể chọn quần &aacute;o c&oacute; m&agrave;u sắc kh&aacute;c nhau, &quot;&quot;Tất Cả &aacute;o ph&ocirc;ng đ&atilde; sẵn s&agrave;ng!!! &Aacute;o thun cotton 100% chất lượng cao mới! Tất cả &aacute;o thun của ch&uacute;ng t&ocirc;i đều được l&agrave;m từ 100% cotton, mặc rất thoải m&aacute;i v&agrave; bền. Tự h&agrave;o mặc tr&ecirc;n chiếc &aacute;o sơ mi của bạn! Ch&uacute;ng t&ocirc;i cung cấp nhiều loại quần &aacute;o chất lượng cao tr&ecirc;n mạng để bạn c&oacute; thể ngồi tại nh&agrave; v&agrave; mua được những sản phẩm y&ecirc;u th&iacute;ch, vừa đ&aacute;p ứng được những sản phẩm chất lượng của m&igrave;nh! Ch&uacute;ng c&oacute; gi&aacute; cả hợp l&yacute; v&agrave; nhiều mẫu m&agrave;u sắc đa dạng! Chiếc &aacute;o ph&ocirc;ng cổ thuyền đơn giản n&agrave;y được l&agrave;m thủ c&ocirc;ng từ loại b&ocirc;ng tốt nhất trong những vật dụng cần thiết h&agrave;ng ng&agrave;y để tạo n&ecirc;n n&eacute;t mềm mại. H&igrave;nh d&aacute;ng slouchy n&agrave;y c&oacute; cổ thuyền c&oacute; g&acirc;n, tay ngắn v&agrave; đường kh&acirc;u tr&ecirc;n c&ugrave;ng gọn g&agrave;ng. Được l&agrave;m từ 100% cotton chất lượng cao, ch&uacute;ng t&ocirc;i cung cấp cho bạn những sản phẩm tốt nhất. Vận chuyển nhanh ch&oacute;ng trong v&ograve;ng hai ng&agrave;y K&iacute;ch thước tr&ecirc;n được đo bằng cm Do c&aacute;c ph&eacute;p đo thủ c&ocirc;ng, xin vui l&ograve;ng cho ph&eacute;p 1-2 cm l&agrave; kh&aacute;c nhau. Sản phẩm n&agrave;y được vận chuyển trực tiếp từ nước ngo&agrave;i. M&agrave;u sắc thực tế c&oacute; thể hơi kh&aacute;c so với h&igrave;nh ảnh do c&agrave;i đặt m&agrave;n h&igrave;nh</p>', 500, 0, 450, 'a12', 0, 'ao nam', 'size-ao-khoac-nam-11669820083.jpg', '2022-11-30 14:54:43', '2022-11-30 14:54:43'),
(17, 1, 9, 'Áo Thun voltes v', 'ao-thun-voltes-v', '<p>Chi tiết sản phẩm Size: S(35-43kg) M (44-51kg) L (52-59kg) XL (60-69kg) XXL (70-78kg) XXXL (79-84kg) - V&iacute; dụ 100% 24s 170-180 Gsm - &Aacute;o thun Body size - M&agrave;n h&igrave;nh in mềm mại cảm gi&aacute;c bền - Chất liệu thấm h&uacute;t mồ h&ocirc;i mặc thoải m&aacute;i -in Lụa (Trực tiếp h&agrave;ng may mặc) Lưu &yacute; Kiểm tra kết quả in lụa th&ocirc;ng qua kiểm so&aacute;t chất lượng của nh&oacute;m để kết quả tối đa hơn....</p>', 369, 0, 267, 'a23', 0, 'ao nam', 'ao-khoac-nam21669820318.jfif', '2022-11-30 14:58:38', '2022-11-30 14:58:38'),
(18, 4, 9, 'Áo thun nam cổ tròn HAFOS cao cấp, lịch lãm HAFOS', 'ao-thun-nam-co-tron-hafos-cao-cap-lich-lam-hafos', '<p>T&Ecirc;N SP : &Aacute;o thun nam cổ tr&ograve;n tay ngắn cao cấp nam t&iacute;nh HAFOS</p>\r\n\r\n<p><img src=\"https://cf.shopee.vn/file/sg-11134202-22110-n8rj0yc01mjva4\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cf.shopee.vn/file/sg-11134202-22110-mjp090aa2mjv09\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>+ Ưu đ&atilde;i khi mua sản phẩm tại HAFOS :</p>\r\n\r\n<p>- HAFOS hỗ trợ đ&oacute;ng hộp miễn ph&iacute; với đơn h&agrave;ng từ 400.000đ</p>\r\n\r\n<p>- Chương tr&igrave;nh mua để tặng qu&agrave; - Kh&aacute;ch h&agrave;ng vui l&ograve;ng v&agrave;o phần &quot; Mua để tặng qu&agrave;&quot; v&agrave; chọn phần qu&agrave; tặng . Shop sẽ kh&ocirc;ng thể xử l&yacute; th&ecirc;m nếu kh&aacute;ch qu&ecirc;n chọn qu&agrave; tặng</p>', 530, 0, 444, 'A129', 0, 'ao nam', 'ao-thun-nam1669820706.jfif', '2022-11-30 15:05:06', '2022-11-30 15:05:06'),
(21, 2, 3, 'Áo Thun Logo Trắng I\'M Limited Phom Suôn Tay Ngắn', 'ao-thun-logo-trang-i-m-limited-phom-suon-tay-ngan', '<p>Sản phẩm đến từ thương hiệu COCO SIN c&oacute; trụ sở tại Th&agrave;nh Phố Hồ Ch&iacute; Minh   sản xuất tại Việt Nam !</p>\r\n\r\n<p>Sứ mệnh của ch&uacute;ng t&ocirc;i l&agrave; l&agrave;m đẹp v&agrave; n&acirc;ng tầm phong c&aacute;ch cho phụ nữ th&ocirc;ng qua những thiết kế bắt kịp xu hướng thế giới với mức gi&aacute; ph&ugrave; hợp </p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>✔️ Th&ocirc;ng tin sản phẩm :</p>\r\n\r\n<p>- Chất liệu : Thun cotton</p>\r\n\r\n<p>- Sản phẩm Free size</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>✔️ Size Chart Tham Khảo V&ograve;ng ngực x V&ograve;ng eo x V&ograve;ng H&ocirc;ng : Cm</p>\r\n\r\n<p>- Size S : 82- 86 x 64- 66 x 88- 90</p>\r\n\r\n<p>- Size M : 86-90 x 68-70 x 90-96</p>\r\n\r\n<p>- Size L : 90-96 x 72- 74 x 96- 100</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>✔️ Hướng dẫn giặt ủi:</p>\r\n\r\n<p>- N&ecirc;n giặt sản phẩm trước khi sử dụng</p>\r\n\r\n<p>- Giặt nhẹ nh&agrave;ng bằng tay với nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng n&ecirc;n giặt m&aacute;y</p>\r\n\r\n<p>- Kh&ocirc;ng giặt tẩy</p>\r\n\r\n<p>- Ủi nhẹ nếu cần</p>', 900, 0, 876, 'A111', 0, 'ao nu', 'thun-nu-sp1669822054.jfif', '2022-11-30 15:27:34', '2022-11-30 15:27:34'),
(23, 1, 3, 'Áo Lụa In Logo Đen Paris Cổ Tròn', 'ao-lua-in-logo-den-paris-co-tron', '<p>Sản phẩm đến từ thương hiệu COCO SIN c&oacute; trụ sở tại Th&agrave;nh Phố Hồ Ch&iacute; Minh   sản xuất tại Việt Nam !</p>\r\n\r\n<p>Sứ mệnh của ch&uacute;ng t&ocirc;i l&agrave; l&agrave;m đẹp v&agrave; n&acirc;ng tầm phong c&aacute;ch cho phụ nữ th&ocirc;ng qua những thiết kế bắt kịp xu hướng thế giới với mức gi&aacute; ph&ugrave; hợp </p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>✔️ Th&ocirc;ng tin sản phẩm :</p>\r\n\r\n<p>- Chất liệu : Thun cotton</p>\r\n\r\n<p>- Sản phẩm Free size</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>✔️ Size Chart Tham Khảo V&ograve;ng ngực x V&ograve;ng eo x V&ograve;ng H&ocirc;ng : Cm</p>\r\n\r\n<p>- Size S : 82- 86 x 64- 66 x 88- 90</p>\r\n\r\n<p>- Size M : 86-90 x 68-70 x 90-96</p>\r\n\r\n<p>- Size L : 90-96 x 72- 74 x 96- 100</p>', 689, 0, 546, 'A121', 0, 'ao nu', 'thun0nusp21669822602.jfif', '2022-11-30 15:36:42', '2022-11-30 15:36:42'),
(24, 1, 3, 'Áo Thun Girlboss Basic Phom Suôn Tay Ngắn', 'ao-thun-girlboss-basic-phom-suon-tay-ngan', '<p>&nbsp;&Aacute;o Thun Girlboss Basic Phom Su&ocirc;n Tay Ngắn</p>', 567, 0, 345, 'f54', 0, 'ao nu', 'thun-nu-sp31864.jfif', '2022-11-30 15:48:57', '2022-11-30 15:50:25'),
(25, 1, 3, 'Áo Thun Logo Trắng Edition Phom Suôn Tay Ngắn', 'ao-thun-logo-trang-edition-phom-suon-tay-ngan', '<p>&Aacute;o Thun Logo Trắng Edition Phom Su&ocirc;n Tay Ngắn</p>', 500, 0, 450, 'A121', 0, 'ao nu', 'aothun31669823905.jfif', '2022-11-30 15:58:25', '2022-12-01 15:08:41'),
(26, 6, 9, 'Áo thun nam cổ bẻ tay ngắn phối sọc ngực vải dày mịn đẹp', 'ao-thun-nam-co-be-tay-ngan-phoi-soc-nguc-vai-day-min-dep', '<p>&Aacute;o thun nam cổ bẻ tay ngắn mẫu mới cực hot 3 m&agrave;u thanh lịch<br />\r\nTHIẾT KẾ ĐƠN GI&Atilde;N, THANH LỊCH, TRẺ TRUNG SANG TRỌNG<br />\r\nChất thun COTTON 100% &nbsp;mềm mịn tay, tho&aacute;ng m&aacute;t h&uacute;t mồ h&ocirc;i<br />\r\nsize M khoản 45-55kg<br />\r\nsize L khoản 55-65kg<br />\r\nsize XL khoản 65-70kg&nbsp;<br />\r\nSIZE XXL KHOẢN 70-76KG<br />\r\nT&ugrave;y thể trạng v&agrave; sở th&iacute;ch mặc &ocirc;m hay rộng thoải m&aacute;i chọn size tương ứng<br />\r\nM&ocirc; t&atilde; chi tiết sản phẩm<br />\r\nChất liệu: cotton<br />\r\nFom d&aacute;ng &ocirc;m nhẹ<br />\r\nKiểu d&aacute;ng đơn gi&atilde;n thanh lịch<br />\r\nXuất xứ : Việt Nam<br />\r\nNăm sản xuất : 2022<br />\r\nThương hiệu : Nobrand<br />\r\nK&iacute;ch cỡ M L XL XXL</p>', 600, 0, 500, 'A127', 0, 'ao nam', 'thun-nam301669907822.jfif', '2022-12-01 15:17:02', '2022-12-01 15:17:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Áo sơ mi nữ', 'ao-so-mi-nu', '2022-11-20 06:37:45', '2022-11-27 07:19:09'),
(5, 'Áo thun nữ', 'ao-thun-nu', '2022-11-20 06:38:46', '2022-11-27 07:15:59'),
(6, 'Áo khoác nữ', 'ao-khoac-nu', '2022-11-27 07:19:31', '2022-11-27 07:19:40'),
(7, 'Quần jean nữ', 'quan-jean-nu', '2022-11-27 07:21:04', '2022-11-27 07:21:04'),
(8, 'Quần thể thao nữ', 'quan-the-thao-nu', '2022-11-27 07:21:15', '2022-11-27 07:21:15'),
(9, 'Áo thun nam', 'ao-thun-nam', '2022-11-29 07:39:14', '2022-11-29 07:39:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(36, 14, 'vest33318.jfif', '2022-11-28 08:30:41', '2022-11-28 08:30:41'),
(37, 14, 'vest16316.jpg', '2022-11-28 08:30:41', '2022-11-28 08:30:41'),
(38, 15, 'aothun37752.jfif', '2022-11-29 07:43:23', '2022-11-29 07:43:23'),
(39, 15, 'aothun24036.jfif', '2022-11-29 07:43:23', '2022-11-29 07:43:23'),
(40, 16, 'ao-khoac-nam24932.jfif', '2022-11-30 07:54:43', '2022-11-30 07:54:43'),
(41, 16, 'size-ao-khoac-nam-15255.jpg', '2022-11-30 07:54:43', '2022-11-30 07:54:43'),
(42, 17, 'size-ao-khoac-nam-19917.jpg', '2022-11-30 07:58:38', '2022-11-30 07:58:38'),
(43, 18, 'ao-thun-nam21376.jfif', '2022-11-30 08:05:06', '2022-11-30 08:05:06'),
(44, 18, 'ao-thun-nam7478.jfif', '2022-11-30 08:05:06', '2022-11-30 08:05:06'),
(49, 21, 'thun-nu-sp35711.jfif', '2022-11-30 08:27:34', '2022-11-30 08:27:34'),
(50, 21, 'thun0nusp22526.jfif', '2022-11-30 08:27:34', '2022-11-30 08:27:34'),
(53, 23, 'thun-nu-sp33523.jfif', '2022-11-30 08:36:42', '2022-11-30 08:36:42'),
(54, 24, 'thun-nu-sp8746.jfif', '2022-11-30 08:48:57', '2022-11-30 08:48:57'),
(55, 25, 'thun-nu-sp4609.jfif', '2022-11-30 08:58:25', '2022-11-30 08:58:25'),
(56, 26, 'thunnam30-27061.jfif', '2022-12-01 08:17:02', '2022-12-01 08:17:02'),
(57, 26, 'thunnam30-12603.jfif', '2022-12-01 08:17:02', '2022-12-01 08:17:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 16, 2, 10, '2022-11-30 07:54:43', '2022-11-30 07:54:43'),
(2, 17, 3, 30, '2022-11-30 07:58:38', '2022-11-30 07:58:38'),
(4, 17, 4, 13, '2022-11-30 07:58:38', '2022-11-30 07:58:38'),
(6, 18, 2, 14, '2022-11-30 08:05:06', '2022-11-30 08:05:06'),
(26, 23, 3, 22, '2022-11-30 08:36:42', '2022-11-30 08:36:42'),
(27, 25, 2, 33, '2022-11-30 08:58:25', '2022-12-01 07:38:21'),
(29, 25, 3, 20, '2022-12-01 08:08:41', '2022-12-01 08:08:41'),
(30, 25, 4, 54, '2022-12-01 08:08:41', '2022-12-01 08:08:41'),
(31, 26, 2, 67, '2022-12-01 08:17:02', '2022-12-01 08:17:02'),
(32, 26, 3, 54, '2022-12-01 08:17:02', '2022-12-01 08:17:02'),
(33, 26, 5, 23, '2022-12-01 08:17:02', '2022-12-01 08:17:02'),
(34, 15, 3, 12, '2022-12-02 01:49:16', '2022-12-02 01:49:16'),
(35, 15, 4, 43, '2022-12-02 01:49:16', '2022-12-02 01:49:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>hidden, 1=>visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'S', 0, '2022-11-30 06:40:51', '2022-11-30 06:40:51'),
(3, 'M', 0, '2022-11-30 06:49:31', '2022-11-30 06:49:31'),
(4, 'L', 0, '2022-11-30 06:49:39', '2022-11-30 06:49:39'),
(5, 'XL', 0, '2022-11-30 06:49:47', '2022-11-30 06:49:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden, 0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black Friday', '<h3><em>Si&ecirc;u sale h&agrave;ng hiệu!</em></h3>\r\n\r\n<h3>Mua ngay để c&oacute; cơ hội tham gia quay số tr&uacute;ng thưởng.</h3>', 'hero-21292.jpg', 0, '2022-12-01 20:30:02', '2022-12-01 20:32:19'),
(2, 'Black Friday', '<h3>Ai n&oacute;i rằng tiền kh&ocirc;ng mua được hạnh ph&uacute;c chỉ đơn giản l&agrave; kh&ocirc;ng biết đi mua sắm ở đ&acirc;u.</h3>', 'hero-1916.jpg', 0, '2022-12-01 20:43:45', '2022-12-01 20:43:58'),
(3, 'Black Friday', '<h3>C&aacute;ch nhanh nhất để l&agrave;m quen với một người phụ nữ l&agrave; c&ugrave;ng c&ocirc; ấy đi mua sắm trong ng&agrave;y Black Friday.</h3>', 'hero-31669952693.jpg', 0, '2022-12-01 20:44:53', '2022-12-01 20:44:53');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `phone`, `address`, `level`, `created_at`, `updated_at`) VALUES
(1, 'CodeLean', 'CodeLean@gmail.com', NULL, '12345abc', NULL, NULL, '', NULL, 0, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$AEj5cx5wBlgOY2HlvQzuIeAvqYg49WWFp4Tc4pO7J.R4v28Obojva', NULL, NULL, '', NULL, 0, NULL, NULL),
(3, 'Shane Lynch', 'ShaneLynch@gmail.com', NULL, '$2y$10$ml5gZVonN1mCRQVMGTRqs.OH/t9czHHkOMrjBRDW86/Lkh28ekM6C', NULL, 'avatar-0.png', '', NULL, 1, NULL, NULL),
(4, 'Brandon Kelley', 'BrandonKelley@gmail.com', NULL, '$2y$10$AwQkzHge6/IeaPukgBf06eoOjFTZR4Oq/.f0QBpvFBmyPyRptVscS', NULL, 'avatar-1.png', '', NULL, 1, NULL, NULL),
(5, 'Roy Banks', 'RoyBanks@gmail.com', NULL, '$2y$10$uVYdKlPFsAkegko9Rj8u/OTKi1qaDzMgSJTmL2H4E0wVFyl02ivr6', NULL, 'avatar-2.png', '', NULL, 1, NULL, NULL),
(6, 'Phùng Huyền', 'huyenha200204@gmail.com', NULL, '$2y$10$A2V2bpc4mwg3.ml95MOGwerWuVhvf8sETMeDq25AHunFK3px88tlO', NULL, 'avatar19637.jpg', '0334227460', NULL, 1, '2022-11-17 07:28:02', '2022-11-19 08:14:24'),
(13, 'Adam', 'fanfl1981@gmail.com', NULL, '$2y$10$imGxUym.R2be2AxJGvRCXueVVdpCmcJvZtWuu4EC9enQXiRQq8Iye', NULL, NULL, NULL, NULL, 0, '2022-12-05 00:09:00', '2022-12-05 00:09:00'),
(14, 'Admin 2', 'paxag84032@tonaeto.com', NULL, '$2y$10$qhlsBN595HVFr4y0Yhs0uOT1FX3wqRd3vY6Cs96hm0jYtBBLIor7C', NULL, NULL, '0334227345', 'Thường Tín', 0, '2022-12-05 01:26:34', '2022-12-05 01:26:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
