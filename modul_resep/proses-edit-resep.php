<?php
include '../connection.php';

$id_menu = $_POST['id_menu'];
$id_bahanbaku = $_POST['id_bahanbaku'];
$satuan = $_POST['satuan'];
$jumlah = $_POST['jumlah'];

$query = "INSERT INTO resep (id_menu, id_bahanbaku, satuan, jumlah) VALUES ('$id_menu', '$id_bahanbaku', '$satuan','$jumlah')";

$hasil = mysqli_query($db, $query);

if ($hasil == true) {

    header('Location: list-resep.php');
} else {
	$_SESSION['messages'] = '<font color="red">Tambah Resep Gagal!</font>';
    header('Location: edit-resep.php');
}

?>
