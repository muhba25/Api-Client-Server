-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 07:49 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofood5`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CT` ()  BEGIN
DECLARE  EXIT  HANDLER  FOR  SQLEXCEPTION,  SQLWARNING,  NOT FOUND ROLLBACK;
START TRANSACTION;
INSERT INTO menu2 (NAMA_MENU, HARGA, JUMLAH_MAKANAN) VALUES('indomie aceh', 3000, 35);
INSERT INTO menu2 (NAMA_MENU, HARGA, JUMLAH_MAKANAN) VALUES('indomie ayam geprek', 3000, 35);
SELECT * FROM menu2;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CT2` ()  BEGIN
DECLARE  EXIT  HANDLER  FOR  SQLEXCEPTION,  SQLWARNING,  NOT FOUND ROLLBACK;
START TRANSACTION;
INSERT INTO menu2 (NAMA_MENU, HARGA, JUMLAH_MAKANAN) VALUES('indomie aceh', 3000, 35);
INSERT INTO menu2 (NAMA_MENU, HARGA, JUMLAH_MAKANAN) VALUES('indomie ayam geprek', now(), 35);
SELECT * FROM menu2;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatmenu` (IN `nama` VARCHAR(30))  BEGIN

SELECT restaurant.NAMA_RESTAURANT, menu.NAMA_MENU, menu.HARGA
FROM menu
INNER JOIN restaurant ON menu.ID_RESTAURANT = restaurant.ID_RESTAURANT

WHERE NAMA_RESTAURANT=nama;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengeluarangofood` (IN `idc` INT, IN `ids` INT, OUT `pengeluaran` INT)  BEGIN
 SELECT SUM(BIAYA)
 INTO pengeluaran
 FROM `order`
 WHERE ID_CUSTOMER=idc AND ID_SERVICE=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `riwayatgofood` (IN `idc` INT, IN `ids` INT)  BEGIN
SELECT `order`.ID_CUSTOMER,`order`.BIAYA, `order`.`TANGGAL_PESANAN` FROM `order` 
WHERE ID_CUSTOMER=idc AND ID_SERVICE=ids;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GetFullName` () RETURNS VARCHAR(100) CHARSET latin1 BEGIN
RETURN 'Gofood';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `keterangan_Stok` (`stok` INT) RETURNS VARCHAR(20) CHARSET latin1 BEGIN
   DECLARE keterangan varchar(20);
   IF stok <= 10 THEN
      SET keterangan = 'Makanan Hampir habis';
   ELSEIF stok <= 20 THEN
      SET keterangan = 'Makanan Aman';
   ELSE
      SET keterangan = 'Makanan Masih Banyak';
   END IF;
   RETURN keterangan;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pengeluaran` (`jumlah` INT, `biaya` INT) RETURNS INT(11) BEGIN 
RETURN jumlah * biaya;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `api-users`
--

CREATE TABLE `api-users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api-users`
--

INSERT INTO `api-users` (`id`, `nama`, `token`) VALUES
(1, 'Ivana', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_CUSTOMER` int(11) NOT NULL,
  `NAMA_CUSTOMER` varchar(50) NOT NULL,
  `NO_HP` varchar(12) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `KOORDINAT_LATITUDE_CUSTOMER` double NOT NULL,
  `KOORDINAT_LONGITUDE_CUSTOMER` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_CUSTOMER`, `NAMA_CUSTOMER`, `NO_HP`, `ALAMAT`, `KOORDINAT_LATITUDE_CUSTOMER`, `KOORDINAT_LONGITUDE_CUSTOMER`) VALUES
(1, 'Suhandri', '085242020252', 'Jln. Melati No.01', 0, 0),
(2, 'Dewika Leonency', '081342159081', 'Jln. Mawar N0.04', 0, 0),
(3, 'Devi Srinervi', '081241102678', 'Jln. Merpati 9', 0, 0),
(4, 'Ivana Yuni Astari', '082348534653', 'Jln. Dirgantara Lr.14 No 41', 0, 0),
(5, 'Otniel Dion Oktariandi', '085255306327', 'Jln. Kakak Tua', 0, 0),
(6, 'Doni Indra Priadi', '085242301475', 'Jln. Anyelir No.03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `ID_driver` int(11) NOT NULL,
  `NAMA_driver` varchar(50) NOT NULL,
  `No_HP` varchar(12) NOT NULL,
  `No_kendaraan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`ID_driver`, `NAMA_driver`, `No_HP`, `No_kendaraan`) VALUES
(2, 'NOVAL KADRIAWAN', '082188111530', 'DD010NK'),
(3, 'ANDI MUHAMMAD AKBAR ', '082189013611', 'DD024AA'),
(4, 'MUHAMMAD ILHAM ', '082192155315', 'DD020MI'),
(5, 'ERWIN', '082259375950', 'DD031ER'),
(6, 'MUHAMMAD BASO ADRIAN ', '082293533007', 'DD039MB'),
(7, 'AMAR MARUF', '085235682032', 'DD034AM'),
(8, 'GABRIL HOZANNA', '085315713446', 'DD042GH'),
(9, 'MUHAMMAD RAHMAT', '085342553039', 'DD001MR');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `ID_RESTAURANT` int(11) DEFAULT NULL,
  `NAMA_MENU` varchar(20) NOT NULL,
  `JENIS_MAKANAN` varchar(20) NOT NULL,
  `JUMLAH_MAKANAN` int(11) DEFAULT NULL,
  `HARGA` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_MENU`, `ID_RESTAURANT`, `NAMA_MENU`, `JENIS_MAKANAN`, `JUMLAH_MAKANAN`, `HARGA`) VALUES
(27, 10, 'MIE TITI BIASA', 'MIE', 5, '15000'),
(28, 10, 'MIE TITI SEAFOOD', 'MIE', 3, '20000'),
(29, 10, 'NASI GORENG MERAH', 'NASI GORENG', 6, '12000'),
(30, 10, 'NASI GORENG JAKARTA', 'NASI GORENG', 3, '15000'),
(31, 10, 'ES TES SPESIAL', 'MINUMAN', 10, '5000'),
(32, 8, 'CHICKN FILLET', 'AYAM', 8, '9000'),
(33, 8, 'FISH FILLET', 'IKAN', 12, '9000'),
(34, 8, 'OR BURGER', 'BURGER', 17, '9000'),
(35, 8, 'WAGYU BURGER', 'BURGER', 21, '25000'),
(36, 8, 'KFC PUDDING', 'MAKANAN PENUTUP', 22, '3000'),
(37, 8, 'PEPSI CAN', 'MINUMAN', 11, '9000'),
(38, 8, 'TROPICANA TWISTER', 'MINUMAN', 16, '5000'),
(39, 8, 'HOT BRULEE COFFEE', 'MINUMAN', 14, '11000'),
(40, 8, 'CARAMEL MACCHIATO', 'MINUMAN', 23, '21000'),
(41, 8, 'ICED LATTE', 'MINUMAN', 9, '20000'),
(42, 8, 'HUZELNUT COFFEE', 'MINUMAN', 6, '10000'),
(43, 9, 'CAH KANGKUNG', 'SAYURAN', 15, '16000'),
(44, 9, 'CAP CAY', 'SAYURAN', 6, '17000'),
(45, 9, 'URAP URAPAN', 'SAYURAN', 5, '15000'),
(46, 9, 'TUMIS TOGE', 'SAYURAN', 3, '15500'),
(47, 9, 'JUS AMSTERDAM', 'MINUMAN', 16, '11000'),
(48, 9, 'JUS 2 RASA', 'MINUMAN', 15, '20000'),
(49, 9, 'JUS 3 RASA', 'MINUMAN', 11, '27000'),
(50, 9, 'PUDING LAPIS', 'MAKANAN PENUTUP', 4, '5000'),
(51, 9, 'PUDOT', 'MAKANAN PENUTUP', 5, '10000'),
(52, 14, 'MIE KUAH SEAFOOD', 'MIE', 6, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `menu2`
--

CREATE TABLE `menu2` (
  `ID_MENU` int(11) NOT NULL,
  `NAMA_MENU` varchar(20) NOT NULL,
  `HARGA` decimal(10,0) DEFAULT NULL,
  `JUMLAH_MAKANAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu2`
--

INSERT INTO `menu2` (`ID_MENU`, `NAMA_MENU`, `HARGA`, `JUMLAH_MAKANAN`) VALUES
(1, 'indomie', '3000', 35),
(2, 'telur', '2500', 38),
(3, 'kecap ABC', '500', 47),
(4, 'indomie aceh', '3000', 35),
(5, 'indomie ayam geprek', '3000', 35);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `ID_RESTAURANT` int(11) NOT NULL,
  `NAMA_RESTAURANT` varchar(30) NOT NULL,
  `ALAMAT_RESTAURANT` varchar(255) NOT NULL,
  `KOORDINAT_LATITUDE` double NOT NULL,
  `KOORDINAT_LONGITUDE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`ID_RESTAURANT`, `NAMA_RESTAURANT`, `ALAMAT_RESTAURANT`, `KOORDINAT_LATITUDE`, `KOORDINAT_LONGITUDE`) VALUES
(8, 'KFC', 'Jalan Sultan Hasanuddin No.16', 0, 0),
(9, 'RUMAH MAKAN OKE', 'Jalan Sungai Cerekang', 0, 0),
(10, 'MIE TITI', 'Jalan Wahidin Sudirohusodo No.20', 0, 0),
(11, 'COTO PARAIKATTE', 'Jalan A.P. Pettarani No.125', 0, 0),
(12, 'RUMAH MAKAN BRAVO', 'Jalan Andalas No. 154', 0, 0),
(13, 'RUMAH MAKAN ULU JUKU', 'Jl. Prof. Abdurahman Basalamah No.99A', 0, 0),
(14, 'NEW DINAR SEAFOOD', 'Jl. Lamaddukelleng No.26', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ID_SERVICE` int(11) NOT NULL,
  `NAMA_SERVICE` varchar(10) NOT NULL,
  `ONGKIR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID_SERVICE`, `NAMA_SERVICE`, `ONGKIR`) VALUES
(1, 'GO RIDE', 10000),
(2, 'GO CAR', 20000),
(3, 'GO FOOD', 15000),
(4, 'GO SEND', 5000),
(5, 'GO BOX', 100000),
(6, 'GO TIX', 25000),
(7, 'GO CLEAN', 300000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api-users`
--
ALTER TABLE `api-users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_CUSTOMER`),
  ADD UNIQUE KEY `NO_HP` (`NO_HP`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`ID_driver`),
  ADD UNIQUE KEY `No_HP` (`No_HP`),
  ADD UNIQUE KEY `No_kendaraan` (`No_kendaraan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`),
  ADD KEY `FK_MENU` (`ID_RESTAURANT`);

--
-- Indexes for table `menu2`
--
ALTER TABLE `menu2`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID_RESTAURANT`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID_SERVICE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api-users`
--
ALTER TABLE `api-users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_CUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `ID_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `menu2`
--
ALTER TABLE `menu2`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID_RESTAURANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID_SERVICE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_MENU` FOREIGN KEY (`ID_RESTAURANT`) REFERENCES `restaurant` (`ID_RESTAURANT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
