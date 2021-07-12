<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>USER</title>
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
                <h3 align="center">Daftar user</h3>
            </header>

            
                <center><a href="form_user.php">[+] Tambah Baru</a></center>
            
                <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses'){
                        echo "Tambah user berhasil!";
                    } else {
                        echo "Tambah user gagal!";
                    }
                ?>
            </p>
        <?php endif; ?>
            <br>

            <table class="table1" align="center">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>no_hp</th>
                    <th>username</th>
                    <th>password</th>
                    <th>level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM user";
                $query = mysqli_query($db, $sql);

                while($user = mysqli_fetch_array($query)){
                    echo "<tr>";

                    echo "<td>".$user['id']."</td>";
                    echo "<td>".$user['nama']."</td>";
                    echo "<td>".$user['no_hp']."</td>";
                    echo "<td>".$user['username']."</td>";
                    echo "<td class=hidetext>".$user['password']."</td>";
                    echo "<td>".$user['level']."</td>";
                    echo "<td>";

                    echo "<a href='form_user_edit.php?id=".$user['id']."'>Edit</a> | ";
                    echo "<a onClick=\"javascript: return confirm('konfirmasi hapus');\" href='hapus_user.php?id=".$user['id']."'>Hapus</a>|";
                    
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