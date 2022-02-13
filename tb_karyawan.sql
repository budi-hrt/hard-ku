-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2022 at 05:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ra_hrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk_karyawan` varchar(10) NOT NULL,
  `jabatan_karyawan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama_karyawan` varchar(15) NOT NULL,
  `status_pernikahan` varchar(20) NOT NULL,
  `telp_karyawan` varchar(15) NOT NULL,
  `email_karyawan` varchar(30) NOT NULL,
  `foto_karyawan` varchar(100) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `npwp_karyawan` varchar(15) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `berijazah` varchar(20) NOT NULL,
  `rekening` int(100) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `url_img` varchar(250) NOT NULL,
  `aktif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `jk_karyawan`, `jabatan_karyawan`, `tempat_lahir`, `tanggal_lahir`, `agama_karyawan`, `status_pernikahan`, `telp_karyawan`, `email_karyawan`, `foto_karyawan`, `alamat_karyawan`, `npwp_karyawan`, `pendidikan`, `berijazah`, `rekening`, `id_status`, `tanggal_masuk`, `id_absensi`, `url_img`, `aktif`) VALUES
(1, '7271 0317 0561 0003', 'Antonius Lele', 'L', 'Pimpinan', 'Ende', '1961-05-17', 'Katolik', 'K3', '081 242 260 689', 'antoniuslele7@gmail.com', 'img_1510925528.jpg', 'Jl. Zebra 1 No.25 , Kota Palu', '749812988831000', 'SMA', 'No', 0, 1, '2004-03-03', 1, 'http://localhost/rest-karyawan/assets/img/', 1),
(2, '7210 1405 0579 0003', 'Budi Harto', 'L', 'Administrasi', 'Palu', '1979-05-05', 'Islam', 'K2', '081 354 380 434', 'budhi.hrt82@gmail.com', 'img_1511081145.jpg', 'Btn Bumi Tinggede Indah 3 Blok B No.14 Kec. Marawola, Kab.Sigi', '749354932831000', 'SMP', 'Yes', 0, 1, '2004-08-08', 8, 'http://localhost/rest-karyawan/assets/img/', 1),
(3, '7271 0202 1077 0005', 'Muhlis Kadir Laharijo', 'L', 'Sales', 'Palu', '1977-10-02', 'Islam', 'K3', '082 347 248 227', 'muhliskadir@yahoo.com', 'img_1513085050.jpg', 'Jl. Beringin No. 60 A', '749923983831000', 'SMA', 'Ada', 0, 1, '2003-03-15', 5, 'http://localhost/rest-karyawan/assets/img/', 1),
(4, '7271 0341 0779 0002', 'Mashita Habibu', 'P', 'Penagihan', 'Palu', '1979-05-27', 'Islam', 'K1', '085 241 176 686', 'belum ada', 'img_1513084653.jpg', 'Jl. Beringin No. 60 A', '467822029831000', 'SMA', 'Ada', 0, 1, '2007-02-06', 3, 'http://localhost/rest-karyawan/assets/img/', 1),
(5, '7210 0819 0492 0002', 'Galuh Tristrianto Utomo', 'L', 'Sales', 'Palu', '1992-04-19', 'Islam', 'TK', '082 213 001 061', 'galutristrianto@yahoo.com', 'img_1511614620.jpg', 'Kalawara, Gumbasa', '769367665831000', 'SMA', 'Ada', 0, 1, '2015-04-15', 50, 'http://localhost/rest-karyawan/assets/img/', 1),
(6, '7271 0301 0159 0007', 'Udi', 'L', 'Mekanik', 'Palu', '1959-01-01', 'Islam', 'TK', '082 195 421 490', 'udiudin97@gmail.com', 'img_1537334514.jpg', 'Jl. Zebra 1A No.93', '0', '0', 'Tidak Ada', 0, 1, '2006-03-15', 30, 'http://localhost/rest-karyawan/assets/img/', 1),
(7, '7210 0102 0787 0001', 'Adrianus', 'L', 'Helper', 'Flores', '1987-07-02', 'Katolik', 'K1', '085 242 435 286', 'adrianus790@gmail.com', 'img_1514256807.jpg', 'Bulupontu Jaya Sidera', '749854626831000', 'SMA', 'Yes', 0, 2, '2014-08-01', 43, 'http://localhost/rest-karyawan/assets/img/', 1),
(8, '7203 1120 0571 0004', 'Ahir', 'L', 'Driver', 'Tolongano', '1971-05-20', 'Islam', 'K2', '085 298 185 016', 'ahirahir088@gmail.com', 'img_1537260847.jpg', 'Dampal, Kec Sirenja', '769367756831000', 'SMA', 'Yes', 0, 1, '2010-10-01', 27, 'http://localhost/rest-karyawan/assets/img/', 1),
(11, '7210091901890001', 'Faisal', 'L', 'Salesman', 'Walatana', '1989-01-19', 'Islam', 'TK', '082 158 301 346', 'isalfaisal82@yahoo.com', 'img_1511081346.jpg', 'Jl. Poros Palu-Bangga, Walatana, Dolo', '753275593831000', 'SMA', 'Yes', 0, 1, '2014-05-01', 41, 'http://localhost/rest-karyawan/assets/img/', 1),
(12, '7271 0369 0384 0003', 'Umi Baroro', 'P', 'Administrasi', 'klaten', '1984-03-29', 'Islam', 'K2', '085 298 708 462', '-', 'img_1511071350.jpg', 'Jl. Ongka Malino No. 14', '0', 'SMA', 'Tidak Ada', 0, 1, '2010-05-01', 4, 'http://localhost/rest-karyawan/assets/img/', 1),
(13, '7271 0344 0877 0003', 'Nurlina Abd Halim', 'P', 'Administrasi', 'Toli -Toli', '1977-08-04', 'Islam', 'K1', '081 341 477 548', '-', 'img_1511071268.jpg', 'Jl. HM. Soeharto Perum Vena Garden Blok B No 3', '0', 'SMA', 'Ada', 0, 1, '2003-04-01', 2, 'http://localhost/rest-karyawan/assets/img/', 1),
(14, '7208 0306 0591 0001', 'Moh. Rifai', 'L', 'Sales', 'Palu', '1991-05-06', 'Islam', 'TK', '085 395 944 504', 'rifaimoh128@gmail.com', 'img_1514261744.jpg', 'BTN Palupi Blok NB No.5, Palupi', '749924189831000', 'SMA', 'Ada', 0, 3, '2013-07-10', 36, 'http://localhost/rest-karyawan/assets/img/', 2),
(15, '7271 0327 0471 0006', 'Raflin Laindjong', 'L', 'Sales', 'Palu', '1971-04-27', 'Islam', 'K3', '081 354 380 434', 'raflinlaindjong@yahoo.com', 'img_1512564607.jpg', 'Jl. Dewi Sartika Lrg. 2 No. 23 D', '749923330831000', 'SMA', 'Ada', 0, 1, '2004-03-22', 15, 'http://localhost/rest-karyawan/assets/img/', 1),
(16, '7271 0126 0265 0001', 'Paulus Bambang Yuwono', 'L', 'Sales', 'Batu Malang', '1965-02-26', 'Katolik', 'K2', '085 395 781 386', 'paulusbambang949@yahoo.com', 'img_1514261829.jpg', 'BTN Pesona Teluk Palu Blok B1 No. 5, Tondo, Palu', '749923538831000', 'SMA', 'Tidak Ada (Hilang)', 0, 1, '2012-03-01', 29, 'http://localhost/rest-karyawan/assets/img/', 1),
(18, '7271 0121 0976 0006', 'Fachrudin', 'L', 'Sales', 'Palu', '1976-09-21', 'Islam', 'K3', '085 241 968 595', 'u.fachrudin@yahoo.com', 'img_1537260886.jpg', 'Jl. S Parman II No. 17 E, Palu Timur', '169921426831000', 'SMA', 'Ada', 0, 1, '2009-05-15', 11, 'http://localhost/rest-karyawan/assets/img/', 1),
(21, '7271 0303 0569 0005', 'Sugianto', 'L', 'Sales', 'Palu', '1969-05-03', 'Islam', 'K2', '085 256 652 221', 'sugiantonto495@gmail.com', 'img_1514262056.jpg', 'Jl. Zebra 1 A No. 61 Palu', '476975321831000', 'SMA', 'Ada', 0, 1, '2004-08-15', 6, 'http://localhost/rest-karyawan/assets/img/', 1),
(22, '7210 0805 1185 0002', 'Dudi Frengki Karyono', 'L', 'Driver', 'Kalawara', '1985-11-05', 'Kristen', 'K1', '081 342 310 488', 'dudifrengk@yahoo.com', 'img_1517301769.jpg', 'Dusun 3, Kalawara, Gumbasa', '749812483831000', 'SMA', 'No', 0, 1, '2011-10-01', 28, 'http://localhost/rest-karyawan/assets/img/', 1),
(25, '7208 2012 0692 0002', 'Randi', 'L', 'Sales', 'Jononunu', '1992-06-10', 'Islam', 'TK', '085 397 338 966', 'randirandi558@yahoo.com', 'img_1515226097.jpg', 'Jononunu, Parigi Tengah', '749854717831000', 'SMA', 'Ada', 0, 1, '2014-07-01', 42, 'http://localhost/rest-karyawan/assets/img/', 1),
(26, '7271 0118 0768 0001', 'Hengky Hendry Singal', 'L', 'Driver', 'Amurang', '1968-07-16', 'Katolik', 'K2', '085 823 455 303', 'hengkyhendry7@gmail.com', 'img_1514261725.jpg', 'Jl. Saweri Gading Raya No. 42 , Mantikulore', '724147707831000', 'SMA', 'Ada', 0, 1, '2007-04-02', 21, 'http://localhost/rest-karyawan/assets/img/', 1),
(27, '7208 0127 0470 0002', 'Mansur Badja', 'L', 'Driver', 'Dolago', '1970-04-27', 'Islam', 'K3', '085 255 932 091', 'mansurbadja@gmail.com', 'img_1525857025.jpg', 'Desa Jononunu, Parigi Tengah', '749812806831000', 'SMA', 'Ada', 0, 1, '2006-04-06', 19, 'http://localhost/rest-karyawan/assets/img/', 1),
(28, '7210 0102 0280 0004', 'Sapri', 'L', 'Sales', 'Oloboju', '1980-02-02', 'Islam', 'K1', '082 393 513 399', 'saprisapri672@yahoo.com', 'img_1520499652.jpg', 'Jl. Trans Palu Palolo, Oloboju, Sigi', '749923025831000', 'SMA', 'Ada', 0, 1, '2012-07-01', 32, 'http://localhost/rest-karyawan/assets/img/', 1),
(29, '7271 0231 0872 0002', 'Rusdin', 'L', 'Sales', 'Palu', '1972-08-31', 'Islam', 'K2', '085 394 934 344', 'rrusdin231@gmail.com', 'img_1523947890.jpg', 'Jl. Beringin Lrg. 1 No. 08 A', '769367590831000', 'SMA', 'Ada', 0, 1, '2008-02-26', 33, 'http://localhost/rest-karyawan/assets/img/', 1),
(30, '7271 0309 1284 0004', 'Andri Dani Triawan', 'L', 'Driver', 'Palu', '1984-12-09', 'Kristen', 'K3', '085 240 181 258', 'adani6535@gmail.com', 'img_1517297255.jpg', 'Jl. Gereja No. 2 , Palu', '547638924831000', 'SMA', 'Yes', 0, 1, '2013-05-01', 35, 'http://localhost/rest-karyawan/assets/img/', 1),
(31, '7210 0115 1186 0001', 'Irwan Hamka', 'L', 'Driver', 'Siwa', '1986-11-15', 'Islam', 'K1', '085 241 213 096', 'irwanhamka92@gmail.com', 'img_1514261761.jpg', 'Jl. Lasoso Lolu Sigi', '0', 'SMA', 'Ada', 0, 1, '2013-09-01', 37, 'http://localhost/rest-karyawan/assets/img/', 1),
(32, '7210 0803 0692 0002', 'Didi Juniawan', 'L', 'Sales', 'Palu', '1992-06-01', 'Kristen', 'K0', '082 393 534 778', 'didijuniawan@yahoo.com', 'img_1517366708.jpg', 'Dusun 3, Kalawara, Gumbasa', '749812400831000', 'SMA', 'Ada', 0, 1, '2010-09-01', 14, 'http://localhost/rest-karyawan/assets/img/', 1),
(33, '7271 0201 0286 0002', 'Yofan', 'L', 'Sales', 'Palu', '1985-08-17', 'Islam', 'TK', '081 241 854 450', 'yofanyof@gmail.com', 'img_1517301988.jpg', 'Jl. Sumur Yuga No.4 Balaroa', '0', 'SMA', 'Ada', 0, 1, '2007-07-13', 23, 'http://localhost/rest-karyawan/assets/img/', 1),
(34, '7271 0221 0784 0003', 'Yusuf Hemuto', 'L', 'Salesman', 'Popayato', '1984-07-20', 'Islam', 'K2', '082 189 517 757', '-', 'img_1513513313.jpg', 'Jl. Gunung Gawalise No. 225.B', '0', 'SMA', 'Tidak Ada', 0, 1, '2012-07-01', 31, 'http://localhost/rest-karyawan/assets/img/', 1),
(35, '7271 0206 1182 0003', 'Fikra', 'L', 'Salesman', 'Palu', '1982-11-06', 'Islam', 'K3', '082 293 883 765', 'fikraikra@yahoo.com', 'img_1513866540.jpg', 'Jl. Beringin No. 17 Palu', '749812665831000', 'SMA', 'Yes', 0, 1, '2008-06-05', 10, 'http://localhost/rest-karyawan/assets/img/', 1),
(37, '7271 0330 0781 0005', 'Marsit', 'L', 'Salesman', 'Marantale', '1981-07-28', 'Islam', 'K2', '082 187 311 381', 'marsitmar900@gmail.com', 'img_1512094097.jpg', 'Jl. Anoa 1 Lorong Pelangi', '750168551831000', 'SMA', 'Ada', 0, 1, '2004-06-29', 7, 'http://localhost/rest-karyawan/assets/img/', 1),
(38, '7210 0111 0878 0002', 'Vinsensius Ndolu', 'L', 'Driver', 'Palu', '1978-08-11', 'Katolik', 'TK', '081 243 912 436', 'vinsensiusndolu@gmail.com', 'img_1517301643.jpg', 'Desa Oloboju, Sigi', '0', '-', 'Tidak Ada', 0, 1, '2008-03-05', 25, 'http://localhost/rest-karyawan/assets/img/', 1),
(39, '7504 0223 0964 0001', 'Yahya Hurudji', 'L', 'Driver', 'Palu', '1964-09-23', 'Islam', 'TK', '085 397 326 663', 'yahyahurudji@gmail.com', 'img_1520499172.jpg', 'Jl. Gunung Loli No. 37 A', '769368143831000', 'SMA', 'Tidak Ada', 0, 1, '2003-06-20', 18, 'http://localhost/rest-karyawan/assets/img/', 1),
(41, '7210 0113 0383 0002', 'Arman', 'L', 'Driver', 'Makassar', '1983-03-13', 'Islam', 'K2', '081 242 368 552', 'armanbil@gmail.com', 'img_1514261679.jpg', 'Jl. Mutaji, Lolu', '749853289831000', 'SMA', 'Yes', 0, 1, '2007-09-01', 40, 'http://localhost/rest-karyawan/assets/img/', 1),
(42, '7271 0324 0877 0003', 'Sujarno', 'L', 'Driver', 'Blora', '1977-08-24', 'Islam', 'K1', '082 195 121 514', 'sujarno247@gmail.com', 'img_1515226368.jpg', 'Jl. Dewi Sartika No 234', '749807095831000', 'SMA', 'Ada', 0, 1, '2004-06-02', 16, 'http://localhost/rest-karyawan/assets/img/', 1),
(43, '7271 0217 0564 0001', 'Bambang Wahyudi', 'L', 'Sales', 'Palu', '1984-05-17', 'Islam', 'K0', '081 341 308 677', 'bambangwahyudi28@yahoo.com', 'img_1522904812.jpg', 'Jl. Lasoso No. 27 Palu', '753275726831000', 'SMA', 'Yes', 0, 1, '2008-07-14', 26, 'http://localhost/rest-karyawan/assets/img/', 1),
(45, '7271 0323 0480 0003', 'Aswin', 'L', 'Driver', 'Palu', '1980-04-23', 'Islam', 'K1', '085 215 320 633', 'aswinaswin221@yahoo.com', 'img_1514263705.jpg', 'Jl. Kijang Utara III No. 3', '836143297831000', 'SMA', 'Yes', 0, 3, '2014-01-01', 48, 'http://localhost/rest-karyawan/assets/img/', 2),
(46, '1950 0317 0780 0007', 'Safrudin Rasid', 'L', 'Driver', 'Ende', '1980-07-15', 'Islam', 'K2', '082 167 676 678', 'safrudinrasid@yahoo.com', 'img_1540804648.jpg', 'Jl. Zebra No. 93 A', '460586456831000', '-', 'Tidak Ada', 0, 1, '2006-05-29', 20, 'http://localhost/rest-karyawan/assets/img/', 1),
(48, '7271 0315 1280 0007', 'Marianus Didakus Reba', 'L', 'Sales', 'Tebuk', '1980-12-15', 'Katolik', 'K1', '082 393 288 453', 'marianusdidakus2@gmail.com', 'img_1514272728.jpg', 'Jl. Zebra IA Palu', '836143149831000', 'SMA', 'Ada', 0, 1, '2016-03-01', 54, 'http://localhost/rest-karyawan/assets/img/', 1),
(49, '7271 0377 0378 0006', 'Maxianus Arifin Nurak', 'L', 'Driver', 'Nitakloang', '1978-03-11', 'Katolik', 'K1', '081 241 970 466', 'maxianusarifin@yahoo.com', 'img_1517301890.jpg', 'Jl. Zebra 2, No.31', '836141887831000', '-', 'Tidak Ada (Ada Di Ka', 0, 1, '2016-06-01', 24, 'http://localhost/rest-karyawan/assets/img/', 1),
(52, '7271 0203 0883 0003', 'Abd. Aziz', 'L', 'Driver', 'Makassar', '1983-08-03', 'Islam', 'K1', '085 240 311 378', 'abd46282@gmail.com', 'img_1514261608.jpg', 'Jl. Jati Lr. II, Nunu, Palu Barat', '000000000000000', 'Paket C', 'No', 0, 2, '2016-11-01', 59, 'http://localhost/rest-karyawan/assets/img/', 1),
(53, '7202 0402 0883 0007', 'Anselmus Harianto', 'L', 'Driver', 'Flores/Maumere', '1983-09-20', 'Katolik', 'K2', '085 397 754 784', 'anselmusharianto@gmail.com', 'img_1514261664.jpg', 'Jl. Kesadaran No11, Palu Utara', '836141846831000', 'SD', 'No', 0, 3, '2016-11-01', 60, 'http://localhost/rest-karyawan/assets/img/', 2),
(55, '7371 0102 0292 0009', 'I Kadek Dwi Rustawan', 'L', 'Sales', 'Pakareme', '1992-02-02', 'Hindu', 'TK', '082 291 892 530', 'dwikadek361@gmail.com', 'img_1514261806.jpg', 'BTN Lasoani Blok C3 No 1, Palu Timur', '0', 'SMA', 'Ada', 0, 2, '2016-12-15', 62, 'http://localhost/rest-karyawan/assets/img/', 1),
(56, '7210 1113 0393 0001', 'Gunawan Kelana', 'L', 'Driver', 'Sibalaya', '1993-03-13', 'Islam', 'K1', '082 197 258 899', 'kelanagunawan@yahoo.com', 'img_1520499320.jpg', 'Kalukutinggu Dusun 2, Dolo Barat', '0', 'SMA', 'Ada', 0, 1, '2017-02-01', 63, 'http://localhost/rest-karyawan/assets/img/', 1),
(66, '7271 0625 1295 0002', 'Moh.Fahril', 'L', 'Sales', 'Palu', '1995-12-25', 'Islam', 'TK', '085 287 398 555', '-', 'img_1511061438.jpg', 'Jl. Gunung Gawalise, Duyu', '0', 'SMA', 'Ada', 0, 3, '2017-03-01', 66, 'http://localhost/rest-karyawan/assets/img/', 2),
(67, '7572 0321 0793 0001', 'Teguh Suriyanto', 'L', 'Driver', 'Parigi', '1985-10-27', 'Islam', 'K1', '085 298 731 296', 'teguhsupriyanto75@yahoo.com', 'img_1514272430.jpg', 'Jl. Seruni Raya No 1, Palu', '0', 'SMA', 'Ada', 0, 3, '2017-03-01', 67, 'http://localhost/rest-karyawan/assets/img/', 2),
(68, '7210 0422 0789 0001', 'Frangklin', 'L', 'Driver', 'Toli -Toli', '1989-07-19', 'Kristen', 'TK', '082 293 061 798', 'frangfrangklin@yahoo.com', 'img_1523950484.JPG', 'Dusun 1, Tomado, Lindu', '0', 'SMA', 'Ada', 0, 1, '2017-04-01', 68, 'http://localhost/rest-karyawan/assets/img/', 1),
(69, '7203 3028 0399 0001', 'Moh. Padil', 'L', 'Sales', 'Labean', '1998-03-28', 'Islam', 'TK', '082 297 068 694', 'moh.padil@yahoo.com', 'img_1514272755.jpg', 'Jl. Gunung Sojol, Ogoamas 1', '0', 'SMA', 'Ada', 0, 3, '2017-04-01', 69, 'http://localhost/rest-karyawan/assets/img/', 2),
(74, '7202 0430 0988 0006', 'Nong Edison', 'L', 'Driver', 'Maumere', '1988-09-30', 'Katolik', 'K1', '085 298 635 455', 'edisonedis880@gmail.com', 'img_1514273147.jpg', 'Jl. Basuki Rahmat Lrg. Kesadaran No. 11 Palu', '0', '-', 'Tidak Ada', 0, 3, '2017-11-01', 74, 'http://localhost/rest-karyawan/assets/img/', 2),
(75, '7271 0205 0684 0007', 'Eugenius Nong Herbert', 'L', 'Sales', 'Flores', '1984-06-05', 'Katolik', 'K1', '081 243 535 018', 'eugeniusnong@gmail.com', 'img_1517298119.jpg', 'Jl. Lasoso Lrg. II No. 4', '641139290831000', 'S1', 'Ada', 0, 3, '2017-11-01', 75, 'http://localhost/rest-karyawan/assets/img/', 2),
(79, '7271 0220 0790 0001', 'Muzakir', 'L', 'Sales', 'Donggala Kodi', '1990-07-17', 'Islam', 'TK', '085 216 425 122', 'mmuzakir67@gmail.com', 'img_1520499130.jpg', 'Jl. Gawalise, Kel. Donggala Kodi, Kec. Palu Barat.', '0', 'SMA', 'Ada', 0, 3, '2017-11-02', 79, 'http://localhost/rest-karyawan/assets/img/', 2),
(81, '7271 0311 0993 0001', 'Sujarwadi', 'L', 'Administrasi', 'Poso', '1993-09-11', 'Islam', 'TK', '085 241 202 733', 'soedjarwadi70@gmail.com', 'img_1523950614.JPG', 'BTN Palupi Puskud Blok B1 No. 04', '944348630831000', 'S1 Kehutanan', 'Ada', 0, 1, '2017-12-06', 81, 'http://localhost/rest-karyawan/assets/img/', 1),
(85, '7271 0311 1191 0002', 'Jefri', 'L', 'Driver', 'Palu', '1991-11-11', 'Islam', 'K0', '082 291 195 430', '-', 'img_1515225960.jpg', 'Jl. Lagarutu', '0', 'SMA', 'Ada', 0, 1, '2017-12-12', 85, 'http://localhost/rest-karyawan/assets/img/', 1),
(87, '7271 0154 0995 0001', 'Samsinar', 'P', 'Administrasi', 'Palu', '1995-09-14', 'Islam', 'TK', '082 296 067 551', '-', 'img_1520905743.jpg', 'Jl. Veteran Lrg 1', '000000000000000', 'S1 Ekonomi', 'Ada', 0, 3, '2018-01-08', 87, 'http://localhost/rest-karyawan/assets/img/', 2),
(88, '7208 1018 0689 0001', 'Muh.Syafaat', 'L', 'Driver', 'Tada', '1989-06-18', 'Islam', 'K1', '085 343 568 589', '-', 'img_1545288566.jpg', 'Jl. Hayam Wuruk No.33', '000000000000000', 'SMA', 'Ya', 0, 3, '2018-11-01', 88, 'http://localhost/rest-karyawan/assets/img/', 2),
(89, '7271 0310 0293 0007', 'Ahyadi', 'L', 'Sales Kanvas', 'Toli - toli', '1993-02-10', 'Islam', 'TK', '085 343 707 582', '-', 'img_1520905725.jpg', 'BTN Palupi Blok I1 No.12', '0', 'S1', 'Ada', 0, 2, '2018-02-26', 89, 'http://localhost/rest-karyawan/assets/img/', 1),
(91, '7203 0620 1193 0002', 'Salmon', 'L', 'Driver', 'Panii', '1993-11-26', 'Kristen', 'TK', '082 312 229 308', '-', 'img_1526521994.jpg', 'Jl. Touwa No.11 / Jl. Cendana Panii Dompelas Sojol', '825329832831000', 'SMA', 'Ya', 0, 3, '2018-04-30', 91, 'http://localhost/rest-karyawan/assets/img/', 2),
(92, '7271 0302 1185 0011', 'Sunarto', 'L', 'Driver', 'Palu', '1985-11-02', 'Islam', 'K1', '085 240 483 212', '-', 'img_1531119207.jpg', 'JL. MAWAR KEL.PETOBO, KEC.PALU SELATAN', '0', 'SMA', 'Ya', 0, 2, '2018-07-02', 92, 'http://localhost/rest-karyawan/assets/img/', 1),
(93, '7208 0211 1097 0001', 'I Ketut Indra Sudarwan', 'L', 'Salesman', 'Buranga', '1997-10-11', 'Hindu', 'K1', '000 000 000 000', '-', 'img_1537260910.jpg', 'Talise Vallangguni RT 003 RW 006, Talise, Mantikulore.', '0', 'SMA', 'Ya', 0, 3, '2018-08-01', 93, 'http://localhost/rest-karyawan/assets/img/', 2),
(95, '7210 1018 1191 0001', 'Samrifky Nolfreyadi', 'L', 'Driver', 'Sibalaya', '1991-10-18', 'Islam', 'K1', '085 398 484 434', 'sam@gmail.com', 'img_1540602215.jpg', 'Desa Tulo RT/RW 001/001, desa Tulo, Kecamatan Dolo', '0', 'SMA', 'Ya', 0, 3, '2018-09-04', 95, 'http://localhost/rest-karyawan/assets/img/', 2),
(96, '7215222', 'Cahyadi', 'L', 'Serabutan', 'Palu', '1980-01-01', 'Islam', '', '085 356 265 662', '-', 'img_1566448555.jpg', 'Jl. Basuki Rahmat', '000000000000000', 'SMA', 'Yes', 0, 2, '2018-11-01', 96, 'http://localhost/rest-karyawan/assets/img/', 1),
(97, '7210012312910003', 'Kornelius', 'L', 'Serabutan', 'Flores', '1991-12-23', 'Khatolik', '', '085 398 861 469', '-', 'img_1566448530.jpg', 'Desa Jono Oge RT 004/RW 003 Kab. SIGI - SULTENG', '000000000000000', 'SMA', 'Yes', 0, 3, '2018-12-01', 97, 'http://localhost/rest-karyawan/assets/img/', 2),
(98, '7271 0212 0380 0007', 'Yohansah', 'L', 'Driver', 'Palu', '1980-03-12', 'Islam', 'K1', '085 241 205 297', '-', 'noprofile.png', 'Jl. Kedondong Lrg. 1', '0', 'SMA', 'Yes', 0, 3, '2015-02-01', 45, 'http://localhost/rest-karyawan/assets/img/', 2),
(99, '7271 0605 0184 0001', 'Zamsih', 'L', 'Driver', 'Luwuk', '1984-01-05', 'Islam', 'K0', '082 189 517 757', 'zamsihzam@gmail.com', 'img_1514272904.jpg', 'Jl. Gunung Gawalise No. 225.B', '836142117831000', '', '', 0, 3, '2016-03-28', 56, 'http://localhost/rest-karyawan/assets/img/', 2),
(100, '7271041107720002', 'MINHAR', 'L', 'Sales', 'Palu', '1972-07-11', '', 'K3', '000 000 000 000', '-', 'noprofile.png', 'Tawaili', '000000000000000', 'SMA', 'Yes', 0, 3, '2009-01-01', 13, 'http://localhost/rest-karyawan/assets/img/', 2),
(101, '7210 0118 0888 0003', 'Ilham', 'L', 'Sales', 'Sidera', '1988-08-10', 'Islam', 'TK', '085 696 012 448', 'ii0980421@gmail.com', 'img_1525856995.jpg', 'Jl. SDN Karawana, Kec. Sigi Biromaru', '0', 'S1', 'Ada', 0, 3, '2017-06-01', 80, 'http://localhost/rest-karyawan/assets/img/', 2),
(102, '7271 0305 0883 0006', 'Agung Junaedi', 'L', 'Sales', 'Palu', '1983-08-05', 'Islam', 'TK', '085 241 088 451', '-', 'noprofile.png', 'Jl. Basuki Rahmat', '0', 'SMA', 'Yes', 0, 3, '2009-06-01', 12, 'http://localhost/rest-karyawan/assets/img/', 2),
(103, '7271 0301 0189 0009', 'Rahmat Arif', 'L', 'Sales', 'Palu', '1989-01-01', 'Islam', 'k1', '', '', 'noprofile.png', '', '', 'SMA', '', 0, 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(104, '7208 1301 0596 0001', 'Kurniawan Ali badiri', 'L', 'Sales', 'Pinotu', '1905-06-18', 'Islam', 'TK', '000 000 000 000', '-', 'noprofile.png', 'Desa Pinotu', '000000000000000', 'SMA', 'Yes', 0, 3, '2015-05-01', 46, 'http://localhost/rest-karyawan/assets/img/', 2),
(105, '6402 0516 0592 0004', 'SYAMSUDIN', 'L', 'Driver', 'Muara Badak', '1992-05-16', 'Islam', 'TK', '000 000 000 000', '-', 'noprofile.png', 'Palu', '000000000000000', 'SMA', 'Yes', 0, 3, '1970-01-01', 44, 'http://localhost/rest-karyawan/assets/img/', 2),
(106, '7208 0313 0592 0003', 'Budi Setiawan', 'L', 'Sales', 'Palu', '1992-05-13', 'Islam', 'TK', '085 396 201 775', '-', 'noprofile.png', 'Tinombo', '0', '', '', 0, 3, '2013-09-01', 38, 'http://localhost/rest-karyawan/assets/img/', 2),
(107, '7271 0204 1187 0001', 'Andris', 'L', 'Driver', 'Palu', '1987-11-04', 'Islam', 'TK', '082 347 567 805', '-', 'noprofile.png', 'Jl. Padanjakaya', '0', 'SMA', 'Yes', 0, 3, '2016-03-01', 49, 'http://localhost/rest-karyawan/assets/img/', 2),
(108, '7271 0218 0880 0006', 'MUH.JUANG NUR SAURU', '', 'Driver', 'Palu', '1980-08-18', '', '', '', '', 'noprofile.png', '', '', '', '', 0, 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(109, '7271 0325 1274 0003', 'Andi Nandar', 'L', 'Sales', 'Palu', '1974-12-25', 'Islam', 'TK', '085 242 929 875', '-', 'noprofile.png', 'Jl. Dewi Sartika Lorong Kenangan No. 22 F', '0', '', '', 0, 3, '2004-08-01', 17, 'http://localhost/rest-karyawan/assets/img/', 2),
(110, '7210 0924 1093 0001', 'Yayat Hidayat', 'L', 'Salesman', 'Desa Bangga', '1993-10-24', 'Islam', 'K1', '082 322 349 281', '-', 'noprofile.png', 'Jl. Poros Palu - Bangga', '0', 'SMA', 'Yes', 0, 3, '2014-02-03', 39, 'http://localhost/rest-karyawan/assets/img/', 2),
(111, '7271063107820001', 'MOH. TAUFAN', 'L', 'Sales', 'Palu', '1982-07-31', 'Islam', 'K0', '000 000 000 000', '-', 'noprofile.png', 'Jl.Beringin', '000000000000000', 'SMA', 'Yes', 0, 3, '2007-01-01', 9, 'http://localhost/rest-karyawan/assets/img/', 2),
(112, '7208 0114 0489 0001', 'Ruri Rantika', 'L', 'Salesman', 'Parigi', '1989-04-14', 'Islam', 'K1', '082 393 534 293', '-', 'noprofile.png', 'Dusun 3, Desa Pangi, Parigi Utara', '0', '', '', 0, 3, '2015-05-01', 51, 'http://localhost/rest-karyawan/assets/img/', 2),
(113, '7271 0308 0783 0062', 'Moh. Taufik', 'L', 'Salesman', 'Tinombo', '1983-07-08', 'Islam', 'TK', '085 241 352 511', '-', 'noprofile.png', 'Jl. Kijang Selatan VII No 8', '749853149831000', '', '', 0, 3, '2015-03-15', 47, 'http://localhost/rest-karyawan/assets/img/', 2),
(114, '', 'AKBAR', 'L', 'Driver', 'Kaleke', '1980-01-01', 'Islam', 'K1', '', '', 'noprofile.png', '', '', '', '', 0, 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(115, '', 'Hari', '', '', '', '1980-01-01', '', '', '', '', 'noprofile.png', '', '', '', '', 0, 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(116, '7571 0321 0793 0001', 'Zulfikar Fais Madina', 'L', 'Sales', 'Palu', '1993-07-20', 'Islam', 'TK', '085 242 935 573', 'zulfikarfais@yahoo.com', 'img_1514273390.jpg', 'Jl. Dulohupa, Dulomo Utara', '0', 'SMA', 'Ada', 0, 3, '2016-11-01', 57, 'http://localhost/rest-karyawan/assets/img/', 2),
(117, '7271 0315 0991 0002', 'Moh. Riyan Aditya', 'L', 'administrasi', 'Palu', '1991-09-15', 'Islam', 'TK', '082 296 046 508', '-', 'noprofile.png', 'Jl. Anoa 1 No. 160', '0', '', '', 0, 3, '2016-09-01', 58, 'http://localhost/rest-karyawan/assets/img/', 2),
(118, '7202 0615 0687 0008', 'Syahrudin', 'L', 'Mekanik', 'Palu', '1987-06-15', 'Islam', 'K1', '082 187 848 599', '-', 'noprofile.png', 'Dusun 6, Desa Pandajaya, Pamona Selatan', '0', 'SMA', 'Yes', 0, 3, '2016-12-01', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(119, '', 'Puja', 'L', 'Sales', '', '1970-01-01', 'Kristen', '', '', '', 'noprofile.png', '', '', '', '', 0, 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(120, '7601 0426 1289 0005', 'Rahmat Hambali', 'L', 'Salesman', 'Madura', '1989-12-26', 'Islam', 'K1', '082 290 833 818', '-', 'noprofile.png', 'BTN Asri Permai Blok A No. 4', '0', '', '', 0, 3, '2017-05-01', 65, 'http://localhost/rest-karyawan/assets/img/', 2),
(121, '', 'Ram', 'L', 'Asisten Mekanik', '', '1980-01-01', 'Islam', '', '', '', 'noprofile.png', '', '', '', '', 0, 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(122, '7271 0313 0694 0001', 'Hastiawan', 'L', 'Salesman', 'Palu', '1994-06-13', 'Islam', 'K1', '000 000 000 000', '-', 'noprofile.png', 'Jl. Anoa 1', '0', '', '', 0, 3, '2017-08-01', 72, 'http://localhost/rest-karyawan/assets/img/', 2),
(123, '7271 0209 0987 0000', 'Awaluddin SI', 'L', 'Salesman', 'Kendari', '1987-09-09', 'Islam', 'K1', '085 343 888 433', '-', 'noprofile.png', 'Jl. Samudra 1 No. 12', '0', 'S1', 'Yes', 0, 3, '2017-08-01', 73, 'http://localhost/rest-karyawan/assets/img/', 2),
(124, '7206 0246 0894 0001', 'Etfian Masa', 'P', 'Administrasi', 'Dolupo Karya', '1970-01-01', 'Kristen', 'TK', '085 256 220 851', '-', 'img_1514272639.jpg', 'Jl. Miangas, Lrg. Pancasila', '0', '', '', 0, 3, '2017-12-26', 77, 'http://localhost/rest-karyawan/assets/img/', 2),
(125, '7208 1023 0792 0001', 'Randiansyah', 'L', 'Driver', 'Sigenti', '1992-07-20', 'Islam', 'TK', '081 343 823 090', 'randiansyahr0@gmail.com', 'img_1515226193.jpg', 'Desa Sigenti Selatan, Kec. Tinombo Selatan', '0', 'S1', 'Ada', 0, 3, '2017-12-02', 78, 'http://localhost/rest-karyawan/assets/img/', 2),
(126, '7203 0867 0395 0005', 'Ilham Akbar', 'L', 'Sales', 'Palu', '1970-01-01', 'Islam', 'TK', '082 291 509 572', '-', 'noprofile.png', 'Desa Boya, Kec Banawa', '78426533727000', '', '', 0, 3, '2015-05-03', 53, 'http://localhost/rest-karyawan/assets/img/', 2),
(127, '7271 0326 0189 0001', 'Roysno', 'L', 'Sales', 'Palu', '1989-01-26', 'Islam', 'K0', '085 299 960 679', '-', 'noprofile.png', 'Wombo, Kec. Tanantovea', '0', '', '', 0, 3, '2017-12-12', 82, 'http://localhost/rest-karyawan/assets/img/', 2),
(128, '7201 0403 0993 0004', 'Muh Ridha Arsid', 'L', 'Salesman', 'Luwuk', '1993-09-03', 'Islam', 'TK', '085 241 007 895', 'muhridhaarsidridha@gmail.com', 'img_1514367504.jpg', 'Jl. Katambak, Kel. Bukit Mambual, Kec.Luwuk Selatan', '000000000000000', 'SMA', 'Yes', 0, 3, '2017-12-14', 83, 'http://localhost/rest-karyawan/assets/img/', 2),
(129, '7271 0328 0292 0012', 'Moh. Saleh Lamusa', 'L', 'Sales', 'Ampana', '1992-02-28', 'Islam', 'TK', '082 394 665 358', '-', 'img_1517302074.jpg', 'Jl. Tg. Satu No. 04 Palu', '0', 'SMA', 'Ada', 0, 3, '2018-12-01', 84, 'http://localhost/rest-karyawan/assets/img/', 2),
(130, '7210 0112 0582 0002', 'Jusli R', 'L', 'Driver', 'Salumbia', '1982-05-12', 'Islam', 'K1', '081 341 349 339', '-', 'img_1523947574.jpg', 'Jl. Guru Tua, Kalukubula', '0', 'SMA', 'Ada', 0, 3, '2017-12-15', 86, 'http://localhost/rest-karyawan/assets/img/', 2),
(131, '7271 0205 0989 0005', 'Edy Saputra', 'L', 'Salesman', 'Lero', '1989-11-05', 'Islam', 'TK', '082 361 071 817', '-', 'img_1528339312.jpg', 'Jl. Parigi Raya, No. 75 BTN Silae', '0', 'S1 Komputer', 'Ya', 0, 3, '2018-03-12', 90, 'http://localhost/rest-karyawan/assets/img/', 2),
(132, '7271 0328 0793 0008', 'Gery Julian Stevano', 'L', 'Driver', 'Palu', '1993-07-28', 'Kristen', 'K0', '081 145 061 300', '-', 'img_1537334468.jpg', 'Jl.Patimura No.158 Palu', '857493159831000', 'SMA', 'Ya', 0, 3, '2018-09-04', 94, 'http://localhost/rest-karyawan/assets/img/', 2),
(133, '7271 0212 0587 0001', 'Djafrin', 'L', 'Serabutan', 'Palu', '1987-05-12', 'Islam', 'TK', '085 342 829 615', 'djadjafrin@yahoo.com', 'img_1517367440.jpg', 'Jl. Padanjakaya', '0', 'SMA', 'Ada', 0, 3, '2019-04-13', 70, 'http://localhost/rest-karyawan/assets/img/', 2),
(134, '7271 0202 1091 0002', 'Taufik Efendi', 'L', 'Sales', 'Palu', '1991-10-02', 'Islam', 'TK', '085 236 430 911', 'taufikefendi602@gmail.com', 'img_1540005571.jpg', 'Jl. Munif Rahman', '0', 'SMA', 'Ada', 0, 3, '2017-11-01', 76, 'http://localhost/rest-karyawan/assets/img/', 2),
(135, '6473 0205 0570 0001', 'Abdul Hafid', 'L', 'Salesman', 'Palu', '1970-05-05', 'Islam', 'K1', '008 125 509 412', '-', 'img_1554515981.jpg', 'Jl. Selumit Pantai RT 002/ RW 000, Tarakan Tengah, No Hp : 0812 5509 412', '701595670723000', 'SMA', 'Ya', 0, 1, '2019-01-01', 98, 'http://localhost/rest-karyawan/assets/img/', 1),
(136, '7271 0260 0998 0005', 'Fisca Fricikia Triwardana', 'P', 'Administrasi', 'Palu', '1998-09-20', 'Islam', 'TK', '082 291 878 705', 'belumada', 'img_1562645816.jpg', 'Jl. S. Malino Lr. II No. 160, Nunu, Tatanga, Palu', '952291003831000', 'SMA', 'Ya', 0, 2, '2019-02-01', 99, 'http://localhost/rest-karyawan/assets/img/', 1),
(137, '7271 0131 0188 0005', 'Andhika', 'L', 'Driver', 'Palu', '1988-01-31', 'Islam', 'K1', '082 292 439 733', '-', 'img_1554775899.jpg', 'Jl. Hayam Wuruk I No. 72 Palu RT 002/RW 003  Besusu Barat, Palu Timur', '0', 'SMA', 'Ya', 0, 2, '2019-03-01', 100, 'http://localhost/rest-karyawan/assets/img/', 1),
(138, '7210091911950001', 'Memo Bahari', 'L', 'Driver', 'Palu', '1995-11-19', 'Islam', '', '085 395 052 155', '-', 'img_1583911097.jpg', 'Desa Pulu, Kab.Sigi Biromaru', '000000000000000', 'SMA', 'Yes', 0, 2, '2019-08-01', 101, 'http://localhost/rest-karyawan/assets/img/', 1),
(139, '7210121404950002', 'Fikrin', 'L', 'Sales Kanvas', 'Tulo', '1995-04-14', 'Islam', '', '085 256 900 784', 'muh.fikri1495@gmail.com', 'img_1566448003.jpg', 'Dusun 3 Rarantea, RT.002, RT,003, Desa Tulo, Kec.Dolo', '000000000000000', 'SMA', 'Yes', 0, 3, '2019-08-12', 102, 'http://localhost/rest-karyawan/assets/img/', 2),
(140, '7208112002910001', 'Vicky Vernando', 'L', 'Sales Kanvas', 'Manado', '1991-02-20', 'Kristen', '', '085 341 436 363', 'vernandovicky@ymail.com', 'img_1566448027.jpg', 'Olobaru RT.001, RW.001 Desa OLobaru, Kec.Parigi Selatan, Kab. Parigi Moutong - Sulteng', '000000000000000', 'SMA', 'Yes', 0, 2, '2019-08-15', 103, 'http://localhost/rest-karyawan/assets/img/', 1),
(141, '7271012004900003', 'Abd.Azis', 'L', 'Sales Kanvas', 'Sigenti', '1990-04-20', 'Islam', '', '085 298 094 716', '-', 'img_1576627756.jpg', 'Jl.Tombolotutu', '000000000000000', 'SMA', 'Yes', 0, 2, '2019-12-16', 104, 'http://localhost/rest-karyawan/assets/img/', 1),
(142, '7202021911870002', 'Hermansyah', 'L', 'Driver', 'Masamba', '1987-11-19', 'Islam', '', '082 396 482 287', '-', 'img_1577147586.jpg', 'Jl.Mutaji Desa Lolu, Kec.Sigi Biromaru Kab.Sigi', '000000000000000', 'S1', 'Yes', 0, 2, '2019-12-09', 105, 'http://localhost/rest-karyawan/assets/img/', 1),
(143, '7203081001880009', 'Feri', 'L', 'Driver', 'Lolioge', '1988-01-10', 'Islam', '', '082 291 878 948', '-', 'img_1589352532.jpg', 'Loli Saluran / Jl.Teuku Umar', '000000000000000', 'SMA', 'Yes', 0, 2, '2019-12-28', 106, 'http://localhost/rest-karyawan/assets/img/', 1),
(144, '7210120312920001', 'Achsan Subangkit', 'L', 'Driver', 'Bodi Karawana', '1992-12-03', 'Islam', '', '085 216 060 220', '-', 'noprofile.png', 'Desa Karawana RT/RW 09/03, Kec.Dolo, Kab.Sigi', '000000000000000', 'SMA', 'Yes', 0, 3, '2020-02-24', 107, 'http://localhost/rest-karyawan/assets/img/', 2),
(145, '7271020909950001', 'Moh.Riyan Hidayatullah.S', 'L', 'Serabutan', 'Palu', '1995-09-09', 'Islam', '', '080 000 000 000', 'riyanhidayatullah843@gmail.com', 'img_1583367324.jpg', 'Jl. Sungai Wera No.46 B', '000000000000000', 'SMA', 'Yes', 0, 2, '2020-03-02', 108, 'http://localhost/rest-karyawan/assets/img/', 1),
(146, '7208012704940001', 'Aditya Pratama', 'L', 'Driver', 'Lemusa , Parigi', '1994-04-27', 'Islam', '', '082 393 503 081', '-', 'noprofile.png', 'Jl. Pramuka Dusun I, Desa Pombewe, Kec.Sigi Biromaru', '000000000000000', 'SMA', 'Yes', 0, 3, '2020-06-02', 109, '', 2),
(147, '7208090310900003', 'ANDREW MANOPO', 'L', 'Driver', 'Palu', '1990-10-03', 'Islam', '', '082 349 499 924', '-', 'noprofile.png', 'Jl.Pelita Air No.8', '000000000000000', 'S1', 'Yes', 0, 2, '2020-07-07', 110, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
