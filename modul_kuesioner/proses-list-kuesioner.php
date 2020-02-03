<?php
include '../connection.php';

$query = "SELECT kuesioner.*,kuesioner.id_kuesioner as id_kuesioner, pesanan.no_pesanan, pesanan.nama_pelanggan, pembayaran.no_pembayaran
    FROM kuesioner
    JOIN pembayaran ON pembayaran.no_pembayaran = kuesioner.no_pembayaran
    JOIN pesanan ON pesanan.no_pesanan = pembayaran.no_pesanan";
$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_kuesioner = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kuesioner[] = $row;
}


// ... lanjut di tampilan



?>