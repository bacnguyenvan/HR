-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 04:12 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btngocduc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `MaBP` varchar(10) NOT NULL,
  `TenBP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bophan`
--

INSERT INTO `bophan` (`MaBP`, `TenBP`) VALUES
('MaBP001', 'văn phòng'),
('MaBP002', 'hành chính'),
('MaBP003', 'nhân viên mới');

-- --------------------------------------------------------

--
-- Table structure for table `lichcongtac`
--

CREATE TABLE `lichcongtac` (
  `Id` varchar(10) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `NgayDi` date NOT NULL,
  `NgayVe` date NOT NULL,
  `NoiCongTac` varchar(50) NOT NULL,
  `PhuongTienDiChuyen` varchar(50) NOT NULL,
  `NoiDung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichcongtac`
--

INSERT INTO `lichcongtac` (`Id`, `MaNV`, `TenNV`, `NgayDi`, `NgayVe`, `NoiCongTac`, `PhuongTienDiChuyen`, `NoiDung`) VALUES
('Id001', 'MaNV001', 'Phúc Đức', '2019-12-17', '2019-12-19', 'Cam Ranh', 'xe máy', 'đi dự án'),
('Id002', 'MaNV001', 'Phúc Đức', '2019-12-17', '2019-12-20', 'Hà Nội', 'máy bay 1', 'đi khảo sát'),
('Id003', 'MaNV003', 'Nguyễn Văn Thành', '2019-12-17', '2019-12-21', 'Nha Trang ', 'tau lua', 'di hoc'),
('Id004', 'MaNV002', 'Phúc Ngoc', '2019-12-18', '2019-12-19', 'Đà Nẵng', 'xe ô tô', 'đi bồi dưỡng nghiệp vụ'),
('Id005', 'MaNV004', 'nguyễn Hữu Quang', '2019-12-18', '2019-12-19', 'Hà Nội', 'tau lua', 'học');

-- --------------------------------------------------------

--
-- Table structure for table `lichnghi`
--

CREATE TABLE `lichnghi` (
  `Id` varchar(10) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `NgayNghi` date NOT NULL,
  `SoNgayNghi` int(10) NOT NULL,
  `LyDo` varchar(100) NOT NULL,
  `ChoPhepNghi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichnghi`
--

INSERT INTO `lichnghi` (`Id`, `MaNV`, `TenNV`, `NgayNghi`, `SoNgayNghi`, `LyDo`, `ChoPhepNghi`) VALUES
('Id001', 'MaNV002', 'Hồ Thị Ngọc', '2019-12-14', 1, 'bệnh', 'yes'),
('Id002', 'MaNV001', 'Phúc Đức', '2019-12-18', 1, 'ốm nặng 1', 'no'),
('Id003', 'MaNV003', 'Nguyễn Văn Thành', '2019-12-18', 1, 'đi học chính trị', 'yes'),
('Id004', 'MaNV002', 'Phúc Ngoc', '2019-12-18', 1, 'đi du lịch', 'no'),
('Id005', 'MaNV004', 'nguyễn Hữu Quang', '2019-12-18', 1, 'đi khám bệnh', 'wait');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Id` varchar(10) NOT NULL,
  `Sdt` varchar(11) DEFAULT NULL,
  `HinhAnh` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `MaBP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `Id`, `Sdt`, `HinhAnh`, `email`, `MaBP`) VALUES
('MaNV001', 'Phúc Đức', 'Id001', '0898382114', 'duc.jpg', 'duc@gmail.com', 'MaBP001'),
('MaNV002', 'Phúc Ngoc', 'Id002', '01674618425', 'ngoc.jpg', 'ngoc@gmail.com', 'MaBP002'),
('MaNV003', 'Nguyễn Văn Thành', 'Id003', '089836541', 'thanh.jpg', 'thanh@gmail.com', 'MaBP002'),
('MaNV004', 'nguyễn Hữu Quang', 'Id004', '', 'avatar.png', 'quang@gmail.com', 'MaBP003');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `Id` varchar(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Quyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`Id`, `UserName`, `Password`, `HoTen`, `Quyen`) VALUES
('Id001', 'duc@gmail.com', '123', 'Duc', 'admin'),
('Id002', 'ngoc@gmail.com', '123', 'ngoc', 'nhanvien'),
('Id003', 'thanh@gmail.com', '123', 'Nguyễn Văn Thành', 'nhanvien'),
('Id004', 'quang@gmail.com', '123', 'nguyễn Hữu Quang', 'nhanvien');

-- --------------------------------------------------------

--
-- Table structure for table `tuyendung`
--

CREATE TABLE `tuyendung` (
  `Id` varchar(10) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `CV` varchar(200) NOT NULL,
  `GhiChu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuyendung`
--

INSERT INTO `tuyendung` (`Id`, `HoTen`, `CV`, `GhiChu`) VALUES
('Id001', 'Cao Bá Quát', 'font end', 'giỏi'),
('Id002', 'Nguyễn Hoàng', 'back end', 'khá'),
('Id003', 'Lê Tấn Tài', 'developer', 'xuất xắc'),
('Id004', 'Nguyễn Đình Hùng', 'fresher', 'khá');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`MaBP`);

--
-- Indexes for table `lichcongtac`
--
ALTER TABLE `lichcongtac`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lichnghi`
--
ALTER TABLE `lichnghi`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
