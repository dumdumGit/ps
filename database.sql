-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 01:27 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.33-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otomotif`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(100) NOT NULL,
  `sluglink` varchar(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `author` int(100) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `excerpt` varchar(400) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `sluglink`, `judul`, `author`, `content`, `jenis`, `excerpt`, `created_at`, `updated_at`) VALUES
(8, 'deface+with+a+shotgun', 'Deface With A Shotgun', 1, '<p>huhuhuhu tututututu tututututu utuututut tes</p>\r\n', 'berita_umum', 'huhuhuhu tututututu tututututu utuututut tes\r\n', '2018-01-20 21:15:32', '2018-01-21 08:16:52'),
(9, 'tes+gan', 'Tes Gan', 1, '<p><img alt="" src="/storage/files/food.jpg" style="border-style:solid; border-width:1px; float:left; height:87px; margin:20px 40px; width:300px" />&nbsp;iasogsaoifhasiohfowahfoahwoa doadowah fo odhaohoash wwo hasodhoashigwh asodhas odgaosfiawbbxohao ow da doahiof&nbsp; oashocaohcaoshpauud a ppa pahsa nohcoa ap aoihoohdoaf 8hsfhafahoawhi asodhoahfoashf ishafoahfowaho foaihfoajcohiaowf aoiahsfoafoiafa woahsackbafuga asasiahwfohasbixuc</p>\r\n', 'kegiatan', '&nbsp;iasogsaoifhasiohfowahfoahwoa doadowah fo odhaohoash wwo hasodhoashigwh asodhas odgaosfiawbbxohao ow da doahiof&nbsp; oashocaohcaoshpauud a ppa pahsa nohcoa ap aoihoohdoaf 8hsfhafahoawhi asodhoahfoashf ishafoahfowaho foaihfoajcohiaowf aoiahsfoafoiafa woahsackbafuga asasiahwfohasbixuc\r\n', '2018-01-20 21:19:57', '2018-01-21 08:22:23'),
(10, 'halfest', 'Halfest', 1, '<p><img alt="" src="/storage/files/halfest.png" style="float:left; height:81px; margin:40px 20px; width:300px" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet eleifend diam. Morbi faucibus ultrices dui, sed pulvinar tortor sagittis nec. Sed non tempus lectus. Pellentesque at dapibus elit, eu fringilla nulla. Nulla in risus ipsum. Vestibulum mollis velit sit amet risus viverra, laoreet luctus lectus accumsan. Sed sodales sapien nunc, eu venenatis nisi convallis vitae. Curabitur luctus iaculis diam, non finibus ante gravida a. Donec dolor tortor, ullamcorper vitae est in, volutpat fringilla justo.</p>\r\n\r\n<p>Sed vitae massa id odio cursus maximus ac ac lacus. Ut diam est, porttitor nec mi sed, vestibulum efficitur magna. Nulla auctor lorem quis felis porta placerat. Nulla a accumsan neque, at dictum est. Praesent pretium varius magna rhoncus sollicitudin. Duis eget lobortis erat, a ullamcorper leo. Fusce convallis non sem nec imperdiet. Curabitur sagittis sem a rutrum gravida. Donec sagittis, massa vitae condimentum commodo, velit quam varius tortor, vel congue sapien neque quis ipsum. Pellentesque ut feugiat odio. Vivamus cursus, ipsum id lobortis euismod, felis tortor auctor tellus, pharetra laoreet sapien lacus a nibh.</p>\r\n\r\n<p>Sed et vehicula urna, iaculis porta magna. Sed non urna in velit varius viverra at eu elit. Sed mattis posuere purus at fringilla. Nullam ac venenatis dui, ac vehicula risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum volutpat vestibulum ultrices. Quisque quis libero sapien.</p>\r\n\r\n<p>Ut ornare metus enim, vel sagittis nibh elementum auctor. In laoreet placerat vestibulum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam elementum lorem a magna dignissim, a malesuada ipsum sagittis. Mauris elementum sodales est eu ultrices. Vestibulum magna mi, convallis et risus ut, scelerisque euismod nisi. Sed sit amet ligula sit amet turpis lobortis dignissim non ac eros.</p>\r\n\r\n<p>Cras in nisl tristique, aliquam leo id, suscipit dui. Suspendisse tristique commodo ante vulputate pellentesque. Donec sed ornare massa. Integer porta ligula a dolor aliquet, ut fringilla risus ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque tempus accumsan arcu, sed suscipit ante volutpat sit amet. Cras ultricies accumsan varius. Sed pharetra fermentum commodo. Mauris accumsan elit in lacinia faucibus.</p>\r\n', 'berita_umum', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet eleifend diam. Morbi faucibus ultrices dui, sed pulvinar tortor sagittis nec. Sed non tempus lectus. Pellentesque at dapibus elit, eu fringilla nulla. Nulla in risus ipsum. Vestibulum mollis velit sit amet risus viverra, laoreet luctus lectus accumsan. Sed sodales sapien nunc, eu venenatis nisi convallis vitae. Cura', '2018-01-20 22:19:14', '2018-01-20 22:26:14'),
(11, 'u+can+do+it', 'U Can Do It', 1, '<p>just&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet eleifend diam. Morbi faucibus ultrices dui, sed pulvinar tortor sagittis nec. Sed non tempus lectus. Pellentesque at dapibus elit, eu fringilla nulla. Nulla in risus ipsum. Vestibulum mollis velit sit amet risus viverra, laoreet luctus lectus accumsan. Sed sodales sapien nunc, eu venenatis nisi convallis vitae. Curabitur luctus iaculis diam, non finibus ante gravida a. Donec dolor tortor, ullamcorper vitae est in, volutpat fringilla justo.</p>\r\n\r\n<p>Sed vitae massa id odio cursus maximus ac ac lacus. Ut diam est, porttitor nec mi sed, vestibulum efficitur magna. Nulla auctor lorem quis felis porta placerat. Nulla a accumsan neque, at dictum est. Praesent pretium varius magna rhoncus sollicitudin. Duis eget lobortis erat, a ullamcorper leo. Fusce convallis non sem nec imperdiet. Curabitur sagittis sem a rutrum gravida. Donec sagittis, massa vitae condimentum commodo, velit quam varius tortor, vel congue sapien neque quis ipsum. Pellentesque ut feugiat odio. Vivamus cursus, ipsum id lobortis euismod, felis tortor auctor tellus, pharetra laoreet sapien lacus a nibh.</p>\r\n\r\n<p>Sed et vehicula urna, iaculis porta magna. Sed non urna in velit varius viverra at eu elit. Sed mattis posuere purus at fringilla. Nullam ac venenatis dui, ac vehicula risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum volutpat vestibulum ultrices. Quisque quis libero sapien.</p>\r\n\r\n<p>Ut ornare metus enim, vel sagittis nibh elementum auctor. In laoreet placerat vestibulum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam elementum lorem a magna dignissim, a malesuada ipsum sagittis. Mauris elementum sodales est eu ultrices. Vestibulum magna mi, convallis et risus ut, scelerisque euismod nisi. Sed sit amet ligula sit amet turpis lobortis dignissim non ac eros.</p>\r\n\r\n<p>Cras in nisl tristique, aliquam leo id, suscipit dui. Suspendisse tristique commodo ante vulputate pellentesque. Donec sed ornare massa. Integer porta ligula a dolor aliquet, ut fringilla risus ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque tempus accumsan arcu, sed suscipit ante volutpat sit amet. Cras ultricies accumsan varius. Sed pharetra fermentum commodo. Mauris accumsan elit in lacinia faucibus.</p>\r\n', 'berita_penting', 'just&nbsp;\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet eleifend diam. Morbi faucibus ultrices dui, sed pulvinar tortor sagittis nec. Sed non tempus lectus. Pellentesque at dapibus elit, eu fringilla nulla. Nulla in risus ipsum. Vestibulum mollis velit sit amet risus viverra, laoreet luctus lectus accumsan. Sed sodales sapien nunc, eu venenatis nisi convallis v', '2018-01-20 22:20:00', '2018-01-20 23:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(100) UNSIGNED NOT NULL,
  `author` int(100) UNSIGNED NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `author`, `namafile`, `lokasi`, `created_at`, `updated_at`) VALUES
(8, 3, '23711.jpg', '/storage/files/23711.jpg', '2018-01-19 09:09:45', '2018-01-19 09:09:45'),
(9, 3, 'banner.jpg', '/storage/files/banner.jpg', '2018-01-19 09:13:06', '2018-01-19 09:13:06'),
(10, 1, 'food.jpg', '/storage/files/food.jpg', '2018-01-20 21:18:34', '2018-01-20 21:18:34'),
(11, 1, 'halfest.png', '/storage/files/halfest.png', '2018-01-20 22:17:46', '2018-01-20 22:17:46'),
(12, 3, 'Petunjuk_PI_SI_2012.pdf', '/storage/files/Petunjuk_PI_SI_2012.pdf', '2018-01-21 00:56:21', '2018-01-21 00:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(100) NOT NULL,
  `header` text NOT NULL,
  `tentang` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `footer3` varchar(100) NOT NULL,
  `footer32` text NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `header`, `tentang`, `visi`, `misi`, `telpon`, `alamat`, `email`, `footer3`, `footer32`, `profil`) VALUES
(1, '/storage/files/banner.jpg', '                                                                                    Center for Automotive Research (CAR) adalah sebuah pusat riset otomotif di Universitas Gunadarma difokuskan pada studi mutakhir untuk meningkatkan inovasi dan daya saing otomotif didasarkan pada kondisi infrastruktur lokal.\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            ', '                                                                                    A Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            ', '                                                                                    Misi kami adalah untuk mengelaborasi simulasi metodologi yang baru menggunakan teknologi mutakhir pada sistem prototyping. Sistem itu sendiri terdiri dari hierarki model dengan berbagai parameter yang dapat disesuaikan untuk memenuhi berbagai tujuan simulasi dan secara signifikan dapat berdampak pada proses pengembangan produk pada industri manufaktur otomotif.\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            ', '0857701XXXX', 'Jalan Margonda Raya no. 100 Pondok Cina, Beji', 'admin@ps-otomotif.gunadarma.ac.id', 'Universitas <span>Gunadarma</span>', '', '                                <div class="container">\r\n    <div class="row">\r\n      <h1 class="page-header">\r\n        Profil\r\n      </h1>\r\n      <p>Untuk Mengganti halaman profil ini., bisa di backend, atau edit file -> resources -> views -> profil.blade.php</p>\r\n    </div>\r\n  </div>\r\n            \r\n            ');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(100) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `konten` text,
  `lokasi` varchar(100) DEFAULT NULL,
  `author` int(100) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id`, `judul`, `konten`, `lokasi`, `author`, `created_at`, `updated_at`) VALUES
(1, 'asljflaf', '<p>hiasfhaisfa</p>\r\n', '', 1, '2018-01-20 07:40:01', '2018-01-20 07:40:01'),
(3, 'terlihat tidak', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in consequat felis, tincidunt elementum nulla. Donec a massa nisi. Morbi quis felis et dui aliquam vehicula sit amet ac dui. Donec sit amet sapien at lectus rutrum aliquet. Sed a blandit arcu, a convallis metus. Integer pretium sem quis augue mattis, id imperdiet dui pretium. Aenean fermentum libero ac nisl venenatis, ac consequat neque vulputate. Praesent a laoreet quam. Phasellus at scelerisque nibh.</p>\r\n\r\n<p>Proin quis urna eu nunc viverra ullamcorper quis ac erat. Fusce id laoreet diam. Sed elementum imperdiet tincidunt. Aenean erat nunc, porta sit amet ultricies et, interdum sit amet lectus. Vestibulum elementum pellentesque risus, dignissim tempor leo lobortis eu. Proin non justo ante. Praesent vel erat cursus, vehicula ipsum ut, facilisis nisl. Vivamus at euismod ex. Aliquam id risus ullamcorper, ultrices urna sit amet, aliquet arcu. In sagittis ac dolor vitae ultrices. Etiam id est nec quam interdum lobortis. Praesent imperdiet bibendum pretium. Aenean congue aliquam nisi eu viverra. Cras eget arcu lacus. Cras convallis congue risus ut dapibus.</p>\r\n\r\n<p>Quisque luctus eros ut ullamcorper placerat. Suspendisse metus leo, suscipit a condimentum at, commodo sit amet ante. Proin pretium tincidunt mattis. Aliquam non imperdiet est, vel venenatis ex. Pellentesque id quam eget nulla finibus fermentum in venenatis lacus. Suspendisse a magna bibendum, sodales diam quis, tempus lorem. Suspendisse quam sapien, auctor nec orci vitae, sagittis semper neque. In vitae urna accumsan, pulvinar elit non, venenatis lacus. In aliquam placerat ex, quis suscipit arcu gravida in. Quisque sed enim vel tortor vulputate bibendum sit amet ac est. Etiam vel congue ligula, sit amet malesuada odio. Pellentesque nec posuere purus.</p>\r\n\r\n<p>Pellentesque ut ipsum eu nulla mollis imperdiet blandit at libero. Integer urna enim, vehicula ut accumsan sed, aliquet quis dui. Morbi luctus, tellus a porta consectetur, nisi nisl mattis lorem, quis accumsan elit leo accumsan massa. Phasellus rhoncus rhoncus mauris in vehicula. Etiam a ligula venenatis, placerat mi nec, congue lorem. Cras in vehicula nisi. Integer malesuada dui id porttitor ultricies. Praesent eleifend volutpat nunc. Phasellus rhoncus posuere turpis, lobortis fringilla massa ultricies id. Vivamus suscipit faucibus magna a finibus. Aenean dignissim justo nisl, eget accumsan metus ultrices eget.</p>\r\n\r\n<p>Duis quis lorem nibh. Sed convallis mi eget nisi tincidunt dignissim. Maecenas eu nulla ac dolor hendrerit porttitor vitae id diam. Integer eget erat at erat consectetur porttitor id quis augue. Fusce sodales pharetra urna, vel pretium lacus consectetur in. Nam suscipit lacus at diam pharetra, placerat venenatis dui eleifend. Nulla pulvinar in tellus vitae aliquam. Aliquam erat volutpat. Proin maximus risus est, venenatis faucibus velit congue sed. Pellentesque eget ante bibendum, fermentum mauris semper, placerat arcu. Praesent vel suscipit nunc, sit amet mollis nulla. Curabitur posuere sapien vitae risus ultrices luctus. Nulla malesuada dolor ante, non convallis leo malesuada non. Nullam turpis justo, convallis nec neque vel, placerat feugiat dolor.</p>\r\n', '/storage/publikasi/bogue2016.pdf', 1, '2018-01-21 00:36:21', '2018-01-21 00:36:21'),
(4, 'Publikasi Milik Suryana', '<p><img alt="" src="/storage/files/halfest.png" style="float:left; height:81px; margin:20px; width:300px" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in consequat felis, tincidunt elementum nulla. Donec a massa nisi. Morbi quis felis et dui aliquam vehicula sit amet ac dui. Donec sit amet sapien at lectus rutrum aliquet. Sed a blandit arcu, a convallis metus. Integer pretium sem quis augue mattis, id imperdiet dui pretium. Aenean fermentum libero ac nisl venenatis, ac consequat neque vulputate. Praesent a laoreet quam. Phasellus at scelerisque nibh.</p>\r\n\r\n<p>Proin quis urna eu nunc viverra ullamcorper quis ac erat. Fusce id laoreet diam. Sed elementum imperdiet tincidunt. Aenean erat nunc, porta sit amet ultricies et, interdum sit amet lectus. Vestibulum elementum pellentesque risus, dignissim tempor leo lobortis eu. Proin non justo ante. Praesent vel erat cursus, vehicula ipsum ut, facilisis nisl. Vivamus at euismod ex. Aliquam id risus ullamcorper, ultrices urna sit amet, aliquet arcu. In sagittis ac dolor vitae ultrices. Etiam id est nec quam interdum lobortis. Praesent imperdiet bibendum pretium. Aenean congue aliquam nisi eu viverra. Cras eget arcu lacus. Cras convallis congue risus ut dapibus.</p>\r\n\r\n<p>Quisque luctus eros ut ullamcorper placerat. Suspendisse metus leo, suscipit a condimentum at, commodo sit amet ante. Proin pretium tincidunt mattis. Aliquam non imperdiet est, vel venenatis ex. Pellentesque id quam eget nulla finibus fermentum in venenatis lacus. Suspendisse a magna bibendum, sodales diam quis, tempus lorem. Suspendisse quam sapien, auctor nec orci vitae, sagittis semper neque. In vitae urna accumsan, pulvinar elit non, venenatis lacus. In aliquam placerat ex, quis suscipit arcu gravida in. Quisque sed enim vel tortor vulputate bibendum sit amet ac est. Etiam vel congue ligula, sit amet malesuada odio. Pellentesque nec posuere purus.</p>\r\n\r\n<p>Pellentesque ut ipsum eu nulla mollis imperdiet blandit at libero. Integer urna enim, vehicula ut accumsan sed, aliquet quis dui. Morbi luctus, tellus a porta consectetur, nisi nisl mattis lorem, quis accumsan elit leo accumsan massa. Phasellus rhoncus rhoncus mauris in vehicula. Etiam a ligula venenatis, placerat mi nec, congue lorem. Cras in vehicula nisi. Integer malesuada dui id porttitor ultricies. Praesent eleifend volutpat nunc. Phasellus rhoncus posuere turpis, lobortis fringilla massa ultricies id. Vivamus suscipit faucibus magna a finibus. Aenean dignissim justo nisl, eget accumsan metus ultrices eget.</p>\r\n\r\n<p>Duis quis lorem nibh. Sed convallis mi eget nisi tincidunt dignissim. Maecenas eu nulla ac dolor hendrerit porttitor vitae id diam. Integer eget erat at erat consectetur porttitor id quis augue. Fusce sodales pharetra urna, vel pretium lacus consectetur in. Nam suscipit lacus at diam pharetra, placerat venenatis dui eleifend. Nulla pulvinar in tellus vitae aliquam. Aliquam erat volutpat. Proin maximus risus est, venenatis faucibus velit congue sed. Pellentesque eget ante bibendum, fermentum mauris semper, placerat arcu. Praesent vel suscipit nunc, sit amet mollis nulla. Curabitur posuere sapien vitae risus ultrices luctus. Nulla malesuada dolor ante, non convallis leo malesuada non. Nullam turpis justo, convallis nec neque vel, placerat feugiat dolor.</p>\r\n', '/storage/publikasi/10306464_766747913359369_511726572473110475_n.jpg', 3, '2018-01-21 00:57:38', '2018-01-21 00:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `riset`
--

CREATE TABLE `riset` (
  `id` int(100) NOT NULL,
  `author` int(100) UNSIGNED NOT NULL,
  `judul` varchar(30) NOT NULL,
  `konten` text NOT NULL,
  `sluglink` varchar(30) NOT NULL,
  `excerpt` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riset`
--

INSERT INTO `riset` (`id`, `author`, `judul`, `konten`, `sluglink`, `excerpt`, `created_at`, `updated_at`) VALUES
(3, 1, 'Tes31231', '<p>iafwafaw</p>\r\n', 'tes31231', 'iafwafaw\r\n', '2018-01-19 03:29:31', '2018-01-19 03:29:40'),
(4, 3, 'Asfhaighwa', '<p>asfhioahgoahwofajfahfcsda</p>\r\n', 'asfhaighwa', 'asfhioahgoahwofajfahfcsda\r\n', '2018-01-20 12:54:26', '2018-01-20 12:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaRule` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `namaRule`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Super_Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `roles_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cecep Budiman', 'c3budiman@gmail.com', 3, '$2y$10$I6dtQlCbfpRRsfyi2O3eweSYqkM/bKpOtJtdsaYdEIVP1D8ipWtF6', 'gxmotIbEPUw7OnTirYnrF0thA8lBzP7s76pGT19ONlwGTvZXlpg6pIvbCg5T', '2018-01-17 02:32:28', '2018-01-21 08:58:29'),
(3, 'Suryana', 'suryana@gmail.com', 1, '$2y$10$rOxVGHOC6FDgODVk1j1QKObLC/V8rOsth8jmtnkbNQPHPEu3G3FVa', 'exMdszeziLG0JterkTQB8YQuDnJEK65j3Qe7IQYjgeOHSyxBGEbGZc6uA6fR', '2018-01-17 02:45:03', '2018-01-21 09:30:23'),
(5, 'Charlie brown', 'charliebrown@gmail.com', 2, '$2y$10$KdPNLXWHQi5YH83FJjfDiOt/fEt7uDzFdEf9bFEsQnVyVVmuCD4Qm', NULL, '2018-01-18 03:30:28', '2018-01-18 03:30:28'),
(6, 'Ani Surya Triani', 'anisurya991@gmail.com', 2, '$2y$10$PvhNAs20cvz7bkhd4RUUL.8I/lSLO2cplOoFUrmLQusa7udt5PzxO', '9LIeX8ZEvSGPtMWRLaBZFcXDr4PKI7Coi8Jmcl5bCNt0DgLBpFEwsJ4yIE97', '2018-01-20 00:00:34', '2018-01-20 12:57:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `riset`
--
ALTER TABLE `riset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `riset`
--
ALTER TABLE `riset`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `riset`
--
ALTER TABLE `riset`
  ADD CONSTRAINT `riset_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
