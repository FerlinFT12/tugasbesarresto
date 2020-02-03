<?php
include '../connection.php';

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$jenis_menu = $_POST['jenis_menu'];

$query = "UPDATE `menu` 
			SET `nama_menu` = '$nama_menu', `harga_menu` = '$harga', `jenis_menu` = '$jenis_menu' 
			WHERE `id_menu` = $id_menu;";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: list-menu.php');
} else {
    header('Location: edit-menu.php');
}
