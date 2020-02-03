<?php
// ... ambil data dari database
include '../function.php';
include '../modul_menu/proses-list-menu.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$id_meja = $_POST['id_meja'];
$no_pesanan = $_POST['no_pesanan'];

var_dump($nama_pelanggan);
var_dump($no_pesanan);
var_dump($id_meja);

$q = "SELECT * FROM `pesanan` ";
$hasil = mysqli_fetch_assoc($db,$q);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Menu</title>
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
            <h3>Tambah Pemesanan</h3>
            <?php
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            
                <table class="data">
                    <tr>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                    </tr>
                    <?php foreach ( $data_menu as $menu) {?>
                    <tr>
                        <form action="pemesanan-form-pelanggan.php?id_menu=<?php echo $menu['id_menu']; ?>" method="post">
                        <td><?php echo $menu['nama_menu']; ?></td>
                        <td><?php echo $menu['harga_menu']; ?></td>
                        <td><input type="number" name="jumlah_pesan" value="1" min="1"></td>
                        <td> 
                            <input type="hidden" name="nama_pelanggan" value="<?php echo $nama_pelanggan ?>">
                            <input type="hidden" name="id_meja" value="<?php echo $id_meja ?>">
                            <input type="submit" class="btn btn-tambah" value="Pilih">
                        </td>
                        </form>
                    </tr>
                    <?php } ?>
                </table>
           

        </div>
    </div>
</body>
</html>
