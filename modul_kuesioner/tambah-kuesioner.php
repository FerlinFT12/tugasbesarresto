
<?php

include '../function.php';
include '../connection.php';
include 'proses-list-kuesioner.php';

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
            activekuesioner();

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
                
                <p>Nama Pelanggan</p>
                <p><select name="nama_menu">
                        <?php foreach ($data_kuesioner as $kuesioner) : ?>
                            <option value="<?php echo $kuesioner['no_pesanan'] ?>"><?php echo $kuesioner['nama_pelanggan'] ?></option>
                        <?php endforeach ?>
                    </select></p>
                <p>Pertanyaan</p>
                <p><textarea name="pertanyaan"></textarea></p>
                <p>Nilai</p>
                <p><input type="number" name="nilai" min="1" required></p>
                <input type="text" name="id_pegawai" required="" value="" hidden>
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
