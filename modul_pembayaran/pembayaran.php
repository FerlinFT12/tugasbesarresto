<?php
// ... ambil data dari database
include '../function.php';
include '../modul_menu/proses-list-menu.php';
date_default_timezone_set('Asia/Jakarta');

$no_pesanan = @$_GET['no_pesanan'];
$nomor = @$_POST['nomor'];
$bayar = @$_POST['bayar'];
$tgl_bayar = date("Y-m-d h:i:s");

// var_dump($bayar);
// var_dump($nomor);
//  var_dump($no_pesanan);

 if (!$no_pesanan) {
$qpesan = "SELECT pesanan.*, meja.no_meja FROM `pesanan` JOIN meja ON meja.id_meja = pesanan.id_meja WHERE no_pesanan = $nomor";
$hasilpesan = mysqli_query($db,$qpesan);
$data_pesan = mysqli_fetch_assoc($hasilpesan);    

$querydetail = "SELECT detail_pesanan.*, menu.id_menu, menu.nama_menu, menu.harga_menu FROM `detail_pesanan` JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.no_pesanan = $nomor";
$hasil = mysqli_query($db, $querydetail);
$data_detail = array();
while ($row = mysqli_fetch_assoc($hasil)) {
$data_detail[] = $row;
}

}else{

$qpesan = "SELECT pesanan.*, meja.no_meja FROM `pesanan` JOIN meja ON meja.id_meja = pesanan.id_meja WHERE no_pesanan = $no_pesanan";
$hasilpesan = mysqli_query($db,$qpesan);
$data_pesan = mysqli_fetch_assoc($hasilpesan);    

$querydetail = "SELECT detail_pesanan.*, menu.id_menu, menu.nama_menu, menu.harga_menu FROM `detail_pesanan` JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.no_pesanan = $no_pesanan";
$hasil = mysqli_query($db, $querydetail);
$data_detail = array();


// var_dump($id_menu);
// var_dump($jumlah_pesan);
// var_dump($data_harga['harga_menu']);

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
$data_detail[] = $row;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pembayaran</title>
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
            <h3>Form Pembayaran</h3>
            <?php
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <!-- <form action="proses-tambah-pemesanan.php" method="post"> -->
                <table class="data">
                    <tr>
                        <?php $querysum = "select sum(total_harga) as grand_total from detail_pesanan WHERE detail_pesanan.no_pesanan = $no_pesanan";
                                $hasilsum = mysqli_query($db, $querysum);
                                @$grand_total = mysqli_fetch_assoc($hasilsum);
                         ?>
                        <th style="text-align: left; width: 20%">Nama</th>
                        <th style="text-align: left; width: 20%"><?php echo $data_pesan['nama_pelanggan']; ?></th>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%"></th>
                    </tr>
                    <tr>
                        <?php
                        $querymeja = "SELECT * FROM meja";
                                $hasilmeja = mysqli_query($db, $querymeja);
                                @$data_meja = mysqli_fetch_assoc($hasilmeja); 
                         ?>
                        <th style="text-align: left; width: 20%">No Meja</th>
                        <th style="text-align: left; width: 20%"><?php echo $data_pesan['no_meja'] ?></th>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%"></th>
                    </tr>
                </table>
                <table class="data">
                    <tr>
                        <th style="text-align: left; width: 20%">Nama Menu</th>
                        <th style="text-align: left; width: 20%">jumlah</th>
                        <th style="text-align: left; width: 20%">Harga</th>
                        <th style="text-align: left; width: 20%">Total Harga</th>
                    </tr>
                    <?php foreach ($data_detail as $detail) : ?>
                    <tr>
                        <td><?php echo $detail['nama_menu'] ?></td>
                         <td><?php echo $detail['jumlah'] ?></td>
                         <td><?php echo $detail['harga_menu'] ?></td>
                         <td><?php echo $detail['total_harga'] ?></td>

                    </tr>
                    <?php endforeach ?>
                </table>
                <table class="data">
                    <tr>
                        <?php 
                        if (!$no_pesanan) {
                            $querysum = "select sum(total_harga) as grand_total from detail_pesanan WHERE detail_pesanan.no_pesanan = $nomor";
                                $hasilsum = mysqli_query($db, $querysum);
                                @$grand_total = mysqli_fetch_assoc($hasilsum);
                                $Kembalian = $bayar - $grand_total['grand_total']; 
                        }else {
                                $querysum = "select sum(total_harga) as grand_total from detail_pesanan WHERE detail_pesanan.no_pesanan = $no_pesanan";
                                $hasilsum = mysqli_query($db, $querysum);
                                @$grand_total = mysqli_fetch_assoc($hasilsum);

                                $Kembalian = $bayar - $grand_total['grand_total']; 
                         }
                         ?>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%">Grand Total</th>
                        <th style="text-align: left; width: 20%"><?php echo $grand_total['grand_total']; ?></th>
                    </tr>
                </table>

               
                        
                        <?php if (!$bayar) {?>
                    <form action="pembayaran.php" method="post">
                        <p><input type="hidden" name="waktu_bayar" value="<?php echo $tgl_bayar ?>"></p>
                        <p><input type="hidden" name="nomor" value="<?php echo $no_pesanan ?>"></p>
                        <p>Bayar</p>
                        <p><input type="number" name="bayar" min="<?php echo $grand_total['grand_total']; ?>"></p>
                        <p><input type="submit" class="btn btn-tambah" value="Bayar"></p> 
                    </form>

                        <?php }else{ ?>
                    <form action="proses-pembayaran.php" method="post">
                        <p><input type="hidden" name="waktu_bayar" value="<?php echo $tgl_bayar ?>"></p>
                        <p><input type="hidden" name="nomor" value="<?php echo $nomor?>"></p>
                        <p>Bayar</p>
                        <p><input type="hidden" name="bayar" value="<?php echo $bayar; ?>"></p>
                        <p><input type="text" value="<?php echo $bayar; ?> " disabled></p>
                        <p>Kembalian</p>
                        <p><input type="hidden" name="kembalian" value="<?php echo $Kembalian; ?>"></p>
                        <p><input type="number" name="kembalian" value="<?php echo $Kembalian; ?>" disabled></p>
                         <p><input type="submit" class="btn btn-tambah" value="Simpan"></p> 
                    </form>

                        <?php } ?>

        </div>
    </div>
</body>
</html>