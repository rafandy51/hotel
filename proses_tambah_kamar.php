<?php
include("config.php");


    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['tambah'])){

        // ambil data dari formulir
        $kd_kamar = $_POST['kd_kamar'];
        $fitur = $_POST['fitur'];
        $harga_sewa = $_POST['harga_sewa'];
        

        // buat query
        $sql = "INSERT INTO kamar (kd_kamar, fitur, harga_sewa) VALUE ('$kd_kamar', '$fitur', '$harga_sewa')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: list_kamar.php?status=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: list_kamar.php?status=gagal');
        }


    } else {
        die("Akses dilarang...");
    }


?>