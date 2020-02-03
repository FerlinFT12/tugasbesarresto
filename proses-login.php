<?php
//mengaktifkan session php untuk login
session_start();

// menghubungkan dengan koneksi
include 'connection.php';

//menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$bagian = $_POST['bagian'];

// menyeleksi data admin dengan username dan password yang sesuai
$query = mysqli_query($db, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password' AND bagian ='$bagian'");

// $my_id=$my_id_array['id'];
// $bagian =$my_id_array['bagian'];

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

//cek apakah username dan password ditemukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);

    //cek jika user login sebagai 
    if($data['bagian']=="pelayan") {
        //buat session dan username
        $_SESSION['username'] = $username;
        $_SESSION['id_pegawai'] = $data['id'];
        $_SESSION['bagian'] = "pelayan";
        header("location:modul_pemesanan/pemesanan-data.php");
    //cek jika user login sebagai koki
    }
    else if($data['bagian']=="koki") {
        //buat session dan username
        $_SESSION['username'] = $username;
        $_SESSION['id_pegawai'] = $data['id'];
        $_SESSION['bagian'] = "koki";
        $_SESSION['status'] = "login";
        header("location:modul_menu/list-menu.php");
    }
    else if($data['bagian']=="pantry") {
        //buat session dan username
        $_SESSION['username'] = $username;
        $_SESSION['id_pegawai'] = $data['id'];
        $_SESSION['bagian'] = "pantry";
        $_SESSION['status'] = "login";
        header("location:modul_bahanbaku/list-bahanbaku.php");
    }
    else if($data['bagian'] =="kasir") {
        //buat session dan username
        $_SESSION['username'] = $username;
        $_SESSION['id_pegawai'] = $data['id'];
        $_SESSION['bagian'] = "kasir";
        $_SESSION['status'] = "login";
        header("location:modul_pembayaran/list-pembayaran.php");
    }
    else if($data['bagian']=="cs") {
        //buat session dan username
        $_SESSION['username'] = $username;
        $_SESSION['id_pegawai'] = $data['id'];
        $_SESSION['bagian'] = "cs";
        $_SESSION['status'] = "login";
        header("location:modul_kuesioner/list-kuesioner.php");
    }
    else {

    //alihkan ke halaman login kembali
    header("location:login.php?pesan=gagal");
    }
} else {

    //alihkan ke halaman login kembali
    header("location:login.php?pesan=gagal");
}
?>