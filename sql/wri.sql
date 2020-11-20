-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 04:17 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wri`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name_admin` int(11) NOT NULL,
  `thumnail_amdmin` int(11) DEFAULT NULL,
  `email_user` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `code_class` varchar(20) NOT NULL,
  `name_class` varchar(250) NOT NULL,
  `decription_class` varchar(2000) NOT NULL,
  `maxstudent_class` int(11) NOT NULL,
  `thumbnail_class` varchar(250) DEFAULT NULL,
  `currentstudent_class` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `code_class`, `name_class`, `decription_class`, `maxstudent_class`, `thumbnail_class`, `currentstudent_class`) VALUES
(1, 'LT001', 'Lap Trinh Mobile', 'asfasfaf', 34, 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', 2),
(2, 'kd', 'eq', 'ad', 12, 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', 2),
(3, 'd1', 'd1', 'ddd', 13, 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', 0),
(4, 'd2', 'd2', 'da', 17, 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', 0),
(5, 'd3', 'd3', 'dd', 33, 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name_company` varchar(250) NOT NULL,
  `thumbnail_company` varchar(250) DEFAULT NULL,
  `id_wishlist` int(11) DEFAULT NULL,
  `id_sample_email` int(11) DEFAULT NULL,
  `email_user` varchar(250) DEFAULT NULL,
  `id_packet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `name_company`, `thumbnail_company`, `id_wishlist`, `id_sample_email`, `email_user`, `id_packet`) VALUES
(1, 'com1', NULL, NULL, NULL, 'com1@gmail.com', NULL),
(2, 'com3', NULL, NULL, NULL, 'com3@gmail.com', NULL),
(3, 'Tuan Vy', NULL, NULL, NULL, 'admintuanvy@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_student_favorite`
--

CREATE TABLE `list_student_favorite` (
  `id_student` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'saved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail_example`
--

CREATE TABLE `mail_example` (
  `id` int(11) NOT NULL,
  `title_email` varchar(250) NOT NULL,
  `id_company` int(11) NOT NULL,
  `content_email` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `packet_company`
--

CREATE TABLE `packet_company` (
  `id` int(11) NOT NULL,
  `name_packet` varchar(250) NOT NULL,
  `count` int(11) DEFAULT 0,
  `id_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `name_point` int(11) NOT NULL,
  `id_student` int(11) DEFAULT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `code_stu` varchar(25) DEFAULT NULL,
  `name_stu` varchar(250) DEFAULT NULL,
  `thumbnail_stu` varchar(250) DEFAULT NULL,
  `birthday_stu` varchar(250) DEFAULT NULL,
  `major` varchar(250) DEFAULT NULL,
  `email_user` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `code_stu`, `name_stu`, `thumbnail_stu`, `birthday_stu`, `major`, `email_user`) VALUES
(7, 'wri001', 'Tuấn vỹ', 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', '11/11/2000', 'IT', 'tuanvy@gmail.com'),
(8, 'wri002', 'demo2', 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', NULL, 'demo', 'demo2@gmail.com'),
(9, 'wri003', 'demo1', 'http://192.168.1.113/wri/images/class/1605705090-cropped-1546083921.jpg', NULL, 'ee', 'demo@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stu_class`
--

CREATE TABLE `stu_class` (
  `id` int(11) NOT NULL,
  `id_stu` int(11) NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `stu_class`
--

INSERT INTO `stu_class` (`id`, `id_stu`, `id_class`) VALUES
(1, 7, 1),
(2, 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name_subject` varchar(250) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `code_teacher` varchar(25) NOT NULL,
  `name_teacher` varchar(250) NOT NULL,
  `description_teacher` varchar(2000) NOT NULL,
  `thumbnail_teacher` varchar(250) DEFAULT NULL,
  `email_user` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`code_teacher`, `name_teacher`, `description_teacher`, `thumbnail_teacher`, `email_user`) VALUES
('b1', 'b1', 'dad', 'http://192.168.1.96/wri/images/teacher/1605705925-cropped-783760542.jpg', 'gv1@gmail.com'),
('NN1', 'N1', 'da', 'http://192.168.1.96/wri/images/teacher/1605779357-cropped691368189.jpg', 'NN1@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher_class`
--

CREATE TABLE `teacher_class` (
  `id` int(11) NOT NULL,
  `code_teacher` varchar(25) NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(250) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `is_online` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `phonenumber`, `password`, `type`, `is_online`) VALUES
('0', '', 'd41d8cd98f00b204e9800998ec', 0, 0),
('admin@gmail.com', '01471202', '4297f44b13955235245b2497399d7a93', 0, 0),
('admintuanvy@gmail.com', '012345678', '4297f44b13955235245b2497399d7a93', 3, 0),
('com1@gmail.com', '0987654', '4297f44b13955235245b249739', 3, 0),
('com3@gmail.com', '098765432', '4297f44b13955235245b2497399d7a93', 3, 0),
('company@gmail.com', '032145678', '123123', 3, 0),
('demo2@gmail.com', '09876543', '4297f44b13955235245b249739', 1, 0),
('demo@gmail.com', '098765', '4297f44b13955235245b249739', 1, 0),
('gv1@gmail.com', '098765432', '4297f44b13955235245b2497399d7a93', 2, 0),
('NN1@gmail.com', '08765432', '4297f44b13955235245b2497399d7a93', 2, 0),
('student@gmail.com', '0000909999', '123123', 1, 0),
('teacher@gmail.com', '098765431', '123123', 2, 0),
('tuanvy@gmail.com', '09202902', '4297f44b13955235245b249739', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_user` (`email_user`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_user` (`email_user`);

--
-- Chỉ mục cho bảng `list_student_favorite`
--
ALTER TABLE `list_student_favorite`
  ADD KEY `favorite_stu` (`id_student`),
  ADD KEY `favorite_company` (`id_company`);

--
-- Chỉ mục cho bảng `mail_example`
--
ALTER TABLE `mail_example`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_company` (`id_company`);

--
-- Chỉ mục cho bảng `packet_company`
--
ALTER TABLE `packet_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packet_company` (`id_company`);

--
-- Chỉ mục cho bảng `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_student` (`id_student`),
  ADD KEY `points_subject` (`id_subject`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_user` (`email_user`);

--
-- Chỉ mục cho bảng `stu_class`
--
ALTER TABLE `stu_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_stu` (`id_class`),
  ADD KEY `stu_class` (`id_stu`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_class` (`id_class`),
  ADD KEY `subject_point` (`id_point`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`code_teacher`),
  ADD KEY `teacher_user` (`email_user`);

--
-- Chỉ mục cho bảng `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher` (`id_class`),
  ADD KEY `teacher_class` (`code_teacher`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mail_example`
--
ALTER TABLE `mail_example`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `packet_company`
--
ALTER TABLE `packet_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `stu_class`
--
ALTER TABLE `stu_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user` FOREIGN KEY (`email_user`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_user` FOREIGN KEY (`email_user`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `list_student_favorite`
--
ALTER TABLE `list_student_favorite`
  ADD CONSTRAINT `favorite_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `favorite_stu` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `mail_example`
--
ALTER TABLE `mail_example`
  ADD CONSTRAINT `mail_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`);

--
-- Các ràng buộc cho bảng `packet_company`
--
ALTER TABLE `packet_company`
  ADD CONSTRAINT `packet_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`);

--
-- Các ràng buộc cho bảng `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `points_subject` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id`);

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_user` FOREIGN KEY (`email_user`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `stu_class`
--
ALTER TABLE `stu_class`
  ADD CONSTRAINT `class_stu` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `stu_class` FOREIGN KEY (`id_stu`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_point` FOREIGN KEY (`id_point`) REFERENCES `points` (`id`);

--
-- Các ràng buộc cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_user` FOREIGN KEY (`email_user`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD CONSTRAINT `class_teacher` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `teacher_class` FOREIGN KEY (`code_teacher`) REFERENCES `teacher` (`code_teacher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
