-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2022 at 03:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_wali`
--

CREATE TABLE `dosen_wali` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_wali`
--

INSERT INTO `dosen_wali` (`nip`, `nama`, `photo`) VALUES
('18652419944263', 'Arjuna Wahyu Kusuma', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota_kab` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `angkatan` varchar(5) DEFAULT NULL,
  `jalur_masuk` int(2) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `kota_kab`, `provinsi`, `angkatan`, `jalur_masuk`, `no_hp`, `status`, `photo`) VALUES
('24060120130081', 'arjuna wkwk', 'Semarang', 'Semarang', 'Jawa Tengah', '2020', 1, '083190285384', 1, 'Arjuna.jpg'),
('37696212433851', 'arjuna', 'Semarang', 'Semarang', 'Jawa Tengah', '2020', 1, '083190285384', 1, ''),
('37986762891616', 'Maya Nurul Nikmah', 'Semarang', 'Semarang', 'Jawa Tengah', '2020', 1, '083190285384', 1, NULL),
('38453655478742', 'arjuna', 'Semarang', 'Semarang', 'Jawa Tengah', '2020', 1, '083190285384', 1, NULL),
('54168673982174', 'Arjuna Wahyu Kusuma', 'Rusunawa', 'Kabupaten Semarang', 'Jawa Tengah', '2020', 1, '083190285384', 1, ''),
('66684216705997', 'Arjuna Wahyu Kusuma', 'Semarang', 'Kabupaten Semarang', 'Jawa Tengah', '2020', 1, '083190285384', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `operator_prodi`
--

CREATE TABLE `operator_prodi` (
  `id_operator_prodi` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(2) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `id_operator_prodi` varchar(20) DEFAULT NULL,
  `id_department` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `type`, `nim`, `nip`, `id_operator_prodi`, `id_department`) VALUES
(1, 'mahasiswa@gmail.com', 'mahasiswa', '$2y$10$V5JvKkzete7px0t5DuNGJeTyhHbOzYuqJNJT0VFdSUiYgCwNmZYfq', 1, '24060120130081', NULL, NULL, NULL),
(2, 'dosen@gmail.com', 'dosen', '$2y$10$tLi9LbBwCNAqi47TPojtW.hv6DOfB58ehb6a5bcmM8rJ2rPbi1anC', 2, NULL, '11111111111111', NULL, NULL),
(3, 'operatorprodi@gmail.com', 'operator prodi', '$2y$10$U0.OqYVU4wpOdklZGdpUHu95ug91D4zHpatX.xJfB0OvacxMbF/KG', 3, NULL, NULL, '11111111111111', NULL),
(4, 'department@gmail.com', 'department', '$2y$10$DA4X6tYvEgr7frPxGzAMGeuMflUSvMwmKHLsCjofVGxydJhHwOJ1.', 4, NULL, NULL, NULL, '11111111111111'),
(5, 'mahasiswa2@gmail.com', 'arjuna', '$2y$10$u8GcXdklaPN.1s/MbB88b.7fAoCRi3Du3cIuOWkPAlYdC96SxE.cS', 1, '54168673982174', NULL, NULL, NULL),
(6, '', '', '$2y$10$.BJvK6xguBYpa.ZD2V/d9O0cSmm72Yb2nPOqTBqj61Rv09cREwQlC', 1, '99868413142277', NULL, NULL, NULL),
(7, 'mahasiswa3@gmail.com', 'arjuna', '$2y$10$XaKHQqgySom74J2SUcnO8.d7sDjJkHiM0IWsQilaXELOG406AMKHq', 1, '23081811542976', NULL, NULL, NULL),
(8, 'mahasiswa4@gmail.com', 'arjuna', '$2y$10$IhDvEKbWTiP/pZIRJT8ESelHiUc8Z5rksAf4ceIZQ2MAl8DRc64P2', 1, '66684216705997', NULL, NULL, NULL),
(9, 'dosen2@gmail.com', '', '$2y$10$4Mm5/HF6iCAZNoikrOMeseFG3LwuFWbzC7FSdlB3oNpeBcafb9JJ.', 2, NULL, '18652419944263', NULL, NULL),
(10, 'mahasiswa5@gmail.com', 'arjuna', '$2y$10$sziRbJIpebP10OVGq.S.h.Jqv/zHhFFjxK/QHjwVXUsasnIN1pbBi', 1, '38453655478742', NULL, NULL, NULL),
(11, 'mahasiswa6@gmail.com', 'arjuna', '$2y$10$kCo83njq438Yc9LkDYTFcuoX9.exnVlscJMLmDHjTE1qJN6qJEUS6', 1, '37696212433851', NULL, NULL, NULL),
(12, 'mahasiswa7@gmail.com', 'maya', '$2y$10$62R0sJBH0ttPgWEFCOO0T.0sXkJsXpz70Xx4CZ4/7QFPp28vsolCC', 1, '37986762891616', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `dosen_wali`
--
ALTER TABLE `dosen_wali`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `operator_prodi`
--
ALTER TABLE `operator_prodi`
  ADD PRIMARY KEY (`id_operator_prodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
