-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 11:07 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `umrah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(10) NOT NULL,
  `admin_password` text NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_username` (`admin_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE IF NOT EXISTS `agen` (
  `agen_id` varchar(20) NOT NULL,
  `agen_nama` varchar(50) NOT NULL,
  `agen_alamat` text NOT NULL,
  `agen_tlp` varchar(20) NOT NULL,
  `agen_nomor` varchar(20) NOT NULL,
  `agen_contact_name` varchar(50) NOT NULL,
  `agen_contact_phone` varchar(20) NOT NULL,
  `agen_contact_email` text NOT NULL,
  `agen_contact_ttl` varchar(9) NOT NULL,
  `agen_contact_ktp` varchar(30) NOT NULL,
  `agen_contact_tempat_lahir` varchar(30) NOT NULL,
  `agen_contact_nama_ayah` varchar(50) NOT NULL,
  `agen_contact_tlp` varchar(20) DEFAULT NULL,
  `agen_contact_tlp_kantor` varchar(20) DEFAULT NULL,
  `agen_contact_no_paspor` varchar(30) DEFAULT NULL,
  `agen_contact_tgl_pembuatan` varchar(9) DEFAULT NULL,
  `agen_contact_bank` varchar(30) DEFAULT NULL,
  `agen_contact_no_rek` varchar(30) DEFAULT NULL,
  `agen_contact_bank_cabang` varchar(30) DEFAULT NULL,
  `agen_username` varchar(30) DEFAULT NULL,
  `agen_password` varchar(50) DEFAULT NULL,
  `agen_kode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`agen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`agen_id`, `agen_nama`, `agen_alamat`, `agen_tlp`, `agen_nomor`, `agen_contact_name`, `agen_contact_phone`, `agen_contact_email`, `agen_contact_ttl`, `agen_contact_ktp`, `agen_contact_tempat_lahir`, `agen_contact_nama_ayah`, `agen_contact_tlp`, `agen_contact_tlp_kantor`, `agen_contact_no_paspor`, `agen_contact_tgl_pembuatan`, `agen_contact_bank`, `agen_contact_no_rek`, `agen_contact_bank_cabang`, `agen_username`, `agen_password`, `agen_kode`) VALUES
('A002', 'JANNAH FIRDAUS tour and travel', 'Jl. Raya Cinere, Ruko Puri Niaga No. 11B, Cinere, Depok', '02100500500', '104105001577', 'Yogi Yogayaza', '081903149502', 'yogi@yogayaza.com', '1980-01-0', '212312212399938929', 'Jakarta', 'Mr. Yogayaza', '02100500500', '0210505050', '09827891209', '2015-05-0', 'Mandiri', '00400400492094', 'Cinere', 'jafatour', 'jafatour', 'jafatour');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` varchar(30) NOT NULL,
  `booking_token` varchar(30) NOT NULL,
  `booking_date` datetime NOT NULL,
  `booking_status` varchar(1) NOT NULL,
  `booking_expired` datetime NOT NULL,
  `booking_qty` int(1) NOT NULL,
  `booking_ref` varchar(30) NOT NULL,
  `paket_id` varchar(11) NOT NULL,
  `jemaah_id` varchar(11) NOT NULL,
  `booking_total` varchar(50) NOT NULL,
  `booking_status_payment` varchar(1) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jemaah`
--

CREATE TABLE IF NOT EXISTS `jemaah` (
  `jemaah_id` varchar(12) NOT NULL,
  `jemaah_token` varchar(12) NOT NULL,
  `jemaah_nama` varchar(50) NOT NULL,
  `jemaah_tempat_lahir` varchar(30) NOT NULL,
  `jemaah_ttl` datetime NOT NULL,
  `jemaah_nama_ayah` varchar(50) NOT NULL,
  `jemaah_no_ktp` varchar(20) NOT NULL,
  `jemaah_alamat` text NOT NULL,
  `jemaah_kelurahan` varchar(30) NOT NULL,
  `jemaah_kecamatan` varchar(30) NOT NULL,
  `jemaah_kota_kab` varchar(30) NOT NULL,
  `jemaah_kodepos` varchar(7) NOT NULL,
  `jemaah_tlp_rmh` varchar(15) NOT NULL,
  `jemaah_kantor` varchar(15) NOT NULL,
  `jemaah_phone` varchar(15) NOT NULL,
  `jemaah_email` varchar(30) NOT NULL,
  `jemah_no_passport` varchar(30) NOT NULL,
  `jemaah_tgl_buat` datetime NOT NULL,
  `jemah_tgl_berakhir` datetime NOT NULL,
  `jemaah_tmp_pembuatan` varchar(50) NOT NULL,
  `jemaah_foto` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `agen_id` varchar(20) NOT NULL,
  PRIMARY KEY (`jemaah_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `paket_id` varchar(11) NOT NULL,
  `paket_nomor` varchar(12) NOT NULL,
  `paket_nama` text NOT NULL,
  `paket_harga` varchar(20) NOT NULL,
  `paket_deskripsi` text NOT NULL,
  `paket_mekah` text NOT NULL,
  `paket_madinah` text NOT NULL,
  `paket_tipe` varchar(20) NOT NULL,
  `paket_bulan_berangkat` varchar(12) NOT NULL,
  `paket_tgl_berangkat` datetime NOT NULL,
  `paket_tgl_pulang` datetime NOT NULL,
  `paket_level` varchar(20) NOT NULL,
  `agen_id` varchar(20) NOT NULL,
  `paket_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`paket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `paket_nomor`, `paket_nama`, `paket_harga`, `paket_deskripsi`, `paket_mekah`, `paket_madinah`, `paket_tipe`, `paket_bulan_berangkat`, `paket_tgl_berangkat`, `paket_tgl_pulang`, `paket_level`, `agen_id`, `paket_created`) VALUES
('P001', '104805061555', 'UMRAH REGULER JAFA tour 1438H (Paket A)', '2700', 'Paspor dengan masa berlaku minimal 8 bulan dari jadwal keberangkatan\r\nNama di paspor minimal 3 suku kata\r\nPas foto 4x6 5 lembar , latar belakang putih, nampak wajah 80%, wanita berjilbab\r\nAkte lahir asli bagi laki-laki dibawah 17 tahun dan wanita di bawah 45tahun\r\nBuku nikah asli bagi suami istri\r\nBuku kuning/suntik meningitis', 'SAFWA ROYALE ORCHID', 'DALLAH THAIBA', 'DALLAH THAIBA', 'Desember', '2015-12-05 09:00:07', '2015-12-14 09:00:07', 'executive', 'A002', '2015-05-26 04:00:33'),
('P002', '110205351536', 'UMRAH REGULER JAFA tour 1438H (Paket B)', '2350', 'Paspor dengan masa berlaku minimal 8 bulan dari jadwal keberangkatan\r\nNama di paspor minimal 3 suku kata\r\nPas foto 4x6 5 lembar , latar belakang putih, nampak wajah 80%, wanita berjilbab\r\nAkte lahir asli bagi laki-laki dibawah 17 tahun dan wanita di bawah 45tahun\r\nBuku nikah asli bagi suami istri\r\nBuku kuning/suntik meningitis\r\n', 'ALMASSA', 'MUBARAK MADINA', 'MUBARAK MADINA', 'Desember', '2015-12-05 00:00:35', '2015-12-14 00:00:35', 'bussiness', 'A002', '2015-05-26 04:04:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
