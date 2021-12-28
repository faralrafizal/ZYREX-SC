-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Nov 2021 pada 05.20
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-servis-new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(50) DEFAULT NULL,
  `admin_pass` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_pass`, `level`) VALUES
(2, 'admin', 'admin', 1),
(6, 'admin2', 'admin2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(250) NOT NULL,
  `customer_wa` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_tgl_lahir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_wa`, `customer_email`, `customer_alamat`, `customer_tgl_lahir`) VALUES
(3, 'Doni', '082299078642', 'doniasrulafandi@gmail.com', 'Bekasi', '1995-02-14'),
(4, 'Afandi', '05647568658', 'tesi@gmail.com', 'Surabaya', '2020-11-03'),
(5, 'Fafe', '087658679679', 'doniasrulafandi123@gmail.com', 'Jln. Pramuka', '2020-11-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataservis`
--

CREATE TABLE `dataservis` (
  `nota` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `pm_nama` varchar(500) NOT NULL,
  `teknisi_id` int(11) NOT NULL,
  `teknisi_nama` varchar(500) NOT NULL,
  `nmbarang` varchar(50) NOT NULL,
  `merk_seri` varchar(250) NOT NULL,
  `proc_vga` varchar(250) NOT NULL,
  `s_n` varchar(250) NOT NULL,
  `pass_warna` varchar(250) NOT NULL,
  `hardisk` varchar(250) NOT NULL,
  `memory` varchar(250) NOT NULL,
  `ex_service_urgent` varchar(250) NOT NULL,
  `nmpemilik` varchar(50) NOT NULL,
  `slug_nmpemilik` varchar(500) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlpn` varchar(14) NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `kelengkapan` varchar(50) NOT NULL,
  `tglditerima` date NOT NULL,
  `kondisibrg` varchar(50) NOT NULL,
  `tglambil` date NOT NULL,
  `penyerah` varchar(50) NOT NULL,
  `biaya` int(20) NOT NULL,
  `status_servis` varchar(50) NOT NULL,
  `status_expired` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dataservis`
--

INSERT INTO `dataservis` (`nota`, `pm_id`, `pm_nama`, `teknisi_id`, `teknisi_nama`, `nmbarang`, `merk_seri`, `proc_vga`, `s_n`, `pass_warna`, `hardisk`, `memory`, `ex_service_urgent`, `nmpemilik`, `slug_nmpemilik`, `alamat`, `tlpn`, `kerusakan`, `kelengkapan`, `tglditerima`, `kondisibrg`, `tglambil`, `penyerah`, `biaya`, `status_servis`, `status_expired`) VALUES
(1, 2, ' admin', 2, ' admin', 'Hp Samsung', 'Samsung Galaxy a22', 'tes vga', '65547457457547', 'Putih', 'hardisk', '16 GB', 'Service', 'Doni', 'Doni', 'Surabaya', '643634645765', 'Tes', 'Btre, charger', '2021-11-17', 'oke', '2021-11-17', 'admin', 25000, 'SUDAH DIAMBIL', '2021-11-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `komplain_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teknisi_id` int(11) NOT NULL,
  `teknisi_nama` varchar(500) NOT NULL,
  `namabrg` varchar(50) NOT NULL,
  `nota_lama` varchar(10) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `no_tlpn` varchar(14) NOT NULL,
  `tgl_komplain` date NOT NULL,
  `isikomplain` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`komplain_id`, `user_id`, `teknisi_id`, `teknisi_nama`, `namabrg`, `nota_lama`, `nama_pemilik`, `no_tlpn`, `tgl_komplain`, `isikomplain`) VALUES
(1, 4, 4, ' Doni Afandi', 'Hp samsung', '4', 'Fafe', '087658679679', '2020-12-06', 'Setelah di servis kenapa masih error mohon solusinya ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `perusahaan_id` int(11) NOT NULL,
  `perusahaan_nama` varchar(500) NOT NULL,
  `perusahaan_alamat` text NOT NULL,
  `perusahaan_no_1` varchar(250) NOT NULL,
  `perusahaan_no_2` varchar(250) NOT NULL,
  `perusahaan_text_nota` text NOT NULL,
  `perusahaan_akun_login_customer` int(11) NOT NULL,
  `perusahaan_link` varchar(500) NOT NULL,
  `perusahaan_tipe_nota` int(11) NOT NULL,
  `perusahaan_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`perusahaan_id`, `perusahaan_nama`, `perusahaan_alamat`, `perusahaan_no_1`, `perusahaan_no_2`, `perusahaan_text_nota`, `perusahaan_akun_login_customer`, `perusahaan_link`, `perusahaan_tipe_nota`, `perusahaan_ukuran`) VALUES
(2, 'Konter Seniman Koding ', 'Jln Kenjeran Surabaya Jawa Timur', '085780956487', '082299078642', 'Komplain servis hanya berlaku garansi 5 hari setelah pengambilan barang', 0, 'senimankoding.com/demo/program/inventory-servis', 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pramuniaga`
--

CREATE TABLE `pramuniaga` (
  `pm_id` int(11) NOT NULL,
  `pm_nama` varchar(50) DEFAULT NULL,
  `pm_user` varchar(50) DEFAULT NULL,
  `pm_pass` varchar(50) DEFAULT NULL,
  `pm_tlpn` varchar(50) DEFAULT NULL,
  `pm_almt` varchar(60) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pramuniaga`
--

INSERT INTO `pramuniaga` (`pm_id`, `pm_nama`, `pm_user`, `pm_pass`, `pm_tlpn`, `pm_almt`, `level`) VALUES
(2, 'Budi Karyawan', 'karyawan', 'karyawan', '0987777778', 'babat lamongan', 2),
(7, 'karyawan2', 'karyawan2', 'karyawan2', '6436346', 'karyawan2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `teknisi_id` int(11) NOT NULL,
  `teknisi_nama` varchar(50) DEFAULT NULL,
  `teknisi_user` varchar(50) DEFAULT NULL,
  `teknisi_pass` varchar(40) DEFAULT NULL,
  `teknisi_tlpn` varchar(14) DEFAULT NULL,
  `teknisi_almt` varchar(60) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`teknisi_id`, `teknisi_nama`, `teknisi_user`, `teknisi_pass`, `teknisi_tlpn`, `teknisi_almt`, `level`) VALUES
(4, 'Doni Afandi', 'teknisi', 'teknisi', '0897667773333', 'lamongan', 3),
(8, 'teknisi2', 'teknisi2', 'teknisi2', '6436346', 'teknisi2', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  `user_tlpn` varchar(14) DEFAULT NULL,
  `user_almt` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dataservis`
--
ALTER TABLE `dataservis`
  ADD PRIMARY KEY (`nota`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`komplain_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`perusahaan_id`);

--
-- Indexes for table `pramuniaga`
--
ALTER TABLE `pramuniaga`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`teknisi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dataservis`
--
ALTER TABLE `dataservis`
  MODIFY `nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `komplain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pramuniaga`
--
ALTER TABLE `pramuniaga`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `teknisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
