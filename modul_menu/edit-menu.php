<?php
include '../connection.php';
include '../function.php';

// ambil artikel yang mau di edit
$id_menu = $_GET['id_menu'];
$query = "SELECT * FROM menu WHERE id_menu = $id_menu";
$hasil = mysqli_query($db, $query);
$data_menu = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota SI Perpus</title>
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
            <h1>Edit Data Menu</h1>
            <form method="post" action="proses-edit-menu.php">
                <input type="hidden" name="id_menu" value="<?php echo $data_menu['id_menu']; ?>">
                <p>Nama Menu</p>
                <p><input type="text" name="nama_menu" value="<?php echo $data_menu['nama_menu']; ?>"></p>
                <p>Jenis Menu</p>
                <p>
                    <select name="jenis_menu">
                        <option value="Ayam">Ayam</option>
                        <option value="Sayuran">Sayuran</option>
                        <option value="Sup">Sup</option>
                        <option value="Seafood">Seafood</option>
                        <option value="Seafood">Jus</option>
                        <option value="Seafood">Milkshake</option>
                        <option value="Seafood">Coffee</option>
                    </select>
                </p>
                <p>Harga</p>
                <p><input type="number" name="harga" value="<?php echo $data_menu['harga_menu'] ?>"></p>

                    <input type="submit" class="btn btn-submit"  value="Simpan" onclick="return confirm('anda yakin akan mengubah data?')";">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
