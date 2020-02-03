<?php

include '../connection.php';

$id_menu = $_GET['id_menu'];

$query = "DELETE FROM menu WHERE id_menu = $id_menu";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-menu.php');
} else {
    header('location: tambah-menu.php');
}
