<?php

include '../connection.php';

$id_bahanbaku = $_GET['id_bahanbaku'];

$query = "DELETE FROM bahan_baku WHERE id_bahanbaku = $id_bahanbaku";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-bahanbaku.php');
} else {
    header('location: tambah-bahanbaku.php');
}
