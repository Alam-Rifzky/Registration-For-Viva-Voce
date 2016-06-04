-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 07:00 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsinanin`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_mhs`
--

CREATE TABLE IF NOT EXISTS `data_mhs` (
  `npm` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mhs`
--

INSERT INTO `data_mhs` (`npm`, `nama`, `fakultas`, `jurusan`, `email`, `no_tlp`) VALUES
('16111197', 'Rifzky Alam', 'Ilmu Komputer', 'Sistem Informasi', 'rifzky.mail@gmail.com', '081279222250'),
('17111197', 'Avril Lavigne', 'Ilmu Komputer dan Teknologi Informasi', 'Sistem Informasi', 'avril.lavigne@rifzky.net', '+44-125001-33'),
('36111197', 'Rifzky Charles', 'Ilmu Komputer dan Teknolo', 'D3 Managemen Informatika', 'rifzky.charles@rifzky.co.id', '123444331'),
('5555555', 'vampires', 'vampire', 'vampire', 'vampire@vampire.co.id', '23142343'),
('77111197', 'Tes', 'Ilmu Komputer dan Teknologi Informasi', 'D3 Teknik Komputer', 'test@test.com', '081277222255'),
('ikan', 'ikan', 'Ilmu Komputer dan Teknologi Informasi', 'Sistem Informasi', 'ikan@ikan.com', '12346');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id_petugas` varchar(8) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(5000) NOT NULL,
  `tgl_posting` date NOT NULL,
  `waktu` varchar(8) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_petugas`, `judul`, `isi`, `tgl_posting`, `waktu`, `gambar`) VALUES
('rifzky', 'cumi-cumi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2015-07-09', '09:33:35', '0'),
('assassin', 'Baru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2015-07-23', '06:37:04', 'mygirl.jpg'),
('assassin', 'Info', 'loreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. ~~~~', '2015-07-23', '08:30:23', ''),
('assassin', 'Test Lagi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2015-07-24', '04:20:23', 'nabilah.jpg'),
('assassin', 'TestUpdate', 'terseraah', '2015-07-24', '08:37:18', 'hurufA.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(8) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
('ninja', 'assassin', '00e45749508fe15ca1af3397eab8db78'),
('17111197', 'avril_lavigne', '3e56007202a9d40d77099b78968888e8'),
('36111197', 'charles', '81980df6a9742fb9c5aebee374a2c88e'),
('ikan', 'ikan', '86b19a0013a70a10e5c46bfd2b0b8504'),
('77111197', 'test', '098f6bcd4621d373cade4e832627b4f6'),
('5555555', 'vampire', '1c020611e3b753925ffc8af8745c0556'),
('16111197', 'zeke', '133f19cfffb569f6447ebf073084a417');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `nip` varchar(8) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `no_tlp`, `email`) VALUES
('ninja', 'ninja', '55555', 'ninja@ninja.org');

-- --------------------------------------------------------

--
-- Table structure for table `pointer`
--

CREATE TABLE IF NOT EXISTS `pointer` (
  `npm` varchar(8) NOT NULL,
  `folder` varchar(30) NOT NULL,
  `surat_acc` varchar(100) DEFAULT NULL,
  `nilai_dospem` varchar(100) DEFAULT NULL,
  `ijazah` varchar(100) DEFAULT NULL,
  `bukti_bk` varchar(100) DEFAULT NULL,
  `foto_3x4` varchar(100) DEFAULT NULL,
  `foto_4x6` varchar(100) DEFAULT NULL,
  `nama_dospem` varchar(40) NOT NULL,
  `judul_penulisan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pointer`
--

INSERT INTO `pointer` (`npm`, `folder`, `surat_acc`, `nilai_dospem`, `ijazah`, `bukti_bk`, `foto_3x4`, `foto_4x6`, `nama_dospem`, `judul_penulisan`) VALUES
('16111197', 'files/16111197', '6. DAFTAR ISI_2.pdf', 'abstraksi.pdf', NULL, NULL, NULL, 'mygirl.jpg', 'Rifzky Alam, M.Sc', 'Project Invincible'),
('5555555', 'files/5555555', 'Kisi2 + jawaban.docx', 'parttimeNew.xlsx', NULL, NULL, NULL, 'meme.jpg', 'Dosen-Dosenan', 'Judul-Judulan'),
('36111197', 'files/36111197', 'Doc1.docx', 'om uu.docx', 'Istana Bogor.docx', 'Dasar Hukum Islam.docx', 'mygirl.jpg', 'nabilah.jpg', 'Mrs. Always Right', 'Web Jadwal Sidang Buat Lulus'),
('17111197', 'files/17111197', 'mygirl.jpg', 'Bab_IV_-_Dasar_Logika.pdf', NULL, NULL, NULL, 'choco.jpg', 'Mr. Nice guy', 'apa aja deh'),
('77111197', 'files/77111197', '09 BAB I.pdf', 'ABSTRAK.pdf', 'AL.pdf', '1.pengenalan-kecerdasan-buatan.pdf', 'Best Couple.png', 'avril.png', 'Rifzky Alam, M.Sc', 'Web Implementasi Pikiran Anak Muda'),
('ikan', 'files/ikan', '6. DAFTAR ISI.pdf', '04 - PARAF & STEMPEL LEMBAR PENGESAHAN.pdf', NULL, NULL, NULL, '20150622151537-1.jpg', 'ikan', 'ikan');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE IF NOT EXISTS `sidang` (
  `nomor` varchar(4) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `npm` varchar(8) NOT NULL,
  `jenjang` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`nomor`, `tanggal`, `npm`, `jenjang`) VALUES
('1', '2015-10-31', '5555555', 'S1'),
('2', '2015-11-02', '16111197', 'S1'),
('3', '2015-10-31', '17111197', 'S1'),
('1', '2015-10-31', '36111197', 'D3'),
('2', '2015-10-31', '77111197', 'D3'),
('4', '2015-10-31', 'ikan', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `waiting_list`
--

CREATE TABLE IF NOT EXISTS `waiting_list` (
  `npm` varchar(9) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
