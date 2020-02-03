-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Feb 2020 pada 11.04
-- Versi server: 10.3.22-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cognoart_restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL,
  `nama_bahanbaku` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `nama_bahanbaku`, `stok`, `id`) VALUES
(7, 'Garam', 500, 1),
(8, 'Beras', 50, 1),
(9, 'Kecap', 20, 1),
(10, 'Masako', 30, 1),
(11, 'Bawang Merah', 3, 1),
(12, 'Cabai', 10, 1),
(15, 'Jeruk', 90, 3),
(16, 'Gula', 100, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detailpesanan` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detailpesanan`, `no_pesanan`, `id_menu`, `jumlah`, `total_harga`) VALUES
(278, 1, 10, 2, 80000),
(279, 1, 13, 2, 20000),
(281, 1, 12, 1, 8000),
(284, 2, 9, 2, 30000),
(285, 2, 14, 2, 10000),
(288, 3, 9, 2, 30000),
(289, 3, 9, 2, 30000),
(294, 4, 1, 0, 0),
(295, 4, 9, 4, 56000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `no_pembayaran` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `jenis_menu`, `id`) VALUES
(9, 'Ayam Geprek', 14000, 'Ayam', 1),
(10, 'Cumi Cumi Saus Tiram', 35000, 'Ayam', 1),
(11, 'Ayam Panggang ', 40000, 'Ayam', 1),
(12, 'Sop Buntut ', 8000, 'Sup', 1),
(13, 'Jus Alpukat ', 10000, 'Seafood', 1),
(14, 'Kopi Hitam ', 5000, 'Seafood', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `bagian`) VALUES
(1, 'andri', 'andri123', 'pelayan'),
(2, 'rudiansyaht', 'rudi1234567890', 'koki'),
(3, 'jinggasurya', 'putihkelabu', 'pantry'),
(4, 'heriansyahp', 'heriansyahputra', 'kasir'),
(5, 'ruditabudi', 'rudi1121', 'cs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_pembayaran` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `no_pesanan`, `waktu_bayar`, `bayar`) VALUES
(18, 1, '2020-02-02 18:10:20', 108000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `waktu_pesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `id_meja`, `waktu_pesanan`, `nama_pelanggan`) VALUES
(1, 2, '2020-02-02 18:03:38', 'Andri'),
(2, 1, '2020-02-02 18:05:01', 'Sandi'),
(3, 3, '2020-02-02 18:07:43', 'Devi'),
(4, 6, '2020-02-03 02:55:29', 'Ado');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_menu` int(11) NOT NULL,
  `id_bahanbaku` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detailpesanan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `no_pesanan` (`no_pesanan`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`),
  ADD KEY `id` (`id`),
  ADD KEY `no_pembayaran` (`no_pembayaran`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `no_pesanan` (`no_pesanan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detailpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `no_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Ketidakleluasaan untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `kuesioner_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `kuesioner_ibfk_2` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
