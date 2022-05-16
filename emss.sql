-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2022 lúc 09:14 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `emss`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benh_an`
--

CREATE TABLE `benh_an` (
  `ma_ho_so` int(11) NOT NULL,
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_benh_vien` varchar(50) NOT NULL,
  `tg_nhap_vien` date NOT NULL,
  `tg_xuat_vien` date NOT NULL,
  `tinh_trang_nhap_vien` text NOT NULL,
  `ly_do_xuat_vien` text NOT NULL,
  `tien_su` text NOT NULL,
  `dieu_tri` text NOT NULL,
  `chan_doan` text NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benh_nhan`
--

CREATE TABLE `benh_nhan` (
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_benh_vien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `benh_nhan`
--

INSERT INTO `benh_nhan` (`ma_benh_nhan`, `ma_benh_vien`) VALUES
(22, 'BV01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_quyen`
--

CREATE TABLE `chi_tiet_quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ma_vai_tro` int(11) NOT NULL,
  `ma_chuc_nang` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_quyen`
--

INSERT INTO `chi_tiet_quyen` (`ma_quyen`, `ma_vai_tro`, `ma_chuc_nang`, `trang_thai`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 0),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 0),
(9, 7, 1, 1),
(10, 7, 2, 0),
(11, 7, 3, 1),
(12, 7, 4, 0),
(13, 7, 5, 0),
(14, 7, 6, 0),
(15, 7, 7, 0),
(16, 7, 8, 0),
(17, 1, 9, 1),
(18, 6, 10, 1),
(19, 5, 10, 1),
(20, 4, 10, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_nang`
--

CREATE TABLE `chuc_nang` (
  `ma_chuc_nang` int(11) NOT NULL,
  `ten_chuc_nang` varchar(50) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuc_nang`
--

INSERT INTO `chuc_nang` (`ma_chuc_nang`, `ten_chuc_nang`, `trang_thai`) VALUES
(1, 'Quản lí người dùng', 1),
(2, 'Quản lí bệnh nhân', 1),
(3, 'Quản lí đối tượng cách ly', 1),
(4, 'Quản lí truy vết', 1),
(5, 'Quản lí xét nghiệm', 0),
(6, 'Phân quyền', 1),
(7, 'Thống kê', 1),
(8, 'Quản lí thông tin cá nhân ', 1),
(9, 'Quản lí địa điểm', 1),
(10, 'Xác nhận hoàn thành cách ly', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_diem`
--

CREATE TABLE `dia_diem` (
  `ma_dia_diem` int(11) NOT NULL,
  `ten_dia_diem` text NOT NULL,
  `tp_tinh` varchar(50) NOT NULL,
  `quan_huyen` varchar(50) NOT NULL,
  `phuong_xa` varchar(50) NOT NULL,
  `ap_thon` varchar(50) NOT NULL,
  `so_nha` varchar(50) NOT NULL,
  `phan_loai` int(50) NOT NULL,
  `suc_chua` int(11) NOT NULL,
  `so_luong_trong` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dia_diem`
--

INSERT INTO `dia_diem` (`ma_dia_diem`, `ten_dia_diem`, `tp_tinh`, `quan_huyen`, `phuong_xa`, `ap_thon`, `so_nha`, `phan_loai`, `suc_chua`, `so_luong_trong`, `trang_thai`) VALUES
(1, 'Trường Đại học Sài Gòn', 'Thành phố Hồ Chí Minh', 'Quận 12', 'Phường Trung Mỹ Tây', '', '', 0, 0, 0, 1),
(2, 'Ngã tư Trường Chinh', 'Thành phố Hồ Chí Minh', 'Quận 5', 'Phường 08', '', '73 An Dương Vương', 0, 0, 0, 1),
(3, 'Trường Đại học Sài Gòn', 'Thành phố Hồ Chí Minh', 'Quận 5', 'Phường 03', '', '73 An Dương Vương', 1, 0, 0, 1),
(4, 'Ngã Tư Trường Chinh', 'Tỉnh Bắc Kạn', 'Huyện Pác Nặm', 'Xã An Thắng', '', '', 1, 0, 0, 1),
(5, 'Y tế Quận 5', 'Tỉnh Hà Giang', 'Huyện Quản Bạ', 'Xã Quản Bạ', '', '', 0, 0, 0, 1),
(6, 'Trạm Y tế', 'Tỉnh Bắc Kạn', 'Huyện Ngân Sơn', 'Xã Thượng Quan', '', '', 0, 0, 0, 1),
(7, 'UBND', 'Tỉnh Tuyên Quang', 'Huyện Yên Sơn', 'Xã Tứ Quận', '', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doi_tuong_cach_ly`
--

CREATE TABLE `doi_tuong_cach_ly` (
  `ma_doi_tuong` int(11) NOT NULL,
  `ma_dia_diem` int(11) NOT NULL,
  `F` int(11) NOT NULL,
  `nguon_lay` int(11) NOT NULL,
  `hoan_thanh` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `doi_tuong_cach_ly`
--

INSERT INTO `doi_tuong_cach_ly` (`ma_doi_tuong`, `ma_dia_diem`, `F`, `nguon_lay`, `hoan_thanh`) VALUES
(51, 3, 0, 22, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_so_cach_ly`
--

CREATE TABLE `ho_so_cach_ly` (
  `ma_ho_so` int(11) NOT NULL,
  `ma_doi_tuong` int(11) NOT NULL,
  `ma_dia_diem` int(11) NOT NULL,
  `tg_bat_dau` datetime NOT NULL,
  `tg_ket_thuc` date NOT NULL,
  `F` int(11) NOT NULL,
  `nguon_lay` int(11) NOT NULL,
  `cmnd` varchar(100) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ho_so_cach_ly`
--

INSERT INTO `ho_so_cach_ly` (`ma_ho_so`, `ma_doi_tuong`, `ma_dia_diem`, `tg_bat_dau`, `tg_ket_thuc`, `F`, `nguon_lay`, `cmnd`, `trang_thai`) VALUES
(53, 22, 3, '2022-05-10 03:42:57', '0000-00-00', -1, 22, NULL, 1),
(54, 44, 6, '2022-05-10 03:45:41', '0000-00-00', 1, 22, NULL, 1),
(55, 51, 3, '2022-05-10 03:46:47', '0000-00-00', 0, 22, NULL, 1),
(56, 22, 3, '2022-05-10 03:46:54', '2022-05-10', 2, 22, '123456789', 1),
(57, 8, 2, '2022-05-09 22:53:00', '2022-05-10', 1, 22, '89U7cxpZSM791zc0kCa1dS/Osebd8K1PxLQvrhoO1aRa4S+FzeVBVwXyvbKPA1RdnbSq3jDG3V0GYK6kxId4nA==', 1),
(58, 44, 1, '2022-05-10 03:59:28', '0000-00-00', -1, 22, NULL, 1),
(59, 44, 1, '2022-05-10 04:00:20', '2022-05-10', 2, 22, NULL, 1),
(60, 44, 1, '2022-05-10 04:41:29', '2022-05-10', -1, 22, '123456789', 1),
(61, 44, 1, '2022-05-10 04:44:13', '2022-05-10', -1, 22, '123456789', 1),
(62, 44, 1, '2022-05-10 04:57:01', '2022-05-10', -1, 22, '123456789', 1),
(63, 44, 1, '2022-05-10 05:02:28', '2022-05-10', -1, 22, '123456789', 1),
(64, 44, 1, '2022-05-10 05:26:05', '2022-05-10', -1, 22, '123456789', 1),
(65, 44, 1, '2022-05-10 06:59:36', '2022-05-10', -1, 22, '123456789', 1),
(66, 44, 1, '2022-05-10 07:05:59', '2022-05-10', -1, 22, '123456789', 1),
(67, 44, 1, '2022-05-10 07:07:59', '2022-05-10', -1, 22, '123456789', 1),
(68, 44, 1, '2022-05-10 07:09:23', '2022-05-10', -1, 22, '123456789', 1),
(69, 44, 1, '2022-05-10 13:13:03', '2022-05-10', 0, 22, '89U7cxpZSM791zc0kCa1dS/Osebd8K1PxLQvrhoO1aRa4S+FzeVBVwXyvbKPA1RdnbSq3jDG3V0GYK6kxId4nA==', 1),
(70, 44, 1, '2022-05-10 16:12:59', '2022-05-10', -1, 22, '89U7cxpZSM791zc0kCa1dS/Osebd8K1PxLQvrhoO1aRa4S+FzeVBVwXyvbKPA1RdnbSq3jDG3V0GYK6kxId4nA==', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_trinh`
--

CREATE TABLE `lich_trinh` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `ma_dia_diem` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `ma_vai_tro` int(11) NOT NULL,
  `ho_lot` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `cmnd` varchar(100) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `phai` varchar(3) NOT NULL,
  `dia_chi` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `so_dien_thoai` varchar(100) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `user_name`, `password`, `ma_vai_tro`, `ho_lot`, `ten`, `cmnd`, `ngay_sinh`, `phai`, `dia_chi`, `email`, `so_dien_thoai`, `trang_thai`) VALUES
(1, 'SlWx/WG+lizlRgxNG4qEnkKMI47LZn979ZIjp6asS6Dym5yd8m/+yq4gVqBtVPP300qoOhx7zhCYZM1F24FVyg==', 'p7kFijuPkfbnjJZIr+03dcQh80cy7qzoh0IYrN4eWZCyLZS4VOWAbRkcpjWbOCqlqaXyXT8YFycLNPs4n7xx+yD2iXXqkgL3e5eliKyrvZbVcGKuhGoO/kNWuyeQuhFBZnk3G0TSIhLzvtjbjXAcahSAz8TexOGzwzgAihprvWp3aX4A2ttdH4vWdXPiPDFIyZbUq6n5cHu5139LPJj9sA==', 1, 'admin', 'admin', '3Vqb5gG77fHoCftYK6RHNZV0GRAuC/4/w96Ks5hXb6c8r+DIqr8vgcTsbXX7nkosHy2aN/6Jzx1aaqiIytrrAA==', '2001-01-24', 'Nam', 'Tỉnh Yên Bái-Thành phố Yên Bái-Xã Tân Thịnh--', 'admin@gmail.com', 'YqtrQsI3+WftdjTQdVxFOv9f7biUFNj5fYjLKYu7cSHlgrcRG870VGlxh5TUBzIBbFOxL1wudCxPtjtBb/SGJw==', 1),
(2, 'aAPwoT6e9lFU+WdC1w/mC6znzSa2rZfoU/Tni57dsdFeMp6WfzJzTiOO0PjC9xUD5/3k/5gmtDNuFxEkKF8YVA==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 1, 'Phan Thanh', 'Thắng', 'x7y7J/QaFHiA5QgV+R81s/yigzx3XTdd2frSDDLkFDyI20yQmkyWQf/jxQe4eB0AXrq4js3OEAVUbcQpNsp0Lg==', '2001-05-20', 'Nam', 'Thành phố Hồ Chí Minh - Quận 5 - Phường 08 - 73 An Dương Vương', '', 'aAPwoT6e9lFU+WdC1w/mC6znzSa2rZfoU/Tni57dsdFeMp6WfzJzTiOO0PjC9xUD5/3k/5gmtDNuFxEkKF8YVA==', 1),
(3, '5SUw4kMHZ/DeiaZPdDJ5XWQ360826t81PDwgWrcW4kb9BKHD4XFv/mBXXoz+vWLPUC5YDE0SV4IONhPWvFxsvw==', 'dNFYaRVA7uIl2WFCFyINbAo/E+jYFy114p4CkV7M6/fs20SKPQKG2BFeeVtirXVTze7JjV7Pu2xujT5ZHIZf9DqB0TQtIbMeno506GdBEeHAEed0Md16fJkPEg0VL84vGTNiZhJDSwWHiuxGMmqajmunBEe3KmrD66wz6x599uTAoCsTvwFz+ooxfYeY+Uh3mtlh1phzWx0mZr6MN7w7Ag==', 1, 'Phan', 'Anh Quân', 'qVW2+qccJ6eh0NyrTCzVrKkSOgcbpWiENYlR0RFXqDg3s0mNF6b3rAzAUYJb6TrfuHdHMLJ8MnRoBlFSrsDS5g==', '2001-01-05', 'Nam', 'Thành phố Hồ Chí Minh - Quận 5 - Phường 08 - 73 An Dương Vương', 'phananhquan48@gmail.com', 'uGSFEe9fk+KfiekfTNXVkeg+dPW08ARdXKJB0/v5qaoSgsiyhRTujxVDH1Qqmf2pL4ZoBhpMOa46PhqAFUMyWg==', 1),
(8, 'hD2T9ocrEuPl5gGCVlP2aQn6Uk6O0i7fc+Wlpj1dN8nnlnjqe3aa/bI3UhR1TsfSlAICCKVsOE6or4Va4WSFQw==', 'idQSzYlR8m+QrOer49sOO7FaLRSCDsUzNKQqpXpyagFuYT5vEdkQnC8RAnpaGWGJl7BKJYXBTOsdamVcoljGcVxrvwQXNR+5Gb46HneaJnUTw4I1ix9S2MZ/AfTBeKeN18XuccucqLOR95pTKInmPV8ss5ag5lEixThO1VLRMwFQgI83PxTOvZZTwkhfRJi5Zf4X04oQAEV07RXVmQOXLA==', 6, 'Nguyễn Văn', 'Khải', 'w+G1Tmx5RyqDnzKT0fKbgbkrIr4L7FoCqKip5ZeqmhMpFNID3lWmzR8+MQrrs4DntREGiF8IgnbHnCscKOUY6A==', '2001-01-01', 'Nam', 'Tỉnh Thái Nguyên - Huyện Đồng Hỷ - Xã Nam Hòa', '', 'ae5TS/bhdr0SdMKBpUt7dqvJJWAeEZ06DfqzCh1OJR0Cyfig0nAzugPVwxNGvlLAPMiuWuVlBoDT/S3BGGicng==', 1),
(22, 'kj6cnTFwv0JrWBaBmh6Ye95x9TUkrgMLD/rAjy7GC5gbnGbaho774ipRf1WbC053zBikihUcIbEIL9HpDhJs3g==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 4, 'Phan Thanh', 'Thắng', 'ZEvjxLdiyqYkWrE8aw7TYmatcfjLJoQuR0qjfx26EhyZKIcG2iRp+olb914K5FmDCNC4Ag2XNmlrHdYoB+YW9w==', '0000-00-00', 'Nam', 'Thành phố Hồ Chí Minh-Quận 5-Phường 08--', 'phanthangpt199@gmail.com', 'C/4eydl/YEo+SnP0YloRaJglB5Ft/Rr04gfZtHaM8njnqiKTrUK6HNOgpfBuuiWDvsyGDVDjlSK9+VeyId29Yg==', 1),
(44, '7nscPTL2/Qx8EtWd+MkXyvF9xJcVRS1mR/NIbnsIMzwgNEBTx/sH5kVY4mLYQ9KOJT8ZRQOKc0jlJCNn8yhODw==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 6, 'Dương Văn', 'Kha', 'omMwcAa/eobRby/SsQl4NtPNLb0HVWSVhFE+kF+oDLAEaU6xL7Z8StG4u517/TrWEe+OVMFiku/WgK+Xo0BUEA==', '2001-05-20', 'Nam', 'Tỉnh Bắc Giang-Huyện Sơn Động-Xã Vĩnh An', '', 'BIjGx+oISzJtwutlWHRcgOiwsjpr3zdMxHG/np9G++BCYfKlMhNavP1/NWdLKme4MBlYvh1M+Cax6bfe2iQKYQ==', 1),
(45, 'DzCSjheg8vdSWS8YoH0XHm7li+gI4IRhHSnS2V/Jl2+VBroanSqS2Vx9KtFDvaAwFJIu07BdrVrEavawuN0Vgg==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 6, 'Phan Thanh', 'Thắng', '8kcuy5EoiHihY6tjTnXgo5pay2xel54NDhIqt+zhk20NcouTXicSQCMztcMkUMcYpdMGqcDQA7QVzTiO6Il0Yg==', '2001-05-20', 'Nam', 'Tỉnh Thái Nguyên-Huyện Đại Từ-Xã Phú Thịnh', 'ef.tieudao@gmail.com', 'Kpjm9PjoRkf/BsEpao13cWNBw5T6HiUjwWWPwpcy6NuhOmyMOx64J+wLDC3sOfLFX5UPYhG2Lao7YMNXfAUeEQ==', 0),
(51, 'NOxvjXm+kMhnJHz0cQUS7zwge2BmJheO+I0A2Q8oUgffptgHjdRi3lM/jMkjQaKBL422Z7bsG2bpqd1Bntlb7g==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 5, 'Dương Văn', 'Ngọc', 'BfY8BSsOhIyD2OqcyNkb8qVvDljl1v/rKqPJNFSQiYz2P4VDrnS+sDlzlQCWtztMHWFyeRi5G1qitQsh2nW3Fw==', '2001-05-20', 'Nam', 'Tỉnh Vĩnh Phúc-Huyện Lập Thạch-Xã Văn Quán', '', 'hyfMqc4MrjcBA8TjGCIPhVbjIrLtU9h6vJF8V559lWOsQOWAj136pn8d3GPKiNS+1HF3J65LBcAZp/Hmi2cA1A==', 1),
(52, 'ce0Cntrv8/+fIacCfrTzqN9iqsmztrRskrs6pB0Wsebj1uqdTj6hNFpp7ACtReKcRZ+XUDjPnmnQqDqMQcqgGg==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 5, 'Nguyễn Văn', 'Lợi', 'qPX2TyjXmnPDMK3IlubkDG0IXViAz7XxH9CBhM918r35+oe9mPXQIfVphSbwEnJYrwKNQpgDzClHhhAzW5K1+A==', '2001-05-20', 'Nam', 'Tỉnh Lào Cai-Huyện Mường Khương-Xã Cao Sơn', 'phanthangpt199@gmail.com', '7o96RNP1obxA2NCZh0Eq9+Sjuk8ifZIw2x+AMHB2xOh2zeDKno8wkUzEJmMSQs4/6EhayMqjHy1piBtjAMU+yw==', 0),
(53, 'fpmaxHw0SVuyEA0gYjcUp86iIpecHB4PG6Yfq0WH1OThrcBtUV/9tjgwVPdyy4q7hC0Sft5tWHLTHwbTxTLz+g==', 'xVr7rge40DQ9Wst/ZFYianI7YhxOEIMQf7P7k7/CxhWvYZDOJ08b/lDEUoE5gs3sV1fZB4PbWJuFVnop0+lpMeqdohSOeHGDdE1pdf+7nN3cmJHPFbzXZ2mCYgRXoiOUZFE/EKjg1ecGG3Q6DGg3gi5CEjU47fHLAwXSr0jRLyw7wyKjsnQqpbyTJgiXvsUWAb4JjYZ3w9OiuJutM2uEUQ==', 6, 'Nguyễn Văn', 'Lợi', '2fvmO5vW9EWL4dv+4+m0fVgOTBZmjtmxpGo6parHJc++lcfFpMutNPzIx1on16E29dMqIlbyS/x7CvfhAXkibw==', '2001-01-20', 'Nam', 'Tỉnh Điện Biên-Huyện Mường Nhé-Xã Chung Chải', 'letieuss211@gmail.com', 'PAOOVjjlt3s6fbGLMveM1kvFCUH0+pFpX0TsDYiw6P5xat42akcmuvxVtzaqFKPUt0TrvolHeDW2U6kP8iRszA==', 1),
(55, 'W3AK7UUUqXASU72SYi0QB4LgygRr5XYZRK0L1gMlWAVA+YtidaLUQwZUWTTDV7hp1MpeeJg4oj/HhED8nLpPXQ==', 'Z+VOtMXDhfh0NnR5C3HyFg5oMpvXpOGwIltxes+eItsyyCS+jF8W8gnk0IHZ+x42go/WPx/ULXhyW6/qZraZ5ZBYqfQFmZKKz5tYVFIZuOBR03YSfrYUNyrU8gs0tIz9mPjoYgbk+B6uLvRxDbWstnpXIHfIUZtISunDKDUkHLQSftc8XIMrIljN29Kb7r8X2YYnGTIFizwo//6kNty3Og==', 6, 'Đặng An', 'Bình', 'yKel8Zk81tOJA1dPi33UyevlCJW25pR3V5RcmumK88eFjP+QsonTBaWpKxaMdtfayEQX8iSQycDvvuUe8E2slw==', '2001-10-20', 'Nam', 'Tỉnh Cao Bằng - Huyện Bảo Lạc - Xã Hưng Thịnh', 'phananhquan48@gmail.com', 'W3AK7UUUqXASU72SYi0QB4LgygRr5XYZRK0L1gMlWAVA+YtidaLUQwZUWTTDV7hp1MpeeJg4oj/HhED8nLpPXQ==', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nhan_vien` int(11) NOT NULL,
  `ma_chuc_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_nhan_vien`, `ma_chuc_vu`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_truy_vet`
--

CREATE TABLE `thong_tin_truy_vet` (
  `ma_truy_vet` int(11) NOT NULL,
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_nhan_vien` int(50) NOT NULL,
  `thoi_gian_truy_vet` datetime NOT NULL,
  `tg_bat_dau` datetime NOT NULL,
  `tg_ket_thuc` datetime NOT NULL,
  `trang_thai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_xet_nghiem`
--

CREATE TABLE `thong_tin_xet_nghiem` (
  `ma_mau_XN` int(11) NOT NULL,
  `ma_ho_so` int(11) NOT NULL,
  `tg_lay_mau` datetime NOT NULL,
  `tg_co_ket_qua` datetime NOT NULL,
  `ket_qua` varchar(50) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vai_tro`
--

CREATE TABLE `vai_tro` (
  `ma_vai_tro` int(11) NOT NULL,
  `ten_vai_tro` varchar(50) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vai_tro`
--

INSERT INTO `vai_tro` (`ma_vai_tro`, `ten_vai_tro`, `trang_thai`) VALUES
(1, 'Administrator', 1),
(2, 'Cán bộ quản lí', 1),
(3, 'Cán bộ nhập liệu', 1),
(4, 'Bệnh nhân', 1),
(5, 'Đối tượng cách ly', 1),
(6, 'Người dân ', 1),
(7, 'Test', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `benh_an`
--
ALTER TABLE `benh_an`
  ADD PRIMARY KEY (`ma_ho_so`),
  ADD KEY `ma_benh_nhan` (`ma_benh_nhan`);

--
-- Chỉ mục cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD PRIMARY KEY (`ma_benh_nhan`);

--
-- Chỉ mục cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD PRIMARY KEY (`ma_quyen`),
  ADD KEY `ma_vai_tro` (`ma_vai_tro`),
  ADD KEY `ma_chuc_nang` (`ma_chuc_nang`);

--
-- Chỉ mục cho bảng `chuc_nang`
--
ALTER TABLE `chuc_nang`
  ADD PRIMARY KEY (`ma_chuc_nang`);

--
-- Chỉ mục cho bảng `dia_diem`
--
ALTER TABLE `dia_diem`
  ADD PRIMARY KEY (`ma_dia_diem`);

--
-- Chỉ mục cho bảng `doi_tuong_cach_ly`
--
ALTER TABLE `doi_tuong_cach_ly`
  ADD PRIMARY KEY (`ma_doi_tuong`),
  ADD KEY `ma_dia_diem` (`ma_dia_diem`),
  ADD KEY `nguon_lay` (`nguon_lay`);

--
-- Chỉ mục cho bảng `ho_so_cach_ly`
--
ALTER TABLE `ho_so_cach_ly`
  ADD PRIMARY KEY (`ma_ho_so`),
  ADD KEY `ma_dia_diem` (`ma_dia_diem`),
  ADD KEY `ma_doi_tuong` (`ma_doi_tuong`);

--
-- Chỉ mục cho bảng `lich_trinh`
--
ALTER TABLE `lich_trinh`
  ADD PRIMARY KEY (`ma_nguoi_dung`,`thoi_gian`,`ma_dia_diem`),
  ADD KEY `ma_dia_diem` (`ma_dia_diem`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`),
  ADD UNIQUE KEY `cmnd` (`cmnd`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `ma_vai_tro` (`ma_vai_tro`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nhan_vien`),
  ADD KEY `ma_chuc_vu` (`ma_chuc_vu`);

--
-- Chỉ mục cho bảng `thong_tin_truy_vet`
--
ALTER TABLE `thong_tin_truy_vet`
  ADD PRIMARY KEY (`ma_truy_vet`),
  ADD KEY `ma_benh_nhan` (`ma_benh_nhan`),
  ADD KEY `ma_nhan_vien` (`ma_nhan_vien`);

--
-- Chỉ mục cho bảng `thong_tin_xet_nghiem`
--
ALTER TABLE `thong_tin_xet_nghiem`
  ADD PRIMARY KEY (`ma_mau_XN`),
  ADD KEY `ma_ho_so` (`ma_ho_so`);

--
-- Chỉ mục cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`ma_vai_tro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `benh_an`
--
ALTER TABLE `benh_an`
  MODIFY `ma_ho_so` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  MODIFY `ma_benh_nhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `chuc_nang`
--
ALTER TABLE `chuc_nang`
  MODIFY `ma_chuc_nang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dia_diem`
--
ALTER TABLE `dia_diem`
  MODIFY `ma_dia_diem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ho_so_cach_ly`
--
ALTER TABLE `ho_so_cach_ly`
  MODIFY `ma_ho_so` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `thong_tin_truy_vet`
--
ALTER TABLE `thong_tin_truy_vet`
  MODIFY `ma_truy_vet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thong_tin_xet_nghiem`
--
ALTER TABLE `thong_tin_xet_nghiem`
  MODIFY `ma_mau_XN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  MODIFY `ma_vai_tro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `benh_an`
--
ALTER TABLE `benh_an`
  ADD CONSTRAINT `benh_an_ibfk_1` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`);

--
-- Các ràng buộc cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD CONSTRAINT `benh_nhan_ibfk_1` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Các ràng buộc cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD CONSTRAINT `chi_tiet_quyen_ibfk_1` FOREIGN KEY (`ma_vai_tro`) REFERENCES `vai_tro` (`ma_vai_tro`),
  ADD CONSTRAINT `chi_tiet_quyen_ibfk_2` FOREIGN KEY (`ma_chuc_nang`) REFERENCES `chuc_nang` (`ma_chuc_nang`);

--
-- Các ràng buộc cho bảng `doi_tuong_cach_ly`
--
ALTER TABLE `doi_tuong_cach_ly`
  ADD CONSTRAINT `doi_tuong_cach_ly_ibfk_1` FOREIGN KEY (`ma_doi_tuong`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `doi_tuong_cach_ly_ibfk_2` FOREIGN KEY (`ma_dia_diem`) REFERENCES `dia_diem` (`ma_dia_diem`),
  ADD CONSTRAINT `doi_tuong_cach_ly_ibfk_3` FOREIGN KEY (`nguon_lay`) REFERENCES `benh_nhan` (`ma_benh_nhan`);

--
-- Các ràng buộc cho bảng `ho_so_cach_ly`
--
ALTER TABLE `ho_so_cach_ly`
  ADD CONSTRAINT `ho_so_cach_ly_ibfk_1` FOREIGN KEY (`ma_dia_diem`) REFERENCES `dia_diem` (`ma_dia_diem`),
  ADD CONSTRAINT `ho_so_cach_ly_ibfk_2` FOREIGN KEY (`ma_doi_tuong`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Các ràng buộc cho bảng `lich_trinh`
--
ALTER TABLE `lich_trinh`
  ADD CONSTRAINT `lich_trinh_ibfk_1` FOREIGN KEY (`ma_dia_diem`) REFERENCES `dia_diem` (`ma_dia_diem`),
  ADD CONSTRAINT `lich_trinh_ibfk_2` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Các ràng buộc cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `nguoi_dung_ibfk_1` FOREIGN KEY (`ma_vai_tro`) REFERENCES `vai_tro` (`ma_vai_tro`);

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`ma_nhan_vien`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `nhan_vien_ibfk_2` FOREIGN KEY (`ma_chuc_vu`) REFERENCES `vai_tro` (`ma_vai_tro`);

--
-- Các ràng buộc cho bảng `thong_tin_truy_vet`
--
ALTER TABLE `thong_tin_truy_vet`
  ADD CONSTRAINT `thong_tin_truy_vet_ibfk_1` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`),
  ADD CONSTRAINT `thong_tin_truy_vet_ibfk_2` FOREIGN KEY (`ma_nhan_vien`) REFERENCES `nhan_vien` (`ma_nhan_vien`);

--
-- Các ràng buộc cho bảng `thong_tin_xet_nghiem`
--
ALTER TABLE `thong_tin_xet_nghiem`
  ADD CONSTRAINT `thong_tin_xet_nghiem_ibfk_1` FOREIGN KEY (`ma_ho_so`) REFERENCES `benh_an` (`ma_ho_so`),
  ADD CONSTRAINT `thong_tin_xet_nghiem_ibfk_2` FOREIGN KEY (`ma_ho_so`) REFERENCES `ho_so_cach_ly` (`ma_ho_so`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
