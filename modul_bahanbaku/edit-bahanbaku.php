<?php
include '../connection.php';
include '../function.php';

// ambil artikel yang mau di edit
$id_bahanbaku = $_GET['id_bahanbaku'];
$query = "SELECT * FROM bahan_baku WHERE id_bahanbaku = $id_bahanbaku";
$hasil = mysqli_query($db, $query);
$data_bahanbaku = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Edit Bahan Baku</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
          activebahan();
        ?>

        <div class="content">
            <h1>Edit Bahan Baku</h1>
            <form method="post" action="proses-edit-bahanbaku.php">
                <input type="hidden" name="id_bahanbaku" value="<?php echo $data_bahanbaku['id_bahanbaku']; ?>">
                <p>Nama Bahan Baku</p>
                <p><input type="text" name="nama_bahanbaku" value="<?php echo $data_bahanbaku['nama_bahanbaku']; ?>"></p>
                <p>stok</p>
                <p><input type="text" name="stok_bahanbaku" value="<?php echo $data_bahanbaku['stok']; ?>"></p>
                    <input type="submit" class="btn btn-tambah"  value="Simpan" onclick="return confirm('anda yakin akan mengubah data?')";">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
