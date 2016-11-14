-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2016 a las 19:54:55
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

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
(19, 8, 7, 'Esta genial, muy práctico'),
(20, 15, 5, 'Muy practico'),
(21, 15, 2, 'cool'),
(22, 15, 9, 'Nice'),
(23, 15, 7, 'cool, hommie'),
(24, 15, 3, 'that''s nice'),
(25, 15, 10, 'yay'),
(26, 15, 6, 'muy simple'),
(27, 15, 6, 'Excelente'),
(28, 23, 11, 'dasds'),
(29, 23, 13, 'comentario'),
(30, 23, 15, 'hola');

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
(4, 'equipo1', 'poo', NULL, 11, '2016-05-13 13:35:52', NULL),
(5, 'GrupoPrueba', 'Probando los grupos', NULL, 23, '2016-10-23 04:22:25', NULL),
(6, 'cruzazul', 'trabajo', NULL, 24, '2016-10-28 15:44:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_members`
--

CREATE TABLE `groups_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `groups_members`
--

INSERT INTO `groups_members` (`id`, `group_id`, `member_id`, `added_at`, `admin`) VALUES
(2, 3, 8, '2016-10-23 04:33:21', 1),
(3, 3, 11, '2016-05-13 03:09:08', 0),
(9, 3, 15, '2016-10-21 04:18:12', 0),
(13, 5, 23, '2016-10-23 04:48:48', 1),
(21, 5, 8, '2016-10-23 04:48:57', 0),
(22, 6, 24, '2016-10-28 15:44:23', 1);

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
(13, 24, 'wwaryghesj-yfku{lf}fg}d\na\ngte\nhtfbSDGJARPGEg', 6);

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
(7, 8, 'A trabajar!', 3),
(8, 8, 'Se entrega pronto!', 3),
(9, 8, 'dasdasdasdasdasda', 3),
(10, 24, 'conquistar al mundo', 6);

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
(42, 50, 11),
(43, 51, 15),
(46, 48, 15),
(48, 48, 15),
(49, 48, 15),
(50, 48, 15),
(51, 49, 15),
(52, 58, 15),
(53, 48, 15),
(54, 50, 15),
(55, 48, 15),
(56, 61, 15),
(58, 50, 15),
(59, 66, 8),
(60, 50, 8),
(61, 52, 8),
(62, 52, 8),
(63, 52, 8),
(64, 52, 8),
(65, 52, 8),
(66, 52, 8),
(67, 52, 8),
(68, 52, 8),
(69, 52, 8),
(70, 52, 8),
(71, 52, 8),
(72, 52, 8),
(73, 52, 8),
(74, 52, 8),
(75, 66, 8),
(76, 66, 8),
(77, 66, 8),
(78, 66, 8),
(79, 66, 8),
(80, 66, 8),
(81, 66, 8),
(82, 66, 8),
(83, 66, 8),
(84, 66, 8),
(85, 66, 8),
(86, 66, 8),
(87, 66, 8),
(88, 66, 8),
(89, 66, 8),
(90, 65, 8),
(91, 65, 8),
(92, 65, 8),
(93, 68, 8),
(94, 77, 8),
(95, 76, 8),
(96, 76, 8),
(97, 75, 8);

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
(7, 8, 'var a = 1\nvar b = 2\nconsole.log(a+b)', 'javascript', 'Suma de dos numeros', 3),
(8, 15, '<?php\n\nnamespace App\\Http\\Controllers;\n\nuse App\\Http\\Controllers\\Controller;\nuse Request;\nuse DB;\n\nclass EditorController extends Controller\n{\n  public function getView($id){\n    session_start();\n    $get_code = DB::table(''post-codigos'')->where(''id'',''='',$id)->get();\n    if($get_code != null){\n      $_SESSION[''code_id''] = $id;\n      return view(''code_view'');\n    }\n  }\n\n  public function getInfo(){\n    session_start();\n    $code_id = $_SESSION[''code_id''];\n    $get_code = DB::table(''post-codigos'')->where(''id'',''='',$code_id)->get();\n    return $get_code;\n  }\n\n  public function post_comment(){\n    session_start();\n    $comentario = Request::input(''comentario'');\n    $post = DB::table(''comentarios-codigos'')\n    ->insert([\n      ''user_id'' => $_SESSION[''uid''],\n      ''codigo_id'' => $_SESSION[''code_id''],\n      ''comentario'' => $comentario,\n    ]);\n\n    return 200;\n  }\n\n  public function get_comments(){\n    session_start();\n    $get_comment = DB::table(''comentarios-codigos'')\n    ->join(''users'',''comentarios-codigos.user_id'',''='',''users.id'')\n    ->join(''user-data'',''users.id'',''='',''user-data.user_id'')\n    ->select(''users.name'',''user-data.profile_picture'',''comentarios-codigos.comentario'',''comentarios-codigos.codigo_id'')\n    ->where(''comentarios-codigos.codigo_id'',''='',$_SESSION[''code_id''])\n    ->orderBy(''comentarios-codigos.id'',''desc'')\n    ->get();\n    return $get_comment;\n  }\n\n  public function related_codes(){\n    session_start();\n    $id_publicador = DB::table(''post-codigos'')->select(''user_id'')\n    ->where(''id'',''='',$_SESSION[''code_id''])->get();\n    $codigos = DB::table(''post-codigos'')->where(''user_id'',''='',$id_publicador[0]->user_id)->get();\n    return $codigos;\n  }\n}', 'php', 'EditorController', NULL),
(9, 15, '<?php\n\nnamespace App\\Http\\Controllers;\n\nuse App\\Http\\Controllers\\Controller;\nuse Request;\nuse DB;\n\nclass FeedController extends Controller\n{\n    public function get_post_follows(){\n      session_start();\n      $follows = DB::table(''suscribciones'')->select(''suscripcion_id'')\n      ->where(''suscriptor_id'',''='',$_SESSION[''uid''])->get();\n      foreach ($follows as $numero => $valor) {\n      $personas[$numero] = $follows[$numero]->suscripcion_id;\n      }\n      $personas[] = $_SESSION[''uid''];\n\n      $getpost = DB::table(''posts'')\n      ->join(''users'',''posts.id_user'',''='',''users.id'')\n      ->join(''user-data'',''users.id'',''='',''user-data.user_id'')\n      ->join(''users as MU'',''posts.mencion'',''='',''MU.id'')\n      ->select(''posts.id_user'',''posts.mencion'',''users.name'',''posts.text'', ''posts.id'',''user-data.profile_picture'',\n        ''MU.name as mname'',''posts.likes'')\n      ->whereIn(''posts.id_user'',$personas)\n      ->orderBy(''posts.created_at'',''desc'')->get();\n\n      return $getpost;\n    }\n\n    public function get_info(){\n      session_start();\n      $profile = $_SESSION[''uid''];\n      $getinfo = DB::table(''users'')\n      ->join(''user-data'',''users.id'',''='',''user-data.user_id'')\n      ->select(''users.name'',''users.id'',''user-data.profile_picture'',\n      ''user-data.profile_cover'',''user-data.Twitter''\n      )->where(''users.id'',''='',$profile)->get();\n       return $getinfo;\n    }\n\n    public function get_codes(){\n      session_start();\n      $follows = DB::table(''suscribciones'')->select(''suscripcion_id'')\n      ->where(''suscriptor_id'',''='',$_SESSION[''uid''])->get();\n      foreach ($follows as $numero => $valor) {\n      $personas[$numero] = $follows[$numero]->suscripcion_id;\n      }\n\n\n      $code_post = DB::table(''post-codigos'')\n      ->join(''users'',''post-codigos.user_id'',''='',''users.id'')\n      ->join(''user-data'',''users.id'',''='',''user-data.user_id'')\n      ->select(''post-codigos.id'',''post-codigos.sintaxis'',''post-codigos.titulo'',\n      ''users.name'',''user-data.profile_picture'',''post-codigos.user_id''\n      )->whereIn(''post-codigos.user_id'',$personas)\n      ->orderBy(''post-codigos.id'',''desc'')->get();\n      return $code_post;\n    }\n}', 'php', 'FeedController', NULL),
(10, 15, '<?php\n\nnamespace App\\Http\\Controllers;\n\nuse App\\Http\\Controllers\\Controller;\nuse Request;\nuse DB;\n\nclass GroupsController extends Controller\n{\n\n    public function getView($id){\n      session_start();\n      $get_group = DB::table(''groups'')->where(''id'',''='',$id)->get();\n      if($get_group != null){\n        $_SESSION[''group_id''] = $id;\n        return view(''grupo'');\n      }\n    }\n\n    public function get_info(){\n      session_start();\n      $get_group = DB::table(''groups'')->where(''id'',''='',$_SESSION[''group_id''])->get();\n      return $get_group;\n    }\n\n    public function get_members(){\n      session_start();\n      $get_members = DB::table(''groups_members'')\n      ->join(''users'',''groups_members.member_id'',''='',''users.id'')\n      ->join(''user-data'',''groups_members.member_id'',''='',''user-data.user_id'')\n      ->select(''users.name'',''users.id'',''users.email'',''user-data.profile_picture'')\n      ->where(''groups_members.group_id'',''='',$_SESSION[''group_id''])->get();\n      return $get_members;\n    }\n\n    public function addGroup(){\n      session_start();\n      $name = Request::input(''nombre'');\n      $asunto = Request::input(''asunto'');\n      $insertar_grupo = DB::table(''groups'')->insertGetId([\n        ''name'' => $name,\n        ''type'' => $asunto,\n        ''created_by'' => $_SESSION[''uid''],\n      ]);\n\n      DB::table(''groups_members'')->insert([\n        ''group_id'' => $insertar_grupo,\n        ''member_id'' => $_SESSION[''uid''],\n      ]);\n\n      return 200;\n    }\n\n    public function get_myGroups(){\n      session_start();\n      $misGrupos = DB::table(''groups_members'')\n      ->join(''groups'',''groups_members.group_id'',''='',''groups.id'')\n      ->select(''groups.name'',''groups_members.member_id'',''groups.id'')\n      ->where(''member_id'',''='',$_SESSION[''uid''])->get();\n\n      return $misGrupos;\n    }\n\n    public function get_posts(){\n      session_start();\n      $publicaciones = DB::table(''grupos-posts'')\n      ->join(''users'',''grupos-posts.user_id'',''='',''users.id'')\n      ->join(''user-data'',''grupos-posts.user_id'',''='',''user-data.user_id'')\n      ->select(''grupos-posts.texto'',''grupos-posts.grupo_id'',''users.name'',''users.email'',''user-data.profile_picture'')\n      ->where(''grupos-posts.grupo_id'',''='',$_SESSION[''group_id''])\n      ->get();\n      return $publicaciones;\n    }\n\n    public function do_post(){\n      session_start();\n      $mensaje = Request::input(''mensaje'');\n      $valida = DB::table(''groups_members'')->where(''group_id'', ''='',$_SESSION[''group_id''])\n      ->where(''member_id'', ''='',$_SESSION[''uid''])->get();\n\n      if($valida != null){\n        $publicar = DB::table(''grupos-posts'')\n        ->insert([\n          ''user_id'' => $_SESSION[''uid''],\n          ''texto'' => $mensaje,\n          ''grupo_id'' => $_SESSION[''group_id''],\n        ]);\n        return 200;\n      }\n\n      return 404;\n    }\n\n    public function getNotas(){\n      session_start();\n      $notas = DB::table(''grupos-notas'')->select(''nota'',''id'')->where(''grupo_id'',''='',$_SESSION[''group_id''])->get();\n      return $notas;\n    }\n\n    public function eliminarNota(){\n      $id = Request::input(''nota_id'');\n      DB::table(''grupos-notas'')->where(''id'',''='',$id)->delete();\n      return 400;\n    }\n\n    public function agregarNota(){\n      session_start();\n      $nota = Request::input(''nota'');\n      $valida = DB::table(''groups_members'')->where(''group_id'', ''='',$_SESSION[''group_id''])\n      ->where(''member_id'', ''='',$_SESSION[''uid''])->get();\n\n\n      if($valida != null){\n        $insertar = DB::table(''grupos-notas'')->insert([\n          ''user_id'' => $_SESSION[''uid''],\n          ''nota'' => $nota,\n          ''grupo_id'' => $_SESSION[''group_id''],\n        ]);\n        return 200;\n      }\n      return 404;\n    }\n\n    public function postCode(){\n      session_start();\n      $titulo = Request::input(''titulo'');\n      $codigo = Request::input(''codigo'');\n      $sintaxis = Request::input(''sintaxis'');\n\n      $valida = DB::table(''groups_members'')->where(''group_id'', ''='',$_SESSION[''group_id''])\n      ->where(''member_id'', ''='',$_SESSION[''uid''])->get();\n\n      if($valida != null){\n        $insertar = DB::table(''post-codigos'')->insert([\n          ''user_id'' => $_SESSION[''uid''],\n          ''codigo'' => $codigo,\n          ''sintaxis'' => $sintaxis,\n          ''titulo'' => $titulo,\n          ''grupo_id'' => $_SESSION[''group_id''],\n        ]);\n        return 200;\n      }\n      return 404;\n    }\n\n    public function getCodes(){\n      session_start();\n\n            $code_post = DB::table(''post-codigos'')\n            ->join(''users'',''post-codigos.user_id'',''='',''users.id'')\n            ->join(''user-data'',''users.id'',''='',''user-data.user_id'')\n            ->select(''post-codigos.id'',''post-codigos.sintaxis'',''post-codigos.titulo'',\n            ''users.name'',''user-data.profile_picture'',''post-codigos.user_id'',''post-codigos.grupo_id''\n            )->where(''post-codigos.grupo_id'',$_SESSION[''group_id''])\n            ->orderBy(''post-codigos.id'',''desc'')->get();\n\n            return $code_post;\n    }\n\n    public function addMember(){\n      session_start();\n      $user = Request::input(''usuario'');\n      $validar  = DB::table(''users'')->where(''email'',$user)->get();\n      if ($validar != null) {\n        $insertar = DB::table(''groups_members'')->insert([\n          ''group_id'' => $_SESSION[''group_id''],\n          ''member_id'' => $validar[0]->id,\n        ]);\n        return 200;\n      }\n      else {\n        return 404;\n      }\n    }\n\n}', 'php', 'IMController', NULL),
(11, 8, 'printf("funciona")', 'c', 'Funciona!', 3),
(12, 23, 'console.log(1)', 'javascript', 'console.log(1)', NULL),
(13, 23, 'printf("funciona")', 'c', '', 3),
(14, 23, 'console.log(1)', 'c', 'console', NULL),
(15, 23, 'printf("funciona")', 'c', 'printf', 3),
(16, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(17, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(18, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(19, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(20, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(21, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(22, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(23, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(24, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6),
(25, 24, 'int pwm=0;\nvoid loop()\n{\njajajajaj\n}', 'c', 'ewrtfgjkl', 6);

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
(48, 8, 'Hoy es un dia pesado', 8, 6, '2016-05-13 04:59:44', NULL),
(49, 8, 'Ese mi alda', 11, 5, '2016-05-13 05:06:49', NULL),
(50, 11, 'hola mundo', 11, 5, '2016-05-13 13:29:01', NULL),
(52, 15, 'Necesito vacaciones', 15, 14, '2016-05-18 09:38:40', NULL),
(56, 15, 'Cuando tienes examen de POO?', 8, 0, '2016-05-18 10:04:35', NULL),
(62, 15, 'Weeks of programming can save hours of planning', 15, 0, '2016-05-18 10:49:17', NULL),
(63, 15, 'Que opinas de Bash para Windows10???', 8, 0, '2016-05-18 10:50:14', NULL),
(64, 8, 'Hola!!', 8, 0, '2016-09-15 16:30:47', NULL),
(65, 8, 'dgrt', 8, 3, '2016-09-15 16:33:20', NULL),
(66, 8, 'ytyty', 15, 16, '2016-09-15 16:34:58', NULL),
(67, 8, 'fgth', 11, 0, '2016-09-15 16:35:47', NULL),
(68, 8, 'Yo pienso que es una cosa mala , negativa, que quieren matar a ubu, #noalaactualización', 8, 1, '2016-09-15 16:53:27', NULL),
(69, 23, 'Hola amigos!', 23, 0, '2016-10-23 02:16:59', NULL),
(70, 23, 'lololo', 8, 0, '2016-10-23 02:18:32', NULL),
(71, 23, '', 23, 0, '2016-10-23 02:27:54', NULL),
(72, 23, '', 23, 0, '2016-10-23 02:27:58', NULL),
(73, 23, 'hola', 23, 0, '2016-10-23 02:28:25', NULL),
(74, 23, 'ulala', 8, 0, '2016-10-23 02:29:11', NULL),
(75, 23, 'holaa', 23, 1, '2016-10-23 02:38:42', NULL),
(76, 23, 'console.log (1)', 23, 2, '2016-10-23 02:39:13', NULL),
(77, 23, 'hola', 8, 1, '2016-10-23 02:39:55', NULL),
(78, 24, 'conquistar al mundo xdXDxd', 24, 0, '2016-10-28 15:41:35', NULL),
(79, 8, 'holaaa', 15, 0, '2016-11-12 19:45:40', NULL);

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
(13, 11, 10),
(14, 15, 8),
(15, 8, 15),
(16, 11, 15),
(17, 10, 15),
(18, 23, 11),
(19, 23, 8),
(20, 8, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user-data`
--

CREATE TABLE `user-data` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `profile_picture` varchar(5000) NOT NULL DEFAULT 'users-data/profile-pictures/defaultpicture.jpeg',
  `profile_cover` varchar(5000) DEFAULT 'users-data/profile-cover/defaultcover.jpeg',
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
(10, 15, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, 'PHP'),
(11, 16, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(13, 17, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(14, 18, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(15, 19, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(16, 20, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(17, 21, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(18, 22, 'users-data/profile-pictures/defaultpicture.jpg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(19, 23, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(20, 24, 'users-data/profile-pictures/defaultpicture.jpg', 'users-data/profile-cover/defaultcover.jpg', NULL, NULL, NULL, NULL),
(21, 25, 'users-data/profile-pictures/defaultpicture.jpeg', 'users-data/profile-cover/defaultcover.jpeg', NULL, NULL, NULL, NULL);

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
(21, '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL),
(22, 'Lucero Moran', 'lucerom@hotmail.com', '4c54766ed4f728b3929385200d5ad28e', NULL, NULL, NULL),
(23, 'prueba', 'prueba@prueba.com', 'c893bad68927b457dbed39460e6afd62', NULL, NULL, NULL),
(24, 'cesracrac', 'cesar.nie97@gmail.com', '76419c58730d9f35de7ac538c2fd6737', NULL, NULL, NULL),
(25, 'pruebaperfil', 'pruebap@hotmail.com', 'c893bad68927b457dbed39460e6afd62', NULL, NULL, NULL);

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
  MODIFY `id` bigint(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `groups_members`
--
ALTER TABLE `groups_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `grupos-notas`
--
ALTER TABLE `grupos-notas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `grupos-posts`
--
ALTER TABLE `grupos-posts`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `interaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT de la tabla `post-codigos`
--
ALTER TABLE `post-codigos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `suscribciones`
--
ALTER TABLE `suscribciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `user-data`
--
ALTER TABLE `user-data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
