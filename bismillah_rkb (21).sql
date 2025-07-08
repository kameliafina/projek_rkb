-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2025 pada 20.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bismillah_rkb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_penyiar` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ket_foto` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `kategori_id` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `nama_penyiar`, `judul`, `deskripsi`, `foto`, `ket_foto`, `views`, `kategori_id`, `created_at`, `updated_at`, `slug`) VALUES
(4, 'aaaaa', 'Laris Manis! Film Jumbo Tembus 6 Juta Penonton Detik Pagi Laris Manis! Film Jumbo Tembus 6 Juta Penonton', 'coba ganti', '1745166118_9ac2ca49bdbf04124d99.png', 'aaaaa', 14, 3, '2025-04-20 16:21:58', '2025-06-16 10:04:44', ''),
(5, 'aaaaaa', 'aaaaaa', 'aaaaaaaa', '1746364212_5402afedf27360c9f9e7.jpg', 'aaaaa', 18, 2, '2025-04-20 16:22:42', '2025-06-04 09:46:19', ''),
(7, 'aaa', 'aaa', 'aaa', '1745381227_04814e887731daf9374e.png', 'aaa', 20, 1, '2025-04-23 04:07:07', '2025-05-04 13:17:00', ''),
(8, 'a', 'aaa', 'aaaa', '1746364961_2165446fab4ab6ee8885.jpg', 'aaa', 6, 4, '2025-04-23 05:15:13', '2025-05-04 13:22:48', ''),
(9, 'fina', 'Berdiri di Atas Tanah Lunak, Ibu Kota Baru Myanmar Bakal Dirombak  ', 'BBC telah melihat bukti yang mengindikasikan sekitar 70% bangunan pemerintah rusak akibat gempa di ibu kota Naypyidaw. Beberapa kantor dilaporkan telah dipindahkan ke Yangon.\r\n\r\nGedung-gedung perkantoran akan dibangun kembali dan harus tahan gempa bumi di masa depan, katanya. Pengujian terhadap tanah juga dilakukan sebelum pembangunan kembali dilakukan.', '1745385466_edcf727cd14b2410a0b5.png', 'myanmar', 27, 4, '2025-04-23 05:17:46', '2025-06-17 09:52:05', ''),
(10, 'etetetetetet', 'tetetetetete', 'lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1745385546_c41f9bf18d2d8d5f596e.jpeg', 'pekalongan', 20, 1, '2025-04-23 05:19:06', '2025-05-06 08:14:50', ''),
(11, 'fina', 'lorem ipsum', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '1746494364_3d6880f0de436290c7cf.jpg', 'foto berita 1', 42, 1, '2025-05-06 08:19:24', '2025-06-18 09:53:19', ''),
(12, 'aaaaaa', 'aaaaaaaa', 'aaaaaaaaa', '1747712455_95c16b63eb5e5f7ed0e1.jpg', 'aaaaaaaaaaa', 14, 5, '2025-05-20 10:40:55', '2025-06-13 09:55:04', ''),
(13, 'fina', 'Bukan Sembako, Warga Kini Minta \'Satu Rumah Satu Mingyu\' Jadi Program Nasional', 'Di tengah tekanan hidup yang semakin kompleks, banyak orang mulai mencari sumber semangat baru yang sederhana namun bermakna. Gerakan “Satu Rumah Satu Mingyu” hadir sebagai bentuk dukungan emosional melalui sosok yang memberi inspirasi: Kim Mingyu, anggota grup SEVENTEEN.\r\n\r\nMingyu bukan hanya dikenal karena penampilannya yang karismatik, tetapi juga karena kepribadiannya yang hangat, pekerja keras, dan rendah hati. Sosoknya menghadirkan aura positif yang bisa menyemangati siapa pun, bahkan hanya melalui poster di dinding kamar atau klip video pendek di pagi hari.\r\n\r\nGerakan ini percaya bahwa menghadirkan “figur semangat” di rumah, dalam bentuk apapun, bisa membantu mengurangi stres, membangun mood yang lebih baik, dan menjadi pengingat bahwa kita tidak sendiri dalam perjuangan. Kita butuh Mingyu—bukan sebagai selebritas semata, tetapi sebagai simbol bahwa kebaikan, kerja keras, dan senyum tulus masih ada di dunia ini.\r\n\r\nKarena kadang, yang kita perlukan untuk bangkit setiap hari hanyalah satu senyum tulus. Satu semangat baru. Satu Mingyu di rumah kita.', '1749785447_f2a95f5e388c77d9726c.jpg', 'mingyu tampan memesona', 16, 3, '2025-06-13 10:30:47', '2025-06-23 08:43:27', ''),
(14, 'aaa', 'aaa', 'aaaa', '1750038974_6ccaa34adef72f764c2a.jpg', 'aaa', 1, 4, '2025-06-16 08:56:14', '2025-06-23 09:09:42', ''),
(15, 'aaa', 'aaa', 'aaa', '1750645425_243880ec7ccc2d60e555.jpg', 'aaa', 0, 1, '2025-06-23 09:23:45', '2025-06-23 09:23:45', ''),
(16, 'aaaaa', 'aaaaaa', 'aaaaaaaa', '1750645692_51137f055f8088d1e00f.jpg', 'aaaaa', 10, 5, '2025-06-23 09:28:12', '2025-06-25 11:32:33', 'aaaaaa'),
(17, 'fina', 'Bukan Sembako, Warga Kini Minta \'Satu Rumah Satu Mingyu\' Jadi Program Nasional', 'Di tengah tekanan hidup yang semakin kompleks, banyak orang mulai mencari sumber semangat baru yang sederhana namun bermakna. Gerakan “Satu Rumah Satu Mingyu” hadir sebagai bentuk dukungan emosional melalui sosok yang memberi inspirasi: Kim Mingyu, anggota grup SEVENTEEN. Mingyu bukan hanya dikenal karena penampilannya yang karismatik, tetapi juga karena kepribadiannya yang hangat, pekerja keras, dan rendah hati. Sosoknya menghadirkan aura positif yang bisa menyemangati siapa pun, bahkan hanya melalui poster di dinding kamar atau klip video pendek di pagi hari. Gerakan ini percaya bahwa menghadirkan “figur semangat” di rumah, dalam bentuk apapun, bisa membantu mengurangi stres, membangun mood yang lebih baik, dan menjadi pengingat bahwa kita tidak sendiri dalam perjuangan. Kita butuh Mingyu—bukan sebagai selebritas semata, tetapi sebagai simbol bahwa kebaikan, kerja keras, dan senyum tulus masih ada di dunia ini. Karena kadang, yang kita perlukan untuk bangkit setiap hari hanyalah satu senyum tulus. Satu semangat baru. Satu Mingyu di rumah kita.', '1750653390_ab9f14aac0091ce1c0a8.jpg', 'mingyu', 20, 3, '2025-06-23 11:36:30', '2025-06-26 10:55:49', 'bukan-sembako-warga-kini-minta-satu-rumah-satu-mingyu-jadi-program-nasional'),
(18, 'mingyu', 'judul', 'lorem ipsum', '1750820880_07582e0a7aba20c8bd23.jpg', 'lorem', 0, 1, '2025-06-25 10:08:00', '2025-06-25 10:08:00', 'judul'),
(19, 'fina', 'bukan apa apa', 'apa apa', '1750820925_3bd0f689a7574881bca0.jpg', 'aaa', 7, 2, '2025-06-25 10:08:45', '2025-06-26 10:59:48', 'bukan-apa-apa'),
(21, 'hhhhh', 'hhhh', 'hhhhh', '1750821050_cd8bec1d0603b720d8af.jpg', 'hhhhh', 14, 4, '2025-06-25 10:10:50', '2025-06-26 09:35:38', 'hhhh'),
(22, 'fina', 'Bukan Sembako, Warga Kini Minta \'Satu Rumah Satu Mingyu\' Jadi Program Nasional', 'aaaa', '1750826888_fe403f2a3d6e61089651.jpg', 'lorem', 0, 3, '2025-06-25 11:48:08', '2025-06-25 11:48:08', 'bukan-sembako-warga-kini-minta-satu-rumah-satu-mingyu-jadi-program-nasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_foto`
--

CREATE TABLE `berita_foto` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_penyiar` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ket_foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita_foto`
--

INSERT INTO `berita_foto` (`id`, `nama_penyiar`, `judul`, `deskripsi`, `foto`, `ket_foto`, `created_at`, `updated_at`, `slug`) VALUES
(2, 'coba', 'coba', 'coba', '1745463201_244e2faa45b2cd669daf.jpg', 'kkk', '2025-04-21 03:37:01', '2025-04-24 02:53:21', ''),
(3, 'aaaaa', 'astaga tri agus menjadi kepala upt', 'aaaa', '1745463227_97848ff123196447fa1d.jpg', 'fff', '2025-04-21 03:39:57', '2025-04-24 02:53:47', ''),
(4, 'a', 'a', 'a', '1745463246_b264b25cb010aca50c4e.jpg', 'a', '2025-04-21 03:40:41', '2025-04-24 02:54:06', ''),
(5, 'mingyu', 'judul', 'jajajjajaja', '1750653065_83eb1f643510b5b1643c.jpg', 'aaaaaaaa', '2025-06-23 11:31:05', '2025-06-23 11:31:05', 'judul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `historia`
--

CREATE TABLE `historia` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_penyiar` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ket_foto` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `historia`
--

INSERT INTO `historia` (`id`, `nama_penyiar`, `judul`, `deskripsi`, `foto`, `ket_foto`, `audio`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'aaa', 'aa', 'aa', 'aaa', 'aaa', '', NULL, NULL, ''),
(2, 'sss', 'ssss', 'ssss', 'berita3.jpeg', 'sss', '', NULL, NULL, ''),
(3, 'mingyuuuuuu', 'sejarah kota pekalongan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1746415064_a1606f34bf9f1ae879ed.jpg', 'foto pekalongan2', '', '2025-05-05 03:17:44', '2025-05-05 10:25:54', ''),
(4, 'aaa', 'aaa', 'aaa', '1746415589_d1138eeb2604d382c89f.jpg', 'aaa', '', '2025-05-05 10:26:29', '2025-05-05 10:26:29', ''),
(5, 'aaaaaa', 'aaa', 'aaaa', '1746410746_1718b1a8f26b62c8ab5b.jpg', 'aaaa', '', '2025-05-05 09:05:46', '2025-05-05 09:06:05', ''),
(6, 'aa', 'aa', 'aaa', '1747709031_8c185a321006f0c475af.jpg', 'aaaa', '', '2025-05-20 09:43:51', '2025-05-20 09:43:51', ''),
(7, 'ssss', 'sss', 'ssss', '1747709747_1f25fff3d4a8f9598aac.jpg', 'ssss', '', '2025-05-20 09:55:47', '2025-05-20 10:02:30', ''),
(8, 'coba', 'sejarah kota pekalongan', 'aaaaaaaaaaassssssssssssssss', '1748935061_ee28aa52a832ec0d2ad5.jpeg', 'aaaaaa', '1748935061_9ae3768db679eeb984da.mp3', '2025-06-03 14:17:41', '2025-06-03 14:17:41', ''),
(9, 'fina', 'Bukan Sembako, Warga Kini Minta \'Satu Rumah Satu Mingyu\' Jadi Program Nasional', 'Bukan Sembako, Warga Kini Minta \'Satu Rumah Satu Mingyu\' Jadi Program Nasional', '1750654178_2c709b542328fbe81cf0.jpg', 'mingyu', '1750653937_1fd6ef7df5bccc465f35.mp3', '2025-06-23 11:45:37', '2025-06-23 11:49:38', 'bukan-sembako-warga-kini-minta-satu-rumah-satu-mingyu-jadi-program-nasional'),
(10, 'fina', 'Goodbye Letter From Mary', 'My Dear Arthur, You never showed up, and now, after looking at the newspapers I understand why. I don\'t imagine you will receive this letter but I nonetheless must send it. Arthur, oh, Arthur. I was just starting to dream the silliest and softest of dreams. I miss you, and I will always miss you but I cannot live like that, and it seems you cannot live any other way.\r\n\r\nWhen I am with you, the world makes sense but when we are apart, I see clearly that your world is not a world from which one can escape. I am so sorry, for everything long ago and for starting up that business again. There\'s a good man within you, Arthur but he is wrestling with a giant. And the giant, wins, time and again. You\'ve broken my heart, again and I fear I have broken yours.\r\n\r\nFor that, I will never forgive myself but you must let me go now. I enclose a ring you gave me many years ago, when we were both young, not because I don\'t like it, but because I care for it far too much and it reminds me too much of you. I hope, one day you will find some people in love who can use this, for it kept me thinking of you all these years, and I hope by returning it to you I can finally be free.\r\n\r\nGoodbye Mary\r\n\r\n', '1750654922_f610fe6eef1bfca5cbef.jpg', 'arthur', '1750654922_daf8237e66af38cbd063.mp3', '2025-06-23 12:02:02', '2025-06-23 12:02:02', 'goodbye-letter-from-mary'),
(11, 'fina', 'judul', 'kakakakka', '1750826996_f7f2d1a6e14475e203fe.jpg', 'lorem', NULL, '2025-06-25 11:49:56', '2025-06-25 11:49:56', 'judul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `historia_detail`
--

CREATE TABLE `historia_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `historia_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `historia_detail`
--

INSERT INTO `historia_detail` (`id`, `historia_id`, `foto`, `deskripsi`) VALUES
(1, 6, '1747709031_cf725c54f0e3e763d4bc.jpg', 'aaaa'),
(2, 7, '1747709747_ff59932aca71b944efad.jpg', 'sss'),
(3, 7, '1747709747_ca619d4fbaeace5e397c.jpg', 'ssss'),
(4, 7, '1747710150_d08737a6c6c0c4b70783.jpg', 'tambah1'),
(5, 9, '1750653937_d3f8fb601abba2e4892c.jpg', 'Di tengah tekanan hidup yang semakin kompleks, banyak orang mulai mencari sumber semangat baru yang sederhana namun bermakna. Gerakan “Satu Rumah Satu Mingyu” hadir sebagai bentuk dukungan emosional melalui sosok yang memberi inspirasi: Kim Mingyu, anggota grup SEVENTEEN. Mingyu bukan hanya dikenal karena penampilannya yang karismatik, tetapi juga karena kepribadiannya yang hangat, pekerja keras, dan rendah hati. Sosoknya menghadirkan aura positif yang bisa menyemangati siapa pun, bahkan hanya melalui poster di dinding kamar atau klip video pendek di pagi hari. Gerakan ini percaya bahwa menghadirkan “figur semangat” di rumah, dalam bentuk apapun, bisa membantu mengurangi stres, membangun mood yang lebih baik, dan menjadi pengingat bahwa kita tidak sendiri dalam perjuangan. Kita butuh Mingyu—bukan sebagai selebritas semata, tetapi sebagai simbol bahwa kebaikan, kerja keras, dan senyum tulus masih ada di dunia ini. Karena kadang, yang kita perlukan untuk bangkit setiap hari hanyalah satu senyum tulus. Satu semangat baru. Satu Mingyu di rumah kita.'),
(6, 11, '1750826996_6012e35d4d6c318c17f8.jpg', 'aaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id` int(5) UNSIGNED NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id`, `foto`, `deskripsi`) VALUES
(2, '1745472978_1804ebfeb53186d11042.jpg', 'ukuran 19:6'),
(3, '1745470686_08a7e7d1ff291f2dcb84.jpg', 'ukuran 1:1'),
(4, '1745472822_565d335df45a284808bb.jpg', 'ukuran 1:1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ilm`
--

CREATE TABLE `ilm` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ilm`
--

INSERT INTO `ilm` (`id`, `judul`, `keterangan`, `gambar`, `audio`, `created_at`) VALUES
(5, 'sejarah kota pekalongan', 'aaa', '1749006127_b9780da4a13960ff6129.jpg', '1749006226_c5dd782cddca822e6a27.mp3', '2025-06-03 10:31:23'),
(8, 'sssss', 'ssssssss', '1748923633_7ffd5f7e506bc961c331.jpg', '1748923633_f39f7ffcf065ffb487a5.mp3', '2025-06-03 11:07:13'),
(9, 'coba', 'll', '1748924503_d615ff699660f543ca68.jpg', '1748924503_8f952490a88d807764bc.mp3', '2025-06-03 11:21:43'),
(10, 'sejarah kota pekalongan', 'dinas kominfo', '1748925666_4949ff0af942a8509d05.jpg', '1748925666_78b07c5df8d85c2ba012.mp3', '2025-06-03 11:41:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infografis`
--

CREATE TABLE `infografis` (
  `id` int(5) UNSIGNED NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `infografis`
--

INSERT INTO `infografis` (`id`, `foto`) VALUES
(9, '1745467182_7743e35d191474c31e5b.png'),
(10, '1745467188_a00228ce8783490cd9d4.png'),
(11, '1745467195_98c5330c23e355d86eb8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(5) UNSIGNED NOT NULL,
  `jam` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pembawa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `jam`, `judul`, `pembawa`) VALUES
(3, '07.00-09.00', 'pagi ceria', 'mingyu'),
(6, '07.00-09.00', 'lorem ipsum', 'ipsum'),
(7, '10.00-11.00', 'coba', 'lorem'),
(8, '07.00-09.00', 'coba', 'mingyu'),
(12, '09.00 - 10.00', 'judul', 'fina');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_kategori_b` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama_kategori_b`) VALUES
(1, 'Kota Pekalongan'),
(2, 'Jawa Tengah'),
(3, 'Nasional'),
(4, 'Internasional'),
(5, 'Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_lifestyle`
--

CREATE TABLE `kategori_lifestyle` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_kategori_l` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_lifestyle`
--

INSERT INTO `kategori_lifestyle` (`id`, `nama_kategori_l`) VALUES
(1, 'wisata'),
(2, 'hiburan'),
(3, 'kesehatan'),
(4, 'tips dan trik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `target_id` int(11) NOT NULL,
  `target_type` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `komentar`, `target_id`, `target_type`, `created_at`) VALUES
(1, 'aaaaa', 'coba', 9, 'berita', '2025-06-13 09:43:47'),
(2, 'fina', 'coba', 9, 'berita', '2025-06-13 09:44:08'),
(3, 'fina', 'coba', 9, 'berita', '2025-06-13 09:47:15'),
(4, 'fina', 'coba', 9, 'berita', '2025-06-13 09:47:34'),
(5, 'fina', 'coba', 9, 'berita', '2025-06-13 09:49:22'),
(6, 'fina', 'coba', 9, 'berita', '2025-06-13 09:49:35'),
(7, 'fina', 'aaaa', 9, 'berita', '2025-06-13 09:49:55'),
(8, 'fina', 'coba2', 12, 'berita', '2025-06-13 09:52:03'),
(9, 'sekala', 'aaaaa', 12, 'berita', '2025-06-13 09:52:18'),
(10, 'aaa', 'aaaaaaaa', 9, 'berita', '2025-06-13 09:55:24'),
(11, 'fina', 'coba lagii', 3, 'lifestyle', '2025-06-13 10:15:35'),
(12, 'aaaa', 'coba', 3, 'lifestyle', '2025-06-13 10:16:56'),
(13, 'fina', 'cobaaaa', 2, 'lifestyle', '2025-06-13 10:17:51'),
(14, 'fina', 'cba', 2, 'lifestyle', '2025-06-13 10:19:47'),
(15, 'fina', 'coba lagi ya', 8, 'historia', '2025-06-13 10:22:35'),
(16, 'fina', 'coba', 21, 'berita', '2025-06-25 11:41:48'),
(17, 'aa', 'aa', 17, 'berita', '2025-06-26 08:38:24'),
(18, 'aaa', 'aaa', 17, 'berita', '2025-06-26 08:42:33'),
(19, 'qqq', 'qqq', 11, 'historia', '2025-06-26 08:44:57'),
(20, 'fina', 'aaa', 17, 'berita', '2025-06-26 09:45:02'),
(21, 'fina', 'aaa', 19, 'berita', '2025-06-26 09:45:15'),
(22, 'fina', 'coba ya', 9, 'lifestyle', '2025-06-26 15:20:51'),
(23, 'fina', 'aaaa', 11, 'lifestyle', '2025-06-26 15:26:52'),
(24, 'fina', 'aaaa', 11, 'lifestyle', '2025-06-26 15:33:14'),
(25, 'fina', 'aaa', 11, 'lifestyle', '2025-06-26 15:33:29'),
(26, 'fina', 'aaaa', 11, 'historia', '2025-06-26 15:34:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lifestyle`
--

CREATE TABLE `lifestyle` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_penyiar` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ket_foto` varchar(255) DEFAULT NULL,
  `kategori_id` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lifestyle`
--

INSERT INTO `lifestyle` (`id`, `nama_penyiar`, `judul`, `deskripsi`, `foto`, `ket_foto`, `kategori_id`, `created_at`, `updated_at`, `slug`) VALUES
(2, 'coba', 'coba', 'cobaaaaa', '1745210100_ae607068e717d637aa5b.png', 'aaaa', 3, NULL, '2025-04-21 04:35:00', ''),
(3, 'aaaaa', 'astaga tri agus menjadi kepala upt', 'aaaa', '1745209864_c895c626d3a88e0d2097.jpeg', 'aaaa', 1, '2025-04-21 04:31:04', '2025-04-21 04:31:04', ''),
(4, 'tes tes', 'tes', 'tessss', '1745489367_42c2c28cf849d2a9bdda.jpg', 'aaa', 3, '2025-04-24 10:09:27', '2025-04-24 10:09:27', ''),
(5, 'sss', 'sss', 'sss', '1745489400_1e523d402a094ed2eef1.jpg', 'ssss', 4, '2025-04-24 10:10:00', '2025-04-24 10:10:00', ''),
(6, 'aa', 'aa', 'aaa', '1749788568_19f1a4e52a011b0dbb93.jpg', 'aa', 1, '2025-06-13 11:22:48', '2025-06-13 11:22:48', ''),
(7, 'aaaaaaaaa', 'aaaa', 'aa', '1749788581_d5d30c37a0d85544d11f.jpg', 'aaa', 3, '2025-06-13 11:23:01', '2025-06-13 11:23:01', ''),
(8, 'fina', 'akakakakakak', 'kakakakakaka', '1750911616_cd5d8702923e22a35538.jpg', 'aa', 4, '2025-06-26 11:20:16', '2025-06-26 11:20:16', ''),
(9, 'asasas', 'asasas', 'sasas', '1750911713_38b6dc9f592ba3765ba1.jpg', 'asass', 4, '2025-06-26 11:21:53', '2025-06-26 11:21:53', 'asasas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-04-09-040845', 'App\\Database\\Migrations\\Users', 'default', 'App', 1744171768, 1),
(2, '2025-04-09-041146', 'App\\Database\\Migrations\\Users', 'default', 'App', 1744171932, 2),
(3, '2025-04-10-082114', 'App\\Database\\Migrations\\KategoriBerita', 'default', 'App', 1744273896, 3),
(4, '2025-04-10-082128', 'App\\Database\\Migrations\\KategoriLifestyle', 'default', 'App', 1744273927, 4),
(5, '2025-04-10-083450', 'App\\Database\\Migrations\\Berita', 'default', 'App', 1744274395, 5),
(6, '2025-04-10-083851', 'App\\Database\\Migrations\\BeritaFoto', 'default', 'App', 1744274395, 5),
(7, '2025-04-21-040415', 'App\\Database\\Migrations\\Lifestyle', 'default', 'App', 1745208425, 6),
(8, '2025-04-21-043722', 'App\\Database\\Migrations\\Infografis', 'default', 'App', 1745210317, 7),
(9, '2025-04-21-044654', 'App\\Database\\Migrations\\Infografis', 'default', 'App', 1745210829, 8),
(10, '2025-04-22-035159', 'App\\Database\\Migrations\\Statement', 'default', 'App', 1745294022, 9),
(11, '2025-04-22-051324', 'App\\Database\\Migrations\\Iklan', 'default', 'App', 1745469535, 10),
(12, '2025-04-22-051331', 'App\\Database\\Migrations\\Jadwal', 'default', 'App', 1745469535, 10),
(13, '2025-04-24-041732', 'App\\Database\\Migrations\\Historia', 'default', 'App', 1745469535, 10),
(14, '2025-05-05-021116', 'App\\Database\\Migrations\\Program', 'default', 'App', 1746411192, 11),
(15, '2025-05-05-021900', 'App\\Database\\Migrations\\Program', 'default', 'App', 1746411567, 12),
(16, '2025-05-21-015528', 'App\\Database\\Migrations\\Profil', 'default', 'App', 1747792602, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip_address`, `user_agent`, `last_activity`) VALUES
(85, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-02 11:13:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(5) UNSIGNED NOT NULL,
  `foto` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `foto`, `created_at`, `updated_at`) VALUES
(1, '1747794529_259a061c2bc7ec032ec1.jpg', '2025-05-21 09:28:27', '2025-05-21 09:28:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `judul`, `link`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'historia pekalongan eps 1', 'https://open.spotify.com/episode/6XtIgySwnn0EAZAKfimeVF?si=d06f831a5c434df1', 'gambar', NULL, NULL),
(2, 'historia pekalongan eps 2', 'https:/open.spotify.com/episode/6XtIgySwnn0EAZAKfimeVF', '1746413044_7f5d5d102b8cfc5a029b.jpg', '2025-05-05 09:44:04', '2025-05-05 09:44:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statement`
--

CREATE TABLE `statement` (
  `id` int(5) UNSIGNED NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statement`
--

INSERT INTO `statement` (`id`, `foto`) VALUES
(1, '1746373485_246eec833c45d8ce0008.png'),
(2, '1745294574_4cd704f9cae683a92bbc.png'),
(3, '1746373496_075d64f20bb585cf17a0.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','petinggi','pendengar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`) VALUES
(1, 'fina', 'admin', '$2y$10$/6CGWxLPOd.V/zshexQjEemOTnOnNOfPaBg2VykDKpDko6/5VLO56', 'admin'),
(2, 'mingyu', 'petinggi', '$2y$10$lCNmHAludgCNDPkFWkXahOrq0KvuZ03p4./yFIuqFf6KLOYWnZk/y', 'petinggi'),
(3, 'fina', 'fina', '$2y$10$KAIerrWC8uC1OqrZg7ak3ukIGlB6HdCl0wDdKHeoXTFWcNbJLucb6', 'pendengar'),
(4, 'dhio', 'dhio', '$2y$10$pEyygtGpY/MtfH/RWAqHQ.HIExmjh1y.99uwxId/8Cv9wbfB3tH9m', 'pendengar'),
(5, 'sekala', 'sekala', '$2y$10$EWpJpAKuqbt6F9lB3vg2YuD0kxFK/3XcnLZNzQpE2LW59VYUIG6oW', 'petinggi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `berita_foto`
--
ALTER TABLE `berita_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `historia_detail`
--
ALTER TABLE `historia_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historia_id` (`historia_id`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ilm`
--
ALTER TABLE `ilm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infografis`
--
ALTER TABLE `infografis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_lifestyle`
--
ALTER TABLE `kategori_lifestyle`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lifestyle`
--
ALTER TABLE `lifestyle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lifestyle_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `berita_foto`
--
ALTER TABLE `berita_foto`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `historia_detail`
--
ALTER TABLE `historia_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ilm`
--
ALTER TABLE `ilm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `infografis`
--
ALTER TABLE `infografis`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_lifestyle`
--
ALTER TABLE `kategori_lifestyle`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `lifestyle`
--
ALTER TABLE `lifestyle`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `statement`
--
ALTER TABLE `statement`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `historia_detail`
--
ALTER TABLE `historia_detail`
  ADD CONSTRAINT `historia_detail_ibfk_1` FOREIGN KEY (`historia_id`) REFERENCES `historia` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lifestyle`
--
ALTER TABLE `lifestyle`
  ADD CONSTRAINT `lifestyle_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_lifestyle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
