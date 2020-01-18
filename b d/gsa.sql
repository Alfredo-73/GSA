-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2020 a las 21:54:32
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capataz`
--

CREATE TABLE `capataz` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `capataz`
--

INSERT INTO `capataz` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Anto T', '2020-01-12 23:08:20', '2020-01-14 18:18:13'),
(2, 'Paco T', '2020-01-12 23:08:34', '2020-01-16 01:18:10'),
(3, 'Simba', '2020-01-12 23:08:54', '2020-01-12 23:08:54'),
(5, 'Nico', '2020-01-13 01:04:02', '2020-01-13 02:24:44'),
(6, 'Pepa', '2020-01-13 01:11:02', '2020-01-13 02:24:23'),
(7, 'Dolores', '2020-01-13 01:12:05', '2020-01-13 02:23:54'),
(8, 'Alfredo S', '2020-01-13 03:27:33', '2020-01-13 03:27:33'),
(9, 'Dolo', '2020-01-14 16:20:52', '2020-01-14 16:20:52'),
(10, 'Soledad', '2020-01-14 18:17:40', '2020-01-16 18:53:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `cuit`, `created_at`, `updated_at`) VALUES
(1, 'Anton Torres', 27213288658, '2020-01-12 23:05:08', '2020-01-16 21:16:29'),
(2, 'Paco Torres', 12345678910, '2020-01-12 23:05:41', '2020-01-12 23:05:41'),
(3, 'Simba Torres', 12345678901, '2020-01-12 23:06:42', '2020-01-12 23:06:42'),
(4, 'Antonieta Torres', 122222223, '2020-01-13 03:23:15', '2020-01-13 03:23:15'),
(6, 'Poppy', 123456789, '2020-01-14 16:34:26', '2020-01-14 16:34:26'),
(7, 'Carlos T Bugeau', 123, '2020-01-14 16:38:43', '2020-01-16 21:08:41'),
(8, 'Paquito', 12234, '2020-01-14 18:00:36', '2020-01-14 18:00:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` int(10) UNSIGNED NOT NULL,
  `quincena_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_quincena` int(11) NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `num_factura` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `retencion` decimal(10,2) NOT NULL,
  `monto_cobrado` decimal(10,2) NOT NULL,
  `gasto_bancario` decimal(10,2) NOT NULL,
  `libre_dispon` decimal(10,2) NOT NULL,
  `pago_personal` decimal(10,2) NOT NULL,
  `pago_transporte` decimal(10,2) NOT NULL,
  `toneladas` decimal(10,2) NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id`, `quincena_id`, `nombre_quincena`, `id_cliente`, `num_factura`, `importe`, `retencion`, `monto_cobrado`, `gasto_bancario`, `libre_dispon`, `pago_personal`, `pago_transporte`, `toneladas`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 15, 15, 8, 1200, '100.00', '12.00', '100.00', '20.00', '68.00', '30.00', '40.00', '120.00', 'primera alta', '2020-01-12 23:12:47', '2020-01-18 22:19:58'),
(2, 9, 9, 6, 13000, '1000.00', '12.00', '23.00', '30.00', '958.00', '20.00', '100.00', '100.00', 'segunda', '2020-01-12 23:13:52', '2020-01-18 22:21:14'),
(3, 4, 4, 3, 1, '1000.00', '12.00', '900.00', '100.00', '888.00', '200.00', '100.00', '120.00', 'con select quincenas', '2020-01-13 01:53:47', '2020-01-18 22:20:40'),
(4, 2, 2, 2, 1, '1.00', '1.00', '1.00', '1.00', '-1.00', '1.00', '1.00', '1.00', 'prueba funciona 1', '2020-01-16 21:22:13', '2020-01-18 23:29:11'),
(5, 4, 4, 7, 1010, '10.00', '10.00', '10.00', '10.00', '-10.00', '10.00', '10.00', '1.00', 'PRUEBA NUEVO', '2020-01-18 19:35:02', '2020-01-18 22:05:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosecha`
--

CREATE TABLE `cosecha` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_capataz` int(10) UNSIGNED NOT NULL,
  `jornales` int(11) NOT NULL,
  `cosecheros` int(11) NOT NULL,
  `bines` int(11) NOT NULL,
  `maletas` int(11) NOT NULL,
  `toneladas` decimal(10,2) NOT NULL,
  `prom_kg_bin` decimal(10,2) NOT NULL,
  `supervisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cosecha`
--

INSERT INTO `cosecha` (`id`, `id_cliente`, `fecha`, `id_capataz`, `jornales`, `cosecheros`, `bines`, `maletas`, `toneladas`, `prom_kg_bin`, `supervisor`, `created_at`, `updated_at`) VALUES
(1, 7, '2020-01-12', 6, 2, 2, 2, 2, '2.00', '2.00', 'yo', '2020-01-12 23:17:20', '2020-01-18 23:33:29'),
(2, 4, '2020-01-11', 7, 1, 1, 1, 1, '1.00', '1.00', '1', '2020-01-12 23:18:16', '2020-01-18 23:28:02'),
(3, 2, '2020-01-13', 6, 12, 78, 7, 90, '100.00', '12.00', 'xx', '2020-01-14 18:21:49', '2020-01-18 19:23:49'),
(4, 7, '2020-01-16', 1, 2, 2, 3, 4, '6.00', '8.00', 'ss', '2020-01-16 21:20:29', '2020-01-16 21:20:29'),
(5, 4, '2020-01-16', 2, 1, 1, 1, 1, '1.00', '1.00', '1', '2020-01-16 21:37:24', '2020-01-16 21:37:24'),
(6, 4, '2020-01-17', 5, 2, 2, 2, 2, '2.00', '2.00', '2', '2020-01-16 21:39:06', '2020-01-16 21:39:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2020_01_04_225730_crear_tabla_cliente', 1),
(19, '2020_01_04_225830_crear_tabla_capataz', 1),
(20, '2020_01_04_225859_crear_tabla_cosecha', 1),
(21, '2020_01_04_225916_crear_tabla_control', 1),
(22, '2020_01_08_175228_crear_fk_control', 1),
(23, '2020_01_12_202351_crear_tabla_quincena', 2),
(24, '2020_01_12_204105_crear_fk_idquincena', 3),
(25, '2020_01_12_212541_borrar_campo_quincena', 3),
(26, '2020_01_13_115420_fk_quincena', 4),
(27, '2020_01_13_120610_fk_quincena_otra', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quincena`
--

CREATE TABLE `quincena` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `quincena`
--

INSERT INTO `quincena` (`id`, `created_at`, `updated_at`, `nombre`) VALUES
(1, NULL, '2020-01-13 00:55:30', 'primera enero 2020'),
(2, NULL, '2020-01-13 00:55:50', 'segunda enero 2020'),
(3, '2020-01-13 01:14:16', '2020-01-13 01:14:16', 'Primera Febrero 2020'),
(4, '2020-01-13 01:14:47', '2020-01-13 01:14:47', 'Segunda Febrero 2020'),
(5, '2020-01-13 01:17:29', '2020-01-13 01:17:29', 'Primera Marzo 2020'),
(6, '2020-01-13 01:18:47', '2020-01-13 01:18:47', 'Primera Abril 2020'),
(7, '2020-01-13 01:19:45', '2020-01-13 01:19:45', 'Segunda Abril 2020'),
(8, '2020-01-13 01:20:15', '2020-01-13 01:20:15', 'Primera Mayo 2020'),
(9, '2020-01-13 01:20:34', '2020-01-13 01:20:34', 'Segunda Mayo 2020'),
(13, '2020-01-14 15:58:42', '2020-01-14 15:58:42', 'Segunda Marzo 2020'),
(14, '2020-01-14 15:59:29', '2020-01-14 15:59:29', 'Primera Junio 2020'),
(15, '2020-01-14 16:15:16', '2020-01-14 16:15:16', 'Segunda Junio 2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Antonieta', 'atorresgolf@gmail.com', NULL, '$2y$10$Ve4/MbgAUwEDA5RyDtjuUulYRSQnEeNNIALxiSt2X3xIPzumQlDLC', NULL, '2020-01-11 15:29:23', '2020-01-11 15:29:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capataz`
--
ALTER TABLE `capataz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `capataz_nombre_unique` (`nombre`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cliente_nombre_unique` (`nombre`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_id_cliente_foreign` (`id_cliente`),
  ADD KEY `control_quincena_id_foreign` (`quincena_id`);

--
-- Indices de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cosecha_id_cliente_foreign` (`id_cliente`),
  ADD KEY `cosecha_id_capataz_foreign` (`id_capataz`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `quincena`
--
ALTER TABLE `quincena`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quincena_nombre_unique` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capataz`
--
ALTER TABLE `capataz`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `quincena`
--
ALTER TABLE `quincena`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `control_quincena_id_foreign` FOREIGN KEY (`quincena_id`) REFERENCES `quincena` (`id`);

--
-- Filtros para la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD CONSTRAINT `cosecha_id_capataz_foreign` FOREIGN KEY (`id_capataz`) REFERENCES `capataz` (`id`),
  ADD CONSTRAINT `cosecha_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
