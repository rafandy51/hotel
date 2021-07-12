<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>List kamar</title>
    <link rel="stylesheet" type="text/css" href="rafandy.css">
   
</head>


<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>
        <div class="konten">
            
            
            <?php include("navbar_admin.php"); ?>
            <center><p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p></center>
            <header>
                <h3 align="center">Daftar kamar</h3>
            </header>

            
                <center><a href="form_kamar.php">[+] Tambah Baru</a></center>
            
                <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses'){
                        echo "Tambah kamar berhasil!";
                    } else {
                        echo "Tambah kamar gagal!";
                    }
                ?>
            </p>
        <?php endif; ?>
            <br>

            <table class="table1" align="center">
            <thead>
                <tr>
                    <th>kd_kamar</th>
                    <th>Fitur</th>
                    <th>Harga sewa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM kamar";
                $query = mysqli_query($db, $sql);

                while($kamar = mysqli_fetch_array($query)){
                    echo "<tr>";

                    echo "<td>".$kamar['kd_kamar']."</td>";
                    echo "<td>".$kamar['fitur']."</td>";
                    echo "<td>".$kamar['harga_sewa']."</td>";
                    echo "<td>";
                    echo "<a href='form_kamar_edit.php?id=".$kamar['id']."'>Edit</a> | ";
                    echo "<a href='hapus_kamar.php?id=".$kamar['id']."'>Hapus</a>|";
                  
                    echo "</td>";

                    echo "</tr>";
                }
                ?>

            </tbody>
            </table>

            <p align="center">Total: <?php echo mysqli_num_rows($query) ?></p>
        </div>
</body>
</html>