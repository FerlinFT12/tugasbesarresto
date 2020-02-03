<?php
include '../connection.php';

$nama_menu     = $_POST['nama_menu'];
$jenis_menu  = $_POST['jenis_menu'];
$harga  = $_POST['harga'];
$bahanbaku = $_POST['bahanbaku'];
$idpegawai = $_POST['id_pegawai'];

$query = "INSERT INTO menu (nama_menu, harga_menu, jenis_menu, id) VALUES ('$nama_menu ', $harga, '$jenis_menu','$idpegawai')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {

    header('Location: list-menu.php');
} else {
	$_SESSION['messages'] = '<font color="red">Tambah Bahan Baku Gagal!</font>';
    header('Location: tambah-menu.php');
}
?>