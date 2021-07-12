<?php
include("config.php");


    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['order'])){

        // ambil data dari formulir
        
        $no_bill = $_POST['no_bill'];
        $username = $_POST['username'];
        $kd_kamar = $_POST['kd_kamar'];
        $tgl_chkin = $_POST['tgl_chkin'];
        $tgl_chkout = $_POST['tgl_chkout'];
        $status = $_POST['status'];
        
        $date = $_POST['tgl_chkin'];
        $tgl = date('dmY');
        
            

        // buat query
        $sql = "INSERT INTO reservasi_kamar (no_bill, username, kd_kamar, tgl_chkin, tgl_chkout, status) VALUE ('$tgl$kd_kamar$no_bill  ', '$username', '$kd_kamar', '$tgl_chkin', '$tgl_chkout', '$status')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: list_order.php?status=sukses_order');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: list_order.php?status=gagal_order');
        }


    } else {
        die("Akses dilarang...");
    }


?>