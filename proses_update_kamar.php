<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $kd_kamar = $_POST['kd_kamar'];
    $fitur = $_POST['fitur'];
    $harga_sewa = $_POST['harga_sewa'];
    

    // buat query update
    $sql = "UPDATE kamar SET kd_kamar='$kd_kamar', fitur='$fitur', harga_sewa='$harga_sewa' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list_kamar.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>