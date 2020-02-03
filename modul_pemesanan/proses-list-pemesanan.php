<?php
include '../connection.php';

$query = "SELECT pesanan.*,pesanan.no_pesanan as nomor_pesanan, meja.id_meja ,meja.no_meja, (SELECT waktu_bayar FROM pembayaran JOIN pesanan ON pembayaran.no_pesanan=pesanan.no_pesanan WHERE pembayaran.no_pesanan=nomor_pesanan) as waktu_bayar FROM pesanan JOIN meja ON meja.id_meja = pesanan.id_meja ORDER BY `pesanan`.`no_pesanan` ASC ";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_pesan = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_pesan[] = $row;
}

// ... lanjut di tampilan
