-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-05-2016 a las 06:50:18
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
-- Estructura de tabla para la tabla `comentarios-codigos`
--

CREATE TABLE `comentarios-codigos` (
  `id` bigint(80) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `codigo_id` bigint(20) NOT NULL,
  `comentario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios-codigos`
--

INSERT INTO `comentarios-codigos` (`id`, `user_id`, `codigo_id`, `comentario`) VALUES
(16, 8, 5, 'Sencillo :D'),
(17, 11, 6, 'buen código :)'),
(18, 8, 6, 'Buenisimo'),
(19, 8, 7, 'Esta genial, muy práctico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privacy` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `type`, `privacy`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'Team Ubu', 'Soporte', NULL, 8, '2016-05-13 00:49:45', NULL),
(4, 'equipo1', 'poo', NULL, 11, '2016-05-13 13:35:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_members`
--

CREATE TABLE `groups_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `groups_members`
--

INSERT INTO `groups_members` (`id`, `group_id`, `member_id`, `added_at`) VALUES
(1, 3, 8, '2016-05-13 00:49:45'),
(2, 3, 10, '2016-05-13 03:09:08'),
(3, 3, 11, '2016-05-13 03:09:08'),
(4, 3, 15, '2016-05-13 03:09:18'),
(5, 4, 11, '2016-05-13 13:35:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos-notas`
--

CREATE TABLE `grupos-notas` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nota` varchar(50) NOT NULL,
  `grupo_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos-notas`
--

INSERT INTO `grupos-notas` (`id`, `user_id`, `nota`, `grupo_id`) VALUES
(3, 8, 'Estoy apurado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos-posts`
--

CREATE TABLE `grupos-posts` (
  `id` bigint(50) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `texto` varchar(500) NOT NULL,
  `grupo_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos-posts`
--

INSERT INTO `grupos-posts` (`id`, `user_id`, `texto`, `grupo_id`) VALUES
(1, 8, 'A trabajar!', 3),
(2, 8, 'Notas?', 3),
(3, 11, 'hola equipo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `interaction_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`interaction_id`, `post_id`, `user_id`) VALUES
(41, 49, 8),
(42, 50, 11);

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
-- Estructura de tabla para la tabla `post-codigos`
--

CREATE TABLE `post-codigos` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `codigo` text NOT NULL,
  `sintaxis` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `grupo_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `post-codigos`
--

INSERT INTO `post-codigos` (`id`, `user_id`, `codigo`, `sintaxis`, `titulo`, `grupo_id`) VALUES
(1, 8, '#include &ltstdio.h>\n#include &ltstdlib.h>\n\nint main(void)\n{\n  printf("Hola mundo");\n  system("PAUSE");     \n  return 0;\n}', 'c', 'Hola mundo en C', NULL),
(2, 8, 'var a = 1\nvar b = 2\n\nconsole.log(a+b)', 'javascript', 'Suma de dos numeros en Js', NULL),
(3, 8, '$numero1 = 1;\n$numero2 = 2;\n\necho $numero1 + $numero2;', 'php', 'Suma de numeros en PHP', NULL),
(5, 8, 'var a  = 3\nvar b = 100\n\nalert(a*b)', 'javascript', 'Multiplicacion de dos numeros en Js', NULL),
(6, 11, 'console.log("hola mundo")', 'javascript', 'ejemplo js', NULL),
(7, 8, 'var a = 1\nvar b = 2\nconsole.log(a+b)', 'javascript', 'Suma de dos numeros', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mencion` bigint(20) DEFAULT '0',
  `likes` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `text`, `mencion`, `likes`, `created_at`, `updated_at`) VALUES
(48, 8, 'Hoy es un dia pesado', 8, 0, '2016-05-13 04:59:44', NULL),
(49, 8, 'Ese mi alda', 11, 1, '2016-05-13 05:06:49', NULL),
(50, 11, 'hola mundo', 11, 1, '2016-05-13 13:29:01', NULL);

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
(8, 13, 10),
(9, 15, 11),
(10, 8, 11),
(11, 8, 13),
(12, 8, 10),
(13, 11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user-data`
--

CREATE TABLE `user-data` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `profile_picture` varchar(5000) NOT NULL DEFAULT 'users-data/profile-pictures/defaultpicture.jpg',
  `profile_cover` varchar(5000) DEFAULT 'users-data/profile-cover/defaultcover.jpg',
  `Twitter` varchar(5000) DEFAULT NULL,
  `Youtube` varchar(500) DEFAULT NULL,
  `Facebook` varchar(500) DEFAULT NULL,
  `fav-language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user-data`
--

INSERT INTO `user-data` (`id`, `user_id`, `profile_picture`, `profile_cover`, `Twitter`, `Youtube`, `Facebook`, `fav-language`) VALUES
(2, 8, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', 'https://twitter.com/GoGaryi', 'https://www.youtube.com/user/GaryiNmore', 'https://www.facebook.com/GayGaryi', 'PHP'),
(5, 10, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(6, 11, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(7, 12, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(8, 13, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(9, 14, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(10, 15, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(11, 16, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(13, 17, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(14, 18, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(15, 19, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(16, 20, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(17, 21, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL);

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
(13, 'Alex', 'alex@hotmail.com', '534b44a19bf18d20b71ecc4eb77c572f', NULL, NULL, NULL),
(15, 'Miguel Mtz', 'miguel_mtz2121@hotmail.com', '3714cc6e9d3193e4f4535ab76ab9d1b6', NULL, NULL, NULL),
(16, 'Rene Castillo', 'rene@hotmail.com', '93de1a7f9a00f8823ac377738b66236b', NULL, NULL, NULL),
(17, 'Cesar', 'cesar@hotmail.com', '6f597c1ddab467f7bf5498aad1b41899', NULL, NULL, NULL),
(18, 'Rene Elizondo', 'rene@gmail.com', '93de1a7f9a00f8823ac377738b66236b', NULL, NULL, NULL),
(20, 'Francisco Torres', 'torres@hotmail.com', 'b50ac41ec20631c7b6be72f070d8ff67', NULL, NULL, NULL),
(21, '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios-codigos`
--
ALTER TABLE `comentarios-codigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups_members`
--
ALTER TABLE `groups_members`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos-notas`
--
ALTER TABLE `grupos-notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos-posts`
--
ALTER TABLE `grupos-posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`interaction_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `post-codigos`
--
ALTER TABLE `post-codigos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `comentarios-codigos`
--
ALTER TABLE `comentarios-codigos`
  MODIFY `id` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `groups_members`
--
ALTER TABLE `groups_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grupos-notas`
--
ALTER TABLE `grupos-notas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `grupos-posts`
--
ALTER TABLE `grupos-posts`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `interaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `post-codigos`
--
ALTER TABLE `post-codigos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `suscribciones`
--
ALTER TABLE `suscribciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `user-data`
--
ALTER TABLE `user-data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
