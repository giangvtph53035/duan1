-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2025 at 05:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_Id` int NOT NULL,
  `user_Id` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_Id`, `user_Id`, `product_id`, `variant_id`, `quantity`) VALUES
(23, 5, 21, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_Id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('hidden','active') NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_Id`, `name`, `status`, `image`) VALUES
(8, 'Acer', 'hidden', 'acer.png'),
(10, 'Lenovo', 'active', 'Lenovo.png'),
(11, 'MSI', 'active', 'msi.png'),
(12, 'Dell', 'active', 'logo-dell.jpg'),
(13, 'Apple', 'active', 'Apple.png'),
(15, 'Asus', 'active', 'asus.png');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_Id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `coupon_type` enum('percentage','fixed-Amount') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_value` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quantity` int NOT NULL,
  `status` enum('hidden','active') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_Id`, `name`, `coupon_type`, `coupon_code`, `coupon_value`, `start_date`, `end_date`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Giáng sinh an lành', 'fixed-Amount', 'CHRISTMAS2024', 50, '2024-12-20', '2024-12-30', 8, 'active', '2024-11-25 14:01:07', '2024-11-30 15:58:49'),
(3, 'Giảm 10%', 'percentage', 'Voucher_10%', 10, '2024-11-28', '2024-12-04', 30, 'hidden', '2024-11-25 16:38:48', '2024-12-05 09:46:46'),
(4, 'Mừng khách hàng mới', 'fixed-Amount', 'CHAOMUNGQUYKHACH', 50, '2024-12-04', '2024-12-12', 30, 'active', '2024-11-30 15:21:54', '2024-11-30 15:53:53'),
(5, '123aa', 'percentage', 'Voucher_20%', 20, '2024-12-13', '2024-12-21', 30, 'active', '2024-12-05 15:59:07', '2024-12-05 15:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_Id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favorite_Id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(14, 4, 21, 1, '2024-12-05 17:32:45', NULL),
(15, 4, 18, 1, '2025-02-20 12:50:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_Id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `order_detail_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_Id`, `user_id`, `product_id`, `variant_id`, `order_detail_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 21, 30, 5, 1, '2024-12-01 08:51:21', '2024-12-01 08:51:21'),
(2, 5, 20, 29, 6, 2, '2024-12-01 09:10:25', '2024-12-01 09:10:25'),
(4, 5, 18, 25, 10, 1, '2024-12-01 14:26:30', '2024-12-01 14:26:30'),
(5, 5, 21, 30, 11, 1, '2024-12-01 14:35:29', '2024-12-01 14:35:29'),
(6, 4, 20, 29, 12, 1, '2024-12-03 08:00:57', '2024-12-03 08:00:57'),
(7, 4, 20, 29, 13, 1, '2024-12-03 15:19:36', '2024-12-03 15:19:36'),
(8, 4, 21, 30, 14, 1, '2024-12-05 12:15:17', '2024-12-05 12:15:17'),
(9, 4, 20, 29, 15, 2, '2024-12-05 12:17:39', '2024-12-05 12:17:39'),
(10, 4, 21, 30, 16, 1, '2024-12-05 12:19:06', '2024-12-05 12:19:06'),
(11, 4, 20, 29, 17, 1, '2024-12-05 12:23:24', '2024-12-05 12:23:24'),
(12, 4, 21, 30, 18, 1, '2024-12-05 12:31:45', '2024-12-05 12:31:45'),
(13, 4, 21, 30, 19, 2, '2024-12-05 16:01:03', '2024-12-05 16:01:03'),
(14, 4, 18, 25, 20, 1, '2024-12-05 16:02:36', '2024-12-05 16:02:36'),
(15, 4, 20, 29, 21, 1, '2024-12-05 17:22:23', '2024-12-05 17:22:23'),
(16, 4, 18, 25, 22, 1, '2024-12-05 18:50:57', '2024-12-05 18:50:57'),
(17, 4, 20, 29, 24, 1, '2024-12-05 19:19:31', '2024-12-05 19:19:31'),
(18, 4, 20, 29, 25, 1, '2024-12-05 19:22:11', '2024-12-05 19:22:11'),
(19, 4, 21, 30, 26, 1, '2024-12-05 23:58:10', '2024-12-05 23:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_Id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('Pending','Confirmed','Shipped','Delivered','Canceled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending',
  `coupon_id` int DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `shipping_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_Id`, `name`, `email`, `phone`, `address`, `amount`, `note`, `user_id`, `status`, `coupon_id`, `payment_method`, `shipping_id`, `created_at`, `updated_at`) VALUES
(5, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 11700000, '', 4, 'Delivered', 3, 'cod', 3, '2024-12-01 08:51:21', '2024-12-03 14:52:40'),
(6, 'Hải hâm', 'haivv@gmail.com', 1234566789, 'Quảng ninh', 34000000, '', 5, 'Confirmed', 1, 'cod', 3, '2024-12-01 09:10:25', '2024-12-04 16:53:40'),
(10, 'Hải dốt hâm', 'haivv@gmail.com', 1234566789, 'Quảng ninh', 15000000, 'Giao hàng nhanh giúp tôi', 5, 'Confirmed', NULL, 'cod', 1, '2024-12-01 14:26:30', '2024-12-04 16:55:02'),
(11, 'Hải hâm 123', 'haivv@gmail.com', 1234566789, 'Quảng ninh', 13000000, 'Giao hàng nhanh', 5, 'Pending', NULL, 'cod', 2, '2024-12-01 14:35:29', '2024-12-04 16:52:38'),
(12, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 17000000, 'Giao nhanh giúp tôi', 4, 'Pending', NULL, 'cod', 2, '2024-12-03 08:00:57', '2024-12-03 08:00:57'),
(13, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 15300000, '', 4, 'Canceled', 3, 'cod', 2, '2024-12-03 15:19:36', '2024-12-04 03:45:25'),
(14, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13000000, '', 4, 'Pending', NULL, 'vnpay', 3, '2024-12-05 12:15:17', '2024-12-05 12:15:17'),
(15, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 30600000, '', 4, 'Pending', 3, 'vnpay', 2, '2024-12-05 12:17:39', '2024-12-05 12:17:39'),
(16, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13000000, '', 4, 'Pending', NULL, 'vnpay', 3, '2024-12-05 12:19:06', '2024-12-05 12:19:06'),
(17, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 17000000, '', 4, 'Pending', NULL, 'vnpay', 3, '2024-12-05 12:23:24', '2024-12-05 12:23:24'),
(18, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13000000, '', 4, 'Pending', NULL, 'vnpay', 3, '2024-12-05 12:31:45', '2024-12-05 12:31:45'),
(19, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 26000000, '', 4, 'Delivered', NULL, 'cod', 3, '2024-12-05 16:01:03', '2024-12-05 16:02:19'),
(20, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 15000000, '', 4, 'Canceled', NULL, 'vnpay', 3, '2024-12-05 16:02:36', '2024-12-05 17:22:37'),
(21, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13600000, '', 4, 'Canceled', 5, 'cod', 2, '2024-12-05 17:22:23', '2024-12-05 17:22:43'),
(22, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13500000, '', 4, 'Pending', 3, 'vnpay', 2, '2024-12-05 18:50:57', '2024-12-05 18:50:57'),
(23, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13500000, '', 4, 'Pending', 3, 'cod', 2, '2024-12-05 18:51:13', '2024-12-05 18:51:13'),
(24, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 17000000, '', 4, 'Pending', NULL, 'cod', 3, '2024-12-05 19:19:31', '2024-12-05 19:19:31'),
(25, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 17000000, '', 4, 'Pending', NULL, 'cod', 3, '2024-12-05 19:22:11', '2024-12-05 19:22:11'),
(26, 'Vũ Trường Giang', 'giangvtph53035@gmail.com', 349370112, 'Sơn La', 13000000, '', 4, 'Pending', NULL, 'cod', 3, '2024-12-05 23:58:10', '2024-12-05 23:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_Id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sale_price` float DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL,
  `views` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_Id`, `name`, `image`, `price`, `sale_price`, `description`, `category_id`, `views`) VALUES
(15, 'Laptop Dell Inspiron 3530 N3530I716W1 Silver', '6749312954e24-product_img1_dell-3530.jpg', 19000000, 18000000, 'Dell ', 12, NULL),
(16, 'Laptop gaming ASUS ROG Zephyrus G16 GA605WI QR152WS', '6749329571c10-product_img1_AsusRog16.webp', 20000000, 15000000, 'Laptop Gaming ASUS ROG Zephyrus G16 GA605WI QR152WS\r\n\r\nNếu bạn là một game thủ đòi hỏi hiệu suất mạnh mẽ và thiết kế di động, thì ASUS ROG Zephyrus G16 GA605WI QR152WS là sự lựa chọn lý tưởng. Dưới đây là mô tả chi tiết về sản phẩm:\r\n\r\nHiệu Suất Tuyệt Vời\r\nLaptop này được trang bị bộ vi xử lý AMD Ryzen 9 6900HS, mang lại khả năng xử lý mạnh mẽ và mượt mà cho mọi tác vụ từ chơi game đến công việc văn phòng. Kết hợp với card đồ họa NVIDIA GeForce RTX 3060, nó mang lại trải nghiệm chơi game đỉnh cao với hình ảnh chân thực và hiệu ứng đồ họa tuyệt vời.\r\n\r\nMàn Hình Sắc Nét\r\nASUS ROG Zephyrus G16 sở hữu màn hình 16 inch WQXGA (2560 x 1600) IPS-level với tần số quét 165Hz, giúp bạn thưởng thức những hình ảnh mượt mà, sắc nét và không bị xé hình. Công nghệ hiển thị IPS đảm bảo góc nhìn rộng và chất lượng hình ảnh ổn định.\r\n\r\nBộ Nhớ và Lưu Trữ\r\nMáy được trang bị 16GB RAM DDR4, giúp xử lý đa nhiệm hiệu quả và mượt mà. Ổ cứng 1TB NVMe SSD cung cấp không gian lưu trữ rộng rãi và tốc độ truy xuất dữ liệu nhanh chóng, đáp ứng tốt nhu cầu lưu trữ game và ứng dụng nặng.\r\n\r\nThiết Kế Di Động\r\nVới trọng lượng khoảng 2.1 kg, laptop này khá nhẹ và tiện lợi cho việc di chuyển. Thiết kế mỏng nhẹ và sang trọng của dòng ROG Zephyrus luôn gây ấn tượng mạnh mẽ đối với các game thủ và người dùng chuyên nghiệp.', 15, NULL),
(17, 'Laptop Lenovo Yoga Pro 7 14IMH9 83E2006MVN', '6749343181330-product_img1_YogaPro.jpg', 20000000, 15000000, 'Laptop Gaming ASUS ROG Zephyrus G16 GA605WI QR152WS\r\n\r\nNếu bạn là một game thủ đòi hỏi hiệu suất mạnh mẽ và thiết kế di động, thì ASUS ROG Zephyrus G16 GA605WI QR152WS là sự lựa chọn lý tưởng. Dưới đây là mô tả chi tiết về sản phẩm:\r\n\r\nHiệu Suất Tuyệt Vời\r\nLaptop này được trang bị bộ vi xử lý AMD Ryzen 9 6900HS, mang lại khả năng xử lý mạnh mẽ và mượt mà cho mọi tác vụ từ chơi game đến công việc văn phòng. Kết hợp với card đồ họa NVIDIA GeForce RTX 3060, nó mang lại trải nghiệm chơi game đỉnh cao với hình ảnh chân thực và hiệu ứng đồ họa tuyệt vời.\r\n\r\nMàn Hình Sắc Nét\r\nASUS ROG Zephyrus G16 sở hữu màn hình 16 inch WQXGA (2560 x 1600) IPS-level với tần số quét 165Hz, giúp bạn thưởng thức những hình ảnh mượt mà, sắc nét và không bị xé hình. Công nghệ hiển thị IPS đảm bảo góc nhìn rộng và chất lượng hình ảnh ổn định.\r\n\r\nBộ Nhớ và Lưu Trữ\r\nMáy được trang bị 16GB RAM DDR4, giúp xử lý đa nhiệm hiệu quả và mượt mà. Ổ cứng 1TB NVMe SSD cung cấp không gian lưu trữ rộng rãi và tốc độ truy xuất dữ liệu nhanh chóng, đáp ứng tốt nhu cầu lưu trữ game và ứng dụng nặng.\r\n\r\nThiết Kế Di Động\r\nVới trọng lượng khoảng 2.1 kg, laptop này khá nhẹ và tiện lợi cho việc di chuyển. Thiết kế mỏng nhẹ và sang trọng của dòng ROG Zephyrus luôn gây ấn tượng mạnh mẽ đối với các game thủ và người dùng chuyên nghiệp.', 10, NULL),
(18, 'Laptop gaming MSI Crosshair 16 HX D14VFKG 860VN', '674934b65d431-product_img1_MsiCross16.jpg', 20000000, 15000000, 'Laptop Gaming ASUS ROG Zephyrus G16 GA605WI QR152WS\r\n\r\nNếu bạn là một game thủ đòi hỏi hiệu suất mạnh mẽ và thiết kế di động, thì ASUS ROG Zephyrus G16 GA605WI QR152WS là sự lựa chọn lý tưởng. Dưới đây là mô tả chi tiết về sản phẩm:\r\n\r\nHiệu Suất Tuyệt Vời\r\nLaptop này được trang bị bộ vi xử lý AMD Ryzen 9 6900HS, mang lại khả năng xử lý mạnh mẽ và mượt mà cho mọi tác vụ từ chơi game đến công việc văn phòng. Kết hợp với card đồ họa NVIDIA GeForce RTX 3060, nó mang lại trải nghiệm chơi game đỉnh cao với hình ảnh chân thực và hiệu ứng đồ họa tuyệt vời.\r\n\r\nMàn Hình Sắc Nét\r\nASUS ROG Zephyrus G16 sở hữu màn hình 16 inch WQXGA (2560 x 1600) IPS-level với tần số quét 165Hz, giúp bạn thưởng thức những hình ảnh mượt mà, sắc nét và không bị xé hình. Công nghệ hiển thị IPS đảm bảo góc nhìn rộng và chất lượng hình ảnh ổn định.\r\n\r\nBộ Nhớ và Lưu Trữ\r\nMáy được trang bị 16GB RAM DDR4, giúp xử lý đa nhiệm hiệu quả và mượt mà. Ổ cứng 1TB NVMe SSD cung cấp không gian lưu trữ rộng rãi và tốc độ truy xuất dữ liệu nhanh chóng, đáp ứng tốt nhu cầu lưu trữ game và ứng dụng nặng.\r\n\r\nThiết Kế Di Động\r\nVới trọng lượng khoảng 2.1 kg, laptop này khá nhẹ và tiện lợi cho việc di chuyển. Thiết kế mỏng nhẹ và sang trọng của dòng ROG Zephyrus luôn gây ấn tượng mạnh mẽ đối với các game thủ và người dùng chuyên nghiệp.', 11, NULL),
(20, 'Laptop Acer Swift 14 AI SF14 51 53P9', '674935632c7d3-product_img2_Acer14.jpg', 21000000, 17000000, 'Laptop Gaming ASUS ROG Zephyrus G16 GA605WI QR152WS\r\n\r\nNếu bạn là một game thủ đòi hỏi hiệu suất mạnh mẽ và thiết kế di động, thì ASUS ROG Zephyrus G16 GA605WI QR152WS là sự lựa chọn lý tưởng. Dưới đây là mô tả chi tiết về sản phẩm:\r\n\r\nHiệu Suất Tuyệt Vời\r\nLaptop này được trang bị bộ vi xử lý AMD Ryzen 9 6900HS, mang lại khả năng xử lý mạnh mẽ và mượt mà cho mọi tác vụ từ chơi game đến công việc văn phòng. Kết hợp với card đồ họa NVIDIA GeForce RTX 3060, nó mang lại trải nghiệm chơi game đỉnh cao với hình ảnh chân thực và hiệu ứng đồ họa tuyệt vời.\r\n\r\nMàn Hình Sắc Nét\r\nASUS ROG Zephyrus G16 sở hữu màn hình 16 inch WQXGA (2560 x 1600) IPS-level với tần số quét 165Hz, giúp bạn thưởng thức những hình ảnh mượt mà, sắc nét và không bị xé hình. Công nghệ hiển thị IPS đảm bảo góc nhìn rộng và chất lượng hình ảnh ổn định.\r\n\r\nBộ Nhớ và Lưu Trữ\r\nMáy được trang bị 16GB RAM DDR4, giúp xử lý đa nhiệm hiệu quả và mượt mà. Ổ cứng 1TB NVMe SSD cung cấp không gian lưu trữ rộng rãi và tốc độ truy xuất dữ liệu nhanh chóng, đáp ứng tốt nhu cầu lưu trữ game và ứng dụng nặng.\r\n\r\nThiết Kế Di Động\r\nVới trọng lượng khoảng 2.1 kg, laptop này khá nhẹ và tiện lợi cho việc di chuyển. Thiết kế mỏng nhẹ và sang trọng của dòng ROG Zephyrus luôn gây ấn tượng mạnh mẽ đối với các game thủ và người dùng chuyên nghiệp.', 8, NULL),
(21, 'Laptop gaming MSI Thin 15', '674935f298903-product_img1_msithin.jpg', 21000000, 13000000, 'Laptop Gaming ASUS ROG Zephyrus G16 GA605WI QR152WS\r\n\r\nNếu bạn là một game thủ đòi hỏi hiệu suất mạnh mẽ và thiết kế di động, thì ASUS ROG Zephyrus G16 GA605WI QR152WS là sự lựa chọn lý tưởng. Dưới đây là mô tả chi tiết về sản phẩm:\r\n\r\nHiệu Suất Tuyệt Vời\r\nLaptop này được trang bị bộ vi xử lý AMD Ryzen 9 6900HS, mang lại khả năng xử lý mạnh mẽ và mượt mà cho mọi tác vụ từ chơi game đến công việc văn phòng. Kết hợp với card đồ họa NVIDIA GeForce RTX 3060, nó mang lại trải nghiệm chơi game đỉnh cao với hình ảnh chân thực và hiệu ứng đồ họa tuyệt vời.\r\n\r\nMàn Hình Sắc Nét\r\nASUS ROG Zephyrus G16 sở hữu màn hình 16 inch WQXGA (2560 x 1600) IPS-level với tần số quét 165Hz, giúp bạn thưởng thức những hình ảnh mượt mà, sắc nét và không bị xé hình. Công nghệ hiển thị IPS đảm bảo góc nhìn rộng và chất lượng hình ảnh ổn định.\r\n\r\nBộ Nhớ và Lưu Trữ\r\nMáy được trang bị 16GB RAM DDR4, giúp xử lý đa nhiệm hiệu quả và mượt mà. Ổ cứng 1TB NVMe SSD cung cấp không gian lưu trữ rộng rãi và tốc độ truy xuất dữ liệu nhanh chóng, đáp ứng tốt nhu cầu lưu trữ game và ứng dụng nặng.\r\n\r\nThiết Kế Di Động\r\nVới trọng lượng khoảng 2.1 kg, laptop này khá nhẹ và tiện lợi cho việc di chuyển. Thiết kế mỏng nhẹ và sang trọng của dòng ROG Zephyrus luôn gây ấn tượng mạnh mẽ đối với các game thủ và người dùng chuyên nghiệp.', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `product_galleries_Id` int NOT NULL,
  `product_id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`product_galleries_Id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(49, 15, '6749312959f83-product_img2_dell-3530.jpg', NULL, NULL),
(50, 15, '674931295bfb4-product_img3_dell-3530.jpg', NULL, NULL),
(51, 15, '674931295e770-product_img4_dell-3530.jpg', NULL, NULL),
(52, 15, '674931296135a-product_img5_dell-3530.jpg', NULL, NULL),
(53, 16, '6749329575ec9-product_img2_AsusRog16.jpg', NULL, NULL),
(54, 16, '6749329577904-product_img3_AsusRog16.jpg', NULL, NULL),
(55, 16, '67493295798c0-product_img4_AsusRog16.jpg', NULL, NULL),
(56, 16, '674932957ba59-product_img5_AsusRog16.jpg', NULL, NULL),
(57, 17, '6749343185c05-product_img2_YogaPro.jpg', NULL, NULL),
(58, 17, '6749343187f21-product_img3_YogaPro.jpg', NULL, NULL),
(59, 17, '6749343189a92-product_img4_YogaPro.jpg', NULL, NULL),
(60, 17, '674934318bb0b-product_img5_YogaPro.jpg', NULL, NULL),
(61, 18, '674934b6694f4-product_img2_MsiCross16.jpg', NULL, NULL),
(62, 18, '674934b66c710-product_img3_MsiCross16.jpg', NULL, NULL),
(63, 18, '674934b66e892-product_img4_MsiCross16.jpg', NULL, NULL),
(64, 18, '674934b67094e-product_img5_MsiCross16.jpg', NULL, NULL),
(65, 20, '6749356330b09-product_img2_Acer14.jpg', NULL, NULL),
(66, 20, '67493563327fc-product_img3_Acer14.jpg', NULL, NULL),
(67, 20, '67493563348c9-product_img4_Acer14.jpg', NULL, NULL),
(68, 20, '6749356336e5d-product_img5_Acer14.jpg', NULL, NULL),
(69, 21, '674935f29c0b6-product_img2_msithin.jpg', NULL, NULL),
(70, 21, '674935f29e40b-product_img3_msithin.jpg', NULL, NULL),
(71, 21, '674935f2a0729-product_img4_msithin.jpg', NULL, NULL),
(72, 21, '674935f2a2b3a-product_img5_msithin.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `product_variant_Id` int NOT NULL,
  `price` float NOT NULL,
  `sale_price` float DEFAULT NULL,
  `quantity` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_Ram_id` int NOT NULL,
  `variant_Rom_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`product_variant_Id`, `price`, `sale_price`, `quantity`, `product_id`, `variant_Ram_id`, `variant_Rom_id`) VALUES
(21, 18000000, 17000000, 20, 15, 1, 1),
(22, 19000000, 18000000, 20, 15, 2, 3),
(23, 20000000, 15000000, 20, 16, 1, 1),
(24, 200000000, 150000000, 20, 17, 1, 1),
(25, 20000000, 15000000, 20, 18, 1, 1),
(26, 20000000, 15000000, 20, 18, 2, 2),
(29, 21000000, 17000000, 8, 20, 1, 1),
(30, 21000000, 13000000, 10, 21, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_Id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_Id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 4, 21, 'Sản phẩm tốt', '2024-12-05 14:38:52', NULL),
(2, 4, 21, 'Sản phẩm dùng tốt', '2024-12-05 14:39:47', NULL),
(3, 4, 20, 'Sản phẩm rất tốt', '2024-12-05 15:37:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_Id` int NOT NULL,
  `role_type` enum('Admin','Customer') NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_Id`, `role_type`, `description`) VALUES
(1, 'Customer', 'user'),
(2, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `ship_Id` int NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_prices` float NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`ship_Id`, `shipping_name`, `shipping_prices`, `created_at`, `updated_at`) VALUES
(1, 'Giao hàng Nhanh', 35000, '2024-11-24 15:18:56', NULL),
(2, 'Giao hàng Hỏa tốc', 50000, '2024-11-24 15:19:53', '2024-11-24 15:19:53'),
(3, 'Giao hàng tiết kiệm', 25000, '2024-11-24 15:20:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int DEFAULT NULL,
  `gender` enum('Nam','Nu','Other') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `name`, `avatar`, `address`, `email`, `phone`, `password`, `role_id`, `gender`) VALUES
(4, 'Vũ Trường Giang', '452187750_1237309417294740_5243329928997052041_n.jpg', 'Sơn La', 'giangvtph53035@gmail.com', 349370112, '$2y$10$qKkBh9yV3Vuiaq0SXeaPM.cPsradwlAudkyCnzexOtGDqVCk.YrUW', 2, 'Nam'),
(5, 'Hải dốt hâm', NULL, 'Quảng ninh', 'haivv@gmail.com', 1234566789, '$2y$10$f0uV2d3sZcYaM9gsfv8Km.9Xt.hLKpZ8YUzCPBPB9UoNQO3lDRSmi', 1, 'Nu'),
(6, 'Duong', NULL, NULL, 'duongttph52969@gmail.com', NULL, '$2y$10$Sivasmzr/WKmGJBKZnh0QOnff93iO0xiuW/UlTck7bQSurhbYZfG2', 2, NULL),
(7, 'Hải hâm', NULL, NULL, 'haivv1@gmail.com', NULL, '$2y$10$IkS/1ZEYgoMqjcfbyUq7TOduYPduhsJ4tq9qDnXrBuESVui1Kqq7S', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variant_ram`
--

CREATE TABLE `variant_ram` (
  `variant_Ram_Id` int NOT NULL,
  `Ram_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `variant_ram`
--

INSERT INTO `variant_ram` (`variant_Ram_Id`, `Ram_name`, `created_at`, `updated_at`) VALUES
(1, '8 GB ', NULL, NULL),
(2, '16 GB', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variant_rom`
--

CREATE TABLE `variant_rom` (
  `variant_Rom_Id` int NOT NULL,
  `Rom_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `variant_rom`
--

INSERT INTO `variant_rom` (`variant_Rom_Id`, `Rom_name`, `created_at`, `updated_at`) VALUES
(1, 'SSD 256 GB', NULL, NULL),
(2, 'SSD 512 GB', NULL, NULL),
(3, 'SDD 1.0TB', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_Id`),
  ADD KEY `user_Id` (`user_Id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_Id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_Id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `variant_id` (`variant_id`),
  ADD KEY `order_detail_id` (`order_detail_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shipping_id` (`shipping_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_Id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`product_galleries_Id`),
  ADD KEY `product_galleries_ibfk_1` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`product_variant_Id`),
  ADD KEY `product_variants_ibfk_1` (`variant_Ram_id`),
  ADD KEY `product_variants_ibfk_2` (`variant_Rom_id`),
  ADD KEY `product_variants_ibfk_3` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_Id`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`ship_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `variant_ram`
--
ALTER TABLE `variant_ram`
  ADD PRIMARY KEY (`variant_Ram_Id`);

--
-- Indexes for table `variant_rom`
--
ALTER TABLE `variant_rom`
  ADD PRIMARY KEY (`variant_Rom_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `product_galleries_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `product_variant_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
  MODIFY `ship_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `variant_ram`
--
ALTER TABLE `variant_ram`
  MODIFY `variant_Ram_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variant_rom`
--
ALTER TABLE `variant_rom`
  MODIFY `variant_Rom_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`user_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`product_variant_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`product_variant_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`order_details_Id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `ships` (`ship_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`variant_Ram_id`) REFERENCES `variant_ram` (`variant_Ram_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_variants_ibfk_2` FOREIGN KEY (`variant_Rom_id`) REFERENCES `variant_rom` (`variant_Rom_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_variants_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
