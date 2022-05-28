-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 06:42 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cafestore1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `client`

--

INSERT INTO `client` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `vaitro`) VALUES
(3, 'ngocanh', 'anh', '123456789ok', 'tranngocanh@gmail.com', '', '', 0),
(4, 'hoangchau', 'chau', '123456789ok', 'nguyenhoangchau@gmail.com', '', '', 0),
(5, 'vanvan', 'van', '123456789ok', 'levanvan@gmail.com', '', '', 0),
(6, 'vanvan', 'van', '123456789ok', 'levanvan@gmail.com', '', '', 0),
(7, 'hoangchau', 'chau', '123456789ok', 'nguyenhoangchau@gmail.com', '', '', 0),
(8, 'văn', 'hiphop', '96e79218965eb72c92a549dd5a330112', 'levanvan009@gmail.com', 'ấp 3 hóc môn', '0374790620', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`) VALUES
(1, 3, 7, '2021-07-14', ' quán ok'),
(2, 4, 7, '2021-06-20', ' đồ uống ngon và rẻ '),
(3, 3, 5, '2021-06-25', 'lịch sự, nhã nhặn'),
(4, 3, 5, '2021-08-15', ' view đẹp và thoáng mát'),
(5, 3, 5, '2021-05-14', ' nhân viên lích sự '),
(6, 3, 5, '2021-06-21', ' dịch vụ tốt '),
(7, 3, 5, '2021-07-23', 'lấn sau sẽ quay lại '),
(8, 3, 5, '2021-07-14', '  được '),
(9, 3, 5, '2021-07-14', '  đồ uống ngon và rẻ'),
(10, 3, 5, '2021-08-12', ' view đẹp và thoáng mát'),
(11, 3, 5, '2021-08-09', ' nhân viên lích sự'),
(12, 3, 5, '2021-07-14', ' đẹp và uy tín '),
(13, 3, 5, '2021-08-15', ' dịch vụ tốt'),
(14, 3, 5, '0000-00-00', ' nhân viên đẹp gái '),
(15, 3, 5, '2021-08-28', 'quán đẹp ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `tuyvi` varchar(20) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `invoicedetails`
--

INSERT INTO `invoicedetails` (`masohd`, `mahh`, `soluongmua`, `tuyvi`, `thanhtien`, `tinhtrang`) VALUES
(7, 3, 2, 'bỏ đá', 35000, 0),
(9, 3, 2, ' thêm đường', 25000, 0),
(9, 12, 2, 'ít đá ', 20000, 0),
(10, 9, 2, 'ít đường ', 30000, 0),
(10, 15, 1, 'vừa đá ', 15000, 0),
(11, 9, 2, 'nhiều đá ', 25000, 0),
(11, 15, 1, 'không đường ', 15000, 0),
(12, 9, 2, 'ít đường  ', 20000, 0),
(12, 15, 1, 'thêm đường ', 35000, 0),
(13, 2, 1, 'ít đường', 20000, 0),
(13, 24, 3, 'thêm đường ', 15000, 0),
(14, 2, 1, 'bỏ đá', 25000, 0),
(15, 17, 3, '', 45000, 0),
(16, 4, 1, '', 15000, 0),
(16, 17, 3, '', 45000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `items`
--

CREATE TABLE `items` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `Nhom` int(4) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `tuyvi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `items`
--

INSERT INTO `items` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `Nhom`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `tuyvi`) VALUES
(1, ' Cà phê Arabica ', 35000, 30000, '1.jpg', 0, 1, b'1', 5, '2020-07-12', 'Đây là một loại cà phê của Việt Nam có hạt hơi dài, được trồng ở độ cao trên 600m', 50, 'thêm đường '),
(2, 'Cà phê Culi ', 25000, 0, '2.jpg', 0, 1, b'1', 3, '2020-07-08', 'Cà phê culi vị đắng ngắt, hương thơm say lòng người, nước đen sóng sánh.', 50, ' ít đá '),
(3, 'cà phê pha phin đen   ', 20000, 15000, '3.jpg', 0, 1, b'0', 4, '2020-06-08', 'phin cafe đẹp màu đen là dòng phin đang được ưa chuộng nhất, thể hiện sự đẳng cấp, sang trọng và sành điệu, quyền lực và bí ẩn. ', 50, 'ít đường '),
(4, 'Cà phê Cherry (cà phê mít)', 15000, 0, '4.jpg', 1, 3, b'0', 1, '2020-08-05', 'Cà phê Cherry dậy lên mùi hương thoang thoảng khi pha và có vị chua của Cherry tạo ra một cảm hứng thật sảng khoái. ', 50, ' thêm đường  '),
(5, 'Cà phê Moka (Đọc là Mocha) ', 25000, 0, '5.jpg', 1, 3, b'1', 0, '2020-07-08', ' Moka mà đây trở thành một món quá dành tặng nhau của những người sành cafe,', 50, 'ít đường'),
(6, 'Cà phê Robusta ', 25000, 0, '6.jpg', 1, 3, b'0', 0, '2020-06-11', 'Cà phê Robusta được sấy trực tiếp chứ không phải lên men, chính vì vậy loại cà phê này có vị khá đắng, uống đậm đà', 50, 'thêm đá '),
(7, 'Nước ngọt lon Sting ', 24000, 0, '21.jpg', 3, 7, b'1', 1, '2020-06-11', 'Nươc giả khát sting đỏ dâu hương vị mới teng ', 12, 'ít đá'),
(9, ' Bourbon Coffee ', 45000, 0, '7.jpg', 2, 5, b'1', 1, '2020-07-08', 'Cà  Phê Bourbon là một loài phụ của giống Arabica, đó là một loại cà phê Arabica cao cấp nhưng thường dễ hay mắc bệnh và sâu bệnh. ', 50, 'ít đá'),
(10, ' Cafe Chồn ', 45000, 0, '8.jpg', 2, 5, b'1', 1, '2020-07-12', 'Cà phê chồn hay cà phê phân chồn là tên một loại cà phê đặc biệt, một thứ đồ uống được xếp vào loại hiếm nhất trên thế giới.', 50, 'ít đường  '),
(11, 'Cà phê châu trâu (new)', 25000, 0, '9.jpg', 3, 1, b'0', 1, '2020-07-08', 'Một tách cà phê đen thơm ngào ngạt, phảng phất mùi cacao và kèm theo trân châu độc lạ', 50, 'ít đường '),
(12, 'nước khoáng  ', 25000, 23000, '10.jpg', 3, 1, b'0', 2, '2020-07-22', 'Nước khoáng La Vie là sự kết hợp tuyệt vời giữa nguồn nước trong lành với 06 loại khoáng thiên nhiên.', 50, 'thêm đá '),
(15, 'Nước ép cam  ', 45000, 0, '11.jpg', 4, 1, b'0', 1, '2020-07-08', ' nước ép cam có chứa nhiều vitamin C giúp các tế bào của hệ miễn dịch khỏe mạnh hơn.', 50, 'thêm đường '),
(16, 'Nước ép dưa hấu ', 35000, 300000, '12.jpg', 4, 1, b'0', 2, '2020-07-27', 'Nước ép dưa hấu là sự lựa chọn tuyệt vời cho những ai cần giải khát vào những ngày hè oi bức', 50, 'ít đá '),
(17, 'Nước ép táo  ', 15000, 0, '13.jpg', 4, 1, b'1', 2, '2020-07-08', 'Hương vị thơm mát của nước táo cùng với khung cảnh của mùa lá rụng thật sự làm cho nước táo trở thành một thức uống khó quên', 50, 'thêm đá'),
(18, 'Sinh tố bơ ', 25000, 30000, '14.jpg', 5, 8, b'0', 1, '2020-06-15', 'Bơ là loại quả chứa rất nhiều chất dinh dưỡng', 50, 'thêm đá '),
(19, 'Sinh tố dâu tây ', 45000, 0, '15.jpg', 5, 8, b'1', 1, '2020-07-23', 'Sinh tố dâu tây là một thức uống quen thuộc của các chị em không chỉ vì thơm ngon, tốt cho sức khỏe mà còn giúp chăm dưỡng làn da khỏe đẹp không tỳ vết', 50, 'ít đường  '),
(20, 'Nước ép thơm (new)', 45000, 0, '16.jpg', 5, 8, b'0', 1, '2020-06-27', 'Nước ép thơm không chỉ thanh mát mà còn thải độc, cung cấp một loạt các chất dinh dưỡng có lợi cho cơ thể ', 50, 'thêm đá'),
(21, 'Nước ép thanh long đỏ ', 25000, 0, '18.jpg', 4, 4, b'0', 1, '2020-07-15', 'Nước Ép Thanh Long Đỏ ngon ngọt, giải nhiệt cho cả gia đình.', 50, 'thêm đường'),
(22, 'Nước dừa miền tây ', 20000, 15000, '19.jpg', 1, 4, b'0', 1, '2020-06-04', 'Nước dừa là một thức uống tuyệt vời hoàn toàn từ thiên nhiên, không chất bảo quản, không chất phụ gia (tạo hương vị, tạo màu)', 23, 'thêm đá '),
(24, 'Nước ép mía ', 24000, 0, '20.jpg', 3, 7, b'1', 1, '2020-07-04', 'Nước mía là loại thức uống giải khát được ưa chuộng khi đến thời điểm chuyển sang mùa nắng nóng', 12, 'ít đá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Cà phê giải trí ', 3),
(3, 'Sinh tố bổ dưỡng', 3),
(4, 'Cà phê tỉnh táo', 3),
(5, 'Sinh tố mát lạnh', 3),
(6, 'Cà phê phố', 3),
(7, 'Nước ép giải khát', 3),
(8, 'Cà phê giải khát ', 3),
(10, 'Nước giải khát', 4),
(13, 'Nước mát lạnh', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `link`) VALUES
(1, 'Trang Chủ', 'index.php'),
(3, 'Nước Ép/Sinh Tố/Caffe', ''),
(4, 'Nước Giải Khát', 'View/sanphamtui.php'),
(5, 'Liên Hệ', 'View/lienhe.php'),
(6, 'Tài Khoản', 'View/gioithieu.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt`
--

CREATE TABLE `receipt` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `receipt`
--

INSERT INTO `receipt` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 7, '2021-09-02', 50000),
(2, 7, '2021-08-29', 150000),
(3, 7, '2021-07-28', 70000),
(4, 7, '2021-07-25', 80000),
(5, 7, '2021-09-01', 150000),
(6, 7, '2021-08-26', 50000),
(7, 7, '2021-07-27', 50000),
(8, 7, '2021-08-09', 150000),
(9, 7, '2021-09-01', 45000),
(10, 7, '2021-09-01', 100000),
(11, 7, '2021-09-01', 150000),
(12, 7, '2021-09-01', 35000),
(13, 5, '2021-09-02', 35000),
(14, 7, '2021-09-01', 60000),
(15, 8, '2021-10-18', 45000),
(16, 8, '2021-10-18', 60000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `fk_bl_mahh` (`mahh`),
  ADD KEY `fk_bl_kh` (`makh`);

--
-- Chỉ mục cho bảng `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`masohd`,`mahh`),
  ADD KEY `fk_cthd_mahh` (`mahh`);

--
-- Chỉ mục cho bảng `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`mahh`),
  ADD KEY `FK_hanghoa_maloai` (`maloai`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`),
  ADD KEY `FK_loai_menu` (`idmenu`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Chỉ mục cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `fk_hoadon_kh` (`makh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `items`
--
ALTER TABLE `items`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `receipt`
--
ALTER TABLE `receipt`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_bl_kh` FOREIGN KEY (`makh`) REFERENCES `client` (`makh`),
  ADD CONSTRAINT `fk_bl_mahh` FOREIGN KEY (`mahh`) REFERENCES `items` (`mahh`);

--
-- Các ràng buộc cho bảng `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `receipt` (`masohd`),
  ADD CONSTRAINT `fk_cthd_mahh` FOREIGN KEY (`mahh`) REFERENCES `items` (`mahh`);

--
-- Các ràng buộc cho bảng `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_hanghoa_maloai` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);

--
-- Các ràng buộc cho bảng `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `FK_loai_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);

--
-- Các ràng buộc cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `client` (`makh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
