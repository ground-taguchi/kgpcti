-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2023 年 12 月 28 日 03:38
-- サーバのバージョン： 8.0.32
-- PHP のバージョン: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kgpcti`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `black_lists`
--

CREATE TABLE `black_lists` (
  `id` int NOT NULL,
  `user_info_id` int NOT NULL,
  `comp_id` int NOT NULL,
  `comp_name` varchar(20) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '0',
  `regist_date` datetime NOT NULL,
  `shopID` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=sjis;

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
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

-- --------------------------------------------------------

--
-- テーブルの構造 `point_histories`
--

CREATE TABLE `point_histories` (
  `id` int NOT NULL,
  `user_info_id` int NOT NULL DEFAULT '0',
  `RESERVE_ID` int NOT NULL DEFAULT '0',
  `shopID` int NOT NULL DEFAULT '0',
  `point_hist` varchar(8) NOT NULL DEFAULT '0',
  `comment` text,
  `ROOM_CHARGE` int NOT NULL DEFAULT '0',
  `SERVICE_CHARGE` int NOT NULL DEFAULT '0',
  `regist_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `auth_key` varchar(32) DEFAULT NULL,
  `auth_flg` int NOT NULL DEFAULT '0',
  `auth_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=sjis;

-- --------------------------------------------------------

--
-- テーブルの構造 `reserve_memos`
--

CREATE TABLE `reserve_memos` (
  `id` int UNSIGNED NOT NULL,
  `user_info_id` int NOT NULL,
  `comp_id` int NOT NULL,
  `comp_name` varchar(20) NOT NULL DEFAULT '',
  `start_time` datetime NOT NULL,
  `regist_date` datetime NOT NULL,
  `shopID` int NOT NULL,
  `course_time` int DEFAULT NULL,
  `cancel_flg` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=sjis;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int NOT NULL,
  `user_id` varchar(8) NOT NULL DEFAULT '',
  `passwd` varchar(8) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(20) NOT NULL DEFAULT '',
  `mail_address` varchar(100) DEFAULT NULL,
  `regist_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `point_sum` int NOT NULL DEFAULT '0',
  `comment` text,
  `eden` char(1) NOT NULL DEFAULT '0',
  `crystal` char(1) NOT NULL DEFAULT '0',
  `club` char(1) NOT NULL DEFAULT '0',
  `delete_flg` int NOT NULL DEFAULT '0',
  `delete_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `black_flg` int NOT NULL,
  `black_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=sjis;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `black_lists`
--
ALTER TABLE `black_lists`
  ADD PRIMARY KEY (`user_info_id`,`comp_id`,`shopID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `point_histories`
--
ALTER TABLE `point_histories`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `reserve_memos`
--
ALTER TABLE `reserve_memos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_reserve` (`user_info_id`,`shopID`,`cancel_flg`,`start_time`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- テーブルのインデックス `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `idx_user` (`tel`,`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `point_histories`
--
ALTER TABLE `point_histories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reserve_memos`
--
ALTER TABLE `reserve_memos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
