-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 01:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbstore_etalaseonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent`, `name`, `slug`, `meta_description`, `meta_keywords`, `description`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(1, 0, 'Plate', 'plate', 'plate meta description', 'plate, meta, keywords', 'description plate', 'plate.jpg', 'ico-plage.jpg', '2016-12-06 01:17:11', '0000-00-00 00:00:00'),
(2, 0, 'Cup', 'cup', 'cup meta description', 'cup, meta, keywords', 'description cup', 'image-cup.jpg', 'icon-image-cup.jpg', '2016-12-06 01:17:11', '0000-00-00 00:00:00'),
(3, 0, 'Flower Pot', 'flower-pot', 'flower pot meta description', 'flower, pot, meta, keywords', 'description flower pot', 'image-flower-pot.jpg', 'ico-image-flower-pot.jpg', '2016-12-06 01:19:38', '0000-00-00 00:00:00'),
(4, 0, 'Mirror', 'mirror', 'mirror meta description', 'mirror, meta, keywords', 'description mirror', 'image-mirror.jpg', 'ico-image-mirror.jpg', '2016-12-06 01:19:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `reply` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `status`, `reply`, `updated_at`, `created_at`) VALUES
(1, 'MFAdib', '081282839585', 'mfuadadib@gmail.com', 'ini messagenya', 1, 0, '2017-01-11 07:07:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
`id` int(11) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `meta_description`, `meta_keywords`, `title`, `slug`, `description`, `image`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada.', 'Vivamus, suscipit, tortor, eget, felis, porttitor, volutpat. Lorem, ipsum, dolor, sit, amet, consectetur, adipiscing, elit. wsssddd', 'About Us', 'about-us', '<p>It looks even better with you using this text. Whoever evaluates your text cannot evaluate the way you write. People tend to read writing. The standard default text is designed to ramble about nothing. People tend to read writing. I hope you enjoyed the fake text. This text will not appear in a consistent order. I hope you enjoyed the fake text. People tend to read writing. Thank you for using this application. Using default text is a simple way to create the appearance of content without having to create it. Default text is for web developers and designers that need default text quickly.</p><p>Your design looks awesome by the way. Thank you for using this application. A designer can use default text to simulate what text would look like. Using default text is a simple way to create the appearance of content without having to create it. I hope you enjoyed the fake text. This string is randomly  generated. That is preciously how this string was constructed. JavaScript has the awesome power to manipulate DOM elements on the fly. It looks even better with you using this text. After Hours Programming created this application. This string is randomly  generated. I hope you enjoyed the fake text.</p><p>That is preciously how this string was constructed. After Hours Programming created this application. Thank you for using this application. Your design looks awesome by the way. Thank you for using this application. Using default text is a simple way to create the appearance of content without having to create it. People tend to read writing. The standard default text is designed to ramble about nothing. If it is not real text, they will focus on the design. A designer can use default text to simulate what text would look like. This text will not appear in a consistent order. Your design looks awesome by the way.</p><p>The standard default text is designed to ramble about nothing. That is preciously how this string was constructed. People tend to read writing. Default text is for web developers and designers that need default text quickly. That is preciously how this string was constructed. The standard default text is designed to ramble about nothing. I hope you enjoyed the fake text. It looks even better with you using this text. The standard default text is designed to ramble about nothing. JavaScript has the awesome power to manipulate DOM elements on the fly. Using default text is a simple way to create the appearance of content without having to create it. If it is not real text, they will focus on the design.</p>', '', 1, '2017-01-01 22:38:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `exchange_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
`id` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = non-active, 1 = active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>How to register?</p>', '<p>Visit our website in url etalase.com and click menu signup/signin to joins member</p>', 1, '2016-12-10 10:39:23', '2015-06-18 20:47:05'),
(2, '<p>How to login?</p>', '<p>Visit our website in url etalase.com and click menu signin to login member</p>', 1, '2016-12-10 10:39:23', '2015-06-18 20:47:05'),
(3, '<p>apa yang baru?</p>', '<p>ini yang baru</p>', 1, '2017-01-02 00:20:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_11_26_161501_create_currency_table', 1),
('2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `meta_description`, `meta_keywords`, `title`, `slug`, `brief`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 'contoh berita', 'contoh berita', 'Khasiat biji kopi', 'khasiat-biji-kopi', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', '<p>Default text is for web developers and designers that need default text quickly. However, standard default text can do the trick. Your design looks awesome by the way. A designer can use default text to simulate what text would look like. Thank you for using this application. Default text is for web developers and designers that need default text quickly. Humans are creative beings.</p>  <p>Default text creates the illusion of real text. I hope you enjoyed the fake text. Humans are creative beings. This text will not appear in a consistent order. This text will not appear in a consistent order. Default text is for web developers and designers that need default text quickly. A designer can use default text to simulate what text would look like.</p>  <p>This string is randomly  generated. Default text is for web developers and designers that need default text quickly. Your design looks awesome by the way. The standard default text is designed to ramble about nothing. The standard default text is designed to ramble about nothing. However, standard default text can do the trick. This text will not appear in a consistent order.</p>  <p>Your design looks awesome by the way. Thank you for using this application. It looks even better with you using this text. A designer can use default text to simulate what text would look like. However, standard default text can do the trick. This text will not appear in a consistent order. That is preciously how this string was constructed.</p>', 'khasiat-biji-kopi.jpeg', '2016-12-19 16:45:45', '0000-00-00 00:00:00'),
(2, 4, 'contoh berita kedua', 'contoh berita kedua', 'Manfaat membaca buku diwaktu subuh', 'manfaat-membaca-buku-diwaktu-subuh', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', '<p>If it is not real text, they will focus on the design. Default text creates the illusion of real text. Default text is for web developers and designers that need default text quickly. Default text is for web developers and designers that need default text quickly. It looks even better with you using this text. This string is randomly  generated. Using default text is a simple way to create the appearance of content without having to create it. People tend to read writing. Your design looks awesome by the way. Default text creates the illusion of real text. However, standard default text can do the trick. People tend to read writing. Humans are creative beings. However, standard default text can do the trick. It looks even better with you using this text. Whoever evaluates your text cannot evaluate the way you write.</p><p>Humans are creative beings. People tend to read writing. This string is randomly  generated. Default text creates the illusion of real text. JavaScript has the awesome power to manipulate DOM elements on the fly. If it is not real text, they will focus on the design. After Hours Programming created this application. The standard default text is designed to ramble about nothing. A designer can use default text to simulate what text would look like. Thank you for using this application. This string is randomly  generated. This string is randomly  generated. Your design looks awesome by the way. This string is randomly  generated. Default text creates the illusion of real text. People tend to read writing.</p><p>After Hours Programming created this application. That is preciously how this string was constructed. If it is not real text, they will focus on the design. This text will not appear in a consistent order. The standard default text is designed to ramble about nothing. I hope you enjoyed the fake text. JavaScript has the awesome power to manipulate DOM elements on the fly. Your design looks awesome by the way. It looks even better with you using this text. That is preciously how this string was constructed. If it is not real text, they will focus on the design. The standard default text is designed to ramble about nothing. If it is not real text, they will focus on the design. It looks even better with you using this text. If it is not real text, they will focus on the design. People tend to read writing.</p><p>Whoever evaluates your text cannot evaluate the way you write. Using default text is a simple way to create the appearance of content without having to create it. After Hours Programming created this application. Whoever evaluates your text cannot evaluate the way you write. It looks even better with you using this text. A designer can use default text to simulate what text would look like. A designer can use default text to simulate what text would look like. Whoever evaluates your text cannot evaluate the way you write. After Hours Programming created this application. JavaScript has the awesome power to manipulate DOM elements on the fly. If it is not real text, they will focus on the design. Default text is for web developers and designers that need default text quickly. That is preciously how this string was constructed. Humans are creative beings. The standard default text is designed to ramble about nothing. Your design looks awesome by the way.</p><p>A designer can use default text to simulate what text would look like. I hope you enjoyed the fake text. However, standard default text can do the trick. Whoever evaluates your text cannot evaluate the way you write. After Hours Programming created this application. Your design looks awesome by the way. JavaScript has the awesome power to manipulate DOM elements on the fly. Thank you for using this application. Whoever evaluates your text cannot evaluate the way you write. This string is randomly  generated. The standard default text is designed to ramble about nothing. Humans are creative beings. Your design looks awesome by the way. Default text is for web developers and designers that need default text quickly. Thank you for using this application. Using default text is a simple way to create the appearance of content without having to create it.</p>', 'manfaat-membaca-buku-diwaktu-subuh.jpg', '2016-12-19 16:45:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
`id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `parent`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 0, 'Social', 'social', '2016-12-08 14:40:48', '0000-00-00 00:00:00'),
(2, 0, 'Fashion', 'fashion', '2017-01-04 08:59:21', '0000-00-00 00:00:00'),
(3, 0, 'Otomotif', 'otomotif', '2016-12-08 14:40:24', '0000-00-00 00:00:00'),
(4, 0, 'Technology', 'technology', '2016-12-08 14:40:39', '0000-00-00 00:00:00'),
(5, 0, 'Halty', 'halty', '2017-01-01 02:44:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `how_to_buy` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(3) NOT NULL DEFAULT '0' COMMENT '0-100',
  `discount_date` date NOT NULL DEFAULT '0000-00-00',
  `recommended` int(1) NOT NULL DEFAULT '0',
  `special` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `meta_description`, `meta_keywords`, `description`, `how_to_buy`, `cover`, `price`, `discount`, `discount_date`, `recommended`, `special`, `created_at`, `updated_at`) VALUES
(1, 1, 'Piring Pajangan Souvenir Malaysia (Brown)', 'piring-pajangan-souvenir-malaysia-brown', 'Piring pajangan souvenir Malaysia ini adalah Piring bermotif yang bisa diletakkan diatas meja ataupun di dalam lemari pajang. Souvenir ini unik karena ada tulisan Malaysia sehingga bisa sebagai cinderamata jika anda dari negeri jiran tersebut.', 'Piring Pajangan Souvenir Malaysia', 'Piring pajangan souvenir Malaysia ini adalah Piring bermotif yang bisa diletakkan diatas meja ataupun di dalam lemari pajang. Souvenir ini unik karena ada tulisan Malaysia sehingga bisa sebagai cinderamata jika anda dari negeri jiran tersebut.\r\n\r\nSouvenir ini sangat menarik untuk dipakai sehari-hari atau bisa juga dijadikan sebagai hadiah buat seseorang yang anda senangi dan sayangi.', 'how to buy description', 'piring-pajangan-souvenir-malaysia-brown.jpg', 93000, 20, '2017-01-15', 1, 0, '2017-01-01 10:56:07', '0000-00-00 00:00:00'),
(3, 1, 'PIRING PAJANGAN GREAT WALL', 'PIRING-PAJANGAN-GREAT-WALL-UNTUK-SOUVENIR-DUNIA-TERLARIS', 'PIRING PAJANGAN GREAT WALL UNTUK SOUVENIR DUNIA TERLARIS', 'PIRING PAJANGAN GREAT WALL UNTUK SOUVENIR DUNIA TERLARIS', 'Untuk Kelengkapan barang silahkan PM atau tlp untuk mengetahui barang yg readyterima kasih	\r\n\r\nSouvenirmancanegara•com\r\nMenjual kaos oleh2 dari Berbagai Negara, gantungan kunci, magnet kulkas, asbak, snowglobe, tempelan kulkas, gelas, miniatur, diecast pesawat, tempat kartu nama, replica mancanegara, piring porcelain, kayu, resin. Yang cocok di jadikan souvenir, buah tangan, cinderamata untuk teman, keluarga, sahabat ataupun pacar ^^. Barang ready stock dari Asia, Amerika, Afrika, Eropa, Australia: \r\n\r\nAfrika Alaska Amerika Arabsaudi Argentina Australia Austria Belanda Belgia Brasil Bosnia Bruneidarussalam Bhutan Bulgaria Canada Ceko Chili China Cyprus Denmark Dubai Ekuador Finlandia Filipina Germany Hongkong Hongaria India Indonesia Inggris Iran Irlandia Israel Italia Jepang Jerusalem Jordania Kamboja Korea Laos Luksemburg Malaysia Malta Mesir Mexico Monaco Mongolia Morocco Montenegro Nepal Newzealand Norwegia Palestina Perancis Peru Portugal Qatar Rusia Sanmarino Scotlandia Singapore Spanyol Swedia Swiss Taiwan Thailand Tunisia Turki Venezuela Vietnam Yunani Zimbabwe\r\n\r\nOur Goals is to make your trip easier ^_^\r\n\r\nBelinya banyak, males dikirim-kirim atau gapercaya juga. dateng aja langsung ke gudangnya Souvenir Mancanegara di Dasana Indah , Tangerang (dekat Summarecon Mall Serpong)\r\n\r\nAlamat:\r\nPerumahan dasana indah Blok PP5 No.3-5, Tangerang 15821 (belakang sumarecon mal serpong)\r\nTlp/WA: 081219122244 (Fast Response)\r\n\r\nJam operasional: Senin-Sabtu 09:00 17:00 (diluar jam itu late response / dibalas besoknya)\r\n\r\nPengiriman Via JNE (Jne•co•id)', 'how to buy description', 'piring-pajangan.jpg', 250000, 0, '0000-00-00', 1, 0, '2016-12-19 11:05:01', '0000-00-00 00:00:00'),
(4, 1, 'Set Piring Keroppi Melamin', 'set-piring-keroppi-melamin', 'Set Piring Keroppi Melamin', 'Set Piring Keroppi Melamin', 'Set Piring Melamin dengan karakter Keroppi lucu dan Unik.', 'how to buy description', 'set-piring-keroppi-melamin.png', 193700, 0, '0000-00-00', 1, 0, '2016-12-19 08:13:01', '0000-00-00 00:00:00'),
(5, 2, 'Cantik 1 Set Cangkir Vicenza Cup and Saucer 15 Pcs Motif Lili Bagus', 'cantik-1-set-cangkir-vicenza-cup-and-saucer-15-pcs-motif-lili-bagus', 'Cantik 1 Set Cangkir Vicenza Cup and Saucer 15 Pcs Motif Lili Bagus', 'Cantik 1 Set Cangkir Vicenza Cup and Saucer 15 Pcs Motif Lili Bagus', 'Vicenza Cup and Saucer C78 Cangkir Set *motif Lili* (15 pcs)\r\nDengan desain motif Lili yang menarik dari Vicenza, Anda dapat menggunakan produk ini sebagai penyajian minuman untuk tamu yang berkunjung ke rumah Anda. Anda juga dapat menggunakan untuk menyajikan minuman di teras rumah Anda saat santai.\r\n\r\nDimensi dalam cm : 18x17x29\r\n\r\nDigunakan untuk : \r\n*Kopi, susu, kopi jahe\r\n*Penyajian teh di sore hari\r\n\r\nTerdiri dari :\r\n6 buah cangkir (200 ml)\r\n6 buah lepek\r\n1 buah rak\r\n1 buah teko (950 ml)\r\n1 buah tutup', 'how to buy description', 'cantik-1-set-cangkir-vicenza-cup-and-saucer-15-pcs-motif-lili-bagus.jpg', 355000, 0, '0000-00-00', 1, 0, '2016-12-19 08:13:05', '0000-00-00 00:00:00'),
(6, 2, 'Dessert Cup (4) Tupperware gelas es krim cream cantik', 'dessert-cup-4-tupperware-gelas-es-krim-cream-cantik', 'Dessert Cup (4) Tupperware gelas es krim cream cantik', 'Dessert Cup (4) Tupperware gelas es krim cream cantik', 'Dessert Cup (4) adalah wadah unik yang digunakan sebagai wadah penyajian dessert seperti es krim, cocktail, kolak dll. \r\n\r\n@175ml / : 13.3 cm; t: 7.7 cm', 'how to buy description', 'dessert-cup-4-tupperware-gelas-es-krim-cream-cantik.jpg', 145000, 0, '0000-00-00', 0, 1, '2016-12-19 08:13:08', '0000-00-00 00:00:00'),
(7, 2, 'Night Light Romantic Coffe Cup Lampu Meja Lucu Cantik 2H69', 'night-light-romantic-coffe-cup-lampu-meja-lucu-cantik-2H69', 'Night Light Romantic Coffe Cup Lampu Meja Lucu Cantik 2H69', 'Night Light Romantic Coffe Cup Lampu Meja Lucu Cantik 2H69', '- Outstanding DIY coffee mug shape design for the light\r\n\r\n- With three different cups, moveable and free to DIY your own type\r\n\r\n- Energy-saving, powered by 3*AAA battery(not included) or USB cable(included)\r\n\r\n- Build-in 8 LED bulbs, long lifetime and low power consumption\r\n\r\n- Wonderful night light for you and your family \r\n\r\n\r\n\r\nSpecifications:\r\n\r\nMaterial: Plastic\r\n\r\nBase Color: Brown &amp; white\r\n\r\nBase size: approx. 78*78*235mm(L*W*H)\r\n\r\n\r\n\r\nNote:\r\n\r\n- Terdapat 3 Paper Cup dan yg polos dpt buat kreasi sendiri dgn spidol/kuas acrylic\r\n\r\n- Paper Cup dapat di ganti dgn paper cup apa saja yg ada dipasaran, jadi tiap hari kita bisa ganti2 paper cup sesuka hati\r\n\r\n- Sangat cantik utk menghiasi meja kantor ataupun meja belajar\r\n\r\n- Disarankan utk tidak menggunakan battery pd saat menggunakan kabel USB (gunakan salah satu saja)\r\n\r\n- Aman untuk anak2 krn menggunakan LED sehingga daya yg dipergunakan tidak besar\r\n\r\n- dpt dipergunakan sbg lampu emergency krn bisa memakai battery AAA\r\n\r\n\r\n\r\n#coffeecup #lamputidur #lampubelajar #lampuunik #lampu #dusit #emergency #dekorasi #furniture #homestuff #rumah #perabot #lampuled', 'how to buy description', 'night-light-romantic-coffe-cup-lampu-meja-lucu-cantik-2H69.png', 89500, 0, '0000-00-00', 0, 1, '2016-12-19 08:13:10', '0000-00-00 00:00:00'),
(8, 2, 'GELAS CANGKIR SHABBY BUNGA CANTIK TEACUP KERAMIK', 'gelas-cangkir-shabby-bunga-cantik-teacup-keramik', 'GELAS CANGKIR SHABBY BUNGA CANTIK TEACUP KERAMIK', 'GELAS CANGKIR SHABBY BUNGA CANTIK TEACUP KERAMIK', '1 box = 6 cup + 6 saucer\r\nKapasitas 150 ml\r\nDiameter Saucer : 13 cm\r\nCup Tinggi : 5,5 cm Diameter: 8 cm\r\nBahan : Keramik', 'how to buy description', 'GELAS-CANGKIR-SHABBY-BUNGA-CANTIK-TEACUP-KERAMIK.jpg', 250000, 0, '0000-00-00', 0, 1, '2016-12-19 08:13:13', '0000-00-00 00:00:00'),
(23, 2, 'mesmwecheck', 'mesmwecheck', 'mesmwecheck', 'mesmwecheck', 'mesmwecheck', 'mesmwecheck', 'mesmwecheck.jpg', 890000, 0, '0000-00-00', 1, 1, '2017-01-02 03:07:17', '2017-01-01 19:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `idx` int(11) NOT NULL DEFAULT '0' COMMENT 'idx untuk index',
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `idx`, `image`, `created_at`, `updated_at`) VALUES
(5, 19, 1, 'images/products/new-plate-product/thumbnail1-new-plate-product-1483272141.jpg', '2017-01-01 12:02:22', '0000-00-00 00:00:00'),
(6, 19, 2, 'images/products/new-plate-product/thumbnail2-new-plate-product-1483272142.jpg', '2017-01-01 12:02:22', '0000-00-00 00:00:00'),
(7, 19, 3, 'images/products/new-plate-product/thumbnail3-new-plate-product-1483272142.jpg', '2017-01-01 12:02:22', '0000-00-00 00:00:00'),
(8, 19, 4, 'images/products/new-plate-product/thumbnail4-new-plate-product-1483272142.jpg', '2017-01-01 12:02:22', '0000-00-00 00:00:00'),
(9, 23, 1, 'images/products/mesmwecheck/thumbnail1-mesmwecheck-1483324154.jpg', '2017-01-02 02:29:14', '0000-00-00 00:00:00'),
(10, 23, 2, 'images/products/mesmwecheck/thumbnail2-mesmwecheck-1483324154.jpg', '2017-01-02 02:29:14', '0000-00-00 00:00:00'),
(11, 23, 3, 'images/products/mesmwecheck/thumbnail3-mesmwecheck-1483324154.jpg', '2017-01-02 02:29:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_wishlist`
--

CREATE TABLE IF NOT EXISTS `product_wishlist` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_wishlist`
--

INSERT INTO `product_wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 6, 1, '2015-05-12 16:46:04', '2015-05-12 16:46:04'),
(5, 6, 3, '2016-12-10 13:28:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `author`, `meta_description`, `meta_keywords`, `title`, `subtitle`, `about`, `phone`, `email`, `facebook`, `googleplus`, `twitter`, `instagram`, `linkedin`, `icon`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Adib', 'Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Donec sollicitudin, molestie malesuada, Lorem, ipsum dolor, sit amet, consectetur adipiscing, elit.', 'Benhul Store', 'your partner store', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus.', '0987-4747-4747', 'emailetalase@online.com', 'http://fb.com/etalaseonline', 'http://googleplus.com/etalaseonline', 'http://tw.com/etalaseonline', 'http://ig.com/etalaseonline', 'http://linkedin.com/etalaseonline', 'logo.jpg', 1, '2016-12-31 23:28:39', '2016-12-30 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quality_product` int(1) NOT NULL COMMENT '1 = very bad, 2 = bed, 3 = netral, 4 = good, 5 = very good',
  `quality_service` int(1) NOT NULL COMMENT '1 = very bad, 2 = bed, 3 = netral, 4 = good, 5 = very good',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `quality_product`, `quality_service`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 7, 6, 4, 5, 'very goooooooood', 1, '2016-12-06 15:24:58', '0000-00-00 00:00:00'),
(4, 7, 1, 4, 5, 'very goooooooood', 1, '2017-01-01 15:21:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
`id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `status`, `updated_at`, `created_at`) VALUES
(1, 'slider1.jpg', 1, '2017-01-02 01:06:03', '0000-00-00 00:00:00'),
(2, 'slider2.jpg', 1, '2016-12-19 08:15:06', '0000-00-00 00:00:00'),
(4, 'sTkKKBdEIG2qLLH-1483318488.jpeg', 1, '2017-01-02 01:01:10', '0000-00-00 00:00:00'),
(5, 'WbNxQzvv3yZLfV5-1483319088.jpg', 1, '2017-01-02 01:04:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE IF NOT EXISTS `subscribes` (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unique_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = nonaktif, 1 = aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `unique_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mfuadadib@yahoo.com', 'f90Txi2fIYWUDiv', 1, '2015-09-05 03:40:13', '2015-09-04 20:39:38'),
(2, 'mfuadadib@gmail.com', 'f90vvi2fIYWUDiv', 1, '2015-09-05 03:40:13', '2015-09-04 20:39:38'),
(3, 'mfadibdev@gmail.com', '', 0, '2017-01-02 03:11:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `testimony` text NOT NULL,
  `rate` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `testimony`, `rate`, `status`, `updated_at`, `created_at`) VALUES
(1, 6, 'Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', 0, 1, '2017-01-11 06:14:45', '0000-00-00 00:00:00'),
(2, 1, 'Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', 0, 1, '2017-01-11 06:14:54', '0000-00-00 00:00:00'),
(3, 8, 'Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', 0, 1, '2017-01-05 01:38:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0=member, 1 = admin',
  `actived` int(1) NOT NULL DEFAULT '0',
  `confirm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `status`, `actived`, `confirm`, `created_at`, `updated_at`) VALUES
(1, 'MFAdib', 'mfadibdev@gmail.com', '$2y$10$DqxlYFalsx/Slub4yBZ5e..cGtaEWP0jpfZId/MDiorHqUfIWsmhW', 'jUgzLuHgZJGarULoWOZPWSX8r68cbuLY7oxsxuPi3Yba4PpBOHhb45SBD5nb', 1, 1, '', '2015-09-18 17:00:00', '2017-01-11 03:15:17'),
(6, 'Adib', 'mfuadadib@gmail.com', '$2y$10$L8.zPP6HxPTEi49OqDu/1OW6stSnTm0VhwqTrZnG/pDS5Qa.nwBqq', 'rO4TDGzk0uiiKVWmN1ZS4kfu4uqTACIFzF9A1airM2lyr8toJ5wOnKpMhpV5', 0, 1, '', '0000-00-00 00:00:00', '2016-12-30 17:18:44'),
(8, 'mfadib', 'mfuadadib@yahoo.com', '$2y$10$GUcbP/1dwKMobSIOl.7NgOsjFazau15kaQYvsEzVTqEVYwrdtfXWe', NULL, 0, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
 ADD PRIMARY KEY (`id`), ADD KEY `currencies_code_index` (`code`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_wishlist`
--
ALTER TABLE `product_wishlist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_wishlist`
--
ALTER TABLE `product_wishlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
