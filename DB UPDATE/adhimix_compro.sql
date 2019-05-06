-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 02:57 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adhimix_compro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `type`, `about`, `fullname`, `email`, `password`, `gender`, `photo`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'Firman Prayoga', 'prayogafirman22@gmail.com', 'firman', 'Male', 'Admin_1536280177.JPG', '2018-09-06 10:24:24', NULL, NULL),
(4, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                    quis nostrud exercitation ullamco la', 'Adhimix admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'logo.PNG', NULL, '2018-09-07 03:01:08', '2018-09-07 03:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id_album` int(10) UNSIGNED NOT NULL,
  `idTab` int(11) NOT NULL,
  `divisi` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pict` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id_album`, `idTab`, `divisi`, `nama`, `pict`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 26, 2, 'Firman Prayoga', 'Anabatician_1543476739.jpg', 'Deskripsi', '2018-11-29 07:32:19', '2018-11-29 07:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `firstname`, `lastname`, `email`, `subject`, `comment`, `created_at`, `updated_at`) VALUES
(4, 'Agung', 'Mahariyad', 'agungmahariad47@gmail.com', 'Saya ingin bekerja sama dengan anda ^.^', 'sepertinya ini pertama kali saya melihat web sangat baik ini hehehe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `idContent` int(10) UNSIGNED NOT NULL,
  `parent` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contentName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `queue` int(11) NOT NULL,
  `activeLink` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`idContent`, `parent`, `parentName`, `contentName`, `queue`, `activeLink`, `publish`, `createdBy`, `updatedBy`, `created_at`, `updated_at`, `slug`) VALUES
(2, '0', '', 'News', 1, 1, 1, 4, NULL, '2018-12-03 09:26:35', '2018-12-04 09:34:59', 'news');

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id_divisi` int(10) UNSIGNED NOT NULL,
  `divisi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id_divisi`, `divisi`, `created_at`, `updated_at`) VALUES
(2, 'Divisi', '2018-11-29 04:02:27', '2018-11-29 04:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_06_203932_create_admins_table', 1),
(4, '2018_10_03_222313_create_contents_table', 2),
(5, '2018_10_03_232756_create_contents_table', 3),
(6, '2018_10_08_134117_create_posts_table', 3),
(7, '2018_10_10_211654_create_tab_contents_table', 4),
(8, '2018_11_29_103346_create_divisis_table', 5),
(9, '2018_11_29_125426_create_albums_table', 6),
(10, '2018_12_04_182044_create_contacts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `idPost` int(10) UNSIGNED NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idTab` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sortDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `kontenImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reportDate` date NOT NULL,
  `content` longblob NOT NULL,
  `queue` int(11) NOT NULL,
  `activeLink` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`idPost`, `idMenu`, `idTab`, `type`, `title`, `headline`, `sortDesc`, `kontenImage`, `pdf`, `reportDate`, `content`, `queue`, `activeLink`, `publish`, `slug`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(2, 93, 30, 'Post', 'Banner Service', 'New', '-', '', '', '0000-00-00', 0x3c703e4d6173756b616e204b6f6e74656e2e2e3c2f703e3c703e3c62723e3c2f703e3c703e3c62723e3c2f703e3c703e3c62723e3c2f703e3c703e3c62723e3c2f703e3c703e3c62723e3c2f703e3c703e3c62723e3c2f703e, 1, 1, 0, 'banner-service', 4, 0, '2018-11-29 05:44:01', '2018-11-29 07:48:52'),
(3, 93, 31, 'Post', 'Banner Service', 'Headline baru', '-', '', '', '0000-00-00', 0x4d6173756b616e204b6f6e74656e2e2e, 2, 1, 1, 'banner-service', 4, 0, '2018-11-29 07:52:17', '2018-11-29 07:52:58'),
(4, 2, 33, 'Post', 'Aku ngepost pertama 1', 'POST 1', '-', 'Post-1543829278.png', '', '0000-00-00', 0x3c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742c2073656420646f20656975736d6f643c2f703e3c703e3c7370616e207374796c653d2277686974652d73706163653a707265223e09090909093c2f7370616e3e74656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2c3c2f703e3c703e3c7370616e207374796c653d2277686974652d73706163653a707265223e09090909093c2f7370616e3e71756973206e6f737472756420657865726369746174696f6e20756c6c616d636f206c61626f726973206e69736920757420616c697175697020657820656120636f6d6d6f646f3c2f703e3c703e3c7370616e207374796c653d2277686974652d73706163653a707265223e09090909093c2f7370616e3e636f6e7365717561742e2044756973206175746520697275726520646f6c6f7220696e20726570726568656e646572697420696e20766f6c7570746174652076656c697420657373653c2f703e3c703e3c7370616e207374796c653d2277686974652d73706163653a707265223e09090909093c2f7370616e3e63696c6c756d20646f6c6f726520657520667567696174206e756c6c612070617269617475722e204578636570746575722073696e74206f6363616563617420637570696461746174206e6f6e3c2f703e3c703e3c7370616e207374796c653d2277686974652d73706163653a707265223e09090909093c2f7370616e3e70726f6964656e742c2073756e7420696e2063756c706120717569206f666669636961206465736572756e74206d6f6c6c697420616e696d20696420657374206c61626f72756d2e3c2f703e, 1, 1, 0, 'aku-ngepost-pertama-1', 4, 0, '2018-12-03 09:27:58', '2018-12-04 09:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `tab_contents`
--

CREATE TABLE `tab_contents` (
  `idTab` int(10) UNSIGNED NOT NULL,
  `idMenu` int(11) NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reportTitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descReport` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` int(11) NOT NULL,
  `activeLink` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tab_contents`
--

INSERT INTO `tab_contents` (`idTab`, `idMenu`, `headline`, `type`, `reportTitle`, `descReport`, `queue`, `activeLink`, `publish`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(11, 72, 'About Us', 'Post', '', '', 0, 1, 1, 4, 0, '2018-10-10 16:10:55', '2018-10-10 23:47:19'),
(13, 74, 'Vision And Mision', 'Post', '', '', 0, 1, 0, 4, 0, '2018-10-10 16:47:49', '2018-10-10 16:47:49'),
(16, 70, 'About Us', 'Post', '', '', 1, 1, 0, 4, 0, '2018-10-11 04:15:47', '2018-10-11 04:15:47'),
(17, 70, 'About Us', 'Post', '', '', 2, 1, 1, 4, 0, '2018-10-11 04:16:17', '2018-10-11 04:16:21'),
(18, 67, 'Contoh list', 'List', '', '', 1, 1, 0, 4, 0, '2018-10-11 05:20:44', '2018-10-11 05:25:19'),
(19, 92, 'headline', 'Post', '', '', 1, 1, 1, 4, 0, '2018-10-11 07:46:37', '2018-10-11 07:46:41'),
(20, 92, 'news', 'List', '', '', 1, 1, 1, 4, 0, '2018-10-11 07:47:31', '2018-10-11 07:47:37'),
(21, 69, 'New Post', 'Post', '', '', 1, 1, 1, 4, 0, '2018-10-12 06:03:43', '2018-10-12 06:03:58'),
(22, 69, 'Headline LIst', 'List', '', '', 1, 1, 1, 4, 0, '2018-10-12 06:03:54', '2018-10-12 06:04:02'),
(23, 69, 'Report', 'Report', 'Quarter Report yaa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 1, 1, 4, 0, '2018-10-16 03:40:43', '2018-10-16 03:44:42'),
(24, 67, 'Headlinenya', 'Post', '', '', 2, 1, 1, 4, 0, '2018-11-29 04:15:11', '2018-11-29 04:15:16'),
(26, 93, 'Album', 'Anabatician', '', '', 1, 1, 0, 4, 0, '2018-11-29 04:34:22', '2018-11-29 07:48:22'),
(27, 93, 'New', 'List', '', '', 1, 1, 0, 4, 0, '2018-11-29 04:48:20', '2018-11-29 07:48:57'),
(30, 93, 'New', 'Post', '', '', 2, 1, 0, 4, 0, '2018-11-29 05:44:01', '2018-11-29 07:48:51'),
(31, 93, 'Headline baru', 'Post', '', '', 3, 1, 1, 4, 0, '2018-11-29 07:52:17', '2018-11-29 07:52:58'),
(32, 93, 'Anabatician', 'Anabatician', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam a, nisi eaque. Repellendus sint, laudantium maxime accusamus dolore magni repellat, voluptatibus tenetur aspernatur, quibusdam at alias obcaecati architecto suscipit \r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Totam a, nisi eaque. Repellendus sint, laudantium maxime accusamus dolore magni repellat, voluptatibus tenetur aspernatur, quibusdam at alias obcaecati architecto suscipit porro.', 2, 1, 1, 4, 0, '2018-11-29 07:56:01', '2018-11-29 07:56:06'),
(33, 2, 'POST 1', 'Post', '', '', 1, 1, 0, 4, 0, '2018-12-03 09:27:58', '2018-12-04 09:36:21'),
(34, 2, 'News', 'List', '', '', 1, 1, 1, 4, 0, '2018-12-03 09:28:49', '2018-12-03 09:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`idContent`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id_divisi`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPost`);

--
-- Indexes for table `tab_contents`
--
ALTER TABLE `tab_contents`
  ADD PRIMARY KEY (`idTab`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `idContent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id_divisi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `idPost` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tab_contents`
--
ALTER TABLE `tab_contents`
  MODIFY `idTab` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
