-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 08:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(225) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_buat` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `deskripsi`, `tanggal_buat`, `id_user`) VALUES
(6, 'Black Organization', 'Antagonis utama dalam serial Detective Conan', '2024-10-24', 5),
(7, 'Detective', 'Tokoh protagonis dalam serial Detective Conan', '2024-10-24', 5),
(8, 'Anime', 'Foto tentang anime', '2024-10-24', 6),
(9, 'Pemandangan', 'Sebuah foto pemandangan', '2024-10-24', 6),
(11, 'Anime', 'Segala macam anime', '2024-11-06', 7);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(225) DEFAULT NULL,
  `deskripsi_foto` text DEFAULT NULL,
  `tanggal_unggah` date DEFAULT NULL,
  `lokasi_file` varchar(255) DEFAULT NULL,
  `id_album` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `lokasi_file`, `id_album`, `id_user`) VALUES
(16, 'Edogawa Conan', 'Seorang detective cilik yang menyembunyikan identitas aslinya                                                                ', '2024-11-05', '151420688-Fakta-Conan-Edogawa-4.jpg', 7, 5),
(18, 'Wokka', 'Orang kepercayaan Gin                                          ', '2024-10-24', '985096701-e0c8518c1764a7e9b65f8741ad8a58c6.jpg', 6, 5),
(19, 'Rurouni Kenshin', 'Samurai X', '2024-10-24', '231035006-rurouni-kenshin-reboot-2023-anime.webp', 8, 6),
(20, 'Gin', 'Villain dari organisasi hitam', '2024-10-24', '875521496-thumb-1920-108351.jpg', 6, 5),
(21, 'Hattori Heiji', 'Detektif dari Osaka', '2024-10-24', '654606740-98548b618fa9c3c955959030b1e91eef.jpg', 7, 5),
(22, 'Mountain', 'Gunung dan bulan purnama', '2024-10-24', '1524311994-wallpapersden.com_k-talking-to-the-moon_3840x2160.jpg', 9, 6),
(24, 'Balon', 'Keindahan balon udara', '2024-10-24', '1484662510-walpaper.jpg', 9, 6),
(25, 'Tanjiro', 'Kimetsu no Yaiba', '2024-10-24', '215571481-desktop-wallpaper-anime-demon-slayer-tanjiro-live.jpg', 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `id_komentar` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`id_komentar`, `id_foto`, `id_user`, `isi_komentar`, `tanggal_komentar`) VALUES
(1, 20, 5, 'Dingin Cuy', '2024-10-24'),
(5, 16, 5, 'Edogawa Conan keren', '2024-10-24'),
(6, 18, 6, 'Duo ga ada lawan :)', '2024-10-24'),
(7, 20, 5, 'gin ga ada obat', '2024-10-29'),
(8, 21, 5, 'Dialek Kansai', '2024-11-05'),
(9, 24, 6, 'Beautiful', '2024-11-05'),
(12, 22, 6, 'The Moon is Beautiful', '2024-11-05'),
(16, 16, 5, 'Kebenaran hanya ada satu', '2024-11-05'),
(19, 19, 5, 'Samurai', '2024-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `like_foto`
--

CREATE TABLE `like_foto` (
  `id_like` int(11) NOT NULL,
  `id_foto` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_like` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_foto`
--

INSERT INTO `like_foto` (`id_like`, `id_foto`, `id_user`, `tanggal_like`) VALUES
(28, 19, 5, '2024-10-24'),
(29, 16, 6, '2024-10-24'),
(30, 19, 6, '2024-10-24'),
(31, 20, 6, '2024-10-24'),
(32, 18, 6, '2024-10-24'),
(33, 20, 5, '2024-10-24'),
(34, 22, 6, '2024-10-24'),
(35, 24, 6, '2024-10-24'),
(36, 21, 5, '2024-10-29'),
(40, 16, 5, '2024-11-05'),
(41, 18, 5, '2024-11-05'),
(42, 25, 5, '2024-11-05'),
(43, 24, 5, '2024-11-05'),
(44, 22, 5, '2024-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`) VALUES
(5, 'user1', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'useri', 'Indonesia'),
(6, 'user2', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', 'usera', 'Bandung'),
(7, 'rizz', '202cb962ac59075b964b07152d234b70', 'riz@gmail.com', 'rizz', 'Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_foto` (`id_foto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_foto` (`id_foto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_foto_ibfk_2` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD CONSTRAINT `like_foto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_foto_ibfk_2` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
