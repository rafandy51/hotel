<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
    <link rel="stylesheet" type="text/css" href="rafandy.css">
</head>

    <body>
        <div class="konten">
            <?php 
                if(isset($_GET['pesan'])){
                 if($_GET['pesan']=="gagal"){
                    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                    }
                 else if($_GET['pesan']=="gagal_daftar"){
                    echo "<div class='alert'>Gagal membuat akun ! username atau nomor HP mungkin sudah terdaftar..</div>";
                    }
                 else if($_GET['pesan']=="sukses_daftar"){
                    echo "<div class='alert'>sukses membuat akun ! Silahkan coba login</div>";
                    }
                 else if($_GET['pesan']=="dilarang"){
                    echo "<div class='alert'>akses dilarang ! Silahkan login terlebih dahulu!</div>";
                    }
                }
            ?>
            <nav >
               <?php include("popup_login.php"); ?>
            </nav>
            <header>
                <h2 align="center">Selamat Datang di Aplikasi Hoteltest.dev By Rafandy</h2>
            </header>

            
        </div>
    </body>
</html>