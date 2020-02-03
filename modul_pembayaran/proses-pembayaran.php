<?php

include '../connection.php';
include '../function.php';

$tgl_bayar = $_POST['waktu_bayar'];
$bayar = $_POST['bayar'];
$no_pesanan = $_POST['nomor'];
$kembalian = $_POST['kembalian'];

$totalbayar = $bayar - $kembalian;
var_dump($tgl_bayar);
var_dump($bayar);
var_dump($no_pesanan);
var_dump($kembalian);
var_dump($totalbayar);

$query = "INSERT INTO `pembayaran` (`no_pesanan`, `waktu_bayar`, `bayar`) VALUES ('$no_pesanan', '$tgl_bayar', '$totalbayar')";

$hasil = mysqli_query($db, $query);

var_dump($hasilh);

if ($hasil == true) {
    // // ambil buku_id berdasarkan pinjam_id
    // $q = "SELECT buku.buku_id FROM buku JOIN pinjam ON buku.buku_id = pinjam.buku_id WHERE pinjam.pinjam_id = $pinjam_id";
    // $hasil = mysqli_query($db, $q);
    // $hasil = mysqli_fetch_assoc($hasil);
    // $buku_id = $hasil['buku_id'];

    // tambah_stok($db, $buku_id);
    // tambah stok

    $_SESSION['messages'] = '<font color="green">Pengembalian buku sukses!</font>';
    header('Location: ../modul_pemesanan/pemesanan-data.php');
} else {
    header('Location: pengembalian.php');
}