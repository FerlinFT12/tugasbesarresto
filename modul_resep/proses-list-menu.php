<?php
include '../connection.php';

$query = "SELECT * FROM menu";
$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_menu = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_menu[] = $row;
}


// ... lanjut di tampilan



?>