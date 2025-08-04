-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 04, 2025 lúc 03:57 AM
-- Phiên bản máy phục vụ: 8.4.3
-- Phiên bản PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `streetsoul_store999`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Áo thun'),
(2, 'Hoodie'),
(3, 'Sơ mi'),
(4, 'Quần'),
(5, 'Dép');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `content`, `created_at`) VALUES
(1, 'BST Hè 2025: Tỏa Sáng Với Phong Cách Năng Động', 'http://localhost/streetsoul_store1/public/images/img1.jpg', 'Chào đón mùa hè 2025, Yamy Shop chính thức trình làng bộ sưu tập \"Sunshine Vibes\" – nơi hội tụ của sự tươi mới, thoải mái và thời thượng. Với chất liệu thoáng mát, họa tiết trẻ trung và gam màu rực rỡ, BST lần này hứa hẹn mang đến trải nghiệm thời trang đỉnh cao cho các tín đồ yêu thích phong cách năng động. Đặc biệt, các mẫu áo croptop, chân váy denim và set đồ matching sẽ giúp bạn tỏa sáng trong mọi hoạt động hè. Khám phá ngay tại hệ thống cửa hàng Yamy Shop!', '2025-07-30 12:47:44'),
(2, 'Sale cực sốc tháng 8', 'http://localhost/streetsoul_store1/public/images/sale8.jpg', 'Tháng 8 là cơ hội vàng để săn sale tại Yamy Shop! Ưu đãi giảm giá lên tới 50% cho hàng trăm mẫu hot trend: áo croptop, đầm maxi, quần jeans form Hàn... Chỉ diễn ra từ 01/08 đến 10/08. Đừng bỏ lỡ cơ hội làm mới tủ đồ với giá siêu mềm!', '2025-07-30 13:08:41'),
(3, '5 Cách Phối Đồ Đẹp Cho Nam – Nâng Tầm Phong Cách Cùng Yamy Shop', 'http://localhost/streetsoul_store1/public/images/biquyetchondo.jpg', 'Bạn là nam giới và đang tìm cách để ăn mặc đẹp, hợp xu hướng mà vẫn giữ được cá tính riêng? Hãy cùng Yamy Shop khám phá ngay 5 cách phối đồ cực “chất” dưới đây – dễ áp dụng, phù hợp nhiều hoàn cảnh từ đi học, đi làm đến hẹn hò.', '2025-07-30 13:17:19'),
(4, 'Back To School: Set đồ năng động cho sinh viên', 'http://localhost/streetsoul_store1/public/images/back_to_school.jpg', 'Hè sắp qua, Yamy gợi ý các set đồ \"Back To School\" cực chất: hoodie + chân váy chữ A, quần jogger + áo thun oversize...', '2025-07-30 13:22:47'),
(5, '5 phụ kiện “nhỏ mà có võ” bạn nên sở hữu', 'http://localhost/streetsoul_store1/public/images/phu_kien_2025.jpg', 'Túi mini, kính râm dáng oval, hoa tai bản to, thắt lưng dây mảnh – những phụ kiện tuy nhỏ nhưng có thể nâng tầm toàn bộ outfit của bạn.', '2025-07-30 13:31:41'),
(6, 'Yamy Signature – Tuyên ngôn thời trang của cô nàng hiện đại', 'http://localhost/streetsoul_store1/public/images/yamy_signature.jpg', 'Khám phá dòng sản phẩm cao cấp “Yamy Signature” – biểu tượng của sự tinh tế, tối giản nhưng đậm cá tính dành cho phái đẹp thành thị.', '2025-07-30 13:35:30'),
(7, 'Streetstyle Việt: Khi gu thời trang lên ngôi giữa phố đông', 'http://localhost/streetsoul_store1/public/images/product1.webp', 'Yamy ghi lại những khoảnh khắc thời trang đường phố chân thực – từ áo thun oversize đến giày thể thao basic vẫn nổi bật rực rỡ.', '2025-07-30 13:37:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `shipping_address` text COLLATE utf8mb4_general_ci,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `order_date`, `status`, `shipping_address`, `phone_number`, `customer_name`, `shipping_fee`, `phone`, `address`, `created_at`) VALUES
(26, 0, 430000.00, '2025-04-12 21:27:51', 'Đã xác nhận', NULL, NULL, '123123', 30000.00, '123123', '123123123', '2025-04-12 21:27:51'),
(27, 0, 430000.00, '2025-04-12 21:28:54', 'Đã xác nhận', NULL, NULL, 'Tuấn Nhi', 30000.00, '12312312312', 'hello', '2025-04-12 21:28:54'),
(28, 0, 729000.00, '2025-04-12 21:29:34', 'Đã xác nhận', NULL, NULL, 'ádasdad', 30000.00, 'adadsasadsasadsadsad', 'sadasddasdasds', '2025-04-12 21:29:34'),
(29, 0, 430000.00, '2025-04-12 21:31:38', 'Đã xác nhận', NULL, NULL, 'tụabhi', 30000.00, '34657875', 'áddwqew', '2025-04-12 21:31:38'),
(30, 0, 430000.00, '2025-04-12 21:35:07', 'Đã xác nhận', NULL, NULL, 'ádasd', 30000.00, '21312313', '1223', '2025-04-12 21:35:07'),
(31, 0, 1630000.00, '2025-04-13 10:30:49', 'Đã xác nhận', NULL, NULL, 'Tuấn Nhi nè', 30000.00, '098776123213', 'hello kitty nhé ', '2025-04-13 10:30:49'),
(32, 0, 2479998.00, '2025-04-13 11:47:48', 'Đã xác nhận', NULL, NULL, 'NGUYEN HOANG TUAN NHI', 30000.00, '123123123123123', 'HELLO, QUẬN 12', '2025-04-13 11:47:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot_sale` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gallery` text COLLATE utf8mb4_general_ci,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `is_featured`, `is_hot_sale`, `created_at`, `image`, `gallery`, `category_id`) VALUES
(1, 'Áo Thun Mẫu Chữ - Trắng', 'Áo thun chất  lượng, co giãn 4 chiều', 400000.00, 1, 0, '2025-04-02 18:00:08', 'product1.webp', '[\"mini-product2-1.webp\", \"mini-product2-2.webp\", \"mini-product2-3.webp\"]', 1),
(2, 'Áo Thun Mẫu Chữ - Đen', 'Áo phù hợp mọi phong cách.', 400000.00, 1, 0, '2025-04-02 18:00:08', 'product2.webp\r\n', '[\"mini-product-1.webp\", \"mini-product-2.webp\", \"mini-product-3.jpg\", \"mini-product-4.jpg\"]', 1),
(3, 'Áo Thun THE UNDERDOG', 'Áo thun được thiết kế giành riêng cho chương trình RAPVIET. Tổ đội THE UNDERDOG', 399000.00, 1, 0, '2025-04-02 18:00:08', 'product3.webp', '[\"mini-product3-1.webp\", \"mini-product3-2.webp\", \"mini-product3-3.webp\", \"mini-product3-4.webp\"]', 1),
(4, 'Áo Khoác Hoodie  - Đen', 'Áo khoác hoodie được thiết kế thời trang và thoáng mát, thích hợp cho mùa đông lẫn mùa hè', 699000.00, 1, 0, '2025-04-02 18:00:08', 'product4.webp', '[\"mini-product4-1.webp\", \"mini-product4-2.webp\", \"mini-product4-3.webp\", \"mini-product4-4.webp\"]', 2),
(5, 'Baggy Denim Pants - Blue', 'Quần jean baggy, thoải mái khi mặc.', 790000.00, 0, 1, '2025-04-02 18:00:08', 'product5.webp', NULL, 1),
(6, 'Saigon Star Jersey - Red', 'Áo bóng đá mesh phong cách.', 500000.00, 0, 1, '2025-04-02 18:00:08', 'product6.webp', NULL, 1),
(7, 'Saigon Star Jersey - Black', 'Phiên bản jersey đặc biệt màu đen.', 200000.00, 0, 1, '2025-04-02 18:00:08', 'product7.webp', NULL, 2),
(8, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 0, 1, '2025-04-02 18:00:08', 'product8.webp', NULL, 2),
(9, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 1, 0, '2025-04-02 18:00:08', 'product9.webp', NULL, 3),
(10, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 1, 0, '2025-04-02 18:00:08', 'product10.webp', NULL, 3),
(11, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 1, 0, '2025-04-02 18:00:08', 'product11.webp', NULL, 4),
(12, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 1, 0, '2025-04-02 18:00:08', 'product12.webp', NULL, 4),
(13, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 0, 1, '2025-04-02 18:00:08', 'product13.webp', NULL, 5),
(14, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 0, 1, '2025-04-02 18:00:08', 'product14.jpg', NULL, 5),
(15, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 0, 1, '2025-04-02 18:00:08', 'product15.webp', NULL, 5),
(16, 'ITACHI Limited Edition', 'Áo thun với thiết kế Itachi độc quyền.', 999999.00, 0, 1, '2025-04-02 18:00:08', 'product16.webp', NULL, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `phai` tinyint(1) DEFAULT '0' COMMENT '0: Nữ, 1: Nam',
  `ngaydangky` datetime DEFAULT CURRENT_TIMESTAMP,
  `vaitro` tinyint(1) DEFAULT '0' COMMENT '0: Người dùng, 1: Admin',
  `active` tinyint(1) DEFAULT '1' COMMENT '1: Hoạt động, 0: Khóa',
  `randomkey` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `tendangnhap`, `matkhau`, `hoten`, `email`, `ngaysinh`, `phai`, `ngaydangky`, `vaitro`, `active`, `randomkey`) VALUES
(1, 'hello', '123123', 'hello', 'hello@gmail.com', '0000-00-00', 1, '2025-04-13 18:18:36', 0, 1, NULL),
(2, '123123', '123123', '123123', '123123@gmail.com', '1111-11-11', 0, '2025-04-13 18:21:31', 1, 1, NULL),
(3, 'hahaha', '123123', 'haha', 'haha@gmail.com', '0000-00-00', 0, '2025-04-13 18:46:19', 1, 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
