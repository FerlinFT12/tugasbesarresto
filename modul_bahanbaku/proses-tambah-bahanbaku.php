<?php
include '../connection.php';

$namabahanbaku     = $_POST['nama_bahanbaku'];
$stokbahanbaku  = $_POST['stok_bahanbaku'];
$idpegawai = $_POST['id_pegawai'];

$query = "INSERT INTO bahan_baku (nama_bahanbaku, stok, id) VALUES ('$namabahanbaku', '$stokbahanbaku','$idpegawai')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: list-bahanbaku.php');
} else {
	$_SESSION['messages'] = '<font color="red">Tambah Bahan Baku Gagal!</font>';
    header('Location: tambah-bahanbaku.php');
}
