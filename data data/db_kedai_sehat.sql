-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2026 at 02:15 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kedai_sehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(10, '2019_08_19_000000_create_failed_jobs_table', 2),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(12, '2025_12_15_082700_create_siswas_table', 3),
(13, '2025_12_15_082933_create_pelanggans_table', 3),
(14, '2025_12_15_083832_create_users_table', 3),
(15, '2025_12_15_084232_create_tahun_ajarans_table', 3),
(16, '2026_01_16_071548_add_remember_token_to_users_table', 4),
(17, '2026_01_16_143616_create_user_sessions_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'kedai-sehat', 'a581bd54fcb627cfadc8c56140e7f0793f6914a912cf02fba2aadfce8d7fd91a', '[\"*\"]', NULL, NULL, '2025-12-15 03:34:03', '2025-12-15 03:34:03'),
(2, 'App\\Models\\User', 4, 'kedai-sehat', '1768665408ecd4c4f7e4646f84f2564ffca1bdeba2c07360bca10c0cb9bb4f7a', '[\"*\"]', NULL, NULL, '2025-12-16 04:42:46', '2025-12-16 04:42:46'),
(3, 'App\\Models\\User', 5, 'kedai-sehat', '334b75a04a1b81c35c272d82cdda37b610b78a9e5c47c15ae58264b3c9375779', '[\"*\"]', NULL, NULL, '2025-12-16 18:56:16', '2025-12-16 18:56:16'),
(4, 'App\\Models\\User', 6, 'kedai-sehat', '34dcc3d14e7f0d3b9822008b8cb81c0cbeb577446bcf8d06d907685cfe7b1216', '[\"*\"]', NULL, NULL, '2025-12-18 23:06:23', '2025-12-18 23:06:23'),
(5, 'App\\Models\\User', 6, 'kedai-sehat', '934cab21229133f53ca147d3e2f192e611648d875434e620c6e35afa5e2eb858', '[\"*\"]', NULL, NULL, '2025-12-18 23:16:29', '2025-12-18 23:16:29'),
(6, 'App\\Models\\User', 1, 'kedai-sehat', 'afcd16dd1e0b16c067432734d7c27d90cc4046b6339f8aa9e927ab80b0839a27', '[\"*\"]', NULL, NULL, '2025-12-18 23:19:59', '2025-12-18 23:19:59'),
(7, 'App\\Models\\User', 7, 'kedai-sehat', 'fe3753d2ebf4debf9463989e2216d5f322e61bf8d42bd0f69be875f846375f83', '[\"*\"]', NULL, NULL, '2025-12-19 01:06:35', '2025-12-19 01:06:35'),
(8, 'App\\Models\\User', 8, 'kedai-sehat', '65f9e5b0057b805ffae5bd7873b1497cfe771853f8209bfaf5196f50acd3b37d', '[\"*\"]', NULL, NULL, '2025-12-19 01:14:10', '2025-12-19 01:14:10'),
(9, 'App\\Models\\User', 6, 'kedai-sehat', 'fe3d91e5e105cc6eb6fb57a62a0481f5ec86ee3d07f9235d5925784d9407acc2', '[\"*\"]', NULL, NULL, '2025-12-22 09:07:05', '2025-12-22 09:07:05'),
(10, 'App\\Models\\User', 9, 'kedai-sehat', 'd9337400143ec98e44d7450fa220dddfaa8d4d1f4040f128b413913cfc6f4007', '[\"*\"]', NULL, NULL, '2025-12-22 09:19:05', '2025-12-22 09:19:05'),
(11, 'App\\Models\\User', 11, 'kedai-sehat', '6e29e7bfd658db6ad67b2eb9dcfa459e3510382463a4f74d25608fa32fde280d', '[\"*\"]', NULL, NULL, '2025-12-22 18:58:13', '2025-12-22 18:58:13'),
(12, 'App\\Models\\User', 6, 'kedai-sehat', '7449fab49967fabc0faeb56c01501888de328ca41d6177324141c8f6e4e76498', '[\"*\"]', NULL, NULL, '2025-12-22 19:16:17', '2025-12-22 19:16:17'),
(13, 'App\\Models\\User', 12, 'kedai-sehat', '8c0506dbe9fb0064819a74bba713797bdac6935a64536ed3bcaf7513c8d296d7', '[\"*\"]', NULL, NULL, '2025-12-22 19:32:55', '2025-12-22 19:32:55'),
(14, 'App\\Models\\User', 13, 'kedai-sehat', 'c3ce390a0c9174aaf2bfa3b2375bd6322b507456ca6526213cc022499d43bbb8', '[\"*\"]', NULL, NULL, '2025-12-22 19:34:13', '2025-12-22 19:34:13'),
(15, 'App\\Models\\User', 14, 'kedai-sehat', 'f6cef9481c9fe424e2491cccbd5e48e5a74fbd9d300d135b29df3b2681fce333', '[\"*\"]', NULL, NULL, '2026-01-15 05:25:14', '2026-01-15 05:25:14'),
(16, 'App\\Models\\User', 6, 'kedai-sehat', '7953dc136f84e078323bc56bd2235930033ef886d8d985d4dfe81dc3a2cc725f', '[\"*\"]', NULL, NULL, '2026-01-15 23:37:50', '2026-01-15 23:37:50'),
(17, 'App\\Models\\User', 15, 'kedai-sehat', '17d1fa9b6e7e52f9806cb2facbbca79a8e42bffa0b53531c25e92280ccbe94c7', '[\"*\"]', NULL, NULL, '2026-01-16 00:01:34', '2026-01-16 00:01:34'),
(18, 'App\\Models\\User', 15, 'kedai-sehat', '8fe586791a2ad679e18969b160eb11bcdc9b0b9a6fce384bb492a15fbb529e1b', '[\"*\"]', NULL, NULL, '2026-01-16 00:03:38', '2026-01-16 00:03:38'),
(19, 'App\\Models\\User', 16, 'kedai-sehat', '3f61a71c0c12e11e6267302eca3a7e592019a5e3f2f27990a56dade749cab318', '[\"*\"]', NULL, NULL, '2026-01-16 00:27:27', '2026-01-16 00:27:27'),
(20, 'App\\Models\\User', 17, 'kedai-sehat', '2a87429c0ea7c2b03bf546a8dbec819d655b91fffd00893f8c8bced5ec741b30', '[\"*\"]', NULL, NULL, '2026-01-16 00:41:09', '2026-01-16 00:41:09'),
(21, 'App\\Models\\User', 18, 'kedai-sehat', 'e492dcf54e926ba0fa83d1b46d2b36217f55b83dc691636720f8c681e9416fa4', '[\"*\"]', NULL, NULL, '2026-01-16 06:19:16', '2026-01-16 06:19:16'),
(22, 'App\\Models\\User', 19, 'kedai-sehat', '53189fffe389c3b387992585b8c6cf61e985ba1121c02b78f3b291c84c550d77', '[\"*\"]', NULL, NULL, '2026-01-16 06:26:17', '2026-01-16 06:26:17'),
(23, 'App\\Models\\User', 20, 'kedai-sehat', 'f189ba0f22db8534949b5dbb13a6b8f5305c2b59e031886c23c54fe0a5f39c67', '[\"*\"]', NULL, NULL, '2026-01-16 06:28:47', '2026-01-16 06:28:47'),
(24, 'App\\Models\\User', 21, 'kedai-sehat', '2ab20d2d311a7818441c8698ebdcc47e8c3dff19483a18192a52cd1d856b7560', '[\"*\"]', NULL, NULL, '2026-01-16 06:51:41', '2026-01-16 06:51:41'),
(25, 'App\\Models\\User', 22, 'kedai-sehat', '39be605701fe7de7ad22cea51316828e703b09b94eede6c3f6a136aeb5cf649e', '[\"*\"]', NULL, NULL, '2026-01-16 06:57:01', '2026-01-16 06:57:01'),
(26, 'App\\Models\\User', 22, 'kedai-sehat', 'e60711a04ad506b4e8649cb779dcdb2a65b9f182c04b4f5f79d2311860683afb', '[\"*\"]', NULL, NULL, '2026-01-16 06:57:26', '2026-01-16 06:57:26'),
(27, 'App\\Models\\User', 23, 'kedai-sehat', 'c69ede239b6fdfed9c3ea454eb839d78effb5fff047e5a1f89a8d49932ccedc2', '[\"*\"]', NULL, NULL, '2026-01-16 06:58:33', '2026-01-16 06:58:33'),
(28, 'App\\Models\\User', 23, 'kedai-sehat', 'af19d132bc00af072a5fed8e0d368b68778965db2d856fb140587a252a9d8d11', '[\"*\"]', NULL, NULL, '2026-01-16 06:58:47', '2026-01-16 06:58:47'),
(29, 'App\\Models\\User', 23, 'kedai-sehat', '2c141b871b0866d3d1d8992f7b09221727027e56c485a91fe5296266628ca131', '[\"*\"]', NULL, NULL, '2026-01-16 06:59:36', '2026-01-16 06:59:36'),
(30, 'App\\Models\\User', 24, 'kedai-sehat', '96486058335d664d1417be98022b2df4f9de58de267150bda148a991b49e6b7e', '[\"*\"]', NULL, NULL, '2026-01-16 07:18:39', '2026-01-16 07:18:39'),
(31, 'App\\Models\\User', 25, 'kedai-sehat', 'c61bce762eb98db0b3645bd2957482963fd62c82d1048f6aa94911cbc8f3974c', '[\"*\"]', NULL, NULL, '2026-01-16 07:19:36', '2026-01-16 07:19:36'),
(32, 'App\\Models\\User', 26, 'kedai-sehat', '2866b3ec6167dd40c879b21eb31079943a5fa25aa91f5cb88a75951cfe733c52', '[\"*\"]', NULL, NULL, '2026-01-16 07:41:02', '2026-01-16 07:41:02'),
(33, 'App\\Models\\User', 27, 'kedai-sehat', 'e51ebc70b1fcdd3ebde1bccfa71afa85d44de4411bf862a42e8ffc405b17922d', '[\"*\"]', NULL, NULL, '2026-01-16 07:47:26', '2026-01-16 07:47:26'),
(34, 'App\\Models\\User', 28, 'kedai-sehat', 'a88434bfbf06aa4b9b9da69bd1d65ea647d0e0600b17968f7033e1c3301a0f47', '[\"*\"]', NULL, NULL, '2026-01-16 08:15:00', '2026-01-16 08:15:00'),
(35, 'App\\Models\\User', 29, 'kedai-sehat', 'd10b594da2e32591a204237fbb06eb695a9f4c93275842c31f9d5f233b6da7e1', '[\"*\"]', NULL, NULL, '2026-01-16 08:23:11', '2026-01-16 08:23:11'),
(36, 'App\\Models\\User', 23, 'kedai-sehat', 'd0cfba21cf788f6e1175175a20cb81f5b65044dfca6a74434a0adf3b3419b71f', '[\"*\"]', NULL, NULL, '2026-01-17 01:19:09', '2026-01-17 01:19:09'),
(37, 'App\\Models\\User', 31, 'kedai-sehat', 'a66eb8b4b033a353149fdc181f182666be8dc8bcaf7c658dc92e86b52f6b9804', '[\"*\"]', NULL, NULL, '2026-01-17 01:49:33', '2026-01-17 01:49:33'),
(38, 'App\\Models\\User', 32, 'kedai-sehat', '0be2b2549c0ee22283e3a70b1c6ee0040d9ac9798bc03f9b8a8df30c655505ec', '[\"*\"]', NULL, NULL, '2026-01-17 02:04:02', '2026-01-17 02:04:02'),
(39, 'App\\Models\\User', 33, 'kedai-sehat', 'a9b8b1ee4a7233f4e50b9bb58396d301dde3e061e532d31f6494dd0e8526ea20', '[\"*\"]', NULL, NULL, '2026-01-17 02:06:49', '2026-01-17 02:06:49'),
(40, 'App\\Models\\User', 34, 'kedai-sehat', '58382ac5b4686935cba94e19fcb259ba3f6d60d7c46408ea9c2e086afce9fe0d', '[\"*\"]', NULL, NULL, '2026-01-17 02:11:18', '2026-01-17 02:11:18'),
(41, 'App\\Models\\User', 35, 'kedai-sehat', 'd0cfec57ccc9e763c0f5613fabbf9e3693a63766c09853c6c1a140a48ddc9d8b', '[\"*\"]', NULL, NULL, '2026-01-17 02:14:14', '2026-01-17 02:14:14'),
(42, 'App\\Models\\User', 39, 'kedai-sehat', 'df82dfdbfdb6962cdced775109eb1d1d6d58bb4ae30f6cbb60f9bc1311124d20', '[\"*\"]', NULL, NULL, '2026-01-18 21:30:54', '2026-01-18 21:30:54'),
(43, 'App\\Models\\User', 42, 'kedai-sehat', 'ac533e02415e846bcc38f2646b6195290588fbcb42bceed272ac23af1f92677f', '[\"*\"]', NULL, NULL, '2026-01-19 05:20:31', '2026-01-19 05:20:31'),
(44, 'App\\Models\\User', 42, 'kedai-sehat', '39385dfa86b7e8062a688c0f03d8dfcd144c69626a3e3dd6b48986025efb1e13', '[\"*\"]', NULL, NULL, '2026-01-19 07:04:38', '2026-01-19 07:04:38'),
(45, 'App\\Models\\User', 37, 'kedai-sehat', '92021d4ed7486cbcc02223ad1a8ed975f48ddf15fb3a2bf3f7e60673c6b6ff09', '[\"*\"]', NULL, NULL, '2026-01-19 07:05:14', '2026-01-19 07:05:14'),
(46, 'App\\Models\\User', 37, 'kedai-sehat', '0f690948a79b6cbd7e2afd6cdbd695270d95802cfb7073c8385075788f8652a1', '[\"*\"]', NULL, NULL, '2026-01-19 07:13:24', '2026-01-19 07:13:24'),
(47, 'App\\Models\\User', 37, 'kedai-sehat', '194ccb718a80812c4fbbb83fdd8a861a966c5a4fac1c949a78e1839f239a28f1', '[\"*\"]', NULL, NULL, '2026-01-19 07:30:50', '2026-01-19 07:30:50'),
(51, 'App\\Models\\User', 37, 'kedai-sehat', '4f69c7347615bcef59502562ae4421c263ec7db2c2913c85779a3de9c5d2fe92', '[\"*\"]', NULL, NULL, '2026-01-22 07:03:56', '2026-01-22 07:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tgl_lahir` date DEFAULT NULL,
  `pin` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas`, `jurusan`, `nama_ibu`, `nama_ayah`, `tempat_lahir`, `tgl_lahir`, `pin`, `gender`, `created_at`, `updated_at`) VALUES
(1, '242501', 'Dadang', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-15 03:22:24', '2025-12-15 03:22:24'),
(2, '242502', 'Juleha', 'XI', 'TKJ', '', '', '', NULL, '', 'P', '2025-12-15 03:22:24', '2025-12-15 03:22:24'),
(3, '242503', 'Ahyeon', 'XI', 'Farmasi', '', '', '', NULL, '', 'P', '2025-12-16 04:40:56', '2025-12-16 04:40:56'),
(4, '2425102842', 'Erlangga', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-16 04:46:40', '2025-12-16 04:46:40'),
(5, '2425102835', 'Agra', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-16 04:46:40', '2025-12-16 04:46:40'),
(6, '2425102855', 'Reval', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-16 04:46:51', '2025-12-16 04:46:51'),
(7, '2425102838', 'Aria', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-19 01:12:52', '2025-12-19 01:12:52'),
(8, '2425102853', 'Rizal', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-22 08:58:14', '2025-12-22 08:58:14'),
(9, '2425102854', 'Fathir', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-22 08:58:15', '2025-12-22 08:58:15'),
(10, '2425102863', 'Zio', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-22 08:58:18', '2025-12-22 08:58:18'),
(11, '2425102856', 'Alfarizky', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2025-12-22 19:27:49', '2025-12-22 19:27:49'),
(12, '2425102862', 'Syifaa', 'XI', 'RPL', '', '', '', NULL, '', 'P', '2025-12-22 19:27:58', '2025-12-22 19:27:58'),
(13, '2425102837', 'Angga', 'XI', 'RPL', '', '', '', NULL, '', 'L', '2026-01-15 05:20:37', '2026-01-15 05:20:37'),
(14, '242566', 'Ahyeon', 'XI', 'RPL', '', '', '', NULL, '', 'P', '2026-01-21 05:21:43', '2026-01-21 05:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_ajaran`
--

CREATE TABLE `tbl_tahun_ajaran` (
  `id_ta` bigint UNSIGNED NOT NULL,
  `kode_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tahun_ajaran`
--

INSERT INTO `tbl_tahun_ajaran` (`id_ta`, `kode_ta`, `tahun_ajaran`, `status`, `created_at`) VALUES
(1, 'TA2425', '2024/2025', 'aktif', '2025-12-15 10:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `login_count` int NOT NULL DEFAULT '0',
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_siswa` bigint UNSIGNED DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `nama_lengkap`, `role`, `foto`, `email`, `remember_token`, `last_login_at`, `login_count`, `no_telepon`, `id_siswa`, `last_login`, `created_at`, `updated_at`) VALUES
(1, '689888', '$2y$12$xhRSVF44MOLIodCStmXrieWCfyO8WiIeTtlMl2V9YD3ruo/lCu53O', 'Administrator', 'admin', NULL, 'admin@kedai.com', NULL, NULL, 0, '08123456789', NULL, NULL, '2025-12-15 03:22:24', '2025-12-15 03:22:24'),
(2, '242501', '$2y$12$75f7QRaepw50Jux.xTsce.P3xlBetW7oeuFvgdggt/FvwREZFCTu.', 'Dadang', 'siswa', NULL, 'dadang@gmail.com', NULL, NULL, 0, NULL, 1, NULL, '2025-12-15 03:23:11', '2025-12-15 03:23:49'),
(3, '242502', '$2y$12$d7n3K3wU04cfha2VbIWU5eRAG8Q8vR9wnPyOF0.0EhDe2mS1rI4GS', 'Juleha', 'siswa', NULL, 'juleg@gmail.com', NULL, NULL, 0, NULL, 2, NULL, '2025-12-15 03:28:43', '2025-12-15 03:28:51'),
(4, '242503', '$2y$12$WD/ofzeNToZskt0gG9paW.JUje8m4ZCzUgS9TwEWQElEGTI/Ei/zu', 'Ahyeon', 'siswa', NULL, 'ahyeon@gmail.com', NULL, NULL, 0, NULL, 3, NULL, '2025-12-16 04:41:05', '2025-12-16 04:42:25'),
(37, '2425102842', '$2y$12$my6nBKSJLgT5RxNFXIbqQeuSZ9cH4BWT8pDp92z72/lG3Desaa3ve', 'Erlangga', 'siswa', NULL, 'erlangga@gmail.com', NULL, '2026-01-22 07:03:56', 5, NULL, 4, NULL, '2026-01-18 21:27:45', '2026-01-22 07:03:56'),
(38, '2425102855', '$2y$12$TmsHBK2zwzgn6vL/83m4Y.Lcqa5EepolL4zqii9eKtoU27y.EACZm', 'Reval', 'siswa', NULL, NULL, NULL, NULL, 0, NULL, 6, NULL, '2026-01-18 21:27:54', '2026-01-18 21:27:54'),
(39, '2425102856', '$2y$12$X1vNBALlnBg9Npakm624teqYBf5GTOqrhuXZUf09jW.VHjbS0z7LG', 'Alfarizky', 'siswa', NULL, 'alfarizky@gmail.com', NULL, '2026-01-18 21:30:54', 1, NULL, 11, NULL, '2026-01-18 21:30:29', '2026-01-18 21:30:54'),
(40, '2425102835', '$2y$12$AEIH67FAPhPgK5fc7YGeFOWi51mJVfYnxxl5ZNykcpbWVmBDO2dLe', 'Agra', 'siswa', NULL, 'agra@gmail.com', NULL, NULL, 0, NULL, 5, NULL, '2026-01-18 21:31:29', '2026-01-22 05:11:19'),
(41, '2425102837', '$2y$12$hmNgv4KPBNhAsM/AtciLCunUdLKX7oy8gnNxNG1L8PCpmNzc11ntG', 'Angga', 'siswa', NULL, NULL, NULL, NULL, 0, NULL, 13, NULL, '2026-01-19 00:31:19', '2026-01-19 00:31:19'),
(42, '2425102862', '$2y$12$YAE76FTSmZMhy49zlkGeluOqmUbYLKaaFh29YYedewdEJV9Zd83tG', 'Syifaa', 'siswa', NULL, 'syifaa@gmail.com', NULL, '2026-01-19 07:04:37', 2, NULL, 12, NULL, '2026-01-19 05:06:43', '2026-01-19 07:04:37'),
(43, '242566', '$2y$12$vq..BAl6hUmXU8KpwODVEuAXCUOOTtqbo3dF1mn9HSamNf7y70OTq', 'Ahyeon', 'admin', NULL, 'ahyeon@gmail.com', NULL, '2026-01-21 05:23:19', 2, NULL, 14, NULL, '2026-01-21 05:22:11', '2026-01-21 05:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sessions`
--

CREATE TABLE `tbl_user_sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `device_fingerprint` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_sessions`
--

INSERT INTO `tbl_user_sessions` (`id`, `user_id`, `device_fingerprint`, `device_name`, `ip_address`, `user_agent`, `remember_token`, `last_activity`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'test123', NULL, '127.0.0.1', 'Test', 'token123', '2026-01-16 14:38:00', '2026-02-15 07:38:00', '2026-01-16 07:38:00', '2026-01-16 07:38:00'),
(2, 26, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'mkpqTgd3dyQAeIiXjvxuCUDLJUZo3IpeAU3x8vegVOlc4z3M3toOM4TMCCzH', '2026-01-16 07:41:02', '2026-02-15 07:41:02', '2026-01-16 07:41:02', '2026-01-16 07:41:02'),
(3, 26, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'mkpqTgd3dyQAeIiXjvxuCUDLJUZo3IpeAU3x8vegVOlc4z3M3toOM4TMCCzH', '2026-01-16 07:41:02', '2026-02-15 07:41:02', '2026-01-16 07:41:02', '2026-01-16 07:41:02'),
(4, 27, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'Dl8EpRZUaFvP03xRr23bf6GOEQOUDHBiC5YlsatVUMPsUq3xztkZ6nqZeBdj', '2026-01-16 07:47:26', '2026-02-15 07:47:26', '2026-01-16 07:47:26', '2026-01-16 07:47:26'),
(5, 27, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'Dl8EpRZUaFvP03xRr23bf6GOEQOUDHBiC5YlsatVUMPsUq3xztkZ6nqZeBdj', '2026-01-16 07:47:27', '2026-02-15 07:47:27', '2026-01-16 07:47:27', '2026-01-16 07:47:27'),
(6, 28, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'vlUmGEQ1kNL4WFrIStlyR620ljmWnldKJXObGoQTIpsqiXNZzRSWwNhniPaz', '2026-01-16 08:15:00', '2026-02-15 08:15:00', '2026-01-16 08:15:00', '2026-01-16 08:15:00'),
(7, 29, '61bfa17c3a56d7cabee8884bed928c5a638e3da59947f57e9289c048b174f95b', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'cdxrivnV47ThMtGLr1iFD5Zz2N2U7nsbdeF0xH6A75oEpPDYINYLn8eqk3RW', '2026-01-16 08:23:11', '2026-02-15 08:23:11', '2026-01-16 08:23:11', '2026-01-16 08:23:11'),
(8, 31, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'LEKbbTNgVYdCZlHwXvrXeAC0Qrwl2Q4nt3XZASddmwjDH8u1MANq7hD8ItZu', '2026-01-17 01:49:33', '2026-02-16 01:49:33', '2026-01-17 01:49:33', '2026-01-17 01:49:33'),
(9, 32, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'mK8UxSUH2A43mdpcicyf9ZGNgcEzlVWHnNWNjn90F8AmZX3XOKTnCbvSjer5', '2026-01-17 02:04:02', '2026-02-16 02:04:02', '2026-01-17 02:04:02', '2026-01-17 02:04:02'),
(10, 33, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '5M5sJHkc6DyOGB7vpeaHMHo3EVJhp9p8lGGupJjk5vtPwR7LktpjtsE9Nphb', '2026-01-17 02:06:49', '2026-02-16 02:06:49', '2026-01-17 02:06:49', '2026-01-17 02:06:49'),
(11, 34, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'B9azCVUo6dZuWy3bYx6OfsUBIdnON1qE2cB24ZLOT42AIWepxoztq9xude9t', '2026-01-17 02:11:18', '2026-02-16 02:11:18', '2026-01-17 02:11:18', '2026-01-17 02:11:18'),
(12, 35, 'b9b74aff41dc2cd83721a98f3e2a03736347913782baa62f039ecb0f544d26d3', 'Windows PC', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '4VhXQs4vPmkcrWEyLXaVufjuMyXDroVjfaigAwwIQ9whJsxi6rIWgnBguce9', '2026-01-17 02:14:14', '2026-02-16 02:14:14', '2026-01-17 02:14:14', '2026-01-17 02:14:14');

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `tbl_pelanggan_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `tbl_siswa_nis_unique` (`nis`);

--
-- Indexes for table `tbl_tahun_ajaran`
--
ALTER TABLE `tbl_tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tbl_users_username_unique` (`username`),
  ADD KEY `tbl_users_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `tbl_user_sessions`
--
ALTER TABLE `tbl_user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_user_sessions_user_id_index` (`user_id`),
  ADD KEY `tbl_user_sessions_device_fingerprint_index` (`device_fingerprint`),
  ADD KEY `tbl_user_sessions_user_id_device_fingerprint_index` (`user_id`,`device_fingerprint`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_tahun_ajaran`
--
ALTER TABLE `tbl_tahun_ajaran`
  MODIFY `id_ta` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_user_sessions`
--
ALTER TABLE `tbl_user_sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `tbl_pelanggan_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
