-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 02:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alkestron`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_path`, `created_at`, `updated_at`) VALUES
(8, 'assets/banner/0o1G3R5zSlURfdwQV6Wr6znqdm9q5lcbCYnjJsaN.jpg', '2021-05-12 08:41:30', '2021-05-12 08:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Logitek', '2021-03-03 00:51:42', '2021-03-03 00:51:42'),
(2, 'rex', '2021-03-03 00:51:42', '2021-03-03 00:51:42'),
(3, 'Test', '2021-05-27 03:52:46', '2021-05-27 03:52:46'),
(4, 'Alkest', '2021-06-04 12:55:04', '2021-06-04 12:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_index` int(11) NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `password`, `alamat`, `provinsi`, `prov_index`, `kota`, `kode_pos`, `no_telp`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Guest', 'Guest@gmail.com', 'Guest', 'Guest', 'Bali', 1, '', '', 'Guest', '', '2021-03-14 17:16:20', '2021-03-14 17:16:20'),
(6, 'Muhammad Ilham Kusumawardhana', 'Kawekaweha123@gmail.com', '$2y$08$F8zp.AaIpj6nzWm84BsQzeZGmbCHi4w.ZJE72JtMYB3J9qX8wZyzW', 'Perumahan Bumi Anggrek Blok Q 112', 'Jawa Barat', 9, 'Kabupaten Bekasi', '123456', '087876897003', '$2y$10$JkvMvc7men55LtZbbGrqIOwug8p5mdjlAHJvG1Qo.z4Vk1MszX46e', '2021-03-30 06:06:44', '2021-06-02 17:49:10'),
(7, 'kawekaweha', 'asdkalsjdlka@gmail.com', '$2y$08$yrlzpX6BdPTdf4nW0hKK0.UvBQSYSAiF46ftG7sRaF7ELTvk.5DC6', 'Belum Ada Alamat', '-', 0, '-', '-', 'Belum ada No Telpon', '$2y$10$T4AEh5hI2fYgU5TEr6v.AO2.tCH6ukOrqS0anJif9E/qjL/AzrVkm', '2021-03-30 07:12:28', '2021-03-30 07:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_produk` bigint(20) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `tanggal_mulai` timestamp NOT NULL,
  `tanggal_selesai` timestamp NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_produk`, `diskon`, `harga_awal`, `harga_diskon`, `tanggal_mulai`, `tanggal_selesai`, `status`, `created_at`, `updated_at`) VALUES
(3, 50, 200000, 100000, '2023-02-16 06:37:00', '2023-02-16 06:40:00', 'SELESAI', '2023-02-16 06:36:50', '2023-02-16 06:40:00'),
(4, 20, 30000, 24000, '2021-06-04 06:23:00', '2021-06-04 06:25:00', 'SELESAI', '2021-06-04 06:24:25', '2021-06-04 06:25:00'),
(5, 50, 500000, 250000, '2023-02-16 06:00:00', '2023-02-16 06:05:00', 'SELESAI', '2023-02-16 05:59:01', '2023-02-16 06:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kursi Roda', '2021-03-07 15:47:35', '2021-03-07 15:47:35'),
(2, 'Swab', '2021-03-07 15:47:35', '2021-03-07 15:47:35'),
(3, 'Masker', '2021-05-27 02:37:27', '2021-05-27 02:37:27'),
(4, 'Stetoskop', '2021-05-27 02:38:57', '2021-05-27 02:38:57'),
(5, 'Lancet', '2021-05-27 02:40:01', '2021-05-27 02:40:01'),
(6, 'Masker', '2021-06-04 12:53:51', '2021-06-04 12:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_23_074135_product', 1),
(7, '2021_02_23_083426_transaction', 1),
(8, '2021_02_23_083437_transaction_detail', 1),
(9, '2021_02_23_083449_product_galleries', 1),
(10, '2021_02_23_083506_admins', 1),
(11, '2021_02_23_083522_customers', 1),
(12, '2021_02_23_103315_create_sessions_table', 1),
(13, '2021_02_27_115400_jenis', 2),
(14, '2021_02_27_120126_brand', 2),
(15, '2021_03_03_013126_satuan', 3),
(16, '2021_03_03_013356_pengaturan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_minimal` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `stok_minimal`, `pajak`, `created_at`, `updated_at`) VALUES
(1, 5, 10, '2021-03-07 15:36:03', '2021-03-16 05:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `satuan` bigint(20) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `kode`, `nama`, `slug`, `jenis_id`, `harga`, `stok`, `berat`, `satuan`, `deskripsi`, `brand`, `created_at`, `updated_at`) VALUES
(3, 'SWAP-123', 'Swab PCR', 'swab-pcr', 2, 200000, 106, 200, 2, 'ini aadalah swap', 2, '2021-03-12 07:11:00', '2023-02-15 22:47:25'),
(4, 'Pippet-123', 'Pippert', 'pippert', 2, 30000, 65, 200, 2, 'It is a long established fact that a reader will be distracted by the readable content of a ', 1, '2021-04-01 09:44:52', '2023-02-16 06:39:22'),
(5, 'STSTKOP-1234', 'Stetoskop A', 'stetoskop-a', 4, 500000, 97, 100, 2, 'ini stetoskop', 1, '2021-05-27 02:42:14', '2021-06-15 02:07:34'),
(6, 'LNCT-1234', 'Lancet A', 'lancet-a', 5, 20000, 82, 80, 2, 'Ini Adalah Lancet ', 3, '2021-06-04 04:27:07', '2023-02-15 22:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `photo_url`, `created_at`, `updated_at`) VALUES
(3, 3, 'assets/produk/U6bi4pf7PQFvQXvySVJZKafOr1P6UfATeGFdVjXl.jpg', '2021-03-12 07:11:03', '2021-03-12 07:11:03'),
(4, 4, 'assets/produk/TNf7Y6SftHdKYTwmWDCbPiohLhvXZw7EDCU9SL4D.jpg', '2021-03-13 05:29:48', '2021-03-13 05:29:48'),
(13, 4, 'assets/produk/5rgVR7spVIp0tpJbib4a2OjwjTiCqqvyZk2mF8Z3.jpg', '2021-04-01 09:47:28', '2021-04-01 09:47:28'),
(14, 5, 'assets/produk/zjfXwpTBhkBkyD7xUioxOIizSsqLEnkzNmfnnN1l.jpg', '2021-05-27 02:42:15', '2021-05-27 02:42:15'),
(15, 6, 'assets/produk/vrTDL4jyVdOwMbdOvWDDUhcZJKgyEud0FtLyXFAC.jpg', '2021-06-04 04:27:07', '2021-06-04 04:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Box', '2021-03-07 15:46:43', '2021-03-07 15:46:43'),
(2, 'Buah', '2021-03-07 15:47:20', '2021-03-07 15:47:24'),
(3, 'Strip', '2021-06-04 12:54:17', '2021-06-04 12:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EOHXDBOm7jVZ6z1DOFN52Hmumk6VMt9R54vMtjo0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 OPR/95.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQkpjYjE1VFUzUUtIdWg5TW9Bc3M2UEx0a1ZBVHB3WWMwenpldWc1TSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5cWVOenJlNjVmYTZIS282VDRjMEFlU0tGejhuNS5KN1B2bHQvLzI2SHdxTUdjNUw5S0ZJTyI7fQ==', 1678601983);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `transaksi_total` int(11) NOT NULL,
  `transaksi_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `uuid`, `customer_id`, `nama`, `no_telpon`, `alamat`, `kode_pos`, `admin_id`, `ongkir`, `pajak`, `transaksi_total`, `transaksi_status`, `tags`, `resi_kirim`, `created_at`, `updated_at`) VALUES
(39, 'TRX-78202-51419', 6, 'Muhammad Ilham Kusumawardhana', '087876897004', 'Bekasi', '12345', 1, 32000, 200000, 2232000, 'SUKSES', 'online', '', '2021-05-16 16:16:14', '2021-05-19 12:40:36'),
(41, 'TRX-48077-38277', 6, 'Muhammad Ilham Kusumawardhana', '087876897004', 'Bekasi', '3030', 1, 31000, 40000, 471000, 'SUKSES', 'online', 'resi-jne-123', '2021-04-17 18:10:45', '2021-05-19 12:15:41'),
(42, 'TRX-69058-76944', 6, 'Muhammad Ilham Kusumawardhana', '087876897004', 'Bekasi', '12345', 1, 36000, 20000, 256000, 'SUKSES', 'online', '123', '2021-05-18 11:52:51', '2021-05-19 12:12:50'),
(52, 'TRX-37774-75995', 6, 'kawe', '087876897004', 'Perumahan Bumi Anggrek', '12345', 1, 2000, 2000, 80000, 'GAGAL', 'online', '', '2021-05-18 12:21:14', '2021-06-14 15:52:31'),
(53, 'TRX-50716-71869', 6, 'Muhammad Ilham Kusumawardhana', '087876897004', 'Bekasi', '12345', 1, 19000, 66000, 745000, 'SUKSES', 'online', '', '2021-05-27 03:49:58', '2021-06-14 18:26:42'),
(54, 'TRX-68712-52629', 6, 'Muhammad Ilham Kusumawardhana', '087876897004', 'Bekasi', '1234', 1, 36000, 148000, 1664000, 'GAGAL', 'online', '', '2021-05-31 17:36:36', '2021-06-15 01:20:11'),
(55, 'TRX-48525-22074', 6, 'Muhammad Ilham Kusumawardhana', '087876897004', 'Bekasi', '1234', 1, 36000, 148000, 1664000, 'GAGAL', 'online', '', '2021-05-31 17:48:20', '2021-06-15 01:22:00'),
(56, 'TRX-83914-83838', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 2, 29', '123456', 1, 36000, 156000, 1752000, 'SUKSES', 'online', '', '2021-06-03 03:10:29', '2021-06-03 03:10:54'),
(57, 'TRX-91976-60450', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 9, 54', '123456', 1, 9000, 210000, 2319000, 'GAGAL', 'online', '', '2021-06-04 06:57:26', '2021-06-15 02:07:24'),
(58, 'TRX-65112-89611', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 9, 109', '123456', 1, 10000, 210000, 2320000, 'GAGAL', 'online', '', '2021-06-04 07:34:20', '2021-06-15 02:07:34'),
(59, 'TRX-17211-43210', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, ,', '123456', 1, 0, -40000, -440000, 'PENDING', 'online', '', '2021-06-04 09:53:28', '2021-06-04 09:53:28'),
(60, 'TRX-35839-86015', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, ,', '123456', 1, 0, 52000, 572000, 'PENDING', 'online', '', '2021-06-11 11:07:21', '2021-06-11 11:07:21'),
(61, 'TRX-47698-12946', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, ,', '123456', 1, 0, 52000, 572000, 'PENDING', 'online', '', '2021-06-11 11:08:46', '2021-06-11 11:08:46'),
(62, 'TRX-15693-39481', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, ,', '123456', 1, 0, 52000, 572000, 'PENDING', 'online', '', '2021-06-11 11:13:24', '2021-06-11 11:13:24'),
(63, 'TRX-76007-85142', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 6, 152', '123456', 1, 8000, 50000, 558000, 'PENDING', 'online', '', '2021-06-14 16:09:07', '2021-06-14 16:09:07'),
(64, 'TRX-16765-17894', 6, 'kawe', '087876897004', 'Perumahan Bumi Anggrek', '12345', 1, 2000, 2000, 80000, 'PENDING', 'online', '', '2021-06-14 16:55:50', '2021-06-14 16:55:50'),
(65, 'TRX-73601-96670', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 6, 153', '123456', 1, 8000, 20000, 228000, 'PENDING', 'online', '', '2022-11-05 07:53:30', '2022-11-05 07:53:30'),
(66, 'TRX-67807-64084', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 6, 153', '123456', 1, 8000, 60000, 668000, 'PENDING', 'online', '', '2022-11-05 07:53:54', '2022-11-05 07:53:54'),
(67, 'TRX-67495-53853', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 5, 135', '123456', 1, 19000, 18000, 217000, 'PENDING', 'online', '', '2023-02-15 22:39:08', '2023-02-15 22:39:08'),
(68, 'TRX-56061-34236', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 11, 222', '123456', 1, 20000, 20000, 240000, 'PENDING', 'online', '', '2023-02-15 22:46:20', '2023-02-15 22:46:20'),
(69, 'TRX-15478-38782', 6, 'kawe', '087876897004', 'Perumahan Bumi Anggrek', '12345', 1, 2000, 2000, 80000, 'PENDING', 'online', '', '2023-02-15 22:47:25', '2023-02-15 22:47:25'),
(70, 'TRX-60578-78236', 6, 'Muhammad Ilham Kusumawardhana', '087876897003', 'Perumahan Bumi Anggrek Blok Q 112, 10, 163', '123456', 1, 38000, 24000, 302000, 'PENDING', 'online', '', '2023-02-16 06:39:22', '2023-02-16 06:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `transaction_id`, `qty`, `product_id`, `created_at`, `updated_at`) VALUES
(48, 39, 10, 3, '2021-05-16 16:16:14', '2021-05-16 16:16:14'),
(49, 40, 2, 3, '2021-05-17 17:51:42', '2021-05-17 17:51:42'),
(50, 40, 1, 4, '2021-05-17 17:51:42', '2021-05-17 17:51:42'),
(51, 41, 2, 3, '2021-05-17 18:10:45', '2021-05-17 18:10:45'),
(52, 42, 1, 3, '2021-05-18 11:52:51', '2021-05-18 11:52:51'),
(53, 43, 2, 3, '2021-05-18 11:53:18', '2021-05-18 11:53:18'),
(54, 43, 1, 4, '2021-05-18 11:53:18', '2021-05-18 11:53:18'),
(55, 44, 1, 3, '2021-05-18 11:55:43', '2021-05-18 11:55:43'),
(56, 45, 2, 3, '2021-05-18 11:55:59', '2021-05-18 11:55:59'),
(57, 45, 1, 4, '2021-05-18 11:55:59', '2021-05-18 11:55:59'),
(58, 46, 2, 3, '2021-05-18 11:57:08', '2021-05-18 11:57:08'),
(59, 46, 1, 4, '2021-05-18 11:57:08', '2021-05-18 11:57:08'),
(60, 47, 2, 3, '2021-05-18 12:05:21', '2021-05-18 12:05:21'),
(61, 47, 1, 4, '2021-05-18 12:05:21', '2021-05-18 12:05:21'),
(62, 48, 2, 3, '2021-05-18 12:06:43', '2021-05-18 12:06:43'),
(63, 48, 1, 4, '2021-05-18 12:06:43', '2021-05-18 12:06:43'),
(64, 49, 2, 3, '2021-05-18 12:09:17', '2021-05-18 12:09:17'),
(65, 49, 1, 4, '2021-05-18 12:09:17', '2021-05-18 12:09:17'),
(66, 50, 2, 3, '2021-05-18 12:15:48', '2021-05-18 12:15:48'),
(67, 50, 1, 4, '2021-05-18 12:15:48', '2021-05-18 12:15:48'),
(68, 51, 2, 3, '2021-05-18 12:17:38', '2021-05-18 12:17:38'),
(69, 51, 1, 4, '2021-05-18 12:17:38', '2021-05-18 12:17:38'),
(70, 52, 2, 3, '2021-05-18 12:21:14', '2021-05-18 12:21:14'),
(71, 52, 1, 4, '2021-05-18 12:21:14', '2021-05-18 12:21:14'),
(72, 53, 1, 5, '2021-05-27 03:49:58', '2021-05-27 03:49:58'),
(73, 53, 1, 3, '2021-05-27 03:49:58', '2021-05-27 03:49:58'),
(74, 54, 2, 5, '2021-05-31 17:36:36', '2021-05-31 17:36:36'),
(75, 54, 3, 3, '2021-05-31 17:36:36', '2021-05-31 17:36:36'),
(76, 55, 2, 5, '2021-05-31 17:48:20', '2021-05-31 17:48:20'),
(77, 55, 3, 3, '2021-05-31 17:48:20', '2021-05-31 17:48:20'),
(78, 56, 3, 5, '2021-06-03 03:10:29', '2021-06-03 03:10:29'),
(79, 56, 2, 4, '2021-06-03 03:10:29', '2021-06-03 03:10:29'),
(80, 57, 4, 5, '2021-06-04 06:57:26', '2021-06-04 06:57:26'),
(81, 57, 5, 6, '2021-06-04 06:57:26', '2021-06-04 06:57:26'),
(82, 58, 4, 5, '2021-06-04 07:34:20', '2021-06-04 07:34:20'),
(83, 58, 5, 6, '2021-06-04 07:34:20', '2021-06-04 07:34:20'),
(84, 59, -1, 5, '2021-06-04 09:53:28', '2021-06-04 09:53:28'),
(85, 59, 5, 6, '2021-06-04 09:53:28', '2021-06-04 09:53:28'),
(86, 60, 1, 5, '2021-06-11 11:07:21', '2021-06-11 11:07:21'),
(87, 60, 1, 6, '2021-06-11 11:07:21', '2021-06-11 11:07:21'),
(88, 61, 1, 5, '2021-06-11 11:08:46', '2021-06-11 11:08:46'),
(89, 61, 1, 6, '2021-06-11 11:08:46', '2021-06-11 11:08:46'),
(90, 62, 1, 5, '2021-06-11 11:13:24', '2021-06-11 11:13:24'),
(91, 62, 1, 6, '2021-06-11 11:13:24', '2021-06-11 11:13:24'),
(92, 63, 1, 5, '2021-06-14 16:09:07', '2021-06-14 16:09:07'),
(93, 64, 2, 3, '2021-06-14 16:55:50', '2021-06-14 16:55:50'),
(94, 64, 1, 4, '2021-06-14 16:55:50', '2021-06-14 16:55:50'),
(95, 65, 1, 3, '2022-11-05 07:53:30', '2022-11-05 07:53:30'),
(96, 66, 3, 3, '2022-11-05 07:53:54', '2022-11-05 07:53:54'),
(97, 67, 6, 4, '2023-02-15 22:39:08', '2023-02-15 22:39:08'),
(98, 68, 10, 6, '2023-02-15 22:46:20', '2023-02-15 22:46:20'),
(99, 69, 2, 3, '2023-02-15 22:47:25', '2023-02-15 22:47:25'),
(100, 69, 1, 4, '2023-02-15 22:47:25', '2023-02-15 22:47:25'),
(101, 70, 8, 4, '2023-02-16 06:39:22', '2023-02-16 06:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'Admin@alkestron.com', NULL, '$2y$10$9qeNzre65fa6HKo6T4c0AeSKFz8n5.J7Pvlt//26HwqMGc5L9KFIO', NULL, NULL, NULL, NULL, NULL, '2021-04-30 01:53:10', '2021-04-30 01:53:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis` (`jenis_id`),
  ADD KEY `satuan` (`satuan`,`brand`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
