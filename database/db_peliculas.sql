-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 04:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peliculas`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL COMMENT 'id',
  `sex_id` int(11) DEFAULT NULL COMMENT 'Sexo',
  `act_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Apellidos y nombre de los actores';

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `sex_id`, `act_nombre`, `updated_at`, `created_at`) VALUES
(3, 3, 'chris pratt', '2022-06-05 19:01:39', '2022-06-05 19:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `actor_pelicula`
--

CREATE TABLE `actor_pelicula` (
  `id` int(11) NOT NULL COMMENT 'id',
  `act_id` int(11) DEFAULT NULL COMMENT 'Actor',
  `pel_id` int(11) DEFAULT NULL COMMENT 'Película',
  `apl_papel` varchar(60) NOT NULL COMMENT 'Papel',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro de Papel en la Pelicula Actor Principal-&#';

--
-- Dumping data for table `actor_pelicula`
--

INSERT INTO `actor_pelicula` (`id`, `act_id`, `pel_id`, `apl_papel`, `updated_at`, `created_at`) VALUES
(2, 3, 1, 'Protagonista', '2022-06-05 19:07:41', '2022-06-05 19:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `alquiler`
--

CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL COMMENT 'id',
  `soc_id` int(11) DEFAULT NULL COMMENT 'Socio',
  `pel_id` int(11) DEFAULT NULL COMMENT 'Película',
  `alq_fecha_desde` date NOT NULL COMMENT 'Fecha Inicial',
  `alq_fecha_hasta` date NOT NULL COMMENT 'Fecha Final',
  `alq_valor` decimal(10,2) NOT NULL COMMENT 'Valor',
  `alq_fecha_entrega` date DEFAULT NULL COMMENT 'Fecha Entrega',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de Alquiler de la Pelicula al Socio';

--
-- Dumping data for table `alquiler`
--

INSERT INTO `alquiler` (`id`, `soc_id`, `pel_id`, `alq_fecha_desde`, `alq_fecha_hasta`, `alq_valor`, `alq_fecha_entrega`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2022-05-06', '2022-05-29', '2.50', '2022-05-25', '2022-06-05 19:06:57', '2022-06-05 19:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `dir_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Nombre del director de la pelicula';

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `dir_nombre`, `updated_at`, `created_at`) VALUES
(1, 'Martin Scorsese', '2022-06-05 19:03:16', '2022-06-05 19:03:16'),
(2, 'Steven Spielberg', '2022-06-05 19:03:57', '2022-06-05 19:03:57'),
(3, 'Stanley Kubrick', '2022-06-05 19:04:13', '2022-06-05 19:04:13');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formato`
--

CREATE TABLE `formato` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `for_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CD DVD VHS';

--
-- Dumping data for table `formato`
--

INSERT INTO `formato` (`id`, `for_nombre`, `updated_at`, `created_at`) VALUES
(1, 'mp4', '2022-06-05 18:52:10', '2022-06-05 18:52:10'),
(2, 'mov', '2022-06-05 18:52:33', '2022-06-05 18:52:33'),
(3, 'avi', '2022-06-05 18:52:47', '2022-06-05 18:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `gen_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Romantica Comico Ciencia Ficcion Deportes';

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id`, `gen_nombre`, `updated_at`, `created_at`) VALUES
(1, 'Terror', '2022-06-05 19:02:23', '2022-06-05 19:02:23'),
(2, 'Accion', '2022-06-05 19:02:29', '2022-06-05 19:02:29'),
(3, 'Fantasia', '2022-06-05 19:02:42', '2022-06-05 19:02:42');

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
(6, '2022_06_03_170905_create_sessions_table', 1);

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
-- Table structure for table `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `gen_id` int(11) DEFAULT NULL COMMENT 'Genero',
  `dir_id` int(11) DEFAULT NULL COMMENT 'Director',
  `for_id` int(11) DEFAULT NULL COMMENT 'Formato',
  `pel_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `pel_costo` decimal(10,2) NOT NULL COMMENT 'Costo',
  `pel_fecha_estreno` date DEFAULT NULL COMMENT 'Fecha Estreno',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de Identificación de la Película';

--
-- Dumping data for table `pelicula`
--

INSERT INTO `pelicula` (`id`, `gen_id`, `dir_id`, `for_id`, `pel_nombre`, `pel_costo`, `pel_fecha_estreno`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 1, 'Shark', '2.50', '1975-05-20', '2022-06-05 19:05:51', '2022-06-05 19:05:51');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cHsghPAIUOpJw7TQqR22K9yvnnTHu8jVizPWD2Tl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWFdjQmZCcVVKMTBxdGRBeGVKeUE4NmROV0hSelNVa0JtODh3ejhVaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1654431503),
('gCK4jkndvCpm26JLOKkMvtPj4zSEv63Ex9r2vuNO', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV1MxbWZveXNZSW9ZUmdwcmsxOGp1NlBoZmVGdmp1NDE1R1QxNzVtYSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGVsaWN1bGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTY1NDQzNjE4OTt9fQ==', 1654438073),
('LurwexYE6oS2Z6r4ZxQZMAWme2SsW7Rp0SqzUijx', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOFRIaHhyTUdQZkxpNkNIa0JubUl6TndpNWNPZXp0N0lKeDNwWEdadyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWN0b3JfcGVsaWN1bGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTY1NDQzMjEwNjt9fQ==', 1654433295);

-- --------------------------------------------------------

--
-- Table structure for table `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL COMMENT 'id',
  `sex_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maculino Femenino';

--
-- Dumping data for table `sexo`
--

INSERT INTO `sexo` (`id`, `sex_nombre`, `updated_at`, `created_at`) VALUES
(3, 'Masculino', '2022-06-05 18:48:33', '2022-06-05 18:48:33'),
(4, 'Femenino', '2022-06-05 18:49:05', '2022-06-05 13:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `socio`
--

CREATE TABLE `socio` (
  `id` int(11) NOT NULL COMMENT 'id',
  `soc_cedula` char(10) NOT NULL COMMENT 'Cédula',
  `soc_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `soc_direccion` varchar(60) NOT NULL COMMENT 'Dirección',
  `soc_telefono` char(10) NOT NULL COMMENT 'Teléfono',
  `soc_correo` varchar(60) NOT NULL COMMENT 'Correo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socio`
--

INSERT INTO `socio` (`id`, `soc_cedula`, `soc_nombre`, `soc_direccion`, `soc_telefono`, `soc_correo`, `updated_at`, `created_at`) VALUES
(1, '1753699808', 'Elias Telleria', 'Quito', '0995794733', 'telleriaelias@gmail.com', '2022-06-05 08:11:57', '2022-06-05 08:11:57');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'Elias Telleria', 'telleriaelias@gmail.com', NULL, '$2y$10$9al0VILAXib2XmIXQVASb.SNJQJ6eC3D0/adzYsjaBEhHWMI5vae.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-05 08:03:24', '2022-06-05 08:03:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_SEXO_ACTOR` (`sex_id`);

--
-- Indexes for table `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_ACTOR_actor_pelicula` (`act_id`),
  ADD KEY `Fn_PELICULA_actor_pelicula` (`pel_id`);

--
-- Indexes for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_PELICULA_ALQUILER` (`pel_id`),
  ADD KEY `Fn_SOCIO_ALQUILER` (`soc_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
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
-- Indexes for table `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_DIRECTOR_PELICULA` (`dir_id`),
  ADD KEY `Fn_FORMATO_PELICULA` (`for_id`),
  ADD KEY `Fn_GENERO_PELICULA` (`gen_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socio`
--
ALTER TABLE `socio`
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
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formato`
--
ALTER TABLE `formato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socio`
--
ALTER TABLE `socio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `Fn_SEXO_ACTOR` FOREIGN KEY (`sex_id`) REFERENCES `sexo` (`id`);

--
-- Constraints for table `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  ADD CONSTRAINT `Fn_ACTOR_actor_pelicula` FOREIGN KEY (`act_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `Fn_PELICULA_actor_pelicula` FOREIGN KEY (`pel_id`) REFERENCES `pelicula` (`id`);

--
-- Constraints for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `Fn_PELICULA_ALQUILER` FOREIGN KEY (`pel_id`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `Fn_SOCIO_ALQUILER` FOREIGN KEY (`soc_id`) REFERENCES `socio` (`id`);

--
-- Constraints for table `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `Fn_DIRECTOR_PELICULA` FOREIGN KEY (`dir_id`) REFERENCES `director` (`id`),
  ADD CONSTRAINT `Fn_FORMATO_PELICULA` FOREIGN KEY (`for_id`) REFERENCES `formato` (`id`),
  ADD CONSTRAINT `Fn_GENERO_PELICULA` FOREIGN KEY (`gen_id`) REFERENCES `genero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
