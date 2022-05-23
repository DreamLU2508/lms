-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2022 lúc 07:22 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_new`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_image` varchar(5000) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(50) NOT NULL,
  `books_purchase_date` varchar(20) NOT NULL,
  `books_price` int(11) NOT NULL,
  `books_quantity` int(11) NOT NULL,
  `books_availability` int(11) NOT NULL,
  `librarian_id` int(11) NOT NULL,
  `books_file` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `books_name`, `books_image`, `books_author_name`, `books_publication_name`, `books_purchase_date`, `books_price`, `books_quantity`, `books_availability`, `librarian_id`, `books_file`) VALUES
(1, 'Theoretical Numerical Analysis', 'books-image/5ebaa3080bb0327177a67d697223498a41GxQsLNarL._SX328_BO1,204,203,200_.jpg', 'Kendall Atkinson', 'Dover Publications', '15/03/19', 420, 10, 8, 1, 'books-file/nalrs.pdf'),
(2, 'Health Informatics', 'books-image/9749fdc83fefbcc9cf3a55b16c7a353041SZngIJfuL._SX389_BO1,204,203,200_.jpg', 'Nancy Staggers', 'Elsevier Mosby', '12/03/19', 480, 15, 15, 1, 'books-file/Contents and Front Matter.pdf'),
(3, 'Digital Image Processing', 'books-image/f5546d1614746fed61c4162163d81a59196018.jpg', 'Rafael C. Gonzalez', 'Prentice Hall', '20/03/19', 500, 20, 18, 1, 'books-file/IT6005-SCAD-MSM-by www.LearnEngineering.in.pdf'),
(6, 'Artificial Intelligence', 'books-image/17385102edb4831bab1b8b0577389d5e0133001989.jpg', ' Peter Norvig', 'Dover Publications', '25/03/19', 420, 5, 3, 1, 'books-file/17385102edb4831bab1b8b0577389d5eArtificial Intelligence.pdf'),
(7, 'Parallel and Distributed Processing', 'books-image/1554233254.jpg', 'Jose Rolim', 'Elsevier Science', '02/0419', 350, 10, 9, 1, 'books-file/1554233331.pdf'),
(8, 'The Guest Book: A Novel', 'books-image/1568430614.jpg', 'test', 'test', '10/5/19', 200, 10, 10, 1, 'books-file/1568430614.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `issue_book`
--

CREATE TABLE `issue_book` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `booksissuedate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `issue_book`
--

INSERT INTO `issue_book` (`user_id`, `book_id`, `booksissuedate`) VALUES
(1, 6, '01/06/2019'),
(2, 1, '05/04/2019'),
(2, 3, '15/04/2020'),
(5, 2, '30/06/2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lib_registration`
--

CREATE TABLE `lib_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lib_registration`
--

INSERT INTO `lib_registration` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `photo`) VALUES
(1, 'Hoàng Trung Đức', 'admin', 'admin', 'duc@gmail.com', '0123456789', 'Hà Nội', 'upload/1571634617.jpg'),
(2, 'Lê Thị Mỹ Linh', 'LinhMy', 'admin', 'linh@gmail.com', '0123456789', 'Hà Nội', 'upload/1571634617.jpg'),
(3, 'Nguyễn Thị Thúy', 'thuy', 'admin', 'thuy@gmail.com', '0123456789', 'Hà Nội', 'upload/1571634617.jpg'),
(4, 'Nguyễn Đình Cương', 'cuong', 'admin', 'cuong@gmail.com', '0123456789', 'Hà Nội', 'upload/1571634617.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `lib_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `lib_id`, `user_id`, `title`, `msg`, `time`) VALUES
(1, 1, 1, 'test', 'good afternoon\r\n', '2019-09-07 11:49:45am'),
(2, 1, 1, 'testing message', 'Hi mamun ! Whats up?', '2019-09-07 03:53:07pm'),
(3, 1, 1, 'last', 'dfsdf', '2019-09-07 03:56:15pm'),
(4, 1, 2, 'test', 'Hi nahid!', '2019-09-10 06:35:04pm'),
(5, 1, 2, 'check', 'is it ok', '2019-09-10 06:38:07pm'),
(6, 1, 1, 'ttttt', 'mmnbvvv', '2019-09-14 10:51:44am');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `return_book`
--

CREATE TABLE `return_book` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `returndate` varchar(255) NOT NULL,
  `expirationdate` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `return_book`
--

INSERT INTO `return_book` (`user_id`, `book_id`, `returndate`, `expirationdate`, `cost`) VALUES
(1, 6, '05/04/2019', '25/5/2019', 100),
(2, 1, '05/04/2019', '25/5/2019', 0),
(2, 3, '15/04/2020', '25/5/2019', 0),
(5, 2, '30/06/2020', '25/5/2019', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `utype` varchar(7) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `utype`, `photo`, `status`) VALUES
(1, 'Đức', 'duc123', '123456', 'duc@gmail.com', '01932670148', 'Hà Nội', 'student', 'upload/avatar.jpg', 'yes'),
(2, 'Linh', 'linh123', '123456', 'linh@gmail.com', '01997259865', 'Hà Nội', 'student', 'upload/1568958905.jpg', 'yes'),
(3, 'Cương', 'cuong123', '123456', 'cuong@gmail.com', '01521458890', 'Hà Nội', 'student', 'upload/avatar.jpg', 'pending'),
(4, 'Anh', 'anh123', '123456', 'anh@gmail.com', '01785425452', 'Hà Nội', 'student', 'upload/avatar.jpg', 'yes'),
(5, 'Proddut', 'produtt', '123456', 'produtt@gmail.com', '0147852258', 'Hà Nội', 'student', 'upload/avatar.jpg', 'no'),
(6, 'jack', 'jack123', '123456', 'jack@gmail.com', '123456877', 'Hà Nội', 'student', 'upload/avatar.jpg', 'no'),
(7, 'hung', 'hung123', '123456', 'hung@gmail.com', '0124555241', 'Hà Nội', 'student', 'upload/avatar.jpg', 'yes'),
(8, 'test', 'zzzz22', '123456', 'test@gmail.com', '98776867222', 'Hà Nội', 'student', 'upload/avatar.jpg', 'yes'),
(9, 'mithun', 'mithun22', '123456', 'mithun22@gmail.com', '01245555555', 'Hà Nội', 'student', 'upload/avatar.jpg', 'no'),
(10, 'manh', 'manh123', '123456', 'manh123@gmail.com', '01721455456', 'Hà Nội', 'teacher', 'upload/avatar.jpg', 'yes'),
(11, 'Alex', 'alex123', '123456', 'alex@gmail.com', '01521488890', 'Hà Nội', 'teacher', 'upload/avatar.jpg', 'yes'),
(12, 'Danh', 'danh123', '123456', 'danh@gmail.com', '0177725845', 'Hà Nội', 'teacher', 'upload/avatar.jpg', 'no');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Chỉ mục cho bảng `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `lib_registration`
--
ALTER TABLE `lib_registration`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lib_id` (`lib_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `return_book`
--
ALTER TABLE `return_book`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lib_registration`
--
ALTER TABLE `lib_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`librarian_id`) REFERENCES `lib_registration` (`id`);

--
-- Các ràng buộc cho bảng `issue_book`
--
ALTER TABLE `issue_book`
  ADD CONSTRAINT `issue_book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `issue_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Các ràng buộc cho bảng `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `lib_registration` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `return_book`
--
ALTER TABLE `return_book`
  ADD CONSTRAINT `return_book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `return_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
