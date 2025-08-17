-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 17, 2025 lúc 08:20 AM
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(10000) COLLATE utf8mb4_general_ci NOT NULL,
  `infor` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `content`, `created_at`, `address`, `infor`) VALUES
(1, 'BST Hè 2025: Tỏa Sáng Với Phong Cách Năng Động', 'http://localhost/streetsoul_store1/public/images/img1.jpg', 'Chào đón mùa hè 2025, Yamy Shop chính thức trình làng bộ sưu tập \"Sunshine Vibes\" – nơi hội tụ của sự tươi mới, thoải mái và thời thượng. Với chất liệu thoáng mát, họa tiết trẻ trung và gam màu rực rỡ, BST lần này hứa hẹn mang đến trải nghiệm thời trang đỉnh cao cho các tín đồ yêu thích phong cách năng động. Đặc biệt, các mẫu áo croptop, chân váy denim và set đồ matching sẽ giúp bạn tỏa sáng trong mọi hoạt động hè. Khám phá ngay tại hệ thống cửa hàng Yamy Shop!', '2025-07-30 12:47:44', '', ''),
(2, 'Sale cực sốc tháng 8', 'http://localhost/streetsoul_store1/public/images/sale8.jpg', 'SALE CỰC SỐC THÁNG 8 – SHOP YAMY KHUYẾN MÃI KHỦNG LÊN ĐẾN 70%\r\nTháng 8 này, Shop Yamy bùng nổ ưu đãi “chấn động” với chương trình Sale Cực Sốc – giảm giá lên đến 50%-70% tất cả các sản phẩm quần áo thời trang. Đây là cơ hội vàng để các tín đồ thời trang nâng cấp tủ đồ với mức giá siêu hời, săn ngay những item hot trend mùa hè và chuẩn bị cho mùa thu đang đến gần.\r\n\r\n', '2025-07-30 13:08:41', '1. Vì sao bạn không thể bỏ lỡ “Sale Cực Sốc Tháng 8” tại Yamy?\r\n▪️Giảm giá sâu chưa từng có: Nhiều sản phẩm được giảm trực tiếp 50% - 70%.\r\n\r\n▪️Áp dụng toàn bộ cửa hàng: Từ áo thun, áo sơ mi, chân váy, quần jeans, quần âu cho tới đầm dự tiệc, set bộ công sở.\r\nHàng mới về cũng giảm: Không chỉ hàng tồn kho, ngay cả các mẫu New Arrival cũng được áp dụng ưu đãi.\r\n\r\n▪️Miễn phí đổi trả 7 ngày: Mua online hay offline đều được đổi nếu sản phẩm chưa qua sử dụng.\r\n\r\n▪️Số lượng có hạn: Nhiều mẫu hot trend cháy hàng chỉ sau vài giờ mở bán.\r\n\r\n2. Bộ sưu tập khuyến mãi tháng 8 – Đẹp mê ly, giá mê hoặc\r\n▪️Áo thun basic – Item quốc dân chỉ từ 89K\r\nNhững mẫu áo thun Yamy được làm từ cotton cao cấp, co giãn tốt, thoáng mát, phối được với mọi loại trang phục. Giảm ngay 50%, chỉ còn từ 89.000đ.\r\n\r\n▪️Đầm công sở & dự tiệc – Thanh lịch, sang trọng\r\n\r\n▪️Các mẫu đầm Yamy tôn dáng, chất vải mềm mịn, lên form chuẩn. Sale sốc từ 399K xuống chỉ còn 199K.\r\n\r\n▪️Quần jeans & quần baggy – Năng động, trẻ trung\r\n\r\n▪️Jeans Yamy đa dạng kiểu dáng: skinny, straight, wide leg… Sale khủng từ 450K xuống còn 199K.\r\n\r\n▪️Chân váy & quần short – Nữ tính, quyến rũ\r\nDễ phối đồ, mặc đi làm hay đi chơi đều hợp. Giảm đến 60%.\r\n\r\n3. Ưu đãi đặc biệt dành riêng cho khách hàng online\r\n▪️Freeship toàn quốc cho đơn từ 299K.\r\n▪️Tặng ngay voucher 50K cho đơn hàng tiếp theo.\r\n▪️Flash Sale Online: Giờ vàng 12h và 20h mỗi ngày, giá giảm thêm 10% trên mức sale hiện tại.\r\n\r\n4. Mẹo săn sale hiệu quả tại Shop Yamy\r\n▪️Theo dõi Fanpage và Website để nhận thông báo sớm nhất.\r\n▪️Chuẩn bị giỏ hàng trước và canh giờ vàng để chốt đơn nhanh.\r\n▪️Ưu tiên thanh toán online để tránh tình trạng “sold out”.\r\n\r\n5. Thời gian & địa điểm diễn ra\r\nThời gian: Từ 01/08 đến hết 31/08 hoặc đến khi hết hàng.\r\n\r\nĐịa điểm:\r\n▪️Mua trực tiếp tại hệ thống cửa hàng Yamy Shop.\r\n▪️Đặt online qua Website chính thức hoặc các sàn thương mại điện tử.\r\n\r\n6. Lời kết – Tháng 8 mua sắm thả ga cùng Yamy\r\n“Sale Cực Sốc Tháng 8” của Shop Yamy chính là thời điểm vàng để bạn nâng cấp tủ đồ với chi phí siêu tiết kiệm. Chỉ trong tháng này, mọi item từ basic đến sang chảnh đều giảm mạnh, giúp bạn vừa tiết kiệm vừa sở hữu những bộ đồ thời thượng.\r\n\r\n💬 Đừng chần chừ – Số lượng có hạn, nhanh tay săn sale ngay hôm nay tại Shop Yamy!\r\n--------------------------', 'GIỜ MỞ CỬA:\r\n- Hà Nội, TP.HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00'),
(4, 'Back To School: Set đồ năng động cho sinh viên', 'http://localhost/streetsoul_store1/public/images/back_to_school.jpg', 'Hè sắp qua, Yamy gợi ý các set đồ \"Back To School\" cực chất: hoodie + chân váy chữ A, quần jogger + áo thun oversize...', '2025-07-30 13:22:47', '', ''),
(5, '5 phụ kiện “nhỏ mà có võ” bạn nên sở hữu', 'https://hmkeyewear.com/wp-content/uploads/2024/12/thoi-trang-cong-so-nam-9.jpg', 'Khám phá 5 phụ kiện thời trang nhỏ nhưng mang lại hiệu quả lớn: đồng hồ, kính mát, thắt lưng, túi xách và mũ. Bí quyết phối đồ giúp bạn nổi bật ở mọi nơi.', '2025-07-30 13:31:41', 'Giới thiệu\r\nTrong thế giới thời trang, không phải lúc nào quần áo cũng là yếu tố quyết định phong cách. Đôi khi, chính những phụ kiện thời trang nhỏ nhưng tinh tế lại tạo nên dấu ấn khác biệt cho người mặc. Dưới đây là 5 phụ kiện “nhỏ mà có võ” mà bất kỳ ai cũng nên sở hữu để nâng tầm gu ăn mặc của mình.\r\n\r\n1. Đồng hồ – Phụ kiện khẳng định phong cách và đẳng cấp:\r\nĐồng hồ đeo tay không chỉ giúp bạn quản lý thời gian mà còn là biểu tượng của sự lịch lãm và chuyên nghiệp. Một chiếc đồng hồ phù hợp có thể nâng tầm cả set đồ, từ công sở đến dạo phố.\r\n\r\n▪️Cách phối: Nam có thể chọn đồng hồ dây da hoặc dây kim loại để đi làm, đồng hồ thể thao khi đi chơi. Nữ có thể chọn đồng hồ mặt nhỏ tinh tế hoặc đồng hồ thời trang phối cùng vòng tay.\r\n▪️Từ khóa phụ: đồng hồ nam, đồng hồ nữ, đồng hồ thời trang cao cấp.\r\n\r\n2. Kính mát – Bảo vệ đôi mắt và tôn thêm thần thái:\r\nKính mát vừa giúp bảo vệ mắt khỏi tia UV, vừa mang đến sự cuốn hút cho người đeo. Một chiếc kính mát hợp khuôn mặt có thể khiến bạn trở nên sang trọng, cá tính hoặc đầy bí ẩn.\r\n\r\n▪️Cách phối: Kính aviator cho phong cách nam tính, kính tròn retro cho phong cách vintage, kính mắt mèo cho nữ thêm quyến rũ.\r\n▪️Từ khóa phụ: kính mát nam, kính mát nữ, kính chống tia UV.\r\n\r\n3. Thắt lưng – Điểm nhấn nhỏ, hiệu quả lớn:\r\nDù chỉ là chi tiết nhỏ, thắt lưng lại giúp set đồ trở nên hoàn thiện và cân đối hơn. Một chiếc thắt lưng đẹp không chỉ giữ trang phục gọn gàng mà còn thể hiện gu thẩm mỹ của bạn.\r\n\r\n▪️Cách phối: Nam có thể dùng thắt lưng da đen hoặc nâu để tạo sự lịch lãm, nữ có thể dùng thắt lưng bản nhỏ để tạo eo khi mặc váy.\r\n▪️Từ khóa phụ: thắt lưng nam da thật, thắt lưng nữ thời trang, phụ kiện thắt lưng đẹp.\r\n\r\n4. Túi xách – Sự tiện lợi và thời trang trong một món đồ:\r\nTúi xách không chỉ để đựng đồ mà còn là điểm nhấn giúp outfit thêm cuốn hút. Chọn túi phù hợp sẽ giúp bạn nổi bật giữa đám đông.\r\n\r\n▪️Cách phối: Nam có thể chọn balo da hoặc túi đeo chéo, nữ có thể chọn túi tote cho phong cách năng động hoặc clutch cho sự sang trọng.\r\n▪️Từ khóa phụ: túi xách nam, túi xách nữ, túi thời trang cao cấp.\r\n\r\n5. Mũ – Hoàn thiện phong cách và tạo cá tính riêng\r\nMũ vừa giúp bảo vệ khỏi nắng mưa, vừa thể hiện phong cách cá nhân rõ nét. Tùy vào loại mũ, bạn có thể biến hóa nhiều phong cách khác nhau.\r\n\r\n▪️Cách phối: Mũ lưỡi trai cho phong cách thể thao, mũ fedora cho phong cách cổ điển, mũ beret cho nét nhẹ nhàng, nghệ sĩ.\r\n▪️Từ khóa phụ: mũ lưỡi trai nam, mũ thời trang nữ, phụ kiện mũ đẹp.\r\n--------------------------', 'GIỜ MỞ CỬA:\r\n- Hà Nội, TP.HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00'),
(6, 'Yamy Signature – Tuyên ngôn thời trang của cô nàng hiện đại', 'http://localhost/streetsoul_store1/public/images/yamy_signature.jpg', '▪️Trong thế giới thời trang đầy biến động, mỗi cô gái đều mong muốn tìm cho mình một phong cách riêng – một dấu ấn cá nhân không thể nhầm lẫn. Yamy Signature ra đời với sứ mệnh đồng hành cùng những cô nàng hiện đại, mang đến những thiết kế không chỉ đẹp mắt mà còn phản ánh trọn vẹn cá tính và lối sống của bạn.\r\n\r\n▪️Với triết lý \"Thời trang là cách bạn kể câu chuyện của chính mình\", Yamy Signature chú trọng đến từng chi tiết, từ chất liệu cao cấp, đường may tinh tế cho đến những gam màu, họa tiết và kiểu dáng được lựa chọn kỹ lưỡng. Mỗi sản phẩm đều là sự hòa quyện giữa sự thanh lịch, trẻ trung và nét phá cách đầy cuốn hút – giúp bạn tự tin xuất hiện ở bất cứ đâu, từ công sở, dạo phố đến những buổi tiệc sang trọng.\r\n\r\n▪️Điểm đặc biệt của Yamy Signature nằm ở khả năng bắt kịp xu hướng quốc tế nhưng vẫn giữ được sự tinh tế, tối giản và tính ứng dụng cao. Chúng tôi hiểu rằng thời trang không chỉ để ngắm, mà phải dễ dàng phối đồ, thoải mái khi mặc và phản ánh trọn vẹn phong thái của người sở hữu.\r\n\r\n▪️Không đơn thuần là quần áo, Yamy Signature muốn mỗi thiết kế trở thành một “tuyên ngôn” cá nhân – khẳng định rằng bạn là cô gái biết mình muốn gì, dám thể hiện bản thân và không ngại tỏa sáng. Dù bạn theo đuổi phong cách nữ tính nhẹ nhàng hay mạnh mẽ, cá tính, Yamy Signature đều có thể trở thành “người bạn đồng hành” hoàn hảo.\r\n\r\n▪️Hãy để Yamy Signature giúp bạn biến mỗi ngày trở thành một sàn diễn, nơi bạn tự tin sải bước với phong cách và dấu ấn của chính mình.\r\n--------------------------', '2025-07-30 13:35:30', '', 'GIỜ MỞ CỬA:\r\n- Hà Nội, TP:HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00'),
(7, 'Yamy Style: Khi gu thời trang lên ngôi giữa phố đông', 'https://bizweb.dktcdn.net/100/369/010/collections/02.jpg?v=1641637095720', 'Khám phá Yamy Style – thương hiệu thời trang hiện đại. Phong cách trẻ trung, cuốn hút và đầy cá tính, giúp bạn tỏa sáng giữa phố đông.', '2025-07-30 13:37:48', '▪️Yamy Style – Dấu ấn thời trang giữa nhịp sống hiện đại:\r\nGiữa những con phố đông đúc, gu thời trang không chỉ là cách bạn ăn mặc mà còn là ngôn ngữ để khẳng định bản thân. Yamy Style ra đời để mang đến cho phái đẹp những thiết kế tinh tế, trẻ trung và đầy sức sống – giúp bạn luôn nổi bật, tự tin và khác biệt.\r\n\r\n▪️Phong cách dành riêng cho nam và nữ thành thị:\r\nVới triết lý \"Thời trang không chỉ để mặc, mà để sống cùng\", Yamy Style chú trọng từng chi tiết – từ chất liệu cao cấp, form dáng chuẩn cho đến những đường may tỉ mỉ. Dù bạn là nam hay nữ, yêu thích sự năng động của street style hay sự thanh lịch của phong cách tối giản, Yamy Style đều mang đến lựa chọn phù hợp. Mỗi thiết kế đều giúp tôn lên vẻ ngoài cuốn hút, sự tự tin và cá tính riêng của từng người, để bạn luôn nổi bật giữa phố đông.\r\n\r\n▪️Bắt kịp xu hướng, nhưng vẫn giữ chất riêng:\r\nYamy Style liên tục cập nhật những xu hướng thời trang mới nhất từ quốc tế và kết hợp khéo léo với bản sắc riêng. Từ áo khoác cá tính, váy đầm duyên dáng đến những set đồ mix & match đầy sáng tạo – tất cả đều được thiết kế để tôn vinh vóc dáng và cá tính của bạn.\r\n\r\n▪️Tỏa sáng giữa phố đông cùng Yamy Style:\r\nKhông chỉ là thương hiệu, Yamy Style là người bạn đồng hành giúp bạn biến mỗi con phố thành sàn diễn thời trang của riêng mình. Mỗi bộ trang phục là một tuyên ngôn: \"Tôi khác biệt, tôi tự tin và tôi dẫn đầu xu hướng\".\r\n--------------------------', 'GIỜ MỞ CỬA:\r\n- Hà Nội, TP.HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00'),
(8, 'Hệ Thống Cửa Hàng', 'https://click49.vn/wp-content/uploads/2018/08/1.jpg', 'Hotline: 039.336.1913 - 039.333.1359\r\nWebsite: http://localhost/streetsoul_store1/\r\n', '2025-08-11 12:14:57', 'Địa Chỉ:\r\nTP.HCM:\r\n▪️Phường Sài Gòn - The New Playground, Tầng B1 Vincom Center Đồng Khởi, 72 Lê Thánh Tôn.\r\n▪️Phường An Lạc - Tầng 1 TTTM Aeon Mall Bình Tân, số 1 đường số 17A.\r\n▪️Phường Hòa Hưng - 561 Sư Vạn Hạnh.\r\n▪️Phường Sài Gòn - The New Playground 26 Lý Tự Trọng.\r\n▪️Phường Gò Vấp - 326 Quang Trung.\r\n▪️Phường Thủ Dầu Một - 28 Yersin.\r\nHà Nội:\r\n▪️ 1221 Giải Phóng \r\n▪️ 154 Quang Trung - Hà Đông\r\n▪️ 34 Trần Phú - Hà Đông\r\nHoài Đức:\r\n▪️ 312 Khu 6 Trạm Trôi - Hoài Đức\r\nThị xã Sơn Tây:\r\n▪️ 195 Quang Trung - Tx.Sơn Tây\r\nTP. Thanh Hóa\r\n▪️ 236-238 Lê Hoàn\r\nTP.Vinh, Nghệ An\r\n▪️ 167 Nguyễn Văn Cừ\r\n--------------------------', 'Liên hệ:\r\nMọi ý kiến đóng góp cũng như yêu cầu khiếu nại xin vui lòng liên hệ: 039.336.1913\r\nGIỜ MỞ CỬA:\r\n- Hà Nội, TP.HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00'),
(9, 'Chính sách đổi hàng', 'https://jkhoreca.com/wp-content/uploads/2021/07/chinh-sach-doi-tra-bao-hanh.jpg', 'I. QUY ĐỊNH ĐỔI HÀNG ONLINE\r\n1. Chính sách áp dụng\r\n▪️Áp dụng 01 lần đổi/01 đơn hàng\r\n▪️Không áp dụng đổi với sản phẩm phụ kiện và đồ lót\r\n▪️Sản phẩm nguyên giá được đổi sang sản phẩm nguyên khác còn hàng tại website có giá trị bằng hoặc lớn hơn (KH bù thêm chênh lệch nếu lớn hơn)\r\n▪️Không hỗ trợ đổi các sản phẩm giảm giá/khuyên mại\r\n\r\n2. Điều kiện đổi sản phẩm\r\n▪️Đổi hàng trong vòng 3 ngày kể từ ngày khách hàng nhận được sản phẩm.\r\n▪️Sản phẩm còn nguyên tem, mác và chưa qua sử dụng   \r\n \r\n3. Thực hiện đổi sản phẩm\r\n▪️Bước 1: Liên hệ fanpage https://www.facebook.com/yamyshop.vn/ để xác nhận đổi hàng.\r\n▪️Bước 2: Gửi hàng về địa chỉ Kho \r\n▪️Bước 3:Yamy gửi đổi sản phẩm mới khi nhận được hàng. Trong trường hợp hết hàng,  Yamy sẽ liên hệ xác nhận.\r\n\r\n▪️Lưu ý:\r\nKho online không nhận giữ hàng trong thời gian khách hàng gửi sản phẩm về để đổi hàng.', '2025-08-11 13:09:24', 'II. QUY ĐỊNH ĐỔI SẢN PHẨM MUA TẠI CỬA HÀNG\r\n\r\n1.Chính sách đổi hàng được áp dụng trong vòng 30 ngày kể từ ngày mua hàng.\r\n\r\n2.Khách hàng được đổi không giới hạn số lần trong 30 ngày.\r\n\r\n3.Quý khách vui lòng mang theo hóa đơn bán lẻ khi đổi hàng.\r\n\r\n4.Sản phẩm đổi phải còn nguyên tem nhãn mác và trong tình trạng như ban đầu (chưa giặt, chưa qua sử dụng, chưa qua sửa chữa, không bị rách hoặc hư hại).\r\n\r\n5.Vì lý do sức khỏe, sản phẩm đồ lót, phụ kiện, mũ, túi xách, balo không áp dụng đổi hàng.\r\n6.Khách hàng có thể đổi hàng tại tất cả các cửa hàng trong hệ thống Yamy.\r\n\r\n7.Sản phẩm sau khi đổi sẽ áp dụng giá bán tại thời điểm đổi hàng. Hóa đơn sau khi đổi phải có giá trị bằng hoặc cao hơn tổng giá trị sản phẩm trước khi đổi.\r\n--------------------------', 'GIỜ MỞ CỬA:\r\n- Hà Nội, TP.HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00'),
(10, 'Chính sách bảo mật thông tin', 'https://media.loveitopcdn.com/1185/chinh-sach-bao-mat-thong-tin.jpg', '- CHÍNH SÁCH BẢO VỆ THÔNG TIN KHÁCH HÀNG:\r\nCảm ơn bạn đã truy cập vào trang website của thương hiệu Thời trang Yamy Shop.\r\n\r\nChúng tôi tôn trọng và cam kết sẽ bảo mật những thông tin mang tính riêng tư của bạn. Xin vui lòng đọc bản Chính sách bảo vệ thông tin cá nhân của người tiêu dùng dưới đây để hiểu hơn những cam kết mà chúng tôi thực hiện nhằm tôn trọng và bảo vệ quyền lợi của người truy cập.\r\n\r\nBảo vệ thông tin cá nhân của người tiêu dùng và gây dựng được niềm tin cho bạn là vấn đề rất quan trọng với chúng tôi. Vì vậy, chúng tôi sẽ dùng tên và các thông tin khác liên quan đến bạn tuân thủ theo nội dung của chính sách này. Chúng tôi chỉ thu thập những thông tin cần thiết liên quan đến giao dịch mua bán.\r\n\r\n- CHÍNH SÁCH BẢO VỆ THÔNG TIN CÁ NHÂN CỦA NGƯỜI TIÊU DÙNG:\r\nNgười Tiêu Dùng hoặc Khách hàng sẽ được yêu cầu điền đầy đủ các thông tin theo các trường thông tin theo mẫu có sẵn trên Website như: Họ và Tên, địa chỉ (nhà riêng hoặc văn phòng), địa chỉ email (công ty hoặc cá nhân), số điện thoại (di động, nhà riêng hoặc văn phòng), Thông tin này được yêu cầu để phục vụ việc đặt hàng online của Khách hàng (bao gồm gửi email xác nhận đặt hàng đến Khách hàng).\r\n\r\n-Thu thập cookie & lưu lượng truy cập:\r\nCookie là những thư mục dữ liệu được lưu trữ tạm thời hoặc lâu dài trong ổ cứng máy tính của Khách hàng. Các cookie được sử dụng để xác minh, truy tìm lượt (bảo vệ trạng thái) và duy trì thông tin cụ thể về việc sử dụng và người sử dụng Website, như các tuỳ chọn cho trang web hoặc thông tin về giỏ hàng điện tử của họ. Những thư mục cookie cũng có thể được các công ty cung cấp dịch vụ quảng cáo đã ký kết Hợp đồng với ATINO đặt trong máy tính của Khách hàng với mục đích nêu trên và dữ liệu được thu thập bởi những cookie này là hoàn toàn vô danh. Nếu không đồng ý, Khách hàng có thể xoá tất cả các cookie đã nằm trong ổ cứng máy tính của mình bằng cách tìm kiếm các thư mục với “cookie” trong tên của nó và xoá đi. Trong tương lai, Khách hàng có thể chỉnh sửa các lựa chọn trong trình duyệt của mình để các cookie (tương lai) bị chặn; Xin được lưu ý rằng: Nếu làm vậy, Khách hàng có thể không sử dụng được đầy đủ các tính năng của Website Để biết thêm thông tin về (cách sử dụng và không nhận) cookie, Khách hàng vui lòng truy cập vào website www.allaboutcookies.org.\r\n\r\nLưu lượng truy cập: Trên website có những đoạn mã được sử dụng với mục đích báo cáo lưu lượng truy cập trang web, số khách truy cập, kiểm tra và báo cáo quảng cáo, và tính cá nhân hoá.  sử dụng chỉ để thu thập dữ liệu vô danh.', '2025-08-11 13:20:34', '1.MỤC ĐÍCH THU THẬP THÔNG TIN CÁ NHÂN CỦA NGƯỜI TIÊU DÙNG:\r\nCung cấp dịch vụ cho Khách hàng và quản lý, sử dụng thông tin cá nhân của Người Tiêu Dùng nhằm mục đích quản lý cơ sở dữ liệu về Người Tiêu Dùng và kịp thời xử lý các tình huống phát sinh (nếu có).\r\n\r\n2. PHẠM VI SỬ DỤNG THÔNG TIN CÁ NHÂN:\r\nWebsite sử dụng thông tin của Người Tiêu Dùng cung cấp để:\r\nCung cấp các dịch vụ đến Người Tiêu Dùng;\r\n\r\n• Gửi các thông báo về các hoạt động trao đổi thông tin giữa Người Tiêu Dùng và Yamy;\r\n• Ngăn ngừa các hoạt động phá hủy, chiếm đoạt tài khoản người dùng của Người Tiêu Dùng hoặc các hoạt động giả mạo Người Tiêu Dùng;\r\n• Liên lạc và giải quyết khiếu nại với Người Tiêu Dùng;\r\n• Trong trường hợp có yêu cầu của cơ quan quản lý nhà nước có thẩm quyền.\r\n\r\n3. THỜI GIAN LƯU TRỮ THÔNG TIN CÁ NHÂN:\r\nKhông có thời hạn ngoại trừ trường hợp Người Tiêu Dùng gửi có yêu cầu hủy bỏ tới cho Ban quản trị hoặc Công ty giải thể hoặc bị phá sản.\r\n\r\n4. NHỮNG NGƯỜI HOẶC TỔ CHỨC CÓ THỂ ĐƯỢC TIẾP CẬN VỚI THÔNG TIN CÁ NHÂN CỦA NGƯỜI TIÊU DÙNG:\r\nNgười Tiêu Dùng đồng ý rằng, trong trường hợp cần thiết, các cơ quan/ tổ chức/cá nhân sau có quyền được tiếp cận và thu thập các thông tin cá nhân của mình, bao gồm:\r\n- Ban quản trị.\r\n• Bên thứ ba có dịch vụ tích hợp với Website atino.vn\r\n• Công ty tổ chức sự kiện và nhà tài trợ phối hợp cùng Yamy\r\n• Công ty nghiên cứu thị trường\r\n• Cố vấn tài chính, pháp lý và Công ty kiểm toán\r\n• Bên khiếu nại chứng minh được hành vi vi phạm của Người Tiêu Dùng\r\n• Theo yêu cầu của cơ quan nhà nước có thẩm quyền\r\n\r\n5. ĐỊA CHỈ CỦA ĐƠN VỊ THU THẬP VÀ QUẢN LÝ THÔNG TIN:\r\nHỘ KINH DOANH YAMY SHOP\r\nĐịa chỉ ĐKKD: Nguyễn Văn Ni, Tổ 1, Khu phố 6, Thị Trấn Củ Chi.\r\nCSKH & Bán hàng Online: 039.336.1913\r\n\r\n6.CAM KẾT BẢO MẬT THÔNG TIN CÁ NHÂN CỦA NGƯỜI TIÊU DÙNG:\r\n \r\nThông tin cá nhân của Người Tiêu Dùng trên Website được Ban quản trị cam kết bảo mật tuyệt đối theo chính sách bảo mật thông tin cá nhân được đăng tải trên Website yamy.vn . Việc thu thập và sử dụng thông tin của mỗi Người Tiêu Dùng chỉ được thực hiện khi có sự đồng ý của Người Tiêu Dùng trừ những trường hợp pháp luật có quy định khác và quy định này.\r\n\r\nKhông sử dụng, không chuyển giao, cung cấp hoặc tiết lộ cho bên thứ 3 về thông tin cá nhân của Người Tiêu Dùng khi không có sự đồng ý của Người Tiêu Dùng ngoại trừ các trường hợp được quy định tại quy định này hoặc quy định của pháp luật.\r\n\r\nTrong trường hợp máy chủ lưu trữ thông tin bị hacker tấn công dẫn đến mất mát dữ liệu cá nhân của Người Tiêu Dùng, Ban quản trị có trách nhiệm thông báo và làm việc với cơ quan chức năng điều tra và xử lý kịp thời, đồng thời thông báo cho Người Tiêu Dùng được biết về vụ việc.\r\n\r\n8.CƠ CHẾ TIẾP NHẬN VÀ GIẢI QUYẾT KHIẾU NẠI LIÊN QUAN ĐẾN VIỆC THÔNG TIN CỦA NGƯỜI TIÊU DÙNG:\r\n\r\nKhi phát hiện thông tin cá nhân của mình bị sử dụng sai mục đích hoặc phạm vi, Người Tiêu Dùng gọi điện thoại tới số 039.336. để khiếu nại và cung cấp chứng cứ liên quan tới vụ việc cho Ban quản trị. Ban quản trị cam kết sẽ phản hồi ngay lập tức hoặc muộn nhất là trong vòng 24 (hai mươi tư) giờ làm việc kể từ thời điểm nhận được khiếu nại.\r\n--------------------------', 'GIỜ MỞ CỬA:\r\n- Hà Nội, TP.HCM: 8h30 - 22h30\r\n- Ngoại thành & tỉnh khác: 8h30 - 22h00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `shipping_fee`, `status`, `name`, `phone`, `address`, `payment_method`, `created_at`, `total`) VALUES
(1, 2, 0.00, 0.00, 'pending', '', '', '123', 'COD', '2025-08-13 05:08:25', 0.00),
(2, 2, 400000.00, 30000.00, 'pending', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 05:41:25', 400000.00),
(3, 2, 400000.00, 30000.00, 'pending', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 05:41:26', 400000.00),
(4, 2, 400000.00, 30000.00, 'pending', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 05:41:26', 400000.00),
(5, 2, 400000.00, 30000.00, 'pending', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 05:41:26', 400000.00),
(6, 2, 400000.00, 30000.00, 'pending', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 05:41:38', 430000.00),
(7, 2, 400000.00, 30000.00, 'pending', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 05:42:28', 430000.00),
(8, 2, 400000.00, 30000.00, 'Đã giao hàng', 'Hai Dang', '0365858481', '123', 'COD', '2025-08-13 05:47:24', 0.00),
(9, 2, 200000.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 05:51:09', 0.00),
(10, 2, 699000.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'COD', '2025-08-13 05:52:22', 0.00),
(11, 2, 399000.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 05:53:14', 0.00),
(12, 2, 400000.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 05:53:27', 0.00),
(13, 2, 0.00, 30000.00, 'Đang xử lý', 'Hai Dang', '0365858481', '123', 'VNPay', '2025-08-13 06:09:42', 0.00),
(14, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 06:15:25', 0.00),
(15, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 06:20:16', 0.00),
(16, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'COD', '2025-08-13 06:20:24', 0.00),
(17, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 06:21:17', 0.00),
(18, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'COD', '2025-08-13 06:21:22', 0.00),
(19, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'COD', '2025-08-13 06:21:41', 0.00),
(20, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 06:21:55', 0.00),
(21, 2, 0.00, 30000.00, 'Đang xử lý', 'Hai Dang', '123', '123', 'VNPay', '2025-08-13 06:47:56', 0.00),
(22, 2, 0.00, 30000.00, 'Đang xử lý', '123', '123', '123', 'VNPay', '2025-08-13 06:48:09', 0.00),
(23, NULL, 729000.00, 30000.00, 'pending', '123', '123', '123', 'COD', '2025-08-17 07:48:47', 0.00),
(24, NULL, 729000.00, 30000.00, 'pending', '123', '123', '123', 'COD', '2025-08-17 07:49:56', 0.00),
(25, NULL, 729000.00, 30000.00, 'pending', '234', '123', '123', 'COD', '2025-08-17 07:50:13', 0.00),
(26, NULL, 729000.00, 30000.00, 'pending', '123', '123', '123', 'VNPay', '2025-08-17 07:50:26', 0.00),
(27, NULL, 729000.00, 30000.00, 'pending', '234', '234', '234', 'VNPay', '2025-08-17 08:01:54', 0.00),
(28, NULL, 1029999.00, 30000.00, 'pending', '123', '123', '123', 'VNPay', '2025-08-17 08:04:51', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 7, 2, 1, 400000.00),
(2, 8, 1, 1, 400000.00),
(3, 9, 7, 1, 200000.00),
(4, 10, 4, 1, 699000.00),
(5, 11, 3, 1, 399000.00),
(6, 12, 1, 1, 400000.00),
(7, 13, 2, 1, 400000.00),
(8, 14, 4, 1, 699000.00),
(9, 15, 4, 1, 699000.00),
(10, 16, 4, 1, 699000.00),
(11, 17, 4, 1, 699000.00),
(12, 18, 4, 1, 699000.00),
(13, 19, 4, 1, 699000.00),
(14, 20, 4, 1, 699000.00),
(15, 21, 4, 1, 699000.00),
(16, 22, 5, 1, 553000.00),
(17, 23, 4, 1, 699000.00),
(18, 24, 4, 1, 699000.00),
(19, 25, 4, 1, 699000.00),
(20, 26, 4, 1, 699000.00),
(21, 27, 4, 1, 699000.00),
(22, 28, 9, 1, 999999.00);

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
(3, 'hahaha', '123123', 'haha', 'haha@gmail.com', '0000-00-00', 0, '2025-04-13 18:46:19', 1, 1, NULL),
(6, '5305', '123123', 'haidang', '345345@gmail.com', '2003-09-10', 1, '2025-08-08 13:53:20', 0, 1, NULL);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
