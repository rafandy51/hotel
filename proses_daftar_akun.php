<?php
include("config.php");


    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['daftar'])){

        // ambil data dari formulir
        $no_hp = $_POST['no_hp'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $level = $_POST['level'];
        

        // buat query
        $sql = "INSERT INTO user (no_hp, nama, username, password, level) VALUE ('$no_hp', '$nama', '$username', '$password', '$level')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: index.php?pesan=sukses_daftar');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: index.php?pesan=gagal_daftar');
        }


    } else {
        die("Akses dilarang...");
    }


?>