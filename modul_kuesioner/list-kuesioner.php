<?php
// ... ambil data dari database
include '../function.php';
include 'proses-list-kuesioner.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
          activekuesioner();
        ?>


        <div class="content">
            <h1>Daftar Menu</h1>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <div class="btn-tambah-div">
                <a href="tambah-kuesioner.php"><button class="btn btn-tambah" style="right: 880px;">Tambah Pertanyaan</button></a>
            </div>
            <br>
            <?php if (empty($data_kuesioner)) : ?>
            Tidak ada data.
            <br>
            <?php else : ?>
            <table class="data">
                <tr>
                    <th style="text-align: left; width: 10%;">No</th>
                    <th style="text-align: left; width: 20%;">Nama Pelanggan</th>
                    <th style="text-align: left; width: 10%;">Pertanyaan</th>
                    <th style="text-align: left; width: 10%;">Nilai</th>
                    <th style="text-align: left; width: 20%;">Keterangan</th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($data_kuesioner as $kuesioner) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $kuesioner['nama_pelanggan'] ?></td>
                    <td><?php echo $kuesioner['pertanyaan'] ?></td>
                    <td><?php echo $kuesioner['nilai'] ?></td>
                    <td>
                        <a href="edit-kuesioner.php?id_kuesioner=<?php echo $kuesioner['id_kuesioner'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-menu.php?id_menu=" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
        </div>

    </div>
</body>
</html>