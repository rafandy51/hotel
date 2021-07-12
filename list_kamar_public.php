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
            <nav>
              
            </nav>
            <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
            <a href="logout.php">LOGOUT</a>
            <header>
                <h3 align="center">Daftar kamar</h3>
            </header>

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
                    
                    echo "<a href='reservasi.php?id=".$kamar['id']."'>Pesan Kamar ini</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>

            </tbody>
            </table>

           <center> <p>Total: <?php echo mysqli_num_rows($query) ?> Kamar</p></center>
        </div>
    </body>
</html>