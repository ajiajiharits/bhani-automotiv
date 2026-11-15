-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2026 at 04:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhani_automotiv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Administrator','Staff') DEFAULT 'Administrator',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$NN9LqYyKfxbDV1whNQxVGe1yoNiqC7NSzHU4Ln5mTuN1mekLFBgx.', 'Administrator', '2026-07-14 18:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `isi` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Publish','Draft') DEFAULT 'Publish'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `gambar`, `isi`, `tanggal`, `status`) VALUES
(6, 'Tips Membeli Mobil Premium Bekas Agar Mendapatkan Kendaraan Berkualitas', '1784130055_rolls-royce-ghost.jpeg', 'Membeli mobil premium bekas menjadi pilihan menarik bagi banyak pecinta otomotif yang ingin merasakan pengalaman berkendara mewah dengan harga yang lebih terjangkau. Namun, memilih kendaraan premium bekas membutuhkan ketelitian agar mendapatkan mobil dengan kondisi terbaik.\r\n\r\nHal pertama yang perlu diperhatikan adalah riwayat perawatan kendaraan. Mobil premium memiliki teknologi yang lebih kompleks sehingga membutuhkan servis rutin dan penggunaan suku cadang yang sesuai standar pabrikan.\r\n\r\nSelain melihat kondisi mesin, calon pembeli juga perlu melakukan pemeriksaan pada bagian transmisi, sistem kelistrikan, interior, serta kelengkapan dokumen kendaraan. Riwayat kendaraan yang jelas dapat memberikan rasa aman dan mengurangi risiko biaya perbaikan di kemudian hari.\r\n\r\nBhani Automotiv menghadirkan berbagai pilihan kendaraan premium second yang telah melalui proses pengecekan sebelum ditawarkan kepada pelanggan. Kami berkomitmen memberikan pengalaman membeli mobil yang aman, nyaman, dan terpercaya.', '2026-07-15 15:40:55', 'Publish'),
(7, 'Mengenal Perbedaan SUV, Sport Car, dan Luxury Car', '1784130097_showroom.jpg', 'Industri otomotif menghadirkan berbagai jenis kendaraan dengan karakter dan keunggulan yang berbeda. SUV, sport car, dan luxury car merupakan beberapa kategori kendaraan premium yang banyak diminati karena menawarkan pengalaman berkendara yang unik.\r\n\r\nSUV atau Sport Utility Vehicle dikenal dengan kemampuan yang lebih fleksibel. Kendaraan ini menawarkan kabin yang luas, posisi berkendara yang nyaman, serta kemampuan melewati berbagai kondisi jalan.\r\n\r\nSport car memiliki karakter berbeda dengan fokus utama pada performa dan pengalaman berkendara yang lebih emosional. Desain agresif, mesin bertenaga, dan handling yang responsif menjadi daya tarik utama kendaraan jenis ini.\r\n\r\nSementara itu, luxury car mengutamakan kenyamanan, kemewahan, serta teknologi modern. Material interior berkualitas tinggi dan berbagai fitur canggih membuat kendaraan kategori ini memberikan pengalaman berkendara eksklusif.\r\n\r\nBhani Automotiv menyediakan berbagai pilihan kendaraan premium mulai dari SUV, sport car, hingga luxury car yang dapat disesuaikan dengan kebutuhan dan gaya hidup pelanggan.', '2026-07-15 15:41:37', 'Publish'),
(8, 'Cara Merawat Mobil Luxury Agar Tetap Memiliki Nilai Tinggi', '1784130162_bmw-seri 7.jpg', 'Mobil premium bukan hanya sebuah kendaraan, tetapi juga merupakan investasi yang membutuhkan perawatan secara rutin. Perawatan yang tepat dapat menjaga performa kendaraan sekaligus mempertahankan nilai jualnya.\r\n\r\nPerawatan mesin menjadi salah satu aspek utama yang harus diperhatikan. Penggantian oli secara berkala, pemeriksaan sistem pendingin, serta penggunaan bahan bakar berkualitas dapat membantu menjaga kondisi mesin tetap optimal.\r\n\r\nSelain mesin, bagian interior dan eksterior juga perlu mendapatkan perhatian. Membersihkan kabin secara rutin, merawat material kulit, serta menjaga kondisi cat kendaraan dapat membuat mobil tetap terlihat elegan.\r\n\r\nPemeriksaan berkala di bengkel terpercaya juga sangat penting untuk mendeteksi masalah sejak dini. Dengan perawatan yang konsisten, mobil premium dapat tetap memberikan kenyamanan dan performa terbaik dalam jangka panjang.\r\n\r\nBhani Automotiv percaya bahwa kendaraan berkualitas membutuhkan perawatan berkualitas agar pengalaman berkendara tetap maksimal.', '2026-07-15 15:42:42', 'Publish'),
(9, 'Pentingnya Melakukan Test Drive Sebelum Membeli Mobil', '1784136425_test-drive.jpg', 'Test drive merupakan salah satu tahap penting sebelum memutuskan membeli kendaraan. Melalui test drive, calon pembeli dapat merasakan langsung performa mesin, kenyamanan suspensi, posisi berkendara, serta fitur yang tersedia.\r\n\r\nSetiap mobil memiliki karakter berkendara yang berbeda, sehingga pengalaman langsung dapat membantu pelanggan menentukan apakah kendaraan tersebut sesuai dengan kebutuhan.\r\n\r\nBhani Automotive memberikan kesempatan kepada pelanggan untuk mengenal lebih dekat kendaraan pilihan sebelum melakukan pembelian.', '2026-07-15 16:38:02', 'Publish'),
(10, 'Memilih Mobil Sesuai Kebutuhan dan Gaya Hidup', '1784136342_maintainance-car.jpg', 'Setiap orang memiliki kebutuhan kendaraan yang berbeda. Sebelum membeli mobil, penting untuk menentukan jenis kendaraan yang sesuai dengan aktivitas dan gaya hidup.\r\n\r\nBagi keluarga, mobil dengan ruang kabin luas seperti SUV dapat menjadi pilihan yang tepat. Sementara itu, sedan atau mobil berukuran kecil cocok bagi pengguna yang membutuhkan kendaraan praktis untuk aktivitas sehari-hari.\r\n\r\nBhani Automotive menyediakan berbagai pilihan kendaraan dari berbagai kategori sehingga pelanggan dapat menemukan mobil yang sesuai dengan kebutuhan dan preferensinya.', '2026-07-15 16:54:25', 'Publish'),
(11, 'Alasan Memilih Bhani Automotive untuk Kendaraan Impian Anda', '1784136206_showroom-build.png', 'Memilih kendaraan bukan hanya tentang harga, tetapi juga tentang kualitas, kenyamanan, dan kepercayaan. Oleh karena itu, penting untuk membeli mobil melalui dealer yang memberikan pelayanan terbaik.\r\n\r\nBhani Automotive menyediakan berbagai pilihan mobil dengan kondisi terbaik serta informasi kendaraan yang lengkap untuk membantu pelanggan menentukan pilihan. Setiap kendaraan dipilih dengan memperhatikan kualitas dan kelayakan agar memberikan pengalaman berkendara yang memuaskan.\r\n\r\nDengan pelayanan profesional dan pilihan mobil yang beragam, Bhani Automotive siap menjadi solusi bagi Anda yang ingin memiliki kendaraan berkualitas dan terpercaya.', '2026-07-15 16:55:01', 'Publish'),
(13, 'Perbedaan Mobil Sedan dan SUV, Mana yang Tepat untuk Anda?', '1784136497_sedan-suv.jpg', 'Sedan dan SUV merupakan dua jenis kendaraan yang banyak diminati dengan karakteristik yang berbeda. Sedan dikenal memiliki desain elegan, nyaman digunakan di jalan perkotaan, serta memiliki stabilitas berkendara yang baik.\r\n\r\nSementara itu, SUV menawarkan ruang kabin lebih luas, posisi berkendara lebih tinggi, dan kemampuan menghadapi berbagai kondisi jalan.\r\n\r\nPemilihan antara sedan dan SUV dapat disesuaikan dengan kebutuhan, aktivitas, serta preferensi setiap pengguna. Bhani Automotive menyediakan berbagai pilihan kendaraan untuk membantu pelanggan menemukan mobil yang tepat.', '2026-07-15 17:28:17', 'Publish'),
(14, 'Panduan Menentukan Budget Sebelum Membeli Mobil', '1784136585_budget.jpg', 'Membeli mobil membutuhkan perencanaan yang matang agar kendaraan yang dipilih sesuai dengan kemampuan finansial. Selain mempertimbangkan harga mobil, calon pembeli juga perlu memperhitungkan biaya tambahan seperti pajak, perawatan, bahan bakar, dan kebutuhan lainnya.\r\n\r\nMenentukan anggaran sejak awal akan membantu pelanggan memilih kendaraan yang tepat tanpa mengganggu kebutuhan finansial lainnya.\r\n\r\nBhani Automotive menyediakan berbagai pilihan kendaraan dengan beragam harga dan kategori sehingga pelanggan dapat menemukan mobil yang sesuai dengan kebutuhan dan rencana keuangannya.', '2026-07-15 17:29:45', 'Publish'),
(15, 'Mengapa Mobil Berkualitas Menjadi Investasi Jangka Panjang?', '1784136620_rolls-royce-ghost.jpeg', 'Mobil bukan hanya sebagai alat transportasi, tetapi juga dapat menjadi aset yang memberikan nilai manfaat dalam jangka panjang. Kendaraan dengan kondisi baik, perawatan teratur, dan merek yang terpercaya cenderung memiliki nilai jual kembali yang lebih stabil.\r\n\r\nMemilih mobil berkualitas sejak awal dapat membantu menghemat biaya perawatan serta memberikan kenyamanan lebih selama penggunaan.\r\n\r\nBhani Automotive berkomitmen menyediakan kendaraan pilihan dengan kualitas terbaik agar pelanggan mendapatkan pengalaman berkendara yang nyaman, aman, dan bernilai.', '2026-07-15 17:30:20', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `pesan` text,
  `status` enum('Baru','Diproses','Selesai') DEFAULT 'Baru',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `nama`, `email`, `telepon`, `pesan`, `status`, `tanggal`) VALUES
(1, 'Harits Ponang Aji', 'ponangharis26@gmail.com', '086745828271', 'apakah mobil supra mk5 tersedia?', 'Baru', '2026-07-17 17:42:02'),
(2, 'Joko Anawar', 'jokoNwr@gmail.com', '083258628271', 'Permisi apakah Mobil BMW M4 Competition Tersedia?', 'Baru', '2026-07-17 18:16:00'),
(3, 'Bahlil', 'BahlilMBG@gmail.com', '086745254521', 'halo kak apakah mobil range rover edisi MBG masih tersedia?', 'Baru', '2026-07-17 18:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `kategori` enum('Showroom','Vehicle','Event') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text,
  `status` enum('Active','Hidden') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `judul`, `kategori`, `gambar`, `deskripsi`, `status`, `created_at`) VALUES
(1, 'Showroom Bhani Automotiv', 'Showroom', '1784128677_showroom-build.png', 'Showroom kendaraan premium Bhani Automotiv.', 'Active', '2026-07-14 18:29:29'),
(2, 'Porsche 911 Collection', 'Vehicle', '1784127977_porscheCollection.jpg', 'Koleksi sport car premium.', 'Active', '2026-07-14 18:29:29'),
(3, 'Luxury Car Display', 'Vehicle', '1784128774_showroom.jpg', 'Tampilan kendaraan luxury pilihan.', 'Active', '2026-07-14 18:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `kategori` enum('Sport','SUV','Luxury','Supercar') NOT NULL,
  `harga` bigint(20) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kilometer` int(11) DEFAULT '0',
  `kondisi` enum('Excellent','Very Good','Good') DEFAULT 'Excellent',
  `mesin` varchar(100) DEFAULT NULL,
  `transmisi` varchar(50) DEFAULT NULL,
  `kapasitas` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Available','Sold') DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `kategori`, `harga`, `tahun`, `kilometer`, `kondisi`, `mesin`, `transmisi`, `kapasitas`, `deskripsi`, `gambar`, `status`, `created_at`) VALUES
(1, 'Porsche 911 Carrera', 'Sport', 4200000000, 2023, 0, 'Excellent', '3.0L Twin Turbo Flat-Six', 'PDK Automatic', '4 Seat', 'Sport car premium dengan karakter berkendara agresif dan elegan.', '1784128995_porsche-911-carera.webp', 'Available', '2026-07-14 18:29:28'),
(2, 'Range Rover Sport', 'SUV', 2800000000, 2022, 0, 'Excellent', '3.0L Turbo Engine', 'Automatic', '5 Seat', 'SUV luxury dengan kenyamanan tinggi dan kemampuan off-road.', '1784129230_range-rover.jpg', 'Available', '2026-07-14 18:29:28'),
(3, 'Mercedes AMG GT', 'Sport', 3500000000, 2023, 0, 'Excellent', '4.0L V8 Biturbo', 'AMG Speedshift', '2 Seat', 'High performance coupe Mercedes dengan desain sporty.', '1784129180_mercedes-amg-gt.jpg', 'Available', '2026-07-14 18:29:28'),
(4, 'Ferrari Roma', 'Supercar', 7500000000, 2022, 0, 'Excellent', '3.9L V8 Twin Turbo', 'Automatic', '2 Seat', 'Supercar Ferrari dengan perpaduan desain klasik dan teknologi modern.', '1784129085_ferarri-roma.jpg', 'Available', '2026-07-14 18:29:28'),
(15, 'BMW i8', 'Sport', 2500000000, 2018, 0, 'Excellent', '1.5L TwinPower Turbo 3-Silinder + Motor Listrik Tenaga: Â± 369 HP', '6-Speed Automatic + Electric Drive', NULL, 'BMW i8 mengusung sistem plug-in hybrid yang menggabungkan mesin bensin 3-silinder 1.500 cc turbocharged (228 hp/320 Nm) untuk roda belakang dan motor listrik (143 hp/250 Nm) untuk roda depan. Kombinasi keduanya menghasilkan total tenaga 369 hp dan torsi 570 Nm, yang mampu berakselerasi dari 0-100 km/jam dalam 4,4 detik.', '1784115612_bmw-i8.jpg', 'Available', '2026-07-15 11:40:12'),
(16, 'BMW M4 Competition', 'Sport', 3200000000, 2021, 0, 'Excellent', 'TwinPower Turbo 6-silinder', 'M Steptronic 8-Percepatan', NULL, 'BMW M4 Competition menggunakan transmisi M Steptronic 8-percepatan dan sistem penggerak semua roda (all-wheel drive) M xDrive yang dipadukan dengan diferensial M aktif.', '1784129479_bmw-m4-competition.jpeg', 'Available', '2026-07-15 15:31:19'),
(17, 'Rolls-Royce Ghost', 'Luxury', 14000000000, 2023, 0, 'Excellent', 'V12 twin-turbocharged', 'ZF 8-speed', NULL, 'Rolls-Royce Ghost dirancang agar sangat nyaman dikemudikan sendiri (driver-oriented) maupun menggunakan sopir, dan dilengkapi dengan mesin V12.', '1784129851_rolls-royce-ghost.jpeg', 'Available', '2026-07-15 15:37:31'),
(18, 'BMW X7', 'SUV', 3500000000, 2023, 0, 'Excellent', '3.0L TwinPower Turbo 6-Cylinder (Bensin)', 'Otomatis 8-Speed Steptronic', NULL, 'BMW X7 merupakan SUV premium berukuran besar yang menggabungkan kemewahan, performa tinggi, dan teknologi modern. Dengan desain elegan, kabin luas hingga tiga baris, serta fitur keselamatan dan kenyamanan canggih, BMW X7 menjadi pilihan ideal bagi pengguna yang menginginkan pengalaman berkendara eksklusif bersama keluarga maupun untuk perjalanan bisnis.', '1784137536_bmw-x7.jpg', 'Available', '2026-07-15 16:29:30'),
(19, 'BMW M3 Competition', 'Sport', 2500000000, 2021, 0, 'Excellent', '3.0L BMW M TwinPower Turbo 6-Cylinder Tenaga hingga 510 HP', '8-Speed M Steptronic Automatic', NULL, 'BMW M3 Competition merupakan sedan sport berperforma tinggi dari divisi BMW M Motorsport yang menggabungkan desain agresif, teknologi balap, dan kenyamanan berkendara premium. Mobil ini menawarkan tenaga besar dengan handling presisi, cocok bagi penggemar otomotif yang menginginkan performa tinggi untuk penggunaan harian maupun berkendara sporty.', '1784137452_bmw-m3.jpg', 'Available', '2026-07-15 16:29:54'),
(20, 'BMW i7', 'Luxury', 3000000000, 2024, 0, 'Excellent', 'Electric Motor (Full Electric) dengan baterai Lithium-ion, tenaga hingga 544 hp', 'Automatic Single-Speed', NULL, 'BMW i7 merupakan sedan listrik premium yang menggabungkan kemewahan, teknologi modern, dan performa bertenaga. Dengan desain elegan khas BMW serta kabin berkelas tinggi, BMW i7 menawarkan pengalaman berkendara yang nyaman, senyap, dan futuristik dengan teknologi kendaraan listrik terbaru.', '1784137318_bmw-i7.jpg', 'Available', '2026-07-15 16:30:19'),
(21, 'Lamborghini Urus', 'SUV', 8500000000, 2021, 0, 'Excellent', 'V8 Twin-Turbo 4.0 Liter', 'Otomatis 8-Speed ZF', NULL, 'Lamborghini Urus merupakan SUV performa tinggi yang menggabungkan kemewahan, desain agresif, dan kemampuan berkendara luar biasa. Mengusung karakter khas Lamborghini, Urus menawarkan tenaga besar dengan kenyamanan SUV premium, sehingga cocok untuk penggunaan harian maupun pengalaman berkendara sporty.', '1784137971_lamborghini-urus.jpeg', 'Available', '2026-07-15 17:52:51'),
(22, 'Mercedes-Benz G-Wagon', 'Sport', 7000000000, 2024, 0, 'Excellent', '4.0L V8 Biturbo (AMG G63) Tenaga hingga 585 HP', 'Otomatis 9-percepatan AMG SPEEDSHIFT TCT', NULL, 'Mercedes-Benz G-Wagon merupakan SUV premium legendaris yang menggabungkan desain ikonik, kemewahan, dan kemampuan off-road tinggi. Dengan tampilan boxy yang khas serta interior berkelas, mobil ini menawarkan pengalaman berkendara eksklusif dengan performa mesin yang bertenaga.', '1784138077_g-wagon.jpg', 'Available', '2026-07-15 17:54:37'),
(23, 'Toyota Supra MK4', 'Sport', 2400000000, 2002, 0, 'Excellent', '3.0L Twin Turbo Inline-6 (2JZ-GTE) Tenaga Â±320 HP Torsi Â±441 Nm', '6-Speed Manual / 4-Speed Automatic', NULL, 'Toyota Supra MK4 merupakan salah satu mobil sport legendaris yang terkenal dengan desain ikonik, performa tinggi, dan mesin yang memiliki potensi besar untuk modifikasi. Dibekali mesin 2JZ-GTE yang menjadi salah satu mesin paling populer di dunia otomotif, Supra MK4 menawarkan kombinasi antara tenaga, teknologi, dan pengalaman berkendara yang luar biasa.', '1784138184_supra-mk4.jpg', 'Available', '2026-07-15 17:56:24'),
(24, 'Toyota Supra MK5', 'Sport', 2200000000, 2020, 0, 'Excellent', '3.0L Twin-Turbo Inline-6 (B58) Tenaga Â±382 HP', 'Automatic 8-Speed ZF', NULL, 'Toyota Supra MK5 merupakan mobil sport legendaris generasi terbaru yang menggabungkan desain agresif, performa tinggi, dan teknologi modern. Dikembangkan bersama BMW, Supra MK5 menawarkan pengalaman berkendara yang responsif dengan mesin bertenaga serta handling yang stabil, menjadikannya pilihan ideal bagi pecinta mobil sport berperforma tinggi.', '1784138275_supra-mk5.jpg', 'Available', '2026-07-15 17:57:55'),
(25, 'BMW X5', 'Sport', 1800000000, 2023, 0, 'Excellent', '3.0L TwinPower Turbo 6-Cylinder', 'Otomatis 8-Speed Steptronic', NULL, 'BMW X5 merupakan SUV premium yang menggabungkan performa tinggi, kenyamanan, dan teknologi modern. Dengan desain elegan serta kabin luas, BMW X5 cocok digunakan untuk perjalanan harian maupun perjalanan jarak jauh dengan pengalaman berkendara yang mewah dan sporty.', '1784354456_bmw-x5.jpg', 'Available', '2026-07-15 18:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_mobil`
--

CREATE TABLE `penjualan_mobil` (
  `id_jual` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `tipe_mobil` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kilometer` int(11) DEFAULT NULL,
  `kondisi` text,
  `status` enum('Baru','Diproses','Selesai') DEFAULT 'Baru',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_mobil`
--

INSERT INTO `penjualan_mobil` (`id_jual`, `nama`, `telepon`, `tipe_mobil`, `tahun`, `kilometer`, `kondisi`, `status`, `created_at`) VALUES
(1, 'Harits Ponang Aji', '086745828271', 'supra mk4', 2002, 521152, 'Terawat, Sudah di modifikasi dan tune up.', 'Baru', '2026-07-17 15:47:36'),
(2, 'Joko Anwar', '083258628271', 'BMW M4 Competition', 2023, 18728, 'Kondisi kendaraan sangat terwat dan masih bawaan pabrik.', 'Baru', '2026-07-17 18:18:31'),
(3, 'Bahlil', '086745254521', 'Range Rover', 2023, 8190278, 'Kondisi sangat baik, sudah pernah di modif.', 'Baru', '2026-07-17 18:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_dealer` varchar(100) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_dealer`, `alamat`, `telepon`, `email`, `logo`) VALUES
(1, 'Bhani Automotiv', 'Jl. Sudirman Kav.45 Jakarta Selatan', '08123456789', 'info@bhaniautomotiv.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `penjualan_mobil`
--
ALTER TABLE `penjualan_mobil`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penjualan_mobil`
--
ALTER TABLE `penjualan_mobil`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
