<?php
// ... ambil data dari database
include '../function.php';
include 'proses-list-pembayaran.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
          activepembayaran();
        ?>

        <div class="content">
            <h1>Daftar Pebayaran</h1>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <br>
            <?php if (empty($data_bayar)) : ?>
            Tidak ada data.
            <br>
            <?php else : ?>
            <table class="data">
                <tr>
                    <th style="text-align: left; width: 5%;">No Pesanan</th>
                    <th style="text-align: left; width: 5%;">Nama Pelanggan</th>
                    <th style="text-align: left; width: 5%;">Waktu Pembayaran</th>
                    <th style="text-align: left; width: 5%;">Bayar</th>
                </tr>
                <?php foreach ($data_bayar as $bayar) : ?>
                <tr>
                    <td><?php echo $bayar['no_pesanan'] ?></td>
                    <td><?php echo $bayar['nama_pelanggan'] ?></td>
                    <td><?php echo $bayar['waktu_bayar'] ?></td>
                    <td><?php echo $bayar['bayar'] ?></td>
            
                </tr>
                <?php endforeach ?>
            </table>
            <?php endif ?>
            <br>
            <div class="btn-tambah-div">
                <a href="tambah-menu.php"><button class="btn btn-tambah" style="right: 964px;">Rekap</button></a>
            </div>
        </div>

    </div>
</body>
</html>
