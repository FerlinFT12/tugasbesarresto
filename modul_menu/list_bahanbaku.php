<?php
// ... ambil data dari database
include '../function.php';
include 'proses-list-bahanbaku.php';

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Daftar Bahan Baku</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
          activemenu();
        ?>


        <div class="content">
            <h1>Daftar Bahan Baku</h1>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <div class="btn-tambah-div">
                <a href="tambah-bahanbaku.php"><button class="btn btn-tambah" style="right: 925px;">Tambah Data</button></a>
            </div>
            <br>
            <?php if (empty($data_bahanbaku)) : ?>
            Tidak ada data.
            <br>
            <?php else : ?>
            <table class="data">
                <tr>
                    <th style="text-align: left; width: 20%;">No</th>
                    <th style="text-align: left; width: 20%;">Nama Bahan Baku</th>
                    <th style="text-align: left; width: 20%;">Stok</th>
                    <th style="text-align: left; width: 20%;">Keterangan</th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($data_bahanbaku as $bahanbaku) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $bahanbaku['nama_bahanbaku'] ?></td>
                    <td><?php echo $bahanbaku['stok'] ?></td>
                    <td>
                        <a href="edit-bahanbaku.php?id_bahanbaku=<?php echo $bahanbaku['id_bahanbaku']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-bahanbaku.php?id_bahanbaku=<?php echo $bahanbaku['id_bahanbaku']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
        </div>

    </div>
</body>
</html>
