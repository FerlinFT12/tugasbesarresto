<?php
  session_start();
  if($_SESSION['status'] != 'login') {
    header("location:login.php?pesan=belum_login");
  }
?>
<?php

include '../function.php';
include '../connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
            activemenu();

            $query = "SELECT * from bahanbaku";
            $result = mysqli_query($db,$query);
        ?>
        <?php $pilihan='';
        $data = array();

        if($pilihan<> '') {
            $data = unserialize($pilihan);
        }
        ?>
        <div class="content">
            <h1>Tambah Menu</h1>
            <form method="post" action="proses-tambah-menu.php">
                <p>Nama Menu</p>
                <p><input type="text" name="nama_menu" required></p>
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
                <p><input type="number" name="harga" min="1" required></p>
                <input type="text" name="id_pegawai" required="" value="<?php echo $_SESSION['id_pegawai']; ?>"hidden>
                <!-- <p>Bahan Baku</p> -->
                
                <?php 
                    //while($row = mysqli_fetch_object($result)) {
                        //$bahan = $row->nama_bahanbaku;
                ?>
                <!-- <input type="checkbox" name="bahanbaku[]" value="<?php //echo $bahan;?>"  <?php //echo in_array($bahan, $data) ? 'checked' : ''; ?>> -->
                <?php //echo $bahan;
            //}
            ?> 
                
                <p>
                    <input type="submit" class="btn btn-tambah" value="Simpan">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
