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

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Edit Resep</title>
    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript" src="../js/jquery.js"></script>

</head>

<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png"></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
        activeresep();
        $query = "SELECT * from menu";
        $result = mysqli_query($db, $query);
        $querybahanbaku = "SELECT * FROM bahan_baku";
        $hasilbahanbaku = mysqli_query($db, $querybahanbaku);
        ?>
        <?php $pilihan = '';
        $data = array();

        if ($pilihan <> '') {
            $data = unserialize($pilihan);
        }
        ?>
        <div class="content">
            <h1>Edit Resep</h1>
            <form method="post" action="proses-edit-resep.php">
                <input type="text" name="id_menu" value="<?php echo $data_menu['id_menu']; ?>" hidden>
                <p>Nama Menu</p>
                <p><input type="text" name="nama_menu" value="<?php echo $data_menu['nama_menu']; ?>" readonly></p>
                <input type="text" name="id_pegawai" required="" value="<?php echo $_SESSION['id_pegawai']; ?>" hidden>
                <p>Nama Bahan Baku</p>
                <p>
                    <select name="id_bahanbaku">
                        <?php
                        //buat perulangan untuk elemen tabel dari tabel jasa
                        $no = 1; //variabel untuk membuat nomor urut
                        //hasil query akan disimpan dalam variabel $data dalam bentuk array
                        //kemudian dicetak dengan perulangan while
                        while ($row = mysqli_fetch_assoc($hasilbahanbaku)) {
                        ?>
                            <option value=<?php echo $row['id_bahanbaku']; ?>> <?php echo $row['nama_bahanbaku']; ?></option>
                        <?php
                            $no++;
                        }
                        ?>
                    </select>
                </p>

                <p>Jumlah</p>
                <p><input type="number" name="jumlah" min="1" required></p>
                <p>Satuan</p>
                <p><select name="satuan" id="satuan">
                        <option value="biji" required>Biji</option>
                        <option value="pcs" required>pcs</option>
                        <option value="Kg" required>Kg</option>
                        <option value="Sendok" required>Sendok</option>
                        <option value="ml" required>ml</option>
                    </select>
                </p>
                <p>
                    <a href="" class="tombol-simpan" style="background: #232323;padding: 10px 10px;color: #fff;">Simpan</a>
                    <input type="reset" class="btn btn-submit" value="Reset">
                </p>
            </form>


            <?php
            include '../connection.php';

            $id_menu = $_GET['id_menu'];
            $query = "SELECT * FROM menu WHERE id_menu = $id_menu";
            $hasil = mysqli_query($db, $query);
            $data_menu = mysqli_fetch_assoc($hasil);

            ?>
            <table class="data tampildata">
                <tr>
                    <th>No</th>
                    <th>Nama Bahan Baku</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $data = mysqli_query($db, "SELECT * FROM resep,bahan_baku WHERE resep.id_bahanbaku=bahan_baku.id_bahanbaku AND id_menu='$id_menu'");
                $no = 1;
                while ($row = mysqli_fetch_assoc($data)) {
                ?>
                    <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['nama_bahanbaku']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td><?php echo $row['satuan']; ?></td>
                        <td> <a href="edit-resep.php?id_menu=<?php echo $row['id_menu']; ?>" class="btn btn-edit">Edit</a>
                            <a href="delete-menu.php?id_menu=<?php echo $menu['id_menu']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>