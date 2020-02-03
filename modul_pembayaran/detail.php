<?php
include '../connection.php';
include '../function.php';

$id_pesan = $_GET['id_pesan'];
$q2 = "SELECT pesan.*, menu.harga_menu, menu.nama_menu FROM pesan JOIN menu ON pesan.id_menu = menu.id_menu WHERE pesan.id_pesan = $id_pesan";
$hasil2 = mysqli_query($db, $q2);
$data_pesan2 = mysqli_fetch_assoc($hasil2);

$q = "SELECT pesan.*, transaksi.* FROM transaksi LEFT JOIN pesan ON transaksi.id_pesan = pesan.id_pesan WHERE transaksi.id_pesan = $id_pesan ";
$hasil = mysqli_query($db, $q);
$data_pesan = mysqli_fetch_assoc($hasil);
$tgl_bayar = date('Y-m-d');

$hitung_bayar = hitung_bayar($data_pesan['total_bayar'], $data_pesan['total_harga']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Detail</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php

          activepemesanan();
        ?>

        <div class="content">
            <h3>Transaksi Detail</h3>
            <form method="post" action="../modul_pemesanan/pemesanan-data.php">
                <input type="hidden" name="id_pesan" value="<?php echo $data_pesan['id_pesan'] ?>">
                <input type="hidden" name="tgl_bayar" value="<?php echo $tgl_bayar ?>">
                <input type="hidden" name="total_harga" value="<?php echo $hitung_bayar ?>">
                <h3>
                Nama Makanan : <?php echo $data_pesan2['nama_menu']; ?>
                <br>
                Harga Makanan : <?php echo $data_pesan2['harga_menu']; ?>
                <br>
                Jumlah : <?php echo $data_pesan['jumlah']; ?>
                <br>
                tottal : <?php echo $data_pesan['total_harga']; ?>
                <br>
                Bayar : <?php echo $data_pesan['total_bayar']; ?>
                </h3>

                <p>kembalian</p>
                    <input type="text" value="<?php echo $hitung_bayar ?>" disabled>

                <p><input type="submit" class="btn btn-tambah" value="Simpan"></p>
            </form>
        </div>

    </div>
</body>
</html>

