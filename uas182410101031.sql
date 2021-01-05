-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 07.17
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobats`
--

CREATE TABLE `berobats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `keluhan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penatalaksanaan` enum('rawat jalan','rawat inap','rujuk','lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berobats`
--

INSERT INTO `berobats` (`id`, `id_pasien`, `id_dokter`, `keluhan`, `diagnosa`, `penatalaksanaan`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 'pusing', 'sakit jiwa', 'lainnya', '2020-12-29', '2020-12-28 22:04:35', '2020-12-28 23:06:22'),
(5, 2, 4, 'deg', 'sakit hati', 'rujuk', '2020-12-28', '2020-12-28 23:04:19', '2020-12-28 23:06:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokters`
--

INSERT INTO `dokters` (`id`, `nama_dokter`, `created_at`, `updated_at`) VALUES
(3, 'Dr. Siti Nur DIana', '2020-12-28 22:01:12', '2020-12-28 23:08:19'),
(4, 'Dr. Nadia Cahya A.md', '2020-12-28 23:03:10', '2020-12-28 23:08:42'),
(5, 'Drg. Resti Erlang', '2020-12-28 23:09:11', '2020-12-28 23:09:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_12_26_191754_create_pasiens_table', 1),
(3, '2020_12_26_191805_create_dokters_table', 1),
(4, '2020_12_26_191814_create_obats_table', 1),
(5, '2020_12_26_191837_create_berobats_table', 1),
(6, '2020_12_26_191856_create_resep_obats_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obats`
--

CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obats`
--

INSERT INTO `obats` (`id`, `nama_obat`, `created_at`, `updated_at`) VALUES
(1, 'bodrex', '2020-12-28 21:46:47', '2020-12-28 22:02:32'),
(2, 'paracetamol', '2020-12-28 22:02:39', '2020-12-28 22:02:39'),
(3, 'paramex', '2020-12-28 22:02:59', '2020-12-28 22:02:59'),
(6, 'amoxilin', '2020-12-28 23:03:44', '2020-12-28 23:03:56'),
(7, 'Bacitracin', '2020-12-28 23:10:12', '2020-12-28 23:10:12'),
(8, 'Cephalexin', '2020-12-28 23:10:49', '2020-12-28 23:10:49'),
(9, 'Dabigatran', '2020-12-28 23:11:40', '2020-12-28 23:11:40'),
(10, 'EM Kapsul', '2020-12-28 23:11:55', '2020-12-28 23:11:55'),
(11, 'Famotidine', '2020-12-28 23:12:08', '2020-12-28 23:12:08'),
(12, 'Ulipristal', '2020-12-28 23:12:23', '2020-12-28 23:12:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama_pasien`, `jenis_kelamin`, `umur`, `created_at`, `updated_at`) VALUES
(2, 'Nadia', 'Wanita', 10, '2020-12-28 22:01:53', '2020-12-28 22:01:53'),
(3, 'Diana', 'Wanita', 17, '2020-12-28 22:02:05', '2020-12-28 23:02:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obats`
--

CREATE TABLE `resep_obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berobat` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `resep_obats`
--

INSERT INTO `resep_obats` (`id`, `id_berobat`, `id_obat`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL),
(7, 5, 1, NULL, NULL),
(8, 5, 3, NULL, NULL),
(9, 5, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Mawar', 'mawar', '$2y$10$2dqrvmKGIuLFMykTtOhrneNe5G0JPDbHf8C0W8YJ54dx8OTqgYGM.', '2020-12-28 21:46:29', '2020-12-28 21:46:29'),
(4, 'nadia cahya', 'nadia21', '$2y$10$AP5/BGTTLsEGfl/yGShpAOjx9YLrfU6S.2JCNZo/In/3UYrtJ5LYq', '2020-12-28 23:01:17', '2020-12-28 23:01:17'),
(5, 'diana nur', 'dindin22', '$2y$10$mL5n8mt8imuXMKsOvqunDOQrqM.TJgIu9C0TzXheZo1R6wyIIYUSK', '2020-12-28 23:01:55', '2020-12-28 23:08:07'),
(6, 'resti erlang', 'restialay', '$2y$10$OZQEq6sFHXDf9IMMwQCJ1eciHZiOlwkTM2BgeiTdpi/fFrNQPtiaC', '2020-12-28 23:07:47', '2020-12-28 23:07:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berobats`
--
ALTER TABLE `berobats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berobats_id_pasien_foreign` (`id_pasien`),
  ADD KEY `berobats_id_dokter_foreign` (`id_dokter`);

--
-- Indeks untuk tabel `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep_obats`
--
ALTER TABLE `resep_obats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resep_obats_id_berobat_foreign` (`id_berobat`),
  ADD KEY `resep_obats_id_obat_foreign` (`id_obat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berobats`
--
ALTER TABLE `berobats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `resep_obats`
--
ALTER TABLE `resep_obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berobats`
--
ALTER TABLE `berobats`
  ADD CONSTRAINT `berobats_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `berobats_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `resep_obats`
--
ALTER TABLE `resep_obats`
  ADD CONSTRAINT `resep_obats_id_berobat_foreign` FOREIGN KEY (`id_berobat`) REFERENCES `berobats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_obats_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
