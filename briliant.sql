-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2022 at 01:02 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `briliant`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `id_user`, `pertanyaan`, `answer`, `correct_answer`) VALUES
(92, '497fb410a45120d5fe792161bbc5b0cf', 'aowjkdoawjdijawidjawij', 'phantom', 'phantom'),
(93, '497fb410a45120d5fe792161bbc5b0cf', 'awdawdawd', 'sdsd', 'sdsd'),
(94, '497fb410a45120d5fe792161bbc5b0cf', 'testawwwadwadaw dawdawda wdaw dawd', 'test', 'test'),
(95, '497fb410a45120d5fe792161bbc5b0cf', 'test', 'test1', 'test1'),
(96, '80daf5951436d4c254ac0d4a1e1f25eb', 'test', 'test1', 'test1'),
(97, '2a69cb7003b3cc9db8815aa205e972fa', 'MEARN Kependekan dari?', 'Gatau', 'Gatau');

-- --------------------------------------------------------

--
-- Table structure for table `bridge`
--

CREATE TABLE `bridge` (
  `id` int(11) NOT NULL,
  `id_bridge` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bridge`
--

INSERT INTO `bridge` (`id`, `id_bridge`, `id_user`) VALUES
(1, '0c92c543f2926df5a3ecc6f2f0856aef', 'a2aa7481a43ca0063f2a1f9d9dd5a208');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_token_tutor` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `status` enum('done','on_progres','undone') DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `id_mapel`, `id_token_tutor`, `start_time`, `end_time`, `status`, `kode`, `score`, `created_at`, `updated_at`) VALUES
(9, 1, '497fb410a45120d5fe792161bbc5b0cf', '08/23/2022 8:35 AM', '08/23/2022 6:35 AM', 'done', 'RIGLPH', 100, '2022-08-23 05:35:18', '2022-08-23 05:35:18'),
(10, 1, '80daf5951436d4c254ac0d4a1e1f25eb', '08/23/2022 7:10 PM', '08/23/2022 8:10 PM', 'done', 'YICKWQ', 100, '2022-08-23 19:10:32', '2022-08-23 19:10:32'),
(11, 1, '2a69cb7003b3cc9db8815aa205e972fa', '08/25/2022 6:18 PM', '08/25/2022 9:18 PM', 'done', 'IUGVKQ', 100, '2022-08-25 18:18:38', '2022-08-25 18:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `pertanyaan`, `jawaban`) VALUES
(2, 'Bagaimana cara mendaftarkan diri menjadi tutor di permata smart?', 'Hallo, Silahkan mendaftarkan diri pada menu daftar tutor, selanjutnya tutor akan dihubungi oleh piha'),
(4, 'Bagaimana sistem paket bimbel di permata smart?', 'Hallo, untuk paket bimbel kami hanya tersedia untuk paket perbulan, yang dilakukan dalam 1 minggu 1'),
(5, 'Bagaimana jadwal bimbel siswa dipermata smart?', 'Hai dear, Jadwal bimbel yang kamu pilih bisa dilihat pada menu jadwal sesuai kelas yang kamu ambil, '),
(6, 'Bagaimana cara mendaftarkan diri menjadi siswa di permata smart?', 'Hallo, Silahkan lakukan pendaftaran pada menu daftar siswa, selanjutnya lakukan registrasi akun dan ');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `bridge_token` varchar(255) DEFAULT NULL,
  `id_token_tutor` varchar(255) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `bridge_token`, `id_token_tutor`, `id_mapel`, `start`, `end`, `created_at`, `updated_at`) VALUES
(14, 'dc9ba65e0b8ebba7c7b35cf9de2d7c80', '497fb410a45120d5fe792161bbc5b0cf', 2, '08/24/2022 8:19 PM', '08/24/2022 11:19 PM', '2022-08-24 20:19:35', '2022-08-24 20:19:35'),
(15, '0c92c543f2926df5a3ecc6f2f0856aef', '2a69cb7003b3cc9db8815aa205e972fa', 2, '08/25/2022 6:19 PM', '08/25/2022 8:19 PM', '2022-08-25 18:19:21', '2022-08-25 18:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `name`) VALUES
(1, 'MTK'),
(2, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `id_mapel`, `pertanyaan`, `pilihan`, `correct_answer`) VALUES
(1, 2, 'Fotosintetis adalah?', 'test,test,test,test1', 'test1'),
(2, 2, 'test', 'test,test,test,test1', 'test1'),
(3, 2, 'test', 'test,test,test,test1', 'test1'),
(15, 1, 'MEARN Kependekan dari?', 'Gatau,Anu,Mungkin,Itu', 'Gatau');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `id_token_siswa` varchar(255) NOT NULL,
  `id_token_tutor` varchar(255) NOT NULL,
  `token_transaksi` varchar(255) NOT NULL,
  `mapel` int(11) NOT NULL,
  `status` enum('pending','verified','unverified','blocked') DEFAULT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT '0',
  `total` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_token_siswa`, `id_token_tutor`, `token_transaksi`, `mapel`, `status`, `is_active`, `receipt`, `discount`, `total`, `created_at`, `updated_at`) VALUES
(2338748, 'd0098a385e2220771a9673d132432b1c', '497fb410a45120d5fe792161bbc5b0cf', '7e8e5e5ef65df9c382c445fc034dfb3d', 2, 'verified', 'active', '1661337796_e9902e59e7ff79d04272.jpg', '0', '250000', '2022-08-24 17:16:56', '2022-08-24 17:16:56'),
(2338749, 'a2aa7481a43ca0063f2a1f9d9dd5a208', '497fb410a45120d5fe792161bbc5b0cf', '37834f419fdbb5383a3fb7e468d4513e', 2, 'unverified', NULL, NULL, '0', '250000', '2022-08-25 15:03:51', '2022-08-25 15:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_token` varchar(255) NOT NULL,
  `bridge_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('admin','siswa','tutor','unset') NOT NULL,
  `is_verified` enum('yes','no','pending') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_token`, `bridge_token`, `email`, `password`, `avatar`, `role`, `is_verified`, `created_at`, `updated_at`) VALUES
(6, '497fb410a45120d5fe792161bbc5b0cf', NULL, 'mohammadrafly19@gmail.com', '$2y$10$hbt2QTEg8IYE3CI.pj9YkuNtPS19r70Vb/k.lyMzJsZrjuwB55hvu', NULL, 'tutor', 'yes', '2022-08-20 17:34:37', '2022-08-20 17:34:37'),
(7, '06018255c41092969971bf8e27e5b7a2', NULL, 'admin@admin.com', '$2a$12$86zn78TfaomKSSZRWqIFferLgatZHxQaoKDhUAlzzky3JybfWDkaS', NULL, 'admin', 'yes', '2022-08-20 19:44:59', '2022-08-20 19:44:59'),
(8, 'e0d5eecb54680628253edc996c3c67e4', NULL, 'mohammadrafly275@gmail.com', '$2y$10$xmhlWIUKMZFWEH0t72dyWuja4CNPhDBlgaLMG0wtauqQptTwzszdK', NULL, 'tutor', 'yes', '2022-08-21 18:35:02', '2022-08-21 18:35:02'),
(9, 'd0098a385e2220771a9673d132432b1c', NULL, 'test@gmail.com', '$2a$12$Ov84gzlEHVxWQToeTRar8OtUe6ZTmx99RmRUz3kVXmUmmpRZJhX4m', NULL, 'siswa', 'yes', '2022-08-22 14:46:56', '2022-08-22 14:46:56'),
(10, '80daf5951436d4c254ac0d4a1e1f25eb', NULL, 'lia@gmail.com', '$2y$10$oq8MqwQufsuTzzZFom0LteQ9bKsKlce9dApRRVuy5UvT3oOtJAjGG', NULL, 'tutor', 'yes', '2022-08-23 17:04:05', '2022-08-23 17:04:05'),
(11, '2a69cb7003b3cc9db8815aa205e972fa', NULL, 'tutor@gmail.com', '$2y$10$yDgzXzQSBWM25PPrrZzcZO9AHeXXjtBj0O2zgx6DpMxLSBRLC9DHG', NULL, 'tutor', 'yes', '2022-08-23 21:02:22', '2022-08-23 21:02:22'),
(12, '0043beb369005bef2ffa69dcab73771a', NULL, 'test@tutor.com', '$2a$12$Ov84gzlEHVxWQToeTRar8OtUe6ZTmx99RmRUz3kVXmUmmpRZJhX4m', NULL, 'tutor', 'no', '2022-08-25 14:41:40', '2022-08-25 14:41:40'),
(13, 'a2aa7481a43ca0063f2a1f9d9dd5a208', '0c92c543f2926df5a3ecc6f2f0856aef', 'siswa@gmail.com', '$2y$10$yEMmPVyWW6pCxg3p606xR.WaXQiKVL44swFfPxUs3nDA2MmJaTXzS', NULL, 'siswa', 'yes', '2022-08-25 14:55:38', '2022-08-25 14:55:38'),
(14, 'e616dbb74cac0eaa3139a9819f215a7c', NULL, 'admin25@admin.com', 'admin', NULL, 'admin', 'yes', '2022-08-25 19:17:42', '2022-08-25 19:17:42'),
(16, '931064710dfa859e6f43b3e41fd05276', NULL, 'test@test', 'test', NULL, 'siswa', 'no', '2022-08-25 19:44:55', '2022-08-25 19:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(11) NOT NULL,
  `id_token_ud` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `address` text,
  `phone_number` varchar(255) DEFAULT NULL,
  `bio` text,
  `dob` varchar(255) DEFAULT NULL,
  `wannabe` enum('tutor','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `id_token_ud`, `name`, `sex`, `address`, `phone_number`, `bio`, `dob`, `wannabe`) VALUES
(7, '497fb410a45120d5fe792161bbc5b0cf', 'Mohammad Rafly', 'laki-laki', 'Malang', '081907861308', 'Saya suka mengajar anak anak', '07/19/2001', 'tutor'),
(8, '06018255c41092969971bf8e27e5b7a2', 'Mohammad Rafly', NULL, 'Malang', '081907861308', 'awdawdawawdawd', '07/19/2001', 'tutor'),
(9, 'e0d5eecb54680628253edc996c3c67e4', 'Mohammad Rafly', 'laki-laki', 'Malang', '081907861308', 'awdawdawawdawd', '07/19/2001', 'siswa'),
(10, 'd0098a385e2220771a9673d132432b1c', 'Mohammad Rafly', 'laki-laki', 'Malang', '081907861308', 'awdawdawawdawd', '07/19/2001', 'siswa'),
(11, '80daf5951436d4c254ac0d4a1e1f25eb', 'Hasanatun Isroliyah', 'perempuan', 'Jember', '085667263564', 'Saya suka mengajar', '06/19/2001', 'tutor'),
(12, '2a69cb7003b3cc9db8815aa205e972fa', 'Kang Tutor', 'laki-laki', 'Malang', '081728377383', 'Saya suka tutoring anak SD, mereka lucu', '06/23/1999', 'tutor'),
(13, '0043beb369005bef2ffa69dcab73771a', NULL, 'laki-laki', 'test', '081907861372', 'awdawdaw', '07/25/2001', 'tutor'),
(14, 'a2aa7481a43ca0063f2a1f9d9dd5a208', 'test', 'laki-laki', 'taweadw', '0817273637772', 'awdawd', '08/24/2022', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail_role_siswa`
--

CREATE TABLE `users_detail_role_siswa` (
  `id` int(11) NOT NULL,
  `id_token_udrs` varchar(255) NOT NULL,
  `nama_orangtua` varchar(255) NOT NULL,
  `nomor_orangtua` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `token_tutor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_detail_role_siswa`
--

INSERT INTO `users_detail_role_siswa` (`id`, `id_token_udrs`, `nama_orangtua`, `nomor_orangtua`, `nama_sekolah`, `tingkat`, `kelas`, `token_tutor`) VALUES
(4, 'd0098a385e2220771a9673d132432b1c', 'Wawan Sofyan', '081667584723', 'SDN 1 KALIMAS', '', '6', NULL),
(5, 'a2aa7481a43ca0063f2a1f9d9dd5a208', 'test', '0819827372723', 'SD LMAO ', '', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_detail_role_tutor`
--

CREATE TABLE `users_detail_role_tutor` (
  `id` int(11) NOT NULL,
  `id_token_udrt` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `is_active` enum('active','inactive') NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `nik` varchar(255) NOT NULL,
  `mapel` int(11) NOT NULL,
  `harga` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_detail_role_tutor`
--

INSERT INTO `users_detail_role_tutor` (`id`, `id_token_udrt`, `profession`, `is_active`, `cv`, `nik`, `mapel`, `harga`) VALUES
(1, '497fb410a45120d5fe792161bbc5b0cf', 'Mahasiswa', 'active', NULL, '35126162362361', 2, '250000'),
(2, '80daf5951436d4c254ac0d4a1e1f25eb', 'Web Developer', 'active', '1661259260_ae94675996ca87bcf06d.pdf', '3516372647637465', 2, '2500000'),
(3, '2a69cb7003b3cc9db8815aa205e972fa', 'DevOps', 'active', '1661264057_d642ca9e5b4e011e697a.pdf', '3516728374657847', 2, '0'),
(4, '0043beb369005bef2ffa69dcab73771a', '', 'active', NULL, '', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bridge`
--
ALTER TABLE `bridge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bridge` (`id_bridge`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_token_tutor` (`id_token_tutor`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bridge_token` (`bridge_token`),
  ADD KEY `id_token_tutor` (`id_token_tutor`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_token_siswa` (`id_token_siswa`),
  ADD KEY `id_token_tutor` (`id_token_tutor`),
  ADD KEY `token_transaksi` (`token_transaksi`),
  ADD KEY `mapel` (`mapel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_token` (`id_token`),
  ADD KEY `bridge_token` (`bridge_token`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_token_ud`);

--
-- Indexes for table `users_detail_role_siswa`
--
ALTER TABLE `users_detail_role_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_token_udrs` (`id_token_udrs`),
  ADD KEY `id_tutor` (`token_tutor`);

--
-- Indexes for table `users_detail_role_tutor`
--
ALTER TABLE `users_detail_role_tutor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_token_udrt` (`id_token_udrt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `bridge`
--
ALTER TABLE `bridge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2338750;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_detail_role_siswa`
--
ALTER TABLE `users_detail_role_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_detail_role_tutor`
--
ALTER TABLE `users_detail_role_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`id_token_tutor`) REFERENCES `users` (`id_token`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_token_tutor`) REFERENCES `users_detail_role_tutor` (`id_token_udrt`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_token_siswa`) REFERENCES `users` (`id_token`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_token_tutor`) REFERENCES `users` (`id_token`);

--
-- Constraints for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD CONSTRAINT `users_detail_ibfk_1` FOREIGN KEY (`id_token_ud`) REFERENCES `users` (`id_token`);

--
-- Constraints for table `users_detail_role_siswa`
--
ALTER TABLE `users_detail_role_siswa`
  ADD CONSTRAINT `users_detail_role_siswa_ibfk_1` FOREIGN KEY (`id_token_udrs`) REFERENCES `users` (`id_token`);

--
-- Constraints for table `users_detail_role_tutor`
--
ALTER TABLE `users_detail_role_tutor`
  ADD CONSTRAINT `users_detail_role_tutor_ibfk_1` FOREIGN KEY (`id_token_udrt`) REFERENCES `users` (`id_token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
