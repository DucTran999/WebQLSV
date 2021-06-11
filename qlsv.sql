-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 10, 2020 lúc 02:48 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `msv` varchar(100) NOT NULL,
  `cc` float NOT NULL,
  `btl` float NOT NULL,
  `ktr` float NOT NULL,
  `ck` float NOT NULL,
  `TB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`id`, `id_lop`, `name`, `msv`, `cc`, `btl`, `ktr`, `ck`, `TB`) VALUES
(43, 1, 'Phạm Văn hiếu', 'B17DCAT112', 10, 8.5, 8, 8.75, 8.675),
(50, 1, 'Trần Anh Đức', 'B17DCAT045', 10, 8.25, 8.5, 8.5, 8.725),
(206, 1, 'Nguyễn Thái Học', 'B17DAT012', 10, 8, 8, 8, 8.2),
(207, 1, 'Nguyễn Thị Hoa', 'B17DAT013', 10, 7.75, 8, 9, 8.65),
(208, 1, 'Hoàng Thị Thảo', 'B17DAT014', 10, 8, 7.5, 8.75, 8.475),
(220, 1, 'Nguyễn Thái Học', 'B17DAT012', 10, 8, 8, 8, 8.2),
(221, 1, 'Nguyễn Thị Hoa', 'B17DAT013', 10, 7.75, 8, 9, 8.65),
(222, 1, 'Hoàng Thị Thảo', 'B17DAT014', 10, 8, 7.5, 8.75, 8.475),
(223, 1, 'Nguyễn Diệu Anh', 'B17DAT015', 10, 9, 8, 8.8, 8.8),
(224, 1, 'Nguyễn Hoài Thu', 'B17DAT016', 10, 9.25, 9.5, 9.25, 9.375),
(225, 1, 'Phạm Văn Hiếu', 'B17DCAT124', 10, 8.5, 8, 8.25, 8.675);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemsv`
--

CREATE TABLE `diemsv` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mon` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tin` int(10) NOT NULL,
  `diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diemsv`
--

INSERT INTO `diemsv` (`id`, `id_user`, `mon`, `tin`, `diem`) VALUES
(1, 3, 'Toán rời rạc 2', 2, 8.4),
(2, 3, 'Giải tích 2', 2, 8.5),
(3, 3, 'Lập trình web', 3, 8),
(4, 3, 'Tin học cơ sở 1', 1, 9),
(5, 3, 'Hệ điều hành', 3, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkhp`
--

CREATE TABLE `dkhp` (
  `id` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `mon` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ma` varchar(255) NOT NULL,
  `tin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dkhp`
--

INSERT INTO `dkhp` (`id`, `id_user`, `mon`, `ma`, `tin`) VALUES
(2, NULL, 'Lập trình web', 'INT1234', 3),
(3, NULL, 'Kỹ thuật số', 'INT1235', 2),
(4, NULL, 'Mật mã học cơ sở', 'INT1236', 3),
(5, NULL, 'An toàn hệ điều hành', 'INT1238', 3),
(7, 3, 'An toàn hệ điều hành', 'INT1238', 3),
(9, 3, 'Kỹ thuật số', 'INT1235', 0),
(10, 2, 'Kỹ thuật số', 'INT1235', 2),
(11, 2, 'Kỹ thuật số', 'int1235', 2),
(12, 2, 'Kỹ thuật số', 'INT1235', 2),
(13, 2, 'Kỹ thuật số', 'INT1235', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `name`) VALUES
(1, 'B17DCAT01-B'),
(2, 'B17DCAT02-B'),
(3, 'B17DCAT03-B');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

CREATE TABLE `mon` (
  `id` int(11) NOT NULL,
  `ma` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sotin` int(50) NOT NULL,
  `ki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mon`
--

INSERT INTO `mon` (`id`, `ma`, `ten`, `sotin`, `ki`) VALUES
(2, 'INT1234', 'Lập trình web ', 3, 'Kì 6'),
(3, 'INT1235', 'Kỹ thuật số', 2, 'Kì 4'),
(4, 'INT1236', 'Cơ sở an toàn thông tin', 3, 'Kì 6'),
(5, 'INT1237', 'An toàn hệ điều hành', 2, 'Kì 6'),
(6, 'INT1236', 'Hệ điều hành', 3, 'Kì 5'),
(7, 'INT1238', 'Lập trình hướng đối tượng', 3, 'Kì 4'),
(8, 'INT1239', 'Window Linux', 3, 'Kì 6'),
(9, 'INT1234', 'Java', 4, 'Kì 6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttsv`
--

CREATE TABLE `ttsv` (
  `ID` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `lop` varchar(255) NOT NULL,
  `nganh` varchar(255) NOT NULL,
  `que` varchar(255) NOT NULL,
  `MSV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ttsv`
--

INSERT INTO `ttsv` (`ID`, `hoten`, `gender`, `birth`, `lop`, `nganh`, `que`, `MSV`) VALUES
(1, 'Ngô Trần Anh Đức', 'Nam', '1999-12-08', 'D17DCAT01-B', 'ATTT', 'Hà Nội', 'B17DCAT001'),
(2, 'Phạm Văn Hiếu', 'Nam', '1999-12-12', 'D17DCAT01-B', 'ATTT', 'Nam ĐỊnh', 'B17DCAT012'),
(3, 'Nguyễn Thái Học', 'Nam', '1998-12-12', 'D17DCAT01-B', 'ATTT', 'Hà Nội', 'B17DCAT124'),
(14, 'Hoàng Ngọc Sơn', 'Nam', '1999-06-22', 'D17DCCN21-B', 'CNTT', 'Hà Nội', 'B17DCCN123'),
(15, 'Trần Anh Đức', 'Nam', '1999-12-08', 'D17DCAT01-B', 'ATTT', 'Hà Nội', 'B17DCAT045'),
(17, 'Nguyễn Linh', 'Nam', '1999-04-12', 'D17DAT01-B', 'ATTT', 'Hà Nam', 'B17DCAT012'),
(18, 'Việt Hoàng', 'Nam', '1999-06-08', 'D17DCAT01-B', 'ATTT', 'Nam ĐỊnh', 'B17DCAT124'),
(26, 'Nguyễn Thái Học', 'Nam', '1998-11-11', 'D17DCAT01-B', 'ATTT', 'Nam Định', 'B17DCAT148'),
(27, 'Giang Chu', 'Nam', '1999-12-19', 'D17DCAT02-B', 'ATTT', 'Nam Định', 'B17DCAT015');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `position`) VALUES
(2, 'AnhDuc', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Duc99', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'VietHuy', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lop` (`id_lop`);

--
-- Chỉ mục cho bảng `diemsv`
--
ALTER TABLE `diemsv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `dkhp`
--
ALTER TABLE `dkhp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttsv`
--
ALTER TABLE `ttsv`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT cho bảng `diemsv`
--
ALTER TABLE `diemsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dkhp`
--
ALTER TABLE `dkhp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mon`
--
ALTER TABLE `mon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ttsv`
--
ALTER TABLE `ttsv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id`);

--
-- Các ràng buộc cho bảng `diemsv`
--
ALTER TABLE `diemsv`
  ADD CONSTRAINT `diemsv_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `dkhp`
--
ALTER TABLE `dkhp`
  ADD CONSTRAINT `dkhp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
