-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2023 a las 00:53:39
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evaluacion_fci_enrique`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', 'All Abilities', NULL, '*', 0, NULL, NULL, '2023-03-31 03:56:53', '2023-03-31 03:56:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(255) NOT NULL,
  `restricted_to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) DEFAULT NULL,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'App\\Models\\User', NULL, NULL, NULL),
(2, 1, 2, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `communes`
--

CREATE TABLE `communes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `communes`
--

INSERT INTO `communes` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Las Condes\n        ', '', '2023-03-31 03:56:56', '2023-03-31 03:56:56'),
(2, 'Puente Alto\n        ', '', '2023-03-31 03:56:56', '2023-03-31 03:56:56'),
(3, 'La Florida\n        ', '', '2023-03-31 03:56:56', '2023-03-31 03:56:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_files`
--

CREATE TABLE `document_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `commune_id` bigint(20) UNSIGNED NOT NULL,
  `documents` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `document_files`
--

INSERT INTO `document_files` (`id`, `item_id`, `commune_id`, `documents`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Permiso de obras, Permiso de operatividad, Conformación de la sociedad', '2023-03-31 18:50:18', '2023-03-31 18:50:18'),
(2, 1, 1, 'Permiso de manufactura de alimentos, Permiso de autorización Sanitaria', '2023-03-31 18:50:36', '2023-03-31 18:50:36'),
(3, 3, 1, 'Permisos de importación, Patentes legales de productos en venta', '2023-03-31 18:50:56', '2023-03-31 18:50:56'),
(4, 2, 2, 'Permiso de obras, Permiso de manipulación de alimentos, Conformación de la sociedad', '2023-03-31 18:51:18', '2023-03-31 18:51:18'),
(5, 1, 2, 'Permiso de manufactura de alimentos, Permiso de autorización Sanitaria y Cédula de identidad', '2023-03-31 18:51:42', '2023-03-31 18:51:42'),
(6, 3, 2, 'Permisos de importación, Patente de manufactura de proveedores', '2023-03-31 18:51:57', '2023-03-31 18:51:57'),
(7, 2, 3, 'Cédula de identidad, Copia de traslado inicial de mercaderías y manual de buenas prácticas para la comercialización de productos', '2023-03-31 18:52:23', '2023-03-31 18:52:23'),
(8, 1, 3, 'Permiso de manufactura de alimentos, Permiso de autorización Sanitaria y Cédula de identidad', '2023-03-31 18:52:35', '2023-03-31 18:52:35'),
(9, 3, 3, 'Permisos de importación, Patente de manufactura de proveedores y Cédula de identidad', '2023-03-31 18:52:52', '2023-03-31 18:52:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrepreneurships`
--

CREATE TABLE `entrepreneurships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `commune_id` bigint(20) UNSIGNED NOT NULL,
  `document_file_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entrepreneurships`
--

INSERT INTO `entrepreneurships` (`id`, `user_id`, `item_id`, `commune_id`, `document_file_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 5, 'pasteleria dedicada a mi padre', '1', '2023-03-31 19:16:19', '2023-03-31 21:32:55'),
(2, 3, 1, 2, 5, 'reslizacion de pasteles de mi casa', '0', '2023-03-31 21:01:10', '2023-03-31 21:01:10'),
(3, 1, 1, 1, 2, 'sdfsd', '2', '2023-04-01 02:49:00', '2023-04-01 02:49:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pastelería\n        ', '', '2023-03-31 03:56:56', '2023-03-31 03:56:56'),
(2, 'Minimarket\n        ', '', '2023-03-31 03:56:56', '2023-03-31 03:56:56'),
(3, 'Electrónica\n        ', '', '2023-03-31 03:56:56', '2023-03-31 03:56:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_30_151931_create_items_table', 1),
(6, '2023_03_30_151957_create_communes_table', 1),
(7, '2023_03_30_152257_create_document_files_table', 1),
(8, '2023_03_30_152347_create_entrepreneurships_table', 1),
(9, '2023_03_30_160614_create_bouncer_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ability_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT 0,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(1, 1, 1, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', NULL, '2023-03-31 03:56:53', '2023-03-31 03:56:53'),
(2, 'user', 'Usuario', NULL, '2023-03-31 03:56:53', '2023-03-31 03:56:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Enrique Rodriguez', 'enriq_1997@hotmail.com', '2023-03-31 03:56:55', '$2y$10$AXIGn6s.7v4YjQJLWvo3VON2rYqFdhAz3/LuE0iy1pmgxM.R2mH1y', '5Mev2SRScJAXRIxO9pFFI0gHEHgpLU3xVU30ZSqqJj93JB5XHW1vRzHqSnSE', '2023-03-31 03:56:55', '2023-03-31 03:56:55'),
(2, 'Sergio', 'tudela.sergio@gmail.com', '2023-03-31 03:56:55', '$2y$10$KGuv.e/v8Ehhv8b3xGADx.5W1p5QTtVaqgby.IHdF/wAM1bWpmRX.', 'C2hub8CGI2', '2023-03-31 03:56:55', '2023-03-31 03:56:55'),
(3, 'Nuevo 2', 'nuevo2@gmail.com', NULL, '$2y$10$XhbKoAcuSqG21xqNfZ2kqe8ag/y9jjrJ3NJcYnouzlQ0uh4J8IqbG', NULL, '2023-03-31 04:29:55', '2023-03-31 04:29:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indices de la tabla `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indices de la tabla `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `communes_name_unique` (`name`);

--
-- Indices de la tabla `document_files`
--
ALTER TABLE `document_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_files_item_id_foreign` (`item_id`),
  ADD KEY `document_files_commune_id_foreign` (`commune_id`);

--
-- Indices de la tabla `entrepreneurships`
--
ALTER TABLE `entrepreneurships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrepreneurships_user_id_foreign` (`user_id`),
  ADD KEY `entrepreneurships_item_id_foreign` (`item_id`),
  ADD KEY `entrepreneurships_commune_id_foreign` (`commune_id`),
  ADD KEY `entrepreneurships_document_file_id_foreign` (`document_file_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_name_unique` (`name`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

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
-- AUTO_INCREMENT de la tabla `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `communes`
--
ALTER TABLE `communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `document_files`
--
ALTER TABLE `document_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `entrepreneurships`
--
ALTER TABLE `entrepreneurships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `document_files`
--
ALTER TABLE `document_files`
  ADD CONSTRAINT `document_files_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `document_files_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrepreneurships`
--
ALTER TABLE `entrepreneurships`
  ADD CONSTRAINT `entrepreneurships_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrepreneurships_document_file_id_foreign` FOREIGN KEY (`document_file_id`) REFERENCES `document_files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrepreneurships_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrepreneurships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
