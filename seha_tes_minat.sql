-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2024 at 02:45 PM
-- Server version: 10.4.30-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seha_tes_minat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(10, '2014_10_12_000000_create_users_table', 2),
(11, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2019_08_19_000000_create_failed_jobs_table', 2),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_m_aspek`
--

CREATE TABLE `tb_m_aspek` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `TYPE` int(11) NOT NULL COMMENT '1 : Multiple inteligen, 2: RIASEC'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_m_aspek`
--

INSERT INTO `tb_m_aspek` (`ID`, `NAME`, `TYPE`) VALUES
(2, 'Linguistic-Bahasa', 1),
(3, 'Logical-matematik', 1),
(4, 'Visual-Spatial', 1),
(5, 'Bodily- Kinesthetic', 1),
(6, 'Musical', 1),
(7, 'Interpersonal', 1),
(8, 'Intrapersonal', 1),
(9, 'Naturalistik', 1),
(10, 'REALISTIC', 2),
(11, 'Investigative ', 2),
(12, 'Artistic', 2),
(13, 'SOCIAL', 2),
(14, 'Enterprising', 2),
(15, 'Conventional', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_m_indikator`
--

CREATE TABLE `tb_m_indikator` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(50) NOT NULL,
  `INDIKATOR` text NOT NULL,
  `ASPEK_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_m_indikator`
--

INSERT INTO `tb_m_indikator` (`ID`, `CODE`, `INDIKATOR`, `ASPEK_ID`) VALUES
(1, 'A1', 'Saya sangat suka membaca', 2),
(2, 'A2', 'Saya Menyusun kata-kata dalam pikiran lebih dulu sebelum saya menulis, membaca dan mengatakannya', 2),
(3, 'A3', 'saya lebih mudah mengingat Ketika saya mendengarkan radio atau rekaman percakapan', 2),
(4, 'A4', 'saya menikmati permainan kata-kata, seperti teka-teki silang dan scrabble', 2),
(5, 'A5', 'saya menyukai Pelajaran Bahasa Indonesia, Bahasa inggris, Sejarah dan ilmu sosial.', 2),
(6, 'A6', 'Ketika saya dalam perjalanan, saya suka membaca baliho dan plang (nama toko, penunjuk arah dll)', 2),
(7, 'A7', 'Saya selalu merujuk pada halhal yang pernah saya baca atau dengar dalam percakapan)', 2),
(8, 'A8', 'Teman-teman selalu menanyakan kepada saya arti kata tertentu.', 2),
(9, 'A9', 'Saya suka menulis buku harian, jurnal atau blog', 2),
(10, 'A10', 'Saya suka menyusun kata dan membuat singkatan.', 2),
(11, 'B1', 'Saya bisa lebih mudah dan cepat menghitung angka dalam pikiran saya', 3),
(12, 'B2', 'Saya menyukai Pelajaran matematika dan ilmu pengetahuan alam.', 3),
(13, 'B3', 'Saya menyukai permainan yang menggunakan angka-angka seperti sudoku.', 3),
(14, 'B4', 'Saya menyukai kegiatan eksperimen', 3),
(15, 'B5', 'Saya senang mengamati struktur, pola, rangkaian atau urutan.', 3),
(16, 'B7', 'Saya lebih percaya pada penjelasan secara rasional dan ilmiah.', 3),
(17, 'B8', 'Saya dapat berpikir secara abstrak, jelas dan terkonsep.', 3),
(18, 'B10', 'Saya lebih nyaman Ketika semua hal bisa diukur, dihitung dan dikelompokan.', 3),
(19, 'C1', 'Ketika saya menutup mata saya dapat membayangka sesuatu hal dengan jelas.', 4),
(20, 'C2', 'Saya sangat menyukai warna', 4),
(21, 'C4', 'Saya menyukai puzzle bergambar', 4),
(22, 'C5', 'Saya bisa mengingat mimpi saya dengan jelas', 4),
(23, 'C6', 'Saya dapat menemukan jalan atau arah   yang benar ditempat yang belum familiar', 4),
(24, 'C7', 'Saya senang menggambar atau sketsa', 4),
(25, 'C8', 'Saya dapat membayangkan wujud suatu benda hanya berdasarkan deskripsi benda itu', 4),
(26, 'C9', 'Menggambar bangun ruang atau grafik lebih menyenangkan bagi saya.', 4),
(27, 'C10', 'Saya senang membaca buku, surat kabar, majalah dll yang banyak ilustrasi atau gambar-gambar', 4),
(28, 'D1', 'Saya melakukan minimal satu kegiatan olahraga secara rutin', 5),
(29, 'D2', 'Saya sulit sekali duduk diam untuk waktu yang lama', 5),
(30, 'D5', 'Saya senang menghabiskan waktu luang diluar rumah', 5),
(31, 'D6', 'Saya cenderung sering menggunakan Bahasa tubuh saat mengobrol dengan orang lain.', 5),
(32, 'D7', 'Saya perlu menyentuh atau memegang sebuah objek untuk mengenal lebih lanjut suatu benda.', 5),
(33, 'D9', 'Koordinasi gerak tubuh saya sangat baik', 5),
(34, 'E1', 'Saya memiliki suara yang bagus', 6),
(35, 'E2', 'Saya bisa menebak dan mengenal not lagu begitu mendengar nadanya', 6),
(36, 'E3', 'Saya senang mendengarkan music lewat radio, cd dll.', 6),
(37, 'E4', 'Saya bisa memainkan alat music', 6),
(38, 'E5', 'Hidup saya akan membosankan jika tidak ada music', 6),
(39, 'E6', 'Saya sering bersenandung/ menyanyikan lagu dalam pikiran saya', 6),
(40, 'E7', 'Saya mengetahui dan hafal banyak lagu dan melodinya', 6),
(41, 'E8', 'Jika saya mendengarkan sekali atau duakali sebuah karya music, saya bisa dengan mudah mengulangnya.', 6),
(42, 'E9', 'Saya sering bergumam, bersiul, mengetukan jari atau bernyanyi saat mengerjakan sesuatu.', 6),
(43, 'E10', 'Saya bisa menjaga tempo atau mengenal ketukan saat bermain music', 6),
(44, 'F1', 'Teman sering mencari saya untuk curhat atau minta saran dan masukan.', 7),
(45, 'F2', 'Saya lebih senang olahraga secara tim atau berkelompok', 7),
(46, 'F3', 'Ketika saya punya masalah saya lebih senang meminta tolong kepada teman untuk membantu menemukan penyelesainnya.', 7),
(47, 'F4', 'Saya punya sedikitnya 3 orang sahabat', 7),
(48, 'F5', 'Saya menikmati permainan yang dilakukan berkelompok, seperti monopoli, bermain kartu dan ular tangga', 7),
(49, 'F6', 'Saya senang mengajarkan oranglain tentang hal-hal yang saya ketahui.', 7),
(50, 'F7', 'Saya sering diminta menjadi ketua kelompok.', 7),
(51, 'F8', 'Saya merasa nyaman berada ditengah keramaian.', 7),
(52, 'F9', 'Saya terlibat aktif dlam kegiatan sekolah, lingkungan rumah, komunitas agama, dan komunitas lainnya.', 7),
(53, 'F10', 'Saya lebih suka keluar rumah dan pergi Bersama teman-teman daripada sendiran dirumah saja.', 7),
(54, 'G1', 'Saya sering menghabiskan waktu untuk merenung, meditasi atau berpikir tentang pertanyaan penting dalam hidup', 8),
(55, 'G2', 'Saya senang mengikuti kelas, seminar atau workshop untuk menggali potensi diri dan pengembangan diri.', 8),
(56, 'G3', 'Pendapat dan pandangan saya sering berbeda dengan teman-teman saya.', 8),
(57, 'G4', 'Saya senang melakukan kegiatan yang bisa dilakukan sendirian saja.', 8),
(58, 'G5', 'Saya punya tujuan hidup jelas yang sering saya pikirkan.', 8),
(59, 'G6', 'Saya tahu dan kenal betul apa saja kekuatan dan kelemahan diri saya', 8),
(60, 'G7', 'Saya lebih suka menghabiskan waktu akhir pekan dirumah atau tempat-tempat lain yang jauh dari keramaian.', 8),
(61, 'G8', 'Saya orang yang berkemauan keras dan mandiri.', 8),
(62, 'G9', 'Saya menulis jurnal atau buku harian untuk mencatat semua peristiwa penting dalam hidup saya.', 8),
(63, 'G10', 'Saya sering mempertimbangkan untuk memulai bisnis sendiri atau berwirausaha.', 8),
(64, 'H1', 'Saya lebih senang kegiatan diluar ruangan', 9),
(65, 'H2', 'Pelajaran favorit saya disekolah adalah biologi', 9),
(66, 'H3', 'Saya menyukai kegiatan berkemah, outbomd, berkebun dan mendaki gunung.', 9),
(67, 'H4', 'Saya suka mengelompokkan dan menggolongkan benda, tumbuhan dan Binatang.', 9),
(68, 'H5', 'Saya punya minimal satu Binatang peliharaan dirumah.', 9),
(69, 'H6', 'Saya bisa mengenal ciri-ciri setiap Binatang atau tumbuhan dan mengahafalnya dengan mudah.', 9),
(70, 'H7', 'Saya senang mengamati lingkungan sekitar dan mengingat apa saja yang saya lihat.', 9),
(71, 'H8', 'Saya senang mengoleksi atau mengumpulkan benda-benda seperti kerrang, daun, bunga, serangga atau batu.', 9),
(72, 'H9', 'Saya senang menikmati pemadnangan di gunung dan laut.', 9),
(73, 'H10', 'Saya bisa merasakan dan mengetahui perubahan alam, misalnya perubahan cuaca.', 9),
(74, 'RR1', 'Saya tidak terlalu suka aktivitas sosial seperti mengajar dan menjadi relawan Kesehatan.', 10),
(75, 'RR2', 'Saya suka membuat, memperbaiki, merakit mesin', 10),
(76, 'RR3', 'Saya suka mengoperasikan mesin', 10),
(77, 'RR4', 'Saya suka bekerja diluar ruangan', 10),
(78, 'RR5', 'Saya melakukan sesuatu dengan detail', 10),
(79, 'RR6', 'Saya suka bekerja secara manual', 10),
(80, 'RR7', 'Saya suka bekerja dengan tanaman', 10),
(81, 'RR8', 'Saya suka merawat hewan', 10),
(82, 'RR9', 'Saya senang merancang sesuatu ', 10),
(83, 'RR10', 'Saya mampu mengendarai mobil atau motor', 10),
(84, 'II1', 'Saya suka menemukan dan meneliti ide', 11),
(85, 'II2', 'Saya suka mengamati dan menyelidiki suatu fenomena', 11),
(86, 'II3', 'Saya suka bereksperimen ', 11),
(87, 'II4', 'Saya menyukai suatu hal yang baru', 11),
(88, 'II5', 'Saya suka memecahkan masalah yang sulit', 11),
(89, 'II6', 'Saya selalu berpikir logis ', 11),
(90, 'II7', 'Saya senang mencari Solusi terhadap suatu permasalahan', 11),
(91, 'II8', 'Saya menyukai hal-hal yang bersifat sains', 11),
(92, 'II9', 'Saya kritis terhadap beberapa isu lingkungan dan Kesehatan', 11),
(93, 'II10', 'Saya senang merancang dan merumuskan sesuatu', 11),
(94, 'AA1', 'Saya menyukai sesuatu yang abstrak', 12),
(95, 'AA2', 'Saya senang menonton pertunjukan drama', 12),
(96, 'AA3', 'Saya suka mengekspresikan diri dengan melukis/ bernyanyi', 12),
(97, 'AA4', 'Saya percaya diri untuk tampil didepan umum', 12),
(98, 'AA5', 'Saya memiliki kemampuan seni yang cukup baik', 12),
(99, 'AA6', 'Saya memiliki imajinasi yang cukup tinggi', 12),
(100, 'AA7', 'Saya mampu membuat dan merancang sesuatu', 12),
(101, 'AA8', 'Saya senang melakukan aktivitas kreatif (seni, music,drama, tari dsb)', 12),
(102, 'AA9', 'Saya menghindari aktivitas yang teratur dan berulang', 12),
(103, 'AA10', 'Saya adalah pribadi yang ekspresif, orisinal dan mandiri.', 12),
(104, 'SS1', 'Saya senang mengajar, melatih dan memberi informasi', 13),
(105, 'SS2', 'Saya senang berinteraksi dengan Masyarakat sekitar', 13),
(106, 'SS3', 'Saya tertarik pada isu kemiskinan dan Kesehatan', 13),
(107, 'SS4', 'Saya senang bila mendapat tugas menjadi relawan', 13),
(108, 'SS5', 'Saya memiliki empati yang cukup tinggi pada kesejahteraan Masyarakat', 13),
(109, 'SS6', 'Saya memiliki kemampuan komunikasi yang baik', 13),
(110, 'SS7', 'Saya merasa memiliki jiwa sosial yang baik', 13),
(111, 'SS8', 'Saya merasa senang setelah membantu orang lain', 13),
(112, 'SS9', 'Saya mudah akrab dan berteman dengan orang baru', 13),
(113, 'SS10', 'Saya mudah beradaptasi dengan lingkungan', 13),
(114, 'EE1', 'Saya Senang berinteraksi dengan orang baru', 14),
(115, 'EE2', 'Saya mampu membujuk dan mempengaruhi orang lain untuk melakukan suatu hal', 14),
(116, 'EE3', 'Saya mampu berkomunikasi secara efektif dan menarik', 14),
(117, 'EE4', 'Saya suka memimpin', 14),
(118, 'EE5', 'Saya mampu melihat peluang usaha ', 14),
(119, 'EE6', 'Saya memiliki ambisi yang cukup tinggi', 14),
(120, 'EE7', 'Saya senang berdiskusi soal politik dan bisnis', 14),
(121, 'EE8', 'Saya adalah pribadi yang optimis dan tidak takut menambil resiko', 14),
(122, 'EE9', 'Saya cukup popular disekolah ', 14),
(123, 'EE10', 'Saya adalah pribadi yang tegas dan terstruktur', 14),
(124, 'CC1', 'Saya senang bekerja didalam ruangan', 15),
(125, 'CC2', 'Saya menyukai pekerjaan yang sistematis/ runtut', 15),
(126, 'CC3', 'Saya suka bekerja dengan data atau angka', 15),
(127, 'CC4', 'Saya lebih tertarik pada pekerjaan dengan tujuan yang jelas', 15),
(128, 'CC5', 'Saya adalah pribadi yang terpaku pada aturan/ informasi yang berlaku', 15),
(129, 'CC6', 'Saya mampu mengelola file, sistem dan juga catatan/ berkas-berkas. ', 15),
(130, 'CC7', 'Saya adalah pribadi yang teliti dan detail dalam mengerjakan sesuatu', 15),
(131, 'CC8', 'Saya adalah pribadi yang disiplin dalam segi waktu ', 15),
(132, 'CC9', 'Saya dikenal sebagai orang yang teratur dan praktis', 15),
(133, 'CC10', 'Saya mampu untuk melaksanakan perhitungan ataupun menangani keuangan.', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_m_skor`
--

CREATE TABLE `tb_m_skor` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `CODE` varchar(10) NOT NULL,
  `POINT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_m_skor`
--

INSERT INTO `tb_m_skor` (`ID`, `NAME`, `CODE`, `POINT`) VALUES
(1, 'Sangat Sesuai', 'SS', 4),
(2, 'Sesuai', 'S', 3),
(3, 'Tidak Sesuai', 'TS', 2),
(4, 'Sangat Tidak Sesuai', 'STS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_m_user`
--

CREATE TABLE `tb_m_user` (
  `ID` int(11) NOT NULL,
  `FULL_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` text NOT NULL,
  `ROLE` int(11) NOT NULL COMMENT '1:ADMIN, 2:USER',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_m_user`
--

INSERT INTO `tb_m_user` (`ID`, `FULL_NAME`, `EMAIL`, `PASSWORD`, `ROLE`, `updated_at`, `created_at`) VALUES
(2, 'akbar', 'akbar@gmail.com', '$2y$10$zpNLpwfS2izUUSmhYs9YhuVgoEVa46nsMGdJs7Ctn75inSJxbZcTW', 2, '2024-01-16 06:30:19', '2024-01-16 06:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'akbar', 'akbar@gmail.com', NULL, '$2y$10$q3SuoQAm7j8VdAWdrLZC1./2yzp8JISNQdz3wJoCYNo3HDppWk5Iq', NULL, '2024-01-16 01:10:59', '2024-01-16 01:10:59'),
(2, 'akbar', 'akbar2@gmail.com', NULL, '$2y$10$on/r7kBP5kHeRpC0cC7jH.7n2zm1g7npcpOEb5yDnnDH/L3mWySrG', NULL, '2024-01-16 06:38:20', '2024-01-16 06:38:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_m_aspek`
--
ALTER TABLE `tb_m_aspek`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_m_indikator`
--
ALTER TABLE `tb_m_indikator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_m_skor`
--
ALTER TABLE `tb_m_skor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_m_user`
--
ALTER TABLE `tb_m_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_m_aspek`
--
ALTER TABLE `tb_m_aspek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_m_indikator`
--
ALTER TABLE `tb_m_indikator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tb_m_skor`
--
ALTER TABLE `tb_m_skor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_m_user`
--
ALTER TABLE `tb_m_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
