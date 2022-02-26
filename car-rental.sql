-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3345
-- Tiempo de generación: 26-02-2022 a las 23:51:57
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `car-rental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monovolumen', NULL, NULL),
(2, 'Furgoneta', NULL, NULL),
(3, 'Eléctricos', NULL, NULL),
(4, 'Camión', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_09_102926_create_categories_table', 1),
(6, '2022_02_09_105642_create_vehicles_table', 1),
(7, '2022_02_10_195131_create_rents_table', 1),
(8, '2022_02_10_195311_create_penalties_table', 1),
(9, '2022_02_19_122632_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

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
-- Estructura de tabla para la tabla `penalties`
--

CREATE TABLE `penalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost` double(8,2) NOT NULL,
  `additional_comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.rentings', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(2, 'admin.users.add', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(3, 'admin.users.list', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(4, 'admin.users.modify', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(5, 'admin.users.remove', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(6, 'admin.vehicles.add', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(7, 'admin.vehicles.list', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(8, 'admin.vehicles.modify', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(9, 'admin.vehicles.remove', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `rents`
--

CREATE TABLE `rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `date_give` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'expectation',
  `cost` double(8,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(2, 'client', 'web', '2022-02-26 22:46:56', '2022-02-26 22:46:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

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
(1, 'agustin', 'agus@agus.es', NULL, '$2y$10$EJxqYxt2Sv5zZ0ve4LmTtOEInZTnCvf790dxknkZIJmi0pg7ybvkK', NULL, '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(2, 'test', 'test@test.es', NULL, '$2y$10$nrwI61A716pqP1oRp8eG9OqDlusD3JXX6u63jD/bSr9dmK9uWrM.2', NULL, '2022-02-26 22:46:56', '2022-02-26 22:46:56'),
(3, 'test2', 'test2@test2.es', NULL, '$2y$10$yzPZcGpEfMjrqhdZRphkG.8Hx55hQ0jImUWOjs2f49WRpDcFuzj6y', NULL, '2022-02-26 22:46:56', '2022-02-26 22:46:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_plate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` int(11) NOT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.webp',
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `price` double(6,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `number_plate`, `model`, `description`, `seats`, `image`, `available`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Forest Sauer II', 'Bennie Okuneva DVM', 'Quis culpa dolore accusantium aut repudiandae aut aut ullam. Quia omnis dolorum nam nemo doloremque aperiam repudiandae excepturi. Pariatur sed et neque commodi aut quo.', 5, 'carImages/alfaromeo-giulia.png', 1, 5.00, 4, NULL, NULL),
(2, 'Mr. Randall Kertzmann IV', 'Francesco Kunde', 'At dolorem est et quasi eos cumque. Laboriosam reiciendis nobis optio non maiores. Exercitationem sed quo nulla sed voluptatem cumque. Est inventore alias dolores quidem distinctio odit corporis.', 5, 'carImages/bmw-i3.png', 1, 5.00, 4, NULL, NULL),
(3, 'Gabriella Stark', 'Efrain Littel II', 'Sint tempore distinctio consequatur eius quia voluptatem. Reprehenderit totam ut aspernatur. Dolorum totam quo suscipit et. Rerum et est et porro fuga.', 5, 'carImages/fiat-tipo.png', 1, 5.00, 4, NULL, NULL),
(4, 'Prof. Fausto Rempel', 'Esperanza Stokes Jr.', 'Inventore recusandae non voluptatem. Similique nihil eos similique iusto qui. Voluptatem est facilis ut maxime. Et ipsum ea vero recusandae.', 5, 'carImages/jeep-renegade.png', 1, 5.00, 4, NULL, NULL),
(5, 'Peggie Wintheiser PhD', 'Johnathan Murray', 'Doloribus aperiam ab earum quae. Porro neque totam omnis sed deserunt distinctio. Ad sint non qui quos adipisci enim.', 5, 'carImages/mercedes-vito.png', 1, 5.00, 4, NULL, NULL),
(6, 'Mr. Armani Olson V', 'Domenico Ledner I', 'Quia dolor enim molestias. Architecto reprehenderit doloribus omnis. Iusto quas non nulla consequatur fugiat est architecto. Ut exercitationem totam expedita. Eveniet quia dolore dolores.', 5, 'carImages/alfaromeo-giulia.png', 1, 5.00, 4, NULL, NULL),
(7, 'Dr. Minerva Stracke Sr.', 'Dayana Kirlin', 'Maiores officiis eius ratione laboriosam dolore assumenda nihil est. Quaerat quos pariatur in repellat. Ut consequatur sit neque maiores porro doloribus rerum.', 5, 'carImages/bmw-i3.png', 1, 5.00, 4, NULL, NULL),
(8, 'Darby Connelly', 'Kaylee Adams', 'Illo autem ut incidunt aut error aut non. Alias eum laboriosam officia voluptatibus.', 5, 'carImages/fiat-tipo.png', 1, 5.00, 4, NULL, NULL),
(9, 'Emilio Murray', 'Lupe Konopelski', 'Accusamus ea ipsam qui. Omnis totam veniam itaque beatae laudantium. Quia nostrum ut quia mollitia.', 5, 'carImages/jeep-renegade.png', 1, 5.00, 4, NULL, NULL),
(10, 'Ciara Lehner', 'Bobby Schamberger', 'Vero ut dolor occaecati eos. Nobis porro velit in quo amet. Dolores alias et sequi. Modi pariatur qui qui eos.', 5, 'carImages/mercedes-vito.png', 1, 5.00, 4, NULL, NULL),
(11, 'Mr. Candelario Kessler III', 'Talon Wolff', 'Accusantium similique excepturi labore. Voluptates autem voluptate possimus quaerat. Qui ipsa vitae et sit.', 6, 'carImages/alfaromeo-giulia.png', 1, 6.00, 2, NULL, NULL),
(12, 'Doris Schultz', 'Arvilla Kris', 'Quo ullam veritatis odit vitae. Iste sint veritatis labore est laboriosam esse nisi culpa. Qui delectus atque tenetur veniam consequuntur quis rem vel.', 6, 'carImages/bmw-i3.png', 1, 6.00, 2, NULL, NULL),
(13, 'Antonina Reynolds PhD', 'Oda Stokes', 'Excepturi magni tempore placeat placeat. Fugit ex nisi consequatur eos consectetur. Eius aperiam distinctio numquam.', 6, 'carImages/fiat-tipo.png', 1, 6.00, 2, NULL, NULL),
(14, 'Judge O\'Conner', 'Cynthia Runolfsdottir', 'Officiis asperiores tenetur illum distinctio blanditiis quasi eos. Est amet aliquam beatae est est. Eum et debitis at dolores porro sit. Consequatur autem dicta omnis hic maxime ut est.', 6, 'carImages/jeep-renegade.png', 1, 6.00, 2, NULL, NULL),
(15, 'Miss Filomena Wunsch', 'Cornelius Hamill', 'Est veritatis earum reprehenderit quia. In quis aspernatur nihil est quas. Nobis earum nihil ducimus nesciunt ea non eius ratione.', 6, 'carImages/mercedes-vito.png', 1, 6.00, 2, NULL, NULL),
(16, 'Ms. Icie Treutel', 'Delmer Green', 'Sed unde repellat doloribus fugiat amet voluptas a. Aliquam amet vel alias est. Qui qui sunt adipisci ullam dicta quibusdam.', 7, 'carImages/alfaromeo-giulia.png', 1, 7.00, 2, NULL, NULL),
(17, 'Odell Watsica', 'Giovanna Abernathy', 'Aut consequuntur architecto deserunt ea vero laboriosam quidem. Molestiae iusto ex itaque dolorem. Deleniti dolorem corporis placeat quia. Et dolorem ducimus non.', 7, 'carImages/bmw-i3.png', 1, 7.00, 2, NULL, NULL),
(18, 'Aurelia Terry', 'Stefanie Kutch', 'Culpa ipsam sunt voluptas quo qui amet. Autem ea odio eos. Et iste odit placeat. Vel voluptatibus animi facilis ad delectus.', 7, 'carImages/fiat-tipo.png', 1, 7.00, 2, NULL, NULL),
(19, 'Delia Wehner', 'Natalie Johnson Sr.', 'Enim eligendi explicabo vitae modi incidunt. Ex repudiandae sint sit. Nemo non explicabo facilis explicabo.', 7, 'carImages/jeep-renegade.png', 1, 7.00, 2, NULL, NULL),
(20, 'Dr. Lauriane Halvorson III', 'Lourdes Gutmann DVM', 'Suscipit vitae est consequuntur eum id et. Aut rem ut dolor dolorem sint. Sed sit est facere voluptas voluptatibus.', 7, 'carImages/mercedes-vito.png', 1, 7.00, 2, NULL, NULL),
(21, 'Rachael Price', 'Daisha Christiansen', 'Id odit fuga incidunt neque quia accusantium. Reiciendis autem ad voluptatem sunt beatae expedita. Occaecati a sunt est quas ut.', 2, 'carImages/alfaromeo-giulia.png', 1, 2.00, 1, NULL, NULL),
(22, 'Jovanny Kuhlman', 'Kaelyn Rice', 'Exercitationem ipsum id ullam quas animi dolore. Rem dignissimos reiciendis veritatis facilis libero minus impedit quisquam. Nobis illum quis voluptatibus nisi id veritatis.', 2, 'carImages/bmw-i3.png', 1, 2.00, 1, NULL, NULL),
(23, 'Tremaine Bins', 'Cecilia Willms DVM', 'Facere voluptatem cum et eligendi fuga. Eveniet ipsam maxime voluptas animi. Commodi ab porro dicta fuga. Quisquam ex voluptatem modi omnis voluptas non.', 2, 'carImages/fiat-tipo.png', 1, 2.00, 1, NULL, NULL),
(24, 'Nona Stroman III', 'Abbie Schiller', 'Vero rerum nihil velit ducimus. Sed fugiat totam mollitia est quisquam. Unde et dolorum facere voluptatibus ipsam quia.', 2, 'carImages/jeep-renegade.png', 1, 2.00, 1, NULL, NULL),
(25, 'Florine Buckridge', 'Conrad Parisian', 'Voluptatem at quas suscipit doloremque tempore et. Id et nemo aperiam id. Dolores ut non voluptas non.', 2, 'carImages/mercedes-vito.png', 1, 2.00, 1, NULL, NULL),
(26, 'Mr. Alfredo Towne Jr.', 'Clair Jerde', 'Saepe harum praesentium sed officia. Sint tenetur autem perspiciatis doloremque perspiciatis non. Et exercitationem nobis rerum. Consequatur optio quia cumque itaque.', 8, 'carImages/alfaromeo-giulia.png', 1, 8.00, 2, NULL, NULL),
(27, 'Mr. Mitchell Howell', 'Gordon Hudson', 'Laborum expedita animi iste praesentium. Asperiores magni dolor delectus. Quo perspiciatis laudantium vel asperiores. Tempore quis est aut id.', 8, 'carImages/bmw-i3.png', 1, 8.00, 2, NULL, NULL),
(28, 'Jada Hammes', 'Ms. Linda Zieme', 'Corporis praesentium rem esse molestiae eos maiores dolor sint. Qui sed aut labore cum ut qui qui.', 8, 'carImages/fiat-tipo.png', 1, 8.00, 2, NULL, NULL),
(29, 'Misael Kassulke', 'Mrs. Amber Stiedemann PhD', 'Doloremque voluptatibus eos et facilis facere eos quam natus. Nihil eius est rerum itaque possimus voluptas. Qui magnam illo quia minima dolorem facilis. Aut odio ipsam et.', 8, 'carImages/jeep-renegade.png', 1, 8.00, 2, NULL, NULL),
(30, 'Prof. Wilhelmine Strosin', 'Delbert Collins', 'Molestias minus quia eius fugiat eveniet exercitationem et. Illo laborum qui sunt veritatis id. Aspernatur sed reprehenderit et natus non.', 8, 'carImages/mercedes-vito.png', 1, 8.00, 2, NULL, NULL),
(31, 'Samir Hartmann', 'Ms. Mireille Cole', 'Quo et ipsa cumque fuga repudiandae. Id esse atque repellat ut odit aspernatur. Quidem sequi odio officiis. Occaecati cumque nesciunt autem animi non facilis.', 9, 'carImages/alfaromeo-giulia.png', 1, 9.00, 4, NULL, NULL),
(32, 'Dr. Yesenia Hilpert PhD', 'Ms. Jennie Muller DDS', 'Cum ex quae ut tenetur quia quae quam. Ipsum nam omnis corrupti. Quod omnis velit delectus enim est repudiandae inventore.', 9, 'carImages/bmw-i3.png', 1, 9.00, 4, NULL, NULL),
(33, 'Lilliana Christiansen', 'Shanna Hartmann', 'Numquam voluptatem magni nihil ullam quia fugit quis. Facilis distinctio repellendus aut explicabo est nihil ipsum. Aperiam molestiae molestiae exercitationem in similique corrupti. Non harum aspernatur non qui.', 9, 'carImages/fiat-tipo.png', 1, 9.00, 4, NULL, NULL),
(34, 'Prof. Cristian Boyer', 'Dr. Horacio Maggio', 'Aperiam et animi laborum quisquam accusantium cum dolor. Aspernatur maiores suscipit ipsam mollitia. Dolores voluptas et necessitatibus numquam.', 9, 'carImages/jeep-renegade.png', 1, 9.00, 4, NULL, NULL),
(35, 'Garnet Wunsch', 'Dr. Dennis Rowe', 'Fuga qui consequatur odio eaque. Recusandae quisquam voluptatum nobis quia dolore. Et modi iusto recusandae laborum.', 9, 'carImages/mercedes-vito.png', 1, 9.00, 4, NULL, NULL),
(36, 'Ottilie Stanton', 'Prof. Evelyn Turner V', 'Placeat modi doloremque dolores repellendus. Rerum aut voluptatum odit consequatur. Doloremque ullam hic eius odit voluptate quas dicta aut. Temporibus praesentium aspernatur itaque consequuntur modi ullam qui. Minus et eum incidunt dolor voluptas non.', 9, 'carImages/alfaromeo-giulia.png', 1, 9.00, 4, NULL, NULL),
(37, 'Dan Rippin', 'Margaretta Davis', 'Ab rerum ut laudantium minima quos. Maxime laborum dolorem rem ut non. Repudiandae vero adipisci labore dolorum odio molestiae. Quam inventore sed asperiores nesciunt quia exercitationem.', 9, 'carImages/bmw-i3.png', 1, 9.00, 4, NULL, NULL),
(38, 'Elton Kemmer', 'Lyda Altenwerth MD', 'Ea voluptatum expedita qui quibusdam quas placeat recusandae sunt. Aut odio repellendus nobis distinctio sint.', 9, 'carImages/fiat-tipo.png', 1, 9.00, 4, NULL, NULL),
(39, 'Julia Rempel', 'Dayana Thiel', 'Numquam incidunt voluptatem ipsa omnis. Consectetur debitis ut fugit voluptas voluptas ratione. Ipsum non alias aspernatur non aut nostrum velit explicabo.', 9, 'carImages/jeep-renegade.png', 1, 9.00, 4, NULL, NULL),
(40, 'Mrs. Miracle Hartmann DDS', 'Mrs. Missouri Ziemann Jr.', 'Illo magni est rerum maiores enim. Reprehenderit qui rem ea vel vel molestiae. Explicabo sed unde velit sed et. Sapiente cum exercitationem magnam aut velit delectus. Iure autem qui laborum laboriosam deleniti harum.', 9, 'carImages/mercedes-vito.png', 1, 9.00, 4, NULL, NULL),
(41, 'Mr. Nicholas Volkman IV', 'Daija Sauer', 'Veritatis ullam ea quisquam autem nesciunt. Atque ut vel molestiae tempore qui inventore vel. Laboriosam quae qui quae rem aut quia qui. Quam voluptas voluptates est praesentium quae quibusdam maxime.', 6, 'carImages/alfaromeo-giulia.png', 1, 6.00, 2, NULL, NULL),
(42, 'Georgiana Schultz', 'Ashlee Collier', 'Optio reiciendis in ipsam vel cum facere. Soluta maxime quaerat occaecati voluptates. Sunt quis deleniti recusandae sed perspiciatis. Eum minima eos corporis iste inventore non architecto.', 6, 'carImages/bmw-i3.png', 1, 6.00, 2, NULL, NULL),
(43, 'Marisol Osinski IV', 'Gerardo Schamberger V', 'Sint magni iure et culpa. Eius quos ab at quos eveniet quas eos. Architecto omnis voluptates debitis ut. Laudantium esse laudantium aut nam earum id eveniet.', 6, 'carImages/fiat-tipo.png', 1, 6.00, 2, NULL, NULL),
(44, 'Mr. Jerel Wiegand', 'Dr. Vicente Farrell', 'Dolorem in quas accusamus culpa reprehenderit. Ut aliquam aperiam dolore magni. Cumque optio natus unde consequatur qui quo laborum ratione. Consectetur qui quia illum ut veniam.', 6, 'carImages/jeep-renegade.png', 1, 6.00, 2, NULL, NULL),
(45, 'Dr. Dillan Quitzon', 'Jon Flatley', 'Et architecto et dolorem quidem eum incidunt quia ut. In voluptas est sapiente excepturi ut libero. Non quia laboriosam debitis aliquam eos. Sunt veniam minima ea expedita ea veritatis accusamus.', 6, 'carImages/mercedes-vito.png', 1, 6.00, 2, NULL, NULL),
(46, 'Karolann Schneider', 'Ernesto Altenwerth IV', 'Dolor ut quasi vitae eum rerum laboriosam libero. Sint quis suscipit nulla quis quis. Ab totam qui voluptatem dolorum consequatur sint exercitationem nihil. Accusantium veritatis sequi officia non.', 7, 'carImages/alfaromeo-giulia.png', 1, 7.00, 3, NULL, NULL),
(47, 'Mr. Leonardo Weimann', 'Mr. Deangelo McLaughlin', 'Corporis mollitia officiis fugiat aut fugit. Totam quidem similique non esse. Voluptatem iusto omnis qui ratione velit eius non. Nihil voluptatibus dolorem delectus aperiam.', 7, 'carImages/bmw-i3.png', 1, 7.00, 3, NULL, NULL),
(48, 'Mariah Frami Sr.', 'Brielle Ratke', 'Ea itaque saepe laboriosam ea. Aliquid nesciunt corporis qui. Rerum ab eos occaecati. Vero exercitationem quam hic eum sunt.', 7, 'carImages/fiat-tipo.png', 1, 7.00, 3, NULL, NULL),
(49, 'Francis Schmidt', 'Karlie Cremin', 'Iure veritatis dolorum eligendi quia velit. Culpa delectus provident dolorum ratione officia cumque. Est unde cum recusandae incidunt qui iure.', 7, 'carImages/jeep-renegade.png', 1, 7.00, 3, NULL, NULL),
(50, 'Karlee Berge', 'Carol Yost', 'Praesentium ab repudiandae sit aut sunt consequatur dolores. Numquam itaque dolore aut ut vel nulla eaque. Perspiciatis nam quaerat hic. Quia sint quo animi neque quidem ducimus dolore laudantium.', 7, 'carImages/mercedes-vito.png', 1, 7.00, 3, NULL, NULL),
(51, 'Jamie Feil', 'Mertie Lind', 'Nemo sit omnis quisquam vitae sint ipsum. Nostrum voluptate ex id non. Commodi a expedita odit sit nam optio assumenda.', 4, 'carImages/alfaromeo-giulia.png', 1, 4.00, 3, NULL, NULL),
(52, 'Sheldon Howell', 'Mrs. Cecile Conroy', 'Pariatur eum laboriosam eaque nobis expedita enim dolores. Unde laborum ut doloribus. Quas placeat architecto exercitationem voluptatibus.', 4, 'carImages/bmw-i3.png', 1, 4.00, 3, NULL, NULL),
(53, 'Ollie Muller', 'Raphaelle Bernhard', 'Sunt beatae quaerat saepe quo laborum unde. Saepe qui sint enim perferendis perspiciatis praesentium quisquam. Rerum saepe sapiente non quo tempora.', 4, 'carImages/fiat-tipo.png', 1, 4.00, 3, NULL, NULL),
(54, 'Otha Wintheiser MD', 'Zane Lindgren V', 'Magni nam laudantium reiciendis esse eum a. Qui officiis perspiciatis distinctio harum ea. Animi quas voluptates at voluptatibus neque nemo voluptatem saepe.', 4, 'carImages/jeep-renegade.png', 1, 4.00, 3, NULL, NULL),
(55, 'Luz DuBuque', 'Milford Stracke', 'In rerum delectus numquam ut quas ipsam in quis. Culpa voluptas ipsam sed nemo voluptatem laborum deserunt. Cumque libero sit voluptates corrupti soluta voluptate rerum. Qui dolores voluptas explicabo accusantium.', 4, 'carImages/mercedes-vito.png', 1, 4.00, 3, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penalties_rent_id_foreign` (`rent_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rents_user_id_foreign` (`user_id`),
  ADD KEY `rents_vehicle_id_foreign` (`vehicle_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rents`
--
ALTER TABLE `rents`
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
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rents_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
