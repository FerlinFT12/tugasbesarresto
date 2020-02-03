<?php include 'connection.php';

// ... ambil data dari database
include 'proses_cari.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home SI Perpus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>SI Perpustakaan</h1>

        <div class="sidebar">
    <ul>
        <li><a href="login.php">Login Admin</a></li>
    </ul>
</div>

        <div class="content">
            <h1>Daftar Buku</h1>
           <div class="cari">
            <form method="post" action="pencarian.php">
                     <input class="search" type="text" name="search" placeholder="Cari...">
                     <input class="button" type="submit" name="submit" value="Cari"">
            </form>
            </div>
            <?php if (isset($_POST['submit'])){ ?>
            <table class="data">
                <tr>
                    <th style="width: 50px;">Judul</th>
                    <th style="width: 50px;">Kategori</th>
                    <th style="width: 50px;">Deskripsi</th>
                    <th style="width: 50px;">Jumlah</th>
                    <th style="width: 50px;">Cover</th>
                </tr>
                <?php
                $cari = $_POST['search'];
                 $query2 = "SELECT * FROM buku JOIN kategori
                 ON buku.kategori_id = kategori.kategori_id WHERE buku_judul LIKE '%$cari%'";
 
                 $sql = mysqli_query($db, $query2);
                 while ($r = mysqli_fetch_array($sql)){ ?>
                <tr>
                   <td><?php echo $r['buku_judul'] ?></td>
                    <td><?php echo $r['kategori_nama'] ?></td>
                    <td><?php echo $r['buku_deskripsi'] ?></td>
                    <td><?php echo $r['buku_jumlah'] ?></td>
                    <td><img class="buku-cover" src="modul_buku/cover/<?php echo $r['buku_cover'] ?>" width='60' height='60'></td>
                </tr>
            <?php } ?>
        <?php } ?>
            </table>

        </div>

    </div>
</body>
</html>
