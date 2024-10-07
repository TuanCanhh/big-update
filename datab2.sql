-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:8889
-- Thời gian đã tạo: Th10 01, 2024 lúc 02:33 AM
-- Phiên bản máy phục vụ: 8.0.35
-- Phiên bản PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `NAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `NAME`) VALUES
(1, 'Luggage'),
(2, 'Backpack'),
(3, 'Bag'),
(4, 'Men'),
(5, 'Women');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT NULL,
  `paid` decimal(12,4) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(100) DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `buy_qty` int DEFAULT NULL,
  `price` decimal(12,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `buy_qty`, `price`) VALUES
(1, 4, 10, 9.9900),
(1, 5, 18, 19.9900),
(1, 6, 1, 12.9900),
(1, 7, 31, 49.9000),
(1, 8, 8, 12.9900),
(1, 9, 12, 9.9900),
(2, 5, 1, 19.9900),
(3, 5, 1, 19.9900),
(4, 5, 1, 19.9900),
(5, 5, 1, 19.9900),
(5, 10, 1, 19.9900),
(6, 5, 1, 19.9900),
(6, 10, 1, 19.9900),
(7, 4, 2, 9.9900),
(7, 5, 1, 19.9900),
(7, 10, 1, 19.9900),
(8, 4, 2, 9.9900),
(8, 5, 1, 19.9900),
(8, 8, 1, 12.9900),
(8, 10, 1, 19.9900),
(9, 4, 2, 9.9900),
(9, 5, 1, 19.9900),
(9, 8, 1, 12.9900),
(9, 10, 1, 19.9900),
(10, 4, 2, 9.9900),
(10, 5, 1, 19.9900),
(10, 8, 1, 12.9900),
(10, 10, 1, 19.9900);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `price` decimal(12,4) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` text,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `NAME`, `price`, `qty`, `thumbnail`, `description`, `category_id`) VALUES
(1, 'Travelpro Platinum Elite 21\" Expandable Carry-On Spinner', 300.9900, 5, 'https://www.luggagepros.com/cdn/shop/products/Travelpro-Platinum-Elite-21-Expandable-Carry-On-Spinner-2_1c20af77-8a6f-4b5d-8f44-9e2889115bc6_1200x.jpg?v=1681401914', 'Maximize your carry-on with sophisticated style. The Platinum Elite 21\" Expandable Carry-On Spinner delivers big on form and function with a tip-resistant expansion that offers up to 2\" more packing capacity, deluxe tie-down system, integrated accessory pockets and a removable quart-size wet pocket that is TSA compliant and perfect for toiletries. Plus, the drop-in, fold-out suiter is specifically designed to accommodate hanging clothes and prevent wrinkling.\r\nBuilt-in USB port lets you power up on the go, while a dedicated powerbank pocket for your back-up battery adheres to FAA regulations. Perfect for short to medium-length trips, this carry-on spinner is crafted in style with premium fabrics, genuine leather and chrome zippers. Top-of-the-line mobility features include the PrecisionGlide system with eight MagnaTrac, self-aligning, 360-degree spinner wheels guided by an adjustable PowerScope extension handle with patented Contour Grip and rubberized touch points for comfortable, easy maneuvering wherever you go. Backed by our Built for a Lifetime Limited Worry Free Warranty.', 1),
(2, 'Brics Ulisse 21\" Expandable Spinner', 179.9900, 44, 'https://www.luggagepros.com/cdn/shop/files/Brics-Ulisse-21-Expandable-Spinner_9dc850b5-8596-4456-9bd2-452e20b87813_1200x.jpg?v=1727379043', 'The 21\" carry-on trolley Ulisse collection from Bric\'s. This stylish yet urban looking carry-on is made out of Polypropylene. This is a very strong, durable and light weight material that guarantees resistance to shocks and scratches. A functional carry-on trolley that makes it the perfect companion for every trip.', 1),
(3, 'FPM Milano Bank Trunk on Wheels', 245.9900, 68, 'https://www.luggagepros.com/cdn/shop/products/FPM-Milano-Bank-Trunk-on-Wheels-2_1200x.jpg?v=1667823480', 'Trunk on Wheels – 100% Aluminum. 4-wheeled suitcase. The dual wheels guarantee great stability and smoothness. The suitcase has an incorporated TSA lock combined with two maxi butterfly locks that ensures safety. The two handles are fine Italian leather, embossed with the FPM logo. The interior of the suitcase includes handcrafted belts in fine Italian leather. The lining is padded and removable. The interior organizer allows for optimum arrangement of contents. Ideal for 13/14-day journeys.\r\n\r\n', 1),
(4, 'Chiara Ferragni\r\n', 300.9900, 50, 'https://cdn-images.farfetch-contents.com/22/84/44/77/22844477_53102995_1000.jpg', 'Chiara Ferragni\r\nmedium Logomania travel case', 1),
(5, 'GLOBE TROTTER\r\nx GOLF Le FLEUR* 4-wheel suitcase', 600.9900, 44, 'https://cdn-images.farfetch-contents.com/22/88/04/20/22880420_52896588_1000.jpg', 'GLOBE TROTTER\r\nx GOLF Le FLEUR* 4-wheel suitcase\r\n\r\nMade in United Kingdom', 1),
(6, 'Nike Utility Elite\r\nBackpack (37L)', 170.9900, 68, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/8bbea777-9419-47da-a8d8-1cbc6b733000/NK+UTILITY+ELITE+BKPK+-+2.0.png', 'Hate putting your dirty shoes in the same compartment as the rest of your stuff? We\'ve got the bag for you. A partition in the main compartment helps keep your sneakers separate from the rest of your gear, while another zip pocket securely stores your laptop. An insulated hydration pocket on the side and a padded back with a luggage pass-through help make this the ultimate bag for commuting or travel.', 2),
(7, 'Nike Brasilia 9.5\r\nTraining Duffel Bag (Medium, 60L)', 60.9900, 17, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/21d42511-813d-45bf-afd4-45a6a37f9e7e/NK+BRSLA+M+DUFF+-+9.5+%2860L%29.png', 'The spacious and durable Nike Brasilia Duffel Bag keeps all your training gear at hand. A side compartment stores shoes separately, while inner and outer pockets help you stay organised. This product is made from at least 65% recycled polyester fibres.\r\n\r\n', 2),
(8, 'Nike Hike\r\nDuffel Bag (50L)', 150.9900, 68, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/93ce98eb-0fd6-43dc-be13-9bcef2c0f96d/HIKE+NIKE+DUFFEL.png', 'Take your gear from car to campsite with the Nike Hike Duffel. Its water-resistant fabric works with a storm flap over the zip of the spacious main compartment to help keep your gear dry. A pass-through pocket on the outside holds an umbrella or walking stick, while internal pockets provide storage and organisation for smaller items. Plus, an adjustable shoulder strap and dual handles give you comfortable carrying options.', 2),
(9, 'Nike Utility Elite\r\nBackpack (37L)', 70.9900, 44, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9bc362e1-1ecb-4f2d-9ffa-af01405d26fb/NK+UTILITY+ELITE+BKPK+-+2.0.png', 'Hate putting your dirty shoes in the same compartment as the rest of your stuff? We\'ve got the bag for you. A partition in the main compartment helps keep your sneakers separate from the rest of your gear, while another zip pocket securely stores your laptop. An insulated hydration pocket on the side and a padded back with a luggage pass-through help make this the', 2),
(10, 'Charlot Bowling Bag - Oat', 200.9900, 68, 'https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw5d139350/images/hi-res/2024-L7-CK2-30271504-K5-1.jpg?sw=756&sh=1008', 'If you love the original Charlot crossbody bag, you will love this refreshing and sophisticated bowling bag that has just been added to the much-love range. With its short double handles forming a distinctive triangular frame with its wide body and broad base, this sophisticated carrier in creamy oat is set to the be the star of any outfit you pair it with. Sporting the eye-catching metallic buckle that is a signature of the Charlot range, this bag also comes with a handy detachable strap.', 3),
(11, 'Velvet Bow Ruched Top Handle Bag - Dark Blue', 99.9900, 44, 'https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw03c67115/images/hi-res/2024-L6-CK2-50671688-B5-1.jpg?sw=756&sh=1008', 'This dark blue velvet top-handle bag makes the perfect plus-one for all your special occasions. From date nights to wedding dinners, you can always count on this exquisite piece to complete any outfit with elegance. The velvety soft finish adds a luxe feel, making it a delight to hold and behold. Additionally, the dainty bow embellishment and ruched handles add a feminine touch to the design. Adequately sized, it offers ample space for your everyday essentials, whether you are heading out for a casual day or a night on the town.', 3),
(12, 'Allen Fabric Portfolio Bag - Black', 200.9900, 68, 'https://www.pedroshoes.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-pd-products/default/dw523b7b03/images/hi-res/2024-L7-PM2-45210234-01-1.jpg?sw=1152&sh=1536&q=92', NULL, 3),
(13, 'Medium East-West Tote Bag\r\nBlack Dior Gravity Leather and Black Grained Calfskin', 1000.9900, 68, 'https://assets.christiandior.com/is/image/diorprod/1ESSH242LLGH00N_E01?$default_GHC_1280$&crop=214,32,1649,1794&bfc=on&qlt=85', 'New for Winter 2024, the East-West tote bag combines timeless elegance with Dior\'s couture spirit. Displaying the virtuosity of the House ateliers, the Dior Gravity leather showcases the iconic motif delicately embossed on black calfskin. Accented by tonal grained calfskin detailing and the Dior signature on the front, the structured design reveals a spacious interior with a pocket for a laptop as well as a zip pocket. Folding handles and an adjustable and removable strap allow the medium bag to be carried by hand, worn over the shoulder or crossbody.\r\n', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE `cart` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `quantity` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
);

