<?php
include '../connection.php';

$query = "SELECT * FROM bahan_baku";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_bahanbaku = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_bahanbaku[] = $row;
}


// ... lanjut di tampilan



?>