
<?php
  session_start();
  if($_SESSION['status'] != 'login') {
    header("location:login.php?pesan=belum_login");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="img/LOGO.png" ></div>
        
        <h4>Restoran Pak Broto Azhari</h4>
        <div class="sidebar">
            <ul>
                <li><a href="modul_bahanbaku/list-bahanbaku.php">Bahan Baku</a></li>
                <li><a href="modul_menu/list-menu.php">Menu</a></li>
                <li><a href="modul_menu/list-menu.php">Resep</a></li>
                <li><a href="modul_pemesanan/pemesanan-data.php">Pemesanan</a></li>
                <li><a href="modul_menu/list-menu.php">Pembayaran</a></li>
                <li><a href="modul_menu/list-menu.php">Kuesioner</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Selamat datang</h1>
        </div>
    </div>
</body>
</html>
