<?php

function hitung_bayar($bayar,$harga)
{

        $hasil = $bayar - $harga;

    return $hasil;
}

function hitung_total($harga, $jumlah)
{

        $hasil = $harga * $jumlah;

    return $hasil;
}

function tampilkan(){
  echo' var nama_jenis=document.getElementById("form1").kategori.value;
  if (nama_jenis=="makanan")
    {
        document.getElementById("tampil").innerHTML="<option value="Nasi Goreng">Nasi Goreng</option><option value="Bakso">Bakso</option>";
    }
  else if (nama_jenis=="minuman")
    {
        document.getElementById("tampil").innerHTML="<option value="Teh">Teh</option><option value="Copy">Copy</option>";
    }';
}


function activebahan(){
    echo '<div class="sidebar">
    <ul>
        <li><a class="active" href="../modul_bahanbaku/list-bahanbaku.php">Bahan Baku</a></li>
        
        <li><a href="../logout.php" onclick="return confirm("anda yakin akan keluar?")">Logout</a></li>
    </ul>
</div>
';

}

function activemenu(){
    echo '<div class="sidebar">
    <ul>
        <li><a href="../modul_menu/list-bahanbaku.php">Bahan Baku</a></li>
        <li><a class="active" href="../modul_menu/list-menu.php">Menu</a></li>
        <li><a href="../modul_resep/list-resep.php">Resep</a></li>
        <li><a href="../logout.php" onclick="return confirm("anda yakin akan keluar?")">Logout</a></li>
    </ul>
</div>
';

}


function activepemesanan(){
    echo '<div class="sidebar">
    <ul>
        <li><a href="../modul_pemesanan/list-menu.php">Menu</a></li>
        <li><a href="../modul_resep/list-resep.php">Resep</a></li>
        <li><a class="active" href="../modul_pemesanan/pemesanan-data.php"">Pemesanan</a></li>
        <li><a href="../modul_kuesioner/list-kuesioner.php">Kuesioner</a></li>
        <li><a href="../logout.php" onclick="return confirm("anda yakin akan keluar?")">Logout</a></li>
    </ul>
</div>
';

}

function activeresep(){
    echo '<div class="sidebar">
    <ul>
        <li><a href="../modul_menu/list-bahanbaku.php">Bahan Baku</a></li>
        <li><a class="active" href="../modul_menu/list-menu.php">Menu</a></li>
        <li><a href="../modul_resep/list-resep.php">Resep</a></li>
        <li><a href="../logout.php" onclick="return confirm("anda yakin akan keluar?")">Logout</a></li>
    </ul>
</div>
';
}

function activepembayaran(){
    echo '<div class="sidebar">
    <ul>
        <li><a href="../modul_pemesanan/pemesanan-data.php"">Pemesanan</a></li>
        <li><a class="active" href="../modul_pembayaran/list-pembayaran.php">Pembayaran</a></li>
        <li><a href="../modul_kuesioner/list-kuesioner.php">Kuesioner</a></li>
        <li><a href="../logout.php" onclick="return confirm("anda yakin akan keluar?")">Logout</a></li>
    </ul>
</div>
';
}
function activekuesioner(){
    echo '<div class="sidebar">
    <ul>
        <li><a href="../modul_pembayaran/list-pembayaran.php">Pembayaran</a></li>
        <li><a class="active" href="../modul_kuesioner/list-kuesioner.php">Kuesioner</a></li>
        <li><a href="../logout.php" onclick="return confirm("anda yakin akan keluar?")">Logout</a></li>
    </ul>
</div>';
}
?>