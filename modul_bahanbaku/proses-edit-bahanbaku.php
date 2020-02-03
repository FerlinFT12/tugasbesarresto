<?php
include '../connection.php';

$id_bahanbaku = $_POST['id_bahanbaku'];
$nama_bahanbaku = $_POST['nama_bahanbaku'];
$stok = $_POST['stok_bahanbaku'];


$query = "UPDATE `bahan_baku` 
			SET `nama_bahanbaku` = '$nama_bahanbaku', `stok` = '$stok' 
			WHERE `bahan_baku`.`id_bahanbaku` = $id_bahanbaku";

$hasil = mysqli_query($db, $query);
// var_dump(mysqli_error($db));
if ($hasil == true) {
    header('Location: list-bahanbaku.php');
} else {
    header('Location: edit-bahanbaku.php');
}
