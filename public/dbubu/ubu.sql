-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2016 a las 21:31:43
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ubu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_29_211015_create_profiles_table', 1),
('2016_03_29_220312_create_posts_table', 1),
('2016_03_29_225832_create_groups_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mencion` bigint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `text`, `mencion`, `created_at`, `updated_at`) VALUES
(15, 13, 'Madre mia del amor hermoso', 13, '2016-04-17 05:17:44', NULL),
(16, 13, 'Qué Honduras con tus verduras que tienes a bajas temperaturas?!', 8, '2016-04-17 18:23:52', NULL),
(17, 13, 'Ah raza!', 13, '2016-04-17 19:11:11', NULL),
(19, 13, 'Dio mio que pro', 13, '2016-04-17 19:20:12', NULL),
(20, 13, 'Que narices tio!', 11, '2016-04-17 19:22:44', NULL),
(21, 11, 'Joder macho ! dejame!', 11, '2016-04-17 19:23:36', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscribciones`
--

CREATE TABLE `suscribciones` (
  `id` bigint(20) NOT NULL,
  `suscriptor_id` bigint(20) NOT NULL,
  `suscripcion_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscribciones`
--

INSERT INTO `suscribciones` (`id`, `suscriptor_id`, `suscripcion_id`) VALUES
(1, 13, 8),
(5, 13, 12),
(6, 11, 8),
(7, 13, 11),
(8, 13, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user-data`
--

CREATE TABLE `user-data` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `profile_picture` varchar(5000) NOT NULL DEFAULT 'https://raw.githubusercontent.com/Garyi/UbuSocialNetwork/master/public/users-data/profile-pictures/defaultpicture.png',
  `profile_cover` varchar(5000) DEFAULT NULL,
  `Twitter` varchar(5000) DEFAULT NULL,
  `fav-language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user-data`
--

INSERT INTO `user-data` (`id`, `user_id`, `profile_picture`, `profile_cover`, `Twitter`, `fav-language`) VALUES
(2, 8, 'https://raw.githubusercontent.com/Garyi/UbuSocialNetwork/master/public/users-data/profile-pictures/defaultpicture.png', NULL, NULL, NULL),
(5, 10, 'https://raw.githubusercontent.com/Garyi/UbuSocialNetwork/master/public/users-data/profile-pictures/defaultpicture.png', NULL, NULL, NULL),
(6, 11, 'https://raw.githubusercontent.com/Garyi/UbuSocialNetwork/master/public/users-data/profile-pictures/defaultpicture.png', NULL, NULL, NULL),
(7, 12, 'https://raw.githubusercontent.com/Garyi/UbuSocialNetwork/master/public/users-data/profile-pictures/defaultpicture.png', NULL, NULL, NULL),
(8, 13, 'https://raw.githubusercontent.com/Garyi/UbuSocialNetwork/master/public/users-data/profile-pictures/defaultpicture.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Edgar Arroyo', 'hi.ed@hotmail.com', '4dab03bd0b05b7b5799ef56dd8f26bc4', NULL, NULL, NULL),
(10, 'Eddie Lozano', 'eddie@hotmail.com', 'b67733c3e4ddc0633ddb2531e3a51ec9', NULL, NULL, NULL),
(11, 'Aldair Alvarado', 'alda@hotmail.com', 'f897b8d1e5cc779db28d2cbed3eaf188', NULL, NULL, NULL),
(12, 'Oscar Rangel', 'oscar@hotmail.com', 'f156e7995d521f30e6c59a3d6c75e1e5', NULL, NULL, NULL),
(13, 'Alex', 'alex@hotmail.com', '534b44a19bf18d20b71ecc4eb77c572f', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscribciones`
--
ALTER TABLE `suscribciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user-data`
--
ALTER TABLE `user-data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `suscribciones`
--
ALTER TABLE `suscribciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `user-data`
--
ALTER TABLE `user-data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
