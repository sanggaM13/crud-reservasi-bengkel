-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2025 pada 02.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekaniks`
--

CREATE TABLE `mekaniks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mekaniks`
--

INSERT INTO `mekaniks` (`id`, `nama`, `keahlian`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'marsisa', 'bubut', '081234567891', '2025-11-26 18:21:09', '2025-11-26 18:21:09'),
(2, 'Bambang', 'Tune Up', '081234111111', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(3, 'Rangga', 'Kelistrikan', '081234111112', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(4, 'Fahmi', 'Ganti Oli', '081234111113', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(5, 'Salim', 'Karburator', '081234111114', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(6, 'Husein', 'Service Ringan', '081234111115', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(7, 'Deni', 'Overhaul', '081234111116', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(8, 'Candra', 'Shockbreaker', '081234111117', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(9, 'Jefry', 'Injeksi', '081234111118', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(10, 'Wawan', 'Transmisi', '081234111119', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(11, 'Erwin', 'Rem & Suspensi', '081234111120', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(12, 'Surya', 'Tune Up', '081234111121', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(13, 'Fikri', 'Body Repair', '081234111122', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(14, 'Roni', 'AC Mobil', '081234111123', '2025-11-27 02:37:29', '2025-11-27 02:37:29'),
(15, 'Anto', 'Ban & Spooring', '081234111124', '2025-11-27 02:37:29', '2025-11-27 02:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_25_215810_create_pelanggans_table', 1),
(5, '2025_11_25_222559_create_mekaniks_table', 1),
(6, '2025_11_25_224601_create_reservasis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Andi', '081200000001', 'Karawang', '2025-11-27 01:00:00', '2025-11-27 01:00:00'),
(2, 'Budi', '081200000002', 'Cikampek', '2025-11-27 01:05:00', '2025-11-27 01:05:00'),
(3, 'Citra', '081200000003', 'Klari', '2025-11-27 01:10:00', '2025-11-27 01:10:00'),
(4, 'Dina', '081200000004', 'Rengasdengklok', '2025-11-27 01:15:00', '2025-11-27 01:15:00'),
(5, 'Eko', '081200000005', 'Purwasari', '2025-11-27 01:20:00', '2025-11-27 01:20:00'),
(6, 'Fajar', '081200000006', 'Telukjambe', '2025-11-27 01:25:00', '2025-11-27 01:25:00'),
(7, 'Gita', '081200000007', 'Majalaya', '2025-11-27 01:30:00', '2025-11-27 01:30:00'),
(8, 'Hendra', '081200000008', 'Tirtajaya', '2025-11-27 01:35:00', '2025-11-27 01:35:00'),
(9, 'Intan', '081200000009', 'Cilebar', '2025-11-27 01:40:00', '2025-11-27 01:40:00'),
(10, 'Joko', '081200000010', 'Jayakerta', '2025-11-27 01:45:00', '2025-11-27 01:45:00'),
(11, 'Kiki', '081200000011', 'Tempuran', '2025-11-27 01:50:00', '2025-11-27 01:50:00'),
(12, 'Bagas Pratama', '081200100012', 'Jl. Mawar No.12', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(13, 'Siti Aisyah', '081200100013', 'Jl. Melati No.13', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(14, 'Roni Saputra', '081200100014', 'Jl. Kenanga No.14', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(15, 'Dewi Lestari', '081200100015', 'Jl. Kamboja No.15', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(16, 'Agus Santoso', '081200100016', 'Jl. Anggrek No.16', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(17, 'Nurhalimah', '081200100017', 'Jl. Dahlia No.17', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(18, 'Yuda Firmansyah', '081200100018', 'Jl. Zamrud No.18', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(19, 'Putri Malikah', '081200100019', 'Jl. Safir No.19', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(20, 'Joko Prabowo', '081200100020', 'Jl. Berlian No.20', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(21, 'Rizky Hidayat', '081200100021', 'Jl. Mawar No.21', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(22, 'Aulia Rahman', '081200100022', 'Jl. Melur No.22', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(23, 'Lina Kartika', '081200100023', 'Jl. Mangga No.23', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(24, 'Dedi Firmansyah', '081200100024', 'Jl. Durian No.24', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(25, 'Salsa Nabila', '081200100025', 'Jl. Jeruk No.25', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(26, 'Fikri Maulana', '081200100026', 'Jl. Apel No.26', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(27, 'Rina Oktaviani', '081200100027', 'Jl. Nanas No.27', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(28, 'Budi Haryanto', '081200100028', 'Jl. Semangka No.28', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(29, 'Sarah Annisa', '081200100029', 'Jl. Pepaya No.29', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(30, 'Gilbert Adrian', '081200100030', 'Jl. Cempaka No.30', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(31, 'Zahra Fitria', '081200100031', 'Jl. Teratai No.31', '2025-11-27 02:37:55', '2025-11-27 02:37:55'),
(32, 'Rahmat Hidayat', '081200100032', 'Jl. Flamboyan No.32', '2025-11-27 02:37:55', '2025-11-27 02:37:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasis`
--

CREATE TABLE `reservasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `mekanik_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keluhan` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservasis`
--

INSERT INTO `reservasis` (`id`, `pelanggan_id`, `mekanik_id`, `tanggal`, `jam`, `keluhan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-11-28', '09:00:00', 'Service ringan', 'pending', '2025-11-27 01:00:00', '2025-11-27 01:00:00'),
(2, 2, 1, '2025-11-28', '09:10:00', 'Ganti oli', 'pending', '2025-11-27 01:05:00', '2025-11-27 01:05:00'),
(3, 3, 2, '2025-11-28', '09:20:00', 'Cek rem', 'pending', '2025-11-27 01:10:00', '2025-11-27 01:10:00'),
(4, 4, 2, '2025-11-28', '09:30:00', 'Mesin panas', 'pending', '2025-11-27 01:15:00', '2025-11-27 01:15:00'),
(5, 5, 3, '2025-11-28', '09:40:00', 'Shockbreaker bunyi', 'pending', '2025-11-27 01:20:00', '2025-11-27 01:20:00'),
(6, 6, 3, '2025-11-28', '09:50:00', 'Kelistrikan tidak stabil', 'pending', '2025-11-27 01:25:00', '2025-11-27 01:25:00'),
(7, 7, 4, '2025-11-28', '10:00:00', 'Ban bocor', 'pending', '2025-11-27 01:30:00', '2025-11-27 01:30:00'),
(8, 8, 4, '2025-11-28', '10:10:00', 'Aki soak', 'pending', '2025-11-27 01:35:00', '2025-11-27 01:35:00'),
(9, 9, 5, '2025-11-28', '10:20:00', 'Karburator kotor', 'pending', '2025-11-27 01:40:00', '2025-11-27 01:40:00'),
(10, 10, 5, '2025-11-28', '10:30:00', 'Injeksi tidak stabil', 'pending', '2025-11-27 01:45:00', '2025-11-27 01:45:00'),
(11, 11, 1, '2025-11-28', '10:40:00', 'Rembesan oli', 'pending', '2025-11-27 01:50:00', '2025-11-27 01:50:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('V0cbZ0uGrSJMRZtLlfnyhzNzSHpBD4iqwWGgMRQt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicElvc0JFTWJJM2NQOXV6YWc1NGV0U2dob2Q0OXk4aUlzcUFHMmdNaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo5OiJkYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1764211080);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mekaniks`
--
ALTER TABLE `mekaniks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasis`
--
ALTER TABLE `reservasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservasis_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `reservasis_mekanik_id_foreign` (`mekanik_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mekaniks`
--
ALTER TABLE `mekaniks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reservasis`
--
ALTER TABLE `reservasis`
  ADD CONSTRAINT `reservasis_mekanik_id_foreign` FOREIGN KEY (`mekanik_id`) REFERENCES `mekaniks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasis_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
