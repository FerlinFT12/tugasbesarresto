<?php
// ... ambil data dari database
include '../function.php';
include '../modul_menu/proses-list-menu.php';

date_default_timezone_set('Asia/Jakarta');

$id_menu = @$_POST['id_menu'];
$nama_pelanggan = @$_POST['nama_pelanggan'];
$id_detail = @$_GET['id_detail'];
$id_meja = @$_POST['id_meja'];
$no_meja = @$_POST['no_meja'];
$jumlah_pesan = @$_POST['jumlah_pesan'];
$no_pesanan = @$_POST['no_pesanan'];
$no_pesan = @$_POST['no_pesanan'];

// var_dump($no_meja);
// var_dump($id_meja);
// var_dump($no_pesan);

$query = "DELETE FROM detail_pesanan WHERE id_detailpesanan = $id_detail";
$hasil = mysqli_query($db, $query);

$tgl = date("Y-m-d h:i:s");

// var_dump($tgl);

$query = "SELECT * FROM `menu` WHERE id_menu = $id_menu";
$hasil = mysqli_query($db, $query);
@$data_harga = mysqli_fetch_assoc($hasil);
$totharga = $data_harga['harga_menu'] * $jumlah_pesan; 


$qurut = "SELECT max(no_pesanan) as maxno_pesanan FROM pesanan";
$hasil = mysqli_query($db,$qurut);
$data  = mysqli_fetch_array($hasil);
$max = $data['maxno_pesanan'];

$no_urut = (int) substr($max, 3, 3);
$no_urut++;

$newID = $max + $no_urut;


 


if (!$id_menu) {
    $qtambahd = "INSERT INTO `detail_pesanan` (`no_pesanan`, `id_menu`, `jumlah`, `total_harga`) 
            VALUES ('$newID', '$id_menu', '$jumlah_pesan', '$totharga');";
    $hasiltambahd = mysqli_query($db, $qtambahd);
}else{
$qtambahd = "INSERT INTO `detail_pesanan` (`no_pesanan`, `id_menu`, `jumlah`, `total_harga`) 
            VALUES ('$no_pesanan', '$id_menu', '$jumlah_pesan', '$totharga');";
$hasiltambahd = mysqli_query($db, $qtambahd);
}

// $query = "DELETE FROM detail_pesanan WHERE id_detailpesanan = $id_detail";
// $hasil = mysqli_query($db, $query);

if (!$no_pesanan) {
$qpesan = "SELECT pesanan.*, meja.no_meja FROM `pesanan` JOIN meja ON meja.id_meja = pesanan.id_meja WHERE no_pesanan = $no_pesan";
$hasilpesan = mysqli_query($db,$qpesan);
@$data_pesan = mysqli_fetch_assoc($hasilpesan);    
}else{
$qpesan = "SELECT pesanan.*, meja.no_meja FROM `pesanan` JOIN meja ON meja.id_meja = pesanan.id_meja WHERE no_pesanan = $no_pesanan";
$hasilpesan = mysqli_query($db,$qpesan);
@$data_pesan = mysqli_fetch_assoc($hasilpesan);    
}


$qdetail = "SELECT detail_pesanan.*, menu.id_menu, menu.nama_menu, menu.harga_menu FROM `detail_pesanan` JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.no_pesanan = $no_pesanan";
$hasil = mysqli_query($db, $qdetail);
$data_detail = array();
while (@$row = mysqli_fetch_assoc($hasil)) {
$data_detail[] = $row;

}



// var_dump($newID);
// var_dump($id_meja);
// var_dump($id_menu);
// var_dump($jumlah_pesan);
// var_dump($nama_pelanggan);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Form Pemesanan</title>
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
            <!-- <form action="proses-tambah-pemesanan.php" method="post"> -->

                <form action="pemesanan-form-pelanggan.php" method="post">
                <?php if (!$id_menu) {?>
                <p><input type="hidden" name="no_pesanan" value="<?php echo $newID; ?>"></p>
                <p>Nama Pelanggan</p>
                <p><input type="text" name="nama_pelanggan" required></p>
                <p><input type="hidden" name="tgl" value="<?php echo $tgl; ?>"></p>
                <p>No Meja</p>
                <p><select name="id_meja">
                    <?php
                        $querymeja = "SELECT * FROM meja";
                        $hasilmeja = mysqli_query($db, $querymeja);
                        mysqli_connect_error();
                        // ... menampung semua data kategori
                        $data_meja = array();
                        // ... tiap baris dari hasil query dikumpulkan ke $data_anggota
                        while ($row = mysqli_fetch_assoc($hasilmeja)) {
                            $data_meja[] = $row;
                        }
                        ?>
                        <?php foreach ($data_meja as $meja) : ?>
                            <option value="<?php echo $meja['id_meja'] ?>"><?php echo $meja['no_meja'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Pilih Menu</p>
                 <p><input type="hidden" name="id_menu" value="1" ></p>
                <p><input type="hidden" name="jumlah_pesan" ></p>
                <p><input type="submit" class="btn btn-tambah" value="Simpan"></p>                
                </form>

            <?php } else{ ?>

                <?php 
                $qtambahp = "INSERT INTO `pesanan` (`no_pesanan`, `id_meja`, `waktu_pesanan`, `nama_pelanggan`) 
                VALUES ($no_pesanan, '$id_meja','$tgl','$nama_pelanggan');";
                $hasiltambahp = mysqli_query($db, $qtambahp);   
                 ?>

                <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesanan; ?>"></p>
                 <p>Nama Pelanggan</p>
                <p><input type="hidden" name="nama_pelanggan" value="<?php echo $nama_pelanggan ?>"></p>
                <p><input type="text" value="<?php echo $nama_pelanggan ?>" disabled></p>
                <p>No Meja</p>
                <?php if (!$id_meja) {?>
                <p><input type="hidden" name="no_meja" value="<?php echo $data_pesan['no_meja']; ?>"></p>
                <p><input type="text" value="<?php echo $data_pesan['no_meja']; ?>" disabled></p>
            <?php }else{ ?>

                <p><input type="hidden" name="no_meja" value="<?php echo '0'.$id_meja; ?>"></p>
                <p><input type="text" value="<?php echo '0'.$id_meja; ?>" disabled></p>

            <?php } ?>
                <p>Pilih Menu</p>
                <p><select name="id_menu">
                        <?php foreach ($data_menu as $menu) : ?>
                            <option value="<?php echo $menu['id_menu'] ?>"><?php echo $menu['nama_menu'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p>Jumlah</p>
                <p><input type="number" name="jumlah_pesan" min="1"></p>
                <p><input type="hidden" name="no_meja" value="<?php echo $data_pesan['no_meja']; ?>"></p>
                <p><input type="submit" class="btn btn-tambah" value="Pilih Menu"></p>                
                </form>
            <?php } ?>
               

                <?php if (!$id_menu){ ?>
                    
                <?php } else{ ?>
                <table class="data">
                    <tr>
                        <th style="text-align: left; width: 20%">Nama Menu</th>
                        <th style="text-align: left; width: 20%">jumlah</th>
                        <th style="text-align: left; width: 20%">Harga</th>
                        <th style="text-align: left; width: 20%">Total Harga</th>
                        <th style="text-align: left; width: 20%">Aksi</th>
                    </tr>
                    <?php foreach ($data_detail as $detail) : ?>
                    <tr>
                        <td><?php echo $detail['nama_menu'] ?></td>
                         <td><?php echo $detail['jumlah'] ?></td>
                         <td><?php echo $detail['harga_menu'] ?></td>
                         <td><?php echo $detail['total_harga'] ?></td>
                          <td>
                            <form action="pemesanan-form-pelanggan.php?id_detail=<?php echo $detail['id_detailpesanan']; ?>" method="post">
                                <p><input type="hidden" name="nama_pelanggan" value="<?php echo $data_pesan['nama_pelanggan'] ?>"></p>
                               <?php if (!$no_pesanan) {?>

                                        <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesan; ?>"></p>
                                <?php }else{ ?>
                                        <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesanan; ?>"></p>
                                <?php } ?>
                                <p><input type="hidden" name="no_meja" value="<?php echo $data_pesan['no_meja']; ?>"></p>
                                <p><input type="hidden" name="id_menu" value="1" ></p>
                                <p><input type="submit" class="btn btn-hapus" value="Hapus"></p> 
                            </form>
                         </td>

                    </tr>
                    <?php endforeach ?>
                </table>
                <table class="data">
                    <tr>
                        <?php $querysum = "select sum(total_harga) as grand_total from detail_pesanan WHERE detail_pesanan.no_pesanan = $no_pesanan";
                                $hasilsum = mysqli_query($db, $querysum);
                                @$grand_total = mysqli_fetch_assoc($hasilsum);
                         ?>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%">Grand Total</th>
                        <th style="text-align: left; width: 20%"><?php echo $grand_total['grand_total']; ?></th>
                        <th style="text-align: left; width: 20%"></th>
                    </tr>
                </table>
                <form action="pemesanan-data.php">
                     <p><input type="submit" class="btn btn-tambah" value="Simpan"></p> 
                </form>
        </div>
    </div>
</body>
</html>
<?php } ?>
