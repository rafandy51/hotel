<?php
include("config.php");


    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['tambah'])){

        // ambil data dari formulir
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        

        // buat query
        $sql = "INSERT INTO user(id, nama, no_hp, username, password, level) VALUE ('$id', '$nama', '$no_hp', '$username', '$password', '$level')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: list_user.php?status=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: list_user.php?status=gagal');
        }


    } else {
        die("Akses dilarang...");
    }


?>