<?php
    include '../connection.php';

    $id_menu = $_GET['id_menu'];
    $query = "SELECT * FROM menu WHERE id_menu = $id_menu";
    $hasil = mysqli_query($db, $query);
    $data_menu = mysqli_fetch_assoc($hasil);

?>
<table class="data">
    <tr>
        <th>No</th>
        <th>Nama Bahan Baku</th>
        <th>Jumlah</th>
        <th>Satuan</th>
    </tr>
    <?php
        $data = mysqli_query($db, "SELECT * FROM resep,bahan_baku WHERE resep.id_bahanbaku=bahan_baku.id_bahanbaku AND id_menu='$id_menu'");
        $no = 1;
        while($row = mysqli_fetch_assoc($data)) {
                      ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_bahanbaku']; ?></td>
            <td><?php echo $row['satuan']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
        </tr>
        <?php 
        $no++;
    }
    ?>
</table>