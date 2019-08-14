-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 10:27 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'web-design', NULL, NULL),
(2, 'Web Programming', 'web-programming', NULL, NULL),
(3, 'Internet', 'internet', NULL, NULL),
(4, 'Social Networking', 'social-networking', NULL, NULL),
(5, 'Photography', 'photography', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_06_27_020908_create_posts_table', 1),
(9, '2019_06_28_075732_alter_posts_add_published_at_column', 1),
(10, '2019_06_29_133343_create_categories_table', 1),
(11, '2019_06_29_151902_alter_posts_add_category_id_column', 1),
(12, '2019_07_01_075553_alter_table_users_add_slug_column', 2),
(13, '2019_07_01_145131_alter_users_add_bio_column', 2),
(14, '2019_07_01_152716_alter_users_add_view_count_column', 3),
(15, '2019_07_01_153040_alter_posts_add_view_count_column', 4),
(16, '2019_07_03_235052_alter_users_add_gavatar_column', 5),
(17, '2019_07_23_151418_alter_table_posts_add_deleted_at_column', 6),
(18, '2019_07_26_082921_laratrust_setup_tables', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(16, 'crud-post', NULL, NULL, '2019-07-29 03:15:47', '2019-07-29 03:15:47'),
(17, 'update-others-post', NULL, NULL, '2019-07-29 03:15:47', '2019-07-29 03:15:47'),
(18, 'delete-other-post', NULL, NULL, '2019-07-29 03:15:47', '2019-07-29 03:15:47'),
(19, 'crud-category', NULL, NULL, '2019-07-29 03:15:47', '2019-07-29 03:15:47'),
(20, 'crud-user', NULL, NULL, '2019-07-29 03:15:47', '2019-07-29 03:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `excerpt`, `body`, `image`, `created_at`, `updated_at`, `published_at`, `category_id`, `view_count`, `deleted_at`) VALUES
(1, 1, 'Laboriosam inventore quas facilis debitis aut mollitia quasi fugit.', 'est-explicabo-qui-nobis-dolorem-quas', 'Aut eligendi voluptas est fuga cum. Autem sint incidunt cupiditate. Aut accusantium quia cum facilis quam. Saepe ab ratione deleniti aut officiis ex eos quos.', 'Doloribus vel maiores vel consequatur itaque minus. Non et quae voluptas. Praesentium ab aut ratione animi neque. Aut temporibus quia sed quaerat reprehenderit. Et eum aspernatur cupiditate doloribus. Qui ullam dolorum vel delectus. Quia deserunt sit quidem soluta eum molestiae. Ullam placeat consequatur reiciendis ut culpa. Est iure modi quaerat sint et perferendis. Id occaecati sequi id et.', 'est-explicabo-qui-nobis-dolorem-quas86.jpg', '2019-06-20 03:15:00', '2019-07-26 07:44:22', '2019-06-20 03:15:00', 2, 10, NULL),
(2, 1, 'Error cum molestiae esse quidem accusamus quae quia accusamus fuga.', 'earum-odio-voluptas-repudiandae-et-vero-veritatis', 'Excepturi iusto aperiam iste laboriosam vel sunt sequi. Ullam aut quam ut ipsum. Delectus et excepturi quidem voluptatem quos architecto.', 'Ad qui alias repudiandae omnis. Earum quasi distinctio omnis voluptates sed. Accusantium et ad et nisi rerum non. Aperiam ut temporibus a non omnis consequuntur esse. Voluptatibus laborum ut cumque sunt distinctio. Maiores et eos numquam ipsa ipsam sunt ab. Aut nostrum est molestiae laudantium voluptatem possimus. Repellat quo labore inventore recusandae. Commodi aut unde dolorem ut voluptatem. Magni enim quia eveniet fuga id. Et quia repellendus sapiente ratione. Veritatis molestiae nisi dolor eum eos quibusdam recusandae ea.', 'earum-odio-voluptas-repudiandae-et-vero-veritatis55.jpg', '2019-06-21 03:15:00', '2019-07-26 07:44:40', '2019-06-21 03:15:00', 4, 60, NULL),
(3, 1, 'Voluptate cum in pariatur iusto error repellendus vel qui adipisci velit voluptate iusto non.', 'ut-sunt-eum-ut-est-ipsum-molestiae', 'Incidunt et excepturi voluptate earum. Sed dignissimos nihil ipsa excepturi. Aut ea cumque provident voluptatem fugit. Cum aspernatur expedita aspernatur vitae mollitia aliquam voluptatum. Ut ea rerum labore eos molestias officia. Itaque et omnis magnam placeat non.', 'Incidunt sapiente reprehenderit esse et omnis est tempore quia. Repudiandae dolor illo qui ipsum pariatur. Libero sed fuga et quae. Quis labore et aperiam hic dolor ut ipsam doloribus. Porro architecto ducimus maxime ipsa ipsam similique voluptatem. Nostrum excepturi id ut quo non ipsa necessitatibus. Omnis minima qui ipsam voluptate. Explicabo eius et est excepturi tenetur. Molestiae rem sed qui sint fuga consequuntur. Eius doloremque quis numquam aliquid natus et omnis. Dolorum quasi et cupiditate necessitatibus tempore nostrum. Ipsum nemo fugit ut quis debitis.', 'ut-sunt-eum-ut-est-ipsum-molestiae58.jpg', '2019-06-22 03:15:00', '2019-07-26 07:43:59', '2019-06-22 03:15:00', 1, 100, NULL),
(4, 1, 'Perferendis consequatur et voluptatibus ipsa eos ipsa aut.', 'ipsam-occaecati-non-voluptas-iusto-cum-deserunt-quo-ducimus', 'Facere eius alias repudiandae quis illum. Cupiditate asperiores adipisci quis vel sint impedit ad culpa. In iure voluptatum doloribus quae. In blanditiis eos et et suscipit quas vitae. Qui ea dicta assumenda.', 'Unde voluptas voluptate sint accusantium illo ratione ut minus. Et dicta ducimus modi. Ex aperiam est tempora aut in quia earum. Aliquid officia et et animi et dolores aut. Sunt eaque distinctio quasi id repellat consequatur consequatur ipsum. Nesciunt natus molestias assumenda consequatur soluta consectetur qui facere. Rerum architecto illum cumque ipsam ullam. Rem nemo et voluptatibus et illo similique distinctio. In aut quibusdam enim cum qui similique. Ipsa repudiandae voluptatem quibusdam. Inventore temporibus sapiente et odio natus quia expedita. Et minus qui voluptatem mollitia ex atque. Esse rem eaque et et ipsa in a. Et aut tempora commodi est veniam suscipit. Tempore non omnis expedita ab. Officia blanditiis dolor sit expedita omnis nam. Corporis error perferendis eos quae.', 'ipsam-occaecati-non-voluptas-iusto-cum-deserunt-quo-ducimus67.jpg', '2019-06-23 03:15:00', '2019-07-26 07:43:39', '2019-06-23 03:15:00', 4, 100, NULL),
(5, 1, 'Saepe laborum et cumque aliquid et recusandae velit.', 'ut-culpa-enim-itaque-qui-aut-in', 'Molestiae quisquam nisi et ut. Modi tenetur aut est esse earum reprehenderit sed aut. Quas eos cupiditate similique rerum. Est ut eos debitis dolor alias earum doloremque veritatis.', 'Exercitationem molestiae porro ex exercitationem assumenda explicabo fugit. Fugiat et alias culpa fugit. In harum voluptas dolorum qui. Unde quia explicabo magnam accusantium expedita mollitia. Error nobis sit quasi consequatur quam amet. Recusandae totam iusto fugit in qui voluptas. Id reiciendis occaecati omnis repudiandae. Voluptates veritatis in quisquam qui. Deserunt occaecati fugit cupiditate ea. Similique et voluptatibus vel cupiditate omnis veritatis sed architecto.', NULL, '2019-06-24 03:15:00', '2019-06-24 03:15:00', NULL, 5, 60, NULL),
(6, 1, 'Itaque et est ex explicabo consequuntur dicta provident.', 'nihil-et-et-laboriosam-voluptas-omnis', 'Ut aspernatur illum adipisci voluptatem in rerum. Velit sed magni eos. Dolores excepturi voluptatem ipsa aut aut.', 'Inventore est aperiam et et. Earum sit ratione numquam. Odit ipsa totam molestiae tenetur sequi. Hic unde maxime quis. Quis est consequatur corporis maiores nulla sunt sed. Beatae veritatis reiciendis a dolorem. Veniam quia et iste quos vero temporibus alias enim. Et sunt voluptatibus voluptas. Voluptatem dolorem iure iusto aliquam. Quae et aut sunt voluptatem voluptatem. Earum magnam et aliquid.', 'nihil-et-et-laboriosam-voluptas-omnis63.jpg', '2019-06-25 03:15:00', '2019-07-26 07:43:21', '2019-06-29 03:15:00', 2, 70, NULL),
(7, 1, 'Ratione soluta fugiat amet sit nihil aut quia qui ratione tempore nobis.', 'esse-aliquid-quaerat-distinctio-aut', 'Sequi vel excepturi atque error deleniti corporis reprehenderit rem. Mollitia quam dolor voluptatibus animi. At ut id beatae cumque. Inventore quaerat rerum et explicabo. Consequatur necessitatibus fugit quod quia error.', 'Voluptas voluptatem maiores incidunt ut. Quis cupiditate ullam est numquam deleniti ut. Dolorem et ut eaque enim sed. Sit velit ratione ullam id est voluptatem. Laborum ab sunt laudantium aut. Magnam consequatur quo animi aut inventore. Officiis nihil non perferendis architecto labore culpa. Aut quibusdam et debitis quos eius cupiditate vitae nostrum. Provident nihil autem porro et. Nihil ullam excepturi dolorum earum eum omnis qui. Quasi id vel eveniet non quas nulla. Et dignissimos illo impedit et vitae.', 'esse-aliquid-quaerat-distinctio-aut53.JPG', '2019-06-26 03:15:00', '2019-07-31 07:29:16', '2019-06-30 03:15:00', 4, 40, '2019-07-31 07:29:16'),
(8, 3, 'Debitis neque quod voluptatem voluptas ut amet.', 'pariatur-magni-modi-qui-dolores-voluptate-ducimus-laboriosam', 'Exercitationem vitae quia cum explicabo. Rerum magni deserunt asperiores dolores perspiciatis esse. Quidem natus temporibus quis nisi est. Libero quis exercitationem qui qui earum. Quas labore impedit reiciendis.', 'Iusto omnis natus voluptas aut facilis culpa labore. Est saepe rerum consectetur excepturi quia commodi eos. Qui saepe qui fugiat dolorem omnis. Quia consequatur ipsam consequatur excepturi aut. Aut saepe alias non eligendi quae provident corrupti dolor. Illum quia et iste ullam. Nam quod expedita ullam quo ut corrupti molestiae sapiente. Id corrupti assumenda recusandae ducimus qui quis minus. Repudiandae a vel vero quidem officiis. Sequi accusantium voluptas voluptatem tempore mollitia et ducimus. Ullam ullam doloremque sit earum consequatur et eos.', NULL, '2019-06-27 03:15:00', '2019-07-31 07:48:03', NULL, 4, 90, NULL),
(9, 2, 'Minus sed consectetur fugiat soluta est est est sed aut.', 'blanditiis-doloribus-voluptatum-omnis-nisi-soluta-numquam', 'Labore cum id non et voluptas porro minima. Amet harum molestiae placeat dolorem molestiae voluptatem nisi. Totam omnis sunt commodi molestiae velit. Exercitationem voluptas quae impedit consequatur sit sed amet. Laborum animi repellendus qui et.', 'Et et ut dolorum consequatur. Sapiente et assumenda in necessitatibus rerum aut. Nam sit enim non aspernatur a iure. Magnam voluptates quia nobis magnam et. Aut ab vitae voluptas a eos magnam. Placeat tenetur totam suscipit voluptatem. Nemo voluptate et quidem et sit nisi. Tempore sunt quae doloremque quo sint. Ex adipisci fugiat numquam voluptates voluptatem. Architecto omnis ab ea odit eum et. Nihil sunt earum quibusdam. Eius omnis libero nisi ipsum vel. Voluptas et adipisci iure. Enim ut ratione ipsa.', NULL, '2019-06-28 03:15:00', '2019-07-31 09:07:36', NULL, 2, 40, NULL),
(10, 1, 'Officiis a qui eius fuga eum.', 'atque-autem-accusamus-veniam-ea-fugit-totam-velit', 'Autem velit repellat suscipit sunt. Sint et aut autem ipsum sit quidem. Quod consectetur dolore id ut aliquid ullam et sint.', 'Pariatur sequi quia consequatur at ut molestias voluptatem. Nostrum veniam et animi voluptas totam. Voluptas et vel eum quasi. Voluptatem omnis debitis similique nihil eius exercitationem. Ipsum aut illo rerum et voluptate. Quas et beatae minima quos. Dignissimos aperiam eum pariatur voluptate accusantium fugiat. Ipsum placeat aut et molestiae commodi. Harum et corporis possimus asperiores et quis cupiditate. Enim sed quam reprehenderit assumenda voluptatem veniam saepe nihil. Commodi illum beatae non. Sed blanditiis quia eius velit doloremque.', 'atque-autem-accusamus-veniam-ea-fugit-totam-velit49.jpg', '2019-06-29 03:15:00', '2019-07-26 07:44:57', '2019-07-28 13:29:52', 4, 90, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2019-07-28 03:07:49', '2019-07-28 03:07:49'),
(2, 'editor', 'Editor', NULL, '2019-07-28 03:07:49', '2019-07-28 03:07:49'),
(3, 'author', 'Author', NULL, '2019-07-28 03:07:49', '2019-07-28 03:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(2, 11, 'App\\User'),
(2, 12, 'App\\User'),
(2, 13, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gavatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `slug`, `bio`, `gavatar`) VALUES
(1, 'Roshan Kumar Giri', 'roshankumar.giri19@gmail.com', NULL, '$2y$10$q/aQagoCc5zPXqaTnPS4ge7ZVovFi9vNL5Ywv/OnQ6O6wIP7KMsH2', NULL, NULL, '2019-07-31 22:23:31', 'roshan-kumar-giri', 'Et rerum corrupti ab neque quia corrupti. Voluptates fugit quod sequi minima ad. Ut amet nam ut quas quibusdam.', 'roshan-kumar-giri59.jpg'),
(2, 'Sunil Kumar Giri', 'sunil.giri19@gmail.com', NULL, '$2y$10$z2PpOIo9uQBtzKcGP/qWYeEymfEsInuPPzSYD821daO1XYelCWiuq', NULL, NULL, '2019-07-31 22:28:30', 'sunil-kumar-giri', 'Non ut modi molestiae reprehenderit. Et culpa quibusdam ullam nihil qui perspiciatis illum. Qui quo quibusdam perspiciatis sapiente et aliquid fugit.', 'sunil-kumar-giri21.JPG'),
(3, 'Dhiraj Giri', 'dhiraj.giri19@gmail.com', NULL, '$2y$10$Wbzchle1y1asLswgdCrtFutfUt5nz9amvKZBCLnlDZCH79h6FkxRe', NULL, NULL, '2019-07-31 22:29:54', 'dhiraj-giri', 'Voluptatum non quia aperiam et dolor rerum. Nisi soluta culpa eaque voluptatum. Et quibusdam est aut debitis. Vel quo et beatae molestiae. Molestias quas molestiae ad earum nostrum. Ea nesciunt sint voluptatem dolor. Officiis distinctio reiciendis quasi.', 'dhiraj-giri85.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
