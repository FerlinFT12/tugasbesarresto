<?php
include '../connection.php';

$query = "SELECT pembayaran.* ,pesanan.* FROM `pembayaran` JOIN pesanan ON pembayaran.no_pesanan = pesanan.no_pesanan ORDER BY `pembayaran`.`no_pesanan` ASC ";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_bayar = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_bayar[] = $row;
}

// ... lanjut di tampilan


